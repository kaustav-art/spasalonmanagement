<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-boxes text-primary me-2"></i>Inventory & Products</h4>
        <p class="text-muted mb-0">Manage retail merchandise, backbar salon consumables, and stock tracking.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <div class="btn-group me-2">
            <a href="<?= admin_url('inventory/adjustments') ?>" class="btn btn-outline-secondary">
                <i class="fas fa-exchange-alt me-1"></i>Stock Adjustments
            </a>
            <a href="<?= admin_url('inventory/categories') ?>" class="btn btn-outline-secondary">
                <i class="fas fa-tags me-1"></i>Categories
            </a>
            <a href="<?= admin_url('inventory/suppliers') ?>" class="btn btn-outline-secondary">
                <i class="fas fa-truck me-1"></i>Suppliers
            </a>
        </div>
        <a href="<?= admin_url('inventory/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>Add Product
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3">
        <form method="GET" action="<?= admin_url('inventory') ?>" class="row g-2 align-items-center">
            <div class="col-md-4">
                <select name="category_id" class="form-select form-select-sm">
                    <option value="">All Categories</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat->id ?>" <?= $filter_category == $cat->id ? 'selected' : '' ?>><?= htmlspecialchars($cat->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="type" class="form-select form-select-sm">
                    <option value="">All Product Types</option>
                    <option value="retail" <?= $filter_type == 'retail' ? 'selected' : '' ?>>Retail Merchandise</option>
                    <option value="consumable" <?= $filter_type == 'consumable' ? 'selected' : '' ?>>Backbar Consumable</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="stock" class="form-select form-select-sm">
                    <option value="">All Stock Levels</option>
                    <option value="low" <?= $filter_stock == 'low' ? 'selected' : '' ?>>Low Stock Alert Only</option>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm w-100"><i class="fas fa-filter me-1"></i>Filter</button>
                <a href="<?= admin_url('inventory') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-redo"></i></a>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0">Products List (<?= count($products) ?>)</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Product Name</th>
                        <th>SKU / Barcode</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Cost</th>
                        <th>Selling Price</th>
                        <th>Stock Level</th>
                        <th>Status</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                        <tr><td colspan="9" class="text-center py-4 text-muted">No products found matching criteria.</td></tr>
                    <?php else: ?>
                        <?php foreach ($products as $p): ?>
                        <tr>
                            <td class="ps-3">
                                <div class="fw-bold text-dark"><?= htmlspecialchars($p->name) ?></div>
                                <?php if ($p->description): ?>
                                    <small class="text-muted text-truncate d-block" style="max-width: 250px;"><?= htmlspecialchars($p->description) ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border"><?= htmlspecialchars($p->sku) ?></span>
                                <?php if ($p->barcode): ?>
                                    <br><small class="text-muted"><i class="fas fa-barcode me-1"></i><?= htmlspecialchars($p->barcode) ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary"><?= htmlspecialchars($p->category_name ? $p->category_name : 'General') ?></span>
                            </td>
                            <td>
                                <?php if ($p->product_type == 'retail'): ?>
                                    <span class="badge bg-info-subtle text-info border border-info-subtle">Retail</span>
                                <?php else: ?>
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle">Consumable</span>
                                <?php endif; ?>
                            </td>
                            <td><?= format_currency($p->cost_price) ?></td>
                            <td class="fw-bold text-primary"><?= format_currency($p->selling_price) ?></td>
                            <td>
                                <?php if ($p->current_stock <= $p->min_alert_stock): ?>
                                    <span class="badge bg-danger-subtle text-danger fw-bold fs-7 p-1 px-2">
                                        <i class="fas fa-exclamation-triangle me-1"></i><?= $p->current_stock ?> <?= htmlspecialchars($p->unit_name ? $p->unit_name : 'pcs') ?> (Low)
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-success-subtle text-success fw-bold fs-7 p-1 px-2">
                                        <?= $p->current_stock ?> <?= htmlspecialchars($p->unit_name ? $p->unit_name : 'pcs') ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge <?= $p->status == 'active' ? 'bg-success' : 'bg-danger' ?>"><?= ucfirst($p->status) ?></span>
                            </td>
                            <td class="text-end pe-3">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= admin_url('inventory/edit/'.$p->id) ?>" class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="<?= admin_url('inventory/delete/'.$p->id) ?>" class="btn btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this product?');"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
