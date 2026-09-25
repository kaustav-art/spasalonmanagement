<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Super Admin Helper Functions
 */

if (!function_exists('superadmin_url')) {
    function superadmin_url($uri = '') {
        $CI =& get_instance();
        return base_url($uri);
    }
}

if (!function_exists('superadmin_asset')) {
    function superadmin_asset($path = '') {
        $p = ltrim($path, '/');
        return '/spasalonmanagement/superadmin/assets/' . $p;
    }
}

if (!function_exists('tenant_admin_url')) {
    function tenant_admin_url($uri = '') {
        $base = base_url();
        $target = str_replace('/superadmin/', '/admin/', $base);
        return rtrim($target, '/') . '/' . ltrim($uri, '/');
    }
}

if (!function_exists('main_site_url')) {
    function main_site_url($uri = '') {
        $base = base_url();
        $target = str_replace('/superadmin/', '/', $base);
        return rtrim($target, '/') . '/' . ltrim($uri, '/');
    }
}

if (!function_exists('tenant_site_url')) {
    function tenant_site_url($uri = '') {
        $base = base_url();
        $target = str_replace('/superadmin/', '/website/', $base);
        return rtrim($target, '/') . '/' . ltrim($uri, '/');
    }
}

if (!function_exists('get_settings_cache')) {
    function &get_settings_cache() {
        static $settings = null;
        if ($settings === null) {
            $CI =& get_instance();
            $settings = array();
            if (isset($CI->db) && $CI->db->table_exists('business_settings')) {
                $query = $CI->db->get('business_settings');
                if ($query) {
                    foreach ($query->result() as $row) {
                        if (isset($row->setting_key)) {
                            $settings[$row->setting_key] = isset($row->setting_value) ? $row->setting_value : '';
                        }
                    }
                }
            }
        }
        return $settings;
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = '') {
        $settings =& get_settings_cache();
        return isset($settings[$key]) ? $settings[$key] : $default;
    }
}

if (!function_exists('set_setting')) {
    function set_setting($key, $value, $group = 'general') {
        $CI =& get_instance();
        $settings =& get_settings_cache();
        $settings[$key] = $value;
        
        $check = $CI->db->get_where('business_settings', array('setting_key' => $key))->row();
        if ($check) {
            $CI->db->where('setting_key', $key)->update('business_settings', array(
                'setting_value' => $value
            ));
        } else {
            $CI->db->insert('business_settings', array(
                'setting_key' => $key,
                'setting_value' => $value,
                'setting_group' => $group
            ));
        }
        return true;
    }
}

if (!function_exists('format_currency')) {
    function format_currency($amount, $show_symbol = true) {
        $symbol = get_setting('currency_symbol', '$');
        $pos = get_setting('currency_position', 'left');
        $formatted = number_format((float)$amount, 2);
        
        if (!$show_symbol) {
            return $formatted;
        }
        
        return ($pos === 'left') ? ($symbol . $formatted) : ($formatted . ' ' . $symbol);
    }
}

if (!function_exists('format_custom_date')) {
    function format_custom_date($date, $format = 'd M Y, h:i A') {
        if (!$date || $date === '0000-00-00 00:00:00' || $date === '0000-00-00') return 'N/A';
        return date($format, strtotime($date));
    }
}

if (!function_exists('status_badge')) {
    function status_badge($status) {
        $s = strtolower($status);
        switch ($s) {
            case 'paid':
            case 'active':
            case 'completed':
            case 'success':
                return '<span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold px-2 py-1"><i class="fas fa-check-circle me-1"></i>' . ucfirst($status) . '</span>';
            case 'pending':
            case 'trial':
                return '<span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle fw-semibold px-2 py-1"><i class="fas fa-clock me-1"></i>' . ucfirst($status) . '</span>';
            case 'suspended':
            case 'failed':
            case 'cancelled':
                return '<span class="badge bg-danger-subtle text-danger border border-danger-subtle fw-semibold px-2 py-1"><i class="fas fa-times-circle me-1"></i>' . ucfirst($status) . '</span>';
            case 'revoked':
            case 'inactive':
                return '<span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle fw-semibold px-2 py-1"><i class="fas fa-ban me-1"></i>' . ucfirst($status) . '</span>';
            default:
                return '<span class="badge bg-light text-dark border px-2 py-1">' . htmlspecialchars(ucfirst($status)) . '</span>';
        }
    }
}

if (!function_exists('plan_badge')) {
    function plan_badge($code) {
        switch ($code) {
            case 'SALON':
                return '<span class="badge bg-info text-white fw-bold px-2 py-1"><i class="fas fa-scissors me-1"></i>SALON</span>';
            case 'SPA':
                return '<span class="badge bg-success text-white fw-bold px-2 py-1"><i class="fas fa-spa me-1"></i>SPA</span>';
            case 'SALON_SPA':
            default:
                return '<span class="badge bg-warning text-dark fw-bold px-2 py-1"><i class="fas fa-crown me-1"></i>SALON & SPA</span>';
        }
    }
}
