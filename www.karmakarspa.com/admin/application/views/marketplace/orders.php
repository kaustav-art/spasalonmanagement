<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-file-invoice text-primary me-2"></i>Script Customer Orders & Purchases</h4>
        <p class="text-muted mb-0">Complete ledger of buyers who registered and purchased Salon & Spa editions.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('marketplace') ?>" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3">
        <form method="GET" action="<?= admin_url('marketplace/orders') ?>" class="row g-2 align-items-center">
            <div class="col-md-4">
                <select name="plan" class="form-select form-select-sm">
                    <option value="">All Purchased Editions</option>
                    <option value="SALON" <?= $filter_plan === 'SALON' ? 'selected' : '' ?>>Salon Management</option>
                    <option value="SPA" <?= $filter_plan === 'SPA' ? 'selected' : '' ?>>Spa Wellness</option>
                    <option value="SALON_SPA" <?= $filter_plan === 'SALON_SPA' ? 'selected' : '' ?>>Salon & Spa Combo</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm w-100"><i class="fas fa-filter me-1"></i>Filter</button>
            </div>
            <div class="col-md-2">
                <a href="<?= admin_url('marketplace/orders') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-redo"></i></a>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0">Purchased Script Orders (<?= count($orders) ?>)</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Order Number</th>
                        <th>Buyer Name</th>
                        <th>Email / Contact</th>
                        <th>Edition</th>
                        <th>Template & Layout</th>
                        <th>Amount</th>
                        <th>License Key</th>
                        <th>Downloads</th>
                        <th>Purchased Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($orders)): ?>
                        <tr><td colspan="9" class="text-center py-4 text-muted">No script orders recorded yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($orders as $o): ?>
                        <tr>
                            <td class="ps-3 fw-bold">
                                <span class="badge bg-light text-dark border">#<?= htmlspecialchars($o->order_number) ?></span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($o->customer_name) ?></div>
                                <small class="text-muted"><?= htmlspecialchars($o->business_name ? $o->business_name : 'Individual Buyer') ?></small>
                            </td>
                            <td>
                                <div><?= htmlspecialchars($o->customer_email) ?></div>
                                <small class="text-muted"><?= htmlspecialchars($o->customer_phone) ?></small>
                            </td>
                            <td>
                                <span class="badge <?= $o->plan_code === 'SALON_SPA' ? 'bg-warning text-dark' : 'bg-primary' ?>"><?= str_replace('_', ' + ', $o->plan_code) ?></span>
                            </td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary"><?= ucfirst($o->chosen_template) ?></span>
                                <small class="text-muted ms-1">Layout <?= $o->chosen_layout ?></small>
                            </td>
                            <td class="fw-bold text-success"><?= format_currency($o->amount) ?></td>
                            <td>
                                <code><?= htmlspecialchars($o->license_key) ?></code>
                            </td>
                            <td>
                                <span class="badge bg-info-subtle text-info"><i class="fas fa-download me-1"></i><?= $o->download_count ?></span>
                            </td>
                            <td class="text-muted small"><?= date('M d, Y h:i A', strtotime($o->created_at)) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
