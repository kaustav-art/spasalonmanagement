<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-regular fa-id-card text-primary me-2"></i> Client 360 Profile</h4>
        <p class="text-muted mb-0">Complete appointment history, billing record, and loyalty rewards balance.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('customers') ?>" class="btn btn-outline-secondary me-2">
            <i class="fa-solid fa-arrow-left me-1"></i> Back
        </a>
        <a href="<?= admin_url('customers/edit/' . $customer->id) ?>" class="btn btn-primary">
            <i class="fa-solid fa-pen-to-square me-1"></i> Edit Profile
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Customer Details Card -->
    <div class="col-lg-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4 text-center">
                <div class="avatar avatar-xl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-2 mx-auto mb-3">
                    <?= strtoupper(substr($customer->name, 0, 1)) ?>
                </div>
                <h4 class="fw-bold text-dark mb-1"><?= html_escape($customer->name) ?></h4>
                <div class="mb-3">
                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary px-3 py-1">
                        Active Client
                    </span>
                </div>

                <div class="p-3 bg-light rounded-3 mb-3 text-start fs-14px">
                    <div class="mb-2"><strong>Phone:</strong> <a href="tel:<?= html_escape($customer->phone) ?>" class="text-decoration-none"><?= html_escape($customer->phone) ?></a></div>
                    <div class="mb-2"><strong>Email:</strong> <?= html_escape($customer->email ? $customer->email : 'N/A') ?></div>
                    <div class="mb-2"><strong>Gender:</strong> <?= html_escape($customer->gender) ?></div>
                    <div class="mb-2"><strong>DOB:</strong> <?= $customer->dob ? date('d M Y', strtotime($customer->dob)) : 'N/A' ?></div>
                    <div><strong>Address:</strong> <?= html_escape($customer->address ? $customer->address : 'N/A') ?></div>
                </div>

                <!-- Loyalty Points Widget -->
                <div class="p-3 bg-warning bg-opacity-10 border border-warning rounded-3 text-center">
                    <span class="text-muted fs-13px fw-semibold">LOYALTY REWARD BALANCE</span>
                    <h2 class="fw-bold text-warning mb-0"><i class="fa-solid fa-star"></i> <?= $customer->loyalty_points ?> pts</h2>
                    <small class="text-muted">Earn 1 pt per <?= format_currency(10) ?> spent</small>
                </div>
            </div>
        </div>

        <?php if ($customer->notes): ?>
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-2"><i class="fa-regular fa-comment-dots text-primary me-1"></i> Special Client Preferences:</h6>
                    <p class="text-muted fs-14px mb-0"><?= nl2br(html_escape($customer->notes)) ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- History Tabs (Appointments & Invoices) -->
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-0">Visit History (<?= count($appointments) ?> Bookings)</h5>
                <a href="<?= admin_url('appointments/create') ?>" class="btn btn-xs btn-outline-primary">
                    <i class="fa-solid fa-plus me-1"></i> Book New
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Appt #</th>
                                <th>Date & Time</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($appointments)): ?>
                                <?php foreach ($appointments as $apt): ?>
                                    <tr>
                                        <td class="ps-4 fw-bold text-primary"><?= html_escape($apt->appointment_number) ?></td>
                                        <td><?= date('d M Y, h:i A', strtotime($apt->booking_date . ' ' . $apt->start_time)) ?></td>
                                        <td class="fw-bold"><?= format_currency($apt->final_amount) ?></td>
                                        <td><?= appointment_status_badge($apt->status) ?></td>
                                        <td class="text-end pe-4">
                                            <a href="<?= admin_url('appointments/view/' . $apt->id) ?>" class="btn btn-xs btn-outline-primary">View</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="text-center py-4 text-muted">No appointments recorded yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Invoices Record -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold mb-0">Invoices & Receipts (<?= count($invoices) ?>)</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Invoice #</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Receipt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($invoices)): ?>
                                <?php foreach ($invoices as $inv): ?>
                                    <tr>
                                        <td class="ps-4 fw-bold text-primary"><?= html_escape($inv->invoice_number) ?></td>
                                        <td><?= date('d M Y', strtotime($inv->invoice_date)) ?></td>
                                        <td class="fw-bold"><?= format_currency($inv->grand_total) ?></td>
                                        <td class="text-success"><?= format_currency($inv->paid_amount) ?></td>
                                        <td><?= payment_status_badge($inv->payment_status) ?></td>
                                        <td class="text-end pe-4">
                                            <a href="<?= admin_url('sales/invoice/' . $inv->id) ?>" class="btn btn-xs btn-outline-primary">A4</a>
                                            <a href="<?= admin_url('sales/receipt/' . $inv->id) ?>" target="_blank" class="btn btn-xs btn-outline-dark">POS</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="6" class="text-center py-4 text-muted">No invoices generated yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
