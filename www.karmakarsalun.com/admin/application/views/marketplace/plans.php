<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-tags text-primary me-2"></i>Manage Purchase Cards & Editions</h4>
        <p class="text-muted mb-0">Modify retail prices, original discount prices, badges, and included features shown on the main website.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('marketplace') ?>" class="btn btn-outline-secondary me-2">
            <i class="fas fa-arrow-left me-1"></i>Marketplace Dashboard
        </a>
        <a href="<?= base_url('../#pricing') ?>" target="_blank" class="btn btn-outline-primary">
            <i class="fas fa-external-link-alt me-1"></i>View on Website
        </a>
    </div>
</div>

<div class="row g-4">
    <?php foreach ($plans as $plan): 
        $features = json_decode($plan->features, true);
        $features_text = is_array($features) ? implode("\n", $features) : '';
    ?>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div>
                    <span class="badge bg-secondary-subtle text-secondary mb-1">Code: <?= $plan->plan_code ?></span>
                    <h5 class="fw-bold mb-0 text-dark"><?= htmlspecialchars($plan->name) ?></h5>
                </div>
                <span class="badge bg-success">ACTIVE</span>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="<?= admin_url('marketplace/plans') ?>">
                    <input type="hidden" name="plan_id" value="<?= $plan->id ?>">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Edition Plan Title</label>
                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($plan->name) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tagline / Subtitle</label>
                        <input type="text" name="tagline" class="form-control" value="<?= htmlspecialchars($plan->tagline) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Card Badge (e.g. POPULAR, BEST VALUE)</label>
                        <input type="text" name="badge" class="form-control" value="<?= htmlspecialchars($plan->badge) ?>">
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Sale Price ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($plan->price) ?>" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Original Price ($)</label>
                            <input type="number" step="0.01" name="original_price" class="form-control" value="<?= htmlspecialchars($plan->original_price) ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="2"><?= htmlspecialchars($plan->description) ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Included Features (One feature per line)</label>
                        <textarea name="features" class="form-control" rows="7"><?= htmlspecialchars($features_text) ?></textarea>
                        <small class="text-muted">Each line will be rendered with a green checkmark icon.</small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-save me-1"></i>Save Edition Card Details
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
