<!-- Page Banner -->
<section class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?= template_asset('images/bg/slider-bg-02.jpg', 'template1') ?>') center/cover;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif;">Guest Reviews & Feedback</h1>
        <p class="text-white-50 mb-0">Read what our cherished clients share about their experiences at <?= htmlspecialchars($business_name) ?>.</p>
    </div>
</section>

<section class="py-5" style="background: #121212; color: #fff;">
    <div class="container py-4">
        <div class="row g-4">
            <?php foreach ($testimonials as $t): ?>
            <div class="col-lg-4 col-md-6">
                <div class="p-4 rounded-4 bg-dark border border-secondary border-opacity-25 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="text-warning mb-3">
                            <?php for ($i=0; $i < $t->rating; $i++): ?><i class="fas fa-star"></i><?php endfor; ?>
                        </div>
                        <p class="text-light leading-relaxed mb-4">"<?= htmlspecialchars($t->review) ?>"</p>
                    </div>
                    <div class="d-flex align-items-center pt-3 border-top border-secondary border-opacity-25">
                        <div class="avatar-sm bg-warning text-dark fw-bold rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 44px; height: 44px;">
                            <?= strtoupper(substr($t->client_name, 0, 1)) ?>
                        </div>
                        <div>
                            <h6 class="fw-bold text-white mb-0"><?= htmlspecialchars($t->client_name) ?></h6>
                            <small class="text-muted"><?= htmlspecialchars($t->client_role ? $t->client_role : 'Verified Guest') ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
