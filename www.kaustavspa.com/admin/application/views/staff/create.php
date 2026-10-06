<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-user-plus text-primary me-2"></i> Add Specialist / Staff</h4>
        <p class="text-muted mb-0">Register stylists, therapists, beauticians, and set service commission rates.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('staff') ?>" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Back
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                <form action="<?= admin_url('staff/create') ?>" method="POST">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Specialist Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required placeholder="e.g. Isabella Rossi">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Role / Designation <span class="text-danger">*</span></label>
                            <select name="role_type" class="form-select" required>
                                <option value="stylist">Hair Stylist / Colorist</option>
                                <option value="therapist">Spa & Massage Therapist</option>
                                <option value="beautician">Beautician / Esthetician</option>
                                <option value="receptionist">Receptionist / Front Desk</option>
                                <option value="manager">Salon/Spa Manager</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" placeholder="+1 (555) 000-0000">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="staff@spasalon.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Commission Rate (%)</label>
                            <input type="number" name="commission_rate" class="form-control" value="10" step="0.5" min="0" max="100">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Professional Bio & Experience</label>
                            <textarea name="bio" class="form-control" rows="3" placeholder="Specializations, certifications, years of experience..."></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="<?= admin_url('staff') ?>" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">Save Specialist</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
