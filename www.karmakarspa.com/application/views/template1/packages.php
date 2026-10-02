<!-- Page Banner -->
<section class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?= template_asset('images/bg/slider-bg-01.jpg', 'template1') ?>') center/cover;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif;">Packages & VIP Memberships</h1>
        <p class="text-white-50 mb-0">Multi-session bundles and curated combo rituals offering exceptional luxury value.</p>
    </div>
</section>

<section class="py-5" style="background: #121212; color: #fff;">
    <div class="container py-4">
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
                    
                    <div class="p-3 rounded bg-black mb-4">
                        <div class="small text-white-50 mb-1"><i class="fas fa-check text-warning me-1"></i><?= $pkg->total_sessions ?> Premium Treatment Sessions Included</div>
                        <div class="small text-white-50"><i class="fas fa-check text-warning me-1"></i>Complimentary Scalp or Tea Ritual</div>
                    </div>

                    <div class="border-top border-secondary border-opacity-25 pt-3 mt-auto d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted d-block">Package Total</small>
                            <span class="fs-4 fw-bold text-warning"><?= format_currency($pkg->price) ?></span>
                        </div>
                        <a href="<?= website_url('booking') ?>" class="btn btn-gold btn-sm">
                            <i class="fas fa-calendar-check me-1"></i>Reserve
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
