<?php
/**
 * SaaS Project Setup Wizard
 * Step-by-step onboarding wizard for company information, branding (logo & favicon),
 * domain input, and automated tenant deployment.
 */

$order_num = isset($_GET['order']) ? trim($_GET['order']) : '';
$token = isset($_GET['token']) ? trim($_GET['token']) : '';

if (empty($order_num)) {
    $plan_param = isset($_GET['plan']) ? '?plan=' . urlencode($_GET['plan']) : '';
    header("Location: subscribe.php" . $plan_param);
    exit;
}

$order = null;
$plans = [];
$settings = [];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=spasalon_db;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);

    // Fetch settings
    $stmt_s = $pdo->query("SELECT setting_key, setting_value FROM business_settings");
    while ($r = $stmt_s->fetch(PDO::FETCH_ASSOC)) {
        $settings[$r['setting_key']] = $r['setting_value'];
    }

    // Fetch plans
    $stmt_p = $pdo->query("SELECT * FROM marketplace_plans WHERE status = 'active'");
    while ($p = $stmt_p->fetch()) {
        $plans[$p->plan_code] = $p;
    }

    if (!empty($order_num)) {
        $stmt_o = $pdo->prepare("SELECT * FROM marketplace_orders WHERE order_number = ? LIMIT 1");
        $stmt_o->execute([$order_num]);
        $order = $stmt_o->fetch();
    }
} catch (Exception $e) {
    // Database connection fallback
}

$default_company = $order ? $order->business_name : '';
$default_name = $order ? $order->customer_name : '';
$default_email = $order ? $order->customer_email : '';
$default_phone = $order ? $order->customer_phone : '';
$default_plan = $order ? $order->plan_code : 'SALON_SPA';
$default_template = $order ? $order->chosen_template : 'template1';
$default_layout = $order ? (int)$order->chosen_layout : 1;

$plan_title = 'Salon & Spa Complete';
if ($default_plan === 'SALON') $plan_title = 'Salon Edition';
if ($default_plan === 'SPA') $plan_title = 'Spa Wellness Edition';

