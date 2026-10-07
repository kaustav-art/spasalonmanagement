<div class="row align-items-center mb-4">
    <div class="col-md-8">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-calendar-plus text-primary me-2"></i> Schedule New Appointment</h4>
        <p class="text-muted mb-0">Book a customer service session with instant scheduling and checkout workflow.</p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('appointments') ?>" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Appointments
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xl-9 col-lg-11">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold mb-0">Appointment Details</h5>
            </div>
            <div class="card-body p-4 p-md-5">
                <form action="<?= admin_url('appointments/create') ?>" method="POST" id="aptForm">
                    <!-- Customer Information Section -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark fs-15px">1. Customer Information</label>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Select Existing Client</label>
                                <select name="customer_id" id="customer_id" class="form-select">
                                    <option value="">-- Choose Existing Customer --</option>
                                    <?php foreach ($customers as $c): ?>
                                        <option value="<?= $c->id ?>"><?= html_escape($c->name) ?> (<?= html_escape($c->phone) ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border">
                                    <div class="fw-semibold text-dark fs-13px mb-2"><i class="fa-solid fa-user-plus text-primary me-1"></i> Or Quick Add New Client:</div>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <input type="text" name="new_customer_name" class="form-control form-control-sm" placeholder="Full Name">
                                        </div>
                                        <div class="col-6">
                                            <input type="tel" name="new_customer_phone" class="form-control form-control-sm" placeholder="Phone Number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Service Selection Section -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark fs-15px">2. Service Selection</label>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Select Service <span class="text-danger">*</span></label>
                                <select name="service_id" id="service_id" class="form-select" required>
                                    <option value="">-- Choose Service --</option>
                                    <?php foreach ($services as $srv): ?>
                                        <option value="<?= $srv->id ?>" data-price="<?= $srv->price ?>" data-duration="<?= $srv->duration ?>">
                                            <?= html_escape($srv->name) ?> - <?= format_currency($srv->price) ?> (<?= $srv->duration ?> mins)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Booking Channel / Source</label>
                                <select name="booking_source" class="form-select">
                                    <option value="admin" selected>Front Desk / Admin</option>
                                    <option value="walk_in">Walk-in Client</option>
                                    <option value="online">Online Web Reservation</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Date & Time Section -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark fs-15px">3. Schedule Time</label>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Date <span class="text-danger">*</span></label>
                                <input type="date" name="booking_date" class="form-control" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Start Time <span class="text-danger">*</span></label>
                                <select name="start_time" class="form-select" required>
                                    <?php
                                    $open = strtotime('09:00');
                                    $close = strtotime('19:30');
                                    for ($t = $open; $t <= $close; $t += (30 * 60)) {
                                        $val = date('H:i:s', $t);
                                        $lbl = date('h:i A', $t);
                                        echo "<option value='{$val}'>{$lbl}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Special Requests / Client Notes</label>
                                <textarea name="notes" class="form-control" rows="2" placeholder="e.g. Scalp sensitivity, allergic to lavender, prefers chamomile tea..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="<?= admin_url('appointments') ?>" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">
                            <i class="fa-solid fa-calendar-check me-1"></i> Confirm & Book Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
