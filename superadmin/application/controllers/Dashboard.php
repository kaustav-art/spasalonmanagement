<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Superadmin_Controller {

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

        // Plan sales breakdown
        $data['plan_breakdown'] = $this->db->select('plan_code, COUNT(id) as count, SUM(amount) as revenue')
                                           ->from('marketplace_orders')
                                           ->where('payment_status', 'paid')
                                           ->group_by('plan_code')
                                           ->get()->result();

        // Recent Purchases
        $data['recent_orders'] = $this->db->order_by('id', 'DESC')->limit(6)->get('marketplace_orders')->result();
        
        // Recent Licenses
        $data['recent_licenses'] = $this->db->order_by('id', 'DESC')->limit(6)->get('marketplace_licenses')->result();

        // Marketplace plans
        $data['plans'] = $this->db->order_by('sort_order', 'ASC')->get('marketplace_plans')->result();

        // Tenant platform health & stats
        $data['tenant_appointments'] = $this->db->table_exists('appointments') ? $this->db->count_all('appointments') : 0;
        $data['tenant_customers'] = $this->db->table_exists('customers') ? $this->db->count_all('customers') : 0;
        $data['tenant_staff'] = $this->db->table_exists('staff') ? $this->db->count_all('staff') : 0;
        $data['tenant_services'] = $this->db->table_exists('services') ? $this->db->count_all('services') : 0;

        $data['business_name'] = get_setting('business_name', 'Salon & Spa Management');
        $data['business_type'] = get_setting('business_type', 'SALON_SPA');
        $data['active_template'] = get_setting('active_template', 'template1');
        $data['active_layout'] = get_setting('active_home_layout', '1');

        $this->render('dashboard/index', $data, 'Super Admin Control Panel Dashboard');
    }
}
