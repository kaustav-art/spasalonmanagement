<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!isset($asset_url)) {
    $asset_url = base_url('assets/template2/');
}
$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$is_home = isset($is_home) ? (bool)$is_home : (empty($this->uri->segment(1)) || ($this->uri->segment(1) === 'home' && empty($this->uri->segment(2))));
$phone_cleaned = isset($business_phone) ? preg_replace('/[^0-9+]/', '', $business_phone) : '+15553456789';
?>
        <!--Site Footer Start-->
        <footer class="site-footer site-footer-two">
            <div class="site-footer__top">
                <div class="container">
                    <div class="site-footer__top-inner">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class="footer-widget__about">
                                    <div class="footer-widget__about-logo">
                                        <a href="<?= website_url() ?>"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;"></a>
                                    </div>
                                    <p class="footer-widget__about-text">
                                        <?= htmlspecialchars($footer_about ?? 'Professional skin care solutions designed to keep your skin healthy, glowing, and beautiful every day.') ?>
                                    </p>
                                    <div class="footer-widget__opening-hours">
                                        <h5>Opening Hours</h5>
                                        <ul class="footer-widget__opening-hours-list">
                                            <li><p>Mon – Fri: 09:00 AM – 08:00 PM</p></li>
                                            <li><p>Saturday: 09:00 AM – 06:00 PM</p></li>
                                        </ul>
                                        <div class="footer-widget__social">
                                            <?php if (!empty($facebook_url) && $facebook_url !== '#'): ?><a href="<?= htmlspecialchars($facebook_url) ?>"><span class="fab fa-facebook-f"></span></a><?php else: ?><a href="#"><span class="fab fa-facebook-f"></span></a><?php endif; ?>
                                            <?php if (!empty($twitter_url) && $twitter_url !== '#'): ?><a href="<?= htmlspecialchars($twitter_url) ?>"><span class="fab fa-twitter"></span></a><?php else: ?><a href="#"><span class="fab fa-twitter"></span></a><?php endif; ?>
                                            <?php if (!empty($instagram_url) && $instagram_url !== '#'): ?><a href="<?= htmlspecialchars($instagram_url) ?>"><span class="fab fa-instagram"></span></a><?php else: ?><a href="#"><span class="fab fa-instagram"></span></a><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="site-footer__top-right">
                                    <div class="site-footer-two__newsletter-box">
                                        <h2 class="site-footer-two__newsletter-title">Join Our Newsletter</h2>
                                        <div class="footer-widget__newsletter-form-box">
                                            <form class="footer-widget__newsletter-form contact-form-validated" action="#" method="POST">
                                                <div class="footer-widget__newsletter-form-input-box">
                                                    <input type="email" placeholder="Your Email address" name="email" required="">
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
                                                <h4 class="footer-widget__title">Quick Links</h4>
                                                <ul class="footer-widget__links-list list-unstyled">
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url() ?>">Home</a></li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('about') ?>">About Us</a></li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('services') ?>">Our Services</a></li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('blog') ?>">Latest Blog</a></li>
                                                    <li><span class="icon-chevron"></span><a href="<?= $is_home ? '#booking' : website_url('#booking') ?>">Book Now</a></li>
                                                    <li><span class="icon-chevron"></span><a href="<?= $is_home ? '#booking' : website_url('#booking') ?>">Contact Us</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                                            <div class="footer-widget__links services">
                                                <h4 class="footer-widget__title">Treatments</h4>
                                                <ul class="footer-widget__links-list list-unstyled">
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('services') ?>">Facial Rituals</a></li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('services') ?>">Skin Hydration</a></li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('services') ?>">Anti-Aging Care</a></li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('services') ?>">Deep Cleansing</a></li>
                                                    <li><span class="icon-chevron"></span><a href="<?= website_url('services') ?>">Body Therapies</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                                            <div class="footer-widget__contact">
                                                <h4 class="footer-widget__title">Contact Info</h4>
                                                <ul class="list-unstyled text-white-50 small lh-lg mb-3">
                                                    <li><span class="icon-maps-and-flags me-2"></span> <?= htmlspecialchars($business_address ?? 'New York') ?></li>
                                                    <li><span class="icon-call me-2"></span> <a href="tel:<?= $phone_cleaned ?>" class="text-white-50"><?= htmlspecialchars($business_phone ?? '+1 (555) 345-6789') ?></a></li>
                                                    <li><span class="icon-email me-2"></span> <a href="mailto:<?= htmlspecialchars($business_email ?? 'contact@example.com') ?>" class="text-white-50"><?= htmlspecialchars($business_email ?? 'contact@example.com') ?></a></li>
                                                </ul>
                                                <a href="<?= $is_home ? '#booking' : website_url('#booking') ?>" class="thm-btn py-2 px-3 small">Online Booking</a>
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
                        <li><h2 data-hover="Skincare" class="sliding-text-two__title">Skincare</h2></li>
                        <li><span></span></li>
                        <li><h2 data-hover="Haircare" class="sliding-text-two__title">Haircare</h2></li>
                        <li><span></span></li>
                        <li><h2 data-hover="Bodycare" class="sliding-text-two__title">Bodycare</h2></li>
                        <li><span></span></li>
                        <li><h2 data-hover="Gentle Care" class="sliding-text-two__title">Gentle Care</h2></li>
                        <li><span></span></li>
                        <li><h2 data-hover="Glow" class="sliding-text-two__title">Glow</h2></li>
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
                                    <p class="site-footer__copyright-text">&copy; <?= date('Y') ?> <a href="<?= website_url() ?>"><?= htmlspecialchars($business_name ?? 'Pureglow') ?></a>. All Rights Reserved.</p>
                                </div>
                                <div class="site-footer__bottom-payment-box">
                                    <ul class="list-unstyled site-footer__bottom-payment">
                                        <li><img src="<?= $asset_url ?>images/resources/site-footer-payment-img1.png" alt="Payment"></li>
                                        <li><img src="<?= $asset_url ?>images/resources/site-footer-payment-img2.png" alt="Payment"></li>
                                        <li><img src="<?= $asset_url ?>images/resources/site-footer-payment-img3.png" alt="Payment"></li>
                                        <li><img src="<?= $asset_url ?>images/resources/site-footer-payment-img4.png" alt="Payment"></li>
                                        <li><img src="<?= $asset_url ?>images/resources/site-footer-payment-img5.png" alt="Payment"></li>
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

    <!-- Mobile Nav Wrapper -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="<?= website_url() ?>" aria-label="logo image"><img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" style="max-height: 48px; width: auto; object-fit: contain;" /></a>
            </div>
            <div class="mobile-nav__container"></div>

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:<?= htmlspecialchars($business_email ?? 'contact@example.com') ?>"><?= htmlspecialchars($business_email ?? 'contact@example.com') ?></a>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="tel:<?= $phone_cleaned ?>"><?= htmlspecialchars($business_phone ?? '+1 (555) 345-6789') ?></a>
                </li>
            </ul>
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <?php if (!empty($twitter_url) && $twitter_url !== '#'): ?><a href="<?= htmlspecialchars($twitter_url) ?>" class="fab fa-twitter"></a><?php else: ?><a href="#" class="fab fa-twitter"></a><?php endif; ?>
                    <?php if (!empty($facebook_url) && $facebook_url !== '#'): ?><a href="<?= htmlspecialchars($facebook_url) ?>" class="fab fa-facebook-square"></a><?php else: ?><a href="#" class="fab fa-facebook-square"></a><?php endif; ?>
                    <?php if (!empty($instagram_url) && $instagram_url !== '#'): ?><a href="<?= htmlspecialchars($instagram_url) ?>" class="fab fa-instagram"></a><?php else: ?><a href="#" class="fab fa-instagram"></a><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Scroll to Top -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>

    <!-- Template JS Scripts -->
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
    <script src="<?= $asset_url ?>js/script.js?v=<?= time() ?>"></script>
    <script>
        // Preloader fallback safety
        (function() {
            function hidePreloader() {
                var p = document.getElementById('preloader');
                if (p && p.style.display !== 'none') {
                    p.style.opacity = '0';
                    p.style.transition = 'opacity 0.3s ease';
                    setTimeout(function() { p.style.display = 'none'; }, 300);
                }
            }
            if (document.readyState === 'complete') {
                hidePreloader();
            } else {
                window.addEventListener('load', hidePreloader);
            }
            setTimeout(hidePreloader, 1500);
        })();
    </script>
</body>
</html>
