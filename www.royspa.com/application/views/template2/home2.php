<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($asset_url)) {
    $asset_url = base_url('assets/template2/');
}

$layout_num = 2;

$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$site_logo = $site_logo_url;

$site_fav_url = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');
$site_fav = $site_fav_url;

// Hero Settings (Dynamic Multi-Banner Support)
$hero_banners = !empty($tpl_hero_banners) ? $tpl_hero_banners : array();
if (empty($hero_banners) && $this->db->table_exists('template_hero_banners')) {
    $hero_banners = $this->db->where('template_key', 'template2')
                             ->where('layout_number', 2)
                             ->where('status', 'active')
                             ->order_by('sort_order', 'ASC')
                             ->get('template_hero_banners')
                             ->result();
}
$first_slide = !empty($hero_banners) ? $hero_banners[0] : null;
$hero_badge = $first_slide ? $first_slide->badge : get_tpl_setting('template2', 2, 'hero', 'hero_badge', 'Welcome To Pureglow Sanctuary');
$hero_title = $first_slide ? $first_slide->title : get_tpl_setting('template2', 2, 'hero', 'hero_title', 'Natural Beauty & Holistic Skin Wellness');
$hero_desc = $first_slide ? $first_slide->description : get_tpl_setting('template2', 2, 'hero', 'hero_desc', 'Revitalize your body and mind with our modern botanical therapies.');
$hero_btn_text = $first_slide ? $first_slide->button_text : get_tpl_setting('template2', 2, 'hero', 'hero_btn_text', 'Book Treatment');
$hero_btn_url = $first_slide ? $first_slide->button_url : get_tpl_setting('template2', 2, 'hero', 'hero_btn_url', 'booking');
$hero_img = $first_slide && !empty($first_slide->image) ? fallback_image_url($first_slide->image, 'assets/template2/images/resources/banner-one-img.png') : fallback_image_url(get_tpl_setting('template2', 2, 'hero', 'hero_image', 'assets/template2/images/resources/banner-one-img.png'), 'assets/template2/images/resources/banner-one-img.png');

// About Settings
$about_tagline = get_tpl_setting('template2', 2, 'about', 'about_tagline', 'About Us');
$about_title = get_tpl_setting('template2', 2, 'about', 'about_title', 'Precision and Care in Every Treatment');
$about_desc = get_tpl_setting('template2', 2, 'about', 'about_desc', 'We are dedicated to helping your skin look and feel its healthiest. Combining expert knowledge, natural ingredients, and personalized care.');
$about_experience = get_tpl_setting('template2', 2, 'about', 'about_experience', '15');
$about_author_name = get_tpl_setting('template2', 2, 'about', 'about_author_name', 'Sophia Laurent');
$about_author_role = get_tpl_setting('template2', 2, 'about', 'about_author_role', 'Wellness Director');

// Services Header
$services_tagline = get_tpl_setting('template2', 2, 'services_header', 'tagline', 'Our Services');
$services_title = get_tpl_setting('template2', 2, 'services_header', 'title', 'Our Featured Skin Care Services');
$services_desc = get_tpl_setting('template2', 2, 'services_header', 'desc', 'We offer a range of professional skincare treatments designed to nourish, protect.');

// Works / Gallery Header
$works_tagline = get_tpl_setting('template2', 2, 'featured_skincare', 'tagline', 'Our Works');
$works_title = get_tpl_setting('template2', 2, 'featured_skincare', 'title', 'Glow Transformation Gallery');

// Testimonials Header
$testi_tagline = get_tpl_setting('template2', 2, 'testimonials_header', 'tagline', 'Clients Feedback');
$testi_title = get_tpl_setting('template2', 2, 'testimonials_header', 'title', 'What Our Clients Say About Results');

// FAQ Header
$faq_tagline = get_tpl_setting('template2', 2, 'faq_header', 'tagline', 'Frequently Asked Questions');
$faq_title = get_tpl_setting('template2', 2, 'faq_header', 'title', 'Clear Answers About Your Treatment');

