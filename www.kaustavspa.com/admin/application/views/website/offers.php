<div class="row align-items-center mb-4">
    <div class="col-md-8">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-tags text-primary me-2"></i> Promotional Offers & Discounts</h4>
        <p class="text-muted mb-0">Publish limited-time marketing discounts and coupon codes on your website.</p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newOfferModal">
            <i class="fa-solid fa-plus me-1"></i> Create Special Offer
        </button>
    </div>
</div>

<div class="row g-4">
    <?php if (!empty($offers)): ?>
        <?php foreach ($offers as $o): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0 border-top border-4 border-warning">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="badge bg-danger fs-14px px-3 py-2 fw-bold"><?= html_escape($o->discount_text) ?></span>
                            <?php if ($o->coupon_code): ?>
                                <span class="badge bg-light text-dark border font-monospace fs-13px">CODE: <?= html_escape($o->coupon_code) ?></span>
                            <?php endif; ?>
                        </div>
                        <h5 class="fw-bold mt-3 mb-2"><?= html_escape($o->title) ?></h5>
                        <p class="text-muted fs-14px mb-3"><?= html_escape($o->description) ?></p>
                        <?php if ($o->valid_until): ?>
                            <small class="text-muted d-block"><i class="fa-regular fa-clock me-1"></i> Valid until: <?= date('d M Y', strtotime($o->valid_until)) ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5 text-muted">No active promotional offers.</div>
    <?php endif; ?>
</div>

<div class="modal fade" id="newOfferModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= admin_url('website/offers') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Create Special Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Offer Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. First-Time Guest Special">
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Discount Badge Text</label>
                            <input type="text" name="discount_text" class="form-control" required placeholder="e.g. 20% OFF or $25 OFF">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Coupon Code</label>
                            <input type="text" name="coupon_code" class="form-control" placeholder="e.g. GLOW20">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Expiry Date</label>
                        <input type="date" name="valid_until" class="form-control" value="<?= date('Y-m-d', strtotime('+30 days')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Terms and details of offer..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Offer</button>
                </div>
            </form>
        </div>
    </div>
</div>
