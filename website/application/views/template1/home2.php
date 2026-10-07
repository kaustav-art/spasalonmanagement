<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($asset_url)) {
    $asset_url = base_url('assets/template1/');
}

$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$site_logo = $site_logo_url;

$site_fav_url = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');
$site_fav = $site_fav_url;
$business_phone = !empty($business_phone) ? $business_phone : '+1-123-456-789';

if (!isset($tpl_services)) {
    $CI =& get_instance();
    $CI->load->model('Template_model');
    $tpl_services = $CI->Template_model->get_services('template1');
}

$get_svc_url = function($slug_or_title) use ($tpl_services) {
    $slug = $slug_or_title;
    if (!empty($tpl_services)) {
        foreach ($tpl_services as $ts) {
            if ((!empty($ts->slug) && $ts->slug === $slug_or_title) || 
                (!empty($ts->title) && strtolower(trim($ts->title)) === strtolower(trim($slug_or_title)))) {
                $slug = !empty($ts->slug) ? $ts->slug : $slug_or_title;
                break;
            }
        }
    }
    $params = array();
    if (!empty($_GET['preview_tpl'])) {
        $params['preview_tpl'] = $_GET['preview_tpl'];
    }
    if (!empty($_GET['preview_layout'])) {
        $params['preview_layout'] = (int)$_GET['preview_layout'];
    }
    $q = !empty($params) ? ('?' . http_build_query($params)) : '';
    return website_url('service/' . $slug . $q);
};
$biz_name = isset($business_name) && !empty($business_name) ? $business_name : 'Codeulas';
$demo_suffix = !empty($_GET['preview_layout']) ? ' [2nd Demo]' : '';
?>
<!doctype html>
<html class="no-js" lang="en">
   
<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title><?= htmlspecialchars($biz_name . $demo_suffix) ?> – Hairdressers and Hair Salons HTML Template</title>
      <meta name="robots" content="noindex, follow">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
      <link rel="icon" type="image/webp" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
      <link rel="icon" type="image/png" sizes="32x32" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
      <link rel="apple-touch-icon" sizes="180x180" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">      
      <!-- CSS
         ============================================ -->
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/bootstrap.min.css">
      <!-- Fontawesome -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/fontawesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	  <!-- Pbmit Glamr Icon -->
	  <link rel="stylesheet" href="<?= $asset_url ?>fonts/pbmit-glamr-icon/pbmit_glamr.css">
      <!-- Base Icons -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/pbminfotech-base-icons.css">
      <!-- Themify Icons -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/themify-icons.css">
      <!-- Slick -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/swiper.min.css">
      <!-- Magnific -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/magnific-popup.css">
      <!-- AOS -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/aos.css">
      <!-- Shortcode CSS -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/shortcode.css">
      <!-- Base CSS -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/base.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/responsive.css">

   </head>
   <body>

