<!-- Page Banner -->
<section class="py-5 text-center text-white" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?= template_asset('images/bg/slider-bg-01.jpg', 'template1') ?>') center/cover;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold" style="font-family: 'Prata', serif;">Reserve Your Appointment</h1>
        <p class="text-white-50 mb-0">Select your treatment, preferred artist, and instant time slot without waiting in line.</p>
    </div>
</section>

<section class="py-5" style="background: #121212; color: #fff;">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <!-- Booking Container Card -->
                <div class="card bg-dark border border-secondary border-opacity-50 text-white rounded-4 shadow-lg overflow-hidden">
                    <div class="card-header bg-black py-4 px-4 px-md-5 border-bottom border-secondary border-opacity-25 d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="fw-bold mb-1" style="font-family: 'Prata', serif;">Online Reservation Wizard</h4>
                            <p class="text-muted small mb-0">Live availability with real-time double-booking prevention.</p>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-2 fw-semibold">Step-by-Step</span>
                    </div>

                    <div class="card-body p-4 p-md-5">

                        <!-- Booking Form -->
                        <form id="bookingForm" onsubmit="submitBooking(event)">

                            <!-- Section 1: Choose Service & Staff -->
                            <div class="mb-4">
                                <h5 class="fw-bold text-warning border-bottom border-secondary border-opacity-25 pb-2 mb-3">
                                    <i class="fas fa-magic me-2"></i>1. Select Treatment & Specialist
                                </h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small">Choose Treatment / Service <span class="text-warning">*</span></label>
                                        <select name="service_id" id="service_id" class="form-select bg-black text-white border-secondary" required onchange="loadTimeSlots()">
                                            <option value="">Select a treatment...</option>
                                            <?php foreach ($services as $s): ?>
                                                <option value="<?= $s->id ?>" data-price="<?= $s->price ?>" data-duration="<?= $s->duration_minutes ?>" <?= (isset($_GET['service_id']) && $_GET['service_id'] == $s->id) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($s->name) ?> &mdash; <?= format_currency($s->price) ?> (<?= $s->duration_minutes ?>m)
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small">Select Preferred Specialist</label>
                                        <select name="staff_id" id="staff_id" class="form-select bg-black text-white border-secondary" onchange="loadTimeSlots()">
                                            <option value="0">Any Available Specialist</option>
                                            <?php foreach ($staff as $st): ?>
                                                <option value="<?= $st->id ?>" <?= (isset($_GET['staff_id']) && $_GET['staff_id'] == $st->id) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($st->name) ?> (<?= ucfirst($st->role_type) ?> &bull; <?= $st->rating ?>★)
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?php if (!empty($rooms)): ?>
                                    <div class="col-md-12">
                                        <label class="form-label text-muted small">Spa Treatment Suite (Optional)</label>
                                        <select name="room_id" id="room_id" class="form-select bg-black text-white border-secondary">
                                            <option value="0">Front Desk Assigned Suite</option>
                                            <?php foreach ($rooms as $rm): ?>
                                                <option value="<?= $rm->id ?>"><?= htmlspecialchars($rm->room_name) ?> (<?= htmlspecialchars($rm->room_type) ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Section 2: Date & Available Slots -->
                            <div class="mb-4">
                                <h5 class="fw-bold text-warning border-bottom border-secondary border-opacity-25 pb-2 mb-3">
                                    <i class="far fa-calendar-alt me-2"></i>2. Choose Appointment Date & Time
                                </h5>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small">Date of Visit <span class="text-warning">*</span></label>
                                        <input type="date" name="booking_date" id="booking_date" class="form-control bg-black text-white border-secondary" value="<?= isset($_GET['date']) ? htmlspecialchars($_GET['date']) : date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" required onchange="loadTimeSlots()">
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end">
                                        <button type="button" class="btn btn-outline-secondary text-white w-100" onclick="loadTimeSlots()">
                                            <i class="fas fa-sync-alt me-1"></i>Refresh Available Slots
                                        </button>
                                    </div>
                                </div>

                                <label class="form-label text-muted small mb-2">Available Time Slots for Selected Date:</label>
                                <input type="hidden" name="start_time" id="selected_start_time" required>
                                <div id="slotsContainer" class="p-3 rounded bg-black border border-secondary border-opacity-25 d-flex flex-wrap gap-2 min-vh-10 align-items-center">
                                    <span class="text-muted small"><i class="fas fa-spinner fa-spin me-2"></i>Select a treatment and date to view open time slots...</span>
                                </div>
                                <div id="slotError" class="text-danger small mt-2 d-none">Please select a time slot to proceed.</div>
                            </div>

                            <!-- Section 3: Client Details -->
                            <div class="mb-4">
                                <h5 class="fw-bold text-warning border-bottom border-secondary border-opacity-25 pb-2 mb-3">
                                    <i class="far fa-user me-2"></i>3. Your Contact Details
                                </h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small">Full Name <span class="text-warning">*</span></label>
                                        <input type="text" name="name" id="cust_name" class="form-control bg-black text-white border-secondary" placeholder="e.g. Jane Doe" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small">Phone Number <span class="text-warning">*</span></label>
                                        <input type="tel" name="phone" id="cust_phone" class="form-control bg-black text-white border-secondary" placeholder="+1 (555) 000-0000" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small">Email Address</label>
                                        <input type="email" name="email" id="cust_email" class="form-control bg-black text-white border-secondary" placeholder="jane@example.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted small">Special Requests / Notes</label>
                                        <input type="text" name="notes" id="cust_notes" class="form-control bg-black text-white border-secondary" placeholder="Allergies, preferences, etc.">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="border-top border-secondary border-opacity-25 pt-4 text-end">
                                <button type="submit" id="submitBtn" class="btn btn-gold btn-lg px-5 py-3 fs-6">
                                    <i class="fas fa-check-circle me-2"></i>Confirm & Complete Booking
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border border-warning text-white">
            <div class="modal-header border-secondary border-opacity-25">
                <h5 class="modal-title fw-bold text-warning" style="font-family: 'Prata', serif;">
                    <i class="fas fa-calendar-check me-2"></i>Booking Confirmed!
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <div class="avatar-lg bg-warning-subtle text-warning rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                    <i class="fas fa-check fa-2x"></i>
                </div>
                <h4 class="fw-bold mb-1" id="modalBookingCode">#APT-2026-0000</h4>
                <span class="badge bg-success mb-3" id="modalBookingStatus">Confirmed</span>
                <p class="text-muted small" id="modalBookingMsg">Your appointment has been successfully recorded in our system.</p>

                <div class="p-3 rounded bg-black border border-secondary border-opacity-25 text-start small mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Treatment:</span>
                        <span class="fw-bold text-white" id="modalService"></span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Date:</span>
                        <span class="fw-bold text-white" id="modalDate"></span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Time Window:</span>
                        <span class="fw-bold text-warning" id="modalTime"></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Estimated Total:</span>
                        <span class="fw-bold text-success fs-6" id="modalTotal"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-secondary border-opacity-25">
                <a href="<?= website_url() ?>" class="btn btn-outline-light btn-sm">Return Home</a>
                <button type="button" class="btn btn-gold btn-sm" onclick="window.print()">Print Details</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadTimeSlots();
});

