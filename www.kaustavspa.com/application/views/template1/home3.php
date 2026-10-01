<!-- Homepage 3: Full-width Ambient Luxury Showcase -->
<section class="position-relative text-white py-5" style="background: radial-gradient(circle, #222222 0%, #0d0d0d 100%); min-height: 600px;">
    <div class="container py-5 text-center">
        <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 3px;">The Ultimate Rejuvenation Destination</span>
        <h1 class="display-3 fw-bold my-3" style="font-family: 'Prata', serif; max-width: 850px; margin: 0 auto;">
            Unrivaled Elegance, Tailored Artistry & Deep Relaxation
        </h1>
        <p class="lead text-light mb-4" style="max-width: 680px; margin: 0 auto;">
            Discover bespoke styling, restorative scalp therapy, and ancient spa rituals. Designed for connoisseurs of timeless beauty and self-care.
        </p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="<?= website_url('booking') ?>" class="btn btn-gold btn-lg px-4">
                <i class="fas fa-calendar-check me-2"></i>Book Your Treatment
            </a>
            <a href="<?= website_url('packages') ?>" class="btn btn-outline-light btn-lg px-4">
                <i class="fas fa-gift me-2"></i>Curated Packages
            </a>
        </div>
    </div>
</section>

<!-- VIP Treatment Packages Grid -->
<section class="py-5" style="background: #141414; color: #fff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 2px;">Exclusive Combinations</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif;">Curated Spa & Salon Rituals</h2>
            <p class="text-muted">Comprehensive multi-treatment packages for whole-body transformation.</p>
        </div>

        <div class="row g-4">
            <?php foreach ($packages as $pkg): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card bg-dark border border-secondary border-opacity-50 text-white h-100 p-4 transition-all hover-shadow">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-warning text-dark text-uppercase fw-bold"><?= $pkg->type ?> package</span>
                        <span class="text-muted small"><i class="fas fa-history me-1"></i><?= $pkg->validity_days ?> Days Validity</span>
                    </div>
                    <h4 class="fw-bold mb-2"><?= htmlspecialchars($pkg->name) ?></h4>
                    <p class="text-muted small mb-4"><?= htmlspecialchars($pkg->description) ?></p>
                    <div class="border-top border-secondary border-opacity-25 pt-3 mt-auto d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block">Package Price</small>
                            <span class="fs-4 fw-bold text-warning"><?= format_currency($pkg->price) ?></span>
                        </div>
                        <a href="<?= website_url('booking') ?>" class="btn btn-gold btn-sm">
                            Reserve Package
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Full Price List Section -->
<section class="py-5" style="background: #0f0f0f; color: #fff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 2px;">Transparent Pricing</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif;">Signature Services Menu</h2>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive rounded border border-secondary border-opacity-25">
                    <table class="table table-dark table-hover align-middle mb-0">
                        <thead class="table-black text-warning">
                            <tr>
                                <th class="ps-4">Treatment</th>
                                <th>Category</th>
                                <th>Duration</th>
                                <th>Pricing</th>
                                <th class="text-end pe-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $svc): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-white"><?= htmlspecialchars($svc->name) ?></div>
                                    <small class="text-muted"><?= htmlspecialchars($svc->description) ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-secondary"><?= htmlspecialchars($svc->category_name) ?></span>
                                </td>
                                <td><i class="far fa-clock text-warning me-1"></i><?= $svc->duration_minutes ?> mins</td>
                                <td class="fw-bold text-warning fs-5"><?= format_currency($svc->price) ?></td>
                                <td class="text-end pe-4">
                                    <a href="<?= website_url('booking?service_id='.$svc->id) ?>" class="btn btn-outline-gold btn-sm">
                                        Book Now
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
