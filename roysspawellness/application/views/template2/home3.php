<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($asset_url)) {
    $asset_url = base_url('assets/template2/');
}

$layout_num = 3;

$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$site_logo = $site_logo_url;

$site_fav_url = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');
$site_fav = $site_fav_url;

// Hero Settings (Dynamic Multi-Banner Support)
$hero_banners = !empty($tpl_hero_banners) ? $tpl_hero_banners : array();
if (empty($hero_banners) && $this->db->table_exists('template_hero_banners')) {
    $hero_banners = $this->db->where('template_key', 'template2')
                             ->where('layout_number', 3)
                             ->where('status', 'active')
                             ->order_by('sort_order', 'ASC')
                             ->get('template_hero_banners')
                             ->result();
}
$first_slide = !empty($hero_banners) ? $hero_banners[0] : null;
$hero_badge = $first_slide ? $first_slide->badge : get_tpl_setting('template2', 3, 'hero', 'hero_badge', 'Clinical Skin & Body Therapies');
$hero_title = $first_slide ? $first_slide->title : get_tpl_setting('template2', 3, 'hero', 'hero_title', 'Advanced Rejuvenation & Serenity Spa');
$hero_desc = $first_slide ? $first_slide->description : get_tpl_setting('template2', 3, 'hero', 'hero_desc', 'Experience cutting-edge clinical facial rituals and restorative full-body holistic wellness.');
$hero_btn_text = $first_slide ? $first_slide->button_text : get_tpl_setting('template2', 3, 'hero', 'hero_btn_text', 'Reserve Session');
$hero_btn_url = $first_slide ? $first_slide->button_url : get_tpl_setting('template2', 3, 'hero', 'hero_btn_url', 'booking');
$hero_img = $first_slide && !empty($first_slide->image) ? fallback_image_url($first_slide->image, 'assets/template2/images/resources/banner-two-img.png') : fallback_image_url(get_tpl_setting('template2', 3, 'hero', 'hero_image', 'assets/template2/images/resources/banner-two-img.png'), 'assets/template2/images/resources/banner-two-img.png');

// About Settings
$about_tagline = get_tpl_setting('template2', 3, 'about', 'about_tagline', 'About Pureglow');
$about_title = get_tpl_setting('template2', 3, 'about', 'about_title', 'Pioneering Skin Care Excellence Since 2008');
$about_desc = get_tpl_setting('template2', 3, 'about', 'about_desc', 'Our licensed clinicians merge time-honored eastern botanical rituals with state-of-the-art dermatological protocols to deliver unparalleled skin transformations.');
$about_experience = get_tpl_setting('template2', 3, 'about', 'about_experience', '20');

// Services Header
$services_tagline = get_tpl_setting('template2', 3, 'services_header', 'tagline', 'We Offer');
$services_title = get_tpl_setting('template2', 3, 'services_header', 'title', 'Clinical Treatments & Restorative Care');
$services_desc = get_tpl_setting('template2', 3, 'services_header', 'desc', 'Our skin care services are designed to nourish, protect, and enhance your natural beauty.');

// Features / Skincare Settings
$features_tagline = get_tpl_setting('template2', 3, 'featured_skincare', 'tagline', 'Special Highlights');
$features_title = get_tpl_setting('template2', 3, 'featured_skincare', 'title', 'Exclusive Clinical Highlights');

// Testimonials Header
$testi_tagline = get_tpl_setting('template2', 3, 'testimonials_header', 'tagline', 'Client Experiences');
$testi_title = get_tpl_setting('template2', 3, 'testimonials_header', 'title', 'Real Results from Real Clients');

// FAQ Settings
$faq_tagline = get_tpl_setting('template2', 3, 'faq_header', 'tagline', 'Frequently Asked Questions');
$faq_title = get_tpl_setting('template2', 3, 'faq_header', 'title', 'Clear Answers About Clinical Care');

