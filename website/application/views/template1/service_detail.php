<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$asset_url = base_url('assets/template1/');

// Detect current layout (1, 2, or 3)
$curr_layout = !empty($this->input->get('preview_layout')) ? (int)$this->input->get('preview_layout') : (!empty($active_home_layout) ? (int)$active_home_layout : 1);
if (!in_array($curr_layout, array(1, 2, 3))) {
    $curr_layout = 1;
}

$preview_tpl = !empty($this->input->get('preview_tpl')) ? $this->input->get('preview_tpl') : (!empty($active_template) ? $active_template : 'template1');

// 9 Default Authentic Services matching template1/services.html
$default_services_catalog = array(
    'hair-styling' => array(
        'title' => 'Hair Styling',
        'category' => 'Styling',
        'image' => $asset_url . 'images/service/service-img-01.jpg',
        'single_img' => $asset_url . 'images/service/service-single-01.jpg',
        'price' => '$45.00',
        'duration' => '45 mins',
        'short_desc' => 'Professional blow dry, bespoke updos, and editorial hair styling tailored for all hair lengths and textures.',
        'description' => '<p class="pbmit-firstletter">We offer a complete range of hair styling services to fit your lifestyle and personal aesthetic. From precision blow drying and bespoke event updos to textured waves and red-carpet glam, our experienced stylists create effortlessly chic hairstyles tailored specifically to you.</p><p>Whether preparing for a milestone celebration or simply refreshing your daily silhouette, our styling masters consult closely with you to understand your hair type, bone structure, and maintenance preferences.</p>',
        'icon_svg' => '<svg id="Layer_1" enable-background="new 0 0 74 74" height="512" viewBox="0 0 74 74" width="512" xmlns="http://www.w3.org/2000/svg"><g><path fill="#c6ac73" d="m63.13 45.83c-2.23-3.04-4.05-10.07-3.13-18.98.31-2.94.18-5.73-.39-8.27-1.64-7.43-5.6-10.14-7.22-10.96-.26-.13-.53-.32-.84-.59-1.69-1.48-3.32-2.15-4.85-2-1.27.12-2.42.82-3.35 2.02-.31.41-.84.59-1.35.46-1.85-.44-5.06-.43-7.53 3.65-.06.05-.11.11-.15.19s-4.02 7.36-16.01 12.97l-.03-1.8c.31-.33.48-.76.48-1.22l-.03-1.76c-.01-.47-.2-.9-.52-1.22l-.16-8.28c-.03-1.67-1.42-3.04-3.1-3.04s-3.07 1.36-3.1 3.04l-.18 9.47c-.31.31-.5.73-.51 1.19l-.05 2.58c-.01.46.16.88.47 1.21l-.05 2.76c-.27.31-.44.7-.44 1.13v1.12c0 .39.14.77.38 1.07l-.15 7.7c-.9.07-1.62.82-1.62 1.74v8.92c0 .68.39 1.26.96 1.55v15.94c0 1.42 1.15 2.57 2.57 2.57h3.43c1.42 0 2.57-1.15 2.57-2.57v-5.42c.41 0 .75-.34.75-.75v-1.61c0-.41-.34-.75-.75-.75v-.91c.41 0 .75-.34.75-.75v-3.22c0-.41-.34-.75-.75-.75v-1.77c.57-.29.96-.87.96-1.55v-8.92c0-.92-.71-1.67-1.62-1.74l-.15-7.77c5.69-1.15 10.03-3.25 13.19-5.37.05.78.12 1.57.25 2.38.4 2.49.48 4.26-.21 6.45-.25.78-.61 2.01-1.02 3.43-.79 2.69-1.82 6.23-2.64 8.52l-.17.15c-3.56 3.08-5.6 7.55-5.6 12.25v9.95c0 .41.34.75.75.75s.75-.34.75-.75v-9.97c0-3.39 1.19-6.63 3.29-9.23-.74 4.57 2.23 7.62 2.37 7.77.21.21.53.28.81.17s.46-.38.47-.68c.01-.45.08-1.34.3-2.25.14 2.09.8 4.85 2.95 7.36.15.17.35.26.57.26.1 0 .2-.02.3-.06.3-.13.48-.44.45-.77-.01-.06-.58-5.68 1.46-8.83 1.76-2.71 1.23-5.92.7-8.42.3 0 .62-.01.83-.01.17 1.89 1 3.57 2.38 4.8 1.35 1.2 3.13 1.86 5 1.86 3.97 0 7.02-2.81 7.38-6.65 8.02.1 14.51 6.64 14.51 14.68v9.95c0 .41.34.75.75.75s.76-.34.76-.75v-9.95c0-5.01-2.29-9.49-5.87-12.47z"/></g></svg>'
    ),
    'hair-extensions' => array(
        'title' => 'Hair Extensions',
        'category' => 'Extensions',
        'image' => $asset_url . 'images/service/service-img-02.jpg',
        'single_img' => $asset_url . 'images/service/service-img-02.jpg',
        'price' => '$120.00',
        'duration' => '90 mins',
        'short_desc' => 'Premium natural hair extensions adding dramatic volume, length, and flawless multidimensional shine.',
        'description' => '<p class="pbmit-firstletter">Transform your hair with 100% ethically sourced human hair extensions. Designed to blend imperceptibly with your natural locks, our extensions provide instant fullness, natural movement, and unmatched length without damage.</p><p>We specialize in tape-in, keratin micro-fusion, and hand-tied weft extensions, customizing every strand for a weightless, natural look that holds style beautifully.</p>',
        'icon_svg' => '<svg enable-background="new 0 0 511.999 511.999" height="512" viewBox="0 0 511.999 511.999" width="512" xmlns="http://www.w3.org/2000/svg"><g><path fill="#c6ac73" d="m194.574 89.993c3.338 1.315 6.825 1.973 10.306 1.973 3.804 0 7.602-.784 11.192-2.348 6.862-2.988 12.146-8.467 14.877-15.427 1.513-3.856-.386-8.209-4.241-9.722-3.855-1.515-8.208.386-9.722 4.241-1.267 3.227-3.718 5.768-6.903 7.154-3.203 1.394-6.757 1.455-10.01.173-3.853-1.518-8.208.373-9.728 4.228-1.518 3.854.376 8.209 4.229 9.728z"/></g></svg>'
    ),
    'custom-hair-spa' => array(
        'title' => 'Custom Hair Spa',
        'category' => 'Hair Care',
        'image' => $asset_url . 'images/service/service-img-03.jpg',
        'single_img' => $asset_url . 'images/service/service-img-03.jpg',
        'price' => '$65.00',
        'duration' => '60 mins',
        'short_desc' => 'Rejuvenating scalp detox, deep conditioning massage, and intensive botanical moisture treatments.',
        'description' => '<p class="pbmit-firstletter">Experience our holistic botanical hair spa designed to revitalize both scalp and strand health. Commencing with an invigorating acupressure scalp massage and exfoliating detox ritual, we unclog follicles and stimulate balanced circulation.</p><p>Next, an ultra-rich nutrient infusion deeply hydrates the hair cortex, restoring elasticity, calming scalp irritation, and sealing in radiant natural shine.</p>',
        'icon_svg' => '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.998 511.998"><path fill="#c6ac73" d="M212.798,438.92c-8.767-4.301-14.213-13.035-14.213-22.791V249.489c0-19.799,5.295-39.219,15.314-56.161 c2.108-3.565,0.927-8.165-2.639-10.273c-3.565-2.107-8.164-0.928-10.273,2.638c-11.384,19.253-17.402,41.314-17.402,63.797 v166.641c0,15.524,8.661,29.417,22.606,36.258c1.063,0.522,2.189,0.768,3.298,0.768c2.771,0,5.437-1.542,6.739-4.198 C218.052,445.238,216.517,440.745,212.798,438.92z"/></svg>'
    ),
    'hair-treatments' => array(
        'title' => 'Hair Treatments',
        'category' => 'Treatments',
        'image' => $asset_url . 'images/service/service-img-04.jpg',
        'single_img' => $asset_url . 'images/service/service-img-04.jpg',
        'price' => '$85.00',
        'duration' => '60 mins',
        'short_desc' => 'Advanced salon treatments targeted at hair repair, color preservation, and cuticle smoothing.',
        'description' => '<p class="pbmit-firstletter">Combat the damaging effects of environmental exposure, heat tools, and chemical processing with clinical-grade molecular hair repair therapy. Our formulas restore broken disulfide bonds from within.</p><p>Results are visible immediately: strands gain resilience against future breakage, hair cuticles lie flat and reflective, and color vibrancy is locked in for weeks.</p>',
        'icon_svg' => '<svg enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path fill="#c6ac73" d="m452.738 423.072h-5.582c4.674-20.724-2.445-39.975-22.651-62.507-1.381-1.54-3.337-2.44-5.405-2.49-2.078-.021-4.064.758-5.518 2.23-7.854 7.96-15.764 13.629-23.587 17.674-5.86-18.397-20.527-39.109-40.705-47.712-6.671-2.836-13.526-5.367-20.314-7.638-.308-.125-44.044-12.451-44.044-12.451z"/></svg>'
    ),
    'hair-straightening' => array(
        'title' => 'Hair Straightening',
        'category' => 'Extensions',
        'image' => $asset_url . 'images/service/service-img-05.jpg',
        'single_img' => $asset_url . 'images/service/service-img-05.jpg',
        'price' => '$110.00',
        'duration' => '120 mins',
        'short_desc' => 'Long-lasting keratin and silk protein smoothing rituals delivering mirror-like gloss and frizz control.',
        'description' => '<p class="pbmit-firstletter">Achieve pin-straight, ultra-sleek hair that resists humidity and drastically reduces morning styling time. Our keratin and silk protein infusions nourish each strand while smoothing coarse textures.</p><p>Unlike harsh chemical relaxers, our modern straightening treatments prioritize tensile strength, retaining bounce and movement with a glassy, touchable finish.</p>',
        'icon_svg' => '<svg enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path fill="#c6ac73" d="m217.353 278.442c-1.776-3.742-6.249-5.335-9.992-3.558-11.029 5.235-21.751 5.236-32.78 0-3.74-1.776-8.216-.184-9.992 3.558-1.777 3.742-.184 8.215 3.558 9.992 7.572 3.596 15.198 5.394 22.824 5.394s15.251-1.798 22.824-5.394c3.742-1.776 5.335-6.25 3.558-9.992z"/></svg>'
    ),
    'grooming-styling' => array(
        'title' => 'Grooming & Styling',
        'category' => 'Styling',
        'image' => $asset_url . 'images/service/service-img-06.jpg',
        'single_img' => $asset_url . 'images/service/service-img-06.jpg',
        'price' => '$50.00',
        'duration' => '45 mins',
        'short_desc' => 'Precision haircuts, beard sculpting, hot towel service, and tailored masculine grooming.',
        'description' => '<p class="pbmit-firstletter">Our bespoke grooming service delivers precision cuts, seamless fades, and refined beard detailing tailored for the modern gentleman. Enjoy our traditional hot towel lather and scalp stimulation.</p><p>We evaluate growth patterns and lifestyle requirements to deliver crisp lines, effortless structure, and enduring sophistication.</p>',
        'icon_svg' => '<svg enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path fill="#c6ac73" d="m490.003 289.054c-34.096 0-61.831 27.738-61.831 61.831v100.334c0 31.626-23.095 48.7-47.743 50.947-28.204 2.57-58.442-14.274-58.442-50.947v-15.011h47.951c15.351 0 27.844-12.49 27.844-27.844 0-17.312-14.298-24.189-14.951-24.866-5.02-3.342-7.961-9.048-7.676-14.894 2.614-53.782 26.749-87.661 37.466-158.08 18.518-3.73 39.099-8.282 55.056-18.21z"/></svg>'
    ),
    'hair-texture' => array(
        'title' => 'Hair Texture',
        'category' => 'Hair Care',
        'image' => $asset_url . 'images/service/service-img-07.jpg',
        'single_img' => $asset_url . 'images/service/service-img-07.jpg',
        'price' => '$75.00',
        'duration' => '60 mins',
        'short_desc' => 'Permanent waves, root lift, and custom texturizing to add effortless movement and definition.',
        'description' => '<p class="pbmit-firstletter">Add dimensional body, effortless beach waves, or defined curls with our contemporary texture enhancement services. Using low-pH, conditioning solutions, we reshape hair structure gently.</p><p>Enjoy amplified volume at the root, breezy movement through the mid-lengths, and wash-and-go ease every day.</p>',
        'icon_svg' => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 504.98 504.98"><path fill="#c6ac73" d="M362.749,275.435c-0.01-0.005-0.019-0.01-0.029-0.015l-2.96-1.48c-8.451-4.322-18.68-3.071-25.84,3.16 c-12.607,10.321-30.234,11.906-44.48,4c-2.064-0.789-4.376,0.245-5.165,2.308c-0.609,1.592-0.141,3.396,1.165,4.492z"/></svg>'
    ),
    'hair-coloring' => array(
        'title' => 'Hair Coloring',
        'category' => 'Treatments',
        'image' => $asset_url . 'images/service/service-img-08.jpg',
        'single_img' => $asset_url . 'images/service/service-img-08.jpg',
        'price' => '$95.00',
        'duration' => '90 mins',
        'short_desc' => 'Balayage, foil highlights, root melts, and glosses crafted with low-ammonia formulas.',
        'description' => '<p class="pbmit-firstletter">Immerse your locks in rich, multidimensional color formulated by master colorists. From sun-kissed balayage and crisp baby-lights to rich brunette melts and vibrant fantasy tones, our color blends are artistic and personalized.</p><p>All services include protective bond-building treatments and pH-balancing glosses to keep your hair healthy and radiant.</p>',
        'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#c6ac73" d="M58.81734,15.555,50.189,12.70617a3.99231,3.99231,0,0,0-2.65321-4.562l-2.29773-.75838-5.62435-3.253a1.00744,1.00744,0,0,0-1.45023.55229l-1.809,5.47894c-5.56461-2.21154-9.514-2.42962-15.88337.63426a1.00023,1.00023,0,0,0,.94835,1.761z"/></svg>'
    ),
    'hair-cutting' => array(
        'title' => 'Hair Cutting',
        'category' => 'Styling',
        'image' => $asset_url . 'images/service/service-img-09.jpg',
        'single_img' => $asset_url . 'images/service/service-img-09.jpg',
        'price' => '$40.00',
        'duration' => '45 mins',
        'short_desc' => 'Customized dry and wet precision cutting tailored to your facial silhouette and daily styling habits.',
        'description' => '<p class="pbmit-firstletter">Every great haircut begins with a thoughtful consultation. Our master stylists assess bone structure, hair density, and growth direction to sculpt a cut that looks stunning both wet and dry.</p><p>Completed with a relaxing scalp wash, conditioning rinse, and signature blow-dry styling so you leave feeling revitalized and confident.</p>',
        'icon_svg' => '<svg enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path fill="#c6ac73" d="m464.843 309.624c-1.257-.197-4.696-.762-5.155-.837 34.407-39.071 50.214-95.015 41.294-146.64-1.693-9.853-13.059-14.613-21.202-8.893-1.907 1.335-3.865 2.534-5.865 3.621-6.723-24.717-23.008-44.412-48.541-58.686z"/></svg>'
    )
);

