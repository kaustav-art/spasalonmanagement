<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1 text-dark">
            <i class="fa-solid fa-store text-warning me-2"></i>SaaS Multi-Tenant Management
        </h4>
        <p class="text-muted mb-0">Oversee multi-tenant deployments, provisioned domain folders, databases, active editions, and tenant metrics.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= base_url('../setup_wizard.php') ?>" target="_blank" class="btn btn-warning btn-sm px-3 fw-bold">
            <i class="fa-solid fa-plus-circle me-1"></i> Provision New Tenant
        </a>
        <a href="<?= tenant_admin_url() ?>" target="_blank" class="btn btn-outline-primary btn-sm px-3 fw-semibold">
            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Open Default Admin
        </a>
        <a href="<?= tenant_site_url() ?>" target="_blank" class="btn btn-outline-success btn-sm px-3 fw-semibold">
            <i class="fa-solid fa-globe me-1"></i> Open Default Website
        </a>
    </div>
</div>

<!-- SaaS Multi-Tenant Provisioned Instances Table -->
<div class="card border-0 shadow-sm rounded-3 mb-4">
    <div class="card-header bg-dark text-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="fw-bold mb-0">
            <i class="fa-solid fa-server text-warning me-2"></i>Provisioned SaaS Tenant Instances (<?= count($saas_tenants) ?> Active)
        </h6>
        <span class="badge bg-warning text-dark fw-bold">Folder-Based Multi-Tenancy</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light small text-uppercase fw-bold text-muted">
                    <tr>
                        <th>Domain / Directory</th>
                        <th>Business Name</th>
                        <th>Edition Plan</th>
                        <th>Theme &amp; Layout</th>
                        <th>Tenant Database</th>
                        <th>Admin User</th>
                        <th>Status</th>
                        <th class="text-end">Live Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($saas_tenants)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-folder-open fa-2x mb-2 text-warning opacity-50 d-block"></i>
                                <strong>No tenant instances provisioned yet.</strong>
                                <p class="small mb-2">Customers deploying via the Project Setup Wizard will automatically appear here.</p>
                                <a href="<?= base_url('../setup_wizard.php') ?>" target="_blank" class="btn btn-sm btn-outline-warning">
                                    <i class="fa-solid fa-rocket me-1"></i> Launch Project Setup Wizard
                                </a>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($saas_tenants as $t): ?>
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark font-monospace">
                                        <i class="fa-solid fa-folder text-warning me-1"></i> <?= htmlspecialchars($t->domain) ?>
                                    </div>
                                    <small class="text-muted"><?= htmlspecialchars($t->created_at) ?></small>
                                </td>
                                <td>
                                    <div class="fw-bold"><?= htmlspecialchars($t->company_name) ?></div>
                                    <small class="text-muted"><?= htmlspecialchars($t->company_email) ?></small>
                                </td>
                                <td>
                                    <?php if ($t->plan_code === 'SALON'): ?>
                                        <span class="badge bg-info text-dark fw-semibold">Salon Edition</span>
                                    <?php elseif ($t->plan_code === 'SPA'): ?>
                                        <span class="badge bg-success fw-semibold">Spa Wellness</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark fw-semibold">Salon &amp; Spa Complete</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border"><?= htmlspecialchars($t->template) ?></span>
                                    <span class="badge bg-light text-dark border">Layout <?= (int)$t->layout ?></span>
                                </td>
                                <td>
                                    <code class="small text-primary"><?= htmlspecialchars($t->db_name) ?></code>
                                </td>
                                <td>
                                    <span class="small font-monospace"><?= htmlspecialchars($t->admin_email) ?></span>
                                </td>
                                <td>
                                    <?php if ($t->status === 'active'): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Suspended</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= htmlspecialchars($t->website_url) ?>" target="_blank" class="btn btn-outline-primary" title="Visit Tenant Website">
                                            <i class="fa-solid fa-globe"></i> Website
                                        </a>
                                        <a href="<?= htmlspecialchars($t->admin_url) ?>" target="_blank" class="btn btn-outline-warning" title="Open Tenant Admin">
                                            <i class="fa-solid fa-user-shield"></i> Admin
                                        </a>
                                        <a href="<?= superadmin_url('tenants/toggle_status/' . $t->id) ?>" class="btn btn-outline-secondary" title="Toggle Status">
                                            <i class="fa-solid fa-power-off"></i>
                                        </a>
                                        <a href="<?= superadmin_url('tenants/delete_tenant/' . $t->id) ?>" class="btn btn-outline-danger" onclick="return confirm('Permanently delete tenant <?= htmlspecialchars($t->domain) ?>, its directory and database?')" title="Delete Instance">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
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

