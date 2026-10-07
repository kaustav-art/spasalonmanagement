<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Point of Sale Billing Terminal
     */
    public function index() {
        $appointment_id = $this->input->get('appointment_id');
        $data['linked_appointment'] = null;
        $data['preset_customer_id'] = null;

        if ($appointment_id) {
            $apt = $this->db->get_where('appointments', array('id' => (int)$appointment_id))->row();
            if ($apt) {
                // Check if appointment is already completed or invoiced
                $existing_invoice = $this->db->get_where('invoices', array('appointment_id' => $apt->id))->row();
                if ($apt->status === 'completed' || $existing_invoice) {
                    $inv_info = $existing_invoice ? ' (Invoice #' . $existing_invoice->invoice_number . ')' : '';
                    $this->session->set_flashdata('error', 'Appointment #' . $apt->appointment_number . ' has already been billed' . $inv_info . ' and completed.');
                    redirect(admin_url('pos'));
                    return;
                }

                $data['linked_appointment'] = $apt;
                $data['preset_customer_id'] = $apt->customer_id;
                $data['appointment_services'] = $this->db->get_where('appointment_services', array('appointment_id' => $apt->id))->result();
            }
        }

        // Customers
        $data['customers'] = $this->db->order_by('name', 'ASC')->get('customers')->result();

        // Staff
        $data['staff_members'] = $this->db->where('status', 'active')->get('staff')->result();

        // Services (filtered by business type)
        $btype = get_business_type();
        if ($btype === 'SALON') {
            $data['services'] = $this->db->where_in('type', array('salon', 'both'))->where('status', 'active')->get('services')->result();
        } elseif ($btype === 'SPA') {
            $data['services'] = $this->db->where_in('type', array('spa', 'both'))->where('status', 'active')->get('services')->result();
        } else {
            $data['services'] = $this->db->where('status', 'active')->get('services')->result();
        }

        // Retail Products removed - POS operates exclusively on services
        $data['products'] = array();

        // Service Categories
        $data['service_categories'] = $this->db->where('status', 'active')->get('service_categories')->result();

        $data['tax_rate'] = (float)get_setting('tax_rate', 8.5);

        $this->render('pos/index', $data, 'POS Billing Register');
    }

    /**
     * Process POS Checkout Transaction
     */
    public function checkout() {
        $raw = file_get_contents('php://input');
        $payload = json_decode($raw, true);

        if (!$payload || empty($payload['items'])) {
            $this->json_response(array('status' => false, 'message' => 'Your cart is empty. Please add items.'), 400);
            return;
        }

        $customer_id = !empty($payload['customer_id']) ? (int)$payload['customer_id'] : null;
        if (!$customer_id) {
            $this->json_response(array('status' => false, 'message' => 'Please select a customer.'), 400);
            return;
        }
        $appointment_id = !empty($payload['appointment_id']) ? (int)$payload['appointment_id'] : NULL;
        if ($appointment_id) {
            $existing_invoice = $this->db->get_where('invoices', array('appointment_id' => $appointment_id))->row();
            if ($existing_invoice) {
                $this->json_response(array(
                    'status' => false,
                    'message' => 'This appointment has already been billed under invoice #' . $existing_invoice->invoice_number . '.'
                ), 400);
                return;
            }
        }
        $subtotal = (float)$payload['subtotal'];
        $discount_type = !empty($payload['discount_type']) ? $payload['discount_type'] : 'fixed';
        $discount_amount = (float)$payload['discount_amount'];
        $tax_amount = (float)$payload['tax_amount'];
        $grand_total = (float)$payload['grand_total'];
        $paid_amount = (float)$payload['paid_amount'];
        $payment_method = !empty($payload['payment_method']) ? $payload['payment_method'] : 'cash';
        $items = $payload['items'];

        $invoice_number = 'INV-' . date('Y') . '-' . strtoupper(substr(uniqid(), -6));
        $payment_status = ($paid_amount >= $grand_total) ? 'paid' : (($paid_amount > 0) ? 'partial' : 'unpaid');
        $due_amount = max(0, $grand_total - $paid_amount);

        // 1. Insert Invoice
        $this->db->insert('invoices', array(
            'invoice_number' => $invoice_number,
            'appointment_id' => $appointment_id,
            'customer_id' => $customer_id,
            'invoice_date' => date('Y-m-d'),
            'subtotal' => $subtotal,
            'discount_type' => $discount_type,
            'discount_amount' => $discount_amount,
            'tax_amount' => $tax_amount,
            'grand_total' => $grand_total,
            'paid_amount' => $paid_amount,
            'due_amount' => $due_amount,
            'payment_status' => $payment_status,
            'notes' => 'POS Checkout transaction',
            'created_by' => $this->current_user->id
        ));

        $invoice_id = $this->db->insert_id();

        // 2. Insert Invoice Items and Calculate Staff Commission (Services Only)
        foreach ($items as $item) {
            $item_id = (int)$item['id'];
            $item_name = $item['name'];
            $item_price = (float)$item['price'];
            $item_qty = (int)$item['qty'];
            $item_subtotal = $item_price * $item_qty;
            $staff_id = !empty($item['staff_id']) ? (int)$item['staff_id'] : NULL;

            $this->db->insert('invoice_items', array(
                'invoice_id' => $invoice_id,
                'item_type' => 'service',
                'item_id' => $item_id,
                'item_name' => $item_name,
                'staff_id' => $staff_id,
                'quantity' => $item_qty,
                'unit_price' => $item_price,
                'subtotal' => $item_subtotal,
                'tax' => 0.00
            ));

            // If service and staff assigned, award commission
            if ($staff_id) {
                $staff = $this->db->get_where('staff', array('id' => $staff_id))->row();
                if ($staff && (float)$staff->commission_rate > 0) {
                    $rate = (float)$staff->commission_rate;
                    $comm_amt = ($item_subtotal * $rate) / 100;
                    $this->db->insert('commissions', array(
                        'staff_id' => $staff_id,
                        'invoice_id' => $invoice_id,
                        'service_id' => $item_id,
                        'service_amount' => $item_subtotal,
                        'commission_rate' => $rate,
                        'commission_amount' => $comm_amt,
                        'status' => 'pending'
                    ));
                }
            }
        }

        // 3. Record Payment
        if ($paid_amount > 0) {
            $this->db->insert('payments', array(
                'invoice_id' => $invoice_id,
                'payment_method' => $payment_method,
                'amount' => $paid_amount,
                'transaction_reference' => 'TXN-' . strtoupper(substr(uniqid(), -6)),
                'payment_date' => date('Y-m-d'),
                'notes' => 'Payment at checkout',
                'created_by' => $this->current_user->id
            ));
        }

        // 4. If linked to appointment, mark appointment completed
        if ($appointment_id) {
            $this->db->where('id', $appointment_id)->update('appointments', array(
                'status' => 'completed'
            ));
        }

        // 5. Award Customer Loyalty Points (1 point per 10 currency units spent)
        $loyalty_earned = floor($grand_total / 10);
        if ($loyalty_earned > 0) {
            $this->db->set('loyalty_points', 'loyalty_points + ' . $loyalty_earned, FALSE)
                     ->where('id', $customer_id)
                     ->update('customers');
        }

        $this->json_response(array(
            'status' => true,
            'message' => 'Sale completed successfully!',
            'invoice_id' => $invoice_id,
            'invoice_number' => $invoice_number,
            'print_url' => admin_url('sales/invoice/' . $invoice_id),
            'receipt_url' => admin_url('sales/receipt/' . $invoice_id)
        ));
    }
}
