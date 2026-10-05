<div class="container-fluid px-4 py-4">

    <!-- Flash Messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <i class="fa-solid fa-circle-check me-2 fs-5"></i><?= $this->session->flashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4 shadow-sm" role="alert">
            <i class="fa-solid fa-circle-exclamation me-2 fs-5"></i><?= $this->session->flashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h3 class="fw-bold mb-1">
                <i class="fa-solid fa-wand-magic-sparkles text-primary me-2"></i>Configure Website &bull; <?= htmlspecialchars($layout_name) ?>
            </h3>
            <p class="text-muted small mb-0">
                Decorate your website frontend sections: Hero Banner carousel, Our Works portfolio, About Us, Client Testimonials, and FAQs.
            </p>
        </div>
        <div class="d-flex gap-2">
            <a href="<?= website_url() ?>" target="_blank" class="btn btn-outline-primary btn-sm fw-semibold shadow-sm">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live Website
            </a>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-pills nav-fill gap-2 p-1 bg-white rounded-4 shadow-sm mb-4 border" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link rounded-3 py-2 fw-semibold <?= $active_tab === 'hero' ? 'active bg-primary text-white shadow-sm' : 'text-secondary' ?>" 
               href="<?= admin_url('configure_website?tab=hero') ?>">
                <i class="fa-solid fa-bullhorn me-1"></i> Hero Banner
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link rounded-3 py-2 fw-semibold <?= $active_tab === 'works' ? 'active bg-primary text-white shadow-sm' : 'text-secondary' ?>" 
               href="<?= admin_url('configure_website?tab=works') ?>">
                <i class="fa-solid fa-sparkles me-1"></i> Our Works
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link rounded-3 py-2 fw-semibold <?= $active_tab === 'about' ? 'active bg-primary text-white shadow-sm' : 'text-secondary' ?>" 
               href="<?= admin_url('configure_website?tab=about') ?>">
                <i class="fa-solid fa-address-card me-1"></i> About Us
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link rounded-3 py-2 fw-semibold <?= $active_tab === 'testimonials' ? 'active bg-primary text-white shadow-sm' : 'text-secondary' ?>" 
               href="<?= admin_url('configure_website?tab=testimonials') ?>">
                <i class="fa-solid fa-comments me-1"></i> Testimonials
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link rounded-3 py-2 fw-semibold <?= $active_tab === 'faqs' ? 'active bg-primary text-white shadow-sm' : 'text-secondary' ?>" 
               href="<?= admin_url('configure_website?tab=faqs') ?>">
                <i class="fa-solid fa-circle-question me-1"></i> FAQ's
            </a>
        </li>
    </ul>

    <!-- ============================================== -->
    <!-- 1. HERO BANNER SECTION (MULTI-SLIDE CAROUSEL)  -->
    <!-- ============================================== -->
    <?php if ($active_tab === 'hero'): ?>
        <div class="card border-0 rounded-4 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div>
                    <h5 class="fw-bold mb-1 text-dark">
                        <i class="fa-solid fa-bullhorn text-primary me-2"></i>Hero Banner Slides &bull; <?= htmlspecialchars($layout_name) ?>
                    </h5>
                    <div class="small text-muted">
                        Manage multiple slides for the hero section. Layout 2 displays your active slides in its dynamic animated hero carousel.
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-sm fw-bold px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalHeroSlide" onclick="openNewHeroSlideModal()">
                    <i class="fa-solid fa-plus me-1"></i> Add New Hero Slide
                </button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-secondary small text-uppercase">
                                <th style="width: 80px;" class="ps-4"># Order</th>
                                <th style="width: 100px;">Visual</th>
                                <th style="width: 280px;">Tagline &amp; Title</th>
                                <th>Description</th>
                                <th style="width: 180px;">Button</th>
                                <th style="width: 90px;">Status</th>
                                <th class="text-end pe-4" style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($hero_slides)): ?>
                                <?php foreach ($hero_slides as $slide): 
                                    $slide_img_full = fallback_image_url($slide->image, 'assets/template2/images/resources/main-slider-img-1-1.png');
                                ?>
                                    <tr>
                                        <td class="ps-4">
                                            <span class="badge bg-secondary font-monospace">#<?= (int)$slide->sort_order ?></span>
                                        </td>
                                        <td>
                                            <div class="rounded p-1 bg-light border text-center" style="width: 70px; height: 55px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                                <img src="<?= htmlspecialchars($slide_img_full) ?>" alt="Slide Image" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                            </div>
                                        </td>
                                        <td>
                                            <?php if (!empty($slide->badge)): ?>
                                                <span class="badge bg-primary-subtle text-primary fw-bold mb-1 d-inline-block small text-truncate" style="max-width: 250px;">
                                                    <?= htmlspecialchars($slide->badge) ?>
                                                </span>
                                            <?php endif; ?>
                                            <div class="fw-bold text-dark" style="max-width: 270px; line-height: 1.3;">
                                                <?= nl2br(strip_tags($slide->title, '<br><br/><span><strong><em><b><i>')) ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-muted small" style="max-width: 340px; line-height: 1.4;">
                                                <?= htmlspecialchars($slide->description) ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-dark small fw-semibold">
                                                <i class="fa-solid fa-link me-1 text-primary"></i><?= htmlspecialchars($slide->button_text ?: 'Book Appointment') ?>
                                            </div>
                                            <div class="text-muted font-monospace small"><?= htmlspecialchars($slide->button_url ?: 'booking') ?></div>
                                        </td>
                                        <td>
                                            <span class="badge <?= $slide->status === 'active' ? 'bg-success' : 'bg-secondary' ?>">
                                                <?= ucfirst($slide->status) ?>
                                            </span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <script type="application/json" id="heroSlideData_<?= (int)$slide->id ?>"><?= json_encode($slide, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?></script>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-outline-secondary" onclick="triggerEditHeroSlide(<?= (int)$slide->id ?>)" title="Edit Slide">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" onclick="deleteHeroSlide(<?= (int)$slide->id ?>)" title="Delete Slide">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">
                                        <i class="fa-solid fa-bullhorn fa-2x mb-2 text-secondary d-block"></i>
                                        No hero slides found. Click <strong>"+ Add New Hero Slide"</strong> to add slides to the banner.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white py-3 border-top d-flex justify-content-between align-items-center">
                <span class="small text-muted">
                    Total slides configured: <strong><?= count($hero_slides) ?></strong>
                </span>
                <button type="button" class="btn btn-primary btn-sm fw-bold px-3" data-bs-toggle="modal" data-bs-target="#modalHeroSlide" onclick="openNewHeroSlideModal()">
                    <i class="fa-solid fa-plus me-1"></i> Add Another Slide
                </button>
            </div>
        </div>
    <?php endif; ?>

    <!-- ============================================== -->
    <!-- 2. OUR WORKS / FEATURED ITEMS SECTION          -->
    <!-- ============================================== -->
    <?php if ($active_tab === 'works'): ?>
        <!-- Header Settings Card -->
        <form action="<?= admin_url('configure_website') ?>" method="post" class="mb-4">
            <input type="hidden" name="action" value="save_featured_headers">
            <input type="hidden" name="active_tab" value="works">

            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="fa-solid fa-sparkles text-primary me-2"></i>Our Works Section Heading (Layout <?= $curr_layout ?>)
                    </h5>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-3">
                        <i class="fa-solid fa-check me-1"></i> Save Headers
                    </button>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Section Tagline</label>
                            <input type="text" name="featured_tagline" class="form-control" value="<?= htmlspecialchars($works_tagline) ?>" placeholder="Our Works">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label small fw-bold">Section Title Heading</label>
                            <input type="text" name="featured_title" class="form-control" value="<?= htmlspecialchars($works_title) ?>" placeholder="Glow Transformation Gallery">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Items Management Card -->
        <div class="card border-0 rounded-4 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="fa-solid fa-table-cells text-primary me-2"></i>Our Works Items (Layout <?= $curr_layout ?>)
                    </h5>
                    <p class="text-muted small mb-0">Each card contains thumbnail, title, short description, and booking button link.</p>
                </div>
                <button type="button" class="btn btn-primary btn-sm fw-bold px-3" data-bs-toggle="modal" data-bs-target="#modalFeaturedItem" onclick="openNewFeaturedModal()">
                    <i class="fa-solid fa-plus me-1"></i> Add Item
                </button>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <?php if (!empty($featured_items)): ?>
                        <?php foreach ($featured_items as $item): 
                            $thumb_src = fallback_image_url($item->thumbnail, 'assets/template2/images/work/work-1-1.jpg');
                        ?>
                            <div class="col-md-6 col-xl-3">
                                <div class="card h-100 border rounded-3 overflow-hidden shadow-sm">
                                    <div class="position-relative" style="height: 160px; overflow: hidden; background: #f8f9fa;">
                                        <img src="<?= htmlspecialchars($thumb_src) ?>" alt="<?= htmlspecialchars($item->title) ?>" class="w-100 h-100" style="object-fit: cover;">
                                        <span class="position-absolute top-0 end-0 m-2 badge <?= $item->status === 'active' ? 'bg-success' : 'bg-secondary' ?>">
                                            <?= ucfirst($item->status) ?>
                                        </span>
                                    </div>
                                    <div class="card-body p-3 d-flex flex-column">
                                        <h6 class="fw-bold mb-1 text-dark"><?= htmlspecialchars($item->title) ?></h6>
                                        <p class="text-muted small mb-3 flex-grow-1"><?= htmlspecialchars($item->short_desc) ?></p>
                                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                                            <button type="button" class="btn btn-outline-secondary btn-sm fw-semibold" onclick="openEditFeaturedModal(<?= htmlspecialchars(json_encode($item)) ?>)">
                                                <i class="fa-solid fa-pencil me-1"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteFeaturedItem(<?= (int)$item->id ?>)">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5 text-muted">
                            <i class="fa-solid fa-inbox fa-3x mb-2 text-secondary"></i>
                            <p class="mb-0">No items found for Our Works. Click "+ Add Item" to create one.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- ============================================== -->
    <!-- 3. ABOUT US SECTION                            -->
    <!-- ============================================== -->
    <?php if ($active_tab === 'about'): 
        $img1_full = fallback_image_url($about_image_1, 'assets/template2/images/resources/about-one-img-1.jpg');
        $img2_full = fallback_image_url($about_image_2, 'assets/template2/images/resources/about-one-img-2.jpg');
    ?>
        <form action="<?= admin_url('configure_website') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="save_about_us">
            <input type="hidden" name="active_tab" value="about">

            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="fa-solid fa-address-card text-primary me-2"></i>About Us Section &bull; <?= htmlspecialchars($layout_name) ?>
                    </h5>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-3">
                        <i class="fa-solid fa-check me-1"></i> Save About Us
                    </button>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold">Section Tagline</label>
                                    <input type="text" name="about_tagline" class="form-control" value="<?= htmlspecialchars($about_tagline) ?>" placeholder="About Us">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label small fw-bold">Section Title Heading</label>
                                    <input type="text" name="about_title" class="form-control" value="<?= htmlspecialchars($about_title) ?>" placeholder="Explore Our Dedication to Healthy Skin">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Story &amp; Description</label>
                                <textarea name="about_desc" class="form-control" rows="4"><?= htmlspecialchars($about_desc) ?></textarea>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold">Years of Experience</label>
                                    <input type="text" name="about_experience" class="form-control" value="<?= htmlspecialchars($about_experience) ?>" placeholder="27">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold">Author / Founder Name</label>
                                    <input type="text" name="about_author_name" class="form-control" value="<?= htmlspecialchars($about_author_name) ?>" placeholder="Emma Watson">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold">Author Role / Designation</label>
                                    <input type="text" name="about_author_role" class="form-control" value="<?= htmlspecialchars($about_author_role) ?>" placeholder="Founder CEO">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label small fw-bold">About Section Images</label>
                            <!-- Image 1 -->
                            <div class="p-3 rounded-3 mb-3 border bg-light">
                                <div class="small text-muted fw-bold mb-1">Primary Image:</div>
                                <img src="<?= htmlspecialchars($img1_full) ?>" alt="About Img 1" class="img-fluid rounded mb-2 border shadow-sm" style="max-height: 100px; object-fit: cover;">
                                <input type="file" name="about_image_1_file" class="form-control form-control-sm mb-1" accept="image/*">
                                <input type="text" name="about_image_1_url" class="form-control form-control-sm" value="<?= htmlspecialchars($about_image_1) ?>" placeholder="image path">
                            </div>
                            <!-- Image 2 -->
                            <div class="p-3 rounded-3 border bg-light">
                                <div class="small text-muted fw-bold mb-1">Secondary / Experience Image:</div>
                                <img src="<?= htmlspecialchars($img2_full) ?>" alt="About Img 2" class="img-fluid rounded mb-2 border shadow-sm" style="max-height: 100px; object-fit: cover;">
                                <input type="file" name="about_image_2_file" class="form-control form-control-sm mb-1" accept="image/*">
                                <input type="text" name="about_image_2_url" class="form-control form-control-sm" value="<?= htmlspecialchars($about_image_2) ?>" placeholder="image path">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white py-3 border-top text-end">
                    <button type="submit" class="btn btn-primary fw-bold px-4">
                        <i class="fa-solid fa-check me-1"></i> Save About Us
                    </button>
                </div>
            </div>
        </form>
    <?php endif; ?>

    <!-- ============================================== -->
    <!-- 4. TESTIMONIALS SECTION                        -->
    <!-- ============================================== -->
    <?php if ($active_tab === 'testimonials'): ?>
        <!-- Header Settings Card -->
        <form action="<?= admin_url('configure_website') ?>" method="post" class="mb-4">
            <input type="hidden" name="action" value="save_testimonials_headers">
            <input type="hidden" name="active_tab" value="testimonials">

            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="fa-solid fa-comments text-primary me-2"></i>Testimonials Section Heading
                    </h5>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-3">
                        <i class="fa-solid fa-check me-1"></i> Save Headers
                    </button>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Section Tagline</label>
                            <input type="text" name="testimonials_tagline" class="form-control" value="<?= htmlspecialchars($testi_tagline) ?>" placeholder="Clients Feedback">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label small fw-bold">Section Title Heading</label>
                            <input type="text" name="testimonials_title" class="form-control" value="<?= htmlspecialchars($testi_title) ?>" placeholder="What Our Clients Say About Results">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Testimonials Management List -->
        <div class="card border-0 rounded-4 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="fa-solid fa-quote-left text-primary me-2"></i>Client Testimonials
                    </h5>
                    <p class="text-muted small mb-0">Manage customer review quotes, star ratings, and avatars.</p>
                </div>
                <button type="button" class="btn btn-primary btn-sm fw-bold px-3" data-bs-toggle="modal" data-bs-target="#modalTestimonial" onclick="openNewTestimonialModal()">
                    <i class="fa-solid fa-plus me-1"></i> Add Testimonial
                </button>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <?php if (!empty($testimonials_list)): ?>
                        <?php foreach ($testimonials_list as $tst): 
                            $tst_avatar = fallback_image_url($tst->avatar, 'assets/template2/images/testimonial/testimonial-v1-img1.jpg');
                        ?>
                            <div class="col-md-6">
                                <div class="card h-100 border rounded-3 p-3 shadow-sm bg-white">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="<?= htmlspecialchars($tst_avatar) ?>" alt="<?= htmlspecialchars($tst->client_name) ?>" class="rounded-circle border" style="width: 45px; height: 45px; object-fit: cover;">
                                            <div>
                                                <div class="fw-bold text-dark"><?= htmlspecialchars($tst->client_name) ?></div>
                                                <div class="text-muted small"><?= htmlspecialchars($tst->designation) ?></div>
                                            </div>
                                        </div>
                                        <div class="text-warning small">
                                            <?php for ($i = 0; $i < (int)$tst->rating; $i++): ?>
                                                <i class="fa-solid fa-star"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <p class="text-muted small fst-italic mb-3 flex-grow-1">
                                        "<?= htmlspecialchars($tst->review) ?>"
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                                        <span class="badge <?= $tst->status === 'active' ? 'bg-success' : 'bg-secondary' ?> small">
                                            <?= ucfirst($tst->status) ?>
                                        </span>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-outline-secondary" onclick="openEditTestimonialModal(<?= htmlspecialchars(json_encode($tst)) ?>)">
                                                <i class="fa-solid fa-pencil me-1"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-outline-danger" onclick="deleteTestimonial(<?= (int)$tst->id ?>)">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5 text-muted">
                            <i class="fa-solid fa-comments fa-3x mb-2 text-secondary"></i>
                            <p class="mb-0">No testimonials found. Click "+ Add Testimonial" to create one.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- ============================================== -->
    <!-- 5. FAQS SECTION                                -->
    <!-- ============================================== -->
    <?php if ($active_tab === 'faqs'): ?>
        <!-- Header Settings Card -->
        <form action="<?= admin_url('configure_website') ?>" method="post" class="mb-4">
            <input type="hidden" name="action" value="save_faqs_headers">
            <input type="hidden" name="active_tab" value="faqs">

            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="fa-solid fa-circle-question text-primary me-2"></i>FAQ Section Heading (Layout <?= $curr_layout ?>)
                    </h5>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-3">
                        <i class="fa-solid fa-check me-1"></i> Save Headers
                    </button>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Section Tagline</label>
                            <input type="text" name="faq_tagline" class="form-control" value="<?= htmlspecialchars($faq_tagline) ?>" placeholder="Frequently Asked Questions">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label small fw-bold">Section Title Heading</label>
                            <input type="text" name="faq_title" class="form-control" value="<?= htmlspecialchars($faq_title) ?>" placeholder="Clear Answers About Your Treatment">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- FAQ Items Management List -->
        <div class="card border-0 rounded-4 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="fa-solid fa-list-check text-primary me-2"></i>Frequently Asked Questions (Layout <?= $curr_layout ?>)
                    </h5>
                    <p class="text-muted small mb-0">Manage accordion Q&amp;A pairs displayed on your website.</p>
                </div>
                <button type="button" class="btn btn-primary btn-sm fw-bold px-3" data-bs-toggle="modal" data-bs-target="#modalFaq" onclick="openNewFaqModal()">
                    <i class="fa-solid fa-plus me-1"></i> Add FAQ
                </button>
            </div>
            <div class="card-body p-4">
                <div class="accordion" id="accordionFaqsAdmin">
                    <?php if (!empty($faqs_list)): ?>
                        <?php foreach ($faqs_list as $idx => $fq): ?>
                            <div class="accordion-item mb-3 rounded-3 border overflow-hidden">
                                <h2 class="accordion-header" id="headingFaq<?= $fq->id ?>">
                                    <button class="accordion-button <?= $idx === 0 ? '' : 'collapsed' ?> fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq<?= $fq->id ?>">
                                        <span class="badge bg-primary text-white me-2 font-monospace">Q<?= $idx + 1 ?></span>
                                        <?= htmlspecialchars($fq->question) ?>
                                    </button>
                                </h2>
                                <div id="collapseFaq<?= $fq->id ?>" class="accordion-collapse collapse <?= $idx === 0 ? 'show' : '' ?>" data-bs-parent="#accordionFaqsAdmin">
                                    <div class="accordion-body text-secondary small bg-light">
                                        <p class="mb-3"><?= nl2br(htmlspecialchars($fq->answer)) ?></p>
                                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                                            <span class="badge <?= $fq->status === 'active' ? 'bg-success' : 'bg-secondary' ?> small">
                                                <?= ucfirst($fq->status) ?>
                                            </span>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-outline-secondary" onclick="openEditFaqModal(<?= htmlspecialchars(json_encode($fq)) ?>)">
                                                    <i class="fa-solid fa-pencil me-1"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" onclick="deleteFaq(<?= (int)$fq->id ?>)">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-5 text-muted">
                            <i class="fa-solid fa-circle-question fa-3x mb-2 text-secondary"></i>
                            <p class="mb-0">No FAQs found. Click "+ Add FAQ" to create one.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>

<!-- ======================================================== -->
<!-- MODALS                                                   -->
<!-- ======================================================== -->

<!-- MODAL: ADD / EDIT HERO BANNER SLIDE -->
<div class="modal fade" id="modalHeroSlide" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow">
            <form action="<?= admin_url('configure_website') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save_hero_slide">
                <input type="hidden" name="slide_id" id="heroSlideId" value="0">
                <input type="hidden" name="layout_number" id="heroSlideLayoutNum" value="<?= $curr_layout ?>">

                <div class="modal-header py-3 border-bottom bg-light">
                    <h5 class="modal-title fw-bold" id="heroSlideModalTitle">Add Hero Banner Slide</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold">Tagline / Subtitle Badge</label>
                            <input type="text" name="badge" id="heroSlideBadge" class="form-control" placeholder="e.g. True Beauty Starts with Healthy Skin">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Main Banner Title (HTML &lt;br&gt; allowed for breaks)</label>
                            <input type="text" name="title" id="heroSlideTitle" class="form-control font-monospace" required placeholder="e.g. Glow Starts with &lt;br&gt; Healthy Skin">
                            <div class="form-text text-muted small">Use <code>&lt;br&gt;</code> to create clean multi-line headline breaks.</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Hero Description / Lead Copy</label>
                            <textarea name="description" id="heroSlideDesc" class="form-control" rows="3" placeholder="Healthy skin is the true foundation of lasting beauty..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Primary Button Text</label>
                            <input type="text" name="button_text" id="heroSlideBtnText" class="form-control" value="Book Appointment" placeholder="Book Appointment">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Primary Button Link / Action</label>
                            <input type="text" name="button_url" id="heroSlideBtnUrl" class="form-control" value="booking" placeholder="booking">
                        </div>
                        
                        <!-- Slide Visual Image -->
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Slide Visual / Model Image</label>
                            <input type="file" name="image_file" class="form-control form-control-sm mb-1" accept="image/*">
                            <input type="text" name="image_url" id="heroSlideImageUrl" class="form-control form-control-sm" placeholder="assets/template2/images/resources/main-slider-img-1-1.png">
                            <div class="small text-muted mt-1">Relative path or upload image file.</div>
                        </div>

                        <!-- Slide Background Image (optional) -->
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Slide Background Image (Optional)</label>
                            <input type="file" name="background_image_file" class="form-control form-control-sm mb-1" accept="image/*">
                            <input type="text" name="background_image_url" id="heroSlideBgUrl" class="form-control form-control-sm" placeholder="assets/template2/images/backgrounds/slider-1-1.jpg">
                            <div class="small text-muted mt-1">Leave empty to use layout default background.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Sort Order</label>
                            <input type="number" name="sort_order" id="heroSlideSortOrder" class="form-control" value="1">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Status</label>
                            <select name="status" id="heroSlideStatus" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top bg-light py-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="heroSlideSubmitBtn" class="btn btn-primary btn-sm fw-bold px-4">Save Slide</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL: ADD / EDIT FEATURED ITEM / OUR WORKS -->
<div class="modal fade" id="modalFeaturedItem" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow">
            <form action="<?= admin_url('configure_website') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save_featured_item">
                <input type="hidden" name="item_id" id="featItemId" value="0">
                <input type="hidden" name="layout_number" id="featLayoutNum" value="<?= $curr_layout ?>">

                <div class="modal-header py-3 border-bottom bg-light">
                    <h5 class="modal-title fw-bold" id="featModalTitle">Add Our Works Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Title *</label>
                        <input type="text" name="title" id="featTitle" class="form-control" required placeholder="e.g. Deep Cleansing Facial">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Short Description</label>
                        <textarea name="short_desc" id="featShortDesc" class="form-control" rows="3" placeholder="Brief description of the work or transformation"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Thumbnail Image</label>
                        <input type="file" name="thumbnail_file" class="form-control mb-1" accept="image/*">
                        <input type="text" name="thumbnail_url" id="featThumbnailUrl" class="form-control form-control-sm" placeholder="assets/template2/images/work/work-1-1.jpg">
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-bold">Button Text</label>
                            <input type="text" name="button_text" id="featButtonText" class="form-control" value="View Work" placeholder="View Work">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Button Link</label>
                            <input type="text" name="button_link" id="featButtonLink" class="form-control" value="booking" placeholder="booking">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label small fw-bold">Sort Order</label>
                            <input type="number" name="sort_order" id="featSortOrder" class="form-control" value="1">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Status</label>
                            <select name="status" id="featStatus" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top bg-light py-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-3">Save Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL: ADD / EDIT TESTIMONIAL -->
<div class="modal fade" id="modalTestimonial" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow">
            <form action="<?= admin_url('configure_website') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save_testimonial">
                <input type="hidden" name="testimonial_id" id="testiId" value="0">
                <input type="hidden" name="layout_number" value="0">

                <div class="modal-header py-3 border-bottom bg-light">
                    <h5 class="modal-title fw-bold" id="testiModalTitle">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-7">
                            <label class="form-label small fw-bold">Client Name *</label>
                            <input type="text" name="client_name" id="testiName" class="form-control" required placeholder="Sarah Jenkins">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label small fw-bold">Rating (Stars)</label>
                            <select name="rating" id="testiRating" class="form-select">
                                <option value="5">5 Stars (Excellent)</option>
                                <option value="4">4 Stars (Very Good)</option>
                                <option value="3">3 Stars (Average)</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Designation / Role</label>
                            <input type="text" name="designation" id="testiDesignation" class="form-control" placeholder="Fashion Stylist / Regular Guest">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Review Quote *</label>
                            <textarea name="review" id="testiReview" class="form-control" rows="3" required placeholder="Their review experience..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Client Avatar / Photo</label>
                            <input type="file" name="avatar_file" class="form-control form-control-sm mb-1" accept="image/*">
                            <input type="text" name="avatar_url" id="testiAvatarUrl" class="form-control form-control-sm" placeholder="assets/template2/images/testimonial/testimonial-v1-img1.jpg">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Sort Order</label>
                            <input type="number" name="sort_order" id="testiSortOrder" class="form-control" value="1">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Status</label>
                            <select name="status" id="testiStatus" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top bg-light py-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-3">Save Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL: ADD / EDIT FAQ -->
<div class="modal fade" id="modalFaq" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow">
            <form action="<?= admin_url('configure_website') ?>" method="post">
                <input type="hidden" name="action" value="save_faq">
                <input type="hidden" name="faq_id" id="faqId" value="0">
                <input type="hidden" name="layout_number" id="faqLayoutNum" value="<?= $curr_layout ?>">

                <div class="modal-header py-3 border-bottom bg-light">
                    <h5 class="modal-title fw-bold" id="faqModalTitle">Add FAQ Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Question *</label>
                        <input type="text" name="question" id="faqQuestion" class="form-control" required placeholder="e.g. What skincare treatments do you offer?">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Answer *</label>
                        <textarea name="answer" id="faqAnswer" class="form-control" rows="4" required placeholder="Clear, friendly answer for clients..."></textarea>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label small fw-bold">Sort Order</label>
                            <input type="number" name="sort_order" id="faqSortOrder" class="form-control" value="1">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Status</label>
                            <select name="status" id="faqStatus" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top bg-light py-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-3">Save FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
const baseAdminUrl = "<?= rtrim(admin_url(), '/') . '/' ?>";

// ==========================================
// HERO SLIDES MODAL HANDLERS
// ==========================================
function openNewHeroSlideModal() {
    $('#heroSlideModalTitle').text('Add Hero Banner Slide');
    $('#heroSlideSubmitBtn').text('Add Slide');
    $('#heroSlideId').val(0);
    $('#heroSlideLayoutNum').val(<?= $curr_layout ?>);
    $('#heroSlideBadge').val('True Beauty Starts with Healthy Skin');
    $('#heroSlideTitle').val('Glow Starts with <br> Healthy Skin');
    $('#heroSlideDesc').val('Healthy skin is the true foundation of lasting beauty.');
    $('#heroSlideBtnText').val('Book Appointment');
    $('#heroSlideBtnUrl').val('booking');
    $('#heroSlideImageUrl').val('assets/template2/images/resources/main-slider-img-1-1.png');
    $('#heroSlideBgUrl').val('');
    $('#heroSlideSortOrder').val(<?= !empty($hero_slides) ? (count($hero_slides) + 1) : 1 ?>);
    $('#heroSlideStatus').val('active');

    const modalEl = document.getElementById('modalHeroSlide');
    if (modalEl && typeof bootstrap !== 'undefined' && bootstrap.Modal) {
        bootstrap.Modal.getOrCreateInstance(modalEl).show();
    }
}

function triggerEditHeroSlide(id) {
    const el = document.getElementById('heroSlideData_' + id);
    if (el) {
        try {
            const data = JSON.parse(el.textContent);
            openEditHeroSlideModal(data);
        } catch(e) {
            console.error('Error parsing hero slide data for #' + id, e);
        }
    }
}

function openEditHeroSlideModal(slide) {
    if (typeof slide === 'string') {
        try { slide = JSON.parse(slide); } catch(e) {}
    }
    if (!slide) return;

    $('#heroSlideModalTitle').text('Edit Hero Slide #' + (slide.sort_order || slide.id));
    $('#heroSlideSubmitBtn').text('Update Slide');
    $('#heroSlideId').val(slide.id || 0);
    $('#heroSlideLayoutNum').val(slide.layout_number || <?= $curr_layout ?>);
    $('#heroSlideBadge').val(slide.badge || '');
    $('#heroSlideTitle').val(slide.title || '');
    $('#heroSlideDesc').val(slide.description || '');
    $('#heroSlideBtnText').val(slide.button_text || 'Book Appointment');
    $('#heroSlideBtnUrl').val(slide.button_url || 'booking');
    $('#heroSlideImageUrl').val(slide.image || '');
    $('#heroSlideBgUrl').val(slide.background_image || '');
    $('#heroSlideSortOrder').val(slide.sort_order || 1);
    $('#heroSlideStatus').val(slide.status || 'active');

    const modalEl = document.getElementById('modalHeroSlide');
    if (modalEl && typeof bootstrap !== 'undefined' && bootstrap.Modal) {
        bootstrap.Modal.getOrCreateInstance(modalEl).show();
    }
}

function deleteHeroSlide(id) {
    if (confirm('Are you sure you want to delete this hero slide?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = baseAdminUrl + 'configure_website';
        form.innerHTML = `
            <input type="hidden" name="action" value="delete_hero_slide">
            <input type="hidden" name="slide_id" value="${id}">
        `;
        document.body.appendChild(form);
        form.submit();
    }
}

// ==========================================
// OUR WORKS MODAL HANDLERS
// ==========================================
function openNewFeaturedModal() {
    const layoutNum = <?= (int)$curr_layout ?>;
    $('#featModalTitle').text('Add Our Works Item');
    $('#featItemId').val(0);
    $('#featLayoutNum').val(layoutNum);
    $('#featTitle').val('');
    $('#featShortDesc').val('');
    $('#featThumbnailUrl').val('assets/template2/images/work/work-1-1.jpg');
    $('#featButtonText').val('View Work');
    $('#featButtonLink').val('booking');
    $('#featSortOrder').val(1);
    $('#featStatus').val('active');
}

function openEditFeaturedModal(item) {
    const layoutNum = item.layout_number || <?= (int)$curr_layout ?>;
    $('#featModalTitle').text('Edit Our Works: ' + item.title);
    $('#featItemId').val(item.id);
    $('#featLayoutNum').val(layoutNum);
    $('#featTitle').val(item.title);
    $('#featShortDesc').val(item.short_desc);
    $('#featThumbnailUrl').val(item.thumbnail);
    $('#featButtonText').val(item.button_text || 'View Work');
    $('#featButtonLink').val(item.button_link || 'booking');
    $('#featSortOrder').val(item.sort_order);
    $('#featStatus').val(item.status);
    const m = new bootstrap.Modal(document.getElementById('modalFeaturedItem'));
    m.show();
}

function deleteFeaturedItem(id) {
    if (confirm('Are you sure you want to delete this item?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = baseAdminUrl + 'configure_website';
        form.innerHTML = `
            <input type="hidden" name="action" value="delete_featured_item">
            <input type="hidden" name="item_id" value="${id}">
        `;
        document.body.appendChild(form);
        form.submit();
    }
}

// ==========================================
// TESTIMONIAL MODAL HANDLERS
// ==========================================
function openNewTestimonialModal() {
    $('#testiModalTitle').text('Add Testimonial');
    $('#testiId').val(0);
    $('#testiName').val('');
    $('#testiDesignation').val('');
    $('#testiRating').val('5');
    $('#testiReview').val('');
    $('#testiAvatarUrl').val('assets/template2/images/testimonial/testimonial-v1-img1.jpg');
    $('#testiSortOrder').val(1);
    $('#testiStatus').val('active');
}

function openEditTestimonialModal(tst) {
    $('#testiModalTitle').text('Edit Testimonial: ' + tst.client_name);
    $('#testiId').val(tst.id);
    $('#testiName').val(tst.client_name);
    $('#testiDesignation').val(tst.designation);
    $('#testiRating').val(tst.rating);
    $('#testiReview').val(tst.review);
    $('#testiAvatarUrl').val(tst.avatar);
    $('#testiSortOrder').val(tst.sort_order);
    $('#testiStatus').val(tst.status);
    const m = new bootstrap.Modal(document.getElementById('modalTestimonial'));
    m.show();
}

function deleteTestimonial(id) {
    if (confirm('Delete this client testimonial?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = baseAdminUrl + 'configure_website';
        form.innerHTML = `
            <input type="hidden" name="action" value="delete_testimonial">
            <input type="hidden" name="testimonial_id" value="${id}">
        `;
        document.body.appendChild(form);
        form.submit();
    }
}

// ==========================================
// FAQ MODAL HANDLERS
// ==========================================
function openNewFaqModal() {
    $('#faqModalTitle').text('Add FAQ Item (Layout <?= $curr_layout ?>)');
    $('#faqId').val(0);
    $('#faqLayoutNum').val(<?= (int)$curr_layout ?>);
    $('#faqQuestion').val('');
    $('#faqAnswer').val('');
    $('#faqSortOrder').val(1);
    $('#faqStatus').val('active');
}

function openEditFaqModal(fq) {
    $('#faqModalTitle').text('Edit FAQ: ' + (fq.question ? fq.question.substring(0, 30) + '...' : ''));
    $('#faqId').val(fq.id);
    $('#faqLayoutNum').val(fq.layout_number || <?= (int)$curr_layout ?>);
    $('#faqQuestion').val(fq.question);
    $('#faqAnswer').val(fq.answer);
    $('#faqSortOrder').val(fq.sort_order);
    $('#faqStatus').val(fq.status);
    const m = new bootstrap.Modal(document.getElementById('modalFaq'));
    m.show();
}

function deleteFaq(id) {
    if (confirm('Delete this FAQ item?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = baseAdminUrl + 'configure_website';
        form.innerHTML = `
            <input type="hidden" name="action" value="delete_faq">
            <input type="hidden" name="faq_id" value="${id}">
        `;
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
