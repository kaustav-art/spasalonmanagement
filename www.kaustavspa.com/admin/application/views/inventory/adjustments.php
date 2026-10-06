<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-exchange-alt text-primary me-2"></i>Stock Adjustments & Audit</h4>
        <p class="text-muted mb-0">Record manual inventory corrections, damages, expired supplies, and purchase arrivals.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('inventory') ?>" class="btn btn-outline-secondary me-2">
            <i class="fas fa-arrow-left me-1"></i>Back to Products
        </a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adjustmentModal">
            <i class="fas fa-plus me-1"></i>New Stock Adjustment
        </button>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0">Recent Inventory Logs (Last 50)</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Date & Time</th>
                        <th>Product</th>
                        <th>Transaction Type</th>
                        <th>Quantity</th>
                        <th>Notes / Reason</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($transactions)): ?>
                        <tr><td colspan="5" class="text-center py-4 text-muted">No inventory transactions logged yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($transactions as $t): ?>
                        <tr>
                            <td class="ps-3 text-muted">
                                <?= date('M d, Y h:i A', strtotime($t->created_at)) ?>
                            </td>
                            <td>
                                <div class="fw-bold"><?= htmlspecialchars($t->product_name) ?></div>
                                <small class="text-muted"><?= htmlspecialchars($t->sku) ?></small>
                            </td>
                            <td>
                                <?php 
                                    $type = $t->transaction_type;
                                    $badge = 'bg-secondary';
                                    if ($type == 'purchase' || $type == 'adjustment_in') $badge = 'bg-success';
                                    elseif ($type == 'sale' || $type == 'service_consumption') $badge = 'bg-primary';
                                    elseif ($type == 'adjustment_out' || $type == 'damage') $badge = 'bg-danger';
                                ?>
                                <span class="badge <?= $badge ?> px-2 py-1"><?= ucfirst(str_replace('_', ' ', $type)) ?></span>
                            </td>
                            <td>
                                <span class="fw-bold <?= ($type == 'purchase' || $type == 'adjustment_in') ? 'text-success' : 'text-danger' ?>">
                                    <?= ($type == 'purchase' || $type == 'adjustment_in') ? '+' : '-' ?><?= $t->quantity ?>
                                </span>
                            </td>
                            <td>
                                <span class="text-muted small"><?= htmlspecialchars($t->notes ? $t->notes : '—') ?></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="adjustmentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= admin_url('inventory/adjustments') ?>">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Record Stock Adjustment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select Product <span class="text-danger">*</span></label>
                        <select name="product_id" class="form-select select2" required>
                            <option value="">Choose product...</option>
                            <?php foreach ($products as $p): ?>
                                <option value="<?= $p->id ?>"><?= htmlspecialchars($p->name) ?> (Current: <?= $p->current_stock ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Adjustment Type <span class="text-danger">*</span></label>
                        <select name="transaction_type" class="form-select" required>
                            <option value="adjustment_in">Stock In (+) - Restock / Received</option>
                            <option value="adjustment_out">Stock Out (-) - Inventory Audit Correction</option>
                            <option value="damage">Damaged / Expired / Broken (-)</option>
                            <option value="service_consumption">Internal Salon/Spa Treatment Consumption (-)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quantity <span class="text-danger">*</span></label>
                        <input type="number" name="quantity" class="form-control" min="1" value="1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Notes / Explanation</label>
                        <textarea name="notes" class="form-control" rows="2" placeholder="e.g. Broken bottle during restocking, or manual count discrepancy..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check me-1"></i>Apply Adjustment</button>
                </div>
            </form>
        </div>
    </div>
</div>
