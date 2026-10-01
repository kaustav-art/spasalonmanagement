<!-- Pureglow Homepage Layout 3 -->
<section class="py-5 text-center" style="background: radial-gradient(circle, #f9f5f0 0%, #ebe2d8 100%); min-height: 520px;">
    <div class="container py-5">
        <span class="text-uppercase fw-semibold" style="color: #b8865f; letter-spacing: 3px;">Tranquil Holistic Care</span>
        <h1 class="display-3 fw-bold my-3" style="font-family: 'Prata', serif; color: #2d241e; max-width: 800px; margin: 0 auto;">
            Embrace Tranquility & Timeless Organic Radiance
        </h1>
        <p class="lead text-muted mb-4" style="max-width: 650px; margin: 0 auto;">
            A sanctuary where skilled hands and botanical potions unite to soothe the senses, revitalize scalp health, and refresh the spirit.
        </p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="<?= website_url('booking') ?>" class="btn btn-pureglow btn-lg px-4">
                <i class="fas fa-calendar-check me-2"></i>Reserve Your Session
            </a>
            <a href="<?= website_url('services') ?>" class="btn btn-outline-pureglow btn-lg px-4">
                <i class="fas fa-list me-2"></i>Full Treatment Menu
            </a>
        </div>
    </div>
</section>

<!-- Packages Showcase -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-uppercase fw-semibold" style="color: #b8865f; letter-spacing: 2px;">Curated Rituals</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif; color: #2d241e;">Signature Treatment Packages</h2>
        </div>

        <div class="row g-4">
            <?php foreach ($packages as $pkg): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card rounded-4 border-0 shadow-sm p-4 h-100" style="background: #faf8f5;">
                    <span class="badge bg-warning-subtle text-dark text-uppercase fw-bold align-self-start mb-2"><?= $pkg->type ?> package</span>
                    <h4 class="fw-bold mb-2" style="color: #2d241e;"><?= htmlspecialchars($pkg->name) ?></h4>
                    <p class="text-muted small mb-4"><?= htmlspecialchars($pkg->description) ?></p>
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
