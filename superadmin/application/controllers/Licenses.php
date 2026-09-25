<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Licenses extends Superadmin_Controller {

    public function index() {
        $filter_status = $this->input->get('status', TRUE);
        $filter_plan = $this->input->get('plan', TRUE);
        $search = $this->input->get('search', TRUE);

        $this->db->select('l.*, o.order_number, o.amount, o.customer_name');
        $this->db->from('marketplace_licenses l');
        $this->db->join('marketplace_orders o', 'o.id = l.order_id', 'left');

        if (!empty($filter_status)) {
            $this->db->where('l.status', $filter_status);
        }
        if (!empty($filter_plan)) {
            $this->db->where('l.plan_code', $filter_plan);
        }
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('l.license_key', $search);
            $this->db->or_like('l.customer_email', $search);
            $this->db->or_like('o.order_number', $search);
            $this->db->group_end();
        }

        $this->db->order_by('l.id', 'DESC');
        $data['licenses'] = $this->db->get()->result();

        $data['filter_status'] = $filter_status;
        $data['filter_plan'] = $filter_plan;
        $data['search'] = $search;

        $data['active_count'] = $this->db->where('status', 'active')->count_all_results('marketplace_licenses');
        $data['suspended_count'] = $this->db->where('status', 'suspended')->count_all_results('marketplace_licenses');
        $data['total_count'] = $this->db->count_all('marketplace_licenses');

        $this->render('licenses/index', $data, 'License Keys & Activations');
    }

    /**
     * Generate or modify license key
     */
    public function manage() {
        if ($this->input->method() === 'post') {
            $action = $this->input->post('action', TRUE);

            if ($action === 'create_license') {
                $email = trim($this->input->post('customer_email', TRUE));
                $plan_code = $this->input->post('plan_code', TRUE);
                $template = $this->input->post('template', TRUE);
                $layout = (int)$this->input->post('layout');

                if (empty($email)) {
                    $this->session->set_flashdata('error', 'Customer email address is required.');
                    redirect(superadmin_url('licenses'));
                    return;
                }

                $new_key = 'LIC-' . $plan_code . '-' . strtoupper(substr(uniqid(), -4)) . '-' . date('Y') . '-X' . rand(100, 999);

                $this->db->insert('marketplace_licenses', array(
                    'license_key' => $new_key,
                    'order_id' => 0,
                    'customer_email' => $email,
                    'plan_code' => in_array($plan_code, array('SALON', 'SPA', 'SALON_SPA')) ? $plan_code : 'SALON_SPA',
                    'template' => in_array($template, array('template1', 'template2')) ? $template : 'template1',
                    'layout' => in_array($layout, array(1, 2, 3)) ? $layout : 1,
                    'status' => 'active'
                ));

                $this->session->set_flashdata('success', 'Generated new license: ' . $new_key);
            } elseif ($action === 'update_status') {
                $license_id = (int)$this->input->post('license_id');
                $new_status = $this->input->post('status', TRUE);

                if ($license_id > 0 && in_array($new_status, array('active', 'suspended', 'revoked'))) {
                    $this->db->where('id', $license_id)->update('marketplace_licenses', array('status' => $new_status));
                    $this->session->set_flashdata('success', 'License status updated to ' . strtoupper($new_status));
                }
            }

            redirect(superadmin_url('licenses'));
            return;
        }

        redirect(superadmin_url('licenses'));
    }

    /**
     * AJAX License Key Verification Tool
     */
    public function verify() {
        $key = trim($this->input->post('license_key', TRUE));
        if (empty($key)) {
            $this->json_response(array('valid' => false, 'message' => 'Please enter a license key to verify.'), 400);
        }

        $license = $this->db->where('license_key', $key)->get('marketplace_licenses')->row();
        if ($license) {
            $this->json_response(array(
                'valid' => true,
                'status' => $license->status,
                'plan_code' => $license->plan_code,
                'customer_email' => $license->customer_email,
                'created_at' => $license->created_at,
                'message' => 'License is verified and currently ' . strtoupper($license->status) . '.'
            ));
        } else {
            $this->json_response(array('valid' => false, 'message' => 'License key not found in database.'), 404);
        }
    }
}
