<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
?>
    <!-- Footer -->
    <footer class="site-footer">
        <div class="container pb-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <a class="footer-brand mb-3 d-inline-block" href="<?= website_url() ?>">
                            <img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;">
                        </a>
                        <p class="text-muted small mb-4">
                            <?= htmlspecialchars($footer_about) ?>
                        </p>
                        <div class="d-flex gap-2">
                            <?php if ($facebook_url): ?><a href="<?= htmlspecialchars($facebook_url) ?>" class="btn btn-sm btn-outline-secondary rounded-circle" style="width:36px;height:36px;"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                            <?php if ($instagram_url): ?><a href="<?= htmlspecialchars($instagram_url) ?>" class="btn btn-sm btn-outline-secondary rounded-circle" style="width:36px;height:36px;"><i class="fab fa-instagram"></i></a><?php endif; ?>
                            <?php if ($twitter_url): ?><a href="<?= htmlspecialchars($twitter_url) ?>" class="btn btn-sm btn-outline-secondary rounded-circle" style="width:36px;height:36px;"><i class="fab fa-twitter"></i></a><?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h5>Explore</h5>
                        <ul class="footer-links">
                            <li><a href="<?= website_url('about') ?>">About Us</a></li>
                            <li><a href="<?= website_url('services') ?>">Treatment Menu</a></li>
                            <li><a href="<?= website_url('packages') ?>">Packages & Passes</a></li>
                            <li><a href="<?= website_url('team') ?>">Our Experts</a></li>
                            <li><a href="<?= website_url('booking') ?>">Book Online</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5>Treatment Hours</h5>
                        <ul class="list-unstyled small text-muted lh-lg mb-0">
                            <li><span class="text-white">Monday &ndash; Friday:</span> 09:00 AM &ndash; 08:00 PM</li>
                            <li><span class="text-white">Saturday:</span> 09:00 AM &ndash; 08:00 PM</li>
                            <li><span class="text-white">Sunday:</span> 10:00 AM &ndash; 06:00 PM</li>
                            <li class="mt-2 text-warning"><i class="fas fa-check-circle me-1"></i>Advance Online Reservation Recommended</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5>Sanctuary Location</h5>
                        <ul class="list-unstyled small text-muted lh-lg">
                            <li class="mb-2"><i class="fas fa-map-marker-alt text-warning me-2"></i><?= htmlspecialchars($business_address) ?></li>
                            <li class="mb-2"><i class="fas fa-phone-alt text-warning me-2"></i><?= htmlspecialchars($business_phone) ?></li>
                            <li class="mb-2"><i class="fas fa-envelope text-warning me-2"></i><?= htmlspecialchars($business_email) ?></li>
                        </ul>
                        <a href="<?= website_url('booking') ?>" class="btn btn-outline-gold btn-sm w-100 mt-2">
                            <i class="fas fa-calendar-alt me-1"></i>Schedule Session
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright-bar text-center text-muted">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div>&copy; <?= date('Y') ?> <?= htmlspecialchars($business_name) ?>. All Rights Reserved.</div>
                    <div>
                        <span class="me-3">Active Edition: <span class="badge bg-secondary"><?= str_replace('_', ' + ', $business_type) ?></span></span>
                        <span>Theme: <strong>Template 1 (Glamr)</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<!-- JS Files -->
<script src="<?= template_asset('js/jquery.min.js', 'template1') ?>"></script>
<script src="<?= template_asset('js/popper.min.js', 'template1') ?>"></script>
<script src="<?= template_asset('js/bootstrap.min.js', 'template1') ?>"></script>
<script src="<?= template_asset('js/swiper.min.js', 'template1') ?>"></script>
<script src="<?= template_asset('js/aos.js', 'template1') ?>"></script>

<script>
    if (typeof AOS !== 'undefined') {
        AOS.init({ duration: 800, once: true });
    }
</script>

</body>
</html>
