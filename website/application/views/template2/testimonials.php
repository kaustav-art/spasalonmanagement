<!-- Page Banner -->
<section class="py-5 text-center" style="background: #f4efe9;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif; color: #2d241e;">Client Reviews & Impressions</h1>
        <p class="text-muted mb-0">Kind thoughts from guests who have spent peaceful hours with us.</p>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-4">
            <?php foreach ($testimonials as $t): ?>
            <div class="col-lg-4 col-md-6">
                <div class="p-4 rounded-4 shadow-sm h-100 d-flex flex-column justify-content-between" style="background: #faf8f5;">
                    <div>
                        <div class="text-warning mb-3">
                            <?php for ($i=0; $i < $t->rating; $i++): ?><i class="fas fa-star"></i><?php endfor; ?>
                        </div>
                        <p class="text-muted leading-relaxed mb-4">"<?= htmlspecialchars($t->review) ?>"</p>
                    </div>
                    <div class="d-flex align-items-center pt-3 border-top">
                        <div class="avatar-sm bg-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-xs" style="width: 44px; height: 44px; color: #b8865f; font-weight: 700;">
                            <?= strtoupper(substr($t->client_name, 0, 1)) ?>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0" style="color: #2d241e;"><?= htmlspecialchars($t->client_name) ?></h6>
                            <small class="text-muted"><?= htmlspecialchars($t->client_role ? $t->client_role : 'Verified Guest') ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
