<?php
// Legacy topbar redirect/include to modern Conca CI3 navbar
$this->load->view('layouts/navbar', isset($data) ? $data : get_defined_vars());
?>
