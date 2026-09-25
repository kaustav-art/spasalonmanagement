<?php
/**
 * Luxe Salon & Spa - Commercial Product Website & Script Marketplace
 * multi-template CodeIgniter 3 + MariaDB Self-Hosted Software
 */

$install_lock = __DIR__ . '/install.lock';

if (!file_exists($install_lock)) {
    header("Location: admin/install");
    exit;
}

// Fetch dynamic plans from marketplace_plans table
$plans = array();
try {
    $pdo = new PDO('mysql:host=localhost;dbname=spasalon_db;charset=utf8mb4', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ));
    $stmt = $pdo->query("SELECT * FROM marketplace_plans WHERE status = 'active' ORDER BY sort_order ASC");
    $db_plans = $stmt->fetchAll();
    foreach ($db_plans as $p) {
        $plans[$p->plan_code] = $p;
    }
} catch (Exception $e) {
    // Fallback if needed
}

// Fetch all dynamic platform CMS, SEO, social, gateway, and currency settings
$settings = array();
try {
    if (isset($pdo)) {
        $stmt_s = $pdo->query("SELECT setting_key, setting_value FROM business_settings");
        while ($row_s = $stmt_s->fetch(PDO::FETCH_ASSOC)) {
            $settings[$row_s['setting_key']] = $row_s['setting_value'];
        }
    }
} catch (Exception $e) {
    // Fallback
}

if (!function_exists('site_setting')) {
    function site_setting($key, $default = '') {
        global $settings;
        return isset($settings[$key]) && trim($settings[$key]) !== '' ? $settings[$key] : $default;
    }
}

if (!function_exists('site_lines')) {
    function site_lines($key, $default_array = array()) {
        global $settings;
        if (isset($settings[$key]) && trim($settings[$key]) !== '') {
            $raw = trim($settings[$key]);
            $raw = str_replace(array('\\r\\n', '\\r', '\\n'), "\n", $raw);
            $lines = preg_split('/\r\n|\r|\n/', $raw);
            $res = array();
            foreach ($lines as $line) {
                $line = trim($line);
                if ($line !== '') {
                    $res[] = $line;
                }
            }
            if (!empty($res)) {
                return $res;
            }
        }
        return $default_array;
    }
}

// Dynamic Currency Settings
$currency_symbol = site_setting('currency_symbol', '$');
$currency_code = site_setting('currency_code', 'USD');
$currency_position = site_setting('currency_position', 'left');
$currency_decimals = (int)site_setting('currency_decimals', 2);

if (!function_exists('format_site_price')) {
    function format_site_price($amount) {
        global $currency_symbol, $currency_position, $currency_decimals;
        $num = number_format((float)$amount, $currency_decimals);
        return $currency_position === 'left' ? ($currency_symbol . $num) : ($num . ' ' . $currency_symbol);
    }
}

// Media Branding & Hero Background
$site_logo_val = site_setting('landing_site_logo');
$site_logo_url = !empty($site_logo_val) ? $site_logo_val : '';

$site_fav_val = site_setting('landing_site_favicon');
$site_fav_url = !empty($site_fav_val) ? $site_fav_val : '';

$hero_bg_val = site_setting('landing_hero_bg_image');
$hero_bg_url = !empty($hero_bg_val) ? $hero_bg_val : '';

// Active Payment Gateway (Only ONE active applicable)
$active_payment_gateway = site_setting('active_payment_gateway', 'stripe');
$stripe_publishable_key = site_setting('gateway_stripe_publishable_key', '');
$razorpay_key_id = site_setting('gateway_razorpay_key_id', '');
$payu_merchant_key = site_setting('gateway_payu_merchant_key', '');

// Default fallback pricing if database record is missing
$salon_price = isset($plans['SALON']) ? (float)$plans['SALON']->price : 49.00;
$salon_orig = isset($plans['SALON']) ? (float)$plans['SALON']->original_price : 79.00;
$salon_badge = isset($plans['SALON']) ? $plans['SALON']->badge : 'POPULAR';
$salon_features = isset($plans['SALON']) && $plans['SALON']->features ? json_decode($plans['SALON']->features, true) : array(
    'Stylist & Barber Profiles with Commission Ledger',
    'Salon Service Menu & Treatment Categories',
    'Walk-in Queue Manager & Waiting Chairs',
    'POS Checkout & 80mm Thermal Receipts',
    'Inventory & Consumables Tracking',
    'Customer CRM & VIP Loyalty Tiers',
    'Template 1 (Glamr) & Template 2 (Pureglow) Included',
    '3 Homepage Layouts with Instant Switcher',
    'Full Source Code & No Monthly Fees'
);

$spa_price = isset($plans['SPA']) ? (float)$plans['SPA']->price : 49.00;
$spa_orig = isset($plans['SPA']) ? (float)$plans['SPA']->original_price : 79.00;
$spa_badge = isset($plans['SPA']) ? $plans['SPA']->badge : 'HOLISTIC';
$spa_features = isset($plans['SPA']) && $plans['SPA']->features ? json_decode($plans['SPA']->features, true) : array(
    'Licensed Therapist & Masseur Roster',
    'Private Spa Suite / Treatment Room Management',
    'Visual Room Occupancy Timeline & Schedule',
    'Automated Double-Booking Conflict Prevention',
    'Multi-Session Treatment Packages & Passes',
    'POS Checkout & Detailed Customer Invoices',
    'Template 1 (Glamr) & Template 2 (Pureglow) Included',
    '3 Homepage Layouts with Instant Switcher',
    'Full Source Code & Self-Hosted License'
);

