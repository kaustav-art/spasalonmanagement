<!-- Dashboard Header -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <h3 class="fw-bold mb-1 text-dark">
            <i class="fa-solid fa-crown text-warning me-2"></i>Super Admin Control Panel
        </h3>
        <p class="text-muted mb-0">Master operational control for commercial licenses, pricing plans, orders, and multi-tenant instances.</p>
    </div>
    <div class="d-flex align-items-center gap-2 flex-wrap">
        <a href="<?= main_site_url() ?>" target="_blank" class="btn btn-outline-secondary btn-sm px-3">
            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Public Website
        </a>
        <a href="<?= superadmin_url('plans') ?>" class="btn btn-outline-warning btn-sm px-3 fw-bold">
            <i class="fa-solid fa-tags me-1"></i> Pricing Cards
        </a>
        <a href="<?= superadmin_url('tenants') ?>" class="btn btn-primary btn-sm px-3 fw-bold">
            <i class="fa-solid fa-sliders me-1"></i> Tenant Switcher
        </a>
    </div>
</div>

<!-- 4 Key Commercial Metric Cards -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-sm-6">
        <div class="sa-stat-card">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-bold text-uppercase">Total Script Revenue</span>
                <div class="sa-stat-icon revenue">
                    <i class="fa-solid fa-dollar-sign"></i>
                </div>
            </div>
            <h2 class="fw-bold text-success mb-1"><?= format_currency($total_revenue) ?></h2>
            <div class="d-flex align-items-center text-muted small">
                <i class="fa-solid fa-shield-check text-success me-1"></i> Lifetime verified payments
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="sa-stat-card">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-bold text-uppercase">Paid Script Orders</span>
                <div class="sa-stat-icon orders">
                    <i class="fa-solid fa-receipt"></i>
                </div>
            </div>
            <h2 class="fw-bold text-primary mb-1"><?= $total_orders ?></h2>
            <div class="d-flex align-items-center text-muted small">
                <i class="fa-solid fa-circle-check text-primary me-1"></i> Completed commercial orders
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="sa-stat-card">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-bold text-uppercase">Active Licenses</span>
                <div class="sa-stat-icon licenses">
                    <i class="fa-solid fa-key"></i>
                </div>
            </div>
            <h2 class="fw-bold text-warning mb-1"><?= $active_licenses ?></h2>
            <div class="d-flex align-items-center text-muted small">
                <i class="fa-solid fa-certificate text-warning me-1"></i> Self-hosted domain activations
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6">
        <div class="sa-stat-card">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-bold text-uppercase">Package Downloads</span>
                <div class="sa-stat-icon tenants">
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
            <h2 class="fw-bold text-info mb-1"><?= $total_downloads ?></h2>
            <div class="d-flex align-items-center text-muted small">
                <i class="fa-solid fa-file-zipper text-info me-1"></i> Software zip package deliveries
            </div>
        </div>
    </div>
</div>

