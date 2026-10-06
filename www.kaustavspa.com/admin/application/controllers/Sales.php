<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Invoices History
     */
    public function index() {
        $payment_status = $this->input->get('payment_status', TRUE);
        $date = $this->input->get('date', TRUE);

        $this->db->select('i.*, c.name as customer_name, c.phone as customer_phone, u.name as cashier_name')
                 ->from('invoices i')
                 ->join('customers c', 'c.id = i.customer_id', 'left')
                 ->join('users u', 'u.id = i.created_by', 'left');

        if ($payment_status) {
            $this->db->where('i.payment_status', $payment_status);
        }
        if ($date) {
            $this->db->where('i.invoice_date', $date);
        }

        $data['invoices'] = $this->db->order_by('i.id', 'DESC')->get()->result();
        $data['current_status'] = $payment_status;
        $data['current_date'] = $date;

        $this->render('sales/index', $data, 'Invoices & Billing History');
    }

    /**
     * View Standard Printable A4 Invoice
     */
    public function invoice($id) {
        $invoice = $this->db->select('i.*, c.name as customer_name, c.phone as customer_phone, c.email as customer_email, c.address as customer_address, u.name as cashier_name')
                            ->from('invoices i')
                            ->join('customers c', 'c.id = i.customer_id', 'left')
                            ->join('users u', 'u.id = i.created_by', 'left')
                            ->where('i.id', (int)$id)
                            ->get()->row();

        if (!$invoice) {
            $this->session->set_flashdata('error', 'Invoice not found.');
            redirect(admin_url('sales'));
            return;
        }

        $data['invoice'] = $invoice;
        $data['items'] = $this->db->get_where('invoice_items', array('invoice_id' => $invoice->id))->result();
        $data['payments'] = $this->db->get_where('payments', array('invoice_id' => $invoice->id))->result();

        $this->render('sales/invoice', $data, 'Invoice #' . $invoice->invoice_number);
    }

    /**
     * View 80mm Thermal Receipt (POS Slip)
     */
    public function receipt($id) {
        $invoice = $this->db->select('i.*, c.name as customer_name, c.phone as customer_phone, u.name as cashier_name')
                            ->from('invoices i')
                            ->join('customers c', 'c.id = i.customer_id', 'left')
                            ->join('users u', 'u.id = i.created_by', 'left')
                            ->where('i.id', (int)$id)
                            ->get()->row();

        if (!$invoice) {
            echo "Receipt not found.";
            return;
        }

        $data['invoice'] = $invoice;
        $data['items'] = $this->db->get_where('invoice_items', array('invoice_id' => $invoice->id))->result();
        $data['payments'] = $this->db->get_where('payments', array('invoice_id' => $invoice->id))->result();

        $this->load->view('sales/receipt', $data);
    }
}
