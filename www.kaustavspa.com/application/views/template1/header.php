<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$asset_url = base_url('assets/template1/');

$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$site_fav_url = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');

// Detect current layout (1, 2, or 3)
$curr_layout = !empty($this->input->get('preview_layout')) ? (int)$this->input->get('preview_layout') : (!empty($active_home_layout) ? (int)$active_home_layout : 1);
if (!in_array($curr_layout, array(1, 2, 3))) {
    $curr_layout = 1;
}

// Preserve preview params for multi-tenant and layout consistency
$home_url = website_url('?preview_tpl=template1&preview_layout=' . $curr_layout);
$about_url = website_url('?preview_tpl=template1&preview_layout=' . $curr_layout . '#about');
$services_url = website_url('services?preview_tpl=template1&preview_layout=' . $curr_layout);
$faq_url = website_url('?preview_tpl=template1&preview_layout=' . $curr_layout . '#faq');
$blog_url = website_url('?preview_tpl=template1&preview_layout=' . $curr_layout . '#blog');
$contact_url = website_url('?preview_tpl=template1&preview_layout=' . $curr_layout . '#booking');
$booking_url = website_url('?preview_tpl=template1&preview_layout=' . $curr_layout . '#booking');

$page_title_str = isset($page_title) && !empty($page_title) ? $page_title : 'Our Services';
$biz_name = isset($business_name) && !empty($business_name) ? $business_name : 'Glamr';
$biz_phone = isset($business_phone) && !empty($business_phone) ? $business_phone : '+1 (555) 345-6789';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= htmlspecialchars($page_title_str) ?> – <?= htmlspecialchars($biz_name) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
    <link rel="icon" type="image/webp" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?= $asset_url ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= $asset_url ?>fonts/pbmit-glamr-icon/pbmit_glamr.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/pbminfotech-base-icons.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/swiper.min.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/aos.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/shortcode.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/base.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/style.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/responsive.css">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="<?= $asset_url ?>css/flatpickr.min.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/flatpickr.dark.min.css">
    <style>
    .flatpickr-calendar.dark {
        background: #1c1c1c !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.8) !important;
        border-radius: 8px !important;
        z-index: 99999 !important;
    }
    .flatpickr-calendar.dark .flatpickr-months {
        background: #151515 !important;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        padding: 6px 0;
    }
    .flatpickr-calendar.dark .flatpickr-current-month input.cur-year {
        color: #d4af37 !important;
        font-weight: 700 !important;
    }
    .flatpickr-calendar.dark .flatpickr-weekday {
        color: #d4af37 !important;
        font-weight: 600 !important;
    }
    .flatpickr-calendar.dark .flatpickr-day.today {
        border-color: #d4af37 !important;
    }
    .flatpickr-calendar.dark .flatpickr-day.selected,
    .flatpickr-calendar.dark .flatpickr-day.selected:hover {
        background: #d4af37 !important;
        border-color: #d4af37 !important;
        color: #111 !important;
        font-weight: bold !important;
    }
    .flatpickr-calendar.dark .flatpickr-day:hover:not(.selected):not(.flatpickr-disabled) {
        background: rgba(212, 175, 55, 0.2) !important;
        color: #fff !important;
    }
    .flatpickr-calendar.dark .flatpickr-prev-month svg,
    .flatpickr-calendar.dark .flatpickr-next-month svg {
        fill: #d4af37 !important;
    }
    </style>

    <?php if ($curr_layout == 2): ?>
    <style>
    .pbmit-header-style-2 .pbmit-header-menu-area .pbmit-logo-area {
        margin-left: 0 !important;
        margin-right: 40px !important;
    }
    </style>
    <?php elseif ($curr_layout == 3): ?>
    <style>
    .pbmit-header-style-3 {
        background-color: var(--pbmit-blackish-color, #121212);
        position: relative;
        z-index: 99;
    }
    </style>
    <?php endif; ?>
</head>
<body>

<div class="page-wrapper <?= $curr_layout == 3 ? 'demo-three' : '' ?>" id="page">

<?php if ($curr_layout == 1): ?>
    <!-- Header Style 1 -->
    <header class="site-header pbmit-header-style-1" id="masthead">
        <div class="pbmit-sticky-header pbmit-header-sticky-yes pbmit-sticky-bg-color-blackish"></div>
        <div class="pbmit-header-overlay">
            <div class="pbmit-main-header-area">
                <div class="container">
                    <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                        <div class="pbmit-header-menu-area d-flex align-items-center">
                            <div class="pbmit-logo-area">
                                <div class="site-branding">
                                    <h1 class="site-title">
                                        <a href="<?= $home_url ?>">
                                            <img class="pbmit-main-logo img-fluid" src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;">
                                        </a>
                                    </h1>
                                </div>
                            </div>
                            <div class="pbmit-menuarea">
                                <div class="site-navigation">
                                    <nav class="main-navigation pbmit-navbar main-menu navbar-expand-xl navbar-light" id="site-navigation">
                                        <div class="pbmit-menu-wrap">
                                            <ul class="navigation clearfix" id="pbmit-top-menu">
                                                <li class="<?= empty($active_view) || in_array($active_view, array('home1', 'home2', 'home3', 'home', 'index')) ? 'active' : '' ?>">
                                                    <a href="<?= $home_url ?>">Home</a>
                                                </li>
                                                <li><a href="<?= $about_url ?>">About</a></li>
                                                <li class="<?= (isset($active_view) && $active_view == 'services') ? 'active' : '' ?>">
                                                    <a href="<?= $services_url ?>">Services</a>
                                                </li>
                                                <li><a href="<?= $faq_url ?>">FAQ</a></li>
                                                <li><a href="<?= $blog_url ?>">Blog</a></li>
                                                <li><a href="<?= $contact_url ?>">Contact</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="pbmit-right-box d-flex align-items-center">
                            <?php if (!empty($biz_phone)): ?>
                            <div class="pbmit-button-box">
                                <div class="pbmit-header-button">
                                    <a href="tel:<?= htmlspecialchars($biz_phone) ?>">															
                                        <span class="pbmit-header-button-text"><?= htmlspecialchars($biz_phone) ?></span>			
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="pbmit-button-box-second">
                                <a href="<?= $booking_url ?>" class="pbmit-btn">
                                    <span class="pbmit-button-text">Book Now</span>
                                </a>
                            </div>
                            <div class="pbmit-burger-menu-wrapper">
                                <div class="pbmit-mobile-menu-bg"></div>
                                <button id="menu-toggle" title="Menu Toggle" class="nav-menu-toggle">
                                    <i class="pbmit-base-icon-menu-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php elseif ($curr_layout == 2): ?>
    <!-- Header Style 2 (Logo left, Menu middle) -->
    <header class="site-header pbmit-header-style-2" id="masthead">
        <div class="pbmit-sticky-header pbmit-header-sticky-yes pbmit-sticky-bg-color-blackish"></div>
        <div class="pbmit-header-overlay">
            <div class="pbmit-main-header-area">
                <div class="container">
                    <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                        <div class="pbmit-header-menu-area d-flex align-items-center">
                            <div class="pbmit-logo-area">
                                <div class="site-branding">
                                    <h1 class="site-title">
                                        <a href="<?= $home_url ?>">
                                            <img class="pbmit-main-logo img-fluid" src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;">
                                        </a>
                                    </h1>
                                </div>
                            </div>
                            <div class="pbmit-menuarea">
                                <div class="site-navigation">
                                    <nav class="main-navigation pbmit-navbar main-menu navbar-expand-xl navbar-light" id="site-navigation">
                                        <div class="pbmit-menu-wrap">
                                            <ul class="navigation clearfix" id="pbmit-top-menu">
                                                <li class="<?= empty($active_view) || in_array($active_view, array('home1', 'home2', 'home3', 'home', 'index')) ? 'active' : '' ?>">
                                                    <a href="<?= $home_url ?>">Home</a>
                                                </li>
                                                <li><a href="<?= $about_url ?>">About</a></li>
                                                <li class="<?= (isset($active_view) && $active_view == 'services') ? 'active' : '' ?>">
                                                    <a href="<?= $services_url ?>">Services</a>
                                                </li>
                                                <li><a href="<?= $faq_url ?>">FAQ</a></li>
                                                <li><a href="<?= $blog_url ?>">Blog</a></li>
                                                <li><a href="<?= $contact_url ?>">Contact</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="pbmit-right-box d-flex align-items-center">
                            <?php if (!empty($biz_phone)): ?>
                            <div class="pbmit-button-box">
                                <div class="pbmit-header-button">
                                    <a href="tel:<?= htmlspecialchars($biz_phone) ?>">															
                                        <span class="pbmit-header-button-text"><?= htmlspecialchars($biz_phone) ?></span>			
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="pbmit-button-box-second">
                                <a href="<?= $booking_url ?>" class="pbmit-btn">
                                    <span class="pbmit-button-text">Book Now</span>
                                </a>
                            </div>
                            <div class="pbmit-burger-menu-wrapper">
                                <div class="pbmit-mobile-menu-bg"></div>
                                <button id="menu-toggle" title="Menu Toggle" class="nav-menu-toggle">
                                    <i class="pbmit-base-icon-menu-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php else: ?>
    <!-- Header Style 3 -->
    <header class="site-header pbmit-header-style-3" id="masthead">
        <div class="pbmit-sticky-header pbmit-header-sticky-yes pbmit-sticky-bg-color-blackish"></div>
        <div class="pbmit-main-header-area">
            <div class="container-fluid">
                <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                    <div class="pbmit-logo-area">
                        <div class="site-branding">
                            <h1 class="site-title">
                                <a href="<?= $home_url ?>">
                                    <img class="pbmit-main-logo img-fluid" src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;">
                                </a>
                            </h1>
                        </div>
                    </div>
                    <div class="pbmit-menuarea">
                        <div class="site-navigation">
                            <nav class="main-navigation pbmit-navbar main-menu navbar-expand-xl navbar-light" id="site-navigation">
                                <div class="pbmit-menu-wrap">
                                    <ul class="navigation clearfix" id="pbmit-top-menu">
                                        <li class="<?= empty($active_view) || in_array($active_view, array('home1', 'home2', 'home3', 'home', 'index')) ? 'active' : '' ?>">
                                            <a href="<?= $home_url ?>">Home</a>
                                        </li>
                                        <li><a href="<?= $about_url ?>">About</a></li>
                                        <li class="<?= (isset($active_view) && $active_view == 'services') ? 'active' : '' ?>">
                                            <a href="<?= $services_url ?>">Services</a>
                                        </li>
                                        <li><a href="<?= $faq_url ?>">FAQ</a></li>
                                        <li><a href="<?= $blog_url ?>">Blog</a></li>
                                        <li><a href="<?= $contact_url ?>">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="pbmit-right-box d-flex align-items-center">
                        <?php if (!empty($biz_phone)): ?>
                        <div class="pbmit-button-box">
                            <div class="pbmit-header-button">
                                <a href="tel:<?= htmlspecialchars($biz_phone) ?>">															
                                    <span class="pbmit-header-button-text"><?= htmlspecialchars($biz_phone) ?></span>			
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="pbmit-button-box-second">
                            <a href="<?= $booking_url ?>" class="pbmit-btn">
                                <span class="pbmit-button-text">Book Now</span>
                            </a>
                        </div>
                        <div class="pbmit-burger-menu-wrapper">
                            <div class="pbmit-mobile-menu-bg"></div>
                            <button id="menu-toggle" title="Menu Toggle" class="nav-menu-toggle">
                                <i class="pbmit-base-icon-menu-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>
