
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <div class="card rounded-4 border-0 shadow-sm p-4 p-md-5" style="background: #faf8f5;">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-4 mb-4">
                        <div>
                            <h3 class="fw-bold mb-1" style="font-family: 'Prata', serif; color: #2d241e;">Online Reservation</h3>
                            <p class="text-muted small mb-0">Real-time availability directly synchronized with our concierge schedule.</p>
                        </div>
                        <span class="badge px-3 py-2 text-white rounded-pill" style="background: #b8865f;">Live Scheduling</span>
                    </div>

                    <form id="pureglowBookingForm" onsubmit="submitBooking(event)">

                        <!-- Step 1: Service -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3" style="color: #b8865f;">1. Select Ritual / Service</h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label text-muted small">Choose Ritual / Service <span class="text-danger">*</span></label>
                                    <select name="service_id" id="service_id" class="form-select" required onchange="loadTimeSlots()">
                                        <option value="">Select a treatment...</option>
                                        <?php foreach ($services as $s): ?>
                                            <option value="<?= $s->id ?>" data-price="<?= $s->price ?>" data-duration="<?= $s->duration_minutes ?>" <?= (isset($_GET['service_id']) && $_GET['service_id'] == $s->id) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($s->name) ?> &mdash; <?= format_currency($s->price) ?> (<?= $s->duration_minutes ?> mins)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <input type="hidden" name="staff_id" id="staff_id" value="0">
                                <input type="hidden" name="room_id" id="room_id" value="0">
                            </div>
                        </div>

                        <!-- Step 2: Date & Available Slots -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3" style="color: #b8865f;">2. Date & Time Window</h5>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small">Preferred Date <span class="text-danger">*</span></label>
                                    <input type="date" name="booking_date" id="booking_date" class="form-control" value="<?= isset($_GET['date']) ? htmlspecialchars($_GET['date']) : date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" required onchange="loadTimeSlots()">
                                </div>
                                <div class="col-md-6 d-flex align-items-end">
                                    <button type="button" class="btn btn-outline-secondary btn-sm w-100 py-2" onclick="loadTimeSlots()">
                                        <i class="fas fa-sync-alt me-1"></i>Check Real-Time Openings
                                    </button>
                                </div>
                            </div>

                            <label class="form-label text-muted small mb-2">Select an Open Time Slot:</label>
                            <input type="hidden" name="start_time" id="selected_start_time" required>
                            <div id="slotsContainer" class="p-3 rounded-3 bg-white border d-flex flex-wrap gap-2 align-items-center">
                                <span class="text-muted small">Please select a ritual and date above to load available time slots.</span>
                            </div>
                            <div id="slotError" class="text-danger small mt-2 d-none">Please select a time slot to proceed.</div>
                        </div>

                        <!-- Step 3: Guest Details -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3" style="color: #b8865f;">3. Guest Information</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="cust_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" id="cust_phone" class="form-control" placeholder="+1 (555) 000-0000" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small">Email Address</label>
                                    <input type="email" name="email" id="cust_email" class="form-control" placeholder="guest@example.com">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small">Special Preferences</label>
                                    <input type="text" name="notes" id="cust_notes" class="form-control" placeholder="Sensitivities, preferred oils, etc.">
                                </div>
                            </div>
                        </div>

                        <div class="text-end border-top pt-4">
                            <button type="submit" id="submitBtn" class="btn btn-pureglow btn-lg px-5 py-3">
                                Confirm Sanctuary Visit <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg text-center p-4">
            <div class="avatar-lg bg-warning-subtle text-warning rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                <i class="fas fa-check fa-2x" style="color: #b8865f;"></i>
            </div>
            <h3 class="fw-bold mb-1" style="font-family: 'Prata', serif; color: #2d241e;">Reservation Confirmed</h3>
            <h5 class="fw-bold mb-2" id="modalBookingCode" style="color: #b8865f;">#APT-2026-0000</h5>
            <span class="badge bg-success align-self-center px-3 py-1 mb-3" id="modalBookingStatus">Confirmed</span>
            <p class="text-muted small mb-4" id="modalBookingMsg">Your sanctuary appointment has been scheduled.</p>

            <div class="p-3 rounded-3 bg-light text-start small mb-4">
                <div class="d-flex justify-content-between mb-1">
                    <span class="text-muted">Ritual:</span>
                    <strong id="modalService"></strong>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <span class="text-muted">Date:</span>
                    <strong id="modalDate"></strong>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <span class="text-muted">Time Window:</span>
                    <strong id="modalTime" style="color: #b8865f;"></strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Estimated Total:</span>
                    <strong class="text-success fs-6" id="modalTotal"></strong>
                </div>
            </div>

            <div class="d-flex justify-content-center gap-2">
                <a href="<?= website_url() ?>" class="btn btn-outline-secondary btn-sm">Return Home</a>
                <button type="button" class="btn btn-pureglow btn-sm" onclick="window.print()">Print Details</button>
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
        container.innerHTML = '<span class="text-muted small">Please select a ritual and date above to load available time slots.</span>';
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
                        html += '<button type="button" class="btn btn-outline-secondary btn-sm px-3 slot-btn" onclick="selectSlot(\'' + slot.time + '\', this)">' + slot.label + '</button>';
                    } else {
                        html += '<button type="button" class="btn btn-light text-muted btn-sm px-3" disabled style="opacity: 0.35;">' + slot.label + '</button>';
                    }
                });

                if (!hasAvailable) {
                    html = '<span class="text-warning small"><i class="fas fa-exclamation-triangle me-1"></i>All slots are booked for this date. Please try another date.</span>';
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
        b.classList.remove('btn-pureglow', 'text-white');
        b.classList.add('btn-outline-secondary');
    });
    btn.classList.remove('btn-outline-secondary');
    btn.classList.add('btn-pureglow', 'text-white');
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
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Scheduling Visit...';

    var form = document.getElementById('pureglowBookingForm');
    var formData = new FormData(form);

    fetch('<?= website_url("booking/submit") ?>', {
        method: 'POST',
        body: formData
    })
    .then(r => r.json())
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Confirm Sanctuary Visit <i class="fas fa-arrow-right ms-2"></i>';

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
        submitBtn.innerHTML = 'Confirm Sanctuary Visit <i class="fas fa-arrow-right ms-2"></i>';
        alert('Server connection error. Please try again.');
    });
}
</script>