<!-- Tenant Health Overview -->
<div class="row g-3 mb-4">
    <div class="col-xl-2 col-md-4 col-6">
        <div class="card border-0 shadow-sm p-3 bg-white text-center rounded-3">
            <div class="text-muted small fw-bold text-uppercase">Appointments</div>
            <h3 class="fw-bold text-primary mt-1 mb-0"><?= $count_appointments ?></h3>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-6">
        <div class="card border-0 shadow-sm p-3 bg-white text-center rounded-3">
            <div class="text-muted small fw-bold text-uppercase">Customers</div>
            <h3 class="fw-bold text-success mt-1 mb-0"><?= $count_customers ?></h3>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-6">
        <div class="card border-0 shadow-sm p-3 bg-white text-center rounded-3">
            <div class="text-muted small fw-bold text-uppercase">Staff Roster</div>
            <h3 class="fw-bold text-warning mt-1 mb-0"><?= $count_staff ?></h3>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-6">
        <div class="card border-0 shadow-sm p-3 bg-white text-center rounded-3">
            <div class="text-muted small fw-bold text-uppercase">Services Menu</div>
            <h3 class="fw-bold text-info mt-1 mb-0"><?= $count_services ?></h3>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-6">
        <div class="card border-0 shadow-sm p-3 bg-white text-center rounded-3">
            <div class="text-muted small fw-bold text-uppercase">POS Invoices</div>
            <h3 class="fw-bold text-secondary mt-1 mb-0"><?= $count_invoices ?></h3>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-6">
        <div class="card border-0 shadow-sm p-3 bg-white text-center rounded-3">
            <div class="text-muted small fw-bold text-uppercase">POS Revenue</div>
            <h3 class="fw-bold text-success mt-1 mb-0"><?= format_currency($tenant_sales_revenue) ?></h3>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Live Mode & Template Switcher -->
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm rounded-3 h-100">
            <div class="card-header bg-dark text-white py-3">
                <h6 class="fw-bold mb-0">
                    <i class="fa-solid fa-sliders text-warning me-2"></i>Instant Platform Switcher
                </h6>
            </div>
            <div class="card-body p-4">
                <form action="<?= superadmin_url('tenants/switch_mode') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Active System Edition Mode</label>
                        <select class="form-select" name="mode">
                            <option value="SALON_SPA" <?= $business_type === 'SALON_SPA' ? 'selected' : '' ?>>Unified Salon &amp; Spa (All Unlocked)</option>
                            <option value="SALON" <?= $business_type === 'SALON' ? 'selected' : '' ?>>Salon Management (Hair, Nails, Stylists)</option>
                            <option value="SPA" <?= $business_type === 'SPA' ? 'selected' : '' ?>>Spa Wellness (Suites, Therapists)</option>
                        </select>
                        <small class="text-muted">Instantly shows/hides salon chairs vs spa rooms in the tenant navigation.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Active Public Website Template</label>
                        <select class="form-select" name="template">
                            <option value="template1" <?= $active_template === 'template1' ? 'selected' : '' ?>>Template 1 (Luxury Salon &amp; Spa)</option>
                            <option value="template2" <?= $active_template === 'template2' ? 'selected' : '' ?>>Template 2 (Organic Holistic Spa)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold">Active Homepage Layout</label>
                        <select class="form-select" name="layout">
                            <option value="1" <?= $active_layout == 1 ? 'selected' : '' ?>>Layout 1 (Hero Slider + Quick Booking)</option>
                            <option value="2" <?= $active_layout == 2 ? 'selected' : '' ?>>Layout 2 (Modern Grid + Video Banner)</option>
                            <option value="3" <?= $active_layout == 3 ? 'selected' : '' ?>>Layout 3 (Minimalist Studio Showcase)</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning fw-bold w-100 py-2">
                        <i class="fa-solid fa-bolt me-1"></i> Apply Mode &amp; Template
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tenant Profile Configuration -->
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-3 h-100">
            <div class="card-header bg-white py-3 border-bottom">
                <h6 class="fw-bold mb-0 text-dark">
                    <i class="fa-solid fa-building text-primary me-2"></i>Tenant Business Settings
                </h6>
            </div>
            <div class="card-body p-4">
                <form action="<?= superadmin_url('tenants') ?>" method="post">
                    <input type="hidden" name="action" value="update_tenant">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Business Name</label>
                            <input type="text" class="form-control" name="business_name" value="<?= htmlspecialchars($business_name) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Currency Symbol</label>
                            <input type="text" class="form-control" name="currency_symbol" value="<?= htmlspecialchars($currency_symbol) ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Business Email</label>
                            <input type="email" class="form-control" name="business_email" value="<?= htmlspecialchars($business_email) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Contact Phone</label>
                            <input type="text" class="form-control" name="business_phone" value="<?= htmlspecialchars($business_phone) ?>">
                        </div>

                        <input type="hidden" name="business_type" value="<?= $business_type ?>">
                        <input type="hidden" name="active_template" value="<?= $active_template ?>">
                        <input type="hidden" name="active_home_layout" value="<?= $active_layout ?>">

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                <i class="fa-solid fa-save me-1"></i> Save Tenant Settings
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
