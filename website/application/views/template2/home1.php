<!-- Pureglow Hero Banner Section -->
<section class="py-5" style="background: linear-gradient(rgba(245, 238, 230, 0.9), rgba(245, 238, 230, 0.9)), url('<?= template_asset('images/backgrounds/main-slider-1-1.jpg', 'template2') ?>') center/cover; min-height: 520px;">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="badge bg-warning text-dark px-3 py-2 fw-bold text-uppercase mb-3" style="letter-spacing: 1px;">
                    <?= $is_salon && $is_spa ? 'Organic Salon & Holistic Spa Sanctuary' : ($is_spa ? 'Pure Wellness & Healing Spa Sanctuary' : 'Botanical Hair & Beauty Salon') ?>
                </span>
                <h1 class="display-3 fw-bold mb-3" style="font-family: 'Prata', serif; color: #2d241e;">
                    Restorative Healing & Natural Beauty Rituals
                </h1>
                <p class="lead mb-4" style="color: #63564d; max-width: 580px;">
                    Immerse your senses in custom aromatherapy, organic hair vitality treatments, and private therapeutic spa rituals crafted for complete tranquility.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= website_url('booking') ?>" class="btn btn-pureglow btn-lg">
                        <i class="fas fa-calendar-check me-2"></i>Book an Appointment
                    </a>
                    <a href="<?= website_url('services') ?>" class="btn btn-outline-pureglow btn-lg">
                        <i class="fas fa-leaf me-2"></i>View Treatments
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <!-- Quick Booking Card -->
                <div class="p-4 p-md-5 rounded-4 bg-white shadow-lg border-0 text-center">
                    <div class="avatar-lg bg-warning-subtle text-warning rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
                        <i class="fas fa-spa fs-4"></i>
                    </div>
                    <h4 class="fw-bold mb-1">Reserve Your Visit</h4>
                    <p class="text-muted small mb-4">Choose your ritual and schedule in real-time.</p>
                    <form action="<?= website_url('booking') ?>" method="GET">
                        <div class="mb-3 text-start">
                            <label class="small text-muted mb-1">Select Ritual / Service</label>
                            <select name="service_id" class="form-select">
                                <?php foreach ($services as $s): ?>
                                    <option value="<?= $s->id ?>"><?= htmlspecialchars($s->name) ?> &mdash; <?= format_currency($s->price) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 text-start">
                            <label class="small text-muted mb-1">Date</label>
                            <input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>">
                        </div>
                        <button type="submit" class="btn btn-pureglow w-100 py-2">
                            Check Available Slots <i class="fas fa-arrow-right ms-1"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Treatments Grid -->
<section class="py-5" style="background: #faf8f5;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-uppercase fw-semibold" style="color: #b8865f; letter-spacing: 2px;">Holistic Excellence</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif; color: #2d241e;">Signature Treatments & Rituals</h2>
            <p class="text-muted" style="max-width: 600px; margin: 0 auto;">Organic botanical extracts, soothing aromatherapy, and skilled therapist touch.</p>
        </div>

        <div class="row g-4">
            <?php foreach ($services as $svc): ?>
            <div class="col-lg-6">
                <div class="p-4 rounded-4 bg-white border border-light shadow-sm h-100 d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <h5 class="fw-bold mb-0" style="color: #2d241e;"><?= htmlspecialchars($svc->name) ?></h5>
                            <span class="badge bg-light text-dark small border"><?= $svc->duration_minutes ?> mins</span>
                        </div>
                        <p class="text-muted small mb-0" style="max-width: 380px;"><?= htmlspecialchars($svc->description ? $svc->description : 'Personalized therapeutic ritual.') ?></p>
                    </div>
                    <div class="text-end ps-3">
                        <div class="fs-4 fw-bold mb-2" style="color: #b8865f;"><?= format_currency($svc->price) ?></div>
                        <a href="<?= website_url('booking?service_id='.$svc->id) ?>" class="btn btn-pureglow btn-sm">
                            Book
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- About Pureglow Section -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="p-4 rounded-4 text-center" style="background: #fdfaf6; border: 2px dashed #ebdcd0;">
                    <div class="avatar-xl bg-warning-subtle text-warning rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                        <i class="fas fa-hand-holding-heart fa-3x" style="color: #b8865f;"></i>
                    </div>
                    <h3 class="fw-bold mb-2" style="font-family: 'Prata', serif; color: #2d241e;">Natural & Mindful Wellness</h3>
                    <p class="text-muted" style="max-width: 440px; margin: 0 auto;">
                        Every session is treated as a sacred self-care ritual. We believe beauty blooms naturally when mind and body are in profound equilibrium.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="text-uppercase fw-semibold" style="color: #b8865f; letter-spacing: 2px;">Our Philosophy</span>
                <h2 class="display-6 fw-bold my-3" style="font-family: 'Prata', serif; color: #2d241e;">Reconnecting You With Your Inner Serenity</h2>
                <p class="text-muted leading-relaxed mb-4">
                    Escape the bustle of the city and step into an environment carefully calibrated for peace. From gentle herbal infusions upon arrival to custom massage pressure and botanical shampoos, your well-being is our greatest art.
                </p>
                <div class="d-flex gap-3">
                    <a href="<?= website_url('about') ?>" class="btn btn-pureglow"><i class="fas fa-info-circle me-1"></i>Read Our Story</a>
                    <a href="<?= website_url('team') ?>" class="btn btn-outline-pureglow"><i class="fas fa-users me-1"></i>Meet Specialists</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Specialists Roster -->