function loadTimeSlots() {
    var svc = document.getElementById('service_id').value;
    var staff = document.getElementById('staff_id').value;
    var date = document.getElementById('booking_date').value;
    var container = document.getElementById('slotsContainer');

    if (!svc || !date) {
        container.innerHTML = '<span class="text-muted small">Please select a service and date above to load available time slots.</span>';
        return;
    }

    container.innerHTML = '<span class="text-muted small"><i class="fas fa-spinner fa-spin me-2"></i>Checking live schedule availability...</span>';

    fetch('<?= website_url("booking/get_slots") ?>?service_id=' + svc + '&staff_id=' + staff + '&date=' + date)
        .then(r => r.json())
        .then(data => {
            if (data.status === 'success' && data.slots.length > 0) {
                var html = '';
                var hasAvailable = false;
                data.slots.forEach(slot => {
                    if (slot.available) {
                        hasAvailable = true;
                        html += '<button type="button" class="btn btn-outline-secondary text-white btn-sm px-3 slot-btn" onclick="selectSlot(\'' + slot.time + '\', this)">' + slot.label + '</button>';
                    } else {
                        html += '<button type="button" class="btn btn-dark text-muted btn-sm px-3" disabled style="opacity: 0.35;">' + slot.label + '</button>';
                    }
                });

                if (!hasAvailable) {
                    html = '<span class="text-warning small"><i class="fas fa-exclamation-triangle me-1"></i>All slots are booked for this date and specialist. Please try another date or therapist.</span>';
                }
                container.innerHTML = html;
            } else {
                container.innerHTML = '<span class="text-muted small">No slots found for this date. Store is closed or fully booked.</span>';
            }
        })
        .catch(err => {
            container.innerHTML = '<span class="text-danger small">Error checking time slots. Please try again.</span>';
        });
}

function selectSlot(time, btn) {
    document.getElementById('selected_start_time').value = time;
    document.querySelectorAll('.slot-btn').forEach(b => {
        b.classList.remove('btn-gold');
        b.classList.add('btn-outline-secondary', 'text-white');
    });
    btn.classList.remove('btn-outline-secondary', 'text-white');
    btn.classList.add('btn-gold');
    document.getElementById('slotError').classList.add('d-none');
}

function submitBooking(e) {
    e.preventDefault();
    var slot = document.getElementById('selected_start_time').value;
    if (!slot) {
        document.getElementById('slotError').classList.remove('d-none');
        document.getElementById('slotsContainer').scrollIntoView({ behavior: 'smooth' });
        return;
    }

    var submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing Reservation...';

    var form = document.getElementById('bookingForm');
    var formData = new FormData(form);

    fetch('<?= website_url("booking/submit") ?>', {
        method: 'POST',
        body: formData
    })
    .then(r => r.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-check-circle me-2"></i>Confirm & Complete Booking';

        if (data.status === 'success') {
            document.getElementById('modalBookingCode').innerText = '#' + data.booking_code;
            document.getElementById('modalBookingStatus').innerText = data.booking_status;
            document.getElementById('modalBookingMsg').innerText = data.message;
            document.getElementById('modalService').innerText = data.service_name;
            document.getElementById('modalDate').innerText = data.date;
            document.getElementById('modalTime').innerText = data.time;
            document.getElementById('modalTotal').innerText = data.total;

            var modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            modal.show();
            form.reset();
            document.getElementById('selected_start_time').value = '';
            loadTimeSlots();
        } else {
            alert(data.message || 'An error occurred during booking. Please try again.');
        }
    })
    .catch(err => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-check-circle me-2"></i>Confirm & Complete Booking';
        alert('Server connection error. Please try again.');
    });
}
</script>
