<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-regular fa-calendar-check text-primary me-2"></i> All Bookings & Appointments</h4>
        <p class="text-muted mb-0">Monitor online customer reservations, scheduled visits, walk-in sessions, and service workflows.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <div class="d-flex align-items-center justify-content-md-end gap-2">
            <a href="<?= admin_url('appointments/calendar') ?>" class="btn btn-outline-secondary">
                <i class="fa-solid fa-calendar-days me-1"></i> Calendar View
            </a>
            <a href="<?= admin_url('appointments/create') ?>" class="btn btn-primary shadow-sm">
                <i class="fa-solid fa-plus me-1"></i> Add Booking
            </a>
        </div>
    </div>
</div>

<!-- Filters Card -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-3">
        <form action="<?= admin_url('appointments') ?>" method="GET" class="row g-2 align-items-end">
            <div class="col-md-4 col-sm-6">
                <label class="form-label fs-13px fw-semibold mb-1">Status Filter</label>
                <select name="status" class="form-select form-select-sm">
                    <option value="">All Statuses</option>
                    <option value="pending" <?= ($current_status === 'pending') ? 'selected' : '' ?>>Pending</option>
                    <option value="confirmed" <?= ($current_status === 'confirmed') ? 'selected' : '' ?>>Confirmed</option>
                    <option value="in_service" <?= ($current_status === 'in_service') ? 'selected' : '' ?>>In Service</option>
                    <option value="completed" <?= ($current_status === 'completed') ? 'selected' : '' ?>>Completed</option>
                    <option value="cancelled" <?= ($current_status === 'cancelled') ? 'selected' : '' ?>>Cancelled</option>
                </select>
            </div>
            <div class="col-md-4 col-sm-6">
                <label class="form-label fs-13px fw-semibold mb-1">Date</label>
                <input type="date" name="date" class="form-control form-control-sm" value="<?= html_escape($current_date) ?>">
            </div>
            <div class="col-md-4 col-sm-12 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary w-100">
                    <i class="fa-solid fa-filter me-1"></i> Filter
                </button>
                <a href="<?= admin_url('appointments') ?>" class="btn btn-sm btn-light border">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Appointments Table -->
<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Appt #</th>
                        <th>Date & Time</th>
                        <th>Customer</th>
                        <th>Source</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($appointments)): ?>
                        <?php foreach ($appointments as $apt): ?>
                            <tr>
                                <td class="ps-4 fw-semibold text-primary">
                                    <a href="<?= admin_url('appointments/view/' . $apt->id) ?>" class="text-decoration-none">
                                        <?= html_escape($apt->appointment_number) ?>
                                    </a>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark"><?= date('d M Y', strtotime($apt->booking_date)) ?></div>
                                    <small class="text-muted"><?= date('h:i A', strtotime($apt->start_time)) ?> - <?= date('h:i A', strtotime($apt->end_time)) ?></small>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark"><?= html_escape($apt->customer_name) ?></div>
                                    <small class="text-muted"><?= html_escape($apt->customer_phone) ?></small>
                                </td>
                                <td>
                                    <span class="badge <?= ($apt->booking_source === 'online') ? 'bg-info' : 'bg-secondary' ?>">
                                        <?= ucfirst($apt->booking_source) ?>
                                    </span>
                                </td>
                                <td class="fw-bold"><?= format_currency($apt->final_amount) ?></td>
                                <td><?= appointment_status_badge($apt->status) ?></td>
                                <td class="text-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            Manage
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                            <li>
                                                <a class="dropdown-item" href="<?= admin_url('appointments/view/' . $apt->id) ?>">
                                                    <i class="fa-regular fa-eye me-1 text-primary"></i> View Details
                                                </a>
                                            </li>
                                            <?php if ($apt->status === 'pending'): ?>
                                                <li>
                                                    <a class="dropdown-item text-success" href="<?= admin_url('appointments/change_status/' . $apt->id . '/confirmed') ?>">
                                                        <i class="fa-solid fa-check me-1"></i> Confirm Appointment
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if (in_array($apt->status, array('pending', 'confirmed'))): ?>
                                                <li>
                                                    <a class="dropdown-item text-info" href="<?= admin_url('appointments/change_status/' . $apt->id . '/in_service') ?>">
                                                        <i class="fa-solid fa-person-booth me-1"></i> Start Service
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($apt->status === 'in_service' || $apt->status === 'confirmed'): ?>
                                                <li>
                                                    <a class="dropdown-item text-success fw-bold" href="<?= admin_url('pos?appointment_id=' . $apt->id) ?>">
                                                        <i class="fa-solid fa-cash-register me-1"></i> Complete & POS Checkout
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item text-danger" href="<?= admin_url('appointments/change_status/' . $apt->id . '/cancelled') ?>" onclick="return confirm('Cancel this appointment?');">
                                                    <i class="fa-solid fa-ban me-1"></i> Cancel Booking
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-regular fa-calendar-xmark fs-2 d-block mb-2 text-secondary"></i>
                                <span class="fw-semibold">No appointments found.</span>
                                <div class="mt-2">
                                    <a href="<?= admin_url('appointments/create') ?>" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-plus me-1"></i> Create First Booking
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
