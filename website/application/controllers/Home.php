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
}