<!-- Active Marketplace Pricing Cards Summary -->
<div class="card border-0 shadow-sm rounded-3 mb-4">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark">
            <i class="fa-solid fa-tags text-warning me-2"></i>Marketplace Pricing Plans (Live on Sales Website)
        </h6>
        <a href="<?= superadmin_url('plans') ?>" class="btn btn-sm btn-outline-primary fw-semibold">
            <i class="fa-solid fa-pen-to-square me-1"></i> Edit Pricing &amp; Features
        </a>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <?php foreach ($plans as $p): ?>
                <div class="col-md-4">
                    <div class="card h-100 border-2 rounded-3 <?= $p->plan_code === 'SALON_SPA' ? 'border-warning shadow-sm bg-warning bg-opacity-10' : 'border-light shadow-sm' ?>">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge <?= $p->plan_code === 'SALON_SPA' ? 'bg-warning text-dark' : 'bg-primary text-white' ?> text-uppercase fw-bold"><?= htmlspecialchars($p->badge) ?></span>
                                <span class="badge bg-success small">ACTIVE</span>
                            </div>
                            <h5 class="fw-bold text-dark mb-1"><?= htmlspecialchars($p->name) ?></h5>
                            <p class="text-muted small mb-3"><?= htmlspecialchars($p->tagline) ?></p>

                            <div class="d-flex align-items-baseline gap-2 mb-3">
                                <h3 class="fw-bold text-dark mb-0"><?= format_currency($p->price) ?></h3>
                                <?php if ($p->original_price > $p->price): ?>
                                    <span class="text-muted text-decoration-line-through small"><?= format_currency($p->original_price) ?></span>
                                    <span class="badge bg-danger-subtle text-danger small">Save <?= format_currency($p->original_price - $p->price) ?></span>
                                <?php endif; ?>
                            </div>

                            <?php 
                                $feats = json_decode($p->features, true);
                                if (!empty($feats)):
                            ?>
                                <ul class="list-unstyled small mb-0 lh-lg">
                                    <?php foreach (array_slice($feats, 0, 4) as $f): ?>
                                        <li class="text-secondary"><i class="fa-solid fa-check text-success me-2"></i><?= htmlspecialchars($f) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer bg-white border-top text-center py-2">
                            <a href="<?= superadmin_url('plans') ?>" class="btn btn-sm btn-link text-decoration-none text-primary fw-bold">
                                Edit Plan <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Two Columns: Recent Orders & Recent Issued Licenses -->
<div class="row g-4">
    <!-- Left Column: Recent Purchases -->
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-3 h-100">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h6 class="fw-bold mb-0 text-dark">
                    <i class="fa-solid fa-receipt text-primary me-2"></i>Recent Script Purchases
                </h6>
                <a href="<?= superadmin_url('orders') ?>" class="btn btn-sm btn-outline-secondary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table sa-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Plan</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recent_orders)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No script orders found yet.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recent_orders as $ord): ?>
                                <tr>
                                    <td>
                                        <div class="fw-bold font-monospace text-dark"><?= htmlspecialchars($ord->order_number) ?></div>
                                        <small class="text-muted"><?= format_custom_date($ord->created_at, 'd M, h:i A') ?></small>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark"><?= htmlspecialchars($ord->customer_name) ?></div>
                                        <small class="text-muted"><?= htmlspecialchars($ord->customer_email) ?></small>
                                    </td>
                                    <td><?= plan_badge($ord->plan_code) ?></td>
                                    <td class="fw-bold text-success"><?= format_currency($ord->amount) ?></td>
                                    <td><?= status_badge($ord->payment_status) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right Column: Recent Licenses -->
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm rounded-3 h-100">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h6 class="fw-bold mb-0 text-dark">
                    <i class="fa-solid fa-key text-warning me-2"></i>Recent Licenses
                </h6>
                <a href="<?= superadmin_url('licenses') ?>" class="btn btn-sm btn-outline-secondary">View All</a>
            </div>
            <div class="card-body p-3">
                <?php if (empty($recent_licenses)): ?>
                    <p class="text-center text-muted py-4 mb-0">No licenses issued yet.</p>
                <?php else: ?>
                    <div class="d-flex flex-column gap-3">
                        <?php foreach ($recent_licenses as $lic): ?>
                            <div class="p-3 border rounded-3 bg-light">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <?= plan_badge($lic->plan_code) ?>
                                    <?= status_badge($lic->status) ?>
                                </div>
                                <div class="sa-code-badge w-100 justify-content-between mb-2">
                                    <span class="copy-target"><?= htmlspecialchars($lic->license_key) ?></span>
                                    <i class="fa-regular fa-copy sa-copy-btn" title="Copy License Key"></i>
                                </div>
                                <div class="d-flex justify-content-between align-items-center small text-muted">
                                    <span class="text-truncate" style="max-width: 180px;"><i class="fa-regular fa-envelope me-1"></i><?= htmlspecialchars($lic->customer_email) ?></span>
                                    <span><?= format_custom_date($lic->created_at, 'd M Y') ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
