<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends Superadmin_Controller {

    public function index() {
        if ($this->input->method() === 'post') {
            $action = $this->input->post('action', TRUE);

            if ($action === 'update_plan') {
                $plan_id = (int)$this->input->post('plan_id');
                $name = $this->input->post('name', TRUE);
                $tagline = $this->input->post('tagline', TRUE);
                $badge = $this->input->post('badge', TRUE);
                $price = (float)$this->input->post('price');
                $original_price = (float)$this->input->post('original_price');
                $description = $this->input->post('description', TRUE);
                $features_raw = $this->input->post('features', TRUE);
                $status = $this->input->post('status', TRUE);
                $sort_order = (int)$this->input->post('sort_order');

                $features_array = array_filter(array_map('trim', explode("\n", $features_raw)));
                $features_json = json_encode(array_values($features_array));

                if ($plan_id > 0) {
                    $this->db->where('id', $plan_id)->update('marketplace_plans', array(
                        'name' => $name,
                        'tagline' => $tagline,
                        'badge' => $badge,
                        'price' => $price,
                        'original_price' => $original_price,
                        'description' => $description,
                        'features' => $features_json,
                        'status' => in_array($status, array('active', 'inactive')) ? $status : 'active',
                        'sort_order' => $sort_order
                    ));
                    $this->session->set_flashdata('success', 'Plan details and purchase card updated successfully.');
                }
            }

            redirect(superadmin_url('plans'));
            return;
        }

        $data['plans'] = $this->db->order_by('sort_order', 'ASC')->get('marketplace_plans')->result();
        $this->render('plans/index', $data, 'Manage Pricing Plans & Purchase Cards');
    }
}