// Resolve current service details
$svc_slug = !empty($service->slug) ? $service->slug : 'hair-styling';
$catalog_default = isset($default_services_catalog[$svc_slug]) ? $default_services_catalog[$svc_slug] : reset($default_services_catalog);

$svc_title = !empty($service->title) ? $service->title : $catalog_default['title'];
$svc_short = !empty($service->short_desc) ? $service->short_desc : $catalog_default['short_desc'];
$svc_desc = !empty($service->description) ? $service->description : $catalog_default['description'];
$svc_price = !empty($service->price) ? (is_numeric($service->price) ? ('$' . number_format($service->price, 2)) : $service->price) : $catalog_default['price'];
$svc_duration = !empty($service->duration) ? (is_numeric($service->duration) ? ($service->duration . ' mins') : $service->duration) : $catalog_default['duration'];

// Resolve Image
$svc_img = '';
if (!empty($service->banner_image)) {
    $svc_img = filter_var($service->banner_image, FILTER_VALIDATE_URL) ? $service->banner_image : base_url($service->banner_image);
} elseif (!empty($service->thumbnail)) {
    $svc_img = filter_var($service->thumbnail, FILTER_VALIDATE_URL) ? $service->thumbnail : base_url($service->thumbnail);
} elseif (!empty($catalog_default['single_img'])) {
    $svc_img = $catalog_default['single_img'];
} else {
    $svc_img = $asset_url . 'images/service/service-single-01.jpg';
}

