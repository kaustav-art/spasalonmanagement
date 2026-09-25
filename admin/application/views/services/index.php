<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-wand-magic-sparkles text-primary me-2"></i> Services Catalog</h4>
        <p class="text-muted mb-0">Manage hair styling, facial treatments, massage rituals, and spa pricing.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('services/categories') ?>" class="btn btn-outline-secondary me-2">
            <i class="fa-solid fa-folder-tree me-1"></i> Categories
        </a>
        <a href="<?= admin_url('services/packages') ?>" class="btn btn-outline-primary me-2">
            <i class="fa-solid fa-box-open me-1"></i> Packages
        </a>
        <a href="<?= admin_url('services/create') ?>" class="btn btn-primary shadow-sm">
            <i class="fa-solid fa-plus me-1"></i> Add Service
        </a>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Service Name</th>
                        <th>Category</th>
                        <th>Edition Type</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Tax</th>
                        <?php if (is_spa_enabled()): ?>
                            <th>Room Required</th>
                        <?php endif; ?>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($services)): ?>
                        <?php foreach ($services as $srv): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark"><?= html_escape($srv->name) ?></div>
                                    <small class="text-muted text-truncate d-inline-block" style="max-width: 250px;"><?= html_escape($srv->description) ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border"><?= html_escape($srv->category_name) ?></span>
                                </td>
                                <td>
                                    <?php if ($srv->type === 'salon'): ?>
                                        <span class="badge badge-edition-salon">Salon</span>
                                    <?php elseif ($srv->type === 'spa'): ?>
                                        <span class="badge badge-edition-spa">Spa</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Both</span>
                                    <?php endif; ?>
                                </td>
                                <td><i class="fa-regular fa-clock me-1 text-muted"></i> <?= $srv->duration ?> mins</td>
                                <td class="fw-bold fs-15px text-success"><?= format_currency($srv->price) ?></td>
                                <td class="text-muted"><?= $srv->tax_rate ?>%</td>
                                <?php if (is_spa_enabled()): ?>
                                    <td>
                                        <?= $srv->requires_room ? '<span class="badge bg-info bg-opacity-10 text-info"><i class="fa-solid fa-door-open me-1"></i> Yes</span>' : '<span class="text-muted">No</span>' ?>
                                    </td>
                                <?php endif; ?>
                                <td><span class="badge bg-success">Active</span></td>
                                <td class="text-end pe-4">
                                    <a href="<?= admin_url('services/edit/' . $srv->id) ?>" class="btn btn-xs btn-outline-secondary">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="<?= is_spa_enabled() ? '9' : '8' ?>" class="text-center py-5 text-muted">No services created yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
