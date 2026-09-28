<?php
$settings = (isset($settings) && is_array($settings)) ? $settings : array();
$s = function($key, $default = '') use (&$settings) {
    if (!isset($settings[$key]) && function_exists('get_setting')) {
        return get_setting($key, $default);
    }
    return isset($settings[$key]) ? $settings[$key] : $default;
};
$curr_tab = isset($active_tab) ? $active_tab : 'hero';
$base_url = rtrim(base_url(), '/') . '/';
$root_url = rtrim(main_site_url(), '/') . '/';

// Helpers for image URLs
$hero_bg_val = $s('landing_hero_bg_image');
$hero_bg_preview = !empty($hero_bg_val) ? (strpos($hero_bg_val, 'http') === 0 ? $hero_bg_val : $root_url . ltrim($hero_bg_val, '/')) : '';

$logo_val = $s('landing_site_logo');
$logo_preview = !empty($logo_val) ? (strpos($logo_val, 'http') === 0 ? $logo_val : $root_url . ltrim($logo_val, '/')) : '';

$fav_val = $s('landing_site_favicon');
$fav_preview = !empty($fav_val) ? (strpos($fav_val, 'http') === 0 ? $fav_val : $root_url . ltrim($fav_val, '/')) : '';
?>
<div class="container-fluid px-4 py-4">
    <!-- Top Action Bar -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 pb-3 border-bottom border-secondary border-opacity-25">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-warning text-dark fw-bold font-monospace px-2 py-1">PUBLIC WEBSITE CMS</span>
                <span class="badge bg-secondary">LIVE SYNC ACTIVE</span>
            </div>
            <h3 class="fw-bold text-white mb-0 font-serif">Product Website &amp; Landing Page Management</h3>
            <p class="text-muted small mb-0">Customize and govern the commercial software marketplace website (<code>http://localhost/spasalonmanagement/</code>) dynamically in real time.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="<?= main_site_url() ?>" target="_blank" class="btn btn-gold btn-sm fw-bold px-3">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live Website
            </a>
            <a href="<?= superadmin_url('plans') ?>" class="btn btn-outline-light btn-sm fw-semibold px-3">
                <i class="fa-solid fa-tags me-1"></i> Pricing Cards
            </a>
            <a href="<?= superadmin_url('settings?tab=gateways') ?>" class="btn btn-outline-warning btn-sm fw-semibold px-3">
                <i class="fa-solid fa-credit-card me-1"></i> Payment Gateways
            </a>
        </div>
    </div>

    <!-- Live Status Overview Card -->
    <div class="card border-0 rounded-4 mb-4" style="background: linear-gradient(135deg, #111a2e 0%, #0c1322 100%); border: 1px solid rgba(194, 153, 88, 0.25) !important;">
        <div class="card-body p-4">
            <div class="row align-items-center g-3">
                <div class="col-lg-8">
                    <h5 class="text-white fw-bold mb-1">Live Dynamic Content Engine</h5>
                    <p class="text-light text-opacity-75 small mb-0">
                        Any copy, background image, logo, favicon, SEO meta tags, social media links, or specs modified here take effect immediately on the public website with zero code deployments.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fs-6">
                        <i class="fa-solid fa-circle-check me-1"></i> Live CMS Synchronization Active
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-pills gap-2 mb-4 p-2 rounded-3 border border-secondary border-opacity-25" style="background: #0c1322;">
        <li class="nav-item">
            <a class="nav-link <?= $curr_tab === 'hero' ? 'active' : '' ?>" href="#tabHero" data-bs-toggle="pill">
                <i class="fa-solid fa-bullhorn me-1"></i> Hero, Brand &amp; Media
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $curr_tab === 'seo' ? 'active' : '' ?>" href="#tabSeo" data-bs-toggle="pill">
                <i class="fa-solid fa-share-nodes me-1"></i> Page SEO &amp; Social Media
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $curr_tab === 'themes' ? 'active' : '' ?>" href="#tabThemes" data-bs-toggle="pill">
                <i class="fa-solid fa-palette me-1"></i> Multi-Theme Architecture &amp; Layouts
            </a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">

        <!-- TAB 1: HERO, BRAND & MEDIA -->
        <div class="tab-pane fade <?= $curr_tab === 'hero' ? 'show active' : '' ?>" id="tabHero">
            <form action="<?= superadmin_url('website') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="active_tab" value="hero">
                
                <!-- Website Logo & Favicon Branding -->
                <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #111a2e; border: 1px solid rgba(255,255,255,0.08) !important;">
                    <div class="card-header bg-black bg-opacity-25 py-3 border-bottom border-secondary border-opacity-25">
                        <h5 class="text-white fw-bold mb-0"><i class="fa-solid fa-gem text-warning me-2"></i>Website Logo &amp; Favicon Branding</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <!-- Website Logo -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded-3" style="background: rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.06);">
                                    <label class="form-label fw-bold text-white d-flex align-items-center justify-content-between">
                                        <span><i class="fa-solid fa-image text-warning me-1"></i> Website Logo</span>
                                        <span class="badge bg-secondary small">PNG, SVG, WEBP</span>
                                    </label>
                                    
                                    <!-- Logo Live Preview Box -->
                                    <div class="mb-3 p-3 rounded text-center d-flex align-items-center justify-content-center" style="min-height: 90px; background: #080d19; border: 1px dashed rgba(194,153,88,0.4);">
                                        <div id="logoPreviewContainer">
                                            <?php if (!empty($logo_preview)): ?>
                                                <img src="<?= htmlspecialchars($logo_preview) ?>" id="logoPreviewImg" alt="Logo Preview" style="max-height: 55px; max-width: 100%; object-fit: contain;">
                                            <?php else: ?>
                                                <div id="logoPlaceholder" class="text-muted small">
                                                    <i class="fa-solid fa-image fa-2x mb-1 d-block opacity-50"></i>
                                                    No custom logo uploaded. Default text brand icon is active.
                                                </div>
                                                <img src="" id="logoPreviewImg" alt="Logo Preview" style="max-height: 55px; max-width: 100%; object-fit: contain; display: none;">
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label text-muted small mb-1">Upload New Logo File:</label>
                                        <input type="file" name="landing_site_logo_file" id="logoFileInput" class="form-control form-control-sm" accept="image/*">
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <label class="form-label text-muted small mb-0">Or Logo Image URL / Path:</label>
                                            <button type="button" class="btn btn-link btn-sm text-danger p-0 text-decoration-none small" id="clearLogoBtn">
                                                <i class="fa-solid fa-trash-can me-1"></i> Clear
                                            </button>
                                        </div>
                                        <input type="text" name="landing_site_logo" id="logoUrlInput" class="form-control form-control-sm font-monospace" value="<?= htmlspecialchars($logo_val) ?>" placeholder="uploads/branding/logo.png">
                                        <input type="hidden" name="clear_landing_site_logo" id="clearLogoFlag" value="0">
                                    </div>
                                </div>
                            </div>

                            <!-- Website Favicon -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded-3" style="background: rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.06);">
                                    <label class="form-label fw-bold text-white d-flex align-items-center justify-content-between">
                                        <span><i class="fa-solid fa-globe text-info me-1"></i> Browser Favicon</span>
                                        <span class="badge bg-secondary small">ICO, PNG, SVG (32x32)</span>
                                    </label>

                                    <!-- Favicon Live Tab Simulation -->
                                    <div class="mb-3 p-3 rounded" style="background: #080d19; border: 1px dashed rgba(194,153,88,0.4);">
                                        <div class="small text-muted mb-2">Simulated Browser Tab:</div>
                                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-top bg-dark text-white border border-secondary border-bottom-0 shadow-sm" style="max-width: 280px;">
                                            <div id="faviconPreviewContainer" style="width: 20px; height: 20px; display: inline-flex; align-items: center; justify-content: center;">
                                                <?php if (!empty($fav_preview)): ?>
                                                    <img src="<?= htmlspecialchars($fav_preview) ?>" id="favPreviewImg" alt="Favicon" style="width: 18px; height: 18px; object-fit: contain;">
                                                <?php else: ?>
                                                    <i class="fa-solid fa-spa text-warning" id="favPlaceholder"></i>
                                                    <img src="" id="favPreviewImg" alt="Favicon" style="width: 18px; height: 18px; object-fit: contain; display: none;">
                                                <?php endif; ?>
                                            </div>
                                            <span class="small text-truncate fw-semibold" id="tabTitlePreview"><?= htmlspecialchars($s('landing_site_title', 'Luxe Salon & Spa Management')) ?></span>
                                            <i class="fa-solid fa-xmark text-muted ms-auto small"></i>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label text-muted small mb-1">Upload New Favicon File:</label>
                                        <input type="file" name="landing_site_favicon_file" id="favFileInput" class="form-control form-control-sm" accept=".ico,image/png,image/svg+xml">
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <label class="form-label text-muted small mb-0">Or Favicon URL / Path:</label>
                                            <button type="button" class="btn btn-link btn-sm text-danger p-0 text-decoration-none small" id="clearFavBtn">
                                                <i class="fa-solid fa-trash-can me-1"></i> Clear
                                            </button>
                                        </div>
                                        <input type="text" name="landing_site_favicon" id="favUrlInput" class="form-control form-control-sm font-monospace" value="<?= htmlspecialchars($fav_val) ?>" placeholder="uploads/branding/favicon.ico">
                                        <input type="hidden" name="clear_landing_site_favicon" id="clearFavFlag" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hero Section & Background Image Live Preview -->
                <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #111a2e; border: 1px solid rgba(255,255,255,0.08) !important;">
                    <div class="card-header bg-black bg-opacity-25 py-3 border-bottom border-secondary border-opacity-25 d-flex align-items-center justify-content-between">
                        <h5 class="text-white fw-bold mb-0"><i class="fa-solid fa-panorama text-warning me-2"></i>Hero Background Image &amp; Stage</h5>
                        <span class="badge bg-warning text-dark fw-bold">LIVE STAGE PREVIEW</span>
                    </div>
                    <div class="card-body p-4">
                        
                        <!-- Interactive Hero Live Preview Box -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-white mb-2">Live Hero Banner Preview:</label>
                            <div id="heroLivePreview" class="p-4 p-md-5 rounded-4 position-relative overflow-hidden shadow" 
                                 style="min-height: 240px; background: <?= !empty($hero_bg_preview) ? "linear-gradient(rgba(15, 23, 42, 0.82), rgba(15, 23, 42, 0.94)), url('{$hero_bg_preview}')" : 'linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%)' ?>; background-size: cover; background-position: center; border: 2px solid rgba(194,153,88,0.5);">
                                <div class="position-relative" style="z-index: 2;">
                                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(194,153,88,0.25); border: 1px solid #c29958;">
                                        <i class="fa-solid fa-sparkles text-warning small"></i>
                                        <span class="text-warning small fw-bold font-monospace text-uppercase" id="previewHeroBadge"><?= htmlspecialchars($s('landing_hero_badge', 'COMMERCIAL SOFTWARE EDITION')) ?></span>
                                    </div>
                                    <h3 class="display-6 fw-bold text-white font-serif mb-2" id="previewHeroTitle">
                                        <?= htmlspecialchars($s('landing_hero_title', 'All-in-One Salon & Spa')) ?>
                                        <span class="text-warning" id="previewHeroHighlight"><?= htmlspecialchars($s('landing_hero_title_highlight', 'Management Platform')) ?></span>
                                    </h3>
                                    <p class="text-light text-opacity-75 small mb-3 max-w-700" id="previewHeroLead" style="max-width: 600px;">
                                        <?= htmlspecialchars($s('landing_hero_lead', 'Empower single and multi-chair studios, beauty bars, and luxury wellness centers.')) ?>
                                    </p>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-warning btn-sm fw-bold">
                                            <i class="fa-solid fa-bolt me-1"></i> <span id="previewCta1"><?= htmlspecialchars($s('landing_hero_cta_primary', 'Get Instant Access')) ?></span>
                                        </button>
                                        <button type="button" class="btn btn-outline-light btn-sm fw-semibold">
                                            <i class="fa-solid fa-eye me-1"></i> <span id="previewCta2"><?= htmlspecialchars($s('landing_hero_cta_secondary', 'Live Interactive Demos')) ?></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="position-absolute bottom-0 end-0 p-3 text-end" style="z-index: 2;">
                                    <span class="badge bg-black bg-opacity-75 text-warning border border-secondary small">
                                        <i class="fa-solid fa-camera me-1"></i> Dynamic Hero Preview
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Hero Background Image Controls -->
                        <div class="row g-3 mb-4 p-3 rounded-3" style="background: rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.06);">
                            <div class="col-md-6">
                                <label class="form-label text-white fw-bold small">Upload Hero Background Image File:</label>
                                <input type="file" name="landing_hero_bg_file" id="heroBgFileInput" class="form-control" accept="image/*">
                                <small class="text-muted">High resolution JPG, PNG, or WEBP recommended (1920x1080px).</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white fw-bold small">Or Hero Background Image URL / Path:</label>
                                <div class="input-group">
                                    <input type="text" name="landing_hero_bg_image" id="heroBgUrlInput" class="form-control font-monospace" value="<?= htmlspecialchars($hero_bg_val) ?>" placeholder="uploads/branding/hero-bg.jpg">
                                    <button class="btn btn-outline-danger" type="button" id="clearHeroBgBtn" title="Clear Background Image">
                                        <i class="fa-solid fa-trash-can"></i> Clear
                                    </button>
                                </div>
                                <small class="text-muted">Leave empty to use standard dark gradient backdrop.</small>
                            </div>
                        </div>

                        <!-- Hero Typography & Content -->
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label text-white small fw-bold">Hero Eyebrow Badge</label>
                                <input type="text" name="landing_hero_badge" id="heroBadgeInput" class="form-control" value="<?= htmlspecialchars($s('landing_hero_badge')) ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-white small fw-bold">Hero Headline Title</label>
                                <input type="text" name="landing_hero_title" id="heroTitleInput" class="form-control" value="<?= htmlspecialchars($s('landing_hero_title')) ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-white small fw-bold">Title Highlight (Gold Accent)</label>
                                <input type="text" name="landing_hero_title_highlight" id="heroHighlightInput" class="form-control" value="<?= htmlspecialchars($s('landing_hero_title_highlight')) ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white small fw-bold">Hero Lead Subtitle Description</label>
                                <textarea name="landing_hero_lead" id="heroLeadInput" rows="2" class="form-control"><?= htmlspecialchars($s('landing_hero_lead')) ?></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white small fw-bold">Feature Pills Badges (One per line)</label>
                                <textarea name="landing_hero_pills" rows="3" class="form-control font-monospace"><?= htmlspecialchars($s('landing_hero_pills')) ?></textarea>
                                <small class="text-muted">Each line appears as a glowing gold check pill under the hero description.</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold">Primary Action Button Text</label>
                                <input type="text" name="landing_hero_cta_primary" id="heroCta1Input" class="form-control" value="<?= htmlspecialchars($s('landing_hero_cta_primary')) ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold">Secondary Action Button Text</label>
                                <input type="text" name="landing_hero_cta_secondary" id="heroCta2Input" class="form-control" value="<?= htmlspecialchars($s('landing_hero_cta_secondary')) ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Brand Header & Navigation Settings -->
                <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #111a2e; border: 1px solid rgba(255,255,255,0.08) !important;">
                    <div class="card-header bg-black bg-opacity-25 py-3 border-bottom border-secondary border-opacity-25">
                        <h5 class="text-white fw-bold mb-0"><i class="fa-solid fa-heading text-warning me-2"></i>Navigation Brand Typography</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label text-white small fw-bold">Brand Name (Prefix)</label>
                                <input type="text" name="landing_brand_name" class="form-control" value="<?= htmlspecialchars($s('landing_brand_name', 'LUXE')) ?>" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-white small fw-bold">Brand Highlight (Suffix)</label>
                                <input type="text" name="landing_brand_highlight" class="form-control" value="<?= htmlspecialchars($s('landing_brand_highlight', 'SALON & SPA')) ?>" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-white small fw-bold">Navbar CTA Button Text</label>
                                <input type="text" name="landing_header_cta_text" class="form-control" value="<?= htmlspecialchars($s('landing_header_cta_text', 'Buy Script Now')) ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-white small fw-bold">Navbar CTA Link</label>
                                <input type="text" name="landing_header_cta_link" class="form-control" value="<?= htmlspecialchars($s('landing_header_cta_link', '#pricing')) ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hero Deployment Specifications Card -->
                <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #111a2e; border: 1px solid rgba(255,255,255,0.08) !important;">
                    <div class="card-header bg-black bg-opacity-25 py-3 border-bottom border-secondary border-opacity-25">
                        <h5 class="text-white fw-bold mb-0"><i class="fa-solid fa-server text-warning me-2"></i>Hero Right-Hand Deployment Specifications Card</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold">Card Title</label>
                                <input type="text" name="landing_hero_card_title" class="form-control" value="<?= htmlspecialchars($s('landing_hero_card_title')) ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold">Card Subtitle / Version</label>
                                <input type="text" name="landing_hero_card_desc" class="form-control" value="<?= htmlspecialchars($s('landing_hero_card_desc')) ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white small fw-bold">Specifications Key-Value Pairs (Format: Key | Value per line)</label>
                                <textarea name="landing_hero_specs" rows="6" class="form-control font-monospace"><?= htmlspecialchars($s('landing_hero_specs')) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning btn-lg fw-bold px-4 shadow">
                    <i class="fa-solid fa-check me-2"></i> Save Hero, Media &amp; Brand Settings
                </button>
            </form>
        </div>

        <!-- TAB 2: SEO & SOCIAL MEDIA -->
        <div class="tab-pane fade <?= $curr_tab === 'seo' ? 'show active' : '' ?>" id="tabSeo">
            <form action="<?= superadmin_url('website') ?>" method="post">
                <input type="hidden" name="active_tab" value="seo">

                <!-- Google Search Result Preview -->
                <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #111a2e; border: 1px solid rgba(255,255,255,0.08) !important;">
                    <div class="card-header bg-black bg-opacity-25 py-3 border-bottom border-secondary border-opacity-25">
                        <h5 class="text-white fw-bold mb-0"><i class="fa-brands fa-google text-warning me-2"></i>Google Search Engine Snippet Preview</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="p-3 rounded-3 bg-white text-dark mb-4" style="max-width: 650px; font-family: arial, sans-serif;">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="rounded-circle bg-light border p-1" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-solid fa-globe text-primary small"></i>
                                </div>
                                <div>
                                    <div class="small text-muted" style="font-size: 12px;" id="seoPreviewUrl"><?= htmlspecialchars($s('landing_seo_canonical_url', 'http://localhost/spasalonmanagement/')) ?></div>
                                </div>
                            </div>
                            <h5 class="text-primary mb-1 text-truncate" style="font-size: 18px; cursor: pointer;" id="seoPreviewTitle">
                                <?= htmlspecialchars($s('landing_seo_meta_title', 'Luxe Salon & Spa Management Software | Multi-Edition & Multi-Theme System')) ?>
                            </h5>
                            <p class="text-muted small mb-0" style="font-size: 13px; line-height: 1.4;" id="seoPreviewDesc">
                                <?= htmlspecialchars($s('landing_seo_meta_desc', 'Premium commercial salon and spa management platform with stylist/therapist rosters, room conflict engine, multi-template booking wizard, POS billing, and Super Admin control.')) ?>
                            </p>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold">SEO Meta Title (Title Tag)</label>
                                <input type="text" name="landing_seo_meta_title" id="seoTitleInput" class="form-control" value="<?= htmlspecialchars($s('landing_seo_meta_title')) ?>" required>
                                <small class="text-muted">Recommended: 50-60 characters.</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold">Canonical Website URL</label>
                                <input type="url" name="landing_seo_canonical_url" id="seoUrlInput" class="form-control" value="<?= htmlspecialchars($s('landing_seo_canonical_url', 'http://localhost/spasalonmanagement/')) ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white small fw-bold">SEO Meta Description</label>
                                <textarea name="landing_seo_meta_desc" id="seoDescInput" rows="2" class="form-control"><?= htmlspecialchars($s('landing_seo_meta_desc')) ?></textarea>
                                <small class="text-muted">Recommended: 120-160 characters describing your commercial script.</small>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white small fw-bold">SEO Meta Keywords (Comma separated)</label>
                                <input type="text" name="landing_seo_meta_keywords" class="form-control font-monospace" value="<?= htmlspecialchars($s('landing_seo_meta_keywords')) ?>" placeholder="salon software, spa management, pos, booking script">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Open Graph & Social Cards -->
                <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #111a2e; border: 1px solid rgba(255,255,255,0.08) !important;">
                    <div class="card-header bg-black bg-opacity-25 py-3 border-bottom border-secondary border-opacity-25">
                        <h5 class="text-white fw-bold mb-0"><i class="fa-solid fa-share-nodes text-warning me-2"></i>Open Graph (Facebook, WhatsApp, LinkedIn, X Preview)</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold">OG Social Title</label>
                                <input type="text" name="landing_seo_og_title" class="form-control" value="<?= htmlspecialchars($s('landing_seo_og_title')) ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold">OG Social Image URL</label>
                                <input type="text" name="landing_seo_og_image" class="form-control font-monospace" value="<?= htmlspecialchars($s('landing_seo_og_image')) ?>" placeholder="uploads/branding/social-preview.jpg">
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white small fw-bold">OG Social Description</label>
                                <textarea name="landing_seo_og_desc" rows="2" class="form-control"><?= htmlspecialchars($s('landing_seo_og_desc')) ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold">Twitter / X Card Type</label>
                                <select name="landing_seo_twitter_card" class="form-select">
                                    <option value="summary_large_image" <?= $s('landing_seo_twitter_card') === 'summary_large_image' ? 'selected' : '' ?>>summary_large_image (Large Banner Card)</option>
                                    <option value="summary" <?= $s('landing_seo_twitter_card') === 'summary' ? 'selected' : '' ?>>summary (Square Thumbnail)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media Channel Links -->
                <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #111a2e; border: 1px solid rgba(255,255,255,0.08) !important;">
                    <div class="card-header bg-black bg-opacity-25 py-3 border-bottom border-secondary border-opacity-25">
                        <h5 class="text-white fw-bold mb-0"><i class="fa-solid fa-users text-warning me-2"></i>Social Media Channel Links</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold"><i class="fa-brands fa-facebook text-primary me-1"></i> Facebook Page URL</label>
                                <input type="url" name="landing_social_facebook" class="form-control" value="<?= htmlspecialchars($s('landing_social_facebook')) ?>" placeholder="https://facebook.com/yourpage">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold"><i class="fa-brands fa-instagram text-danger me-1"></i> Instagram Profile URL</label>
                                <input type="url" name="landing_social_instagram" class="form-control" value="<?= htmlspecialchars($s('landing_social_instagram')) ?>" placeholder="https://instagram.com/yourprofile">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold"><i class="fa-brands fa-x-twitter text-light me-1"></i> Twitter / X Profile URL</label>
                                <input type="url" name="landing_social_twitter" class="form-control" value="<?= htmlspecialchars($s('landing_social_twitter')) ?>" placeholder="https://twitter.com/yourhandle">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold"><i class="fa-brands fa-linkedin text-info me-1"></i> LinkedIn Company URL</label>
                                <input type="url" name="landing_social_linkedin" class="form-control" value="<?= htmlspecialchars($s('landing_social_linkedin')) ?>" placeholder="https://linkedin.com/company/yourcompany">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold"><i class="fa-brands fa-youtube text-danger me-1"></i> YouTube Channel URL</label>
                                <input type="url" name="landing_social_youtube" class="form-control" value="<?= htmlspecialchars($s('landing_social_youtube')) ?>" placeholder="https://youtube.com/@yourchannel">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white small fw-bold"><i class="fa-brands fa-whatsapp text-success me-1"></i> WhatsApp Business Link / Number</label>
                                <input type="text" name="landing_social_whatsapp" class="form-control" value="<?= htmlspecialchars($s('landing_social_whatsapp')) ?>" placeholder="https://wa.me/15551234567">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning btn-lg fw-bold px-4 shadow">
                    <i class="fa-solid fa-check me-2"></i> Save SEO &amp; Social Media Settings
                </button>
            </form>
        </div>

        <!-- TAB 3: MULTI-THEME ARCHITECTURE & LAYOUTS -->
        <div class="tab-pane fade <?= $curr_tab === 'themes' ? 'show active' : '' ?>" id="tabThemes">
            <!-- Section Header Settings Card -->
            <form action="<?= superadmin_url('website') ?>" method="post" class="mb-4">
                <input type="hidden" name="active_tab" value="themes">
                <input type="hidden" name="theme_action" value="save_theme_section">

                <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #111a2e; border: 1px solid rgba(255,255,255,0.08) !important;">
                    <div class="card-header bg-black bg-opacity-25 py-3 border-bottom border-secondary border-opacity-25 d-flex align-items-center justify-content-between">
                        <h5 class="text-white fw-bold mb-0">
                            <i class="fa-solid fa-heading text-warning me-2"></i>Multi-Theme Section Heading &amp; Copy
                        </h5>
                        <button type="submit" class="btn btn-warning btn-sm fw-bold px-3">
                            <i class="fa-solid fa-check me-1"></i> Save Section Copy
                        </button>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label text-white small fw-bold">Section Badge Text</label>
                                <input type="text" name="landing_templates_badge" class="form-control" value="<?= htmlspecialchars($s('landing_templates_badge', 'Multi-Theme Architecture')) ?>" placeholder="Multi-Theme Architecture">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label text-white small fw-bold">Section Title Heading</label>
                                <input type="text" name="landing_templates_title" class="form-control" value="<?= htmlspecialchars($s('landing_templates_title', 'Two World-Class Templates Included')) ?>" placeholder="Two World-Class Templates Included">
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white small fw-bold">Section Subtitle / Description</label>
                                <textarea name="landing_templates_subtitle" class="form-control" rows="2"><?= htmlspecialchars($s('landing_templates_subtitle', 'No need to purchase extra themes. Both premium templates with 6 total homepage layouts are bundled directly into the script package!')) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Dynamic Templates & Layouts Manager -->
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <h5 class="text-white fw-bold mb-0"><i class="fa-solid fa-layer-group text-warning me-2"></i>Templates &amp; Layouts</h5>
                    <p class="text-muted small mb-0">Manage website templates, their descriptions, individual homepage layouts, and preview images.</p>
                </div>
                <button type="button" class="btn btn-gold fw-bold btn-sm px-3 shadow" data-bs-toggle="modal" data-bs-target="#modalTemplate" onclick="openNewTemplateModal()">
                    <i class="fa-solid fa-plus me-1"></i> Add New Template
                </button>
            </div>

            <!-- Templates List -->
            <?php if (!empty($templates)): ?>
                <?php foreach ($templates as $t): ?>
                    <div class="card border-0 rounded-4 shadow-sm mb-4" style="background: #111a2e; border: 1px solid rgba(194, 153, 88, 0.25) !important;">
                        <div class="card-header bg-black bg-opacity-25 py-3 border-bottom border-secondary border-opacity-25 d-flex flex-wrap align-items-center justify-content-between gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-dark border border-secondary text-warning font-monospace px-2 py-1">
                                    <i class="<?= htmlspecialchars($t->icon ?: 'fa-solid fa-crown') ?> me-1"></i> <?= htmlspecialchars($t->template_key) ?>
                                </span>
                                <h5 class="text-white fw-bold mb-0 font-serif"><?= htmlspecialchars($t->name) ?></h5>
                                <?php if (!empty($t->badge)): ?>
                                    <span class="badge bg-warning text-dark fw-bold"><?= htmlspecialchars($t->badge) ?></span>
                                <?php endif; ?>
                                <span class="badge <?= $t->status === 'active' ? 'bg-success-subtle text-success' : 'bg-secondary' ?> small">
                                    <?= ucfirst($t->status) ?>
                                </span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-outline-warning btn-sm fw-semibold" 
                                        onclick="openNewLayoutModal(<?= $t->id ?>, '<?= htmlspecialchars($t->template_key) ?>', '<?= htmlspecialchars(addslashes($t->name)) ?>', <?= count($t->layouts) + 1 ?>)">
                                    <i class="fa-solid fa-plus me-1"></i> Add Layout
                                </button>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline-light btn-sm fw-semibold"
                                            onclick="openEditTemplateModal(<?= htmlspecialchars(json_encode($t)) ?>)">
                                        <i class="fa-solid fa-pencil me-1"></i> Edit Template
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                            onclick="deleteTemplate(<?= (int)$t->id ?>)" title="Delete Template">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <!-- Template Meta Info -->
                            <div class="p-3 rounded-3 mb-4" style="background: rgba(0,0,0,0.25); border: 1px solid rgba(255,255,255,0.06);">
                                <div class="row g-2">
                                    <div class="col-lg-8">
                                        <div class="small text-muted text-uppercase fw-bold mb-1">Short Description</div>
                                        <p class="text-light mb-0 small"><?= htmlspecialchars($t->short_desc) ?: '<em class="text-muted">No description provided.</em>' ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="small text-muted text-uppercase fw-bold mb-1">Feature Badges</div>
                                        <div class="d-flex flex-wrap gap-1">
                                            <?php 
                                                $features = !empty($t->features) ? json_decode($t->features, true) : array();
                                                if (!empty($features)):
                                                    foreach ($features as $f): ?>
                                                        <span class="badge bg-dark border border-secondary text-light small"><i class="fa fa-check text-success me-1"></i><?= htmlspecialchars($f) ?></span>
                                                    <?php endforeach;
                                                else: ?>
                                                    <span class="text-muted small">None configured</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Layouts Grid -->
                            <h6 class="text-white fw-bold mb-3 font-serif">
                                <i class="fa-solid fa-table-cells text-warning me-1"></i> Configured Layouts (<?= count($t->layouts) ?>)
                            </h6>

                            <?php if (!empty($t->layouts)): ?>
                                <div class="row g-3">
                                    <?php foreach ($t->layouts as $l): ?>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="card h-100 border-0 rounded-3 overflow-hidden shadow-sm" style="background: #080d19; border: 1px solid rgba(255,255,255,0.08) !important;">
                                                <!-- Preview Image Box -->
                                                <div class="position-relative" style="height: 160px; background: #000; overflow: hidden;">
                                                    <img src="<?= htmlspecialchars(fallback_image_url($l->preview_image)) ?>" 
                                                         alt="<?= htmlspecialchars($l->layout_name) ?>" 
                                                         class="w-100 h-100" 
                                                         style="object-fit: cover;"
                                                         onerror="this.onerror=null;this.src='<?= main_site_url('uploads/no-image.jpg') ?>';">
                                                    
                                                    <span class="position-absolute top-0 start-0 m-2 badge bg-dark bg-opacity-75 border border-secondary text-warning fw-bold">
                                                        Layout <?= $l->layout_number ?>
                                                    </span>

                                                    <?php if (empty($l->preview_image) || strpos($l->preview_image, 'no-image') !== false): ?>
                                                        <span class="position-absolute bottom-0 end-0 m-2 badge bg-warning text-dark small fw-bold">
                                                            <i class="fa fa-image me-1"></i> Default Fallback Image
                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                                    <div>
                                                        <h6 class="text-white fw-bold mb-1"><?= htmlspecialchars($l->layout_name) ?></h6>
                                                        <p class="text-muted small mb-2" style="font-size: 12px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                            <?= htmlspecialchars($l->short_desc) ?: 'No layout description.' ?>
                                                        </p>
                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-between pt-2 border-top border-secondary border-opacity-25 mt-2">
                                                        <a href="<?= main_site_url($l->demo_url ?: ('website/?preview_tpl=' . $t->template_key . '&preview_layout=' . $l->layout_number)) ?>" target="_blank" class="btn btn-outline-light btn-sm">
                                                            <i class="fa fa-arrow-up-right-from-square me-1"></i> Live Demo
                                                        </a>
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-warning" title="Edit Layout"
                                                                    onclick="openEditLayoutModal(<?= htmlspecialchars(json_encode($l)) ?>, '<?= htmlspecialchars(addslashes($t->name)) ?>')">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" title="Delete Layout"
                                                                    onclick="deleteLayout(<?= (int)$l->id ?>)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="p-4 rounded text-center" style="background: rgba(0,0,0,0.2); border: 1px dashed rgba(255,255,255,0.1);">
                                    <i class="fa-solid fa-images fa-2x text-muted mb-2"></i>
                                    <p class="text-muted small mb-2">No layouts added for this template yet.</p>
                                    <button type="button" class="btn btn-gold btn-sm" onclick="openNewLayoutModal(<?= $t->id ?>, '<?= htmlspecialchars($t->template_key) ?>', '<?= htmlspecialchars(addslashes($t->name)) ?>', 1)">
                                        <i class="fa-solid fa-plus me-1"></i> Add First Layout
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="p-5 text-center text-muted">
                    <i class="fa-solid fa-palette fa-3x mb-3 text-warning"></i>
                    <h5>No Templates Configured</h5>
                    <p class="small">Click "Add New Template" above to initialize your first theme.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal 1: Add / Edit Template -->
