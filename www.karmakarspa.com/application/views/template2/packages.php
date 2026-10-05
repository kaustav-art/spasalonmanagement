<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-4">
            <?php foreach ($packages as $pkg): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card rounded-4 border-0 shadow-sm p-4 h-100" style="background: #faf8f5;">
                    <span class="badge bg-warning-subtle text-dark text-uppercase fw-bold align-self-start mb-2"><?= $pkg->type ?> package</span>
                    <h4 class="fw-bold mb-2" style="color: #2d241e;"><?= htmlspecialchars($pkg->name) ?></h4>
                    <p class="text-muted small mb-4"><?= htmlspecialchars($pkg->description) ?></p>
                    <div class="p-3 rounded-3 bg-white mb-4">
                        <small class="text-muted d-block mb-1"><i class="fas fa-check text-success me-1"></i><?= $pkg->total_sessions ?> Treatment Sessions</small>
                        <small class="text-muted d-block"><i class="fas fa-check text-success me-1"></i>Valid for <?= $pkg->validity_days ?> days</small>
                    </div>
                    <div class="mt-auto border-top pt-3 d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block">Price</small>
                            <span class="fs-4 fw-bold" style="color: #b8865f;"><?= format_currency($pkg->price) ?></span>
                        </div>
                        <a href="<?= website_url('booking') ?>" class="btn btn-pureglow btn-sm">Reserve</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
