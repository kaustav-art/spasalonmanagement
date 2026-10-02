<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Multi-Template Manager: Switch Template & Homepage Layout
     */
    public function templates() {
        if ($this->input->method() === 'post') {
            $active_template = $this->input->post('active_template', TRUE);
            $active_home_layout = $this->input->post('active_home_layout', TRUE);

            if (in_array($active_template, array('template1', 'template2'))) {
                set_setting('active_template', $active_template, 'website');
            }
            if (in_array($active_home_layout, array('1', '2', '3'))) {
                set_setting('active_home_layout', $active_home_layout, 'website');
            }

            $this->session->set_flashdata('success', 'Website template configuration updated successfully! Active: ' . ucfirst($active_template) . ' (Home ' . $active_home_layout . ')');
            redirect(admin_url('website/templates'));
            return;
        }

        $data['current_template'] = get_active_template();
        $data['current_layout'] = get_active_home_layout();

        $this->render('website/templates', $data, 'Multi-Template Settings');
    }

    /**
     * Banners & Sliders Management
     */
    public function banners() {
        if ($this->input->method() === 'post') {
            $title = $this->input->post('title', TRUE);
            $subtitle = $this->input->post('subtitle', TRUE);
            $button_text = $this->input->post('button_text', TRUE);
            $button_url = $this->input->post('button_url', TRUE);
            $sort_order = (int)$this->input->post('sort_order', TRUE);

            $this->db->insert('website_banners', array(
                'title' => $title,
                'subtitle' => $subtitle,
                'button_text' => $button_text,
                'button_url' => $button_url,
                'image' => 'banner-01.jpg',
                'sort_order' => $sort_order ? $sort_order : 1,
                'status' => 'active'
            ));

            $this->session->set_flashdata('success', 'Banner created successfully!');
            redirect(admin_url('website/banners'));
            return;
        }

        $data['banners'] = $this->db->order_by('sort_order', 'ASC')->get('website_banners')->result();
        $this->render('website/banners', $data, 'Homepage Banners & Sliders');
    }

    public function delete_banner($id) {
        $this->db->where('id', (int)$id)->delete('website_banners');
        $this->session->set_flashdata('success', 'Banner deleted successfully.');
        redirect(admin_url('website/banners'));
    }

    /**
     * Pages Content Editor (About, Contact, etc.)
     */
    public function pages() {
        if ($this->input->method() === 'post') {
            $page_key = $this->input->post('page_key', TRUE);
            $title = $this->input->post('title', TRUE);
            $subtitle = $this->input->post('subtitle', TRUE);
            $content = $this->input->post('content');
            $meta_title = $this->input->post('meta_title', TRUE);
            $meta_description = $this->input->post('meta_description', TRUE);

            $this->db->where('page_key', $page_key)->update('website_pages', array(
                'title' => $title,
                'subtitle' => $subtitle,
                'content' => $content,
                'meta_title' => $meta_title,
                'meta_description' => $meta_description
            ));

            $this->session->set_flashdata('success', 'Page content saved successfully.');
            redirect(admin_url('website/pages?key=' . $page_key));
            return;
        }

        $active_key = $this->input->get('key') ? $this->input->get('key') : 'about';
        $data['pages'] = $this->db->get('website_pages')->result();
        $data['current_page'] = $this->db->where('page_key', $active_key)->get('website_pages')->row();
        
        $this->render('website/pages', $data, 'Website Pages & Content');
    }

    /**
     * Gallery Showcase
     */
    public function gallery() {
        if ($this->input->method() === 'post') {
            $title = $this->input->post('title', TRUE);
            $category = $this->input->post('category', TRUE);

            $this->db->insert('gallery', array(
                'title' => $title,
                'category' => $category,
                'image' => 'gallery-01.jpg',
                'status' => 'active'
            ));

            $this->session->set_flashdata('success', 'Gallery item added successfully!');
            redirect(admin_url('website/gallery'));
            return;
        }

        $data['gallery'] = $this->db->get('gallery')->result();
        $this->render('website/gallery', $data, 'Website Gallery');
    }

    public function delete_gallery($id) {
        $this->db->where('id', (int)$id)->delete('gallery');
        $this->session->set_flashdata('success', 'Gallery item deleted.');
        redirect(admin_url('website/gallery'));
    }

    /**
     * Testimonials
     */
    public function testimonials() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('client_name', TRUE);
            $role = $this->input->post('client_role', TRUE);
            $rating = (int)$this->input->post('rating');
            $review = $this->input->post('review', TRUE);

            $this->db->insert('testimonials', array(
                'client_name' => $name,
                'client_role' => $role,
                'rating' => $rating ? $rating : 5,
                'review' => $review,
                'client_avatar' => 'testi-01.jpg',
                'status' => 'active'
            ));

            $this->session->set_flashdata('success', 'Testimonial added successfully!');
            redirect(admin_url('website/testimonials'));
            return;
        }

        $data['testimonials'] = $this->db->get('testimonials')->result();
        $this->render('website/testimonials', $data, 'Client Testimonials');
    }

    public function delete_testimonial($id) {
        $this->db->where('id', (int)$id)->delete('testimonials');
        $this->session->set_flashdata('success', 'Testimonial removed.');
        redirect(admin_url('website/testimonials'));
    }

    /**
     * Special Offers & Deals
     */
    public function offers() {
        if ($this->input->method() === 'post') {
            $title = $this->input->post('title', TRUE);
            $discount_text = $this->input->post('discount_text', TRUE);
            $coupon_code = $this->input->post('coupon_code', TRUE);
            $valid_until = $this->input->post('valid_until', TRUE);
            $description = $this->input->post('description', TRUE);

            $this->db->insert('offers', array(
                'title' => $title,
                'discount_text' => $discount_text,
                'coupon_code' => $coupon_code,
                'valid_until' => $valid_until,
                'description' => $description,
                'status' => 'active'
            ));

            $this->session->set_flashdata('success', 'Special offer published successfully!');
            redirect(admin_url('website/offers'));
            return;
        }

        $data['offers'] = $this->db->get('offers')->result();
        $this->render('website/offers', $data, 'Special Offers & Promotions');
    }

    /**
     * Contact Form Submissions
     */
    public function messages() {
        $data['messages'] = $this->db->order_by('id', 'DESC')->get('contact_messages')->result();
        $this->render('website/messages', $data, 'Contact Inquiries');
    }

    public function mark_message_read($id) {
        $this->db->where('id', (int)$id)->update('contact_messages', array('status' => 'read'));
        redirect(admin_url('website/messages'));
    }
}
