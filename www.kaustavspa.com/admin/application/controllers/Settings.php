<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * General Business Settings
     */
    public function index() {
        if ($this->input->method() === 'post') {
            $settings = array(
                'business_name', 'business_tagline', 'business_email', 'business_phone',
                'business_address', 'currency_symbol', 'currency_code', 'tax_name', 'tax_rate',
                'business_open_time', 'business_close_time', 'booking_time_step',
                'advance_booking_days', 'auto_confirm_booking', 'facebook_url', 'instagram_url',
                'twitter_url', 'youtube_url', 'footer_about'
            );

            foreach ($settings as $key) {
                if ($this->input->post($key) !== NULL) {
                    set_setting($key, $this->input->post($key, TRUE));
                }
            }

            $this->session->set_flashdata('success', 'Business settings updated successfully.');
            redirect(admin_url('settings'));
            return;
        }

        $this->render('settings/index', array(), 'General Business Settings');
    }

    /**
     * Business Type / Edition Management (SALON, SPA, SALON_SPA)
     */
    public function business_type() {
        if ($this->input->method() === 'post') {
            $type = strtoupper($this->input->post('business_type', TRUE));
            if (in_array($type, array('SALON', 'SPA', 'SALON_SPA'))) {
                set_setting('business_type', $type);
                $this->session->set_flashdata('success', 'License Edition successfully switched to ' . $type . '. Module visibility updated.');
            }
            redirect(admin_url('settings/business_type'));
            return;
        }

        $data['current_type'] = get_business_type();
        $this->render('settings/business_type', $data, 'Business Edition & Module Configuration');
    }

    /**
     * System Information
     */
    public function system() {
        $data['php_version'] = PHP_VERSION;
        $data['db_version'] = $this->db->version();
        $data['server_software'] = isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : 'Apache';
        $data['upload_max'] = ini_get('upload_max_filesize');
        $data['post_max'] = ini_get('post_max_size');
        $data['memory_limit'] = ini_get('memory_limit');

        $this->render('settings/system', $data, 'System Status & Environment');
    }
}
