<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]
class Apps extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Chat App | Conca - Bootstrap Admin Template
     */
    public function chat() {
        $data = [
            'page_title' => 'Chat App | Conca - Bootstrap Admin Template',
            'active_menu' => 'chat',
            'active_submenu' => '',
            'component_name' => 'Chat',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/chat.js',
)
        ];
        $this->render('pages/apps/chat', $data);
    }

    /**
     * POS App | Conca - Bootstrap Admin Template
     */
    public function pos() {
        $data = [
            'page_title' => 'POS App | Conca - Bootstrap Admin Template',
            'active_menu' => 'pos',
            'active_submenu' => '',
            'component_name' => 'Pos',
            'extra_css' => array (
  0 => 'assets/vendor/libs/select2/select2.css',
),
            'extra_js' => array (
  0 => 'assets/vendor/libs/select2/select2.js',
  1 => 'assets/js/pages/pos.js',
)
        ];
        $this->render('pages/apps/pos', $data);
    }

}
