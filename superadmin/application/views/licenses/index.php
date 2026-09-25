<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1 text-dark">
            <i class="fa-solid fa-key text-warning me-2"></i>Licenses &amp; Activations
        </h4>
        <p class="text-muted mb-0">Issue, monitor, suspend, or revoke commercial self-hosted domain licenses across all editions.</p>
    </div>
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-outline-dark btn-sm px-3" data-bs-toggle="modal" data-bs-target="#verifyLicenseModal">
            <i class="fa-solid fa-barcode me-1"></i> Verify Key
        </button>
        <button type="button" class="btn btn-warning btn-sm px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#createLicenseModal">
            <i class="fa-solid fa-plus me-1"></i> Issue License Key
        </button>
    </div>
</div>

<!-- License Overview KPIs -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-primary border-4 p-3 bg-white">
            <span class="text-muted small fw-bold text-uppercase">Total Issued Keys</span>
            <h3 class="fw-bold text-dark mt-1 mb-0"><?= $total_count ?></h3>
            <small class="text-muted">Lifetime platform allocations</small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-success border-4 p-3 bg-white">
            <span class="text-muted small fw-bold text-uppercase">Active Domains</span>
            <h3 class="fw-bold text-success mt-1 mb-0"><?= $active_count ?></h3>
            <small class="text-muted">Currently active &amp; valid licenses</small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm border-start border-danger border-4 p-3 bg-white">
            <span class="text-muted small fw-bold text-uppercase">Suspended / Revoked</span>
            <h3 class="fw-bold text-danger mt-1 mb-0"><?= $suspended_count ?></h3>
            <small class="text-muted">Deactivated or flagged licenses</small>
        </div>
    </div>
</div>

<!-- Filter Bar -->
<div class="card border-0 shadow-sm rounded-3 mb-4">
    <div class="card-body p-3">
        <form method="get" action="<?= superadmin_url('licenses') ?>" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" class="form-control" name="search" placeholder="Search license key, email, order..." value="<?= htmlspecialchars($search ? $search : '') ?>">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select form-select-sm" name="plan">
                    <option value="">All Editions</option>
                    <option value="SALON" <?= $filter_plan === 'SALON' ? 'selected' : '' ?>>Salon Edition</option>
                    <option value="SPA" <?= $filter_plan === 'SPA' ? 'selected' : '' ?>>Spa Edition</option>
                    <option value="SALON_SPA" <?= $filter_plan === 'SALON_SPA' ? 'selected' : '' ?>>Salon &amp; Spa Unified</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select form-select-sm" name="status">
                    <option value="">All Statuses</option>
                    <option value="active" <?= $filter_status === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="suspended" <?= $filter_status === 'suspended' ? 'selected' : '' ?>>Suspended</option>
                    <option value="revoked" <?= $filter_status === 'revoked' ? 'selected' : '' ?>>Revoked</option>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-dark btn-sm w-100 fw-semibold">Filter</button>
                <a href="<?= superadmin_url('licenses') ?>" class="btn btn-outline-secondary btn-sm" title="Clear Filters"><i class="fa-solid fa-rotate-left"></i></a>
            </div>
        </form>
    </div>
</div>

<!-- Licenses Table -->
<div class="card border-0 shadow-sm rounded-3 overflow-hidden">
    <div class="table-responsive">
        <table class="table sa-table align-middle mb-0">
            <thead>
                <tr>
                    <th>License Key</th>
                    <th>Customer Email</th>
                    <th>Edition</th>
                    <th>Template / Layout</th>
                    <th>Linked Order</th>
                    <th>Status</th>
                    <th>Issued Date</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($licenses)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-key fs-2 d-block mb-2 text-secondary"></i>
                            No licenses found matching your filters.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($licenses as $lic): ?>
                        <tr>
                            <td>
                                <div class="sa-code-badge">
                                    <span class="copy-target"><?= htmlspecialchars($lic->license_key) ?></span>
                                    <i class="fa-regular fa-copy sa-copy-btn" title="Copy License Key"></i>
                                </div>
                            </td>
                            <td>
                                <span class="fw-semibold text-dark"><i class="fa-regular fa-envelope text-muted me-1"></i><?= htmlspecialchars($lic->customer_email) ?></span>
                            </td>
                            <td><?= plan_badge($lic->plan_code) ?></td>
                            <td>
                                <span class="badge bg-light text-dark border"><?= $lic->template ?></span>
                                <span class="badge bg-light text-dark border">Layout <?= $lic->layout ?></span>
                            </td>
                            <td>
                                <?php if (!empty($lic->order_number)): ?>
                                    <span class="badge bg-light text-primary border font-monospace"><?= htmlspecialchars($lic->order_number) ?></span>
                                <?php else: ?>
                                    <span class="text-muted small">Manual Grant</span>
                                <?php endif; ?>
                            </td>
                            <td><?= status_badge($lic->status) ?></td>
                            <td><small class="text-muted"><?= format_custom_date($lic->created_at, 'd M Y') ?></small></td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                        <?php if ($lic->status !== 'active'): ?>
                                            <li>
                                                <form action="<?= superadmin_url('licenses/manage') ?>" method="post">
                                                    <input type="hidden" name="action" value="update_status">
                                                    <input type="hidden" name="license_id" value="<?= $lic->id ?>">
                                                    <input type="hidden" name="status" value="active">
                                                    <button type="submit" class="dropdown-item text-success">
                                                        <i class="fa-solid fa-check-circle me-2"></i>Activate License
                                                    </button>
                                                </form>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($lic->status !== 'suspended'): ?>
                                            <li>
                                                <form action="<?= superadmin_url('licenses/manage') ?>" method="post">
                                                    <input type="hidden" name="action" value="update_status">
                                                    <input type="hidden" name="license_id" value="<?= $lic->id ?>">
                                                    <input type="hidden" name="status" value="suspended">
                                                    <button type="submit" class="dropdown-item text-warning">
                                                        <i class="fa-solid fa-pause me-2"></i>Suspend License
                                                    </button>
                                                </form>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($lic->status !== 'revoked'): ?>
                                            <li>
                                                <form action="<?= superadmin_url('licenses/manage') ?>" method="post">
                                                    <input type="hidden" name="action" value="update_status">
                                                    <input type="hidden" name="license_id" value="<?= $lic->id ?>">
                                                    <input type="hidden" name="status" value="revoked">
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="fa-solid fa-ban me-2"></i>Revoke License
                                                    </button>
                                                </form>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal: Issue New License -->
