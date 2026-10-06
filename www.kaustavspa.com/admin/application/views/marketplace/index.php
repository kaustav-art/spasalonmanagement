<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-crown text-warning me-2"></i>Super Admin & Script Marketplace</h4>
        <p class="text-muted mb-0">Manage commercial script purchase cards, customer licenses, and script packages.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= base_url('../') ?>" target="_blank" class="btn btn-outline-primary me-2">
            <i class="fas fa-external-link-alt me-1"></i>View Product Website
        </a>
        <a href="<?= admin_url('marketplace/plans') ?>" class="btn btn-primary">
            <i class="fas fa-tags me-1"></i>Manage Purchase Cards
        </a>
    </div>
</div>

<!-- KPI Metrics -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm border-start border-success border-4">
            <div class="card-body">
                <span class="text-muted small fw-semibold text-uppercase">Total Script Revenue</span>
                <h3 class="fw-bold text-success mt-2 mb-0"><?= format_currency($total_revenue) ?></h3>
                <small class="text-muted">Lifetime script sales</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm border-start border-primary border-4">
            <div class="card-body">
                <span class="text-muted small fw-semibold text-uppercase">Total Script Orders</span>
                <h3 class="fw-bold text-primary mt-2 mb-0"><?= $total_orders ?> Orders</h3>
                <small class="text-muted">Paid customer purchases</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm border-start border-warning border-4">
            <div class="card-body">
                <span class="text-muted small fw-semibold text-uppercase">Active Licenses</span>
                <h3 class="fw-bold text-warning mt-2 mb-0"><?= $active_licenses ?> Issued</h3>
                <small class="text-muted">Licensed client domains</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm border-start border-info border-4">
            <div class="card-body">
                <span class="text-muted small fw-semibold text-uppercase">Package Downloads</span>
                <h3 class="fw-bold text-info mt-2 mb-0"><?= $total_downloads ?> Zip Downloads</h3>
                <small class="text-muted">Script deliveries</small>
            </div>
        </div>
    </div>
</div>

<!-- Purchase Cards Overview -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0"><i class="fas fa-shopping-cart text-primary me-2"></i>Product Edition Pricing Cards (Active on Main Website)</h6>
        <a href="<?= admin_url('marketplace/plans') ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit me-1"></i>Edit Pricing & Features</a>
    </div>
    <div class="card-body">
        <div class="row g-4">
            <?php foreach ($plans as $plan): ?>
            <div class="col-lg-4">
                <div class="card h-100 border-2 <?= $plan->plan_code === 'SALON_SPA' ? 'border-warning shadow-sm' : 'border-light shadow-sm' ?>">
                    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                        <div>
                            <span class="badge <?= $plan->plan_code === 'SALON_SPA' ? 'bg-warning text-dark' : 'bg-primary text-white' ?> text-uppercase mb-1"><?= htmlspecialchars($plan->badge) ?></span>
                            <h5 class="fw-bold mb-0 text-dark"><?= htmlspecialchars($plan->name) ?></h5>
                        </div>
                        <span class="badge bg-success">ACTIVE</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-baseline gap-2 mb-2">
                            <h2 class="fw-bold text-dark mb-0"><?= format_currency($plan->price) ?></h2>
                            <?php if ($plan->original_price > $plan->price): ?>
                                <span class="text-muted text-decoration-line-through"><?= format_currency($plan->original_price) ?></span>
                            <?php endif; ?>
                            <small class="text-muted">/ one-time</small>
                        </div>
                        <p class="text-muted small mb-3"><?= htmlspecialchars($plan->tagline) ?></p>

                        <?php 
                            $feats = json_decode($plan->features, true);
                            if (!empty($feats)):
                        ?>
                            <ul class="list-unstyled small mb-0 lh-lg">
                                <?php foreach (array_slice($feats, 0, 5) as $f): ?>
                                    <li class="text-secondary"><i class="fas fa-check-circle text-success me-2"></i><?= htmlspecialchars($f) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer bg-light border-top text-center py-2">
                        <small class="text-muted">Code: <code><?= $plan->plan_code ?></code> &bull; Template 1 & 2 Included</small>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Recent Script Orders -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0"><i class="fas fa-history text-primary me-2"></i>Recent Script Purchases & Customer Orders</h6>
        <a href="<?= admin_url('marketplace/orders') ?>" class="btn btn-sm btn-outline-secondary">View All Orders</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Order #</th>
                        <th>Customer / Business</th>
                        <th>Edition Plan</th>
                        <th>Chosen Theme & Layout</th>
                        <th>Amount</th>
                        <th>License Key</th>
                        <th>Downloads</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recent_orders)): ?>
                        <tr><td colspan="8" class="text-center py-4 text-muted">No script orders recorded yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($recent_orders as $ord): ?>
                        <tr>
                            <td class="ps-3 fw-bold"><span class="badge bg-light text-dark border">#<?= htmlspecialchars($ord->order_number) ?></span></td>
                            <td>
                                <div class="fw-bold"><?= htmlspecialchars($ord->customer_name) ?></div>
                                <small class="text-muted"><?= htmlspecialchars($ord->business_name ? $ord->business_name : $ord->customer_email) ?></small>
                            </td>
                            <td>
                                <span class="badge <?= $ord->plan_code === 'SALON_SPA' ? 'bg-warning text-dark' : 'bg-primary' ?>"><?= str_replace('_', ' + ', $ord->plan_code) ?></span>
                            </td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary"><?= ucfirst($ord->chosen_template) ?></span>
                                <small class="text-muted ms-1">Layout <?= $ord->chosen_layout ?></small>
                            </td>
                            <td class="fw-bold text-success"><?= format_currency($ord->amount) ?></td>
                            <td>
                                <code class="small"><?= htmlspecialchars($ord->license_key) ?></code>
                            </td>
                            <td>
                                <span class="badge bg-info-subtle text-info"><i class="fas fa-download me-1"></i><?= $ord->download_count ?></span>
                            </td>
                            <td>
                                <span class="badge bg-success">PAID</span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
