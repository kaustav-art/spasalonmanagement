<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1 text-dark">
            <i class="fa-solid fa-store text-warning me-2"></i>Tenant Salon &amp; Spa Instance
        </h4>
        <p class="text-muted mb-0">Control the local business deployment, active license edition, template engine, and operational statistics.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= tenant_admin_url() ?>" target="_blank" class="btn btn-outline-primary btn-sm px-3 fw-semibold">
            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Open Salon Admin
        </a>
        <a href="<?= tenant_site_url() ?>" target="_blank" class="btn btn-outline-success btn-sm px-3 fw-semibold">
            <i class="fa-solid fa-globe me-1"></i> Open Client Website
        </a>
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
