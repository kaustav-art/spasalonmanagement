<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('app', 'url', 'string'));
    }

    /**
     * Services Management Section
     * Modeled after Superadmin Layouts Services (with Heading & Copy, Catalogue Table, and Rich Modal Form)
     */
    public function index() {
        $active_template = function_exists('get_active_template') ? get_active_template() : 'template2';
        $curr_layout = function_exists('get_active_home_layout') ? get_active_home_layout() : 2;

        // Handle POST actions
        if ($this->input->method() === 'post') {
            $action = $this->input->post('action', TRUE);

            // 1. Save Section Heading & Copy
            if ($action === 'save_services_headers') {
                $tagline = trim($this->input->post('services_tagline', TRUE));
                $title = trim($this->input->post('services_title', TRUE));
                $desc = trim($this->input->post('services_desc', TRUE));

                set_tpl_setting($active_template, $curr_layout, 'services_header', 'tagline', $tagline);
                set_tpl_setting($active_template, $curr_layout, 'services_header', 'title', $title);
                set_tpl_setting($active_template, $curr_layout, 'services_header', 'desc', $desc);

                $this->session->set_flashdata('success', 'Services section headers updated successfully!');
                redirect(admin_url('services'));
                return;
            }

            // 2. Add or Edit Service
            if ($action === 'save_service') {
                $service_id = (int)$this->input->post('service_id');
                $title = trim($this->input->post('title', TRUE));
                $slug = trim($this->input->post('slug', TRUE));
                if (empty($slug)) {
                    $slug = url_title($title, 'dash', TRUE);
                }
                $icon = trim($this->input->post('icon', TRUE)) ?: 'icon-botox';
                $short_desc = trim($this->input->post('short_desc', TRUE));
                $description = $this->input->post('description', FALSE); // Rich HTML from Summernote
                $price = (float)$this->input->post('price');
                $duration = trim($this->input->post('duration', TRUE)) ?: '60 mins';
                $sort_order = (int)$this->input->post('sort_order') ?: 1;
                $status = $this->input->post('status') === 'inactive' ? 'inactive' : 'active';

                // File Uploads
                $handle_file_upload = function($field_name, $prefix) {
                    if (!isset($_FILES[$field_name]) || $_FILES[$field_name]['error'] !== UPLOAD_ERR_OK) {
                        return null;
                    }
                    $ext = strtolower(pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION));
                    if (!in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'))) {
                        return null;
                    }
                    $upload_dir = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'services' . DIRECTORY_SEPARATOR;
                    if (!is_dir($upload_dir)) {
                        @mkdir($upload_dir, 0755, true);
                    }
                    $filename = $prefix . '_' . time() . '.' . $ext;
                    if (@move_uploaded_file($_FILES[$field_name]['tmp_name'], $upload_dir . $filename)) {
                        // Also copy to parent if running in tenant directory
                        $parent_upload_dir = dirname(FCPATH) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'services' . DIRECTORY_SEPARATOR;
                        if (is_dir(dirname(FCPATH)) && is_dir($parent_upload_dir)) {
                            @copy($upload_dir . $filename, $parent_upload_dir . $filename);
                        }
                        return 'uploads/services/' . $filename;
                    }
                    return null;
                };

                $thumbnail = trim($this->input->post('thumbnail_url', TRUE));
                $uploaded_thumb = $handle_file_upload('thumbnail_file', 'svc_thumb_' . time());
                if ($uploaded_thumb) {
                    $thumbnail = $uploaded_thumb;
                }
                if (empty($thumbnail)) {
                    $thumbnail = 'assets/template2/images/services/services-1-1.jpg';
                }

                $banner_img = trim($this->input->post('banner_image_url', TRUE));
                $uploaded_banner = $handle_file_upload('banner_image_file', 'svc_banner_' . time());
                if ($uploaded_banner) {
                    $banner_img = $uploaded_banner;
                }
                if (empty($banner_img)) {
                    $banner_img = 'assets/template2/images/services/service-details-img4.jpg';
                }

                $duration_minutes = (int)preg_replace('/[^0-9]/', '', $duration);
                if ($duration_minutes <= 0) $duration_minutes = 60;

                // 1) Update / Insert into template_services
                $tpl_service_data = array(
                    'template_key' => $active_template,
                    'layout_number' => $curr_layout,
                    'title' => $title,
                    'slug' => $slug,
                    'icon' => $icon,
                    'thumbnail' => $thumbnail,
                    'banner_image' => $banner_img,
                    'short_desc' => $short_desc,
                    'description' => $description,
                    'price' => $price,
                    'duration' => $duration,
                    'sort_order' => $sort_order,
                    'status' => $status
                );

                if ($service_id > 0) {
                    $this->db->where('id', $service_id)->update('template_services', $tpl_service_data);
                    
                    // Sync with services table
                    $check_svc = $this->db->get_where('services', array('slug' => $slug))->row();
                    if ($check_svc) {
                        $this->db->where('id', $check_svc->id)->update('services', array(
                            'name' => $title,
                            'price' => $price,
                            'duration' => $duration_minutes,
                            'description' => $short_desc,
                            'image' => $thumbnail,
                            'status' => $status
                        ));
                    }
                    $this->session->set_flashdata('success', 'Service updated successfully!');
                } else {
                    $this->db->insert('template_services', $tpl_service_data);
                    
                    // Sync into services table for Appointments and POS
                    $check_svc = $this->db->get_where('services', array('slug' => $slug))->row();
                    if (!$check_svc) {
                        $first_cat = $this->db->get('service_categories')->row();
                        $cat_id = $first_cat ? $first_cat->id : 1;
                        $this->db->insert('services', array(
                            'category_id' => $cat_id,
                            'name' => $title,
                            'slug' => $slug,
                            'type' => 'both',
                            'price' => $price,
                            'duration' => $duration_minutes,
                            'tax_rate' => 0.00,
                            'requires_room' => 0,
                            'image' => $thumbnail,
                            'description' => $short_desc,
                            'status' => $status
                        ));
                    }
                    $this->session->set_flashdata('success', 'Service created successfully!');
                }

                redirect(admin_url('services'));
                return;
            }

            // 3. Delete Service
            if ($action === 'delete_service') {
                $service_id = (int)$this->input->post('service_id');
                if ($service_id > 0) {
                    $svc = $this->db->get_where('template_services', array('id' => $service_id))->row();
                    if ($svc) {
                        $this->db->where('slug', $svc->slug)->update('services', array('status' => 'inactive'));
                    }
                    $this->db->where('id', $service_id)->delete('template_services');
                    $this->session->set_flashdata('success', 'Service deleted successfully.');
                }
                redirect(admin_url('services'));
                return;
            }
        }

        // Fetch section headers
        $data['services_tagline'] = get_tpl_setting($active_template, $curr_layout, 'services_header', 'tagline', 'We Offer');
        $data['services_title'] = get_tpl_setting($active_template, $curr_layout, 'services_header', 'title', 'Beauty and Skin Care Services');
        $data['services_desc'] = get_tpl_setting($active_template, $curr_layout, 'services_header', 'desc', 'Our skin care services are designed to nourish, protect, and enhance your natural beauty. We use advanced techniques and high-quality botanicals.');

        // Fetch services list
        $data['services_list'] = $this->db->where('template_key', $active_template)
                                          ->order_by('sort_order', 'ASC')
                                          ->get('template_services')
                                          ->result();

        if (empty($data['services_list'])) {
            // Fallback: populate from services table if template_services is empty
            $data['services_list'] = $this->db->order_by('id', 'ASC')->get('services')->result();
        }

        $data['active_template'] = $active_template;
        $data['curr_layout'] = $curr_layout;
        $data['website_url'] = function_exists('website_url') ? website_url() : base_url();

        $this->render('services/index', $data, 'Services Catalog');
    }

    /**
     * Optional category route retained for compatibility
     */
    public function categories() {
        $this->index();
    }
}
