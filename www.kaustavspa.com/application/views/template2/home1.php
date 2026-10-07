<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($asset_url)) {
    $asset_url = base_url('assets/template2/');
}

$layout_num = 1;

// Branding Settings
$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$site_logo = $site_logo_url;

$site_fav_url = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');
$site_fav = $site_fav_url;

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
$faq_tagline = get_tpl_setting('template2', 1, 'faq_header', 'tagline', 'FAQâ€™S');
$faq_title = get_tpl_setting('template2', 1, 'faq_header', 'title', 'Frequently Asked Questions');

// Blog Header
$blog_tagline = get_tpl_setting('template2', 1, 'blog_header', 'tagline', 'Latest News');
$blog_title = get_tpl_setting('template2', 1, 'blog_header', 'title', 'Inside a World of Relaxing Spa Treatments');
$blog_desc = get_tpl_setting('template2', 1, 'blog_header', 'desc', 'Beautiful skin doesnâ€™t happen overnight. It requires patience, consistency, and the right treatments.');
?>

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
                                                <?php 
                                                    $f_url = !empty($item->button_link) ? (strpos($item->button_link, 'http') === 0 ? $item->button_link : (strpos($item->button_link, '/') === 0 ? base_url(ltrim($item->button_link, '/')) : website_url($item->button_link))) : website_url('booking');
                                                    $f_txt = !empty($item->button_text) ? htmlspecialchars($item->button_text) : 'Book Now';
                                                ?>
                                                <h4 class="feature-one__title"><a href="<?= $f_url ?>"><?= htmlspecialchars($item->title) ?></a></h4>
                                                <p class="feature-one__text"><?= htmlspecialchars($item->short_desc) ?></p>
                                                <div class="feature-one__btn-box">
                                                    <a class="thm-btn" href="<?= $f_url ?>"><?= $f_txt ?>
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
        <section class="about-one" id="about">
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
                                    <a class="thm-btn" href="<?= website_url('about') ?>">More About Us
                                        <span class="fas fa-arrow-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About One End -->

        <!--Services One Start -->
        <section class="services-one" id="services">
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
                                    <a class="thm-btn" href="<?= website_url('services') ?>">View all Services
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
                                $svc_url = website_url('service/' . $svc->slug);
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
        <section class="appointment-one" id="booking">
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
                                        <p class="section-title__tagline">Our Booking</p>
                                        <div class="section-title__tagline-shape"></div>
                                    </div>
                                    <h2 class="section-title__title title-animation">Make an Appointment Today !</h2>
                                </div>
                                <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success d-flex align-items-start gap-3 p-3 mb-4 rounded-3 shadow text-start" style="background: rgba(34, 197, 94, 0.2); background-color: #1a3826; border: 1.5px solid #22c55e; color: #ffffff;" role="alert">
                                        <i class="fas fa-check-circle fs-3 text-success mt-1"></i>
                                        <div>
                                            <h5 class="fw-bold mb-1 text-white">Booking Confirmed!</h5>
                                            <p class="mb-0 text-white fs-14px"><?= $this->session->flashdata('success') ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger d-flex align-items-center gap-2 p-3 mb-4 rounded-3 shadow text-start" style="background: rgba(239, 68, 68, 0.2); background-color: #3b1818; border: 1.5px solid #ef4444; color: #ffffff;" role="alert">
                                        <i class="fas fa-circle-exclamation fs-4 text-danger"></i>
                                        <div class="text-white fs-14px"><?= $this->session->flashdata('error') ?></div>
                                    </div>
                                <?php endif; ?>
                                <form class="contact-form-validated appointment-one__form"
                                    action="<?= website_url('booking/quick_submit') ?>" method="post">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="appointment-one__input-box">
                                                <input type="text" name="name" placeholder="Full Name *" required="" aria-required="true">
                                                <div class="appointment-one__input-box-icon">
                                                    <span class="icon-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="appointment-one__input-box">
                                                <input type="email" name="email" placeholder="Your Email *" required="" aria-required="true">
                                                <div class="appointment-one__input-box-icon">
                                                    <span class="icon-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="appointment-one__input-box">
                                                <input type="text" name="phone" placeholder="Phone Number *" required="" aria-required="true">
                                                <div class="appointment-one__input-box-icon">
                                                    <span class="icon-telephone"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="appointment-one__input-box">
                                                <input type="text" placeholder="Select Date *" name="date" id="datepicker" class="form-control" required="" aria-required="true" autocomplete="off" readonly="readonly" style="cursor: pointer; background: #fff;" onclick="if(window.jQuery&&$(this).datepicker){$(this).datepicker('show');}">
                                                <div class="appointment-one__input-box-icon" style="pointer-events: none; cursor: pointer;">
                                                    <span class="icon-calendar"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="appointment-one__input-box">
                                                <div class="select-box">
                                                    <select class="selectmenu wide" name="service" required="" aria-required="true">
                                                        <option value="" disabled selected="selected">Select Service *</option>
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
                                                <textarea name="message" placeholder="Your Message *" required="" aria-required="true"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="appointment-one__btn-box">
                                                <button type="submit" class="thm-btn">
                                                    Book Now
                                                    <span class="fas fa-arrow-right"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result mt-3"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Appointment One End-->

        
        <!--Faq One Start-->
        <section class="faq-one" id="faq">
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
        <section class="blog-one" id="blog">
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
                            $blog_url = website_url('blog/' . $blog->slug);
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

        <!-- Online Booking Form AJAX Handler & Feedback Messages -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var bookingForm = document.querySelector('.appointment-one__form');
            if (bookingForm) {
                bookingForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    var resultBox = bookingForm.querySelector('.result');
                    var submitBtn = bookingForm.querySelector('button[type="submit"]');
                    var origBtnHtml = submitBtn.innerHTML;

                    if (resultBox) resultBox.innerHTML = '';
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Booking Your Visit...';

                    var formData = new FormData(bookingForm);
                    formData.append('is_ajax', '1');

                    fetch(bookingForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(function(res) {
                        return res.json().then(function(data) {
                            return { ok: res.ok, data: data };
                        }).catch(function() {
                            return res.text().then(function(text) {
                                return { ok: res.ok, data: { message: text } };
                            });
                        });
                    })
                    .then(function(res) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = origBtnHtml;

                        if (res.ok && res.data.status !== 'error') {
                            if (resultBox) {
                                resultBox.innerHTML = `
                                    <div class="alert alert-success d-flex align-items-start gap-3 p-3 mt-3 rounded-3 shadow text-start" style="background: rgba(34, 197, 94, 0.2); background-color: #1a3826; border: 1.5px solid #22c55e; color: #ffffff;" role="alert">
                                        <i class="fas fa-check-circle fs-3 text-success mt-1"></i>
                                        <div>
                                            <h5 class="fw-bold mb-1 text-white">Booking Confirmed!</h5>
                                            <p class="mb-0 text-white fs-14px">${res.data.message}</p>
                                        </div>
                                    </div>`;
                                resultBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }
                            bookingForm.reset();
                            var fpElem = document.querySelector('#datepicker');
                            if (fpElem) {
                                if (fpElem._flatpickr) {
                                    fpElem._flatpickr.setDate(new Date());
                                } else if (window.jQuery && $(fpElem).datepicker) {
                                    $(fpElem).datepicker('setDate', new Date());
                                }
                            }
                        } else {
                            var errText = (res.data && res.data.message) ? res.data.message : 'Something went wrong. Please check your information and try again.';
                            if (resultBox) {
                                resultBox.innerHTML = `
                                    <div class="alert alert-danger d-flex align-items-center gap-2 p-3 mt-3 rounded-3 shadow text-start" style="background: rgba(239, 68, 68, 0.2); background-color: #3b1818; border: 1.5px solid #ef4444; color: #ffffff;" role="alert">
                                        <i class="fas fa-circle-exclamation fs-4 text-danger"></i>
                                        <div class="text-white fs-14px">${errText}</div>
                                    </div>`;
                            }
                        }
                    })
                    .catch(function(err) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = origBtnHtml;
                        if (resultBox) {
                            resultBox.innerHTML = `
                                <div class="alert alert-danger d-flex align-items-center gap-2 p-3 mt-3 rounded-3 shadow text-start" style="background: rgba(239, 68, 68, 0.2); background-color: #3b1818; border: 1.5px solid #ef4444; color: #ffffff;" role="alert">
                                    <i class="fas fa-circle-exclamation fs-4 text-danger"></i>
                                    <div class="text-white fs-14px">Network connection error. Please try again.</div>
                                </div>`;
                        }
                    });
                });
            }

            <?php if ($this->session->flashdata('success') || $this->session->flashdata('error')): ?>
            var bookingSection = document.querySelector('.appointment-one__form-box') || document.querySelector('.appointment-one__form');
            if (bookingSection) {
                bookingSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            <?php endif; ?>
        });
        </script>
