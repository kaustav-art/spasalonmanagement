<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($asset_url)) {
    $asset_url = base_url('assets/template1/');
}

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
      <title>Glamr [2nd Demo] – Hairdressers and Hair Salons HTML Template</title>
      <meta name="robots" content="noindex, follow">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
      <link rel="icon" type="image/png" sizes="32x32" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">
      <link rel="apple-touch-icon" sizes="180x180" href="<?= htmlspecialchars($site_fav_url) ?>?v=<?= time() ?>">      
      <!-- CSS
         ============================================ -->
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/bootstrap.min.css">
      <!-- Fontawesome -->
      <link rel="stylesheet" href="<?= $asset_url ?>css/fontawesome.css">
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
								<div class="pbmit-menuarea">
									<div class="site-navigation">
										<nav class="main-navigation pbmit-navbar main-menu navbar-expand-xl navbar-light" id="site-navigation">
											<div class="pbmit-menu-wrap">
												<ul class="navigation clearfix" id="pbmit-top-menu">
													<li class="dropdown active">
														<a href="#">Home</a>
														<ul class="sub-menu">
															<li><a href="<?= website_url('?preview_tpl=template1&preview_layout=1') ?>">Homepage 01</a></li>
															<li class="active"><a href="<?= website_url('?preview_tpl=template1&preview_layout=2') ?>">Homepage 02</a></li>
															<li><a href="<?= website_url('?preview_tpl=template1&preview_layout=3') ?>">Homepage 03</a></li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="#">Pages</a>
														<ul class="sub-menu">
															<li><a href="<?= website_url('about') ?>">About Us</a></li>
															<li><a href="#">Our History</a></li>
															<li><a href="<?= website_url('team') ?>">Our Team Member</a></li>
															<li><a href="#">Team Member Detail</a></li>
															<li><a href="#">Faq</a></li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="#">Services</a>
														<ul class="sub-menu">
															<li><a href="<?= website_url('services') ?>">Services</a></li>
															<li><a href="#">Service Detail</a></li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="#">Portfolio</a>
														<ul class="sub-menu">
															<li class="dropdown">
																<a href="#">Masonry View</a>
																<ul>
																	<li><a href="#">Grid Col 2</a></li>
																	<li><a href="#">Grid Col 3</a></li>
																	<li><a href="#">Grid Col 4</a></li>
																	<li><a href="#">Grid Wide</a></li>
																</ul>
															</li>
															<li class="dropdown">
																<a href="#">Grid View</a>
																<ul>
																	<li><a href="#">Grid Col 2</a></li>
																	<li><a href="#">Grid Col 3</a></li>
																	<li><a href="#">Grid Col 4</a></li>
																	<li><a href="#">Grid No Gap</a></li>
																</ul>
															</li>
															<li class="dropdown">
																<a href="#">Sortable View</a>
																<ul>
																	<li><a href="#">Grid Col 2</a></li>
																	<li><a href="#">Grid Col 3</a></li>
																	<li><a href="#">Grid Col 4</a></li>
																</ul>
															</li>
															<li class="dropdown">
																<a href="#">Single Detail Style</a>
																<ul>
																	<li><a href="#">Portfolio Detail Style 1</a></li>
																	<li><a href="#">Portfolio Detail Style 2</a></li>
																</ul>
															</li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="#">Blog</a>
														<ul class="sub-menu">
															<li class="dropdown">
																<a href="#">Blog Masonry View</a>
																<ul>
																	<li><a href="#">Grid Col 2</a></li>
																	<li><a href="#">Grid Col 3</a></li>
																	<li><a href="#">Grid Col 4</a></li>
																	<li><a href="#">Masonry Wide</a></li>
																</ul>
															</li>
															<li class="dropdown">
																<a href="#">Blog Grid View</a>
																<ul>
																	<li><a href="#">Grid Col 3</a></li>
																	<li><a href="#">Grid Col 4</a></li>
																	<li><a href="#">Sortable Grid View</a></li>
																</ul>
															</li>
															<li><a href="#">Blog Classic</a></li>
															<li><a href="#">Blog Single Details</a></li>
														</ul>
													</li>
													<li><a href="<?= website_url('contact') ?>">Contact Us</a></li>
												</ul>
											</div>
										</nav>
									</div>
								</div>
								<div class="pbmit-logo-area">
									<div class="site-branding">
										<h1 class="site-title">
											<a href="<?= website_url('?preview_tpl=template1&preview_layout=2') ?>">
												<img class="pbmit-main-logo img-fluid" src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;">
											</a>
										</h1>
									</div>
								</div>
							</div>
							<div class="pbmit-right-box d-flex align-items-center">
								<div class="pbmit-button-box">
									<div class="pbmit-header-button">
										<a href="tel:+1(212)-255-511">															
											<span class="pbmit-header-button-text">+1-123-456-789</span>			
										</a>
									</div>
								</div>
								<div class="pbmit-button-box-second">
									<a href="<?= website_url('contact') ?>" class="pbmit-btn">
										<span class="pbmit-button-text">Get in touch</span>
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
												<a href="<?= website_url('contact') ?>" class="pbmit-btn white">
													<span class="pbmit-button-content-wrapper">
														<span class="pbmit-button-text-wrap">
															<span class="pbmit-button-text">
																<span>Book Appointment</span>
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
												<a href="<?= website_url('contact') ?>" class="pbmit-btn white">
													<span class="pbmit-button-content-wrapper">
														<span class="pbmit-button-text-wrap">
															<span class="pbmit-button-text">
																<span>Book Appointment</span>
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
												<a href="<?= website_url('contact') ?>" class="pbmit-btn white">
													<span class="pbmit-button-content-wrapper">
														<span class="pbmit-button-text-wrap">
															<span class="pbmit-button-text">
																<span>Book Appointment</span>
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
            <section class="about-section-two">
				<div class="container">
					<div class="row">
						<div class="col-md-4 pbmit-left-col full-width-1200" data-aos="fade-up" data-aos-duration="800">
							<div class="about-img-left">
								<img src="<?= $asset_url ?>images/demo-2/about-img-1.jpg" class="img-fluid" alt="">
							</div>
						</div>
						<div class="col-md-8 pbmit-right-col full-width-1200">
							<div class="pbmit-heading-subheading">
								<h4 class="pbmit-subtitle">Every person is an individual</h4>
								<h2 class="pbmit-title">We take great pride <br> in our craft</h2>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>Tired of spending endless hours searching for the right stylists? We understand the challenges hair salon owners face.</p>
									<p class="pb-3">Our personalized hiring and onboarding solutions make building your dream salon team effortless.</p>
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
									<a href="#" class="pbmit-btn">
										<span class="pbmit-button-text">Readmore</span>
									</a>
								</div>
								<div class="col-md-6">
									<div class="text-md-end text-center pt-md-0 pt-5" data-aos="fade-down" data-aos-duration="800">
										<img src="<?= $asset_url ?>images/demo-2/about-img-2.jpg" class="img-fluid" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </section>
            <!-- About End -->

			<!-- Static Box Start --> 
            <section class="static-box-section-two animation animated fade">
				<div class="container-fluid p-0">
					<div class="row">
						<article class="pbmit-static-box-style-1 col-md-6 col-lg-4 col-xl-3">
							<div class="pbmit-staticbox-wrapper">
								<div class="pbmit-img">
									<img src="<?= $asset_url ?>images/demo-2/static-box/static-box-img-01.jpg" class="img-fluid" alt="We love your hair">	
								</div>
								<div class="pbmit-content-box">
									<h4 class="pbmit-static-box-title">We love your hair</h4>
								</div>
							</div>
						</article>
						<article class="pbmit-static-box-style-1 col-md-6 col-lg-4 col-xl-3">
							<div class="pbmit-staticbox-wrapper">
								<div class="pbmit-img">
									<img src="<?= $asset_url ?>images/demo-2/static-box/static-box-img-02.jpg" class="img-fluid" alt="Only natural products">	
								</div>
								<div class="pbmit-content-box">
									<h4 class="pbmit-static-box-title">Only natural products</h4>
								</div>
							</div>
						</article>
						<article class="pbmit-static-box-style-1 col-md-6 col-lg-4 col-xl-3">
							<div class="pbmit-staticbox-wrapper">
								<div class="pbmit-img">
									<img src="<?= $asset_url ?>images/demo-2/static-box/static-box-img-03.jpg" class="img-fluid" alt="Professional  stylists">	
								</div>
								<div class="pbmit-content-box">
									<h4 class="pbmit-static-box-title">Professional  stylists</h4>
								</div>
							</div>
						</article>
						<article class="pbmit-static-box-style-1 col-md-6 col-lg-4 col-xl-3">
							<div class="pbmit-staticbox-wrapper">
								<div class="pbmit-img">
									<img src="<?= $asset_url ?>images/demo-2/static-box/static-box-img-04.jpg" class="img-fluid" alt="Highly qualified specialists">	
								</div>
								<div class="pbmit-content-box">
									<h4 class="pbmit-static-box-title">Highly qualified specialists</h4>
								</div>
							</div>
						</article>
					</div>
				</div>
            </section>
            <!-- Static Box End -->

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
			<section class="section-xxl pbmit-element-service-style-2 animation animated fade">
				<div class="container">
					<div class="pbmit-heading-subheading row">
						<div class="col-md-4">
							<h4 class="pbmit-subtitle">Our Services</h4>
						</div>
						<div class="col-md-8">
							<h2 class="pbmit-title ms-4">Exclusive Hair Service</h2>
						</div>
					</div>
					<div class="pbmit-main-hover-faded">
						<div class="swiper-hover-slide-images col-md-4">
							<div class="swiper-slider pbmit-hover-image-faded">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/service/service-img-01.jpg" class="img-fluid" alt="service-img-01">
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/service/service-img-02.jpg" class="img-fluid" alt="service-img-02">
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/service/service-img-03.jpg" class="img-fluid" alt="service-img-03">
											</div>
										</div>
									</div>
									<div class="swiper-slide swiper-slide-next">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/service/service-img-04.jpg" class="img-fluid" alt="service-img-04">
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/service/service-img-05.jpg" class="img-fluid" alt="service-img-05">
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
								<li class="pbmit-service-heading">
									<span class="pbmit-content-box d-flex">
										<span class="pbminfotech-box-number">01.</span>
										<span class="pbmit-title-box d-flex">
											<span class="pbmit-service-title">
												<a href="#">Hair Styling</a>
											</span>
											<span class="pbmit-service-cat">
												<a href="<?= website_url('services') ?>" rel="tag">Styling</a>
											</span>
										</span>
										<span class="pbmit-service-btn-wrapper">
											<a class="pbmit-service-btn" href="#" title="Go to Hair Styling">
												<span class="pbmit-button-icon"></span>
											</a>
										</span>
									</span>
								</li>
								<li class="pbmit-service-heading">
									<span class="pbmit-content-box d-flex">
										<span class="pbminfotech-box-number">02.</span>
										<span class="pbmit-title-box d-flex">
											<span class="pbmit-service-title">
												<a href="#">Hair Extensions</a>
											</span>
											<span class="pbmit-service-cat">
												<a href="<?= website_url('services') ?>" rel="tag">Extensions</a>
											</span>
										</span>
										<span class="pbmit-service-btn-wrapper">
											<a class="pbmit-service-btn" href="#" title="Go to Hair Extensions">
												<span class="pbmit-button-icon"></span>
											</a>
										</span>
									</span>
								</li>
								<li class="pbmit-service-heading pbmit-active">
									<span class="pbmit-content-box d-flex">
										<span class="pbminfotech-box-number">03.</span>
										<span class="pbmit-title-box d-flex">
											<span class="pbmit-service-title">
												<a href="#">Custom Hair Spa</a>
											</span>
											<span class="pbmit-service-cat">
												<a href="<?= website_url('services') ?>" rel="tag">Hair Care</a>
											</span>
										</span>
										<span class="pbmit-service-btn-wrapper">
											<a class="pbmit-service-btn" href="#" title="Go to Custom Hair Spa">
												<span class="pbmit-button-icon"></span>
											</a>
										</span>
									</span>
								</li>
								<li class="pbmit-service-heading">
									<span class="pbmit-content-box d-flex">
										<span class="pbminfotech-box-number">04.</span>
										<span class="pbmit-title-box d-flex">
											<span class="pbmit-service-title">
												<a href="#">Hair Treatments</a>
											</span>
											<span class="pbmit-service-cat">
												<a href="<?= website_url('services') ?>" rel="tag">Treatments</a>
											</span>
										</span>
										<span class="pbmit-service-btn-wrapper">
											<a class="pbmit-service-btn" href="#" title="Go to Hair Treatments">
												<span class="pbmit-button-icon"></span>
											</a>
										</span>
									</span>
								</li>
								<li class="pbmit-service-heading">
									<span class="pbmit-content-box d-flex">
										<span class="pbminfotech-box-number">05.</span>
										<span class="pbmit-title-box d-flex">
											<span class="pbmit-service-title">
												<a href="#">Hair Straightening</a>
											</span>
											<span class="pbmit-service-cat">
												<a href="<?= website_url('services') ?>" rel="tag">Extensions</a>
											</span>
										</span>
										<span class="pbmit-service-btn-wrapper">
											<a class="pbmit-service-btn" href="#" title="Go to Hair Straightening">
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

			<!-- Book Visit Start --> 
            <section class="book-visit-section section-lgt animation animated fade">
				<div class="container-fluid p-0">
					<div class="row g-0">
						<div class="col-md-6 pbmit-sticky-column">
							<div>
								<img src="<?= $asset_url ?>images/demo-2/about-img-3.jpg" class="img-fluid" alt="">
							</div>
						</div>
						<div class="col-md-6 pbmit-bg-color-blackish book-visit-right-col">
							<div class="pbmit-heading-subheading">
								<h4 class="pbmit-subtitle">Book your visit</h4>
								<h2 class="pbmit-title">Plan to visit? Call us or book a visit!</h2>
								<div class="pbmit-heading-desc">
									We take a personalized approach to every hair appointment. We start by understanding your unique style and preferences. Then, we design a tailored haircut or styling plan to meet your needs. We're with you every step, from consultation to the final snip. Because you deserve a salon experience as unique as you.
								</div>
							</div>
							<div class="effect-img" data-aos="fade-left" data-aos-duration="850">
								<img src="<?= $asset_url ?>images/effect.png" alt="">
							</div>
							<div class="working-hours-box">
								<div class="pbmit-custom-title">
									<h3>Working Hours</h3>
								</div>
								<div class="row pbminfotech-gap-10px">
									<article class="pbmit-miconheading-style-2 col-md-12">
										<div class="pbmit-ihbox-style-2">
											<div class="pbmit-ihbox-headingicon">
												<div class="pbmit-ihbox-contents">
													<h2 class="pbmit-element-title">
														Working Days
													</h2>
													<h4 class="pbmit-element-subtitle">
														9AM - 9PM
													</h4>
												</div>
												<div class="pbmit-heading-desc"></div>
											</div>
										</div>
									</article>
									<article class="pbmit-miconheading-style-2 col-md-12">
										<div class="pbmit-ihbox-style-2">
											<div class="pbmit-ihbox-headingicon">
												<div class="pbmit-ihbox-contents">
													<h2 class="pbmit-element-title">
														Saturday
													</h2>
													<h4 class="pbmit-element-subtitle">
														10AM - 8PM
													</h4>
												</div>
												<div class="pbmit-heading-desc"></div>
											</div>
										</div>
									</article>
									<article class="pbmit-miconheading-style-2 col-md-12">
										<div class="pbmit-ihbox-style-2">
											<div class="pbmit-ihbox-headingicon">
												<div class="pbmit-ihbox-contents">
													<h2 class="pbmit-element-title">
														Sunday
													</h2>
													<h4 class="pbmit-element-subtitle">
														Closed
													</h4>
												</div>
												<div class="pbmit-heading-desc"></div>
											</div>
										</div>
									</article>
								</div>
							</div>
							<div class="pbmit-custom-title">
								<h3>Book Your Visit</h3>
							</div>
							<div class="row pb-5 pt-3">
								<div class="col-md-12 col-xl-6">
									<div class="pbmit-ihbox-style-7">
										<div class="pbmit-ihbox-box">
											<h2 class="pbmit-element-title">Location</h2>
											<div class="pbmit-heading-desc">5th Avenue, E 28th St, Brooklyn New York 2300 USA</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 col-xl-6 mt-xl-0 mt-4">
									<div class="pbmit-ihbox-style-7">
										<div class="pbmit-ihbox-box">
											<h2 class="pbmit-element-title">Contact</h2>
											<div class="pbmit-heading-desc"><a href="mailto:info@glamr.com">info@glamr.com</a> <br> <span>212-308-3838</span></div>
										</div>
									</div>
								</div>
							</div>
							<a href="<?= website_url('contact') ?>" class="pbmit-btn">
								<span class="pbmit-button-text">Book your visit</span>
							</a>
						</div>
					</div>
				</div>
            </section>
            <!-- Book Visit End -->

			<!-- Team Start --> 
			<section class="section-xl team-two animation animated fade">
				<div class="container">
					<div class="pbmit-heading-subheading text-center">
						<h4 class="pbmit-subtitle">Stylish Team</h4>
						<h2 class="pbmit-title">Meet Our Professional</h2>
					</div>
					<div class="swiper-slider" data-autoplay="false" data-allow-touch="true" data-loop="true" data-dots="false" data-arrows="false" data-columns="3" data-margin="40" data-effect="slide">
						<div class="swiper-wrapper">
							<!-- Slide1 -->
							<article class="pbmit-team-style-2 swiper-slide">
								<div class="pbminfotech-post-item">
									<div class="pbminfotech-team-image-box">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/team/team-img-01.jpg" class="img-fluid" alt="team-img-01">
											</div>
										</div>
									</div>
									<div class="pbminfotech-box-content">
										<div class="pbminfotech-box-content-inner">
											<h3 class="pbmit-team-title">
												<a href="#">Dianne Russell</a>
											</h3>
											<div class="pbminfotech-team-position">
												<div class="pbminfotech-box-team-position">Hair Stylist</div>
											</div>
										</div>
										<div class="pbminfotech-box-social-links">
											<ul class="pbmit-social-links pbmit-team-social-links">
												<li class="pbmit-social-li pbmit-social-facebook">
													<a href="#" title="Facebook" target="_blank">
														<span><i class="pbmit-base-icon-facebook-f"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-twitter">
													<a href="#" title="Twitter" target="_blank">
														<span><i class="pbmit-base-icon-twitter-2"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-linkedin">
													<a href="#" title="LinkedIn" target="_blank">
														<span><i class="pbmit-base-icon-linkedin-in"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-instagram">
													<a href="#" title="Instagram" target="_blank">
														<span><i class="pbmit-base-icon-instagram"></i></span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<a class="pbmit-link" href="#" title="Go to Dianne Russell"></a>
								</div>
							</article>
							<!-- Slide2 -->
							<article class="pbmit-team-style-2 swiper-slide">
								<div class="pbminfotech-post-item">
									<div class="pbminfotech-team-image-box">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/team/team-img-02.jpg" class="img-fluid" alt="team-img-01">
											</div>
										</div>
									</div>
									<div class="pbminfotech-box-content">
										<div class="pbminfotech-box-content-inner">
											<h3 class="pbmit-team-title">
												<a href="#">Tracy Wilson</a>
											</h3>
											<div class="pbminfotech-team-position">
												<div class="pbminfotech-box-team-position">Beautician</div>
											</div>
										</div>
										<div class="pbminfotech-box-social-links">
											<ul class="pbmit-social-links pbmit-team-social-links">
												<li class="pbmit-social-li pbmit-social-facebook">
													<a href="#" title="Facebook" target="_blank">
														<span><i class="pbmit-base-icon-facebook-f"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-twitter">
													<a href="#" title="Twitter" target="_blank">
														<span><i class="pbmit-base-icon-twitter-2"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-linkedin">
													<a href="#" title="LinkedIn" target="_blank">
														<span><i class="pbmit-base-icon-linkedin-in"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-instagram">
													<a href="#" title="Instagram" target="_blank">
														<span><i class="pbmit-base-icon-instagram"></i></span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<a class="pbmit-link" href="#" title="Go to Dianne Russell"></a>
								</div>
							</article>
							<!-- Slide3 -->
							<article class="pbmit-team-style-2 swiper-slide">
								<div class="pbminfotech-post-item">
									<div class="pbminfotech-team-image-box">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/team/team-img-03.jpg" class="img-fluid" alt="team-img-01">
											</div>
										</div>
									</div>
									<div class="pbminfotech-box-content">
										<div class="pbminfotech-box-content-inner">
											<h3 class="pbmit-team-title">
												<a href="#">Garcia Byrne</a>
											</h3>
											<div class="pbminfotech-team-position">
												<div class="pbminfotech-box-team-position">Makeup Artist</div>
											</div>
										</div>
										<div class="pbminfotech-box-social-links">
											<ul class="pbmit-social-links pbmit-team-social-links">
												<li class="pbmit-social-li pbmit-social-facebook">
													<a href="#" title="Facebook" target="_blank">
														<span><i class="pbmit-base-icon-facebook-f"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-twitter">
													<a href="#" title="Twitter" target="_blank">
														<span><i class="pbmit-base-icon-twitter-2"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-linkedin">
													<a href="#" title="LinkedIn" target="_blank">
														<span><i class="pbmit-base-icon-linkedin-in"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-instagram">
													<a href="#" title="Instagram" target="_blank">
														<span><i class="pbmit-base-icon-instagram"></i></span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<a class="pbmit-link" href="#" title="Go to Dianne Russell"></a>
								</div>
							</article>
							<!-- Slide4 -->
							<article class="pbmit-team-style-2 swiper-slide">
								<div class="pbminfotech-post-item">
									<div class="pbminfotech-team-image-box">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/team/team-img-04.jpg" class="img-fluid" alt="team-img-01">
											</div>
										</div>
									</div>
									<div class="pbminfotech-box-content">
										<div class="pbminfotech-box-content-inner">
											<h3 class="pbmit-team-title">
												<a href="#">Charlie Joe</a>
											</h3>
											<div class="pbminfotech-team-position">
												<div class="pbminfotech-box-team-position">Salon Manager</div>
											</div>
										</div>
										<div class="pbminfotech-box-social-links">
											<ul class="pbmit-social-links pbmit-team-social-links">
												<li class="pbmit-social-li pbmit-social-facebook">
													<a href="#" title="Facebook" target="_blank">
														<span><i class="pbmit-base-icon-facebook-f"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-twitter">
													<a href="#" title="Twitter" target="_blank">
														<span><i class="pbmit-base-icon-twitter-2"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-linkedin">
													<a href="#" title="LinkedIn" target="_blank">
														<span><i class="pbmit-base-icon-linkedin-in"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-instagram">
													<a href="#" title="Instagram" target="_blank">
														<span><i class="pbmit-base-icon-instagram"></i></span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<a class="pbmit-link" href="#" title="Go to Dianne Russell"></a>
								</div>
							</article>
							<!-- Slide5 -->
							<article class="pbmit-team-style-2 swiper-slide">
								<div class="pbminfotech-post-item">
									<div class="pbminfotech-team-image-box">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/team/team-img-05.jpg" class="img-fluid" alt="team-img-01">
											</div>
										</div>
									</div>
									<div class="pbminfotech-box-content">
										<div class="pbminfotech-box-content-inner">
											<h3 class="pbmit-team-title">
												<a href="#">Jack Connor</a>
											</h3>
											<div class="pbminfotech-team-position">
												<div class="pbminfotech-box-team-position">Nail Technician</div>
											</div>
										</div>
										<div class="pbminfotech-box-social-links">
											<ul class="pbmit-social-links pbmit-team-social-links">
												<li class="pbmit-social-li pbmit-social-facebook">
													<a href="#" title="Facebook" target="_blank">
														<span><i class="pbmit-base-icon-facebook-f"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-twitter">
													<a href="#" title="Twitter" target="_blank">
														<span><i class="pbmit-base-icon-twitter-2"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-linkedin">
													<a href="#" title="LinkedIn" target="_blank">
														<span><i class="pbmit-base-icon-linkedin-in"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-instagram">
													<a href="#" title="Instagram" target="_blank">
														<span><i class="pbmit-base-icon-instagram"></i></span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<a class="pbmit-link" href="#" title="Go to Dianne Russell"></a>
								</div>
							</article>
							<!-- Slide6 -->
							<article class="pbmit-team-style-2 swiper-slide">
								<div class="pbminfotech-post-item">
									<div class="pbminfotech-team-image-box">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= $asset_url ?>images/demo-2/team/team-img-06.jpg" class="img-fluid" alt="team-img-01">
											</div>
										</div>
									</div>
									<div class="pbminfotech-box-content">
										<div class="pbminfotech-box-content-inner">
											<h3 class="pbmit-team-title">
												<a href="#">Garcia Miller</a>
											</h3>
											<div class="pbminfotech-team-position">
												<div class="pbminfotech-box-team-position">Assistant Stylist</div>
											</div>
										</div>
										<div class="pbminfotech-box-social-links">
											<ul class="pbmit-social-links pbmit-team-social-links">
												<li class="pbmit-social-li pbmit-social-facebook">
													<a href="#" title="Facebook" target="_blank">
														<span><i class="pbmit-base-icon-facebook-f"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-twitter">
													<a href="#" title="Twitter" target="_blank">
														<span><i class="pbmit-base-icon-twitter-2"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-linkedin">
													<a href="#" title="LinkedIn" target="_blank">
														<span><i class="pbmit-base-icon-linkedin-in"></i></span>
													</a>
												</li>
												<li class="pbmit-social-li pbmit-social-instagram">
													<a href="#" title="Instagram" target="_blank">
														<span><i class="pbmit-base-icon-instagram"></i></span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<a class="pbmit-link" href="#" title="Go to Dianne Russell"></a>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section>
			<!-- Team end --> 

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

			<!-- Appointment start -->
			<section class="appointment-section-two">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-5 appointment-two-left-col" data-aos="fade-up" data-aos-duration="800">
							<div class="pbmit-heading-subheading">
								<h4 class="pbmit-subtitle">What makes us different</h4>
								<h2 class="pbmit-title">Choose your perfect service</h2>
							</div>
						</div>
						<div class="col-md-12 col-xl-7 appointment-two-right-col" data-aos="fade-zoom-in" data-aos-duration="800" data-aos-easing="ease-in-back" data-aos-offset="0">
							<form class="contact-form" method="post" id="contact-form" action="#">
								<div class="row">
									<div class="col-md-6">
										<input type="text" class="form-control" placeholder="Your Name" name="name" required>
									</div>
									<div class="col-md-6">
										<select class="form-select" name="service" required>
											<option value="">Select Services</option>
											<option value="hair-treatments">Hair Treatments</option>
											<option value="hair-extensions">Hair Extensions</option>
											<option value="hair-straightening">Hair Straightening</option>
											<option value="hair-cutting">Hair Cutting</option>
										</select>
									</div>
									<div class="col-md-6">
										<input type="tel" class="form-control" placeholder="Phone Number" name="number" required>
										<div class="row g-2">
											<div class="col-md-6">
												<input class="form-control" value="" type="date" name="date" required>
											</div>
											<div class="col-md-6">
												<select class="form-select" name="time" required>
													<option value="">Time</option>
													<option value="9:00">9:00 am</option>
													<option value="9:30">9:30 am</option>
													<option value="10:00">10:00 am</option>
													<option value="10:30">10:30 am</option>
													<option value="11:00">11:00 am</option>
													<option value="11:30">11:30 am</option>
													<option value="12:00">12:00 am</option>
													<option value="12:30">12:30 am</option>
													<option value="01:00">01:00 am</option>
													<option value="01:30">01:30 am</option>
													<option value="02:00">02:00 am</option>
													<option value="02:30">02:30 am</option>
													<option value="03:00">03:00 am</option>
													<option value="03:30">03:30 am</option>
													<option value="04:00">04:00 am</option>
													<option value="04:30">04:30 am</option>
													<option value="05:00">05:00 am</option>
													<option value="05:30">05:30 am</option>
													<option value="06:00">06:00 am</option>
													<option value="06:30">06:30 am</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<textarea name="message" cols="40" rows="10" class="form-control" placeholder="Write your message" required></textarea>
									</div>
									<div class="col-md-6">
										<p class="pbmit-desc">We are committed to protecting your privacy. We will never collect information about you.</p>
									</div>
									<div class="col-md-6">
										<button class="pbmit-btn">
											<span class="pbmit-button-text">Book appointment</span>
											<span class="form-btn-loader d-none">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100"><circle fill="#fff" stroke="#fff" stroke-width="15" r="15" cx="40" cy="50"><animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate></circle><circle fill="#fff" stroke="#fff" stroke-width="15" r="15" cx="100" cy="50"><animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate></circle><circle fill="#fff" stroke="#fff" stroke-width="15" r="15" cx="160" cy="50"><animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate></circle></svg>
											</span>
										</button>
										<div class="col-md-12 col-lg-12 message-status"></div>
									</div>	
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- Appointment End -->

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
									<li><a href="#">Hair Extensions</a></li>
									<li><a href="#">Face Care</a></li>
									<li><a href="#">Grooming & Styling</a></li>
									<li><a href="#">Hair Treatments</a></li>
									<li><a href="#">Layered Hair</a></li>
									<li><a href="#">Hair Wash</a></li>
									<li><a href="#">Hair Straightening</a></li>
									<li><a href="#">Custom Hair Spa</a></li>
								</ul>
							</aside>
						</div>
						<div class="col-md-6 col-lg-4 pbmit-footer-widget pbmit-footer-widget-col-2">
							<aside class="widget widget-text text-lg-center">
								<div class="pbmit-footer-logo">
									<img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" class="img-fluid" style="max-height: 48px; width: auto; object-fit: contain;">
								</div>
								<p>The Glamr is a full-service barber shop that provides specialized Beard trimming and maintenance</p>
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
								<div class="pbmit-footer-copyright-text-area"> Copyright © 2025 <a href="<?= website_url('?preview_tpl=template1&preview_layout=2') ?>">Glamr</a>, All Rights Reserved.</div>
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