<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1 text-dark">
            <i class="fa-solid fa-receipt text-primary me-2"></i>Customer Orders &amp; Script Purchases
        </h4>
        <p class="text-muted mb-0">Track all commercial script acquisitions, license allocations, and customer checkout transactions.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= superadmin_url('orders/export') ?>" class="btn btn-outline-secondary btn-sm px-3">
            <i class="fa-solid fa-file-csv me-1"></i> Export CSV
        </a>
        <button type="button" class="btn btn-primary btn-sm px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#createOrderModal">
            <i class="fa-solid fa-plus me-1"></i> Record Offline Order
        </button>
    </div>
</div>

<!-- Filters Bar -->
<div class="card border-0 shadow-sm rounded-3 mb-4">
    <div class="card-body p-3">
        <form method="get" action="<?= superadmin_url('orders') ?>" class="row g-2 align-items-center">
            <div class="col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" class="form-control" name="search" placeholder="Search order #, customer, email..." value="<?= htmlspecialchars($search ? $search : '') ?>">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select form-select-sm" name="plan">
                    <option value="">All Editions / Plans</option>
                    <option value="SALON" <?= $filter_plan === 'SALON' ? 'selected' : '' ?>>Salon Management</option>
                    <option value="SPA" <?= $filter_plan === 'SPA' ? 'selected' : '' ?>>Spa Wellness</option>
                    <option value="SALON_SPA" <?= $filter_plan === 'SALON_SPA' ? 'selected' : '' ?>>Salon &amp; Spa Unified</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select form-select-sm" name="status">
                    <option value="">All Payment Statuses</option>
                    <option value="paid" <?= $filter_status === 'paid' ? 'selected' : '' ?>>Paid</option>
                    <option value="pending" <?= $filter_status === 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="failed" <?= $filter_status === 'failed' ? 'selected' : '' ?>>Failed</option>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-dark btn-sm w-100 fw-semibold">Filter</button>
                <a href="<?= superadmin_url('orders') ?>" class="btn btn-outline-secondary btn-sm" title="Clear Filters"><i class="fa-solid fa-rotate-left"></i></a>
            </div>
        </form>
    </div>
</div>

