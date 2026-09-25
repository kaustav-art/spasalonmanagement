<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]
class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Ecommerce Dashboard | Conca - Bootstrap Admin Template
     */
    public function index() {
        $data = [
            'page_title' => 'Ecommerce Dashboard | Conca - Bootstrap Admin Template',
            'active_menu' => 'dashboard',
            'active_submenu' => 'ecommerce',
            'component_name' => 'Index',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/vendor/libs/apexcharts/apexcharts.js',
  1 => 'assets/js/dashboard/dashboard-ecommerce.js',
)
        ];
        $this->render('pages/dashboard/ecommerce', $data);
    }

    /**
     * Dashboard Academy | Conca - Bootstrap Admin Template
     */
    public function academy() {
        $data = [
            'page_title' => 'Dashboard Academy | Conca - Bootstrap Admin Template',
            'active_menu' => 'dashboard',
            'active_submenu' => 'academy',
            'component_name' => 'Academy',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/vendor/libs/apexcharts/apexcharts.js',
  1 => 'assets/js/dashboard/dashboard-academy.js',
)
        ];
        $this->render('pages/dashboard/academy', $data);
    }

    /**
     * Dashboard Analytics | Conca - Bootstrap Admin Template
     */
    public function analytics() {
        $data = [
            'page_title' => 'Dashboard Analytics | Conca - Bootstrap Admin Template',
            'active_menu' => 'dashboard',
            'active_submenu' => 'analytics',
            'component_name' => 'Analytics',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/vendor/libs/apexcharts/apexcharts.js',
  1 => 'assets/js/dashboard/dashboard-analytics.js',
)
        ];
        $this->render('pages/dashboard/analytics', $data);
    }

    /**
     * Dashboard CRM | Conca - Bootstrap Admin Template
     */
    public function crm() {
        $data = [
            'page_title' => 'Dashboard CRM | Conca - Bootstrap Admin Template',
            'active_menu' => 'dashboard',
            'active_submenu' => 'crm',
            'component_name' => 'Crm',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/vendor/libs/apexcharts/apexcharts.js',
  1 => 'assets/js/dashboard/dashboard-crm.js',
)
        ];
        $this->render('pages/dashboard/crm', $data);
    }

    /**
     * Dashboard HRM | Conca - Bootstrap Admin Template
     */
    public function hrm() {
        $data = [
            'page_title' => 'Dashboard HRM | Conca - Bootstrap Admin Template',
            'active_menu' => 'dashboard',
            'active_submenu' => 'hrm',
            'component_name' => 'Hrm',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/vendor/libs/apexcharts/apexcharts.js',
  1 => 'assets/js/dashboard/dashboard-hrm.js',
)
        ];
        $this->render('pages/dashboard/hrm', $data);
    }

}
