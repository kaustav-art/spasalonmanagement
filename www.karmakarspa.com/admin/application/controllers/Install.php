<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'file', 'app'));
    }

    public function index() {
        $lock_file = FCPATH . '../install.lock';
        $is_installed = file_exists($lock_file) || file_exists(FCPATH . 'install.lock');

        if ($is_installed && $this->input->get('force') !== '1') {
            $data['is_installed'] = true;
            $this->load->view('install/index', $data);
            return;
        }

        // Handle install submission
        if ($this->input->method() === 'post') {
            $business_name = $this->input->post('business_name', TRUE);
            $business_type = $this->input->post('business_type', TRUE);
            $active_template = $this->input->post('active_template', TRUE);
            $active_home_layout = $this->input->post('active_home_layout', TRUE);
            $admin_name = $this->input->post('admin_name', TRUE);
            $admin_email = $this->input->post('admin_email', TRUE);
            $admin_password = $this->input->post('admin_password', TRUE);

            // Update business settings
            if (isset($this->db) && $this->db->table_exists('business_settings')) {
                set_setting('business_name', $business_name ? $business_name : 'Luxe Salon & Spa');
                set_setting('business_type', in_array($business_type, array('SALON', 'SPA', 'SALON_SPA')) ? $business_type : 'SALON_SPA');
                set_setting('active_template', in_array($active_template, array('template1', 'template2')) ? $active_template : 'template1');
                set_setting('active_home_layout', in_array($active_home_layout, array('1', '2', '3')) ? $active_home_layout : '1');

                // Update or create super admin
                if (!empty($admin_email) && !empty($admin_password)) {
                    $existing = $this->db->where('email', $admin_email)->get('users')->row();
                    $hash = password_hash($admin_password, PASSWORD_BCRYPT);
                    if ($existing) {
                        $this->db->where('id', $existing->id)->update('users', array(
                            'name' => $admin_name,
                            'password' => $hash
                        ));
                    } else {
                        $this->db->insert('users', array(
                            'role_id' => 1,
                            'name' => $admin_name,
                            'email' => $admin_email,
                            'password' => $hash,
                            'status' => 'active'
                        ));
                    }
                }
            }

            // Create install lock
            @file_put_contents(FCPATH . '../install.lock', 'Installed on ' . date('Y-m-d H:i:s'));
            @file_put_contents(FCPATH . 'install.lock', 'Installed on ' . date('Y-m-d H:i:s'));

            $data['install_complete'] = true;
            $data['admin_email'] = $admin_email;
            $this->load->view('install/index', $data);
            return;
        }

        $data['is_installed'] = false;
        $data['php_ok'] = version_compare(PHP_VERSION, '7.4.0', '>=');
        $data['mysqli_ok'] = extension_loaded('mysqli');
        $data['curl_ok'] = extension_loaded('curl');
        $data['mbstring_ok'] = extension_loaded('mbstring');

        $this->load->view('install/index', $data);
    }
}
