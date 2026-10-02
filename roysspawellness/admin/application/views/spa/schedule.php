<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-calendar-alt text-primary me-2"></i>Spa Room Schedule</h4>
        <p class="text-muted mb-0">Visual occupancy grid & conflict prevention across private spa treatment rooms.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <form method="GET" action="<?= admin_url('spa/schedule') ?>" class="d-inline-flex align-items-center gap-2">
            <?php 
                $prev_date = date('Y-m-d', strtotime($today . ' -1 day'));
                $next_date = date('Y-m-d', strtotime($today . ' +1 day'));
            ?>
            <a href="<?= admin_url('spa/schedule?date='.$prev_date) ?>" class="btn btn-outline-secondary btn-sm" title="Previous Day"><i class="fas fa-chevron-left"></i></a>
            <input type="date" name="date" class="form-control form-control-sm" value="<?= htmlspecialchars($today) ?>" onchange="this.form.submit()">
            <a href="<?= admin_url('spa/schedule?date='.$next_date) ?>" class="btn btn-outline-secondary btn-sm" title="Next Day"><i class="fas fa-chevron-right"></i></a>
            <a href="<?= admin_url('spa/schedule?date='.date('Y-m-d')) ?>" class="btn btn-primary btn-sm">Today</a>
        </form>
        <a href="<?= admin_url('appointments/create') ?>" class="btn btn-success btn-sm ms-2">
            <i class="fas fa-plus me-1"></i>New Spa Booking
        </a>
    </div>
</div>

