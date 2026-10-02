<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * List all products (retail & consumables)
     */
    public function index() {
        $filter_category = $this->input->get('category_id');
        $filter_type = $this->input->get('type');
        $filter_stock = $this->input->get('stock'); // 'low'

        $this->db->select('p.*, c.name as category_name, u.short_name as unit_name')
                 ->from('products p')
                 ->join('product_categories c', 'c.id = p.category_id', 'left')
                 ->join('units u', 'u.id = p.unit_id', 'left');

        if (!empty($filter_category)) {
            $this->db->where('p.category_id', (int)$filter_category);
        }
        if (!empty($filter_type)) {
            $this->db->where('p.product_type', $filter_type);
        }
        if ($filter_stock === 'low') {
            $this->db->where('p.current_stock <= p.min_alert_stock', NULL, FALSE);
        }

        $data['products'] = $this->db->order_by('p.name', 'ASC')->get()->result();
        $data['categories'] = $this->db->order_by('name', 'ASC')->get('product_categories')->result();
        $data['filter_category'] = $filter_category;
        $data['filter_type'] = $filter_type;
        $data['filter_stock'] = $filter_stock;

        $this->render('inventory/index', $data, 'Inventory & Products');
    }

    public function products() {
        $this->index();
    }

    /**
     * Add new Product
     */
    public function create() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);
            $sku = $this->input->post('sku', TRUE);
            if (empty($sku)) {
                $sku = 'SKU-' . strtoupper(substr(preg_replace('/[^a-zA-Z0-9]/', '', $name), 0, 4)) . '-' . rand(100, 999);
            }
            $barcode = $this->input->post('barcode', TRUE);
            $category_id = (int)$this->input->post('category_id');
            $unit_id = (int)$this->input->post('unit_id');
            $product_type = $this->input->post('product_type', TRUE);
            $cost_price = (float)$this->input->post('cost_price');
            $selling_price = (float)$this->input->post('selling_price');
            $current_stock = (int)$this->input->post('current_stock');
            $min_alert_stock = (int)$this->input->post('min_alert_stock');
            $description = $this->input->post('description', TRUE);

            $this->db->insert('products', array(
                'category_id' => $category_id,
                'unit_id' => $unit_id ? $unit_id : 2,
                'name' => $name,
                'sku' => $sku,
                'barcode' => $barcode,
                'product_type' => in_array($product_type, array('retail', 'consumable')) ? $product_type : 'retail',
                'cost_price' => $cost_price,
                'selling_price' => $selling_price,
                'current_stock' => $current_stock,
                'min_alert_stock' => $min_alert_stock > 0 ? $min_alert_stock : 5,
                'description' => $description,
                'status' => 'active'
            ));

            $product_id = $this->db->insert_id();

            // Record initial stock transaction
            if ($current_stock > 0) {
                $this->db->insert('inventory_transactions', array(
                    'product_id' => $product_id,
                    'transaction_type' => 'adjustment_in',
                    'quantity' => $current_stock,
                    'notes' => 'Initial stock on product creation'
                ));
            }

            $this->session->set_flashdata('success', 'Product created successfully.');
            redirect(admin_url('inventory'));
            return;
        }

        $data['categories'] = $this->db->order_by('name', 'ASC')->get('product_categories')->result();
        $data['units'] = $this->db->get('units')->result();
        $this->render('inventory/create', $data, 'Add New Product');
    }

    /**
     * Edit Product
     */
    public function edit($id) {
        $product = $this->db->where('id', (int)$id)->get('products')->row();
        if (!$product) {
            $this->session->set_flashdata('error', 'Product not found.');
            redirect(admin_url('inventory'));
            return;
        }

        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);
            $sku = $this->input->post('sku', TRUE);
            $barcode = $this->input->post('barcode', TRUE);
            $category_id = (int)$this->input->post('category_id');
            $unit_id = (int)$this->input->post('unit_id');
            $product_type = $this->input->post('product_type', TRUE);
            $cost_price = (float)$this->input->post('cost_price');
            $selling_price = (float)$this->input->post('selling_price');
            $current_stock = (int)$this->input->post('current_stock');
            $min_alert_stock = (int)$this->input->post('min_alert_stock');
            $description = $this->input->post('description', TRUE);
            $status = $this->input->post('status', TRUE);

            $this->db->where('id', $id)->update('products', array(
                'category_id' => $category_id,
                'unit_id' => $unit_id,
                'name' => $name,
                'sku' => $sku,
                'barcode' => $barcode,
                'product_type' => $product_type,
                'cost_price' => $cost_price,
                'selling_price' => $selling_price,
                'current_stock' => $current_stock,
                'min_alert_stock' => $min_alert_stock,
                'description' => $description,
                'status' => in_array($status, array('active', 'inactive')) ? $status : 'active'
            ));

            $this->session->set_flashdata('success', 'Product updated successfully.');
            redirect(admin_url('inventory'));
            return;
        }

        $data['product'] = $product;
        $data['categories'] = $this->db->order_by('name', 'ASC')->get('product_categories')->result();
        $data['units'] = $this->db->get('units')->result();
        $this->render('inventory/edit', $data, 'Edit Product');
    }

    /**
     * Delete Product
     */
    public function delete($id) {
        $this->db->where('id', (int)$id)->delete('products');
        $this->session->set_flashdata('success', 'Product removed successfully.');
        redirect(admin_url('inventory'));
    }

    /**
     * Categories
     */
    public function categories() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);
            $description = $this->input->post('description', TRUE);
            $cat_id = (int)$this->input->post('category_id');

            if ($cat_id > 0) {
                $this->db->where('id', $cat_id)->update('product_categories', array(
                    'name' => $name,
                    'description' => $description
                ));
                $this->session->set_flashdata('success', 'Category updated.');
            } else {
                $this->db->insert('product_categories', array(
                    'name' => $name,
                    'description' => $description
                ));
                $this->session->set_flashdata('success', 'Category added.');
            }
            redirect(admin_url('inventory/categories'));
            return;
        }

        $data['categories'] = $this->db->get('product_categories')->result();
        $this->render('inventory/categories', $data, 'Product Categories');
    }

    /**
     * Suppliers Management
     */
    public function suppliers() {
        if ($this->input->method() === 'post') {
            $id = (int)$this->input->post('supplier_id');
            $name = $this->input->post('name', TRUE);
            $company_name = $this->input->post('company_name', TRUE);
            $email = $this->input->post('email', TRUE);
            $phone = $this->input->post('phone', TRUE);
            $address = $this->input->post('address', TRUE);

            if ($id > 0) {
                $this->db->where('id', $id)->update('suppliers', array(
                    'name' => $name,
                    'company_name' => $company_name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address
                ));
                $this->session->set_flashdata('success', 'Supplier updated successfully.');
            } else {
                $this->db->insert('suppliers', array(
                    'name' => $name,
                    'company_name' => $company_name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address
                ));
                $this->session->set_flashdata('success', 'Supplier registered successfully.');
            }
            redirect(admin_url('inventory/suppliers'));
            return;
        }

        $data['suppliers'] = $this->db->order_by('name', 'ASC')->get('suppliers')->result();
        $this->render('inventory/suppliers', $data, 'Suppliers & Vendors');
    }

    /**
     * Stock Adjustments & Transaction History
     */
    public function adjustments() {
        if ($this->input->method() === 'post') {
            $product_id = (int)$this->input->post('product_id');
            $type = $this->input->post('transaction_type', TRUE);
            $quantity = abs((int)$this->input->post('quantity'));
            $notes = $this->input->post('notes', TRUE);

            $product = $this->db->where('id', $product_id)->get('products')->row();
            if ($product && $quantity > 0) {
                if (in_array($type, array('adjustment_in', 'purchase'))) {
                    $new_stock = $product->current_stock + $quantity;
                } else {
                    $new_stock = max(0, $product->current_stock - $quantity);
                }

                $this->db->where('id', $product_id)->update('products', array('current_stock' => $new_stock));

                $this->db->insert('inventory_transactions', array(
                    'product_id' => $product_id,
                    'transaction_type' => $type,
                    'quantity' => $quantity,
                    'notes' => $notes
                ));

                $this->session->set_flashdata('success', 'Stock adjustment recorded successfully.');
            }
            redirect(admin_url('inventory/adjustments'));
            return;
        }

        $data['products'] = $this->db->where('status', 'active')->order_by('name', 'ASC')->get('products')->result();
        $data['transactions'] = $this->db->select('t.*, p.name as product_name, p.sku')
                                         ->from('inventory_transactions t')
                                         ->join('products p', 'p.id = t.product_id', 'left')
                                         ->order_by('t.id', 'DESC')
                                         ->limit(50)
                                         ->get()->result();

        $this->render('inventory/adjustments', $data, 'Stock Adjustments & Log');
    }
}