<div class="modal fade" id="modalTemplate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="background: #111a2e; border: 1px solid rgba(194, 153, 88, 0.4);">
            <form action="<?= superadmin_url('website') ?>" method="post">
                <input type="hidden" name="active_tab" value="themes">
                <input type="hidden" name="theme_action" value="save_template">
                <input type="hidden" name="template_id" id="modalTplId" value="0">

                <div class="modal-header border-secondary border-opacity-25 bg-black bg-opacity-25">
                    <h5 class="modal-title text-white font-serif" id="modalTplTitle">
                        <i class="fa-solid fa-palette text-warning me-2"></i> Add New Template
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-white small fw-bold">Template Code / Key <span class="text-danger">*</span></label>
                            <input type="text" name="template_key" id="modalTplKey" class="form-control font-monospace" required placeholder="e.g. template1, template2, template3">
                            <small class="text-muted" style="font-size: 11px;">Alphanumeric identifier used in code and folder paths.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white small fw-bold">Template Display Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="modalTplName" class="form-control" required placeholder="e.g. Template 1 (Glamr)">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white small fw-bold">Badge Text</label>
                            <input type="text" name="badge" id="modalTplBadge" class="form-control" placeholder="e.g. Glamr, Pureglow, Popular">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white small fw-bold">Icon (FontAwesome)</label>
                            <input type="text" name="icon" id="modalTplIcon" class="form-control" placeholder="e.g. fa-solid fa-crown, fa-solid fa-leaf">
                        </div>
                        <div class="col-12">
                            <label class="form-label text-white small fw-bold">Short Description <span class="text-danger">*</span></label>
                            <textarea name="short_desc" id="modalTplDesc" class="form-control" rows="3" required placeholder="e.g. Complete luxury salon experience. Toggle between high-fashion dark/gold palettes, modern hair studio, or chic boutique storefronts."></textarea>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label text-white small fw-bold">Feature Tags / Bullets</label>
                            <input type="text" name="features" id="modalTplFeatures" class="form-control" placeholder="Stylist Portfolios, Salon Pricing Menus, Booking Wizard (comma-separated)">
                            <small class="text-muted" style="font-size: 11px;">Separate multiple feature tags with commas.</small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-white small fw-bold">Sort Order</label>
                            <input type="number" name="sort_order" id="modalTplSort" class="form-control" value="1" min="1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-secondary border-opacity-25 bg-black bg-opacity-25">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gold fw-bold px-4">
                        <i class="fa-solid fa-check me-1"></i> Save Template
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2: Add / Edit Layout -->
<div class="modal fade" id="modalLayout" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="background: #111a2e; border: 1px solid rgba(194, 153, 88, 0.4);">
            <form action="<?= superadmin_url('website') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="active_tab" value="themes">
                <input type="hidden" name="theme_action" value="save_layout">
                <input type="hidden" name="layout_id" id="modalLayoutId" value="0">
                <input type="hidden" name="template_id" id="modalLayoutTplId" value="0">

                <div class="modal-header border-secondary border-opacity-25 bg-black bg-opacity-25">
                    <h5 class="modal-title text-white font-serif" id="modalLayoutHeader">
                        <i class="fa-solid fa-image text-warning me-2"></i> Add Layout to <span id="modalLayoutTplName" class="text-warning">Template 1</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label text-white small fw-bold">Layout Number <span class="text-danger">*</span></label>
                            <input type="number" name="layout_number" id="modalLayoutNum" class="form-control" required min="1" value="1">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label text-white small fw-bold">Layout Name <span class="text-danger">*</span></label>
                            <input type="text" name="layout_name" id="modalLayoutName" class="form-control" required placeholder="e.g. Layout 1: Luxury Salon">
                        </div>
                        <div class="col-12">
                            <label class="form-label text-white small fw-bold">Layout Short Description <span class="text-danger">*</span></label>
                            <textarea name="short_desc" id="modalLayoutDesc" class="form-control" rows="2" required placeholder="e.g. Classic Flagship high-fashion dark and gold palette with stylist highlights."></textarea>
                        </div>

                        <!-- Layout Preview Image with Default Fallback -->
                        <div class="col-12">
                            <div class="p-3 rounded-3" style="background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.08);">
                                <label class="form-label text-white small fw-bold mb-2">
                                    <i class="fa-solid fa-photo-film text-warning me-1"></i> Layout Preview Image
                                </label>
                                
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-4 text-center">
                                        <div class="rounded overflow-hidden border border-secondary p-1" style="background: #000; height: 110px;">
                                            <img id="modalLayoutPreviewBox" 
                                                 src="<?= main_site_url('uploads/no-image.jpg') ?>" 
                                                 alt="Preview" 
                                                 class="w-100 h-100" 
                                                 style="object-fit: cover;"
                                                 onerror="this.onerror=null;this.src='<?= main_site_url('uploads/no-image.jpg') ?>';">
                                        </div>
                                        <small class="text-muted d-block mt-1" style="font-size: 11px;" id="modalLayoutImgNotice">
                                            Default image applied if empty
                                        </small>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-2">
                                            <label class="form-label text-light small mb-1">Upload Image File (PNG, JPG, WEBP)</label>
                                            <input type="file" name="layout_preview_file" id="modalLayoutFileInput" class="form-control form-control-sm" accept="image/*" onchange="previewModalLayoutImage(this)">
                                        </div>
                                        <div>
                                            <label class="form-label text-light small mb-1">Or Image URL / Relative Path</label>
                                            <input type="text" name="preview_image_url" id="modalLayoutUrlInput" class="form-control form-control-sm" placeholder="e.g. website/assets/template1/... or uploads/..." oninput="updateModalLayoutUrl(this.value)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <label class="form-label text-white small fw-bold">Live Demo Preview URL</label>
                            <input type="text" name="demo_url" id="modalLayoutDemoUrl" class="form-control" placeholder="e.g. website/?preview_tpl=template1&preview_layout=1">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-white small fw-bold">Sort Order</label>
                            <input type="number" name="sort_order" id="modalLayoutSort" class="form-control" value="1" min="1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-secondary border-opacity-25 bg-black bg-opacity-25">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gold fw-bold px-4">
                        <i class="fa-solid fa-check me-1"></i> Save Layout
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Hidden Forms for Theme and Layout Deletions (Allows clean, direct button-groups) -->
<form id="deleteLayoutForm" action="<?= superadmin_url('website') ?>" method="post" style="display:none;">
    <input type="hidden" name="active_tab" value="themes">
    <input type="hidden" name="theme_action" value="delete_layout">
    <input type="hidden" name="layout_id" id="deleteLayoutId" value="">
