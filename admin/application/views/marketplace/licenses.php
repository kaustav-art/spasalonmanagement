<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-key text-primary me-2"></i>License Keys & Activations</h4>
        <p class="text-muted mb-0">Monitor active client script activations, revoke keys, or issue manual licenses.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('marketplace') ?>" class="btn btn-outline-secondary me-2">
            <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
        </a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newKeyModal">
            <i class="fas fa-plus me-1"></i>Issue License Key
        </button>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0">Active Script Licenses (<?= count($licenses) ?>)</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">License Key</th>
                        <th>Registered Email</th>
                        <th>Edition</th>
                        <th>Assigned Theme & Layout</th>
                        <th>Issued Date</th>
                        <th>Status</th>
                        <th class="text-end pe-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($licenses)): ?>
                        <tr><td colspan="7" class="text-center py-4 text-muted">No licenses recorded yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($licenses as $lic): ?>
                        <tr>
                            <td class="ps-3 fw-bold">
                                <code><?= htmlspecialchars($lic->license_key) ?></code>
                            </td>
                            <td><?= htmlspecialchars($lic->customer_email) ?></td>
                            <td>
                                <span class="badge <?= $lic->plan_code === 'SALON_SPA' ? 'bg-warning text-dark' : 'bg-primary' ?>"><?= str_replace('_', ' + ', $lic->plan_code) ?></span>
                            </td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary"><?= ucfirst($lic->template) ?></span>
                                <small class="text-muted ms-1">Layout <?= $lic->layout ?></small>
                            </td>
                            <td class="text-muted small"><?= date('M d, Y', strtotime($lic->created_at)) ?></td>
                            <td>
                                <span class="badge <?= $lic->status === 'active' ? 'bg-success' : 'bg-danger' ?>"><?= ucfirst($lic->status) ?></span>
                            </td>
                            <td class="text-end pe-3">
                                <form method="POST" action="<?= admin_url('marketplace/licenses') ?>" class="d-inline">
                                    <input type="hidden" name="action" value="toggle_status">
                                    <input type="hidden" name="license_id" value="<?= $lic->id ?>">
                                    <button type="submit" class="btn btn-sm <?= $lic->status === 'active' ? 'btn-outline-danger' : 'btn-outline-success' ?>">
                                        <?= $lic->status === 'active' ? '<i class="fas fa-ban me-1"></i>Suspend' : '<i class="fas fa-check me-1"></i>Activate' ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Issue Key -->
<div class="modal fade" id="newKeyModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= admin_url('marketplace/licenses') ?>">
                <input type="hidden" name="action" value="create_key">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Issue Manual License Key</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Customer / Licensee Email <span class="text-danger">*</span></label>
                        <input type="email" name="customer_email" class="form-control" required placeholder="client@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Script Edition <span class="text-danger">*</span></label>
                        <select name="plan_code" class="form-select" required>
                            <option value="SALON">Salon Management Edition</option>
                            <option value="SPA">Spa Wellness Management Edition</option>
                            <option value="SALON_SPA" selected>Salon & Spa Complete Edition</option>
                        </select>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Default Theme</label>
                            <select name="template" class="form-select">
                                <option value="template1">Template 1</option>
                                <option value="template2">Template 2</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Default Layout</label>
                            <select name="layout" class="form-select">
                                <option value="1">Layout 1</option>
                                <option value="2">Layout 2</option>
                                <option value="3">Layout 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-key me-1"></i>Generate Key</button>
                </div>
            </form>
        </div>
    </div>
</div>
