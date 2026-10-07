<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spa extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        redirect(admin_url('appointments'));
        exit;
    }

    /**
     * Treatment Rooms Management
     */
    public function rooms() {
        if ($this->input->method() === 'post') {
            $room_name = $this->input->post('room_name', TRUE);
            $room_number = $this->input->post('room_number', TRUE);
            $room_type = $this->input->post('room_type', TRUE);
            $capacity = (int)$this->input->post('capacity');
            $notes = $this->input->post('notes', TRUE);

            $this->db->insert('rooms', array(
                'room_name' => $room_name,
                'room_number' => $room_number,
                'room_type' => $room_type ? $room_type : 'Single Treatment',
                'capacity' => $capacity ? $capacity : 1,
                'status' => 'available',
                'notes' => $notes
            ));

            $this->session->set_flashdata('success', 'Treatment room registered successfully.');
            redirect(admin_url('spa/rooms'));
            return;
        }

        $data['rooms'] = $this->db->get('rooms')->result();
        $this->render('spa/rooms', $data, 'Spa Treatment Rooms');
    }

    /**
     * Visual Room Schedule & Conflict Prevention
     */
    public function schedule() {
        $today = $this->input->get('date') ? $this->input->get('date') : date('Y-m-d');
        
        $data['rooms'] = $this->db->where('status !=', 'maintenance')->get('rooms')->result();
        $data['today'] = $today;

        // Fetch bookings for the selected date
        $data['bookings'] = $this->db->select('a.*, c.name as customer_name, s.name as staff_name, r.room_name')
                                     ->from('appointments a')
                                     ->join('customers c', 'c.id = a.customer_id', 'left')
                                     ->join('staff s', 's.id = a.staff_id', 'left')
                                     ->join('rooms r', 'r.id = a.room_id', 'left')
                                     ->where('a.booking_date', $today)
                                     ->where('a.room_id IS NOT NULL', NULL, FALSE)
                                     ->where_in('a.status', array('pending', 'confirmed', 'in_service', 'completed'))
                                     ->order_by('a.start_time', 'ASC')
                                     ->get()->result();

        $this->render('spa/schedule', $data, 'Spa Room Schedule & Conflict Checker');
    }

    /**
     * Spa Sessions Tracker
     */
    public function sessions() {
        $data['sessions'] = $this->db->select('a.*, c.name as customer_name, c.phone as customer_phone, s.name as therapist_name, r.room_name')
                                     ->from('appointments a')
                                     ->join('customers c', 'c.id = a.customer_id', 'left')
                                     ->join('staff s', 's.id = a.staff_id', 'left')
                                     ->join('rooms r', 'r.id = a.room_id', 'left')
                                     ->where('a.room_id IS NOT NULL', NULL, FALSE)
                                     ->order_by('a.booking_date', 'DESC')
                                     ->order_by('a.start_time', 'DESC')
                                     ->get()->result();

        $this->render('spa/sessions', $data, 'Spa Treatment Sessions');
    }
}
