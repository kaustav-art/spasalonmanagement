<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-hot-tub text-primary me-2"></i>Spa Treatment Sessions</h4>
        <p class="text-muted mb-0">Track all ongoing, completed, and upcoming therapeutic sessions and room allocations.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('spa/schedule') ?>" class="btn btn-outline-primary me-2">
            <i class="fas fa-calendar-alt me-1"></i>Visual Room Timeline
        </a>
        <a href="<?= admin_url('appointments/create') ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>Book New Session
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0"><i class="fas fa-list text-primary me-2"></i>All Spa Treatment Sessions</h6>
        <span class="badge bg-primary-subtle text-primary fw-semibold"><?= count($sessions) ?> Sessions Found</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Booking Code</th>
                        <th>Date & Time</th>
                        <th>Room</th>
                        <th>Client</th>
                        <th>Therapist</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th class="text-end pe-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($sessions)): ?>
                        <tr><td colspan="8" class="text-center py-4 text-muted">No spa sessions recorded yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($sessions as $s): ?>
                        <tr>
                            <td class="ps-3 fw-bold">
                                <a href="<?= admin_url('appointments/view/'.$s->id) ?>">#<?= htmlspecialchars($s->booking_code) ?></a>
                            </td>
                            <td>
                                <div class="fw-semibold"><?= date('M d, Y', strtotime($s->booking_date)) ?></div>
                                <small class="text-muted"><i class="far fa-clock me-1"></i><?= date('g:i A', strtotime($s->start_time)) ?> &ndash; <?= date('g:i A', strtotime($s->end_time)) ?></small>
                            </td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary border px-2 py-1">
                                    <i class="fas fa-door-open text-primary me-1"></i><?= htmlspecialchars($s->room_name ? $s->room_name : 'Room ' . $s->room_id) ?>
                                </span>
                            </td>
                            <td>
                                <div class="fw-bold"><?= htmlspecialchars($s->customer_name ? $s->customer_name : 'Walk-in Guest') ?></div>
                                <?php if ($s->customer_phone): ?>
                                    <small class="text-muted"><i class="fas fa-phone-alt me-1"></i><?= htmlspecialchars($s->customer_phone) ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">
                                    <i class="fas fa-user-md text-primary me-1"></i><?= htmlspecialchars($s->therapist_name ? $s->therapist_name : 'Any Therapist') ?>
                                </span>
                            </td>
                            <td class="fw-bold text-success">
                                <?= format_currency($s->total_amount) ?>
                            </td>
                            <td>
                                <?php
                                    $st = $s->status;
                                    $badge = 'bg-secondary';
                                    if ($st == 'confirmed') $badge = 'bg-primary';
                                    elseif ($st == 'in_service') $badge = 'bg-warning text-dark';
                                    elseif ($st == 'completed') $badge = 'bg-success';
                                    elseif ($st == 'cancelled') $badge = 'bg-danger';
                                ?>
                                <span class="badge <?= $badge ?>"><?= ucfirst(str_replace('_', ' ', $st)) ?></span>
                            </td>
                            <td class="text-end pe-3">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= admin_url('appointments/view/'.$s->id) ?>" class="btn btn-outline-primary" title="View Details"><i class="fas fa-eye"></i></a>
                                    <?php if ($s->status != 'completed' && $s->status != 'cancelled'): ?>
                                        <a href="<?= admin_url('pos?appointment_id='.$s->id) ?>" class="btn btn-outline-success" title="Checkout / Invoice"><i class="fas fa-cash-register"></i></a>
                                    <?php endif; ?>
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
