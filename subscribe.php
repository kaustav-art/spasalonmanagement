<?php
/**
 * SaaS Subscription & Project Setup Wizard (Full-Screen Dedicated Page)
 * Flow:
 * Step 1: Account Registration (Full Name, Unique Email, Unique Phone, Password)
 * Step 2: OTP Verification
 * Step 3: Setup Information (Business Name, Tagline, Email, Phone, Address, Currency, Domain, Logo & Favicon)
 * Step 4: Choose Template & Homepage Layout
 * Step 5: Payment (Summary Review, Active Gateway / Sandbox, Submit Button: "Payment")
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=spasalon_db;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}

// Fetch Business Settings
$settings = [];
$stmt_set = $pdo->query("SELECT setting_key, setting_value FROM business_settings");
while ($r = $stmt_set->fetch(PDO::FETCH_ASSOC)) {
    $settings[$r['setting_key']] = $r['setting_value'];
}

// Fetch Plans
$plans = [];
$stmt_p = $pdo->query("SELECT * FROM marketplace_plans WHERE status = 'active' ORDER BY sort_order ASC, id ASC");
while ($p = $stmt_p->fetch()) {
    $plans[$p->plan_code] = $p;
}

// Default Selected Plan
$selected_plan_code = isset($_GET['plan']) ? strtoupper(trim($_GET['plan'])) : 'SALON_SPA';
if (!isset($plans[$selected_plan_code])) {
    $selected_plan_code = 'SALON_SPA';
}
$current_plan = $plans[$selected_plan_code];

// Fetch Templates and Layouts
$templates = [];
$stmt_tpl = $pdo->query("SELECT * FROM marketplace_templates WHERE status = 'active' ORDER BY sort_order ASC, id ASC");
while ($t = $stmt_tpl->fetch()) {
    $t->layouts = [];
    $stmt_lay = $pdo->prepare("SELECT * FROM marketplace_template_layouts WHERE template_key = ? AND status = 'active' ORDER BY layout_number ASC");
    $stmt_lay->execute([$t->template_key]);
    while ($lay = $stmt_lay->fetch()) {
        $t->layouts[] = $lay;
    }
    $templates[$t->template_key] = $t;
}

// Active Payment Gateway
$active_gateway = isset($settings['active_payment_gateway']) ? $settings['active_payment_gateway'] : 'stripe';
$currency_symbol = isset($settings['currency_symbol']) ? $settings['currency_symbol'] : '$';
$site_logo = isset($settings['landing_site_logo']) && !empty($settings['landing_site_logo']) ? $settings['landing_site_logo'] : 'uploads/branding/logo.webp';
$site_favicon = isset($settings['landing_site_favicon']) && !empty($settings['landing_site_favicon']) ? $settings['landing_site_favicon'] : 'uploads/branding/codeulas_logo_small.webp';

// Helper for Stripe API verification
function stripe_verify_http_request($url, $userpwd = '') {
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 25);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        if (!empty($userpwd)) {
            curl_setopt($ch, CURLOPT_USERPWD, $userpwd);
        }
        $resp = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return array('code' => $code, 'body' => $resp);
    }

    $headers = array();
    if (!empty($userpwd)) {
        $headers[] = 'Authorization: Basic ' . base64_encode($userpwd);
    }
    $opts = array(
        'http' => array(
            'method' => 'GET',
            'header' => implode("\r\n", $headers) . "\r\n",
            'timeout' => 25,
            'ignore_errors' => true
        ),
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false
        )
    );
    $ctx = stream_context_create($opts);
    $resp = @file_get_contents($url, false, $ctx);
    $code = 0;
    if (isset($http_response_header) && is_array($http_response_header)) {
        foreach ($http_response_header as $hdr) {
            if (preg_match('#HTTP/[0-9\.]+\s+([0-9]+)#', $hdr, $m)) {
                $code = (int)$m[1];
                break;
            }
        }
    }
    return array('code' => $code, 'body' => $resp);
}

// Handle Stripe Return Callback
$stripe_provision_completed = false;
$stripe_provision_result = null;
$stripe_callback_error = '';

if (isset($_GET['stripe_success']) && !empty($_GET['session_id'])) {
    $session_id = trim($_GET['session_id']);
    $stripe_secret = isset($settings['gateway_stripe_secret_key']) ? trim($settings['gateway_stripe_secret_key']) : '';

    if (!empty($session_id) && !empty($stripe_secret)) {
        $api_res = stripe_verify_http_request('https://api.stripe.com/v1/checkout/sessions/' . urlencode($session_id), $stripe_secret . ':');
        $stripe_session = json_decode($api_res['body'], true);

        if ($api_res['code'] === 200 && isset($stripe_session['payment_status']) && $stripe_session['payment_status'] === 'paid') {
            $pending = isset($_SESSION['pending_wizard_setup']) ? $_SESSION['pending_wizard_setup'] : null;

            // Fallback: restore setup parameters from Stripe cloud metadata if session cookie is not set
            if (!$pending && isset($stripe_session['metadata']) && !empty($stripe_session['metadata']['email'])) {
                $meta = $stripe_session['metadata'];
                $dom = !empty($meta['domain']) ? $meta['domain'] : preg_replace('/[^a-z0-9]/', '', strtolower($meta['business_name'] ?? 'salon'));
                if (strlen($dom) < 3) $dom = 'salon' . rand(100, 999);
                $pending = [
                    'plan_code' => $meta['plan_code'] ?? 'SALON_SPA',
                    'name' => $meta['name'] ?? 'Customer',
                    'email' => $meta['email'] ?? ($stripe_session['customer_details']['email'] ?? ''),
                    'phone' => $meta['phone'] ?? '',
                    'password' => $meta['password'] ?? 'Salon@2026!',
                    'business_name' => $meta['business_name'] ?? 'My Salon & Spa',
                    'tagline' => 'Premium Beauty & Rejuvenating Wellness',
                    'company_email' => $meta['email'] ?? ($stripe_session['customer_details']['email'] ?? ''),
                    'company_phone' => $meta['phone'] ?? '',
                    'company_address' => '742 Fashion Avenue, Suite 100',
                    'currency_symbol' => $currency_symbol,
                    'domain' => $dom,
                    'chosen_template' => $meta['chosen_template'] ?? 'template1',
                    'chosen_layout' => (int)($meta['chosen_layout'] ?? 1)
                ];
            }

            if ($pending) {
                $pending_email = strtolower(trim($pending['email']));
                $pending_domain = strtolower(trim($pending['domain']));

                // Check if already provisioned (e.g. user refreshed the page)
                $stmt_chk = $pdo->prepare("SELECT * FROM saas_tenants WHERE LOWER(admin_email) = ? OR LOWER(domain) = ? ORDER BY id DESC LIMIT 1");
                $stmt_chk->execute([$pending_email, $pending_domain]);
                $existing_tenant = $stmt_chk->fetch(PDO::FETCH_ASSOC);

                if ($existing_tenant) {
                    $stripe_provision_completed = true;
                    $stripe_provision_result = [
                        'website_url' => $existing_tenant['website_url'],
                        'admin_url' => $existing_tenant['admin_url'],
                        'admin_email' => $existing_tenant['admin_email'],
                        'admin_password' => $pending['password'] ?? '(Saved during registration)',
                        'db_name' => $existing_tenant['db_name'],
                        'download_url' => 'download.php?token=demo&order=confirmed'
                    ];
                    unset($_SESSION['pending_wizard_setup']);
                } else {
                    $pending['payment_method'] = 'stripe';
                    $pending['transaction_id'] = isset($stripe_session['payment_intent']) ? $stripe_session['payment_intent'] : ('STRIPE-' . time());

                    require_once __DIR__ . '/subscribe_api.php';
                    try {
                        $res = execute_subscription_provisioning($pdo, $settings, $pending, []);
                        if ($res && $res['status'] === 'success') {
                            $stripe_provision_completed = true;
                            $stripe_provision_result = $res;
                            unset($_SESSION['pending_wizard_setup']);
                        } else {
                            $stripe_callback_error = $res['message'] ?? 'Provisioning failed.';
                        }
                    } catch (Exception $e) {
                        $stripe_callback_error = $e->getMessage();
                    }
                }
            } else {
                $stripe_callback_error = 'Pending session not found. Please contact support or restart setup.';
            }
        } else {
            $stripe_callback_error = 'Stripe payment was not verified as completed.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaaS Subscription &amp; Project Setup Wizard</title>
    <link rel="icon" type="image/webp" href="<?= htmlspecialchars($site_favicon) ?>">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="website/assets/template1/css/bootstrap.min.css">
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bs-body-color: #f1f5f9 !important;
            --bs-body-color-rgb: 241, 245, 249 !important;
            --bs-heading-color: #ffffff !important;
            --bs-body-bg: #090f1d !important;
            --primary-gold: #c29958;
            --primary-gold-hover: #b08746;
            --primary-gold-rgb: 194, 153, 88;
            --dark-navy: #090f1d;
            --surface-dark: #0f172a;
            --surface-card: #131c31;
            --border-color: #27354f;
            --accent-green: #10b981;
            --accent-blue: #3b82f6;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #070b14 0%, #0d1527 50%, #111a33 100%);
            color: #f1f5f9 !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
        }

        /* Typography & Global Dark Mode Visibility */
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            color: #ffffff !important;
        }
        p {
            color: #cbd5e1;
        }
        strong, b {
            color: #ffffff !important;
        }
        .form-label, label {
            color: #e2e8f0 !important;
            font-weight: 600;
        }
        .text-muted, small.text-muted, p.text-muted, span.text-muted, div.text-muted, label.text-muted {
            color: #94a3b8 !important;
        }
        .text-secondary {
            color: #cbd5e1 !important;
        }
        small, .small {
            color: #cbd5e1;
        }
        .font-serif {
            font-family: 'Playfair Display', Georgia, serif;
        }

        /* Top Header */
        .wizard-navbar {
            background: rgba(13, 21, 39, 0.92);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .brand-logo-img {
            max-height: 40px;
            width: auto;
            object-fit: contain;
        }

        /* Container */
        .wizard-wrapper {
            max-width: 1320px;
            margin: 35px auto 60px;
            width: 100%;
            padding: 0 16px;
        }

        .wizard-main-card {
            background: rgba(15, 23, 42, 0.96);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 24px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.55);
            overflow: hidden;
        }

        /* Multi-Step Indicator Header */
        .wizard-step-bar {
            display: flex;
            background: rgba(10, 16, 30, 0.85);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 20px 24px;
            overflow-x: auto;
            scrollbar-width: none;
        }
        .wizard-step-bar::-webkit-scrollbar {
            display: none;
        }

        .step-node {
            flex: 1;
            min-width: 140px;
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            opacity: 0.45;
            transition: all 0.3s ease;
        }
        .step-node.active {
            opacity: 1;
        }
        .step-node.completed {
            opacity: 0.95;
        }

        .step-badge {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #1e293b;
            color: #cbd5e1;
            font-weight: 700;
            font-size: 0.88rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #334155;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }
        .step-node.active .step-badge {
            background: var(--primary-gold);
            color: #0b0f19;
            border-color: var(--primary-gold);
            box-shadow: 0 0 16px rgba(194, 153, 88, 0.55);
        }
        .step-node.completed .step-badge {
            background: var(--accent-green);
            color: #ffffff;
            border-color: var(--accent-green);
        }

        .step-meta small {
            display: block;
            font-size: 0.72rem;
            color: #94a3b8 !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .step-meta span {
            font-weight: 600;
            font-size: 0.88rem;
            color: #e2e8f0 !important;
            white-space: nowrap;
        }
        .step-node.active .step-meta span {
            color: var(--primary-gold) !important;
        }

        /* Form Inputs - High Contrast Dark Mode */
        .form-control, .form-select, input[type="text"], input[type="email"], input[type="password"], input[type="tel"], textarea, select {
            background-color: #141d30 !important;
            border: 1px solid #27354f !important;
            color: #ffffff !important;
            -webkit-text-fill-color: #ffffff !important;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.94rem;
            transition: all 0.2s ease;
        }
        .form-control:focus, .form-select:focus, input:focus, select:focus, textarea:focus {
            background-color: #1a263f !important;
            border-color: var(--primary-gold) !important;
            color: #ffffff !important;
            -webkit-text-fill-color: #ffffff !important;
            box-shadow: 0 0 0 3px rgba(194, 153, 88, 0.25) !important;
            outline: none;
        }
        .form-control::placeholder, input::placeholder, textarea::placeholder {
            color: #94a3b8 !important;
            -webkit-text-fill-color: #94a3b8 !important;
            opacity: 0.85 !important;
        }
        select.form-select option, select option {
            background-color: #141d30 !important;
            color: #ffffff !important;
        }

        /* Browser Autofill Fix */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 1000px #141d30 inset !important;
            -webkit-text-fill-color: #ffffff !important;
            color: #ffffff !important;
            caret-color: #ffffff !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        .input-group-text {
            background-color: #0b1120 !important;
            border: 1px solid #27354f !important;
            color: #94a3b8 !important;
            border-radius: 12px;
        }

        /* Password eye toggle button */
        .btn-outline-secondary {
            border-color: #334155 !important;
            color: #cbd5e1 !important;
            background-color: #141d30 !important;
        }
        .btn-outline-secondary:hover {
            background-color: #1e293b !important;
            color: #ffffff !important;
            border-color: #64748b !important;
        }

        /* Checkbox */
        .form-check-label {
            color: #cbd5e1 !important;
        }
        .form-check-input {
            background-color: #141d30 !important;
            border: 1px solid #334155 !important;
        }
        .form-check-input:checked {
            background-color: var(--primary-gold) !important;
            border-color: var(--primary-gold) !important;
        }

        /* Alerts in Dark Mode */
        .alert {
            border-radius: 12px !important;
        }
        .alert-danger {
            background-color: rgba(220, 38, 38, 0.18) !important;
            border: 1px solid rgba(220, 38, 38, 0.45) !important;
            color: #fecaca !important;
        }
        .alert-info {
            background-color: rgba(59, 130, 246, 0.18) !important;
            border: 1px solid rgba(59, 130, 246, 0.45) !important;
            color: #bfdbfe !important;
        }
        .alert-success {
            background-color: rgba(16, 185, 129, 0.18) !important;
            border: 1px solid rgba(16, 185, 129, 0.45) !important;
            color: #a7f3d0 !important;
        }

        /* Dark Badges */
        .badge.bg-dark {
            background-color: #1a253c !important;
            color: #e2e8f0 !important;
            border-color: #334155 !important;
        }
        .badge.bg-warning.text-dark {
            color: #0b0f19 !important;
        }

        /* Modal Preview */
        .modal-content {
            background-color: #0f172a !important;
            color: #f1f5f9 !important;
            border: 1px solid #334155 !important;
        }
        .modal-header, .modal-footer {
            border-color: #27354f !important;
        }
        .modal-title {
            color: var(--primary-gold) !important;
        }

        /* Validation Feedback States */
        .is-valid-custom {
            border-color: var(--accent-green) !important;
        }
        .is-invalid-custom {
            border-color: #ef4444 !important;
        }
        .field-feedback {
            font-size: 0.8rem;
            margin-top: 4px;
            display: block;
        }
        .field-feedback.error {
            color: #f87171;
        }
        .field-feedback.success {
            color: #34d399;
        }

        /* Buttons */
        .btn-gold {
            background: linear-gradient(135deg, #c29958 0%, #e0b879 100%);
            color: #0b0f19;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            padding: 13px 30px;
            transition: all 0.25s ease;
        }
        .btn-gold:hover {
            background: linear-gradient(135deg, #b08746 0%, #d4a965 100%);
            color: #000000;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(194, 153, 88, 0.35);
        }
        .btn-outline-custom {
            border: 1px solid #334155;
            color: #cbd5e1;
            border-radius: 12px;
            padding: 12px 24px;
            background: transparent;
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn-outline-custom:hover {
            background: #1e293b;
            color: #ffffff;
            border-color: #64748b;
        }

        /* OTP Code Input Boxes */
        .otp-input-group {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin: 20px 0;
        }
        .otp-digit {
            width: 54px;
            height: 60px;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 800;
            border-radius: 14px;
            background-color: #141d30;
            border: 2px solid #27354f;
            color: var(--primary-gold);
            transition: all 0.2s;
        }
        .otp-digit:focus {
            border-color: var(--primary-gold);
            background-color: #1a263f;
            box-shadow: 0 0 0 3px rgba(194, 153, 88, 0.3);
            outline: none;
        }

        /* Template & Layout Cards */
        .tpl-card {
            background: #121a2d;
            border: 2px solid #23304a;
            border-radius: 16px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.25s ease;
            position: relative;
            height: 100%;
        }
        .tpl-card:hover {
            border-color: #3b4d70;
            transform: translateY(-2px);
        }
        .tpl-card.active {
            border-color: var(--primary-gold);
            background: rgba(194, 153, 88, 0.06);
            box-shadow: 0 0 20px rgba(194, 153, 88, 0.2);
        }

        .layout-card {
            background: #121a2d;
            border: 2px solid #23304a;
            border-radius: 16px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.25s ease;
            position: relative;
        }
        .layout-card:hover {
            border-color: #3b4d70;
            transform: translateY(-3px);
        }
        .layout-card.active {
            border-color: var(--primary-gold);
            box-shadow: 0 0 22px rgba(194, 153, 88, 0.25);
        }
        .layout-thumb {
            width: 100%;
            height: 160px;
            object-fit: cover;
            object-position: top;
            border-bottom: 1px solid #23304a;
            background: #090f1d;
        }

        /* Upload Dropzone */
        .upload-dropzone {
            border: 2px dashed #2e3e5c;
            border-radius: 14px;
            padding: 24px 16px;
            text-align: center;
            background: rgba(20, 29, 48, 0.45);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .upload-dropzone:hover {
            border-color: var(--primary-gold);
            background: rgba(194, 153, 88, 0.05);
        }
        .preview-img-box {
            max-height: 55px;
            display: none;
            margin-top: 10px;
            border-radius: 8px;
            padding: 4px;
            background: #090f1d;
            border: 1px solid #2e3e5c;
        }

        /* Deploy Checklist */
        .deploy-check-item {
            padding: 12px 16px;
            background: rgba(20, 29, 48, 0.6);
            border-radius: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid transparent;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        .deploy-check-item.pending {
            color: #64748b;
        }
        .deploy-check-item.running {
            border-color: var(--primary-gold);
            background: rgba(194, 153, 88, 0.1);
            color: #ffffff;
        }
        .deploy-check-item.completed {
            border-color: rgba(16, 185, 129, 0.4);
            background: rgba(16, 185, 129, 0.08);
            color: #10b981;
        }

        /* Launch Hub Card */
        .hub-link-card {
            background: linear-gradient(145deg, #131d33 0%, #0d1527 100%);
            border: 1px solid #2a3958;
            border-radius: 16px;
            padding: 22px;
            text-decoration: none;
            color: #f1f5f9;
            display: block;
            transition: all 0.3s;
        }
        .hub-link-card:hover {
            border-color: var(--primary-gold);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.4);
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Top Sticky Branding Bar -->
    <header class="wizard-navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="index.php" class="d-flex align-items-center text-decoration-none">
                <img src="<?= htmlspecialchars($site_logo) ?>" alt="Luxe Logo" class="brand-logo-img">
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="index.php" class="btn btn-outline-custom btn-sm">
                    <i class="fa fa-arrow-left me-1"></i> Back to Home
                </a>
            </div>
        </div>
    </header>

    <div class="wizard-wrapper">
        
        <div class="wizard-main-card">
            
            <!-- 5-Step Visual Bar -->
            <div class="wizard-step-bar" id="wizardStepBar" style="<?= ($stripe_provision_completed && $stripe_provision_result) ? 'display: none !important;' : '' ?>">
                <div class="step-node active" id="nodeStep1">
                    <div class="step-badge">1</div>
                    <div class="step-meta">
                        <small>Step 1</small>
                        <span>Account</span>
                    </div>
                </div>
                <div class="step-node" id="nodeStep2">
                    <div class="step-badge">2</div>
                    <div class="step-meta">
                        <small>Step 2</small>
                        <span>OTP Verify</span>
                    </div>
                </div>
                <div class="step-node" id="nodeStep3">
                    <div class="step-badge">3</div>
                    <div class="step-meta">
                        <small>Step 3</small>
                        <span>Setup Info</span>
                    </div>
                </div>
                <div class="step-node" id="nodeStep4">
                    <div class="step-badge">4</div>
                    <div class="step-meta">
                        <small>Step 4</small>
                        <span>Choose Template</span>
                    </div>
                </div>
                <div class="step-node" id="nodeStep5">
                    <div class="step-badge">5</div>
                    <div class="step-meta">
                        <small>Step 5</small>
                        <span>Payment</span>
                    </div>
                </div>
            </div>

            <!-- Main Interactive Body -->
            <div class="p-4 p-md-5">

                <!-- Alert Messages -->
                <div id="wizardAlert" class="alert alert-danger d-none rounded-3 mb-4"></div>

                <!-- Hidden Master Form for File Upload & Submission -->
                <form id="masterSetupForm" enctype="multipart/form-data">
                    <input type="hidden" name="plan_code" id="inputPlanCode" value="<?= htmlspecialchars($selected_plan_code) ?>">
                    <input type="hidden" name="chosen_template" id="inputTemplate" value="template1">
                    <input type="hidden" name="chosen_layout" id="inputLayout" value="1">
                    <input type="hidden" name="payment_method" id="inputPaymentMethod" value="<?= htmlspecialchars($active_gateway) ?>">

                    <!-- ======================================================== -->
                    <!-- STEP 1: ACCOUNT REGISTRATION -->
                    <!-- ======================================================== -->
                    <div id="sectionStep1" class="wizard-section" style="<?= ($stripe_provision_completed && $stripe_provision_result) ? 'display: none !important;' : '' ?>">
                        <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom border-secondary border-opacity-25 flex-wrap gap-2">
                            <div>
                                <h4 class="fw-bold font-serif text-white mb-1">Create Your SaaS Account</h4>
                                <p class="text-muted small mb-0">Enter your credentials to initiate your salon management platform setup.</p>
                            </div>
                            <div class="bg-dark border border-secondary rounded-3 px-3 py-2 text-end">
                                <span class="small text-muted text-uppercase fw-bold d-block" style="font-size: 11px;">Selected Plan</span>
                                <span class="fw-bold text-warning" id="bannerPlanTitle"><?= htmlspecialchars($current_plan->name) ?></span>
                                <span class="text-white fw-bold ms-1" id="bannerPlanPrice">(<?= $currency_symbol . number_format($current_plan->price, 2) ?>)</span>
                            </div>
                        </div>

                        <div class="row g-4 mb-4">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="custName" required placeholder="e.g. Sarah Jenkins">
                                <div class="field-feedback" id="feedbackName"></div>
                            </div>

                            <!-- Email Address (Unique) -->
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="email" class="form-control" name="email" id="custEmail" required placeholder="e.g. sarah@myelegancesalon.com" onblur="validateUniqueField('email')" oninput="onUniqueInput('email')">
                                    <span id="spinnerEmail" class="spinner-border spinner-border-sm text-warning position-absolute end-0 top-50 translate-middle-y me-3 d-none"></span>
                                </div>
                                <div class="field-feedback" id="feedbackEmail"></div>
                            </div>

                            <!-- Phone Number (Unique) -->
                            <div class="col-md-6">
                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <div class="position-relative">
                                    <input type="tel" class="form-control" name="phone" id="custPhone" required placeholder="e.g. +1 (555) 234-5678" onblur="validateUniqueField('phone')" oninput="onUniqueInput('phone')">
                                    <span id="spinnerPhone" class="spinner-border spinner-border-sm text-warning position-absolute end-0 top-50 translate-middle-y me-3 d-none"></span>
                                </div>
                                <div class="field-feedback" id="feedbackPhone"></div>
                            </div>

                            <!-- Password (Label strictly 'Password') -->
                            <div class="col-md-6">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="custPassword" required placeholder="Create a secure password">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePass('custPassword', this)">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted" style="font-size: 11px;">You will use this password to log in to your dedicated salon administrator dashboard.</small>
                                <div class="field-feedback" id="feedbackPassword"></div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end pt-3">
                            <button type="button" class="btn btn-gold px-4 fw-bold" id="btnSubmitStep1" onclick="processStep1()">
                                Proceed to OTP Verification <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ======================================================== -->
                    <!-- STEP 2: OTP VERIFICATION -->
                    <!-- ======================================================== -->
                    <div id="sectionStep2" class="wizard-section" style="display: none;">
                        <div class="text-center mb-4">
                            <div class="d-inline-flex p-3 rounded-circle bg-warning bg-opacity-10 text-warning mb-3">
                                <i class="fa-solid fa-shield-halved fa-2x"></i>
                            </div>
                            <h4 class="fw-bold font-serif text-white mb-2">Two-Factor OTP Verification</h4>
                            <p class="text-muted small mb-0">
                                We have dispatched a 6-digit security code to your email <strong class="text-white" id="otpTargetEmail"></strong> and mobile number <strong class="text-white" id="otpTargetPhone"></strong>.
                            </p>
                        </div>

                        <!-- Demo OTP Fast Fill Bar -->
                        <div class="p-3 rounded-3 mb-4 d-flex align-items-center justify-content-between flex-wrap gap-2" style="background: rgba(30, 41, 59, 0.6); border: 1px solid #334155;">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-warning text-dark fw-bold"><i class="fa fa-flask me-1"></i> Test OTP</span>
                                <span class="font-monospace fw-bold text-white fs-6" id="demoOtpDisplay">123456</span>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-warning fw-bold" onclick="autoFillDemoOtp()">
                                <i class="fa fa-paste me-1"></i> Auto-Fill Code
                            </button>
                        </div>

                        <!-- 6-Digit Code Inputs -->
                        <div class="otp-input-group">
                            <input type="text" maxlength="1" class="otp-digit" id="otpDigit1" onkeyup="handleOtpInput(1, event)" autofocus>
                            <input type="text" maxlength="1" class="otp-digit" id="otpDigit2" onkeyup="handleOtpInput(2, event)">
                            <input type="text" maxlength="1" class="otp-digit" id="otpDigit3" onkeyup="handleOtpInput(3, event)">
                            <input type="text" maxlength="1" class="otp-digit" id="otpDigit4" onkeyup="handleOtpInput(4, event)">
                            <input type="text" maxlength="1" class="otp-digit" id="otpDigit5" onkeyup="handleOtpInput(5, event)">
                            <input type="text" maxlength="1" class="otp-digit" id="otpDigit6" onkeyup="handleOtpInput(6, event)">
                        </div>

                        <div class="text-center my-3">
                            <span class="text-muted small">Didn't receive the code? </span>
                            <button type="button" class="btn btn-link btn-sm text-warning text-decoration-none fw-bold" id="btnResendOtp" onclick="resendOtpCode()">
                                Resend Code <span id="resendCountdown"></span>
                            </button>
                        </div>

                        <div class="d-flex justify-content-between pt-3">
                            <button type="button" class="btn btn-outline-custom" onclick="goToStep(1)">
                                <i class="fa fa-arrow-left me-1"></i> Edit Account Info
                            </button>
                            <button type="button" class="btn btn-gold px-4 fw-bold" id="btnVerifyOtp" onclick="submitOtpVerification()">
                                Verify &amp; Continue <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ======================================================== -->
                    <!-- STEP 3: SETUP INFORMATION (All setup info comes here) -->
                    <!-- ======================================================== -->
                    <div id="sectionStep3" class="wizard-section" style="display: none;">
                        <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom border-secondary border-opacity-25 flex-wrap gap-2">
                            <div>
                                <h4 class="fw-bold font-serif text-white mb-1">Project &amp; Business Setup Information</h4>
                                <p class="text-muted small mb-0">Enter your salon business identity, directory domain, and upload your visual branding assets.</p>
                            </div>
                            <span class="badge bg-success bg-opacity-10 text-success border border-success px-3 py-2 rounded-pill font-monospace small">
                                <i class="fa fa-check-circle me-1"></i> Account &amp; OTP Verified
                            </span>
                        </div>

                        <!-- 1. Company Information -->
                        <h6 class="fw-bold text-warning font-serif mb-3">
                            <i class="fa fa-building text-warning me-2"></i> 1. Business Profile
                        </h6>
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Salon / Spa Business Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="business_name" id="wizCompanyName" required placeholder="e.g. Belleza Luxury Salon &amp; Spa" oninput="syncBusinessName(this.value)">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Business Tagline / Slogan</label>
                                <input type="text" class="form-control" name="tagline" id="wizTagline" placeholder="e.g. Premium Hair Styling &amp; Holistic Spa Therapies">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Official Business Email</label>
                                <input type="email" class="form-control" name="company_email" id="wizCompanyEmail" placeholder="contact@yoursalon.com">
                                <small class="text-muted d-block mt-1" style="font-size: 11px;">Public email displayed to your clients on website &amp; receipts. (Your salon administrator login remains your personal email from Step 1).</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Official Business Phone</label>
                                <input type="text" class="form-control" name="company_phone" id="wizCompanyPhone" placeholder="+1 (555) 234-5678">
                                <small class="text-muted d-block mt-1" style="font-size: 11px;">Public booking &amp; client support hotline displayed on your website.</small>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Physical Salon Address</label>
                                <input type="text" class="form-control" name="company_address" id="wizAddress" placeholder="Street Address, City, State, ZIP">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Default Currency</label>
                                <select class="form-select" name="currency_symbol" id="wizCurrency">
                                    <option value="$" <?= $currency_symbol === '$' ? 'selected' : '' ?>>$ (USD / CAD / AUD)</option>
                                    <option value="€" <?= $currency_symbol === '€' ? 'selected' : '' ?>>€ (EUR)</option>
                                    <option value="£" <?= $currency_symbol === '£' ? 'selected' : '' ?>>£ (GBP)</option>
                                    <option value="₹" <?= $currency_symbol === '₹' ? 'selected' : '' ?>>₹ (INR)</option>
                                    <option value="AED " <?= $currency_symbol === 'AED ' ? 'selected' : '' ?>>AED (UAE Dirham)</option>
                                    <option value="SAR " <?= $currency_symbol === 'SAR ' ? 'selected' : '' ?>>SAR (Saudi Riyal)</option>
                                </select>
                            </div>
                        </div>

                        <!-- 2. Domain / Directory Setup -->
                        <h6 class="fw-bold text-warning font-serif mb-3">
                            <i class="fa fa-globe text-warning me-2"></i> 2. Domain &amp; Folder Name
                        </h6>
                        <div class="p-3 rounded-4 mb-4" style="background: rgba(30, 41, 59, 0.4); border: 1px solid #334155;">
                            <label class="form-label">Custom Domain / Subdomain / Folder Name <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <div class="input-group">
                                    <span class="input-group-text">https://</span>
                                    <input type="text" class="form-control font-monospace fw-bold" name="domain" id="wizDomain" required placeholder="e.g. www.mysalon.com or elegancespa" oninput="onDomainInput(this.value)" onblur="validateDomainUnique(this.value)">
                                </div>
                                <span id="spinnerDomain" class="spinner-border spinner-border-sm text-warning position-absolute end-0 top-50 translate-middle-y me-3 d-none"></span>
                            </div>
                            <div class="field-feedback" id="feedbackDomain"></div>
                            <div class="alert alert-info py-2 px-3 small border-0 mt-3 mb-0" style="background: rgba(59, 130, 246, 0.1); color: #93c5fd;">
                                <i class="fa fa-folder-tree me-2"></i> A dedicated tenant directory and isolated database will be provisioned at: <strong class="font-monospace text-white" id="domainPathPreview">localhost/spasalonmanagement/</strong>
                            </div>
                        </div>

                        <!-- 3. Visual Branding Assets -->
                        <h6 class="fw-bold text-warning font-serif mb-3">
                            <i class="fa fa-palette text-warning me-2"></i> 3. Branding Assets (Logo &amp; Favicon)
                        </h6>
                        <div class="row g-4 mb-4">
                            <!-- Logo Upload -->
                            <div class="col-md-6">
                                <label class="form-label d-flex justify-content-between">
                                    <span>Company Logo</span>
                                    <small class="text-muted">PNG, JPG, SVG, WebP</small>
                                </label>
                                <div class="upload-dropzone" onclick="document.getElementById('logoFileInput').click()">
                                    <i class="fa fa-cloud-arrow-up fa-2x text-warning opacity-75 mb-2"></i>
                                    <h6 class="fw-bold text-white mb-1 fs-6">Click to select Company Logo</h6>
                                    <p class="text-muted small mb-0">Recommended size: 250 &times; 60px</p>
                                    <input type="file" name="company_logo" id="logoFileInput" class="d-none" accept="image/*" onchange="previewAsset(this, 'previewLogoImg', 'logoSelectedName')">
                                    <div id="logoSelectedName" class="small text-warning mt-2 fw-semibold">Default luxury logo is used if skipped</div>
                                    <img id="previewLogoImg" class="preview-img-box mx-auto" alt="Logo Preview">
                                </div>
                            </div>

                            <!-- Favicon Upload -->
                            <div class="col-md-6">
                                <label class="form-label d-flex justify-content-between">
                                    <span>Browser Favicon</span>
                                    <small class="text-muted">ICO, PNG, WebP</small>
                                </label>
                                <div class="upload-dropzone" onclick="document.getElementById('favFileInput').click()">
                                    <i class="fa fa-certificate fa-2x text-info opacity-75 mb-2"></i>
                                    <h6 class="fw-bold text-white mb-1 fs-6">Click to select Favicon</h6>
                                    <p class="text-muted small mb-0">Recommended size: 32 &times; 32px or 64 &times; 64px</p>
                                    <input type="file" name="favicon" id="favFileInput" class="d-none" accept=".ico,image/png,image/x-icon,image/webp" onchange="previewAsset(this, 'previewFavImg', 'favSelectedName')">
                                    <div id="favSelectedName" class="small text-info mt-2 fw-semibold">Default luxury icon is used if skipped</div>
                                    <img id="previewFavImg" class="preview-img-box mx-auto" alt="Favicon Preview" style="max-height: 36px; max-width: 36px;">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between pt-3">
                            <button type="button" class="btn btn-outline-custom" onclick="goToStep(2)">
                                <i class="fa fa-arrow-left me-1"></i> Back
                            </button>
                            <button type="button" class="btn btn-gold px-4 fw-bold" id="btnSubmitStep3" onclick="validateStep3AndProceed()">
                                Next: Choose Template &amp; Layout <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ======================================================== -->
                    <!-- STEP 4: CHOOSE TEMPLATE & HOMEPAGE LAYOUT -->
                    <!-- ======================================================== -->
                    <div id="sectionStep4" class="wizard-section" style="display: none;">
                        <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom border-secondary border-opacity-25 flex-wrap gap-2">
                            <div>
                                <h4 class="fw-bold font-serif text-white mb-1">Select Website Theme &amp; Homepage Layout</h4>
                                <p class="text-muted small mb-0">Choose your client-facing website aesthetics and default homepage arrangement.</p>
                            </div>
                            <span class="badge bg-warning text-dark fw-bold px-3 py-2 rounded-pill font-monospace small">
                                <i class="fa fa-sparkles me-1"></i> Multi-Theme Engine
                            </span>
                        </div>

                        <!-- 1. Choose Theme Template -->
                        <h6 class="fw-bold text-warning font-serif mb-3">
                            <i class="fa fa-palette text-warning me-2"></i> 1. Choose Your Website Theme Template:
                        </h6>
                        <div class="row g-4 mb-4">
                            <?php foreach ($templates as $t_key => $t): ?>
                                <div class="col-md-6">
                                    <div class="tpl-card <?= $t_key === 'template1' ? 'active' : '' ?>" id="cardTpl_<?= $t_key ?>" onclick="selectTemplate('<?= $t_key ?>')">
                                        <div class="d-flex align-items-start justify-content-between mb-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="p-2 rounded-3 bg-warning bg-opacity-10 text-warning" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="<?= htmlspecialchars($t->icon ?: 'fa-solid fa-crown') ?> fa-lg"></i>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold text-white mb-0 fs-6"><?= htmlspecialchars($t->name) ?></h6>
                                                    <span class="badge border border-secondary text-light" style="background: rgba(30, 41, 59, 0.7); font-size: 11px;">
                                                        <?= count($t->layouts) ?> Homepage Layouts Available
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="badge bg-warning text-dark fw-bold px-2 py-1 check-badge" id="checkTpl_<?= $t_key ?>" style="<?= $t_key === 'template1' ? '' : 'display: none;' ?>">
                                                <i class="fa fa-check"></i>
                                            </span>
                                        </div>
                                        <p class="small text-muted mb-3"><?= htmlspecialchars($t->short_desc) ?></p>
                                        <?php 
                                            $features_arr = !empty($t->features) ? (is_array($t->features) ? $t->features : json_decode($t->features, true)) : [];
                                            if (!empty($features_arr)): 
                                        ?>
                                            <div class="d-flex flex-wrap gap-1">
                                                <?php foreach (array_slice($features_arr, 0, 3) as $feat): ?>
                                                    <span class="badge border border-secondary text-light fw-normal small" style="background: rgba(30, 41, 59, 0.7);"><i class="fa fa-check text-success me-1"></i><?= htmlspecialchars($feat) ?></span>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- 2. Choose Homepage Layout -->
                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                            <h6 class="fw-bold text-warning font-serif mb-0">
                                <i class="fa fa-th-large text-warning me-2"></i> 2. Choose Default Homepage Layout:
                            </h6>
                            <span class="badge border border-secondary text-light font-monospace small" style="background: rgba(30, 41, 59, 0.7);">Click card to select &bull; Click Zoom to preview</span>
                        </div>

                        <div class="row g-3 mb-4" id="layoutsContainer">
                            <!-- Populated dynamically via JS -->
                        </div>

                        <div class="d-flex justify-content-between pt-3">
                            <button type="button" class="btn btn-outline-custom" onclick="goToStep(3)">
                                <i class="fa fa-arrow-left me-1"></i> Back to Setup Info
                            </button>
                            <button type="button" class="btn btn-gold px-4 fw-bold" onclick="goToStep(5)">
                                Next: Payment <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ======================================================== -->
                    <!-- STEP 5: PAYMENT (Final Step, Submit button: 'Payment') -->
                    <!-- ======================================================== -->
                    <div id="sectionStep5" class="wizard-section" style="display: none;">
                        <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom border-secondary border-opacity-25 flex-wrap gap-2">
                            <div>
                                <h4 class="fw-bold font-serif text-white mb-1">Order Review &amp; Payment</h4>
                                <p class="text-muted small mb-0">Verify your setup parameters and complete checkout to deploy your SaaS instance.</p>
                            </div>
                            <span class="badge bg-warning text-dark fw-bold px-3 py-2 rounded-pill font-monospace small">
                                <i class="fa fa-lock me-1"></i> 256-bit SSL Secure Checkout
                            </span>
                        </div>

                        <!-- Order Summary Card -->
                        <div class="p-4 rounded-4 mb-4" style="background: rgba(30, 41, 59, 0.4); border: 1px solid #334155;">
                            <h6 class="fw-bold text-white font-serif mb-3">Subscription &amp; Deployment Summary</h6>
                            <div class="row g-3 text-white small">
                                <div class="col-sm-6 col-md-3">
                                    <span class="text-muted d-block">Software Edition:</span>
                                    <strong class="text-warning fs-6" id="summaryEditionTitle"><?= htmlspecialchars($current_plan->name) ?></strong>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <span class="text-muted d-block">Salon Business:</span>
                                    <strong class="text-white" id="summaryBusinessTitle">Belleza Luxury Salon</strong>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <span class="text-muted d-block">Domain Directory:</span>
                                    <strong class="font-monospace text-info" id="summaryDomainTitle">-</strong>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <span class="text-muted d-block">Admin Login Account:</span>
                                    <strong class="font-monospace text-warning" id="summaryAdminEmail">-</strong>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <span class="text-muted d-block">Theme &amp; Layout:</span>
                                    <strong class="text-white" id="summaryTemplateTitle">Template 1 - Layout 1</strong>
                                </div>
                                <div class="col-12 pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center">
                                    <span class="text-muted fs-6">Total Subscription Rate:</span>
                                    <span class="fs-4 fw-bold text-warning" id="summaryPriceDisplay"><?= $currency_symbol . number_format($current_plan->price, 2) ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Method Card -->
                        <div class="p-4 rounded-4 mb-4" style="background: rgba(20, 29, 48, 0.6); border: 1px solid #2e3e5c;">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-credit-card text-warning fa-lg"></i>
                                    <h6 class="fw-bold text-white mb-0">Payment Gateway Checkout</h6>
                                </div>
                                <div class="d-flex gap-2">
                                    <span class="badge bg-success bg-opacity-25 text-success border border-success px-3 py-1">
                                        <i class="fa fa-shield-halved me-1"></i> PCI-DSS Level 1 Encrypted
                                    </span>
                                </div>
                            </div>

                            <!-- Gateway Selection Pills -->
                            <div class="d-flex flex-wrap gap-2 mb-3" id="gatewayChoiceGroup">
                                <label class="btn btn-outline-warning py-2 px-3 rounded-3 d-flex align-items-center gap-2 <?= ($active_gateway === 'stripe') ? 'active' : '' ?>" id="lblGwStripe" style="cursor: pointer;">
                                    <input type="radio" name="payment_gateway_choice" value="stripe" class="d-none" <?= ($active_gateway === 'stripe') ? 'checked' : '' ?> onchange="switchGatewayCard('stripe')">
                                    <i class="fa-brands fa-stripe fa-lg"></i> Stripe Official
                                </label>
                                <label class="btn btn-outline-warning py-2 px-3 rounded-3 d-flex align-items-center gap-2 <?= ($active_gateway === 'razorpay') ? 'active' : '' ?>" id="lblGwRazorpay" style="cursor: pointer;">
                                    <input type="radio" name="payment_gateway_choice" value="razorpay" class="d-none" <?= ($active_gateway === 'razorpay') ? 'checked' : '' ?> onchange="switchGatewayCard('razorpay')">
                                    <i class="fa-solid fa-bolt"></i> Razorpay Standard
                                </label>
                                <label class="btn btn-outline-secondary text-light py-2 px-3 rounded-3 d-flex align-items-center gap-2 <?= ($active_gateway === 'sandbox' || $active_gateway === 'offline') ? 'active' : '' ?>" id="lblGwSandbox" style="cursor: pointer;">
                                    <input type="radio" name="payment_gateway_choice" value="sandbox" class="d-none" <?= ($active_gateway === 'sandbox' || $active_gateway === 'offline') ? 'checked' : '' ?> onchange="switchGatewayCard('sandbox')">
                                    <i class="fa-solid fa-flask"></i> Sandbox / Demo
                                </label>
                            </div>

                            <!-- 1. Stripe Official Hosted Checkout Card -->
                            <div id="cardGatewayStripe" class="gateway-detail-card" style="display: <?= ($active_gateway === 'stripe') ? 'block' : 'none' ?>;">
                                <div class="p-3 rounded-3 border border-primary border-opacity-50" style="background: rgba(59, 130, 246, 0.08);">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fa-brands fa-stripe fa-2x text-primary me-2"></i>
                                            <div>
                                                <span class="fw-bold text-white d-block">Stripe Official Hosted Checkout</span>
                                                <small class="text-muted">Direct dispatch to checkout.stripe.com</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-success small"><i class="fa-solid fa-lock me-1"></i> Active Gateway</span>
                                    </div>
                                    <p class="small text-light mb-3">You will be securely redirected to <strong>Stripe's Official Hosted Payment Page</strong> to complete your order. All credit/debit card numbers are entered strictly on Stripe's PCI-DSS Level 1 certified servers. We never handle or store your sensitive card details.</p>
                                    <div class="d-flex flex-wrap gap-2 align-items-center pt-2 border-top border-secondary border-opacity-25">
                                        <span class="small text-muted me-2"><i class="fa-solid fa-shield-halved text-success me-1"></i> Supported via Stripe:</span>
                                        <span class="badge bg-light text-dark border"><i class="fa-brands fa-cc-visa text-primary me-1"></i> Visa</span>
                                        <span class="badge bg-light text-dark border"><i class="fa-brands fa-cc-mastercard text-danger me-1"></i> Mastercard</span>
                                        <span class="badge bg-light text-dark border"><i class="fa-brands fa-cc-amex text-info me-1"></i> Amex</span>
                                        <span class="badge bg-light text-dark border"><i class="fa-brands fa-apple text-dark me-1"></i> Apple Pay</span>
                                        <span class="badge bg-light text-dark border"><i class="fa-brands fa-google text-success me-1"></i> Google Pay</span>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Razorpay Official Standard Checkout Card -->
                            <div id="cardGatewayRazorpay" class="gateway-detail-card" style="display: <?= ($active_gateway === 'razorpay') ? 'block' : 'none' ?>;">
                                <div class="p-3 rounded-3 border border-primary border-opacity-50" style="background: rgba(59, 130, 246, 0.08);">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-bolt fa-lg text-primary me-2"></i>
                                            <div>
                                                <span class="fw-bold text-white d-block">Razorpay Official Standard Checkout</span>
                                                <small class="text-muted">Powered by checkout.razorpay.com</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-success small"><i class="fa-solid fa-lock me-1"></i> Official Gateway</span>
                                    </div>
                                    <p class="small text-light mb-3">Clicking below will open the <strong>Official Razorpay Checkout Dialog</strong> to finalize payment with instant verification.</p>
                                    <div class="d-flex flex-wrap gap-2 align-items-center pt-2 border-top border-secondary border-opacity-25">
                                        <span class="small text-muted me-2"><i class="fa-solid fa-shield-halved text-success me-1"></i> Supported:</span>
                                        <span class="badge bg-light text-dark border"><i class="fa-solid fa-mobile-screen-button text-success me-1"></i> Instant UPI (GPay / PhonePe / Paytm)</span>
                                        <span class="badge bg-light text-dark border"><i class="fa-regular fa-credit-card text-primary me-1"></i> All Debit &amp; Credit Cards</span>
                                        <span class="badge bg-light text-dark border"><i class="fa-solid fa-building-columns text-info me-1"></i> NetBanking (50+ Banks)</span>
                                        <span class="badge bg-light text-dark border"><i class="fa-solid fa-wallet text-warning me-1"></i> Digital Wallets</span>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Sandbox / Demo Card -->
                            <div id="cardGatewaySandbox" class="gateway-detail-card" style="display: <?= ($active_gateway === 'sandbox' || $active_gateway === 'offline') ? 'block' : 'none' ?>;">
                                <div class="p-3 rounded-3 border border-warning border-opacity-50" style="background: rgba(245, 158, 11, 0.08);">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-laptop-code text-warning fa-lg me-2"></i>
                                            <div>
                                                <span class="fw-bold text-white d-block">Simulated Instant Payment (Sandbox / Demo)</span>
                                                <small class="text-muted">Testing environment</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-warning text-dark small"><i class="fa-solid fa-flask me-1"></i> Sandbox Active</span>
                                    </div>
                                    <p class="small text-light mb-0">Submitting will simulate instant successful payment and immediately advance to the automated tenant deployment pipeline.</p>
                                </div>
                            </div>

                            <!-- Alert Box for Payment Error / Warning -->
                            <div id="checkoutPaymentAlert" class="alert alert-danger d-none mt-3 small"></div>

                            <!-- Optional Instant Demo Checkbox for Local Development Testing -->
                            <div class="mt-3 pt-3 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-between">
                                <label class="form-check-label text-light small d-flex align-items-center gap-2" for="toggleSandboxSim">
                                    <input class="form-check-input mt-0" type="checkbox" id="toggleSandboxSim" onchange="toggleSimulatePayment(this.checked)">
                                    <span>Simulate instant payment (Sandbox / Demo Mode for testing)</span>
                                </label>
                                <span class="badge border border-secondary text-light small" style="background: rgba(30, 41, 59, 0.7);">Local Dev Friendly</span>
                            </div>
                        </div>

                        <!-- Navigation & The Payment Button (Button text strictly 'Payment') -->
                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <button type="button" class="btn btn-outline-custom" onclick="goToStep(4)">
                                <i class="fa fa-arrow-left me-1"></i> Back to Templates
                            </button>

                            <!-- The Button: Labeled strictly "Payment" as explicitly requested -->
                            <button type="button" class="btn btn-gold btn-lg px-5 fw-bold shadow-lg" id="btnSubmitPayment" onclick="executeFinalPayment()">
                                <span id="spinnerPayment" class="spinner-border spinner-border-sm me-2 d-none"></span>
                                Payment
                            </button>
                        </div>
                    </div>

                    <!-- ======================================================== -->
                    <!-- LIVE DEPLOYMENT PROGRESSION / INSTALLATION PAGE -->
                    <!-- ======================================================== -->
                    <div id="sectionDeploying" class="wizard-section" style="<?= ($stripe_provision_completed && $stripe_provision_result) ? 'display: block !important;' : 'display: none !important;' ?>">
                        <div class="text-center py-4">
                            <div class="spinner-border text-warning mb-3" style="width: 3.5rem; height: 3.5rem;" role="status"></div>
                            <h3 class="fw-bold font-serif text-white mb-2">Deploying Your SaaS Project Instance...</h3>
                            <p class="text-muted small mb-4">Please wait while the engine provisions the directory, copies files, configures database and deploys your salon portal.</p>
                        </div>

                        <div class="deploy-progress-container mx-auto mb-4" style="max-width: 680px;">
                            <!-- Progress Bar with Percentage and Live Status Notice -->
                            <div class="d-flex justify-content-between align-items-center mb-2 px-1">
                                <span class="small text-muted fw-semibold">
                                    <i class="fa-solid fa-gear fa-spin me-1 text-warning"></i> <span id="deployStatusNotice">Deploying files &amp; services...</span>
                                </span>
                                <span id="deployPercentText" class="badge bg-warning text-dark fw-bold font-monospace px-2 py-1">15%</span>
                            </div>
                            <div class="progress mb-4 shadow-sm" style="height: 14px; border-radius: 12px; background: rgba(255,255,255,0.08); overflow: hidden;">
                                <div id="deployProgressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-warning fw-bold text-dark font-monospace" role="progressbar" style="width: 15%; transition: width 0.35s ease; font-size: 0.75rem;">15%</div>
                            </div>

                            <div class="p-4 rounded-4 bg-dark bg-opacity-50 border border-secondary border-opacity-25 mb-4 shadow-lg">
                                <div class="deploy-check-item running" id="dpStep1">
                                    <i class="fa-solid fa-spinner fa-spin text-warning me-2"></i>
                                    <span>1. Processing transaction &amp; generating commercial license...</span>
                                </div>
                                <div class="deploy-check-item pending" id="dpStep2">
                                    <i class="fa-solid fa-circle-notch text-muted me-2"></i>
                                    <span>2. Creating dedicated server directory <strong class="text-white font-monospace" id="dpDomainDisplay">www.example.com</strong>...</span>
                                </div>
                                <div class="deploy-check-item pending" id="dpStep3">
                                    <i class="fa-solid fa-circle-notch text-muted me-2"></i>
                                    <span>3. Copying frontend website files &amp; multi-template assets...</span>
                                </div>
                                <div class="deploy-check-item pending" id="dpStep4">
                                    <i class="fa-solid fa-circle-notch text-muted me-2"></i>
                                    <span>4. Deploying dedicated Salon &amp; Spa Admin Panel into /admin...</span>
                                </div>
                                <div class="deploy-check-item pending" id="dpStep5">
                                    <i class="fa-solid fa-circle-notch text-muted me-2"></i>
                                    <span>5. Embedding custom company logo &amp; favicon branding...</span>
                                </div>
                                <div class="deploy-check-item pending" id="dpStep6">
                                    <i class="fa-solid fa-circle-notch text-muted me-2"></i>
                                    <span>6. Provisioning isolated tenant database &amp; administrator account...</span>
                                </div>
                                <div class="deploy-check-item pending" id="dpStep7">
                                    <i class="fa-solid fa-circle-notch text-muted me-2"></i>
                                    <span>7. Finalizing live URLs &amp; configuration locks...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ======================================================== -->
                    <!-- DEPLOYMENT SUCCESS / LAUNCH HUB -->
                    <!-- ======================================================== -->
                    <div id="sectionComplete" class="wizard-section" style="display: none !important;">
                        <div class="text-center mb-4">
                            <div class="d-inline-flex p-3 rounded-circle bg-success bg-opacity-10 text-success mb-3">
                                <i class="fa-solid fa-circle-check fa-3x"></i>
                            </div>
                            <h3 class="fw-bold font-serif text-white mb-2">Your Salon SaaS Instance is Live!</h3>
                            <p class="text-muted mb-0">Your dedicated salon management suite has been successfully deployed and isolated.</p>
                        </div>

                        <!-- Hub Quick Links -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <a id="hubLinkSite" href="#" target="_blank" class="hub-link-card">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="p-3 rounded-3 bg-primary bg-opacity-10 text-primary">
                                                <i class="fa-solid fa-globe fa-2x"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold text-white mb-0">Frontend Website</h5>
                                                <small class="text-muted">Client-Facing Portal</small>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-arrow-up-right-from-square text-warning fa-lg"></i>
                                    </div>
                                    <p class="small text-muted mb-2">Visit your public salon website featuring the chosen theme and layout.</p>
                                    <div class="font-monospace small text-primary" id="hubUrlSite">http://localhost/...</div>
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a id="hubLinkAdmin" href="#" target="_blank" class="hub-link-card">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="p-3 rounded-3 bg-warning bg-opacity-10 text-warning">
                                                <i class="fa-solid fa-user-shield fa-2x"></i>
                                            </div>
                                            <div>
                                                <h5 class="fw-bold text-white mb-0">Admin Management Panel</h5>
                                                <small class="text-muted">Dedicated Salon Control Hub</small>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-arrow-up-right-from-square text-warning fa-lg"></i>
                                    </div>
                                    <p class="small text-muted mb-2">Log in with your administrator credentials to manage bookings, staff, and services.</p>
                                    <div class="font-monospace small text-warning" id="hubUrlAdmin">http://localhost/.../admin/</div>
                                </a>
                            </div>
                        </div>

                        <!-- Credentials & Database Details -->
                        <div class="p-4 rounded-4 mb-4" style="background: rgba(30, 41, 59, 0.5); border: 1px solid #334155;">
                            <h6 class="fw-bold text-warning font-serif mb-3">
                                <i class="fa-solid fa-key text-warning me-2"></i> Dedicated Administrator Credentials
                            </h6>
                            <div class="row g-3 small">
                                <div class="col-md-4">
                                    <span class="text-muted d-block">Administrator Email:</span>
                                    <strong class="text-white font-monospace" id="hubAdminEmail"></strong>
                                </div>
                                <div class="col-md-4">
                                    <span class="text-muted d-block">Administrator Password:</span>
                                    <strong class="text-warning font-monospace" id="hubAdminPass"></strong>
                                </div>
                                <div class="col-md-4">
                                    <span class="text-muted d-block">Tenant Database:</span>
                                    <strong class="text-info font-monospace" id="hubDbName"></strong>
                                </div>
                            </div>
                        </div>

                        <!-- Source Code Download & Return -->
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2">
                            <a id="hubDownloadLink" href="#" class="btn btn-outline-custom">
                                <i class="fa-solid fa-download me-2"></i> Download Clean Source Package (.zip)
                            </a>
                            <a href="index.php" class="btn btn-gold px-4 fw-bold">
                                <i class="fa fa-home me-2"></i> Return to Marketplace
                            </a>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- Layout Zoom Preview Modal -->
    <div class="modal fade" id="layoutZoomModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-dark text-white border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title font-serif text-warning" id="layoutZoomTitle">Layout Preview</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0 text-center bg-black" style="max-height: 80vh; overflow-y: auto;">
                    <img id="layoutZoomImg" src="" alt="Layout Preview" class="img-fluid" style="width: 100%;">
                </div>
                <div class="modal-footer border-secondary d-flex justify-content-between">
                    <a id="layoutLiveLink" href="#" target="_blank" class="btn btn-outline-warning btn-sm">
                        <i class="fa fa-external-link me-1"></i> Open Interactive Demo in New Tab
                    </a>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="website/assets/template1/js/bootstrap.bundle.min.js"></script>
    <!-- Official Razorpay Standard Checkout SDK -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        // State variables
        let currentStep = 1;
        let selectedPlan = '<?= $selected_plan_code ?>';
        let selectedTemplate = 'template1';
        let selectedLayout = 1;
        let resendTimer = null;
        let resendSeconds = 60;

        // Dynamic Templates Data
        const templatesData = <?= json_encode($templates) ?>;

        // On Page Load
        window.addEventListener('DOMContentLoaded', () => {
            renderLayoutCards('template1');

            <?php if ($stripe_provision_completed && $stripe_provision_result): ?>
                // Show installation page with loading bar after successful Stripe payment
                const stripeResult = <?= json_encode($stripe_provision_result) ?>;
                runDeploymentAnimation(stripeResult);
            <?php elseif (!empty($stripe_callback_error)): ?>
                goToStep(5);
                showPaymentAlert('Stripe Payment Notice: <?= addslashes($stripe_callback_error) ?><br><button type="button" class="btn btn-sm btn-outline-warning mt-2" onclick="executeFinalPaymentWithTransaction(\'sandbox\', \'SANDBOX-\' + Date.now())"><i class="fa fa-flask me-1"></i> Continue with Sandbox / Demo Payment</button>');
            <?php elseif (isset($_GET['payment_cancelled'])): ?>
                goToStep(5);
                showPaymentAlert('Payment checkout was cancelled on the gateway. You can retry or choose another payment method below.');
            <?php endif; ?>
        });

        // Switch Plan
        function switchPlan(code, name, price) {
            selectedPlan = code;
            document.getElementById('inputPlanCode').value = code;
            const navDisp = document.getElementById('navPlanNameDisplay');
            if (navDisp) navDisp.textContent = name;
            document.getElementById('bannerPlanTitle').textContent = name;
            document.getElementById('bannerPlanPrice').textContent = '(<?= $currency_symbol ?>' + parseFloat(price).toFixed(2) + ')';
            document.getElementById('summaryEditionTitle').textContent = name;
            document.getElementById('summaryPriceDisplay').textContent = '<?= $currency_symbol ?>' + parseFloat(price).toFixed(2);
        }

        // Show/Hide Password Toggle
        function togglePass(inputId, btn) {
            const inp = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (inp.type === 'password') {
                inp.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                inp.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Step Navigation Controller
        function goToStep(step) {
            currentStep = step;
            hideAlert();

            const stepBar = document.getElementById('wizardStepBar');
            if (stepBar) stepBar.style.setProperty('display', 'flex', 'important');

            // Sections
            for (let i = 1; i <= 5; i++) {
                const s = document.getElementById('sectionStep' + i);
                if (s) s.style.setProperty('display', (i === step) ? 'block' : 'none', 'important');
            }
            const dep = document.getElementById('sectionDeploying');
            if (dep) dep.style.setProperty('display', 'none', 'important');
            const comp = document.getElementById('sectionComplete');
            if (comp) comp.style.setProperty('display', 'none', 'important');

            // Nodes
            for (let i = 1; i <= 5; i++) {
                const node = document.getElementById('nodeStep' + i);
                if (!node) continue;
                node.classList.remove('active', 'completed');
                if (i === step) {
                    node.classList.add('active');
                } else if (i < step) {
                    node.classList.add('completed');
                }
            }

            // Sync Summaries on Step 5
            if (step === 5) {
                const bName = document.getElementById('wizCompanyName').value.trim() || 'My Salon & Spa';
                const dName = document.getElementById('wizDomain').value.trim();
                const adminEmail = document.getElementById('custEmail').value.trim();
                document.getElementById('summaryBusinessTitle').textContent = bName;
                document.getElementById('summaryDomainTitle').textContent = dName || '-';
                if (document.getElementById('summaryAdminEmail')) {
                    document.getElementById('summaryAdminEmail').textContent = adminEmail;
                }
                const tplObj = templatesData[selectedTemplate];
                const tplName = tplObj ? tplObj.name : selectedTemplate;
                document.getElementById('summaryTemplateTitle').textContent = tplName + ' - Layout ' + selectedLayout;
            }

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Alert Helpers
        function showAlert(msg) {
            const el = document.getElementById('wizardAlert');
            el.textContent = msg;
            el.classList.remove('d-none');
            window.scrollTo({ top: 120, behavior: 'smooth' });
        }
        function hideAlert() {
            const el = document.getElementById('wizardAlert');
            el.classList.add('d-none');
            el.textContent = '';
        }

        // ==========================================
        // STEP 1 VALIDATION & UNIQUENESS CHECK
        // ==========================================
        let emailIsDuplicate = false;
        let phoneIsDuplicate = false;
        let debounceUniqueTimer = null;

        function updateStep1ButtonState() {
            const btn = document.getElementById('btnSubmitStep1');
            if (!btn) return;
            if (emailIsDuplicate || phoneIsDuplicate) {
                btn.disabled = true;
                btn.classList.add('disabled');
                btn.style.cursor = 'not-allowed';
                btn.style.opacity = '0.5';
                btn.title = 'Please enter a unique email address and phone number to proceed.';
            } else {
                btn.disabled = false;
                btn.classList.remove('disabled');
                btn.style.cursor = 'pointer';
                btn.style.opacity = '1';
                btn.title = '';
            }
        }

        function onUniqueInput(field) {
            clearTimeout(debounceUniqueTimer);
            debounceUniqueTimer = setTimeout(() => {
                validateUniqueField(field);
            }, 450);
        }

        async function validateUniqueField(field) {
            const emailInp = document.getElementById('custEmail');
            const phoneInp = document.getElementById('custPhone');
            const feedbackEl = (field === 'email') ? document.getElementById('feedbackEmail') : document.getElementById('feedbackPhone');
            const spinner = (field === 'email') ? document.getElementById('spinnerEmail') : document.getElementById('spinnerPhone');
            const val = (field === 'email') ? emailInp.value.trim() : phoneInp.value.trim();

            if (!val) {
                feedbackEl.textContent = '';
                if (field === 'email') {
                    emailIsDuplicate = false;
                    emailInp.classList.remove('is-invalid-custom');
                }
                if (field === 'phone') {
                    phoneIsDuplicate = false;
                    phoneInp.classList.remove('is-invalid-custom');
                }
                updateStep1ButtonState();
                return true;
            }

            spinner.classList.remove('d-none');
            const formData = new FormData();
            formData.append('action', 'check_unique');
            if (field === 'email') formData.append('email', val);
            if (field === 'phone') formData.append('phone', val);

            try {
                const res = await fetch('subscribe_api.php', { method: 'POST', body: formData });
                const data = await res.json();
                spinner.classList.add('d-none');

                if (data.status === 'error') {
                    feedbackEl.textContent = data.message;
                    feedbackEl.className = 'field-feedback error';
                    if (field === 'email') {
                        emailIsDuplicate = true;
                        emailInp.classList.add('is-invalid-custom');
                        emailInp.classList.remove('is-valid-custom');
                    }
                    if (field === 'phone') {
                        phoneIsDuplicate = true;
                        phoneInp.classList.add('is-invalid-custom');
                        phoneInp.classList.remove('is-valid-custom');
                    }
                    updateStep1ButtonState();
                    return false;
                } else {
                    feedbackEl.textContent = (field === 'email') ? '✓ Email is available' : '✓ Phone number is available';
                    feedbackEl.className = 'field-feedback success';
                    if (field === 'email') {
                        emailIsDuplicate = false;
                        emailInp.classList.remove('is-invalid-custom');
                        emailInp.classList.add('is-valid-custom');
                    }
                    if (field === 'phone') {
                        phoneIsDuplicate = false;
                        phoneInp.classList.remove('is-invalid-custom');
                        phoneInp.classList.add('is-valid-custom');
                    }
                    updateStep1ButtonState();
                    return true;
                }
            } catch (err) {
                spinner.classList.add('d-none');
                return true;
            }
        }

        async function processStep1() {
            hideAlert();

            if (emailIsDuplicate || phoneIsDuplicate) {
                updateStep1ButtonState();
                showAlert('Please provide a unique email address and phone number to proceed.');
                return;
            }

            const name = document.getElementById('custName').value.trim();
            const email = document.getElementById('custEmail').value.trim();
            const phone = document.getElementById('custPhone').value.trim();
            const password = document.getElementById('custPassword').value.trim();

            if (!name) {
                showAlert('Please enter your full name.');
                return;
            }
            if (!email) {
                showAlert('Please enter your email address.');
                return;
            }
            if (!phone) {
                showAlert('Please enter your phone number.');
                return;
            }
            if (!password || password.length < 6) {
                showAlert('Password must be at least 6 characters.');
                return;
            }

            const btn = document.getElementById('btnSubmitStep1');
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Checking & Sending OTP...';

            const formData = new FormData();
            formData.append('action', 'send_otp');
            formData.append('name', name);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('password', password);

            try {
                const res = await fetch('subscribe_api.php', { method: 'POST', body: formData });
                const data = await res.json();
                btn.disabled = false;
                btn.innerHTML = 'Proceed to OTP Verification <i class="fa fa-arrow-right ms-2"></i>';

                if (data.status === 'success') {
                    // Pre-fill Step 3 contacts if not already entered
                    const compEmailEl = document.getElementById('wizCompanyEmail');
                    const compPhoneEl = document.getElementById('wizCompanyPhone');
                    if (compEmailEl && !compEmailEl.value) compEmailEl.value = email;
                    if (compPhoneEl && !compPhoneEl.value) compPhoneEl.value = phone;

                    // Update Step 2 targets
                    document.getElementById('otpTargetEmail').textContent = email;
                    document.getElementById('otpTargetPhone').textContent = phone;
                    if (data.demo_otp) {
                        document.getElementById('demoOtpDisplay').textContent = data.demo_otp;
                    }

                    startResendTimer();
                    goToStep(2);
                } else {
                    showAlert(data.message || 'Error sending verification code.');
                    if (data.field === 'email') {
                        emailIsDuplicate = true;
                        document.getElementById('feedbackEmail').textContent = data.message;
                        document.getElementById('feedbackEmail').className = 'field-feedback error';
                        document.getElementById('custEmail').classList.add('is-invalid-custom');
                    }
                    if (data.field === 'phone') {
                        phoneIsDuplicate = true;
                        document.getElementById('feedbackPhone').textContent = data.message;
                        document.getElementById('feedbackPhone').className = 'field-feedback error';
                        document.getElementById('custPhone').classList.add('is-invalid-custom');
                    }
                    updateStep1ButtonState();
                }
            } catch (err) {
                btn.disabled = false;
                btn.innerHTML = 'Proceed to OTP Verification <i class="fa fa-arrow-right ms-2"></i>';
                showAlert('Server connection error. Please try again.');
            }
        }

        // ==========================================
        // STEP 2: OTP VERIFICATION
        // ==========================================
        function handleOtpInput(index, event) {
            const curr = document.getElementById('otpDigit' + index);
            if (event.key === 'Backspace' && !curr.value && index > 1) {
                document.getElementById('otpDigit' + (index - 1)).focus();
                return;
            }
            if (curr.value && index < 6) {
                document.getElementById('otpDigit' + (index + 1)).focus();
            }
        }

        function autoFillDemoOtp() {
            const code = document.getElementById('demoOtpDisplay').textContent.trim();
            if (code.length === 6) {
                for (let i = 1; i <= 6; i++) {
                    document.getElementById('otpDigit' + i).value = code.charAt(i - 1);
                }
            }
        }

        function startResendTimer() {
            resendSeconds = 60;
            const btn = document.getElementById('btnResendOtp');
            const span = document.getElementById('resendCountdown');
            btn.disabled = true;

            clearInterval(resendTimer);
            resendTimer = setInterval(() => {
                resendSeconds--;
                if (resendSeconds <= 0) {
                    clearInterval(resendTimer);
                    btn.disabled = false;
                    span.textContent = '';
                } else {
                    span.textContent = '(' + resendSeconds + 's)';
                }
            }, 1000);
        }

        async function resendOtpCode() {
            const btn = document.getElementById('btnResendOtp');
            btn.disabled = true;
            btn.textContent = 'Sending...';

            const formData = new FormData();
            formData.append('action', 'resend_otp');

            try {
                const res = await fetch('subscribe_api.php', { method: 'POST', body: formData });
                const data = await res.json();
                btn.innerHTML = 'Resend Code <span id="resendCountdown"></span>';
                if (data.status === 'success') {
                    if (data.demo_otp) {
                        document.getElementById('demoOtpDisplay').textContent = data.demo_otp;
                    }
                    startResendTimer();
                } else {
                    showAlert(data.message || 'Failed to resend code.');
                }
            } catch (err) {
                btn.innerHTML = 'Resend Code <span id="resendCountdown"></span>';
                showAlert('Error connecting to server.');
            }
        }

        async function submitOtpVerification() {
            hideAlert();
            let otp = '';
            for (let i = 1; i <= 6; i++) {
                otp += document.getElementById('otpDigit' + i).value.trim();
            }

            if (otp.length !== 6) {
                showAlert('Please enter the full 6-digit verification code.');
                return;
            }

            const btn = document.getElementById('btnVerifyOtp');
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Verifying...';

            const formData = new FormData();
            formData.append('action', 'verify_otp');
            formData.append('otp', otp);

            try {
                const res = await fetch('subscribe_api.php', { method: 'POST', body: formData });
                const data = await res.json();
                btn.disabled = false;
                btn.innerHTML = 'Verify &amp; Continue <i class="fa fa-arrow-right ms-2"></i>';

                if (data.status === 'success') {
                    goToStep(3); // "after otp verification all setup information comes"
                } else {
                    showAlert(data.message || 'Incorrect verification code. Please try again.');
                }
            } catch (err) {
                btn.disabled = false;
                btn.innerHTML = 'Verify &amp; Continue <i class="fa fa-arrow-right ms-2"></i>';
                showAlert('Verification failed due to connection error.');
            }
        }

        // ==========================================
        // STEP 3: SETUP INFORMATION
        // ==========================================
        function syncBusinessName(val) {
            // Keep custom domain field empty as requested by user
        }

        let domainIsDuplicate = false;
        let debounceDomainTimer = null;

        function updateStep3ButtonState() {
            const btn = document.getElementById('btnSubmitStep3');
            if (!btn) return;
            if (domainIsDuplicate) {
                btn.disabled = true;
                btn.classList.add('disabled');
                btn.style.cursor = 'not-allowed';
                btn.style.opacity = '0.5';
                btn.title = 'Please enter an available, unique domain or folder name to proceed.';
            } else {
                btn.disabled = false;
                btn.classList.remove('disabled');
                btn.style.cursor = 'pointer';
                btn.style.opacity = '1';
                btn.title = '';
            }
        }

        function updateDomainPreview(val) {
            const clean = (val || '').replace(/^https?:\/\//i, '').replace(/[\/\\]/g, '').toLowerCase().trim();
            document.getElementById('domainPathPreview').textContent = 'localhost/spasalonmanagement/' + (clean ? clean + '/' : '');
        }

        function onDomainInput(val) {
            updateDomainPreview(val);
            clearTimeout(debounceDomainTimer);
            debounceDomainTimer = setTimeout(() => {
                validateDomainUnique(val);
            }, 450);
        }

        async function validateDomainUnique(val) {
            const domainInp = document.getElementById('wizDomain');
            const feedbackEl = document.getElementById('feedbackDomain');
            const spinner = document.getElementById('spinnerDomain');
            const raw = (typeof val === 'string') ? val : (domainInp ? domainInp.value : '');
            const clean = raw.replace(/^https?:\/\//i, '').replace(/[\/\\]/g, '').toLowerCase().trim();

            if (!clean) {
                feedbackEl.textContent = '';
                domainIsDuplicate = false;
                domainInp.classList.remove('is-invalid-custom', 'is-valid-custom');
                updateStep3ButtonState();
                return true;
            }

            if (clean.length < 3 || !/^[a-z0-9]([a-z0-9\-\.]*[a-z0-9])?$/i.test(clean)) {
                feedbackEl.textContent = 'Invalid format. Use letters, numbers, hyphens or dots (e.g. www.mysalon.com or elegancespa).';
                feedbackEl.className = 'field-feedback error';
                domainInp.classList.add('is-invalid-custom');
                domainInp.classList.remove('is-valid-custom');
                domainIsDuplicate = true;
                updateStep3ButtonState();
                return false;
            }

            spinner.classList.remove('d-none');
            const formData = new FormData();
            formData.append('action', 'check_domain');
            formData.append('domain', clean);

            try {
                const res = await fetch('subscribe_api.php', { method: 'POST', body: formData });
                const data = await res.json();
                spinner.classList.add('d-none');

                if (data.status === 'error') {
                    feedbackEl.textContent = data.message;
                    feedbackEl.className = 'field-feedback error';
                    domainInp.classList.add('is-invalid-custom');
                    domainInp.classList.remove('is-valid-custom');
                    domainIsDuplicate = true;
                    updateStep3ButtonState();
                    return false;
                } else {
                    feedbackEl.textContent = '✓ Domain / folder "' + clean + '" is available!';
                    feedbackEl.className = 'field-feedback success';
                    domainInp.classList.remove('is-invalid-custom');
                    domainInp.classList.add('is-valid-custom');
                    domainIsDuplicate = false;
                    updateStep3ButtonState();
                    return true;
                }
            } catch (err) {
                spinner.classList.add('d-none');
                return true;
            }
        }

        function previewAsset(input, imgId, nameId) {
            const file = input.files && input.files[0];
            const img = document.getElementById(imgId);
            const nameEl = document.getElementById(nameId);

            if (file) {
                nameEl.textContent = file.name + ' (' + (file.size / 1024).toFixed(1) + ' KB)';
                const reader = new FileReader();
                reader.onload = (e) => {
                    img.src = e.target.result;
                    img.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        async function validateStep3AndProceed() {
            hideAlert();
            const bName = document.getElementById('wizCompanyName').value.trim();
            const domain = document.getElementById('wizDomain').value.trim();

            if (!bName) {
                showAlert('Please provide your Salon / Spa Business Name.');
                return;
            }
            if (!domain) {
                showAlert('Please provide your custom domain, subdomain, or folder name.');
                document.getElementById('wizDomain').focus();
                return;
            }

            if (domainIsDuplicate) {
                showAlert("'" + domain.trim() + "' is already registered. Please choose another.");
                updateStep3ButtonState();
                return;
            }

            const btn = document.getElementById('btnSubmitStep3');
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Checking domain availability...';

            const isAvailable = await validateDomainUnique(domain);
            btn.disabled = false;
            btn.innerHTML = 'Next: Choose Template & Layout <i class="fa fa-arrow-right ms-2"></i>';

            if (isAvailable && !domainIsDuplicate) {
                goToStep(4);
            } else {
                showAlert("'" + domain.trim() + "' is already registered. Please choose another.");
            }
        }

        // ==========================================
        // STEP 4: CHOOSE TEMPLATE & LAYOUT
        // ==========================================
        function selectTemplate(tplKey) {
            selectedTemplate = tplKey;
            document.getElementById('inputTemplate').value = tplKey;

            document.querySelectorAll('.tpl-card').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.check-badge').forEach(el => el.style.display = 'none');

            const card = document.getElementById('cardTpl_' + tplKey);
            const badge = document.getElementById('checkTpl_' + tplKey);
            if (card) card.classList.add('active');
            if (badge) badge.style.display = 'inline-block';

            renderLayoutCards(tplKey);
        }

        function renderLayoutCards(tplKey) {
            const tpl = templatesData[tplKey];
            const container = document.getElementById('layoutsContainer');
            container.innerHTML = '';

            if (!tpl || !tpl.layouts || tpl.layouts.length === 0) {
                container.innerHTML = '<div class="col-12 text-muted">No layouts found for this template.</div>';
                return;
            }

            tpl.layouts.forEach((lay, idx) => {
                const col = document.createElement('div');
                col.className = 'col-md-4';

                const isCurrent = (parseInt(lay.layout_number) === selectedLayout);
                const imgSrc = lay.preview_image ? lay.preview_image : 'uploads/templates/no-image.jpg';
                const demoUrl = lay.demo_url ? lay.demo_url : ('website/?preview_tpl=' + tplKey + '&preview_layout=' + lay.layout_number);

                col.innerHTML = `
                    <div class="layout-card ${isCurrent ? 'active' : ''}" id="layoutCard_${lay.layout_number}" onclick="selectLayout(${lay.layout_number})">
                        <img src="${imgSrc}" alt="${lay.layout_name}" class="layout-thumb">
                        <div class="p-3 d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-bold text-white mb-0 fs-6">${lay.layout_name}</h6>
                                <small class="text-muted">Layout #${lay.layout_number}</small>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2" onclick="event.stopPropagation(); zoomLayoutPreview('${lay.layout_name}', '${imgSrc}', '${demoUrl}')">
                                <i class="fa fa-magnifying-glass-plus"></i> Zoom
                            </button>
                        </div>
                    </div>
                `;
                container.appendChild(col);
            });
        }

        function selectLayout(layNum) {
            selectedLayout = layNum;
            document.getElementById('inputLayout').value = layNum;
            document.querySelectorAll('.layout-card').forEach(el => el.classList.remove('active'));
            const card = document.getElementById('layoutCard_' + layNum);
            if (card) card.classList.add('active');
        }

        function zoomLayoutPreview(title, imgSrc, demoUrl) {
            document.getElementById('layoutZoomTitle').textContent = title + ' - Preview';
            document.getElementById('layoutZoomImg').src = imgSrc;
            document.getElementById('layoutLiveLink').href = demoUrl;
            const modal = new bootstrap.Modal(document.getElementById('layoutZoomModal'));
            modal.show();
        }

        // ==========================================
        // STEP 5: GATEWAY SELECTION & FINAL PAYMENT
        // ==========================================
        function switchGatewayCard(gw) {
            document.querySelectorAll('.gateway-detail-card').forEach(el => el.style.display = 'none');
            document.querySelectorAll('#gatewayChoiceGroup label').forEach(el => el.classList.remove('active'));

            if (gw === 'stripe') {
                const card = document.getElementById('cardGatewayStripe');
                if (card) card.style.display = 'block';
                const lbl = document.getElementById('lblGwStripe');
                if (lbl) lbl.classList.add('active');
                document.getElementById('inputPaymentMethod').value = 'stripe';
            } else if (gw === 'razorpay') {
                const card = document.getElementById('cardGatewayRazorpay');
                if (card) card.style.display = 'block';
                const lbl = document.getElementById('lblGwRazorpay');
                if (lbl) lbl.classList.add('active');
                document.getElementById('inputPaymentMethod').value = 'razorpay';
            } else {
                const card = document.getElementById('cardGatewaySandbox');
                if (card) card.style.display = 'block';
                const lbl = document.getElementById('lblGwSandbox');
                if (lbl) lbl.classList.add('active');
                document.getElementById('inputPaymentMethod').value = 'sandbox';
            }
        }

        function toggleSimulatePayment(isSim) {
            if (isSim) {
                switchGatewayCard('sandbox');
                const r = document.querySelector('input[name="payment_gateway_choice"][value="sandbox"]');
                if (r) r.checked = true;
            } else {
                switchGatewayCard('<?= $active_gateway ?>');
                const r = document.querySelector('input[name="payment_gateway_choice"][value="<?= $active_gateway ?>"]');
                if (r) r.checked = true;
            }
        }

        function showPaymentAlert(msgHtml) {
            const box = document.getElementById('checkoutPaymentAlert');
            if (box) {
                box.innerHTML = msgHtml;
                box.classList.remove('d-none');
            }
        }

        async function executeFinalPayment() {
            hideAlert();
            const alertBox = document.getElementById('checkoutPaymentAlert');
            if (alertBox) {
                alertBox.classList.add('d-none');
                alertBox.innerHTML = '';
            }

            const btn = document.getElementById('btnSubmitPayment');
            const spinner = document.getElementById('spinnerPayment');
            btn.disabled = true;
            spinner.classList.remove('d-none');

            const selectedGateway = document.querySelector('input[name="payment_gateway_choice"]:checked')?.value || '<?= $active_gateway ?>';
            const isSimulateSandbox = document.getElementById('toggleSandboxSim')?.checked || selectedGateway === 'sandbox' || selectedGateway === 'offline';

            // 1. SANDBOX / DEMO SIMULATION
            if (isSimulateSandbox) {
                await executeFinalPaymentWithTransaction('sandbox', 'SANDBOX-' + Date.now());
                return;
            }

            // Prepare common payment payload
            const form = document.getElementById('masterSetupForm');
            const formData = new FormData(form);
            formData.append('plan_code', selectedPlan);
            formData.append('name', document.getElementById('custName').value.trim());
            formData.append('email', document.getElementById('custEmail').value.trim());
            formData.append('phone', document.getElementById('custPhone').value.trim());
            formData.append('password', document.getElementById('custPassword').value.trim());
            formData.append('business_name', document.getElementById('wizCompanyName').value.trim());
            formData.append('chosen_template', selectedTemplate);
            formData.append('chosen_layout', selectedLayout);
            formData.append('payment_gateway', selectedGateway);

            // 2. RAZORPAY STANDARD CHECKOUT (Opens Default Razorpay Payment Screen Dialog)
            if (selectedGateway === 'razorpay') {
                try {
                    const payRes = await fetch('create_payment.php', { method: 'POST', body: formData });
                    const data = await payRes.json();

                    btn.disabled = false;
                    spinner.classList.add('d-none');

                    if (data.status === 'razorpay_checkout') {
                        if (typeof Razorpay === 'undefined') {
                            showPaymentAlert('Razorpay checkout script is still loading. Please check internet connection and try again.');
                            return;
                        }

                        const rzpOptions = {
                            key: data.key_id,
                            amount: data.amount,
                            currency: data.currency,
                            name: data.business_name || 'Salon & Spa Platform',
                            description: data.plan_name,
                            image: 'uploads/branding/codeulas_logo_small.webp',
                            prefill: {
                                name: data.customer_name,
                                email: data.customer_email,
                                contact: data.customer_phone
                            },
                            theme: {
                                color: '#D4AF37'
                            },
                            handler: function(response) {
                                // Official Razorpay success callback: proceed to automated tenant deployment
                                executeFinalPaymentWithTransaction('razorpay', response.razorpay_payment_id);
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
                                showPaymentAlert('Razorpay payment was not completed: ' + (resp.error ? resp.error.description : 'Payment failed'));
                            });
                            // Opens the official Razorpay default payment dialog screen!
                            rzp.open();
                        } catch (e) {
                            showPaymentAlert('Razorpay SDK Notice: ' + escapeHtml(e.message) + '<br><button type="button" class="btn btn-sm btn-outline-warning mt-2" onclick="executeFinalPaymentWithTransaction(\'sandbox\', \'SANDBOX-\' + Date.now())"><i class="fa fa-flask me-1"></i> Continue with Sandbox / Demo Payment</button>');
                        }
                    } else {
                        showPaymentAlert(data.message || 'Razorpay checkout session could not be established.<br><button type="button" class="btn btn-sm btn-outline-warning mt-2" onclick="executeFinalPaymentWithTransaction(\'sandbox\', \'SANDBOX-\' + Date.now())"><i class="fa fa-flask me-1"></i> Continue with Sandbox / Demo Payment</button>');
                    }
                } catch (err) {
                    btn.disabled = false;
                    spinner.classList.add('d-none');
                    showPaymentAlert('Network error connecting to payment gateway: ' + err.message);
                }
                return;
            }

            // 3. STRIPE OFFICIAL HOSTED CHECKOUT (Redirects to checkout.stripe.com Default Payment Screen)
            if (selectedGateway === 'stripe') {
                try {
                    // First save pending wizard setup data and uploaded files
                    formData.append('action', 'save_pending_setup');
                    const saveRes = await fetch('subscribe_api.php', { method: 'POST', body: formData });
                    const saveData = await saveRes.json();

                    // Next call create_payment.php with return_source = subscribe
                    const stripeFormData = new FormData();
                    stripeFormData.append('plan_code', selectedPlan);
                    stripeFormData.append('name', document.getElementById('custName').value.trim());
                    stripeFormData.append('email', document.getElementById('custEmail').value.trim());
                    stripeFormData.append('phone', document.getElementById('custPhone').value.trim());
                    stripeFormData.append('password', document.getElementById('custPassword').value.trim());
                    stripeFormData.append('business_name', document.getElementById('wizCompanyName').value.trim());
                    stripeFormData.append('chosen_template', selectedTemplate);
                    stripeFormData.append('chosen_layout', selectedLayout);
                    stripeFormData.append('domain', document.getElementById('wizDomain').value.trim());
                    stripeFormData.append('payment_gateway', 'stripe');
                    stripeFormData.append('return_source', 'subscribe');

                    const payRes = await fetch('create_payment.php', { method: 'POST', body: stripeFormData });
                    const data = await payRes.json();

                    if (data.status === 'redirect' && data.redirect_url) {
                        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Redirecting to Stripe Official Checkout...';
                        // Dispatches to Stripe official default payment page
                        window.location.href = data.redirect_url;
                        return;
                    } else {
                        btn.disabled = false;
                        spinner.classList.add('d-none');
                        showPaymentAlert((data.message || 'Stripe official checkout session could not be established.') + '<br><button type="button" class="btn btn-sm btn-outline-warning mt-2" onclick="executeFinalPaymentWithTransaction(\'sandbox\', \'SANDBOX-\' + Date.now())"><i class="fa fa-flask me-1"></i> Continue with Sandbox / Demo Payment</button>');
                    }
                } catch (err) {
                    btn.disabled = false;
                    spinner.classList.add('d-none');
                    showPaymentAlert('Network error: ' + err.message);
                }
                return;
            }

            // Fallback: Sandbox
            await executeFinalPaymentWithTransaction('sandbox', 'SANDBOX-' + Date.now());
        }

        function updateDeployProgress(percent, statusText) {
            const bar = document.getElementById('deployProgressBar');
            const badge = document.getElementById('deployPercentText');
            const notice = document.getElementById('deployStatusNotice');
            const pVal = Math.min(100, Math.max(0, percent));
            const pStr = pVal + '%';
            if (bar) {
                bar.style.width = pStr;
                bar.textContent = pStr;
                bar.setAttribute('aria-valuenow', pVal);
            }
            if (badge) {
                badge.textContent = pStr;
            }
            if (notice && statusText) {
                notice.textContent = statusText;
            }
        }

        function setDeployItem(id, state) {
            const el = document.getElementById(id);
            if (!el) return;
            el.className = 'deploy-check-item ' + state;
            const icon = el.querySelector('i');
            if (icon) {
                if (state === 'completed') {
                    icon.className = 'fa-solid fa-circle-check text-success me-2';
                } else if (state === 'running') {
                    icon.className = 'fa-solid fa-spinner fa-spin text-warning me-2';
                } else {
                    icon.className = 'fa-solid fa-circle-notch text-muted me-2';
                }
            }
        }

        function runDeploymentAnimation(data, onFinish) {
            // Switch to animated deployment progression view
            const stepBar = document.getElementById('wizardStepBar');
            if (stepBar) stepBar.style.setProperty('display', 'none', 'important');

            for (let i = 1; i <= 5; i++) {
                const s = document.getElementById('sectionStep' + i);
                if (s) s.style.setProperty('display', 'none', 'important');
            }
            const comp = document.getElementById('sectionComplete');
            if (comp) comp.style.setProperty('display', 'none', 'important');

            const dep = document.getElementById('sectionDeploying');
            if (dep) dep.style.setProperty('display', 'block', 'important');

            window.scrollTo({ top: 0, behavior: 'smooth' });

            const domainText = data.domain || data.folder_name || (document.getElementById('wizDomain') ? document.getElementById('wizDomain').value.trim() : 'salon');
            const domEl = document.getElementById('dpDomainDisplay');
            if (domEl) domEl.textContent = domainText;

            // Reset checklist and progress bar
            setDeployItem('dpStep1', 'running');
            for (let i = 2; i <= 7; i++) {
                setDeployItem('dpStep' + i, 'pending');
            }
            updateDeployProgress(15, 'Validating order and commercial license authorization...');

            setTimeout(() => {
                setDeployItem('dpStep1', 'completed');
                setDeployItem('dpStep2', 'running');
                updateDeployProgress(30, 'Creating server directory ' + domainText + '...');
            }, 500);

            setTimeout(() => {
                setDeployItem('dpStep2', 'completed');
                setDeployItem('dpStep3', 'running');
                updateDeployProgress(48, 'Copying website templates & layout assets...');
            }, 1050);

            setTimeout(() => {
                setDeployItem('dpStep3', 'completed');
                setDeployItem('dpStep4', 'running');
                updateDeployProgress(65, 'Deploying dedicated Salon & Spa Admin panel...');
            }, 1600);

            setTimeout(() => {
                setDeployItem('dpStep4', 'completed');
                setDeployItem('dpStep5', 'running');
                updateDeployProgress(80, 'Embedding custom logos & branding assets...');
            }, 2150);

            setTimeout(() => {
                setDeployItem('dpStep5', 'completed');
                setDeployItem('dpStep6', 'running');
                updateDeployProgress(92, 'Configuring MySQL database & admin credentials...');
            }, 2700);

            setTimeout(() => {
                setDeployItem('dpStep6', 'completed');
                setDeployItem('dpStep7', 'completed');
                updateDeployProgress(100, 'Deployment finalized successfully!');
            }, 3250);

            setTimeout(() => {
                // Hide deployment box and show Launch Hub
                if (dep) dep.style.setProperty('display', 'none', 'important');
                if (comp) comp.style.setProperty('display', 'block', 'important');
                if (stepBar) stepBar.style.setProperty('display', 'none', 'important');
                for (let i = 1; i <= 5; i++) {
                    const s = document.getElementById('sectionStep' + i);
                    if (s) s.style.setProperty('display', 'none', 'important');
                }

                if (data.website_url) {
                    document.getElementById('hubLinkSite').href = data.website_url;
                    document.getElementById('hubUrlSite').textContent = data.website_url;
                }
                if (data.admin_url) {
                    document.getElementById('hubLinkAdmin').href = data.admin_url;
                    document.getElementById('hubUrlAdmin').textContent = data.admin_url;
                }
                if (data.admin_email) {
                    document.getElementById('hubAdminEmail').textContent = data.admin_email;
                }
                if (data.admin_password) {
                    document.getElementById('hubAdminPass').textContent = data.admin_password;
                }
                if (data.db_name) {
                    document.getElementById('hubDbName').textContent = data.db_name;
                }
                if (data.download_url) {
                    document.getElementById('hubDownloadLink').href = data.download_url;
                }

                // Mark all wizard nodes as completed
                for (let i = 1; i <= 5; i++) {
                    const node = document.getElementById('nodeStep' + i);
                    if (node) {
                        node.classList.remove('active');
                        node.classList.add('completed');
                    }
                }

                if (typeof onFinish === 'function') {
                    onFinish();
                }
            }, 3750);
        }

        async function executeFinalPaymentWithTransaction(method, txnId) {
            const btn = document.getElementById('btnSubmitPayment');
            const spinner = document.getElementById('spinnerPayment');
            if (btn) btn.disabled = true;
            if (spinner) spinner.classList.remove('d-none');

            // Switch to animated deployment progression view
            const stepBar = document.getElementById('wizardStepBar');
            if (stepBar) stepBar.style.setProperty('display', 'none', 'important');

            for (let i = 1; i <= 5; i++) {
                const s = document.getElementById('sectionStep' + i);
                if (s) s.style.setProperty('display', 'none', 'important');
            }
            const comp = document.getElementById('sectionComplete');
            if (comp) comp.style.setProperty('display', 'none', 'important');

            const dep = document.getElementById('sectionDeploying');
            if (dep) dep.style.setProperty('display', 'block', 'important');

            window.scrollTo({ top: 0, behavior: 'smooth' });

            const cleanDom = document.getElementById('wizDomain') ? document.getElementById('wizDomain').value.trim() : 'salon';
            const dpDom = document.getElementById('dpDomainDisplay');
            if (dpDom) dpDom.textContent = cleanDom;

            // Start initial animation while request is processed
            setDeployItem('dpStep1', 'running');
            for (let i = 2; i <= 7; i++) {
                setDeployItem('dpStep' + i, 'pending');
            }
            updateDeployProgress(15, 'Validating order and payment authorization...');

            const t1 = setTimeout(() => {
                setDeployItem('dpStep1', 'completed');
                setDeployItem('dpStep2', 'running');
                updateDeployProgress(30, 'Creating server directory ' + cleanDom + '...');
            }, 600);

            const t2 = setTimeout(() => {
                setDeployItem('dpStep2', 'completed');
                setDeployItem('dpStep3', 'running');
                updateDeployProgress(50, 'Deploying client website & selected homepage layout...');
            }, 1400);

            const t3 = setTimeout(() => {
                setDeployItem('dpStep3', 'completed');
                setDeployItem('dpStep4', 'running');
                updateDeployProgress(68, 'Installing dedicated Salon & Spa Admin panel...');
            }, 2200);

            // Construct form data
            const form = document.getElementById('masterSetupForm');
            const formData = new FormData(form);
            formData.append('action', 'process_subscription');

            // Add fields from Step 1
            formData.append('name', document.getElementById('custName').value.trim());
            formData.append('email', document.getElementById('custEmail').value.trim());
            formData.append('phone', document.getElementById('custPhone').value.trim());
            formData.append('password', document.getElementById('custPassword').value.trim());
            formData.append('payment_method', method || 'sandbox');
            formData.append('transaction_id', txnId || ('TXN-' + Date.now()));

            try {
                const res = await fetch('subscribe_api.php', { method: 'POST', body: formData });
                const data = await res.json();

                clearTimeout(t1);
                clearTimeout(t2);
                clearTimeout(t3);

                if (data.status === 'success') {
                    // Complete checklist and progress bar to 100%
                    setDeployItem('dpStep1', 'completed');
                    setDeployItem('dpStep2', 'completed');
                    setDeployItem('dpStep3', 'completed');
                    setDeployItem('dpStep4', 'completed');
                    setDeployItem('dpStep5', 'running');
                    updateDeployProgress(82, 'Applying company logo, favicon & custom styling...');

                    setTimeout(() => {
                        setDeployItem('dpStep5', 'completed');
                        setDeployItem('dpStep6', 'running');
                        updateDeployProgress(92, 'Initializing isolated tenant MySQL database & admin account...');
                    }, 500);

                    setTimeout(() => {
                        setDeployItem('dpStep6', 'completed');
                        setDeployItem('dpStep7', 'completed');
                        updateDeployProgress(100, 'Provisioning complete! Launching instance...');
                    }, 1000);

                    setTimeout(() => {
                        // Render completion hub
                        if (dep) dep.style.setProperty('display', 'none', 'important');
                        if (comp) comp.style.setProperty('display', 'block', 'important');
                        if (stepBar) stepBar.style.setProperty('display', 'none', 'important');
                        for (let i = 1; i <= 5; i++) {
                            const s = document.getElementById('sectionStep' + i);
                            if (s) s.style.setProperty('display', 'none', 'important');
                        }

                        document.getElementById('hubLinkSite').href = data.website_url;
                        document.getElementById('hubUrlSite').textContent = data.website_url;

                        document.getElementById('hubLinkAdmin').href = data.admin_url;
                        document.getElementById('hubUrlAdmin').textContent = data.admin_url;

                        document.getElementById('hubAdminEmail').textContent = data.admin_email;
                        document.getElementById('hubAdminPass').textContent = data.admin_password;
                        document.getElementById('hubDbName').textContent = data.db_name;
                        document.getElementById('hubDownloadLink').href = data.download_url;

                        // Mark all steps as complete
                        for (let i = 1; i <= 5; i++) {
                            const node = document.getElementById('nodeStep' + i);
                            if (node) {
                                node.classList.remove('active');
                                node.classList.add('completed');
                            }
                        }
                    }, 1600);

                } else {
                    if (dep) dep.style.setProperty('display', 'none', 'important');
                    const s5 = document.getElementById('sectionStep5');
                    if (s5) s5.style.setProperty('display', 'block', 'important');
                    if (stepBar) stepBar.style.setProperty('display', 'flex', 'important');
                    if (btn) btn.disabled = false;
                    if (spinner) spinner.classList.add('d-none');
                    showAlert(data.message || 'Payment or provisioning encountered an error.');
                }
            } catch (err) {
                clearTimeout(t1);
                clearTimeout(t2);
                clearTimeout(t3);
                if (dep) dep.style.setProperty('display', 'none', 'important');
                const s5 = document.getElementById('sectionStep5');
                if (s5) s5.style.setProperty('display', 'block', 'important');
                if (stepBar) stepBar.style.setProperty('display', 'flex', 'important');
                if (btn) btn.disabled = false;
                if (spinner) spinner.classList.add('d-none');
                showAlert('Deployment communication failure: ' + err.message);
            }
        }
    </script>
</body>
</html>
