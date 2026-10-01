<?php
$blog_title = isset($blog) && $blog ? $blog->title : 'Skincare Secrets for a Natural Daily Glow';
$blog_content = isset($blog) && $blog ? $blog->content : '';
$blog_short = isset($blog) && $blog ? $blog->short_desc : '';
$blog_author = isset($blog) && $blog ? $blog->author_name : 'Admin';
$blog_date = isset($blog) && $blog ? $blog->published_date : date('Y-m-d');
$blog_thumb = isset($blog) && !empty($blog->thumbnail) ? $blog->thumbnail : 'assets/template2/images/blog/blog-details-img-1.jpg';
$blog_tags_str = isset($blog) && $blog ? $blog->tags : 'Skincare, Beauty, Wellness';
$blog_tags = array_map('trim', explode(',', $blog_tags_str));

$root_url = rtrim(base_url(), '/') . '/';
$thumb_src = strpos($blog_thumb, 'http') === 0 ? $blog_thumb : $root_url . ltrim($blog_thumb, '/');
$home_url = website_url('?preview_tpl=template2&preview_layout=' . (isset($active_home_layout) ? $active_home_layout : 1));

// Parse date into day & month
$time_ts = strtotime($blog_date);
$day_num = date('d', $time_ts);
$month_str = date('M', $time_ts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($blog_title) ?> - Pureglow Journal</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $asset_url ?>images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $asset_url ?>images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $asset_url ?>images/favicons/favicon-16x16.png" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prata&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=My+Soul&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= $asset_url ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/animate.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/custom-animate.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/swiper.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/font-awesome-all.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/jarallax.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/odometer.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= $asset_url ?>css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/nice-select.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/jquery-ui.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/aos.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/timePicker.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/twentytwenty.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="<?= $asset_url ?>css/style.css" />
    <link rel="stylesheet" href="<?= $asset_url ?>css/responsive.css" />
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="page-wrapper">
        <!-- Main Header Two -->
        <header class="main-header-two">
            <div class="main-menu-two__top">
                <div class="main-menu-two__top-inner">
                    <ul class="list-unstyled main-menu-two__contact-list">
                        <li>
                            <div class="icon">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="text">
                                <p><a href="tel:25632542478">+1 (555) 345-6789</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="text">
                                <p><a href="mailto:info@pureglowspa.com">info@pureglowspa.com</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="far fa-map-marker-alt"></i>
                            </div>
                            <div class="text">
                                <p>742 Evergreen Terrace, Suite 100, New York</p>
                            </div>
                        </li>
                    </ul>

                    <div class="main-menu-two__top-right-content">
                        <div class="main-menu-two__top-right">
                            <div class="main-menu-two__time">
                                <div class="main-menu-two__time-icon">
                                    <span class="icon-clock"></span>
                                </div>
                                <p class="main-menu-two__time-text">Mon - Sat: 09:00 - 19:00</p>
                            </div>
                            <div class="main-menu-two__social-box">
                                <p class="main-menu-two__social-title">Follow Us On:</p>
                                <div class="main-menu-two__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="main-menu main-menu-two">
                <div class="main-menu-two__wrapper">
                    <div class="main-menu-two__wrapper-inner">
                        <div class="main-menu-two__left">
                            <div class="main-menu-two__logo">
                                <a href="<?= $home_url ?>"><img src="<?= $asset_url ?>images/resources/logo-1.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="main-menu-two__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li>
                                    <a href="<?= $home_url ?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?= website_url('about?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">About</a>
                                </li>
                                <li>
                                    <a href="<?= website_url('services?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">Services</a>
                                </li>
                                <li>
                                    <a href="<?= website_url('contact?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-menu-two__right">
                            <!-- Strictly NO search icon in header -->
                            <div class="main-menu-two__btn-box">
                                <a class="thm-btn" href="<?= website_url('booking') ?>">Book Appointment
                                    <span class="fas fa-arrow-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu main-menu-two">
            <div class="sticky-header__content"></div>
        </div>

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(<?= $asset_url ?>images/backgrounds/page-header-bg.jpg);"></div>
            <div class="shape1 float-bob-y"><img src="<?= $asset_url ?>images/shapes/page-header-shape1.png" alt=""></div>
            <div class="shape2 float-bob-y"><img src="<?= $asset_url ?>images/shapes/page-header-shape2.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Blog Article</h2>
                    <div class="thm-breadcrumb__inner">
                        <ul class="thm-breadcrumb">
                            <li><a href="<?= $home_url ?>">Home</a></li>
                            <li><span>//</span></li>
                            <li><a href="<?= $home_url ?>#blog">Journal</a></li>
                            <li><span>//</span></li>
                            <li><?= htmlspecialchars($blog_title) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Blog Details Start -->
        <section class="blog-details">
            <div class="container">
                <div class="row">
                    <!--Blog Details Left Start -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details__left">
                            <div class="blog-details__img mb-4">
                                <img src="<?= htmlspecialchars($thumb_src) ?>" alt="<?= htmlspecialchars($blog_title) ?>" class="img-fluid rounded" style="width: 100%; max-height: 480px; object-fit: cover;">
                                <div class="blog-details__date">
                                    <p><?= $day_num ?><br><?= $month_str ?></p>
                                </div>
                            </div>
                            <div class="blog-details__content">
                                <div class="blog-details__user-and-meta mb-3">
                                    <div class="blog-details__user">
                                        <p><span class="fas fa-user"></span>By <?= htmlspecialchars($blog_author) ?></p>
                                    </div>
                                    <ul class="blog-details__meta list-unstyled">
                                        <li>
                                            <span class="fas fa-calendar me-1"></span><?= htmlspecialchars($blog_date) ?>
                                        </li>
                                    </ul>
                                </div>
                                <h2 class="blog-details__title mb-3"><?= htmlspecialchars($blog_title) ?></h2>
                                
                                <?php if (!empty($blog_short)): ?>
                                    <div class="p-3 rounded mb-4" style="background: rgba(194, 153, 88, 0.1); border-left: 4px solid #c29958;">
                                        <p class="mb-0 fw-semibold text-dark" style="font-size: 1.1rem; line-height: 1.7;"><?= htmlspecialchars($blog_short) ?></p>
                                    </div>
                                <?php endif; ?>

                                <!-- Main Formatted Content from WYSIWYG Editor -->
                                <div class="blog-details__text-1 mb-4" style="line-height: 1.8;">
                                    <?= $blog_content ?>
                                </div>

                                <div class="blog-details__tag-and-share mt-4 pt-3 border-top">
                                    <div class="blog-details__tag">
                                        <h3 class="blog-details__tag-title">Tags:</h3>
                                        <ul class="blog-details__tag-list list-unstyled">
                                            <?php foreach ($blog_tags as $bt): ?>
                                                <?php if (!empty($bt)): ?>
                                                    <li><a href="#"><?= htmlspecialchars($bt) ?></a></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="blog-details__share-box">
                                        <h3 class="blog-details__share-title">Share:</h3>
                                        <div class="blog-details__share">
                                            <a href="#"><span class="fab fa-facebook-f"></span></a>
                                            <a href="#"><span class="fab fa-twitter"></span></a>
                                            <a href="#"><span class="fab fa-pinterest-p"></span></a>
                                            <a href="#"><span class="fab fa-instagram"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Sidebar (Right Column) - STRICTLY NO SEARCH -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <!-- Strictly NO search widget -->

                            <!-- Recent Posts -->
                            <?php if (!empty($recent_blogs)): ?>
                                <div class="sidebar__single sidebar__post">
                                    <div class="sidebar__title-box">
                                        <h2>Recent Posts</h2>
                                    </div>
                                    <ul class="sidebar__post-list list-unstyled">
                                        <?php foreach ($recent_blogs as $rb): 
                                            $rb_thumb = strpos($rb->thumbnail, 'http') === 0 ? $rb->thumbnail : $root_url . ltrim($rb->thumbnail, '/');
                                            $rb_url = website_url('blog/' . $rb->slug . '?preview_tpl=template2&preview_layout=' . $active_home_layout);
                                        ?>
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="<?= htmlspecialchars($rb_thumb) ?>" alt="<?= htmlspecialchars($rb->title) ?>" style="width: 70px; height: 70px; object-fit: cover;">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <p class="sidebar__post-date"><span class="icon-calendar"></span><?= date('F d, Y', strtotime($rb->published_date)) ?></p>
                                                    <h3 class="sidebar__post-title">
                                                        <a href="<?= $rb_url ?>"><?= htmlspecialchars($rb->title) ?></a>
                                                    </h3>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <!-- Categories -->
                            <div class="sidebar__single sidebar__categories">
                                <div class="sidebar__title-box">
                                    <h2>Categories</h2>
                                </div>
                                <div class="sidebar__categories-box">
                                    <ul class="sidebar__categories-list list-unstyled">
                                        <?php foreach ($categories as $cat): ?>
                                            <li>
                                                <a href="<?= $home_url ?>#blog"><?= htmlspecialchars($cat) ?><span class="icon-right-arrow"></span></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                            <!-- Tags Cloud -->
                            <div class="sidebar__single sidebar__categories">
                                <div class="sidebar__title-box">
                                    <h2>Tags Cloud</h2>
                                </div>
                                <ul class="sidebar__tags-list clearfix list-unstyled">
                                    <li><a href="#">Healthy Skin</a></li>
                                    <li><a href="#">Beauty</a></li>
                                    <li><a href="#">Self Care</a></li>
                                    <li><a href="#">Natural Beauty</a></li>
                                    <li><a href="#">Glowing Skin</a></li>
                                    <li><a href="#">Skincare</a></li>
                                    <li><a href="#">Treatment</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Details End-->

        <!--Site Footer Start-->
        <footer class="site-footer">
            <div class="site-footer__top">
                <div class="container">
                    <div class="site-footer__top-inner">
                        <div class="row">
                            <div class="col-xl-4 wow fadeInUp" data-wow-delay="100ms">
                                <div class="footer-widget__about">
                                    <div class="footer-widget__about-logo">
                                        <a href="<?= $home_url ?>"><img src="<?= $asset_url ?>images/resources/logo-2.png" alt=""></a>
                                    </div>
                                    <p class="footer-widget__about-text">We provide a range of professional skincare treatments designed to improve your skin's health and natural beauty.</p>
                                    <div class="footer-widget__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                <div class="footer-widget__link">
                                    <div class="footer-widget__title-box">
                                        <h3 class="footer-widget__title">Quick Links</h3>
                                    </div>
                                    <ul class="footer-widget__link-list list-unstyled">
                                        <li><a href="<?= $home_url ?>">Home</a></li>
                                        <li><a href="<?= website_url('about?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">About Us</a></li>
                                        <li><a href="<?= website_url('services?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">Services</a></li>
                                        <li><a href="<?= website_url('booking') ?>">Book Online</a></li>
                                        <li><a href="<?= website_url('contact?preview_tpl=template2&preview_layout=' . $active_home_layout) ?>">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                                <div class="footer-widget__contact">
                                    <div class="footer-widget__title-box">
                                        <h3 class="footer-widget__title">Contact Info</h3>
                                    </div>
                                    <p class="footer-widget__contact-text">742 Evergreen Terrace, Suite 100, New York</p>
                                    <ul class="footer-widget__contact-list list-unstyled">
                                        <li><span class="fal fa-envelope me-2"></span><a href="mailto:info@pureglowspa.com">info@pureglowspa.com</a></li>
                                        <li><span class="fal fa-phone me-2"></span><a href="tel:15553456789">+1 (555) 345-6789</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="container">
                    <p class="site-footer__bottom-text text-center text-muted">&copy; <?= date('Y') ?> Pureglow Spa &amp; Salon Management. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scroll to Top -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>

    <!-- Scripts -->
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
    <script src="<?= $asset_url ?>js/jquery.nice-select.min.js"></script>
    <script src="<?= $asset_url ?>js/marquee.min.js"></script>
    <script src="<?= $asset_url ?>js/jquery-sidebar-content.js"></script>
    <script src="<?= $asset_url ?>js/aos.js"></script>
    <script src="<?= $asset_url ?>js/script.js"></script>
</body>
</html>
