<!-- Page Banner -->
<section class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?= template_asset('images/bg/slider-bg-02.jpg', 'template1') ?>') center/cover;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif;">Treatment & Service Menu</h1>
        <p class="text-white-50 mb-0">Immerse yourself in our signature hair styling, skincare therapy, and restorative spa rituals.</p>
    </div>
</section>

<section class="py-5" style="background: #121212; color: #fff;">
    <div class="container py-4">
        <!-- Category Filter Buttons -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            <button class="btn btn-gold btn-sm px-3 filter-btn active" onclick="filterServices('all')">All Treatments</button>
            <?php foreach ($categories as $cat): ?>
                <button class="btn btn-outline-secondary text-white btn-sm px-3 filter-btn" onclick="filterServices('cat-<?= $cat->id ?>')"><?= htmlspecialchars($cat->name) ?></button>
            <?php endforeach; ?>
        </div>

        <div class="row g-4" id="servicesGrid">
            <?php foreach ($services as $svc): ?>
            <div class="col-lg-6 service-item cat-<?= $svc->category_id ?>">
                <div class="p-4 rounded-4 bg-dark border border-secondary border-opacity-25 h-100 d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <h5 class="fw-bold text-white mb-0"><?= htmlspecialchars($svc->name) ?></h5>
                            <span class="badge bg-secondary text-warning small"><?= $svc->duration_minutes ?> mins</span>
                        </div>
                        <div class="text-muted small mb-2"><i class="fas fa-tag me-1"></i><?= htmlspecialchars($svc->category_name) ?></div>
                        <p class="text-muted small mb-0" style="max-width: 360px;"><?= htmlspecialchars($svc->description ? $svc->description : 'Premium personalized therapy.') ?></p>
                    </div>
                    <div class="text-end ps-3">
                        <div class="fs-4 fw-bold text-warning mb-2"><?= format_currency($svc->price) ?></div>
                        <a href="<?= website_url('booking?service_id='.$svc->id) ?>" class="btn btn-gold btn-sm">
                            <i class="fas fa-calendar-check me-1"></i>Book
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
        b.classList.remove('btn-gold', 'active');
        b.classList.add('btn-outline-secondary', 'text-white');
    });
    event.target.classList.remove('btn-outline-secondary', 'text-white');
    event.target.classList.add('btn-gold', 'active');

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