// Build Sidebar Services List
$sidebar_services = array();
if (!empty($all_services)) {
    foreach ($all_services as $as) {
        $sidebar_services[] = array(
            'slug' => !empty($as->slug) ? $as->slug : url_title($as->title, '-', TRUE),
            'title' => $as->title
        );
    }
} else {
    foreach ($default_services_catalog as $d_slug => $d_val) {
        $sidebar_services[] = array(
            'slug' => $d_slug,
            'title' => $d_val['title']
        );
    }
}

$services_page_url = website_url('services?preview_tpl=' . $preview_tpl . '&preview_layout=' . $curr_layout);
$booking_page_url = website_url('?preview_tpl=' . $preview_tpl . '&preview_layout=' . $curr_layout . '#booking');
$current_icon_svg = !empty($catalog_default['icon_svg']) ? $catalog_default['icon_svg'] : '';
?>

<!-- Title Bar Matching template1/service-details.html -->
<div class="pbmit-title-bar-wrapper" style="background-image: url('<?= $asset_url ?>images/bg/titlebar.jpg');">
	<div class="container">
		<div class="pbmit-title-bar-content">
			<div class="pbmit-title-bar-content-inner">
				<div class="pbmit-tbar">
					<div class="pbmit-tbar-inner">
						<h1 class="pbmit-tbar-title"><?= htmlspecialchars($svc_title) ?></h1>
					</div>
				</div>
				<div class="pbmit-breadcrumb">
					<div class="pbmit-breadcrumb-inner">
						<span>
							<a title="Our Service" href="<?= $services_page_url ?>" class="home"><span>Our Service</span></a>
						</span>
						<span class="sep">
							<i class="pbmit-base-icon-angle-right"></i>
						</span>
						<span><span class="post-root post post-post current-item"><?= htmlspecialchars($svc_title) ?></span></span>
					</div>
				</div>
			</div>
		</div> 
	</div> 
</div>
<!-- Title Bar End-->

<!-- Page Content -->
<div class="page-content">

