<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-hand-holding-usd text-primary me-2"></i>Staff Commissions Report</h4>
        <p class="text-muted mb-0">Track stylists and therapists performance commissions and payment disbursements.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <button onclick="window.print()" class="btn btn-outline-secondary me-2">
            <i class="fas fa-print me-1"></i>Print Report
        </button>
        <a href="<?= admin_url('staff/commissions') ?>" class="btn btn-primary">
            <i class="fas fa-money-check-alt me-1"></i>Pay Commissions
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3">
        <form method="GET" action="<?= admin_url('reports/commissions') ?>" class="row g-2 align-items-center">
            <div class="col-md-3">
                <select name="staff_id" class="form-select form-select-sm">
                    <option value="">All Stylists & Therapists</option>
                    <?php foreach ($staff_members as $sm): ?>
                        <option value="<?= $sm->id ?>" <?= $filter_staff_id == $sm->id ? 'selected' : '' ?>><?= htmlspecialchars($sm->name) ?> (<?= ucfirst($sm->role_type) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="from" class="form-control form-control-sm" value="<?= htmlspecialchars($from) ?>">
            </div>
            <div class="col-md-3">
                <input type="date" name="to" class="form-control form-control-sm" value="<?= htmlspecialchars($to) ?>">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm w-100"><i class="fas fa-filter me-1"></i>Filter</button>
                <a href="<?= admin_url('reports/commissions') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-redo"></i></a>
            </div>
        </form>
    </div>
</div>

<!-- Total Stats -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-primary border-4">
            <div class="card-body">
                <span class="text-muted small fw-semibold text-uppercase">Total Earned Commissions</span>
                <h3 class="fw-bold text-primary mt-2 mb-0"><?= format_currency($total_commission) ?></h3>
                <small class="text-muted"><?= count($commissions) ?> commission events in timeframe</small>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0">Commission Records (<?= count($commissions) ?>)</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Staff Member</th>
                        <th>Role</th>
                        <th>Invoice / Service</th>
                        <th>Service Value</th>
                        <th>Rate (%)</th>
                        <th>Commission Earned</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($commissions)): ?>
                        <tr><td colspan="8" class="text-center py-4 text-muted">No commission records found for this period.</td></tr>
                    <?php else: ?>
                        <?php foreach ($commissions as $c): ?>
                        <tr>
                            <td class="ps-3 fw-bold text-dark"><?= htmlspecialchars($c->staff_name) ?></td>
                            <td><span class="badge bg-secondary-subtle text-secondary text-capitalize"><?= htmlspecialchars($c->role_type) ?></span></td>
                            <td>
                                <div class="fw-semibold"><?= htmlspecialchars($c->service_name ? $c->service_name : 'General Service') ?></div>
                                <small class="text-muted">Inv #<?= htmlspecialchars($c->invoice_number) ?></small>
                            </td>
                            <td><?= format_currency($c->service_amount) ?></td>
                            <td><?= $c->commission_rate ?>%</td>
                            <td class="fw-bold text-success">+<?= format_currency($c->commission_amount) ?></td>
                            <td>
                                <span class="badge <?= $c->status == 'paid' ? 'bg-success' : 'bg-warning text-dark' ?>">
                                    <?= ucfirst($c->status) ?>
                                </span>
                            </td>
                            <td class="text-muted small"><?= date('M d, Y', strtotime($c->created_at)) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
