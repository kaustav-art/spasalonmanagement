<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Global App Helper for Salon & Spa Management System
 */

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

if (!function_exists('get_business_type')) {
    function get_business_type() {
        return strtoupper(get_setting('business_type', 'SALON_SPA'));
    }
}

if (!function_exists('is_salon_enabled')) {
    function is_salon_enabled() {
        $type = get_business_type();
        return in_array($type, array('SALON', 'SALON_SPA'));
    }
}

if (!function_exists('is_spa_enabled')) {
    function is_spa_enabled() {
        $type = get_business_type();
        return in_array($type, array('SPA', 'SALON_SPA'));
    }
}

if (!function_exists('get_active_template')) {
    function get_active_template() {
        $tpl = get_setting('active_template', 'template1');
        return in_array($tpl, array('template1', 'template2')) ? $tpl : 'template1';
    }
}

if (!function_exists('get_active_home_layout')) {
    function get_active_home_layout() {
        $layout = (int) get_setting('active_home_layout', 1);
        return in_array($layout, array(1, 2, 3)) ? $layout : 1;
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

if (!function_exists('admin_url')) {
    function admin_url($uri = '') {
        $CI =& get_instance();
        $b = rtrim(base_url(), '/');
        if (substr($b, -6) === '/admin') {
            return $b . '/' . ltrim($uri, '/');
        }
        if (substr($b, -8) === '/website') {
            return substr($b, 0, -8) . '/admin/' . ltrim($uri, '/');
        }
        return $b . '/' . ltrim($uri, '/');
    }
}

if (!function_exists('website_url')) {
    function website_url($uri = '') {
        $CI =& get_instance();
        $b = rtrim(base_url(), '/');
        if (substr($b, -6) === '/admin') {
            return substr($b, 0, -6) . '/' . ltrim($uri, '/');
        }
        return $b . '/' . ltrim($uri, '/');
    }
}

if (!function_exists('admin_asset')) {
    function admin_asset($path = '') {
        return admin_url('assets/' . ltrim($path, '/'));
    }
}

if (!function_exists('template_asset')) {
    function template_asset($path = '', $template = null) {
        if (!$template) {
            $template = get_active_template();
        }
        return website_url('assets/' . $template . '/' . ltrim($path, '/'));
    }
}

if (!function_exists('admin_logo_url')) {
    function admin_logo_url() {
        $logo = '';
        if (function_exists('get_setting')) {
            $logo = get_setting('logo');
            if (empty($logo)) $logo = get_setting('business_logo');
            if (empty($logo)) $logo = get_setting('landing_site_logo');
            if (empty($logo)) $logo = get_setting('site_logo');
        }
        
        if (!empty($logo)) {
            if (strpos($logo, 'http://') === 0 || strpos($logo, 'https://') === 0) {
                return $logo;
            }
            $clean = ltrim($logo, '/\\');
            if (strpos($clean, 'uploads/') !== 0) {
                if (file_exists(FCPATH . 'uploads/branding/' . $clean)) {
                    $clean = 'uploads/branding/' . $clean;
                } elseif (file_exists(dirname(FCPATH) . DIRECTORY_SEPARATOR . 'uploads/branding/' . $clean)) {
                    $clean = 'uploads/branding/' . $clean;
                }
            }
            if (file_exists(FCPATH . $clean)) {
                return admin_url($clean);
            }
            if (file_exists(dirname(FCPATH) . DIRECTORY_SEPARATOR . $clean)) {
                return website_url($clean);
            }
            return website_url($clean);
        }
        
        return admin_asset('img/logo/logo.png');
    }
}

if (!function_exists('admin_favicon_url')) {
    function admin_favicon_url() {
        $fav = '';
        if (function_exists('get_setting')) {
            $fav = get_setting('favicon');
            if (empty($fav)) $fav = get_setting('business_favicon');
            if (empty($fav)) $fav = get_setting('landing_site_favicon');
            if (empty($fav)) $fav = get_setting('site_favicon');
        }
        
        if (!empty($fav)) {
            if (strpos($fav, 'http://') === 0 || strpos($fav, 'https://') === 0) {
                return $fav;
            }
            $clean = ltrim($fav, '/\\');
            if (strpos($clean, 'uploads/') !== 0) {
                if (file_exists(FCPATH . 'uploads/branding/' . $clean)) {
                    $clean = 'uploads/branding/' . $clean;
                } elseif (file_exists(dirname(FCPATH) . DIRECTORY_SEPARATOR . 'uploads/branding/' . $clean)) {
                    $clean = 'uploads/branding/' . $clean;
                }
            }
            if (file_exists(FCPATH . $clean)) {
                return admin_url($clean);
            }
            if (file_exists(dirname(FCPATH) . DIRECTORY_SEPARATOR . $clean)) {
                return website_url($clean);
            }
            return website_url($clean);
        }
        
        return admin_asset('img/logo/favicon.png');
    }
}

if (!function_exists('appointment_status_badge')) {
    function appointment_status_badge($status) {
        switch (strtolower($status)) {
            case 'confirmed':
                return '<span class="badge badge-label-success fw-medium">Confirmed</span>';
            case 'in_service':
                return '<span class="badge badge-label-info fw-medium">In Service</span>';
            case 'completed':
                return '<span class="badge badge-label-primary fw-medium">Completed</span>';
            case 'cancelled':
                return '<span class="badge badge-label-danger fw-medium">Cancelled</span>';
            case 'no_show':
                return '<span class="badge badge-label-secondary fw-medium">No Show</span>';
            case 'pending':
            default:
                return '<span class="badge badge-label-warning fw-medium">Pending</span>';
        }
    }
}

if (!function_exists('payment_status_badge')) {
    function payment_status_badge($status) {
        switch (strtolower($status)) {
            case 'paid':
                return '<span class="badge badge-label-success fw-medium"><span class="badge badge-dot bg-success me-1"></span>Paid</span>';
            case 'partial':
                return '<span class="badge badge-label-warning fw-medium"><span class="badge badge-dot bg-warning me-1"></span>Partial</span>';
            case 'unpaid':
            default:
                return '<span class="badge badge-label-danger fw-medium"><span class="badge badge-dot bg-danger me-1"></span>Unpaid</span>';
        }
    }
}

if (!function_exists('format_custom_date')) {
    function format_custom_date($date, $format = 'd M Y') {
        if (!$date || $date === '0000-00-00') return 'N/A';
        return date($format, strtotime($date));
    }
}

if (!function_exists('format_custom_time')) {
    function format_custom_time($time, $format = 'h:i A') {
        if (!$time) return 'N/A';
        return date($format, strtotime($time));
    }
}
