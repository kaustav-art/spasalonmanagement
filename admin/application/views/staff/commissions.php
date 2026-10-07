<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-hand-holding-dollar text-primary me-2"></i> Staff Commissions & Payouts</h4>
        <p class="text-muted mb-0">Automated performance commission tracking per completed service and invoice.</p>
    </div>
</div>

<!-- Filter by Staff -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-3">
        <form action="<?= admin_url('staff/commissions') ?>" method="GET" class="row g-2 align-items-end">
            <div class="col-md-5">
                <label class="form-label fs-13px fw-semibold mb-1">Filter by Staff Member</label>
                <select name="staff_id" class="form-select form-select-sm">
                    <option value="">All Staff</option>
                    <?php foreach ($all_staff as $s): ?>
                        <option value="<?= $s->id ?>" <?= ($current_staff == $s->id) ? 'selected' : '' ?>><?= html_escape($s->name) ?> (<?= ucfirst($s->role_type) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary w-100">Filter</button>
                <a href="<?= admin_url('staff/commissions') ?>" class="btn btn-sm btn-light border">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Staff Member</th>
                        <th>Invoice #</th>
                        <th>Service Rendered</th>
                        <th>Service Value</th>
                        <th>Commission %</th>
                        <th>Commission Amount</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Payout Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($commissions)): ?>
                        <?php foreach ($commissions as $comm): ?>
                            <tr>
                                <td class="ps-4 fw-semibold text-dark">
                                    <?= html_escape($comm->staff_name) ?>
                                    <small class="badge bg-light text-muted border ms-1"><?= ucfirst($comm->role_type) ?></small>
                                </td>
                                <td class="text-primary fw-semibold"><?= html_escape($comm->invoice_number) ?></td>
                                <td><?= html_escape($comm->service_name ? $comm->service_name : 'Service') ?></td>
                                <td><?= format_currency($comm->service_amount) ?></td>
                                <td><?= $comm->commission_rate ?>%</td>
                                <td class="fw-bold fs-15px text-success"><?= format_currency($comm->commission_amount) ?></td>
                                <td>
                                    <?php if ($comm->status === 'paid'): ?>
                                        <span class="badge bg-success">Paid (<?= date('d M', strtotime($comm->paid_date)) ?>)</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <?php if ($comm->status === 'pending'): ?>
                                        <a href="<?= admin_url('staff/pay_commission/' . $comm->id) ?>" class="btn btn-xs btn-outline-success" onclick="return confirm('Mark this commission as paid?');">
                                            <i class="fa-solid fa-check me-1"></i> Pay Now
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted fs-12px"><i class="fa-solid fa-check-double text-success"></i> Settled</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="8" class="text-center py-5 text-muted">No commission records found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
