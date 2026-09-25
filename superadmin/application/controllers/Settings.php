<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Superadmin_Controller {

    public function index() {
        if ($this->input->method() === 'post') {
            $action = $this->input->post('action', TRUE);
            $active_tab = $this->input->post('active_tab', TRUE);
            if (!$active_tab) $active_tab = 'currency';

            if ($action === 'update_general_currency') {
                $support_email = $this->input->post('support_email', TRUE);
                $currency_symbol = $this->input->post('currency_symbol', TRUE);
                $currency_code = strtoupper(trim($this->input->post('currency_code', TRUE)));
                $currency_position = $this->input->post('currency_position', TRUE);
                $currency_decimals = $this->input->post('currency_decimals', TRUE);
                $demo_mode = $this->input->post('demo_mode', TRUE);
                $timezone = $this->input->post('timezone', TRUE);

                set_setting('support_email', $support_email, 'general');
                set_setting('currency_symbol', $currency_symbol, 'localization');
                set_setting('currency_code', !empty($currency_code) ? $currency_code : 'USD', 'localization');
                set_setting('currency_position', in_array($currency_position, array('left', 'right')) ? $currency_position : 'left', 'localization');
                set_setting('currency_decimals', in_array($currency_decimals, array('0', '2')) ? $currency_decimals : '2', 'localization');
                set_setting('demo_mode', $demo_mode === '1' ? '1' : '0', 'general');
                if (!empty($timezone)) {
                    set_setting('timezone', $timezone, 'localization');
                }

                $this->session->set_flashdata('success', 'General & Dynamic Currency settings saved successfully.');
                redirect(superadmin_url('settings?tab=currency'));
                return;

            } elseif ($action === 'update_payment_gateways') {
                // Ensure only ONE active payment gateway
                $active_gw = $this->input->post('active_payment_gateway', TRUE);
                $valid_gws = array('stripe', 'razorpay', 'payu', 'offline');
                if (!in_array($active_gw, $valid_gws)) {
                    $active_gw = 'stripe';
                }
                set_setting('active_payment_gateway', $active_gw, 'payment');

                // Stripe Settings
                set_setting('gateway_stripe_publishable_key', trim($this->input->post('gateway_stripe_publishable_key')), 'payment');
                set_setting('gateway_stripe_secret_key', trim($this->input->post('gateway_stripe_secret_key')), 'payment');
                set_setting('gateway_stripe_mode', $this->input->post('gateway_stripe_mode') === 'live' ? 'live' : 'test', 'payment');
                set_setting('gateway_stripe_webhook_secret', trim($this->input->post('gateway_stripe_webhook_secret')), 'payment');

                // Razorpay Settings
                set_setting('gateway_razorpay_key_id', trim($this->input->post('gateway_razorpay_key_id')), 'payment');
                set_setting('gateway_razorpay_key_secret', trim($this->input->post('gateway_razorpay_key_secret')), 'payment');
                set_setting('gateway_razorpay_mode', $this->input->post('gateway_razorpay_mode') === 'live' ? 'live' : 'test', 'payment');

                // PayU Settings
                set_setting('gateway_payu_merchant_key', trim($this->input->post('gateway_payu_merchant_key')), 'payment');
                set_setting('gateway_payu_merchant_salt', trim($this->input->post('gateway_payu_merchant_salt')), 'payment');
                set_setting('gateway_payu_mode', $this->input->post('gateway_payu_mode') === 'live' ? 'live' : 'test', 'payment');

                $this->session->set_flashdata('success', 'Payment Gateway settings updated! Active gateway: ' . strtoupper($active_gw) . ' (Only one active gateway is applicable).');
                redirect(superadmin_url('settings?tab=gateways'));
                return;

            } elseif ($action === 'update_smtp_email') {
                set_setting('smtp_status', $this->input->post('smtp_status') === 'enabled' ? 'enabled' : 'disabled', 'email');
                set_setting('smtp_host', trim($this->input->post('smtp_host')), 'email');
                set_setting('smtp_port', trim($this->input->post('smtp_port')), 'email');
                set_setting('smtp_user', trim($this->input->post('smtp_user')), 'email');
                
                $pass = $this->input->post('smtp_pass');
                if (!empty($pass)) {
                    set_setting('smtp_pass', $pass, 'email');
                }
                
                set_setting('smtp_crypto', in_array($this->input->post('smtp_crypto'), array('tls', 'ssl', 'none')) ? $this->input->post('smtp_crypto') : 'tls', 'email');
                set_setting('smtp_from_email', trim($this->input->post('smtp_from_email')), 'email');
                set_setting('smtp_from_name', trim($this->input->post('smtp_from_name')), 'email');

                $this->session->set_flashdata('success', 'SMTP Email Gateway configuration updated successfully.');
                redirect(superadmin_url('settings?tab=smtp'));
                return;

            } elseif ($action === 'test_smtp_email') {
                $test_email = trim($this->input->post('test_email', TRUE));
                if (!filter_var($test_email, FILTER_VALIDATE_EMAIL)) {
                    $this->session->set_flashdata('error', 'Please provide a valid recipient email address for testing.');
                    redirect(superadmin_url('settings?tab=smtp'));
                    return;
                }

                $smtp_host = get_setting('smtp_host', 'smtp.gmail.com');
                $smtp_port = (int)get_setting('smtp_port', '587');
                $smtp_user = get_setting('smtp_user', '');
                $smtp_pass = get_setting('smtp_pass', '');
                $smtp_crypto = get_setting('smtp_crypto', 'tls');
                $from_email = get_setting('smtp_from_email', 'noreply@spasalon.com');
                $from_name = get_setting('smtp_from_name', 'Luxe Salon & Spa');

                // Load CodeIgniter Email library
                $this->load->library('email');
                $config = array(
                    'protocol'    => 'smtp',
                    'smtp_host'   => ($smtp_crypto === 'ssl' ? 'ssl://' : '') . $smtp_host,
                    'smtp_port'   => $smtp_port,
                    'smtp_user'   => $smtp_user,
                    'smtp_pass'   => $smtp_pass,
                    'smtp_crypto' => $smtp_crypto === 'none' ? '' : $smtp_crypto,
                    'mailtype'    => 'html',
                    'charset'     => 'utf-8',
                    'newline'     => "\r\n",
                    'crlf'        => "\r\n"
                );

                $this->email->initialize($config);
                $this->email->from($from_email, $from_name);
                $this->email->to($test_email);
                $this->email->subject('Luxe Platform - SMTP Gateway Test Verification');
                $this->email->message('
                    <div style="font-family: Arial, sans-serif; padding: 20px; background: #f8fafc; border-radius: 8px;">
                        <h2 style="color: #c29958;">Luxe Platform SMTP Test Email</h2>
                        <p>Congratulations! Your SMTP Gateway is configured correctly and functioning properly on <strong>' . date('Y-m-d H:i:s') . '</strong>.</p>
                        <p><strong>Host:</strong> ' . htmlspecialchars($smtp_host) . '<br>
                        <strong>Port:</strong> ' . htmlspecialchars($smtp_port) . '<br>
                        <strong>Encryption:</strong> ' . htmlspecialchars($smtp_crypto) . '<br>
                        <strong>Sender:</strong> ' . htmlspecialchars($from_email) . '</p>
                    </div>
                ');

                if (@$this->email->send()) {
                    $this->session->set_flashdata('success', 'Test email was dispatched successfully to ' . htmlspecialchars($test_email) . '!');
                } else {
                    $err = $this->email->print_debugger(array('headers'));
                    $clean_err = strip_tags($err);
                    $this->session->set_flashdata('error', 'SMTP Dispatch failed. Error summary: ' . substr($clean_err, 0, 200));
                }

                redirect(superadmin_url('settings?tab=smtp'));
                return;

            } elseif ($action === 'update_google_oauth') {
                set_setting('google_oauth_status', $this->input->post('google_oauth_status') === 'enabled' ? 'enabled' : 'disabled', 'oauth');
                set_setting('google_oauth_client_id', trim($this->input->post('google_oauth_client_id')), 'oauth');
                
                $secret = trim($this->input->post('google_oauth_client_secret'));
                if (!empty($secret)) {
                    set_setting('google_oauth_client_secret', $secret, 'oauth');
                }
                
                set_setting('google_oauth_redirect_uri', trim($this->input->post('google_oauth_redirect_uri')), 'oauth');

                $this->session->set_flashdata('success', 'Google OAuth credentials updated successfully.');
                redirect(superadmin_url('settings?tab=oauth'));
                return;

            } elseif ($action === 'clear_cache') {
                $cache_path = APPPATH . 'cache/';
                $files = glob($cache_path . '*');
                $count = 0;
                foreach ($files as $file) {
                    if (is_file($file) && basename($file) !== 'index.html' && basename($file) !== '.htaccess') {
                        @unlink($file);
                        $count++;
                    }
                }
                $this->session->set_flashdata('success', 'Cleared ' . $count . ' cache file(s).');
                redirect(superadmin_url('settings?tab=system'));
                return;
            }
        }

        // Diagnostics
        $data['php_version'] = phpversion();
        $data['server_software'] = isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : 'Apache/PHP';
        $data['memory_limit'] = ini_get('memory_limit');
        $data['max_execution_time'] = ini_get('max_execution_time') . 's';
        $data['upload_max_filesize'] = ini_get('upload_max_filesize');
        
        // Database stats
        $tables = $this->db->query("SHOW TABLE STATUS")->result();
        $data['tables'] = $tables;
        $total_size = 0;
        foreach ($tables as $t) {
            $total_size += ($t->Data_length + $t->Index_length);
        }
        $data['total_db_size_mb'] = round($total_size / (1024 * 1024), 2);

        // Load all platform settings
        $settings_query = $this->db->get('business_settings')->result();
        $settings = array();
        foreach ($settings_query as $row) {
            $settings[$row->setting_key] = $row->setting_value;
        }
        $data['settings'] = $settings;

        // Shortcuts
        $data['support_email'] = isset($settings['support_email']) ? $settings['support_email'] : 'support@spasalon.com';
        $data['currency_symbol'] = isset($settings['currency_symbol']) ? $settings['currency_symbol'] : '$';
        $data['currency_code'] = isset($settings['currency_code']) ? $settings['currency_code'] : 'USD';
        $data['currency_position'] = isset($settings['currency_position']) ? $settings['currency_position'] : 'left';
        $data['currency_decimals'] = isset($settings['currency_decimals']) ? $settings['currency_decimals'] : '2';
        $data['demo_mode'] = isset($settings['demo_mode']) ? $settings['demo_mode'] : '0';
        $data['timezone'] = isset($settings['timezone']) ? $settings['timezone'] : 'America/New_York';

        // Payment Gateways
        $data['active_payment_gateway'] = isset($settings['active_payment_gateway']) ? $settings['active_payment_gateway'] : 'stripe';
        
        // Tab
        $data['active_tab'] = $this->input->get('tab', TRUE) ? $this->input->get('tab', TRUE) : 'currency';

        $this->render('settings/index', $data, 'Platform Settings, Payment Gateways &amp; Integrations');
    }

    /**
     * Database SQL Backup Download
     */
    public function backup() {
        $this->load->dbutil();

        $prefs = array(
            'format' => 'txt',
            'filename' => 'spasalon_backup_' . date('Y-m-d_H-i-s') . '.sql',
            'add_drop' => TRUE,
            'add_insert' => TRUE,
            'newline' => "\n"
        );

        $backup = $this->dbutil->backup($prefs);

        $this->load->helper('download');
        force_download('spasalon_db_backup_' . date('Y-m-d_His') . '.sql', $backup);
    }
}