<?php if ($curr_layout == 1): ?>
	<!-- ============================================================== -->
	<!-- LAYOUT 1: CLASSIC GLAMR SALON (EXACT TO template1/service-details.html) -->
	<!-- ============================================================== -->
	<section class="site-content service-details">
		<div class="container">
			<div class="row">

				<!-- Sidebar (Left Column - ONLY Our Services list widget) -->
				<div class="col-md-3 service-left-col sidebar">
					<aside class="service-sidebar">
						<aside class="widget post-list">
							<h2 class="widget-title">Our Services</h2>
							<div class="all-post-list">
								<ul>
									<?php foreach ($sidebar_services as $s_item): 
										$is_active = ($s_item['slug'] === $svc_slug || $s_item['title'] === $svc_title);
										$s_url = website_url('service/' . $s_item['slug'] . '?preview_tpl=' . $preview_tpl . '&preview_layout=1');
									?>
										<li class="<?= $is_active ? 'post-active' : '' ?>">
											<a href="<?= $s_url ?>"><?= htmlspecialchars($s_item['title']) ?></a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</aside>
					</aside>
				</div>

				<!-- Main Content (Right Column) -->
				<div class="col-md-9 service-right-col">

					<!-- 1. Service Feature Image First -->
					<div class="pbmit-service-feature-image mb-4">
						<img src="<?= htmlspecialchars($svc_img) ?>" class="img-fluid w-100" alt="<?= htmlspecialchars($svc_title) ?>" style="border-radius: 8px; max-height: 520px; object-fit: cover;">
					</div>

					<!-- Pricing & Duration Ribbon -->
					<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 p-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(198,172,115,0.25); border-radius: 8px;">
						<div class="d-flex align-items-center gap-3">
							<?php if (!empty($svc_price)): ?>
								<span class="badge" style="background: #c6ac73; color: #0b0f19; font-size: 16px; font-weight: 700; padding: 7px 16px; border-radius: 6px;">
									<?= htmlspecialchars($svc_price) ?>
								</span>
							<?php endif; ?>
							<?php if (!empty($svc_duration)): ?>
								<span class="text-white-50" style="font-size: 14px;">
									<i class="far fa-clock text-warning me-1"></i><?= htmlspecialchars($svc_duration) ?>
								</span>
							<?php endif; ?>
						</div>
						<a href="<?= $booking_page_url ?>" class="pbmit-btn">
							<span class="pbmit-button-text">Book Appointment</span>
						</a>
					</div>

					<!-- 2. Description Given by Superadmin -->
					<div class="pbmit-short-description mb-4">
						<h3 class="mb-3">Description Of The Service</h3>
						<div class="pbmit-service-desc-text mt-3" style="font-size: 16px; line-height: 1.8; color: rgba(255,255,255,0.78);">
							<?= !empty($svc_desc) ? $svc_desc : '<p>' . nl2br(htmlspecialchars($svc_short)) . '</p>' ?>
						</div>
					</div>

					<!-- 3. Safety Precautions / Authentic Glamr Features -->
					<div class="pbmit-custom-heading mt-5">
						<h3 class="pbmit-title mb-3">Safety Precautions are taken in Hair Salon</h3>
					</div>
					<p class="pb-xl-4 pb-3" style="color: rgba(255,255,255,0.7);">While every hair salon may offer a unique experience, our priority is delivering world-class hair care with safety, hygiene, and hospital-grade sanitization at the forefront.</p>

					<div class="row mb-5">
						<div class="col-md-6 col-lg-4">
							<article class="pbmit-miconheading-style-6">
								<div class="pbmit-ihbox-style-6">
									<div class="pbmit-ihbox-box">
										<div class="pbmit-ihbox-icon">
											<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
												<svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
													<g id="Hair_Tools"><g><path d="m409 511c-3.314 0-6-2.686-6-6v-498c0-3.313 2.686-6 6-6s6 2.687 6 6v498c0 3.314-2.686 6-6 6z"></path><path d="m439.869 510.791h-47.972c-21.076 0-38.222-17.146-38.222-38.223v-433.332c0-21.076 17.146-38.223 38.222-38.223h47.972c3.314 0 6 2.687 6 6v497.777c0 3.314-2.687 6.001-6 6.001zm-47.972-497.777c-14.459 0-26.222 11.764-26.222 26.223v433.332c0 14.459 11.763 26.223 26.222 26.223h41.972v-485.778z"></path><path d="m505.115 13h-66c-3.314 0-6-2.687-6-6s2.686-6 6-6h66c3.314 0 6 2.687 6 6s-2.687 6-6 6z"></path><path d="m505.115 73h-66c-3.314 0-6-2.687-6-6s2.686-6 6-6h66c3.314 0 6 2.687 6 6s-2.687 6-6 6z"></path><path d="m505.115 141h-66c-3.314 0-6-2.686-6-6s2.686-6 6-6h66c3.314 0 6 2.686 6 6s-2.687 6-6 6z"></path></g></g>
												</svg>
											</div>
										</div>
										<h2 class="pbmit-element-title">Only natural products</h2>
										<div class="pbmit-heading-desc">Because you deserve gentle care powered by the purity of botanical nature.</div>
									</div>
								</div>
							</article>
						</div>
						<div class="col-md-6 col-lg-4 mt-md-0 mt-4">
							<article class="pbmit-miconheading-style-6">
								<div class="pbmit-ihbox-style-6">
									<div class="pbmit-ihbox-box">
										<div class="pbmit-ihbox-icon">
											<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
												<svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
													<g id="Scissor"><g><path d="m221.679 276.165c-2.261 0-4.427-1.284-5.443-3.469l-46.105-99.062c-12.174-26.164-18.974-54.048-20.211-82.878-1.237-28.832 3.149-57.195 13.038-84.303.832-2.28 2.955-3.834 5.379-3.938 2.428-.099 4.673 1.263 5.697 3.463l87.426 187.846c1.398 3.004.096 6.573-2.908 7.972-3.005 1.398-6.573.097-7.972-2.908l-80.994-174.029c-13.656 47.746-9.737 98.235 11.424 143.713l46.104 99.06c1.398 3.005.097 6.573-2.908 7.972-.818.382-1.679.561-2.527.561z"></path></g></g>
												</svg>
											</div>
										</div>
										<h2 class="pbmit-element-title">Professional stylists</h2>
										<div class="pbmit-heading-desc">Skill meets style to ensure you feel flawless, fresh, &amp; fabulous.</div>
									</div>
								</div>
							</article>
						</div>
						<div class="col-md-6 col-lg-4 mt-lg-0 mt-4">
							<article class="pbmit-miconheading-style-6">
								<div class="pbmit-ihbox-style-6">
									<div class="pbmit-ihbox-box">
										<div class="pbmit-ihbox-icon">
											<div class="pbmit-ihbox-icon-wrapper pbmit-icon-type-icon">
												<svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
													<g id="Shaving_Cream"><g><path d="m406.134 431.072h-300.737c-57.571 0-104.409-46.838-104.409-104.409v-66.438c0-3.314 2.686-6 6-6h497.554c3.313 0 6 2.686 6 6v66.438c.001 57.571-46.837 104.409-104.408 104.409zm-393.146-164.847v60.438c0 50.954 41.454 92.409 92.409 92.409h300.737c50.954 0 92.409-41.455 92.409-92.409v-60.438z"></path></g></g>
												</svg>
											</div>
										</div>
										<h2 class="pbmit-element-title">Qualified specialists</h2>
										<div class="pbmit-heading-desc">Passionate professionals committed to your lasting beauty.</div>
									</div>
								</div>
							</article>
						</div>
					</div>

					<!-- 4. Relaxing Atmosphere Section -->
					<div class="about-stylist-area mb-5">
						<div class="row g-0">
							<div class="col-md-6 full-width-1024">
								<div class="image-column" style="background-image: url('<?= $asset_url ?>images/demo-1/about-img.jpg'); min-height: 320px; background-size: cover; background-position: center; border-radius: 8px 0 0 8px;"></div>
							</div>
							<div class="col-md-6 full-width-1024">
								<div class="stylist-content-box p-4" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.06); border-radius: 0 8px 8px 0;">
									<div class="pbmit-custom-heading">
										<h3 class="pbmit-title mb-3">A Relaxing Atmosphere with Our Passionate Stylists</h3>
									</div>
									<p style="color: rgba(255,255,255,0.7);">We have experience &amp; creativity to deliver a variety of hair and beauty rituals. We’re skilled in handling complex styling, cutting, and coloring needs with precision &amp; care.</p>
									<ul class="list-group">
										<li class="list-group-item bg-transparent text-white border-0 px-0 d-flex align-items-center gap-2">
											<span class="pbmit-icon-list-icon text-warning"><i class="pbmit-base-icon-check-1"></i></span>
											<span class="pbmit-icon-list-text">Custom tailored styling for your unique look</span>
										</li>
										<li class="list-group-item bg-transparent text-white border-0 px-0 d-flex align-items-center gap-2">
											<span class="pbmit-icon-list-icon text-warning"><i class="pbmit-base-icon-check-1"></i></span>
											<span class="pbmit-icon-list-text">Be able to communicate and consult closely with clients</span>
										</li>
										<li class="list-group-item bg-transparent text-white border-0 px-0 d-flex align-items-center gap-2">
											<span class="pbmit-icon-list-icon text-warning"><i class="pbmit-base-icon-check-1"></i></span>
											<span class="pbmit-icon-list-text">Cut, style, and groom all hair textures &amp; lengths</span>
										</li>
										<li class="list-group-item bg-transparent text-white border-0 px-0 d-flex align-items-center gap-2">
											<span class="pbmit-icon-list-icon text-warning"><i class="pbmit-base-icon-check-1"></i></span>
											<span class="pbmit-icon-list-text">Proficient with shears, razors, and balayage techniques</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<!-- 5. Bottom Booking CTA (NO FAQ Section as requested) -->
					<div class="p-4 rounded text-center" style="background: rgba(198,172,115,0.08); border: 1px solid rgba(198,172,115,0.3);">
						<h4 class="text-white mb-2">Book Your <?= htmlspecialchars($svc_title) ?> Session Today</h4>
						<p class="text-white-50 mb-3">Reserve your personalized consultation and transformation with our senior stylists.</p>
						<a href="<?= $booking_page_url ?>" class="pbmit-btn">
							<span class="pbmit-button-text">Book Appointment Now</span>
						</a>
					</div>

				</div>

			</div>
		</div>
	</section>

