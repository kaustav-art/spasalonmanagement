<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($asset_url)) {
    $asset_url = base_url('assets/template2/');
}

$layout_num = 1;

// Hero Settings
$hero_badge = get_tpl_setting('template2', 1, 'hero', 'hero_badge', 'True Beauty Starts with Healthy Skin');
$hero_title = get_tpl_setting('template2', 1, 'hero', 'hero_title', 'Glow Starts with <br> Healthy Skin');
$hero_desc = get_tpl_setting('template2', 1, 'hero', 'hero_desc', 'Healthy skin is the true foundation of lasting beauty. When your skin is well-nourished, protected, and properly cared for, it naturally glows with confidence and vitality.');
$hero_btn_text = get_tpl_setting('template2', 1, 'hero', 'hero_btn_text', 'Book Appointment');
$hero_btn_url = get_tpl_setting('template2', 1, 'hero', 'hero_btn_url', 'booking');
$hero_img = fallback_image_url(get_tpl_setting('template2', 1, 'hero', 'hero_image', 'assets/template2/images/resources/main-slider-img-1-1.png'), 'assets/template2/images/resources/main-slider-img-1-1.png');

// Featured Skincare Settings
$skincare_tagline = get_tpl_setting('template2', 1, 'featured_skincare', 'tagline', 'Featured Skincare');
$skincare_title = get_tpl_setting('template2', 1, 'featured_skincare', 'title', 'Beauty and Glow Skin Solutions');

// About Settings
$about_tagline = get_tpl_setting('template2', 1, 'about', 'about_tagline', 'About Us');
$about_title = get_tpl_setting('template2', 1, 'about', 'about_title', 'Explore Our Dedication to Healthy Skin');
$about_desc = get_tpl_setting('template2', 1, 'about', 'about_desc', 'We are passionate about helping you achieve healthy, glowing skin through gentle and effective care. Our journey began with a simple belief that true beauty starts with skin wellness.');
$about_experience = get_tpl_setting('template2', 1, 'about', 'about_experience', '27');
$about_author_name = get_tpl_setting('template2', 1, 'about', 'about_author_name', 'Emma Watson');
$about_author_role = get_tpl_setting('template2', 1, 'about', 'about_author_role', 'Founder CEO');
$about_img_1 = fallback_image_url(get_tpl_setting('template2', 1, 'about', 'about_image_1', 'assets/template2/images/resources/about-one-img-1.jpg'), 'assets/template2/images/resources/about-one-img-1.jpg');
$about_img_2 = fallback_image_url(get_tpl_setting('template2', 1, 'about', 'about_image_2', 'assets/template2/images/resources/about-one-img-2.jpg'), 'assets/template2/images/resources/about-one-img-2.jpg');

// Services Header
$services_tagline = get_tpl_setting('template2', 1, 'services_header', 'tagline', 'We Offer');
$services_title = get_tpl_setting('template2', 1, 'services_header', 'title', 'Beauty and Skin Care Services');
$services_desc = get_tpl_setting('template2', 1, 'services_header', 'desc', 'Our skin care services are designed to nourish, protect, and enhance your natural beauty. We use advanced techniques and high-quality.');

// Testimonials Header
$testi_tagline = get_tpl_setting('template2', 1, 'testimonials_header', 'tagline', 'Testimonial');
$testi_title = get_tpl_setting('template2', 1, 'testimonials_header', 'title', 'Radiant Reviews from Our Happy Clients');

// FAQ Header
$faq_tagline = get_tpl_setting('template2', 1, 'faq_header', 'tagline', 'FAQ’S');
$faq_title = get_tpl_setting('template2', 1, 'faq_header', 'title', 'Frequently Asked Questions');

