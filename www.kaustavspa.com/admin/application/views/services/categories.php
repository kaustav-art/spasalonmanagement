<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-folder-tree text-primary me-2"></i> Service Categories</h4>
        <p class="text-muted mb-0">Organize your services by department: Hair, Skin, Nails, Massage, Hydro Spa.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCategoryModal">
            <i class="fa-solid fa-plus me-1"></i> Add Category
        </button>
    </div>
</div>

<div class="row g-4">
    <?php foreach ($categories as $cat): ?>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge <?= ($cat->type === 'salon') ? 'badge-edition-salon' : (($cat->type === 'spa') ? 'badge-edition-spa' : 'bg-secondary') ?>">
                            <?= ucfirst($cat->type) ?>
                        </span>
                        <span class="badge bg-light text-dark border"><?= (int)$cat->total_services ?> Services</span>
                    </div>
                    <h5 class="fw-bold text-dark mt-2 mb-1"><?= html_escape($cat->name) ?></h5>
                    <p class="text-muted fs-13px mb-0"><?= html_escape($cat->description ? $cat->description : 'No description.') ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="modal fade" id="newCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= admin_url('services/categories') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g. Aromatherapy & Massages">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Edition Scope</label>
                        <select name="type" class="form-select">
                            <option value="both" selected>General / Both</option>
                            <option value="salon">Salon Only</option>
                            <option value="spa">Spa Only</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Short Description</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Category overview..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
