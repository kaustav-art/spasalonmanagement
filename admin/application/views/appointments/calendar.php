<!-- FullCalendar 5 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">

<style>
/* Conca Theme FullCalendar Scoped Styles */
.fc {
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
    --fc-border-color: var(--bs-border-color, #f0f0f4);
    --fc-today-bg-color: rgba(95, 74, 254, 0.05);
    --fc-page-bg-color: var(--bs-card-bg, #ffffff);
    --fc-event-resizer-thickness: 6px;
}
.fc .fc-toolbar {
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 20px;
}
.fc .fc-toolbar-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--bs-heading-color, #1a1a2e);
}
.fc .fc-button-primary {
    background-color: var(--bs-primary, #5F4AFE) !important;
    border-color: var(--bs-primary, #5F4AFE) !important;
    color: #fff !important;
    border-radius: 50rem !important;
    padding: 6px 16px !important;
    font-weight: 500 !important;
    font-size: 13px !important;
    box-shadow: none !important;
    transition: all 0.2s ease !important;
}
.fc .fc-button-primary:hover,
.fc .fc-button-primary:focus {
    background-color: #4b36e8 !important;
    border-color: #4b36e8 !important;
    transform: translateY(-1px);
}
.fc .fc-button-primary:disabled {
    background-color: #a59bfd !important;
    border-color: #a59bfd !important;
}
.fc .fc-button-primary.fc-button-active {
    background-color: #3824ca !important;
    border-color: #3824ca !important;
}
.fc .fc-col-header-cell {
    background-color: var(--bs-gray-100, #f8f9fa);
    padding: 12px 0 !important;
    font-weight: 600;
    font-size: 13px;
    color: var(--bs-gray-700, #4b5563);
    border-color: var(--bs-border-color, #f0f0f4) !important;
}
.fc .fc-daygrid-day-number {
    font-weight: 600;
    font-size: 13px;
    color: var(--bs-gray-600, #64748b);
    padding: 8px 10px;
}
.fc .fc-daygrid-day.fc-day-today .fc-daygrid-day-number {
    color: var(--bs-primary, #5F4AFE);
    font-weight: 700;
}
.fc-theme-standard td, .fc-theme-standard th {
    border-color: var(--bs-border-color, #f0f0f4) !important;
}
.fc-event {
    border-radius: 8px !important;
    padding: 3px 6px !important;
    font-size: 12px !important;
    font-weight: 500 !important;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0,0,0,0.06);
    border: none !important;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
}
.fc-event:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.12);
}
.fc-event-title {
    font-weight: 600;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.timeline-item-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
    flex-shrink: 0;
}
</style>

<!-- Page Header -->
<div class="page-header pb-7 d-flex flex-wrap align-items-center justify-content-between gap-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1 fz-12px">
                <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= admin_url('appointments') ?>" class="text-decoration-none">Appointments</a></li>
                <li class="breadcrumb-item active" aria-current="page">Calendar</li>
            </ol>
        </nav>
        <h2 class="fw-semibold fs-7 mb-1 text-dark">Schedule & Sessions Calendar</h2>
        <p class="text-custom-paragraph fz-13px mb-0">Visual monthly, weekly, and daily timeline across specialists and stations.</p>
    </div>
    <div class="d-flex flex-wrap align-items-center gap-2">
        <a href="<?= admin_url('appointments/create') ?>" class="btn btn-primary rounded-pill shadow-custom d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-calendar-plus"></i>
            <span>New Booking</span>
        </a>
        <a href="<?= admin_url('appointments') ?>" class="btn btn-outline-secondary rounded-pill d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-list"></i>
            <span>List View</span>
        </a>
        <a href="<?= admin_url('appointments/walkins') ?>" class="btn btn-outline-success rounded-pill d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-person-walking"></i>
            <span>Live Queue</span>
        </a>
    </div>
</div>

<!-- Schedule KPI Metrics Strip -->
<div class="row g-3 mb-6">
    <div class="col-xl-3 col-sm-6">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body p-5 d-flex align-items-center gap-3">
                <div class="btn-icon bg-label-primary rounded-pill btn-lg flex-shrink-0">
                    <i class="fa-solid fa-calendar-day fs-5"></i>
                </div>
                <div>
                    <span class="fz-12px text-muted fw-medium d-block">Today's Sessions</span>
                    <h3 class="fs-9 h6 mb-0 fw-bold text-dark"><?= $today_count ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body p-5 d-flex align-items-center gap-3">
                <div class="btn-icon bg-label-success rounded-pill btn-lg flex-shrink-0">
                    <i class="fa-solid fa-calendar-check fs-5"></i>
                </div>
                <div>
                    <span class="fz-12px text-muted fw-medium d-block">Confirmed Upcoming</span>
                    <h3 class="fs-9 h6 mb-0 fw-bold text-dark"><?= $confirmed_count ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body p-5 d-flex align-items-center gap-3">
                <div class="btn-icon bg-label-warning rounded-pill btn-lg flex-shrink-0">
                    <i class="fa-solid fa-clock-rotate-left fs-5"></i>
                </div>
                <div>
                    <span class="fz-12px text-muted fw-medium d-block">Pending Action</span>
                    <h3 class="fs-9 h6 mb-0 fw-bold text-dark"><?= $pending_count ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body p-5 d-flex align-items-center gap-3">
                <div class="btn-icon bg-label-info rounded-pill btn-lg flex-shrink-0">
                    <i class="fa-solid fa-user-tie fs-5"></i>
                </div>
                <div>
                    <span class="fz-12px text-muted fw-medium d-block">Active Specialists</span>
                    <h3 class="fs-9 h6 mb-0 fw-bold text-dark"><?= $active_staff_count ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Calendar Layout -->
<div class="row g-4">
    <!-- Left Sidebar: Filters & Today's Agenda -->
    <div class="col-xl-3 col-lg-4">
        <!-- Filter Card -->
        <div class="card shadow-custom rounded-custom mb-4">
            <div class="card-body p-5">
                <h5 class="h6 mb-3 fw-semibold text-dark d-flex align-items-center gap-2">
                    <i class="fa-solid fa-filter text-primary"></i>
                    <span>Schedule Filters</span>
                </h5>
                <form action="<?= admin_url('appointments/calendar') ?>" method="GET">
                    <!-- Specialist Filter -->
                    <div class="mb-3">
                        <label class="form-label fz-12px fw-medium text-muted mb-1">Specialist / Staff</label>
                        <select name="staff_id" class="form-select form-select-sm rounded-3">
                            <option value="">All Specialists</option>
                            <?php foreach ($staff_members as $sm): ?>
                                <option value="<?= $sm->id ?>" <?= ($selected_staff == $sm->id) ? 'selected' : '' ?>>
                                    <?= html_escape($sm->name) ?> (<?= html_escape(ucfirst($sm->role_type)) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div class="mb-3">
                        <label class="form-label fz-12px fw-medium text-muted mb-1">Booking Status</label>
                        <select name="status" class="form-select form-select-sm rounded-3">
                            <option value="">All Active Statuses</option>
                            <option value="confirmed" <?= ($selected_status === 'confirmed') ? 'selected' : '' ?>>Confirmed</option>
                            <option value="in_service" <?= ($selected_status === 'in_service') ? 'selected' : '' ?>>In Service</option>
                            <option value="pending" <?= ($selected_status === 'pending') ? 'selected' : '' ?>>Pending</option>
                            <option value="completed" <?= ($selected_status === 'completed') ? 'selected' : '' ?>>Completed</option>
                            <option value="cancelled" <?= ($selected_status === 'cancelled') ? 'selected' : '' ?>>Cancelled</option>
                        </select>
                    </div>

                    <!-- Room Filter (if spa enabled) -->
                    <?php if (is_spa_enabled() && !empty($rooms)): ?>
                        <div class="mb-3">
                            <label class="form-label fz-12px fw-medium text-muted mb-1">Treatment Room</label>
                            <select name="room_id" class="form-select form-select-sm rounded-3">
                                <option value="">All Rooms</option>
                                <?php foreach ($rooms as $rm): ?>
                                    <option value="<?= $rm->id ?>" <?= ($selected_room == $rm->id) ? 'selected' : '' ?>>
                                        <?= html_escape($rm->room_name) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-sm btn-primary rounded-pill flex-grow-1">
                            Apply Filter
                        </button>
                        <a href="<?= admin_url('appointments/calendar') ?>" class="btn btn-sm btn-outline-secondary rounded-pill">
                            Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Color Legend Card -->
        <div class="card shadow-custom rounded-custom mb-4">
            <div class="card-body p-5">
                <h5 class="h6 mb-3 fw-semibold text-dark d-flex align-items-center gap-2">
                    <i class="fa-solid fa-palette text-primary"></i>
                    <span>Status Legend</span>
                </h5>
                <div class="d-flex flex-column gap-2 fz-13px">
                    <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-light">
                        <div class="d-flex align-items-center gap-2">
                            <span class="timeline-item-dot" style="background-color: #10b981;"></span>
                            <span class="fw-medium text-dark">Confirmed</span>
                        </div>
                        <span class="badge badge-label-success rounded-pill fz-11px">Scheduled</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-light">
                        <div class="d-flex align-items-center gap-2">
                            <span class="timeline-item-dot" style="background-color: #06b6d4;"></span>
                            <span class="fw-medium text-dark">In Service</span>
                        </div>
                        <span class="badge badge-label-info rounded-pill fz-11px">Active</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-light">
                        <div class="d-flex align-items-center gap-2">
                            <span class="timeline-item-dot" style="background-color: #5F4AFE;"></span>
                            <span class="fw-medium text-dark">Completed</span>
                        </div>
                        <span class="badge badge-label-primary rounded-pill fz-11px">Finished</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-light">
                        <div class="d-flex align-items-center gap-2">
                            <span class="timeline-item-dot" style="background-color: #f59e0b;"></span>
                            <span class="fw-medium text-dark">Pending</span>
                        </div>
                        <span class="badge badge-label-warning rounded-pill fz-11px">Action</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between p-2 rounded-2 bg-light">
                        <div class="d-flex align-items-center gap-2">
                            <span class="timeline-item-dot" style="background-color: #ef4444;"></span>
                            <span class="fw-medium text-dark">Cancelled</span>
                        </div>
                        <span class="badge badge-label-danger rounded-pill fz-11px">Void</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Today's Schedule Agenda Mini Card -->
        <div class="card shadow-custom rounded-custom">
            <div class="card-body p-5">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="h6 mb-0 fw-semibold text-dark d-flex align-items-center gap-2">
                        <i class="fa-regular fa-clock text-primary"></i>
                        <span>Today's Sessions</span>
                    </h5>
                    <span class="badge badge-label-primary rounded-pill fz-11px"><?= count($today_schedule) ?></span>
                </div>

                <?php if (!empty($today_schedule)): ?>
                    <div class="d-flex flex-column gap-3">
                        <?php foreach ($today_schedule as $ts): ?>
                            <a href="<?= admin_url('appointments/view/' . $ts->id) ?>" class="text-decoration-none p-3 rounded-3 border hover-bg-light d-block transition-all">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <span class="fw-semibold text-dark fz-13px"><?= html_escape($ts->customer_name ?: 'Walk-in') ?></span>
                                    <span class="badge badge-label-primary rounded-pill fz-11px">
                                        <?= date('h:i A', strtotime($ts->start_time)) ?>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted fz-12px">
                                    <span><i class="fa-regular fa-user me-1"></i> <?= html_escape($ts->staff_name ?: 'Specialist') ?></span>
                                    <?= appointment_status_badge($ts->status) ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-4 text-muted fz-13px">
                        <i class="fa-regular fa-calendar-check fs-4 d-block mb-1 text-muted"></i>
                        No appointments scheduled for today.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Right Main Column: FullCalendar Container -->
    <div class="col-xl-9 col-lg-8">
        <div class="card shadow-custom rounded-custom">
            <div class="card-body p-6">
                <!-- Calendar Mount Element -->
                <div id="scheduleCalendar"></div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Event Details Modal -->
<div class="modal fade" id="calendarDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-custom">
            <div class="modal-header border-bottom py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge badge-label-primary rounded-pill" id="modalAptNum">APT-00000</span>
                    <span id="modalAptStatusBadge"></span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="avatar avatar-lg rounded-circle bg-label-primary text-primary fw-bold d-flex align-items-center justify-content-center" style="width:48px;height:48px;font-size:1.2rem;" id="modalAvatarInit">
                        C
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold text-dark" id="modalCustomerName">Customer Name</h5>
                        <div class="text-muted fz-13px" id="modalCustomerPhone"><i class="fa-solid fa-phone me-1"></i> 000-0000</div>
                    </div>
                </div>

                <div class="p-3 bg-light rounded-3 mb-4">
                    <div class="row g-2 fz-13px">
                        <div class="col-6">
                            <span class="text-muted d-block fz-11px">SCHEDULED TIME</span>
                            <span class="fw-semibold text-dark" id="modalTimeSlot">10:00 AM - 11:00 AM</span>
                        </div>
                        <div class="col-6">
                            <span class="text-muted d-block fz-11px">DATE</span>
                            <span class="fw-semibold text-dark" id="modalDateFormatted">Today</span>
                        </div>
                        <div class="col-6 mt-2">
                            <span class="text-muted d-block fz-11px">ASSIGNED SPECIALIST</span>
                            <span class="fw-semibold text-dark" id="modalStaffName">Specialist</span>
                        </div>
                        <div class="col-6 mt-2">
                            <span class="text-muted d-block fz-11px">TOTAL AMOUNT</span>
                            <span class="fw-bold text-primary" id="modalAmount">$0.00</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-2">
                    <a href="#" class="btn btn-primary rounded-pill flex-grow-1" id="modalViewDetailsBtn">
                        <i class="fa-regular fa-eye me-1"></i> View Full Details
                    </a>
                    <a href="#" class="btn btn-success rounded-pill flex-grow-1" id="modalPosCheckoutBtn">
                        <i class="fa-solid fa-cash-register me-1"></i> Checkout (POS)
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FullCalendar 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('scheduleCalendar');
    var detailModalEl = document.getElementById('calendarDetailModal');
    var detailModal = new bootstrap.Modal(detailModalEl);

    var rawEvents = <?= $events_json ?>;

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
            today: 'Today',
            month: 'Month',
            week: 'Week',
            day: 'Day'
        },
        themeSystem: 'standard',
        events: rawEvents,
        nowIndicator: true,
        editable: false,
        selectable: true,
        dayMaxEvents: 3,
        navLinks: true,
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            meridiem: 'short'
        },
        dateClick: function(info) {
            // Quick click on empty date slot to book on that day
            if (confirm('Schedule a new appointment on ' + info.dateStr + '?')) {
                window.location.href = '<?= admin_url("appointments/create?date=") ?>' + info.dateStr;
            }
        },
        eventClick: function(info) {
            info.jsEvent.preventDefault();
            var props = info.event.extendedProps;

            // Populate Modal Fields
            document.getElementById('modalAptNum').innerText = props.appointment_number || ('APT #' + info.event.id);
            document.getElementById('modalCustomerName').innerText = props.customer_name || 'Customer';
            document.getElementById('modalCustomerPhone').innerHTML = '<i class="fa-solid fa-phone me-1"></i> ' + (props.customer_phone || 'No phone provided');
            document.getElementById('modalAvatarInit').innerText = (props.customer_name ? props.customer_name.charAt(0).toUpperCase() : 'C');
            document.getElementById('modalTimeSlot').innerText = props.time_slot || '';
            document.getElementById('modalDateFormatted').innerText = props.date_formatted || '';
            document.getElementById('modalStaffName').innerText = props.staff_name || 'Any Specialist';
            document.getElementById('modalAmount').innerText = props.amount || '$0.00';

            // Status Badge
            var badgeColor = 'primary';
            if (props.status === 'confirmed') badgeColor = 'success';
            else if (props.status === 'in_service') badgeColor = 'info';
            else if (props.status === 'pending') badgeColor = 'warning';
            else if (props.status === 'cancelled') badgeColor = 'danger';

            document.getElementById('modalAptStatusBadge').innerHTML = '<span class="badge badge-label-' + badgeColor + ' rounded-pill text-uppercase fz-11px">' + (props.status_label || props.status) + '</span>';

            // Links
            document.getElementById('modalViewDetailsBtn').href = props.view_url || '#';
            document.getElementById('modalPosCheckoutBtn').href = props.pos_url || '#';

            // Show Modal
            detailModal.show();
        }
    });

    calendar.render();
});
</script>
