<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->sales();
    }

    /**
     * Sales & Revenue Report
     */
    public function sales() {
        $from = $this->input->get('from') ? $this->input->get('from') : date('Y-m-01');
        $to = $this->input->get('to') ? $this->input->get('to') : date('Y-m-d');

        // Total sales in range
        $data['invoices'] = $this->db->select('i.*, c.name as customer_name')
                                     ->from('invoices i')
                                     ->join('customers c', 'c.id = i.customer_id', 'left')
                                     ->where('i.invoice_date >=', $from)
                                     ->where('i.invoice_date <=', $to)
                                     ->order_by('i.invoice_date', 'DESC')
                                     ->get()->result();

        // Payment methods breakdown
        $data['payment_methods'] = $this->db->select('payment_method, SUM(amount) as total')
                                            ->from('payments')
                                            ->where('payment_date >=', $from)
                                            ->where('payment_date <=', $to)
                                            ->group_by('payment_method')
                                            ->get()->result();

        // Service vs Product sales breakdown
        $data['items_breakdown'] = $this->db->select('ii.item_type, SUM(ii.subtotal) as total, SUM(ii.quantity) as qty')
                                            ->from('invoice_items ii')
                                            ->join('invoices i', 'i.id = ii.invoice_id')
                                            ->where('i.invoice_date >=', $from)
                                            ->where('i.invoice_date <=', $to)
                                            ->group_by('ii.item_type')
                                            ->get()->result();

        $data['from'] = $from;
        $data['to'] = $to;
        $data['total_revenue'] = array_sum(array_column($data['invoices'], 'grand_total'));
        $data['total_paid'] = array_sum(array_column($data['invoices'], 'paid_amount'));
        $data['total_due'] = array_sum(array_column($data['invoices'], 'due_amount'));

        $this->render('reports/sales', $data, 'Sales & Revenue Report');
    }

    /**
     * Appointments Analytics Report
     */
    public function appointments() {
        $from = $this->input->get('from') ? $this->input->get('from') : date('Y-m-01');
        $to = $this->input->get('to') ? $this->input->get('to') : date('Y-m-d');

        $data['appointments'] = $this->db->select('a.*, c.name as customer_name, s.name as staff_name, r.room_name')
                                         ->from('appointments a')
                                         ->join('customers c', 'c.id = a.customer_id', 'left')
                                         ->join('staff s', 's.id = a.staff_id', 'left')
                                         ->join('rooms r', 'r.id = a.room_id', 'left')
                                         ->where('a.booking_date >=', $from)
                                         ->where('a.booking_date <=', $to)
                                         ->order_by('a.booking_date', 'DESC')
                                         ->get()->result();

        // Status counts
        $status_counts = array('pending' => 0, 'confirmed' => 0, 'in_service' => 0, 'completed' => 0, 'cancelled' => 0, 'no_show' => 0);
        $source_counts = array('online' => 0, 'walk_in' => 0, 'admin' => 0);

        foreach ($data['appointments'] as $apt) {
            if (isset($status_counts[$apt->status])) $status_counts[$apt->status]++;
            if (isset($source_counts[$apt->booking_source])) $source_counts[$apt->booking_source]++;
        }

        $data['status_counts'] = $status_counts;
        $data['source_counts'] = $source_counts;
        $data['from'] = $from;
        $data['to'] = $to;

        $this->render('reports/appointments', $data, 'Appointments Analytics Report');
    }

    /**
     * Staff Commissions Report
     */
    public function commissions() {
        $from = $this->input->get('from') ? $this->input->get('from') : date('Y-m-01');
        $to = $this->input->get('to') ? $this->input->get('to') : date('Y-m-d');
        $staff_id = $this->input->get('staff_id');

        $this->db->select('c.*, s.name as staff_name, s.role_type, i.invoice_number, sv.name as service_name')
                 ->from('commissions c')
                 ->join('staff s', 's.id = c.staff_id', 'left')
                 ->join('invoices i', 'i.id = c.invoice_id', 'left')
                 ->join('services sv', 'sv.id = c.service_id', 'left')
                 ->where('DATE(c.created_at) >=', $from)
                 ->where('DATE(c.created_at) <=', $to);

        if (!empty($staff_id)) {
            $this->db->where('c.staff_id', (int)$staff_id);
        }

        $data['commissions'] = $this->db->order_by('c.id', 'DESC')->get()->result();
        $data['staff_members'] = $this->db->where('status', 'active')->order_by('name', 'ASC')->get('staff')->result();
        $data['from'] = $from;
        $data['to'] = $to;
        $data['filter_staff_id'] = $staff_id;
        $data['total_commission'] = array_sum(array_column($data['commissions'], 'commission_amount'));

        $this->render('reports/commissions', $data, 'Staff Commissions Report');
    }

    /**
     * Profit & Loss Financial Overview
     */
    public function profit_loss() {
        $from = $this->input->get('from') ? $this->input->get('from') : date('Y-m-01');
        $to = $this->input->get('to') ? $this->input->get('to') : date('Y-m-d');

        // Total Gross Revenue from Invoices
        $sales_row = $this->db->select('SUM(grand_total) as gross_revenue, SUM(tax_amount) as total_tax')
                              ->from('invoices')
                              ->where('invoice_date >=', $from)
                              ->where('invoice_date <=', $to)
                              ->get()->row();
        $gross_revenue = $sales_row && $sales_row->gross_revenue ? (float)$sales_row->gross_revenue : 0.00;
        $total_tax = $sales_row && $sales_row->total_tax ? (float)$sales_row->total_tax : 0.00;

        // Total Operational Expenses
        $expense_row = $this->db->select('SUM(amount) as total_expenses')
                                ->from('expenses')
                                ->where('expense_date >=', $from)
                                ->where('expense_date <=', $to)
                                ->get()->row();
        $total_expenses = $expense_row && $expense_row->total_expenses ? (float)$expense_row->total_expenses : 0.00;

        // Total Staff Commissions
        $commission_row = $this->db->select('SUM(commission_amount) as total_commissions')
                                   ->from('commissions')
                                   ->where('DATE(created_at) >=', $from)
                                   ->where('DATE(created_at) <=', $to)
                                   ->get()->row();
        $total_commissions = $commission_row && $commission_row->total_commissions ? (float)$commission_row->total_commissions : 0.00;

        // Net Operating Profit
        $net_profit = $gross_revenue - $total_tax - $total_expenses - $total_commissions;

        // Expense by category breakdown
        $expense_breakdown = $this->db->select('c.name as category_name, SUM(e.amount) as amount')
                                      ->from('expenses e')
                                      ->join('expense_categories c', 'c.id = e.category_id', 'left')
                                      ->where('e.expense_date >=', $from)
                                      ->where('e.expense_date <=', $to)
                                      ->group_by('e.category_id')
                                      ->get()->result();

        $data['from'] = $from;
        $data['to'] = $to;
        $data['gross_revenue'] = $gross_revenue;
        $data['total_tax'] = $total_tax;
        $data['total_expenses'] = $total_expenses;
        $data['total_commissions'] = $total_commissions;
        $data['net_profit'] = $net_profit;
        $data['expense_breakdown'] = $expense_breakdown;

        $this->render('reports/profit_loss', $data, 'Profit & Loss Statement');
    }
}
