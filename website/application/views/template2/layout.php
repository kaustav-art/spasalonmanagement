<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$tpl = isset($active_template) && !empty($active_template) ? $active_template : 'template2';
$this->load->view($tpl . '/header');
?>

    <!-- Main Content -->
    <main>
        <?= isset($content) ? $content : '' ?>
    </main>

<?php
$this->load->view($tpl . '/footer');
?>
