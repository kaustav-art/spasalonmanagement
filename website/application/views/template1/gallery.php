<!-- Page Banner -->
<section class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?= template_asset('images/bg/slider-bg-01.jpg', 'template1') ?>') center/cover;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif;">Photo Gallery & Transformations</h1>
        <p class="text-white-50 mb-0">Explore visual inspirations of hair transformations, luxury spa suites, and beauty rituals.</p>
    </div>
</section>

<section class="py-5" style="background: #121212; color: #fff;">
    <div class="container py-4">
        <div class="row g-4">
            <?php foreach ($gallery as $g): ?>
            <div class="col-lg-4 col-md-6">
                <div class="position-relative overflow-hidden rounded-4 shadow-sm" style="height: 280px; background: #222;">
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary text-white-50">
                        <i class="fas fa-image fa-3x"></i>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.9));">
                        <span class="badge bg-warning text-dark text-uppercase small mb-1"><?= htmlspecialchars($g->category) ?></span>
                        <h5 class="fw-bold text-white mb-0"><?= htmlspecialchars($g->title) ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
