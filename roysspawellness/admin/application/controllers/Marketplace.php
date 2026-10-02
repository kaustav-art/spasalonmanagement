<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketplace extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Redirect to dedicated Super Admin Control Panel
        redirect(base_url('../superadmin'));
        exit;
    }

    /**
     * Super Admin Marketplace Dashboard
     */
    public function index() {
        // Aggregate statistics
        $orders_stats = $this->db->select('COUNT(id) as total_orders, SUM(amount) as total_revenue')
                                 ->from('marketplace_orders')
                                 ->where('payment_status', 'paid')
                                 ->get()->row();

        $data['total_orders'] = $orders_stats && $orders_stats->total_orders ? (int)$orders_stats->total_orders : 0;
        $data['total_revenue'] = $orders_stats && $orders_stats->total_revenue ? (float)$orders_stats->total_revenue : 0.00;
        $data['active_licenses'] = $this->db->where('status', 'active')->count_all_results('marketplace_licenses');
        $data['total_downloads'] = (int)$this->db->select_sum('download_count')->get('marketplace_orders')->row()->download_count;

        // Breakdown by edition plan
        $data['plan_breakdown'] = $this->db->select('plan_code, COUNT(id) as count, SUM(amount) as revenue')
                                           ->from('marketplace_orders')
                                           ->where('payment_status', 'paid')
                                           ->group_by('plan_code')
                                           ->get()->result();

        // Recent Purchases
        $data['recent_orders'] = $this->db->order_by('id', 'DESC')->limit(10)->get('marketplace_orders')->result();
        $data['plans'] = $this->db->order_by('sort_order', 'ASC')->get('marketplace_plans')->result();

        $this->render('marketplace/index', $data, 'Super Admin - Script Marketplace');
    }

    /**
     * Manage Pricing Plans & Purchase Cards
     */
    public function plans() {
        if ($this->input->method() === 'post') {
            $plan_id = (int)$this->input->post('plan_id');
            $price = (float)$this->input->post('price');
            $original_price = (float)$this->input->post('original_price');
            $name = $this->input->post('name', TRUE);
            $tagline = $this->input->post('tagline', TRUE);
            $badge = $this->input->post('badge', TRUE);
            $description = $this->input->post('description', TRUE);
            $features_raw = $this->input->post('features', TRUE);

            // Convert newline-separated features to JSON array
            $features_array = array_filter(array_map('trim', explode("\n", $features_raw)));
            $features_json = json_encode(array_values($features_array));

            if ($plan_id > 0) {
                $this->db->where('id', $plan_id)->update('marketplace_plans', array(
                    'name' => $name,
                    'tagline' => $tagline,
                    'badge' => $badge,
                    'price' => $price,
                    'original_price' => $original_price,
                    'description' => $description,
                    'features' => $features_json
                ));
                $this->session->set_flashdata('success', 'Plan pricing and card details updated successfully.');
            }

            redirect(admin_url('marketplace/plans'));
            return;
        }

        $data['plans'] = $this->db->order_by('sort_order', 'ASC')->get('marketplace_plans')->result();
        $this->render('marketplace/plans', $data, 'Manage Pricing Plans & Purchase Cards');
    }

    /**
     * Customer Orders & Script Purchases
     */
    public function orders() {
        $filter_plan = $this->input->get('plan');
        if (!empty($filter_plan)) {
            $this->db->where('plan_code', $filter_plan);
        }

        $data['orders'] = $this->db->order_by('id', 'DESC')->get('marketplace_orders')->result();
        $data['plans'] = $this->db->get('marketplace_plans')->result();
        $data['filter_plan'] = $filter_plan;

        $this->render('marketplace/orders', $data, 'Customer Orders & Purchases');
    }

    /**
     * License Keys Management
     */
    public function licenses() {
        if ($this->input->method() === 'post') {
            $action = $this->input->post('action', TRUE);
            $license_id = (int)$this->input->post('license_id');

            if ($action === 'toggle_status') {
                $lic = $this->db->where('id', $license_id)->get('marketplace_licenses')->row();
                if ($lic) {
                    $new_status = ($lic->status === 'active') ? 'suspended' : 'active';
                    $this->db->where('id', $license_id)->update('marketplace_licenses', array('status' => $new_status));
                    $this->session->set_flashdata('success', 'License status updated to ' . $new_status);
                }
            } elseif ($action === 'create_key') {
                $email = $this->input->post('customer_email', TRUE);
                $plan_code = $this->input->post('plan_code', TRUE);
                $template = $this->input->post('template', TRUE);
                $layout = (int)$this->input->post('layout');

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

                $this->session->set_flashdata('success', 'New license key generated: ' . $new_key);
            }

            redirect(admin_url('marketplace/licenses'));
            return;
        }

        $data['licenses'] = $this->db->order_by('id', 'DESC')->get('marketplace_licenses')->result();
        $this->render('marketplace/licenses', $data, 'License Keys & Activations');
    }
}