<!-- Orders Table -->
<div class="card border-0 shadow-sm rounded-3 overflow-hidden">
    <div class="table-responsive">
        <table class="table sa-table align-middle mb-0">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer / Business</th>
                    <th>Plan Edition</th>
                    <th>Template &amp; Layout</th>
                    <th>Amount</th>
                    <th>Payment</th>
                    <th>License Key</th>
                    <th>Downloads</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($orders)): ?>
                    <tr>
                        <td colspan="9" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-folder-open fs-2 d-block mb-2 text-secondary"></i>
                            No orders match your search criteria.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($orders as $ord): ?>
                        <tr>
                            <td>
                                <div class="fw-bold font-monospace text-dark"><?= htmlspecialchars($ord->order_number) ?></div>
                                <small class="text-muted"><?= format_custom_date($ord->created_at) ?></small>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark"><?= htmlspecialchars($ord->customer_name) ?></div>
                                <div class="small text-muted"><i class="fa-regular fa-envelope me-1"></i><?= htmlspecialchars($ord->customer_email) ?></div>
                                <?php if (!empty($ord->business_name)): ?>
                                    <div class="small text-secondary"><i class="fa-solid fa-briefcase me-1"></i><?= htmlspecialchars($ord->business_name) ?></div>
                                <?php endif; ?>
                            </td>
                            <td><?= plan_badge($ord->plan_code) ?></td>
                            <td>
                                <span class="badge bg-light text-dark border"><?= $ord->chosen_template ?></span>
                                <span class="badge bg-light text-dark border">Layout <?= $ord->chosen_layout ?></span>
                            </td>
                            <td class="fw-bold text-success fs-6"><?= format_currency($ord->amount) ?></td>
                            <td>
                                <div><?= status_badge($ord->payment_status) ?></div>
                                <small class="text-muted text-uppercase" style="font-size:11px;"><?= htmlspecialchars($ord->payment_method) ?></small>
                            </td>
                            <td>
                                <div class="sa-code-badge">
                                    <span class="copy-target"><?= htmlspecialchars($ord->license_key) ?></span>
                                    <i class="fa-regular fa-copy sa-copy-btn" title="Copy License Key"></i>
                                </div>
                            </td>
                            <td>
                                <span class="badge <?= $ord->download_count > 0 ? 'bg-info' : 'bg-secondary' ?> rounded-pill">
                                    <?= $ord->download_count ?> downloads
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderDetailModal<?= $ord->id ?>">
                                                <i class="fa-solid fa-eye me-2 text-info"></i>View Full Details
                                            </a>
                                        </li>
                                        <li>
                                            <form action="<?= superadmin_url('orders/update_status') ?>" method="post">
                                                <input type="hidden" name="order_id" value="<?= $ord->id ?>">
                                                <input type="hidden" name="action" value="reset_downloads">
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fa-solid fa-rotate-left me-2 text-warning"></i>Reset Downloads (0)
                                                </button>
                                            </form>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="<?= superadmin_url('orders/update_status') ?>" method="post">
                                                <input type="hidden" name="order_id" value="<?= $ord->id ?>">
                                                <input type="hidden" name="action" value="change_payment_status">
                                                <input type="hidden" name="payment_status" value="<?= $ord->payment_status === 'paid' ? 'pending' : 'paid' ?>">
                                                <button type="submit" class="dropdown-item text-<?= $ord->payment_status === 'paid' ? 'warning' : 'success' ?>">
                                                    <i class="fa-solid fa-toggle-on me-2"></i>Mark as <?= $ord->payment_status === 'paid' ? 'Pending' : 'Paid' ?>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <!-- Details Modal -->
                        <div class="modal fade" id="orderDetailModal<?= $ord->id ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header bg-dark text-white">
                                        <h5 class="modal-title fw-bold">
                                            <i class="fa-solid fa-receipt text-primary me-2"></i>Order #<?= htmlspecialchars($ord->order_number) ?>
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="row g-3 small">
                                            <div class="col-6">
                                                <span class="text-muted d-block">Customer:</span>
                                                <strong class="text-dark"><?= htmlspecialchars($ord->customer_name) ?></strong>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted d-block">Email:</span>
                                                <strong class="text-dark"><?= htmlspecialchars($ord->customer_email) ?></strong>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted d-block">Phone:</span>
                                                <span class="text-dark"><?= htmlspecialchars($ord->customer_phone ? $ord->customer_phone : 'N/A') ?></span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted d-block">Business Name:</span>
                                                <span class="text-dark"><?= htmlspecialchars($ord->business_name ? $ord->business_name : 'N/A') ?></span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted d-block">Plan Edition:</span>
                                                <?= plan_badge($ord->plan_code) ?>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-muted d-block">Amount Paid:</span>
                                                <strong class="text-success fs-6"><?= format_currency($ord->amount) ?></strong>
                                            </div>
                                            <div class="col-12">
                                                <span class="text-muted d-block mb-1">Generated License Key:</span>
                                                <div class="sa-code-badge w-100 justify-content-between">
                                                    <span class="copy-target"><?= htmlspecialchars($ord->license_key) ?></span>
                                                    <i class="fa-regular fa-copy sa-copy-btn"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <span class="text-muted d-block mb-1">Download Delivery Token:</span>
                                                <code class="p-2 bg-light rounded d-block border"><?= htmlspecialchars($ord->download_token) ?></code>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-light">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal: Record Offline Order -->
<div class="modal fade" id="createOrderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="<?= superadmin_url('orders/create') ?>" method="post">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold">
                        <i class="fa-solid fa-plus-circle text-warning me-2"></i>Record Offline / Custom Commercial Order
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Customer Full Name *</label>
                            <input type="text" class="form-control" name="customer_name" required placeholder="John Doe">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Customer Email Address *</label>
                            <input type="email" class="form-control" name="customer_email" required placeholder="client@example.com">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Phone Number</label>
                            <input type="text" class="form-control" name="customer_phone" placeholder="+1 (555) ...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Business / Salon Name</label>
                            <input type="text" class="form-control" name="business_name" placeholder="Acme Spa & Salon">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Script Edition *</label>
                            <select class="form-select" name="plan_code" id="orderPlanCode" required>
                                <option value="SALON_SPA" selected>Salon &amp; Spa Unified Edition ($89.00)</option>
                                <option value="SALON">Salon Management Edition ($49.00)</option>
                                <option value="SPA">Spa Wellness Edition ($49.00)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Template Variant</label>
                            <select class="form-select" name="template">
                                <option value="template1" selected>Template 1 (Glamr)</option>
                                <option value="template2">Template 2 (Pureglow)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Home Layout</label>
                            <select class="form-select" name="layout">
                                <option value="1" selected>Layout 1</option>
                                <option value="2">Layout 2</option>
                                <option value="3">Layout 3</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Amount Paid ($) *</label>
                            <input type="number" step="0.01" class="form-control" name="amount" value="89.00" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Payment Channel</label>
                            <select class="form-select" name="payment_method">
                                <option value="wire_transfer" selected>Bank Wire / Wire Transfer</option>
                                <option value="paypal_manual">PayPal Invoice</option>
                                <option value="stripe_manual">Stripe Direct</option>
                                <option value="cash_direct">Cash / In-Person</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-4">
                        <i class="fa-solid fa-check me-1"></i> Create Order &amp; Allocate License
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
