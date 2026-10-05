<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
?>
    <!-- Pureglow Footer -->
    <footer class="pureglow-footer">
        <div class="container pb-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <a class="footer-brand mb-3 d-inline-block" href="<?= website_url() ?>">
                            <img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;">
                        </a>
                        <p class="small mb-4 text-white-50">
                            <?= htmlspecialchars($footer_about) ?>
                        </p>
                        <div class="d-flex gap-2">
                            <?php if ($facebook_url): ?><a href="<?= htmlspecialchars($facebook_url) ?>" class="btn btn-sm btn-outline-secondary rounded-circle text-white" style="width:36px;height:36px;"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                            <?php if ($instagram_url): ?><a href="<?= htmlspecialchars($instagram_url) ?>" class="btn btn-sm btn-outline-secondary rounded-circle text-white" style="width:36px;height:36px;"><i class="fab fa-instagram"></i></a><?php endif; ?>
                            <?php if ($twitter_url): ?><a href="<?= htmlspecialchars($twitter_url) ?>" class="btn btn-sm btn-outline-secondary rounded-circle text-white" style="width:36px;height:36px;"><i class="fab fa-twitter"></i></a><?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h5>Quick Links</h5>
                        <ul class="footer-links">
                            <li><a href="<?= website_url('about') ?>">Our Sanctuary</a></li>
                            <li><a href="<?= website_url('services') ?>">Treatment Rituals</a></li>
                            <li><a href="<?= website_url('packages') ?>">VIP Packages</a></li>
                            <li><a href="<?= website_url('team') ?>">Our Therapists</a></li>
                            <li><a href="<?= website_url('booking') ?>">Book Online</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5>Operating Hours</h5>
                        <ul class="list-unstyled small text-white-50 lh-lg mb-0">
                            <li><strong class="text-white">Monday &ndash; Friday:</strong> 09:00 AM &ndash; 08:00 PM</li>
                            <li><strong class="text-white">Saturday:</strong> 09:00 AM &ndash; 08:00 PM</li>
                            <li><strong class="text-white">Sunday:</strong> 10:00 AM &ndash; 06:00 PM</li>
                            <li class="mt-2 text-warning"><i class="fas fa-shield-alt me-1"></i>Private VIP Rooms Available</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5>Contact & Sanctuary</h5>
                        <ul class="list-unstyled small text-white-50 lh-lg">
                            <li class="mb-2"><i class="fas fa-map-marker-alt text-warning me-2"></i><?= htmlspecialchars($business_address) ?></li>
                            <li class="mb-2"><i class="fas fa-phone-alt text-warning me-2"></i><?= htmlspecialchars($business_phone) ?></li>
                            <li class="mb-2"><i class="fas fa-envelope text-warning me-2"></i><?= htmlspecialchars($business_email) ?></li>
                        </ul>
                        <a href="<?= website_url('booking') ?>" class="btn btn-outline-pureglow btn-sm w-100 mt-2 text-white">
                            <i class="fas fa-calendar-check me-1"></i>Online Reservation
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pureglow-copyright">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div>&copy; <?= date('Y') ?> <?= htmlspecialchars($business_name) ?>. All Rights Reserved.</div>
                    <div>
                        <span class="me-3">Edition: <span class="badge bg-secondary"><?= str_replace('_', ' + ', $business_type) ?></span></span>
                        <span>Theme: <strong>Template 2 (Pureglow)</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS Files -->
    <script src="<?= template_asset('js/jquery-latest.js', 'template2') ?>"></script>
    <script src="<?= template_asset('js/bootstrap.bundle.min.js', 'template2') ?>"></script>
    <script src="<?= template_asset('js/owl.carousel.min.js', 'template2') ?>"></script>
    <script src="<?= template_asset('js/swiper.min.js', 'template2') ?>"></script>

</body>
</html>
