<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $today = date('Y-m-d');

        // 1. KPI Metrics
        // Today's Appointments
        $data['today_appointments'] = $this->db->where('booking_date', $today)->count_all_results('appointments');
        
        // Today's Sales
        $today_sales_row = $this->db->select_sum('grand_total')
                                    ->where('invoice_date', $today)
                                    ->get('invoices')->row();
        $data['today_sales'] = $today_sales_row->grand_total ? (float)$today_sales_row->grand_total : 0.00;

        // Pending Payments
        $pending_pay_row = $this->db->select_sum('due_amount')
                                    ->where('payment_status !=', 'paid')
                                    ->get('invoices')->row();
        $data['pending_payments'] = $pending_pay_row->due_amount ? (float)$pending_pay_row->due_amount : 0.00;

        // New Customers this month
        $start_month = date('Y-m-01');
        $data['new_customers'] = $this->db->where('created_at >=', $start_month)->count_all_results('customers');

        // Completed Services today
        $data['completed_services'] = $this->db->where('booking_date', $today)
                                              ->where('status', 'completed')
                                              ->count_all_results('appointments');

        // Low stock products alert count
        $data['low_stock_count'] = $this->db->where('current_stock <= min_alert_stock', NULL, FALSE)
                                            ->where('status', 'active')
                                            ->count_all_results('products');

        // Available Active Staff
        $data['total_staff_active'] = $this->db->where('status', 'active')->count_all_results('staff');

        // 2. Today's Appointments List
        $data['today_appointments_list'] = $this->db->select('a.*, c.name as customer_name, c.phone as customer_phone, s.name as staff_name, r.room_name')
                                                    ->from('appointments a')
                                                    ->join('customers c', 'c.id = a.customer_id', 'left')
                                                    ->join('staff s', 's.id = a.staff_id', 'left')
                                                    ->join('rooms r', 'r.id = a.room_id', 'left')
                                                    ->where('a.booking_date', $today)
                                                    ->order_by('a.start_time', 'ASC')
                                                    ->get()->result();

        // 3. Recent Invoices
        $data['recent_invoices'] = $this->db->select('i.*, c.name as customer_name')
                                           ->from('invoices i')
                                           ->join('customers c', 'c.id = i.customer_id', 'left')
                                           ->order_by('i.id', 'DESC')
                                           ->limit(5)
                                           ->get()->result();

        // 4. Low Stock Products
        $data['low_stock_products'] = $this->db->select('p.*, c.name as category_name, u.short_name as unit_name')
                                               ->from('products p')
                                               ->join('product_categories c', 'c.id = p.category_id', 'left')
                                               ->join('units u', 'u.id = p.unit_id', 'left')
                                               ->where('p.current_stock <= p.min_alert_stock', NULL, FALSE)
                                               ->where('p.status', 'active')
                                               ->limit(5)
                                               ->get()->result();

        // 5. Monthly Sales & Appointments chart data (last 6 months)
        $months = array();
        $monthly_sales = array();
        $monthly_appointments = array();
        for ($i = 5; $i >= 0; $i--) {
            $m_date = date('Y-m', strtotime("-$i months"));
            $m_label = date('M Y', strtotime("-$i months"));
            $months[] = $m_label;
            
            $res = $this->db->select_sum('grand_total')
                           ->like('invoice_date', $m_date, 'after')
                           ->get('invoices')->row();
            $monthly_sales[] = $res->grand_total ? (float)$res->grand_total : 0.00;

            $apt_count = $this->db->like('booking_date', $m_date, 'after')
                                  ->count_all_results('appointments');
            $monthly_appointments[] = (int)$apt_count;
        }
        $data['chart_months'] = json_encode($months);
        $data['chart_sales'] = json_encode($monthly_sales);
        $data['chart_appointments'] = json_encode($monthly_appointments);

        // 6. Service Category breakdown for Donut Chart
        $category_counts = $this->db->select('sc.name, COUNT(aps.id) as count')
                                    ->from('service_categories sc')
                                    ->join('services s', 's.category_id = sc.id', 'left')
                                    ->join('appointment_services aps', 'aps.service_id = s.id', 'left')
                                    ->group_by('sc.id')
                                    ->order_by('count', 'DESC')
                                    ->limit(5)
                                    ->get()->result();
        
        $cat_labels = [];
        $cat_series = [];
        if (!empty($category_counts)) {
            foreach ($category_counts as $cc) {
                $cat_labels[] = $cc->name;
                $cat_series[] = (int)$cc->count > 0 ? (int)$cc->count : 1;
            }
        }
        if (empty($cat_labels)) {
            $cat_labels = ['Hair Care', 'Facial & Skin', 'Body Massage', 'Manicure / Pedicure', 'Spa Therapy'];
            $cat_series = [35, 25, 20, 15, 5];
        }
        $data['chart_cat_labels'] = json_encode($cat_labels);
        $data['chart_cat_series'] = json_encode($cat_series);

        // 7. Top Staff Specialists
        $data['top_staff'] = $this->db->select('s.*, COUNT(a.id) as total_bookings')
                                      ->from('staff s')
                                      ->join('appointments a', 'a.staff_id = s.id', 'left')
                                      ->where('s.status', 'active')
                                      ->group_by('s.id')
                                      ->order_by('total_bookings', 'DESC')
                                      ->limit(4)
                                      ->get()->result();

        // 8. Total counts
        $data['total_customers'] = $this->db->count_all_results('customers');
        $data['total_services'] = $this->db->where('status', 'active')->count_all_results('services');

        $this->render('dashboard/index', $data, 'Dashboard Overview');
    }
}
