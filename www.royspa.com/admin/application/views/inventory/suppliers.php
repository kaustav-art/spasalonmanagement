<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-truck text-primary me-2"></i>Suppliers & Vendors</h4>
        <p class="text-muted mb-0">Manage product distributors, cosmetic manufacturers, and wholesale suppliers.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('inventory') ?>" class="btn btn-outline-secondary me-2">
            <i class="fas fa-arrow-left me-1"></i>Back to Products
        </a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#supplierModal" onclick="resetSupplierModal()">
            <i class="fas fa-plus me-1"></i>New Supplier
        </button>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0">Registered Vendors (<?= count($suppliers) ?>)</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Supplier / Contact</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($suppliers)): ?>
                        <tr><td colspan="6" class="text-center py-4 text-muted">No suppliers registered yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($suppliers as $s): ?>
                        <tr>
                            <td class="ps-3">
                                <div class="fw-bold text-dark"><?= htmlspecialchars($s->name) ?></div>
                            </td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary fw-semibold"><?= htmlspecialchars($s->company_name ? $s->company_name : '—') ?></span>
                            </td>
                            <td>
                                <?= htmlspecialchars($s->email ? $s->email : '—') ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($s->phone ? $s->phone : '—') ?>
                            </td>
                            <td>
                                <small class="text-muted"><?= htmlspecialchars($s->address ? $s->address : '—') ?></small>
                            </td>
                            <td class="text-end pe-3">
                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="editSupplier(<?= htmlspecialchars(json_encode($s)) ?>)">
                                    <i class="fas fa-edit"></i> Edit
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

<!-- Supplier Modal -->
<div class="modal fade" id="supplierModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= admin_url('inventory/suppliers') ?>">
                <input type="hidden" name="supplier_id" id="modal_sup_id" value="">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modal_sup_title">Add New Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contact Person Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="modal_sup_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Company / Brand Name</label>
                        <input type="text" name="company_name" id="modal_sup_company" class="form-control">
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" id="modal_sup_email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="text" name="phone" id="modal_sup_phone" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Address / Warehouse Location</label>
                        <textarea name="address" id="modal_sup_address" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Save Supplier</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editSupplier(s) {
    document.getElementById('modal_sup_id').value = s.id;
    document.getElementById('modal_sup_name').value = s.name;
    document.getElementById('modal_sup_company').value = s.company_name || '';
    document.getElementById('modal_sup_email').value = s.email || '';
    document.getElementById('modal_sup_phone').value = s.phone || '';
    document.getElementById('modal_sup_address').value = s.address || '';
    document.getElementById('modal_sup_title').innerText = 'Edit Supplier';
    var myModal = new bootstrap.Modal(document.getElementById('supplierModal'));
    myModal.show();
}

function resetSupplierModal() {
    document.getElementById('modal_sup_id').value = '';
    document.getElementById('modal_sup_name').value = '';
    document.getElementById('modal_sup_company').value = '';
    document.getElementById('modal_sup_email').value = '';
    document.getElementById('modal_sup_phone').value = '';
    document.getElementById('modal_sup_address').value = '';
    document.getElementById('modal_sup_title').innerText = 'Add New Supplier';
}
</script>
