<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-receipt text-primary me-2"></i> Invoices & Billing Records</h4>
        <p class="text-muted mb-0">Track all customer checkout invoices, receipts, tax collection, and payment methods.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('pos') ?>" class="btn btn-success shadow-sm">
            <i class="fa-solid fa-cash-register me-1"></i> Open POS Terminal
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-3">
        <form action="<?= admin_url('sales') ?>" method="GET" class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="form-label fs-13px fw-semibold mb-1">Payment Status</label>
                <select name="payment_status" class="form-select form-select-sm">
                    <option value="">All Statuses</option>
                    <option value="paid" <?= ($current_status === 'paid') ? 'selected' : '' ?>>Paid in Full</option>
                    <option value="partial" <?= ($current_status === 'partial') ? 'selected' : '' ?>>Partially Paid</option>
                    <option value="unpaid" <?= ($current_status === 'unpaid') ? 'selected' : '' ?>>Unpaid / Due</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label fs-13px fw-semibold mb-1">Invoice Date</label>
                <input type="date" name="date" class="form-control form-control-sm" value="<?= html_escape($current_date) ?>">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary w-100">
                    <i class="fa-solid fa-filter me-1"></i> Apply Filter
                </button>
                <a href="<?= admin_url('sales') ?>" class="btn btn-sm btn-light border">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Invoices Table -->
<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Invoice #</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Subtotal</th>
                        <th>Tax</th>
                        <th>Grand Total</th>
                        <th>Paid</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Print</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($invoices)): ?>
                        <?php foreach ($invoices as $inv): ?>
                            <tr>
                                <td class="ps-4 fw-bold text-primary">
                                    <a href="<?= admin_url('sales/invoice/' . $inv->id) ?>" class="text-decoration-none">
                                        <?= html_escape($inv->invoice_number) ?>
                                    </a>
                                </td>
                                <td><?= date('d M Y', strtotime($inv->invoice_date)) ?></td>
                                <td>
                                    <div class="fw-semibold text-dark"><?= html_escape($inv->customer_name) ?></div>
                                    <small class="text-muted"><?= html_escape($inv->customer_phone) ?></small>
                                </td>
                                <td><?= format_currency($inv->subtotal) ?></td>
                                <td class="text-muted"><?= format_currency($inv->tax_amount) ?></td>
                                <td class="fw-bold fs-15px text-dark"><?= format_currency($inv->grand_total) ?></td>
                                <td class="text-success fw-semibold"><?= format_currency($inv->paid_amount) ?></td>
                                <td><?= payment_status_badge($inv->payment_status) ?></td>
                                <td class="text-end pe-4">
                                    <a href="<?= admin_url('sales/invoice/' . $inv->id) ?>" class="btn btn-xs btn-outline-primary me-1" title="View Printable A4 Invoice">
                                        <i class="fa-solid fa-file-invoice"></i> A4
                                    </a>
                                    <a href="<?= admin_url('sales/receipt/' . $inv->id) ?>" target="_blank" class="btn btn-xs btn-outline-dark" title="Print Thermal POS Receipt">
                                        <i class="fa-solid fa-receipt"></i> Slip
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="9" class="text-center py-5 text-muted">No invoices recorded yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