<?php elseif ($curr_layout == 2): ?>
	<!-- ============================================================== -->
	<!-- LAYOUT 2: LUXURY BOUTIQUE STYLE (Content Left, Sidebar Right)   -->
	<!-- ============================================================== -->
	<section class="site-content service-details pbmit-layout-2-detail py-5">
		<div class="container">
			<div class="row g-4 g-lg-5">

				<!-- Main Content Column (Left Side for Luxury Boutique Style) -->
				<div class="col-lg-8 order-lg-1">

					<!-- 1. Luxury Boutique Feature Image Card -->
					<div class="position-relative overflow-hidden mb-4" style="border-radius: 16px; border: 1px solid rgba(198,172,115,0.25); box-shadow: 0 16px 36px rgba(0,0,0,0.5);">
						<img src="<?= htmlspecialchars($svc_img) ?>" class="img-fluid w-100" alt="<?= htmlspecialchars($svc_title) ?>" style="max-height: 500px; width: 100%; object-fit: cover;">
						
						<!-- Floating Gold Luxury Pill -->
						<div class="position-absolute d-flex align-items-center gap-3" style="bottom: 20px; right: 20px; background: rgba(17,24,39,0.92); backdrop-filter: blur(10px); border: 1px solid #c6ac73; border-radius: 30px; padding: 10px 22px; box-shadow: 0 8px 24px rgba(0,0,0,0.6);">
							<?php if (!empty($svc_price)): ?>
								<span style="color: #c6ac73; font-weight: 700; font-size: 18px;"><?= htmlspecialchars($svc_price) ?></span>
							<?php endif; ?>
							<?php if (!empty($svc_price) && !empty($svc_duration)): ?>
								<span style="color: rgba(255,255,255,0.3);">|</span>
							<?php endif; ?>
							<?php if (!empty($svc_duration)): ?>
								<span style="color: #e5e7eb; font-size: 14px;"><i class="far fa-clock text-warning me-1"></i><?= htmlspecialchars($svc_duration) ?></span>
							<?php endif; ?>
						</div>

						<?php if (!empty($catalog_default['category'])): ?>
							<div class="position-absolute" style="top: 20px; left: 20px;">
								<span class="badge" style="background: rgba(198,172,115,0.95); color: #0b0f19; font-weight: 700; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; padding: 6px 16px; border-radius: 20px;">
									<?= htmlspecialchars($catalog_default['category']) ?>
								</span>
							</div>
						<?php endif; ?>
					</div>

					<!-- Luxury Actions Ribbon -->
					<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 p-4 mb-4" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 14px;">
						<div>
							<h4 class="text-white mb-1" style="font-size: 20px; font-weight: 600;"><?= htmlspecialchars($svc_title) ?></h4>
							<p class="text-white-50 small mb-0">Exclusive salon ritual designed for your personal transformation.</p>
						</div>
						<a href="<?= $booking_page_url ?>" class="pbmit-btn" style="border-radius: 30px; padding: 10px 24px;">
							<span class="pbmit-button-text">Book Appointment</span>
						</a>
					</div>

					<!-- 2. Superadmin Description in Luxury Boutique Container -->
					<div class="p-4 p-md-5 mb-5" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
						<div class="d-flex align-items-center gap-3 mb-4 pb-2" style="border-bottom: 1px solid rgba(255,255,255,0.06);">
							<span style="display: inline-block; width: 4px; height: 26px; background: #c6ac73; border-radius: 2px;"></span>
							<h3 class="text-white mb-0" style="font-size: 24px; font-weight: 600;">Description Of The Service</h3>
						</div>
						<div class="pbmit-service-desc-text" style="font-size: 16px; line-height: 1.85; color: rgba(255,255,255,0.82);">
							<?= !empty($svc_desc) ? $svc_desc : '<p>' . nl2br(htmlspecialchars($svc_short)) . '</p>' ?>
						</div>
					</div>

					<!-- 3. Safety Precautions in Luxury Boutique Cards -->
					<div class="mb-5">
						<div class="d-flex align-items-center gap-3 mb-3">
							<span style="display: inline-block; width: 4px; height: 24px; background: #c6ac73; border-radius: 2px;"></span>
							<h3 class="text-white mb-0" style="font-size: 22px; font-weight: 600;">Boutique Safety &amp; Care Standards</h3>
						</div>
						<p class="text-white-50 mb-4">Every appointment is crafted with strict hospital-grade cleanliness, pristine botanical solutions, and attentive master care.</p>
						<div class="row g-3">
							<div class="col-md-4">
								<div class="p-4 h-100 text-center" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 12px; transition: transform 0.3s ease;">
									<div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 50%; background: rgba(198,172,115,0.15); border: 1px solid rgba(198,172,115,0.4); color: #c6ac73; font-size: 20px;">
										<i class="fas fa-leaf"></i>
									</div>
									<h5 class="text-white mb-2" style="font-size: 16px;">Pure Botanicals</h5>
									<p class="text-white-50 small mb-0">Organic nutrient formulas that nurture without compromise.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-4 h-100 text-center" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 12px; transition: transform 0.3s ease;">
									<div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 50%; background: rgba(198,172,115,0.15); border: 1px solid rgba(198,172,115,0.4); color: #c6ac73; font-size: 20px;">
										<i class="fas fa-certificate"></i>
									</div>
									<h5 class="text-white mb-2" style="font-size: 16px;">Master Artists</h5>
									<p class="text-white-50 small mb-0">Editorial stylists with extensive boutique experience.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-4 h-100 text-center" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 12px; transition: transform 0.3s ease;">
									<div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 50%; background: rgba(198,172,115,0.15); border: 1px solid rgba(198,172,115,0.4); color: #c6ac73; font-size: 20px;">
										<i class="fas fa-shield-alt"></i>
									</div>
									<h5 class="text-white mb-2" style="font-size: 16px;">Sanitized Suites</h5>
									<p class="text-white-50 small mb-0">Sterilized tools and pristine individual styling suites.</p>
								</div>
							</div>
						</div>
					</div>

					<!-- 4. Atmosphere Area -->
					<div class="p-4 mb-5" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 16px;">
						<div class="row align-items-center g-4">
							<div class="col-md-5">
								<img src="<?= $asset_url ?>images/demo-1/about-img.jpg" class="img-fluid rounded" alt="Stylists" style="border-radius: 12px; object-fit: cover; width: 100%; max-height: 240px;">
							</div>
							<div class="col-md-7">
								<h4 class="text-white mb-2" style="font-size: 20px;">A Serene Sanctuary for Your Hair</h4>
								<p class="text-white-50 small mb-3">Immerse yourself in our tranquil salon ambiance where every detail is tailored for calm relaxation and breathtaking transformations.</p>
								<ul class="list-unstyled mb-0">
									<li class="text-white-50 small mb-2 d-flex align-items-center gap-2">
										<i class="fas fa-check-circle text-warning"></i>
										<span>One-on-one personal stylist consultation</span>
									</li>
									<li class="text-white-50 small mb-2 d-flex align-items-center gap-2">
										<i class="fas fa-check-circle text-warning"></i>
										<span>Complimentary organic tea &amp; refreshments</span>
									</li>
									<li class="text-white-50 small d-flex align-items-center gap-2">
										<i class="fas fa-check-circle text-warning"></i>
										<span>Tailored post-care ritual guidelines</span>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- 5. Luxury Booking Banner -->
					<div class="p-4 p-md-5 rounded-4 text-center position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(198,172,115,0.12) 0%, rgba(17,24,39,0.95) 100%); border: 1px solid rgba(198,172,115,0.35); border-radius: 16px;">
						<span style="color: #c6ac73; font-size: 12px; text-transform: uppercase; letter-spacing: 2px; font-weight: 700; display: block; margin-bottom: 8px;">BESPOKE APPOINTMENTS</span>
						<h3 class="text-white mb-2" style="font-size: 24px; font-weight: 600;">Reserve Your <?= htmlspecialchars($svc_title) ?> Experience</h3>
						<p class="text-white-50 mb-4" style="max-width: 520px; margin-inline: auto;">Our senior beauty artisans are available for private consultations and transformations.</p>
						<a href="<?= $booking_page_url ?>" class="pbmit-btn" style="border-radius: 30px; padding: 12px 32px;">
							<span class="pbmit-button-text">Book Appointment Now</span>
						</a>
					</div>

				</div>

				<!-- Sidebar Column (Right Side for Luxury Boutique Style) -->
				<div class="col-lg-4 order-lg-2">
					<div class="position-sticky" style="top: 100px;">

						<!-- Luxury Boutique "Our Services" Card -->
						<div class="p-4 mb-4" style="background: #111827; border: 1px solid rgba(198,172,115,0.25); border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
							<div class="mb-4 pb-3" style="border-bottom: 1px solid rgba(198,172,115,0.2);">
								<span style="color: #c6ac73; font-size: 11px; text-transform: uppercase; letter-spacing: 2px; font-weight: 700; display: block; margin-bottom: 4px;">EXCLUSIVE MENU</span>
								<h3 style="color: #fff; font-size: 22px; font-weight: 600; margin: 0;">Our Services</h3>
							</div>

							<div class="d-flex flex-column gap-2">
								<?php foreach ($sidebar_services as $s_item): 
									$is_active = ($s_item['slug'] === $svc_slug || $s_item['title'] === $svc_title);
									$s_url = website_url('service/' . $s_item['slug'] . '?preview_tpl=' . $preview_tpl . '&preview_layout=2');
								?>
									<a href="<?= $s_url ?>" class="d-flex align-items-center justify-content-between p-3 text-decoration-none" style="border-radius: 10px; transition: all 0.3s ease; <?= $is_active ? 'background: linear-gradient(135deg, #c6ac73 0%, #aa8b45 100%); color: #0b0f19; font-weight: 700; box-shadow: 0 4px 15px rgba(198,172,115,0.35);' : 'background: rgba(255,255,255,0.03); color: #e5e7eb; border: 1px solid rgba(255,255,255,0.06);' ?>">
										<span style="font-size: 15px;"><?= htmlspecialchars($s_item['title']) ?></span>
										<i class="fas <?= $is_active ? 'fa-arrow-right text-dark' : 'fa-chevron-right text-warning' ?>" style="font-size: 13px;"></i>
									</a>
								<?php endforeach; ?>
							</div>
						</div>

						<!-- Luxury Boutique Contact Card -->
						<div class="p-4 text-center" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 16px;">
							<div class="mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border-radius: 50%; background: rgba(198,172,115,0.1); border: 1px solid rgba(198,172,115,0.3); color: #c6ac73; font-size: 20px;">
								<i class="fas fa-phone-alt"></i>
							</div>
							<h5 class="text-white mb-1" style="font-size: 17px;">Need Assistance?</h5>
							<p class="text-white-50 small mb-3">Speak directly with our concierge team for custom appointments.</p>
							<a href="tel:+1123456789" class="text-warning text-decoration-none fw-bold d-block mb-3" style="font-size: 16px;">
								+1-123-456-789
							</a>
							<a href="<?= $booking_page_url ?>" class="btn btn-sm btn-outline-warning w-100 py-2" style="border-radius: 20px;">
								Schedule Visit
							</a>
						</div>

					</div>
				</div>

			</div>
		</div>
	</section>

