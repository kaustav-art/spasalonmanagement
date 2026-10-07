<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$asset_url = base_url('assets/template1/');

// Detect current layout (1, 2, or 3)
$curr_layout = !empty($this->input->get('preview_layout')) ? (int)$this->input->get('preview_layout') : (!empty($active_home_layout) ? (int)$active_home_layout : 1);
if (!in_array($curr_layout, array(1, 2, 3))) {
    $curr_layout = 1;
}

$preview_tpl = !empty($this->input->get('preview_tpl')) ? $this->input->get('preview_tpl') : (!empty($active_template) ? $active_template : 'template1');

$blog_title = isset($blog) && $blog ? $blog->title : 'The most effective anti-losing hair care products';
$blog_content = isset($blog) && $blog ? $blog->content : '';
$blog_short = isset($blog) && $blog ? $blog->short_desc : '';
$blog_author = isset($blog) && !empty($blog->author_name) ? $blog->author_name : 'Alex Joy';
$blog_date = isset($blog) && !empty($blog->published_date) ? $blog->published_date : date('Y-m-d');
$blog_thumb = isset($blog) && !empty($blog->thumbnail) ? $blog->thumbnail : 'images/demo-1/blog/blog-img-01.jpg';
$blog_tags_str = isset($blog) && !empty($blog->tags) ? $blog->tags : 'Beauty, Hair Care, Haircut';
$blog_tags = array_filter(array_map('trim', explode(',', $blog_tags_str)));
$primary_tag = !empty($blog_tags) ? reset($blog_tags) : 'Hair Style';

$thumb_src = !empty($blog_thumb) ? ((strpos($blog_thumb, 'http') === 0) ? $blog_thumb : base_url(ltrim($blog_thumb, '/'))) : ($asset_url . 'images/demo-1/blog/blog-img-01.jpg');

$time_ts = strtotime($blog_date);
$day_num = date('d', $time_ts);
$month_str = date('M', $time_ts);
$full_date_str = date('d M Y', $time_ts);
?>

