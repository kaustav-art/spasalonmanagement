<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-tags text-primary me-2"></i>Product Categories</h4>
        <p class="text-muted mb-0">Classify retail cosmetics and treatment consumables.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('inventory') ?>" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back to Products
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Category Form -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom">
                <h6 class="card-title fw-bold mb-0">Add / Edit Category</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= admin_url('inventory/categories') ?>">
                    <input type="hidden" name="category_id" id="cat_id" value="">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="cat_name" class="form-control" placeholder="e.g. Hair Care & Styling" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" id="cat_desc" class="form-control" rows="3" placeholder="Category purpose..."></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="resetCatForm()">Reset</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save me-1"></i>Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Category List -->
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h6 class="card-title fw-bold mb-0">All Categories (<?= count($categories) ?>)</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-end pe-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($categories)): ?>
                                <tr><td colspan="4" class="text-center py-4 text-muted">No categories created yet.</td></tr>
                            <?php else: ?>
                                <?php foreach ($categories as $i => $cat): ?>
                                <tr>
                                    <td class="ps-3 text-muted"><?= $i + 1 ?></td>
                                    <td class="fw-bold"><?= htmlspecialchars($cat->name) ?></td>
                                    <td class="text-muted small"><?= htmlspecialchars($cat->description ? $cat->description : '—') ?></td>
                                    <td class="text-end pe-3">
                                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="editCat(<?= htmlspecialchars(json_encode($cat)) ?>)">
                                            <i class="fas fa-edit"></i>
                                        </button>
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

<script>
function editCat(cat) {
    document.getElementById('cat_id').value = cat.id;
    document.getElementById('cat_name').value = cat.name;
    document.getElementById('cat_desc').value = cat.description || '';
}
function resetCatForm() {
    document.getElementById('cat_id').value = '';
    document.getElementById('cat_name').value = '';
    document.getElementById('cat_desc').value = '';
}
</script>
