<?php
$blog_title = isset($blog) && $blog ? $blog->title : 'Skincare Secrets for a Natural Daily Glow';
$blog_content = isset($blog) && $blog ? $blog->content : '';
$blog_short = isset($blog) && $blog ? $blog->short_desc : '';
$blog_author = isset($blog) && $blog ? $blog->author_name : 'Admin';
$blog_date = isset($blog) && $blog ? $blog->published_date : date('Y-m-d');
$blog_thumb = isset($blog) && !empty($blog->thumbnail) ? $blog->thumbnail : 'assets/template2/images/blog/blog-details-img-1.jpg';
$blog_tags_str = isset($blog) && $blog ? $blog->tags : 'Skincare, Beauty, Wellness';
$blog_tags = array_map('trim', explode(',', $blog_tags_str));

$thumb_src = fallback_image_url($blog_thumb, 'assets/template2/images/blog/blog-details-img-1.jpg');
$home_url = website_url();

$site_logo_url = function_exists('site_logo_url') ? site_logo_url() : base_url('uploads/branding/logo.webp');
$site_logo = $site_logo_url;

$site_fav_url = function_exists('site_favicon_url') ? site_favicon_url() : base_url('uploads/branding/codeulas_logo_small.webp');
$site_fav = $site_fav_url;

// Parse date into day & month
$time_ts = strtotime($blog_date);
$day_num = date('d', $time_ts);
$month_str = date('M', $time_ts);
?>
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
                                <div class="blog-details__text-1 blog-rich-text mb-4">
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
                                            $rb_thumb = fallback_image_url($rb->thumbnail, 'assets/template2/images/blog/blog-v1-img1.jpg');
                                            $rb_url = website_url('blog/' . $rb->slug);
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