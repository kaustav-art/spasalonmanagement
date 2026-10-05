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

        $this->render('dashboard/index', $data, 'Super Admin Control Panel Dashboard');
    }
}
