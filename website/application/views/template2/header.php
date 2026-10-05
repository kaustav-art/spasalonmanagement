<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!isset($asset_url)) {
    $asset_url = base_url('assets/template2/');
}
$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$site_fav_url = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');

$is_home = isset($is_home) ? (bool)$is_home : (empty($this->uri->segment(1)) || ($this->uri->segment(1) === 'home' && empty($this->uri->segment(2))));
$page_title_display = isset($page_title) && !empty($page_title) ? $page_title : (isset($business_name) ? $business_name : 'Pureglow');
$phone_cleaned = isset($business_phone) ? preg_replace('/[^0-9+]/', '', $business_phone) : '+15553456789';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($page_title_display) ?> - <?= htmlspecialchars($business_name ?? 'Pureglow') ?></title>
    
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />
    <link rel="shortcut icon" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prata&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=My+Soul&amp;display=swap" rel="stylesheet">

    <!-- CSS stylesheets -->
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
    <link rel="stylesheet" href="<?= $asset_url ?>css/style.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/responsive.css?v=<?= time() ?>" />

    <style>
        /* Smooth scrolling stability & eliminate header jitter/dancing */
        html, :root {
            scroll-behavior: auto !important;
        }

        .main-header-two {
            transition: none !important;
        }

        .stricky-header {
            will-change: transform;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform: translate3d(0, -105%, 0) !important;
            transform: translate3d(0, -105%, 0) !important;
            -webkit-transition: -webkit-transform 350ms cubic-bezier(0.25, 1, 0.5, 1), visibility 350ms cubic-bezier(0.25, 1, 0.5, 1) !important;
            transition: transform 350ms cubic-bezier(0.25, 1, 0.5, 1), visibility 350ms cubic-bezier(0.25, 1, 0.5, 1) !important;
        }

        .stricky-header.stricky-fixed {
            -webkit-transform: translate3d(0, 0, 0) !important;
            transform: translate3d(0, 0, 0) !important;
            visibility: visible !important;
        }

        /* Rich Text Formatting Styles for WYSIWYG Detail Pages */
        .service-rich-text, .blog-rich-text {
            line-height: 1.85;
            color: var(--pureglow-gray, #6D6764);
            font-size: 16px;
        }
        .service-rich-text p, .blog-rich-text p {
            margin-top: 0 !important;
            margin-bottom: 1.35rem !important;
            line-height: 1.85 !important;
            color: var(--pureglow-gray, #6D6764) !important;
            font-size: 16px !important;
        }
        .service-rich-text h1, .service-rich-text h2, .service-rich-text h3,
        .service-rich-text h4, .service-rich-text h5, .service-rich-text h6,
        .blog-rich-text h1, .blog-rich-text h2, .blog-rich-text h3,
        .blog-rich-text h4, .blog-rich-text h5, .blog-rich-text h6 {
            font-family: var(--pureglow-font-two, 'Prata', serif) !important;
            color: var(--pureglow-black, #1C1C1C) !important;
            font-weight: 500 !important;
            line-height: 1.35 !important;
            margin-top: 1.8rem !important;
            margin-bottom: 0.85rem !important;
        }
        .service-rich-text ul, .blog-rich-text ul {
            list-style-type: disc !important;
            margin: 0.75rem 0 1.5rem 24px !important;
        }
        .service-rich-text ol, .blog-rich-text ol {
            list-style-type: decimal !important;
            margin: 0.75rem 0 1.5rem 24px !important;
        }
        .service-rich-text li, .blog-rich-text li {
            display: list-item !important;
            margin-bottom: 8px !important;
            line-height: 1.75 !important;
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
    </style>
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!--Start Preloader-->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!--End Preloader-->

    <!--Chat Icon & Popup-->
    <div class="chat-icon"><button type="button" class="chat-toggler"><i class="fa fa-comment"></i></button></div>
    <div id="chat-popup" class="chat-popup">
        <div class="popup-inner">
            <div class="close-chat"><i class="fa fa-times"></i></div>
            <div class="chat-form">
                <p>Please fill out the form below and we will get back to you as soon as possible.</p>
                <form action="#" method="POST" class="contact-form-validated">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Text" required></textarea>
                    </div>
                    <div class="form-group message-btn">
                        <button type="submit" class="thm-btn"> Submit Now
                            <span class="fas fa-arrow-right"></span>
                        </button>
                    </div>
                    <div class="result"></div>
                </form>
            </div>
        </div>
    </div>

    <!-- Start sidebar widget content -->
    <div class="xs-sidebar-group info-group info-sidebar">
        <div class="xs-overlay xs-bg-black"></div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading">
                    <a href="#" class="close-side-widget">X</a>
                </div>
                <div class="sidebar-textwidget">
                    <div class="sidebar-info-contents">
                        <div class="content-inner">
                            <div class="logo">
                                <a href="<?= website_url() ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;" /></a>
                            </div>
                            <div class="content-box">
                                <h4>About Us</h4>
                                <div class="inner-text">
                                    <p><?= htmlspecialchars($footer_about ?? 'Experience world-class hair styling, beauty therapies, and restorative holistic spa treatments.') ?></p>
                                </div>
                            </div>
                            <div class="sidebar-contact-info">
                                <h4>Contact Info</h4>
                                <ul class="list-unstyled">
                                    <li><span class="icon-maps-and-flags"></span> <?= htmlspecialchars($business_address ?? 'New York') ?></li>
                                    <li><span class="icon-call"></span> <a href="tel:<?= $phone_cleaned ?>"><?= htmlspecialchars($business_phone ?? '+1 (555) 345-6789') ?></a></li>
                                    <li><span class="icon-email"></span> <a href="mailto:<?= htmlspecialchars($business_email ?? 'contact@example.com') ?>"><?= htmlspecialchars($business_email ?? 'contact@example.com') ?></a></li>
                                </ul>
                            </div>
                            <div class="thm-social-link1">
                                <ul class="social-box list-unstyled">
                                    <?php if (!empty($facebook_url)): ?><li><a href="<?= htmlspecialchars($facebook_url) ?>"><i class="fab fa-facebook-f"></i></a></li><?php endif; ?>
                                    <?php if (!empty($twitter_url)): ?><li><a href="<?= htmlspecialchars($twitter_url) ?>"><i class="fab fa-twitter"></i></a></li><?php endif; ?>
                                    <?php if (!empty($instagram_url)): ?><li><a href="<?= htmlspecialchars($instagram_url) ?>"><i class="fab fa-instagram"></i></a></li><?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End sidebar widget content -->

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
                                <p><a href="tel:<?= $phone_cleaned ?>"><?= htmlspecialchars($business_phone ?? '+1 (555) 345-6789') ?></a></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="text">
                                <p><a href="mailto:<?= htmlspecialchars($business_email ?? 'info@example.com') ?>"><?= htmlspecialchars($business_email ?? 'info@example.com') ?></a></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="far fa-map-marker-alt"></i>
                            </div>
                            <div class="text">
                                <p><?= htmlspecialchars($business_address ?? 'New York') ?></p>
                            </div>
                        </li>
                    </ul>

                    <div class="main-menu-two__top-right-content">
                        <div class="main-menu-two__top-right">
                            <div class="main-menu-two__time">
                                <div class="main-menu-two__time-icon">
                                    <span class="icon-clock"></span>
                                </div>
                                <p class="main-menu-two__time-text">Mon - Sat: 09:00 - 20:00</p>
                            </div>
                            <div class="main-menu-two__social-box">
                                <p class="main-menu-two__social-title">Follow Us On:</p>
                                <div class="main-menu-two__social">
                                    <?php if (!empty($twitter_url) && $twitter_url !== '#'): ?><a href="<?= htmlspecialchars($twitter_url) ?>"><i class="fab fa-twitter"></i></a><?php else: ?><a href="#"><i class="fab fa-twitter"></i></a><?php endif; ?>
                                    <?php if (!empty($facebook_url) && $facebook_url !== '#'): ?><a href="<?= htmlspecialchars($facebook_url) ?>"><i class="fab fa-facebook-f"></i></a><?php else: ?><a href="#"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                                    <?php if (!empty($instagram_url) && $instagram_url !== '#'): ?><a href="<?= htmlspecialchars($instagram_url) ?>"><i class="fab fa-instagram"></i></a><?php else: ?><a href="#"><i class="fab fa-instagram"></i></a><?php endif; ?>
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
                                <a href="<?= website_url() ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;"></a>
                            </div>
                        </div>
                        <div class="main-menu-two__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="<?= $is_home ? 'current' : '' ?>">
                                    <a href="<?= website_url() ?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?= $is_home ? '#about' : website_url('#about') ?>">About</a>
                                </li>
                                <li>
                                    <a href="<?= $is_home ? '#services' : website_url('#services') ?>">Services</a>
                                </li>
                                <li>
                                    <a href="<?= $is_home ? '#faq' : website_url('#faq') ?>">FAQ</a>
                                </li>
                                <li>
                                    <a href="<?= $is_home ? '#blog' : website_url('#blog') ?>">Blog</a>
                                </li>
                                <li>
                                    <a href="<?= $is_home ? '#booking' : website_url('#booking') ?>">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-menu-two__right">
                            <div class="main-menu__call me-4">
                                <div class="main-menu__call-icon">
                                    <i class="icon-telephone"></i>
                                </div>
                                <div class="main-menu__call-content">
                                    <p class="main-menu__call-sub-title">Call Anytime</p>
                                    <h5 class="main-menu__call-number"><a href="tel:<?= $phone_cleaned ?>"><?= htmlspecialchars($business_phone ?? '+1 (555) 345-6789') ?></a></h5>
                                </div>
                            </div>
                            <div class="main-menu-two__btn-box">
                                <a class="thm-btn" href="<?= $is_home ? '#booking' : website_url('#booking') ?>">Book Now
                                    <span class="fas fa-arrow-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Sticky Header Clone Box -->
        <div class="stricky-header stricked-menu main-menu main-menu-two">
            <div class="sticky-header__content"></div>
        </div>

        <?php if (!$is_home): ?>
        <!--Page Header Start for Inner Pages-->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(<?= $asset_url ?>images/backgrounds/page-header-bg.jpg);"></div>
            <div class="shape1 float-bob-y"><img src="<?= $asset_url ?>images/shapes/page-header-shape1.png" alt="shape"></div>
            <div class="shape2 float-bob-y"><img src="<?= $asset_url ?>images/shapes/page-header-shape2.png" alt="shape"></div>
            <div class="container">
                <div class="page-header__inner">
                    <h2><?= htmlspecialchars($page_title_display) ?></h2>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb">
                            <li><a href="<?= website_url() ?>">Home</a></li>
                            <li><span>//</span></li>
                            <li><?= htmlspecialchars($page_title_display) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <?php endif; ?>
