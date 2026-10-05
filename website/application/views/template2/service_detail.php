<?php
$service_title = isset($service) && $service ? $service->title : 'Deep Cleansing Facial';
$service_desc = isset($service) && $service ? $service->description : '';
$service_short = isset($service) && $service ? $service->short_desc : '';
$service_price = isset($service) && $service ? $service->price : 85.00;
$service_duration = isset($service) && $service ? $service->duration : '60 mins';
$service_banner = isset($service) && !empty($service->banner_image) ? $service->banner_image : (isset($service) && !empty($service->thumbnail) ? $service->thumbnail : 'assets/template2/images/services/service-details-img4.jpg');

$banner_src = fallback_image_url($service_banner, 'assets/template2/images/services/service-details-img4.jpg');
$home_url = website_url();

$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$site_logo = $site_logo_url;

$site_fav_url = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');
$site_fav = $site_fav_url;
?>
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
                                                $as_url = website_url('service/' . $as->slug);
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