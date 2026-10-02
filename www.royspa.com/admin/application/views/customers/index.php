<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-users text-primary me-2"></i> Customers Directory & CRM</h4>
        <p class="text-muted mb-0">Client histories, loyalty reward points, total visits, and personal preferences.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <div class="d-flex align-items-center justify-content-md-end gap-2">
            <a href="<?= admin_url('customers/groups') ?>" class="btn btn-outline-secondary">
                <i class="fa-solid fa-crown me-1"></i> Customer Groups
            </a>
            <a href="<?= admin_url('customers/create') ?>" class="btn btn-primary shadow-sm">
                <i class="fa-solid fa-user-plus me-1"></i> Add Customer
            </a>
        </div>
    </div>
</div>

<!-- Search & Filter -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-3">
        <form action="<?= admin_url('customers') ?>" method="GET" class="row g-2 align-items-end">
            <div class="col-md-6">
                <label class="form-label fs-13px fw-semibold mb-1">Search Clients</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-light"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="q" class="form-control" placeholder="Search by name, phone, or email..." value="<?= html_escape($search) ?>">
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label fs-13px fw-semibold mb-1">Customer Group</label>
                <select name="group_id" class="form-select form-select-sm">
                    <option value="">All Groups</option>
                    <?php foreach ($groups as $g): ?>
                        <option value="<?= $g->id ?>" <?= ($current_group == $g->id) ? 'selected' : '' ?>><?= html_escape($g->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary w-100">Filter</button>
                <a href="<?= admin_url('customers') ?>" class="btn btn-sm btn-light border">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Customer List Table -->
<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Client</th>
                        <th>Contact</th>
                        <th>Group / VIP</th>
                        <th>Visits</th>
                        <th>Total Spend</th>
                        <th>Loyalty Points</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($customers)): ?>
                        <?php foreach ($customers as $c): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar avatar-md rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center fw-bold">
                                            <?= strtoupper(substr($c->name, 0, 1)) ?>
                                        </div>
                                        <div>
                                            <a href="<?= admin_url('customers/profile/' . $c->id) ?>" class="fw-bold text-dark text-decoration-none d-block">
                                                <?= html_escape($c->name) ?>
                                            </a>
                                            <small class="text-muted"><?= html_escape($c->gender) ?> <?= $c->dob ? '&bull; DOB: ' . date('d M', strtotime($c->dob)) : '' ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div><a href="tel:<?= html_escape($c->phone) ?>" class="text-decoration-none fw-semibold text-dark"><?= html_escape($c->phone) ?></a></div>
                                    <small class="text-muted"><?= html_escape($c->email ? $c->email : 'No email') ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <?= html_escape($c->group_name ? $c->group_name : 'Regular') ?>
                                    </span>
                                </td>
                                <td class="fw-semibold"><?= (int)$c->total_visits ?> visits</td>
                                <td class="fw-bold text-success"><?= format_currency($c->total_spend ? $c->total_spend : 0) ?></td>
                                <td>
                                    <span class="badge bg-warning bg-opacity-10 text-warning border border-warning fs-12px">
                                        <i class="fa-solid fa-star me-1"></i> <?= $c->loyalty_points ?> pts
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="<?= admin_url('customers/profile/' . $c->id) ?>" class="btn btn-xs btn-outline-primary me-1" title="View 360 Profile">
                                        <i class="fa-regular fa-id-card"></i> View
                                    </a>
                                    <a href="<?= admin_url('customers/edit/' . $c->id) ?>" class="btn btn-xs btn-outline-secondary" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center py-5 text-muted">No customers found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
