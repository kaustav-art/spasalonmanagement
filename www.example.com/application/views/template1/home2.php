<!-- Homepage 2: Split Modern Hero Section -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #161616 0%, #202020 100%); min-height: 600px;">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="badge bg-warning text-dark px-3 py-2 fw-bold text-uppercase mb-3">
                    <?= $is_salon && $is_spa ? 'Complete Salon Artistry & Spa Wellness' : ($is_spa ? 'Holistic Wellness & Spa Suites' : 'Modern Salon & Hair Studio') ?>
                </span>
                <h1 class="display-3 fw-bold mb-4" style="font-family: 'Prata', serif; line-height: 1.15;">
                    Elevate Your Inner Calm & Outer Glow
                </h1>
                <p class="lead text-muted mb-4" style="max-width: 580px;">
                    Personalized luxury treatments tailored to enhance your individuality. Experience premier styling chairs, serene spa rooms, and bespoke beauty treatments.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= website_url('booking') ?>" class="btn btn-gold btn-lg">
                        <i class="fas fa-calendar-check me-2"></i>Instant Online Booking
                    </a>
                    <a href="<?= website_url('packages') ?>" class="btn btn-outline-gold btn-lg">
                        <i class="fas fa-gem me-2"></i>View VIP Packages
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="p-4 rounded-4 bg-dark border border-secondary border-opacity-50 shadow-lg text-center">
                    <div class="avatar-lg bg-warning-subtle text-warning rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-clock fs-4"></i>
                    </div>
                    <h4 class="fw-bold text-white mb-2">Book Today's Session</h4>
                    <p class="text-muted small mb-4">Select your treatment category to see available specialist time slots.</p>
                    <form action="<?= website_url('booking') ?>" method="GET">
                        <div class="mb-3 text-start">
                            <label class="small text-muted mb-1">Select Service</label>
                            <select name="service_id" class="form-select bg-black text-white border-secondary">
                                <?php foreach ($services as $s): ?>
                                    <option value="<?= $s->id ?>"><?= htmlspecialchars($s->name) ?> - <?= format_currency($s->price) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 text-start">
                            <label class="small text-muted mb-1">Preferred Date</label>
                            <input type="date" name="date" class="form-control bg-black text-white border-secondary" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>">
                        </div>
                        <button type="submit" class="btn btn-gold w-100 py-2">
                            Check Available Slots <i class="fas fa-arrow-right ms-1"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Counter Bar -->
<section class="py-4" style="background: #0d0d0d; border-top: 1px solid rgba(255,255,255,0.05); border-bottom: 1px solid rgba(255,255,255,0.05);">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3 col-6">
                <h3 class="fw-bold text-warning mb-0">15,000+</h3>
                <small class="text-muted text-uppercase">Satisfied Clients</small>
            </div>
            <div class="col-md-3 col-6">
                <h3 class="fw-bold text-warning mb-0">25+</h3>
                <small class="text-muted text-uppercase">Master Stylists & Therapists</small>
            </div>
            <div class="col-md-3 col-6">
                <h3 class="fw-bold text-warning mb-0">4.9</h3>
                <small class="text-muted text-uppercase">Average Star Rating</small>
            </div>
            <div class="col-md-3 col-6">
                <h3 class="fw-bold text-warning mb-0">100%</h3>
                <small class="text-muted text-uppercase">Organic Botanical Products</small>
            </div>
        </div>
    </div>
</section>

<!-- Category Cards Grid -->
<section class="py-5" style="background: #141414; color: #fff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 2px;">Treatment Categories</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif;">Curated Salon & Spa Collections</h2>
        </div>

        <div class="row g-4">
            <?php foreach ($categories as $cat): ?>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-dark border border-secondary border-opacity-25 h-100 text-center p-4 transition-all hover-shadow">
                    <div class="avatar-lg bg-black text-warning rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; border: 1px solid #d4af37;">
                        <i class="<?= (isset($cat->type) && $cat->type == 'spa') ? 'fas fa-spa' : 'fas fa-cut' ?> fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-white mb-2"><?= htmlspecialchars($cat->name) ?></h5>
                    <p class="text-muted small mb-3"><?= htmlspecialchars($cat->description ? $cat->description : 'Exquisite styling and care.') ?></p>
                    <a href="<?= website_url('services') ?>" class="text-warning small fw-bold text-decoration-none">
                        Explore Category <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Promotional Offers Showcase -->
<?php if (!empty($offers)): ?>
<section class="py-5" style="background: #0f0f0f; color: #fff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 2px;">Special Privileges</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif;">Limited Time Seasonal Offers</h2>
        </div>

        <div class="row g-4">
            <?php foreach ($offers as $offer): ?>
            <div class="col-lg-6">
                <div class="p-4 rounded-4 bg-dark border border-warning border-opacity-50 h-100 d-flex justify-content-between align-items-center">
                    <div>
                        <span class="badge bg-warning text-dark fw-bold mb-2">CODE: <?= htmlspecialchars($offer->coupon_code) ?></span>
                        <h4 class="fw-bold text-white mb-1"><?= htmlspecialchars($offer->title) ?></h4>
                        <p class="text-muted small mb-0"><?= htmlspecialchars($offer->description) ?></p>
                        <small class="text-muted d-block mt-2"><i class="far fa-clock me-1"></i>Valid till <?= date('M d, Y', strtotime($offer->valid_until)) ?></small>
                    </div>
                    <div class="text-end ps-3">
                        <div class="display-6 fw-bold text-warning mb-2"><?= htmlspecialchars($offer->discount_text) ?></div>
                        <a href="<?= website_url('booking') ?>" class="btn btn-gold btn-sm">Claim Offer</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Visual Transformation Portfolio Gallery -->
<section class="py-5" style="background: #141414; color: #fff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 2px;">Portfolio Showcase</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif;">Transformations & Sanctuary Suites</h2>
        </div>

        <div class="row g-3">
            <?php foreach ($gallery as $g): ?>
            <div class="col-lg-4 col-md-6">
                <div class="position-relative overflow-hidden rounded shadow" style="height: 260px; background: #222;">
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary text-white-50">
                        <i class="fas fa-camera fa-2x"></i>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.85));">
                        <span class="badge bg-warning text-dark text-uppercase small mb-1"><?= htmlspecialchars($g->category) ?></span>
                        <h6 class="fw-bold text-white mb-0"><?= htmlspecialchars($g->title) ?></h6>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