</form>

<form id="deleteTemplateForm" action="<?= superadmin_url('website') ?>" method="post" style="display:none;">
    <input type="hidden" name="active_tab" value="themes">
    <input type="hidden" name="theme_action" value="delete_template">
    <input type="hidden" name="template_id" id="deleteTemplateId" value="">
</form>

<!-- JavaScript for Live Previews -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Hero Background Live Preview Handler
    var heroPreview = document.getElementById('heroLivePreview');
    var heroBgFileInput = document.getElementById('heroBgFileInput');
    var heroBgUrlInput = document.getElementById('heroBgUrlInput');
    var clearHeroBgBtn = document.getElementById('clearHeroBgBtn');

    function updateHeroBg(url) {
        if (url && url.trim() !== '') {
            heroPreview.style.backgroundImage = "linear-gradient(rgba(15, 23, 42, 0.82), rgba(15, 23, 42, 0.94)), url('" + url + "')";
            heroPreview.style.backgroundSize = "cover";
            heroPreview.style.backgroundPosition = "center";
        } else {
            heroPreview.style.backgroundImage = "linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%)";
        }
    }

    if (heroBgFileInput) {
        heroBgFileInput.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                var objectUrl = URL.createObjectURL(this.files[0]);
                updateHeroBg(objectUrl);
            }
        });
    }

    if (heroBgUrlInput) {
        heroBgUrlInput.addEventListener('input', function() {
            updateHeroBg(this.value);
        });
    }

    if (clearHeroBgBtn) {
        clearHeroBgBtn.addEventListener('click', function() {
            if (heroBgUrlInput) heroBgUrlInput.value = '';
            if (heroBgFileInput) heroBgFileInput.value = '';
            updateHeroBg('');
        });
    }

    // Live Text Sync in Hero Preview
    var heroBadgeInput = document.getElementById('heroBadgeInput');
    if (heroBadgeInput) {
        heroBadgeInput.addEventListener('input', function() {
            var el = document.getElementById('previewHeroBadge');
            if (el) el.textContent = this.value || 'COMMERCIAL SOFTWARE EDITION';
        });
    }

    var heroTitleInput = document.getElementById('heroTitleInput');
    if (heroTitleInput) {
        heroTitleInput.addEventListener('input', function() {
            var el = document.getElementById('previewHeroTitle');
            if (el) el.firstChild.textContent = (this.value || 'All-in-One Salon & Spa') + ' ';
        });
    }

    var heroHighlightInput = document.getElementById('heroHighlightInput');
    if (heroHighlightInput) {
        heroHighlightInput.addEventListener('input', function() {
            var el = document.getElementById('previewHeroHighlight');
            if (el) el.textContent = this.value || 'Management Platform';
        });
    }

    var heroLeadInput = document.getElementById('heroLeadInput');
    if (heroLeadInput) {
        heroLeadInput.addEventListener('input', function() {
            var el = document.getElementById('previewHeroLead');
            if (el) el.textContent = this.value;
        });
    }

    var heroCta1Input = document.getElementById('heroCta1Input');
    if (heroCta1Input) {
        heroCta1Input.addEventListener('input', function() {
            var el = document.getElementById('previewCta1');
            if (el) el.textContent = this.value;
        });
    }

    var heroCta2Input = document.getElementById('heroCta2Input');
    if (heroCta2Input) {
        heroCta2Input.addEventListener('input', function() {
            var el = document.getElementById('previewCta2');
            if (el) el.textContent = this.value;
        });
    }

    // 2. Logo Live Preview Handler
    var logoFileInput = document.getElementById('logoFileInput');
    var logoUrlInput = document.getElementById('logoUrlInput');
    var logoImg = document.getElementById('logoPreviewImg');
    var logoPlaceholder = document.getElementById('logoPlaceholder');

    function updateLogo(url) {
        if (url && url.trim() !== '') {
            if (logoImg) {
                logoImg.src = url;
                logoImg.style.display = 'block';
            }
            if (logoPlaceholder) logoPlaceholder.style.display = 'none';
        } else {
            if (logoImg) logoImg.style.display = 'none';
            if (logoPlaceholder) logoPlaceholder.style.display = 'block';
        }
    }

    if (logoFileInput) {
        logoFileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                updateLogo(URL.createObjectURL(this.files[0]));
            }
        });
    }
    if (logoUrlInput) {
        logoUrlInput.addEventListener('input', function() {
            updateLogo(this.value);
        });
    }

    var clearLogoBtn = document.getElementById('clearLogoBtn');
    if (clearLogoBtn) {
        clearLogoBtn.addEventListener('click', function() {
            if (logoUrlInput) logoUrlInput.value = '';
            if (logoFileInput) logoFileInput.value = '';
            var flag = document.getElementById('clearLogoFlag');
            if (flag) flag.value = '1';
            updateLogo('');
        });
    }

    // 3. Favicon Live Preview Handler
    var favFileInput = document.getElementById('favFileInput');
    var favUrlInput = document.getElementById('favUrlInput');
    var favImg = document.getElementById('favPreviewImg');
    var favPlaceholder = document.getElementById('favPlaceholder');

    function updateFavicon(url) {
        if (url && url.trim() !== '') {
            if (favImg) {
                favImg.src = url;
                favImg.style.display = 'inline-block';
            }
            if (favPlaceholder) favPlaceholder.style.display = 'none';
        } else {
            if (favImg) favImg.style.display = 'none';
            if (favPlaceholder) favPlaceholder.style.display = 'inline-block';
        }
    }

    if (favFileInput) {
        favFileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                updateFavicon(URL.createObjectURL(this.files[0]));
            }
        });
    }
    if (favUrlInput) {
        favUrlInput.addEventListener('input', function() {
            updateFavicon(this.value);
        });
    }

    var clearFavBtn = document.getElementById('clearFavBtn');
    if (clearFavBtn) {
        clearFavBtn.addEventListener('click', function() {
            if (favUrlInput) favUrlInput.value = '';
            if (favFileInput) favFileInput.value = '';
            var flag = document.getElementById('clearFavFlag');
            if (flag) flag.value = '1';
            updateFavicon('');
        });
    }

    // 4. SEO Snippet Live Preview
    var seoTitleInput = document.getElementById('seoTitleInput');
    var seoDescInput = document.getElementById('seoDescInput');
    var seoUrlInput = document.getElementById('seoUrlInput');

    if (seoTitleInput) {
        seoTitleInput.addEventListener('input', function() {
            var el = document.getElementById('seoPreviewTitle');
            if (el) el.textContent = this.value || 'Luxe Salon & Spa Management Software';
        });
    }
    if (seoDescInput) {
        seoDescInput.addEventListener('input', function() {
            var el = document.getElementById('seoPreviewDesc');
            if (el) el.textContent = this.value;
        });
    }
    if (seoUrlInput) {
        seoUrlInput.addEventListener('input', function() {
            var el = document.getElementById('seoPreviewUrl');
            if (el) el.textContent = this.value;
        });
    }
});

