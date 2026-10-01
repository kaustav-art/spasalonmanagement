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

// Fallback default image helper (using c:\Users\Codeulas\Downloads\no-immage.jpg copied to uploads/no-image.jpg)
if (!function_exists('site_image_or_default')) {
    function site_image_or_default($url, $default = 'uploads/no-image.jpg') {
        if (empty($url)) {
            return $default;
        }
        if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
            return $url;
        }
        $clean = ltrim($url, '/\\');
        if (file_exists(__DIR__ . '/' . $clean)) {
            return $clean;
        }
        return $default;
    }
}

// Fetch dynamic templates & layouts for Multi-Theme Architecture
$templates = array();
try {
    if (isset($pdo)) {
        $stmt_t = $pdo->query("SELECT * FROM marketplace_templates WHERE status = 'active' ORDER BY sort_order ASC, id ASC");
        $templates = $stmt_t->fetchAll();
        foreach ($templates as $t) {
            $stmt_l = $pdo->prepare("SELECT * FROM marketplace_template_layouts WHERE template_id = ? AND status = 'active' ORDER BY sort_order ASC, layout_number ASC");
            $stmt_l->execute(array($t->id));
            $t->layouts = $stmt_l->fetchAll();
            foreach ($t->layouts as $l) {
                $l->preview_image = site_image_or_default($l->preview_image);
                if (empty($l->demo_url)) {
                    $l->demo_url = 'website/?preview_tpl=' . urlencode($t->template_key) . '&preview_layout=' . urlencode($l->layout_number);
                }
            }
        }
    }
} catch (Exception $e) {
    // Fallback
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

// Check for returned order from official payment gateways (Stripe Hosted Checkout / PayU Hosted Portal)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$returned_order_success = isset($_GET['order_success']) ? trim($_GET['order_success']) : '';
$returned_token = isset($_GET['token']) ? trim($_GET['token']) : '';
$returned_order_info = null;
if (!empty($returned_order_success)) {
    if (isset($_SESSION['completed_order_' . $returned_order_success])) {
        $returned_order_info = $_SESSION['completed_order_' . $returned_order_success];
    } else {
        try {
            if (isset($pdo)) {
                $stmt_ro = $pdo->prepare("SELECT * FROM marketplace_orders WHERE order_number = ? LIMIT 1");
                $stmt_ro->execute(array($returned_order_success));
                $ro_row = $stmt_ro->fetch();
                if ($ro_row) {
                    $returned_order_info = array(
                        'order_number' => $ro_row->order_number,
                        'token' => $ro_row->download_token,
                        'company_name' => $ro_row->business_name,
                        'company_email' => $ro_row->customer_email,
                        'company_phone' => $ro_row->customer_phone,
                        'plan_code' => $ro_row->plan_code,
                        'template' => $ro_row->chosen_template,
                        'layout' => $ro_row->chosen_layout,
                        'admin_name' => $ro_row->customer_name,
                        'admin_email' => $ro_row->customer_email,
                        'admin_password' => ''
                    );
                }
            }
        } catch (Exception $e) {
            // Ignore
        }
    }
}
$payment_cancelled = isset($_GET['payment_cancelled']) && $_GET['payment_cancelled'] == '1';

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
    'Template 1 & Template 2 Included',
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
    'Template 1 & Template 2 Included',
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
    'Template 1 + Template 2 Included',
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
        /* Hero Carousel Slider */
        .hero-slider-section {
            position: relative;
            background: #0f172a;
            color: #ffffff;
            overflow: hidden;
        }
        .hero-slide-item {
            min-height: 580px;
            height: 72vh;
            max-height: 720px;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
        }
        .hero-slide-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, rgba(15, 23, 42, 0.94) 0%, rgba(15, 23, 42, 0.82) 48%, rgba(15, 23, 42, 0.52) 80%, rgba(15, 23, 42, 0.32) 100%);
            z-index: 1;
        }
        .hero-slide-content {
            position: relative;
            z-index: 2;
            max-width: 780px;
            padding: 2.5rem 0;
        }
        .hero-badge {
            background: rgba(194, 153, 88, 0.2);
            border: 1px solid rgba(194, 153, 88, 0.45);
            color: #f7d794;
            padding: 0.45rem 1.2rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: inline-block;
            margin-bottom: 1.25rem;
        }
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.18;
            margin-bottom: 1.25rem;
            color: #ffffff;
        }
        .hero-title span {
            color: var(--primary);
            font-style: italic;
        }
        .hero-lead {
            font-size: 1.15rem;
            color: #cbd5e1;
            max-width: 680px;
            line-height: 1.65;
            margin-bottom: 2rem;
        }
        .hero-carousel-nav-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(15, 23, 42, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.22);
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            transition: all 0.25s ease;
            backdrop-filter: blur(8px);
        }
        .hero-carousel-nav-btn:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
            transform: scale(1.08);
        }
        .carousel-control-prev, .carousel-control-next {
            width: 65px;
            opacity: 0.85;
            z-index: 5;
        }
        .carousel-control-prev:hover, .carousel-control-next:hover {
            opacity: 1;
        }
        .carousel-indicators [data-bs-target] {
            width: 32px;
            height: 5px;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.4);
            border: none;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        .carousel-indicators .active {
            width: 52px;
            background-color: var(--primary);
        }
        @media (max-width: 991px) {
            .hero-slide-item {
                min-height: 520px;
                height: auto;
                padding: 4.5rem 0;
            }
            .hero-title {
                font-size: 2.6rem;
            }
            .hero-lead {
                font-size: 1.05rem;
            }
            .carousel-control-prev, .carousel-control-next {
                display: none;
            }
        }
        @media (max-width: 575px) {
            .hero-title {
                font-size: 2rem;
            }
            .hero-lead {
                font-size: 0.95rem;
            }
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

        /* Template Showcase Card Styles */
        .template-card {
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            background: #ffffff;
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        }
        .template-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.12);
        }
        .browser-mockup-bar {
            background: #0f172a;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .browser-mockup-dots {
            display: flex;
            gap: 6px;
        }
        .browser-mockup-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }
        .browser-mockup-dot.dot-red { background: #ef4444; }
        .browser-mockup-dot.dot-yellow { background: #f59e0b; }
        .browser-mockup-dot.dot-green { background: #10b981; }
        .browser-mockup-url {
            background: rgba(255, 255, 255, 0.08);
            color: #94a3b8;
            font-family: monospace;
            font-size: 0.72rem;
            padding: 4px 14px;
            border-radius: 50px;
            flex-grow: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .template-preview-frame {
            height: 250px;
            background-size: cover;
            background-position: center top;
            position: relative;
            overflow: hidden;
            transition: all 0.5s ease;
        }
        .template-card:hover .template-preview-frame {
            background-position: center center;
        }
        .template-preview-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.25) 0%, rgba(15, 23, 42, 0.7) 100%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 16px;
        }
        .template-tag {
            background: rgba(15, 23, 42, 0.85);
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.35rem 0.85rem;
            border-radius: 50px;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        .layout-pill-btn {
            font-size: 0.78rem;
            font-weight: 600;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        .layout-pill-btn:hover {
            transform: translateY(-2px);
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

        /* Modal dialog XL responsive max-width */
        @media (min-width: 1200px) {
            #checkoutModal .modal-xl,
            #layoutPreviewModal .modal-xl {
                max-width: 1240px;
            }
        }

        /* Enhanced Template Selector Cards in Modal */
        .tpl-radio-card {
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            padding: 1.25rem 1.4rem;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            background: #ffffff;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .tpl-radio-card:hover {
            border-color: var(--primary);
            background: #fcfbf9;
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.06);
        }
        .tpl-radio-card.active {
            border-color: var(--primary);
            background: #fffdf8;
            box-shadow: 0 0 0 1.5px var(--primary), 0 12px 28px rgba(194, 153, 88, 0.16);
        }
        .tpl-icon-pill {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(194, 153, 88, 0.12);
            color: var(--primary-dark);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }
        .tpl-radio-card.active .tpl-icon-pill {
            background: var(--primary);
            color: #ffffff;
        }
        .tpl-check-indicator {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            border: 2px solid #cbd5e1;
            display: flex;
            align-items: center;
            justify-content: center;
            color: transparent;
            font-size: 12px;
            transition: all 0.2s ease;
            background: #ffffff;
            flex-shrink: 0;
        }
        .tpl-radio-card.active .tpl-check-indicator {
            border-color: var(--primary);
            background: var(--primary);
            color: #ffffff;
        }

        /* Homepage Layout Preview Cards in Wizard */
        .layout-preview-card {
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
            background: #ffffff;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }
        .layout-preview-card:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
        }
        .layout-preview-card.active {
            border-color: var(--primary);
            background: #fffdf9;
            box-shadow: 0 0 0 1.5px var(--primary), 0 12px 28px rgba(194, 153, 88, 0.18);
        }
        .layout-img-container {
            position: relative;
            height: 185px;
            background: #0f172a;
            overflow: hidden;
        }
        .layout-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
            transition: transform 0.35s ease;
            display: block;
        }
        .layout-preview-card:hover .layout-img-container img {
            transform: scale(1.04);
        }
        .layout-top-badges {
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 3;
            pointer-events: none;
        }
        .layout-top-badges .badge {
            pointer-events: auto;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
        }

        .layout-card-body {
            padding: 1rem 1.15rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .layout-title {
            font-size: 1rem;
            color: #0f172a;
            font-weight: 700;
        }
        .layout-desc {
            font-size: 0.82rem;
            line-height: 1.45;
            min-height: 2.5em;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 0.75rem;
        }
        .layout-preview-card.active .layout-title {
            color: var(--primary-dark);
        }
        .btn-card-zoom {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 0.4rem 0.75rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-align: center;
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .btn-card-zoom:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
            color: #0f172a;
        }
        .layout-preview-card.active .btn-card-zoom {
            background: #fff8ec;
            border-color: rgba(194, 153, 88, 0.4);
            color: var(--primary-dark);
        }

        /* Fullscreen Layout Zoom-Preview Modal */
        #layoutPreviewModal {
            z-index: 1070 !important;
        }
        .layout-preview-backdrop {
            z-index: 1065 !important;
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

        /* Stats Ribbon */
        .stats-ribbon {
            background: #0f172a;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 2.2rem 0;
            color: #ffffff;
        }
        .stat-item {
            text-align: center;
            padding: 0.5rem 1rem;
        }
        .stat-number {
            font-size: 2.4rem;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            color: var(--primary);
            line-height: 1.1;
            margin-bottom: 0.25rem;
        }
        .stat-label {
            font-size: 0.82rem;
            color: #94a3b8;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        /* Modern Feature Cards */
        .feature-card-modern {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 2.25rem 2rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            position: relative;
        }
        .feature-card-modern:hover {
            transform: translateY(-8px);
            border-color: #cbd5e1;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.09);
        }
        .feature-icon-wrapper {
            width: 58px;
            height: 58px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            background: rgba(194, 153, 88, 0.12);
            color: #b4853b;
            border: 1px solid rgba(194, 153, 88, 0.25);
            transition: all 0.3s ease;
        }
        .feature-card-modern:hover .feature-icon-wrapper {
            background: #c29958;
            color: #ffffff;
            transform: scale(1.06);
        }
        .feature-checklist {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px dashed #e2e8f0;
        }
        .feature-checklist li {
            font-size: 0.86rem;
            color: #475569;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: flex-start;
        }
        .feature-checklist li:last-child {
            margin-bottom: 0;
        }
        .feature-checklist i {
            color: #10b981;
            margin-right: 8px;
            margin-top: 3px;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        /* 4-Step Workflow */
        .step-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 2rem;
            height: 100%;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }
        .step-card:hover {
            transform: translateY(-6px);
            border-color: #cbd5e1;
            box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
        }
        .step-number {
            font-size: 2.2rem;
            font-weight: 900;
            font-family: 'Playfair Display', serif;
            color: rgba(194, 153, 88, 0.3);
            line-height: 1;
            margin-bottom: 1rem;
            transition: color 0.3s ease;
        }
        .step-card:hover .step-number {
            color: var(--primary);
        }

        /* Comparison Table / Box */
        .compare-box {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            box-shadow: 0 12px 36px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }
        .compare-table th {
            background: #0f172a;
            color: #ffffff;
            font-weight: 700;
            padding: 1.25rem 1.5rem;
            font-size: 0.95rem;
        }
        .compare-table td {
            padding: 1.15rem 1.5rem;
            vertical-align: middle;
            font-size: 0.92rem;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Testimonials */
        .testimonial-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 18px;
            padding: 2.25rem 2rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }
        .testimonial-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            border-color: #cbd5e1;
        }
        .testimonial-stars {
            color: #f59e0b;
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }
        .testimonial-quote {
            font-style: italic;
            color: #334155;
            font-size: 0.96rem;
            line-height: 1.65;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }
        .testimonial-author-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #0f172a;
            color: #fbbf24;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            margin-right: 12px;
            flex-shrink: 0;
            border: 2px solid #e2e8f0;
        }

        /* FAQ Accordion */
        .faq-accordion .accordion-item {
            border: 1px solid var(--border-color);
            border-radius: 14px !important;
            margin-bottom: 1rem;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
            transition: all 0.25s ease;
        }
        .faq-accordion .accordion-item:hover {
            border-color: #cbd5e1;
        }
        .faq-accordion .accordion-button {
            font-weight: 700;
            color: #0f172a;
            padding: 1.25rem 1.5rem;
            background: #ffffff;
            font-size: 1.02rem;
            box-shadow: none;
        }
        .faq-accordion .accordion-button:not(.collapsed) {
            color: #b4853b;
            background: #fdfaf4;
        }
        .faq-accordion .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(194, 153, 88, 0.25);
        }
        .faq-accordion .accordion-body {
            padding: 1rem 1.5rem 1.5rem;
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.65;
            background: #ffffff;
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
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#templates">Templates</a></li>
                    <li class="nav-item"><a class="nav-link" href="#workflow">How It Works</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pricing">SaaS Plans</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="superadmin/" target="_blank"><i class="fa fa-shield-alt text-warning me-1"></i>Super Admin</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <a href="#pricing" class="btn btn-gold btn-sm px-4 rounded-pill">
                        <i class="fa-solid fa-gem me-1"></i> Get Started
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Slider Section -->
    <section id="home" class="hero-slider-section">
        <div id="heroBannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <!-- Carousel Indicators -->
            <div class="carousel-indicators mb-4">
                <button type="button" data-bs-target="#heroBannerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroBannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroBannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Carousel Slides -->
            <div class="carousel-inner">
                <!-- Slide 1: Unified Salon & Spa Platform -->
                <?php
                    $slide1_bg = !empty($hero_bg_url) ? $hero_bg_url : 'website/assets/template1/images/banner-slider-img/demo1-slide-1.jpg';
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
                <div class="carousel-item active">
                    <div class="hero-slide-item" style="background-image: url('<?= htmlspecialchars($slide1_bg) ?>');">
                        <div class="hero-slide-overlay"></div>
                        <div class="container position-relative">
                            <div class="hero-slide-content">
                                <span class="hero-badge">
                                    <i class="fa fa-cloud me-1"></i> <?= htmlspecialchars(site_setting('landing_hero_badge', 'MULTI-TENANT SALON & SPA SAAS CLOUD PLATFORM')) ?>
                                </span>
                                <h1 class="hero-title">
                                    <?= $rendered_title ?>
                                </h1>
                                <p class="hero-lead">
                                    <?= htmlspecialchars(site_setting('landing_hero_lead', 'Empower your salon or spa with instant cloud multi-tenancy. Choose from Salon Edition, Spa Wellness Edition, or Salon & Spa Complete, process payments securely, and launch via our automated Project Setup Wizard with custom domain folder provisioning.')) ?>
                                </p>
                                <div class="d-flex flex-wrap align-items-center gap-3">
                                    <a href="#pricing" class="btn btn-gold btn-lg px-4 rounded-pill">
                                        <i class="fa-solid fa-gem me-2"></i> Get Started
                                    </a>
                                    <a href="#features" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                                        <i class="fa-solid fa-layer-group me-2"></i> Explore Features
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Salon Edition & POS Checkout -->
                <div class="carousel-item">
                    <div class="hero-slide-item" style="background-image: url('website/assets/template1/images/banner-slider-img/demo1-slide-2.jpg');">
                        <div class="hero-slide-overlay"></div>
                        <div class="container position-relative">
                            <div class="hero-slide-content">
                                <span class="hero-badge">
                                    <i class="fa-solid fa-scissors me-1 text-warning"></i> SALON & BEAUTY PARLOR EDITION
                                </span>
                                <h1 class="hero-title">
                                    Stylist Rosters, Chair Bookings & <span>Express POS Checkout</span>
                                </h1>
                                <p class="hero-lead">
                                    Fast walk-in queues, stylist workstation allocations, service bundles, and 80mm thermal receipt printing with automated commission calculations.
                                </p>
                                <div class="d-flex flex-wrap align-items-center gap-3">
                                    <a href="admin/dashboard" target="_blank" class="btn btn-gold btn-lg px-4 rounded-pill">
                                        <i class="fa-solid fa-gauge-high me-2"></i> Open Admin Portal
                                    </a>
                                    <a href="#editions" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                                        <i class="fa-solid fa-layer-group me-2"></i> Compare Editions
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: Spa Modules & Conflict-Free Calendar -->
                <div class="carousel-item">
                    <div class="hero-slide-item" style="background-image: url('website/assets/template1/images/banner-slider-img/demo1-slide-3.jpg');">
                        <div class="hero-slide-overlay"></div>
                        <div class="container position-relative">
                            <div class="hero-slide-content">
                                <span class="hero-badge">
                                    <i class="fa-solid fa-spa me-1 text-warning"></i> LUXURY SPA & WELLNESS RETREAT
                                </span>
                                <h1 class="hero-title">
                                    Treatment Rooms & <span>Conflict-Free Booking Engine</span>
                                </h1>
                                <p class="hero-lead">
                                    Dedicated room conflict detection prevents overlapping appointments for massage therapy, sauna, hydrotherapy suites, and specialist staff schedules.
                                </p>
                                <div class="d-flex flex-wrap align-items-center gap-3">
                                    <a href="#pricing" class="btn btn-gold btn-lg px-4 rounded-pill">
                                        <i class="fa-solid fa-gem me-2"></i> Get Started Today
                                    </a>
                                    <a href="#demos" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                                        <i class="fa-solid fa-play me-2"></i> Try Live Demos
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroBannerCarousel" data-bs-slide="prev">
                <span class="hero-carousel-nav-btn" aria-hidden="true">
                    <i class="fa-solid fa-chevron-left"></i>
                </span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroBannerCarousel" data-bs-slide="next">
                <span class="hero-carousel-nav-btn" aria-hidden="true">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Quick Stats Ribbon -->
    <section class="stats-ribbon">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">6 Layouts</div>
                        <div class="stat-label">2 Luxury Templates Included</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Unencrypted Clean PHP Code</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">$0/mo</div>
                        <div class="stat-label">Zero Monthly Subscriptions</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">80mm</div>
                        <div class="stat-label">Thermal POS Receipt Ready</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Operational Modules & Features -->
    <div id="overview"></div>
    <section id="features" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="text-warning fw-bold text-uppercase small tracking-wide">ENTERPRISE SALON &amp; SPA CAPABILITIES</span>
                <h2 class="display-6 fw-bold mt-2">Everything You Need to Run &amp; Scale Your Business</h2>
                <p class="text-muted">A comprehensive, battle-tested system engineered for daily front-desk speed, staff commission automation, and client delight.</p>
            </div>

            <div class="row g-4">
                <!-- Module 1: Appointment & Booking Engine -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card-modern">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <h4 class="fw-bold mb-2 font-serif">Smart Booking Engine</h4>
                        <p class="text-muted small mb-3">Eliminate missed calls and double-bookings with 24/7 client online scheduling and real-time calendar synchronization.</p>
                        <ul class="feature-checklist">
                            <li><i class="fa-solid fa-check"></i> <span>Automated room &amp; stylist conflict detection</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Buffer times between chemical treatments &amp; massages</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Automated SMS &amp; Email confirmations</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Multi-service selection in single booking flow</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Module 2: High-Speed POS Register -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card-modern">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-cash-register"></i>
                        </div>
                        <h4 class="fw-bold mb-2 font-serif">High-Speed POS Register</h4>
                        <p class="text-muted small mb-3">Designed for lightning-fast walk-in checkouts, split tenders, and instant thermal receipt printing at your reception desk.</p>
                        <ul class="feature-checklist">
                            <li><i class="fa-solid fa-check"></i> <span>Standard 80mm &amp; 58mm thermal receipt printing</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Split payments: Cash, Card, Wallets &amp; Tips</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Walk-in queue manager &amp; waiting chair tracking</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Promotional coupon codes &amp; custom tax rates</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Module 3: Stylists, Therapists & Commission -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card-modern">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <h4 class="fw-bold mb-2 font-serif">Staff &amp; Commission Ledger</h4>
                        <p class="text-muted small mb-3">Empower stylists and therapists with transparent shift rosters, chairs, treatment suites, and automatic commission payouts.</p>
                        <ul class="feature-checklist">
                            <li><i class="fa-solid fa-check"></i> <span>Automated tier-based commission calculations</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Stylist chair &amp; private spa suite allocations</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Staff shift rosters, working hours &amp; days off</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Individual staff performance scorecards</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Module 4: Consumables & Retail Inventory -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card-modern">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-boxes-stacked"></i>
                        </div>
                        <h4 class="fw-bold mb-2 font-serif">Dual-Track Inventory</h4>
                        <p class="text-muted small mb-3">Keep total control over backbar professional supplies (hair dye, oils, shampoos) and front-desk retail products.</p>
                        <ul class="feature-checklist">
                            <li><i class="fa-solid fa-check"></i> <span>Separate tracking: Backbar usage vs Retail sale</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Automatic low-stock alerts &amp; re-order warnings</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Vendor purchase orders &amp; supplier directory</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Barcode scanner compatible SKU search</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Module 5: Memberships, Packages & Loyalty -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card-modern">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-gem"></i>
                        </div>
                        <h4 class="fw-bold mb-2 font-serif">Memberships &amp; Loyalty</h4>
                        <p class="text-muted small mb-3">Boost recurring revenue with prepaid multi-session treatment passes, client loyalty rewards, and digital gift cards.</p>
                        <ul class="feature-checklist">
                            <li><i class="fa-solid fa-check"></i> <span>Multi-session spa packages (e.g. 5x Massage Pass)</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Loyalty points earned on every dollar spent</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Gift card balance tracking &amp; redemption</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Client past treatment notes &amp; allergy records</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Module 6: Executive Financial Ledgers -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card-modern">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-chart-pie"></i>
                        </div>
                        <h4 class="fw-bold mb-2 font-serif">Executive Financial Ledgers</h4>
                        <p class="text-muted small mb-3">Actionable visual dashboards and exportable financial reports giving you clarity on profit margins, staff, and services.</p>
                        <ul class="feature-checklist">
                            <li><i class="fa-solid fa-check"></i> <span>End-of-day register drawer reconciliation (Z-Report)</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Revenue breakdown by Hair, Spa, Nails &amp; Retail</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>Top-grossing services &amp; client retention metrics</span></li>
                            <li><i class="fa-solid fa-check"></i> <span>1-Click export to CSV, Microsoft Excel, and PDF</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Multi-Template Showcase -->
    <div id="demos"></div>
    <section id="templates" class="py-5">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="text-warning fw-bold text-uppercase small tracking-wide"><?php echo htmlspecialchars(site_setting('landing_templates_badge', 'Multi-Theme Architecture')); ?></span>
                <h2 class="display-6 fw-bold mt-2"><?php echo htmlspecialchars(site_setting('landing_templates_title', 'Two World-Class Templates Included')); ?></h2>
                <p class="text-muted"><?php echo htmlspecialchars(site_setting('landing_templates_subtitle', 'No need to purchase extra themes. Both premium templates with 6 total homepage layouts are bundled directly into the script package!')); ?></p>

            </div>

            <div class="row g-4">
                <?php if (!empty($templates)): ?>
                    <?php foreach ($templates as $tpl_idx => $tpl): 
                        $tpl_slug = preg_replace('/[^a-zA-Z0-9_]/', '', $tpl->template_key);
                        $layouts = !empty($tpl->layouts) ? $tpl->layouts : array();
                        $first_layout = !empty($layouts) ? $layouts[0] : null;
                        $first_img = $first_layout ? site_image_or_default($first_layout->preview_image) : 'uploads/no-image.jpg';
                        $first_title = $first_layout ? $first_layout->layout_name : ($tpl->name . ' - Layout 1');
                        $first_demo = $first_layout && !empty($first_layout->demo_url) ? $first_layout->demo_url : ($tpl->demo_url ?: ('website/?preview_tpl=' . $tpl->template_key . '&preview_layout=1'));
                        $col_class = count($templates) > 2 ? 'col-lg-4 col-md-6' : 'col-lg-6';
                    ?>
                        <div class="<?= $col_class ?>">
                            <div class="template-card h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="bg-dark p-3 border-bottom d-flex align-items-center justify-content-between">
                                        <span class="text-white fw-bold">
                                            <i class="<?= htmlspecialchars($tpl->icon ?: 'fa-solid fa-crown') ?> text-warning me-1"></i> <?= htmlspecialchars($tpl->name) ?>
                                        </span>
                                        <?php if (!empty($layouts) && count($layouts) > 1): ?>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <?php foreach ($layouts as $l_idx => $l): ?>
                                                    <button type="button" 
                                                            class="btn <?= $l_idx === 0 ? 'btn-dark text-white active border-secondary' : 'btn-outline-secondary text-light' ?> <?= $tpl_slug ?>-tab-btn px-2" 
                                                            id="<?= $tpl_slug ?>_tab_<?= $l->layout_number ?>" 
                                                            onclick="switchCardLayout('<?= $tpl_slug ?>', <?= $l->layout_number ?>, '<?= htmlspecialchars(site_image_or_default($l->preview_image)) ?>', '<?= htmlspecialchars(addslashes($l->layout_name)) ?>', '<?= htmlspecialchars(addslashes($l->demo_url ?: ('website/?preview_tpl=' . $tpl->template_key . '&preview_layout=' . $l->layout_number))) ?>')">
                                                        Layout <?= $l->layout_number ?>
                                                    </button>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div id="<?= $tpl_slug ?>_preview_img" class="template-preview-frame" style="background-image: url('<?= htmlspecialchars($first_img) ?>');">
                                        <div class="template-preview-overlay justify-content-end">
                                            <div class="text-white">
                                                <h5 class="mb-0 fw-bold" id="<?= $tpl_slug ?>_preview_title"><?= htmlspecialchars($first_title) ?></h5>
                                                <?php if (count($layouts) > 1): ?>
                                                    <small class="text-white-50">Click tabs above to switch layout thumbnail</small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h4 class="fw-bold mb-0 font-serif"><?= htmlspecialchars($tpl->name) ?></h4>
                                            <?php if (!empty($tpl->badge)): ?>
                                                <span class="badge bg-warning text-dark"><?= htmlspecialchars($tpl->badge) ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <p class="text-muted small mb-3"><?= htmlspecialchars($tpl->short_desc) ?></p>

                                        <a id="<?= $tpl_slug ?>_demo_btn" href="<?= htmlspecialchars($first_demo) ?>" target="_blank" class="btn btn-gold w-100 fw-bold py-2 shadow-sm d-inline-flex align-items-center justify-content-center gap-2 mb-3">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i> Launch Live Demo
                                        </a>

                                        <?php 
                                            $tpl_features = !empty($tpl->features) ? json_decode($tpl->features, true) : array();
                                            if (!empty($tpl_features)): ?>
                                                <div class="d-flex flex-wrap gap-2 mb-2">
                                                    <?php foreach ($tpl_features as $tf): ?>
                                                        <span class="badge bg-light text-dark border"><i class="fa fa-check text-success me-1"></i> <?= htmlspecialchars($tf) ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- 4-Step Quick Launch Workflow -->
    <section id="workflow" class="py-5 bg-light border-top">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="text-warning fw-bold text-uppercase small tracking-wide">FAST ONBOARDING</span>
                <h2 class="display-6 fw-bold mt-2">Launch Your Platform in 4 Simple Steps</h2>
                <p class="text-muted">No complicated DevOps or months of setup. Deploy on your domain and begin taking bookings in minutes.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">01</div>
                        <h5 class="fw-bold font-serif mb-2">One-Click Setup</h5>
                        <p class="text-muted small mb-0">Upload to your hosting (cPanel, Plesk, VPS, or localhost). The automated database installer configures tables in 60 seconds.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">02</div>
                        <h5 class="fw-bold font-serif mb-2">Choose Template</h5>
                        <p class="text-muted small mb-0">Select Template 1 (Luxury Salon) or Template 2 (Sanctuary Spa). Upload your logo and set your brand color palette.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">03</div>
                        <h5 class="fw-bold font-serif mb-2">Add Staff &amp; Services</h5>
                        <p class="text-muted small mb-0">Set up your stylists, massage therapists, service prices, treatment durations, and commission percentages.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">04</div>
                        <h5 class="fw-bold font-serif mb-2">Start Booking &amp; Billing</h5>
                        <p class="text-muted small mb-0">Share your 24/7 online booking link with clients, check in walk-in appointments, and print instant thermal POS receipts.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Self-Hosted vs Cloud SaaS Comparison -->
    <section id="comparison" class="py-5">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="text-warning fw-bold text-uppercase small tracking-wide">WHY SELF-HOSTED WINS</span>
                <h2 class="display-6 fw-bold mt-2">Own Your Platform, Ditch the Monthly Subscription</h2>
                <p class="text-muted">Compare how our self-hosted script stacks up against expensive cloud SaaS subscriptions like Mindbody, Fresha, or Zenoti.</p>
            </div>

            <div class="compare-box table-responsive">
                <table class="table compare-table mb-0">
                    <thead>
                        <tr>
                            <th style="width: 40%;">Core Capability / Benefit</th>
                            <th style="width: 30%;" class="text-warning"><i class="fa-solid fa-crown me-1"></i> Our Self-Hosted Script</th>
                            <th style="width: 30%;" class="text-muted">Traditional Cloud SaaS (Fresha/Mindbody)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Pricing Model</strong></td>
                            <td><span class="badge bg-success-subtle text-success border border-success px-3 py-1 rounded-pill"><i class="fa-solid fa-check me-1"></i> One-Time Fee (Lifetime Access)</span></td>
                            <td><span class="text-danger fw-semibold"><i class="fa-solid fa-xmark me-1"></i> $150 – $400+ every single month</span></td>
                        </tr>
                        <tr>
                            <td><strong>Client Data Ownership</strong></td>
                            <td><span class="badge bg-success-subtle text-success border border-success px-3 py-1 rounded-pill"><i class="fa-solid fa-check me-1"></i> 100% Private on Your Own Server</span></td>
                            <td><span class="text-danger fw-semibold"><i class="fa-solid fa-xmark me-1"></i> Locked on third-party cloud servers</span></td>
                        </tr>
                        <tr>
                            <td><strong>Online Booking Surcharges</strong></td>
                            <td><span class="badge bg-success-subtle text-success border border-success px-3 py-1 rounded-pill"><i class="fa-solid fa-check me-1"></i> 0% Commission (Keep 100% Revenue)</span></td>
                            <td><span class="text-danger fw-semibold"><i class="fa-solid fa-xmark me-1"></i> Up to 20% commission on client bookings</span></td>
                        </tr>
                        <tr>
                            <td><strong>Full Source Code Access</strong></td>
                            <td><span class="badge bg-success-subtle text-success border border-success px-3 py-1 rounded-pill"><i class="fa-solid fa-check me-1"></i> 100% Unencrypted PHP &amp; MVC</span></td>
                            <td><span class="text-danger fw-semibold"><i class="fa-solid fa-xmark me-1"></i> No code access (Closed proprietary)</span></td>
                        </tr>
                        <tr>
                            <td><strong>White-Label &amp; Custom Domain</strong></td>
                            <td><span class="badge bg-success-subtle text-success border border-success px-3 py-1 rounded-pill"><i class="fa-solid fa-check me-1"></i> Your Domain, Your Logo, Your Brand</span></td>
                            <td><span class="text-danger fw-semibold"><i class="fa-solid fa-xmark me-1"></i> Co-branded with SaaS marketplace logos</span></td>
                        </tr>
                        <tr>
                            <td><strong>Hardware &amp; POS Receipts</strong></td>
                            <td><span class="badge bg-success-subtle text-success border border-success px-3 py-1 rounded-pill"><i class="fa-solid fa-check me-1"></i> Universal 80mm/58mm Thermal Printers</span></td>
                            <td><span class="text-danger fw-semibold"><i class="fa-solid fa-xmark me-1"></i> Expensive proprietary hardware required</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Super Admin & Dynamic Pricing Cards Section -->
    <div id="editions"></div>
    <section id="pricing" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge bg-dark text-warning px-3 py-2 text-uppercase fw-bold mb-2">
                    <i class="fa fa-cloud me-1"></i> Multi-Tenant SaaS Subscriptions
                </span>
                <h2 class="display-6 fw-bold mt-2">Cloud SaaS Subscription Plans</h2>
                <p class="text-muted">Select an edition for your salon, spa, or enterprise chain. Each plan features automatic tenant folder provisioning (e.g. <code>www.example.com</code>), separate database, custom branding, and responsive online booking website.</p>
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
                            <span class="badge bg-light text-muted border">SaaS Cloud • Automated Provisioning</span>
                        </div>
                        <div class="pricing-body">
                            <ul class="feature-list">
                                <?php foreach ($salon_features as $f): ?>
                                    <li><i class="fa fa-check-circle"></i> <span><?php echo htmlspecialchars($f); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn btn-outline-gold w-100 fw-bold buy-now-btn" 
                                    data-plan="SALON" 
                                    data-name="Salon Edition (SaaS)" 
                                    data-price="<?php echo number_format($salon_price, 2); ?>"
                                    data-price-display="<?php echo htmlspecialchars(format_site_price($salon_price)); ?>">
                                <i class="fa fa-rocket me-2"></i> Choose Salon Edition
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
                            <span class="badge bg-light text-muted border">SaaS Cloud • Automated Provisioning</span>
                        </div>
                        <div class="pricing-body">
                            <ul class="feature-list">
                                <?php foreach ($spa_features as $f): ?>
                                    <li><i class="fa fa-check-circle text-success"></i> <span><?php echo htmlspecialchars($f); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn btn-outline-gold w-100 fw-bold buy-now-btn" 
                                    data-plan="SPA" 
                                    data-name="Spa Wellness Edition (SaaS)" 
                                    data-price="<?php echo number_format($spa_price, 2); ?>"
                                    data-price-display="<?php echo htmlspecialchars(format_site_price($spa_price)); ?>">
                                <i class="fa fa-rocket me-2"></i> Choose Spa Edition
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
                            <span class="badge bg-warning-subtle text-dark border border-warning fw-bold">Best Value • Complete Cloud SaaS</span>
                        </div>
                        <div class="pricing-body">
                            <ul class="feature-list">
                                <?php foreach ($unified_features as $f): ?>
                                    <li><i class="fa fa-check-circle text-warning"></i> <strong><?php echo htmlspecialchars($f); ?></strong></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn btn-gold w-100 fw-bold buy-now-btn" 
                                    data-plan="SALON_SPA" 
                                    data-name="Salon &amp; Spa Complete (SaaS)" 
                                    data-price="<?php echo number_format($unified_price, 2); ?>"
                                    data-price-display="<?php echo htmlspecialchars(format_site_price($unified_price)); ?>">
                                <i class="fa fa-gem me-2"></i> Deploy Complete Edition (<?php echo htmlspecialchars(format_site_price($unified_price)); ?>)
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

    <!-- Testimonials / Client Stories -->
    <section id="reviews" class="py-5 bg-light border-top">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="text-warning fw-bold text-uppercase small tracking-wide">VERIFIED OPERATOR REVIEWS</span>
                <h2 class="display-6 fw-bold mt-2">Loved by Hair Studios &amp; Luxury Wellness Spas</h2>
                <p class="text-muted">See how salon owners and spa directors streamlined operations and boosted repeat bookings.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="testimonial-quote">
                            "Our 8 hair stylists love the commission ledger. Front-desk checkout time dropped by over 50% with the thermal POS register. The best investment we made this year."
                        </p>
                        <div class="d-flex align-items-center mt-auto">
                            <div class="testimonial-author-avatar">MV</div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Marcus Vance</h6>
                                <small class="text-muted">Director, Elite Hair Atelier</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="testimonial-quote">
                            "The double-booking room prevention engine in Template 2 is a lifesaver for our 6 therapy suites. It paid for itself in the first week by saving us from booking clashes."
                        </p>
                        <div class="d-flex align-items-center mt-auto">
                            <div class="testimonial-author-avatar" style="color: #10b981;">ER</div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Elena Rostova</h6>
                                <small class="text-muted">Managing Partner, Serenity Day Spa</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="testimonial-quote">
                            "We dropped Mindbody and saved over $3,200 annually. Having our customer data and client histories safe on our own private cPanel server is priceless."
                        </p>
                        <div class="d-flex align-items-center mt-auto">
                            <div class="testimonial-author-avatar" style="color: #6366f1;">DC</div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">David Chen</h6>
                                <small class="text-muted">Founder, Apex Barber &amp; Grooming Lounge</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Frequently Asked Questions -->
    <section id="faq" class="py-5">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="text-warning fw-bold text-uppercase small tracking-wide">COMMON QUESTIONS</span>
                <h2 class="display-6 fw-bold mt-2">Frequently Asked Questions</h2>
                <p class="text-muted">Have questions before purchasing? Here are straightforward answers about licenses, installation, and capabilities.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="accordion faq-accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                                    <i class="fa-solid fa-circle-question text-warning me-2"></i> Is this a one-time purchase or a monthly subscription?
                                </button>
                            </h2>
                            <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    This is a <strong>100% one-time payment</strong> for a lifetime commercial license. You never pay monthly subscription fees, per-booking commissions, or per-staff member charges. Once purchased, you own and host the script forever.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                                    <i class="fa-solid fa-server text-warning me-2"></i> What hosting or server specifications are required?
                                </button>
                            </h2>
                            <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The script runs on standard, budget-friendly hosting with PHP 7.4 through PHP 8.2+ and MySQL or MariaDB. It is fully compatible with shared cPanel hosting, Plesk, VPS, dedicated servers, or local stacks like XAMPP, WAMP, and Laragon.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                                    <i class="fa-solid fa-code text-warning me-2"></i> Do I receive the full unencrypted PHP source code?
                                </button>
                            </h2>
                            <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, 100% of the source code is completely unencrypted and clean (CodeIgniter MVC framework). There are no IonCube loaders or obfuscated files. You can freely customize the design, database models, business logic, or integrate third-party APIs.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                                    <i class="fa-solid fa-print text-warning me-2"></i> Does the POS support thermal printers and barcode scanners?
                                </button>
                            </h2>
                            <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes. The Point of Sale (POS) checkout module supports universal 80mm and 58mm thermal receipt printers via USB or network, automatic cash drawer kicking, and standard USB/Bluetooth handheld barcode scanners for retail inventory.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5">
                                    <i class="fa-solid fa-palette text-warning me-2"></i> Can I switch between Template 1 and Template 2 anytime?
                                </button>
                            </h2>
                            <div id="faqCollapse5" class="accordion-collapse collapse" aria-labelledby="faqHeading5" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! Both Template 1 (Luxury Salon &amp; Hair Studio) and Template 2 (Sanctuary Day Spa &amp; Wellness) with all 6 homepage layout variations are included in the package. You can switch your active website theme with 1 click in the Admin Panel.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse6" aria-expanded="false" aria-controls="faqCollapse6">
                                    <i class="fa-solid fa-shield-halved text-warning me-2"></i> What is the Super Admin Portal used for?
                                </button>
                            </h2>
                            <div id="faqCollapse6" class="accordion-collapse collapse" aria-labelledby="faqHeading6" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The Super Admin Portal gives you master vendor control: you can customize purchase card prices and badges, review orders, generate commercial license keys, control download quotas, and manage client instances.
                                </div>
                            </div>
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
                    <h6 class="footer-heading">Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="#features"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Core Features</a></li>
                        <li><a href="#templates"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Templates</a></li>
                        <li><a href="#workflow"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>How It Works</a></li>
                        <li><a href="#pricing"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Pricing Plans</a></li>
                        <li><a href="#faq"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h6 class="footer-heading">Templates</h6>
                    <ul class="footer-links">
                        <li><a href="website/?preview_tpl=template1&preview_layout=1" target="_blank"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Template 1</a></li>
                        <li><a href="website/?preview_tpl=template2&preview_layout=1" target="_blank"><i class="fa-solid fa-angle-right me-2 text-warning opacity-75 small"></i>Template 2</a></li>
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
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title font-serif text-white mb-0" id="modalTitle">
                            <i class="fa fa-gem text-warning me-2"></i> SaaS Subscription &amp; Project Setup Wizard
                        </h5>
                        <small class="text-muted" id="modalSubtitle">Step 1 of 4: Customer Registration &amp; Plan Confirmation</small>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body with Multi-Step Flow -->
                <div class="modal-body">
                    
                    <!-- Progress Bar -->
                    <div class="progress mb-4" style="height: 6px;">
                        <div id="checkoutProgressBar" class="progress-bar bg-warning" role="progressbar" style="width: 25%;"></div>
                    </div>

                    <!-- Step 1: Customer Registration & Salon Details -->
                    <div id="step1">
                        <div class="d-flex align-items-center justify-content-between p-3 rounded-3 mb-4" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                            <div>
                                <span class="small text-muted text-uppercase fw-bold">Selected Edition:</span>
                                <h6 class="fw-bold text-dark mb-0 font-serif" id="summaryPlanName">Salon &amp; Spa Complete (SaaS)</h6>
                            </div>
                            <div class="text-end">
                                <span class="small text-muted text-uppercase fw-bold">Subscription Rate:</span>
                                <h5 class="fw-bold text-warning mb-0" id="summaryPlanPrice"><?php echo htmlspecialchars(format_site_price($unified_price)); ?></h5>
                            </div>
                        </div>

                        <form id="customerForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="custName" required placeholder="e.g. Sarah Jenkins" value="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="custEmail" required placeholder="e.g. sarah@myelegancesalon.com" value="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Admin Account Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="custPassword" required placeholder="Choose a password" value="">
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('custPassword', this)">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                    <small class="text-muted" style="font-size: 11px;">You will use this to log in to your dedicated salon admin panel.</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Phone Number</label>
                                    <input type="text" class="form-control" id="custPhone" placeholder="e.g. +1 (555) 234-5678" value="">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label small fw-bold">Salon / Spa Business Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="custBusiness" required placeholder="e.g. Belleza Luxury Salon &amp; Spa" value="">
                                </div>
                            </div>
                        </form>

                        <div class="text-end mt-4">
                            <button type="button" class="btn btn-gold px-4 fw-bold" id="btnGoToStep2">
                                Next: Choose Template &amp; Layout <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Choose Template & Homepage Layout -->
                    <div id="step2" style="display: none;">
                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                            <div>
                                <h6 class="fw-bold mb-0 font-serif fs-5">
                                    <i class="fa fa-palette text-warning me-2"></i> 1. Choose Your Website Theme Template:
                                </h6>
                                <small class="text-muted">Select the core design aesthetic for your salon or spa brand. Each theme includes tailored styling, menus, and layouts.</small>
                            </div>
                            <span class="badge bg-warning bg-opacity-10 text-dark border border-warning border-opacity-25 px-3 py-1 font-monospace small">
                                <i class="fa fa-sparkles text-warning me-1"></i> Multi-Theme Architecture
                            </span>
                        </div>
                        
                        <div class="row g-3 mb-4" id="modalTemplateCardsContainer">
                            <?php if (!empty($templates)): ?>
                                <?php foreach ($templates as $t_idx => $t): 
                                    $t_layouts_count = !empty($t->layouts) ? count($t->layouts) : 0;
                                    $t_features = !empty($t->features) ? (is_array($t->features) ? $t->features : json_decode($t->features, true)) : array();
                                ?>
                                    <div class="<?= count($templates) > 2 ? 'col-lg-4 col-md-6' : 'col-md-6' ?>">
                                        <div class="tpl-radio-card <?= $t_idx === 0 ? 'active' : '' ?>" data-tpl="<?= htmlspecialchars($t->template_key) ?>">
                                            <div class="d-flex align-items-start justify-content-between mb-2">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="tpl-icon-pill">
                                                        <i class="<?= htmlspecialchars($t->icon ?: 'fa-solid fa-crown') ?>"></i>
                                                    </span>
                                                    <div>
                                                        <h6 class="fw-bold text-dark font-serif mb-0 fs-6"><?= htmlspecialchars($t->name) ?></h6>
                                                        <span class="badge bg-light text-dark border mt-1" style="font-size: 11px;">
                                                            <i class="fa fa-layer-group text-warning me-1"></i><?= $t_layouts_count ?> Homepage Layouts Included
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="tpl-check-indicator" title="Selected Indicator">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <input type="radio" name="chosen_tpl" value="<?= htmlspecialchars($t->template_key) ?>" <?= $t_idx === 0 ? 'checked' : '' ?> class="d-none">
                                            </div>
                                            <p class="small text-muted mb-2 lh-sm"><?= htmlspecialchars($t->short_desc) ?></p>
                                            <?php if (!empty($t_features)): ?>
                                                <div class="d-flex flex-wrap gap-1 mt-2">
                                                    <?php foreach (array_slice($t_features, 0, 3) as $feat): ?>
                                                        <span class="badge bg-light text-secondary border fw-normal" style="font-size: 11px;"><i class="fa fa-check text-success me-1"></i><?= htmlspecialchars($feat) ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                            <div>
                                <h6 class="fw-bold mb-0 font-serif fs-5">
                                    <i class="fa fa-th-large text-warning me-2"></i> 2. Choose Default Homepage Layout:
                                </h6>
                                <small class="text-muted">Click any layout card to select it, or click <strong>Zoom Preview</strong> to view the full layout design.</small>
                            </div>
                            <div id="modalLayoutCountBadge" class="badge bg-dark text-white px-3 py-2 rounded-pill font-monospace small">
                                <i class="fa fa-palette text-warning me-1"></i> 3 Layouts Available
                            </div>
                        </div>

                        <div class="row g-3 mb-4" id="modalLayoutsContainer">
                            <!-- Populated dynamically via JS for active template -->
                        </div>


                        <div class="d-flex justify-content-between pt-2">
                            <button type="button" class="btn btn-outline-secondary px-4 fw-semibold" id="btnBackToStep1">
                                <i class="fa fa-arrow-left me-1"></i> Back to Customer Info
                            </button>
                            <button type="button" class="btn btn-gold px-4 fw-bold shadow-sm" id="btnGoToStep3">
                                Next: Payment Gateway <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Checkout & Payment Submission -->
                    <div id="step3" style="display: none;">
                        <div class="card p-3 mb-4 border-0" style="background: #f8fafc;">
                            <h6 class="fw-bold mb-3 font-serif">Subscription Summary</h6>
                            <div class="d-flex justify-content-between py-1 border-bottom small">
                                <span class="text-muted">Software Edition:</span>
                                <strong id="checkoutPlanText">Salon &amp; Spa Complete (SaaS)</strong>
                            </div>
                            <div class="d-flex justify-content-between py-1 border-bottom small">
                                <span class="text-muted">Business Name:</span>
                                <strong id="checkoutBusinessText">Belleza Luxury Salon</strong>
                            </div>
                            <div class="d-flex justify-content-between py-1 border-bottom small">
                                <span class="text-muted">Pre-Configured Template:</span>
                                <strong id="checkoutTplText">Template 1 - Layout 1</strong>
                            </div>
                            <div class="d-flex justify-content-between py-2 small">
                                <span class="fw-bold">Total Subscription Rate:</span>
                                <strong class="fs-5 text-warning" id="checkoutAmountText">$89.00</strong>
                            </div>
                        </div>

                        <!-- Active Payment Gateway Official Card -->
                        <?php if ($active_payment_gateway === 'stripe'): ?>
                            <div class="p-3 rounded border mb-4 bg-white shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-brands fa-stripe fa-2x text-primary me-2"></i>
                                        <div>
                                            <span class="fw-bold text-dark d-block">Stripe Official Hosted Checkout</span>
                                            <small class="text-muted">Direct dispatch to checkout.stripe.com</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-success small"><i class="fa-solid fa-lock me-1"></i> Active Gateway</span>
                                </div>
                                <p class="small text-muted mb-3">You will be securely redirected to <strong>Stripe's Official Hosted Payment Page</strong> to complete your order. All credit/debit card numbers are entered strictly on Stripe's PCI-DSS Level 1 certified servers. We never handle or store your sensitive card details.</p>
                                <div class="d-flex flex-wrap gap-2 align-items-center pt-2 border-top">
                                    <span class="small text-muted me-2"><i class="fa-solid fa-shield-halved text-success me-1"></i> Supported via Stripe:</span>
                                    <span class="badge bg-light text-dark border"><i class="fa-brands fa-cc-visa text-primary me-1"></i> Visa</span>
                                    <span class="badge bg-light text-dark border"><i class="fa-brands fa-cc-mastercard text-danger me-1"></i> Mastercard</span>
                                    <span class="badge bg-light text-dark border"><i class="fa-brands fa-cc-amex text-info me-1"></i> Amex</span>
                                    <span class="badge bg-light text-dark border"><i class="fa-brands fa-apple text-dark me-1"></i> Apple Pay</span>
                                    <span class="badge bg-light text-dark border"><i class="fa-brands fa-google text-success me-1"></i> Google Pay</span>
                                </div>
                            </div>
                        <?php elseif ($active_payment_gateway === 'razorpay'): ?>
                            <div class="p-3 rounded border mb-4 bg-white shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-bolt fa-lg text-primary me-2"></i>
                                        <div>
                                            <span class="fw-bold text-dark d-block">Razorpay Official Standard Checkout</span>
                                            <small class="text-muted">Powered by checkout.razorpay.com</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-success small"><i class="fa-solid fa-lock me-1"></i> Active Gateway</span>
                                </div>
                                <p class="small text-muted mb-3">Clicking below will open the <strong>Official Razorpay Checkout Dialog</strong> to finalize payment with instant verification.</p>
                                <div class="d-flex flex-wrap gap-2 align-items-center pt-2 border-top">
                                    <span class="small text-muted me-2"><i class="fa-solid fa-shield-halved text-success me-1"></i> Supported:</span>
                                    <span class="badge bg-light text-dark border"><i class="fa-solid fa-mobile-screen-button text-success me-1"></i> Instant UPI (GPay / PhonePe / Paytm)</span>
                                    <span class="badge bg-light text-dark border"><i class="fa-regular fa-credit-card text-primary me-1"></i> All Debit &amp; Credit Cards</span>
                                    <span class="badge bg-light text-dark border"><i class="fa-solid fa-building-columns text-info me-1"></i> NetBanking (50+ Banks)</span>
                                    <span class="badge bg-light text-dark border"><i class="fa-solid fa-wallet text-warning me-1"></i> Digital Wallets</span>
                                </div>
                            </div>
                        <?php elseif ($active_payment_gateway === 'payu'): ?>
                            <div class="p-3 rounded border mb-4 bg-white shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-money-bill-wave fa-lg text-success me-2"></i>
                                        <div>
                                            <span class="fw-bold text-dark d-block">PayU Official Hosted Portal</span>
                                            <small class="text-muted">Direct dispatch to secure.payu.in</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-success small"><i class="fa-solid fa-lock me-1"></i> Active Gateway</span>
                                </div>
                                <p class="small text-muted mb-3">You will be securely redirected to the <strong>Official PayU Merchant Payment Gateway</strong> to complete your checkout with 256-bit SSL encryption.</p>
                                <div class="d-flex flex-wrap gap-2 align-items-center pt-2 border-top">
                                    <span class="small text-muted me-2"><i class="fa-solid fa-shield-halved text-success me-1"></i> Supported:</span>
                                    <span class="badge bg-light text-dark border">Credit / Debit Cards</span>
                                    <span class="badge bg-light text-dark border">NetBanking</span>
                                    <span class="badge bg-light text-dark border">UPI &amp; QR</span>
                                    <span class="badge bg-light text-dark border">Wallets</span>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="p-3 rounded border mb-4 bg-white shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-laptop-code text-warning fa-lg me-2"></i>
                                        <div>
                                            <span class="fw-bold text-dark d-block">Simulated Instant Payment (Sandbox / Demo)</span>
                                            <small class="text-muted">Testing environment</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-warning text-dark small"><i class="fa-solid fa-flask me-1"></i> Sandbox Active</span>
                                </div>
                                <p class="small text-muted mb-0">Submitting will simulate instant successful payment and immediately advance to the Project Setup Wizard.</p>
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
                                    <i class="fa-brands fa-stripe fa-lg me-1"></i> Proceed to Stripe Official Checkout <i class="fa fa-arrow-right ms-1"></i>
                                <?php elseif ($active_payment_gateway === 'razorpay'): ?>
                                    <i class="fa-solid fa-bolt me-1"></i> Pay with Razorpay Official Checkout <i class="fa fa-arrow-right ms-1"></i>
                                <?php elseif ($active_payment_gateway === 'payu'): ?>
                                    <i class="fa-solid fa-money-bill-wave me-1"></i> Proceed to PayU Official Portal <i class="fa fa-arrow-right ms-1"></i>
                                <?php else: ?>
                                    <i class="fa fa-lock me-1"></i> Complete Order &amp; Launch Setup Wizard <i class="fa fa-arrow-right ms-1"></i>
                                <?php endif; ?>
                            </button>
                        </div>
                    </div>

                    <!-- Step 4: Project Setup Wizard (Company Info, Logo, Favicon, Domain) -->
                    <div id="step4" style="display: none;">
                        <div class="alert alert-success d-flex align-items-center mb-4 py-2 px-3 rounded-3">
                            <i class="fa fa-check-circle fa-2x me-3 text-success"></i>
                            <div>
                                <strong class="d-block">Payment Confirmed!</strong>
                                <small>Order reference: <span id="wizOrderRef" class="fw-bold">ORD-2026-0000</span>. Please complete your Project Setup Wizard below.</small>
                            </div>
                        </div>

                        <form id="modalSetupForm" enctype="multipart/form-data">
                            <input type="hidden" id="wizOrderNum" name="order_number" value="">
                            <input type="hidden" id="wizOrderToken" name="token" value="">
                            <input type="hidden" id="wizPlanCode" name="plan_code" value="SALON_SPA">
                            <input type="hidden" id="wizTemplate" name="chosen_template" value="template1">
                            <input type="hidden" id="wizLayout" name="chosen_layout" value="1">
                            <input type="hidden" id="wizAdminEmail" name="admin_email" value="">
                            <input type="hidden" id="wizAdminPass" name="admin_password" value="">
                            <input type="hidden" id="wizAdminName" name="admin_name" value="">

                            <!-- Company Information -->
                            <h6 class="fw-bold text-dark font-serif mb-3">
                                <i class="fa fa-building text-warning me-2"></i> 1. Company Information
                            </h6>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Company / Salon Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="company_name" id="wizCompanyName" required placeholder="e.g. Elegance Hair &amp; Spa Lounge">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Company Tagline</label>
                                    <input type="text" class="form-control" name="tagline" id="wizTagline" placeholder="e.g. Luxury Hair Styling &amp; Rejuvenating Spa Treatments" value="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Official Company Email</label>
                                    <input type="email" class="form-control" name="company_email" id="wizCompanyEmail" placeholder="contact@yoursalon.com" required value="">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Official Phone Number</label>
                                    <input type="text" class="form-control" name="company_phone" id="wizCompanyPhone" placeholder="+1 (555) 234-5678" value="">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label small fw-bold">Salon Physical Address</label>
                                    <input type="text" class="form-control" name="company_address" id="wizAddress" placeholder="Street Address, City, State, ZIP" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold">Currency Symbol</label>
                                    <select class="form-select" name="currency_symbol" id="wizCurrency">
                                        <option value="$">$ (USD / CAD / AUD)</option>
                                        <option value="€">€ (EUR)</option>
                                        <option value="£">£ (GBP)</option>
                                        <option value="₹">₹ (INR)</option>
                                        <option value="AED ">AED (UAE Dirham)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Branding Assets (Logo & Favicon) -->
                            <h6 class="fw-bold text-dark font-serif mb-3">
                                <i class="fa fa-palette text-warning me-2"></i> 2. Company Logo &amp; Favicon
                            </h6>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Company Logo <small class="text-muted">(PNG, JPG, SVG, WebP)</small></label>
                                    <input type="file" class="form-control form-control-sm" name="company_logo" id="wizLogoInput" accept="image/*" onchange="previewModalUpload(this, 'wizLogoPreview')">
                                    <div class="mt-2 text-center p-2 border rounded bg-light" id="wizLogoPreviewBox" style="display: none;">
                                        <img id="wizLogoPreview" src="" alt="Logo" style="max-height: 48px; max-width: 100%;">
                                    </div>
                                    <small class="text-muted" style="font-size: 11px;">Default luxury logo is used if skipped.</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Browser Favicon <small class="text-muted">(ICO, PNG, WebP)</small></label>
                                    <input type="file" class="form-control form-control-sm" name="favicon" id="wizFavInput" accept=".ico,image/png,image/x-icon" onchange="previewModalUpload(this, 'wizFavPreview')">
                                    <div class="mt-2 text-center p-2 border rounded bg-light" id="wizFavPreviewBox" style="display: none;">
                                        <img id="wizFavPreview" src="" alt="Favicon" style="max-height: 32px; max-width: 32px;">
                                    </div>
                                    <small class="text-muted" style="font-size: 11px;">Default luxury favicon is used if skipped.</small>
                                </div>
                            </div>

                            <!-- Domain & Folder Name -->
                            <h6 class="fw-bold text-dark font-serif mb-2">
                                <i class="fa fa-globe text-warning me-2"></i> 3. Domain &amp; Directory Setup
                            </h6>
                            <div class="p-3 rounded border mb-4 bg-light">
                                <label class="form-label small fw-bold">Your Custom Domain / Subdomain / Folder Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">https://</span>
                                    <input type="text" class="form-control font-monospace fw-bold" name="domain" id="wizDomain" value="" required placeholder="e.g. www.example.com" onkeyup="updateFolderNotice(this.value)">
                                </div>
                                <div class="alert alert-primary py-2 px-3 small border-0 mt-3 mb-0">
                                    <i class="fa fa-folder-plus text-primary me-1"></i> When you click Deploy, a dedicated server folder named <code id="wizFolderNotice">your-domain.com</code> will be created, and all client website and admin files will be copied there with an isolated tenant database.
                                </div>
                            </div>

                            <div id="wizAlert" class="alert alert-danger d-none small"></div>

                            <button type="button" class="btn btn-gold btn-lg fw-bold w-100 py-3 shadow" id="btnRunDeploy">
                                <i class="fa fa-rocket me-2"></i> Deploy My Salon SaaS Instance Now
                            </button>
                            <a id="linkFullscreenWizard" href="setup_wizard.php" target="_blank" class="btn btn-sm btn-link text-muted mt-2 d-block text-center text-decoration-none">
                                <i class="fa fa-expand me-1"></i> Or continue in Fullscreen Setup Wizard
                            </a>
                        </form>
                    </div>

                    <!-- Step 5: Provisioning Progress & Completion Hub -->
                    <div id="step5" style="display: none;">
                        
                        <!-- Deployment In Progress Animation -->
                        <div id="modalDeployProgress">
                            <div class="text-center py-4">
                                <div class="spinner-border text-warning mb-3" style="width: 3rem; height: 3rem;" role="status"></div>
                                <h5 class="fw-bold font-serif mb-1">Provisioning Your SaaS Instance...</h5>
                                <p class="text-muted small mb-4">Creating server folder, copying website &amp; admin files, and configuring isolated database.</p>
                            </div>
                            <div class="p-3 rounded bg-light border mb-3 small">
                                <div class="mb-2" id="mWizStep1"><i class="fa fa-spinner fa-spin text-warning me-2"></i> Creating folder <strong id="mLogFolder">www.example.com</strong>...</div>
                                <div class="mb-2 text-muted" id="mWizStep2"><i class="fa fa-circle-notch me-2"></i> Copying frontend website files...</div>
                                <div class="mb-2 text-muted" id="mWizStep3"><i class="fa fa-circle-notch me-2"></i> Deploying dedicated salon admin panel...</div>
                                <div class="mb-2 text-muted" id="mWizStep4"><i class="fa fa-circle-notch me-2"></i> Applying company logo &amp; favicon...</div>
                                <div class="mb-2 text-muted" id="mWizStep5"><i class="fa fa-circle-notch me-2"></i> Provisioning tenant database &amp; admin user...</div>
                            </div>
                        </div>

                        <!-- Deployment Success Box -->
                        <div id="modalDeploySuccess" style="display: none;">
                            <div class="order-success-box mb-4">
                                <div class="d-inline-flex p-3 rounded-circle bg-white shadow-sm mb-3">
                                    <i class="fa fa-check-circle fa-3x text-success"></i>
                                </div>
                                <h4 class="fw-bold text-success font-serif mb-1">Congratulations! Instance Is Live!</h4>
                                <p class="text-muted small mb-3">Your dedicated salon folder has been created, files copied, and database provisioned successfully.</p>
                                
                                <div class="p-3 bg-light rounded text-start small font-monospace mb-3 border">
                                    <div class="row g-2">
                                        <div class="col-sm-6"><strong>Domain:</strong> <span id="mResDomain" class="text-primary">www.example.com</span></div>
                                        <div class="col-sm-6"><strong>Server Folder:</strong> <span id="mResFolder" class="text-dark">www.example.com</span></div>
                                        <div class="col-sm-6"><strong>Admin Email:</strong> <span id="mResAdminEmail" class="text-dark">admin@example.com</span></div>
                                        <div class="col-sm-6"><strong>Password:</strong> <span id="mResAdminPass" class="text-warning fw-bold">Salon@2026!</span></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <a id="btnModalVisitSite" href="#" target="_blank" class="btn btn-outline-primary w-100 py-3 fw-bold shadow-sm">
                                        <i class="fa fa-globe fa-lg me-2"></i> Visit Client Website
                                    </a>
                                    <small class="text-muted d-block text-center mt-1 font-monospace" id="mResSiteUrl">/www.example.com/</small>
                                </div>
                                <div class="col-md-6">
                                    <a id="btnModalVisitAdmin" href="#" target="_blank" class="btn btn-gold w-100 py-3 fw-bold shadow-sm">
                                        <i class="fa fa-rocket fa-lg me-2"></i> Open Salon Admin Panel
                                    </a>
                                    <small class="text-muted d-block text-center mt-1 font-monospace" id="mResAdminUrl">/www.example.com/admin/</small>
                                </div>
                            </div>

                            <div class="border-top pt-3 text-center">
                                <a href="superadmin/?page=tenants" target="_blank" class="btn btn-sm btn-outline-dark me-2">
                                    <i class="fa fa-shield-alt text-warning me-1"></i> View in Super Admin Hub
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
    </div>

    <!-- Layout Fullscreen Quick-Preview Modal -->
    <div class="modal fade" id="layoutPreviewModal" tabindex="-1" aria-hidden="true" style="z-index: 1070;">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-dark text-white py-3 px-4 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge bg-warning text-dark px-3 py-2 font-monospace fw-bold" id="previewModalBadge">Layout 1</span>
                        <div>
                            <h5 class="modal-title font-serif text-white mb-0" id="previewModalTitle">Layout Preview</h5>
                            <small class="text-white-50" id="previewModalSubtitle">High-Resolution Website Homepage Preview</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 bg-light text-center position-relative" style="min-height: 400px; max-height: 75vh; overflow-y: auto;">
                    <div class="p-3">
                        <img id="previewModalImg" src="" alt="Layout Preview" class="img-fluid rounded shadow-sm border" style="width: 100%; max-width: 1200px; margin: 0 auto; display: block;" onerror="this.src='uploads/no-image.jpg'">
                    </div>
                </div>
                <div class="modal-footer bg-white px-4 py-3 d-flex align-items-center justify-content-between">
                    <div class="text-muted small">
                        <i class="fa fa-info-circle text-primary me-1"></i> You can change or customize your template &amp; layout anytime from your Salon Admin Panel.
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary px-3" data-bs-dismiss="modal">Close Preview</button>
                        <button type="button" class="btn btn-gold px-4 fw-bold shadow-sm" id="btnSelectFromPreview">
                            <i class="fa fa-check me-1"></i> Select This Layout &amp; Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="website/assets/template1/js/bootstrap.bundle.min.js"></script>
    <!-- Official Razorpay Standard Checkout SDK -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        // State variables
        let selectedPlan = 'SALON_SPA';
        let selectedPlanName = 'Salon & Spa Complete (SaaS)';
        let selectedPrice = '89.00';
        let selectedPriceDisplay = '<?php echo htmlspecialchars(format_site_price($unified_price)); ?>';
        let selectedTemplate = 'template1';
        let selectedLayout = '1';
        let activeOrderNumber = '';
        let activeOrderToken = '';

        // Modal elements
        const checkoutModal = new bootstrap.Modal(document.getElementById('checkoutModal'));

        // Initialize all Bootstrap dropdowns
        document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function(el) {
            new bootstrap.Dropdown(el);
        });

        // Initialize Hero Banner Carousel
        const heroCarousel = document.getElementById('heroBannerCarousel');
        if (heroCarousel) {
            new bootstrap.Carousel(heroCarousel, {
                interval: 5000,
                ride: 'carousel'
            });
        }

        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const step3 = document.getElementById('step3');
        const step4 = document.getElementById('step4');
        const step5 = document.getElementById('step5');
        const modalSubtitle = document.getElementById('modalSubtitle');
        const checkoutProgressBar = document.getElementById('checkoutProgressBar');

        // Buy button click handlers
        document.querySelectorAll('.buy-now-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                selectedPlan = this.getAttribute('data-plan') || 'SALON_SPA';
                selectedPlanName = this.getAttribute('data-name') || 'Salon & Spa Complete (SaaS)';
                selectedPrice = this.getAttribute('data-price') || '89.00';
                selectedPriceDisplay = this.getAttribute('data-price-display') || ('$' + selectedPrice);

                document.getElementById('summaryPlanName').textContent = selectedPlanName;
                document.getElementById('summaryPlanPrice').textContent = selectedPriceDisplay;
                
                // Reset flow to step 1
                goToStep(1);
                checkoutModal.show();
            });
        });

        // All Dynamic Templates & Layouts Data
        const allTemplatesData = <?= json_encode($templates) ?>;

        function escapeHtml(str) {
            if (!str) return '';
            return String(str)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        let layoutPreviewModalInstance = null;
        let currentPreviewLayoutNumber = '1';

        function openLayoutPreviewModal(tplName, layoutName, imgSrc, layoutNum) {
            currentPreviewLayoutNumber = String(layoutNum);
            const badgeEl = document.getElementById('previewModalBadge');
            const titleEl = document.getElementById('previewModalTitle');
            const subEl = document.getElementById('previewModalSubtitle');
            const imgEl = document.getElementById('previewModalImg');

            if (badgeEl) badgeEl.textContent = 'Layout ' + layoutNum;
            if (titleEl) titleEl.textContent = layoutName;
            if (subEl) subEl.textContent = tplName + ' • Zoom Layout Preview';
            if (imgEl) {
                imgEl.src = imgSrc || 'uploads/no-image.jpg';
                imgEl.alt = layoutName;
            }

            const modalEl = document.getElementById('layoutPreviewModal');
            if (modalEl) {
                if (!layoutPreviewModalInstance) {
                    layoutPreviewModalInstance = new bootstrap.Modal(modalEl);
                }
                layoutPreviewModalInstance.show();

                // Ensure backdrop doesn't dim over the preview modal
                setTimeout(function() {
                    const backdrops = document.querySelectorAll('.modal-backdrop');
                    if (backdrops.length > 1) {
                        backdrops[backdrops.length - 1].classList.add('layout-preview-backdrop');
                    }
                }, 50);
            }
        }

        function renderModalLayouts(tplKey) {
            const container = document.getElementById('modalLayoutsContainer');
            if (!container || !allTemplatesData) return;

            const tpl = allTemplatesData.find(t => t.template_key === tplKey) || allTemplatesData[0];
            if (!tpl || !tpl.layouts || tpl.layouts.length === 0) {
                container.innerHTML = '<div class="col-12"><div class="p-3 border rounded text-center small text-muted">Layout 1 (Default)</div></div>';
                selectedLayout = '1';
                return;
            }

            // Update badge count
            const countBadge = document.getElementById('modalLayoutCountBadge');
            if (countBadge) {
                countBadge.innerHTML = '<i class="fa fa-palette text-warning me-1"></i> ' + tpl.layouts.length + ' Layouts Available for ' + escapeHtml(tpl.name);
            }

            // Ensure selectedLayout exists in this template, otherwise default to first
            const hasLayout = tpl.layouts.some(l => String(l.layout_number) === String(selectedLayout));
            if (!hasLayout && tpl.layouts[0]) {
                selectedLayout = String(tpl.layouts[0].layout_number);
            }

            let html = '';
            const colClass = tpl.layouts.length <= 2 ? 'col-md-6 col-12' : (tpl.layouts.length === 3 ? 'col-lg-4 col-md-6 col-12' : 'col-lg-3 col-md-6 col-12');
            
            tpl.layouts.forEach((l, idx) => {
                const isSelected = (String(l.layout_number) === String(selectedLayout) || (idx === 0 && !selectedLayout));
                const checked = isSelected ? 'checked' : '';
                const activeClass = isSelected ? 'active' : '';
                const layoutImg = l.preview_image ? l.preview_image : 'uploads/no-image.jpg';
                const layoutName = l.layout_name || ('Layout ' + l.layout_number);
                const layoutDesc = l.short_desc || ('High-converting responsive homepage layout option ' + l.layout_number + ' customized for salon & spa bookings.');
                
                // Escape attributes for inline JS
                const safeTplName = escapeHtml(tpl.name).replace(/'/g, "\\'");
                const safeLayoutName = escapeHtml(layoutName).replace(/'/g, "\\'");
                const safeImg = escapeHtml(layoutImg).replace(/'/g, "\\'");

                html += `
                    <div class="${colClass}">
                        <div class="layout-preview-card ${activeClass}" data-layout="${l.layout_number}">
                            <!-- Thumbnail Frame with Zoom Preview Action -->
                            <div class="layout-img-container">
                                <img src="${escapeHtml(layoutImg)}" alt="${escapeHtml(layoutName)}" loading="lazy" onerror="this.src='uploads/no-image.jpg'">
                                <div class="layout-top-badges">
                                    <span class="badge bg-dark bg-opacity-75 text-white px-2 py-1">
                                        <i class="fa fa-layer-group text-warning me-1"></i> Layout ${l.layout_number}
                                    </span>
                                    <span class="badge layout-status-badge ${isSelected ? 'bg-warning text-dark' : 'bg-dark bg-opacity-75 text-white'} px-2 py-1">
                                        ${isSelected ? '<i class="fa fa-check-circle me-1"></i> Selected' : '<i class="fa fa-mouse-pointer me-1"></i> Click to Select'}
                                    </span>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="layout-card-body">
                                <div>
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <h6 class="fw-bold font-serif mb-0 layout-title">${escapeHtml(layoutName)}</h6>
                                        <input class="form-check-input d-none" type="radio" name="chosen_layout" id="layout_${l.layout_number}" value="${l.layout_number}" ${checked}>
                                    </div>
                                    <p class="small text-muted layout-desc">${escapeHtml(layoutDesc)}</p>
                                </div>

                                <div class="pt-2 border-top">
                                    <button type="button" class="btn btn-card-zoom btn-zoom-preview" onclick="openLayoutPreviewModal('${safeTplName}', '${safeLayoutName}', '${safeImg}', '${l.layout_number}'); event.stopPropagation();">
                                        <i class="fa fa-search-plus text-warning me-1"></i> Zoom Preview
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            container.innerHTML = html;

            // Bind card selection clicks
            container.querySelectorAll('.layout-preview-card').forEach(card => {
                card.addEventListener('click', function(e) {
                    if (e.target.closest('.btn-zoom-preview')) return;
                    const layoutNum = this.getAttribute('data-layout');
                    selectLayoutByNumber(layoutNum);
                });
            });
        }

        function selectLayoutByNumber(layoutNum) {
            selectedLayout = String(layoutNum);
            const container = document.getElementById('modalLayoutsContainer');
            if (!container) return;

            container.querySelectorAll('.layout-preview-card').forEach(c => {
                const isThis = c.getAttribute('data-layout') === selectedLayout;
                c.classList.toggle('active', isThis);
                const radio = c.querySelector('input[type="radio"]');
                if (radio) radio.checked = isThis;
                const badge = c.querySelector('.layout-status-badge');
                if (badge) {
                    badge.className = 'badge layout-status-badge ' + (isThis ? 'bg-warning text-dark' : 'bg-dark bg-opacity-75 text-white') + ' px-2 py-1';
                    badge.innerHTML = isThis ? '<i class="fa fa-check-circle me-1"></i> Selected' : '<i class="fa fa-mouse-pointer me-1"></i> Click to Select';
                }
            });
        }

        // Template Radio Card Click
        function bindTemplateCardClicks() {
            document.querySelectorAll('.tpl-radio-card').forEach(card => {
                card.addEventListener('click', function() {
                    document.querySelectorAll('.tpl-radio-card').forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                    const radio = this.querySelector('input[type="radio"]');
                    if (radio) {
                        radio.checked = true;
                        selectedTemplate = radio.value;
                        renderModalLayouts(selectedTemplate);
                    }
                });
            });
        }
        bindTemplateCardClicks();

        // Select from Preview Modal button
        const btnSelectFromPreview = document.getElementById('btnSelectFromPreview');
        if (btnSelectFromPreview) {
            btnSelectFromPreview.addEventListener('click', function() {
                selectLayoutByNumber(currentPreviewLayoutNumber);
                if (layoutPreviewModalInstance) {
                    layoutPreviewModalInstance.hide();
                }
            });
        }

        // Password toggle
        function togglePasswordVisibility(id, btn) {
            const el = document.getElementById(id);
            const icon = btn.querySelector('i');
            if (el.type === 'password') {
                el.type = 'text';
                icon.className = 'fa fa-eye-slash';
            } else {
                el.type = 'password';
                icon.className = 'fa fa-eye';
            }
        }

        function updateFolderNotice(val) {
            val = val.trim().replace(/^https?:\/\//i, '').replace(/[\/\\]/g, '').toLowerCase();
            if (!val) val = 'your-domain.com';
            document.getElementById('wizFolderNotice').textContent = val;
        }

        function previewModalUpload(input, imgId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById(imgId);
                    img.src = e.target.result;
                    img.parentElement.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Step Navigation
        function goToStep(step) {
            step1.style.display = 'none';
            step2.style.display = 'none';
            step3.style.display = 'none';
            step4.style.display = 'none';
            if (step5) step5.style.display = 'none';

            if (step === 1) {
                step1.style.display = 'block';
                modalSubtitle.textContent = 'Step 1 of 4: Customer Registration & Plan Confirmation';
                checkoutProgressBar.style.width = '25%';
            } else if (step === 2) {
                step2.style.display = 'block';
                modalSubtitle.textContent = 'Step 2 of 4: Select Your Initial Template & Homepage Layout';
                checkoutProgressBar.style.width = '50%';
                renderModalLayouts(selectedTemplate);
            } else if (step === 3) {
                step3.style.display = 'block';
                modalSubtitle.textContent = 'Step 3 of 4: Payment Gateway Checkout';
                checkoutProgressBar.style.width = '75%';

                // Populate Step 3 summaries
                const business = document.getElementById('custBusiness').value || 'My Salon & Spa';
                const layoutRadio = document.querySelector('input[name="chosen_layout"]:checked');
                selectedLayout = layoutRadio ? layoutRadio.value : (selectedLayout || '1');

                const curTpl = allTemplatesData.find(t => t.template_key === selectedTemplate);
                const curTplName = curTpl ? curTpl.name : selectedTemplate;
                const curLayout = curTpl && curTpl.layouts ? curTpl.layouts.find(l => String(l.layout_number) === String(selectedLayout)) : null;
                const curLayoutName = curLayout ? curLayout.layout_name : ('Layout ' + selectedLayout);

                document.getElementById('checkoutPlanText').textContent = selectedPlanName;
                document.getElementById('checkoutBusinessText').textContent = business;
                document.getElementById('checkoutTplText').textContent = curTplName + ' - ' + curLayoutName;
                document.getElementById('checkoutAmountText').textContent = selectedPriceDisplay;
            } else if (step === 4) {
                step4.style.display = 'block';
                modalSubtitle.textContent = 'Step 4 of 4: Project Setup Wizard (Company Info, Logo & Domain)';
                checkoutProgressBar.style.width = '90%';

                // Populate wizard from registration
                document.getElementById('wizCompanyName').value = document.getElementById('custBusiness').value.trim();
                document.getElementById('wizCompanyEmail').value = document.getElementById('custEmail').value.trim();
                document.getElementById('wizCompanyPhone').value = document.getElementById('custPhone').value.trim();
                document.getElementById('wizAdminEmail').value = document.getElementById('custEmail').value.trim();
                document.getElementById('wizAdminPass').value = document.getElementById('custPassword').value.trim();
                document.getElementById('wizAdminName').value = document.getElementById('custName').value.trim();
                document.getElementById('wizPlanCode').value = selectedPlan;
                document.getElementById('wizTemplate').value = selectedTemplate;
                document.getElementById('wizLayout').value = selectedLayout;
            } else if (step === 5) {
                step5.style.display = 'block';
                modalSubtitle.textContent = 'Instance Provisioning & Live Hub';
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

        // Finalize order record in system after gateway approval
        function completeOrderSubmission(transactionId, gatewayName) {
            const btn = document.getElementById('btnSubmitOrder');
            const spinner = document.getElementById('spinnerBtn');
            const alertBox = document.getElementById('checkoutAlert');

            btn.disabled = true;
            spinner.classList.remove('d-none');
            alertBox.classList.add('d-none');

            const name = document.getElementById('custName').value.trim();
            const email = document.getElementById('custEmail').value.trim();
            const password = document.getElementById('custPassword').value.trim();
            const phone = document.getElementById('custPhone').value.trim();
            const business = document.getElementById('custBusiness').value.trim();
            const layoutRadio = document.querySelector('input[name="chosen_layout"]:checked');
            const layout = layoutRadio ? layoutRadio.value : '1';

            const formData = new FormData();
            formData.append('plan_code', selectedPlan);
            formData.append('name', name);
            formData.append('email', email);
            formData.append('password', password);
            formData.append('phone', phone);
            formData.append('business_name', business);
            formData.append('chosen_template', selectedTemplate);
            formData.append('chosen_layout', layout);
            formData.append('payment_gateway', gatewayName || '<?php echo $active_payment_gateway; ?>');
            formData.append('transaction_id', transactionId || ('TXN-' + Date.now()));

            fetch('order_process.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                btn.disabled = false;
                spinner.classList.add('d-none');

                if (data.status === 'success') {
                    activeOrderNumber = data.order_number;
                    activeOrderToken = data.token;

                    document.getElementById('wizOrderRef').textContent = data.order_number;
                    document.getElementById('wizOrderNum').value = data.order_number;
                    document.getElementById('wizOrderToken').value = data.token;
                    document.getElementById('linkFullscreenWizard').href = data.setup_wizard_url;

                    goToStep(4);
                } else {
                    alertBox.textContent = data.message || 'An error occurred during order confirmation.';
                    alertBox.classList.remove('d-none');
                }
            })
            .catch(err => {
                btn.disabled = false;
                spinner.classList.add('d-none');
                alertBox.textContent = 'Order confirmation network error. Please try again.';
                alertBox.classList.remove('d-none');
            });
        }

        // Direct sandbox trigger
        function simulateSandboxOrder() {
            completeOrderSubmission('SANDBOX-' + Date.now(), 'offline');
        }

        // Submit Order & Route to Active Payment Gateway's Official Page/Checkout
        document.getElementById('btnSubmitOrder').addEventListener('click', function() {
            const btn = this;
            const spinner = document.getElementById('spinnerBtn');
            const alertBox = document.getElementById('checkoutAlert');
            
            alertBox.classList.add('d-none');
            alertBox.innerHTML = '';
            btn.disabled = true;
            spinner.classList.remove('d-none');

            const name = document.getElementById('custName').value.trim();
            const email = document.getElementById('custEmail').value.trim();
            const password = document.getElementById('custPassword').value.trim();
            const phone = document.getElementById('custPhone').value.trim();
            const business = document.getElementById('custBusiness').value.trim();
            const layoutRadio = document.querySelector('input[name="chosen_layout"]:checked');
            const layout = layoutRadio ? layoutRadio.value : (selectedLayout || '1');

            if (!name || !email || !password) {
                btn.disabled = false;
                spinner.classList.add('d-none');
                alertBox.textContent = 'Please fill out all registration fields in Step 1 before proceeding.';
                alertBox.classList.remove('d-none');
                return;
            }

            const formData = new FormData();
            formData.append('plan_code', selectedPlan);
            formData.append('name', name);
            formData.append('email', email);
            formData.append('password', password);
            formData.append('phone', phone);
            formData.append('business_name', business);
            formData.append('chosen_template', selectedTemplate);
            formData.append('chosen_layout', layout);

            fetch('create_payment.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                // 1. STRIPE OFFICIAL REDIRECT (checkout.stripe.com)
                if (data.status === 'redirect' && data.redirect_url) {
                    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Redirecting to Stripe Official Checkout...';
                    window.location.href = data.redirect_url;
                    return;
                }

                // 2. RAZORPAY OFFICIAL STANDARD CHECKOUT MODAL
                if (data.status === 'razorpay_checkout') {
                    btn.disabled = false;
                    spinner.classList.add('d-none');

                    if (typeof Razorpay === 'undefined') {
                        alertBox.textContent = 'Razorpay official checkout script is still loading. Please check your internet connection and try again.';
                        alertBox.classList.remove('d-none');
                        return;
                    }

                    const rzpOptions = {
                        key: data.key_id,
                        amount: data.amount,
                        currency: data.currency,
                        name: data.business_name || 'Salon & Spa Platform',
                        description: data.plan_name,
                        image: 'uploads/logo-preview.png',
                        prefill: {
                            name: data.customer_name,
                            email: data.customer_email,
                            contact: data.customer_phone
                        },
                        theme: {
                            color: '#D4AF37'
                        },
                        handler: function(response) {
                            // Official Razorpay success callback
                            completeOrderSubmission(response.razorpay_payment_id, 'razorpay');
                        },
                        modal: {
                            ondismiss: function() {
                                btn.disabled = false;
                                spinner.classList.add('d-none');
                            }
                        }
                    };

                    try {
                        const rzp = new Razorpay(rzpOptions);
                        rzp.on('payment.failed', function(resp) {
                            alertBox.textContent = 'Razorpay payment was not completed: ' + (resp.error ? resp.error.description : 'Payment failed');
                            alertBox.classList.remove('d-none');
                        });
                        rzp.open();
                    } catch (e) {
                        alertBox.innerHTML = 'Razorpay SDK Error: ' + escapeHtml(e.message) + '<br><button type="button" class="btn btn-sm btn-outline-warning mt-2" onclick="simulateSandboxOrder()"><i class="fa fa-flask me-1"></i> Continue in Sandbox / Demo Mode</button>';
                        alertBox.classList.remove('d-none');
                    }
                    return;
                }

                // 3. PAYU OFFICIAL HOSTED PORTAL REDIRECT
                if (data.status === 'payu_form') {
                    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Redirecting to PayU Official Portal...';
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = data.action;
                    form.style.display = 'none';

                    for (const [key, value] of Object.entries(data.fields)) {
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = key;
                        hiddenInput.value = value;
                        form.appendChild(hiddenInput);
                    }
                    document.body.appendChild(form);
                    form.submit();
                    return;
                }

                // 4. SANDBOX / OFFLINE INSTANT PROCESSING
                if (data.status === 'sandbox_direct') {
                    completeOrderSubmission('SANDBOX-' + Date.now(), 'offline');
                    return;
                }

                // Error handling from gateway dispatch
                btn.disabled = false;
                spinner.classList.add('d-none');
                let errHtml = escapeHtml(data.message || 'Payment initiation failed.');
                if (data.is_sample_key) {
                    errHtml += '<div class="mt-2"><button type="button" class="btn btn-sm btn-outline-warning" onclick="simulateSandboxOrder()"><i class="fa fa-flask me-1"></i> Simulate Payment in Sandbox Mode</button></div>';
                }
                alertBox.innerHTML = errHtml;
                alertBox.classList.remove('d-none');
            })
            .catch(err => {
                btn.disabled = false;
                spinner.classList.add('d-none');
                alertBox.innerHTML = 'Gateway communication error: ' + escapeHtml(err.message) + '<div class="mt-2"><button type="button" class="btn btn-sm btn-outline-warning" onclick="simulateSandboxOrder()"><i class="fa fa-flask me-1"></i> Simulate Payment in Sandbox Mode</button></div>';
                alertBox.classList.remove('d-none');
            });
        });

        // Run Deployment from Modal Setup Wizard
        document.getElementById('btnRunDeploy').addEventListener('click', function() {
            const domainVal = document.getElementById('wizDomain').value.trim();
            const alertBox = document.getElementById('wizAlert');
            alertBox.classList.add('d-none');

            if (!domainVal) {
                alertBox.textContent = 'Please enter your domain or folder name (e.g. www.example.com).';
                alertBox.classList.remove('d-none');
                return;
            }

            goToStep(5);

            const form = document.getElementById('modalSetupForm');
            const formData = new FormData(form);

            const s1 = document.getElementById('mWizStep1');
            const s2 = document.getElementById('mWizStep2');
            const s3 = document.getElementById('mWizStep3');
            const s4 = document.getElementById('mWizStep4');
            const s5 = document.getElementById('mWizStep5');
            document.getElementById('mLogFolder').textContent = domainVal;

            setTimeout(() => { markModalStepDone(s1); markModalStepRunning(s2); }, 300);
            setTimeout(() => { markModalStepDone(s2); markModalStepRunning(s3); }, 700);

            fetch('provision_engine.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    markModalStepDone(s3);
                    markModalStepDone(s4);
                    markModalStepDone(s5);

                    setTimeout(() => {
                        document.getElementById('modalDeployProgress').style.display = 'none';
                        document.getElementById('modalDeploySuccess').style.display = 'block';

                        document.getElementById('mResDomain').textContent = data.domain;
                        document.getElementById('mResFolder').textContent = data.folder_name;
                        document.getElementById('mResAdminEmail').textContent = data.admin_email;
                        document.getElementById('mResAdminPass').textContent = data.admin_password;

                        document.getElementById('btnModalVisitSite').href = data.website_url;
                        document.getElementById('btnModalVisitAdmin').href = data.admin_url;
                        document.getElementById('mResSiteUrl').textContent = data.website_url;
                        document.getElementById('mResAdminUrl').textContent = data.admin_url;
                    }, 500);
                } else {
                    document.getElementById('step5').style.display = 'none';
                    goToStep(4);
                    alertBox.textContent = data.message || 'Provisioning failed. Please check inputs and retry.';
                    alertBox.classList.remove('d-none');
                }
            })
            .catch(err => {
                document.getElementById('step5').style.display = 'none';
                goToStep(4);
                alertBox.textContent = 'Server communication error: ' + err.message;
                alertBox.classList.remove('d-none');
            });
        });

        function markModalStepRunning(el) {
            if (!el) return;
            el.className = 'mb-2 text-warning fw-semibold';
            el.querySelector('i').className = 'fa fa-spinner fa-spin text-warning me-2';
        }

        function markModalStepDone(el) {
            if (!el) return;
            el.className = 'mb-2 text-success';
            el.querySelector('i').className = 'fa fa-check text-success me-2';
        }

        // Interactive Tab Switcher for Template Layouts
        function switchCardLayout(tpl, layoutNum, imgUrl, titleText, demoUrl) {
            const imgEl = document.getElementById(tpl + '_preview_img');
            const titleEl = document.getElementById(tpl + '_preview_title');
            const demoBtn = document.getElementById(tpl + '_demo_btn');

            const fallbackImg = 'uploads/no-image.jpg';
            const finalImg = (imgUrl && imgUrl.trim() !== '') ? imgUrl : fallbackImg;

            if (imgEl) imgEl.style.backgroundImage = `url('${finalImg}')`;
            if (titleEl) titleEl.textContent = titleText;
            if (demoBtn) demoBtn.href = demoUrl;

            document.querySelectorAll(`.${tpl}-tab-btn`).forEach(b => {
                b.classList.remove('btn-dark', 'text-white', 'active', 'border-secondary');
                b.classList.add('btn-outline-secondary', 'text-light');
            });
            const clickedBtn = document.getElementById(`${tpl}_tab_${layoutNum}`);
            if (clickedBtn) {
                clickedBtn.classList.remove('btn-outline-secondary', 'text-light');
                clickedBtn.classList.add('btn-dark', 'text-white', 'active', 'border-secondary');
            }
        }

        // Universal fallback for any broken or missing image on the website (using c:\Users\Codeulas\Downloads\no-immage.jpg)
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('img').forEach(function(img) {
                img.addEventListener('error', function() {
                    this.onerror = null;
                    this.src = 'uploads/no-image.jpg';
                });
                if (!img.getAttribute('src') || img.getAttribute('src').trim() === '') {
                    img.src = 'uploads/no-image.jpg';
                }
            });
        });

        // Auto-resume Project Setup Wizard when returning from official gateway (Stripe / PayU)
        <?php if (!empty($returned_order_info)): ?>
        window.addEventListener('load', function() {
            setTimeout(function() {
                const modalEl = document.getElementById('checkoutModal');
                const modalInst = bootstrap.Modal.getOrCreateInstance(modalEl);
                
                selectedPlan = <?php echo json_encode($returned_order_info['plan_code']); ?>;
                selectedTemplate = <?php echo json_encode($returned_order_info['template']); ?>;
                selectedLayout = <?php echo json_encode(strval($returned_order_info['layout'])); ?>;
                activeOrderNumber = <?php echo json_encode($returned_order_info['order_number']); ?>;
                activeOrderToken = <?php echo json_encode($returned_order_info['token']); ?>;

                document.getElementById('wizOrderRef').textContent = activeOrderNumber;
                document.getElementById('wizOrderNum').value = activeOrderNumber;
                document.getElementById('wizOrderToken').value = activeOrderToken;
                document.getElementById('wizPlanCode').value = selectedPlan;
                document.getElementById('wizTemplate').value = selectedTemplate;
                document.getElementById('wizLayout').value = selectedLayout;

                document.getElementById('wizCompanyName').value = <?php echo json_encode($returned_order_info['company_name']); ?>;
                document.getElementById('wizCompanyEmail').value = <?php echo json_encode($returned_order_info['company_email']); ?>;
                document.getElementById('wizCompanyPhone').value = <?php echo json_encode($returned_order_info['company_phone']); ?>;
                document.getElementById('wizAdminName').value = <?php echo json_encode($returned_order_info['admin_name']); ?>;
                document.getElementById('wizAdminEmail').value = <?php echo json_encode($returned_order_info['admin_email']); ?>;
                <?php if (!empty($returned_order_info['admin_password'])): ?>
                document.getElementById('wizAdminPass').value = <?php echo json_encode($returned_order_info['admin_password']); ?>;
                <?php endif; ?>

                goToStep(4);
                modalInst.show();
            }, 300);
        });
        <?php elseif ($payment_cancelled): ?>
        window.addEventListener('load', function() {
            setTimeout(function() {
                alert('Payment process was cancelled on the official payment gateway page. You can retry checkout anytime.');
            }, 300);
        });
        <?php endif; ?>
    </script>
</body>
</html>
