<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-crown text-warning me-2"></i> Customer Groups & Loyalty Tiers</h4>
        <p class="text-muted mb-0">Define discount rules, membership ranks, and VIP client groups.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newGroupModal">
            <i class="fa-solid fa-plus me-1"></i> Add Customer Group
        </button>
    </div>
</div>

<div class="row g-4">
    <?php foreach ($groups as $g): ?>
        <div class="col-lg-3 col-md-6">
            <div class="card h-100 shadow-sm border-0 border-top border-4 border-primary">
                <div class="card-body p-4 text-center">
                    <div class="avatar avatar-lg rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center mx-auto mb-3 fs-3">
                        <i class="fa-solid fa-gem"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-1"><?= html_escape($g->name) ?></h5>
                    <div class="badge bg-success fs-14px px-3 py-1 mb-3">
                        <?= $g->discount_percent ?>% Discount
                    </div>
                    <p class="text-muted fs-13px mb-3"><?= html_escape($g->description) ?></p>
                    <div class="border-top pt-2">
                        <span class="text-muted fs-13px">Enrolled Members: <strong><?= (int)$g->total_members ?></strong></span>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="modal fade" id="newGroupModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= admin_url('customers/groups') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Create Customer Group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Group Title <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g. Diamond VIP">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Discount Percentage (%)</label>
                        <input type="number" name="discount_percent" class="form-control" value="10" min="0" max="100" step="0.5">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Eligibility criteria and special benefits..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Group</button>
                </div>
            </form>
        </div>
    </div>
</div>
