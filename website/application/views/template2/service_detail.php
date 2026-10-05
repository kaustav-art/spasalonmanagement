<?php
$service_title = isset($service) && $service ? $service->title : 'Deep Cleansing Facial';
$service_desc = isset($service) && $service ? $service->description : '';
$service_short = isset($service) && $service ? $service->short_desc : '';
$service_price = isset($service) && $service ? $service->price : 85.00;
$service_duration = isset($service) && $service ? $service->duration : '60 mins';
$service_banner = isset($service) && !empty($service->banner_image) ? $service->banner_image : (isset($service) && !empty($service->thumbnail) ? $service->thumbnail : 'assets/template2/images/services/service-details-img4.jpg');

$banner_src = fallback_image_url($service_banner, 'assets/template2/images/services/service-details-img4.jpg');
$home_url = website_url('?preview_tpl=template2&preview_layout=' . (isset($active_home_layout) ? $active_home_layout : 1));

$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$site_logo = $site_logo_url;

$site_fav_url = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');
$site_fav = $site_fav_url;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($service_title) ?> - Pureglow Salon &amp; Spa</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />
    <link rel="shortcut icon" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prata&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=My+Soul&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= $asset_url ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/animate.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/custom-animate.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/swiper.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/font-awesome-all.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/jarallax.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/odometer.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/nice-select.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/jquery-ui.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/aos.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/timePicker.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/twentytwenty.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="<?= $asset_url ?>css/style.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/responsive.css" />

    <style>
        /* Service Rich Text Description Styling (Preserves exact WYSIWYG formatting) */
        .service-rich-text {
            line-height: 1.85;
            color: var(--pureglow-gray, #6D6764);
            font-size: 16px;
        }
        .service-rich-text p {
            margin-top: 0 !important;
            margin-bottom: 1.35rem !important;
            line-height: 1.85 !important;
            color: var(--pureglow-gray, #6D6764) !important;
            font-size: 16px !important;
        }
        .service-rich-text h1,
        .service-rich-text h2,
        .service-rich-text h3,
        .service-rich-text h4,
        .service-rich-text h5,
        .service-rich-text h6 {
            font-family: var(--pureglow-font-two, 'Prata', serif) !important;
            color: var(--pureglow-black, #1C1C1C) !important;
            font-weight: 500 !important;
            line-height: 1.35 !important;
            margin-top: 2rem !important;
            margin-bottom: 0.85rem !important;
        }
        .service-rich-text h1 { font-size: 36px !important; }
        .service-rich-text h2 { font-size: 30px !important; }
        .service-rich-text h3 { font-size: 26px !important; }
        .service-rich-text h4 { font-size: 22px !important; }
        .service-rich-text h5 { font-size: 19px !important; }
        .service-rich-text h6 { font-size: 16px !important; }

        .service-rich-text ul {
            list-style-type: disc !important;
            margin-top: 0.75rem !important;
            margin-bottom: 1.5rem !important;
            padding-left: 28px !important;
        }
        .service-rich-text ol {
            list-style-type: decimal !important;
            margin-top: 0.75rem !important;
            margin-bottom: 1.5rem !important;
            padding-left: 28px !important;
        }
        .service-rich-text li {
            display: list-item !important;
            margin-bottom: 8px !important;
            line-height: 1.75 !important;
            color: var(--pureglow-gray, #6D6764) !important;
            padding-left: 4px !important;
        }
        .service-rich-text blockquote {
            border-left: 4px solid var(--pureglow-base, #FD7E14) !important;
            background: #FAF8F5 !important;
            padding: 16px 22px !important;
            margin: 1.5rem 0 !important;
            font-style: italic !important;
            border-radius: 0 8px 8px 0 !important;
        }
        .service-rich-text img {
            max-width: 100% !important;
            height: auto !important;
            border-radius: 8px !important;
            margin: 1rem 0 !important;
        }
        .service-rich-text table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin: 1.5rem 0 !important;
        }
        .service-rich-text table:not(.no-border):not(.table-borderless):not([data-borderless="1"]):not([style*="border: none"]):not([style*="border:none"]) th,
        .service-rich-text table:not(.no-border):not(.table-borderless):not([data-borderless="1"]):not([style*="border: none"]):not([style*="border:none"]) td {
            border: 1px solid #e2e8f0;
            padding: 10px 14px;
        }
        .service-rich-text table th {
            background-color: #f8fafc;
            font-weight: 600;
        }
        .service-rich-text table.no-border,
        .service-rich-text table.table-borderless,
        .service-rich-text table[data-borderless="1"],
        .service-rich-text table[style*="border: none"],
        .service-rich-text table[style*="border:none"],
        .service-rich-text table.no-border *,
        .service-rich-text table.table-borderless *,
        .service-rich-text table[data-borderless="1"] *,
        .service-rich-text table[style*="border: none"] *,
        .service-rich-text table[style*="border:none"] * {
            border: 0 !important;
            border-top: 0 !important;
            border-bottom: 0 !important;
            border-left: 0 !important;
            border-right: 0 !important;
            box-shadow: none !important;
        }
        .service-rich-text b,
        .service-rich-text strong {
            font-weight: 700 !important;
            color: var(--pureglow-black, #1C1C1C) !important;
        }
        .service-rich-text a {
            color: var(--pureglow-base, #FD7E14) !important;
            text-decoration: underline !important;
        }
    </style>
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="page-wrapper">
        <!-- Main Header Two -->
        <header class="main-header-two">
            <div class="main-menu-two__top">
                <div class="main-menu-two__top-inner">
                    <ul class="list-unstyled main-menu-two__contact-list">
                        <li>
                            <div class="icon">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="text">
                                <p><a href="tel:25632542478">+1 (555) 345-6789</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="text">
                                <p><a href="mailto:info@pureglowspa.com">info@pureglowspa.com</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="far fa-map-marker-alt"></i>
                            </div>
                            <div class="text">
                                <p>742 Evergreen Terrace, Suite 100, New York</p>
                            </div>
                        </li>
                    </ul>

                    <div class="main-menu-two__top-right-content">
                        <div class="main-menu-two__top-right">
                            <div class="main-menu-two__time">
                                <div class="main-menu-two__time-icon">
                                    <span class="icon-clock"></span>
                                </div>
                                <p class="main-menu-two__time-text">Mon - Sat: 09:00 - 19:00</p>
                            </div>
                            <div class="main-menu-two__social-box">
                                <p class="main-menu-two__social-title">Follow Us On:</p>
                                <div class="main-menu-two__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="main-menu main-menu-two">
                <div class="main-menu-two__wrapper">
                    <div class="main-menu-two__wrapper-inner">
                        <div class="main-menu-two__left">
                            <div class="main-menu-two__logo">
                                <a href="<?= $home_url ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;"></a>
                            </div>
                        </div>
                        <div class="main-menu-two__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li>
                                    <a href="<?= $home_url ?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?= website_url('about?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">About</a>
                                </li>
                                <li class="current">
                                    <a href="<?= website_url('services?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">Services</a>
                                </li>
                                <li>
                                    <a href="<?= website_url('contact?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-menu-two__right">
                            <!-- Strictly NO search icon in header -->
                            <div class="main-menu-two__btn-box">
                                <a class="thm-btn" href="<?= website_url('booking') ?>">Book Appointment
                                    <span class="fas fa-arrow-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu main-menu-two">
            <div class="sticky-header__content"></div>
        </div>

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(<?= $asset_url ?>images/backgrounds/page-header-bg.jpg);"></div>
            <div class="shape1 float-bob-y"><img src="<?= $asset_url ?>images/shapes/page-header-shape1.png" alt=""></div>
            <div class="shape2 float-bob-y"><img src="<?= $asset_url ?>images/shapes/page-header-shape2.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    <h2><?= htmlspecialchars($service_title) ?></h2>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb">
                            <li><a href="<?= $home_url ?>">Home</a></li>
                            <li><span>//</span></li>
                            <li><a href="<?= $home_url ?>#services">Services</a></li>
                            <li><span>//</span></li>
                            <li><?= htmlspecialchars($service_title) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Site Service Details Start-->
        <section class="service-details">
            <div class="container">
                <div class="row">
                    <!--Service Details Content (Left Column)-->
                    <div class="col-xl-8 col-lg-7">
                        <div class="service-details__content">
                            <!-- Hero Image -->
                            <div class="service-details__content-img1 mb-4">
                                <img src="<?= htmlspecialchars($banner_src) ?>" alt="<?= htmlspecialchars($service_title) ?>" class="img-fluid rounded" style="max-height: 480px; width: 100%; object-fit: cover;">
                            </div>

                            <!-- Title, Meta, and Intro -->
                            <div class="service-details__content-text1 mb-4">
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                                    <h2 class="mb-0"><?= htmlspecialchars($service_title) ?></h2>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-warning text-dark px-3 py-2 fs-6 fw-bold"><?= format_currency($service_price) ?></span>
                                        <span class="badge bg-dark border text-white px-3 py-2 fs-6"><i class="fal fa-clock me-1"></i><?= htmlspecialchars($service_duration) ?></span>
                                    </div>
                                </div>
                                <?php if (!empty($service_short)): ?>
                                    <p class="lead text-muted" style="font-size: 1.15rem; line-height: 1.7;"><?= htmlspecialchars($service_short) ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Full Description (Rich Text Editor Content) -->
                            <div class="service-details__description service-rich-text mb-4">
                                <?= $service_desc ?>
                            </div>
                        </div>
                    </div>

                    <!--Sidebar (Right Column) - STRICTLY NO SEARCH -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <!-- Strictly NO search widget here -->

                            <!-- Skincare Services List -->
                            <?php if (!empty($all_services)): ?>
                                <div class="sidebar__single sidebar__services">
                                    <div class="sidebar__title-box">
                                        <h2>Skincare Services</h2>
                                    </div>
                                    <div class="sidebar__services-box">
                                        <ul class="sidebar__services-list list-unstyled">
                                            <?php foreach ($all_services as $as): 
                                                $is_cur = ($service && $as->id == $service->id);
                                                $as_url = website_url('service/' . $as->slug . '?preview_tpl=template2&preview_layout=' . $active_home_layout);
                                            ?>
                                                <li class="<?= $is_cur ? 'active' : '' ?>">
                                                    <a href="<?= $as_url ?>">
                                                        <?= htmlspecialchars($as->title) ?>
                                                        <span class="icon-right-arrow"></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Get a Quote / Quick Booking Box -->
                            <div class="sidebar__single sidebar__contact-box">
                                <div class="sidebar__title-box">
                                    <h2>Reserve Treatment</h2>
                                </div>
                                <div class="sidebar__contact-box-inner">
                                    <form class="contact-form-validated sidebar__contact-form" action="<?= website_url('booking') ?>" method="GET">
                                        <div class="row">
                                            <div class="col-xl-12 mb-3">
                                                <p class="text-white mb-3 small">Select your session or reserve instantly through our booking wizard:</p>
                                                <a href="<?= website_url('booking') ?>" class="thm-btn w-100 text-center py-3">
                                                    Book This Session <span class="fas fa-arrow-right"></span>
                                                </a>
                                            </div>
                                            <div class="col-xl-12 pt-3 border-top border-secondary border-opacity-25 text-center">
                                                <p class="text-muted small mb-1">Need assistance? Call us directly:</p>
                                                <a href="tel:15553456789" class="text-white fw-bold">+1 (555) 345-6789</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Site Service Details End-->

        <!--Site Footer Start-->
        <footer class="site-footer">
            <div class="site-footer__top">
                <div class="container">
                    <div class="site-footer__top-inner">
                        <div class="row">
                            <div class="col-xl-4 wow fadeInUp" data-wow-delay="100ms">
                                <div class="footer-widget__about">
                                    <div class="footer-widget__about-logo">
                                        <a href="<?= $home_url ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;"></a>
                                    </div>
                                    <p class="footer-widget__about-text">We provide a range of professional skincare treatments designed to improve your skin's health and natural beauty.</p>
                                    <div class="footer-widget__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                <div class="footer-widget__link">
                                    <div class="footer-widget__title-box">
                                        <h3 class="footer-widget__title">Quick Links</h3>
                                    </div>
                                    <ul class="footer-widget__link-list list-unstyled">
                                        <li><a href="<?= $home_url ?>">Home</a></li>
                                        <li><a href="<?= website_url('about?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">About Us</a></li>
                                        <li><a href="<?= website_url('services?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">Services</a></li>
                                        <li><a href="<?= website_url('booking') ?>">Book Online</a></li>
                                        <li><a href="<?= website_url('contact?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                                <div class="footer-widget__contact">
                                    <div class="footer-widget__title-box">
                                        <h3 class="footer-widget__title">Contact Info</h3>
                                    </div>
                                    <p class="footer-widget__contact-text">742 Evergreen Terrace, Suite 100, New York</p>
                                    <ul class="footer-widget__contact-list list-unstyled">
                                        <li><span class="fal fa-envelope me-2"></span><a href="mailto:info@pureglowspa.com">info@pureglowspa.com</a></li>
                                        <li><span class="fal fa-phone me-2"></span><a href="tel:15553456789">+1 (555) 345-6789</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="container">
                    <p class="site-footer__bottom-text text-center text-muted">&copy; <?= date('Y') ?> Pureglow Spa &amp; Salon Management. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->
    </div>

    <!-- Scroll to Top -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>

    <!-- Scripts -->
    <script src="<?= $asset_url ?>js/jquery-latest.js"></script>
    <script src="<?= $asset_url ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= $asset_url ?>js/jarallax.min.js"></script>
    <script src="<?= $asset_url ?>js/jquery.appear.min.js"></script>
    <script src="<?= $asset_url ?>js/swiper.min.js"></script>
    <script src="<?= $asset_url ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= $asset_url ?>js/jquery.validate.min.js"></script>
    <script src="<?= $asset_url ?>js/odometer.min.js"></script>
    <script src="<?= $asset_url ?>js/wow.js"></script>
    <script src="<?= $asset_url ?>js/isotope.js"></script>
    <script src="<?= $asset_url ?>js/owl.carousel.min.js"></script>
    <script src="<?= $asset_url ?>js/jquery-ui.js"></script>
    <script src="<?= $asset_url ?>js/jquery.nice-select.min.js"></script>
    <script src="<?= $asset_url ?>js/marquee.min.js"></script>
    <script src="<?= $asset_url ?>js/jquery-sidebar-content.js"></script>
    <script src="<?= $asset_url ?>js/aos.js"></script>
    <script src="<?= $asset_url ?>js/script.js"></script>
</body>
</html>
