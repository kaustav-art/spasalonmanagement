<div class="row align-items-center mb-4">
    <div class="col-md-8">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-photo-film text-primary me-2"></i> Gallery & Portfolio Showcase</h4>
        <p class="text-muted mb-0">Showcase your best salon hairstyles, spa suites, hydra facials, and relaxation amenities.</p>
    </div>
    <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newGalleryModal">
            <i class="fa-solid fa-plus me-1"></i> Add Gallery Item
        </button>
    </div>
</div>

<div class="row g-4">
    <?php if (!empty($gallery)): ?>
        <?php foreach ($gallery as $g): ?>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-3">
                        <div class="bg-light rounded p-4 text-center mb-3 text-muted">
                            <i class="fa-regular fa-image fs-1 text-primary"></i>
                            <div class="fw-bold text-dark mt-2"><?= html_escape($g->title) ?></div>
                            <span class="badge bg-secondary mt-1"><?= ucfirst(html_escape($g->category)) ?></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">Published</span>
                            <a href="<?= admin_url('website/delete_gallery/' . $g->id) ?>" class="btn btn-xs btn-outline-danger" onclick="return confirm('Remove this image?');">
                                <i class="fa-solid fa-trash me-1"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5 text-muted">No gallery items uploaded yet.</div>
    <?php endif; ?>
</div>

<div class="modal fade" id="newGalleryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= admin_url('website/gallery') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Gallery Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Title / Caption</label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. Balayage Golden Highlights">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category</label>
                        <select name="category" class="form-select">
                            <option value="salon">Salon & Hair</option>
                            <option value="spa">Spa & Massage</option>
                            <option value="nails">Nail Art</option>
                            <option value="facial">Skin & Facial</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save to Gallery</button>
                </div>
            </form>
        </div>
    </div>
</div>