// Blog Header
$blog_tagline = get_tpl_setting('template2', 3, 'blog_header', 'tagline', 'Latest News');
$blog_title = get_tpl_setting('template2', 3, 'blog_header', 'title', 'Clinical Beauty & Wellness Journal');
$blog_desc = get_tpl_setting('template2', 3, 'blog_header', 'desc', 'Our skin treatment blog shares expert tips, proven techniques, and the latest insights in skincare.');
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Home Three || Pureglow || Pureglow HTML 5 Template </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />
    <link rel="shortcut icon" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>" />
    <link rel="manifest" href="<?= $asset_url ?>images/favicons/site.webmanifest" />
    <meta name="description" content="Pureglow HTML 5 Template " />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap"
        rel="stylesheet">
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
    <link rel="stylesheet" href="<?= $asset_url ?>css/style.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/responsive.css?v=<?= time() ?>" />
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



    <div class="chat-icon"><button type="button" class="chat-toggler"><i class="fa fa-comment"></i></button></div>
    <!--Chat Popup-->
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
                                <a href="<?= website_url('?preview_tpl=template2&preview_layout=3') ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;" /></a>
                            </div>
                            <div class="content-box">
                                <h4>About Us</h4>
                                <div class="inner-text">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                                        roots in a piece of classical Latin literature from 45 BC, making it over
                                        2000 years old.
                                    </p>
                                </div>
                            </div>

                            <div class="form-inner">
                                <h4>Get a free quote</h4>
                                <form action="#" method="POST" class="contact-form-validated">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Message..." required=""></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button class="thm-btn" data-text="Submit Now +" type="submit"
                                            data-loading-text="Please wait...">Submit Now
                                            <span class="fas fa-arrow-right"></span>
                                        </button>
                                    </div>
                                    <div class="result"></div>
                                </form>
                            </div>

                            <div class="sidebar-contact-info">
                                <h4>Contact Info</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <span class="icon-maps-and-flags"></span> 88 broklyn street, New York
                                    </li>
                                    <li>
                                        <span class="icon-call"></span>
                                        <a href="tel:123456789">+1 555-9990-153</a>
                                    </li>
                                    <li>
                                        <span class="icon-email"></span>
                                        <a href="mailto:info@example.com">info@example.com</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="thm-social-link1">
                                <ul class="social-box list-unstyled">
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                    </li>
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
        <header class="main-header-two">
            <div class="main-menu-two__top">
                <div class="main-menu-two__top-inner">
                    <ul class="list-unstyled main-menu-two__contact-list">
                        <li>
                            <div class="icon">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="text">
                                <p><a href="tel:25632542478">(+256) 3254 2478</a>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="text">
                                <p><a href="mailto:info@Pureglow24.com">info@Pureglow25.com</a>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="far fa-map-marker-alt"></i>
                            </div>
                            <div class="text">
                                <p>4124 Cimmaron Road, CA 92806</p>
                            </div>
                        </li>
                    </ul>

                    <div class="main-menu-two__top-right-content">
                        <div class="main-menu-two__top-right">
                            <div class="main-menu-two__time">
                                <div class="main-menu-two__time-icon">
                                    <span class="icon-clock"></span>
                                </div>
                                <p class="main-menu-two__time-text">Mon - Fri: 09:00 - 05:00</p>
                            </div>
                            <div class="main-menu-two__social-box">
                                <p class="main-menu-two__social-title">Follow Us On:</p>
                                <div class="main-menu-two__social">
                                    <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="https://www.instagram.com/?hl=en"><i class="fab fa-instagram"></i></a>
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
                                <a href="<?= website_url('?preview_tpl=template2&preview_layout=3') ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;"></a>
                            </div>
                        </div>
                        <div class="main-menu-two__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="current">
                                    <a href="<?= website_url('?preview_tpl=template2&preview_layout=3') ?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?= website_url('about') ?>">About</a>
                                </li>
                                <li>
                                    <a href="<?= website_url('services') ?>">Services</a>
                                </li>
                                <li>
                                    <a href="<?= website_url('faq') ?>">FAQ</a>
                                </li>
                                <li>
                                    <a href="<?= website_url('contact') ?>">Contact</a>
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
                                    <h5 class="main-menu__call-number"><a href="tel:9288006780">+92 ( 8800 ) - 6780</a></h5>
                                </div>
                            </div>
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
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Banner Two Start (Layout 3 - Cinematic Animated Multi-Slide Carousel)-->
        <section class="banner-two banner-layout3-animated" style="padding: 0px;">
            <div class="banner-two__shape1" style="pointer-events: none;"><img src="<?= $asset_url ?>images/shapes/banner-v2-shape1.png" alt=""></div>
            <div class="banner-two__shape2 float-bob-y" style="pointer-events: none;"><img src="<?= $asset_url ?>images/shapes/banner-v2-shape-2.png" alt=""></div>
            <div class="swiper-container banner-two__carousel">
                <div class="swiper-wrapper">
                    <?php if (!empty($hero_banners)): ?>
                        <?php foreach ($hero_banners as $bidx => $slide): 
                            $slide_badge = !empty($slide->badge) ? $slide->badge : $hero_badge;
                            $slide_title = !empty($slide->title) ? $slide->title : $hero_title;
                            $slide_desc = !empty($slide->description) ? $slide->description : $hero_desc;
                            $slide_btn_text = !empty($slide->button_text) ? $slide->button_text : $hero_btn_text;
                            $slide_btn_url = !empty($slide->button_url) ? $slide->button_url : $hero_btn_url;
                            $slide_bg = !empty($slide->background_image) ? fallback_image_url($slide->background_image, 'assets/template2/images/backgrounds/banner-v2-bg.jpg') : (!empty($slide->image) ? fallback_image_url($slide->image, 'assets/template2/images/backgrounds/banner-v2-bg.jpg') : ($asset_url . 'images/backgrounds/banner-v2-bg.jpg'));
                            $slide_img = !empty($slide->image) ? fallback_image_url($slide->image, 'assets/template2/images/resources/about-v3-img1.jpg') : ($asset_url . 'images/resources/about-v3-img1.jpg');
                        ?>
                            <div class="swiper-slide">
                                <div class="banner-two__bg" style="background-image: url(<?= htmlspecialchars($slide_bg) ?>);"></div>
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-xl-8 col-lg-9">
                                            <div class="banner-two__content-box">
                                                <div class="banner-three__badge-box">
                                                    <span class="banner-three__badge-dot"></span>
                                                    <span class="banner-three__badge-text"><?= htmlspecialchars($slide_badge) ?></span>
                                                </div>
                                                <h2 class="banner-three__title" style="max-width: 800px;"><?= nl2br(strip_tags($slide_title, '<br><br/><span><strong><em><b><i>')) ?></h2>
                                                <p class="banner-three__text" style="max-width: 800px;"><?= nl2br(htmlspecialchars($slide_desc)) ?></p>
                                                <div class="banner-three__btn-box">
                                                    <a class="thm-btn" href="<?= website_url($slide_btn_url) ?>"><?= htmlspecialchars($slide_btn_text) ?>
                                                        <span class="fas fa-arrow-right"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Circular Glass Navigation Arrows -->
                <div class="banner-three__nav-prev" id="banner-three-prev"><i class="fal fa-arrow-left"></i></div>
                <div class="banner-three__nav-next" id="banner-three-next"><i class="fal fa-arrow-right"></i></div>

                <!-- Pagination Bullets -->
                <div class="swiper-pagination" id="banner-two-pagination"></div>
            </div>
        </section>
        <!--Banner Two End-->

        
        <!-- About Three Start -->
        <section class="about-three">
            <div class="container">
                <div class="row">
                    <!-- About Three Img Start -->
                    <div class="col-xl-6  wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="about-three__img">
                            <div class="about-three__img-title">
                                <h2>About <br> Company</h2>
                            </div>
                            <div class="about-three__img-img1">
                                <img src="<?= $asset_url ?>images/resources/about-v3-img1.jpg" alt="Image">
                            </div>
                            <div class="about-three__img-img2">
                                <img src="<?= $asset_url ?>images/resources/about-v3-img2.jpg" alt="Image">
                            </div>
                            <div class="about-three__img-exprience">
                                <div class="about-three__img-exprience-count">
                                    <h3 class="odometer" data-count="<?= (int)$about_experience ?>"><?= (int)$about_experience ?></h3>
                                    <span class="plus">+</span>
                                </div>
                                <div class="about-three__img-exprience-text">
                                    <h3>Years of exprience</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- About Three Img End -->

                    <!-- About Three Content Start -->
                    <div class="col-xl-6  wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="about-three__content">

                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <p class="section-title__tagline"><?= htmlspecialchars($about_tagline) ?></p>
                                    <div class="section-title__tagline-shape"></div>
                                </div>
                                <h2 class="section-title__title title-animation"><?= nl2br(htmlspecialchars($about_title)) ?></h2>
                            </div>

                            <div class="about-three__content-text">
                                <p><?= nl2br(htmlspecialchars($about_desc)) ?></p>
                            </div>

                            <div class="about-three__content-top-list">
                                <ul class="row">
                                    <li class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="about-three__content-top-item">
                                            <div class="about-three__content-top-item-icon">
                                                <i class="icon-beauty-treatment"></i>
                                            </div>
                                            <div class="about-three__content-top-item-text">
                                                <h3>Best Products</h3>
                                                <p>Premium products for glowing skin</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="about-three__content-top-item">
                                            <div class="about-three__content-top-item-icon">
                                                <i class="fa fa-gift"></i>
                                            </div>
                                            <div class="about-three__content-top-item-text">
                                                <h3>Gift Packages</h3>
                                                <p>Gift Packages Perfect gifts for any special moment</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="about-three__content-bdr"></div>
                            <div class="about-three__content-bottom-list">
                                <ul class="row">
                                    <li class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="about-three__content-bottom-item">
                                            <i class="fas fa-check"></i>
                                            <p>Natural Skin Therapy</p>
                                        </div>
                                        <div class="about-three__content-bottom-item two">
                                            <i class="fas fa-check"></i>
                                            <p>Expert Skin Therapy</p>
                                        </div>
                                    </li>
                                    <li class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="about-three__content-bottom-item">
                                            <i class="fas fa-check"></i>
                                            <p>Botanical Beauty Treatment</p>
                                        </div>
                                        <div class="about-three__content-bottom-item two">
                                            <i class="fas fa-check"></i>
                                            <p>Skin Renewal Treatment</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="about-three__content-bottom">
                                <div class="about-three__content-bottom-btn">
                                    <a class="thm-btn" href="<?= website_url('about') ?>">Explore Now
                                        <span class="fas fa-arrow-right"></span>
                                    </a>
                                </div>
                                <div class="about-three__content-bottom-phn">
                                    <div class="about-three__content-bottom-phn-img">
                                        <div class="about-three__content-bottom-phn-img-inner">
                                            <img src="<?= $asset_url ?>images/resources/about-v3-img3.jpg" alt="Image">
                                        </div>
                                        <div class="about-three__content-bottom-phn-img-icon">
                                            <i class="icon-phone-call"></i>
                                        </div>
                                    </div>
                                    <div class="about-three__content-bottom-phn-text">
                                        <p>Call Any Time</p>
                                        <h3><a href="tel:9123466875">(+91) 234 668 75</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- About Three Content End -->
                </div>
            </div>
        </section>
        <!-- About Three End -->

        <!--Services One Start -->
        <section class="services-one">
            <div class="services-one__shape-1 float-bob-y">
                <img src="<?= $asset_url ?>images/shapes/services-one-shape-1.png" alt="services-one-shape">
            </div>
            <div class="services-one__shape-2 float-bob-y">
                <img src="<?= $asset_url ?>images/shapes/services-one-shape-2.png" alt="services-one-shape">
            </div>
            <div class="container">
                <div class="services-one__top">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <p class="section-title__tagline"><?= htmlspecialchars($services_tagline) ?></p>
                                    <div class="section-title__tagline-shape"></div>
                                </div>
                                <h2 class="section-title__title title-animation"><?= nl2br(htmlspecialchars($services_title)) ?></h2>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="services-one__top-right">
                                <p class="services-one__top-text"><?= htmlspecialchars($services_desc) ?></p>
                                <div class="services-one__btn-box">
                                    <a class="thm-btn" href="<?= website_url('services') ?>">Explore Now
                                        <span class="fas fa-arrow-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="services-one__bottom">
                    <div class="row">
                        <?php if (!empty($tpl_services)): ?>
                            <?php foreach ($tpl_services as $s_idx => $svc): 
                                $svc_url = website_url('service/' . $svc->slug . '?preview_tpl=template2&preview_layout=' . $layout_num);
                                $anim = ($s_idx % 3 === 0) ? 'fadeInLeft' : (($s_idx % 3 === 1) ? 'fadeInUp' : 'fadeInRight');
                            ?>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow <?= $anim ?>" data-wow-delay="100ms">
                                    <div class="services-one__single">
                                        <div class="services-one__img">
                                            <img src="<?= fallback_image_url($svc->thumbnail, 'assets/template2/images/services/services-1-' . (($s_idx % 3) + 1) . '.jpg') ?>" alt="<?= htmlspecialchars($svc->title) ?>">
                                        </div>
                                        <div class="services-one__content">
                                            <div class="services-one__icon">
                                                <span class="<?= !empty($svc->icon_class) ? htmlspecialchars($svc->icon_class) : 'icon-botox' ?>"></span>
                                            </div>
                                            <h3 class="services-one__title"><a href="<?= $svc_url ?>"><?= htmlspecialchars($svc->title) ?></a></h3>
                                            <p class="services-one__text"><?= htmlspecialchars($svc->short_desc) ?></p>
                                            <a href="<?= $svc_url ?>" class="services-one__btn">Read More <span class="icon-right-arrow"></span> </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--Services One End -->

        <!--Feature One Start -->
        <section class="feature-one" style="padding-bottom: 90px;">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box">
                        <p class="section-title__tagline"><?= htmlspecialchars($features_tagline) ?></p>
                        <div class="section-title__tagline-shape"></div>
                    </div>
                    <h2 class="section-title__title title-animation"><?= htmlspecialchars($features_title) ?></h2>
                </div>
                <div class="feature-one__inner">
                    <div class="row">
                        <?php if (!empty($tpl_featured_items)): ?>
                            <?php foreach ($tpl_featured_items as $f_idx => $item): 
                                $feat_img = fallback_image_url($item->thumbnail, 'assets/template2/images/resources/feature-1-' . (($f_idx % 4) + 1) . '.jpg');
                                $feat_btn_url = !empty($item->button_link) ? (strpos($item->button_link, 'http') === 0 ? $item->button_link : (strpos($item->button_link, '/') === 0 ? base_url(ltrim($item->button_link, '/')) : website_url($item->button_link))) : website_url('booking');
                                $feat_btn_text = !empty($item->button_text) ? htmlspecialchars($item->button_text) : 'Book Now';
                            ?>
                                <div class="col-xl-3 col-lg-6 col-md-6 wow <?= $f_idx % 2 === 0 ? 'fadeInLeft' : 'fadeInRight' ?>" data-wow-delay="<?= ($f_idx * 100) ?>ms" data-wow-duration="1500ms">
                                    <div class="feature-one__single">
                                        <div class="feature-one__img">
                                            <img src="<?= $feat_img ?>" alt="<?= htmlspecialchars($item->title) ?>">
                                            <div class="feature-one__content">
                                                <h4 class="feature-one__title"><a href="<?= $feat_btn_url ?>"><?= htmlspecialchars($item->title) ?></a></h4>
                                                <p class="feature-one__text"><?= htmlspecialchars($item->short_desc) ?></p>
                                                <div class="feature-one__btn-box">
                                                    <a class="thm-btn" href="<?= $feat_btn_url ?>"><?= $feat_btn_text ?>
                                                        <span class="fas fa-arrow-right"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--Feature One End -->

        <!--Testimonial Two Start-->
        <section class="testimonial-two">
            <div class="shape1 float-bob-x"><img src="<?= $asset_url ?>images/shapes/testimonial-v2-shape1.png" alt=""></div>
            <div class="shape2 float-bob-x"><img src="<?= $asset_url ?>images/shapes/testimonial-v2-shape2.png" alt=""></div>
            <div class="container">
                <div class="row">
                    <!--Testimonial Two Content Start-->
                    <div class="col-xl-8">
                        <div class="testimonial-two__content">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <p class="section-title__tagline"><?= htmlspecialchars($testi_tagline) ?></p>
                                    <div class="section-title__tagline-shape"></div>
                                </div>
                                <h2 class="section-title__title title-animation"><?= nl2br(htmlspecialchars($testi_title)) ?>
                                </h2>
                            </div>

                            <div class="swiper-container testimonial-two__carousel">
                                <div class="swiper-wrapper">
                                    <?php if (!empty($tpl_testimonials)): ?>
                                        <?php foreach ($tpl_testimonials as $tidx => $t): ?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-two__single">
                                                    <div class="testimonial-two__single-icon">
                                                        <span class="icon-quote"></span>
                                                    </div>
                                                    <div class="testimonial-two__client-rating-box">
                                                        <div class="testimonial-two__client-rating">
                                                            <?php $r = (int)$t->rating; for ($s = 1; $s <= 5; $s++): ?>
                                                                <span class="icon-star<?= $s <= $r ? '' : '-empty' ?>"></span>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <div class="testimonial-two__client-rating-text">
                                                            <p>(<?= (float)$t->rating ?>/5)</p>
                                                        </div>
                                                    </div>

                                                    <div class="testimonial-two__single-text">
                                                        <p><?= htmlspecialchars($t->review) ?></p>
                                                    </div>
                                                    <div class="testimonial-two__client-box">
                                                        <div class="testimonial-two__client-img">
                                                            <img src="<?= fallback_image_url($t->avatar, 'assets/template2/images/testimonial/testimonial-v2-img' . (($tidx % 2) + 1) . '.jpg') ?>"
                                                                alt="<?= htmlspecialchars($t->client_name) ?>">
                                                        </div>
                                                        <div class="testimonial-two__client-content">
                                                            <h4 class="testimonial-two__client-name"><?= htmlspecialchars($t->client_name) ?></h4>
                                                            <p class="testimonial-two__client-sub-title"><?= htmlspecialchars($t->designation) ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Two Content End-->

                    <!--Testimonial Two Img Start-->
                    <div class="col-xl-4">
                        <div class="testimonial-two__img-box">
                            <div class="testimonial-two__img">
                                <img src="<?= $asset_url ?>images/testimonial/testimonial-v2-img3.png" alt="">
                            </div>
                            <div class="testimonial-two__top-clients">
                                <ul class="testimonial-two__top-clients-img-list">
                                    <li>
                                        <div class="testimonial-two__top-clients-img">
                                            <img src="<?= $asset_url ?>images/testimonial/testimonial-v1-img1.jpg" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="testimonial-two__top-clients-img">
                                            <img src="<?= $asset_url ?>images/testimonial/testimonial-v1-img2.jpg" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="testimonial-two__top-clients-img">
                                            <img src="<?= $asset_url ?>images/testimonial/testimonial-v1-img3.jpg" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="testimonial-two__top-clients-img">
                                            <img src="<?= $asset_url ?>images/testimonial/testimonial-v1-img4.jpg" alt="">
                                        </div>
                                    </li>
                                </ul>
                                <div class="testimonial-two__top-clients-content">
                                    <div class="testimonial-two__top-counter">
                                        <div class="testimonial-two__top-counter-count">
                                            <h3 class="odometer" data-count="12">00</h3>
                                            <span class="m">M</span>
                                            <span class="plus">+</span>
                                            <span class="text">Clients</span>
                                        </div>
                                        <div class="testimonial-two__top-counter-title">
                                            <h4>Trust Skin Expertise</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial Two Img End-->
                </div>
            </div>
        </section>
        <!--Testimonial Two End-->

        <!--Faq One Start-->
        <section class="faq-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="faq-one__left">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <p class="section-title__tagline"><?= htmlspecialchars($faq_tagline) ?></p>
                                    <div class="section-title__tagline-shape"></div>
                                </div>
                                <h2 class="section-title__title title-animation"><?= htmlspecialchars($faq_title) ?></h2>
                            </div>
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <?php if (!empty($tpl_faqs)): ?>
                                    <?php foreach ($tpl_faqs as $fidx => $faq): ?>
                                        <div class="accrodion <?= $fidx === 0 ? 'active' : '' ?> wow <?= $fidx % 2 === 0 ? 'fadeInLeft' : 'fadeInRight' ?>" data-wow-delay="<?= ($fidx * 100) ?>ms" data-wow-duration="1500ms">
                                            <div class="accrodion-title">
                                                <h4><?= htmlspecialchars($faq->question) ?></h4>
                                            </div>
                                            <div class="accrodion-content">
                                                <div class="inner">
                                                    <p><?= nl2br(htmlspecialchars($faq->answer)) ?></p>
                                                </div><!-- /.inner -->
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="faq-one__right">
                            <div class="faq-one__img-box">
                                <div class="faq-one__img">
                                    <img src="<?= $asset_url ?>images/resources/faq-one-img-1.jpg" alt="faq-one-img">
                                </div>
                                <div class="faq-one__clients">
                                    <ul class="faq-one__clients-img-list">
                                        <li>
                                            <div class="faq-one__clients-img">
                                                <img src="<?= $asset_url ?>images/testimonial/testimonial-v1-img1.jpg" alt="">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="faq-one__clients-img">
                                                <img src="<?= $asset_url ?>images/testimonial/testimonial-v1-img2.jpg" alt="">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="faq-one__clients-img">
                                                <img src="<?= $asset_url ?>images/testimonial/testimonial-v1-img3.jpg" alt="">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="faq-one__clients-img">
                                                <img src="<?= $asset_url ?>images/testimonial/testimonial-v1-img4.jpg" alt="">
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="faq-one__clients-content">
                                        <div class="faq-one__counter">
                                            <div class="faq-one__counter-count">
                                                <h3 class="odometer" data-count="12">00</h3>
                                                <span class="m">M</span>
                                                <span class="plus">+</span>
                                                <span class="text">Clients</span>
                                            </div>
                                            <div class="faq-one__counter-title">
                                                <h4>Trust Skin Expertise</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Faq One End-->

        <!--Appointment One Start-->
        <section class="appointment-one">
            <div class="appointment-one__img wow fadeInRight" data-wow-delay="200ms">
                <img src="<?= $asset_url ?>images/resources/appointment-one-img-1.png" alt="appointment-one-img">
            </div>
            <div class="appointment-one__shape-1 float-bob-y">
                <img src="<?= $asset_url ?>images/shapes/appointment-shape-1.png" alt="appointment-shape">
            </div>
            <div class="container">
                <div class="appointment-one__inner">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="appointment-one__form-box">
                                <div class="section-title text-left sec-title-animation animation-style2">
                                    <div class="section-title__tagline-box">
                                        <p class="section-title__tagline">Book Appointment</p>
                                        <div class="section-title__tagline-shape"></div>
                                    </div>
                                    <h2 class="section-title__title title-animation">Make an Appointment Today !</h2>
                                </div>
                                <form class="contact-form-validated appointment-one__form"
                                    action="<?= website_url('booking/quick_submit') ?>" method="post" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="appointment-one__input-box">
                                                <input type="text" name="name" placeholder="Full Name" required="" aria-required="true">
                                                <div class="appointment-one__input-box-icon">
                                                    <span class="icon-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="appointment-one__input-box">
                                                <input type="email" name="email" placeholder="Your Email" required="" aria-required="true">
                                                <div class="appointment-one__input-box-icon">
                                                    <span class="icon-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="appointment-one__input-box">
                                                <input type="text" name="phone" placeholder="Phone">
                                                <div class="appointment-one__input-box-icon">
                                                    <span class="icon-telephone"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="appointment-one__input-box">
                                                <input type="text" placeholder="Date " name="date" id="datepicker" class="hasDatepicker">
                                                <div class="appointment-one__input-box-icon">
                                                    <span class="icon-calendar"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="appointment-one__input-box">
                                                <div class="select-box">
                                                    <select class="selectmenu wide" name="service">
                                                        <option value="" selected="selected">Select Service</option>
                                                        <?php 
                                                        $form_services = !empty($tpl_services) ? $tpl_services : (!empty($services) ? $services : array());
                                                        if (!empty($form_services)):
                                                            foreach ($form_services as $s_item): 
                                                                $s_title = isset($s_item->title) ? $s_item->title : (isset($s_item->name) ? $s_item->name : '');
                                                                if (!empty($s_title)):
                                                        ?>
                                                            <option value="<?= htmlspecialchars($s_title) ?>"><?= htmlspecialchars($s_title) ?></option>
                                                        <?php 
                                                                endif;
                                                            endforeach;
                                                        else: ?>
                                                            <option value="Facial Treatment">Facial Treatment</option>
                                                            <option value="Skin Brightening">Skin Brightening</option>
                                                            <option value="Acne Treatment">Acne Treatment</option>
                                                            <option value="Natural Skin Therapy">Natural Skin Therapy</option>
                                                            <option value="Deep Hydration Therapy">Deep Hydration Therapy</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="appointment-one__input-box text-message-box">
                                                <textarea name="message" placeholder="Messege"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="appointment-one__btn-box">
                                                <button type="submit" class="thm-btn">
                                                    Submit Now
                                                    <span class="fas fa-arrow-right"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Appointment One End-->

        
        <!-- Sliding Text One Start -->
        <section class="sliding-text-one sliding-text-one--three">
            <div class="sliding-text-one__wrap">
                <ul class="sliding-text-one__list list-unstyled marquee_mode">
                    <li>
                        <h2 data-hover="Skincare" class="sliding-text-one__title">Skincare</h2>
                    </li>
                    <li><span></span></li>
                    <li>
                        <h2 data-hover="Haircare" class="sliding-text-one__title">Haircare</h2>
                    </li>
                    <li><span></span></li>
                    <li>
                        <h2 data-hover="Bodycare" class="sliding-text-one__title">Bodycare</h2>
                    </li>
                    <li><span></span></li>
                    <li>
                        <h2 data-hover="Gentle Care" class="sliding-text-one__title">Gentle Care</h2>
                    </li>
                    <li><span></span></li>
                    <li>
                        <h2 data-hover="Glow" class="sliding-text-one__title">Glow</h2>
                    </li>
                    <li><span></span></li>
                </ul>
            </div>
        </section>
        <!-- Sliding Text One End -->

        
        <!--Blog Two Start-->
        <section class="blog-two">
            <div class="container">
                <div class="blog-two__top">
                    <div class="blog-two__top-left">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <p class="section-title__tagline"><?= htmlspecialchars($blog_tagline) ?></p>
                                <div class="section-title__tagline-shape"></div>
                            </div>
                            <h2 class="section-title__title title-animation"><?= nl2br(htmlspecialchars($blog_title)) ?>
                            </h2>
                        </div>
                    </div>
                    <div class="blog-two__top-right">
                        <p><?= nl2br(htmlspecialchars($blog_desc)) ?></p>
                        <div class="blog-two__btn-box">
                            <a class="thm-btn" href="#">View All Posts
                                <span class="fas fa-arrow-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if (!empty($tpl_blogs)): ?>
                        <?php foreach ($tpl_blogs as $bidx => $blog): 
                            $blog_url = website_url('blog/' . $blog->slug . '?preview_tpl=template2&preview_layout=' . $layout_num);
                            $b_time = strtotime($blog->published_date ?: date('Y-m-d'));
                            $day = date('d', $b_time);
                            $my = date('M, Y', $b_time);
                            $delay = ($bidx * 150) . 'ms';
                        ?>
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="<?= $delay ?>">
                                <div class="blog-two__single">
                                    <div class="blog-two__img-box">
                                        <div class="blog-two__date">
                                            <h3><?= $day ?></h3>
                                            <p><?= $my ?></p>
                                        </div>
                                        <div class="blog-two__img">
                                            <img src="<?= fallback_image_url($blog->thumbnail, 'assets/template2/images/blog/blog-v2-img' . (($bidx % 3) + 1) . '.jpg') ?>" alt="<?= htmlspecialchars($blog->title) ?>">
                                        </div>
                                    </div>
                                    <div class="blog-two__content">
                                        <?php if (!empty($blog->tags)): ?>
                                            <p class="blog-two__tag"><a href="<?= $blog_url ?>"><?= htmlspecialchars($blog->tags) ?></a></p>
                                        <?php endif; ?>
                                        <h3 class="blog-two__title"><a href="<?= $blog_url ?>"><?= htmlspecialchars($blog->title) ?></a></h3>
                                        <p class="blog-two__text"><?= htmlspecialchars($blog->short_desc) ?></p>
                                        <a href="<?= $blog_url ?>" class="blog-two__read-more">Read More <span class="icon-right-arrow"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!--Blog Two End-->

        <!--Site Footer Start-->
        <footer class="site-footer site-footer-two">
            <div class="site-footer__top">
                <div class="container">
                    <div class="site-footer__top-inner">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class="footer-widget__about">
                                    <div class="footer-widget__about-logo">
                                        <a href="<?= website_url('?preview_tpl=template2&preview_layout=3') ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;"></a>
                                    </div>
                                    <p class="footer-widget__about-text">Professional skin care solutions designed to
                                        keep your skin healthy, glowing, and beautiful every day.
                                    </p>
                                    <div class="footer-widget__opening-hours">
                                        <h5>Opening Hours</h5>
                                        <ul class="footer-widget__opening-hours-list">
                                            <li>
                                                <p>Mon – Fri: 10:00 AM – 8:00 PM</p>
                                            </li>
                                            <li>
                                                <p>Saturday: 9:00 AM – 6:00 PM</p>
                                            </li>
                                        </ul>
                                        <div class="footer-widget__social">
                                            <a href="https://www.facebook.com/"><span
                                                    class="fab fa-facebook-f"></span></a>
                                            <a href="https://x.com/"><span class="fab fa-twitter"></span></a>
                                            <a href="https://www.instagram.com/?hl=en"><span
                                                    class="fab fa-instagram"></span></a>
                                            <a href="https://www.pinterest.com/"><span
                                                    class="fab fa-pinterest-p"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="site-footer__top-right">
                                    <div class="site-footer-two__newsletter-box">
                                        <h2 class="site-footer-two__newsletter-title">Join Our Newsletter</h2>
                                        <div class="footer-widget__newsletter-form-box">
                                            <form class="footer-widget__newsletter-form contact-form-validated"
                                                action="#" method="POST" novalidate="novalidate">
                                                <div class="footer-widget__newsletter-form-input-box">
                                                    <input type="email" placeholder="Your Email address" name="email">
                                                </div>
                                                <button type="submit" class="footer-widget__newsletter-btn">
                                                    <span><i class="icon-paper-plane"></i></span>
                                                </button>
                                                <div class="result"></div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                            <div class="footer-widget__links">
                                                <h4 class="footer-widget__title">Quick links</h4>
                                                <ul class="footer-widget__links-list list-unstyled">
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('?preview_tpl=template2&preview_layout=1') ?>">Home</a>
                                                    </li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('about') ?>">About
                                                            Us</a>
                                                    </li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('services') ?>">Our
                                                            Services</a>
                                                    </li>
                                                    <li><span class="icon-chevron"></span><a
                                                            href="#">Products</a>
                                                    </li>
                                                    <li><span class="icon-chevron"></span><a href="#">Latest
                                                            Blog</a></li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('contact') ?>">Contact
                                                            Us</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                            <div class="footer-widget__links services">
                                                <h4 class="footer-widget__title">Our Services</h4>
                                                <ul class="footer-widget__links-list list-unstyled">
                                                    <li><span class="icon-chevron"></span><a
                                                            href="#">Facial
                                                            Treatment</a>
                                                    </li>
                                                    <li><span class="icon-chevron"></span><a
                                                            href="#">Skin
                                                            Hydration </a>
                                                    </li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('services') ?>">Our
                                                            Services</a>
                                                    </li>
                                                    <li><span class="icon-chevron"></span><a
                                                            href="#">Anti-Aging
                                                            Care</a>
                                                    </li>
                                                    <li><span class="icon-chevron"></span><a
                                                            href="#">Acne
                                                            Treatment</a></li>
                                                    <li><span class="icon-chevron"></span><a
                                                            href="#">Skin
                                                            Rejuvenation</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                                            <div class="footer-widget__recent-posts">
                                                <h3 class="footer-widget__title">Recent Posts</h3>
                                                <ul class="footer-widget__recent-posts-list">
                                                    <li>
                                                        <div class="footer-widget__recent-posts-img">
                                                            <img src="<?= $asset_url ?>images/resources/footer-v1-img1.jpg"
                                                                alt="news-update-img">
                                                        </div>
                                                        <div class="footer-widget__recent-posts-content">
                                                            <p><span class="icon-calendar"></span> 10 Jan,2026</p>
                                                            <h4><a href="#">Natural Skincare Tips <br>
                                                                    for a Radiant Glow</a></h4>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="footer-widget__recent-posts-img">
                                                            <img src="<?= $asset_url ?>images/resources/footer-v1-img2.jpg"
                                                                alt="news-update-img">
                                                        </div>
                                                        <div class="footer-widget__recent-posts-content">
                                                            <p><span class="icon-calendar"></span> 10 Jan,2026</p>
                                                            <h4><a href="#">Easy Skincare Routines <br>
                                                                    for Busy Lifestyles</a></h4>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer__bottom-inner">
                                <div class="site-footer__copyright">
                                    <p class="site-footer__copyright-text">© 2026 <a href="<?= website_url('?preview_tpl=template2&preview_layout=1') ?>">Pureglow</a>. All
                                        Rights Reserved.</p>
                                </div>
                                <div class="site-footer__bottom-payment-box">
                                    <ul class="list-unstyled site-footer__bottom-payment">
                                        <li><a href="<?= website_url('about') ?>"><img
                                                    src="<?= $asset_url ?>images/resources/site-footer-payment-img1.png"
                                                    alt=""></a></li>
                                        <li><a href="<?= website_url('about') ?>"><img
                                                    src="<?= $asset_url ?>images/resources/site-footer-payment-img2.png"
                                                    alt=""></a></li>
                                        <li><a href="<?= website_url('about') ?>"><img
                                                    src="<?= $asset_url ?>images/resources/site-footer-payment-img3.png"
                                                    alt=""></a></li>
                                        <li><a href="<?= website_url('about') ?>"><img
                                                    src="<?= $asset_url ?>images/resources/site-footer-payment-img4.png"
                                                    alt=""></a></li>
                                        <li><a href="<?= website_url('about') ?>"><img
                                                    src="<?= $asset_url ?>images/resources/site-footer-payment-img5.png"
                                                    alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->



    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="<?= website_url('?preview_tpl=template2&preview_layout=3') ?>" aria-label="logo image"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@Pureglow.com</a>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <!-- Search Popup -->
    <div class="search-popup">
        <div class="color-layer"></div>
        <button class="close-search"><span class="far fa-times fa-fw"></span></button>
        <form method="post" action="#">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- End Search Popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>


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
    <script src="<?= $asset_url ?>js/jquery.circleType.js"></script>
    <script src="<?= $asset_url ?>js/jquery.lettering.min.js"></script>
    <script src="<?= $asset_url ?>js/jquery.fittext.js"></script>
    <script src="<?= $asset_url ?>js/jquery.nice-select.min.js"></script>
    <script src="<?= $asset_url ?>js/marquee.min.js"></script>
    <script src="<?= $asset_url ?>js/jquery-sidebar-content.js"></script>
    <script src="<?= $asset_url ?>js/aos.js"></script>
    <script src="<?= $asset_url ?>js/gsap/gsap.js"></script>
    <script src="<?= $asset_url ?>js/gsap/ScrollTrigger.js"></script>
    <script src="<?= $asset_url ?>js/gsap/SplitText.js"></script>
    <script src="<?= $asset_url ?>js/timePicker.js"></script>
    <script src="<?= $asset_url ?>js/twentytwenty.js"></script>
    <script src="<?= $asset_url ?>js/jquery.event.move.js"></script>





    <!-- template js -->
    <script src="<?= $asset_url ?>js/script.js?v=<?= time() ?>"></script>
</body>


</html>