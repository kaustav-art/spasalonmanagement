<!-- Page Banner -->
<section class="py-5 text-center" style="background: #f4efe9;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif; color: #2d241e;">Treatments & Service Menu</h1>
        <p class="text-muted mb-0">Immerse yourself in our organic therapies and precision hair rituals.</p>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <!-- Category Filter Buttons -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            <button class="btn btn-pureglow btn-sm px-3 filter-btn active" onclick="filterServices('all')">All Treatments</button>
            <?php foreach ($categories as $cat): ?>
                <button class="btn btn-outline-secondary btn-sm px-3 filter-btn" onclick="filterServices('cat-<?= $cat->id ?>')"><?= htmlspecialchars($cat->name) ?></button>
            <?php endforeach; ?>
        </div>

        <div class="row g-4" id="servicesGrid">
            <?php foreach ($services as $svc): ?>
            <div class="col-lg-6 service-item cat-<?= $svc->category_id ?>">
                <div class="p-4 rounded-4 shadow-sm h-100 d-flex justify-content-between align-items-center" style="background: #faf8f5;">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <h5 class="fw-bold mb-0" style="color: #2d241e;"><?= htmlspecialchars($svc->name) ?></h5>
                            <span class="badge bg-white text-dark border small"><?= $svc->duration_minutes ?> mins</span>
                        </div>
                        <div class="small mb-2" style="color: #b8865f;"><i class="fas fa-tag me-1"></i><?= htmlspecialchars($svc->category_name) ?></div>
                        <p class="text-muted small mb-0" style="max-width: 360px;"><?= htmlspecialchars($svc->description ? $svc->description : 'Personalized holistic care.') ?></p>
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

<script>
function filterServices(catClass) {
    document.querySelectorAll('.filter-btn').forEach(b => {
        b.classList.remove('btn-pureglow', 'active');
        b.classList.add('btn-outline-secondary');
    });
    event.target.classList.remove('btn-outline-secondary');
    event.target.classList.add('btn-pureglow', 'active');

    var items = document.querySelectorAll('.service-item');
    items.forEach(el => {
        if (catClass === 'all' || el.classList.contains(catClass)) {
            el.style.display = 'block';
        } else {
            el.style.display = 'none';
        }
    });
}
</script>
