<div class="d-print-none row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-file-invoice text-primary me-2"></i> Invoice Details</h4>
        <p class="text-muted mb-0">View or print commercial invoice for customer records.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('sales') ?>" class="btn btn-outline-secondary me-2">
            <i class="fa-solid fa-arrow-left me-1"></i> Back
        </a>
        <button type="button" class="btn btn-primary" onclick="window.print()">
            <i class="fa-solid fa-print me-1"></i> Print Invoice
        </button>
        <a href="<?= admin_url('sales/receipt/' . $invoice->id) ?>" target="_blank" class="btn btn-outline-dark">
            <i class="fa-solid fa-receipt me-1"></i> Thermal Receipt
        </a>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-4 p-md-5">
        <!-- Invoice Header -->
        <div class="row align-items-center mb-5 pb-4 border-bottom">
            <div class="col-sm-6">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="fa-solid fa-spa text-primary fs-2"></i>
                    <h3 class="fw-bold mb-0 text-dark"><?= html_escape(get_setting('business_name', 'Salon & Spa')) ?></h3>
                </div>
                <div class="text-muted fs-14px">
                    <div><?= html_escape(get_setting('business_address')) ?></div>
                    <div>Phone: <?= html_escape(get_setting('business_phone')) ?> | Email: <?= html_escape(get_setting('business_email')) ?></div>
                    <div>Tax Reg: <?= html_escape(get_setting('tax_name', 'VAT / Sales Tax')) ?></div>
                </div>
            </div>
            <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
                <h4 class="fw-bold text-primary mb-1">INVOICE</h4>
                <div class="fs-15px fw-semibold text-dark">#<?= html_escape($invoice->invoice_number) ?></div>
                <div class="text-muted fs-14px">Date: <?= date('d M Y', strtotime($invoice->invoice_date)) ?></div>
                <div class="mt-2"><?= payment_status_badge($invoice->payment_status) ?></div>
            </div>
        </div>

        <!-- Bill To -->
        <div class="row mb-4">
            <div class="col-sm-6">
                <h6 class="text-muted text-uppercase fs-12px fw-bold mb-2">Billed To:</h6>
                <h5 class="fw-bold text-dark mb-1"><?= html_escape($invoice->customer_name) ?></h5>
                <div class="text-muted fs-14px">
                    <div>Phone: <?= html_escape($invoice->customer_phone) ?></div>
                    <?php if ($invoice->customer_email): ?>
                        <div>Email: <?= html_escape($invoice->customer_email) ?></div>
                    <?php endif; ?>
                    <?php if ($invoice->customer_address): ?>
                        <div>Address: <?= html_escape($invoice->customer_address) ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
                <h6 class="text-muted text-uppercase fs-12px fw-bold mb-2">Payment Details:</h6>
                <div class="text-muted fs-14px">
                    <div>Served by: <strong><?= html_escape($invoice->cashier_name ? $invoice->cashier_name : 'Staff') ?></strong></div>
                    <?php if (!empty($payments)): ?>
                        <div>Method: <strong class="text-uppercase"><?= html_escape($payments[0]->payment_method) ?></strong></div>
                        <div>Txn Ref: <?= html_escape($payments[0]->transaction_reference) ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Items Table -->
        <div class="table-responsive mb-4">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">#</th>
                        <th>Item Description</th>
                        <th>Type</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Unit Price</th>
                        <th class="text-end pe-3">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($items as $item): ?>
                        <tr>
                            <td class="ps-3 text-muted"><?= $i++ ?></td>
                            <td class="fw-semibold text-dark"><?= html_escape($item->item_name) ?></td>
                            <td><span class="badge bg-light text-dark border fs-11px"><?= strtoupper($item->item_type) ?></span></td>
                            <td class="text-center"><?= $item->quantity ?></td>
                            <td class="text-end"><?= format_currency($item->unit_price) ?></td>
                            <td class="text-end pe-3 fw-bold"><?= format_currency($item->subtotal) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Invoice Calculation Summary -->
        <div class="row justify-content-end">
            <div class="col-md-5">
                <div class="p-3 bg-light rounded-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal:</span>
                        <span class="fw-semibold"><?= format_currency($invoice->subtotal) ?></span>
                    </div>
                    <?php if ((float)$invoice->discount_amount > 0): ?>
                        <div class="d-flex justify-content-between mb-2 text-danger">
                            <span>Discount:</span>
                            <span>-<?= format_currency($invoice->discount_amount) ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Tax (<?= html_escape(get_setting('tax_name', 'VAT')) ?>):</span>
                        <span class="fw-semibold"><?= format_currency($invoice->tax_amount) ?></span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-top border-bottom mb-2 fs-18px fw-bold text-primary">
                        <span>Total Due:</span>
                        <span><?= format_currency($invoice->grand_total) ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-1 text-success fw-semibold">
                        <span>Amount Paid:</span>
                        <span><?= format_currency($invoice->paid_amount) ?></span>
                    </div>
                    <?php if ((float)$invoice->due_amount > 0): ?>
                        <div class="d-flex justify-content-between text-danger fw-bold">
                            <span>Balance Due:</span>
                            <span><?= format_currency($invoice->due_amount) ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Footer Thank You Note -->
        <div class="text-center mt-5 pt-4 border-top text-muted fs-13px">
            <p class="mb-1 fw-bold">Thank you for visiting <?= html_escape(get_setting('business_name')) ?>!</p>
            <p class="mb-0">Please keep this invoice for your loyalty rewards and warranty records.</p>
        </div>
    </div>
</div>
