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
