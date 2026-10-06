<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$items = !empty($tpl_services) ? $tpl_services : (!empty($services) ? $services : []);
?>

<!--Services One Start -->
<section class="services-one services-one--services">
    <div class="container">
        <div class="row">
            <?php if (!empty($items)): ?>
                <?php foreach ($items as $index => $svc): 
                    $svc_title = isset($svc->title) ? $svc->title : (isset($svc->name) ? $svc->name : 'Service');
                    $svc_slug = !empty($svc->slug) ? $svc->slug : (isset($svc->id) ? $svc->id : '');
                    $svc_url = website_url('service/' . $svc_slug);
                    $svc_desc = !empty($svc->short_desc) ? $svc->short_desc : (!empty($svc->description) ? strip_tags($svc->description) : 'Botanical brightening serum infusion to revive fatigued complexion.');
                    if (mb_strlen($svc_desc) > 130) {
                        $svc_desc = mb_substr($svc_desc, 0, 127) . '...';
                    }
                    $svc_icon = !empty($svc->icon) ? $svc->icon : (!empty($svc->icon_class) ? $svc->icon_class : 'icon-botox');

                    // Image resolving
                    $raw_img = !empty($svc->thumbnail) ? $svc->thumbnail : (!empty($svc->image) ? $svc->image : '');
                    if (!empty($raw_img) && (strpos($raw_img, 'http://') === 0 || strpos($raw_img, 'https://') === 0)) {
                        $svc_img = $raw_img;
                    } elseif (!empty($raw_img) && (strpos($raw_img, 'uploads/') === 0 || strpos($raw_img, 'assets/') === 0)) {
                        $svc_img = base_url($raw_img);
                    } elseif (!empty($raw_img)) {
                        $svc_img = base_url('uploads/' . ltrim($raw_img, '/'));
                    } else {
                        $svc_img = base_url('assets/template2/images/services/services-1-' . (($index % 6) + 1) . '.jpg');
                    }
                    $delay = (($index % 3) + 1) * 100;
                ?>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="<?= $delay ?>ms">
                    <div class="services-one__single">
                        <div class="services-one__img">
                            <img src="<?= htmlspecialchars($svc_img) ?>" alt="<?= htmlspecialchars($svc_title) ?>" style="height: 260px; width: 100%; object-fit: cover;">
                        </div>
                        <div class="services-one__content">
                            <div class="services-one__icon">
                                <span class="<?= htmlspecialchars($svc_icon) ?>"></span>
                            </div>
                            <h3 class="services-one__title"><a href="<?= $svc_url ?>"><?= htmlspecialchars($svc_title) ?></a></h3>
                            <p class="services-one__text"><?= htmlspecialchars($svc_desc) ?></p>
                            <a href="<?= $svc_url ?>" class="services-one__btn">Read More <span class="icon-right-arrow"></span> </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No services found at this time.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--Services One End -->
