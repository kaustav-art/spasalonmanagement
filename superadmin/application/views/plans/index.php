<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1 text-dark">
            <i class="fa-solid fa-tags text-warning me-2"></i>Pricing Plans &amp; Purchase Cards
        </h4>
        <p class="text-muted mb-0">Control live script edition prices, strike-through original prices, feature checklists, and marketing badges.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= main_site_url('#pricing') ?>" target="_blank" class="btn btn-outline-primary btn-sm px-3">
            <i class="fa-solid fa-eye me-1"></i> Preview on Website
        </a>
    </div>
</div>

<!-- Super Admin Notice Banner -->
<div class="alert alert-dark border-0 shadow-sm d-flex align-items-center mb-4 text-white">
    <div class="rounded-circle bg-warning text-dark p-2 me-3 flex-shrink-0">
        <i class="fa-solid fa-bolt"></i>
    </div>
    <div class="flex-grow-1 small">
        <strong>Instant Live Sync:</strong> Any changes saved below directly update the pricing table, purchase cards, and checkout calculation on the landing page (<code>index.php</code>) without needing code modifications.
    </div>
</div>

<!-- Plan Cards Grid -->
<div class="row g-4">
    <?php foreach ($plans as $p): ?>
        <?php $features = json_decode($p->features, true); ?>
        <div class="col-lg-4">
            <div class="card h-100 border-2 rounded-3 shadow-sm <?= $p->plan_code === 'SALON_SPA' ? 'border-warning' : 'border-light' ?>">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <div>
                        <span class="badge <?= $p->plan_code === 'SALON_SPA' ? 'bg-warning text-dark' : 'bg-primary text-white' ?> text-uppercase fw-bold"><?= htmlspecialchars($p->badge) ?></span>
                        <h5 class="fw-bold text-dark mt-1 mb-0"><?= htmlspecialchars($p->name) ?></h5>
                    </div>
                    <span class="badge <?= $p->status === 'active' ? 'bg-success' : 'bg-secondary' ?> text-uppercase"><?= $p->status ?></span>
                </div>

                <div class="card-body p-4">
                    <div class="d-flex align-items-baseline gap-2 mb-2">
                        <h2 class="fw-bold text-dark mb-0"><?= format_currency($p->price) ?></h2>
                        <?php if ($p->original_price > $p->price): ?>
                            <span class="text-muted text-decoration-line-through"><?= format_currency($p->original_price) ?></span>
                            <span class="badge bg-danger-subtle text-danger small">Save <?= format_currency($p->original_price - $p->price) ?></span>
                        <?php endif; ?>
                    </div>
                    <p class="text-muted small mb-3"><?= htmlspecialchars($p->tagline) ?></p>

                    <div class="border-top pt-3 mb-3">
                        <span class="small fw-bold text-dark text-uppercase d-block mb-2">Included Features:</span>
                        <?php if (!empty($features)): ?>
                            <ul class="list-unstyled small mb-0 lh-lg">
                                <?php foreach ($features as $f): ?>
                                    <li class="text-secondary d-flex align-items-start gap-2 mb-1">
                                        <i class="fa-solid fa-circle-check text-success mt-1"></i>
                                        <span><?= htmlspecialchars($f) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card-footer bg-light border-top p-3 text-center">
                    <button type="button" class="btn btn-warning btn-sm w-100 fw-bold" data-bs-toggle="modal" data-bs-target="#editPlanModal<?= $p->id ?>">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit Plan &amp; Card
                    </button>
                </div>
            </div>
        </div>

        <!-- Edit Modal for this Plan -->
        <div class="modal fade" id="editPlanModal<?= $p->id ?>" tabindex="-1" aria-labelledby="editPlanLabel<?= $p->id ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <form action="<?= superadmin_url('plans') ?>" method="post">
                        <input type="hidden" name="action" value="update_plan">
                        <input type="hidden" name="plan_id" value="<?= $p->id ?>">

                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title fw-bold" id="editPlanLabel<?= $p->id ?>">
                                <i class="fa-solid fa-pen-to-square text-warning me-2"></i>Edit <?= htmlspecialchars($p->name) ?>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body p-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Plan Name</label>
                                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($p->name) ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Card Badge Text</label>
                                    <input type="text" class="form-control" name="badge" value="<?= htmlspecialchars($p->badge) ?>" placeholder="e.g. POPULAR, BEST VALUE">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Selling Price ($)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control" name="price" value="<?= $p->price ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Original Strike-through Price ($)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control" name="original_price" value="<?= $p->original_price ?>">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold">Tagline</label>
                                    <input type="text" class="form-control" name="tagline" value="<?= htmlspecialchars($p->tagline) ?>" placeholder="Brief marketing subtitle">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="active" <?= $p->status === 'active' ? 'selected' : '' ?>>Active (Visible on Website)</option>
                                        <option value="inactive" <?= $p->status === 'inactive' ? 'selected' : '' ?>>Inactive (Hidden)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Display Order</label>
                                    <input type="number" class="form-control" name="sort_order" value="<?= $p->sort_order ?>" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold">Plan Description</label>
                                    <textarea class="form-control" name="description" rows="2"><?= htmlspecialchars($p->description) ?></textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold">Features List (One feature per line)</label>
                                    <?php 
                                        $f_text = !empty($features) ? implode("\n", $features) : '';
                                    ?>
                                    <textarea class="form-control font-monospace small" name="features" rows="6"><?= htmlspecialchars($f_text) ?></textarea>
                                    <small class="text-muted">Enter each bullet feature on a new line. It will be converted into JSON automatically.</small>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-warning btn-sm fw-bold px-3">
                                <i class="fa-solid fa-save me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
