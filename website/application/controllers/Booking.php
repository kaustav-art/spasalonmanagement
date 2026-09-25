<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends Website_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Interactive Online Booking Page
     */
    public function index() {
        // Fetch categories & services according to business edition
        $this->db->select('s.*, s.duration as duration_minutes, c.name as category_name, c.type as category_type')
                 ->from('services s')
                 ->join('service_categories c', 'c.id = s.category_id', 'left')
                 ->where('s.status', 'active');

        if (!is_spa_enabled()) {
            $this->db->where('s.type !=', 'spa');
        } elseif (!is_salon_enabled()) {
            $this->db->where('s.type !=', 'salon');
        }

        $data['services'] = $this->db->order_by('c.name', 'ASC')->order_by('s.price', 'ASC')->get()->result();

        // Staff / Specialists
        $this->db->where('status', 'active');
        if (!is_spa_enabled()) {
            $this->db->where('role_type !=', 'therapist');
        } elseif (!is_salon_enabled()) {
            $this->db->where_in('role_type', array('therapist', 'beautician'));
        }
        $data['staff'] = $this->db->order_by('name', 'ASC')->get('staff')->result();

        // Spa Treatment Rooms (if spa enabled)
        $data['rooms'] = array();
        if (is_spa_enabled()) {
            $data['rooms'] = $this->db->where('status', 'available')->get('rooms')->result();
        }

        $this->render('booking', $data, 'Online Appointment Booking');
    }

    /**
     * AJAX: Get Dynamic Time Slots with Conflict Checking
     */
    public function get_slots() {
        $service_id = (int)$this->input->get('service_id');
        $staff_id = (int)$this->input->get('staff_id');
        $date = $this->input->get('date', TRUE);

        if (empty($date)) {
            $date = date('Y-m-d');
        }

        // Service Duration
        $duration = 45; // default minutes
        if ($service_id > 0) {
            $svc = $this->db->where('id', $service_id)->get('services')->row();
            if ($svc) $duration = (int)$svc->duration;
        }

        // Store Opening & Closing hours
        $open_time = get_setting('business_open_time', '09:00');
        $close_time = get_setting('business_close_time', '20:00');
        $step_mins = (int)get_setting('booking_time_step', 30);
        if ($step_mins <= 0) $step_mins = 30;

        $start_timestamp = strtotime($date . ' ' . $open_time);
        $end_timestamp = strtotime($date . ' ' . $close_time);

        // Fetch existing bookings for conflict avoidance
        $this->db->select('start_time, end_time, staff_id, room_id')
                 ->from('appointments')
                 ->where('booking_date', $date)
                 ->where_in('status', array('pending', 'confirmed', 'in_service'));

        if ($staff_id > 0) {
            $this->db->where('staff_id', $staff_id);
        }

        $existing_bookings = $this->db->get()->result();

        $slots = array();
        $current = $start_timestamp;

        // If today, cannot book slots in past
        $now = time();

        while ($current + ($duration * 60) <= $end_timestamp) {
            $slot_start_time = date('H:i:s', $current);
            $slot_end_time = date('H:i:s', $current + ($duration * 60));

            $is_available = true;

            // Check if in the past
            if ($date == date('Y-m-d') && $current <= ($now + 900)) { // 15 mins advance
                $is_available = false;
            }

            if ($is_available) {
                // Check overlaps
                foreach ($existing_bookings as $b) {
                    $b_start = strtotime($date . ' ' . $b->start_time);
                    $b_end = strtotime($date . ' ' . $b->end_time);

                    if (($current < $b_end) && (($current + ($duration * 60)) > $b_start)) {
                        $is_available = false;
                        break;
                    }
                }
            }

            $slots[] = array(
                'time' => date('H:i', $current),
                'label' => date('g:i A', $current),
                'available' => $is_available
            );

            $current += ($step_mins * 60);
        }

        $this->json(array(
            'status' => 'success',
            'date' => $date,
            'duration' => $duration,
            'slots' => $slots
        ));
    }

    /**
     * Process Online Booking Submission
     */
    public function submit() {
        if ($this->input->method() !== 'post') {
            $this->json(array('status' => 'error', 'message' => 'Invalid request method.'), 400);
        }

        $service_id = (int)$this->input->post('service_id');
        $staff_id = (int)$this->input->post('staff_id');
        $room_id = (int)$this->input->post('room_id');
        $booking_date = $this->input->post('booking_date', TRUE);
        $start_time = $this->input->post('start_time', TRUE);
        $name = trim($this->input->post('name', TRUE));
        $phone = trim($this->input->post('phone', TRUE));
        $email = trim($this->input->post('email', TRUE));
        $notes = trim($this->input->post('notes', TRUE));

        // Validation
        if (empty($service_id) || empty($booking_date) || empty($start_time) || empty($name) || empty($phone)) {
            $this->json(array('status' => 'error', 'message' => 'Please fill in all required fields (Service, Date, Time Slot, Name, Phone).'), 422);
        }

        // Service check
        $service = $this->db->select('s.*, c.name as category_name')
                            ->from('services s')
                            ->join('service_categories c', 'c.id = s.category_id', 'left')
                            ->where('s.id', $service_id)
                            ->get()->row();
        if (!$service) {
            $this->json(array('status' => 'error', 'message' => 'Selected service was not found.'), 404);
        }

        $duration = (int)$service->duration;
        if ($duration <= 0) $duration = 45;
        $start_ts = strtotime($booking_date . ' ' . $start_time);
        $end_ts = $start_ts + ($duration * 60);
        $end_time = date('H:i:s', $end_ts);
        $start_time_fmt = date('H:i:s', $start_ts);

        // Conflict check for staff
        if ($staff_id > 0) {
            $conflict = $this->db->select('id')
                                 ->from('appointments')
                                 ->where('booking_date', $booking_date)
                                 ->where('staff_id', $staff_id)
                                 ->where_in('status', array('pending', 'confirmed', 'in_service'))
                                 ->where("start_time < '$end_time' AND end_time > '$start_time_fmt'", NULL, FALSE)
                                 ->get()->row();
            if ($conflict) {
                $this->json(array('status' => 'error', 'message' => 'The selected staff member is already booked at that time. Please pick another time slot or therapist.'), 409);
            }
        }

        // If spa room is requested/assigned, check room conflict
        if ($room_id > 0) {
            $room_conflict = $this->db->select('id')
                                      ->from('appointments')
                                      ->where('booking_date', $booking_date)
                                      ->where('room_id', $room_id)
                                      ->where_in('status', array('pending', 'confirmed', 'in_service'))
                                      ->where("start_time < '$end_time' AND end_time > '$start_time_fmt'", NULL, FALSE)
                                      ->get()->row();
            if ($room_conflict) {
                $this->json(array('status' => 'error', 'message' => 'The selected spa treatment room is already occupied for this time slot. Please choose another slot or room.'), 409);
            }
        } elseif (is_spa_enabled() && ($service->type === 'spa' || $service->requires_room == 1)) {
            // Auto-assign available room if spa
            $available_room = $this->db->where('status', 'available')->get('rooms')->row();
            if ($available_room) {
                $room_id = $available_room->id;
            }
        }

        // Find or create customer
        $customer = $this->db->where('phone', $phone)->get('customers')->row();
        if ($customer) {
            $customer_id = $customer->id;
            // Update email if not present
            if (empty($customer->email) && !empty($email)) {
                $this->db->where('id', $customer_id)->update('customers', array('email' => $email));
            }
        } else {
            $this->db->insert('customers', array(
                'group_id' => 1,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'loyalty_points' => 0
            ));
            $customer_id = $this->db->insert_id();
        }

        // Pricing & Tax calculations
        $tax_rate = (float)get_setting('tax_rate', 8.5);
        $subtotal = (float)$service->price;
        $tax_amount = round(($subtotal * $tax_rate) / 100, 2);
        $final_amount = $subtotal + $tax_amount;

        // Auto-confirm status check
        $auto_confirm = get_setting('auto_confirm_booking', 0);
        $initial_status = ($auto_confirm == 1) ? 'confirmed' : 'pending';

        // Generate Booking Code
        $appointment_number = 'APT-' . date('Y') . '-' . strtoupper(substr(uniqid(), -5));

        // Insert Appointment
        $this->db->insert('appointments', array(
            'appointment_number' => $appointment_number,
            'customer_id' => $customer_id,
            'staff_id' => $staff_id > 0 ? $staff_id : NULL,
            'room_id' => $room_id > 0 ? $room_id : NULL,
            'booking_date' => $booking_date,
            'start_time' => $start_time_fmt,
            'end_time' => $end_time,
            'subtotal' => $subtotal,
            'discount_amount' => 0.00,
            'tax_amount' => $tax_amount,
            'final_amount' => $final_amount,
            'status' => $initial_status,
            'booking_source' => 'online',
            'notes' => $notes
        ));
        $appointment_id = $this->db->insert_id();

        // Insert Service Item
        $this->db->insert('appointment_services', array(
            'appointment_id' => $appointment_id,
            'service_id' => $service_id,
            'staff_id' => $staff_id > 0 ? $staff_id : NULL,
            'price' => $subtotal,
            'tax' => $tax_amount,
            'duration' => $duration
        ));

        // If room assigned, record room booking
        if ($room_id > 0) {
            $this->db->insert('room_bookings', array(
                'room_id' => $room_id,
                'appointment_id' => $appointment_id,
                'start_time' => $booking_date . ' ' . $start_time_fmt,
                'end_time' => $booking_date . ' ' . $end_time,
                'status' => 'booked'
            ));
        }

        $this->json(array(
            'status' => 'success',
            'booking_code' => $appointment_number,
            'booking_status' => ucfirst($initial_status),
            'service_name' => $service->name,
            'date' => date('l, F j, Y', strtotime($booking_date)),
            'time' => date('g:i A', $start_ts) . ' - ' . date('g:i A', $end_ts),
            'total' => format_currency($final_amount),
            'message' => 'Your appointment has been booked successfully! Booking Code: #' . $appointment_number
        ));
    }
}
