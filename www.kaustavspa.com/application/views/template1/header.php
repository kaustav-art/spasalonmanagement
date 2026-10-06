<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$site_logo = $site_logo_url;

$site_fav_url = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');
$site_fav = $site_fav_url;
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= htmlspecialchars($page_title) ?> - <?= htmlspecialchars($business_name) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?= template_asset('css/bootstrap.min.css', 'template1') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="<?= template_asset('css/fontawesome.css', 'template1') ?>">
    <link rel="stylesheet" href="<?= template_asset('fonts/pbmit-glamr-icon/pbmit_glamr.css', 'template1') ?>">
    <link rel="stylesheet" href="<?= template_asset('css/pbminfotech-base-icons.css', 'template1') ?>">
    <link rel="stylesheet" href="<?= template_asset('css/themify-icons.css', 'template1') ?>">
    <link rel="stylesheet" href="<?= template_asset('css/swiper.min.css', 'template1') ?>">
    <link rel="stylesheet" href="<?= template_asset('css/magnific-popup.css', 'template1') ?>">
    <link rel="stylesheet" href="<?= template_asset('css/aos.css', 'template1') ?>">
    <link rel="stylesheet" href="<?= template_asset('css/shortcode.css', 'template1') ?>">
    <link rel="stylesheet" href="<?= template_asset('css/base.css', 'template1') ?>">
    <link rel="stylesheet" href="<?= template_asset('css/style.css', 'template1') ?>">
    <link rel="stylesheet" href="<?= template_asset('css/responsive.css', 'template1') ?>">

    <style>
        .site-header { background: #121212; position: relative; z-index: 999; }
        .pbmit-top-bar { background: #1a1a1a; padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.08); font-size: 13px; color: #aaa; }
        .pbmit-top-bar a { color: #ccc; text-decoration: none; }
        .pbmit-top-bar a:hover { color: #d4af37; }
        .navbar-brand-text { font-family: 'Prata', serif; font-size: 24px; color: #fff; font-weight: 700; text-decoration: none; letter-spacing: 1px; }
        .navbar-brand-text span { color: #d4af37; }
        .nav-link { color: #eee !important; font-weight: 500; font-size: 15px; padding: 15px 12px !important; text-transform: uppercase; letter-spacing: 0.5px; }
        .nav-link:hover, .nav-link.active { color: #d4af37 !important; }
        .site-footer { background: #0e0e0e; color: #aaa; padding-top: 60px; border-top: 1px solid rgba(255,255,255,0.06); }
        .footer-widget h5 { color: #fff; font-size: 18px; font-weight: 600; margin-bottom: 20px; position: relative; padding-bottom: 10px; }
        .footer-widget h5::after { content: ''; position: absolute; left: 0; bottom: 0; width: 40px; height: 2px; background: #d4af37; }
        .footer-links { list-style: none; padding: 0; margin: 0; }
        .footer-links li { margin-bottom: 10px; }
        .footer-links a { color: #999; text-decoration: none; transition: all 0.2s; }
        .footer-links a:hover { color: #d4af37; padding-left: 5px; }
        .copyright-bar { background: #080808; padding: 20px 0; border-top: 1px solid rgba(255,255,255,0.05); font-size: 13px; }
        .btn-gold { background: #d4af37; color: #000; font-weight: 600; border-radius: 4px; padding: 10px 24px; transition: all 0.3s; border: none; text-decoration: none; display: inline-block; }
        .btn-gold:hover { background: #c59f2c; color: #000; transform: translateY(-2px); }
        .btn-outline-gold { border: 2px solid #d4af37; color: #d4af37; font-weight: 600; border-radius: 4px; padding: 8px 22px; transition: all 0.3s; text-decoration: none; display: inline-block; }
        .btn-outline-gold:hover { background: #d4af37; color: #000; }
    </style>
</head>
<body>

<div class="page-wrapper" id="page">

    <!-- Top Bar -->
    <div class="pbmit-top-bar d-none d-lg-block">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-4">
                    <span><i class="fas fa-map-marker-alt text-warning me-2"></i><?= htmlspecialchars($business_address) ?></span>
                    <span><i class="fas fa-envelope text-warning me-2"></i><?= htmlspecialchars($business_email) ?></span>
                    <span><i class="far fa-clock text-warning me-2"></i>Mon - Sun: 09:00 AM - 08:00 PM</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <?php if ($facebook_url): ?><a href="<?= htmlspecialchars($facebook_url) ?>" target="_blank"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                    <?php if ($instagram_url): ?><a href="<?= htmlspecialchars($instagram_url) ?>" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
                    <?php if ($twitter_url): ?><a href="<?= htmlspecialchars($twitter_url) ?>" target="_blank"><i class="fab fa-twitter"></i></a><?php endif; ?>
                    <a href="<?= admin_url('login') ?>" class="text-white-50 ms-2"><i class="fas fa-user-lock me-1"></i>Staff Portal</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main Navigation -->
    <header class="site-header">
        <div class="container">
            <nav class="navbar navbar-expand-xl navbar-dark py-3">
                <a class="navbar-brand d-inline-block" href="<?= website_url() ?>">
                    <img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;">
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainMenu">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?= $this->uri->segment(1) == '' ? 'active' : '' ?>" href="<?= website_url() ?>" data-bs-toggle="dropdown">
                                Home
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item <?= ($active_home_layout == 1 && $this->uri->segment(1) == '') ? 'active' : '' ?>" href="<?= website_url('?preview_layout=1') ?>">Homepage 01 (Hero & Booking)</a></li>
                                <li><a class="dropdown-item <?= ($active_home_layout == 2) ? 'active' : '' ?>" href="<?= website_url('?preview_layout=2') ?>">Homepage 02 (Split Grid)</a></li>
                                <li><a class="dropdown-item <?= ($active_home_layout == 3) ? 'active' : '' ?>" href="<?= website_url('?preview_layout=3') ?>">Homepage 03 (Luxury Rituals)</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'about' ? 'active' : '' ?>" href="<?= website_url('about') ?>">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'services' ? 'active' : '' ?>" href="<?= website_url('services') ?>">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'packages' ? 'active' : '' ?>" href="<?= website_url('packages') ?>">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->uri->segment(1) == 'team' ? 'active' : '' ?>" href="<?= website_url('team') ?>">Specialists</a>
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
                        <a href="tel:<?= htmlspecialchars($business_phone) ?>" class="text-white d-none d-xxl-block text-decoration-none">
                            <i class="fas fa-phone-alt text-warning me-1"></i><?= htmlspecialchars($business_phone) ?>
                        </a>
                        <a href="<?= website_url('booking') ?>" class="btn btn-gold">
                            <i class="fas fa-calendar-check me-1"></i>Book Online
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
