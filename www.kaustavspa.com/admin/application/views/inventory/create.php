<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-plus-circle text-primary me-2"></i>Add New Product</h4>
        <p class="text-muted mb-0">Register merchandise for sale or backbar consumables for treatments.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('inventory') ?>" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back to Products
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form method="POST" action="<?= admin_url('inventory/create') ?>">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="e.g. Moroccan Argan Oil Shampoo" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">SKU Code</label>
                    <input type="text" name="sku" class="form-control" placeholder="Leave blank to auto-generate">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Barcode / UPC</label>
                    <input type="text" name="barcode" class="form-control" placeholder="e.g. 890123456789">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat->id ?>"><?= htmlspecialchars($cat->name) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Measurement Unit</label>
                    <select name="unit_id" class="form-select">
                        <?php foreach ($units as $u): ?>
                            <option value="<?= $u->id ?>" <?= $u->short_name == 'pc' ? 'selected' : '' ?>><?= htmlspecialchars($u->name) ?> (<?= htmlspecialchars($u->short_name) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Product Type <span class="text-danger">*</span></label>
                    <select name="product_type" class="form-select" required>
                        <option value="retail">Retail Merchandise (Sold to Customers)</option>
                        <option value="consumable">Salon/Spa Backbar Consumable (Used in Treatments)</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Cost Price ($)</label>
                    <input type="number" step="0.01" name="cost_price" class="form-control" value="0.00">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Selling Price ($)</label>
                    <input type="number" step="0.01" name="selling_price" class="form-control" value="0.00">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Opening Stock Quantity</label>
                    <input type="number" name="current_stock" class="form-control" value="0" min="0">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Low Stock Alert Threshold</label>
                    <input type="number" name="min_alert_stock" class="form-control" value="5" min="1">
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Description / Notes</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Usage details, ingredients, or storage guidelines..."></textarea>
                </div>

                <div class="col-12 text-end mt-4">
                    <a href="<?= admin_url('inventory') ?>" class="btn btn-outline-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Save Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
