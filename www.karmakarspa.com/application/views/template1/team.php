<!-- Page Banner -->
<section class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?= template_asset('images/bg/slider-bg-02.jpg', 'template1') ?>') center/cover;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif;">Our Master Artists & Therapists</h1>
        <p class="text-white-50 mb-0">Certified professionals dedicated to your aesthetic excellence and holistic peace.</p>
    </div>
</section>

<section class="py-5" style="background: #121212; color: #fff;">
    <div class="container py-4">
        <div class="row g-4">
            <?php foreach ($team as $member): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card bg-dark border border-secondary border-opacity-25 text-white h-100 p-4 text-center">
                    <div class="avatar-xl mx-auto rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-3" style="width: 140px; height: 140px; border: 3px solid #d4af37;">
                        <i class="fas fa-user-circle fa-5x text-light"></i>
                    </div>
                    <h4 class="fw-bold mb-1"><?= htmlspecialchars($member->name) ?></h4>
                    <span class="badge bg-warning-subtle text-warning text-uppercase small mb-2"><?= ucfirst($member->role_type) ?></span>
                    <div class="text-warning small mb-3">
                        <i class="fas fa-star"></i> <?= $member->rating ?> / 5.0 Star Rating
                    </div>
                    <p class="text-muted small mb-4" style="min-height: 50px;"><?= htmlspecialchars($member->bio) ?></p>
                    <a href="<?= website_url('booking?staff_id='.$member->id) ?>" class="btn btn-outline-gold w-100">
                        <i class="fas fa-calendar-alt me-1"></i>Book With <?= explode(' ', $member->name)[0] ?>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
