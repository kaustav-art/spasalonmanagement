<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Customer Master Directory
     */
    public function index() {
        $search = $this->input->get('q', TRUE);
        $group_id = $this->input->get('group_id', TRUE);

        $this->db->select('c.*, g.name as group_name, g.discount_percent, (SELECT COUNT(id) FROM appointments WHERE customer_id = c.id) as total_visits, (SELECT SUM(grand_total) FROM invoices WHERE customer_id = c.id) as total_spend')
                 ->from('customers c')
                 ->join('customer_groups g', 'g.id = c.group_id', 'left');

        if ($search) {
            $this->db->group_start()
                     ->like('c.name', $search)
                     ->or_like('c.phone', $search)
                     ->or_like('c.email', $search)
                     ->group_end();
        }
        if ($group_id) {
            $this->db->where('c.group_id', (int)$group_id);
        }

        $data['customers'] = $this->db->order_by('c.id', 'DESC')->get()->result();
        $data['groups'] = $this->db->get('customer_groups')->result();
        $data['search'] = $search;
        $data['current_group'] = $group_id;

        $this->render('customers/index', $data, 'Customer CRM & Profiles');
    }

    /**
     * Create New Customer
     */
    public function create() {
        if ($this->input->method() === 'post') {
            $name = trim($this->input->post('name', TRUE));
            $phone = trim($this->input->post('phone', TRUE));
            $email = trim($this->input->post('email', TRUE));
            $gender = $this->input->post('gender', TRUE);
            $dob = $this->input->post('dob', TRUE);
            $address = $this->input->post('address', TRUE);
            $group_id = (int)$this->input->post('group_id');
            $notes = $this->input->post('notes', TRUE);

            if (empty($name) || empty($phone)) {
                $this->session->set_flashdata('error', 'Name and Phone number are required.');
                redirect(admin_url('customers/create'));
                return;
            }

            $this->db->insert('customers', array(
                'name' => $name,
                'phone' => $phone,
                'email' => $email ? $email : NULL,
                'gender' => $gender ? $gender : 'Female',
                'dob' => $dob ? $dob : NULL,
                'address' => $address,
                'group_id' => $group_id ? $group_id : 1,
                'notes' => $notes
            ));

            $cust_id = $this->db->insert_id();
            $this->session->set_flashdata('success', 'Customer created successfully.');
            redirect(admin_url('customers/profile/' . $cust_id));
            return;
        }

        $data['groups'] = $this->db->get('customer_groups')->result();
        $this->render('customers/create', $data, 'Register New Client');
    }

    /**
     * Customer 360 Profile View
     */
    public function profile($id) {
        $customer = $this->db->select('c.*, g.name as group_name, g.discount_percent')
                             ->from('customers c')
                             ->join('customer_groups g', 'g.id = c.group_id', 'left')
                             ->where('c.id', (int)$id)
                             ->get()->row();

        if (!$customer) {
            $this->session->set_flashdata('error', 'Customer not found.');
            redirect(admin_url('customers'));
            return;
        }

        $data['customer'] = $customer;
        $data['appointments'] = $this->db->select('a.*, s.name as staff_name, r.room_name')
                                         ->from('appointments a')
                                         ->join('staff s', 's.id = a.staff_id', 'left')
                                         ->join('rooms r', 'r.id = a.room_id', 'left')
                                         ->where('a.customer_id', (int)$id)
                                         ->order_by('a.booking_date', 'DESC')
                                         ->get()->result();

        $data['invoices'] = $this->db->where('customer_id', (int)$id)
                                     ->order_by('id', 'DESC')
                                     ->get('invoices')->result();

        $this->render('customers/profile', $data, 'Client Profile: ' . $customer->name);
    }

    /**
     * Edit Customer
     */
    public function edit($id) {
        $customer = $this->db->get_where('customers', array('id' => (int)$id))->row();
        if (!$customer) {
            $this->session->set_flashdata('error', 'Customer not found.');
            redirect(admin_url('customers'));
            return;
        }

        if ($this->input->method() === 'post') {
            $this->db->where('id', (int)$id)->update('customers', array(
                'name' => $this->input->post('name', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'email' => $this->input->post('email', TRUE),
                'gender' => $this->input->post('gender', TRUE),
                'dob' => $this->input->post('dob', TRUE) ? $this->input->post('dob', TRUE) : NULL,
                'address' => $this->input->post('address', TRUE),
                'group_id' => (int)$this->input->post('group_id'),
                'notes' => $this->input->post('notes', TRUE)
            ));

            $this->session->set_flashdata('success', 'Customer updated successfully.');
            redirect(admin_url('customers/profile/' . $id));
            return;
        }

        $data['customer'] = $customer;
        $data['groups'] = $this->db->get('customer_groups')->result();
        $this->render('customers/edit', $data, 'Edit Client: ' . $customer->name);
    }

    /**
     * Customer Groups (VIP, Regular, etc.)
     */
    public function groups() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);
            $discount = (float)$this->input->post('discount_percent');
            $desc = $this->input->post('description', TRUE);

            $this->db->insert('customer_groups', array(
                'name' => $name,
                'discount_percent' => $discount,
                'description' => $desc
            ));
            $this->session->set_flashdata('success', 'Customer group created.');
            redirect(admin_url('customers/groups'));
            return;
        }

        $data['groups'] = $this->db->select('g.*, (SELECT COUNT(id) FROM customers WHERE group_id = g.id) as total_members')
                                   ->from('customer_groups g')
                                   ->get()->result();

        $this->render('customers/groups', $data, 'Customer Groups & Loyalty Tiers');
    }

    /**
     * Quick Create Customer (JSON API for POS and Booking)
     */
    public function quick_create() {
        $raw = file_get_contents('php://input');
        $payload = json_decode($raw, true);

        if (empty($payload['name']) || empty($payload['phone'])) {
            $this->json_response(array('status' => false, 'message' => 'Name and Phone required'), 400);
            return;
        }

        $this->db->insert('customers', array(
            'name' => trim($payload['name']),
            'phone' => trim($payload['phone']),
            'email' => !empty($payload['email']) ? trim($payload['email']) : NULL,
            'group_id' => 1
        ));

        $id = $this->db->insert_id();
        $this->json_response(array('status' => true, 'customer_id' => $id));
    }
}
