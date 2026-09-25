<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]
class Errors extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Error 404 | Conca - Bootstrap Admin Template
     */
    public function error_404() {
        $data = [
            'page_title' => 'Error 404 | Conca - Bootstrap Admin Template',
            'active_menu' => 'errors',
            'active_submenu' => 'error_404',
            'component_name' => 'Error 404',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/errors/error_404', $data);
    }

    /**
     * Error 500 | Conca - Bootstrap Admin Template
     */
    public function error_500() {
        $data = [
            'page_title' => 'Error 500 | Conca - Bootstrap Admin Template',
            'active_menu' => 'errors',
            'active_submenu' => 'error_500',
            'component_name' => 'Error 500',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/errors/error_500', $data);
    }

}
