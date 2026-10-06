<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * General Business Settings (Single Menu)
     */
    public function index() {
        if ($this->input->method() === 'post') {
            // Editable keys - STRICTLY EXCLUDES business_email and domain so they can never be modified
            $allowed_keys = array(
                'business_name', 'business_tagline', 'business_phone',
                'business_address', 'currency_symbol', 'currency_code', 'currency_position',
                'tax_name', 'tax_rate', 'business_open_time', 'business_close_time',
                'booking_time_step', 'advance_booking_days', 'auto_confirm_booking',
                'facebook_url', 'instagram_url', 'twitter_url', 'youtube_url', 'footer_about'
            );

            foreach ($allowed_keys as $key) {
                if ($this->input->post($key) !== NULL) {
                    set_setting($key, $this->input->post($key, TRUE));
                }
            }

            // Handle Branding Logo Upload
            if (isset($_FILES['company_logo']) && $_FILES['company_logo']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['company_logo']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'svg'))) {
                    $new_name = 'logo_' . time() . '.' . $ext;
                    $admin_upload_dir = FCPATH . 'uploads/branding/';
                    if (!is_dir($admin_upload_dir)) {
                        @mkdir($admin_upload_dir, 0755, true);
                    }
                    $dest_admin = $admin_upload_dir . $new_name;
                    if (@move_uploaded_file($_FILES['company_logo']['tmp_name'], $dest_admin)) {
                        $rel_path = 'uploads/branding/' . $new_name;
                        set_setting('business_logo', $rel_path);
                        set_setting('logo', $rel_path);
                        set_setting('landing_site_logo', $rel_path);
                        set_setting('site_logo', $rel_path);

                        // If tenant has website root parallel to admin directory
                        $web_upload_dir = dirname(FCPATH) . '/uploads/branding/';
                        if (is_dir($web_upload_dir) || @mkdir($web_upload_dir, 0755, true)) {
                            @copy($dest_admin, $web_upload_dir . $new_name);
                        }
                    }
                }
            }

            // Handle Branding Favicon Upload
            if (isset($_FILES['company_favicon']) && $_FILES['company_favicon']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['company_favicon']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'ico', 'svg'))) {
                    $new_name = 'favicon_' . time() . '.' . $ext;
                    $admin_upload_dir = FCPATH . 'uploads/branding/';
                    if (!is_dir($admin_upload_dir)) {
                        @mkdir($admin_upload_dir, 0755, true);
                    }
                    $dest_admin = $admin_upload_dir . $new_name;
                    if (@move_uploaded_file($_FILES['company_favicon']['tmp_name'], $dest_admin)) {
                        $rel_path = 'uploads/branding/' . $new_name;
                        set_setting('business_favicon', $rel_path);
                        set_setting('favicon', $rel_path);
                        set_setting('landing_site_favicon', $rel_path);
                        set_setting('site_favicon', $rel_path);

                        // If tenant has website root parallel to admin directory
                        $web_upload_dir = dirname(FCPATH) . '/uploads/branding/';
                        if (is_dir($web_upload_dir) || @mkdir($web_upload_dir, 0755, true)) {
                            @copy($dest_admin, $web_upload_dir . $new_name);
                        }
                    }
                }
            }

            $this->session->set_flashdata('success', 'Business settings updated successfully.');
            redirect(admin_url('settings'));
            return;
        }

        $this->render('settings/index', array(), 'General Business Settings');
    }

    /**
     * Plan Renewal (Extends plan validity - No Upgrade/Downgrade allowed)
     */
    public function renew_plan() {
        if ($this->input->method() === 'post') {
            $term = $this->input->post('renewal_term', TRUE);
            if (!in_array($term, array('1_month', '6_months', '1_year'))) {
                $term = '1_year';
            }

            $interval = '+1 year';
            if ($term === '1_month') $interval = '+1 month';
            if ($term === '6_months') $interval = '+6 months';

            $current_expiry = get_setting('subscription_expires_at');
            $base_time = ($current_expiry && strtotime($current_expiry) > time()) ? strtotime($current_expiry) : time();
            $new_expiry = date('Y-m-d H:i:s', strtotime($interval, $base_time));

            set_setting('subscription_expires_at', $new_expiry);
            set_setting('subscription_status', 'active');

            // Sync with master platform DB saas_tenants if available
            try {
                $master_pdo = new PDO('mysql:host=localhost;dbname=spasalon_db;charset=utf8mb4', 'root', '', array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT
                ));
                $tenant_domain = get_setting('domain', '');
                if ($tenant_domain) {
                    $stmt = $master_pdo->prepare("UPDATE saas_tenants SET status = 'active', expires_at = ? WHERE domain = ?");
                    $stmt->execute(array($new_expiry, $tenant_domain));
                }
            } catch (Exception $e) {
                // Ignore silent master sync error
            }

            $this->session->set_flashdata('success', 'Subscription plan renewed successfully until ' . date('d M Y', strtotime($new_expiry)) . '!');
        }

        redirect(admin_url('settings'));
    }

    /**
     * Business Type / Edition Management - Redirects to settings
     */
    public function business_type() {
        redirect(admin_url('settings'));
    }

    /**
     * System Information
     */
    public function system() {
        $data['php_version'] = PHP_VERSION;
        $data['db_version'] = $this->db->version();
        $data['server_software'] = isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : 'Apache';
        $data['upload_max'] = ini_get('upload_max_filesize');
        $data['post_max'] = ini_get('post_max_size');
        $data['memory_limit'] = ini_get('memory_limit');

        $this->render('settings/system', $data, 'System Status & Environment');
    }
}
