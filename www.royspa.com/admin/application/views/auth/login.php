<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | <?= html_escape(get_setting('business_name', 'Salon & Spa Management')) ?></title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= admin_asset('img/logo/favicon.png') ?>" type="image/x-icon">
    
    <!-- Global CSS -->
    <link id="bootstrap-css" rel="stylesheet" type="text/css" href="<?= admin_asset('css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= admin_asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= admin_asset('css/conca.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .demo-box { background: var(--bs-card-bg, #f8fafc); border: 1px dashed var(--bs-border-color, #cbd5e1); border-radius: 8px; padding: 12px; }
    </style>
</head>
<body>
    <div class="auth-main">
        <div class="container-xxl">
            <div class="auth-wrapper auth-basic p-5 min-vh-100 d-flex align-items-center justify-content-center">
                <div class="auth-card py-6" style="max-width: 480px; width: 100%;">
                    <div class="card shadow-xl rounded-4">
                        <div class="card-body py-9 px-6 px-sm-10">
                            <div class="mb-7 text-center">
                                <div class="d-flex align-items-center justify-content-center mb-4">
                                    <img class="app-main-logo logo-black" width="110" src="<?= admin_asset('img/logo/logo.png') ?>" alt="Logo">
                                    <img class="app-main-logo logo-white d-none" width="110" src="<?= admin_asset('img/logo/logo-white.png') ?>" alt="Logo">
                                </div>
                                <h4 class="mb-1 fw-semibold"><?= html_escape(get_setting('business_name', 'Salon & Spa Management')) ?></h4>
                                <p class="text-muted fs-14px"><?= html_escape(get_setting('business_tagline', 'Business Control & Administration Portal')) ?></p>
                            </div>

                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show fs-14px mb-4" role="alert">
                                    <i class="fa-solid fa-circle-exclamation me-2"></i> <?= $this->session->flashdata('error') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show fs-14px mb-4" role="alert">
                                    <i class="fa-solid fa-circle-check me-2"></i> <?= $this->session->flashdata('success') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?>

                            <form action="<?= admin_url('auth/login') ?>" method="POST">
                                <div class="mb-3">
                                    <label for="loginEmail" class="form-label fw-medium">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="loginEmail" placeholder="admin@spasalon.com" required value="admin@spasalon.com">
                                </div>

                                <div class="mb-4">
                                    <label for="loginPassword" class="form-label fw-medium">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" placeholder="••••••••" id="loginPassword" required value="admin123">
                                        <span class="input-group-text password-toggle cursor-pointer" style="cursor: pointer;">
                                            <span class="close-eye password-eye">
                                                <svg width="22" height="10" viewBox="0 0 22 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21 1C21 1 17 7 11 7C5 7 1 1 1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M14 6.5L15.5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M19 4L21 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M1 6L3 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8 6.5L6.5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span class="open-eye password-eye d-none">
                                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20.544 7.04498C20.848 7.4713 21 7.68447 21 8C21 8.31553 20.848 8.52869 20.544 8.95501C19.1779 10.8706 15.6892 15 11 15C6.31078 15 2.8221 10.8706 1.45604 8.95502C1.15201 8.5287 1 8.31553 1 8C1 7.68447 1.15201 7.47131 1.45604 7.04499C2.8221 5.12944 6.31078 1 11 1C15.6892 1 19.1779 5.12944 20.544 7.04498Z" stroke="currentColor" stroke-width="1.5" />
                                                    <path d="M14 8C14 6.34315 12.6569 5 11 5C9.34315 5 8 6.34315 8 8C8 9.65685 9.34315 11 11 11C12.6569 11 14 9.65685 14 8Z" stroke="currentColor" stroke-width="1.5" />
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                        <label class="form-check-label fs-14px" for="rememberMe">Remember me</label>
                                    </div>
                                    <a href="<?= admin_url('settings') ?>" class="fs-13px text-primary text-decoration-none">Need Help?</a>
                                </div>

                                <div class="mb-4">
                                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold fs-15px">
                                        Sign In to Dashboard
                                    </button>
                                </div>

                                <!-- Demo Credentials Box -->
                                <div class="demo-box text-start mb-4">
                                    <div class="fw-bold text-dark fs-13px mb-1"><i class="fa-solid fa-key text-warning me-1"></i> Demo Credentials:</div>
                                    <div class="fs-12px text-muted mb-2">
                                        <strong>Email:</strong> admin@spasalon.com &bull; <strong>Password:</strong> admin123
                                    </div>
                                    <button type="button" onclick="fillAdmin()" class="btn btn-xs btn-outline-primary">
                                        Auto-fill Credentials
                                    </button>
                                </div>
                            </form>

                            <div class="text-center pt-3 border-top">
                                <a href="<?= website_url() ?>" class="text-decoration-none fs-14px text-muted">
                                    <i class="fa-solid fa-arrow-left me-1"></i> Back to Public Website
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts from Conca theme -->
    <script src="<?= admin_asset('vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= admin_asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
    <script src="<?= admin_asset('js/bootstrap.js') ?>"></script>
    <script src="<?= admin_asset('js/conca.js') ?>"></script>

    <script>
    function fillAdmin() {
        document.getElementById('loginEmail').value = 'admin@spasalon.com';
        document.getElementById('loginPassword').value = 'admin123';
    }
    </script>
</body>
</html>
