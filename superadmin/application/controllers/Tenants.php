<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenants extends Superadmin_Controller {

    public function index() {
        if ($this->input->method() === 'post') {
            $action = $this->input->post('action', TRUE);

            if ($action === 'update_tenant') {
                $business_name = $this->input->post('business_name', TRUE);
                $business_email = $this->input->post('business_email', TRUE);
                $business_phone = $this->input->post('business_phone', TRUE);
                $business_type = $this->input->post('business_type', TRUE);
                $active_template = $this->input->post('active_template', TRUE);
                $active_layout = (int)$this->input->post('active_home_layout');
                $currency_symbol = $this->input->post('currency_symbol', TRUE);

                set_setting('business_name', $business_name);
                set_setting('business_email', $business_email);
                set_setting('business_phone', $business_phone);
                set_setting('business_type', in_array($business_type, array('SALON', 'SPA', 'SALON_SPA')) ? $business_type : 'SALON_SPA');
                set_setting('active_template', in_array($active_template, array('template1', 'template2')) ? $active_template : 'template1');
                set_setting('active_home_layout', in_array($active_layout, array(1, 2, 3)) ? $active_layout : 1);
                if (!empty($currency_symbol)) {
                    set_setting('currency_symbol', $currency_symbol);
                }

                $this->session->set_flashdata('success', 'Tenant configuration and edition mode updated successfully.');
            }

            redirect(superadmin_url('tenants'));
            return;
        }

        // Multi-Tenant SaaS Instances
        $data['saas_tenants'] = $this->db->table_exists('saas_tenants') ? $this->db->order_by('id', 'DESC')->get('saas_tenants')->result() : array();
        $data['total_saas_tenants'] = count($data['saas_tenants']);

        $this->render('tenants/index', $data, 'SaaS Multi-Tenant Management');
    }

    /**
     * Quick Switch Mode API / POST
     */
    public function switch_mode() {
        if ($this->input->method() === 'post') {
            $mode = $this->input->post('mode', TRUE);
            $template = $this->input->post('template', TRUE);
            $layout = (int)$this->input->post('layout');

            if (in_array($mode, array('SALON', 'SPA', 'SALON_SPA'))) {
                set_setting('business_type', $mode);
            }
            if (in_array($template, array('template1', 'template2'))) {
                set_setting('active_template', $template);
            }
            if (in_array($layout, array(1, 2, 3))) {
                set_setting('active_home_layout', $layout);
            }

            $this->session->set_flashdata('success', 'Active tenant mode switched to ' . $mode . ' (' . $template . ', Layout ' . $layout . ')');
        }

        redirect(superadmin_url('tenants'));
    }

    /**
     * Toggle Tenant Status (Active / Suspended)
     */
    public function toggle_status($id) {
        $tenant = $this->db->where('id', (int)$id)->get('saas_tenants')->row();
        if ($tenant) {
            $new_status = ($tenant->status === 'active') ? 'suspended' : 'active';
            $this->db->where('id', (int)$id)->update('saas_tenants', array('status' => $new_status));
            $this->session->set_flashdata('success', 'Tenant ' . $tenant->domain . ' status changed to ' . ucfirst($new_status));
        }
        redirect(superadmin_url('tenants'));
    }

    /**
     * Delete SaaS Tenant Instance
     */
    public function delete_tenant($id) {
        $tenant = $this->db->where('id', (int)$id)->get('saas_tenants')->row();
        if ($tenant) {
            // Drop tenant database
            if (!empty($tenant->db_name)) {
                $this->db->query("DROP DATABASE IF EXISTS `" . $this->db->escape_str($tenant->db_name) . "`");
            }

            // Remove folder if exists
            $folder_path = FCPATH . '../' . $tenant->domain;
            if (is_dir($folder_path)) {
                $this->delete_directory_recursive($folder_path);
            }

            $this->db->where('id', (int)$id)->delete('saas_tenants');
            $this->session->set_flashdata('success', 'Tenant ' . $tenant->domain . ' deleted successfully.');
        }
        redirect(superadmin_url('tenants'));
    }

    private function delete_directory_recursive($dir) {
        if (!is_dir($dir)) return;
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            $path = $dir . DIRECTORY_SEPARATOR . $file;
            is_dir($path) ? $this->delete_directory_recursive($path) : @unlink($path);
        }
        @rmdir($dir);
    }
}