<!-- Room Grid Overview Cards -->
<div class="row g-3 mb-4">
    <?php foreach ($rooms as $room): 
        // Count bookings for this room today
        $room_bookings = array_filter($bookings, function($b) use ($room) {
            return $b->room_id == $room->id;
        });
        $count = count($room_bookings);
    ?>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="badge bg-primary-subtle text-primary fw-semibold px-2 py-1">Room <?= htmlspecialchars($room->room_number) ?></span>
                    <span class="badge <?= $count > 0 ? 'bg-info' : 'bg-success' ?>"><?= $count ?> Bookings</span>
                </div>
                <h6 class="fw-bold mb-1"><?= htmlspecialchars($room->room_name) ?></h6>
                <div class="small text-muted mb-2"><i class="fas fa-tag me-1"></i><?= htmlspecialchars($room->room_type) ?> &bull; Cap: <?= $room->capacity ?></div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= min(100, $count * 20) ?>%"></div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Visual Schedule Timeline -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0"><i class="fas fa-clock text-primary me-2"></i>Schedule Timeline for <?= date('l, F j, Y', strtotime($today)) ?></h6>
        <div class="d-flex align-items-center gap-3 small">
            <span><i class="fas fa-circle text-primary me-1"></i> Confirmed/Pending</span>
            <span><i class="fas fa-circle text-warning me-1"></i> In Service</span>
            <span><i class="fas fa-circle text-success me-1"></i> Completed</span>
        </div>
    </div>
    <div class="card-body p-0">
        <?php if (empty($rooms)): ?>
            <div class="p-4 text-center text-muted">
                No active treatment rooms found. <a href="<?= admin_url('spa/rooms') ?>">Add rooms here</a>.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0" style="min-width: 900px;">
                    <thead class="table-light text-center small">
                        <tr>
                            <th style="width: 180px;" class="text-start ps-3">Room</th>
                            <?php 
                            $hours = array('09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00');
                            foreach ($hours as $h): 
                            ?>
                                <th><?= date('g A', strtotime($h)) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rooms as $room): ?>
                        <tr>
                            <td class="ps-3 fw-bold bg-light">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                        <i class="fas fa-door-open"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold"><?= htmlspecialchars($room->room_name) ?></div>
                                        <small class="text-muted">#<?= htmlspecialchars($room->room_number) ?></small>
                                    </div>
                                </div>
                            </td>
                            <?php 
                            foreach ($hours as $h): 
                                $slot_start = strtotime($today . ' ' . $h);
                                $slot_end = strtotime($today . ' ' . $h . ' +59 minutes');

                                // Check if room is booked during this hour slot
                                $active_slot_bookings = array();
                                foreach ($bookings as $b) {
                                    if ($b->room_id == $room->id) {
                                        $b_start = strtotime($today . ' ' . $b->start_time);
                                        $b_end = strtotime($today . ' ' . $b->end_time);
                                        if (($b_start <= $slot_end) && ($b_end >= $slot_start)) {
                                            $active_slot_bookings[] = $b;
                                        }
                                    }
                                }
                            ?>
                            <td class="p-1 text-center" style="vertical-align: middle; height: 75px;">
                                <?php if (!empty($active_slot_bookings)): ?>
                                    <?php foreach ($active_slot_bookings as $sb): 
                                        $badge_bg = 'bg-primary';
                                        if ($sb->status == 'in_service') $badge_bg = 'bg-warning text-dark';
                                        if ($sb->status == 'completed') $badge_bg = 'bg-success';
                                    ?>
                                        <div class="p-1 rounded <?= $badge_bg ?> text-white small text-start mb-1 shadow-xs" style="font-size: 11px; line-height: 1.2;">
                                            <a href="<?= admin_url('appointments/view/'.$sb->id) ?>" class="text-white text-decoration-none fw-bold d-block text-truncate">
                                                <?= htmlspecialchars($sb->customer_name ? $sb->customer_name : 'Guest') ?>
                                            </a>
                                            <div class="text-white-50 text-truncate" style="font-size: 10px;">
                                                <i class="fas fa-user-md me-1"></i><?= htmlspecialchars($sb->staff_name ? $sb->staff_name : 'Any') ?>
                                            </div>
                                            <div class="text-white-50" style="font-size: 10px;">
                                                <?= date('g:i A', strtotime($sb->start_time)) ?> - <?= date('g:i A', strtotime($sb->end_time)) ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <span class="text-muted opacity-25">&bull;</span>
                                <?php endif; ?>
                            </td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Detailed Daily Spa Bookings List -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="card-title fw-bold mb-0"><i class="fas fa-list-alt text-primary me-2"></i>Day's Room Appointments (<?= count($bookings) ?>)</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Code</th>
                        <th>Room</th>
                        <th>Time Window</th>
                        <th>Client</th>
                        <th>Therapist</th>
                        <th>Status</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($bookings)): ?>
                        <tr><td colspan="7" class="text-center py-4 text-muted">No room appointments booked for this date.</td></tr>
                    <?php else: ?>
                        <?php foreach ($bookings as $b): ?>
                        <tr>
                            <td class="ps-3 fw-bold"><a href="<?= admin_url('appointments/view/'.$b->id) ?>">#<?= htmlspecialchars($b->booking_code) ?></a></td>
                            <td><span class="badge bg-secondary"><i class="fas fa-door-open me-1"></i><?= htmlspecialchars($b->room_name ? $b->room_name : 'Unassigned') ?></span></td>
                            <td>
                                <div><i class="far fa-clock text-muted me-1"></i><?= date('g:i A', strtotime($b->start_time)) ?> &ndash; <?= date('g:i A', strtotime($b->end_time)) ?></div>
                            </td>
                            <td>
                                <div class="fw-semibold"><?= htmlspecialchars($b->customer_name ? $b->customer_name : 'Guest') ?></div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark"><i class="fas fa-spa text-primary me-1"></i><?= htmlspecialchars($b->staff_name ? $b->staff_name : 'Unassigned') ?></span>
                            </td>
                            <td>
                                <?php 
                                    $st = $b->status;
                                    $cls = 'bg-secondary';
                                    if ($st == 'confirmed') $cls = 'bg-primary';
                                    elseif ($st == 'in_service') $cls = 'bg-warning text-dark';
                                    elseif ($st == 'completed') $cls = 'bg-success';
                                    elseif ($st == 'cancelled') $cls = 'bg-danger';
                                ?>
                                <span class="badge <?= $cls ?>"><?= ucfirst(str_replace('_', ' ', $st)) ?></span>
                            </td>
                            <td class="text-end pe-3">
                                <a href="<?= admin_url('appointments/view/'.$b->id) ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> View</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
