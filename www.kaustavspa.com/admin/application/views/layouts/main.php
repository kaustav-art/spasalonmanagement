<?php
$data = isset($data) && is_array($data) ? $data : array();
$this->load->view('layouts/header', $data);
?>

<!-- app sidebar start -->
<?php $this->load->view('layouts/sidebar', $data); ?>
<!-- app sidebar end -->

<!-- app navbar start -->
<?php $this->load->view('layouts/navbar', $data); ?>
<!-- app navbar end -->

<!-- app content wrapper start -->
<div class="app-content-wrapper pt-13 pb-13 px-5 flex-grow-1">
    <div class="container-fluid">
        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4 shadow-sm" role="alert">
                <i class="fa-solid fa-circle-check me-2 fs-5"></i>
                <div><?= $this->session->flashdata('success') ?></div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-4 shadow-sm" role="alert">
                <i class="fa-solid fa-circle-exclamation me-2 fs-5"></i>
                <div><?= $this->session->flashdata('error') ?></div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Active View -->
        <?php $this->load->view($content_view, $data); ?>
    </div>
</div>
<!-- app content wrapper end -->

<!-- app footer start -->
<?php $this->load->view('layouts/footer', $data); ?>
<!-- app footer end -->
