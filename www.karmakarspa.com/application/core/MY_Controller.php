<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_Controller extends CI_Controller {

    public $template;
    public $home_layout;

    public function __construct() {
        parent::__construct();

        // Pre-warm settings cache so query builder is never interrupted
        get_settings_cache();

        // Template detection (Database setting with optional GET override for live admin preview)
        $preview_tpl = $this->input->get('preview_tpl', TRUE);
        if ($preview_tpl && in_array($preview_tpl, array('template1', 'template2')) && is_dir(APPPATH . 'views/' . $preview_tpl)) {
            $this->template = $preview_tpl;
        } else {
            $this->template = get_active_template();
        }

        // Layout variant detection (User's chosen layout)
        $this->home_layout = get_active_home_layout();
        $preview_layout = (int)$this->input->get('preview_layout');
        if ($preview_layout && file_exists(APPPATH . 'views/' . $this->template . '/home' . $preview_layout . '.php')) {
            $this->home_layout = $preview_layout;
        }
    }

    /**
     * Render a website page wrapped inside the active template layout
     */
    protected function render($view, $data = array(), $page_title = '') {
        $data['active_template'] = $this->template;
        $data['active_home_layout'] = $this->home_layout;
        $data['page_title'] = $page_title ? $page_title : get_setting('business_name', 'Luxe Salon & Spa');
        $data['business_name'] = get_setting('business_name', 'Luxe Salon & Serenity Spa');
        $data['business_tagline'] = get_setting('business_tagline', 'Premium Beauty Care & Rejuvenating Spa Treatments');
        $data['business_phone'] = get_setting('business_phone', '+1 (555) 345-6789');
        $data['business_email'] = get_setting('business_email', 'contact@luxesalonspa.com');
        $data['business_address'] = get_setting('business_address', '742 Evergreen Terrace, Suite 100, New York, NY');
        $data['currency_symbol'] = get_setting('currency_symbol', '$');
        $data['business_type'] = get_business_type();
        $data['is_salon'] = is_salon_enabled();
        $data['is_spa'] = is_spa_enabled();
        $data['facebook_url'] = get_setting('facebook_url', '#');
        $data['instagram_url'] = get_setting('instagram_url', '#');
        $data['twitter_url'] = get_setting('twitter_url', '#');
        $data['youtube_url'] = get_setting('youtube_url', '#');
        $data['footer_about'] = get_setting('footer_about', 'Experience world-class hair styling, beauty therapies, and restorative holistic spa treatments.');

        $data['asset_url'] = base_url('assets/' . $this->template . '/');
        $data['site_logo_url'] = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
        $data['site_fav_url'] = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');
        $data['active_view'] = $view;
        $data['is_home'] = in_array($view, array('home1', 'home2', 'home3', 'home', 'index'));

        // Render the view content
        $target_view = $this->template . '/' . $view;
        $data['content'] = $this->load->view($target_view, $data, TRUE);

        // Render inside common layout (common header + page content + common footer)
        $this->load->view($this->template . '/layout', $data);
    }

    /**
     * Send JSON Response
     */
    protected function json($data, $status_code = 200) {
        $this->output
             ->set_status_header($status_code)
             ->set_content_type('application/json', 'utf-8')
             ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
             ->_display();
        exit;
    }
}