<style>
.pbmit-header-style-2 .pbmit-header-menu-area .pbmit-logo-area {
    margin-left: 0 !important;
    margin-right: 40px !important;
}
</style>

	<!-- page wrapper -->
	<div class="page-wrapper" id="page">
		
        <!-- Header Main Area -->
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
											<a href="<?= website_url('?preview_tpl=template1&preview_layout=2') ?>">
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
													<li class="active"><a href="#page">Home</a></li>
													<li><a href="#about">About</a></li>
													<li><a href="#services">Services</a></li>
													<li><a href="#faq">FAQ</a></li>
													<li><a href="#blog">Blog</a></li>
													<li><a href="#booking">Contact</a></li>
												</ul>
											</div>
										</nav>
									</div>
								</div>
							</div>
							<div class="pbmit-right-box d-flex align-items-center">
								<div class="pbmit-button-box">
									<div class="pbmit-header-button">
										<a href="tel:<?= htmlspecialchars($business_phone) ?>">															
											<span class="pbmit-header-button-text"><?= htmlspecialchars($business_phone) ?></span>			
										</a>
									</div>
								</div>
								<div class="pbmit-button-box-second">
									<a href="#booking" class="pbmit-btn">
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
			<div class="pbmit-slider-area pbmit-slider-two">
				<div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-allow-touch="false" data-arrows="true" data-columns="1" data-margin="0" data-effect="fade">
					<div class="swiper-wrapper">
						<!-- Slide1 -->
						<div class="swiper-slide">
							<div class="pbmit-slider-item">
								<div class="pbmit-slider-bg" style="background-image: url(<?= $asset_url ?>images/banner-slider-img/demo2-slide-1.jpg);"></div>
								<div class="container">
									<div class="pbmit-slider-content text-center">
										<div class="pbmit-heading-subheading text-center">
											<h4 class="pbmit-subtitle transform-right transform-delay-1">Gorgeous Looks, Stunning Looks</h4>
											<h2 class="pbmit-title transform-center transform-delay-2">Extend The Dream<br> Glow Supreme</h2>
										</div>
										<div class="pbmit-button">
											<div class="transform-top transform-delay-3">
												<a href="#booking" class="pbmit-btn white">
													<span class="pbmit-button-content-wrapper">
														<span class="pbmit-button-text-wrap">
															<span class="pbmit-button-text">
																<span>Book Now</span>
															</span>
														</span>
													</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Slide2 -->
						<div class="swiper-slide">
							<div class="pbmit-slider-item">
								<div class="pbmit-slider-bg" style="background-image: url(<?= $asset_url ?>images/banner-slider-img/demo2-slide-2.jpg);"></div>
								<div class="container">
									<div class="pbmit-slider-content text-center">
										<div class="pbmit-heading-subheading text-center">
											<h4 class="pbmit-subtitle transform-right transform-delay-1">Smooth Styles, Radiant Smiles</h4>
											<h2 class="pbmit-title transform-center transform-delay-2">Rise In Beauty<br> Rule In Confidence</h2>
										</div>
										<div class="pbmit-button">
											<div class="transform-top transform-delay-3">
												<a href="#booking" class="pbmit-btn white">
													<span class="pbmit-button-content-wrapper">
														<span class="pbmit-button-text-wrap">
															<span class="pbmit-button-text">
																<span>Book Now</span>
															</span>
														</span>
													</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Slide3 -->
						<div class="swiper-slide">
							<div class="pbmit-slider-item">
								<div class="pbmit-slider-bg" style="background-image: url(<?= $asset_url ?>images/banner-slider-img/demo2-slide-3.jpg);"></div>
								<div class="container">
									<div class="pbmit-slider-content text-center">
										<div class="pbmit-heading-subheading text-center">
											<h4 class="pbmit-subtitle transform-right transform-delay-1">Glossy Hair, Glamour Flair</h4>
											<h2 class="pbmit-title transform-center transform-delay-2">Elevate Your Style<br> Radiate Power</h2>
										</div>
										<div class="pbmit-button">
											<div class="transform-top transform-delay-3">
												<a href="#booking" class="pbmit-btn white">
													<span class="pbmit-button-content-wrapper">
														<span class="pbmit-button-text-wrap">
															<span class="pbmit-button-text">
																<span>Book Now</span>
															</span>
														</span>
													</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
        <!-- Header Main Area End Here -->

        <!-- Page Content -->
        <div class="page-content">

			<!-- About Start --> 
            <section class="about-section-two" id="about">
				<div class="container">
					<div class="row">
						<div class="col-md-4 pbmit-left-col full-width-1200" data-aos="fade-up" data-aos-duration="800">
							<div class="about-img-left">
								<?php $about_img1 = get_tpl_setting('template1', 2, 'about', 'about_image_1', 'assets/template1/images/demo-2/about-img-1.jpg'); ?>
								<img src="<?= (strpos($about_img1, 'http') === 0) ? $about_img1 : base_url(ltrim($about_img1, '/')) ?>" class="img-fluid" alt="About Us">
							</div>
						</div>
						<div class="col-md-8 pbmit-right-col full-width-1200">
							<div class="pbmit-heading-subheading">
								<h4 class="pbmit-subtitle"><?= htmlspecialchars(get_tpl_setting('template1', 2, 'about', 'about_tagline', 'about us')) ?></h4>
								<h2 class="pbmit-title"><?= nl2br(get_tpl_setting('template1', 2, 'about', 'about_title', "We take great pride <br> in our craft")) ?></h2>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p><?= nl2br(get_tpl_setting('template1', 2, 'about', 'about_desc', "Tired of spending endless hours searching for the right stylists? We understand the challenges hair salon owners face.\n\nOur personalized hiring and onboarding solutions make building your dream salon team effortless.")) ?></p>
									<ul class="list-group mb-5">
										<li class="list-group-item">
											<span class="pbmit-icon-list-icon">
												<i class="pbmit-glamr-icon pbmit-glamr-icon-check"></i>					
											</span>
											<span class="pbmit-icon-list-text">We match top stylists to your salon needs.</span>
										</li>
										<li class="list-group-item">
											<span class="pbmit-icon-list-icon">
												<i class="pbmit-glamr-icon pbmit-glamr-icon-check"></i>				
											</span>
											<span class="pbmit-icon-list-text">We train new team to shine from day one.</span>
										</li>
									</ul>
									<a href="<?= website_url('about') ?>" class="pbmit-btn">
										<span class="pbmit-button-text">Read More</span>
									</a>
								</div>
								<div class="col-md-6">
									<div class="text-md-end text-center pt-md-0 pt-5" data-aos="fade-down" data-aos-duration="800">
										<?php $about_img2 = get_tpl_setting('template1', 2, 'about', 'about_image_2', 'assets/template1/images/demo-2/about-img-2.jpg'); ?>
										<img src="<?= (strpos($about_img2, 'http') === 0) ? $about_img2 : base_url(ltrim($about_img2, '/')) ?>" class="img-fluid" alt="About Us">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </section>
            <!-- About End -->


			<!-- Video Start --> 
			<section class="video-section-one animation animated fade">
				<div class="container">
					<div>
						<video autoplay muted playsinline loop src="https://glamr-demo.pbminfotech.com/live-demo/images/barber.mp4"></video>
					</div>
					<div class="rating-summary">
						<div class="mb-3"><img src="<?= $asset_url ?>images/demo-1/rating-star.png" alt=""></div>
						<div class="row align-items-center">
							<div class="col-md-8 col-xl-6">
								<div class="pbmit-custom-title">
									<h2>“You won’t find a better <br> hair salon in Los Angeles.”</h2>
								</div>
							</div>
							<div class="col-md-4 col-xl-6 text-md-end mt-md-0 mt-3 mb-md-0 mb-5">
								<a href="#" class="pbmit-btn">
									<span class="pbmit-button-text">Appointment</span>
								</a>
							</div>
						</div>
						<div class="rating-desc">
							4.8 rating based on 1000+ reviews
						</div>
					</div>
				</div>
			</section>
			<!-- Video End -->

			<!-- Service Start -->
			<section class="section-xxl pbmit-element-service-style-2 animation animated fade" id="services">
				<div class="container">
					<div class="pbmit-heading-subheading row align-items-center mb-5">
						<div class="col-md-4">
							<h4 class="pbmit-subtitle"><?= htmlspecialchars(get_tpl_setting('template1', 2, 'services_header', 'tagline', 'Our Services')) ?></h4>
						</div>
						<div class="col-md-8 d-flex flex-wrap justify-content-between align-items-center gap-3">
							<h2 class="pbmit-title ms-md-4 mb-0"><?= nl2br(get_tpl_setting('template1', 2, 'services_header', 'title', 'Exclusive Hair Service')) ?></h2>
							<a href="<?= website_url('services?preview_layout=2') ?>" class="pbmit-btn ms-auto">
								<span class="pbmit-button-text">Go to all services</span>
							</a>
						</div>
					</div>
					<div class="pbmit-main-hover-faded">
						<div class="swiper-hover-slide-images col-md-4">
							<div class="swiper-slider pbmit-hover-image-faded">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<a href="<?= $get_svc_url('hair-styling') ?>"><img src="<?= $asset_url ?>images/demo-2/service/service-img-01.jpg" class="img-fluid" alt="service-img-01"></a>
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<a href="<?= $get_svc_url('hair-extensions') ?>"><img src="<?= $asset_url ?>images/demo-2/service/service-img-02.jpg" class="img-fluid" alt="service-img-02"></a>
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<a href="<?= $get_svc_url('custom-hair-spa') ?>"><img src="<?= $asset_url ?>images/demo-2/service/service-img-03.jpg" class="img-fluid" alt="service-img-03"></a>
											</div>
										</div>
									</div>
									<div class="swiper-slide swiper-slide-next">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<a href="<?= $get_svc_url('hair-treatments') ?>"><img src="<?= $asset_url ?>images/demo-2/service/service-img-04.jpg" class="img-fluid" alt="service-img-04"></a>
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<a href="<?= $get_svc_url('hair-straightening') ?>"><img src="<?= $asset_url ?>images/demo-2/service/service-img-05.jpg" class="img-fluid" alt="service-img-05"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-hover-slide-desc">
								<div class="swiper-slider pbmit-short-description">
									<div class="swiper-wrapper">
										<div class="swiper-slide pbmit-service-icon-wraper">
											<span class="pbmit-service-icon-inner">
												<i aria-hidden="true" class="pbmit-glamr-icon pbmit-glamr-icon-hair-styling"></i>												
											</span>
											<div class="pbmit-desc">
												<p>Safety Precautions are taken in Hair Salon If you’re one of those people thinking about visiting a hair salon but feeling unsure about where to start, keep reading. While every hair salon may offer a unique experience, many provide similar core services like haircuts, treatments, and styling, all with safety and hygiene as a top […]</p>
											</div>
										</div>
										<div class="swiper-slide pbmit-service-icon-wraper">
											<span class="pbmit-service-icon-inner">
												<i aria-hidden="true" class="pbmit-glamr-icon pbmit-glamr-icon-hair-washing"></i>												
											</span>
											<div class="pbmit-desc">
												<p>Safety Precautions are taken in Hair Salon If you’re one of those people thinking about visiting a hair salon but feeling unsure about where to start, keep reading. While every hair salon may offer a unique experience, many provide similar core services like haircuts, treatments, and styling, all with safety and hygiene as a top […]</p>
											</div>
										</div>
										<div class="swiper-slide pbmit-service-icon-wraper">
											<span class="pbmit-service-icon-inner">
												<i aria-hidden="true" class="pbmit-glamr-icon pbmit-glamr-icon-hair-washing-1"></i>												
											</span>
											<div class="pbmit-desc">
												<p>Safety Precautions are taken in Hair Salon If you’re one of those people thinking about visiting a hair salon but feeling unsure about where to start, keep reading. While every hair salon may offer a unique experience, many provide similar core services like haircuts, treatments, and styling, all with safety and hygiene as a top […]</p>
											</div>
										</div>
										<div class="swiper-slide pbmit-service-icon-wraper">
											<span class="pbmit-service-icon-inner">
												<i aria-hidden="true" class="pbmit-glamr-icon pbmit-glamr-icon-stylist"></i>												
											</span>
											<div class="pbmit-desc">
												<p>Safety Precautions are taken in Hair Salon If you’re one of those people thinking about visiting a hair salon but feeling unsure about where to start, keep reading. While every hair salon may offer a unique experience, many provide similar core services like haircuts, treatments, and styling, all with safety and hygiene as a top […]</p>
											</div>
										</div>
										<div class="swiper-slide pbmit-service-icon-wraper">
											<span class="pbmit-service-icon-inner">
												<i aria-hidden="true" class="pbmit-glamr-icon pbmit-glamr-icon-hair-straightener-1"></i>												
											</span>
											<div class="pbmit-desc">
												<p>Safety Precautions are taken in Hair Salon If you’re one of those people thinking about visiting a hair salon but feeling unsure about where to start, keep reading. While every hair salon may offer a unique experience, many provide similar core services like haircuts, treatments, and styling, all with safety and hygiene as a top […]</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-hover-slide-nav col-md-8">
							<ul class="pbmit-hover-inner">
								<li class="pbmit-service-heading" style="cursor: pointer;" onclick="if(!event.target.closest('a')) { window.location.href='<?= $get_svc_url('hair-styling') ?>'; }">
									<span class="pbmit-content-box d-flex">
										<span class="pbminfotech-box-number">01.</span>
										<span class="pbmit-title-box d-flex">
											<span class="pbmit-service-title">
												<a href="<?= $get_svc_url('hair-styling') ?>">Hair Styling</a>
											</span>
										</span>
										<span class="pbmit-service-btn-wrapper">
											<a class="pbmit-service-btn" href="<?= $get_svc_url('hair-styling') ?>" title="Go to Hair Styling">
												<span class="pbmit-button-icon"></span>
											</a>
										</span>
									</span>
								</li>
								<li class="pbmit-service-heading" style="cursor: pointer;" onclick="if(!event.target.closest('a')) { window.location.href='<?= $get_svc_url('hair-extensions') ?>'; }">
									<span class="pbmit-content-box d-flex">
										<span class="pbminfotech-box-number">02.</span>
										<span class="pbmit-title-box d-flex">
											<span class="pbmit-service-title">
												<a href="<?= $get_svc_url('hair-extensions') ?>">Hair Extensions</a>
											</span>
										</span>
										<span class="pbmit-service-btn-wrapper">
											<a class="pbmit-service-btn" href="<?= $get_svc_url('hair-extensions') ?>" title="Go to Hair Extensions">
												<span class="pbmit-button-icon"></span>
											</a>
										</span>
									</span>
								</li>
								<li class="pbmit-service-heading pbmit-active" style="cursor: pointer;" onclick="if(!event.target.closest('a')) { window.location.href='<?= $get_svc_url('custom-hair-spa') ?>'; }">
									<span class="pbmit-content-box d-flex">
										<span class="pbminfotech-box-number">03.</span>
										<span class="pbmit-title-box d-flex">
											<span class="pbmit-service-title">
												<a href="<?= $get_svc_url('custom-hair-spa') ?>">Custom Hair Spa</a>
											</span>
										</span>
										<span class="pbmit-service-btn-wrapper">
											<a class="pbmit-service-btn" href="<?= $get_svc_url('custom-hair-spa') ?>" title="Go to Custom Hair Spa">
												<span class="pbmit-button-icon"></span>
											</a>
										</span>
									</span>
								</li>
								<li class="pbmit-service-heading" style="cursor: pointer;" onclick="if(!event.target.closest('a')) { window.location.href='<?= $get_svc_url('hair-treatments') ?>'; }">
									<span class="pbmit-content-box d-flex">
										<span class="pbminfotech-box-number">04.</span>
										<span class="pbmit-title-box d-flex">
											<span class="pbmit-service-title">
												<a href="<?= $get_svc_url('hair-treatments') ?>">Hair Treatments</a>
											</span>
										</span>
										<span class="pbmit-service-btn-wrapper">
											<a class="pbmit-service-btn" href="<?= $get_svc_url('hair-treatments') ?>" title="Go to Hair Treatments">
												<span class="pbmit-button-icon"></span>
											</a>
										</span>
									</span>
								</li>
								<li class="pbmit-service-heading" style="cursor: pointer;" onclick="if(!event.target.closest('a')) { window.location.href='<?= $get_svc_url('hair-straightening') ?>'; }">
									<span class="pbmit-content-box d-flex">
										<span class="pbminfotech-box-number">05.</span>
										<span class="pbmit-title-box d-flex">
											<span class="pbmit-service-title">
												<a href="<?= $get_svc_url('hair-straightening') ?>">Hair Straightening</a>
											</span>
										</span>
										<span class="pbmit-service-btn-wrapper">
											<a class="pbmit-service-btn" href="<?= $get_svc_url('hair-straightening') ?>" title="Go to Hair Straightening">
												<span class="pbmit-button-icon"></span>
											</a>
										</span>
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- Service End -->

			<!-- Fid start -->
			<section class="animation animated fade">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-xl-3">
							<div class="pbminfotech-ele-fid-style-2">
								<div class="pbmit-fld-contents">
									<div class="pbmit-fld-wrap">
										<span class="pbmit-fid-title">Haircuts per week</span>
										<h4 class="pbmit-fid-inner">
											<span class="pbmit-fid-before"></span>
											<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="438" data-interval="50" data-before="" data-before-style="" data-after="" data-after-style="">438</span>
											<span class="pbmit-fid"><span>+</span></span>
										</h4>
									</div>
								</div>		
							</div>
						</div>
						<div class="col-md-6 col-xl-3 col-xl-3 mt-md-0 mt-4">
							<div class="pbminfotech-ele-fid-style-2">
								<div class="pbmit-fld-contents">
									<div class="pbmit-fld-wrap">
										<span class="pbmit-fid-title">Stylization per week</span>
										<h4 class="pbmit-fid-inner">
											<span class="pbmit-fid-before"></span>
											<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="334" data-interval="50" data-before="" data-before-style="" data-after="" data-after-style="">334</span>
											<span class="pbmit-fid"><span>+</span></span>
										</h4>
									</div>
								</div>		
							</div>
						</div>
						<div class="col-md-6 col-xl-3 col-xl-3 mt-xl-0 mt-4">
							<div class="pbminfotech-ele-fid-style-2">
								<div class="pbmit-fld-contents">
									<div class="pbmit-fld-wrap">
										<span class="pbmit-fid-title">Washing per week</span>
										<h4 class="pbmit-fid-inner">
											<span class="pbmit-fid-before"></span>
											<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="325" data-interval="50" data-before="" data-before-style="" data-after="" data-after-style="">325</span>
											<span class="pbmit-fid"><span>+</span></span>
										</h4>
									</div>
								</div>		
							</div>
						</div>
						<div class="col-md-6 col-xl-3 col-xl-3 mt-xl-0 mt-4">
							<div class="pbminfotech-ele-fid-style-2">
								<div class="pbmit-fld-contents">
									<div class="pbmit-fld-wrap">
										<span class="pbmit-fid-title">Hair Spa per week</span>
										<h4 class="pbmit-fid-inner">
											<span class="pbmit-fid-before"></span>
											<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="428" data-interval="50" data-before="" data-before-style="" data-after="" data-after-style="">428</span>
											<span class="pbmit-fid"><span>+</span></span>
										</h4>
									</div>
								</div>		
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Fid End -->
 

			<!-- Marquee Start -->
			<section class="pbmit-bg-color-global py-md-3 py-2 animation animated fade">
				<div class="container-fluid p-0">
					<div class="swiper-slider marquee">
						<div class="swiper-wrapper">
							<!-- Slide1 -->
							<article class="pbmit-marquee-effect-style-1 swiper-slide">
								<div class="pbmit-tag-wrapper">
									<h2 class="pbmit-element-title" data-text="Head Massage">
										Head Massage
									</h2>
								</div>
							</article>
							<!-- Slide2 -->
							<article class="pbmit-marquee-effect-style-1 swiper-slide">
								<div class="pbmit-tag-wrapper">
									<h2 class="pbmit-element-title" data-text="Hair Treatment">
										Hair Treatment
									</h2>
								</div>
							</article>
							<!-- Slide3 -->
							<article class="pbmit-marquee-effect-style-1 swiper-slide">
								<div class="pbmit-tag-wrapper">
									<h2 class="pbmit-element-title" data-text="Hair Styling">
										Hair Styling
									</h2>
								</div>
							</article>
							<!-- Slide4 -->
							<article class="pbmit-marquee-effect-style-1 swiper-slide">
								<div class="pbmit-tag-wrapper">
									<h2 class="pbmit-element-title" data-text="Haircuts">
										Haircuts
									</h2>
								</div>
							</article>
							<!-- Slide5 -->
							<article class="pbmit-marquee-effect-style-1 swiper-slide">
								<div class="pbmit-tag-wrapper">
									<h2 class="pbmit-element-title" data-text="Grooming & Styling">
										Grooming & Styling
									</h2>
								</div>
							</article>
							<!-- Slide6 -->
							<article class="pbmit-marquee-effect-style-1 swiper-slide">
								<div class="pbmit-tag-wrapper">
									<h2 class="pbmit-element-title" data-text="Hair Color">
										Hair Color
									</h2>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section>
			<!-- Marquee Start -->

			<!-- Testimonial start -->
			<section class="testimonial-section-one" id="testimonials">
				<div class="container">
					<div class="pbmit-heading-subheading text-center">
						<h4 class="pbmit-subtitle"><?= htmlspecialchars(get_tpl_setting('template1', 2, 'testimonials_header', 'tagline', 'Our clients')) ?></h4>
						<h2 class="pbmit-title"><?= nl2br(get_tpl_setting('template1', 2, 'testimonials_header', 'title', 'Reviews')) ?></h2>
					</div>
					<div class="swiper-slider" data-autoplay="true" data-allow-touch="true" data-loop="true" data-dots="false" data-arrows="true" data-columns="1" data-margin="30" data-effect="slide">
						<div class="swiper-wrapper">
							<?php if (!empty($tpl_testimonials)): ?>
								<?php foreach ($tpl_testimonials as $t_item): 
									$t_avatar = !empty($t_item->avatar) ? ((strpos($t_item->avatar, 'http') === 0) ? $t_item->avatar : base_url(ltrim($t_item->avatar, '/'))) : ($asset_url . 'images/demo-1/testimonial/tesimonial-01.jpg');
									$t_rating = max(1, min(5, (int)($t_item->rating ?: 5)));
								?>
								<article class="pbmit-testimonial-style-2 swiper-slide">
									<div class="pbminfotech-post-item">
										<div class="pbmit-box-content-wrap">
											<div class="pbminfotech-box-star-ratings">
												<?php for ($r = 0; $r < $t_rating; $r++): ?>
													<i class="pbmit-base-icon-star-1 pbmit-active"></i>
												<?php endfor; ?>
											</div>
											<div class="pbminfotech-box-desc">
												<blockquote class="pbminfotech-testimonial-text">
													<p>“<?= htmlspecialchars($t_item->review) ?>”</p>
												</blockquote>
											</div>
											<div class="pbminfotech-box-author">
												<div class="pbminfotech-box-img">
													<div class="pbmit-featured-img-wrapper">
														<div class="pbmit-featured-wrapper">
															<img src="<?= htmlspecialchars($t_avatar) ?>" class="img-fluid" alt="<?= htmlspecialchars($t_item->client_name) ?>">
														</div>
													</div>
												</div>
												<div class="pbmit-auther-content">
													<h3 class="pbminfotech-box-title"><?= htmlspecialchars($t_item->client_name) ?></h3>
													<div class="pbminfotech-testimonial-detail"><?= htmlspecialchars($t_item->designation ?: 'Client') ?></div>
												</div>
											</div>
										</div>
									</div>
								</article>
								<?php endforeach; ?>
							<?php else: ?>
								<!-- Slide1 -->
								<article class="pbmit-testimonial-style-2 swiper-slide">
									<div class="pbminfotech-post-item">
										<div class="pbmit-box-content-wrap">
											<div class="pbminfotech-box-star-ratings">
												<i class="pbmit-base-icon-star-1 pbmit-active"></i>
												<i class="pbmit-base-icon-star-1 pbmit-active"></i>
												<i class="pbmit-base-icon-star-1 pbmit-active"></i>
												<i class="pbmit-base-icon-star-1 pbmit-active"></i>
												<i class="pbmit-base-icon-star-1 pbmit-active"></i>
											</div>
											<div class="pbminfotech-box-desc">
												<blockquote class="pbminfotech-testimonial-text">
													<p>“I’ve always wanted a salon that really gets my style. Every time I tried to explain what I wanted, it came out wrong—until I came to Glamr. They nailed the look I was going for, and I walked out feeling like a new person. Thank You”</p>
												</blockquote>
											</div>
											<div class="pbminfotech-box-author">
												<div class="pbminfotech-box-img">
													<div class="pbmit-featured-img-wrapper">
														<div class="pbmit-featured-wrapper">
															<img src="<?= $asset_url ?>images/demo-1/testimonial/tesimonial-01.jpg" class="img-fluid" alt="">
														</div>
													</div>
												</div>
												<div class="pbmit-auther-content">
													<h3 class="pbminfotech-box-title">Lauren Walsh</h3>
													<div class="pbminfotech-testimonial-detail">Lead Supervisor</div>
												</div>
											</div>
										</div>
									</div>
								</article>
								<!-- Slide2 -->
								<article class="pbmit-testimonial-style-2 swiper-slide">
									<div class="pbminfotech-post-item">
										<div class="pbmit-box-content-wrap">
											<div class="pbminfotech-box-star-ratings">
												<i class="pbmit-base-icon-star-1 pbmit-active"></i>
												<i class="pbmit-base-icon-star-1 pbmit-active"></i>
												<i class="pbmit-base-icon-star-1 pbmit-active"></i>
												<i class="pbmit-base-icon-star-1 pbmit-active"></i>
												<i class="pbmit-base-icon-star-1 pbmit-active"></i>
											</div>
											<div class="pbminfotech-box-desc">
												<blockquote class="pbminfotech-testimonial-text">
													<p>“My hair was feeling rough &amp; dry from all the heat styling. I tried a treatment at Glamr and the difference was amazing. My hair feels healthier, looks shinier, and I’m getting compliments left and right. I’m definitely coming back for regular.”</p>
												</blockquote>
											</div>
											<div class="pbminfotech-box-author">
												<div class="pbminfotech-box-img">
													<div class="pbmit-featured-img-wrapper">
														<div class="pbmit-featured-wrapper">
															<img src="<?= $asset_url ?>images/demo-1/testimonial/tesimonial-02.jpg" class="img-fluid" alt="">
														</div>
													</div>
												</div>
												<div class="pbmit-auther-content">
													<h3 class="pbminfotech-box-title">Jennifer Taylor</h3>
													<div class="pbminfotech-testimonial-detail">Manager</div>
												</div>
											</div>
										</div>
									</div>
								</article>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
			<!-- Testimonial End -->

			<!-- Faq Start -->
			<section class="section-lg faq-section" id="faq">
				<div class="container">
					<div class="pbmit-heading-subheading text-center">
						<h4 class="pbmit-subtitle"><?= htmlspecialchars(get_tpl_setting('template1', 2, 'faq_header', 'tagline', 'Frequently Asked Questions')) ?></h4>
						<h2 class="pbmit-title"><?= nl2br(get_tpl_setting('template1', 2, 'faq_header', 'title', 'Find Answers to Common Questions')) ?></h2>
					</div>
					<div class="row justify-content-center pt-3">
						<div class="col-lg-10">
							<div class="accordion" id="accordionExample">
								<?php if (!empty($tpl_faqs)): ?>
									<?php $f_idx = 0; foreach ($tpl_faqs as $f_item): $f_idx++; ?>
										<div class="accordion-item <?= $f_idx === 1 ? 'active' : '' ?>">
											<h2 class="accordion-header" id="heading_faq_<?= $f_idx ?>">
												<button class="accordion-button <?= $f_idx === 1 ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_faq_<?= $f_idx ?>" aria-expanded="<?= $f_idx === 1 ? 'true' : 'false' ?>" aria-controls="collapse_faq_<?= $f_idx ?>">
													<span class="pbmit-accordion-title">
														<span>Q<?= $f_idx ?> :</span><?= htmlspecialchars($f_item->question) ?>
													</span>
													<span class="pbmit-accordion-icon">
														<span class="pbmit-accordion-icon-opened">
															<svg aria-hidden="true" class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
														</span>
														<span class="pbmit-accordion-icon-closed">
															<svg aria-hidden="true" class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
														</span>
													</span>
												</button>
											</h2> 
											<div id="collapse_faq_<?= $f_idx ?>" class="accordion-collapse collapse <?= $f_idx === 1 ? 'show' : '' ?>" role="region" aria-labelledby="heading_faq_<?= $f_idx ?>" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<p><?= nl2br(htmlspecialchars($f_item->answer)) ?></p>
												</div>
											</div>                         
										</div>
									<?php endforeach; ?>
								<?php else: ?>
									<div class="accordion-item active">
										<h2 class="accordion-header" id="headingOne">
											<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												<span class="pbmit-accordion-title">
													<span>Q1 :</span>How do I choose the right salon service for my hair or skin?
												</span>
												<span class="pbmit-accordion-icon">
													<span class="pbmit-accordion-icon-opened">
														<svg aria-hidden="true" class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
													</span>
													<span class="pbmit-accordion-icon-closed">
														<svg aria-hidden="true" class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
													</span>
												</span>
											</button>
										</h2> 
										<div id="collapseOne" class="accordion-collapse collapse show" role="region" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<p>We recommend a consultation where our specialists assess your hair or skin type, discuss your goals, and recommend the best treatment tailored just for you.</p>
											</div>
										</div>                         
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Faq End -->

			<!-- Appointment start -->
			<section class="appointment-section-two" id="booking">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-5 appointment-two-left-col" data-aos="fade-up" data-aos-duration="800">
							<div class="pbmit-heading-subheading">
								<h4 class="pbmit-subtitle">What makes us different</h4>
								<h2 class="pbmit-title">Choose your perfect service</h2>
							</div>
						</div>
						<div class="col-md-12 col-xl-7 appointment-two-right-col" data-aos="fade-zoom-in" data-aos-duration="800" data-aos-easing="ease-in-back" data-aos-offset="0">
							<form class="contact-form-validated appointment-one__form" action="<?= website_url('booking/quick_submit') ?>" method="post" novalidate="novalidate">
								<div class="row">
									<div class="col-md-6 mb-3">
										<input type="text" class="form-control" placeholder="Full Name *" name="name" required style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.15); color: #fff; padding: 12px 18px; border-radius: 6px;">
									</div>
									<div class="col-md-6 mb-3">
										<input type="email" class="form-control" placeholder="Your Email *" name="email" required style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.15); color: #fff; padding: 12px 18px; border-radius: 6px;">
									</div>
									<div class="col-md-6 mb-3">
										<input type="tel" class="form-control" placeholder="Phone Number *" name="phone" required style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.15); color: #fff; padding: 12px 18px; border-radius: 6px;">
									</div>
									<div class="col-md-6 mb-3">
										<input type="text" placeholder="Select Date *" name="date" id="datepicker" class="form-control hasDatepicker" required onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.15); color: #fff; padding: 12px 18px; border-radius: 6px;">
									</div>
									<div class="col-md-12 mb-3">
										<select class="form-select" name="service" required style="background: #1e1e1e; border: 1px solid rgba(255,255,255,0.15); color: #fff; padding: 12px 18px; border-radius: 6px;">
											<option value="">Select Service *</option>
											<?php if (!empty($tpl_services)): ?>
												<?php foreach ($tpl_services as $s): ?>
													<option value="<?= htmlspecialchars($s->title) ?>" style="background: #111; color: #fff;"><?= htmlspecialchars($s->title) ?></option>
												<?php endforeach; ?>
											<?php else: ?>
												<option value="Hair Styling" style="background: #111; color: #fff;">Hair Styling</option>
												<option value="Hair Extensions" style="background: #111; color: #fff;">Hair Extensions</option>
												<option value="Custom Hair Spa" style="background: #111; color: #fff;">Custom Hair Spa</option>
												<option value="Hair Treatments" style="background: #111; color: #fff;">Hair Treatments</option>
												<option value="Hair Straightening" style="background: #111; color: #fff;">Hair Straightening</option>
											<?php endif; ?>
										</select>
									</div>
									<div class="col-md-12 mb-3">
										<textarea name="message" cols="40" rows="4" class="form-control" placeholder="Write your message *" required style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.15); color: #fff; padding: 12px 18px; border-radius: 6px;"></textarea>
									</div>
									<div class="col-md-12">
										<button type="submit" class="pbmit-btn">
											<span class="pbmit-button-text">Book Now</span>
											<span class="fas fa-arrow-right ms-2"></span>
										</button>
										<div class="result mt-3"></div>
									</div>	
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- Appointment End -->

			<!-- Blog Start -->
			<section class="blog-section-one animation animated fade" id="blog">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-lg-4">
							<div class="pbmit-heading-subheading">
								<h4 class="pbmit-subtitle"><?= htmlspecialchars(get_tpl_setting('template1', 2, 'blog_header', 'tagline', 'Latest News')) ?></h4>
								<h2 class="pbmit-title"><?= nl2br(get_tpl_setting('template1', 2, 'blog_header', 'title', 'Explore our articles')) ?></h2>
							</div>
							<?php 
								$q_blog_param = !empty($_GET['preview_tpl']) ? '?preview_tpl=' . htmlspecialchars($_GET['preview_tpl']) . '&preview_layout=' . htmlspecialchars($_GET['preview_layout'] ?? 2) : '';
							?>
							<a href="<?= website_url('blog' . $q_blog_param) ?>" class="pbmit-btn">
								<span class="pbmit-button-text">View All Post</span>
							</a>
						</div>
						<div class="col-md-12 col-lg-8">
							<div class="swiper-slider" data-autoplay="false" data-allow-touch="true" data-loop="true" data-dots="false" data-arrows="false" data-columns="2" data-margin="40" data-effect="slide">
								<div class="swiper-wrapper">
									<?php if (!empty($tpl_blogs)): ?>
										<?php foreach ($tpl_blogs as $b_item): 
											$b_thumb = !empty($b_item->thumbnail) ? ((strpos($b_item->thumbnail, 'http') === 0) ? $b_item->thumbnail : base_url(ltrim($b_item->thumbnail, '/'))) : ($asset_url . 'images/demo-1/blog/blog-img-01.jpg');
											$b_ts = !empty($b_item->published_date) ? strtotime($b_item->published_date) : time();
											$b_day = date('d', $b_ts);
											$b_mon = date('M', $b_ts);
											$b_url = website_url('blog/' . ($b_item->slug ?: $b_item->id) . $q_blog_param);
										?>
										<article class="pbmit-blog-style-2 swiper-slide">
											<div class="post-item">
												<div class="pbminfotech-box-content">
													<div class="pbmit-featured-container">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper">
																<a href="<?= $b_url ?>"><img src="<?= htmlspecialchars($b_thumb) ?>" class="img-fluid" alt="<?= htmlspecialchars($b_item->title) ?>"></a>
															</div>
														</div>
														<div class="pbmit-meta-date-wrapper">
															<div class="pbmit-post-date">
																<span class="pbmit-date-number"><?= $b_day ?></span>
																<span class="pbmit-month-text"><?= $b_mon ?></span>
															</div>
														</div>
													</div>
													<div class="pbmit-content-wrapper">
														<div class="pbmit-meta-wraper d-flex align-items-center">
															<div class="pbmit-meta-category pbmit-meta-line">
																<a href="<?= website_url('blog' . $q_blog_param) ?>" rel="category tag"><?= htmlspecialchars(!empty($b_item->tags) ? explode(',', $b_item->tags)[0] : 'Hair Style') ?></a>				
															</div>
															<div class="pbmit-meta-author pbmit-meta-line">
																<?= htmlspecialchars($b_item->author_name ?: 'Alex Joy') ?>				
															</div>
														</div>
														<h3 class="pbmit-post-title">
															<a href="<?= $b_url ?>"><?= htmlspecialchars($b_item->title) ?></a>
														</h3>
													</div>
													<div class="pbmit-blog-button">
														<a class="pbmit-button-inner" href="<?= $b_url ?>" title="<?= htmlspecialchars($b_item->title) ?>">
															<span class="pbmit-button-icon"></span>
														</a>
													</div>
												</div>
											</div>
											<a class="pbmit-link" href="<?= $b_url ?>" title="<?= htmlspecialchars($b_item->title) ?>"></a>
										</article>
										<?php endforeach; ?>
									<?php else: ?>
										<article class="pbmit-blog-style-2 swiper-slide">
											<div class="post-item">
												<div class="pbminfotech-box-content">
													<div class="pbmit-featured-container">
														<div class="pbmit-featured-img-wrapper">
															<div class="pbmit-featured-wrapper">
																<a href="<?= website_url('blog/anti-losing-hair-care-products' . $q_blog_param) ?>"><img src="<?= $asset_url ?>images/demo-1/blog/blog-img-01.jpg" class="img-fluid" alt=""></a>
															</div>
														</div>
														<div class="pbmit-meta-date-wrapper">
															<div class="pbmit-post-date">
																<span class="pbmit-date-number">20</span>
																<span class="pbmit-month-text">Apr</span>
															</div>
														</div>
													</div>
													<div class="pbmit-content-wrapper">
														<div class="pbmit-meta-wraper d-flex align-items-center">
															<div class="pbmit-meta-category pbmit-meta-line">
																<a href="<?= website_url('blog' . $q_blog_param) ?>" rel="category tag">Hair Style</a>				
															</div>
															<div class="pbmit-meta-author pbmit-meta-line">Alex Joy</div>
														</div>
														<h3 class="pbmit-post-title">
															<a href="<?= website_url('blog/anti-losing-hair-care-products' . $q_blog_param) ?>">The most effective anti-losing hair care products</a>
														</h3>
													</div>
													<div class="pbmit-blog-button">
														<a class="pbmit-button-inner" href="<?= website_url('blog/anti-losing-hair-care-products' . $q_blog_param) ?>" title="Go to post">
															<span class="pbmit-button-icon"></span>
														</a>
													</div>
												</div>
											</div>
											<a class="pbmit-link" href="<?= website_url('blog/anti-losing-hair-care-products' . $q_blog_param) ?>" title="Go to post"></a>
										</article>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Blog End -->

        </div>
        <!-- Page Content End -->

        <!-- footer -->
		<footer class="site-footer pbmit-footer-style-1 pbmit-bg-color-blackish">
			<div class="pbmit-footer-widget-area">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-lg-4 pbmit-footer-widget pbmit-footer-widget-col-1">
							<aside class="pbmit-two-column-menu widget">
								<h2 class="widget-title">Our Services</h2>
								<ul class="menu">
									<li><a href="<?= $get_svc_url('hair-extensions') ?>">Hair Extensions</a></li>
									<li><a href="<?= $get_svc_url('hair-styling') ?>">Hair Styling</a></li>
									<li><a href="<?= $get_svc_url('grooming-styling') ?>">Grooming & Styling</a></li>
									<li><a href="<?= $get_svc_url('hair-treatments') ?>">Hair Treatments</a></li>
									<li><a href="<?= $get_svc_url('hair-texture') ?>">Hair Texture</a></li>
									<li><a href="<?= $get_svc_url('hair-coloring') ?>">Hair Coloring</a></li>
									<li><a href="<?= $get_svc_url('hair-straightening') ?>">Hair Straightening</a></li>
									<li><a href="<?= $get_svc_url('custom-hair-spa') ?>">Custom Hair Spa</a></li>
								</ul>
							</aside>
						</div>
						<div class="col-md-6 col-lg-4 pbmit-footer-widget pbmit-footer-widget-col-2">
							<aside class="widget widget-text text-lg-center">
								<div class="pbmit-footer-logo">
									<img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" class="img-fluid" style="max-height: 48px; width: auto; object-fit: contain;">
								</div>
								<p>The <?= htmlspecialchars($biz_name) ?> is a full-service salon and wellness sanctuary that provides specialized rituals and care</p>
								<ul class="pbmit-social-links">
									<li class="pbmit-social-li pbmit-social-facebook">
										<a title="Facebook" href="https://www.facebook.com/" target="_blank">
											<span><i class="pbmit-base-icon-facebook-f"></i></span>
										</a>
									</li>
									<li class="pbmit-social-li pbmit-social-twitter">
										<a title="Twitter" href="https://www.twitter.com/" target="_blank">
											<span><i class="pbmit-base-icon-twitter-2"></i></span>
										</a>
									</li>
									<li class="pbmit-social-li pbmit-social-linkedin">
										<a title="LinkedIn" href="https://www.linkedin.com/" target="_blank">
											<span><i class="pbmit-base-icon-linkedin-in"></i></span>
										</a>
									</li>
									<li class="pbmit-social-li pbmit-social-instagram">
										<a title="Instagram" href="https://www.instagram.com/" target="_blank">
											<span><i class="pbmit-base-icon-instagram"></i></span>
										</a>
									</li>
								</ul>
							</aside>
						</div>
						<div class="col-md-12 col-lg-4 pbmit-footer-widget pbmit-footer-widget-col-3">
							<aside class="widget widget-text">
								<h2 class="widget-title">Our Location</h2>
								<div class="pbmit-timelist-ele-wrapper">
									<div class="pbmit-timelist-wrapper">
										<p class="pbmit-timelist-address">0665 Broadway NY, New York 10001<br> United States of America</p>
										<ul class="pbmit-timelist-list">
											<li>
												<span class="pbmit-timelist-li-title">Working Days</span>
												<span class="pbmit-timelist-time">9AM - 9PM</span>
											</li>
											<li>
												<span class="pbmit-timelist-li-title">Saturday</span>
												<span class="pbmit-timelist-time">10AM - 8PM</span>
											</li>
											<li>
												<span class="pbmit-timelist-li-title">Sunday</span>
												<span class="pbmit-timelist-time">Closed</span>
											</li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
					</div>
				</div>
			</div>
			<div class="pbmit-footer-text-area">
				<div class="container">
					<div class="pbmit-footer-text-inner">
						<div class="row">
							<div class="col-md-6">
								<?php
								$is_prev_ft2 = !empty($_GET['preview_layout']) || !empty($_GET['preview_tpl']);
								$ft_url2 = website_url($is_prev_ft2 ? '?preview_tpl=template1&preview_layout=2' : '');
								?>
								<div class="pbmit-footer-copyright-text-area"> Copyright &copy; <?= date('Y') ?> <a href="<?= $ft_url2 ?>"><?= htmlspecialchars($biz_name) ?></a>, All Rights Reserved.</div>
							</div>
							<div class="col-md-6">
								<div class="pbmit-footer-menu-area">
									<div class="menu-footer-menu-container">
										<ul class="pbmit-footer-menu">
											<li class="menu-item">
												<a href="<?= website_url('about') ?>">Privacy Policy</a>
											</li>
											<li class="menu-item">
												<a href="<?= website_url('contact') ?>">Terms of use</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </footer>
        <!-- footer End -->

    </div>
    <!-- page wrapper End -->

	<!-- Search Box Start Here -->
	<div class="pbmit-header-search-form">
		<div class="pbmit-search-overlay"></div>
		<div class="pbmit-header-search-form-wrapper">
			<div class="pbmit-search-close">
				<svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="28.163" height="28.163" viewBox="0 0 26.163 26.163">
					<rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
					<rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
				</svg>
			</div>
			<form role="search" method="get" class="search-form" action="#">
				<input type="search" id="search-form-686df462a6c62" class="search-field" placeholder="Search …" value="" name="s">
				<button type="submit" class="search-submit " title="Search"></button>
				<div class="pbmit-search-line"></div>
			</form>
		</div>
	</div>
	<!-- Search Box End Here -->

	<!-- Scroll To Top -->
	<div class="pbmit-backtotop">
		<div class="pbmit-arrow">
			<i class="pbmit-base-icon-up-open-big"></i>
		</div>
		<div class="pbmit-hover-arrow">
			<i class="pbmit-base-icon-up-open-big"></i>
		</div>
	</div>
	<!-- Scroll To Top End -->

	<!-- JS
		============================================ -->
	<!-- jQuery JS -->
	<script src="<?= $asset_url ?>js/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="<?= $asset_url ?>js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?= $asset_url ?>js/bootstrap.min.js"></script>
	<!-- jquery Waypoints JS -->
	<script src="<?= $asset_url ?>js/jquery.waypoints.min.js"></script>
	<!-- jquery Appear JS -->
	<script src="<?= $asset_url ?>js/jquery.appear.js"></script>
	<!-- Numinate JS -->
	<script src="<?= $asset_url ?>js/numinate.min.js"></script>
	<!-- Slick JS -->
	<script src="<?= $asset_url ?>js/swiper.min.js"></script>
	<!-- Magnific JS -->
	<script src="<?= $asset_url ?>js/jquery.magnific-popup.min.js"></script>
	<!-- Circle Progress JS -->
	<script src="<?= $asset_url ?>js/circle-progress.js"></script>
	<!-- countdown JS -->
	<script src="<?= $asset_url ?>js/jquery.countdown.min.js"></script> 
	<!-- masonry JS -->
	<script src="<?= $asset_url ?>js/masonry.pkgd.min.js"></script> 
	<!-- AOS -->
	<script src="<?= $asset_url ?>js/aos.js"></script>
	<!-- GSAP -->
	<script src='<?= $asset_url ?>js/gsap.js'></script>
	<!-- Scroll Trigger -->
	<script src='<?= $asset_url ?>js/ScrollTrigger.js'></script>
	<!-- Split Text -->
	<script src='<?= $asset_url ?>js/SplitText.js'></script>
	<!-- Isotope JS -->
	<script src="<?= $asset_url ?>js/isotope.pkgd.min.js"></script>
	<!-- Theia Sticky Sidebar JS -->
	<script src='<?= $asset_url ?>js/theia-sticky-sidebar.js'></script>
	<!-- GSAP Animation -->
	<script src='<?= $asset_url ?>js/gsap-animation.js'></script>
	<!-- Form Validator -->
	<script src="<?= $asset_url ?>js/jquery-validate/jquery.validate.min.js"></script>
	<!-- Scripts JS -->
	<script src="<?= $asset_url ?>js/scripts.js"></script>

   </body>

</html>