// Multi-Theme & Layout Modal Functions
const defaultNoImage = '<?= main_site_url("uploads/no-image.jpg") ?>';

function openNewTemplateModal() {
    document.getElementById('modalTplTitle').innerHTML = '<i class="fa-solid fa-palette text-warning me-2"></i> Add New Template';
    document.getElementById('modalTplId').value = 0;
    document.getElementById('modalTplKey').value = '';
    document.getElementById('modalTplKey').readOnly = false;
    document.getElementById('modalTplName').value = '';
    document.getElementById('modalTplBadge').value = '';
    document.getElementById('modalTplIcon').value = 'fa-solid fa-crown';
    document.getElementById('modalTplDesc').value = '';
    document.getElementById('modalTplFeatures').value = '';
    document.getElementById('modalTplSort').value = 1;
}

function openEditTemplateModal(tpl) {
    document.getElementById('modalTplTitle').innerHTML = '<i class="fa-solid fa-pencil text-warning me-2"></i> Edit Template: ' + (tpl.name || '');
    document.getElementById('modalTplId').value = tpl.id;
    document.getElementById('modalTplKey').value = tpl.template_key;
    document.getElementById('modalTplKey').readOnly = true;
    document.getElementById('modalTplName').value = tpl.name || '';
    document.getElementById('modalTplBadge').value = tpl.badge || '';
    document.getElementById('modalTplIcon').value = tpl.icon || 'fa-solid fa-crown';
    document.getElementById('modalTplDesc').value = tpl.short_desc || '';
    
    let featuresText = '';
    if (tpl.features) {
        try {
            const arr = JSON.parse(tpl.features);
            if (Array.isArray(arr)) featuresText = arr.join(', ');
        } catch(e) {
            featuresText = tpl.features;
        }
    }
    document.getElementById('modalTplFeatures').value = featuresText;
    document.getElementById('modalTplSort').value = tpl.sort_order || 1;

    var modal = new bootstrap.Modal(document.getElementById('modalTemplate'));
    modal.show();
}

