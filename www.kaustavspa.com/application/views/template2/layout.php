<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($page_title) ?> - <?= htmlspecialchars($business_name) ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= template_asset('images/favicons/favicon-32x32.png', 'template2') ?>" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Prata&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= template_asset('css/bootstrap.min.css', 'template2') ?>" />
    <link rel="stylesheet" href="<?= template_asset('css/animate.min.css', 'template2') ?>" />
    <link rel="stylesheet" href="<?= template_asset('css/custom-animate.css', 'template2') ?>" />
    <link rel="stylesheet" href="<?= template_asset('css/swiper.min.css', 'template2') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="<?= template_asset('css/font-awesome-all.css', 'template2') ?>" />
    <link rel="stylesheet" href="<?= template_asset('css/owl.carousel.min.css', 'template2') ?>" />
    <link rel="stylesheet" href="<?= template_asset('css/owl.theme.default.min.css', 'template2') ?>" />
    <link rel="stylesheet" href="<?= template_asset('css/style.css', 'template2') ?>" />
    <link rel="stylesheet" href="<?= template_asset('css/responsive.css', 'template2') ?>" />

    <style>
        body { font-family: 'Montserrat', sans-serif; color: #555; background-color: #faf8f5; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Prata', serif; color: #222; }
        .pureglow-topbar { background: #26211e; color: #c4b9b2; padding: 10px 0; font-size: 13px; }
        .pureglow-topbar a { color: #d6cbc4; text-decoration: none; }
        .pureglow-topbar a:hover { color: #c29979; }
        .pureglow-navbar { background: #ffffff; box-shadow: 0 4px 20px rgba(0,0,0,0.06); padding: 16px 0; }
        .pureglow-brand { font-family: 'Prata', serif; font-size: 26px; color: #2e2621; font-weight: 700; text-decoration: none; }
        .pureglow-brand span { color: #b8865f; }
        .nav-link { color: #332d29 !important; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 14px !important; }
        .nav-link:hover, .nav-link.active { color: #b8865f !important; }
        .btn-pureglow { background: #b8865f; color: #fff; font-weight: 600; border-radius: 30px; padding: 11px 28px; transition: all 0.3s; border: none; text-decoration: none; display: inline-block; }
        .btn-pureglow:hover { background: #9d6d48; color: #fff; transform: translateY(-2px); box-shadow: 0 6px 16px rgba(184, 134, 95, 0.35); }
        .btn-outline-pureglow { border: 2px solid #b8865f; color: #b8865f; font-weight: 600; border-radius: 30px; padding: 9px 26px; transition: all 0.3s; text-decoration: none; display: inline-block; }
        .btn-outline-pureglow:hover { background: #b8865f; color: #fff; }
        .pureglow-footer { background: #1e1916; color: #9c9189; padding-top: 70px; }
        .footer-widget h5 { color: #fff; font-size: 20px; margin-bottom: 22px; position: relative; padding-bottom: 12px; }
        .footer-widget h5::after { content: ''; position: absolute; left: 0; bottom: 0; width: 35px; height: 2px; background: #b8865f; }
        .footer-links { list-style: none; padding: 0; margin: 0; }
        .footer-links li { margin-bottom: 11px; }
        .footer-links a { color: #9c9189; text-decoration: none; transition: all 0.2s; }
        .footer-links a:hover { color: #b8865f; padding-left: 5px; }
        .pureglow-copyright { background: #15110f; padding: 22px 0; border-top: 1px solid rgba(255,255,255,0.06); font-size: 13px; color: #7a7069; }
        .preview-bar { background: #3b2c24; color: #fff; padding: 6px 15px; font-size: 12px; text-align: center; }
    </style>
</head>
<body>

    <!-- Admin Live Switcher Preview Bar (if preview parameters active) -->
    <?php if ($this->input->get('preview_tpl') || $this->input->get('preview_layout')): ?>
    <div class="preview-bar">
        <i class="fas fa-eye me-1"></i><strong>Admin Live Preview Mode:</strong> Active Template: <code><?= htmlspecialchars($active_template) ?></code> | Layout: <code>Home <?= $active_home_layout ?></code>
        <a href="<?= admin_url('website/templates') ?>" class="text-warning text-decoration-underline ms-2">Switch in Admin</a>
    </div>
    <?php endif; ?>

    <!-- Pureglow Top Bar -->
    <div class="pureglow-topbar d-none d-lg-block">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-4">
                    <span><i class="fas fa-map-marker-alt text-warning me-2"></i><?= htmlspecialchars($business_address) ?></span>
                    <span><i class="fas fa-envelope text-warning me-2"></i><?= htmlspecialchars($business_email) ?></span>
                    <span><i class="far fa-clock text-warning me-2"></i>Daily: 09:00 AM &ndash; 08:00 PM</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <?php if ($facebook_url): ?><a href="<?= htmlspecialchars($facebook_url) ?>" target="_blank"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                    <?php if ($instagram_url): ?><a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
                    <?php if ($twitter_url): ?><a href="<?= htmlspecialchars($twitter_url) ?>" target="_blank"><i class="fab fa-twitter"></i></a><?php endif; ?>
                    <a href="<?= admin_url('login') ?>" class="text-white-50 ms-2"><i class="fas fa-lock me-1"></i>Staff</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Pureglow Main Navigation -->
    <header class="pureglow-navbar sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-xl navbar-light p-0">
                <a class="pureglow-brand" href="<?= website_url() ?>">
                    <?= htmlspecialchars($business_name) ?>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#pureglowMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="pureglowMenu">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= $this->uri->segment(1) == '' ? 'active' : '' ?>" href="<?= website_url() ?>" data-bs-toggle="dropdown">
                                Home
                            </a>
                            <ul class="dropdown-menu shadow border-0">
                                <li><a class="dropdown-item <?= ($active_home_layout == 1 && $this->uri->segment(1) == '') ? 'active' : '' ?>" href="<?= website_url('?preview_layout=1') ?>">Homepage 01 (Pureglow Classic)</a></li>
                                <li><a class="dropdown-item <?= ($active_home_layout == 2) ? 'active' : '' ?>" href="<?= website_url('?preview_layout=2') ?>">Homepage 02 (Wellness Grid)</a></li>
                                <li><a class="dropdown-item <?= ($active_home_layout == 3) ? 'active' : '' ?>" href="<?= website_url('?preview_layout=3') ?>">Homepage 03 (Therapy Focus)</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'about' ? 'active' : '' ?>" href="<?= website_url('about') ?>">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'services' ? 'active' : '' ?>" href="<?= website_url('services') ?>">Treatments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'packages' ? 'active' : '' ?>" href="<?= website_url('packages') ?>">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'team' ? 'active' : '' ?>" href="<?= website_url('team') ?>">Therapists & Stylists</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'gallery' ? 'active' : '' ?>" href="<?= website_url('gallery') ?>">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'testimonials' ? 'active' : '' ?>" href="<?= website_url('testimonials') ?>">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'contact' ? 'active' : '' ?>" href="<?= website_url('contact') ?>">Contact</a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-3">
                        <a href="tel:<?= htmlspecialchars($business_phone) ?>" class="text-dark fw-bold d-none d-xxl-block text-decoration-none">
                            <i class="fas fa-phone-alt text-warning me-1"></i><?= htmlspecialchars($business_phone) ?>
                        </a>
                        <a href="<?= website_url('booking') ?>" class="btn btn-pureglow">
                            <i class="fas fa-calendar-alt me-1"></i>Book Session
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <?= $content ?>
    </main>

    <!-- Pureglow Footer -->
    <footer class="pureglow-footer">
        <div class="container pb-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <a class="pureglow-brand text-white mb-3 d-inline-block" href="<?= website_url() ?>">
                            <?= htmlspecialchars($business_name) ?>
                        </a>
                        <p class="small mb-4 text-white-50">
                            <?= htmlspecialchars($footer_about) ?>
                        </p>
                        <div class="d-flex gap-2">
                            <?php if ($facebook_url): ?><a href="<?= htmlspecialchars($facebook_url) ?>" class="btn btn-sm btn-outline-secondary rounded-circle text-white" style="width:36px;height:36px;"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                            <?php if ($instagram_url): ?><a href="<?= htmlspecialchars($instagram_url) ?>" class="btn btn-sm btn-outline-secondary rounded-circle text-white" style="width:36px;height:36px;"><i class="fab fa-instagram"></i></a><?php endif; ?>
                            <?php if ($twitter_url): ?><a href="<?= htmlspecialchars($twitter_url) ?>" class="btn btn-sm btn-outline-secondary rounded-circle text-white" style="width:36px;height:36px;"><i class="fab fa-twitter"></i></a><?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h5>Quick Links</h5>
                        <ul class="footer-links">
                            <li><a href="<?= website_url('about') ?>">Our Sanctuary</a></li>
                            <li><a href="<?= website_url('services') ?>">Treatment Rituals</a></li>
                            <li><a href="<?= website_url('packages') ?>">VIP Packages</a></li>
                            <li><a href="<?= website_url('team') ?>">Our Therapists</a></li>
                            <li><a href="<?= website_url('booking') ?>">Book Online</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5>Operating Hours</h5>
                        <ul class="list-unstyled small text-white-50 lh-lg mb-0">
                            <li><strong class="text-white">Monday &ndash; Friday:</strong> 09:00 AM &ndash; 08:00 PM</li>
                            <li><strong class="text-white">Saturday:</strong> 09:00 AM &ndash; 08:00 PM</li>
                            <li><strong class="text-white">Sunday:</strong> 10:00 AM &ndash; 06:00 PM</li>
                            <li class="mt-2 text-warning"><i class="fas fa-shield-alt me-1"></i>Private VIP Rooms Available</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5>Contact & Sanctuary</h5>
                        <ul class="list-unstyled small text-white-50 lh-lg">
                            <li class="mb-2"><i class="fas fa-map-marker-alt text-warning me-2"></i><?= htmlspecialchars($business_address) ?></li>
                            <li class="mb-2"><i class="fas fa-phone-alt text-warning me-2"></i><?= htmlspecialchars($business_phone) ?></li>
                            <li class="mb-2"><i class="fas fa-envelope text-warning me-2"></i><?= htmlspecialchars($business_email) ?></li>
                        </ul>
                        <a href="<?= website_url('booking') ?>" class="btn btn-outline-pureglow btn-sm w-100 mt-2 text-white">
                            <i class="fas fa-calendar-check me-1"></i>Online Reservation
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pureglow-copyright">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div>&copy; <?= date('Y') ?> <?= htmlspecialchars($business_name) ?>. All Rights Reserved.</div>
                    <div>
                        <span class="me-3">Edition: <span class="badge bg-secondary"><?= str_replace('_', ' + ', $business_type) ?></span></span>
                        <span>Theme: <strong>Template 2 (Pureglow)</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS Files -->
    <script src="<?= template_asset('js/jquery-latest.js', 'template2') ?>"></script>
    <script src="<?= template_asset('js/bootstrap.bundle.min.js', 'template2') ?>"></script>
    <script src="<?= template_asset('js/owl.carousel.min.js', 'template2') ?>"></script>
    <script src="<?= template_asset('js/swiper.min.js', 'template2') ?>"></script>

</body>
</html>
