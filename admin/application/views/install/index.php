<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salon & Spa Management Script - Installation Wizard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #1b2838 0%, #2a3a4c 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: system-ui, -apple-system, sans-serif; padding: 20px; }
        .wizard-card { max-width: 780px; width: 100%; border-radius: 16px; box-shadow: 0 20px 50px rgba(0,0,0,0.3); }
        .edition-box { border: 2px solid #e2e8f0; border-radius: 10px; cursor: pointer; transition: all 0.2s ease; }
        .edition-box:hover { border-color: #6366f1; background-color: #f8fafc; }
        .edition-box.selected { border-color: #4f46e5; background-color: #eef2ff; }
    </style>
</head>
<body>

<div class="card wizard-card border-0 bg-white overflow-hidden my-4">
    <div class="card-header bg-primary text-white text-center py-4">
        <h3 class="fw-bold mb-1"><i class="fas fa-magic me-2"></i>Salon & Spa Management Script</h3>
        <p class="mb-0 text-white-50">Commercial Multi-Edition Setup & Installation Wizard</p>
    </div>
    <div class="card-body p-4 p-md-5">

        <?php if (!empty($install_complete)): ?>
            <div class="text-center py-4">
                <div class="avatar-lg bg-success text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                    <i class="fas fa-check fa-2x"></i>
                </div>
                <h4 class="fw-bold text-success">Installation Completed Successfully!</h4>
                <p class="text-muted">Your Salon & Spa Management Script is configured and ready for production use.</p>
                <div class="alert alert-info py-2 d-inline-block px-4 mb-4">
                    Admin Login: <strong><?= htmlspecialchars($admin_email) ?></strong>
                </div>
                <div>
                    <a href="<?= admin_url('login') ?>" class="btn btn-primary btn-lg px-4 me-2">
                        <i class="fas fa-sign-in-alt me-2"></i>Go to Admin Login
                    </a>
                    <a href="<?= base_url('../website') ?>" class="btn btn-outline-secondary btn-lg px-4">
                        <i class="fas fa-globe me-2"></i>Visit Public Website
                    </a>
                </div>
            </div>

        <?php elseif (!empty($is_installed)): ?>
            <div class="text-center py-4">
                <div class="avatar-lg bg-info text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                    <i class="fas fa-lock fa-2x"></i>
                </div>
                <h4 class="fw-bold text-dark">Script Already Installed</h4>
                <p class="text-muted">The system is locked to prevent accidental re-installations.</p>
                <div class="mt-4">
                    <a href="<?= admin_url('login') ?>" class="btn btn-primary btn-lg px-4 me-2">
                        <i class="fas fa-sign-in-alt me-2"></i>Admin Dashboard
                    </a>
                    <a href="<?= base_url('../website') ?>" class="btn btn-outline-secondary btn-lg px-4 me-2">
                        <i class="fas fa-globe me-2"></i>Visit Website
                    </a>
                    <a href="<?= admin_url('install?force=1') ?>" class="btn btn-link text-muted btn-sm d-block mt-3">
                        Re-run Setup Wizard
                    </a>
                </div>
            </div>

        <?php else: ?>

            <!-- System Pre-requisites -->
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-muted small mb-3">1. Server Environment Check</h6>
                <div class="row g-2">
                    <div class="col-md-3 col-6">
                        <div class="p-2 border rounded text-center small">
                            PHP 7.4 - 8.2+: <?= $php_ok ? '<i class="fas fa-check-circle text-success"></i> OK' : '<i class="fas fa-times-circle text-danger"></i> No' ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-2 border rounded text-center small">
                            MySQLi: <?= $mysqli_ok ? '<i class="fas fa-check-circle text-success"></i> OK' : '<i class="fas fa-times-circle text-danger"></i> No' ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-2 border rounded text-center small">
                            cURL: <?= $curl_ok ? '<i class="fas fa-check-circle text-success"></i> OK' : '<i class="fas fa-times-circle text-danger"></i> No' ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-2 border rounded text-center small">
                            mbstring: <?= $mbstring_ok ? '<i class="fas fa-check-circle text-success"></i> OK' : '<i class="fas fa-times-circle text-danger"></i> No' ?>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="<?= admin_url('install') ?>">
                <!-- Edition Selection (User Requirement) -->
                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase text-muted small mb-3">2. Choose Your Script Edition / Payment Type</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="edition-box p-3 d-block h-100">
                                <input type="radio" name="business_type" value="SALON" class="form-check-input mb-2">
                                <div class="fw-bold text-primary"><i class="fas fa-cut me-1"></i>1. Salon Edition</div>
                                <small class="text-muted d-block mt-1">Stylists, hair/nail services, walk-in queue, styling chairs. (Spa rooms hidden)</small>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="edition-box p-3 d-block h-100">
                                <input type="radio" name="business_type" value="SPA" class="form-check-input mb-2">
                                <div class="fw-bold text-success"><i class="fas fa-spa me-1"></i>2. Spa Edition</div>
                                <small class="text-muted d-block mt-1">Therapists, massage rituals, private treatment suites & conflict calendar.</small>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="edition-box p-3 d-block h-100 selected">
                                <input type="radio" name="business_type" value="SALON_SPA" class="form-check-input mb-2" checked>
                                <div class="fw-bold text-dark"><i class="fas fa-gem text-warning me-1"></i>3. Salon & Spa Combo</div>
                                <small class="text-muted d-block mt-1">Complete unified suite. All salon stylist and spa room features enabled.</small>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Multi Template Selection (User Requirement) -->
                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase text-muted small mb-3">3. Default Website Theme & Homepage Layout</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Active Website Theme</label>
                            <select name="active_template" class="form-select">
                                <option value="template1" selected>Template 1 - Glamr (Luxury Gold & Dark/Light)</option>
                                <option value="template2">Template 2 - Pureglow (Modern Wellness & Organic)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Default Homepage Layout</label>
                            <select name="active_home_layout" class="form-select">
                                <option value="1" selected>Homepage Layout 1 (Hero Slider & Quick Booking)</option>
                                <option value="2">Homepage Layout 2 (Split Hero & Services Grid)</option>
                                <option value="3">Homepage Layout 3 (Full Banner & VIP Treatment Showcase)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Business Info & Admin Account -->
                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase text-muted small mb-3">4. Salon / Spa Business & Admin Account</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Business Name</label>
                            <input type="text" name="business_name" class="form-control" value="Luxe Salon & Serenity Spa" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Admin Name</label>
                            <input type="text" name="admin_name" class="form-control" value="Super Administrator" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Admin Email</label>
                            <input type="email" name="admin_email" class="form-control" value="admin@spasalon.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Admin Password</label>
                            <input type="password" name="admin_password" class="form-control" value="admin123" required>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow">
                        <i class="fas fa-rocket me-2"></i>Install & Launch System
                    </button>
                </div>
            </form>

        <?php endif; ?>

    </div>
</div>

</body>
</html>
