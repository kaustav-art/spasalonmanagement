<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Controller - Base Admin Controller
 */
class Admin_Controller extends CI_Controller {

    protected $current_user = null;
    protected $business_settings = array();
    protected $business_type = 'SALON_SPA';

    public function __construct() {
        parent::__construct();

        // Check if database is configured and tables exist
        if (!$this->db->table_exists('business_settings')) {
            redirect(admin_url('install'));
            exit;
        }

        // Cache business type
        $this->business_type = get_business_type();

        // Check Authentication (except for login/logout/forgot password and install)
        $controller = strtolower($this->router->fetch_class());
        $method = strtolower($this->router->fetch_method());

        $exempt_controllers = array('auth', 'install');
        if (!in_array($controller, $exempt_controllers)) {
            $user_id = $this->session->userdata('user_id');
            if (!$user_id) {
                redirect(admin_url('auth/login'));
                exit;
            }

            // Load user data
            $user = $this->db->select('u.*, r.role_name')
                             ->from('users u')
                             ->join('roles r', 'r.id = u.role_id', 'left')
                             ->where('u.id', $user_id)
                             ->where('u.status', 'active')
                             ->get()->row();

            if (!$user) {
                $this->session->sess_destroy();
                redirect(admin_url('auth/login'));
                exit;
            }

            $this->current_user = $user;
        }
    }

    /**
     * Render page wrapped in the admin layout
     */
    protected function render($view, $data = array(), $page_title = '') {
        $data['page_title'] = $page_title ? $page_title : get_setting('business_name', 'Salon & Spa Management');
        $data['current_user'] = $this->current_user;
        $data['business_type'] = $this->business_type;
        $data['active_controller'] = strtolower($this->router->fetch_class());
        $data['active_method'] = strtolower($this->router->fetch_method());

        // Notifications count (pending online bookings, low stock products)
        $data['pending_appointments_count'] = $this->db->where('status', 'pending')->count_all_results('appointments');
        $data['unread_messages_count'] = $this->db->where('status', 'unread')->count_all_results('contact_messages');
        
        $data['extra_css'] = isset($data['extra_css']) ? $data['extra_css'] : array();
        $data['extra_js'] = isset($data['extra_js']) ? $data['extra_js'] : array();
        
        $data['content_view'] = $view;
        $data['data'] = $data;

        $this->load->view('layouts/main', $data);
    }

    /**
     * Send JSON Response
     */
    protected function json_response($data, $status_code = 200) {
        $this->output
            ->set_status_header($status_code)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }
}
