<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-file-invoice-dollar text-primary me-2"></i>Expenses & Operating Costs</h4>
        <p class="text-muted mb-0">Record salon/spa facility rent, utilities, staff payroll, laundry, and advertising.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('finance/categories') ?>" class="btn btn-outline-secondary me-2">
            <i class="fas fa-tags me-1"></i>Expense Categories
        </a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExpenseModal">
            <i class="fas fa-plus me-1"></i>Record Expense
        </button>
    </div>
</div>

<!-- Stats Card -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-danger border-4">
            <div class="card-body">
                <span class="text-muted small fw-semibold text-uppercase">Total Filtered Expenses</span>
                <h3 class="fw-bold text-danger mt-2 mb-0"><?= format_currency($total_expenses) ?></h3>
                <small class="text-muted"><?= count($expenses) ?> records recorded</small>
            </div>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3">
        <form method="GET" action="<?= admin_url('finance/expenses') ?>" class="row g-2 align-items-center">
            <div class="col-md-3">
                <label class="small text-muted mb-1">Category</label>
                <select name="category_id" class="form-select form-select-sm">
                    <option value="">All Expense Categories</option>
                    <?php foreach ($categories as $c): ?>
                        <option value="<?= $c->id ?>" <?= $filter_cat == $c->id ? 'selected' : '' ?>><?= htmlspecialchars($c->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="small text-muted mb-1">From Date</label>
                <input type="date" name="from" class="form-control form-control-sm" value="<?= htmlspecialchars($filter_from) ?>">
            </div>
            <div class="col-md-3">
                <label class="small text-muted mb-1">To Date</label>
                <input type="date" name="to" class="form-control form-control-sm" value="<?= htmlspecialchars($filter_to) ?>">
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary btn-sm flex-grow-1"><i class="fas fa-filter me-1"></i>Filter</button>
                <a href="<?= admin_url('finance/expenses') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-redo"></i></a>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0">Expense Transactions</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Date</th>
                        <th>Title / Description</th>
                        <th>Category</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th class="text-end pe-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($expenses)): ?>
                        <tr><td colspan="6" class="text-center py-4 text-muted">No expenses recorded for this period.</td></tr>
                    <?php else: ?>
                        <?php foreach ($expenses as $ex): ?>
                        <tr>
                            <td class="ps-3 text-muted">
                                <?= date('M d, Y', strtotime($ex->expense_date)) ?>
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= htmlspecialchars($ex->title) ?></div>
                                <?php if ($ex->notes): ?>
                                    <small class="text-muted"><?= htmlspecialchars($ex->notes) ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary"><?= htmlspecialchars($ex->category_name ? $ex->category_name : 'General') ?></span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border text-uppercase" style="font-size: 11px;">
                                    <?= htmlspecialchars($ex->payment_method) ?>
                                </span>
                            </td>
                            <td class="fw-bold text-danger">
                                -<?= format_currency($ex->amount) ?>
                            </td>
                            <td class="text-end pe-3">
                                <a href="<?= admin_url('finance/delete_expense/'.$ex->id) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this expense entry?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add Expense -->
<div class="modal fade" id="addExpenseModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= admin_url('finance/expenses') ?>">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Record Business Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Expense Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. Laundry Service - Towels & Linens" required>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select" required>
                                <?php foreach ($categories as $c): ?>
                                    <option value="<?= $c->id ?>"><?= htmlspecialchars($c->name) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Date <span class="text-danger">*</span></label>
                            <input type="date" name="expense_date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Amount ($) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="amount" class="form-control" placeholder="0.00" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Payment Mode <span class="text-danger">*</span></label>
                            <select name="payment_method" class="form-select" required>
                                <option value="cash">Cash (Deducts from Till)</option>
                                <option value="bank_transfer">Bank Transfer / ACH</option>
                                <option value="card">Company Debit / Credit Card</option>
                                <option value="check">Check</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Notes / Receipt Reference</label>
                        <textarea name="notes" class="form-control" rows="2" placeholder="Invoice #, vendor name, etc..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Save Expense</button>
                </div>
            </form>
        </div>
    </div>
</div>
