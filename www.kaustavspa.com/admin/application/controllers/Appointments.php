<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Appointment List with Filters
     */
    public function index() {
        $status = $this->input->get('status', TRUE);
        $date = $this->input->get('date', TRUE);
        $staff_id = $this->input->get('staff_id', TRUE);

        $this->db->select('a.*, c.name as customer_name, c.phone as customer_phone, s.name as staff_name, r.room_name')
                 ->from('appointments a')
                 ->join('customers c', 'c.id = a.customer_id', 'left')
                 ->join('staff s', 's.id = a.staff_id', 'left')
                 ->join('rooms r', 'r.id = a.room_id', 'left');

        if ($status) {
            $this->db->where('a.status', $status);
        }
        if ($date) {
            $this->db->where('a.booking_date', $date);
        }
        if ($staff_id) {
            $this->db->where('a.staff_id', (int)$staff_id);
        }

        $data['appointments'] = $this->db->order_by('a.booking_date', 'DESC')
                                         ->order_by('a.start_time', 'ASC')
                                         ->get()->result();

        $data['staff_members'] = $this->db->where('status', 'active')->get('staff')->result();
        $data['current_status'] = $status;
        $data['current_date'] = $date;
        $data['current_staff'] = $staff_id;

        $this->render('appointments/index', $data, 'All Appointments & Bookings');
    }

    /**
     * Visual Interactive Calendar View
     */
    public function calendar() {
        $staff_id = $this->input->get('staff_id', TRUE);
        $status = $this->input->get('status', TRUE);
        $room_id = $this->input->get('room_id', TRUE);

        $this->db->select('a.*, c.name as customer_name, c.phone as customer_phone, s.name as staff_name, r.room_name')
                 ->from('appointments a')
                 ->join('customers c', 'c.id = a.customer_id', 'left')
                 ->join('staff s', 's.id = a.staff_id', 'left')
                 ->join('rooms r', 'r.id = a.room_id', 'left');

        if (!empty($staff_id)) {
            $this->db->where('a.staff_id', (int)$staff_id);
        }
        if (!empty($status)) {
            $this->db->where('a.status', $status);
        } else {
            $this->db->where_in('a.status', array('pending', 'confirmed', 'in_service', 'completed', 'cancelled'));
        }
        if (!empty($room_id)) {
            $this->db->where('a.room_id', (int)$room_id);
        }

        $appointments = $this->db->get()->result();

        $events = array();
        foreach ($appointments as $apt) {
            $color = '#f59e0b'; // pending amber
            if ($apt->status === 'confirmed') {
                $color = '#10b981'; // emerald
            } elseif ($apt->status === 'in_service') {
                $color = '#06b6d4'; // cyan
            } elseif ($apt->status === 'completed') {
                $color = '#5F4AFE'; // conca purple
            } elseif ($apt->status === 'cancelled') {
                $color = '#ef4444'; // danger red
            }

            $events[] = array(
                'id' => $apt->id,
                'title' => ($apt->customer_name ?: 'Walk-in') . ' - ' . ($apt->staff_name ?: 'Any Specialist'),
                'start' => $apt->booking_date . 'T' . $apt->start_time,
                'end' => $apt->booking_date . 'T' . $apt->end_time,
                'backgroundColor' => $color,
                'borderColor' => $color,
                'textColor' => '#ffffff',
                'extendedProps' => array(
                    'appointment_number' => $apt->appointment_number,
                    'customer_name' => $apt->customer_name ?: 'Walk-in Customer',
                    'customer_phone' => $apt->customer_phone ?: 'N/A',
                    'staff_name' => $apt->staff_name ?: 'Any Specialist',
                    'room_name' => $apt->room_name ?: 'Standard Station',
                    'time_slot' => date('h:i A', strtotime($apt->start_time)) . ' - ' . date('h:i A', strtotime($apt->end_time)),
                    'date_formatted' => date('l, d M Y', strtotime($apt->booking_date)),
                    'amount' => format_currency($apt->final_amount),
                    'status' => $apt->status,
                    'status_label' => ucfirst(str_replace('_', ' ', $apt->status)),
                    'view_url' => admin_url('appointments/view/' . $apt->id),
                    'pos_url' => admin_url('pos?appointment_id=' . $apt->id)
                )
            );
        }

        $today = date('Y-m-d');
        $data['events_json'] = json_encode($events);
        $data['staff_members'] = $this->db->where('status', 'active')->get('staff')->result();
        $data['rooms'] = $this->db->where('status', 'available')->get('rooms')->result();
        $data['selected_staff'] = $staff_id;
        $data['selected_status'] = $status;
        $data['selected_room'] = $room_id;

        // Metrics for Quick Header Stats
        $data['today_count'] = $this->db->where('booking_date', $today)->count_all_results('appointments');
        $data['confirmed_count'] = $this->db->where('status', 'confirmed')->where('booking_date >=', $today)->count_all_results('appointments');
        $data['pending_count'] = $this->db->where('status', 'pending')->count_all_results('appointments');
        $data['active_staff_count'] = count($data['staff_members']);

        // Today's Upcoming Schedule Timeline
        $data['today_schedule'] = $this->db->select('a.*, c.name as customer_name, s.name as staff_name, r.room_name')
                                           ->from('appointments a')
                                           ->join('customers c', 'c.id = a.customer_id', 'left')
                                           ->join('staff s', 's.id = a.staff_id', 'left')
                                           ->join('rooms r', 'r.id = a.room_id', 'left')
                                           ->where('a.booking_date', $today)
                                           ->order_by('a.start_time', 'ASC')
                                           ->limit(6)
                                           ->get()->result();

        $this->render('appointments/calendar', $data, 'Appointment Schedule Calendar');
    }

    /**
     * Walk-ins & Real-time Queue
     */
    public function walkins() {
        $today = date('Y-m-d');
        $data['queue'] = $this->db->select('a.*, c.name as customer_name, c.phone as customer_phone, s.name as staff_name, r.room_name')
                                  ->from('appointments a')
                                  ->join('customers c', 'c.id = a.customer_id', 'left')
                                  ->join('staff s', 's.id = a.staff_id', 'left')
                                  ->join('rooms r', 'r.id = a.room_id', 'left')
                                  ->where('a.booking_date', $today)
                                  ->where_in('a.status', array('pending', 'confirmed', 'in_service'))
                                  ->order_by('a.start_time', 'ASC')
                                  ->get()->result();

        $data['customers'] = $this->db->get('customers')->result();
        $data['services'] = $this->db->where('status', 'active')->get('services')->result();
        $data['staff_members'] = $this->db->where('status', 'active')->get('staff')->result();
        $data['rooms'] = $this->db->where('status', 'available')->get('rooms')->result();

        $this->render('appointments/walkins', $data, 'Walk-ins & Live Queue');
    }

    /**
     * Create / Book New Appointment with Overlap Prevention
     */
    public function create() {
        if ($this->input->method() === 'post') {
            $customer_id = (int)$this->input->post('customer_id');
            $new_customer_name = trim($this->input->post('new_customer_name', TRUE));
            $new_customer_phone = trim($this->input->post('new_customer_phone', TRUE));

            // If creating customer on-the-fly
            if (!$customer_id && !empty($new_customer_name) && !empty($new_customer_phone)) {
                $this->db->insert('customers', array(
                    'name' => $new_customer_name,
                    'phone' => $new_customer_phone,
                    'group_id' => 1
                ));
                $customer_id = $this->db->insert_id();
            }

            if (!$customer_id) {
                $this->session->set_flashdata('error', 'Please select or enter customer details.');
                redirect(admin_url('appointments/create'));
                return;
            }

            $service_id = (int)$this->input->post('service_id');
            $staff_id = $this->input->post('staff_id') ? (int)$this->input->post('staff_id') : NULL;
            $room_id = $this->input->post('room_id') ? (int)$this->input->post('room_id') : NULL;
            $booking_date = $this->input->post('booking_date', TRUE);
            $start_time = $this->input->post('start_time', TRUE);
            $booking_source = $this->input->post('booking_source', TRUE) ? $this->input->post('booking_source', TRUE) : 'admin';
            $notes = $this->input->post('notes', TRUE);

            // Fetch service details for duration & price
            $service = $this->db->get_where('services', array('id' => $service_id))->row();
            if (!$service) {
                $this->session->set_flashdata('error', 'Please select a valid service.');
                redirect(admin_url('appointments/create'));
                return;
            }

            $duration = $service->duration ? (int)$service->duration : 45;
            $start_timestamp = strtotime($booking_date . ' ' . $start_time);
            $end_timestamp = $start_timestamp + ($duration * 60);
            $end_time = date('H:i:s', $end_timestamp);
            $formatted_start_time = date('H:i:s', $start_timestamp);

            // 1. Check Staff Overlap if staff selected
            if ($staff_id) {
                $conflict_staff = $this->db->where('staff_id', $staff_id)
                                           ->where('booking_date', $booking_date)
                                           ->where_in('status', array('pending', 'confirmed', 'in_service'))
                                           ->where('start_time <', $end_time)
                                           ->where('end_time >', $formatted_start_time)
                                           ->get('appointments')->row();
                if ($conflict_staff) {
                    $this->session->set_flashdata('error', 'The selected staff specialist is already booked during this time interval. Please choose another time or specialist.');
                    redirect(admin_url('appointments/create'));
                    return;
                }
            }

            // 2. Check Room Overlap if room selected
            if ($room_id) {
                $conflict_room = $this->db->where('room_id', $room_id)
                                          ->where('booking_date', $booking_date)
                                          ->where_in('status', array('pending', 'confirmed', 'in_service'))
                                          ->where('start_time <', $end_time)
                                          ->where('end_time >', $formatted_start_time)
                                          ->get('appointments')->row();
                if ($conflict_room) {
                    $this->session->set_flashdata('error', 'The selected treatment room is already booked for that time window. Please choose another room or time.');
                    redirect(admin_url('appointments/create'));
                    return;
                }
            }

            // Generate appointment number
            $apt_number = 'APT-' . date('Y') . '-' . strtoupper(substr(uniqid(), -5));

            $price = (float)$service->price;
            $tax = ($price * ((float)$service->tax_rate / 100));
            $final_amount = $price + $tax;

            // Insert Appointment
            $this->db->insert('appointments', array(
                'appointment_number' => $apt_number,
                'customer_id' => $customer_id,
                'staff_id' => $staff_id,
                'room_id' => $room_id,
                'booking_date' => $booking_date,
                'start_time' => $formatted_start_time,
                'end_time' => $end_time,
                'subtotal' => $price,
                'discount_amount' => 0.00,
                'tax_amount' => $tax,
                'final_amount' => $final_amount,
                'status' => 'confirmed',
                'booking_source' => $booking_source,
                'notes' => $notes
            ));

            $apt_id = $this->db->insert_id();

            // Insert Appointment Service
            $this->db->insert('appointment_services', array(
                'appointment_id' => $apt_id,
                'service_id' => $service_id,
                'staff_id' => $staff_id,
                'price' => $price,
                'tax' => $tax,
                'duration' => $duration
            ));

            // If room assigned, record room booking
            if ($room_id) {
                $this->db->insert('room_bookings', array(
                    'room_id' => $room_id,
                    'appointment_id' => $apt_id,
                    'start_time' => $booking_date . ' ' . $formatted_start_time,
                    'end_time' => $booking_date . ' ' . $end_time,
                    'status' => 'booked'
                ));
            }

            $this->session->set_flashdata('success', 'Appointment #' . $apt_number . ' successfully scheduled!');
            redirect(admin_url('appointments/view/' . $apt_id));
            return;
        }

        $data['customers'] = $this->db->order_by('name', 'ASC')->get('customers')->result();
        
        // Filter services by business type
        $btype = get_business_type();
        if ($btype === 'SALON') {
            $data['services'] = $this->db->where_in('type', array('salon', 'both'))->where('status', 'active')->get('services')->result();
        } elseif ($btype === 'SPA') {
            $data['services'] = $this->db->where_in('type', array('spa', 'both'))->where('status', 'active')->get('services')->result();
        } else {
            $data['services'] = $this->db->where('status', 'active')->get('services')->result();
        }

        $data['staff_members'] = $this->db->where('status', 'active')->get('staff')->result();
        $data['rooms'] = $this->db->where('status', 'available')->get('rooms')->result();

        $this->render('appointments/create', $data, 'Schedule New Appointment');
    }

    /**
     * View Appointment Details
     */
    public function view($id) {
        $appointment = $this->db->select('a.*, c.name as customer_name, c.phone as customer_phone, c.email as customer_email, s.name as staff_name, r.room_name')
                                ->from('appointments a')
                                ->join('customers c', 'c.id = a.customer_id', 'left')
                                ->join('staff s', 's.id = a.staff_id', 'left')
                                ->join('rooms r', 'r.id = a.room_id', 'left')
                                ->where('a.id', (int)$id)
                                ->get()->row();

        if (!$appointment) {
            $this->session->set_flashdata('error', 'Appointment not found.');
            redirect(admin_url('appointments'));
            return;
        }

        $data['appointment'] = $appointment;
        $data['services'] = $this->db->select('as.*, s.name as service_name, st.name as staff_name')
                                     ->from('appointment_services as')
                                     ->join('services s', 's.id = as.service_id', 'left')
                                     ->join('staff st', 'st.id = as.staff_id', 'left')
                                     ->where('as.appointment_id', (int)$id)
                                     ->get()->result();

        $data['invoice'] = $this->db->get_where('invoices', array('appointment_id' => (int)$id))->row();

        $this->render('appointments/view', $data, 'Appointment #' . $appointment->appointment_number);
    }

    /**
     * Status transition
     */
    public function change_status($id, $status) {
        $valid = array('pending', 'confirmed', 'in_service', 'completed', 'cancelled', 'no_show');
        if (in_array($status, $valid)) {
            $this->db->where('id', (int)$id)->update('appointments', array('status' => $status));
            $this->session->set_flashdata('success', 'Appointment status updated to ' . ucfirst(str_replace('_', ' ', $status)));
        }
        redirect($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : admin_url('appointments'));
    }
}
