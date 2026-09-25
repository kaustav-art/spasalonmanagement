<div class="row align-items-center mb-4">
    <div class="col-md-8">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-palette text-primary me-2"></i> Multi-Template Management</h4>
        <p class="text-muted mb-0">Select your active public website theme and homepage layout. Changes take effect across the public site immediately.</p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <a href="<?= website_url() ?>" target="_blank" class="btn btn-outline-primary shadow-sm">
            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Preview Active Website
        </a>
    </div>
</div>

<form action="<?= admin_url('website/templates') ?>" method="POST">
    <div class="row g-4 mb-4">
        <!-- Template 1: Glamr -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm border-2 <?= ($current_template === 'template1') ? 'border-primary ring-2' : 'border-light' ?>">
                <div class="card-header bg-white d-flex align-items-center justify-content-between py-3 border-bottom">
                    <div>
                        <span class="badge bg-primary text-white me-2">Theme 01</span>
                        <h5 class="d-inline fw-bold mb-0">Glamr &bull; Luxury Salon & Beauty Theme</h5>
                    </div>
                    <?php if ($current_template === 'template1'): ?>
                        <span class="badge bg-success px-3 py-2"><i class="fa-solid fa-circle-check me-1"></i> Currently Active</span>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <p class="text-muted fs-14px">
                        High-end luxury salon & hairstylist design featuring dark-gold aesthetics, elegant typography, stylist showcases, and service pricing tables.
                    </p>

                    <div class="mb-4">
                        <label class="form-check-label fw-bold d-block mb-2">Select Active Homepage Style for Template 1:</label>
                        
                        <div class="list-group">
                            <label class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 cursor-pointer">
                                <div class="d-flex align-items-center gap-3">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="tpl1_layout" value="1" <?= ($current_template === 'template1' && $current_layout == 1) ? 'checked' : '' ?>>
                                    <div>
                                        <div class="fw-semibold text-dark">Homepage 01 (Signature Hero Slider)</div>
                                        <div class="text-muted fs-12px">Classic luxury hero slider with service carousel and online booking CTA.</div>
                                    </div>
                                </div>
                                <a href="<?= website_url('?preview_tpl=template1&preview_layout=1') ?>" target="_blank" class="btn btn-xs btn-outline-secondary">Preview</a>
                            </label>

                            <label class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 cursor-pointer">
                                <div class="d-flex align-items-center gap-3">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="tpl1_layout" value="2" <?= ($current_template === 'template1' && $current_layout == 2) ? 'checked' : '' ?>>
                                    <div>
                                        <div class="fw-semibold text-dark">Homepage 02 (Modern Editorial Grid)</div>
                                        <div class="text-muted fs-12px">Editorial style magazine layout with team grid and animated counter blocks.</div>
                                    </div>
                                </div>
                                <a href="<?= website_url('?preview_tpl=template1&preview_layout=2') ?>" target="_blank" class="btn btn-xs btn-outline-secondary">Preview</a>
                            </label>

                            <label class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 cursor-pointer">
                                <div class="d-flex align-items-center gap-3">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="tpl1_layout" value="3" <?= ($current_template === 'template1' && $current_layout == 3) ? 'checked' : '' ?>>
                                    <div>
                                        <div class="fw-semibold text-dark">Homepage 03 (Creative Split Experience)</div>
                                        <div class="text-muted fs-12px">Dynamic split screen hero, portfolio gallery, and testimonials ticker.</div>
                                    </div>
                                </div>
                                <a href="<?= website_url('?preview_tpl=template1&preview_layout=3') ?>" target="_blank" class="btn btn-xs btn-outline-secondary">Preview</a>
                            </label>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="button" class="btn <?= ($current_template === 'template1') ? 'btn-primary' : 'btn-outline-primary' ?>" onclick="activateTheme('template1')">
                            <i class="fa-solid fa-check me-1"></i> Activate Template 1 (Glamr)
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Template 2: Pureglow -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm border-2 <?= ($current_template === 'template2') ? 'border-primary ring-2' : 'border-light' ?>">
                <div class="card-header bg-white d-flex align-items-center justify-content-between py-3 border-bottom">
                    <div>
                        <span class="badge bg-success text-white me-2">Theme 02</span>
                        <h5 class="d-inline fw-bold mb-0">Pureglow &bull; Day Spa & Holistic Retreat Theme</h5>
                    </div>
                    <?php if ($current_template === 'template2'): ?>
                        <span class="badge bg-success px-3 py-2"><i class="fa-solid fa-circle-check me-1"></i> Currently Active</span>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <p class="text-muted fs-14px">
                        Tranquil, botanical wellness theme with organic color palettes, smooth animations, treatment menus, hydrotherapy features, and calm spa ambiance.
                    </p>

                    <div class="mb-4">
                        <label class="form-check-label fw-bold d-block mb-2">Select Active Homepage Style for Template 2:</label>
                        
                        <div class="list-group">
                            <label class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 cursor-pointer">
                                <div class="d-flex align-items-center gap-3">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="tpl2_layout" value="1" <?= ($current_template === 'template2' && $current_layout == 1) ? 'checked' : '' ?>>
                                    <div>
                                        <div class="fw-semibold text-dark">Homepage 01 (Botanical Sanctuary)</div>
                                        <div class="text-muted fs-12px">Full animated hero banner, popular treatments showcase, and fast booking widget.</div>
                                    </div>
                                </div>
                                <a href="<?= website_url('?preview_tpl=template2&preview_layout=1') ?>" target="_blank" class="btn btn-xs btn-outline-secondary">Preview</a>
                            </label>

                            <label class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 cursor-pointer">
                                <div class="d-flex align-items-center gap-3">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="tpl2_layout" value="2" <?= ($current_template === 'template2' && $current_layout == 2) ? 'checked' : '' ?>>
                                    <div>
                                        <div class="fw-semibold text-dark">Homepage 02 (Minimalist Zen Therapy)</div>
                                        <div class="text-muted fs-12px">Clean spa treatment ritual cards, therapists spotlight, and organic wellness pricing.</div>
                                    </div>
                                </div>
                                <a href="<?= website_url('?preview_tpl=template2&preview_layout=2') ?>" target="_blank" class="btn btn-xs btn-outline-secondary">Preview</a>
                            </label>

                            <label class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 cursor-pointer">
                                <div class="d-flex align-items-center gap-3">
                                    <input class="form-check-input flex-shrink-0" type="radio" name="tpl2_layout" value="3" <?= ($current_template === 'template2' && $current_layout == 3) ? 'checked' : '' ?>>
                                    <div>
                                        <div class="fw-semibold text-dark">Homepage 03 (Immersive Spa Sanctuary)</div>
                                        <div class="text-muted fs-12px">Private treatment room previews, hot stone highlights, and client stories.</div>
                                    </div>
                                </div>
                                <a href="<?= website_url('?preview_tpl=template2&preview_layout=3') ?>" target="_blank" class="btn btn-xs btn-outline-secondary">Preview</a>
                            </label>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="button" class="btn <?= ($current_template === 'template2') ? 'btn-success' : 'btn-outline-success' ?>" onclick="activateTheme('template2')">
                            <i class="fa-solid fa-check me-1"></i> Activate Template 2 (Pureglow)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden form submission fields -->
    <input type="hidden" name="active_template" id="hidden_active_template" value="<?= html_escape($current_template) ?>">
    <input type="hidden" name="active_home_layout" id="hidden_active_home_layout" value="<?= html_escape($current_layout) ?>">
</form>

<script>
function activateTheme(template) {
    document.getElementById('hidden_active_template').value = template;
    var layout = '1';
    if (template === 'template1') {
        var el = document.querySelector('input[name="tpl1_layout"]:checked');
        if (el) layout = el.value;
    } else {
        var el = document.querySelector('input[name="tpl2_layout"]:checked');
        if (el) layout = el.value;
    }
    document.getElementById('hidden_active_home_layout').value = layout;
    document.forms[0].submit();
}
</script>
