<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-pen-to-square text-primary me-2"></i> Edit Customer</h4>
        <p class="text-muted mb-0">Update profile information for <?= html_escape($customer->name) ?>.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('customers/profile/' . $customer->id) ?>" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Profile
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                <form action="<?= admin_url('customers/edit/' . $customer->id) ?>" method="POST">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="<?= html_escape($customer->name) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" class="form-control" value="<?= html_escape($customer->phone) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" class="form-control" value="<?= html_escape($customer->email) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="Female" <?= ($customer->gender === 'Female') ? 'selected' : '' ?>>Female</option>
                                <option value="Male" <?= ($customer->gender === 'Male') ? 'selected' : '' ?>>Male</option>
                                <option value="Other" <?= ($customer->gender === 'Other') ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="<?= html_escape($customer->dob) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Customer Group / Tier</label>
                            <select name="group_id" class="form-select">
                                <?php foreach ($groups as $g): ?>
                                    <option value="<?= $g->id ?>" <?= ($customer->group_id == $g->id) ? 'selected' : '' ?>><?= html_escape($g->name) ?> (<?= $g->discount_percent ?>% off)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Address</label>
                            <textarea name="address" class="form-control" rows="2"><?= html_escape($customer->address) ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Internal Notes</label>
                            <textarea name="notes" class="form-control" rows="2"><?= html_escape($customer->notes) ?></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="<?= admin_url('customers/profile/' . $customer->id) ?>" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
