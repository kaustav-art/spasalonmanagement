<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Services Master List
     */
    public function index() {
        $category_id = $this->input->get('category_id');
        $type = $this->input->get('type');

        $this->db->select('s.*, c.name as category_name')
                 ->from('services s')
                 ->join('service_categories c', 'c.id = s.category_id', 'left');

        if ($category_id) {
            $this->db->where('s.category_id', (int)$category_id);
        }
        if ($type) {
            $this->db->where('s.type', $type);
        }

        // Restrict by edition
        $btype = get_business_type();
        if ($btype === 'SALON') {
            $this->db->where_in('s.type', array('salon', 'both'));
        } elseif ($btype === 'SPA') {
            $this->db->where_in('s.type', array('spa', 'both'));
        }

        $data['services'] = $this->db->order_by('s.id', 'DESC')->get()->result();
        $data['categories'] = $this->db->where('status', 'active')->get('service_categories')->result();
        $data['current_category'] = $category_id;

        $this->render('services/index', $data, 'Services Catalog');
    }

    /**
     * Add Service
     */
    public function create() {
        if ($this->input->method() === 'post') {
            $name = trim($this->input->post('name', TRUE));
            $category_id = (int)$this->input->post('category_id');
            $price = (float)$this->input->post('price');
            $duration = (int)$this->input->post('duration');
            $tax_rate = (float)$this->input->post('tax_rate');
            $type = $this->input->post('type', TRUE);
            $requires_room = $this->input->post('requires_room') ? 1 : 0;
            $description = $this->input->post('description', TRUE);

            $slug = url_title($name, 'dash', TRUE);
            // Ensure unique slug
            $check = $this->db->get_where('services', array('slug' => $slug))->row();
            if ($check) $slug .= '-' . rand(10, 99);

            $this->db->insert('services', array(
                'category_id' => $category_id,
                'name' => $name,
                'slug' => $slug,
                'type' => $type ? $type : 'both',
                'price' => $price,
                'duration' => $duration ? $duration : 45,
                'tax_rate' => $tax_rate,
                'requires_room' => $requires_room,
                'description' => $description,
                'status' => 'active'
            ));

            $service_id = $this->db->insert_id();

            // Assign staff if provided
            $staff_ids = $this->input->post('staff_ids');
            if (!empty($staff_ids)) {
                foreach ($staff_ids as $sid) {
                    $this->db->insert('service_staff', array('service_id' => $service_id, 'staff_id' => (int)$sid));
                }
            }

            $this->session->set_flashdata('success', 'Service created successfully.');
            redirect(admin_url('services'));
            return;
        }

        $data['categories'] = $this->db->where('status', 'active')->get('service_categories')->result();
        $data['staff_members'] = $this->db->where('status', 'active')->get('staff')->result();
        $this->render('services/create', $data, 'Add New Service');
    }

    /**
     * Edit Service
     */
    public function edit($id) {
        $service = $this->db->get_where('services', array('id' => (int)$id))->row();
        if (!$service) {
            $this->session->set_flashdata('error', 'Service not found.');
            redirect(admin_url('services'));
            return;
        }

        if ($this->input->method() === 'post') {
            $this->db->where('id', (int)$id)->update('services', array(
                'category_id' => (int)$this->input->post('category_id'),
                'name' => $this->input->post('name', TRUE),
                'type' => $this->input->post('type', TRUE),
                'price' => (float)$this->input->post('price'),
                'duration' => (int)$this->input->post('duration'),
                'tax_rate' => (float)$this->input->post('tax_rate'),
                'requires_room' => $this->input->post('requires_room') ? 1 : 0,
                'description' => $this->input->post('description', TRUE)
            ));

            $this->session->set_flashdata('success', 'Service updated successfully.');
            redirect(admin_url('services'));
            return;
        }

        $data['service'] = $service;
        $data['categories'] = $this->db->where('status', 'active')->get('service_categories')->result();
        $this->render('services/edit', $data, 'Edit Service: ' . $service->name);
    }

    /**
     * Service Categories
     */
    public function categories() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);
            $type = $this->input->post('type', TRUE);
            $desc = $this->input->post('description', TRUE);
            $slug = url_title($name, 'dash', TRUE);

            $this->db->insert('service_categories', array(
                'name' => $name,
                'slug' => $slug,
                'type' => $type ? $type : 'both',
                'description' => $desc,
                'status' => 'active'
            ));

            $this->session->set_flashdata('success', 'Category created successfully.');
            redirect(admin_url('services/categories'));
            return;
        }

        $data['categories'] = $this->db->select('c.*, (SELECT COUNT(id) FROM services WHERE category_id = c.id) as total_services')
                                       ->from('service_categories c')
                                       ->get()->result();

        $this->render('services/categories', $data, 'Service Categories');
    }

    /**
     * Packages Management
     */
    public function packages() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);
            $price = (float)$this->input->post('price');
            $validity = (int)$this->input->post('validity_days');
            $sessions = (int)$this->input->post('total_sessions');
            $type = $this->input->post('type', TRUE);
            $desc = $this->input->post('description', TRUE);

            $this->db->insert('packages', array(
                'name' => $name,
                'slug' => url_title($name, 'dash', TRUE),
                'type' => $type ? $type : 'both',
                'price' => $price,
                'validity_days' => $validity ? $validity : 90,
                'total_sessions' => $sessions ? $sessions : 5,
                'description' => $desc,
                'status' => 'active'
            ));

            $this->session->set_flashdata('success', 'Treatment package created.');
            redirect(admin_url('services/packages'));
            return;
        }

        $data['packages'] = $this->db->get('packages')->result();
        $this->render('services/packages', $data, 'Treatment Packages & Bundles');
    }
}