<div class="modal fade" id="createLicenseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="<?= superadmin_url('licenses/manage') ?>" method="post">
                <input type="hidden" name="action" value="create_license">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold">
                        <i class="fa-solid fa-key text-warning me-2"></i>Issue New License Key
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Licensed Client Email *</label>
                        <input type="email" class="form-control" name="customer_email" required placeholder="owner@clientdomain.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Licensed Edition *</label>
                        <select class="form-select" name="plan_code" required>
                            <option value="SALON_SPA" selected>Salon &amp; Spa Unified Edition</option>
                            <option value="SALON">Salon Management Edition</option>
                            <option value="SPA">Spa Wellness Edition</option>
                        </select>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-bold">Template</label>
                            <select class="form-select" name="template">
                                <option value="template1" selected>Template 1 (Glamr)</option>
                                <option value="template2">Template 2 (Pureglow)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Layout</label>
                            <select class="form-select" name="layout">
                                <option value="1" selected>Layout 1</option>
                                <option value="2">Layout 2</option>
                                <option value="3">Layout 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="alert alert-info small border-0 py-2 px-3 mb-0">
                        <i class="fa-solid fa-info-circle me-1"></i> A cryptographically unique commercial key will be generated in format <code>LIC-[PLAN]-[HASH]-[YEAR]-X[RAND]</code>.
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm fw-bold px-4">
                        <i class="fa-solid fa-key me-1"></i> Generate &amp; Activate Key
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Verify License Key -->
<div class="modal fade" id="verifyLicenseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title fw-bold">
                    <i class="fa-solid fa-barcode text-primary me-2"></i>Verify License Key
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label small fw-bold">Enter License Key to Test</label>
                    <input type="text" class="form-control font-monospace" id="verifyKeyInput" placeholder="LIC-SALONSPA-...">
                </div>
                <button type="button" class="btn btn-primary w-100 fw-bold" id="btnRunVerify">
                    <i class="fa-solid fa-shield-halved me-1"></i> Check License Status
                </button>
                <div id="verifyResult" class="mt-3 d-none"></div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var btn = document.getElementById('btnRunVerify');
    if (btn) {
        btn.addEventListener('click', function() {
            var key = document.getElementById('verifyKeyInput').value.trim();
            var resDiv = document.getElementById('verifyResult');
            if (!key) {
                resDiv.className = 'mt-3 alert alert-warning small';
                resDiv.innerHTML = 'Please enter a key.';
                resDiv.classList.remove('d-none');
                return;
            }

            fetch('<?= superadmin_url('licenses/verify') ?>', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'license_key=' + encodeURIComponent(key)
            })
            .then(function(res) { return res.json(); })
            .then(function(data) {
                resDiv.classList.remove('d-none');
                if (data.valid) {
                    resDiv.className = 'mt-3 alert alert-success small';
                    resDiv.innerHTML = '<strong>' + data.message + '</strong><br>' +
                                      'Plan: ' + data.plan_code + '<br>' +
                                      'Client: ' + data.customer_email;
                } else {
                    resDiv.className = 'mt-3 alert alert-danger small';
                    resDiv.innerHTML = data.message;
                }
            })
            .catch(function(err) {
                resDiv.classList.remove('d-none');
                resDiv.className = 'mt-3 alert alert-danger small';
                resDiv.innerHTML = 'Connection error checking license.';
            });
        });
    }
});
</script>