<section class="py-5" style="background: #faf8f5;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-uppercase fw-semibold" style="color: #b8865f; letter-spacing: 2px;">Our Specialists</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif; color: #2d241e;">Skilled Therapists & Hair Stylists</h2>
        </div>

        <div class="row g-4">
            <?php foreach ($staff as $member): ?>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-white border-0 shadow-sm rounded-4 text-center p-4 h-100">
                    <div class="avatar-lg mx-auto rounded-circle bg-light d-flex align-items-center justify-content-center mb-3" style="width: 110px; height: 110px; border: 3px solid #ebdcd0;">
                        <i class="fas fa-user-circle fa-4x text-muted"></i>
                    </div>
                    <h5 class="fw-bold mb-1" style="color: #2d241e;"><?= htmlspecialchars($member->name) ?></h5>
                    <div class="small text-uppercase mb-2" style="color: #b8865f; font-weight: 600;"><?= ucfirst($member->role_type) ?></div>
                    <div class="text-warning small mb-3">
                        <i class="fas fa-star"></i> <?= $member->rating ?> / 5.0 Rating
                    </div>
                    <p class="text-muted small mb-3" style="min-height: 40px;"><?= htmlspecialchars(character_limiter($member->bio, 75)) ?></p>
                    <a href="<?= website_url('booking?staff_id='.$member->id) ?>" class="btn btn-outline-pureglow btn-sm w-100">
                        Book Session
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-uppercase fw-semibold" style="color: #b8865f; letter-spacing: 2px;">Guest Experiences</span>
            <h2 class="display-6 fw-bold mt-2" style="font-family: 'Prata', serif; color: #2d241e;">Client Impressions</h2>
        </div>

        <div class="row g-4">
            <?php foreach ($testimonials as $t): ?>
            <div class="col-lg-4 col-md-6">
                <div class="p-4 rounded-4 bg-light h-100 position-relative border-0 shadow-xs">
                    <div class="text-warning mb-3">
                        <?php for ($i=0; $i < $t->rating; $i++): ?><i class="fas fa-star"></i><?php endfor; ?>
                    </div>
                    <p class="text-muted fst-italic mb-4">"<?= htmlspecialchars($t->review) ?>"</p>
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-white text-dark fw-bold rounded-circle d-flex align-items-center justify-content-center me-3 shadow-xs" style="width: 40px; height: 40px; color: #b8865f !important;">
                            <?= strtoupper(substr($t->client_name, 0, 1)) ?>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0" style="color: #2d241e;"><?= htmlspecialchars($t->client_name) ?></h6>
                            <small class="text-muted"><?= htmlspecialchars($t->client_role ? $t->client_role : 'Guest') ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
