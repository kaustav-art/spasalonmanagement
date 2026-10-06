<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Staff Directory
     */
    public function index() {
        $role_type = $this->input->get('role_type', TRUE);
        $this->db->select('s.*, (SELECT COUNT(id) FROM appointments WHERE staff_id = s.id) as total_appointments, (SELECT SUM(commission_amount) FROM commissions WHERE staff_id = s.id AND status = "pending") as pending_commissions')
                 ->from('staff s');

        if ($role_type) {
            $this->db->where('s.role_type', $role_type);
        }

        // Filter by edition
        $btype = get_business_type();
        if ($btype === 'SALON') {
            $this->db->where_in('s.role_type', array('stylist', 'beautician', 'receptionist', 'manager'));
        } elseif ($btype === 'SPA') {
            $this->db->where_in('s.role_type', array('therapist', 'receptionist', 'manager'));
        }

        $data['staff'] = $this->db->order_by('s.name', 'ASC')->get()->result();
        $data['current_role'] = $role_type;

        $this->render('staff/index', $data, 'Staff & Specialists');
    }

    /**
     * Add Staff Member
     */
    public function create() {
        if ($this->input->method() === 'post') {
            $name = trim($this->input->post('name', TRUE));
            $email = trim($this->input->post('email', TRUE));
            $phone = trim($this->input->post('phone', TRUE));
            $role_type = $this->input->post('role_type', TRUE);
            $commission_rate = (float)$this->input->post('commission_rate');
            $bio = $this->input->post('bio', TRUE);

            if (empty($name)) {
                $this->session->set_flashdata('error', 'Staff name is required.');
                redirect(admin_url('staff/create'));
                return;
            }

            $this->db->insert('staff', array(
                'name' => $name,
                'email' => $email ? $email : NULL,
                'phone' => $phone ? $phone : NULL,
                'role_type' => $role_type ? $role_type : 'stylist',
                'commission_rate' => $commission_rate ? $commission_rate : 10.00,
                'bio' => $bio,
                'status' => 'active'
            ));

            $staff_id = $this->db->insert_id();

            // Seed default weekly schedule for new staff
            $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
            foreach ($days as $day) {
                $this->db->insert('staff_schedules', array(
                    'staff_id' => $staff_id,
                    'day_of_week' => $day,
                    'start_time' => '09:00:00',
                    'end_time' => '19:00:00',
                    'is_day_off' => ($day === 'Sunday') ? 1 : 0
                ));
            }

            $this->session->set_flashdata('success', 'Staff member added successfully.');
            redirect(admin_url('staff'));
            return;
        }

        $this->render('staff/create', array(), 'Add New Specialist / Staff');
    }

    /**
     * Edit Staff Member
     */
    public function edit($id) {
        $staff = $this->db->get_where('staff', array('id' => (int)$id))->row();
        if (!$staff) {
            $this->session->set_flashdata('error', 'Staff member not found.');
            redirect(admin_url('staff'));
            return;
        }

        if ($this->input->method() === 'post') {
            $this->db->where('id', (int)$id)->update('staff', array(
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'role_type' => $this->input->post('role_type', TRUE),
                'commission_rate' => (float)$this->input->post('commission_rate'),
                'bio' => $this->input->post('bio', TRUE),
                'status' => $this->input->post('status', TRUE)
            ));

            $this->session->set_flashdata('success', 'Staff details updated.');
            redirect(admin_url('staff'));
            return;
        }

        $data['staff'] = $staff;
        $this->render('staff/edit', $data, 'Edit Staff: ' . $staff->name);
    }

    /**
     * Weekly Schedules
     */
    public function schedules() {
        if ($this->input->method() === 'post') {
            $schedules = $this->input->post('schedule');
            if (!empty($schedules)) {
                foreach ($schedules as $sched_id => $row) {
                    $this->db->where('id', (int)$sched_id)->update('staff_schedules', array(
                        'start_time' => $row['start_time'],
                        'end_time' => $row['end_time'],
                        'is_day_off' => isset($row['is_day_off']) ? 1 : 0
                    ));
                }
            }
            $this->session->set_flashdata('success', 'Work schedules saved.');
            redirect(admin_url('staff/schedules'));
            return;
        }

        $staff_id = $this->input->get('staff_id');
        if (!$staff_id) {
            $first = $this->db->where('status', 'active')->get('staff')->row();
            $staff_id = $first ? $first->id : 1;
        }

        $data['current_staff'] = $this->db->get_where('staff', array('id' => $staff_id))->row();
        $data['all_staff'] = $this->db->where('status', 'active')->get('staff')->result();
        $data['schedules'] = $this->db->where('staff_id', $staff_id)->get('staff_schedules')->result();

        $this->render('staff/schedules', $data, 'Staff Working Schedules');
    }

    /**
     * Staff Commissions Tracking & Payouts
     */
    public function commissions() {
        $staff_id = $this->input->get('staff_id');
        $this->db->select('c.*, s.name as staff_name, s.role_type, s.commission_rate as default_rate, i.invoice_number, srv.name as service_name')
                 ->from('commissions c')
                 ->join('staff s', 's.id = c.staff_id', 'left')
                 ->join('invoices i', 'i.id = c.invoice_id', 'left')
                 ->join('services srv', 'srv.id = c.service_id', 'left');

        if ($staff_id) {
            $this->db->where('c.staff_id', (int)$staff_id);
        }

        $data['commissions'] = $this->db->order_by('c.id', 'DESC')->get()->result();
        $data['all_staff'] = $this->db->where('status', 'active')->get('staff')->result();
        $data['current_staff'] = $staff_id;

        $this->render('staff/commissions', $data, 'Staff Commissions & Performance');
    }

    public function pay_commission($id) {
        $this->db->where('id', (int)$id)->update('commissions', array(
            'status' => 'paid',
            'paid_date' => date('Y-m-d')
        ));
        $this->session->set_flashdata('success', 'Commission marked as paid.');
        redirect(admin_url('staff/commissions'));
    }
}