function openNewLayoutModal(tplId, tplKey, tplName, nextNum) {
    document.getElementById('modalLayoutHeader').innerHTML = '<i class="fa-solid fa-image text-warning me-2"></i> Add Layout to <span class="text-warning">' + tplName + '</span>';
    document.getElementById('modalLayoutId').value = 0;
    document.getElementById('modalLayoutTplId').value = tplId;
    document.getElementById('modalLayoutNum').value = nextNum || 1;
    document.getElementById('modalLayoutName').value = 'Layout ' + (nextNum || 1);
    document.getElementById('modalLayoutDesc').value = '';
    document.getElementById('modalLayoutFileInput').value = '';
    document.getElementById('modalLayoutUrlInput').value = '';
    document.getElementById('modalLayoutDemoUrl').value = 'website/?preview_tpl=' + tplKey + '&preview_layout=' + (nextNum || 1);
    document.getElementById('modalLayoutSort').value = nextNum || 1;
    document.getElementById('modalLayoutPreviewBox').src = defaultNoImage;
    document.getElementById('modalLayoutImgNotice').textContent = 'Default fallback image applied (c:\\Users\\Codeulas\\Downloads\\no-immage.jpg)';

    var modal = new bootstrap.Modal(document.getElementById('modalLayout'));
    modal.show();
}

