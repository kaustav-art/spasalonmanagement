<div class="row align-items-center mb-4">
    <div class="col-md-8">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-file-lines text-primary me-2"></i> Website Page Content & SEO</h4>
        <p class="text-muted mb-0">Customize text, descriptions, and search engine metadata for each page across your active website template.</p>
    </div>
</div>

<div class="row g-4">
    <!-- Page Selector Tabs -->
    <div class="col-md-3">
        <div class="list-group shadow-sm border-0">
            <?php foreach ($pages as $p): ?>
                <a href="<?= admin_url('website/pages?key=' . $p->page_key) ?>" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3 <?= ($current_page && $current_page->page_key === $p->page_key) ? 'active' : '' ?>">
                    <span><i class="fa-regular fa-file me-2"></i> <?= ucfirst($p->page_key) ?> Page</span>
                    <i class="fa-solid fa-chevron-right fs-12px"></i>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Page Content Editor -->
    <div class="col-md-9">
        <?php if ($current_page): ?>
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0">Editing: <?= ucfirst($current_page->page_key) ?> Page</h5>
                    <span class="badge bg-light text-dark border">Key: <?= $current_page->page_key ?></span>
                </div>
                <div class="card-body p-4">
                    <form action="<?= admin_url('website/pages') ?>" method="POST">
                        <input type="hidden" name="page_key" value="<?= html_escape($current_page->page_key) ?>">
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Page Main Title</label>
                            <input type="text" name="title" class="form-control" value="<?= html_escape($current_page->title) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Subtitle / Tagline</label>
                            <input type="text" name="subtitle" class="form-control" value="<?= html_escape($current_page->subtitle) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Body / Philosophy Content (WYSIWYG Rich Text)</label>
                            <textarea name="content" class="form-control summernote-editor" rows="6"><?= html_escape($current_page->content) ?></textarea>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Meta SEO Title</label>
                                <input type="text" name="meta_title" class="form-control" value="<?= html_escape($current_page->meta_title) ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Meta SEO Description</label>
                                <input type="text" name="meta_description" class="form-control" value="<?= html_escape($current_page->meta_description) ?>">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
