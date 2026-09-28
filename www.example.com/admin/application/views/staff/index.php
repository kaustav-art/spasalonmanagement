<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-user-tie text-primary me-2"></i> Specialists & Staff Team</h4>
        <p class="text-muted mb-0">Manage hair stylists, massage therapists, beauticians, and front-desk personnel.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('staff/schedules') ?>" class="btn btn-outline-secondary me-2">
            <i class="fa-regular fa-clock me-1"></i> Schedules
        </a>
        <a href="<?= admin_url('staff/commissions') ?>" class="btn btn-outline-success me-2">
            <i class="fa-solid fa-hand-holding-dollar me-1"></i> Commissions
        </a>
        <a href="<?= admin_url('staff/create') ?>" class="btn btn-primary shadow-sm">
            <i class="fa-solid fa-plus me-1"></i> Add Specialist
        </a>
    </div>
</div>

<div class="row g-4">
    <?php foreach ($staff as $st): ?>
        <div class="col-xl-4 col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="avatar avatar-lg rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-4">
                            <?= strtoupper(substr($st->name, 0, 1)) ?>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-0"><?= html_escape($st->name) ?></h5>
                            <span class="badge bg-light text-dark border"><?= ucfirst(html_escape($st->role_type)) ?></span>
                            <span class="badge bg-success ms-1"><?= $st->status ?></span>
                        </div>
                    </div>

                    <p class="text-muted fs-13px flex-grow-1 mb-3"><?= html_escape($st->bio ? $st->bio : 'Master specialist dedicated to premium beauty and wellness.') ?></p>

                    <div class="p-3 bg-light rounded-3 mb-3 fs-13px">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted"><i class="fa-solid fa-phone me-1"></i> Phone:</span>
                            <span class="fw-semibold"><?= html_escape($st->phone ? $st->phone : 'N/A') ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted"><i class="fa-solid fa-percent me-1"></i> Commission:</span>
                            <span class="fw-semibold text-primary"><?= $st->commission_rate ?>%</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted"><i class="fa-regular fa-calendar me-1"></i> Bookings:</span>
                            <span class="fw-bold text-dark"><?= (int)$st->total_appointments ?> appointments</span>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="<?= admin_url('staff/edit/' . $st->id) ?>" class="btn btn-sm btn-outline-secondary w-50">
                            <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                        </a>
                        <a href="<?= admin_url('staff/schedules?staff_id=' . $st->id) ?>" class="btn btn-sm btn-outline-primary w-50">
                            <i class="fa-regular fa-clock me-1"></i> Hours
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