// Blog Header
$blog_tagline = get_tpl_setting('template2', 1, 'blog_header', 'tagline', 'Latest News');
$blog_title = get_tpl_setting('template2', 1, 'blog_header', 'title', 'Inside a World of Relaxing Spa Treatments');
$blog_desc = get_tpl_setting('template2', 1, 'blog_header', 'desc', 'Beautiful skin doesn’t happen overnight. It requires patience, consistency, and the right treatments.');
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Home One || Pureglow || Pureglow HTML 5 Template </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $asset_url ?>images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $asset_url ?>images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $asset_url ?>images/favicons/favicon-16x16.png" />
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
    <link rel="stylesheet" href="<?= $asset_url ?>css/style.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/responsive.css" />
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
                                <a href="<?= website_url('?preview_tpl=template2&preview_layout=1') ?>"><img src="<?= $asset_url ?>images/resources/logo-2.png" alt="" /></a>
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
        <header class="main-header">
            <div class="main-menu__top">
                <div class="main-menu__top-inner">
                    <ul class="list-unstyled main-menu__contact-list">
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
                    <p class="main-menu__top-welcome-text">Welcome to Pureglow
                        HTML5 Template</p>
                    <div class="main-menu__top-right">
                        <p class="main-menu__social-title">Follow Us On:</p>
                        <div class="main-menu__social">
                            <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
                            <a href="https://www.instagram.com/?hl=en"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="main-menu">
                <div class="main-menu__wrapper">
                    <div class="main-menu__wrapper-inner">
                        <div class="main-menu__left">
                            <div class="main-menu__logo">
                                <a href="<?= website_url('?preview_tpl=template2&preview_layout=1') ?>"><img src="<?= $asset_url ?>images/resources/logo-1.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="main-menu__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="current">
                                    <a href="<?= website_url('?preview_tpl=template2&preview_layout=1') ?>">Home</a>
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
                        <div class="main-menu__right">
                            <div class="main-menu__call">
                                <div class="main-menu__call-icon">
                                    <i class="icon-telephone"></i>
                                </div>
                                <div class="main-menu__call-content">
                                    <p class="main-menu__call-sub-title">Call Anytime</p>
                                    <h5 class="main-menu__call-number"><a href="tel:9288006780">+92 ( 8800 ) - 6780</a></h5>
                                </div>
                            </div>
                            <div class="main-menu__btn-box">
                                <a class="thm-btn" href="<?= website_url('booking') ?>">Book Appointment
                                    <span class="fas fa-arrow-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->


        <!--Main Slider Start-->
        <section class="main-slider">
            <div class="swiper-container main-slider__carousel">
                <div class="swiper-wrapper">
                    <?php
                    $hero_banners = !empty($tpl_hero_banners) ? $tpl_hero_banners : array();
                    if (empty($hero_banners) && $this->db->table_exists('template_hero_banners')) {
                        $hero_banners = $this->db->where('template_key', 'template2')
                                                 ->where('layout_number', 1)
                                                 ->where('status', 'active')
                                                 ->order_by('sort_order', 'ASC')
                                                 ->get('template_hero_banners')
                                                 ->result();
                    }
                    ?>
                    <?php if (!empty($hero_banners)): ?>
                        <?php foreach ($hero_banners as $bidx => $slide): 
                            $slide_badge = $slide->badge ?: 'True Beauty Starts with Healthy Skin';
                            $slide_title = $slide->title;
                            $slide_desc = $slide->description;
                            $slide_btn_text = $slide->button_text ?: 'Book Appointment';
                            $slide_btn_url = $slide->button_url ?: 'booking';
                            $slide_img = fallback_image_url($slide->image, 'assets/template2/images/resources/main-slider-img-1-' . (($bidx % 3) + 1) . '.png');
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

                <div class="swiper-pagination" id="main-slider-pagination"></div>
                <!-- If we need navigation buttons -->

            </div>
        </section>
        <!--Main Slider End-->

        <!--Feature One Start -->
        <section class="feature-one">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box">
                        <p class="section-title__tagline"><?= htmlspecialchars($skincare_tagline) ?></p>
                        <div class="section-title__tagline-shape"></div>
                    </div>
                    <h2 class="section-title__title title-animation"><?= htmlspecialchars($skincare_title) ?></h2>
                </div>
                <div class="feature-one__inner">
                    <div class="row">
                        <?php if (!empty($tpl_featured_items)): ?>
                            <?php foreach ($tpl_featured_items as $f_idx => $item): ?>
                                <div class="col-xl-3 col-lg-6 col-md-6 wow <?= $f_idx % 2 === 0 ? 'fadeInLeft' : 'fadeInRight' ?>" data-wow-delay="<?= ($f_idx * 100) ?>ms" data-wow-duration="1500ms">
                                    <div class="feature-one__single">
                                        <div class="feature-one__img">
                                            <img src="<?= fallback_image_url($item->thumbnail, 'assets/template2/images/resources/feature-1-' . (($f_idx % 4) + 1) . '.jpg') ?>" alt="<?= htmlspecialchars($item->title) ?>">
                                            <div class="feature-one__content">
                                                <h4 class="feature-one__title"><a href="<?= website_url('booking') ?>"><?= htmlspecialchars($item->title) ?></a></h4>
                                                <p class="feature-one__text"><?= htmlspecialchars($item->short_desc) ?></p>
                                                <div class="feature-one__btn-box">
                                                    <a class="thm-btn" href="<?= website_url('booking') ?>">Book Now
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

        <!--About One Start -->
        <section class="about-one">
            <div class="about-one-shape-1 float-bob-y">
                <img src="<?= $asset_url ?>images/shapes/about-one-shape-1.png" alt="about-one-shape">
            </div>
            <div class="about-one-shape-2 float-bob-y">
                <img src="<?= $asset_url ?>images/shapes/about-one-shape-2.png" alt="about-one-shape">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="about-one__left">
                            <div class="about-one__img-box">
                                <div class="about-one__img">
                                    <img src="<?= $about_img_1 ?>" alt="about-one-img">
                                </div>
                                <div class="about-one__img-two-and-content">
                                    <div class="about-one__img-two-counter">
                                        <div class="about-one__img-two-counter-count">
                                            <h3 class="odometer" data-count="<?= (int)$about_experience ?>"><?= (int)$about_experience ?></h3>
                                            <span class="plus">+</span>
                                        </div>
                                        <div class="about-one__img-two-counter-count-title">
                                            <h4>Years of Experience</h4>
                                        </div>
                                    </div>
                                    <div class="about-one__img-2">
                                        <img src="<?= $about_img_2 ?>" alt="about-one-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="about-one__right">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <p class="section-title__tagline"><?= htmlspecialchars($about_tagline) ?></p>
                                    <div class="section-title__tagline-shape"></div>
                                </div>
                                <h2 class="section-title__title title-animation"><?= htmlspecialchars($about_title) ?></h2>
                            </div>
                            <p class="about-one__text"><?= nl2br(htmlspecialchars($about_desc)) ?></p>
                            <div class="about-one__point-box">
                                <ul class="about-one__point">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Natural Skin Therapy</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Expert Skin Therapy</p>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="about-one__point two">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Botanical Beauty Treatment</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Skin Renewal Treatment</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="about-one__btn-and-author-box">
                                <div class="about-one__btn-box">
                                    <a class="thm-btn" href="<?= website_url('about') ?>">Explore Now
                                        <span class="fas fa-arrow-right"></span>
                                    </a>
                                </div>
                                <div class="about-one__author-box">
                                    <div class="about-one__author-img">
                                        <img src="<?= $asset_url ?>images/resources/about-one-author-img.jpg" alt="author-img">
                                    </div>
                                    <div class="about-one__author-contetn">
                                        <h5><?= htmlspecialchars($about_author_name) ?></h5>
                                        <p><?= htmlspecialchars($about_author_role) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About One End -->

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
                                <h2 class="section-title__title title-animation"><?= htmlspecialchars($services_title) ?></h2>
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

        
        <!--Testimonial One Start-->
        <section class="testimonial-one">
            <div class="testimonial-one__shape-1">
                <img src="<?= $asset_url ?>images/shapes/testimonial-one-shape-1.png" alt="testimonial-one-shape">
            </div>
            <div class="container">
                <div class="testimonial-one__top">
                    <div class="section-title text-left sec-title-animation animation-style2">
                        <div class="section-title__tagline-box">
                            <p class="section-title__tagline"><?= htmlspecialchars($testi_tagline) ?></p>
                            <div class="section-title__tagline-shape"></div>
                        </div>
                        <h2 class="section-title__title title-animation"><?= nl2br(htmlspecialchars($testi_title)) ?>
                        </h2>
                    </div>

                </div>
                <div class="testimonial-one__bottom">
                    <div class="swiper-container testimonial-one__carousel">
                        <div class="swiper-wrapper">
                            <?php if (!empty($tpl_testimonials)): ?>
                                <?php foreach ($tpl_testimonials as $tidx => $t): ?>
                                    <div class="swiper-slide">
                                        <div class="testimonial-one__single">
                                            <div class="testimonial-one__quote">
                                                <span class="icon-quote"></span>
                                            </div>
                                            <div class="testimonial-one__client-box">
                                                <div class="testimonial-one__client-img">
                                                    <img src="<?= fallback_image_url($t->avatar, 'assets/template2/images/testimonial/testimonial-one-client-1-' . (($tidx % 2) + 1) . '.jpg') ?>"
                                                        alt="<?= htmlspecialchars($t->client_name) ?>">
                                                </div>
                                                <div class="testimonial-one__client-content">
                                                    <div class="testimonial-one__client-rating">
                                                        <?php $r = (int)$t->rating; for ($s = 1; $s <= 5; $s++): ?>
                                                            <span class="icon-star<?= $s <= $r ? '' : '-empty' ?>"></span>
                                                        <?php endfor; ?>
                                                    </div>
                                                    <h4 class="testimonial-one__client-name"><a href="#"><?= htmlspecialchars($t->client_name) ?></a></h4>
                                                    <p class="testimonial-one__client-sub-title"><?= htmlspecialchars($t->designation) ?></p>
                                                </div>
                                            </div>
                                            <p class="testimonial-one__text"><?= htmlspecialchars($t->review) ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="swiper-nav-style-one">
                            <div class="testimonial-one-dot-style1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial One End-->

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
                                    action="#" method="post">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="appointment-one__input-box">
                                                <input type="text" name="name" placeholder="Full Name" required="">
                                                <div class="appointment-one__input-box-icon">
                                                    <span class="icon-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="appointment-one__input-box">
                                                <input type="email" name="email" placeholder="Your Email" required="">
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
                                                <input type="text" placeholder="Date " name="date" id="datepicker">
                                                <div class="appointment-one__input-box-icon">
                                                    <span class="icon-calendar"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="appointment-one__input-box">
                                                <div class="select-box">
                                                    <select class="selectmenu wide">
                                                        <option selected>Select Service</option>
                                                        <option>Facial Treatment</option>
                                                        <option>Skin Brightening</option>
                                                        <option>Acne Treatment</option>
                                                        <option>Natural Skin Therapy</option>
                                                        <option>Deep Hydration Therapy</option>
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

        <!--Menu One Start-->
        <section class="menu-one">
            <div class="menu-one__shape-1">
                <img src="<?= $asset_url ?>images/shapes/menu-one-shape-1.png" alt="menu-one-shape">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="menu-one__left">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <p class="section-title__tagline">Our Menu</p>
                                    <div class="section-title__tagline-shape"></div>
                                </div>
                                <h2 class="section-title__title title-animation">Services price</h2>
                            </div>
                            <p class="menu-one__text">Our professional makeup services are designed to highlight your
                                natural beauty and create a flawless, radiant look.</p>
                            <div class="menu-one__service-list-box">
                                <ul class="menu-one__service-list">
                                    <li>
                                        <p>Liquid Foundation</p>
                                        <div class="border-box"></div>
                                        <p class="price">$ 99.00</p>
                                    </li>
                                    <li>
                                        <p>Skin Moisturizer</p>
                                        <div class="border-box"></div>
                                        <p class="price">$ 199.00</p>
                                    </li>
                                    <li>
                                        <p>Makeup Brush</p>
                                        <div class="border-box"></div>
                                        <p class="price">$ 85.00</p>
                                    </li>
                                    <li>
                                        <p>Sun Glow Bronzer</p>
                                        <div class="border-box"></div>
                                        <p class="price">$ 100.00</p>
                                    </li>
                                    <li>
                                        <p>Radiance Luminizer</p>
                                        <div class="border-box"></div>
                                        <p class="price">$ 120.00</p>
                                    </li>
                                    <li>
                                        <p>Soft Finish Face Powder</p>
                                        <div class="border-box"></div>
                                        <p class="price">$ 65.00</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="menu-one__right">
                            <div class="before-and-after__img-box">
                                <div class="before-after">
                                    <div class="before-after-twentytwenty" id="wrinkle-before-after">
                                        <img src="<?= $asset_url ?>images/resources/before-and-after-img.jpg" alt="">
                                        <img src="<?= $asset_url ?>images/resources/before-and-after-img-2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="before-and-after__tag"><span>Before</span></div>
                                <div class="before-and-after__tag before-and-after__tag-2">
                                    <span>After</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Menu One End-->


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

        <!--Blog One Start-->
        <section class="blog-one">
            <div class="container">
                <div class="row">
                    <!--Blog One Content Start-->
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="blog-one__content">
                            <div class="section-title text-left sec-title-animation animation-style2">
                                <div class="section-title__tagline-box">
                                    <p class="section-title__tagline"><?= htmlspecialchars($blog_tagline) ?></p>
                                    <div class="section-title__tagline-shape"></div>
                                </div>
                                <h2 class="section-title__title title-animation"><?= nl2br(htmlspecialchars($blog_title)) ?></h2>
                            </div>

                            <div class="blog-one__content-text">
                                <p><?= nl2br(htmlspecialchars($blog_desc)) ?></p>
                            </div>
                        </div>
                    </div>
                    <!--Blog One Content End-->

                    <?php if (!empty($tpl_blogs)): ?>
                        <?php foreach ($tpl_blogs as $bidx => $blog): 
                            $blog_url = website_url('blog/' . $blog->slug . '?preview_tpl=template2&preview_layout=' . $layout_num);
                            $b_time = strtotime($blog->published_date ?: date('Y-m-d'));
                            $day = date('d', $b_time);
                            $my = date('M, Y', $b_time);
                            $anim = ($bidx % 2 === 0) ? 'fadeInLeft' : 'fadeInRight';
                        ?>
                            <div class="col-xl-6 wow <?= $anim ?>" data-wow-delay="<?= ($bidx * 100) ?>ms" data-wow-duration="1500ms">
                                <div class="blog-one__single">
                                    <div class="blog-one__single-img">
                                        <div class="blog-one__single-img-inner">
                                            <img src="<?= fallback_image_url($blog->thumbnail, 'assets/template2/images/blog/blog-v1-img' . (($bidx % 3) + 1) . '.jpg') ?>" alt="<?= htmlspecialchars($blog->title) ?>">
                                        </div>
                                        <div class="blog-one__single-content">
                                            <div class="blog-one__single-content-date">
                                                <h2><?= $day ?></h2>
                                                <p><?= $my ?></p>
                                            </div>
                                            <div class="blog-one__single-content-inner">
                                                <h3><a href="<?= $blog_url ?>"><?= htmlspecialchars($blog->title) ?></a></h3>
                                                <p><?= htmlspecialchars($blog->short_desc) ?></p>
                                                <div class="btn-box">
                                                    <a href="<?= $blog_url ?>">Read More <span class="icon-right-arrow"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!--Blog One End-->

        <!--Site Footer Start-->
        <footer class="site-footer">
            <div class="site-footer__top">
                <div class="container">
                    <div class="site-footer__top-inner">
                        <div class="row">
                            <div class="col-xl-4 wow fadeInUp" data-wow-delay="100ms">
                                <div class="footer-widget__about">
                                    <div class="footer-widget__about-logo">
                                        <a href="<?= website_url('?preview_tpl=template2&preview_layout=1') ?>"><img src="<?= $asset_url ?>images/resources/logo-2.png" alt=""></a>
                                    </div>
                                    <p class="footer-widget__about-text">We provide a range of professional skincare
                                        <br> treatments designed to improve your skin’s <br> health and natural beauty.
                                    </p>
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
                                    <div class="footer-widget__social">
                                        <a href="https://www.facebook.com/"><span class="fab fa-facebook-f"></span></a>
                                        <a href="https://x.com/"><span class="fab fa-twitter"></span></a>
                                        <a href="https://www.instagram.com/?hl=en"><span
                                                class="fab fa-instagram"></span></a>
                                        <a href="https://www.pinterest.com/"><span
                                                class="fab fa-pinterest-p"></span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="site-footer__top-right">
                                    <div class="site-footer__top-right-top">
                                        <div class="site-footer__contact-info">
                                            <ul class="site-footer__contact-info-list">
                                                <li>
                                                    <div class="icon-box">
                                                        <span class="icon-telephone"></span>
                                                    </div>
                                                    <div class="content-box">
                                                        <h3>Urgent Support?</h3>
                                                        <p><a href="tel:123456789">+1 (246) 333-099</a></p>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="icon-box">
                                                        <span class="icon-email"></span>
                                                    </div>
                                                    <div class="content-box">
                                                        <h3>Send us a Mail</h3>
                                                        <p><a href="mailto:info@domain.com">info@domain.com</a></p>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="icon-box">
                                                        <span class="icon-clock"></span>
                                                    </div>
                                                    <div class="content-box">
                                                        <h3>Opening Time</h3>
                                                        <p><a href="tel:123456789">Mon -Sat: 10:00 - 17:00</a></p>
                                                    </div>
                                                </li>
                                            </ul>
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
                <a href="<?= website_url('?preview_tpl=template2&preview_layout=1') ?>" aria-label="logo image"><img src="<?= $asset_url ?>images/resources/logo-2.png" width="150"
                        alt="" /></a>
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