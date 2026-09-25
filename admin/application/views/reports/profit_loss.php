<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-balance-scale text-primary me-2"></i>Profit & Loss Statement</h4>
        <p class="text-muted mb-0">High-level financial audit: Gross Revenue vs Expenses, Commissions, and Net Profit.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <button onclick="window.print()" class="btn btn-outline-secondary">
            <i class="fas fa-print me-1"></i>Print Statement
        </button>
    </div>
</div>

<!-- Date Filter Form -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3">
        <form method="GET" action="<?= admin_url('reports/profit_loss') ?>" class="row g-2 align-items-center">
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
                <button type="submit" class="btn btn-primary btn-sm w-100"><i class="fas fa-sync-alt me-1"></i>Generate P&L</button>
                <a href="<?= admin_url('reports/profit_loss') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-redo"></i></a>
            </div>
        </form>
    </div>
</div>

<!-- P&L Sheet -->
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-4 border-bottom text-center">
                <h5 class="fw-bold mb-1"><?= get_setting('business_name', 'Glamr & Pureglow Salon & Spa') ?></h5>
                <h6 class="text-muted mb-0">Statement of Profit and Loss (<?= date('M d, Y', strtotime($from)) ?> &ndash; <?= date('M d, Y', strtotime($to)) ?>)</h6>
            </div>
            <div class="card-body p-4">
                <!-- Revenue Section -->
                <h6 class="fw-bold text-uppercase text-primary border-bottom pb-2 mb-3">1. Operating Income</h6>
                <table class="table table-borderless align-middle mb-4">
                    <tbody>
                        <tr>
                            <td class="ps-3 fw-semibold">Gross Invoiced Revenue (Services + Retail Products)</td>
                            <td class="text-end pe-3 fw-bold fs-6 text-dark"><?= format_currency($gross_revenue) ?></td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="ps-3 text-muted">Less: Sales Tax Collected (Remitted)</td>
                            <td class="text-end pe-3 text-muted">-<?= format_currency($total_tax) ?></td>
                        </tr>
                        <tr class="table-light">
                            <td class="ps-3 fw-bold">Net Sales Revenue</td>
                            <td class="text-end pe-3 fw-bold text-primary"><?= format_currency($gross_revenue - $total_tax) ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Expenses Section -->
                <h6 class="fw-bold text-uppercase text-danger border-bottom pb-2 mb-3">2. Operating Expenses & Deductions</h6>
                <table class="table table-borderless align-middle mb-4">
                    <tbody>
                        <tr>
                            <td class="ps-3 fw-semibold">Total Staff Commissions Payable</td>
                            <td class="text-end pe-3 text-danger fw-semibold">-<?= format_currency($total_commissions) ?></td>
                        </tr>
                        <?php if (!empty($expense_breakdown)): ?>
                            <?php foreach ($expense_breakdown as $eb): ?>
                            <tr>
                                <td class="ps-3 text-muted">Expense: <?= htmlspecialchars($eb->category_name ? $eb->category_name : 'General Overhead') ?></td>
                                <td class="text-end pe-3 text-danger">-<?= format_currency($eb->amount) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td class="ps-3 text-muted">Direct Facility & Overhead Expenses</td>
                                <td class="text-end pe-3 text-danger">-<?= format_currency($total_expenses) ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr class="table-light border-top">
                            <td class="ps-3 fw-bold">Total Operating Outflows</td>
                            <td class="text-end pe-3 fw-bold text-danger">-<?= format_currency($total_expenses + $total_commissions) ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Bottom Line Net Income -->
                <div class="p-4 rounded border <?= $net_profit >= 0 ? 'bg-success-subtle border-success' : 'bg-danger-subtle border-danger' ?> d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="fw-bold mb-1 <?= $net_profit >= 0 ? 'text-success' : 'text-danger' ?>">
                            <?= $net_profit >= 0 ? 'Net Operating Profit (Surplus)' : 'Net Operating Loss (Deficit)' ?>
                        </h5>
                        <small class="text-muted">Calculated after direct operational costs and commissions.</small>
                    </div>
                    <div class="text-end">
                        <h2 class="fw-bold mb-0 <?= $net_profit >= 0 ? 'text-success' : 'text-danger' ?>">
                            <?= format_currency($net_profit) ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
