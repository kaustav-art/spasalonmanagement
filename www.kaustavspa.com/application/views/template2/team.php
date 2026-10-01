<!-- Page Banner -->
<section class="py-5 text-center" style="background: #f4efe9;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif; color: #2d241e;">Our Specialists & Therapists</h1>
        <p class="text-muted mb-0">Devoted wellness practitioners and hair artisans dedicated to your radiance.</p>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-4">
            <?php foreach ($team as $member): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card rounded-4 border-0 shadow-sm p-4 text-center h-100" style="background: #faf8f5;">
                    <div class="avatar-xl mx-auto rounded-circle bg-white d-flex align-items-center justify-content-center mb-3 shadow-xs" style="width: 130px; height: 130px; border: 3px solid #ebdcd0;">
                        <i class="fas fa-user-circle fa-5x text-muted"></i>
                    </div>
                    <h4 class="fw-bold mb-1" style="color: #2d241e;"><?= htmlspecialchars($member->name) ?></h4>
                    <span class="small text-uppercase mb-2" style="color: #b8865f; font-weight: 600;"><?= ucfirst($member->role_type) ?></span>
                    <div class="text-warning small mb-3">
                        <i class="fas fa-star"></i> <?= $member->rating ?> / 5.0 Star Rating
                    </div>
                    <p class="text-muted small mb-4" style="min-height: 50px;"><?= htmlspecialchars($member->bio) ?></p>
                    <a href="<?= website_url('booking?staff_id='.$member->id) ?>" class="btn btn-outline-pureglow w-100">
                        Book With <?= explode(' ', $member->name)[0] ?>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
