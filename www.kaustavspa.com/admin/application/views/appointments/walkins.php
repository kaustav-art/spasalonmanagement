<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-person-walking text-primary me-2"></i> Walk-ins & Live Queue</h4>
        <p class="text-muted mb-0">Today's active waiting room and currently serviced clients (<?= date('l, d M Y') ?>).</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <button type="button" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#quickWalkinModal">
            <i class="fa-solid fa-bolt me-1"></i> Quick Walk-in Check-in
        </button>
    </div>
</div>

<div class="row g-4">
    <!-- Queue Cards -->
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-0">Active Front Desk Queue (<?= count($queue) ?>)</h5>
                <span class="badge bg-primary rounded-pill">Real-time</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Ticket / Appt #</th>
                                <th>Client Name</th>
                                <th>Contact</th>
                                <th>Specialist</th>
                                <?php if (is_spa_enabled()): ?>
                                    <th>Spa Suite</th>
                                <?php endif; ?>
                                <th>Time</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($queue)): ?>
                                <?php foreach ($queue as $q): ?>
                                    <tr>
                                        <td class="ps-4 fw-bold text-primary"><?= html_escape($q->appointment_number) ?></td>
                                        <td class="fw-semibold text-dark"><?= html_escape($q->customer_name) ?></td>
                                        <td><?= html_escape($q->customer_phone) ?></td>
                                        <td><?= $q->staff_name ? html_escape($q->staff_name) : '<span class="text-muted">First Available</span>' ?></td>
                                        <?php if (is_spa_enabled()): ?>
                                            <td><?= $q->room_name ? '<span class="badge bg-info bg-opacity-10 text-info">' . html_escape($q->room_name) . '</span>' : '-' ?></td>
                                        <?php endif; ?>
                                        <td><?= date('h:i A', strtotime($q->start_time)) ?></td>
                                        <td><?= appointment_status_badge($q->status) ?></td>
                                        <td class="text-end pe-4">
                                            <?php if ($q->status === 'pending'): ?>
                                                <a href="<?= admin_url('appointments/change_status/' . $q->id . '/confirmed') ?>" class="btn btn-xs btn-success me-1">Confirm</a>
                                            <?php endif; ?>
                                            <?php if (in_array($q->status, array('pending', 'confirmed'))): ?>
                                                <a href="<?= admin_url('appointments/change_status/' . $q->id . '/in_service') ?>" class="btn btn-xs btn-info text-white me-1">Start Service</a>
                                            <?php endif; ?>
                                            <a href="<?= admin_url('pos?appointment_id=' . $q->id) ?>" class="btn btn-xs btn-primary fw-semibold">
                                                <i class="fa-solid fa-cash-register me-1"></i> Checkout
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="<?= is_spa_enabled() ? '8' : '7' ?>" class="text-center py-5 text-muted">
                                        <i class="fa-solid fa-mug-hot fs-2 d-block mb-2"></i> The queue is currently empty.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Walkin Modal -->
<div class="modal fade" id="quickWalkinModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= admin_url('appointments/create') ?>" method="POST">
                <input type="hidden" name="booking_date" value="<?= date('Y-m-d') ?>">
                <input type="hidden" name="start_time" value="<?= date('H:i:s') ?>">
                <input type="hidden" name="booking_source" value="walk_in">
                
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-bolt text-warning me-1"></i> Quick Walk-in Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Walk-in Client Name <span class="text-danger">*</span></label>
                        <input type="text" name="new_customer_name" class="form-control" required placeholder="Guest Name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" name="new_customer_phone" class="form-control" required placeholder="Mobile Number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Service <span class="text-danger">*</span></label>
                        <select name="service_id" class="form-select" required>
                            <option value="">-- Select Service --</option>
                            <?php foreach ($services as $srv): ?>
                                <option value="<?= $srv->id ?>"><?= html_escape($srv->name) ?> - <?= format_currency($srv->price) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Assign Specialist</label>
                        <select name="staff_id" class="form-select">
                            <option value="">-- Any Available Specialist --</option>
                            <?php foreach ($staff_members as $sm): ?>
                                <option value="<?= $sm->id ?>"><?= html_escape($sm->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Check-in Guest</button>
                </div>
            </form>
        </div>
    </div>
</div>