$currency_symbol = isset($settings['currency_symbol']) ? $settings['currency_symbol'] : '$';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Setup Wizard - SaaS Tenant Deployment</title>
    <link rel="stylesheet" href="website/assets/template1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gold: #c29958;
            --primary-gold-hover: #b08746;
            --dark-navy: #090f1d;
            --surface-dark: #0f172a;
            --border-color: #334155;
            --accent-green: #10b981;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #090f1d 0%, #0d1527 50%, #151f38 100%);
            color: #f1f5f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .font-serif {
            font-family: 'Playfair Display', Georgia, serif;
        }

        .wizard-header {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 18px 0;
        }

        .wizard-container {
            max-width: 920px;
            margin: 40px auto;
            width: 100%;
            padding: 0 15px;
        }

        .wizard-card {
            background: rgba(15, 23, 42, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4);
            overflow: hidden;
        }

        /* Step Indicators */
        .step-indicators {
            display: flex;
            background: rgba(10, 16, 30, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 20px 30px;
        }
        .step-item {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            opacity: 0.45;
            transition: all 0.3s ease;
        }
        .step-item.active {
            opacity: 1;
        }
        .step-item.completed {
            opacity: 0.9;
        }
        .step-number {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #1e293b;
            color: #94a3b8;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #334155;
            transition: all 0.3s ease;
        }
        .step-item.active .step-number {
            background: var(--primary-gold);
            color: #000;
            border-color: var(--primary-gold);
            box-shadow: 0 0 15px rgba(194, 153, 88, 0.5);
        }
        .step-item.completed .step-number {
            background: var(--accent-green);
            color: #fff;
            border-color: var(--accent-green);
        }
        .step-text {
            font-size: 0.85rem;
            line-height: 1.2;
        }
        .step-text strong {
            display: block;
            font-size: 0.95rem;
            color: #fff;
        }

        /* Form Controls */
        .form-control, .form-select {
            background-color: #1e293b;
            border: 1px solid #334155;
            color: #fff;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }
        .form-control:focus, .form-select:focus {
            background-color: #243048;
            border-color: var(--primary-gold);
            color: #fff;
            box-shadow: 0 0 0 3px rgba(194, 153, 88, 0.25);
        }
        .form-label {
            font-weight: 600;
            font-size: 0.88rem;
            color: #cbd5e1;
            margin-bottom: 6px;
        }
        .input-group-text {
            background-color: #1a2234;
            border: 1px solid #334155;
            color: #94a3b8;
        }

        /* Buttons */
        .btn-gold {
            background: linear-gradient(135deg, #c29958 0%, #e0b879 100%);
            color: #0b0f19;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            padding: 12px 28px;
            transition: all 0.3s ease;
        }
        .btn-gold:hover {
            background: linear-gradient(135deg, #b08746 0%, #d4a965 100%);
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(194, 153, 88, 0.3);
        }
        .btn-outline-light-custom {
            border: 1px solid #334155;
            color: #cbd5e1;
            border-radius: 10px;
            padding: 12px 24px;
            background: transparent;
            transition: all 0.2s;
        }
        .btn-outline-light-custom:hover {
            background: #1e293b;
            color: #fff;
            border-color: #64748b;
        }

        /* Upload Dropzone */
        .upload-dropzone {
            border: 2px dashed #334155;
            border-radius: 14px;
            padding: 25px 20px;
            text-align: center;
            background: rgba(30, 41, 59, 0.4);
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }
        .upload-dropzone:hover {
            border-color: var(--primary-gold);
            background: rgba(194, 153, 88, 0.05);
        }
        .preview-box {
            max-height: 80px;
            display: none;
            margin-top: 10px;
            border-radius: 8px;
            padding: 6px;
            background: #0f172a;
            border: 1px solid #334155;
        }

        /* Live Deployment Checklist */
        .deploy-step {
            padding: 12px 18px;
            background: rgba(30, 41, 59, 0.5);
            border-radius: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 14px;
            border: 1px solid transparent;
            transition: all 0.3s;
        }
        .deploy-step.pending {
            color: #64748b;
        }
        .deploy-step.running {
            border-color: var(--primary-gold);
            background: rgba(194, 153, 88, 0.1);
            color: #fff;
        }
        .deploy-step.success {
            border-color: rgba(16, 185, 129, 0.4);
            background: rgba(16, 185, 129, 0.08);
            color: #10b981;
        }

        /* Completion Card */
        .launch-hub-card {
            background: linear-gradient(145deg, #131d33 0%, #0d1527 100%);
            border: 1px solid #2a3958;
            border-radius: 16px;
            padding: 24px;
            transition: all 0.3s;
        }
        .launch-hub-card:hover {
            border-color: var(--primary-gold);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="wizard-header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="index.php" class="d-flex align-items-center text-decoration-none text-white gap-2">
                <i class="fa-solid fa-gem text-warning fa-xl"></i>
                <span class="fw-bold fs-5 font-serif">LUXE SALON &amp; SPA <span class="text-warning">SAAS</span></span>
            </a>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-warning text-dark fw-bold px-3 py-2 rounded-pill">
                    <i class="fa-solid fa-crown me-1"></i> <?= htmlspecialchars($plan_title) ?>
                </span>
                <a href="index.php" class="btn btn-outline-light-custom btn-sm">
                    <i class="fa fa-arrow-left me-1"></i> Marketplace
                </a>
            </div>
        </div>
    </header>

    <div class="wizard-container">
        
        <div class="wizard-card">
            
            <!-- Step Indicators -->
            <div class="step-indicators">
                <div class="step-item active" id="indicator1">
                    <div class="step-number">1</div>
                    <div class="step-text">
                        <small class="text-muted">Step 1</small>
                        <strong>Company Info</strong>
                    </div>
                </div>
                <div class="step-item" id="indicator2">
                    <div class="step-number">2</div>
                    <div class="step-text">
                        <small class="text-muted">Step 2</small>
                        <strong>Logo &amp; Favicon</strong>
                    </div>
                </div>
                <div class="step-item" id="indicator3">
                    <div class="step-number">3</div>
                    <div class="step-text">
                        <small class="text-muted">Step 3</small>
                        <strong>Domain &amp; Launch</strong>
                    </div>
                </div>
                <div class="step-item" id="indicator4">
                    <div class="step-number">4</div>
                    <div class="step-text">
                        <small class="text-muted">Step 4</small>
                        <strong>Live Instance</strong>
                    </div>
                </div>
            </div>

            <div class="p-4 p-md-5">

                <!-- Alert Message Container -->
                <div id="wizardAlert" class="alert alert-danger d-none rounded-3 mb-4"></div>

                <!-- FORM -->
                <form id="wizardForm" enctype="multipart/form-data">
                    <input type="hidden" name="order_number" value="<?= htmlspecialchars($order_num) ?>">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    <input type="hidden" name="plan_code" id="planCodeInput" value="<?= htmlspecialchars($default_plan) ?>">
                    <input type="hidden" name="chosen_template" id="tplInput" value="<?= htmlspecialchars($default_template) ?>">
                    <input type="hidden" name="chosen_layout" id="layoutInput" value="<?= $default_layout ?>">

                    <!-- ================= STEP 1: COMPANY INFO ================= -->
                    <div id="stepSection1">
                        <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                            <div>
                                <h4 class="fw-bold font-serif text-white mb-1">Company &amp; Business Information</h4>
                                <p class="text-muted small mb-0">Enter your salon or spa details. These will populate your website header, footer, booking invoices, and emails.</p>
                            </div>
                            <span class="badge bg-dark border border-secondary text-warning px-3 py-2">
                                <i class="fa fa-sparkles me-1"></i> Setup Wizard
                            </span>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Company / Salon Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="company_name" id="companyName" value="<?= htmlspecialchars($default_company) ?>" required placeholder="e.g. Elegance Hair &amp; Spa Lounge">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Company Tagline / Slogan</label>
                                <input type="text" class="form-control" name="tagline" id="companyTagline" value="" placeholder="e.g. Luxury Hair &amp; Holistic Spa">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Official Contact Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="company_email" id="companyEmail" value="<?= htmlspecialchars($default_email) ?>" required placeholder="contact@yoursalon.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Official Phone Number</label>
                                <input type="text" class="form-control" name="company_phone" id="companyPhone" value="<?= htmlspecialchars($default_phone) ?>" placeholder="+1 (555) 234-5678">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Salon / Spa Physical Address</label>
                                <input type="text" class="form-control" name="company_address" id="companyAddress" value="" placeholder="Street Address, City, State, ZIP">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Currency Symbol</label>
                                <select class="form-select" name="currency_symbol" id="currencySymbol">
                                    <option value="$" <?= $currency_symbol === '$' ? 'selected' : '' ?>>$ (USD / AUD / CAD)</option>
                                    <option value="€" <?= $currency_symbol === '€' ? 'selected' : '' ?>>€ (EUR)</option>
                                    <option value="£" <?= $currency_symbol === '£' ? 'selected' : '' ?>>£ (GBP)</option>
                                    <option value="₹" <?= $currency_symbol === '₹' ? 'selected' : '' ?>>₹ (INR)</option>
                                    <option value="AED " <?= $currency_symbol === 'AED ' ? 'selected' : '' ?>>AED (UAE Dirham)</option>
                                    <option value="SAR " <?= $currency_symbol === 'SAR ' ? 'selected' : '' ?>>SAR (Saudi Riyal)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Dedicated Admin Credentials for Tenant -->
                        <div class="p-3 rounded-4 mb-4" style="background: rgba(30, 41, 59, 0.4); border: 1px solid #334155;">
                            <h6 class="fw-bold text-warning mb-2 font-serif">
                                <i class="fa fa-user-shield me-2"></i> Dedicated Tenant Administrator Credentials
                            </h6>
                            <p class="text-muted small mb-3">You will use this administrator account to log in to your dedicated salon admin panel.</p>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label small">Admin Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="admin_name" id="adminName" value="<?= htmlspecialchars($default_name) ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small">Admin Login Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-sm" name="admin_email" id="adminEmail" value="<?= htmlspecialchars($default_email) ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small">Admin Password <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <input type="password" class="form-control" name="admin_password" id="adminPassword" value="" placeholder="Choose password" required>
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassVisibility('adminPassword', this)">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-gold fw-bold px-4" onclick="goToStep(2)">
                                Next: Upload Logo &amp; Favicon <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ================= STEP 2: LOGO & FAVICON ================= -->
                    <div id="stepSection2" style="display: none;">
                        <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                            <div>
                                <h4 class="fw-bold font-serif text-white mb-1">Upload Branding Assets</h4>
                                <p class="text-muted small mb-0">Upload your custom salon logo and browser favicon. These are applied automatically to both your website and admin portal.</p>
                            </div>
                            <span class="badge bg-dark border border-secondary text-warning px-3 py-2">
                                <i class="fa fa-palette me-1"></i> Visual Identity
                            </span>
                        </div>

                        <div class="row g-4 mb-4">
                            <!-- Company Logo -->
                            <div class="col-md-6">
                                <label class="form-label d-flex justify-content-between">
                                    <span>Company Logo</span>
                                    <small class="text-muted">PNG, JPG, SVG, WebP</small>
                                </label>
                                <div class="upload-dropzone" onclick="document.getElementById('logoFileInput').click()">
                                    <i class="fa fa-cloud-arrow-up fa-3x text-warning opacity-75 mb-2"></i>
                                    <h6 class="fw-bold text-white mb-1">Click to select Company Logo</h6>
                                    <p class="text-muted small mb-0">Recommended size: 250 &times; 60px (transparent background)</p>
                                    <input type="file" name="company_logo" id="logoFileInput" class="d-none" accept="image/*" onchange="previewUpload(this, 'logoPreviewImg', 'logoFileName')">
                                    <div id="logoFileName" class="small text-warning mt-2 fw-semibold">Default high-resolution logo will be applied if skipped</div>
                                    <img id="logoPreviewImg" class="preview-box mx-auto" alt="Logo Preview">
                                </div>
                            </div>

                            <!-- Favicon -->
                            <div class="col-md-6">
                                <label class="form-label d-flex justify-content-between">
                                    <span>Browser Favicon</span>
                                    <small class="text-muted">ICO, PNG, WebP</small>
                                </label>
                                <div class="upload-dropzone" onclick="document.getElementById('favFileInput').click()">
                                    <i class="fa fa-certificate fa-3x text-info opacity-75 mb-2"></i>
                                    <h6 class="fw-bold text-white mb-1">Click to select Favicon</h6>
                                    <p class="text-muted small mb-0">Recommended size: 32 &times; 32px or 64 &times; 64px square</p>
                                    <input type="file" name="favicon" id="favFileInput" class="d-none" accept=".ico,image/png,image/x-icon" onchange="previewUpload(this, 'favPreviewImg', 'favFileName')">
                                    <div id="favFileName" class="small text-info mt-2 fw-semibold">Default luxury icon will be applied if skipped</div>
                                    <img id="favPreviewImg" class="preview-box mx-auto" style="max-height: 48px;" alt="Favicon Preview">
                                </div>
                            </div>
                        </div>

                        <!-- Brand Preview Banner -->
                        <div class="p-3 rounded-4 mb-4" style="background: rgba(30, 41, 59, 0.4); border: 1px solid #334155;">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="p-2 bg-dark rounded border border-secondary text-center" style="width: 50px; height: 50px;">
                                        <i class="fa fa-spa text-warning fa-2x"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-white" id="brandLiveTitle"><?= htmlspecialchars($default_company) ?></div>
                                        <small class="text-muted">Theme: <span class="text-warning"><?= $default_template === 'template1' ? 'Template 1 (Glamr Salon)' : 'Template 2 (Pureglow Spa)' ?></span> &bull; Layout <?= $default_layout ?></small>
                                    </div>
                                </div>
                                <span class="badge bg-success-subtle text-success border border-success px-3 py-2">
                                    <i class="fa fa-check-circle me-1"></i> Assets Ready
                                </span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-light-custom" onclick="goToStep(1)">
                                <i class="fa fa-arrow-left me-1"></i> Back
                            </button>
                            <button type="button" class="btn btn-gold fw-bold px-4" onclick="goToStep(3)">
                                Next: Set Domain &amp; Deploy <i class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ================= STEP 3: DOMAIN & DEPLOYMENT ================= -->
                    <div id="stepSection3" style="display: none;">
                        <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                            <div>
                                <h4 class="fw-bold font-serif text-white mb-1">Domain Configuration &amp; Instance Launch</h4>
                                <p class="text-muted small mb-0">Specify your custom domain or directory. The engine will instantly create the folder and provision your dedicated website &amp; admin panel.</p>
                            </div>
                            <span class="badge bg-dark border border-secondary text-warning px-3 py-2">
                                <i class="fa fa-server me-1"></i> Instant Provisioning
                            </span>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fs-6 fw-bold text-white">Your Domain / Subdomain / Folder Name <span class="text-danger">*</span></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-dark border-secondary text-muted">https://</span>
                                <input type="text" class="form-control font-monospace" name="domain" id="domainInput" placeholder="www.example.com" value="" required onkeyup="updateDomainPreviews(this.value)">
                            </div>
                            <small class="text-muted mt-2 d-block">
                                <i class="fa fa-circle-info text-info me-1"></i> Enter a domain like <code>www.example.com</code>, <code>salon.mybrand.com</code>, or <code>mysalon.com</code>.
                            </small>
                        </div>

                        <!-- Architecture Spotlight Box -->
                        <div class="p-4 rounded-4 mb-4" style="background: rgba(13, 21, 39, 0.9); border: 1px solid #2a3958;">
                            <h6 class="fw-bold text-warning mb-3 font-serif">
                                <i class="fa fa-microchip me-2"></i> What happens during automated deployment?
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="d-flex gap-2">
                                        <i class="fa fa-folder-plus text-primary mt-1"></i>
                                        <div class="small">
                                            <strong class="text-white d-block">Dedicated Folder Creation</strong>
                                            A physical server folder named <code id="previewFolderName" class="text-warning">www.example.com</code> will be created in your root htdocs directory.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex gap-2">
                                        <i class="fa fa-copy text-info mt-1"></i>
                                        <div class="small">
                                            <strong class="text-white d-block">All Files Copied</strong>
                                            The frontend client website files and dedicated salon admin panel are copied directly into the folder.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex gap-2">
                                        <i class="fa fa-database text-success mt-1"></i>
                                        <div class="small">
                                            <strong class="text-white d-block">Isolated Tenant Database</strong>
                                            A dedicated MySQL database is generated and seeded with your company name, edition mode, and admin user.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex gap-2">
                                        <i class="fa fa-shield-halved text-warning mt-1"></i>
                                        <div class="small">
                                            <strong class="text-white d-block">Instant Ready URLs</strong>
                                            Live website at <span class="text-info font-monospace" id="previewSiteUrl">/www.example.com/</span> and admin at <span class="text-info font-monospace" id="previewAdminUrl">/www.example.com/admin/</span>.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-light-custom" onclick="goToStep(2)">
                                <i class="fa fa-arrow-left me-1"></i> Back
                            </button>
                            <button type="button" class="btn btn-gold btn-lg fw-bold px-5" id="btnDeployNow" onclick="executeProvisioning()">
                                <i class="fa fa-rocket me-2"></i> Deploy My Salon SaaS Now
                            </button>
                        </div>
                    </div>

                    <!-- ================= STEP 4: PROVISIONING IN PROGRESS & COMPLETION ================= -->
                    <div id="stepSection4" style="display: none;">
                        
                        <!-- Deployment Animation Loader -->
                        <div id="deploymentLoadingBox">
                            <div class="text-center py-4">
                                <div class="spinner-border text-warning mb-3" style="width: 3.5rem; height: 3.5rem;" role="status"></div>
                                <h4 class="fw-bold font-serif text-white mb-2">Deploying Your SaaS Project Instance...</h4>
                                <p class="text-muted small mb-4">Please wait while the engine provisions the directory, copies files, configures database and deploys your salon portal.</p>
                            </div>

                            <div class="max-w-600 mx-auto mb-4">
                                <div class="deploy-step running" id="dStep1">
                                    <i class="fa fa-spinner fa-spin text-warning"></i>
                                    <span>Creating tenant directory <strong id="logDirName">www.example.com</strong>...</span>
                                </div>
                                <div class="deploy-step pending" id="dStep2">
                                    <i class="fa fa-circle-notch text-muted"></i>
                                    <span>Copying frontend website files &amp; multi-template assets...</span>
                                </div>
                                <div class="deploy-step pending" id="dStep3">
                                    <i class="fa fa-circle-notch text-muted"></i>
                                    <span>Deploying dedicated Salon &amp; Spa Admin Panel into /admin...</span>
                                </div>
                                <div class="deploy-step pending" id="dStep4">
                                    <i class="fa fa-circle-notch text-muted"></i>
                                    <span>Embedding custom company logo &amp; favicon branding...</span>
                                </div>
                                <div class="deploy-step pending" id="dStep5">
                                    <i class="fa fa-circle-notch text-muted"></i>
                                    <span>Provisioning isolated tenant database &amp; administrator account...</span>
                                </div>
                                <div class="deploy-step pending" id="dStep6">
                                    <i class="fa fa-circle-notch text-muted"></i>
                                    <span>Finalizing live URLs &amp; configuration locks...</span>
                                </div>
                            </div>
                        </div>

                        <!-- Success Hub (Appears after deployment completes) -->
                        <div id="deploymentSuccessBox" style="display: none;">
                            <div class="text-center mb-4">
                                <div class="d-inline-flex p-3 rounded-circle bg-success bg-opacity-25 text-success mb-3 shadow">
                                    <i class="fa fa-circle-check fa-3x"></i>
                                </div>
                                <h3 class="fw-bold font-serif text-white mb-1">Your Salon SaaS Instance is Live!</h3>
                                <p class="text-muted small">Your project has been successfully provisioned. The folder has been created and all website and admin files are deployed.</p>
                            </div>

                            <!-- Live Action Cards -->
                            <div class="row g-4 mb-4">
                                <!-- Tenant Website -->
                                <div class="col-md-6">
                                    <div class="launch-hub-card h-100 d-flex flex-column">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fa fa-globe fa-2x text-primary"></i>
                                                <h5 class="fw-bold text-white mb-0 font-serif">Client Website</h5>
                                            </div>
                                            <span class="badge bg-success">Live &amp; Active</span>
                                        </div>
                                        <p class="text-muted small mb-3">Public-facing responsive website with online booking, service menus, packages, and staff rosters.</p>
                                        <div class="p-2 bg-dark rounded border border-secondary font-monospace small text-info mb-3 text-break" id="resWebsiteUrl">
                                            http://localhost/spasalonmanagement/www.example.com/
                                        </div>
                                        <a id="btnGoToWebsite" href="#" target="_blank" class="btn btn-outline-info w-100 fw-bold mt-auto py-2">
                                            <i class="fa fa-external-link me-1"></i> Visit Client Website
                                        </a>
                                    </div>
                                </div>

                                <!-- Tenant Admin -->
                                <div class="col-md-6">
                                    <div class="launch-hub-card h-100 d-flex flex-column">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fa fa-user-gear fa-2x text-warning"></i>
                                                <h5 class="fw-bold text-white mb-0 font-serif">Salon Admin Panel</h5>
                                            </div>
                                            <span class="badge bg-warning text-dark">Staff Portal</span>
                                        </div>
                                        <p class="text-muted small mb-2">Manage appointments, stylist schedules, POS thermal billing, customers, and reports.</p>
                                        
                                        <div class="bg-dark p-2 rounded border border-secondary mb-3 small font-monospace">
                                            <div class="text-muted">Admin Email: <strong class="text-white" id="resAdminEmail">admin@example.com</strong></div>
                                            <div class="text-muted">Password: <strong class="text-warning" id="resAdminPassword">Salon@2026!</strong></div>
                                        </div>

                                        <a id="btnGoToAdmin" href="#" target="_blank" class="btn btn-gold w-100 fw-bold mt-auto py-2">
                                            <i class="fa fa-rocket me-1"></i> Open Salon Admin Panel
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Deployment Summary Specs -->
                            <div class="p-3 rounded-4 mb-4" style="background: rgba(30, 41, 59, 0.4); border: 1px solid #334155;">
                                <div class="row g-2 text-center text-md-start small">
                                    <div class="col-md-3">
                                        <span class="text-muted">Tenant Domain:</span>
                                        <div class="fw-bold text-white font-monospace" id="resDomain">www.example.com</div>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="text-muted">Server Folder:</span>
                                        <div class="fw-bold text-white font-monospace" id="resFolder">www.example.com</div>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="text-muted">Tenant Database:</span>
                                        <div class="fw-bold text-white font-monospace" id="resDbName">spasalon_t_...</div>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="text-muted">Edition Mode:</span>
                                        <div class="fw-bold text-warning font-monospace" id="resEdition">SALON_SPA</div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="superadmin/" target="_blank" class="btn btn-outline-light-custom btn-sm me-2">
                                    <i class="fa fa-shield-halved text-warning me-1"></i> Open SaaS Super Admin Hub
                                </a>
                                <a href="index.php" class="btn btn-sm btn-secondary">
                                    Return to Home
                                </a>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="website/assets/template1/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentStep = 1;

        function goToStep(step) {
            const alertBox = document.getElementById('wizardAlert');
            alertBox.classList.add('d-none');

            // Validate step 1 before proceeding
            if (step === 2 && currentStep === 1) {
                const cName = document.getElementById('companyName').value.trim();
                const cEmail = document.getElementById('companyEmail').value.trim();
                const aName = document.getElementById('adminName').value.trim();
                const aEmail = document.getElementById('adminEmail').value.trim();
                const aPass = document.getElementById('adminPassword').value.trim();

                if (!cName || !cEmail || !aName || !aEmail || !aPass) {
                    alertBox.textContent = 'Please fill in all required company and admin fields.';
                    alertBox.classList.remove('d-none');
                    return;
                }
                document.getElementById('brandLiveTitle').textContent = cName;
            }

            // Hide all sections
            document.getElementById('stepSection1').style.display = 'none';
            document.getElementById('stepSection2').style.display = 'none';
            document.getElementById('stepSection3').style.display = 'none';
            document.getElementById('stepSection4').style.display = 'none';

            // Reset indicators
            for (let i = 1; i <= 4; i++) {
                const ind = document.getElementById('indicator' + i);
                ind.classList.remove('active', 'completed');
                if (i < step) {
                    ind.classList.add('completed');
                } else if (i === step) {
                    ind.classList.add('active');
                }
            }

            // Show target section
            document.getElementById('stepSection' + step).style.display = 'block';
            currentStep = step;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Live Domain Previews
        function updateDomainPreviews(val) {
            val = val.trim().replace(/^https?:\/\//i, '').replace(/[\/\\]/g, '').toLowerCase();
            if (!val) val = 'www.example.com';
            document.getElementById('previewFolderName').textContent = val;
            document.getElementById('previewSiteUrl').textContent = '/' + val + '/';
            document.getElementById('previewAdminUrl').textContent = '/' + val + '/admin/';
            document.getElementById('logDirName').textContent = val;
        }

        // Image Upload Previews
        function previewUpload(input, imgId, labelId) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                document.getElementById(labelId).textContent = file.name + ' (' + Math.round(file.size / 1024) + ' KB)';
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById(imgId);
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        // Toggle password visibility
        function togglePassVisibility(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Execute Provisioning
        function executeProvisioning() {
            const domainVal = document.getElementById('domainInput').value.trim();
            const alertBox = document.getElementById('wizardAlert');
            alertBox.classList.add('d-none');

            if (!domainVal) {
                alertBox.textContent = 'Please enter your domain or folder name (e.g. www.example.com).';
                alertBox.classList.remove('d-none');
                return;
            }

            // Move to step 4
            goToStep(4);

            const form = document.getElementById('wizardForm');
            const formData = new FormData(form);

            // Simulation of visual step ticks for delightful UX while backend executes
            const s1 = document.getElementById('dStep1');
            const s2 = document.getElementById('dStep2');
            const s3 = document.getElementById('dStep3');
            const s4 = document.getElementById('dStep4');
            const s5 = document.getElementById('dStep5');
            const s6 = document.getElementById('dStep6');

            setTimeout(() => { markStepDone(s1); markStepRunning(s2); }, 400);
            setTimeout(() => { markStepDone(s2); markStepRunning(s3); }, 800);
            setTimeout(() => { markStepDone(s3); markStepRunning(s4); }, 1200);

            fetch('provision_engine.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    markStepDone(s4);
                    markStepDone(s5);
                    markStepDone(s6);

                    setTimeout(() => {
                        document.getElementById('deploymentLoadingBox').style.display = 'none';
                        document.getElementById('deploymentSuccessBox').style.display = 'block';

                        // Populate results
                        document.getElementById('resWebsiteUrl').textContent = data.website_url;
                        document.getElementById('btnGoToWebsite').href = data.website_url;
                        document.getElementById('btnGoToAdmin').href = data.admin_url;
                        document.getElementById('resAdminEmail').textContent = data.admin_email;
                        document.getElementById('resAdminPassword').textContent = data.admin_password;
                        document.getElementById('resDomain').textContent = data.domain;
                        document.getElementById('resFolder').textContent = data.folder_name;
                        document.getElementById('resDbName').textContent = data.db_name;
                        document.getElementById('resEdition').textContent = data.plan_title;
                    }, 600);
                } else {
                    document.getElementById('stepSection4').style.display = 'none';
                    goToStep(3);
                    alertBox.textContent = data.message || 'Provisioning failed. Please check inputs and retry.';
                    alertBox.classList.remove('d-none');
                }
            })
            .catch(err => {
                document.getElementById('stepSection4').style.display = 'none';
                goToStep(3);
                alertBox.textContent = 'Server communication error: ' + err.message;
                alertBox.classList.remove('d-none');
            });
        }

        function markStepRunning(el) {
            el.className = 'deploy-step running';
            el.querySelector('i').className = 'fa fa-spinner fa-spin text-warning';
        }

        function markStepDone(el) {
            el.className = 'deploy-step success';
            el.querySelector('i').className = 'fa fa-check text-success';
        }
    </script>
</body>
</html>