// Blog Header
$blog_tagline = get_tpl_setting('template2', 2, 'blog_header', 'tagline', 'Blog Post');
$blog_title = get_tpl_setting('template2', 2, 'blog_header', 'title', 'Our Latest Beauty and Skincare Posts');
$blog_desc = get_tpl_setting('template2', 2, 'blog_header', 'desc', 'Our skin treatment blog shares expert tips, proven techniques, and the latest insights in skincare.');
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Home Two || Pureglow || Pureglow HTML 5 Template </title>
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
                                <a href="<?= website_url('?preview_tpl=template2&preview_layout=2') ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;" /></a>
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
                                <a href="<?= website_url('?preview_tpl=template2&preview_layout=2') ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;"></a>
                            </div>
                        </div>
                        <div class="main-menu-two__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="current">
                                    <a href="<?= website_url('?preview_tpl=template2&preview_layout=2') ?>">Home</a>
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


        <!--Main Slider Start (Layout 2 - Multi-Slide Carousel with 3D Animation)-->
        <section class="main-slider">
            <div class="swiper-container main-slider-layout2__carousel">
                <div class="swiper-wrapper">
                    <?php if (!empty($hero_banners)): ?>
                        <?php foreach ($hero_banners as $bidx => $slide): 
                            $slide_badge = !empty($slide->badge) ? $slide->badge : $hero_badge;
                            $slide_title = !empty($slide->title) ? $slide->title : $hero_title;
                            $slide_desc = !empty($slide->description) ? $slide->description : $hero_desc;
                            $slide_btn_text = !empty($slide->button_text) ? $slide->button_text : $hero_btn_text;
                            $slide_btn_url = !empty($slide->button_url) ? $slide->button_url : $hero_btn_url;
                            $slide_img = !empty($slide->image) ? fallback_image_url($slide->image, 'assets/template2/images/resources/banner-one-img.png') : $hero_img;
                            $slide_bg = !empty($slide->background_image) ? fallback_image_url($slide->background_image, 'assets/template2/images/backgrounds/slider-1-1.html') : ($asset_url . 'images/backgrounds/slider-1-1.html');
                        ?>
                            <div class="swiper-slide">
                                <div class="main-slider__bg" style="background-image: url(<?= htmlspecialchars($slide_bg) ?>);"></div>
                                <div class="main-slider__shape-1"></div>
                                <div class="main-slider__shape-2"></div>
                                <div class="main-slider__shape-3 float-bob-y">
                                    <img src="<?= $asset_url ?>images/shapes/main-slider-shape-3.png" alt="main-slider-shape">
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="main-slider__content">
                                                <p class="main-slider__sub-title"><?= htmlspecialchars($slide_badge) ?></p>
                                                <h2 class="main-slider__title" style="max-width: 800px;"><?= nl2br(strip_tags($slide_title, '<br><br/><span><strong><em><b><i>')) ?></h2>
                                                <p class="main-slider__text" style="max-width: 800px;"><?= nl2br(htmlspecialchars($slide_desc)) ?></p>
                                                <div class="main-slider__btn-and-video-box">
                                                    <div class="main-slider__btn-box">
                                                        <a class="thm-btn" href="<?= website_url($slide_btn_url) ?>"><?= htmlspecialchars($slide_btn_text) ?>
                                                            <span class="fas fa-arrow-right"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="main-slider__img-box">
                                                    <div class="main-slider__img">
                                                        <img src="<?= htmlspecialchars($slide_img) ?>" alt="main-slider-img">
                                                    </div>
                                                    <div class="main-slider__img-shape">
                                                        <img src="<?= $asset_url ?>images/shapes/main-slider-img-shape-1.png" alt="main-slider-img-shape">
                                                    </div>
                                                    <div class="main-slider__img-shape-2">
                                                        <img src="<?= $asset_url ?>images/shapes/main-slider-img-shape-2.png" alt="main-slider-img-shape">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="swiper-pagination" id="main-slider-layout2-pagination"></div>
            </div>
        </section>
        <!--Main Slider End-->

        <!--About Two Start-->
        <section class="about-two">
            <div class="container">
                <div class="about-two__top">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="about-two__top-left">
                                <div class="section-title text-left sec-title-animation animation-style2">
                                    <div class="section-title__tagline-box">
                                        <p class="section-title__tagline"><?= htmlspecialchars($about_tagline) ?></p>
                                        <div class="section-title__tagline-shape"></div>
                                    </div>
                                    <h2 class="section-title__title title-animation"><?= nl2br(htmlspecialchars($about_title)) ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="about-two__top-right">
                                <p><?= nl2br(htmlspecialchars($about_desc)) ?></p>
                                <div class="about-two__btn-box">
                                    <a class="thm-btn" href="<?= website_url('about') ?>">More About Us
                                        <span class="fas fa-arrow-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-two__bottom">
                    <div class="row">
                        <div class="col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="about-two__left">
                                <div class="about-two__video-and-counter">
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                            <div class="about-two__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="about-two__counter">
                                        <div class="about-two__counter-count">
                                            <h3 class="odometer" data-count="100">00</h3>
                                            <span class="percent">%</span>
                                        </div>
                                        <h4>patient satisfaction rate</h4>
                                    </div>
                                </div>
                                <div class="about-two__img-box">
                                    <div class="about-two__img">
                                        <img src="<?= $asset_url ?>images/resources/about-two-img-1.jpg" alt="about-two-img">
                                    </div>
                                    <div class="about-two__img-content">
                                        <ul class="about-two__img-content-list">
                                            <li>
                                                <div class="about-two__opening-hours">
                                                    <h5>Opening Hours</h5>
                                                    <p>Mon to Fri: 09:30 – 19:30</p>
                                                    <p>Saturday: 10:30 – 17:00</p>
                                                    <p>Sunday: Closed</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="about-two__call">
                                                    <div class="about-two__call-icon">
                                                        <span class="icon-call"></span>
                                                    </div>
                                                    <div class="about-two__call-content">
                                                        <h5>Call Anytime</h5>
                                                        <p><a href="tel:442079460821">+44 20 7946 0821</a></p>
                                                        <p><a href="tel:14165552673">(+1) 416 555 2673</a></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="about-two__right">
                                <div class="about-two__img-box-two">
                                    <div class="about-two__img-two">
                                        <img src="<?= $asset_url ?>images/resources/about-two-img-2.jpg" alt="about-two-img">
                                    </div>
                                    <div class="about-two__satisfied-client">
                                        <div class="about-two__satisfied-count">
                                            <h3 class="odometer" data-count="<?= (int)$about_experience ?>"><?= (int)$about_experience ?></h3>
                                            <span class="plus">K+</span>
                                        </div>
                                        <h4>Satisfied Clients</h4>
                                    </div>
                                    <div class="about-two__author">
                                        <div class="about-two__author-img">
                                            <img src="<?= $asset_url ?>images/resources/about-one-author-img.jpg"
                                                alt="about-two-author-img">
                                        </div>
                                        <div class="about-two__author-content">
                                            <h4><?= htmlspecialchars($about_author_name) ?></h4>
                                            <p><?= htmlspecialchars($about_author_role) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Two End-->

        <!--Services Two Start-->
        <section class="services-two">
            <div class="container">
                <div class="services-two__top">
                    <div class="services-two__top-left">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <p class="section-title__tagline"><?= htmlspecialchars($services_tagline) ?></p>
                                <div class="section-title__tagline-shape"></div>
                            </div>
                            <h2 class="section-title__title title-animation"><?= nl2br(htmlspecialchars($services_title)) ?></h2>
                        </div>
                    </div>
                    <div class="services-two__top-right">
                        <p><?= nl2br(htmlspecialchars($services_desc)) ?></p>
                        <div class="services-two__top-btn-box">
                            <a class="thm-btn" href="<?= website_url('services') ?>">View all Services
                                <span class="fas fa-arrow-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="services-two__bottom">
                    <div class="row">
                        <?php if (!empty($tpl_services)): ?>
                            <?php foreach ($tpl_services as $s_idx => $svc): 
                                $svc_url = website_url('service/' . $svc->slug . '?preview_tpl=template2&preview_layout=' . $layout_num);
                                $anim = ($s_idx % 2 === 0) ? 'fadeInLeft' : 'fadeInRight';
                            ?>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow <?= $anim ?>" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="services-two__single">
                                        <div class="services-two__icon-and-count-box">
                                            <div class="services-two__icon">
                                                <span class="<?= !empty($svc->icon_class) ? htmlspecialchars($svc->icon_class) : 'icon-cream' ?>"></span>
                                            </div>
                                            <div class="services-two__count"></div>
                                        </div>
                                        <h3 class="services-two__title"><a href="<?= $svc_url ?>"><?= htmlspecialchars($svc->title) ?></a></h3>
                                        <p class="text-muted small mt-2"><?= htmlspecialchars($svc->short_desc) ?></p>
                                        <a href="<?= $svc_url ?>" class="services-two__read-more">Read More <span class="icon-right-arrow"></span> </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--Services Two End-->

        
        <!--Work One Start-->
        <section class="work-one">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box">
                        <p class="section-title__tagline"><?= htmlspecialchars($works_tagline) ?></p>
                        <div class="section-title__tagline-shape"></div>
                    </div>
                    <h2 class="section-title__title title-animation"><?= htmlspecialchars($works_title) ?></h2>
                </div>
                <div class="work-one__bottom">
                    <div class="swiper-container work-one__carousel">
                        <div class="swiper-wrapper">
                            <?php if (!empty($tpl_featured_items)): ?>
                                <?php foreach ($tpl_featured_items as $f_idx => $item): 
                                    $item_img = fallback_image_url($item->thumbnail, 'assets/template2/images/work/work-1-' . (($f_idx % 3) + 1) . '.jpg');
                                    $item_url = !empty($item->button_link) ? (strpos($item->button_link, 'http') === 0 ? $item->button_link : (strpos($item->button_link, '/') === 0 ? base_url(ltrim($item->button_link, '/')) : website_url($item->button_link))) : '#';
                                ?>
                                    <!--Work One Single Start -->
                                    <div class="swiper-slide">
                                        <div class="work-one__signle">
                                            <div class="work-one__img">
                                                <img src="<?= $item_img ?>" alt="<?= htmlspecialchars($item->title) ?>">
                                                <div class="work-one__content">
                                                    <div class="work-one__arrow">
                                                        <a href="<?= $item_img ?>" class="img-popup"><span class="icon-right-up"></span></a>
                                                    </div>
                                                    <p><?= htmlspecialchars($item->short_desc) ?></p>
                                                    <h3><a href="<?= $item_url ?>"><?= htmlspecialchars($item->title) ?></a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Work One Single End -->
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="swiper-dot-style-box">
                            <div class="work-one-dot-style1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Work One End-->

        
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

        <!--Appointment Two Start-->
        <section class="appointment-two">
            <div class="appointment-two__bg"
                style="background-image: url(<?= $asset_url ?>images/backgrounds/appointment-v2-bg.jpg);"></div>
            <div class="shape1"></div>
            <div class="shape2"></div>
            <div class="shape3 float-bob-y"><img src="<?= $asset_url ?>images/shapes/appointment-v2-shape1.png" alt=""></div>
            <div class="container">
                <div class="appointment-two__inner">
                    <div class="appointment-two__inner-box">
                        <div class="section-title sec-title-animation animation-style1">
                            <div class="section-title__tagline-box">
                                <p class="section-title__tagline">Our Booking</p>
                                <div class="section-title__tagline-shape"></div>
                            </div>
                            <h2 class="section-title__title title-animation">Reserve Your Glow Treatment</h2>
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
        </section>
        <!--Appointment Two End-->

        <!--Site Footer Start-->
        <footer class="site-footer site-footer-two">
            <div class="site-footer__top">
                <div class="container">
                    <div class="site-footer__top-inner">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class="footer-widget__about">
                                    <div class="footer-widget__about-logo">
                                        <a href="<?= website_url('?preview_tpl=template2&preview_layout=2') ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;"></a>
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

            <!-- Sliding Text Two Start -->
            <div class="sliding-text-two">
                <div class="sliding-text-two__wrap">
                    <ul class="sliding-text-two__list list-unstyled marquee_mode">
                        <li>
                            <h2 data-hover="Skincare" class="sliding-text-two__title">Skincare</h2>
                        </li>
                        <li><span></span></li>
                        <li>
                            <h2 data-hover="Haircare" class="sliding-text-two__title">Haircare</h2>
                        </li>
                        <li><span></span></li>
                        <li>
                            <h2 data-hover="Bodycare" class="sliding-text-two__title">Bodycare</h2>
                        </li>
                        <li><span></span></li>
                        <li>
                            <h2 data-hover="Gentle Care" class="sliding-text-two__title">Gentle Care</h2>
                        </li>
                        <li><span></span></li>
                        <li>
                            <h2 data-hover="Glow" class="sliding-text-two__title">Glow</h2>
                        </li>
                        <li><span></span></li>
                    </ul>
                </div>
            </div>
            <!-- Sliding Text Two End -->

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
                <a href="<?= website_url('?preview_tpl=template2&preview_layout=2') ?>" aria-label="logo image"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;" /></a>
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