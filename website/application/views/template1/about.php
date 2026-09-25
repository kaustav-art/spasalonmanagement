<!-- Page Banner -->
<section class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?= template_asset('images/bg/slider-bg-01.jpg', 'template1') ?>') center/cover;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif;">About Our Sanctuary</h1>
        <p class="text-white-50 mb-0">Discover the heritage, passion, and artistic mastery behind <?= htmlspecialchars($business_name) ?>.</p>
    </div>
</section>

<!-- Story & Philosophy -->
<section class="py-5" style="background: #121212; color: #fff;">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="text-warning text-uppercase fw-semibold" style="letter-spacing: 2px;">Our Story</span>
                <h2 class="display-6 fw-bold my-3" style="font-family: 'Prata', serif;">A Sanctuary of Beauty & Peaceful Reflection</h2>
                <p class="text-muted leading-relaxed">
                    At <?= htmlspecialchars($business_name) ?>, our mission is simple: to offer an extraordinary retreat from the demands of modern life. We combine cutting-edge styling trends from Paris, Milan, and New York with time-honored holistic spa wellness traditions.
                </p>
                <p class="text-muted leading-relaxed">
                    Our team of certified stylists, master colorists, and licensed massage therapists use only 100% certified organic, cruelty-free, and dermatologically tested botanical products to nourish your hair, scalp, skin, and spirit.
                </p>
                <div class="row g-3 mt-2">
                    <div class="col-md-4 text-center p-3 rounded bg-dark border border-secondary border-opacity-25">
                        <h3 class="fw-bold text-warning mb-1"><?= $staff_count ?>+</h3>
                        <small class="text-muted">Master Artists</small>
                    </div>
                    <div class="col-md-4 text-center p-3 rounded bg-dark border border-secondary border-opacity-25">
                        <h3 class="fw-bold text-warning mb-1"><?= $services_count ?>+</h3>
                        <small class="text-muted">Unique Rituals</small>
                    </div>
                    <div class="col-md-4 text-center p-3 rounded bg-dark border border-secondary border-opacity-25">
                        <h3 class="fw-bold text-warning mb-1"><?= $customers_count ?>+</h3>
                        <small class="text-muted">Happy Clients</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-4 rounded-4 bg-dark border border-secondary border-opacity-25">
                    <h4 class="fw-bold text-white mb-3" style="font-family: 'Prata', serif;">Why Choose Our Sanctuary?</h4>
                    <div class="d-flex align-items-start mb-3">
                        <div class="avatar-sm bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 36px; height: 36px;">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-white mb-1">Tailored Consultations</h6>
                            <p class="text-muted small mb-0">Every service begins with a one-on-one consultation to identify your hair structure, skin type, and lifestyle.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="avatar-sm bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 36px; height: 36px;">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-white mb-1">Pure Botanical Formulations</h6>
                            <p class="text-muted small mb-0">Zero harsh chemicals, parabens, or sulfates. Safe for color-treated hair and sensitive skin.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="avatar-sm bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 36px; height: 36px;">
                            <i class="fas fa-gem"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-white mb-1">Private VIP Suites</h6>
                            <p class="text-muted small mb-0">Tranquil acoustic soundproofing, heated treatment tables, and aroma diffusers for genuine relaxation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