function openEditLayoutModal(layout, tplName) {
    document.getElementById('modalLayoutHeader').innerHTML = '<i class="fa-solid fa-pencil text-warning me-2"></i> Edit Layout: ' + (layout.layout_name || '') + ' (' + tplName + ')';
    document.getElementById('modalLayoutId').value = layout.id;
    document.getElementById('modalLayoutTplId').value = layout.template_id;
    document.getElementById('modalLayoutNum').value = layout.layout_number || 1;
    document.getElementById('modalLayoutName').value = layout.layout_name || '';
    document.getElementById('modalLayoutDesc').value = layout.short_desc || '';
    document.getElementById('modalLayoutFileInput').value = '';
    document.getElementById('modalLayoutUrlInput').value = layout.preview_image || '';
    document.getElementById('modalLayoutDemoUrl').value = layout.demo_url || '';
    document.getElementById('modalLayoutSort').value = layout.sort_order || 1;

    const imgBox = document.getElementById('modalLayoutPreviewBox');
    if (layout.preview_image && layout.preview_image.trim() !== '') {
        const root = '<?= rtrim(main_site_url(), "/") . "/" ?>';
        imgBox.src = (layout.preview_image.indexOf('http') === 0) ? layout.preview_image : (root + layout.preview_image.replace(/^\//, ''));
        document.getElementById('modalLayoutImgNotice').textContent = 'Custom image assigned';
    } else {
        imgBox.src = defaultNoImage;
        document.getElementById('modalLayoutImgNotice').textContent = 'Default fallback image applied';
    }

    var modal = new bootstrap.Modal(document.getElementById('modalLayout'));
    modal.show();
}

function previewModalLayoutImage(input) {
    if (input.files && input.files[0]) {
        document.getElementById('modalLayoutPreviewBox').src = URL.createObjectURL(input.files[0]);
        document.getElementById('modalLayoutImgNotice').textContent = 'Local image selected for upload';
    }
}

function updateModalLayoutUrl(val) {
    const imgBox = document.getElementById('modalLayoutPreviewBox');
    if (val && val.trim() !== '') {
        const root = '<?= rtrim(main_site_url(), "/") . "/" ?>';
        imgBox.src = (val.indexOf('http') === 0) ? val : (root + val.replace(/^\//, ''));
        document.getElementById('modalLayoutImgNotice').textContent = 'Custom image URL entered';
    } else {
        imgBox.src = defaultNoImage;
        document.getElementById('modalLayoutImgNotice').textContent = 'Default fallback image applied';
    }
}

function deleteLayout(layoutId) {
    if (confirm('Delete this layout?')) {
        document.getElementById('deleteLayoutId').value = layoutId;
        document.getElementById('deleteLayoutForm').submit();
    }
}

function deleteTemplate(templateId) {
    if (confirm('Are you sure you want to delete this template and all its layouts?')) {
        document.getElementById('deleteTemplateId').value = templateId;
        document.getElementById('deleteTemplateForm').submit();
    }
}
</script>
