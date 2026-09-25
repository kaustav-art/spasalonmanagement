<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]
class Users extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Users List | Conca - Bootstrap Admin Template
     */
    public function index() {
        $data = [
            'page_title' => 'Users List | Conca - Bootstrap Admin Template',
            'active_menu' => 'users',
            'active_submenu' => 'users_list',
            'component_name' => 'Index',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/list', $data);
    }

    /**
     * User Create | Conca - Bootstrap Admin Template
     */
    public function add() {
        $data = [
            'page_title' => 'User Create | Conca - Bootstrap Admin Template',
            'active_menu' => 'users',
            'active_submenu' => 'users_add',
            'component_name' => 'Add',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/add', $data);
    }

    /**
     * User View | Conca - Bootstrap Admin Template
     */
    public function view_user() {
        $data = [
            'page_title' => 'User View | Conca - Bootstrap Admin Template',
            'active_menu' => 'users',
            'active_submenu' => 'users_view',
            'component_name' => 'View User',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/view', $data);
    }

    /**
     * User - Profile | Conca - Bootstrap Admin Template
     */
    public function profile() {
        $data = [
            'page_title' => 'User - Profile | Conca - Bootstrap Admin Template',
            'active_menu' => 'user_profile',
            'active_submenu' => 'profile',
            'component_name' => 'Profile',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/profile', $data);
    }

    /**
     * User Projects - Profile | Conca - Bootstrap Admin Template
     */
    public function profile_projects() {
        $data = [
            'page_title' => 'User Projects - Profile | Conca - Bootstrap Admin Template',
            'active_menu' => 'user_profile',
            'active_submenu' => 'profile_projects',
            'component_name' => 'Profile Projects',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/profile_projects', $data);
    }

    /**
     * User Team - Profile | Conca - Bootstrap Admin Template
     */
    public function profile_team() {
        $data = [
            'page_title' => 'User Team - Profile | Conca - Bootstrap Admin Template',
            'active_menu' => 'user_profile',
            'active_submenu' => 'profile_team',
            'component_name' => 'Profile Team',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/profile_team', $data);
    }

    /**
     * User Connections - Profile | Conca - Bootstrap Admin Template
     */
    public function profile_connections() {
        $data = [
            'page_title' => 'User Connections - Profile | Conca - Bootstrap Admin Template',
            'active_menu' => 'user_profile',
            'active_submenu' => 'profile_connections',
            'component_name' => 'Profile Connections',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/profile_connections', $data);
    }

    /**
     * User Followers - Profile | Conca - Bootstrap Admin Template
     */
    public function profile_followers() {
        $data = [
            'page_title' => 'User Followers - Profile | Conca - Bootstrap Admin Template',
            'active_menu' => 'user_profile',
            'active_submenu' => 'profile_followers',
            'component_name' => 'Profile Followers',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/profile_followers', $data);
    }

    /**
     * User Activity - Profile | Conca - Bootstrap Admin Template
     */
    public function profile_activity() {
        $data = [
            'page_title' => 'User Activity - Profile | Conca - Bootstrap Admin Template',
            'active_menu' => 'user_profile',
            'active_submenu' => 'profile_activity',
            'component_name' => 'Profile Activity',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/profile_activity', $data);
    }

    /**
     * User - Settings | Conca - Bootstrap Admin Template
     */
    public function settings() {
        $data = [
            'page_title' => 'User - Settings | Conca - Bootstrap Admin Template',
            'active_menu' => 'account',
            'active_submenu' => 'settings',
            'component_name' => 'Settings',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/settings', $data);
    }

    /**
     * User Billing - Settings | Conca - Bootstrap Admin Template
     */
    public function settings_billing() {
        $data = [
            'page_title' => 'User Billing - Settings | Conca - Bootstrap Admin Template',
            'active_menu' => 'account',
            'active_submenu' => 'settings_billing',
            'component_name' => 'Settings Billing',
            'extra_css' => array (
  0 => 'assets/vendor/libs/sweetalert2/sweetalert2.css',
),
            'extra_js' => array (
  0 => 'assets/vendor/libs/sweetalert2/sweetalert2.js',
  1 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/settings_billing', $data);
    }

    /**
     * User Connections - Settings | Conca - Bootstrap Admin Template
     */
    public function settings_connection() {
        $data = [
            'page_title' => 'User Connections - Settings | Conca - Bootstrap Admin Template',
            'active_menu' => 'account',
            'active_submenu' => 'settings_connection',
            'component_name' => 'Settings Connection',
            'extra_css' => array (
  0 => 'assets/vendor/libs/sweetalert2/sweetalert2.css',
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/settings_connection', $data);
    }

    /**
     * User Notifications - Settings | Conca - Bootstrap Admin Template
     */
    public function settings_notification() {
        $data = [
            'page_title' => 'User Notifications - Settings | Conca - Bootstrap Admin Template',
            'active_menu' => 'account',
            'active_submenu' => 'settings_notification',
            'component_name' => 'Settings Notification',
            'extra_css' => array (
  0 => 'assets/vendor/libs/sweetalert2/sweetalert2.css',
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/users/settings_notification', $data);
    }

}