<?php else: /* layout 3 */ ?>
	<!-- ============================================================== -->
	<!-- LAYOUT 3: MODERN SALON STYLE (High Contrast, Numbered List)    -->
	<!-- ============================================================== -->
	<section class="site-content service-details pbmit-layout-3-detail py-5">
		<div class="container">
			<div class="row g-4 g-lg-5">

				<!-- Sidebar Column (Left Side with Modern Numbered List) -->
				<div class="col-lg-4 col-md-5">
					<div class="position-sticky" style="top: 100px;">

						<!-- Modern Numbered Services Card -->
						<div class="p-4 mb-4" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px;">
							<div class="d-flex justify-content-between align-items-baseline mb-4 pb-3" style="border-bottom: 2px solid rgba(198,172,115,0.4);">
								<h3 style="color: #fff; font-size: 20px; font-weight: 700; letter-spacing: 0.5px; margin: 0; text-transform: uppercase;">Our Services</h3>
								<span style="color: #c6ac73; font-family: monospace; font-size: 12px; font-weight: 700;">#01 - #<?= sprintf('%02d', count($sidebar_services)) ?></span>
							</div>

							<div class="d-flex flex-column gap-2">
								<?php foreach ($sidebar_services as $i => $s_item): 
									$is_active = ($s_item['slug'] === $svc_slug || $s_item['title'] === $svc_title);
									$s_url = website_url('service/' . $s_item['slug'] . '?preview_tpl=' . $preview_tpl . '&preview_layout=3');
									$num_str = sprintf('%02d', $i + 1);
								?>
									<a href="<?= $s_url ?>" class="d-flex align-items-center justify-content-between p-3 text-decoration-none" style="border-radius: 2px; transition: all 0.25s ease; <?= $is_active ? 'background: rgba(198,172,115,0.12); color: #fff; border-left: 4px solid #c6ac73; border-top: 1px solid rgba(198,172,115,0.3); border-right: 1px solid rgba(198,172,115,0.3); border-bottom: 1px solid rgba(198,172,115,0.3); font-weight: 600;' : 'background: rgba(255,255,255,0.02); color: rgba(255,255,255,0.7); border: 1px solid rgba(255,255,255,0.05);' ?>">
										<div class="d-flex align-items-center gap-3">
											<span style="font-family: monospace; font-size: 13px; color: <?= $is_active ? '#c6ac73' : 'rgba(255,255,255,0.4)' ?>; font-weight: 700;">[ <?= $num_str ?> ]</span>
											<span style="font-size: 15px;"><?= htmlspecialchars($s_item['title']) ?></span>
										</div>
										<i class="fas fa-arrow-right" style="font-size: 12px; color: <?= $is_active ? '#c6ac73' : 'rgba(255,255,255,0.2)' ?>;"></i>
									</a>
								<?php endforeach; ?>
							</div>
						</div>

						<!-- Modern Working Hours Card -->
						<div class="p-4" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px;">
							<span style="color: #c6ac73; font-family: monospace; font-size: 12px; letter-spacing: 1px; font-weight: 700; text-transform: uppercase;">SALON HOURS</span>
							<h5 class="text-white mt-1 mb-3" style="font-size: 18px; font-weight: 600;">Mon - Sat: 09:00 - 20:00</h5>
							<p class="text-white-50 small mb-3">Sunday: 10:00 - 18:00. Walk-ins welcome based on availability.</p>
							<a href="<?= $booking_page_url ?>" class="btn btn-warning w-100 py-2 fw-bold text-dark" style="border-radius: 2px;">
								Instant Booking
							</a>
						</div>

					</div>
				</div>

				<!-- Main Content Column (Right Side for Modern Salon Style) -->
				<div class="col-lg-8 col-md-7">

					<!-- 1. Modern Image with Circular Overlay Badge -->
					<div class="position-relative overflow-hidden mb-4" style="border: 2px solid rgba(255,255,255,0.1); border-radius: 4px;">
						<img src="<?= htmlspecialchars($svc_img) ?>" class="img-fluid w-100" alt="<?= htmlspecialchars($svc_title) ?>" style="max-height: 480px; width: 100%; object-fit: cover;">
						
						<!-- Floating Circular Icon Badge matching Modern Style 3 -->
						<div class="position-absolute d-flex align-items-center justify-content-center" style="bottom: 24px; left: 24px; width: 72px; height: 72px; border-radius: 50%; background: #0b0f19; border: 2px solid #c6ac73; box-shadow: 0 10px 25px rgba(0,0,0,0.7); padding: 16px;">
							<?= !empty($current_icon_svg) ? $current_icon_svg : '<i class="fas fa-sparkles text-warning" style="font-size: 24px;"></i>' ?>
						</div>

						<div class="position-absolute" style="top: 20px; right: 20px;">
							<span class="badge" style="background: #0b0f19; color: #c6ac73; border: 1px solid #c6ac73; font-family: monospace; font-size: 14px; padding: 6px 14px; border-radius: 2px;">
								SIGNATURE CARE
							</span>
						</div>
					</div>

					<!-- Modern Info Strip -->
					<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 p-3 mb-4" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px;">
						<div class="d-flex align-items-center gap-3">
							<?php if (!empty($svc_price)): ?>
								<span class="badge" style="background: #c6ac73; color: #0b0f19; font-size: 16px; font-weight: 700; padding: 7px 16px; border-radius: 2px;">
									<?= htmlspecialchars($svc_price) ?>
								</span>
							<?php endif; ?>
							<?php if (!empty($svc_duration)): ?>
								<span class="text-white" style="font-size: 14px; font-family: monospace;">
									<i class="far fa-clock text-warning me-1"></i><?= htmlspecialchars($svc_duration) ?>
								</span>
							<?php endif; ?>
						</div>
						<a href="<?= $booking_page_url ?>" class="pbmit-btn" style="border-radius: 2px;">
							<span class="pbmit-button-text">Book Appointment</span>
						</a>
					</div>

					<!-- 2. Superadmin Description in Modern Editorial Section -->
					<div class="p-4 p-md-5 mb-5" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px;">
						<span style="color: #c6ac73; font-family: monospace; font-size: 12px; letter-spacing: 1px; font-weight: 700; text-transform: uppercase;">// SERVICE OVERVIEW</span>
						<h2 class="text-white mt-1 mb-4" style="font-size: 26px; font-weight: 700;"><?= htmlspecialchars($svc_title) ?></h2>
						
						<div class="pbmit-service-desc-text" style="font-size: 16px; line-height: 1.85; color: rgba(255,255,255,0.8);">
							<?= !empty($svc_desc) ? $svc_desc : '<p>' . nl2br(htmlspecialchars($svc_short)) . '</p>' ?>
						</div>
					</div>

					<!-- 3. Modern Grid Precautions -->
					<div class="mb-5">
						<span style="color: #c6ac73; font-family: monospace; font-size: 12px; letter-spacing: 1px; font-weight: 700; text-transform: uppercase;">// RIGOROUS STANDARDS</span>
						<h3 class="text-white mt-1 mb-4" style="font-size: 22px; font-weight: 700;">Precision &amp; Quality Assured</h3>

						<div class="row g-3">
							<div class="col-md-4">
								<div class="p-4 h-100" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 2px;">
									<span style="color: #c6ac73; font-family: monospace; font-size: 12px; font-weight: 700;">01. FORMULA</span>
									<h5 class="text-white mt-2 mb-2" style="font-size: 16px; font-weight: 600;">Organic Elements</h5>
									<p class="text-white-50 small mb-0">Clean cruelty-free formulations tested for optimal hair vitality.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-4 h-100" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 2px;">
									<span style="color: #c6ac73; font-family: monospace; font-size: 12px; font-weight: 700;">02. TALENT</span>
									<h5 class="text-white mt-2 mb-2" style="font-size: 16px; font-weight: 600;">Certified Masters</h5>
									<p class="text-white-50 small mb-0">Trained internationally across contemporary cutting &amp; color methods.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-4 h-100" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 2px;">
									<span style="color: #c6ac73; font-family: monospace; font-size: 12px; font-weight: 700;">03. SAFETY</span>
									<h5 class="text-white mt-2 mb-2" style="font-size: 16px; font-weight: 600;">Clinical Hygiene</h5>
									<p class="text-white-50 small mb-0">Continuous autoclave sterilization ensuring peak hygiene at every station.</p>
								</div>
							</div>
						</div>
					</div>

					<!-- 4. Modern Stylist Section -->
					<div class="p-4 mb-5" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px;">
						<div class="row align-items-center g-4">
							<div class="col-md-5">
								<img src="<?= $asset_url ?>images/demo-1/about-img.jpg" class="img-fluid" alt="Stylists" style="border-radius: 2px; object-fit: cover; width: 100%; max-height: 240px;">
							</div>
							<div class="col-md-7">
								<span style="color: #c6ac73; font-family: monospace; font-size: 12px; letter-spacing: 1px; font-weight: 700; text-transform: uppercase;">EXPERTISE &amp; VISION</span>
								<h4 class="text-white mt-1 mb-2" style="font-size: 20px; font-weight: 700;">Dedicated to Exceptional Craft</h4>
								<p class="text-white-50 small mb-3">Our styling artists combine technical discipline with contemporary creative flair to deliver tailored aesthetics.</p>
								<ul class="list-unstyled mb-0">
									<li class="text-white-50 small mb-2 d-flex align-items-center gap-2">
										<i class="fas fa-check text-warning"></i>
										<span>Bespoke consultations tailored to personal facial silhouette</span>
									</li>
									<li class="text-white-50 small mb-2 d-flex align-items-center gap-2">
										<i class="fas fa-check text-warning"></i>
										<span>Advanced multi-tonal color &amp; texture refinement</span>
									</li>
									<li class="text-white-50 small d-flex align-items-center gap-2">
										<i class="fas fa-check text-warning"></i>
										<span>Signature post-service styling and blow-dry finish</span>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- 5. Modern Salon Booking Banner -->
					<div class="p-4 p-md-5 text-center position-relative overflow-hidden" style="background: #0f1523; border: 2px solid rgba(198,172,115,0.3); border-radius: 4px;">
						<span style="color: #c6ac73; font-family: monospace; font-size: 12px; letter-spacing: 2px; font-weight: 700; text-transform: uppercase;">// RESERVATIONS</span>
						<h3 class="text-white mt-1 mb-2" style="font-size: 24px; font-weight: 700;">Book Your <?= htmlspecialchars($svc_title) ?> Today</h3>
						<p class="text-white-50 mb-4" style="max-width: 500px; margin-inline: auto;">Select your preferred date, time, and senior stylist in just a few clicks.</p>
						<a href="<?= $booking_page_url ?>" class="pbmit-btn" style="border-radius: 2px; padding: 12px 32px;">
							<span class="pbmit-button-text">Book Appointment Now</span>
						</a>
					</div>

				</div>

			</div>
		</div>
	</section>
<?php endif; ?>

</div>
