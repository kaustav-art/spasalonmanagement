<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-user-plus text-primary me-2"></i> Register New Customer</h4>
        <p class="text-muted mb-0">Create customer profile with contact details, birthday, and loyalty tier.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('customers') ?>" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Directory
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                <form action="<?= admin_url('customers/create') ?>" method="POST">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required placeholder="e.g. Jessica Alba Miller">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" class="form-control" required placeholder="e.g. +1 (555) 234-5678">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="client@example.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="Female" selected>Female</option>
                                <option value="Male">Male</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Date of Birth</label>
                            <input type="date" name="dob" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Residential Address</label>
                            <textarea name="address" class="form-control" rows="2" placeholder="Street, City, State, ZIP"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Internal Notes / Style & Spa Preferences</label>
                            <textarea name="notes" class="form-control" rows="2" placeholder="e.g. Likes organic argan oils, sensitive skin, prefers quiet appointments..."></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="<?= admin_url('customers') ?>" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">
                            <i class="fa-solid fa-check me-1"></i> Register Client
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
