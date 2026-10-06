<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configure_website extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('app', 'url', 'string'));
    }

    /**
     * Configure Website Layout Decorator
     * Allows tenant admin to customize Template 2 Layout 2 sections:
     * - Multi-Slide Hero Banner
     * - Our Works (Featured Items)
     * - About Us
     * - Client Testimonials
     * - Frequently Asked Questions (FAQs)
     */
    public function index() {
        $active_template = function_exists('get_active_template') ? get_active_template() : 'template2';
        $curr_layout = function_exists('get_active_home_layout') ? (int)get_active_home_layout() : 2;
        $active_tab = $this->input->get('tab', TRUE) ?: 'hero';

        // Normalize tab alias
        if (in_array($active_tab, array('features', 'skincare', 'works'))) {
            $active_tab = 'works';
        }

        // File upload helper
        $handle_file_upload = function($field_name, $prefix) {
            if (!isset($_FILES[$field_name]) || $_FILES[$field_name]['error'] !== UPLOAD_ERR_OK) {
                return null;
            }
            $ext = strtolower(pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION));
            if (!in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'))) {
                return null;
            }
            $upload_dir = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'website' . DIRECTORY_SEPARATOR;
            if (!is_dir($upload_dir)) {
                @mkdir($upload_dir, 0755, true);
            }
            $filename = $prefix . '_' . time() . '.' . $ext;
            if (@move_uploaded_file($_FILES[$field_name]['tmp_name'], $upload_dir . $filename)) {
                $parent_upload_dir = dirname(FCPATH) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'website' . DIRECTORY_SEPARATOR;
                if (is_dir(dirname(FCPATH)) && is_dir($parent_upload_dir)) {
                    @copy($upload_dir . $filename, $parent_upload_dir . $filename);
                }
                return 'uploads/website/' . $filename;
            }
            return null;
        };

        // Handle POST Actions
        if ($this->input->method() === 'post') {
            $action = $this->input->post('action', TRUE) ?: $this->input->post('section', TRUE);

            // ==========================================
            // 1. HERO BANNER ACTIONS (MULTI-SLIDE)
            // ==========================================
            if ($action === 'save_hero_slide') {
                $slide_id = (int)$this->input->post('slide_id');
                $layout_num = (int)$this->input->post('layout_number') ?: $curr_layout;
                $badge = trim($this->input->post('badge', TRUE));
                $title = trim($this->input->post('title', TRUE));
                $desc = trim($this->input->post('description', TRUE));
                $btn_text = trim($this->input->post('button_text', TRUE)) ?: 'Book Appointment';
                $btn_url = trim($this->input->post('button_url', TRUE)) ?: 'booking';
                $sort_order = (int)$this->input->post('sort_order') ?: 1;
                $status = $this->input->post('status') === 'inactive' ? 'inactive' : 'active';

                $image = trim($this->input->post('image_url', TRUE));
                $uploaded_img = $handle_file_upload('image_file', 't2_hero_slide_' . time());
                if ($uploaded_img) {
                    $image = $uploaded_img;
                }
                if (empty($image)) {
                    $image = 'assets/template2/images/resources/main-slider-img-1-1.png';
                }

                $bg_image = trim($this->input->post('background_image_url', TRUE));
                $uploaded_bg = $handle_file_upload('background_image_file', 't2_hero_bg_' . time());
                if ($uploaded_bg) {
                    $bg_image = $uploaded_bg;
                }

                $slide_data = array(
                    'template_key' => $active_template,
                    'layout_number' => $layout_num,
                    'badge' => $badge,
                    'title' => $title,
                    'description' => $desc,
                    'button_text' => $btn_text,
                    'button_url' => $btn_url,
                    'image' => $image,
                    'background_image' => $bg_image,
                    'sort_order' => $sort_order,
                    'status' => $status
                );

                if ($slide_id > 0) {
                    $this->db->where('id', $slide_id)->update('template_hero_banners', $slide_data);
                    $this->session->set_flashdata('success', 'Hero Banner slide updated successfully!');
                } else {
                    $this->db->insert('template_hero_banners', $slide_data);
                    $this->session->set_flashdata('success', 'New Hero Banner slide added successfully!');
                }

                // Sync first slide to template_layout_settings as fallback
                set_tpl_setting($active_template, $layout_num, 'hero', 'hero_badge', $badge);
                set_tpl_setting($active_template, $layout_num, 'hero', 'hero_title', $title);
                set_tpl_setting($active_template, $layout_num, 'hero', 'hero_desc', $desc);
                set_tpl_setting($active_template, $layout_num, 'hero', 'hero_btn_text', $btn_text);
                set_tpl_setting($active_template, $layout_num, 'hero', 'hero_btn_url', $btn_url);
                if (!empty($image)) {
                    set_tpl_setting($active_template, $layout_num, 'hero', 'hero_image', $image);
                }

                redirect(admin_url('configure_website?tab=hero'));
                return;
            }

            if ($action === 'delete_hero_slide') {
                $slide_id = (int)$this->input->post('slide_id');
                if ($slide_id > 0) {
                    $this->db->where('id', $slide_id)->delete('template_hero_banners');
                    $this->session->set_flashdata('success', 'Hero Banner slide deleted successfully.');
                }
                redirect(admin_url('configure_website?tab=hero'));
                return;
            }

            // ==========================================
            // 2. OUR WORKS / FEATURED ITEMS ACTIONS
            // ==========================================
            if ($action === 'save_featured_headers' || $action === 'save_featured_skincare_headers' || $action === 'features') {
                $tagline = trim($this->input->post('featured_tagline', TRUE) ?: $this->input->post('skincare_tagline', TRUE) ?: $this->input->post('works_tagline', TRUE));
                $title = trim($this->input->post('featured_title', TRUE) ?: $this->input->post('skincare_title', TRUE) ?: $this->input->post('works_title', TRUE));

                set_tpl_setting($active_template, $curr_layout, 'featured_skincare', 'tagline', $tagline);
                set_tpl_setting($active_template, $curr_layout, 'featured_skincare', 'title', $title);

                $this->session->set_flashdata('success', 'Our Works section headers updated successfully!');
                redirect(admin_url('configure_website?tab=works'));
                return;
            }

            if ($action === 'save_featured_item') {
                $item_id = (int)$this->input->post('item_id');
                $title = trim($this->input->post('title', TRUE));
                $short_desc = trim($this->input->post('short_desc', TRUE));
                $sort_order = (int)$this->input->post('sort_order') ?: 0;
                $status = $this->input->post('status') === 'inactive' ? 'inactive' : 'active';
                $layout_num = (int)$this->input->post('layout_number') ?: $curr_layout;
                $button_text = trim($this->input->post('button_text', TRUE)) ?: ($layout_num === 2 ? 'View Work' : 'Book Now');
                $button_link = trim($this->input->post('button_link', TRUE)) ?: 'booking';

                $thumbnail = trim($this->input->post('thumbnail_url', TRUE));
                $uploaded = $handle_file_upload('thumbnail_file', 't2_feat_' . time());
                if ($uploaded) {
                    $thumbnail = $uploaded;
                }
                if (empty($thumbnail)) {
                    $thumbnail = ($layout_num === 2) ? 'assets/template2/images/work/work-1-1.jpg' : 'assets/template2/images/resources/feature-1-1.jpg';
                }

                $item_data = array(
                    'template_key' => $active_template,
                    'layout_number' => $layout_num,
                    'title' => $title,
                    'short_desc' => $short_desc,
                    'thumbnail' => $thumbnail,
                    'button_text' => $button_text,
                    'button_link' => $button_link,
                    'sort_order' => $sort_order,
                    'status' => $status
                );

                if ($item_id > 0) {
                    $this->db->where('id', $item_id)->update('template_featured_items', $item_data);
                    $this->session->set_flashdata('success', 'Our Works item updated successfully!');
                } else {
                    $this->db->insert('template_featured_items', $item_data);
                    $this->session->set_flashdata('success', 'New item added to Our Works successfully!');
                }
                redirect(admin_url('configure_website?tab=works'));
                return;
            }

            if ($action === 'delete_featured_item') {
                $item_id = (int)$this->input->post('item_id');
                if ($item_id > 0) {
                    $this->db->where('id', $item_id)->delete('template_featured_items');
                    $this->session->set_flashdata('success', 'Our Works item deleted.');
                }
                redirect(admin_url('configure_website?tab=works'));
                return;
            }

            // ==========================================
            // 3. ABOUT US ACTIONS
            // ==========================================
            if ($action === 'save_about_us' || $action === 'about') {
                $tagline = trim($this->input->post('about_tagline', TRUE));
                $title = trim($this->input->post('about_title', TRUE));
                $desc = trim($this->input->post('about_desc', TRUE));
                $exp = trim($this->input->post('about_experience', TRUE));
                $author = trim($this->input->post('about_author_name', TRUE));
                $role = trim($this->input->post('about_author_role', TRUE));

                set_tpl_setting($active_template, $curr_layout, 'about', 'about_tagline', $tagline);
                set_tpl_setting($active_template, $curr_layout, 'about', 'about_title', $title);
                set_tpl_setting($active_template, $curr_layout, 'about', 'about_desc', $desc);
                set_tpl_setting($active_template, $curr_layout, 'about', 'about_experience', $exp);
                if ($author !== '') {
                    set_tpl_setting($active_template, $curr_layout, 'about', 'about_author_name', $author);
                }
                if ($role !== '') {
                    set_tpl_setting($active_template, $curr_layout, 'about', 'about_author_role', $role);
                }

                $img1 = $handle_file_upload('about_image_1_file', 't2_about1_l' . $curr_layout);
                if ($img1) {
                    set_tpl_setting($active_template, $curr_layout, 'about', 'about_image_1', $img1);
                } elseif ($this->input->post('about_image_1_url') !== NULL && trim($this->input->post('about_image_1_url')) !== '') {
                    set_tpl_setting($active_template, $curr_layout, 'about', 'about_image_1', trim($this->input->post('about_image_1_url')));
                }

                $img2 = $handle_file_upload('about_image_2_file', 't2_about2_l' . $curr_layout);
                if ($img2) {
                    set_tpl_setting($active_template, $curr_layout, 'about', 'about_image_2', $img2);
                } elseif ($this->input->post('about_image_2_url') !== NULL && trim($this->input->post('about_image_2_url')) !== '') {
                    set_tpl_setting($active_template, $curr_layout, 'about', 'about_image_2', trim($this->input->post('about_image_2_url')));
                }

                $this->session->set_flashdata('success', 'About Us section saved successfully!');
                redirect(admin_url('configure_website?tab=about'));
                return;
            }

            // ==========================================
            // 4. TESTIMONIALS ACTIONS
            // ==========================================
            if ($action === 'save_testimonials_headers' || $action === 'testimonials_headers') {
                $tagline = trim($this->input->post('testimonials_tagline', TRUE) ?: $this->input->post('testi_tagline', TRUE));
                $title = trim($this->input->post('testimonials_title', TRUE) ?: $this->input->post('testi_title', TRUE));

                set_tpl_setting($active_template, $curr_layout, 'testimonials_header', 'tagline', $tagline);
                set_tpl_setting($active_template, $curr_layout, 'testimonials_header', 'title', $title);

                $this->session->set_flashdata('success', 'Testimonials section headers updated!');
                redirect(admin_url('configure_website?tab=testimonials'));
                return;
            }

            if ($action === 'save_testimonial') {
                $testimonial_id = (int)($this->input->post('testimonial_id') ?: $this->input->post('testi_id'));
                $client_name = trim($this->input->post('client_name', TRUE));
                $designation = trim($this->input->post('designation', TRUE));
                $rating = max(1, min(5, (int)$this->input->post('rating') ?: 5));
                $review = trim($this->input->post('review', TRUE));
                $sort_order = (int)$this->input->post('sort_order') ?: 0;
                $status = $this->input->post('status') === 'inactive' ? 'inactive' : 'active';
                $layout_scope = (int)$this->input->post('layout_number') ?: 0;

                $avatar = trim($this->input->post('avatar_url', TRUE));
                $uploaded_avatar = $handle_file_upload('avatar_file', 't2_testi_' . time());
                if ($uploaded_avatar) {
                    $avatar = $uploaded_avatar;
                }
                if (empty($avatar)) {
                    $avatar = 'assets/template2/images/testimonial/testimonial-v1-img1.jpg';
                }

                $testimonial_data = array(
                    'template_key' => $active_template,
                    'layout_number' => $layout_scope,
                    'client_name' => $client_name,
                    'designation' => $designation,
                    'rating' => $rating,
                    'review' => $review,
                    'avatar' => $avatar,
                    'sort_order' => $sort_order,
                    'status' => $status
                );

                if ($testimonial_id > 0) {
                    $this->db->where('id', $testimonial_id)->update('template_testimonials', $testimonial_data);
                    $this->session->set_flashdata('success', 'Testimonial updated successfully!');
                } else {
                    $this->db->insert('template_testimonials', $testimonial_data);
                    $this->session->set_flashdata('success', 'Testimonial added successfully!');
                }
                redirect(admin_url('configure_website?tab=testimonials'));
                return;
            }

            if ($action === 'delete_testimonial') {
                $testimonial_id = (int)($this->input->post('testimonial_id') ?: $this->input->post('testi_id'));
                if ($testimonial_id > 0) {
                    $this->db->where('id', $testimonial_id)->delete('template_testimonials');
                    $this->session->set_flashdata('success', 'Testimonial deleted successfully.');
                }
                redirect(admin_url('configure_website?tab=testimonials'));
                return;
            }

            // ==========================================
            // 5. FAQS ACTIONS
            // ==========================================
            if ($action === 'save_faqs_headers' || $action === 'faqs_headers') {
                $tagline = trim($this->input->post('faq_tagline', TRUE));
                $title = trim($this->input->post('faq_title', TRUE));

                set_tpl_setting($active_template, $curr_layout, 'faq_header', 'tagline', $tagline);
                set_tpl_setting($active_template, $curr_layout, 'faq_header', 'title', $title);

                $this->session->set_flashdata('success', 'FAQ section headers updated!');
                redirect(admin_url('configure_website?tab=faqs'));
                return;
            }

            if ($action === 'save_faq') {
                $faq_id = (int)$this->input->post('faq_id');
                $question = trim($this->input->post('question', TRUE));
                $answer = trim($this->input->post('answer', TRUE));
                $sort_order = (int)$this->input->post('sort_order') ?: 0;
                $status = $this->input->post('status') === 'inactive' ? 'inactive' : 'active';
                $layout_scope = (int)$this->input->post('layout_number') ?: $curr_layout;

                $faq_data = array(
                    'template_key' => $active_template,
                    'layout_number' => $layout_scope,
                    'question' => $question,
                    'answer' => $answer,
                    'sort_order' => $sort_order,
                    'status' => $status
                );

                if ($faq_id > 0) {
                    $this->db->where('id', $faq_id)->update('template_faqs', $faq_data);
                    $this->session->set_flashdata('success', 'FAQ updated successfully!');
                } else {
                    $this->db->insert('template_faqs', $faq_data);
                    $this->session->set_flashdata('success', 'FAQ added successfully!');
                }
                redirect(admin_url('configure_website?tab=faqs'));
                return;
            }

            if ($action === 'delete_faq') {
                $faq_id = (int)$this->input->post('faq_id');
                if ($faq_id > 0) {
                    $this->db->where('id', $faq_id)->delete('template_faqs');
                    $this->session->set_flashdata('success', 'FAQ deleted successfully.');
                }
                redirect(admin_url('configure_website?tab=faqs'));
                return;
            }
        }

        // ==========================================
        // FETCH DATA FOR DISPLAY
        // ==========================================
        $data['active_tab'] = $active_tab;
        $data['active_template'] = $active_template;
        $data['curr_layout'] = $curr_layout;
        $data['layout_name'] = 'Layout ' . $curr_layout . ' (Modern Botanical)';

        // 1. Hero Slides
        $data['hero_slides'] = $this->db->where('template_key', $active_template)
                                        ->where('layout_number', $curr_layout)
                                        ->order_by('sort_order', 'ASC')
                                        ->get('template_hero_banners')
                                        ->result();
        if (empty($data['hero_slides'])) {
            $data['hero_slides'] = $this->db->where('template_key', $active_template)
                                            ->order_by('sort_order', 'ASC')
                                            ->get('template_hero_banners')
                                            ->result();
        }

        // 2. Our Works / Featured Items
        $data['works_tagline'] = get_tpl_setting($active_template, $curr_layout, 'featured_skincare', 'tagline', 'Our Works');
        $data['works_title'] = get_tpl_setting($active_template, $curr_layout, 'featured_skincare', 'title', 'Glow Transformation Gallery');
        $data['featured_items'] = $this->db->where('template_key', $active_template)
                                           ->where('layout_number', $curr_layout)
                                           ->order_by('sort_order', 'ASC')
                                           ->get('template_featured_items')
                                           ->result();
        if (empty($data['featured_items'])) {
            $data['featured_items'] = $this->db->where('template_key', $active_template)
                                               ->order_by('sort_order', 'ASC')
                                               ->get('template_featured_items')
                                               ->result();
        }

        // 3. About Us
        $data['about_tagline'] = get_tpl_setting($active_template, $curr_layout, 'about', 'about_tagline', 'About Us');
        $data['about_title'] = get_tpl_setting($active_template, $curr_layout, 'about', 'about_title', 'Explore Our Dedication to Healthy Skin');
        $data['about_desc'] = get_tpl_setting($active_template, $curr_layout, 'about', 'about_desc', 'We are passionate about helping you achieve healthy, glowing skin through gentle and effective care. Our journey began with a simple belief that true beauty starts with skin wellness.');
        $data['about_experience'] = get_tpl_setting($active_template, $curr_layout, 'about', 'about_experience', '27');
        $data['about_author_name'] = get_tpl_setting($active_template, $curr_layout, 'about', 'about_author_name', 'Emma Watson');
        $data['about_author_role'] = get_tpl_setting($active_template, $curr_layout, 'about', 'about_author_role', 'Founder CEO');
        $data['about_image_1'] = get_tpl_setting($active_template, $curr_layout, 'about', 'about_image_1', 'assets/template2/images/resources/about-one-img-1.jpg');
        $data['about_image_2'] = get_tpl_setting($active_template, $curr_layout, 'about', 'about_image_2', 'assets/template2/images/resources/about-one-img-2.jpg');

        // 4. Testimonials
        $data['testi_tagline'] = get_tpl_setting($active_template, $curr_layout, 'testimonials_header', 'tagline', 'Clients Feedback');
        $data['testi_title'] = get_tpl_setting($active_template, $curr_layout, 'testimonials_header', 'title', 'What Our Clients Say About Results');
        $data['testimonials_list'] = $this->db->where('template_key', $active_template)
                                              ->order_by('sort_order', 'ASC')
                                              ->get('template_testimonials')
                                              ->result();

        // 5. FAQs
        $data['faq_tagline'] = get_tpl_setting($active_template, $curr_layout, 'faq_header', 'tagline', 'Frequently Asked Questions');
        $data['faq_title'] = get_tpl_setting($active_template, $curr_layout, 'faq_header', 'title', 'Clear Answers About Your Treatment');
        $data['faqs_list'] = $this->db->where('template_key', $active_template)
                                      ->where('layout_number', $curr_layout)
                                      ->order_by('sort_order', 'ASC')
                                      ->get('template_faqs')
                                      ->result();
        if (empty($data['faqs_list'])) {
            $data['faqs_list'] = $this->db->where('template_key', $active_template)
                                          ->order_by('sort_order', 'ASC')
                                          ->get('template_faqs')
                                          ->result();
        }

        $this->render('configure_website/index', $data, 'Configure Website');
    }
}
