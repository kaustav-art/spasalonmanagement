<!-- Hero Slider Section -->
<section class="position-relative overflow-hidden text-white" style="background: #111; min-height: 550px;">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php if (!empty($banners)): ?>
                <?php foreach ($banners as $index => $banner): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>" style="background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.75)), url('<?= template_asset('images/bg/slider-bg-01.jpg', 'template1') ?>') center/cover; min-height: 550px;">
                    <div class="container d-flex align-items-center" style="min-height: 550px;">
                        <div class="col-lg-8 py-5">
                            <span class="badge bg-warning text-dark px-3 py-2 fw-bold text-uppercase mb-3" style="letter-spacing: 1px;">
                                <?= $is_salon && $is_spa ? 'Luxury Salon & Wellness Spa' : ($is_spa ? 'Holistic Wellness Spa Sanctuary' : 'Haute Couture Hair & Beauty Salon') ?>
                            </span>
                            <h1 class="display-4 fw-bold text-white mb-3" style="font-family: 'Prata', serif;"><?= htmlspecialchars($banner->title) ?></h1>
                            <p class="lead text-light mb-4" style="max-width: 600px;"><?= htmlspecialchars($banner->subtitle) ?></p>
                            <div class="d-flex flex-wrap gap-3">
                                <a href="<?= website_url($banner->button_url ? $banner->button_url : 'booking') ?>" class="btn btn-gold btn-lg">
                                    <i class="fas fa-calendar-check me-2"></i><?= htmlspecialchars($banner->button_text ? $banner->button_text : 'Book Appointment') ?>
                                </a>
                                <a href="<?= website_url('services') ?>" class="btn btn-outline-light btn-lg">
                                    <i class="fas fa-magic me-2"></i>Explore Treatments
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="carousel-item active" style="background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.75)), url('<?= template_asset('images/bg/slider-bg-01.jpg', 'template1') ?>') center/cover; min-height: 550px;">
                    <div class="container d-flex align-items-center" style="min-height: 550px;">
                        <div class="col-lg-8 py-5">
                            <span class="badge bg-warning text-dark px-3 py-2 fw-bold text-uppercase mb-3">Haute Coiffure & Rejuvenating Spa</span>
                            <h1 class="display-4 fw-bold text-white mb-3" style="font-family: 'Prata', serif;">Transform Your Radiance & Tranquility</h1>
                            <p class="lead text-light mb-4">Celebrity styling, botanical hydra-facials, and ancient therapeutic spa rituals in our private sanctuary suites.</p>
                            <a href="<?= website_url('booking') ?>" class="btn btn-gold btn-lg"><i class="fas fa-calendar-check me-2"></i>Book Online Today</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<!-- Quick Online Booking Bar -->
