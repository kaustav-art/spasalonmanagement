<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-chart-line text-primary me-2"></i>Sales & Revenue Analytics</h4>
        <p class="text-muted mb-0">Financial reporting on customer billings, collections, and service vs retail volume.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <button onclick="window.print()" class="btn btn-outline-secondary me-2">
            <i class="fas fa-print me-1"></i>Print Report
        </button>
        <a href="<?= admin_url('reports/profit_loss') ?>" class="btn btn-primary">
            <i class="fas fa-balance-scale me-1"></i>P & L Statement
        </a>
    </div>
</div>

<!-- Date Filter Form -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3">
        <form method="GET" action="<?= admin_url('reports/sales') ?>" class="row g-2 align-items-center">
            <div class="col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">From</span>
                    <input type="date" name="from" class="form-control" value="<?= htmlspecialchars($from) ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">To</span>
                    <input type="date" name="to" class="form-control" value="<?= htmlspecialchars($to) ?>">
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm w-100"><i class="fas fa-sync-alt me-1"></i>Generate Report</button>
                <a href="<?= admin_url('reports/sales') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-redo"></i></a>
            </div>
        </form>
    </div>
</div>

<!-- KPI Summary Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-primary border-4">
            <div class="card-body">
                <span class="text-muted small fw-semibold text-uppercase">Total Invoiced Sales</span>
                <h3 class="fw-bold text-primary mt-2 mb-0"><?= format_currency($total_revenue) ?></h3>
                <small class="text-muted"><?= count($invoices) ?> invoices generated</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-success border-4">
            <div class="card-body">
                <span class="text-muted small fw-semibold text-uppercase">Total Cash & Card Collected</span>
                <h3 class="fw-bold text-success mt-2 mb-0"><?= format_currency($total_paid) ?></h3>
                <small class="text-muted">Settled payments in range</small>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-warning border-4">
            <div class="card-body">
                <span class="text-muted small fw-semibold text-uppercase">Outstanding Receivables</span>
                <h3 class="fw-bold text-warning mt-2 mb-0"><?= format_currency($total_due) ?></h3>
                <small class="text-muted">Pending balance collections</small>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <!-- Payment Methods Breakdown -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3 border-bottom">
                <h6 class="card-title fw-bold mb-0"><i class="fas fa-wallet text-primary me-2"></i>Collections by Payment Channel</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">Payment Channel</th>
                                <th class="text-end pe-3">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($payment_methods)): ?>
                                <tr><td colspan="2" class="text-center py-3 text-muted">No payments recorded.</td></tr>
                            <?php else: ?>
                                <?php foreach ($payment_methods as $pm): ?>
                                <tr>
                                    <td class="ps-3 fw-semibold text-capitalize">
                                        <i class="fas fa-check-circle text-success me-2"></i><?= htmlspecialchars($pm->payment_method) ?>
                                    </td>
                                    <td class="text-end pe-3 fw-bold text-dark">
                                        <?= format_currency($pm->total) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Items Breakdown: Services vs Products -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3 border-bottom">
                <h6 class="card-title fw-bold mb-0"><i class="fas fa-chart-pie text-primary me-2"></i>Revenue Composition (Services vs Retail)</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">Item Category</th>
                                <th>Units / Qty</th>
                                <th class="text-end pe-3">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($items_breakdown)): ?>
                                <tr><td colspan="3" class="text-center py-3 text-muted">No items billed.</td></tr>
                            <?php else: ?>
                                <?php foreach ($items_breakdown as $ib): ?>
                                <tr>
                                    <td class="ps-3 fw-semibold text-capitalize">
                                        <?= $ib->item_type == 'service' ? '<i class="fas fa-cut text-primary me-2"></i>Salon / Spa Services' : '<i class="fas fa-shopping-bag text-info me-2"></i>Retail Products' ?>
                                    </td>
                                    <td><?= $ib->qty ?> sold</td>
                                    <td class="text-end pe-3 fw-bold text-dark">
                                        <?= format_currency($ib->total) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Detailed Invoice List -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0">All Invoices in Range (<?= date('M d, Y', strtotime($from)) ?> &ndash; <?= date('M d, Y', strtotime($to)) ?>)</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Invoice #</th>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Subtotal</th>
                        <th>Tax</th>
                        <th>Grand Total</th>
                        <th>Paid</th>
                        <th>Status</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($invoices)): ?>
                        <tr><td colspan="9" class="text-center py-4 text-muted">No invoices found for this timeframe.</td></tr>
                    <?php else: ?>
                        <?php foreach ($invoices as $inv): ?>
                        <tr>
                            <td class="ps-3 fw-bold"><a href="<?= admin_url('sales/invoice/'.$inv->id) ?>">#<?= htmlspecialchars($inv->invoice_number) ?></a></td>
                            <td><?= date('M d, Y', strtotime($inv->invoice_date)) ?></td>
                            <td><?= htmlspecialchars($inv->customer_name ? $inv->customer_name : 'Walk-in Client') ?></td>
                            <td><?= format_currency($inv->subtotal) ?></td>
                            <td><?= format_currency($inv->tax_amount) ?></td>
                            <td class="fw-bold text-dark"><?= format_currency($inv->grand_total) ?></td>
                            <td class="text-success fw-semibold"><?= format_currency($inv->paid_amount) ?></td>
                            <td>
                                <span class="badge <?= $inv->payment_status == 'paid' ? 'bg-success' : 'bg-warning text-dark' ?>">
                                    <?= ucfirst($inv->payment_status) ?>
                                </span>
                            </td>
                            <td class="text-end pe-3">
                                <a href="<?= admin_url('sales/invoice/'.$inv->id) ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
