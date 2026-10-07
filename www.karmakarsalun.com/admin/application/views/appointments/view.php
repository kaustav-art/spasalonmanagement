<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1">
            <i class="fa-regular fa-calendar-check text-primary me-2"></i> 
            Appointment <?= html_escape($appointment->appointment_number) ?>
        </h4>
        <p class="text-muted mb-0">Scheduled for <?= date('l, d F Y', strtotime($appointment->booking_date)) ?> at <?= date('h:i A', strtotime($appointment->start_time)) ?></p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <div class="d-flex align-items-center justify-content-md-end gap-2">
            <a href="<?= admin_url('appointments') ?>" class="btn btn-outline-secondary">
                <i class="fa-solid fa-arrow-left me-1"></i> Back
            </a>
            <?php if (!in_array($appointment->status, array('completed', 'cancelled'))): ?>
                <a href="<?= admin_url('pos?appointment_id=' . $appointment->id) ?>" class="btn btn-success shadow-sm fw-semibold">
                    <i class="fa-solid fa-cash-register me-1"></i> Checkout in POS
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Left Column: Appointment Info & Services -->
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-0">Booked Services</h5>
                <div><?= appointment_status_badge($appointment->status) ?></div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Service</th>
                                <th>Duration</th>
                                <th>Tax</th>
                                <th class="text-end pe-4">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $srv): ?>
                                <tr>
                                    <td class="ps-4 fw-semibold text-dark"><?= html_escape($srv->service_name) ?></td>
                                    <td><i class="fa-regular fa-clock me-1 text-muted"></i> <?= $srv->duration ?> mins</td>
                                    <td class="text-muted"><?= format_currency($srv->tax) ?></td>
                                    <td class="text-end pe-4 fw-bold"><?= format_currency($srv->price) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot class="table-light border-top">
                            <tr>
                                <th colspan="3" class="text-end">Subtotal:</th>
                                <th class="text-end pe-4"><?= format_currency($appointment->subtotal) ?></th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-end">Tax (VAT/Sales):</th>
                                <th class="text-end pe-4"><?= format_currency($appointment->tax_amount) ?></th>
                            </tr>
                            <tr class="fs-15px">
                                <th colspan="3" class="text-end text-primary">Final Total:</th>
                                <th class="text-end pe-4 text-primary fw-bold"><?= format_currency($appointment->final_amount) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <?php if ($appointment->notes): ?>
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-2"><i class="fa-regular fa-comment-dots text-primary me-1"></i> Client Preferences / Notes:</h6>
                    <p class="text-muted mb-0"><?= nl2br(html_escape($appointment->notes)) ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Right Column: Customer & Status Actions -->
    <div class="col-lg-4">
        <!-- Customer Card -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 border-bottom">
                <h6 class="fw-bold mb-0"><i class="fa-regular fa-user text-primary me-1"></i> Customer Profile</h6>
            </div>
            <div class="card-body p-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="avatar avatar-lg rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-4">
                        <?= strtoupper(substr($appointment->customer_name, 0, 1)) ?>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0 text-dark"><?= html_escape($appointment->customer_name) ?></h5>
                        <span class="text-muted fs-13px">Client ID: #<?= $appointment->customer_id ?></span>
                    </div>
                </div>

                <ul class="list-unstyled mb-0 fs-14px">
                    <li class="py-2 border-bottom d-flex justify-content-between">
                        <span class="text-muted"><i class="fa-solid fa-phone me-1"></i> Phone:</span>
                        <a href="tel:<?= html_escape($appointment->customer_phone) ?>" class="text-decoration-none fw-semibold"><?= html_escape($appointment->customer_phone) ?></a>
                    </li>
                    <?php if ($appointment->customer_email): ?>
                        <li class="py-2 border-bottom d-flex justify-content-between">
                            <span class="text-muted"><i class="fa-regular fa-envelope me-1"></i> Email:</span>
                            <span class="fw-semibold"><?= html_escape($appointment->customer_email) ?></span>
                        </li>
                    <?php endif; ?>
                    <li class="py-2 d-flex justify-content-between">
                        <span class="text-muted">Booking Channel:</span>
                        <span class="badge bg-light text-dark border"><?= ucfirst($appointment->booking_source) ?></span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Workflow Status Transitions -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom">
                <h6 class="fw-bold mb-0"><i class="fa-solid fa-arrows-spin text-primary me-1"></i> Status Actions</h6>
            </div>
            <div class="card-body p-4">
                <div class="d-grid gap-2">
                    <?php if ($appointment->status === 'pending'): ?>
                        <a href="<?= admin_url('appointments/change_status/' . $appointment->id . '/confirmed') ?>" class="btn btn-success">
                            <i class="fa-solid fa-check me-1"></i> Confirm Appointment
                        </a>
                    <?php endif; ?>

                    <?php if (in_array($appointment->status, array('pending', 'confirmed'))): ?>
                        <a href="<?= admin_url('appointments/change_status/' . $appointment->id . '/in_service') ?>" class="btn btn-info text-white">
                            <i class="fa-solid fa-person-booth me-1"></i> Mark Client In-Service
                        </a>
                    <?php endif; ?>

                    <?php if ($appointment->status !== 'completed'): ?>
                        <a href="<?= admin_url('pos?appointment_id=' . $appointment->id) ?>" class="btn btn-primary">
                            <i class="fa-solid fa-cash-register me-1"></i> Complete & Collect Payment
                        </a>
                    <?php endif; ?>

                    <?php if (!in_array($appointment->status, array('completed', 'cancelled'))): ?>
                        <a href="<?= admin_url('appointments/change_status/' . $appointment->id . '/cancelled') ?>" class="btn btn-outline-danger" onclick="return confirm('Cancel this appointment?');">
                            <i class="fa-solid fa-ban me-1"></i> Cancel Booking
                        </a>
                    <?php endif; ?>
                </div>

                <?php if ($invoice): ?>
                    <div class="mt-4 pt-3 border-top text-center">
                        <span class="badge bg-success mb-2"><i class="fa-solid fa-check-double me-1"></i> Invoiced: <?= html_escape($invoice->invoice_number) ?></span>
                        <div class="d-flex gap-2">
                            <a href="<?= admin_url('sales/invoice/' . $invoice->id) ?>" class="btn btn-sm btn-outline-primary w-100">
                                <i class="fa-solid fa-print me-1"></i> Print Invoice
                            </a>
                            <a href="<?= admin_url('sales/receipt/' . $invoice->id) ?>" target="_blank" class="btn btn-sm btn-outline-dark w-100">
                                <i class="fa-solid fa-receipt me-1"></i> POS Receipt
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
