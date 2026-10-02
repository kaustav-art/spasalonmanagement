<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-calendar-check text-primary me-2"></i>Appointments & Booking Analytics</h4>
        <p class="text-muted mb-0">Monitor online vs walk-in appointments, completion rates, and staff utilization.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <button onclick="window.print()" class="btn btn-outline-secondary">
            <i class="fas fa-print me-1"></i>Print Report
        </button>
    </div>
</div>

<!-- Date Filter Form -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3">
        <form method="GET" action="<?= admin_url('reports/appointments') ?>" class="row g-2 align-items-center">
            <div class="col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">From</span>
                    <input type="date" name="from" class="form-control" value="<?= htmlspecialchars($from) ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">To</span>
                    <input type="date" name="to" class="form-control" value="<?= htmlspecialchars($to) ?>">
                </div>
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm w-100"><i class="fas fa-sync-alt me-1"></i>Generate Report</button>
                <a href="<?= admin_url('reports/appointments') ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-redo"></i></a>
            </div>
        </form>
    </div>
</div>

<!-- Booking Status Breakdown Cards -->
<div class="row g-3 mb-4">
    <div class="col-md-2 col-6">
        <div class="card border-0 shadow-sm text-center">
            <div class="card-body py-3">
                <span class="text-muted small">Total Bookings</span>
                <h4 class="fw-bold mt-1 mb-0 text-dark"><?= count($appointments) ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="card border-0 shadow-sm text-center">
            <div class="card-body py-3">
                <span class="text-muted small">Confirmed</span>
                <h4 class="fw-bold mt-1 mb-0 text-primary"><?= $status_counts['confirmed'] ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="card border-0 shadow-sm text-center">
            <div class="card-body py-3">
                <span class="text-muted small">In Service</span>
                <h4 class="fw-bold mt-1 mb-0 text-warning"><?= $status_counts['in_service'] ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="card border-0 shadow-sm text-center">
            <div class="card-body py-3">
                <span class="text-muted small">Completed</span>
                <h4 class="fw-bold mt-1 mb-0 text-success"><?= $status_counts['completed'] ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="card border-0 shadow-sm text-center">
            <div class="card-body py-3">
                <span class="text-muted small">Cancelled</span>
                <h4 class="fw-bold mt-1 mb-0 text-danger"><?= $status_counts['cancelled'] ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="card border-0 shadow-sm text-center">
            <div class="card-body py-3">
                <span class="text-muted small">Pending</span>
                <h4 class="fw-bold mt-1 mb-0 text-info"><?= $status_counts['pending'] ?></h4>
            </div>
        </div>
    </div>
</div>

<!-- Booking Source Breakdown -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="avatar-md bg-info-subtle text-info rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2" style="width: 48px; height: 48px;">
                <i class="fas fa-globe fs-5"></i>
            </div>
            <h6 class="text-muted small mb-1">Website Online Bookings</h6>
            <h3 class="fw-bold text-dark mb-0"><?= $source_counts['online'] ?></h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="avatar-md bg-success-subtle text-success rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2" style="width: 48px; height: 48px;">
                <i class="fas fa-walking fs-5"></i>
            </div>
            <h6 class="text-muted small mb-1">Front Desk Walk-ins</h6>
            <h3 class="fw-bold text-dark mb-0"><?= $source_counts['walk_in'] ?></h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="avatar-md bg-primary-subtle text-primary rounded-circle mx-auto d-flex align-items-center justify-content-center mb-2" style="width: 48px; height: 48px;">
                <i class="fas fa-user-shield fs-5"></i>
            </div>
            <h6 class="text-muted small mb-1">Staff / Phone Bookings</h6>
            <h3 class="fw-bold text-dark mb-0"><?= $source_counts['admin'] ?></h3>
        </div>
    </div>
</div>

<!-- Appointments Log -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0">Detailed Appointments List (<?= count($appointments) ?>)</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Code</th>
                        <th>Date & Time</th>
                        <th>Client</th>
                        <th>Assigned Staff</th>
                        <?php if (is_spa_enabled()): ?>
                            <th>Room</th>
                        <?php endif; ?>
                        <th>Source</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($appointments)): ?>
                        <tr><td colspan="8" class="text-center py-4 text-muted">No appointments found for this period.</td></tr>
                    <?php else: ?>
                        <?php foreach ($appointments as $a): ?>
                        <tr>
                            <td class="ps-3 fw-bold"><a href="<?= admin_url('appointments/view/'.$a->id) ?>">#<?= htmlspecialchars($a->appointment_number) ?></a></td>
                            <td>
                                <div><?= date('M d, Y', strtotime($a->booking_date)) ?></div>
                                <small class="text-muted"><?= date('g:i A', strtotime($a->start_time)) ?> - <?= date('g:i A', strtotime($a->end_time)) ?></small>
                            </td>
                            <td><?= htmlspecialchars($a->customer_name ? $a->customer_name : 'Walk-in Guest') ?></td>
                            <td><?= htmlspecialchars($a->staff_name ? $a->staff_name : 'Unassigned') ?></td>
                            <?php if (is_spa_enabled()): ?>
                                <td><?= htmlspecialchars($a->room_name ? $a->room_name : '—') ?></td>
                            <?php endif; ?>
                            <td>
                                <span class="badge bg-light text-dark border text-capitalize"><?= htmlspecialchars($a->booking_source) ?></span>
                            </td>
                            <td class="fw-bold"><?= format_currency($a->final_amount) ?></td>
                            <td>
                                <?php 
                                    $st = $a->status;
                                    $cls = 'bg-secondary';
                                    if ($st == 'confirmed') $cls = 'bg-primary';
                                    elseif ($st == 'in_service') $cls = 'bg-warning text-dark';
                                    elseif ($st == 'completed') $cls = 'bg-success';
                                    elseif ($st == 'cancelled') $cls = 'bg-danger';
                                ?>
                                <span class="badge <?= $cls ?>"><?= ucfirst(str_replace('_', ' ', $st)) ?></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
