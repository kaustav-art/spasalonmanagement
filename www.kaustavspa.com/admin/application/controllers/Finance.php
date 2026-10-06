<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Operational Expenses Tracker
     */
    public function expenses() {
        if ($this->input->method() === 'post') {
            $category_id = (int)$this->input->post('category_id');
            $expense_date = $this->input->post('expense_date', TRUE);
            $title = $this->input->post('title', TRUE);
            $amount = (float)$this->input->post('amount');
            $payment_method = $this->input->post('payment_method', TRUE);
            $notes = $this->input->post('notes', TRUE);

            $this->db->insert('expenses', array(
                'category_id' => $category_id,
                'expense_date' => $expense_date ? $expense_date : date('Y-m-d'),
                'title' => $title,
                'amount' => $amount,
                'payment_method' => $payment_method ? $payment_method : 'cash',
                'notes' => $notes,
                'created_by' => $this->session->userdata('user_id') ? $this->session->userdata('user_id') : 1
            ));

            // If cash payment and open cash register exists, track cash_out
            if ($payment_method === 'cash') {
                $open_reg = $this->db->where('status', 'open')->order_by('id', 'DESC')->get('cash_register')->row();
                if ($open_reg) {
                    $this->db->where('id', $open_reg->id)->update('cash_register', array(
                        'cash_out' => $open_reg->cash_out + $amount
                    ));
                }
            }

            $this->session->set_flashdata('success', 'Expense recorded successfully.');
            redirect(admin_url('finance/expenses'));
            return;
        }

        $filter_cat = $this->input->get('category_id');
        $filter_from = $this->input->get('from');
        $filter_to = $this->input->get('to');

        $this->db->select('e.*, c.name as category_name')
                 ->from('expenses e')
                 ->join('expense_categories c', 'c.id = e.category_id', 'left');

        if (!empty($filter_cat)) {
            $this->db->where('e.category_id', (int)$filter_cat);
        }
        if (!empty($filter_from)) {
            $this->db->where('e.expense_date >=', $filter_from);
        }
        if (!empty($filter_to)) {
            $this->db->where('e.expense_date <=', $filter_to);
        }

        $data['expenses'] = $this->db->order_by('e.expense_date', 'DESC')->order_by('e.id', 'DESC')->get()->result();
        $data['categories'] = $this->db->order_by('name', 'ASC')->get('expense_categories')->result();
        
        // Expense summary stats
        $data['total_expenses'] = array_sum(array_column($data['expenses'], 'amount'));
        $data['filter_cat'] = $filter_cat;
        $data['filter_from'] = $filter_from;
        $data['filter_to'] = $filter_to;

        $this->render('finance/expenses', $data, 'Expenses Management');
    }

    /**
     * Delete Expense
     */
    public function delete_expense($id) {
        $this->db->where('id', (int)$id)->delete('expenses');
        $this->session->set_flashdata('success', 'Expense deleted.');
        redirect(admin_url('finance/expenses'));
    }

    /**
     * Expense Categories
     */
    public function categories() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);
            $description = $this->input->post('description', TRUE);
            $cat_id = (int)$this->input->post('category_id');

            if ($cat_id > 0) {
                $this->db->where('id', $cat_id)->update('expense_categories', array(
                    'name' => $name,
                    'description' => $description
                ));
                $this->session->set_flashdata('success', 'Category updated.');
            } else {
                $this->db->insert('expense_categories', array(
                    'name' => $name,
                    'description' => $description
                ));
                $this->session->set_flashdata('success', 'Category added.');
            }
            redirect(admin_url('finance/categories'));
            return;
        }

        $data['categories'] = $this->db->get('expense_categories')->result();
        $this->render('finance/categories', $data, 'Expense Categories');
    }

    /**
     * Cash Register & Daily Drawer Management
     */
    public function cash_register() {
        // Handle Opening / Closing register
        if ($this->input->method() === 'post') {
            $action = $this->input->post('action', TRUE);

            if ($action === 'open') {
                $opening_balance = (float)$this->input->post('opening_balance');
                $notes = $this->input->post('notes', TRUE);

                $this->db->insert('cash_register', array(
                    'user_id' => $this->session->userdata('user_id') ? $this->session->userdata('user_id') : 1,
                    'opening_balance' => $opening_balance,
                    'cash_in' => 0.00,
                    'cash_out' => 0.00,
                    'status' => 'open',
                    'opened_at' => date('Y-m-d H:i:s'),
                    'notes' => $notes
                ));
                $this->session->set_flashdata('success', 'Cash register opened for today.');
            } elseif ($action === 'close') {
                $register_id = (int)$this->input->post('register_id');
                $closing_balance = (float)$this->input->post('closing_balance');
                $notes = $this->input->post('notes', TRUE);

                $this->db->where('id', $register_id)->update('cash_register', array(
                    'closing_balance' => $closing_balance,
                    'status' => 'closed',
                    'closed_at' => date('Y-m-d H:i:s'),
                    'notes' => $notes
                ));
                $this->session->set_flashdata('success', 'Cash register closed successfully.');
            }

            redirect(admin_url('finance/cash_register'));
            return;
        }

        $data['current_register'] = $this->db->where('status', 'open')->order_by('id', 'DESC')->get('cash_register')->row();
        $data['past_registers'] = $this->db->where('status', 'closed')->order_by('id', 'DESC')->limit(30)->get('cash_register')->result();

        $this->render('finance/cash_register', $data, 'Cash Register & Till Reconciliation');
    }
}
