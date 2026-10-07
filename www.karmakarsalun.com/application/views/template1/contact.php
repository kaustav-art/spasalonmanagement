<!-- Page Banner -->
<section class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?= template_asset('images/bg/slider-bg-01.jpg', 'template1') ?>') center/cover;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif;">Contact Us & Location</h1>
        <p class="text-white-50 mb-0">Get in touch with our front desk team for personalized consultations and bookings.</p>
    </div>
</section>

<section class="py-5" style="background: #121212; color: #fff;">
    <div class="container py-4">

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                <i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row g-5">
            <div class="col-lg-5">
                <h3 class="fw-bold mb-4" style="font-family: 'Prata', serif;">Visit Our Sanctuary</h3>
                <p class="text-muted leading-relaxed mb-4">
                    Whether you are seeking a complete hair transformation, a soothing massage, or custom skin therapy, we welcome you to visit us or call our reception.
                </p>

                <div class="d-flex align-items-start mb-4">
                    <div class="avatar-sm bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 44px; height: 44px;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-white mb-1">Our Location</h6>
                        <p class="text-muted small mb-0"><?= htmlspecialchars($business_address) ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="avatar-sm bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 44px; height: 44px;">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-white mb-1">Direct Phone Line</h6>
                        <p class="text-muted small mb-0"><?= htmlspecialchars($business_phone) ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="avatar-sm bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 44px; height: 44px;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-white mb-1">Email Inquiries</h6>
                        <p class="text-muted small mb-0"><?= htmlspecialchars($business_email) ?></p>
                    </div>
                </div>

                <div class="p-4 rounded-3 bg-dark border border-secondary border-opacity-25 mt-4">
                    <h6 class="fw-bold text-warning mb-2"><i class="far fa-clock me-2"></i>Operating Hours</h6>
                    <ul class="list-unstyled text-muted small mb-0 lh-lg">
                        <li>Mon &ndash; Sat: 09:00 AM &ndash; 08:00 PM</li>
                        <li>Sun: 10:00 AM &ndash; 06:00 PM</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="p-4 p-md-5 rounded-4 bg-dark border border-secondary border-opacity-25">
                    <h4 class="fw-bold text-white mb-2" style="font-family: 'Prata', serif;">Send Us a Message</h4>
                    <p class="text-muted small mb-4">We will reply to your inquiries within a few business hours.</p>

                    <form method="POST" action="<?= website_url('contact') ?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Your Full Name <span class="text-warning">*</span></label>
                                <input type="text" name="name" class="form-control bg-black text-white border-secondary" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Your Email Address <span class="text-warning">*</span></label>
                                <input type="email" name="email" class="form-control bg-black text-white border-secondary" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Phone Number</label>
                                <input type="text" name="phone" class="form-control bg-black text-white border-secondary">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Subject / Inquiry Type</label>
                                <input type="text" name="subject" class="form-control bg-black text-white border-secondary" placeholder="e.g. Bridal Package, Spa Day">
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted small">Your Message <span class="text-warning">*</span></label>
                                <textarea name="message" class="form-control bg-black text-white border-secondary" rows="4" required></textarea>
                            </div>
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-gold px-4 py-2">
                                    <i class="fas fa-paper-plane me-2"></i>Send Inquiry
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
