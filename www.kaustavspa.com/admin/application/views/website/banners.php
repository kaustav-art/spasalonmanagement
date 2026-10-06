<div class="row align-items-center mb-4">
    <div class="col-md-8">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-images text-primary me-2"></i> Website Banners & Sliders</h4>
        <p class="text-muted mb-0">Manage rotating hero banners and call-to-action buttons featured on the public website homepage.</p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newBannerModal">
            <i class="fa-solid fa-plus me-1"></i> Add New Banner
        </button>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Order</th>
                        <th>Banner Title</th>
                        <th>Subtitle</th>
                        <th>CTA Button</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($banners)): ?>
                        <?php foreach ($banners as $b): ?>
                            <tr>
                                <td class="ps-4 fw-bold text-muted">#<?= $b->sort_order ?></td>
                                <td class="fw-semibold text-dark"><?= html_escape($b->title) ?></td>
                                <td class="text-muted fs-13px"><?= html_escape($b->subtitle) ?></td>
                                <td>
                                    <?php if ($b->button_text): ?>
                                        <span class="badge bg-light text-dark border"><?= html_escape($b->button_text) ?> &rarr; <?= html_escape($b->button_url) ?></span>
                                    <?php else: ?>
                                        <span class="text-muted">None</span>
                                    <?php endif; ?>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td class="text-end pe-4">
                                    <a href="<?= admin_url('website/delete_banner/' . $b->id) ?>" class="btn btn-xs btn-outline-danger" onclick="return confirm('Delete this banner?');">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center py-4 text-muted">No banners found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- New Banner Modal -->
<div class="modal fade" id="newBannerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= admin_url('website/banners') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add New Hero Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Banner Heading Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. Couture Hair Styling & Balayage">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Subtitle Description</label>
                        <textarea name="subtitle" class="form-control" rows="2" placeholder="Experience the finest transformations..."></textarea>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Button Label</label>
                            <input type="text" name="button_text" class="form-control" value="Book Appointment">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Button URL</label>
                            <input type="text" name="button_url" class="form-control" value="booking">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Display Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="1" min="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Banner</button>
                </div>
            </form>
        </div>
    </div>
</div>
