<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]
class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Login Basic | Conca - Bootstrap Admin Template
     */
    public function login_basic() {
        $data = [
            'page_title' => 'Login Basic | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'login_basic',
            'component_name' => 'Login Basic',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/auth/login_basic', $data);
    }

    /**
     * Login Cover | Conca - Bootstrap Admin Template
     */
    public function login_cover() {
        $data = [
            'page_title' => 'Login Cover | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'login_cover',
            'component_name' => 'Login Cover',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/auth/login_cover', $data);
    }

    /**
     * Register Basic | Conca - Bootstrap Admin Template
     */
    public function register_basic() {
        $data = [
            'page_title' => 'Register Basic | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'register_basic',
            'component_name' => 'Register Basic',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/auth/register_basic', $data);
    }

    /**
     * Register Cover | Conca - Bootstrap Admin Template
     */
    public function register_cover() {
        $data = [
            'page_title' => 'Register Cover | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'register_cover',
            'component_name' => 'Register Cover',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/auth/register_cover', $data);
    }

    /**
     * Forgot Password Basic | Conca - Bootstrap Admin Template
     */
    public function forgot_password_basic() {
        $data = [
            'page_title' => 'Forgot Password Basic | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'forgot_password_basic',
            'component_name' => 'Forgot Password Basic',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/auth/forgot_password_basic', $data);
    }

    /**
     * Forgot Password Cover | Conca - Bootstrap Admin Template
     */
    public function forgot_password_cover() {
        $data = [
            'page_title' => 'Forgot Password Cover | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'forgot_password_cover',
            'component_name' => 'Forgot Password Cover',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/auth/forgot_password_cover', $data);
    }

    /**
     * Reset Password Basic | Conca - Bootstrap Admin Template
     */
    public function reset_password_basic() {
        $data = [
            'page_title' => 'Reset Password Basic | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'reset_password_basic',
            'component_name' => 'Reset Password Basic',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/auth/reset_password_basic', $data);
    }

    /**
     * Reset Password Cover | Conca - Bootstrap Admin Template
     */
    public function reset_password_cover() {
        $data = [
            'page_title' => 'Reset Password Cover | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'reset_password_cover',
            'component_name' => 'Reset Password Cover',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/auth/reset_password_cover', $data);
    }

    /**
     * Two Step Basic | Conca - Bootstrap Admin Template
     */
    public function two_step_basic() {
        $data = [
            'page_title' => 'Two Step Basic | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'two_step_basic',
            'component_name' => 'Two Step Basic',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/auth.js',
)
        ];
        $this->render_auth('pages/auth/two_step_basic', $data);
    }

    /**
     * Two Step Cover | Conca - Bootstrap Admin Template
     */
    public function two_step_cover() {
        $data = [
            'page_title' => 'Two Step Cover | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'two_step_cover',
            'component_name' => 'Two Step Cover',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/auth.js',
)
        ];
        $this->render_auth('pages/auth/two_step_cover', $data);
    }

    /**
     * Verify Mail Basic | Conca - Bootstrap Admin Template
     */
    public function verify_mail_basic() {
        $data = [
            'page_title' => 'Verify Mail Basic | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'verify_mail_basic',
            'component_name' => 'Verify Mail Basic',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/auth/verify_mail_basic', $data);
    }

    /**
     * Verify Mail Cover | Conca - Bootstrap Admin Template
     */
    public function verify_mail_cover() {
        $data = [
            'page_title' => 'Verify Mail Cover | Conca - Bootstrap Admin Template',
            'active_menu' => 'auth',
            'active_submenu' => 'verify_mail_cover',
            'component_name' => 'Verify Mail Cover',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render_auth('pages/auth/verify_mail_cover', $data);
    }

}
