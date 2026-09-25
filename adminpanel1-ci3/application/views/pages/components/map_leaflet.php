<div class="app-content-wrapper pt-13 pb-13 px-5">
    <div class="container-fluid">
        <div class="page-header pb-7">
            <h2 class="fw-semibold fs-7"><?= isset($page_title) ? $page_title : 'UI Component' ?></h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Components</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= isset($component_name) ? $component_name : 'Component' ?></li>
                </ol>
            </nav>
        </div>

        <div class="page-content">
            <div class="row g-6">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-card py-4 px-6 d-flex align-items-center justify-content-between">
                            <h5 class="card-title mb-0"><?= isset($component_name) ? $component_name : 'Component' ?> Demonstration</h5>
                            <span class="badge bg-primary rounded-pill">CodeIgniter 3 Integrated</span>
                        </div>
                        <div class="card-body p-6">
                            <p class="text-muted mb-6">
                                This component is part of the <strong>Conca Bootstrap 5 Admin Template</strong>, fully integrated into CodeIgniter 3.
                            </p>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="border rounded p-4">
                                        <h6 class="fw-semibold mb-3">Interactive Element Preview</h6>
                                        <div class="d-flex flex-wrap gap-2 mb-4">
                                            <button type="button" class="btn btn-primary">Primary</button>
                                            <button type="button" class="btn btn-secondary">Secondary</button>
                                            <button type="button" class="btn btn-success">Success</button>
                                            <button type="button" class="btn btn-info">Info</button>
                                            <button type="button" class="btn btn-warning">Warning</button>
                                            <button type="button" class="btn btn-danger">Danger</button>
                                        </div>
                                        <div class="alert alert-primary mb-0" role="alert">
                                            Sample alert notification for <?= isset($component_name) ? $component_name : 'this component' ?>.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border rounded p-4">
                                        <h6 class="fw-semibold mb-3">Component Information</h6>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                Template Status
                                                <span class="badge bg-success">Active & Integrated</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                Framework
                                                <span class="badge bg-dark">CodeIgniter 3.1.13</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                UI Library
                                                <span class="badge bg-info">Bootstrap 5 + Conca Assets</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 text-end">
                                <a href="<?= site_url('dashboard'); ?>" class="btn btn-outline-primary">Return to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>