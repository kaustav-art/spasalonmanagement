<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-cash-register text-primary me-2"></i>Cash Register & Daily Till</h4>
        <p class="text-muted mb-0">Open/close front-desk registers, track cash intake, payouts, and balance reconciliation.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('pos') ?>" class="btn btn-outline-primary">
            <i class="fas fa-calculator me-1"></i>Open POS Terminal
        </a>
    </div>
</div>

<div class="row g-4 mb-4">
    <!-- Active Register Status -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h6 class="card-title fw-bold mb-0">Current Till Status</h6>
                <?php if ($current_register): ?>
                    <span class="badge bg-success px-2 py-1"><i class="fas fa-unlock me-1"></i>Drawer OPEN</span>
                <?php else: ?>
                    <span class="badge bg-secondary px-2 py-1"><i class="fas fa-lock me-1"></i>Drawer CLOSED</span>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php if ($current_register): ?>
                    <div class="row g-3 text-center mb-4">
                        <div class="col-4">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block mb-1">Opening Cash</small>
                                <span class="fw-bold fs-6 text-dark"><?= format_currency($current_register->opening_balance) ?></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block mb-1">Cash In (Sales)</small>
                                <span class="fw-bold fs-6 text-success">+<?= format_currency($current_register->cash_in) ?></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-3 bg-light rounded">
                                <small class="text-muted d-block mb-1">Cash Out (Expense)</small>
                                <span class="fw-bold fs-6 text-danger">-<?= format_currency($current_register->cash_out) ?></span>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $expected_cash = $current_register->opening_balance + $current_register->cash_in - $current_register->cash_out;
                    ?>
                    <div class="alert alert-primary d-flex align-items-center justify-content-between py-2 mb-4">
                        <span class="fw-semibold">Expected Cash in Drawer:</span>
                        <span class="fw-bold fs-5"><?= format_currency($expected_cash) ?></span>
                    </div>

                    <form method="POST" action="<?= admin_url('finance/cash_register') ?>">
                        <input type="hidden" name="action" value="close">
                        <input type="hidden" name="register_id" value="<?= $current_register->id ?>">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Actual Closing Cash Counted ($) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="closing_balance" class="form-control" value="<?= $expected_cash ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Closing Notes / Discrepancy Note</label>
                            <textarea name="notes" class="form-control" rows="2" placeholder="Explain any cash overage or shortage..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to close this register?');">
                            <i class="fas fa-lock me-1"></i>Close Cash Register & Reconcile
                        </button>
                    </form>
                <?php else: ?>
                    <p class="text-muted">No open register session at the moment. Open a session to begin logging cash transactions at the front desk.</p>
                    <form method="POST" action="<?= admin_url('finance/cash_register') ?>">
                        <input type="hidden" name="action" value="open">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Opening Float / Petty Cash ($) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="opening_balance" class="form-control" value="200.00" required>
                            <small class="text-muted">Initial cash amount in the drawer for change.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Notes</label>
                            <textarea name="notes" class="form-control" rows="2" placeholder="e.g. Morning opening shift..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-unlock me-1"></i>Open New Cash Register Session
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Quick Help & Drawer Information -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3 border-bottom">
                <h6 class="card-title fw-bold mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Cash Management Guidelines</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled text-muted small lh-lg mb-0">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i><strong>Opening Float:</strong> Always count drawer bills and coins before opening. Standard default is $200.00.</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i><strong>Automatic Inflow:</strong> All cash sales completed via the POS Checkout Terminal automatically increment <code>Cash In</code>.</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i><strong>Cash Outflows:</strong> Any operational expense paid with method "Cash" automatically deducts from the active drawer.</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i><strong>End of Shift Count:</strong> Count the physical currency at shift closing, input the exact total, and system calculates discrepancy.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Past Register Sessions Log -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0">Past Closed Registers (Audit Log)</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">ID</th>
                        <th>Opened At</th>
                        <th>Closed At</th>
                        <th>Opening Float</th>
                        <th>Cash In</th>
                        <th>Cash Out</th>
                        <th>Closing Balance</th>
                        <th>Variance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($past_registers)): ?>
                        <tr><td colspan="8" class="text-center py-4 text-muted">No closed register sessions yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($past_registers as $r): 
                            $expected = $r->opening_balance + $r->cash_in - $r->cash_out;
                            $diff = $r->closing_balance - $expected;
                        ?>
                        <tr>
                            <td class="ps-3 text-muted">#<?= $r->id ?></td>
                            <td><?= date('M d, Y h:i A', strtotime($r->opened_at)) ?></td>
                            <td><?= $r->closed_at ? date('M d, Y h:i A', strtotime($r->closed_at)) : '—' ?></td>
                            <td><?= format_currency($r->opening_balance) ?></td>
                            <td class="text-success">+<?= format_currency($r->cash_in) ?></td>
                            <td class="text-danger">-<?= format_currency($r->cash_out) ?></td>
                            <td class="fw-bold"><?= format_currency($r->closing_balance) ?></td>
                            <td>
                                <?php if ($diff == 0): ?>
                                    <span class="badge bg-success-subtle text-success">Exact ($0.00)</span>
                                <?php elseif ($diff > 0): ?>
                                    <span class="badge bg-info-subtle text-info">+<?= format_currency($diff) ?> Over</span>
                                <?php else: ?>
                                    <span class="badge bg-danger-subtle text-danger"><?= format_currency($diff) ?> Short</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
