<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Superadmin_Controller {

    public function index() {
        $filter_plan = $this->input->get('plan', TRUE);
        $filter_status = $this->input->get('status', TRUE);
        $search = $this->input->get('search', TRUE);

        // Build query
        $this->db->select('o.*, p.name as plan_title');
        $this->db->from('marketplace_orders o');
        $this->db->join('marketplace_plans p', 'p.id = o.plan_id', 'left');

        if (!empty($filter_plan)) {
            $this->db->where('o.plan_code', $filter_plan);
        }
        if (!empty($filter_status)) {
            $this->db->where('o.payment_status', $filter_status);
        }
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('o.order_number', $search);
            $this->db->or_like('o.customer_name', $search);
            $this->db->or_like('o.customer_email', $search);
            $this->db->or_like('o.business_name', $search);
            $this->db->or_like('o.license_key', $search);
            $this->db->group_end();
        }

        $this->db->order_by('o.id', 'DESC');
        $data['orders'] = $this->db->get()->result();

        // Metadata
        $data['plans'] = $this->db->get('marketplace_plans')->result();
        $data['filter_plan'] = $filter_plan;
        $data['filter_status'] = $filter_status;
        $data['search'] = $search;

        // Totals
        $data['total_revenue'] = (float)$this->db->select_sum('amount')->where('payment_status', 'paid')->get('marketplace_orders')->row()->amount;
        $data['total_orders_count'] = $this->db->count_all('marketplace_orders');

        $this->render('orders/index', $data, 'Customer Orders & Script Purchases');
    }

    /**
     * Create manual order / Record offline purchase
     */
    public function create() {
        if ($this->input->method() === 'post') {
            $customer_name = $this->input->post('customer_name', TRUE);
            $customer_email = $this->input->post('customer_email', TRUE);
            $customer_phone = $this->input->post('customer_phone', TRUE);
            $business_name = $this->input->post('business_name', TRUE);
            $plan_code = $this->input->post('plan_code', TRUE);
            $template = $this->input->post('template', TRUE);
            $layout = (int)$this->input->post('layout');
            $amount = (float)$this->input->post('amount');
            $payment_method = $this->input->post('payment_method', TRUE);

            // Fetch plan
            $plan = $this->db->where('plan_code', $plan_code)->get('marketplace_plans')->row();
            $plan_id = $plan ? $plan->id : 3;

            $order_number = 'ORD-' . date('Y') . '-' . rand(1000, 9999);
            $license_key = 'LIC-' . $plan_code . '-' . strtoupper(substr(uniqid(), -4)) . '-' . date('Y') . '-X' . rand(100, 999);
            $download_token = 'dl_token_' . rand(1000, 9999) . '_' . bin2hex(random_bytes(8));

            // Insert Order
            $this->db->insert('marketplace_orders', array(
                'order_number' => $order_number,
                'customer_name' => $customer_name,
                'customer_email' => $customer_email,
                'customer_phone' => $customer_phone,
                'business_name' => $business_name,
                'plan_id' => $plan_id,
                'plan_code' => $plan_code,
                'chosen_template' => in_array($template, array('template1', 'template2')) ? $template : 'template1',
                'chosen_layout' => in_array($layout, array(1, 2, 3)) ? $layout : 1,
                'amount' => $amount,
                'payment_method' => $payment_method ? $payment_method : 'manual_transfer',
                'payment_status' => 'paid',
                'license_key' => $license_key,
                'download_token' => $download_token,
                'download_count' => 0
            ));

            $order_id = $this->db->insert_id();

            // Insert License
            $this->db->insert('marketplace_licenses', array(
                'license_key' => $license_key,
                'order_id' => $order_id,
                'customer_email' => $customer_email,
                'plan_code' => $plan_code,
                'template' => $template,
                'layout' => $layout,
                'status' => 'active'
            ));

            $this->session->set_flashdata('success', 'Manual commercial order #' . $order_number . ' created and license issued.');
            redirect(superadmin_url('orders'));
            return;
        }

        redirect(superadmin_url('orders'));
    }

    /**
     * Update order status / Reset downloads
     */
    public function update_status() {
        if ($this->input->method() === 'post') {
            $order_id = (int)$this->input->post('order_id');
            $action = $this->input->post('action', TRUE);

            if ($action === 'change_payment_status') {
                $status = $this->input->post('payment_status', TRUE);
                if (in_array($status, array('paid', 'pending', 'failed'))) {
                    $this->db->where('id', $order_id)->update('marketplace_orders', array('payment_status' => $status));
                    $this->session->set_flashdata('success', 'Order payment status updated to ' . strtoupper($status));
                }
            } elseif ($action === 'reset_downloads') {
                $this->db->where('id', $order_id)->update('marketplace_orders', array('download_count' => 0));
                $this->session->set_flashdata('success', 'Customer download counter reset to 0.');
            }

            redirect(superadmin_url('orders'));
            return;
        }

        redirect(superadmin_url('orders'));
    }

    /**
     * Export Orders to CSV
     */
    public function export() {
        $orders = $this->db->order_by('id', 'DESC')->get('marketplace_orders')->result_array();

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=marketplace_orders_' . date('Y-m-d') . '.csv');

        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Order Number', 'Customer Name', 'Customer Email', 'Phone', 'Business Name', 'Plan', 'Amount', 'Payment Method', 'Payment Status', 'License Key', 'Downloads', 'Created At'));

        foreach ($orders as $row) {
            fputcsv($output, array(
                $row['id'],
                $row['order_number'],
                $row['customer_name'],
                $row['customer_email'],
                $row['customer_phone'],
                $row['business_name'],
                $row['plan_code'],
                $row['amount'],
                $row['payment_method'],
                $row['payment_status'],
                $row['license_key'],
                $row['download_count'],
                $row['created_at']
            ));
        }

        fclose($output);
        exit;
    }
}
