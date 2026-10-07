<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-regular fa-clock text-primary me-2"></i> Weekly Work Schedules</h4>
        <p class="text-muted mb-0">Define shift start/end hours and days off for staff members to prevent booking overlaps.</p>
    </div>
</div>

<div class="row g-4">
    <!-- Staff Selector List -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom">
                <h6 class="fw-bold mb-0">Select Staff Member</h6>
            </div>
            <div class="list-group list-group-flush">
                <?php foreach ($all_staff as $s): ?>
                    <a href="<?= admin_url('staff/schedules?staff_id=' . $s->id) ?>" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 <?= ($current_staff && $current_staff->id == $s->id) ? 'active' : '' ?>">
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold">
                                <?= strtoupper(substr($s->name, 0, 1)) ?>
                            </div>
                            <div>
                                <div class="fw-semibold"><?= html_escape($s->name) ?></div>
                                <small class="text-muted"><?= ucfirst($s->role_type) ?></small>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-right fs-12px"></i>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Schedules Form -->
    <div class="col-md-8">
        <?php if ($current_staff): ?>
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0">Work Hours: <?= html_escape($current_staff->name) ?> (<?= ucfirst($current_staff->role_type) ?>)</h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?= admin_url('staff/schedules') ?>" method="POST">
                        <input type="hidden" name="staff_id" value="<?= $current_staff->id ?>">

                        <div class="table-responsive mb-4">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-3">Day of Week</th>
                                        <th>Shift Start</th>
                                        <th>Shift End</th>
                                        <th class="text-center pe-3">Day Off</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($schedules as $sched): ?>
                                        <tr>
                                            <td class="ps-3 fw-semibold text-dark"><?= $sched->day_of_week ?></td>
                                            <td>
                                                <input type="time" name="schedule[<?= $sched->id ?>][start_time]" class="form-control form-control-sm" value="<?= date('H:i', strtotime($sched->start_time)) ?>">
                                            </td>
                                            <td>
                                                <input type="time" name="schedule[<?= $sched->id ?>][end_time]" class="form-control form-control-sm" value="<?= date('H:i', strtotime($sched->end_time)) ?>">
                                            </td>
                                            <td class="text-center pe-3">
                                                <div class="form-check form-switch d-inline-block">
                                                    <input class="form-check-input" type="checkbox" name="schedule[<?= $sched->id ?>][is_day_off]" value="1" <?= $sched->is_day_off ? 'checked' : '' ?>>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">Save Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