$unified_price = isset($plans['SALON_SPA']) ? (float)$plans['SALON_SPA']->price : 89.00;
$unified_orig = isset($plans['SALON_SPA']) ? (float)$plans['SALON_SPA']->original_price : 149.00;
$unified_badge = isset($plans['SALON_SPA']) ? $plans['SALON_SPA']->badge : 'BEST VALUE • ALL IN ONE';
$unified_features = isset($plans['SALON_SPA']) && $plans['SALON_SPA']->features ? json_decode($plans['SALON_SPA']->features, true) : array(
    'All Salon Features (Stylists, Hair, Nails, Queue, Chairs)',
    'All Spa Features (Rooms, Therapists, Conflict Calendar)',
    'Unified Stylist + Therapist Single Roster',
    'Combo Packages (Hair + Facial + Massage)',
    'POS with Multi-Payment (Cash, Card, UPI, ACH)',
    'Financial P&L Statement & Expense Drawer',
    'Template 1 (Glamr) + Template 2 (Pureglow) Included',
    'All 6 Homepage Variations & Live Customizer',
    'Lifetime Self-Hosted License & Unlimited Upgrades'
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars(site_setting('landing_seo_meta_title', site_setting('landing_site_title', 'Luxe Salon & Spa Management Script - Commercial Multi-Template PHP Script'))); ?></title>
    
    <!-- Dynamic Favicon -->
    <?php if (!empty($site_fav_url)): ?>
        <link rel="icon" href="<?php echo htmlspecialchars($site_fav_url); ?>">
    <?php else: ?>
        <link rel="icon" type="image/x-icon" href="website/assets/template1/img/favicon.ico">
    <?php endif; ?>

    <!-- Dynamic SEO Meta Tags -->
    <meta name="description" content="<?php echo htmlspecialchars(site_setting('landing_seo_meta_desc', 'Premium commercial salon and spa management platform with stylist/therapist rosters, room conflict engine, multi-template booking wizard, POS billing, and Super Admin control.')); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars(site_setting('landing_seo_meta_keywords', 'salon software, spa management script, appointment booking, hair stylist pos, massage therapist scheduler, salon codeigniter')); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars(site_setting('landing_seo_canonical_url', 'http://localhost/spasalonmanagement/')); ?>">

    <!-- Open Graph / Social Sharing Meta -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars(site_setting('landing_seo_canonical_url', 'http://localhost/spasalonmanagement/')); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars(site_setting('landing_seo_og_title', site_setting('landing_seo_meta_title', site_setting('landing_site_title')))); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars(site_setting('landing_seo_og_desc', site_setting('landing_seo_meta_desc'))); ?>">
    <?php if (!empty(site_setting('landing_seo_og_image'))): ?>
    <meta property="og:image" content="<?php echo htmlspecialchars(site_setting('landing_seo_og_image')); ?>">
    <?php endif; ?>

    <!-- Twitter / X Card Meta -->
    <meta name="twitter:card" content="<?php echo htmlspecialchars(site_setting('landing_seo_twitter_card', 'summary_large_image')); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars(site_setting('landing_seo_og_title', site_setting('landing_seo_meta_title'))); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars(site_setting('landing_seo_og_desc', site_setting('landing_seo_meta_desc'))); ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="website/assets/template1/css/bootstrap.min.css">
    <!-- FontAwesome 6 Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --primary: #c29958;
            --primary-dark: #a17838;
            --primary-light: #f7f1e5;
            --secondary: #1a2238;
            --dark: #0f172a;
            --surface: #ffffff;
            --surface-soft: #f8fafc;
            --border-color: #e2e8f0;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --success: #10b981;
            --accent-spa: #059669;
            --accent-salon: #d97706;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            background-color: #fdfdfd;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        h1, h2, h3, .font-serif {
            font-family: 'Playfair Display', serif;
        }

        /* Top Navigation */
        .navbar-main {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }
        .navbar-brand-text {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: #ffffff;
            letter-spacing: 0.5px;
        }
        .navbar-brand-text span {
            color: var(--primary);
        }
        .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            transition: color 0.2s;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
        }

        /* Hero Section */
        .hero-section {
            background: radial-gradient(circle at top right, #1e293b 0%, #0f172a 100%);
            color: #ffffff;
            padding: 6.5rem 0 5rem;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(194, 153, 88, 0.15) 0%, rgba(194, 153, 88, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .hero-badge {
            background: rgba(194, 153, 88, 0.15);
            border: 1px solid rgba(194, 153, 88, 0.35);
            color: #f7d794;
            padding: 0.4rem 1.1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 1.5rem;
        }
        .hero-title span {
            color: var(--primary);
            font-style: italic;
        }
        .hero-lead {
            font-size: 1.2rem;
            color: #94a3b8;
            max-width: 650px;
            line-height: 1.6;
            margin-bottom: 2rem;
        }
        .pill-feature {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #e2e8f0;
            border-radius: 50px;
            padding: 0.45rem 1rem;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            margin: 0.3rem 0.2rem;
        }

        /* Demo Quick Access Bar */
        .demo-bar {
            background: #ffffff;
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            padding: 1.25rem 0;
        }

        /* Cards & Components */
        .card-custom {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
        }
        .card-custom:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            border-color: #cbd5e1;
        }

        /* Pricing Cards */
        .pricing-card {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            background: #ffffff;
            border: 1px solid var(--border-color);
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }
        .pricing-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 48px rgba(15, 23, 42, 0.1);
        }
        .pricing-card.featured {
            border: 2px solid var(--primary);
            box-shadow: 0 16px 40px rgba(194, 153, 88, 0.18);
        }
        .pricing-header {
            padding: 2.2rem 2rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .pricing-badge {
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 0.35rem 0.9rem;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 0.8rem;
        }
        .badge-salon { background: #fef3c7; color: #b45309; }
        .badge-spa { background: #d1fae5; color: #047857; }
        .badge-unified { background: linear-gradient(135deg, #c29958, #9a7332); color: #ffffff; }

        .price-tag {
            font-size: 3.2rem;
            font-weight: 800;
            color: var(--dark);
            line-height: 1;
            margin: 0.8rem 0;
        }
        .price-orig {
            text-decoration: line-through;
            color: #94a3b8;
            font-size: 1.25rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }
        .pricing-body {
            padding: 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0 0 2rem;
        }
        .feature-list li {
            font-size: 0.92rem;
            color: #334155;
            padding: 0.5rem 0;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }
        .feature-list li i {
            color: var(--primary);
            font-size: 1.05rem;
            margin-top: 0.15rem;
            flex-shrink: 0;
        }

        /* Buttons */
        .btn-gold {
            background: linear-gradient(135deg, #c29958, #ab8140);
            color: #ffffff !important;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            padding: 0.85rem 1.5rem;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(194, 153, 88, 0.3);
        }
        .btn-gold:hover {
            background: linear-gradient(135deg, #b38948, #9c7333);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(194, 153, 88, 0.4);
        }
        .btn-outline-gold {
            border: 2px solid var(--primary);
            color: var(--primary) !important;
            background: transparent;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.8rem 1.4rem;
            transition: all 0.25s ease;
        }
        .btn-outline-gold:hover {
            background: var(--primary);
            color: #ffffff !important;
        }

        /* Template Showcase Card */
        .template-card {
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            background: #ffffff;
            transition: all 0.3s ease;
        }
        .template-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }
        .template-preview-frame {
            height: 240px;
            background-size: cover;
            background-position: top center;
            position: relative;
            border-bottom: 1px solid var(--border-color);
        }
        .template-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(15, 23, 42, 0.85);
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            backdrop-filter: blur(4px);
        }

        /* Super Admin Banner */
        .super-admin-banner {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            border-radius: 20px;
            padding: 3rem;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Modal Styles */
        .modal-header {
            background: #0f172a;
            color: #ffffff;
            border-bottom: none;
            padding: 1.5rem 2rem;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
        }
        .modal-body {
            padding: 2rem;
        }
        .form-control, .form-select {
            padding: 0.75rem 1rem;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            font-size: 0.95rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(194, 153, 88, 0.2);
        }

        /* Template Selector in Modal */
        .tpl-radio-card {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.25rem;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }
        .tpl-radio-card:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
        }
        .tpl-radio-card.active {
            border-color: var(--primary);
            background: #fdfaf4;
        }
        .tpl-radio-card input[type="radio"] {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        /* Order Success Container */
        .order-success-box {
            background: #f0fdf4;
            border: 2px dashed #86efac;
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
        }
        .license-code-box {
            background: #0f172a;
            color: #f7d794;
            font-family: 'Courier New', Courier, monospace;
            font-size: 1.25rem;
            font-weight: 700;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            letter-spacing: 1.5px;
            margin: 1.2rem 0;
            word-break: break-all;
            user-select: all;
        }

        /* Footer */
        .footer-main {
            background: #090d16;
            color: #cbd5e1;
            padding: 4.5rem 0 2rem;
            border-top: 1px solid rgba(194, 153, 88, 0.25);
        }
        .footer-main .footer-brand-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #ffffff;
            font-size: 1.4rem;
        }
        .footer-main .footer-desc {
            color: #94a3b8;
            font-size: 0.92rem;
            line-height: 1.6;
        }
        .footer-main .footer-heading {
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 1.25rem;
            position: relative;
        }
        .footer-main .footer-heading::after {
            content: '';
            display: block;
            width: 25px;
            height: 2px;
            background: var(--primary);
            margin-top: 6px;
            border-radius: 2px;
        }
        .footer-main .footer-links {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }
        .footer-main .footer-links li {
            margin-bottom: 0.65rem;
        }
        .footer-main .footer-links a {
            color: #cbd5e1 !important;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
        }
        .footer-main .footer-links a:hover {
            color: #fbbf24 !important;
            transform: translateX(4px);
        }
        .footer-main .footer-req-item {
            color: #cbd5e1;
            font-size: 0.88rem;
            margin-bottom: 0.65rem;
            display: flex;
            align-items: center;
        }
        .footer-main .footer-social-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #cbd5e1;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .footer-main .footer-social-btn:hover {
            background: #c29958;
            color: #0f172a;
            border-color: #c29958;
            transform: translateY(-2px);
        }
        .footer-main .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 1.5rem;
            margin-top: 3rem;
            color: #94a3b8;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

    <!-- Sticky Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-main sticky-top">
        <div class="container">
            <a class="navbar-brand navbar-brand-text d-flex align-items-center" href="#home">
                <?php if (!empty($site_logo_url)): ?>
                    <img src="<?= htmlspecialchars($site_logo_url) ?>" alt="<?= htmlspecialchars(site_setting('landing_brand_name', 'LUXE')) ?>" style="max-height: 46px; max-width: 240px; object-fit: contain;">
                <?php else: ?>
                    <i class="fa fa-spa me-2 text-warning"></i>
                    <span><?= htmlspecialchars(site_setting('landing_brand_name', 'LUXE')) ?> <span><?= htmlspecialchars(site_setting('landing_brand_highlight', 'SALON & SPA')) ?></span></span>
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#overview">Overview</a></li>
                    <li class="nav-item"><a class="nav-link" href="#editions">Editions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#templates">Multi-Templates</a></li>
                    <li class="nav-item"><a class="nav-link" href="#demos">Live Demos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pricing">Purchase Script</a></li>
                    <li class="nav-item"><a class="nav-link" href="superadmin/" target="_blank"><i class="fa fa-shield-alt text-warning me-1"></i>Super Admin</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <a href="admin/auth/login" target="_blank" class="btn btn-outline-light btn-sm px-3 rounded-pill">
                        <i class="fa fa-lock me-1"></i> Salon Admin
                    </a>
                    <a href="<?= htmlspecialchars(site_setting('landing_header_cta_link', '#pricing')) ?>" class="btn btn-gold btn-sm px-4 rounded-pill">
                        <?= htmlspecialchars(site_setting('landing_header_cta_text', 'Buy Script Now')) ?>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section" <?php if (!empty($hero_bg_url)): ?>style="background-image: linear-gradient(rgba(15, 23, 42, 0.82), rgba(15, 23, 42, 0.94)), url('<?= htmlspecialchars($hero_bg_url) ?>'); background-size: cover; background-position: center;"<?php endif; ?>>
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-badge">
                        <i class="fa fa-award me-1"></i> <?= htmlspecialchars(site_setting('landing_hero_badge', 'SELF-HOSTED COMMERCIAL PHP SCRIPT • MULTI-TEMPLATE')) ?>
                    </div>
                    <?php
                        $hero_title = site_setting('landing_hero_title', 'The Complete Salon & Spa Management Script');
                        $hero_hl = site_setting('landing_hero_title_highlight', 'Salon & Spa');
                        if (!empty($hero_hl) && stripos($hero_title, $hero_hl) !== false) {
                            $escaped_title = htmlspecialchars($hero_title);
                            $escaped_hl = htmlspecialchars($hero_hl);
                            $rendered_title = preg_replace('/' . preg_quote($escaped_hl, '/') . '/i', '<span>$0</span>', $escaped_title, 1);
                        } else {
                            $rendered_title = htmlspecialchars($hero_title);
                        }
                    ?>
                    <h1 class="hero-title">
                        <?= $rendered_title ?>
                    </h1>
                    <p class="hero-lead">
                        <?= htmlspecialchars(site_setting('landing_hero_lead', 'An all-in-one software package tailored for modern hair salons, beauty parlors, nail bars, luxury spas, and wellness clinics. Choose from 3 scalable editions, toggle between 2 world-class website themes with 6 homepage layouts, and manage everything effortlessly.')) ?>
                    </p>
                    
                    <div class="mb-4">
                        <?php
                        $hero_pills = site_lines('landing_hero_pills', array(
                            'One-Time Payment • No Subscriptions',
                            'Template 1 (Glamr) & Template 2 (Pureglow)',
                            'Double-Booking Conflict Prevention',
                            'POS & 80mm Thermal Receipt Generator',
                            'Stylist / Therapist Commission Engine',
                            'Dedicated Super Admin Portal'
                        ));
                        foreach ($hero_pills as $hp): ?>
                            <span class="pill-feature"><i class="fa fa-check text-warning"></i> <?= htmlspecialchars($hp) ?></span>
                        <?php endforeach; ?>
                    </div>

                    <div class="d-flex flex-wrap gap-3 pt-2">
                        <a href="#pricing" class="btn btn-gold btn-lg px-4">
                            <i class="fa fa-shopping-cart me-2"></i> <?= htmlspecialchars(site_setting('landing_hero_cta_primary', 'View Purchase Cards')) ?>
                        </a>
                        <a href="#demos" class="btn btn-outline-light btn-lg px-4">
                            <i class="fa fa-desktop me-2"></i> <?= htmlspecialchars(site_setting('landing_hero_cta_secondary', 'Explore Live Demos')) ?>
                        </a>
                        <a href="superadmin/" target="_blank" class="btn btn-outline-warning btn-lg px-4">
                            <i class="fa fa-crown me-2"></i> Super Admin Portal
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 text-center mt-5 mt-lg-0">
                    <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12); backdrop-filter: blur(10px);">
                        <div class="d-inline-flex p-3 rounded-circle mb-3" style="background: rgba(194, 153, 88, 0.2);">
                            <i class="fa fa-gem fa-2x text-warning"></i>
                        </div>
                        <h4 class="text-white mb-2 font-serif"><?= htmlspecialchars(site_setting('landing_hero_card_title', 'Ready to Deploy')) ?></h4>
                        <p class="text-light small mb-4"><?= htmlspecialchars(site_setting('landing_hero_card_desc', 'Select your edition, customize your initial template & layout, download the clean .ZIP package, or launch your live instance instantly.')) ?></p>
                        
                        <div class="text-start bg-dark p-3 rounded-3 mb-3 border border-secondary">
                            <div class="small text-muted mb-1"><i class="fa fa-server me-1"></i> System Architecture</div>
                            <?php
                            $hero_specs = site_lines('landing_hero_specs', array(
                                'PHP 7.4 - 8.2+ (CodeIgniter 3.1.13)',
                                'MariaDB / MySQL 5.7+ Database',
                                'Bootstrap 5 & jQuery 3.6 Frontend',
                                '100% Open & Unencrypted Source Code'
                            ));
                            foreach ($hero_specs as $hs): ?>
                                <div class="fw-bold text-light small">• <?= htmlspecialchars($hs) ?></div>
                            <?php endforeach; ?>
                        </div>

                        <a href="#pricing" class="btn btn-warning w-100 fw-bold">Select Edition & Buy</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Demo Bar -->
    <div id="demos" class="demo-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 text-center text-md-start mb-2 mb-md-0">
                    <span class="badge bg-dark text-warning px-3 py-2 text-uppercase fw-bold">
                        <i class="fa fa-play-circle me-1"></i> Live Demos
                    </span>
                    <span class="ms-2 small text-muted fw-semibold">Try before you buy:</span>
                </div>
                <div class="col-md-9 text-center text-md-end">
                    <div class="btn-group me-2 mb-2">
                        <button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle fw-semibold" data-bs-toggle="dropdown">
                            <i class="fa fa-cut me-1 text-warning"></i> Template 1 (Glamr)
                        </button>
                        <ul class="dropdown-menu shadow">
                            <li><h6 class="dropdown-header text-uppercase small">Homepage Variations</h6></li>
                            <li><a class="dropdown-item" href="website/?preview_tpl=template1&preview_layout=1" target="_blank"><i class="fa fa-home me-2"></i> Layout 1: Luxury Salon</a></li>
                            <li><a class="dropdown-item" href="website/?preview_tpl=template1&preview_layout=2" target="_blank"><i class="fa fa-spa me-2"></i> Layout 2: Modern Hair Studio</a></li>
                            <li><a class="dropdown-item" href="website/?preview_tpl=template1&preview_layout=3" target="_blank"><i class="fa fa-gem me-2"></i> Layout 3: Chic Boutique</a></li>
                        </ul>
                    </div>

                    <div class="btn-group me-2 mb-2">
                        <button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle fw-semibold" data-bs-toggle="dropdown">
                            <i class="fa fa-leaf me-1 text-success"></i> Template 2 (Pureglow)
                        </button>
                        <ul class="dropdown-menu shadow">
                            <li><h6 class="dropdown-header text-uppercase small">Homepage Variations</h6></li>
                            <li><a class="dropdown-item" href="website/?preview_tpl=template2&preview_layout=1" target="_blank"><i class="fa fa-feather me-2 text-success"></i> Layout 1: Sanctuary Day Spa</a></li>
                            <li><a class="dropdown-item" href="website/?preview_tpl=template2&preview_layout=2" target="_blank"><i class="fa fa-heart me-2 text-success"></i> Layout 2: Holistic Wellness</a></li>
                            <li><a class="dropdown-item" href="website/?preview_tpl=template2&preview_layout=3" target="_blank"><i class="fa fa-water me-2 text-success"></i> Layout 3: Massage Clinic</a></li>
                        </ul>
                    </div>

                    <a href="admin/dashboard" target="_blank" class="btn btn-primary btn-sm fw-semibold mb-2 me-2" title="Demo Login: admin@spasalon.com / admin123">
                        <i class="fa fa-tachometer-alt me-1"></i> Admin Portal Demo
                    </a>

                    <a href="superadmin/" target="_blank" class="btn btn-dark btn-sm fw-semibold mb-2">
                        <i class="fa-solid fa-shield-halved me-1 text-warning"></i> Super Admin Portal
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Editions Overview -->
    <section id="editions" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="text-warning fw-bold text-uppercase small tracking-wide"><?php echo htmlspecialchars(site_setting('landing_editions_badge', 'Designed For Every Business Size')); ?></span>
                <h2 class="display-6 fw-bold mt-2"><?php echo htmlspecialchars(site_setting('landing_editions_title', 'Tailored Modules for Salon, Spa, or Both')); ?></h2>
                <p class="text-muted"><?php echo htmlspecialchars(site_setting('landing_editions_subtitle', 'Whether you run a fast-paced walk-in hair salon, an exclusive appointment-only day spa, or a massive unified wellness resort, our script is pre-built to fit your exact workflow.')); ?></p>
            </div>

            <div class="row g-4">
                <!-- Salon Edition Card -->
                <div class="col-lg-4">
                    <div class="card-custom p-4 h-100">
                        <div class="d-inline-flex p-3 rounded-3 mb-3" style="background: #fef3c7;">
                            <i class="fa fa-cut fa-2x text-warning"></i>
                        </div>
                        <span class="badge badge-salon mb-2">SALON EDITION</span>
                        <h4 class="fw-bold mb-3 font-serif"><?php echo htmlspecialchars(site_setting('landing_salon_title', 'Salon Management')); ?></h4>
                        <p class="text-muted small mb-4"><?php echo htmlspecialchars(site_setting('landing_salon_desc', 'Streamlined for hair studios, nail salons, beauty bars, and barbershops needing chair turnover and stylist commission tracking.')); ?></p>
                        <ul class="list-unstyled small mb-4">
                            <?php foreach (site_lines('landing_salon_bullets', [
                                'Stylist & Barber Roster with Skill Tags',
                                'Walk-in Queue Manager & Waiting Chairs',
                                'Automated Stylist Commission Ledger',
                                'POS Register with 80mm Thermal Receipts',
                                'Shampoo, Hair Color & Consumables Stock'
                            ]) as $bullet): ?>
                                <li class="mb-2"><i class="fa fa-check text-warning me-2"></i> <?php echo htmlspecialchars($bullet); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="mt-auto">
                            <button type="button" class="btn btn-outline-dark w-100 fw-bold buy-now-btn" data-plan="SALON" data-name="Salon Management Script" data-price="<?php echo number_format($salon_price, 2); ?>" data-price-display="<?php echo htmlspecialchars(format_site_price($salon_price)); ?>">
                                Purchase Salon Script (<?php echo htmlspecialchars(format_site_price($salon_price)); ?>)
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Spa Edition Card -->
                <div class="col-lg-4">
                    <div class="card-custom p-4 h-100">
                        <div class="d-inline-flex p-3 rounded-3 mb-3" style="background: #d1fae5;">
                            <i class="fa fa-spa fa-2x text-success"></i>
                        </div>
                        <span class="badge badge-spa mb-2">SPA WELLNESS EDITION</span>
                        <h4 class="fw-bold mb-3 font-serif"><?php echo htmlspecialchars(site_setting('landing_spa_title', 'Spa Wellness Script')); ?></h4>
                        <p class="text-muted small mb-4"><?php echo htmlspecialchars(site_setting('landing_spa_desc', 'Engineered for day spas, wellness resorts, massage centers, and skin clinics managing private suites and certified therapists.')); ?></p>
                        <ul class="list-unstyled small mb-4">
                            <?php foreach (site_lines('landing_spa_bullets', [
                                'Private Treatment Suites & Room Scheduling',
                                'Automated Double-Booking Conflict Engine',
                                'Licensed Therapist & Masseur Roster',
                                'Multi-Session Wellness Packages & Passes',
                                'Essential Oils & Organic Product Inventory'
                            ]) as $bullet): ?>
                                <li class="mb-2"><i class="fa fa-check text-success me-2"></i> <?php echo htmlspecialchars($bullet); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="mt-auto">
                            <button type="button" class="btn btn-outline-dark w-100 fw-bold buy-now-btn" data-plan="SPA" data-name="Spa Wellness Script" data-price="<?php echo number_format($spa_price, 2); ?>" data-price-display="<?php echo htmlspecialchars(format_site_price($spa_price)); ?>">
                                Purchase Spa Script (<?php echo htmlspecialchars(format_site_price($spa_price)); ?>)
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Unified Edition Card -->
                <div class="col-lg-4">
                    <div class="card-custom p-4 h-100" style="border: 2px solid var(--primary); background: #fffdfa;">
                        <div class="d-inline-flex p-3 rounded-3 mb-3" style="background: rgba(194,153,88,0.15);">
                            <i class="fa fa-gem fa-2x text-warning"></i>
                        </div>
                        <span class="badge badge-unified mb-2">UNIFIED ENTERPRISE</span>
                        <h4 class="fw-bold mb-3 font-serif"><?php echo htmlspecialchars(site_setting('landing_unified_title', 'Salon & Spa Unified')); ?></h4>
                        <p class="text-muted small mb-4"><?php echo htmlspecialchars(site_setting('landing_unified_desc', 'The ultimate flagship edition combining all salon and spa modules into a single synchronized operational platform.')); ?></p>
                        <ul class="list-unstyled small mb-4">
                            <?php foreach (site_lines('landing_unified_bullets', [
                                '100% of Salon + 100% of Spa Features',
                                'Combined Stylist & Therapist Unified Roster',
                                'Cross-Service Combo Packages (Hair + Massage)',
                                'Private Suite + Hair Styling Station Sync',
                                'Comprehensive Financial P&L Ledger'
                            ]) as $bullet): ?>
                                <li class="mb-2"><i class="fa fa-check text-warning me-2"></i> <?php echo htmlspecialchars($bullet); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="mt-auto">
                            <button type="button" class="btn btn-gold w-100 fw-bold buy-now-btn" data-plan="SALON_SPA" data-name="Salon & Spa Complete Edition" data-price="<?php echo number_format($unified_price, 2); ?>" data-price-display="<?php echo htmlspecialchars(format_site_price($unified_price)); ?>">
                                Purchase Complete (<?php echo htmlspecialchars(format_site_price($unified_price)); ?>)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Multi-Template Showcase -->
    <section id="templates" class="py-5">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="text-warning fw-bold text-uppercase small tracking-wide"><?php echo htmlspecialchars(site_setting('landing_templates_badge', 'Multi-Theme Architecture')); ?></span>
                <h2 class="display-6 fw-bold mt-2"><?php echo htmlspecialchars(site_setting('landing_templates_title', 'Two World-Class Templates Included')); ?></h2>
                <p class="text-muted"><?php echo htmlspecialchars(site_setting('landing_templates_subtitle', 'No need to purchase extra themes. Both premium templates with 6 total homepage layouts are bundled directly into the script package!')); ?></p>
            </div>

            <div class="row g-4">
                <!-- Template 1: Glamr -->
                <div class="col-lg-6">
                    <div class="template-card">
                        <div class="template-preview-frame" style="background: linear-gradient(135deg, #1e293b, #0f172a); display: flex; align-items: center; justify-content: center; color: white;">
                            <div class="text-center p-4">
                                <i class="fa fa-crown fa-3x text-warning mb-2"></i>
                                <h3 class="font-serif">TEMPLATE 1: <?php echo htmlspecialchars(strtoupper(site_setting('landing_tpl1_title', 'Glamr'))); ?></h3>
                                <p class="text-warning small mb-0 font-monospace"><?php echo htmlspecialchars(site_setting('landing_tpl1_subtitle', 'Luxury Chic • Rose Gold & Champagne Aesthetic')); ?></p>
                            </div>
                            <span class="template-tag"><?php echo htmlspecialchars(site_setting('landing_tpl1_tag', '3 Layouts Built-In')); ?></span>
                        </div>
                        <div class="p-4">
                            <h4 class="fw-bold mb-2 font-serif"><?php echo htmlspecialchars(site_setting('landing_tpl1_title', 'Glamr Luxury Salon & Spa Theme')); ?></h4>
                            <p class="text-muted small mb-3"><?php echo htmlspecialchars(site_setting('landing_tpl1_desc', 'Tailored for high-end fashion salons, celebrity stylists, and trendy urban day spas. Features bold editorial typography, elegant service pricing tables, and stylish team galleries.')); ?></p>
                            
                            <div class="bg-light p-3 rounded-3 mb-4">
                                <div class="small fw-bold text-dark mb-2">Preview Homepage Layouts:</div>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="website/?preview_tpl=template1&preview_layout=1" target="_blank" class="btn btn-sm btn-outline-dark">
                                        <i class="fa fa-external-link-alt me-1"></i> Layout 1: Luxury Salon
                                    </a>
                                    <a href="website/?preview_tpl=template1&preview_layout=2" target="_blank" class="btn btn-sm btn-outline-dark">
                                        <i class="fa fa-external-link-alt me-1"></i> Layout 2: Modern Studio
                                    </a>
                                    <a href="website/?preview_tpl=template1&preview_layout=3" target="_blank" class="btn btn-sm btn-outline-dark">
                                        <i class="fa fa-external-link-alt me-1"></i> Layout 3: Chic Boutique
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge bg-dark text-light"><i class="fa fa-mobile-alt me-1"></i> 100% Responsive</span>
                                <span class="badge bg-success-subtle text-success fw-bold"><i class="fa fa-check me-1"></i> Included in All Editions</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Template 2: Pureglow -->
                <div class="col-lg-6">
                    <div class="template-card">
                        <div class="template-preview-frame" style="background: linear-gradient(135deg, #064e3b, #047857); display: flex; align-items: center; justify-content: center; color: white;">
                            <div class="text-center p-4">
                                <i class="fa fa-leaf fa-3x text-light mb-2"></i>
                                <h3 class="font-serif">TEMPLATE 2: <?php echo htmlspecialchars(strtoupper(site_setting('landing_tpl2_title', 'Pureglow'))); ?></h3>
                                <p class="text-light small mb-0 font-monospace"><?php echo htmlspecialchars(site_setting('landing_tpl2_subtitle', 'Organic Botanical • Zen & Holistic Aesthetic')); ?></p>
                            </div>
                            <span class="template-tag"><?php echo htmlspecialchars(site_setting('landing_tpl2_tag', '3 Layouts Built-In')); ?></span>
                        </div>
                        <div class="p-4">
                            <h4 class="fw-bold mb-2 font-serif"><?php echo htmlspecialchars(site_setting('landing_tpl2_title', 'Pureglow Wellness & Day Spa Theme')); ?></h4>
                            <p class="text-muted small mb-3"><?php echo htmlspecialchars(site_setting('landing_tpl2_desc', 'Crafted for tranquil wellness retreats, holistic massage therapies, and ayurvedic day spas. Features botanical color schemes, double-booking protected booking wizard, and therapist profiles.')); ?></p>
                            
                            <div class="bg-light p-3 rounded-3 mb-4">
                                <div class="small fw-bold text-dark mb-2">Preview Homepage Layouts:</div>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="website/?preview_tpl=template2&preview_layout=1" target="_blank" class="btn btn-sm btn-outline-dark">
                                        <i class="fa fa-external-link-alt me-1 text-success"></i> Layout 1: Sanctuary Spa
                                    </a>
                                    <a href="website/?preview_tpl=template2&preview_layout=2" target="_blank" class="btn btn-sm btn-outline-dark">
                                        <i class="fa fa-external-link-alt me-1 text-success"></i> Layout 2: Holistic Wellness
                                    </a>
                                    <a href="website/?preview_tpl=template2&preview_layout=3" target="_blank" class="btn btn-sm btn-outline-dark">
                                        <i class="fa fa-external-link-alt me-1 text-success"></i> Layout 3: Massage Clinic
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge bg-dark text-light"><i class="fa fa-mobile-alt me-1"></i> 100% Responsive</span>
                                <span class="badge bg-success-subtle text-success fw-bold"><i class="fa fa-check me-1"></i> Included in All Editions</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Super Admin & Dynamic Pricing Cards Section -->
    <section id="pricing" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-4">
                <span class="badge bg-dark text-warning px-3 py-2 text-uppercase fw-bold mb-2">
                    <i class="fa fa-shield-alt me-1"></i> Super Admin Controlled Pricing
                </span>
                <h2 class="display-6 fw-bold mt-2">Commercial Purchase Cards</h2>
                <p class="text-muted">Purchase a commercial license for your salon, spa, or combined venture. Prices, original strike-through prices, badges, and features are dynamically loaded from the database and manageable in the Super Admin Panel.</p>
            </div>

            <!-- Super Admin Notice Banner -->
            <div class="alert alert-info border-0 shadow-sm rounded-4 d-flex align-items-center justify-content-between mb-5 p-3">
                <div class="d-flex align-items-center">
                    <i class="fa fa-info-circle fa-2x text-primary me-3"></i>
                    <div>
                        <strong class="d-block text-dark">Super Admin Marketplace Active</strong>
                        <span class="small text-muted">You can edit these purchase card prices, original prices, badges, and features anytime inside the Super Admin Portal at <code>superadmin/?page=plans</code>.</span>
                    </div>
                </div>
                <a href="superadmin/?page=plans" target="_blank" class="btn btn-sm btn-outline-primary fw-bold text-nowrap ms-3">
                    <i class="fa fa-cog me-1"></i> Edit Cards in Super Admin
                </a>
            </div>

            <!-- The 3 Dynamic Purchase Cards -->
            <div class="row g-4 align-items-stretch">
                
                <!-- Card 1: Salon Management Script -->
                <div class="col-lg-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <span class="pricing-badge badge-salon"><?php echo htmlspecialchars($salon_badge); ?></span>
                            <h3 class="fw-bold font-serif mb-1">Salon Edition</h3>
                            <p class="text-muted small mb-0">For Hair Studios, Barbers &amp; Nail Bars</p>
                            <div class="price-tag">
                                <?php echo htmlspecialchars(format_site_price($salon_price)); ?>
                                <span class="price-orig"><?php echo htmlspecialchars(format_site_price($salon_orig)); ?></span>
                            </div>
                            <span class="badge bg-light text-muted border">One-Time Fee • Lifetime Script</span>
                        </div>
                        <div class="pricing-body">
                            <ul class="feature-list">
                                <?php foreach ($salon_features as $f): ?>
                                    <li><i class="fa fa-check-circle"></i> <span><?php echo htmlspecialchars($f); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn btn-outline-gold w-100 fw-bold buy-now-btn" 
                                    data-plan="SALON" 
                                    data-name="Salon Management Script" 
                                    data-price="<?php echo number_format($salon_price, 2); ?>"
                                    data-price-display="<?php echo htmlspecialchars(format_site_price($salon_price)); ?>">
                                <i class="fa fa-shopping-cart me-2"></i> Purchase Salon Edition
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Spa Wellness Management Script -->
                <div class="col-lg-4">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <span class="pricing-badge badge-spa"><?php echo htmlspecialchars($spa_badge); ?></span>
                            <h3 class="fw-bold font-serif mb-1">Spa Wellness Edition</h3>
                            <p class="text-muted small mb-0">For Day Spas, Retreats &amp; Massage Clinics</p>
                            <div class="price-tag">
                                <?php echo htmlspecialchars(format_site_price($spa_price)); ?>
                                <span class="price-orig"><?php echo htmlspecialchars(format_site_price($spa_orig)); ?></span>
                            </div>
                            <span class="badge bg-light text-muted border">One-Time Fee • Lifetime Script</span>
                        </div>
                        <div class="pricing-body">
                            <ul class="feature-list">
                                <?php foreach ($spa_features as $f): ?>
                                    <li><i class="fa fa-check-circle text-success"></i> <span><?php echo htmlspecialchars($f); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn btn-outline-gold w-100 fw-bold buy-now-btn" 
                                    data-plan="SPA" 
                                    data-name="Spa Wellness Management Script" 
                                    data-price="<?php echo number_format($spa_price, 2); ?>"
                                    data-price-display="<?php echo htmlspecialchars(format_site_price($spa_price)); ?>">
                                <i class="fa fa-shopping-cart me-2"></i> Purchase Spa Edition
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Salon & Spa Complete Edition (Featured) -->
                <div class="col-lg-4">
                    <div class="pricing-card featured">
                        <div class="position-absolute top-0 end-0 bg-warning text-dark px-3 py-1 fw-bold small rounded-bottom-start">
                            RECOMMENDED
                        </div>
                        <div class="pricing-header">
                            <span class="pricing-badge badge-unified"><?php echo htmlspecialchars($unified_badge); ?></span>
                            <h3 class="fw-bold font-serif mb-1">Salon &amp; Spa Complete</h3>
                            <p class="text-muted small mb-0">Unified Flagship • Everything Included</p>
                            <div class="price-tag text-dark">
                                <?php echo htmlspecialchars(format_site_price($unified_price)); ?>
                                <span class="price-orig"><?php echo htmlspecialchars(format_site_price($unified_orig)); ?></span>
                            </div>
                            <span class="badge bg-warning-subtle text-dark border border-warning fw-bold">Best Value • All Modules Unlocked</span>
                        </div>
                        <div class="pricing-body">
                            <ul class="feature-list">
                                <?php foreach ($unified_features as $f): ?>
                                    <li><i class="fa fa-check-circle text-warning"></i> <strong><?php echo htmlspecialchars($f); ?></strong></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn btn-gold w-100 fw-bold buy-now-btn" 
                                    data-plan="SALON_SPA" 
                                    data-name="Salon &amp; Spa Complete Edition" 
                                    data-price="<?php echo number_format($unified_price, 2); ?>"
                                    data-price-display="<?php echo htmlspecialchars(format_site_price($unified_price)); ?>">
                                <i class="fa fa-gem me-2"></i> Buy Complete Edition (<?php echo htmlspecialchars(format_site_price($unified_price)); ?>)
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Super Admin Hub Spotlight -->
    <section class="py-5">
        <div class="container">
            <div class="super-admin-banner">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <span class="badge bg-warning text-dark fw-bold px-3 py-1 mb-3"><?php echo htmlspecialchars(site_setting('landing_spotlight_badge', 'SUPER ADMIN CONTROL')); ?></span>
                        <h2 class="display-6 fw-bold font-serif text-white mb-3"><?php echo htmlspecialchars(site_setting('landing_spotlight_title', 'Built-in Marketplace & License Server')); ?></h2>
                        <p class="text-light mb-4 lead" style="font-size: 1.05rem;">
                            <?php echo htmlspecialchars(site_setting('landing_spotlight_lead', 'As the script owner, you have full governance over customer purchases, commercial license generations, pricing card customizations, and download quotas.')); ?>
                        </p>
                        <div class="row g-3 text-start mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-chart-line text-warning fa-lg me-2"></i>
                                    <span><?php echo htmlspecialchars(site_setting('landing_spotlight_f1', 'Real-time Revenue & Order Analytics')); ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-edit text-warning fa-lg me-2"></i>
                                    <span><?php echo htmlspecialchars(site_setting('landing_spotlight_f2', 'Live Purchase Card Price & Feature Editor')); ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-key text-warning fa-lg me-2"></i>
                                    <span><?php echo htmlspecialchars(site_setting('landing_spotlight_f3', 'Instant Commercial License Key Issuer')); ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-download text-warning fa-lg me-2"></i>
                                    <span><?php echo htmlspecialchars(site_setting('landing_spotlight_f4', 'Secure Download Tokens & Quotas')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="superadmin/" target="_blank" class="btn btn-gold fw-bold">
                                <i class="fa fa-tachometer-alt me-1"></i> Open Super Admin Dashboard
                            </a>
                            <a href="superadmin/?page=orders" target="_blank" class="btn btn-outline-light fw-bold">
                                <i class="fa fa-list me-1"></i> View Script Orders
                            </a>
                            <a href="superadmin/?page=licenses" target="_blank" class="btn btn-outline-light fw-bold">
                                <i class="fa fa-key me-1"></i> Manage License Keys
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center mt-4 mt-lg-0">
                        <div class="p-3 bg-dark rounded-4 border border-secondary">
                            <i class="fa-solid fa-shield-halved fa-3x text-warning mb-2"></i>
                            <div class="fw-bold text-white">Super Admin Access</div>
                            <div class="small text-muted mb-3">Dedicated Software Vendor Portal</div>
                            <div class="bg-black p-2 rounded text-start font-monospace small mb-3">
                                <div class="text-light"><span class="text-muted">URL:</span> <?php echo htmlspecialchars(site_setting('landing_spotlight_demo_url', '/superadmin/')); ?></div>
                                <div class="text-light"><span class="text-muted">User:</span> <?php echo htmlspecialchars(site_setting('landing_spotlight_demo_user', 'superadmin@spasalon.com')); ?></div>
                                <div class="text-light"><span class="text-muted">Pass:</span> <?php echo htmlspecialchars(site_setting('landing_spotlight_demo_pass', 'admin123')); ?></div>
                            </div>
                            <a href="superadmin/" target="_blank" class="btn btn-sm btn-outline-warning w-100">
                                <i class="fa fa-sign-in-alt me-1"></i> Super Admin Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-main">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <?php if (!empty($site_logo_url)): ?>
                            <img src="<?php echo htmlspecialchars($site_logo_url); ?>" alt="<?php echo htmlspecialchars(site_setting('landing_footer_brand', 'LUXE SALON & SPA')); ?>" style="max-height: 52px; max-width: 250px; object-fit: contain;">
                        <?php else: ?>
                            <h4 class="footer-brand-title d-flex align-items-center mb-0">
                                <i class="fa fa-spa text-warning me-2"></i>
                                <span><?php echo htmlspecialchars(site_setting('landing_footer_brand', 'LUXE SALON & SPA')); ?></span>
                            </h4>
                        <?php endif; ?>
                    </div>
                    <p class="footer-desc mb-4"><?php echo htmlspecialchars(site_setting('landing_footer_desc', 'A premium self-hosted commercial management script for CodeIgniter 3. Complete with multi-template frontend, stylist/therapist appointments, POS checkout, room conflict engine, and Super Admin panel.')); ?></p>
                    
                    <!-- Dynamic Social Media Channel Links -->
                    <div class="d-flex flex-wrap gap-2">
                        <?php if (!empty(site_setting('landing_social_facebook'))): ?>
                            <a href="<?php echo htmlspecialchars(site_setting('landing_social_facebook')); ?>" target="_blank" class="footer-social-btn" title="Facebook"><i class="fa-brands fa-facebook"></i></a>
                        <?php endif; ?>
                        <?php if (!empty(site_setting('landing_social_instagram'))): ?>
                            <a href="<?php echo htmlspecialchars(site_setting('landing_social_instagram')); ?>" target="_blank" class="footer-social-btn" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if (!empty(site_setting('landing_social_twitter'))): ?>
                            <a href="<?php echo htmlspecialchars(site_setting('landing_social_twitter')); ?>" target="_blank" class="footer-social-btn" title="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                        <?php endif; ?>
                        <?php if (!empty(site_setting('landing_social_linkedin'))): ?>
                            <a href="<?php echo htmlspecialchars(site_setting('landing_social_linkedin')); ?>" target="_blank" class="footer-social-btn" title="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
                        <?php endif; ?>
                        <?php if (!empty(site_setting('landing_social_youtube'))): ?>
                            <a href="<?php echo htmlspecialchars(site_setting('landing_social_youtube')); ?>" target="_blank" class="footer-social-btn" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        <?php endif; ?>
                        <?php if (!empty(site_setting('landing_social_whatsapp'))): ?>
                            <a href="<?php echo htmlspecialchars(site_setting('landing_social_whatsapp')); ?>" target="_blank" class="footer-social-btn" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h6 class="footer-heading">Script Editions</h6>
                    <ul class="footer-links">
                        <li><a href="#pricing"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Salon Management</a></li>
                        <li><a href="#pricing"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Spa Wellness Script</a></li>
                        <li><a href="#pricing"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Unified Edition</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h6 class="footer-heading">Templates</h6>
                    <ul class="footer-links">
                        <li><a href="website/?preview_tpl=template1&preview_layout=1" target="_blank"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Template 1 (Glamr)</a></li>
                        <li><a href="website/?preview_tpl=template2&preview_layout=1" target="_blank"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Template 2 (Pureglow)</a></li>
                        <li><a href="superadmin/" target="_blank"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Super Admin Portal</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h6 class="footer-heading">System Requirements</h6>
                    <div class="footer-reqs">
                        <?php foreach (site_lines('landing_footer_reqs', [
                            'PHP 7.4 to 8.2+ with PDO MySQL',
                            'Apache / Nginx / XAMPP / Laragon',
                            'MariaDB 10.3+ or MySQL 5.7+',
                            '100% Unencoded Clean Source Code'
                        ]) as $req): ?>
                            <div class="footer-req-item"><i class="fa-solid fa-circle-check text-warning me-2"></i> <span><?php echo htmlspecialchars($req); ?></span></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <div>
                    &copy; <?php echo date('Y'); ?> <strong class="text-white"><?php echo htmlspecialchars(site_setting('landing_footer_copyright', 'Luxe Salon & Spa Commercial Software. All Rights Reserved.')); ?></strong>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1 font-monospace">v2.0 Self-Hosted Script</span>
                    <a href="superadmin/" target="_blank" class="text-warning text-decoration-none small"><i class="fa-solid fa-crown me-1"></i> Super Admin</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Interactive Purchase & Template Selection Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title font-serif text-white mb-0" id="modalTitle">
                            <i class="fa fa-shopping-bag text-warning me-2"></i> Purchase Script & Choose Template
                        </h5>
                        <small class="text-muted" id="modalSubtitle">Step 1: Customer Registration & Business Setup</small>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body with Multi-Step Flow -->
                <div class="modal-body">
                    
                    <!-- Progress Bar -->
                    <div class="progress mb-4" style="height: 6px;">
                        <div id="checkoutProgressBar" class="progress-bar bg-warning" role="progressbar" style="width: 33%;"></div>
                    </div>

                    <!-- Step 1: Customer Registration & Salon Details -->
                    <div id="step1">
                        <div class="d-flex align-items-center justify-content-between p-3 rounded-3 mb-4" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                            <div>
                                <span class="small text-muted text-uppercase fw-bold">Selected Edition:</span>
                                <h6 class="fw-bold text-dark mb-0 font-serif" id="summaryPlanName">Salon & Spa Complete Edition</h6>
                            </div>
                            <div class="text-end">
                                <span class="small text-muted text-uppercase fw-bold">One-Time Price:</span>
                                <h5 class="fw-bold text-warning mb-0" id="summaryPlanPrice">$89.00</h5>
                            </div>
                        </div>

                        <form id="customerForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="custName" required placeholder="e.g. Sarah Jenkins">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="custEmail" required placeholder="e.g. sarah@myelegancesalon.com">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Phone Number</label>
                                    <input type="text" class="form-control" id="custPhone" placeholder="e.g. +1 (555) 234-5678">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Salon / Spa Business Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="custBusiness" required placeholder="e.g. Belleza Luxury Salon & Spa">
                                </div>
                            </div>
                        </form>

                        <div class="text-end mt-4">
                            <button type="button" class="btn btn-gold px-4 fw-bold" id="btnGoToStep2">
                                Next: Choose Template & Layout <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Choose Template & Homepage Layout -->
                    <div id="step2" style="display: none;">
                        <h6 class="fw-bold mb-3 font-serif"><i class="fa fa-palette text-warning me-2"></i> Select Initial Website Template:</h6>
                        
                        <div class="row g-3 mb-4">
                            <!-- Template 1 Option -->
                            <div class="col-md-6">
                                <div class="tpl-radio-card active" data-tpl="template1">
                                    <input type="radio" name="chosen_tpl" value="template1" checked>
                                    <div class="fw-bold text-dark font-serif"><i class="fa fa-crown text-warning me-1"></i> Template 1 (Glamr)</div>
                                    <small class="text-muted d-block mt-1">High-fashion luxury aesthetics, gold/champagne accents, stylish service list & team showcase.</small>
                                </div>
                            </div>

                            <!-- Template 2 Option -->
                            <div class="col-md-6">
                                <div class="tpl-radio-card" data-tpl="template2">
                                    <input type="radio" name="chosen_tpl" value="template2">
                                    <div class="fw-bold text-dark font-serif"><i class="fa fa-leaf text-success me-1"></i> Template 2 (Pureglow)</div>
                                    <small class="text-muted d-block mt-1">Botanical zen wellness theme, calming earthy tones, relaxation treatment packages & booking wizard.</small>
                                </div>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-3 font-serif"><i class="fa fa-th-large text-warning me-2"></i> Select Default Homepage Layout:</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-4">
                                <div class="form-check p-3 border rounded text-center">
                                    <input class="form-check-input" type="radio" name="chosen_layout" id="layout1" value="1" checked>
                                    <label class="form-check-label fw-bold d-block mt-1" for="layout1">Layout 1</label>
                                    <span class="small text-muted d-block">Classic Flagship</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check p-3 border rounded text-center">
                                    <input class="form-check-input" type="radio" name="chosen_layout" id="layout2" value="2">
                                    <label class="form-check-label fw-bold d-block mt-1" for="layout2">Layout 2</label>
                                    <span class="small text-muted d-block">Modern Studio</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check p-3 border rounded text-center">
                                    <input class="form-check-input" type="radio" name="chosen_layout" id="layout3" value="3">
                                    <label class="form-check-label fw-bold d-block mt-1" for="layout3">Layout 3</label>
                                    <span class="small text-muted d-block">Chic Boutique</span>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-light border small text-muted mb-4">
                            <i class="fa fa-info-circle text-primary me-1"></i> Both templates and all 6 layouts are permanently included in your script. You can switch between them at any time in your Admin Settings.
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary px-3" id="btnBackToStep1">
                                <i class="fa fa-arrow-left me-1"></i> Back
                            </button>
                            <button type="button" class="btn btn-gold px-4 fw-bold" id="btnGoToStep3">
                                Next: Simulated Checkout <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Simulated Checkout & Order Submission -->
                    <div id="step3" style="display: none;">
                        <div class="card p-3 mb-4 border-0" style="background: #f8fafc;">
                            <h6 class="fw-bold mb-3 font-serif">Order Summary</h6>
                            <div class="d-flex justify-content-between py-1 border-bottom small">
                                <span class="text-muted">Software Edition:</span>
                                <strong id="checkoutPlanText">Salon &amp; Spa Complete Edition</strong>
                            </div>
                            <div class="d-flex justify-content-between py-1 border-bottom small">
                                <span class="text-muted">Business Name:</span>
                                <strong id="checkoutBusinessText">Belleza Luxury Salon</strong>
                            </div>
                            <div class="d-flex justify-content-between py-1 border-bottom small">
                                <span class="text-muted">Pre-Configured Template:</span>
                                <strong id="checkoutTplText">Template 1 (Glamr) - Layout 1</strong>
                            </div>
                            <div class="d-flex justify-content-between py-2 small">
                                <span class="fw-bold">Total Amount Due:</span>
                                <strong class="fs-5 text-warning" id="checkoutAmountText">$89.00</strong>
                            </div>
                        </div>

                        <!-- Single Active Payment Gateway Card -->
                        <?php if ($active_payment_gateway === 'stripe'): ?>
                            <div class="p-3 rounded border mb-4 bg-white shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-brands fa-stripe fa-2x text-primary me-2"></i>
                                        <span class="fw-bold text-dark">Stripe Secured Checkout</span>
                                    </div>
                                    <span class="badge bg-success small"><i class="fa-solid fa-lock me-1"></i> Active Gateway</span>
                                </div>
                                <p class="small text-muted mb-3">Credit card transactions are processed securely through Stripe PCI-compliant gateway.</p>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-dark">Card Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fa-regular fa-credit-card"></i></span>
                                            <input type="text" class="form-control form-control-sm font-monospace" id="stripeCardNum" placeholder="4242 •••• •••• 4242" value="4242 •••• •••• 4242">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label small fw-bold text-dark">Expiry Date</label>
                                        <input type="text" class="form-control form-control-sm font-monospace" id="stripeCardExp" placeholder="MM / YY" value="12/28">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label small fw-bold text-dark">CVC Code</label>
                                        <input type="text" class="form-control form-control-sm font-monospace" id="stripeCardCvc" placeholder="CVC" value="888">
                                    </div>
                                </div>
                            </div>
                        <?php elseif ($active_payment_gateway === 'razorpay'): ?>
                            <div class="p-3 rounded border mb-4 bg-white shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-bolt fa-lg text-info me-2"></i>
                                        <span class="fw-bold text-dark">Razorpay Instant Gateway</span>
                                    </div>
                                    <span class="badge bg-success small"><i class="fa-solid fa-lock me-1"></i> Active Gateway</span>
                                </div>
                                <p class="small text-muted mb-2">Accepting UPI (Google Pay, PhonePe, Paytm), Debit/Credit Cards, and NetBanking via Razorpay.</p>
                                <div class="d-flex gap-2">
                                    <span class="badge bg-light text-dark border">UPI</span>
                                    <span class="badge bg-light text-dark border">Cards</span>
                                    <span class="badge bg-light text-dark border">NetBanking</span>
                                    <span class="badge bg-light text-dark border">Wallets</span>
                                </div>
                            </div>
                        <?php elseif ($active_payment_gateway === 'payu'): ?>
                            <div class="p-3 rounded border mb-4 bg-white shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-money-bill-wave fa-lg text-success me-2"></i>
                                        <span class="fw-bold text-dark">PayU Money / Biz Gateway</span>
                                    </div>
                                    <span class="badge bg-success small"><i class="fa-solid fa-lock me-1"></i> Active Gateway</span>
                                </div>
                                <p class="small text-muted mb-0">Encrypted merchant transaction through PayU payment processing network.</p>
                            </div>
                        <?php else: ?>
                            <div class="p-3 rounded border mb-4 bg-white shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-laptop-code text-warning fa-lg me-2"></i>
                                        <span class="fw-bold text-dark">Simulated Instant Checkout (Sandbox / Demo)</span>
                                    </div>
                                    <span class="badge bg-warning text-dark small">Sandbox Mode</span>
                                </div>
                                <p class="small text-muted mb-0">No live credit card charge. Submitting will register the commercial license in the Super Admin system and provide your download link.</p>
                            </div>
                        <?php endif; ?>

                        <div id="checkoutAlert" class="alert alert-danger d-none small"></div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary px-3" id="btnBackToStep2">
                                <i class="fa fa-arrow-left me-1"></i> Back
                            </button>
                            <button type="button" class="btn btn-success btn-lg px-4 fw-bold" id="btnSubmitOrder">
                                <span id="spinnerBtn" class="spinner-border spinner-border-sm me-2 d-none"></span>
                                <?php if ($active_payment_gateway === 'stripe'): ?>
                                    <i class="fa-brands fa-stripe me-1"></i> Pay with Stripe &amp; Generate License
                                <?php elseif ($active_payment_gateway === 'razorpay'): ?>
                                    <i class="fa-solid fa-bolt me-1"></i> Pay with Razorpay &amp; Generate License
                                <?php elseif ($active_payment_gateway === 'payu'): ?>
                                    <i class="fa-solid fa-money-bill-wave me-1"></i> Pay with PayU &amp; Generate License
                                <?php else: ?>
                                    <i class="fa fa-check-circle me-1"></i> Complete Purchase &amp; Generate License
                                <?php endif; ?>
                            </button>
                        </div>
                    </div>

                    <!-- Step 4: Purchase Successful & Fulfillment Hub -->
                    <div id="step4" style="display: none;">
                        <div class="order-success-box mb-4">
                            <div class="d-inline-flex p-3 rounded-circle bg-white shadow-sm mb-3">
                                <i class="fa fa-check-circle fa-3x text-success"></i>
                            </div>
                            <h4 class="fw-bold text-success font-serif mb-1">Congratulations! Purchase Completed!</h4>
                            <p class="text-muted small mb-3">Your commercial license has been officially generated and registered in the Super Admin system.</p>
                            
                            <div class="small text-muted fw-bold">YOUR COMMERCIAL LICENSE KEY:</div>
                            <div class="license-code-box" id="resLicenseKey">LIC-SALON_SPA-XXXX-2026-X123</div>
                            <div class="small text-muted mb-2">Order Reference: <strong id="resOrderNumber">ORD-2026-0000</strong></div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <a id="btnDownloadZip" href="#" class="btn btn-primary w-100 py-3 fw-bold shadow-sm">
                                    <i class="fa fa-download fa-lg me-2"></i> Download Full Script (.zip)
                                </a>
                                <small class="text-muted d-block text-center mt-1">Pre-packaged with chosen template &amp; database</small>
                            </div>
                            <div class="col-md-6">
                                <a id="btnLaunchInstance" href="#" class="btn btn-success w-100 py-3 fw-bold shadow-sm" target="_blank">
                                    <i class="fa fa-rocket fa-lg me-2"></i> Launch Configured Instance
                                </a>
                                <small class="text-muted d-block text-center mt-1">Applies chosen template &amp; opens live website</small>
                            </div>
                        </div>

                        <div class="border-top pt-3 mt-4 text-center">
                            <a href="superadmin/?page=orders" target="_blank" class="btn btn-sm btn-outline-dark me-2">
                                <i class="fa fa-shield-alt text-warning me-1"></i> View Order in Super Admin
                            </a>
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                                Close Window
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="website/assets/template1/js/bootstrap.bundle.min.js"></script>
    <script>
        // State variables
        let selectedPlan = 'SALON_SPA';
        let selectedPlanName = 'Salon & Spa Complete Edition';
        let selectedPrice = '89.00';
        let selectedPriceDisplay = '<?php echo htmlspecialchars(format_site_price($unified_price)); ?>';
        let selectedTemplate = 'template1';
        let selectedLayout = '1';

        // Modal elements
        const checkoutModal = new bootstrap.Modal(document.getElementById('checkoutModal'));
        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const step3 = document.getElementById('step3');
        const step4 = document.getElementById('step4');
        const modalSubtitle = document.getElementById('modalSubtitle');
        const checkoutProgressBar = document.getElementById('checkoutProgressBar');

        // Buy button click handlers
        document.querySelectorAll('.buy-now-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                selectedPlan = this.getAttribute('data-plan') || 'SALON_SPA';
                selectedPlanName = this.getAttribute('data-name') || 'Salon & Spa Complete Edition';
                selectedPrice = this.getAttribute('data-price') || '89.00';
                selectedPriceDisplay = this.getAttribute('data-price-display') || ('$' + selectedPrice);

                document.getElementById('summaryPlanName').textContent = selectedPlanName;
                document.getElementById('summaryPlanPrice').textContent = selectedPriceDisplay;
                
                // Reset flow to step 1
                goToStep(1);
                checkoutModal.show();
            });
        });

        // Template Radio Card Click
        document.querySelectorAll('.tpl-radio-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.tpl-radio-card').forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                const radio = this.querySelector('input[type="radio"]');
                if (radio) {
                    radio.checked = true;
                    selectedTemplate = radio.value;
                }
            });
        });

        // Step Navigation
        function goToStep(step) {
            step1.style.display = 'none';
            step2.style.display = 'none';
            step3.style.display = 'none';
            step4.style.display = 'none';

            if (step === 1) {
                step1.style.display = 'block';
                modalSubtitle.textContent = 'Step 1 of 3: Buyer Registration & Business Setup';
                checkoutProgressBar.style.width = '33%';
            } else if (step === 2) {
                step2.style.display = 'block';
                modalSubtitle.textContent = 'Step 2 of 3: Select Your Initial Template & Homepage Layout';
                checkoutProgressBar.style.width = '66%';
            } else if (step === 3) {
                step3.style.display = 'block';
                modalSubtitle.textContent = 'Step 3 of 3: Payment & License Generation';
                checkoutProgressBar.style.width = '100%';

                // Populate Step 3 summaries
                const business = document.getElementById('custBusiness').value || 'My Salon & Spa';
                const layoutRadio = document.querySelector('input[name="chosen_layout"]:checked');
                selectedLayout = layoutRadio ? layoutRadio.value : '1';

                const tplName = (selectedTemplate === 'template1') ? 'Template 1 (Glamr)' : 'Template 2 (Pureglow)';

                document.getElementById('checkoutPlanText').textContent = selectedPlanName;
                document.getElementById('checkoutBusinessText').textContent = business;
                document.getElementById('checkoutTplText').textContent = tplName + ' - Layout ' + selectedLayout;
                document.getElementById('checkoutAmountText').textContent = selectedPriceDisplay;
            } else if (step === 4) {
                step4.style.display = 'block';
                modalSubtitle.textContent = 'Fulfillment Complete: License Generated & Ready to Run';
                checkoutProgressBar.style.width = '100%';
            }
        }

        // Navigation button listeners
        document.getElementById('btnGoToStep2').addEventListener('click', function() {
            const name = document.getElementById('custName').value.trim();
            const email = document.getElementById('custEmail').value.trim();
            const business = document.getElementById('custBusiness').value.trim();

            if (!name || !email || !business) {
                alert('Please fill in your Full Name, Email Address, and Salon/Spa Business Name.');
                return;
            }
            goToStep(2);
        });

        document.getElementById('btnBackToStep1').addEventListener('click', () => goToStep(1));
        document.getElementById('btnGoToStep3').addEventListener('click', () => goToStep(3));
        document.getElementById('btnBackToStep2').addEventListener('click', () => goToStep(2));

        // Submit Order via AJAX
        document.getElementById('btnSubmitOrder').addEventListener('click', function() {
            const btn = this;
            const spinner = document.getElementById('spinnerBtn');
            const alertBox = document.getElementById('checkoutAlert');
            
            alertBox.classList.add('d-none');
            btn.disabled = true;
            spinner.classList.remove('d-none');

            const name = document.getElementById('custName').value.trim();
            const email = document.getElementById('custEmail').value.trim();
            const phone = document.getElementById('custPhone').value.trim();
            const business = document.getElementById('custBusiness').value.trim();
            const layoutRadio = document.querySelector('input[name="chosen_layout"]:checked');
            const layout = layoutRadio ? layoutRadio.value : '1';

            const formData = new FormData();
            formData.append('plan_code', selectedPlan);
            formData.append('name', name);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('business_name', business);
            formData.append('chosen_template', selectedTemplate);
            formData.append('chosen_layout', layout);

            fetch('order_process.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                btn.disabled = false;
                spinner.classList.add('d-none');

                if (data.status === 'success') {
                    // Populate success step
                    document.getElementById('resLicenseKey').textContent = data.license_key;
                    document.getElementById('resOrderNumber').textContent = data.order_number;
                    document.getElementById('btnDownloadZip').setAttribute('href', data.download_url);
                    document.getElementById('btnLaunchInstance').setAttribute('href', data.launch_url);

                    goToStep(4);
                } else {
                    alertBox.textContent = data.message || 'An error occurred during order processing.';
                    alertBox.classList.remove('d-none');
                }
            })
            .catch(err => {
                btn.disabled = false;
                spinner.classList.add('d-none');
                alertBox.textContent = 'Network or server error. Please try again.';
                alertBox.classList.remove('d-none');
            });
        });
    </script>
</body>
</html>
