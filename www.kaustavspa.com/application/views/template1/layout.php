<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// If rendering a homepage layout (home1, home2, home3), it provides its own complete Glamr page structure
if (!empty($is_home) || in_array($active_view, array('home1', 'home2', 'home3', 'home', 'index'))) {
    echo isset($content) ? $content : '';
    return;
}

$tpl = isset($active_template) && !empty($active_template) ? $active_template : 'template1';
$this->load->view($tpl . '/header');
?>

    <!-- Main Content Injection -->
    <main>
        <?= isset($content) ? $content : '' ?>
    </main>

<?php
$this->load->view($tpl . '/footer');
?>