<!-- Title Bar -->
<div class="pbmit-title-bar-wrapper <?= $curr_layout == 2 ? 'pbmit-title-bar-layout-2' : ($curr_layout == 3 ? 'pbmit-title-bar-layout-3' : '') ?>">
	<div class="container">
		<div class="pbmit-title-bar-content">
			<div class="pbmit-title-bar-content-inner">
				<div class="pbmit-tbar">
					<div class="pbmit-tbar-inner">
						<h1 class="pbmit-tbar-title"><?= htmlspecialchars($blog_title) ?></h1>
					</div>
				</div>
				<div class="pbmit-breadcrumb">
					<div class="pbmit-breadcrumb-inner">
						<span>
							<a title="Blog" href="<?= website_url('?preview_tpl=' . $preview_tpl . '&preview_layout=' . $curr_layout . '#blog') ?>" class="home"><span>Blog</span></a>
						</span>
						<span class="sep">
							<i class="pbmit-base-icon-angle-right"></i>
						</span>
						<span><span class="post-root post post-post current-item"><?= htmlspecialchars($blog_title) ?></span></span>
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
	<!-- LAYOUT 1: CLASSIC GLAMR SALON (EXACT TO template1/blog-single-details.html) -->
	<!-- ============================================================== -->
	<section class="site-content blog-details">
		<div class="container">
			<div class="row">
				<!-- Left Column: Blog Content -->
				<div class="col-md-9 blog-left-col">
					<div class="row">
						<div class="col-md-12">
							<article>
								<div class="post blog-classic"> 
									<div class="pbmit-img-wrapper">
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="<?= htmlspecialchars($thumb_src) ?>" class="img-fluid w-100" alt="<?= htmlspecialchars($blog_title) ?>" style="max-height: 520px; object-fit: cover;">
											</div>
										</div>
										<div class="pbmit-meta-date-wrapper">
											<span class="pbmit-date">
												<span class="pbmit-meta pbmit-meta-date">
													<span class="entry-date"><?= $day_num ?> </span>
												</span>
											</span>
											<span class="pbmit-month">
												<span class="pbmit-meta pbmit-meta-date">
													<span class="entry-date"><?= $month_str ?></span>
												</span>
											</span> 
										</div>
									</div>
									<div class="pbmit-blog-classic-inner">
										<div class="pbmit-blog-meta-top-wrapper">
											<div class="pbmit-blog-meta pbmit-blog-meta-top">						
												<span class="pbmit-meta pbmit-meta-author">
													by
													<a class="pbmit-author-link" href="#"><?= htmlspecialchars($blog_author) ?></a>
												</span>
												<span class="pbmit-meta pbmit-meta-cat">
													<i class="pbmit-base-icon-label"></i>
													<a href="#" rel="category tag"><?= htmlspecialchars($primary_tag) ?></a>
												</span>
											</div>
										</div>
										<div class="pbmit-entry-content">
											<?php if (!empty($blog_short)): ?>
												<div class="p-3 mb-4 rounded" style="background: rgba(198,172,115,0.08); border-left: 4px solid #c6ac73;">
													<p class="mb-0 fw-semibold" style="font-size: 1.1rem; line-height: 1.7; color: #fff;"><?= htmlspecialchars($blog_short) ?></p>
												</div>
											<?php endif; ?>

											<?php if (!empty($blog_content)): ?>
												<div class="pbmit-blog-desc-text">
													<?= $blog_content ?>
												</div>
											<?php else: ?>
												<p class="pbmit-firstletter">With various techniques benefiting hair, including cutting, coloring, and treatments, services in salons aim to improve both hair health and style. Hair care is provided <span class="pbmit-global-color">through specialized services like </span> styling, grooming, &amp; straightening. Some salons also offer extensions and texturing, so clients don’t need to visit multiple places.</p>
												<p>Hair salons offer a range of treatments designed to refresh and restore your hair. From deep conditioning to hair spas and scalp therapies, these services help improve texture, shine, and overall hair health. While the effects may be temporary for some, <u class="pbmit-global-color">regular care can lead to stronger,</u> healthier-looking hair over time. Each visit offers a boost of nourishment and a chance to relax.</p>
												<blockquote>
													<p>“In every snip and style, let your passion speak louder than your scissors, leaving clients with more than just great hair a great experience.” </p>
													<cite><?= htmlspecialchars($blog_author) ?></cite>
												</blockquote>
												<p>Haircuts are a core service generally offered in salons. Many also specialize in hair treatments that nourish, restore, and rejuvenate hair, ensuring it stays healthy and vibrant. Additionally, professional hair straightening, extensions, and coloring are offered to create the perfect look, tailored to individual styles and needs.</p>
												<h3 class="pbmit-custom-title">Choosing the Right Treatment for Your Hair</h3>
												<ul class="list-group">
													<li class="list-group-item">
														<span class="pbmit-icon-list-icon">
															<i class="pbmit-base-icon-check-1"></i>					
														</span>
														<span class="pbmit-icon-list-text">Offer loyalty programs where customers earn points for every service they receive.</span>
													</li>
													<li class="list-group-item">
														<span class="pbmit-icon-list-icon">
															<i class="pbmit-base-icon-check-1"></i>				
														</span>
														<span class="pbmit-icon-list-text">These points can then be redeemed for future services, discounts, or other perks.</span>
													</li>
													<li class="list-group-item">
														<span class="pbmit-icon-list-icon">
															<i class="pbmit-base-icon-check-1"></i>				
														</span>
														<span class="pbmit-icon-list-text">Some salons offer exclusive privileges, invitations to events, or discounts on specific services.</span>
													</li>
													<li class="list-group-item">
														<span class="pbmit-icon-list-icon">
															<i class="pbmit-base-icon-check-1"></i>				
														</span>
														<span class="pbmit-icon-list-text">Our salon offers a rewards program with benefits like exclusive privileges and discounts.</span>
													</li>
												</ul>
												<p class="mb-0">Another popular service in many salons is hair care treatments. These services, such as hair straightening, extensions, and professional coloring, are designed to revitalize, nourish, and enhance hair. The effects can vary, offering temporary benefits depending on hair type, environmental factors, and care routines.</p>
											<?php endif; ?>
										</div>
										<div class="pbmit-blog-meta-bottom">
											<div class="pbmit-blog-meta-bottom-left">
												<div class="tagcloud">
													<ul>
														<?php foreach ($blog_tags as $bt): ?>
															<?php if (!empty($bt)): ?>
																<li><a href="#"><?= htmlspecialchars($bt) ?></a></li>
															<?php endif; ?>
														<?php endforeach; ?>
													</ul>
												</div>
											</div>
											<div class="pbmit-blog-meta-bottom-right">
												<div class="pbmit-social-share">
													<ul>
														<li class="pbmit-social-li pbmit-social-li-facebook">
															<a class="pbmit-popup" href="https://www.facebook.com/" title="Share on Facebook">
																<i class="pbmit-base-icon-facebook-squared"></i>
															</a>
														</li>
														<li class="pbmit-social-li pbmit-social-li-twitter">
															<a class="pbmit-popup" href="https://www.twitter.com/" title="Share on X (Twitter)">
																<i class="pbmit-base-icon-twitter-2"></i>
															</a>
														</li>
														<li class="pbmit-social-li pbmit-social-li-linkedin">
															<a class="pbmit-popup" href="https://www.linkedin.com/" title="Share on LinkedIn">
																<i class="pbmit-base-icon-linkedin-squared"></i>
															</a>
														</li>
														<li class="pbmit-social-li pbmit-social-li-instagram">
															<a class="pbmit-popup" href="https://www.instagram.com/" title="Share on Instagram">
																<i class="pbmit-base-icon-instagram"></i>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>   
								</div> 

								<!-- Post Navigation (Previous / Next) -->
								<?php if (!empty($prev_blog) || !empty($next_blog)): ?>
								<nav class="navigation post-navigation">
									<div class="nav-links">
										<?php if (!empty($prev_blog)): 
											$prev_url = website_url('blog/' . ($prev_blog->slug ?: $prev_blog->id) . '?preview_tpl=' . $preview_tpl . '&preview_layout=1');
										?>
											<div class="nav-previous">
												<a href="<?= $prev_url ?>" rel="prev">
													<span class="pbmit-post-nav-icon">
														<i class="pbmit-base-icon-left-vector"></i>
														<span class="pbmit-post-nav-head">Previous Post</span>
													</span>
													<span class="pbmit-post-nav-wrapper">
														<span class="pbmit-post-nav nav-title"><?= htmlspecialchars($prev_blog->title) ?></span> 
													</span>
												</a>
											</div>
										<?php endif; ?>
										<?php if (!empty($next_blog)): 
											$next_url = website_url('blog/' . ($next_blog->slug ?: $next_blog->id) . '?preview_tpl=' . $preview_tpl . '&preview_layout=1');
										?>
											<div class="nav-next">
												<a href="<?= $next_url ?>" rel="next">
													<span class="pbmit-post-nav-icon">
														<span class="pbmit-post-nav-head">Next Post</span>
														<i class="pbmit-base-icon-right-vector"></i>
													</span>
													<span class="pbmit-post-nav-wrapper">
														<span class="pbmit-post-nav nav-title"><?= htmlspecialchars($next_blog->title) ?></span> 
													</span>
												</a>
											</div>
										<?php endif; ?>
									</div>
								</nav>
								<?php endif; ?>

								<!-- Author Box -->
								<div class="pbmit-author-box">
									<div class="pbmit-author-image">
										<img alt="<?= htmlspecialchars($blog_author) ?>" src="<?= $asset_url ?>images/author-img.png" class="avatar">				
									</div>
									<div class="pbmit-author-content">
										<span class="pbmit-author-name">
											<a href="#" title="Posted by <?= htmlspecialchars($blog_author) ?>" rel="author"><?= htmlspecialchars($blog_author) ?></a>
										</span>
										<p class="pbmit-text pbmit-author-bio">There are significant beauty and wellness benefits to switching to natural salon products. For instance, using organic treatments can enhance skin and hair health while reducing exposure to harsh chemicals.</p>
									</div>
								</div>
							</article>
							<!-- STRICTLY NO COMMENTS AREA AS INSTRUCTED -->
						</div> 
					</div>
				</div>

				<!-- Right Column: Sidebar -->
				<div class="col-md-3 blog-right-col">
					<aside class="sidebar">
						<!-- Recent Articles Widget -->
						<?php if (!empty($recent_blogs)): ?>
						<aside class="widget widget-recent-post">
							<h2 class="widget-title">Recent Articles</h2>
							<ul class="recent-post-list">
								<?php foreach ($recent_blogs as $rb): 
									$rb_thumb = !empty($rb->thumbnail) ? ((strpos($rb->thumbnail, 'http') === 0) ? $rb->thumbnail : base_url(ltrim($rb->thumbnail, '/'))) : ($asset_url . 'images/demo-1/blog/blog-img-01.jpg');
									$rb_url = website_url('blog/' . ($rb->slug ?: $rb->id) . '?preview_tpl=' . $preview_tpl . '&preview_layout=1');
									$rb_date = !empty($rb->published_date) ? date('d M  Y', strtotime($rb->published_date)) : date('d M  Y');
								?>
								<li class="recent-post-list-li"> 
									<a class="recent-post-thum" href="<?= $rb_url ?>">
										<img src="<?= htmlspecialchars($rb_thumb) ?>" class="img-fluid" alt="<?= htmlspecialchars($rb->title) ?>" style="width: 70px; height: 70px; object-fit: cover;">
									</a>
									<div class="pbmit-rpw-content">
										<span class="pbmit-rpw-title">
											<a href="<?= $rb_url ?>"><?= htmlspecialchars($rb->title) ?></a>
										</span>
										<span class="pbmit-rpw-date">
											<a href="<?= $rb_url ?>"><?= $rb_date ?></a>
										</span>
									</div> 
								</li>
								<?php endforeach; ?>
							</ul>
						</aside> 
						<?php endif; ?>

						<!-- Popular Tag Widget (ONLY TAGS) -->
						<aside class="widget widget-tag-cloud">
							<h3 class="widget-title">Popular Tag</h3>
							<div class="tagcloud">
								<ul>
									<?php foreach ($tags_list as $tg): ?>
										<li><a href="#"><?= htmlspecialchars($tg) ?></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</aside> 
					</aside>
				</div>
			</div>
		</div>
	</section>