<section class="py-4 shadow-sm" style="background: #181818; border-bottom: 1px solid rgba(255,255,255,0.08);">
    <div class="container">
        <form action="<?= website_url('booking') ?>" method="GET" class="row g-3 align-items-center">
            <div class="col-lg-3 col-md-6">
                <label class="text-white-50 small mb-1"><i class="fas fa-tag text-warning me-1"></i>Choose Service</label>
                <select name="service_id" class="form-select bg-dark text-white border-secondary">
                    <option value="">Any Desired Treatment...</option>
                    <?php foreach ($services as $s): ?>
                        <option value="<?= $s->id ?>"><?= htmlspecialchars($s->name) ?> (<?= format_currency($s->price) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-6">
                <label class="text-white-50 small mb-1"><i class="fas fa-user-tie text-warning me-1"></i>Select Specialist</label>
                <select name="staff_id" class="form-select bg-dark text-white border-secondary">
                    <option value="">Any Available Specialist</option>
                    <?php foreach ($staff as $st): ?>
                        <option value="<?= $st->id ?>"><?= htmlspecialchars($st->name) ?> (<?= ucfirst($st->role_type) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-6">
                <label class="text-white-50 small mb-1"><i class="far fa-calendar-alt text-warning me-1"></i>Preferred Date</label>
                <input type="date" name="date" class="form-control bg-dark text-white border-secondary" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>">
            </div>
            <div class="col-lg-3 col-md-6 d-flex align-items-end">
                <button type="submit" class="btn btn-gold w-100 py-2">
                    <i class="fas fa-arrow-right me-1"></i>Check Availability & Book
                </button>
            </div>
        </form>
    </div>
</section>

<!-- About & Heritage Section -->
<section class="py-5" style="background: #0f0f0f; color: #fff;">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="<?= template_asset('images/demo-1/about-01.jpg', 'template1') ?>" alt="About Salon Spa" class="img-fluid rounded shadow-lg border border-secondary" onerror="this.src='<?= template_asset('images/bg/about-bg.jpg', 'template1') ?>'">
                    <div class="position-absolute bottom-0 start-0 bg-dark p-3 rounded m-3 border border-warning shadow text-center" style="max-width: 180px;">
                        <h2 class="fw-bold text-warning mb-0">12+</h2>
                        <small class="text-white-50">Years of Luxury Care & Mastery</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 2px;">About Our Sanctuary</span>
                <h2 class="display-6 fw-bold mt-2 mb-4" style="font-family: 'Prata', serif;">Where Artistry Meets Rejuvenating Wellness</h2>
                <p class="text-muted leading-relaxed mb-4">
                    Founded as an oasis of quiet distinction, <?= htmlspecialchars($business_name) ?> blends visionary French and Italian hair styling with centuries-old holistic spa healing rituals. Every appointment is tailor-crafted to restore your inner balance while elevating your outer radiance.
                </p>
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-warning fs-5 me-2"></i>
                            <span class="fw-semibold">Certified Master Stylists</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-warning fs-5 me-2"></i>
                            <span class="fw-semibold">Organic Essential Oils</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-warning fs-5 me-2"></i>
                            <span class="fw-semibold">Private Luxury Spa Rooms</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-warning fs-5 me-2"></i>
                            <span class="fw-semibold">VIP Loyalty Perks</span>
                        </div>
                    </div>
                </div>
                <a href="<?= website_url('about') ?>" class="btn btn-outline-gold"><i class="fas fa-info-circle me-1"></i>Discover More About Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services Menu -->
<section class="py-5" style="background: #151515; color: #fff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 2px;">Our Tailored Rituals</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif;">Signature Services & Treatments</h2>
            <p class="text-muted" style="max-width: 600px; margin: 0 auto;">Discover our most requested treatments designed for exquisite transformation and deep therapeutic relaxation.</p>
        </div>

        <div class="row g-4">
            <?php foreach ($services as $svc): ?>
            <div class="col-lg-6">
                <div class="p-4 rounded bg-dark border border-secondary border-opacity-25 h-100 d-flex justify-content-between align-items-center transition-all hover-shadow">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <h5 class="fw-bold text-white mb-0"><?= htmlspecialchars($svc->name) ?></h5>
                            <span class="badge bg-secondary-subtle text-warning small"><?= $svc->duration_minutes ?> mins</span>
                        </div>
                        <p class="text-muted small mb-0" style="max-width: 380px;"><?= htmlspecialchars($svc->description ? $svc->description : 'Premium personalized therapy.') ?></p>
                    </div>
                    <div class="text-end ps-3">
                        <div class="fs-4 fw-bold text-warning mb-2"><?= format_currency($svc->price) ?></div>
                        <a href="<?= website_url('booking?service_id='.$svc->id) ?>" class="btn btn-sm btn-gold">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?= website_url('services') ?>" class="btn btn-outline-gold px-4 py-2">
                <i class="fas fa-list me-2"></i>View Full Treatment Menu
            </a>
        </div>
    </div>
</section>

<!-- Specialists / Team Showcase -->
<section class="py-5" style="background: #0e0e0e; color: #fff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 2px;">Masters of the Craft</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif;">Meet Our Specialists</h2>
            <p class="text-muted">Passionate artisans dedicated to beauty care, hair architecture, and wellness healing.</p>
        </div>

        <div class="row g-4">
            <?php foreach ($staff as $member): ?>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-dark border border-secondary border-opacity-25 text-white h-100 overflow-hidden text-center">
                    <div class="p-3">
                        <div class="avatar-lg mx-auto rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-3" style="width: 120px; height: 120px; background-size: cover; background-position: center; border: 3px solid #d4af37;">
                            <i class="fas fa-user-circle fa-4x text-light"></i>
                        </div>
                        <h5 class="fw-bold mb-1"><?= htmlspecialchars($member->name) ?></h5>
                        <div class="text-warning small text-uppercase mb-2" style="letter-spacing: 1px;"><?= ucfirst($member->role_type) ?></div>
                        <div class="text-warning small mb-3">
                            <i class="fas fa-star"></i> <?= $member->rating ?> / 5.0
                        </div>
                        <p class="text-muted small mb-3" style="min-height: 40px;"><?= htmlspecialchars(character_limiter($member->bio, 80)) ?></p>
                        <a href="<?= website_url('booking?staff_id='.$member->id) ?>" class="btn btn-outline-gold btn-sm w-100">
                            Book With <?= explode(' ', $member->name)[0] ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5" style="background: #141414; color: #fff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 2px;">Guest Experiences</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif;">What Our Clients Say</h2>
        </div>

        <div class="row g-4">
            <?php foreach ($testimonials as $t): ?>
            <div class="col-lg-4 col-md-6">
                <div class="p-4 rounded bg-dark border border-secondary border-opacity-25 h-100 position-relative">
                    <div class="text-warning mb-3">
                        <?php for ($i=0; $i < $t->rating; $i++): ?><i class="fas fa-star"></i><?php endfor; ?>
                    </div>
                    <p class="text-light fst-italic mb-4">"<?= htmlspecialchars($t->review) ?>"</p>
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-warning text-dark fw-bold rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 42px; height: 42px;">
                            <?= strtoupper(substr($t->client_name, 0, 1)) ?>
                        </div>
                        <div>
                            <h6 class="fw-bold text-white mb-0"><?= htmlspecialchars($t->client_name) ?></h6>
                            <small class="text-muted"><?= htmlspecialchars($t->client_role ? $t->client_role : 'Verified Client') ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('<?= template_asset('images/bg/slider-bg-02.jpg', 'template1') ?>') center/cover;">
    <div class="container py-4">
        <h2 class="display-5 fw-bold mb-3" style="font-family: 'Prata', serif;">Ready for Your Radiant Rejuvenation?</h2>
        <p class="lead text-light mb-4" style="max-width: 650px; margin: 0 auto;">Reserve your private suite or salon chair online in seconds. Instant slot confirmation with no waiting in line.</p>
        <a href="<?= website_url('booking') ?>" class="btn btn-gold btn-lg px-5 py-3 fs-6">
            <i class="fas fa-calendar-check me-2"></i>Schedule Your Reservation Now
        </a>
    </div>
</section>
