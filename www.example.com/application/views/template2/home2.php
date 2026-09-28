<!-- Pureglow Homepage Layout 2 -->
<section class="py-5" style="background: #f4efe9;">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="text-uppercase fw-semibold" style="color: #b8865f; letter-spacing: 2px;">Organic Wellness Sanctuary</span>
                <h1 class="display-3 fw-bold my-3" style="font-family: 'Prata', serif; color: #2d241e;">
                    A Peaceful Escape for Mind, Hair & Body
                </h1>
                <p class="lead text-muted mb-4">
                    Rejuvenate in our boutique salon & spa suites. Tailor-made scalp treatments, relaxing hot stone therapies, and precision styling.
                </p>
                <div class="d-flex gap-3">
                    <a href="<?= website_url('booking') ?>" class="btn btn-pureglow btn-lg">
                        <i class="fas fa-calendar-alt me-2"></i>Schedule a Ritual
                    </a>
                    <a href="<?= website_url('packages') ?>" class="btn btn-outline-pureglow btn-lg">
                        <i class="fas fa-gift me-2"></i>Explore Passes
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <?php foreach (array_slice($services, 0, 4) as $svc): ?>
                    <div class="col-sm-6">
                        <div class="p-4 rounded-4 bg-white shadow-sm border-0 h-100">
                            <span class="badge bg-warning-subtle text-dark mb-2"><?= $svc->duration_minutes ?> mins</span>
                            <h5 class="fw-bold mb-1" style="color: #2d241e;"><?= htmlspecialchars($svc->name) ?></h5>
                            <div class="fs-5 fw-bold mb-3" style="color: #b8865f;"><?= format_currency($svc->price) ?></div>
                            <a href="<?= website_url('booking?service_id='.$svc->id) ?>" class="small fw-semibold text-decoration-none" style="color: #b8865f;">
                                Book Now <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Category Highlights -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-uppercase fw-semibold" style="color: #b8865f; letter-spacing: 2px;">Treatment Categories</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif; color: #2d241e;">Natural Treatments We Offer</h2>
        </div>

        <div class="row g-4">
            <?php foreach ($categories as $cat): ?>
            <div class="col-lg-3 col-md-6">
                <div class="card rounded-4 border-0 shadow-sm p-4 text-center h-100" style="background: #faf8f5;">
                    <div class="avatar-lg bg-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3 shadow-xs" style="width: 70px; height: 70px; color: #b8865f;">
                        <i class="<?= (isset($cat->type) && $cat->type == 'spa') ? 'fas fa-spa' : 'fas fa-cut' ?> fs-3"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #2d241e;"><?= htmlspecialchars($cat->name) ?></h5>
                    <p class="text-muted small mb-3"><?= htmlspecialchars($cat->description ? $cat->description : 'Personalized holistic rituals.') ?></p>
                    <a href="<?= website_url('services') ?>" class="small fw-bold text-decoration-none" style="color: #b8865f;">
                        View Services <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
