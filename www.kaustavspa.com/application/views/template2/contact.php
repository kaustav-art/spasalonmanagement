
<section class="py-5 bg-white">
    <div class="container py-4">

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                <i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row g-5">
            <div class="col-lg-5">
                <h3 class="fw-bold mb-4" style="font-family: 'Prata', serif; color: #2d241e;">Our Sanctuary Location</h3>
                <p class="text-muted leading-relaxed mb-4">
                    For inquiries regarding bridal parties, corporate retreats, custom massage treatments, or hair consultations, our concierge team is always here for you.
                </p>

                <div class="d-flex align-items-start mb-4">
                    <div class="avatar-sm rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 44px; height: 44px; background: #faf3ee; color: #b8865f;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1" style="color: #2d241e;">Sanctuary Address</h6>
                        <p class="text-muted small mb-0"><?= htmlspecialchars($business_address) ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="avatar-sm rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 44px; height: 44px; background: #faf3ee; color: #b8865f;">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1" style="color: #2d241e;">Concierge Phone</h6>
                        <p class="text-muted small mb-0"><?= htmlspecialchars($business_phone) ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="avatar-sm rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 44px; height: 44px; background: #faf3ee; color: #b8865f;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1" style="color: #2d241e;">Email Inquiries</h6>
                        <p class="text-muted small mb-0"><?= htmlspecialchars($business_email) ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="p-4 p-md-5 rounded-4 shadow-sm border-0" style="background: #faf8f5;">
                    <h4 class="fw-bold mb-2" style="font-family: 'Prata', serif; color: #2d241e;">Send a Note to Our Concierge</h4>
                    <p class="text-muted small mb-4">Leave your details and we will connect with you promptly.</p>

                    <form method="POST" action="<?= website_url('contact') ?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Your Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Your Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Phone Number</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Subject</label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted small">Your Message <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-pureglow px-4 py-2">
                                    Send Note <i class="fas fa-arrow-right ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
