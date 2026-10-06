<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-box-open text-primary me-2"></i> Packages & Bundles</h4>
        <p class="text-muted mb-0">Multi-session bundles and promotional combination experiences.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPackageModal">
            <i class="fa-solid fa-plus me-1"></i> Add Package
        </button>
    </div>
</div>

<div class="row g-4">
    <?php foreach ($packages as $pkg): ?>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0 border-top border-4 border-primary">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge <?= ($pkg->type === 'salon') ? 'badge-edition-salon' : (($pkg->type === 'spa') ? 'badge-edition-spa' : 'badge-edition-both') ?>">
                            <?= ucfirst($pkg->type) ?> Package
                        </span>
                        <span class="badge bg-light text-dark border"><i class="fa-regular fa-clock me-1"></i> <?= $pkg->validity_days ?> Days Validity</span>
                    </div>
                    <h5 class="fw-bold text-dark mt-2 mb-1"><?= html_escape($pkg->name) ?></h5>
                    <p class="text-muted fs-13px flex-grow-1"><?= html_escape($pkg->description) ?></p>

                    <div class="p-3 bg-light rounded-3 d-flex align-items-center justify-content-between mt-3">
                        <div>
                            <span class="text-muted fs-12px d-block">TOTAL SESSIONS</span>
                            <span class="fw-bold fs-16px text-dark"><?= $pkg->total_sessions ?> Sessions</span>
                        </div>
                        <div class="text-end">
                            <span class="text-muted fs-12px d-block">PACKAGE PRICE</span>
                            <span class="fw-bold fs-18px text-success"><?= format_currency($pkg->price) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="modal fade" id="newPackageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= admin_url('services/packages') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Create Treatment Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Package Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g. Total Body Detox Journey">
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Price (<?= get_setting('currency_symbol', '$') ?>) <span class="text-danger">*</span></label>
                            <input type="number" name="price" class="form-control" required step="0.01" min="0" placeholder="0.00">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Total Sessions <span class="text-danger">*</span></label>
                            <input type="number" name="total_sessions" class="form-control" value="5" min="1" required>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Validity (Days)</label>
                            <input type="number" name="validity_days" class="form-control" value="90" min="1">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Edition Type</label>
                            <select name="type" class="form-select">
                                <option value="salon">Salon Only</option>
                                <option value="spa">Spa Only</option>
                                <option value="both" selected>General / Both</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Included services, perks, and usage rules..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Package</button>
                </div>
            </form>
        </div>
    </div>
</div>