<?php elseif ($curr_layout == 2): ?>
	<!-- ============================================================== -->
	<!-- LAYOUT 2: LUXURY BOUTIQUE SALON (Sleek Gold Accents & Rounded Cards) -->
	<!-- ============================================================== -->
	<section class="site-content blog-details py-5" style="background: #0b0f19;">
		<div class="container">
			<div class="row g-4 g-lg-5">
				<!-- Left Column: Blog Content -->
				<div class="col-lg-8 order-lg-1">
					<article>
						<!-- Luxury Boutique Image Card -->
						<div class="position-relative overflow-hidden mb-4" style="border-radius: 16px; border: 1px solid rgba(198,172,115,0.25); box-shadow: 0 16px 36px rgba(0,0,0,0.5);">
							<img src="<?= htmlspecialchars($thumb_src) ?>" class="img-fluid w-100" alt="<?= htmlspecialchars($blog_title) ?>" style="max-height: 500px; object-fit: cover;">
							
							<!-- Floating Gold Luxury Date Badge -->
							<div class="position-absolute d-flex align-items-center gap-2" style="bottom: 20px; left: 20px; background: rgba(17,24,39,0.92); backdrop-filter: blur(10px); border: 1px solid #c6ac73; border-radius: 30px; padding: 8px 20px; box-shadow: 0 8px 24px rgba(0,0,0,0.6);">
								<i class="far fa-calendar-alt text-warning"></i>
								<span style="color: #c6ac73; font-weight: 700; font-size: 15px;"><?= $full_date_str ?></span>
							</div>
						</div>

						<!-- Luxury Boutique Content Box -->
						<div class="p-4 p-md-5 mb-4" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
							<!-- Meta bar -->
							<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pb-3 mb-4" style="border-bottom: 1px solid rgba(255,255,255,0.06);">
								<div class="d-flex align-items-center gap-3">
									<span class="badge" style="background: rgba(198,172,115,0.15); color: #c6ac73; border: 1px solid rgba(198,172,115,0.3); padding: 6px 14px; border-radius: 20px; font-size: 13px;">
										<?= htmlspecialchars($primary_tag) ?>
									</span>
									<span class="text-white-50" style="font-size: 14px;">
										<i class="far fa-user text-warning me-1"></i>By <?= htmlspecialchars($blog_author) ?>
									</span>
								</div>
								<div class="d-flex align-items-center gap-2">
									<a href="https://www.facebook.com/" class="btn btn-sm btn-outline-secondary text-white-50 rounded-circle" style="width: 32px; height: 32px; padding: 0; display: inline-flex; align-items: center; justify-content: center;"><i class="fab fa-facebook-f" style="font-size: 12px;"></i></a>
									<a href="https://www.twitter.com/" class="btn btn-sm btn-outline-secondary text-white-50 rounded-circle" style="width: 32px; height: 32px; padding: 0; display: inline-flex; align-items: center; justify-content: center;"><i class="fab fa-twitter" style="font-size: 12px;"></i></a>
									<a href="https://www.instagram.com/" class="btn btn-sm btn-outline-secondary text-white-50 rounded-circle" style="width: 32px; height: 32px; padding: 0; display: inline-flex; align-items: center; justify-content: center;"><i class="fab fa-instagram" style="font-size: 12px;"></i></a>
								</div>
							</div>

							<?php if (!empty($blog_short)): ?>
								<div class="p-3 mb-4 rounded" style="background: rgba(198,172,115,0.1); border-left: 4px solid #c6ac73; border-radius: 8px;">
									<p class="mb-0 fw-semibold text-white" style="font-size: 1.1rem; line-height: 1.7;"><?= htmlspecialchars($blog_short) ?></p>
								</div>
							<?php endif; ?>

							<!-- Main Formatted Content -->
							<div class="pbmit-entry-content" style="font-size: 16px; line-height: 1.85; color: rgba(255,255,255,0.85);">
								<?php if (!empty($blog_content)): ?>
									<?= $blog_content ?>
								<?php else: ?>
									<p class="pbmit-firstletter">With various techniques benefiting hair, including cutting, coloring, and treatments, services in salons aim to improve both hair health and style. Hair care is provided through specialized services like styling, grooming, &amp; straightening.</p>
									<p>Hair salons offer a range of treatments designed to refresh and restore your hair. From deep conditioning to hair spas and scalp therapies, these services help improve texture, shine, and overall hair health.</p>
									<blockquote style="background: rgba(255,255,255,0.02); border-left: 4px solid #c6ac73; padding: 20px 25px; border-radius: 8px; margin: 30px 0;">
										<p style="color: #fff; font-style: italic; font-size: 17px; margin-bottom: 8px;">“In every snip and style, let your passion speak louder than your scissors, leaving clients with more than just great hair a great experience.”</p>
										<cite style="color: #c6ac73; font-weight: 600;">— <?= htmlspecialchars($blog_author) ?></cite>
									</blockquote>
									<p>Haircuts are a core service generally offered in salons. Many also specialize in hair treatments that nourish, restore, and rejuvenate hair, ensuring it stays healthy and vibrant.</p>
								<?php endif; ?>
							</div>

							<!-- Tags Ribbon -->
							<div class="pt-4 mt-4 border-top" style="border-color: rgba(255,255,255,0.08) !important;">
								<div class="d-flex flex-wrap align-items-center gap-2">
									<span class="text-white-50 small me-2"><i class="fas fa-tags text-warning me-1"></i>Tags:</span>
									<?php foreach ($blog_tags as $bt): ?>
										<?php if (!empty($bt)): ?>
											<span class="badge" style="background: rgba(255,255,255,0.05); color: #c6ac73; border: 1px solid rgba(198,172,115,0.3); border-radius: 20px; padding: 6px 14px; font-weight: normal;"><?= htmlspecialchars($bt) ?></span>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						</div>

						<!-- Post Navigation -->
						<?php if (!empty($prev_blog) || !empty($next_blog)): ?>
						<div class="p-4 mb-4" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 16px;">
							<div class="row g-3">
								<div class="col-6">
									<?php if (!empty($prev_blog)): 
										$prev_url = website_url('blog/' . ($prev_blog->slug ?: $prev_blog->id) . '?preview_tpl=' . $preview_tpl . '&preview_layout=2');
									?>
										<a href="<?= $prev_url ?>" class="text-decoration-none d-block">
											<span class="text-white-50 small d-block mb-1"><i class="fas fa-arrow-left text-warning me-1"></i>Previous Article</span>
											<span class="text-white fw-bold text-truncate d-block" style="font-size: 15px;"><?= htmlspecialchars($prev_blog->title) ?></span>
										</a>
									<?php endif; ?>
								</div>
								<div class="col-6 text-end">
									<?php if (!empty($next_blog)): 
										$next_url = website_url('blog/' . ($next_blog->slug ?: $next_blog->id) . '?preview_tpl=' . $preview_tpl . '&preview_layout=2');
									?>
										<a href="<?= $next_url ?>" class="text-decoration-none d-block">
											<span class="text-white-50 small d-block mb-1">Next Article<i class="fas fa-arrow-right text-warning ms-1"></i></span>
											<span class="text-white fw-bold text-truncate d-block" style="font-size: 15px;"><?= htmlspecialchars($next_blog->title) ?></span>
										</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php endif; ?>

						<!-- Author Box -->
						<div class="p-4 mb-4 d-flex align-items-center gap-4" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 16px;">
							<img alt="<?= htmlspecialchars($blog_author) ?>" src="<?= $asset_url ?>images/author-img.png" style="width: 75px; height: 75px; border-radius: 50%; object-fit: cover; border: 2px solid #c6ac73;">
							<div>
								<span style="color: #c6ac73; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700;">AUTHOR PROFILE</span>
								<h5 class="text-white mb-1"><?= htmlspecialchars($blog_author) ?></h5>
								<p class="text-white-50 small mb-0">Senior Master Stylist dedicated to hair wellness, contemporary artistry, and botanical rejuvenation.</p>
							</div>
						</div>
					</article>
				</div>

				<!-- Right Column: Luxury Sidebar -->
				<div class="col-lg-4 order-lg-2">
					<div class="position-sticky" style="top: 100px;">
						<!-- Recent Articles Widget -->
						<?php if (!empty($recent_blogs)): ?>
						<div class="p-4 mb-4" style="background: #111827; border: 1px solid rgba(198,172,115,0.25); border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
							<div class="mb-4 pb-3" style="border-bottom: 1px solid rgba(198,172,115,0.2);">
								<span style="color: #c6ac73; font-size: 11px; text-transform: uppercase; letter-spacing: 2px; font-weight: 700; display: block; margin-bottom: 4px;">JOURNAL</span>
								<h3 style="color: #fff; font-size: 22px; font-weight: 600; margin: 0;">Recent Articles</h3>
							</div>
							<div class="d-flex flex-column gap-3">
								<?php foreach ($recent_blogs as $rb): 
									$rb_thumb = !empty($rb->thumbnail) ? ((strpos($rb->thumbnail, 'http') === 0) ? $rb->thumbnail : base_url(ltrim($rb->thumbnail, '/'))) : ($asset_url . 'images/demo-1/blog/blog-img-01.jpg');
									$rb_url = website_url('blog/' . ($rb->slug ?: $rb->id) . '?preview_tpl=' . $preview_tpl . '&preview_layout=2');
									$rb_date = !empty($rb->published_date) ? date('d M Y', strtotime($rb->published_date)) : date('d M Y');
								?>
								<a href="<?= $rb_url ?>" class="d-flex align-items-center gap-3 text-decoration-none p-2 rounded" style="transition: all 0.3s ease; background: rgba(255,255,255,0.02);">
									<img src="<?= htmlspecialchars($rb_thumb) ?>" alt="<?= htmlspecialchars($rb->title) ?>" style="width: 65px; height: 65px; border-radius: 10px; object-fit: cover; flex-shrink: 0; border: 1px solid rgba(198,172,115,0.2);">
									<div class="overflow-hidden">
										<span class="text-white-50 d-block small mb-1"><i class="far fa-clock text-warning me-1"></i><?= $rb_date ?></span>
										<span class="text-white fw-semibold d-block text-truncate" style="font-size: 14px;"><?= htmlspecialchars($rb->title) ?></span>
									</div>
								</a>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>

						<!-- Popular Tag Widget (ONLY TAGS) -->
						<div class="p-4 mb-4" style="background: #111827; border: 1px solid rgba(198,172,115,0.2); border-radius: 16px;">
							<div class="mb-3 pb-2" style="border-bottom: 1px solid rgba(198,172,115,0.2);">
								<h4 class="text-white mb-0" style="font-size: 18px; font-weight: 600;">Popular Tags</h4>
							</div>
							<div class="d-flex flex-wrap gap-2">
								<?php foreach ($tags_list as $tg): ?>
									<a href="#" class="badge text-decoration-none py-2 px-3" style="background: rgba(198,172,115,0.08); color: #c6ac73; border: 1px solid rgba(198,172,115,0.3); border-radius: 20px; font-size: 13px; font-weight: 500;">
										<?= htmlspecialchars($tg) ?>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php else: /* layout 3 */ ?>
	<!-- ============================================================== -->
	<!-- LAYOUT 3: MODERN SALON STYLE (High Contrast, Geometric Editorial) -->
	<!-- ============================================================== -->
	<section class="site-content blog-details py-5" style="background: #080d16;">
		<div class="container">
			<div class="row g-4 g-lg-5">
				<!-- Left Column: Blog Content -->
				<div class="col-lg-8 col-md-7">
					<article>
						<!-- Modern Sharp Image Container -->
						<div class="position-relative overflow-hidden mb-4" style="border: 2px solid rgba(255,255,255,0.1); border-radius: 4px;">
							<img src="<?= htmlspecialchars($thumb_src) ?>" class="img-fluid w-100" alt="<?= htmlspecialchars($blog_title) ?>" style="max-height: 480px; object-fit: cover;">
							
							<div class="position-absolute" style="top: 20px; right: 20px;">
								<span class="badge" style="background: #0b0f19; color: #c6ac73; border: 1px solid #c6ac73; font-family: monospace; font-size: 14px; padding: 6px 14px; border-radius: 2px;">
									// <?= strtoupper(htmlspecialchars($primary_tag)) ?>
								</span>
							</div>
							<div class="position-absolute" style="bottom: 20px; left: 20px;">
								<span class="badge" style="background: rgba(11,15,25,0.9); color: #fff; border: 1px solid rgba(255,255,255,0.2); font-family: monospace; font-size: 14px; padding: 6px 14px; border-radius: 2px;">
									[ <?= $full_date_str ?> ]
								</span>
							</div>
						</div>

						<!-- Modern Editorial Content Container -->
						<div class="p-4 p-md-5 mb-4" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px;">
							<div class="d-flex justify-content-between align-items-center pb-3 mb-4" style="border-bottom: 1px solid rgba(255,255,255,0.08);">
								<span style="color: #c6ac73; font-family: monospace; font-size: 13px; font-weight: 700;">WRITTEN BY: <?= strtoupper(htmlspecialchars($blog_author)) ?></span>
								<span style="color: rgba(255,255,255,0.4); font-family: monospace; font-size: 12px;">EDITORIAL DESK</span>
							</div>

							<?php if (!empty($blog_short)): ?>
								<div class="p-3 mb-4" style="background: rgba(198,172,115,0.06); border-left: 3px solid #c6ac73; border-radius: 2px;">
									<p class="mb-0 fw-semibold text-white" style="font-size: 1.1rem; line-height: 1.7;"><?= htmlspecialchars($blog_short) ?></p>
								</div>
							<?php endif; ?>

							<div class="pbmit-entry-content" style="font-size: 16px; line-height: 1.85; color: rgba(255,255,255,0.8);">
								<?php if (!empty($blog_content)): ?>
									<?= $blog_content ?>
								<?php else: ?>
									<p class="pbmit-firstletter">With various techniques benefiting hair, including cutting, coloring, and treatments, services in salons aim to improve both hair health and style. Hair care is provided through specialized services like styling, grooming, &amp; straightening.</p>
									<p>Hair salons offer a range of treatments designed to refresh and restore your hair. From deep conditioning to hair spas and scalp therapies, these services help improve texture, shine, and overall hair health.</p>
									<blockquote style="background: #0b0f19; border-left: 3px solid #c6ac73; padding: 20px; border-radius: 2px; margin: 30px 0;">
										<p style="color: #fff; font-family: monospace; font-size: 16px; margin-bottom: 6px;">“In every snip and style, let your passion speak louder than your scissors, leaving clients with more than just great hair a great experience.”</p>
										<cite style="color: #c6ac73; font-family: monospace; font-size: 13px;">— <?= htmlspecialchars($blog_author) ?></cite>
									</blockquote>
									<p>Haircuts are a core service generally offered in salons. Many also specialize in hair treatments that nourish, restore, and rejuvenate hair, ensuring it stays healthy and vibrant.</p>
								<?php endif; ?>
							</div>

							<!-- Tags Ribbon -->
							<div class="pt-4 mt-4 border-top" style="border-color: rgba(255,255,255,0.08) !important;">
								<div class="d-flex flex-wrap align-items-center gap-2">
									<span style="font-family: monospace; font-size: 12px; color: #c6ac73;">[ TAGS ]:</span>
									<?php foreach ($blog_tags as $bt): ?>
										<?php if (!empty($bt)): ?>
											<span class="badge" style="background: rgba(255,255,255,0.04); color: #fff; border: 1px solid rgba(255,255,255,0.1); border-radius: 2px; font-family: monospace; font-size: 12px; padding: 5px 10px;"><?= htmlspecialchars($bt) ?></span>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						</div>

						<!-- Post Navigation -->
						<?php if (!empty($prev_blog) || !empty($next_blog)): ?>
						<div class="p-3 mb-4" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px;">
							<div class="row g-3">
								<div class="col-6">
									<?php if (!empty($prev_blog)): 
										$prev_url = website_url('blog/' . ($prev_blog->slug ?: $prev_blog->id) . '?preview_tpl=' . $preview_tpl . '&preview_layout=3');
									?>
										<a href="<?= $prev_url ?>" class="text-decoration-none d-block">
											<span style="font-family: monospace; font-size: 11px; color: #c6ac73; display: block; margin-bottom: 2px;">&lt; PREV ARTICLE</span>
											<span class="text-white fw-bold text-truncate d-block" style="font-size: 14px;"><?= htmlspecialchars($prev_blog->title) ?></span>
										</a>
									<?php endif; ?>
								</div>
								<div class="col-6 text-end">
									<?php if (!empty($next_blog)): 
										$next_url = website_url('blog/' . ($next_blog->slug ?: $next_blog->id) . '?preview_tpl=' . $preview_tpl . '&preview_layout=3');
									?>
										<a href="<?= $next_url ?>" class="text-decoration-none d-block">
											<span style="font-family: monospace; font-size: 11px; color: #c6ac73; display: block; margin-bottom: 2px;">NEXT ARTICLE &gt;</span>
											<span class="text-white fw-bold text-truncate d-block" style="font-size: 14px;"><?= htmlspecialchars($next_blog->title) ?></span>
										</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php endif; ?>

						<!-- Modern Author Card -->
						<div class="p-4 mb-4 d-flex align-items-center gap-4" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px;">
							<img alt="<?= htmlspecialchars($blog_author) ?>" src="<?= $asset_url ?>images/author-img.png" style="width: 70px; height: 70px; border-radius: 4px; object-fit: cover; border: 1px solid rgba(255,255,255,0.2);">
							<div>
								<span style="color: #c6ac73; font-family: monospace; font-size: 11px; letter-spacing: 1px; font-weight: 700;">// COLUMNIST</span>
								<h5 class="text-white mb-1"><?= htmlspecialchars($blog_author) ?></h5>
								<p class="text-white-50 small mb-0">Editorial consultant specialized in salon treatments, hair structure recovery, and holistic beauty rituals.</p>
							</div>
						</div>
					</article>
				</div>

				<!-- Right Column: Modern Sidebar -->
				<div class="col-lg-4 col-md-5">
					<div class="position-sticky" style="top: 100px;">
						<!-- Recent Articles Widget -->
						<?php if (!empty($recent_blogs)): ?>
						<div class="p-4 mb-4" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px;">
							<div class="d-flex justify-content-between align-items-baseline mb-4 pb-3" style="border-bottom: 2px solid rgba(198,172,115,0.4);">
								<h3 style="color: #fff; font-size: 18px; font-weight: 700; letter-spacing: 0.5px; margin: 0; text-transform: uppercase;">Recent Articles</h3>
								<span style="color: #c6ac73; font-family: monospace; font-size: 12px; font-weight: 700;">#01 - #<?= sprintf('%02d', count($recent_blogs)) ?></span>
							</div>

							<div class="d-flex flex-column gap-3">
								<?php foreach ($recent_blogs as $i => $rb): 
									$rb_thumb = !empty($rb->thumbnail) ? ((strpos($rb->thumbnail, 'http') === 0) ? $rb->thumbnail : base_url(ltrim($rb->thumbnail, '/'))) : ($asset_url . 'images/demo-1/blog/blog-img-01.jpg');
									$rb_url = website_url('blog/' . ($rb->slug ?: $rb->id) . '?preview_tpl=' . $preview_tpl . '&preview_layout=3');
									$rb_date = !empty($rb->published_date) ? date('d M Y', strtotime($rb->published_date)) : date('d M Y');
									$num_str = sprintf('%02d', $i + 1);
								?>
								<a href="<?= $rb_url ?>" class="d-flex align-items-center gap-3 text-decoration-none p-2" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); border-radius: 2px; transition: all 0.25s ease;">
									<img src="<?= htmlspecialchars($rb_thumb) ?>" alt="<?= htmlspecialchars($rb->title) ?>" style="width: 60px; height: 60px; border-radius: 2px; object-fit: cover; flex-shrink: 0; border: 1px solid rgba(255,255,255,0.1);">
									<div class="overflow-hidden">
										<div class="d-flex align-items-center gap-2 mb-1">
											<span style="color: #c6ac73; font-family: monospace; font-size: 11px; font-weight: 700;">[ <?= $num_str ?> ]</span>
											<span style="color: rgba(255,255,255,0.4); font-family: monospace; font-size: 11px;"><?= $rb_date ?></span>
										</div>
										<span class="text-white fw-semibold d-block text-truncate" style="font-size: 14px;"><?= htmlspecialchars($rb->title) ?></span>
									</div>
								</a>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>

						<!-- Popular Tag Widget (ONLY TAGS) -->
						<div class="p-4 mb-4" style="background: #0f1523; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px;">
							<div class="mb-3 pb-2" style="border-bottom: 2px solid rgba(198,172,115,0.3);">
								<span style="color: #c6ac73; font-family: monospace; font-size: 11px; letter-spacing: 1px; font-weight: 700; text-transform: uppercase;">INDEX</span>
								<h4 class="text-white mb-0 mt-1" style="font-size: 18px; font-weight: 700;">Popular Tags</h4>
							</div>
							<div class="d-flex flex-wrap gap-2">
								<?php foreach ($tags_list as $tg): ?>
									<a href="#" class="badge text-decoration-none py-2 px-3" style="background: rgba(255,255,255,0.03); color: #c6ac73; border: 1px solid rgba(255,255,255,0.1); border-radius: 2px; font-family: monospace; font-size: 12px;">
										#<?= htmlspecialchars($tg) ?>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

</div>
<!-- Page Content End -->
