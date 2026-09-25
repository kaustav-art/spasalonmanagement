<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]
class Lms extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Course List - LMS | Conca - Bootstrap Admin Template
     */
    public function course_list() {
        $data = [
            'page_title' => 'Course List - LMS | Conca - Bootstrap Admin Template',
            'active_menu' => 'lms',
            'active_submenu' => 'course_list',
            'component_name' => 'Course List',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/lms/course_list', $data);
    }

    /**
     * Course Grid - LMS | Conca - Bootstrap Admin Template
     */
    public function course_grid() {
        $data = [
            'page_title' => 'Course Grid - LMS | Conca - Bootstrap Admin Template',
            'active_menu' => 'lms',
            'active_submenu' => 'course_grid',
            'component_name' => 'Course Grid',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/lms.js',
)
        ];
        $this->render('pages/lms/course_grid', $data);
    }

    /**
     * Course Details - LMS | Conca - Bootstrap Admin Template
     */
    public function course_details() {
        $data = [
            'page_title' => 'Course Details - LMS | Conca - Bootstrap Admin Template',
            'active_menu' => 'lms',
            'active_submenu' => 'course_details',
            'component_name' => 'Course Details',
            'extra_css' => array (
  0 => 'assets/vendor/libs/plyr/plyr.html',
),
            'extra_js' => array (
  0 => 'assets/vendor/libs/plyr/plyr-2.js',
  1 => 'assets/js/pages/extended-ui-plyr.js',
  2 => 'assets/js/pages/lms.js',
)
        ];
        $this->render('pages/lms/course_details', $data);
    }

    /**
     * Course Create - LMS | Conca - Bootstrap Admin Template
     */
    public function course_add() {
        $data = [
            'page_title' => 'Course Create - LMS | Conca - Bootstrap Admin Template',
            'active_menu' => 'lms',
            'active_submenu' => 'course_add',
            'component_name' => 'Course Add',
            'extra_css' => array (
  0 => 'assets/vendor/libs/tagify/tagify.html',
  1 => 'assets/vendor/libs/quill/quill.html',
  2 => 'assets/vendor/libs/quill/quill-bubble.html',
  3 => 'assets/vendor/libs/quill/quill-snow.html',
),
            'extra_js' => array (
  0 => 'assets/js/tinymce/js/tinymce/tinymce.min.js',
  1 => 'assets/vendor/libs/tagify/tagify-2.js',
  2 => 'assets/vendor/libs/sortable/sortable.js',
  3 => 'assets/vendor/libs/quill/quill-2.js',
  4 => 'assets/js/pages/form-editor.js',
  5 => 'assets/js/pages/lms.js',
)
        ];
        $this->render('pages/lms/course_add', $data);
    }

    /**
     * Course Edit - LMS | Conca - Bootstrap Admin Template
     */
    public function course_edit() {
        $data = [
            'page_title' => 'Course Edit - LMS | Conca - Bootstrap Admin Template',
            'active_menu' => 'lms',
            'active_submenu' => 'course_edit',
            'component_name' => 'Course Edit',
            'extra_css' => array (
  0 => 'assets/vendor/libs/tagify/tagify.html',
  1 => 'assets/vendor/libs/quill/quill.html',
  2 => 'assets/vendor/libs/quill/quill-bubble.html',
  3 => 'assets/vendor/libs/quill/quill-snow.html',
),
            'extra_js' => array (
  0 => 'assets/js/tinymce/js/tinymce/tinymce.min.js',
  1 => 'assets/vendor/libs/tagify/tagify-2.js',
  2 => 'assets/vendor/libs/sortable/sortable.js',
  3 => 'assets/vendor/libs/quill/quill-2.js',
  4 => 'assets/js/pages/form-editor.js',
  5 => 'assets/js/pages/lms.js',
)
        ];
        $this->render('pages/lms/course_edit', $data);
    }

}
