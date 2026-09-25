<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]
class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'html', 'form']);
    }

    /**
     * Render main admin dashboard pages wrapped with layout
     *
     * @param string $view
     * @param array $data
     */
    protected function render($view, $data = []) {
        if (!isset($data['page_title'])) {
            $data['page_title'] = 'Conca - Bootstrap Admin Template';
        }
        if (!isset($data['active_menu'])) {
            $data['active_menu'] = '';
        }
        if (!isset($data['active_submenu'])) {
            $data['active_submenu'] = '';
        }
        if (!isset($data['extra_css'])) {
            $data['extra_css'] = [];
        }
        if (!isset($data['extra_js'])) {
            $data['extra_js'] = [];
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/navbar', $data);
        $this->load->view($view, $data);
        $this->load->view('layouts/footer', $data);
    }

    /**
     * Render standalone/auth pages
     *
     * @param string $view
     * @param array $data
     */
    protected function render_auth($view, $data = []) {
        if (!isset($data['page_title'])) {
            $data['page_title'] = 'Conca - Bootstrap Admin Template';
        }
        if (!isset($data['extra_css'])) {
            $data['extra_css'] = [];
        }
        if (!isset($data['extra_js'])) {
            $data['extra_js'] = [];
        }

        $this->load->view('layouts/auth_header', $data);
        $this->load->view($view, $data);
        $this->load->view('layouts/auth_footer', $data);
    }
}
