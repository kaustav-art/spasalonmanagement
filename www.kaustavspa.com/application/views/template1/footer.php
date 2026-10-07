<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$asset_url = base_url('assets/template1/');
$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');

// Detect current layout (1, 2, or 3)
$curr_layout = !empty($this->input->get('preview_layout')) ? (int)$this->input->get('preview_layout') : (!empty($active_home_layout) ? (int)$active_home_layout : 1);
if (!in_array($curr_layout, array(1, 2, 3))) {
    $curr_layout = 1;
}

$biz_name = isset($business_name) && !empty($business_name) ? $business_name : 'Glamr';
$biz_address = isset($business_address) && !empty($business_address) ? $business_address : '0665 Broadway NY, New York 10001<br> United States of America';
$biz_tagline = isset($business_tagline) && !empty($business_tagline) ? $business_tagline : 'The Glamr is a full-service beauty and hair salon that provides specialized rituals and care';

// Query services dynamically for footer column 1 matching current layout
$CI =& get_instance();
$footer_services = array();
if (isset($CI->db)) {
    $footer_services = $CI->db->where('template_key', 'template1')
                              ->where('layout_number', $curr_layout)
                              ->where('status', 'active')
                              ->order_by('sort_order', 'ASC')
                              ->limit(8)
                              ->get('template_services')
                              ->result_array();
    if (empty($footer_services)) {
        $footer_services = $CI->db->where('template_key', 'template1')
                                  ->where('status', 'active')
                                  ->order_by('sort_order', 'ASC')
                                  ->limit(8)
                                  ->get('template_services')
                                  ->result_array();
    }
}
?>

        <!-- footer -->
        <footer class="site-footer pbmit-footer-style-1 pbmit-bg-color-blackish">
			<div class="pbmit-footer-widget-area">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-lg-4 pbmit-footer-widget pbmit-footer-widget-col-1">
							<aside class="pbmit-two-column-menu widget">
								<h2 class="widget-title">Our Services</h2>
								<ul class="menu">
									<?php if (!empty($footer_services)): ?>
										<?php foreach ($footer_services as $f_svc): ?>
											<li><a href="<?= website_url('service/' . $f_svc['slug'] . '?preview_tpl=template1&preview_layout=' . $curr_layout) ?>"><?= htmlspecialchars($f_svc['title']) ?></a></li>
										<?php endforeach; ?>
									<?php else: ?>
										<li><a href="<?= website_url('services?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">Hair Extensions</a></li>
										<li><a href="<?= website_url('services?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">Face Care</a></li>
										<li><a href="<?= website_url('services?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">Grooming &amp; Styling</a></li>
										<li><a href="<?= website_url('services?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">Hair Treatments</a></li>
										<li><a href="<?= website_url('services?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">Layered Hair</a></li>
										<li><a href="<?= website_url('services?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">Hair Wash</a></li>
										<li><a href="<?= website_url('services?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">Hair Straightening</a></li>
										<li><a href="<?= website_url('services?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">Custom Hair Spa</a></li>
									<?php endif; ?>
								</ul>
							</aside>
						</div>
						<div class="col-md-6 col-lg-4 pbmit-footer-widget pbmit-footer-widget-col-2">
							<aside class="widget widget-text text-lg-center">
								<div class="pbmit-footer-logo">
									<img src="<?= htmlspecialchars($site_logo_url) ?>?v=<?= time() ?>" alt="Logo" class="img-fluid" style="max-height: 48px; width: auto; object-fit: contain;">
								</div>
								<p><?= htmlspecialchars($biz_tagline) ?></p>
								<ul class="pbmit-social-links">
									<li class="pbmit-social-li pbmit-social-facebook">
										<a title="Facebook" href="<?= !empty($facebook_url) ? htmlspecialchars($facebook_url) : 'https://www.facebook.com/' ?>" target="_blank">
											<span><i class="pbmit-base-icon-facebook-f"></i></span>
										</a>
									</li>
									<li class="pbmit-social-li pbmit-social-twitter">
										<a title="Twitter" href="<?= !empty($twitter_url) ? htmlspecialchars($twitter_url) : 'https://www.twitter.com/' ?>" target="_blank">
											<span><i class="pbmit-base-icon-twitter-2"></i></span>
										</a>
									</li>
									<li class="pbmit-social-li pbmit-social-linkedin">
										<a title="LinkedIn" href="<?= !empty($linkedin_url) ? htmlspecialchars($linkedin_url) : 'https://www.linkedin.com/' ?>" target="_blank">
											<span><i class="pbmit-base-icon-linkedin-in"></i></span>
										</a>
									</li>
									<li class="pbmit-social-li pbmit-social-instagram">
										<a title="Instagram" href="<?= !empty($instagram_url) ? htmlspecialchars($instagram_url) : 'https://www.instagram.com/' ?>" target="_blank">
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
										<p class="pbmit-timelist-address"><?= $biz_address ?></p>
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
								<div class="pbmit-footer-copyright-text-area"> Copyright © 2025 <a href="<?= website_url('?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">codeulas</a>, All Rights Reserved.</div>
							</div>
							<div class="col-md-6">
								<div class="pbmit-footer-menu-area">
									<div class="menu-footer-menu-container">
										<ul class="pbmit-footer-menu">
											<li class="menu-item">
												<a href="<?= website_url('about?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">Privacy Policy</a>
											</li>
											<li class="menu-item">
												<a href="<?= website_url('contact?preview_tpl=template1&preview_layout=' . $curr_layout) ?>">Terms of use</a>
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
				<input type="search" class="search-field" placeholder="Search …" value="" name="s">
				<button type="submit" class="search-submit" title="Search"></button>
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

	<!-- JS Files -->
	<script src="<?= $asset_url ?>js/jquery.min.js"></script>
	<script src="<?= $asset_url ?>js/popper.min.js"></script>
	<script src="<?= $asset_url ?>js/bootstrap.min.js"></script>
	<script src="<?= $asset_url ?>js/jquery.waypoints.min.js"></script>
	<script src="<?= $asset_url ?>js/jquery.appear.js"></script>
	<script src="<?= $asset_url ?>js/numinate.min.js"></script>
	<script src="<?= $asset_url ?>js/swiper.min.js"></script>
	<script src="<?= $asset_url ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?= $asset_url ?>js/circle-progress.js"></script>
	<script src="<?= $asset_url ?>js/jquery.countdown.min.js"></script> 
	<script src="<?= $asset_url ?>js/aos.js"></script>
	<script src='<?= $asset_url ?>js/gsap.js'></script>
	<script src='<?= $asset_url ?>js/ScrollTrigger.js'></script>
	<script src='<?= $asset_url ?>js/SplitText.js'></script>
	<script src='<?= $asset_url ?>js/theia-sticky-sidebar.js'></script>
	<script src='<?= $asset_url ?>js/gsap-animation.js'></script>
	<script src="<?= $asset_url ?>js/scripts.js"></script>
	<!-- Flatpickr JS -->
	<script src="<?= $asset_url ?>js/flatpickr.min.js"></script>
	<script>
	$(document).ready(function() {
		if (typeof flatpickr !== 'undefined') {
			flatpickr("#datepicker, .datepicker, #booking_date", {
				theme: "dark",
				minDate: "today",
				dateFormat: "Y-m-d",
				altInput: true,
				altFormat: "F j, Y",
				defaultDate: "today",
				disableMobile: true,
				allowInput: false,
				onChange: function(selectedDates, dateStr, instance) {
					if (typeof loadTimeSlots === 'function') {
						loadTimeSlots();
					}
				}
			});
		}
	});
	</script>

</body>
</html>
