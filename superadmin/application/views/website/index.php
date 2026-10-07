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
                <i class="fa-solid fa-bullhorn me-1"></i> Hero Stage &amp; Media
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $curr_tab === 'seo' ? 'active' : '' ?>" href="#tabSeo" data-bs-toggle="pill">
                <i class="fa-solid fa-share-nodes me-1"></i> Page SEO &amp; Social Media
            </a>
        </li>
        <li class="nav-item ms-auto">
            <a class="nav-link text-warning fw-bold border border-warning border-opacity-50" href="<?= superadmin_url('layouts') ?>">
                <i class="fa-solid fa-palette me-1"></i> Configure Layouts &rarr;
            </a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">

        <!-- TAB 1: HERO, BRAND & MEDIA -->
        <div class="tab-pane fade <?= $curr_tab === 'hero' ? 'show active' : '' ?>" id="tabHero">
            <form action="<?= superadmin_url('website') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="active_tab" value="hero">
                
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
                                <?= htmlspecialchars($s('landing_seo_meta_desc', 'Premium commercial salon and spa management platform with multi-template booking wizard, POS billing, inventory tracking, and Super Admin control.')) ?>
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

        <!-- TAB 3: CONFIGURE LAYOUTS (MOVED TO DEDICATED MENU) -->
        <div class="tab-pane fade <?= $curr_tab === 'themes' ? 'show active' : '' ?>" id="tabThemes">
            <div class="card border-0 rounded-4 p-5 text-center shadow-sm mb-4" style="background: #111a2e; border: 1px solid rgba(194, 153, 88, 0.4) !important;">
                <div class="mb-3">
                    <span class="rounded-circle p-3 d-inline-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning" style="width: 70px; height: 70px;">
                        <i class="fa-solid fa-palette fa-2x"></i>
                    </span>
                </div>
                <h4 class="text-white fw-bold mb-2 font-serif">Configure Layouts Has Moved to a Dedicated Menu</h4>
                <p class="text-light text-opacity-75 mx-auto mb-4" style="max-width: 600px;">
                    Theme layouts, interactive preview frames, and customizers for Template 2 (Layouts 1, 2, and 3) are now managed from the dedicated <strong>Configure Layouts</strong> control center.
                </p>
                <div>
                    <a href="<?= superadmin_url('layouts') ?>" class="btn btn-warning fw-bold px-4 py-2 shadow">
                        <i class="fa-solid fa-arrow-right me-1"></i> Open Configure Layouts Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
