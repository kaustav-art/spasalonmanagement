<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-plus text-primary me-2"></i> Add New Service</h4>
        <p class="text-muted mb-0">Configure service pricing, session duration, tax, and room requirements.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('services') ?>" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Catalog
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                <form action="<?= admin_url('services/create') ?>" method="POST">
                    <div class="row g-3 mb-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Service Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required placeholder="e.g. Balayage & Glaze Treatment">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Choose Category --</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat->id ?>"><?= html_escape($cat->name) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Price (<?= get_setting('currency_symbol', '$') ?>) <span class="text-danger">*</span></label>
                            <input type="number" name="price" class="form-control" required step="0.01" min="0" placeholder="0.00">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Duration (Minutes) <span class="text-danger">*</span></label>
                            <input type="number" name="duration" class="form-control" value="45" step="5" min="5" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Tax Rate (%)</label>
                            <input type="number" name="tax_rate" class="form-control" value="<?= get_setting('tax_rate', 8.5) ?>" step="0.1">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Service Edition Type</label>
                            <select name="type" class="form-select">
                                <option value="salon">Salon Service (Hair, Nails, Facial)</option>
                                <option value="spa">Spa Service (Massage, Scrub, Hydro)</option>
                                <option value="both" selected>General / Both</option>
                            </select>
                        </div>

                        <div class="col-md-6 d-flex align-items-center mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="requires_room" id="reqRoom" value="1">
                                <label class="form-check-label fw-semibold" for="reqRoom">Requires Private Spa Treatment Room</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Assign Staff Qualified for this Service</label>
                            <select name="staff_ids[]" class="form-select" multiple style="height: 110px;">
                                <?php foreach ($staff_members as $st): ?>
                                    <option value="<?= $st->id ?>"><?= html_escape($st->name) ?> (<?= ucfirst($st->role_type) ?>)</option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-muted fs-12px">Hold Ctrl (Cmd) to select multiple specialists.</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Description / What's Included</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Explain the technique, products used, and benefits..."></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="<?= admin_url('services') ?>" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">Save Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
