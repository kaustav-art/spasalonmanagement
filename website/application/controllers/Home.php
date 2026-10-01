<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Website_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Homepage with Multi-Layout Support (1, 2, or 3)
     */
    public function index() {
        $is_spa = is_spa_enabled();
        $is_salon = is_salon_enabled();

        // Fetch active banners
        $data['banners'] = $this->db->where('status', 'active')->order_by('sort_order', 'ASC')->get('website_banners')->result();

        // Fetch services based on business edition
        $this->db->select('s.*, s.duration as duration_minutes, c.name as category_name, c.type as category_type')
                 ->from('services s')
                 ->join('service_categories c', 'c.id = s.category_id', 'left')
                 ->where('s.status', 'active');

        if (!$is_spa) {
            $this->db->where('s.type !=', 'spa');
        } elseif (!$is_salon) {
            $this->db->where('s.type !=', 'salon');
        }

        $data['services'] = $this->db->order_by('s.id', 'ASC')->limit(8)->get()->result();

        // Service Categories
        $this->db->where('status', 'active');
        if (!is_spa_enabled()) {
            $this->db->where('type !=', 'spa');
        } elseif (!is_salon_enabled()) {
            $this->db->where('type !=', 'salon');
        }
        $data['categories'] = $this->db->order_by('name', 'ASC')->get('service_categories')->result();

        // Packages
        $data['packages'] = $this->db->where('status', 'active')->limit(4)->get('packages')->result();

        // Specialists / Staff
        $this->db->where('status', 'active');
        if (!is_spa_enabled()) {
            $this->db->where('role_type !=', 'therapist');
        } elseif (!is_salon_enabled()) {
            $this->db->where_in('role_type', array('therapist', 'beautician'));
        }
        $data['staff'] = $this->db->order_by('rating', 'DESC')->limit(4)->get('staff')->result();

        // Testimonials
        $data['testimonials'] = $this->db->where('status', 'active')->limit(6)->get('testimonials')->result();

        // Gallery
        $this->db->where('status', 'active');
        if (!is_spa_enabled()) {
            $this->db->where('category !=', 'spa');
        } elseif (!is_salon_enabled()) {
            $this->db->where('category !=', 'salon');
        }
        $data['gallery'] = $this->db->order_by('sort_order', 'ASC')->limit(6)->get('gallery')->result();

        // Offers
        $data['offers'] = $this->db->where('status', 'active')
                                   ->where('(valid_until IS NULL OR valid_until >= CURDATE())', NULL, FALSE)
                                   ->get('offers')->result();

        // Template 2 dynamic showcase content
        if ($this->template === 'template2') {
            $data['tpl_hero_banners'] = $this->db->where('template_key', 'template2')
                                                 ->where('layout_number', $this->home_layout)
                                                 ->where('status', 'active')
                                                 ->order_by('sort_order', 'ASC')
                                                 ->get('template_hero_banners')
                                                 ->result();
            if (empty($data['tpl_hero_banners'])) {
                $data['tpl_hero_banners'] = $this->db->where('template_key', 'template2')
                                                     ->where('layout_number', 1)
                                                     ->where('status', 'active')
                                                     ->order_by('sort_order', 'ASC')
                                                     ->get('template_hero_banners')
                                                     ->result();
            }

            $data['tpl_featured_items'] = $this->db->where('template_key', 'template2')
                                                    ->where('status', 'active')
                                                    ->order_by('sort_order', 'ASC')
                                                    ->get('template_featured_items')
                                                    ->result();

            $data['tpl_services'] = $this->db->where('template_key', 'template2')
                                             ->where('status', 'active')
                                             ->order_by('sort_order', 'ASC')
                                             ->get('template_services')
                                             ->result();

            $data['tpl_testimonials'] = $this->db->where('template_key', 'template2')
                                                  ->where('status', 'active')
                                                  ->order_by('sort_order', 'ASC')
                                                  ->get('template_testimonials')
                                                  ->result();

            $data['tpl_faqs'] = $this->db->where('template_key', 'template2')
                                         ->where('status', 'active')
                                         ->order_by('sort_order', 'ASC')
                                         ->get('template_faqs')
                                         ->result();

            $data['tpl_blogs'] = $this->db->where('template_key', 'template2')
                                          ->where('status', 'active')
                                          ->order_by('sort_order', 'ASC')
                                          ->get('template_blogs')
                                          ->result();
        }

        // Render layout 1, 2, or 3
        $layout_view = 'home' . $this->home_layout;
        $this->render($layout_view, $data, 'Home');
    }

    /**
     * About Us Page
     */
    public function about() {
        $data['staff_count'] = $this->db->where('status', 'active')->count_all_results('staff');
        $data['services_count'] = $this->db->where('status', 'active')->count_all_results('services');
        $data['customers_count'] = $this->db->count_all_results('customers') + 250;
        $data['testimonials'] = $this->db->where('status', 'active')->limit(4)->get('testimonials')->result();

        $this->render('about', $data, 'About Us');
    }

    /**
     * Services Menu
     */
    public function services() {
        $this->db->select('s.*, s.duration as duration_minutes, c.name as category_name, c.type as category_type')
                 ->from('services s')
                 ->join('service_categories c', 'c.id = s.category_id', 'left')
                 ->where('s.status', 'active');

        if (!is_spa_enabled()) {
            $this->db->where('s.type !=', 'spa');
        } elseif (!is_salon_enabled()) {
            $this->db->where('s.type !=', 'salon');
        }

        $data['services'] = $this->db->order_by('c.name', 'ASC')->order_by('s.price', 'ASC')->get()->result();

        $this->db->where('status', 'active');
        if (!is_spa_enabled()) {
            $this->db->where('type !=', 'spa');
        } elseif (!is_salon_enabled()) {
            $this->db->where('type !=', 'salon');
        }
        $data['categories'] = $this->db->order_by('name', 'ASC')->get('service_categories')->result();

        $this->render('services', $data, 'Our Services & Rituals');
    }

    /**
     * Packages & Treatments
     */
    public function packages() {
        $data['packages'] = $this->db->where('status', 'active')->get('packages')->result();
        $this->render('packages', $data, 'Treatment Packages & Memberships');
    }

    /**
     * Our Team & Specialists
     */
    public function team() {
        $this->db->where('status', 'active');
        if (!is_spa_enabled()) {
            $this->db->where('role_type !=', 'therapist');
        } elseif (!is_salon_enabled()) {
            $this->db->where_in('role_type', array('therapist', 'beautician'));
        }
        $data['team'] = $this->db->order_by('rating', 'DESC')->get('staff')->result();

        $this->render('team', $data, 'Our Master Stylists & Therapists');
    }

    /**
     * Gallery / Portfolio
     */
    public function gallery() {
        $this->db->where('status', 'active');
        if (!is_spa_enabled()) {
            $this->db->where('category !=', 'spa');
        } elseif (!is_salon_enabled()) {
            $this->db->where('category !=', 'salon');
        }
        $data['gallery'] = $this->db->order_by('sort_order', 'ASC')->get('gallery')->result();

        $this->render('gallery', $data, 'Photo Gallery & Transformations');
    }

    /**
     * Testimonials
     */
    public function testimonials() {
        $data['testimonials'] = $this->db->where('status', 'active')->get('testimonials')->result();
        $this->render('testimonials', $data, 'Client Reviews & Stories');
    }

    /**
     * Contact Us Page & Inquiries
     */
    public function contact() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);
            $email = $this->input->post('email', TRUE);
            $phone = $this->input->post('phone', TRUE);
            $subject = $this->input->post('subject', TRUE);
            $message = $this->input->post('message', TRUE);

            if (!empty($name) && !empty($email) && !empty($message)) {
                $this->db->insert('contact_messages', array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'subject' => $subject ? $subject : 'Website Contact Form',
                    'message' => $message,
                    'status' => 'unread'
                ));

                $this->session->set_flashdata('success', 'Thank you! Your inquiry has been sent to our front desk. We will get back to you promptly.');
            }
            redirect(website_url('contact'));
            return;
        }

        $this->render('contact', array(), 'Contact Us & Location');
    }

    /**
     * Service Detail Page (Modeled after template2/cleansing-facial.html, without search)
     */
    public function service_detail($slug_or_id = '') {
        if (!$slug_or_id) {
            $slug_or_id = $this->input->get('slug', TRUE) ?: $this->input->get('id', TRUE);
        }

        $service = null;
        if (is_numeric($slug_or_id)) {
            $service = $this->db->where('id', (int)$slug_or_id)->get('template_services')->row();
        } elseif (!empty($slug_or_id)) {
            $service = $this->db->where('slug', $slug_or_id)->get('template_services')->row();
        }

        // Fallback to first active service if not found
        if (!$service) {
            $service = $this->db->where('template_key', 'template2')
                                ->where('status', 'active')
                                ->order_by('sort_order', 'ASC')
                                ->limit(1)
                                ->get('template_services')
                                ->row();
        }

        $data['service'] = $service;
        $data['all_services'] = $this->db->where('template_key', 'template2')
                                         ->where('status', 'active')
                                         ->order_by('sort_order', 'ASC')
                                         ->get('template_services')
                                         ->result();

        $data['faqs'] = $this->db->where('template_key', 'template2')
                                 ->where('status', 'active')
                                 ->order_by('sort_order', 'ASC')
                                 ->get('template_faqs')
                                 ->result();

        $page_title = $service ? $service->title : 'Service Detail';
        $data['page_title'] = $page_title;
        $data['asset_url'] = base_url('assets/' . $this->template . '/');
        $data['active_template'] = $this->template;
        $data['active_home_layout'] = $this->home_layout;

        if ($this->template === 'template2') {
            $this->load->view('template2/service_detail', $data);
        } else {
            $this->render('service_detail', $data, $page_title);
        }
    }

    /**
     * Blog Detail Page (Modeled after template2/blog-details.html, without search)
     */
    public function blog_detail($slug_or_id = '') {
        if (!$slug_or_id) {
            $slug_or_id = $this->input->get('slug', TRUE) ?: $this->input->get('id', TRUE);
        }

        $blog = null;
        if (is_numeric($slug_or_id)) {
            $blog = $this->db->where('id', (int)$slug_or_id)->get('template_blogs')->row();
        } elseif (!empty($slug_or_id)) {
            $blog = $this->db->where('slug', $slug_or_id)->get('template_blogs')->row();
        }

        // Fallback to first active blog if not found
        if (!$blog) {
            $blog = $this->db->where('template_key', 'template2')
                             ->where('status', 'active')
                             ->order_by('sort_order', 'ASC')
                             ->limit(1)
                             ->get('template_blogs')
                             ->row();
        }

        $data['blog'] = $blog;
        $data['recent_blogs'] = $this->db->where('template_key', 'template2')
                                         ->where('status', 'active')
                                         ->order_by('published_date', 'DESC')
                                         ->limit(5)
                                         ->get('template_blogs')
                                         ->result();

        $data['categories'] = array(
            'Skincare Essentials',
            'Natural Skincare',
            'Sensitive Skin Care',
            'Acne & Blemish Care',
            'Hydration & Moisturizing'
        );

        $page_title = $blog ? $blog->title : 'Blog Detail';
        $data['page_title'] = $page_title;
        $data['asset_url'] = base_url('assets/' . $this->template . '/');
        $data['active_template'] = $this->template;
        $data['active_home_layout'] = $this->home_layout;

        if ($this->template === 'template2') {
            $this->load->view('template2/blog_detail', $data);
        } else {
            $this->render('blog_detail', $data, $page_title);
        }
    }
}
