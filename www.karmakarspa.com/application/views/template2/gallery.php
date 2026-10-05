<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-4">
            <?php foreach ($gallery as $g): ?>
            <div class="col-lg-4 col-md-6">
                <div class="position-relative overflow-hidden rounded-4 shadow-sm" style="height: 270px; background: #e8ded4;">
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                        <i class="fas fa-image fa-3x" style="color: #b8865f;"></i>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(transparent, rgba(30,25,22,0.85));">
                        <span class="badge bg-warning text-dark text-uppercase small mb-1"><?= htmlspecialchars($g->category) ?></span>
                        <h5 class="fw-bold text-white mb-0"><?= htmlspecialchars($g->title) ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
