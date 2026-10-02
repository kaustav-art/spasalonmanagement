<div class="row align-items-center mb-4">
    <div class="col-md-8">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-comments text-primary me-2"></i> Client Reviews & Testimonials</h4>
        <p class="text-muted mb-0">Manage customer feedback, ratings, and quotes displayed on the public website.</p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTestimonialModal">
            <i class="fa-solid fa-plus me-1"></i> Add Testimonial
        </button>
    </div>
</div>

<div class="row g-4">
    <?php if (!empty($testimonials)): ?>
        <?php foreach ($testimonials as $t): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="text-warning">
                                <?php for($i=1; $i<=$t->rating; $i++): ?>
                                    <i class="fa-solid fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <a href="<?= admin_url('website/delete_testimonial/' . $t->id) ?>" class="text-danger" onclick="return confirm('Delete this testimonial?');">
                                <i class="fa-solid fa-trash fs-13px"></i>
                            </a>
                        </div>
                        <p class="text-dark fs-14px fst-italic flex-grow-1">"<?= html_escape($t->review) ?>"</p>
                        <div class="d-flex align-items-center gap-2 pt-2 border-top">
                            <div class="avatar avatar-md rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold">
                                <?= strtoupper(substr($t->client_name, 0, 1)) ?>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark"><?= html_escape($t->client_name) ?></h6>
                                <small class="text-muted"><?= html_escape($t->client_role) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5 text-muted">No testimonials available.</div>
    <?php endif; ?>
</div>

<div class="modal fade" id="newTestimonialModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= admin_url('website/testimonials') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Client Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Client Name</label>
                        <input type="text" name="client_name" class="form-control" required placeholder="e.g. Jessica Alba">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Role / Profession</label>
                        <input type="text" name="client_role" class="form-control" placeholder="e.g. Verified Client, Fashion Stylist">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Star Rating (1 to 5)</label>
                        <select name="rating" class="form-select">
                            <option value="5" selected>5 Stars (Excellent)</option>
                            <option value="4">4 Stars (Very Good)</option>
                            <option value="3">3 Stars (Good)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Review / Quote</label>
                        <textarea name="review" class="form-control" rows="3" required placeholder="The experience was truly transformative..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Publish Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>
