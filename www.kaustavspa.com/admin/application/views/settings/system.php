<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-server text-primary me-2"></i>System Status & Environment</h4>
        <p class="text-muted mb-0">Server runtime information, PHP version, and database health.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('settings') ?>" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back to Settings
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-bottom">
        <h6 class="card-title fw-bold mb-0">Server & Environment Diagnostics</h6>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <tbody>
                <tr>
                    <td class="ps-4 fw-semibold" style="width: 300px;">PHP Version</td>
                    <td><span class="badge bg-success fs-6"><?= htmlspecialchars($php_version) ?></span> (Compatible with PHP 7.4 - 8.2+)</td>
                </tr>
                <tr>
                    <td class="ps-4 fw-semibold">Database Engine & Version</td>
                    <td><span class="badge bg-primary fs-6"><?= htmlspecialchars($db_version) ?></span> (MariaDB / MySQL InnoDB)</td>
                </tr>
                <tr>
                    <td class="ps-4 fw-semibold">Web Server Software</td>
                    <td><?= htmlspecialchars($server_software) ?></td>
                </tr>
                <tr>
                    <td class="ps-4 fw-semibold">Max Upload File Size</td>
                    <td><?= htmlspecialchars($upload_max) ?></td>
                </tr>
                <tr>
                    <td class="ps-4 fw-semibold">Max Post Data Size</td>
                    <td><?= htmlspecialchars($post_max) ?></td>
                </tr>
                <tr>
                    <td class="ps-4 fw-semibold">PHP Memory Limit</td>
                    <td><?= htmlspecialchars($memory_limit) ?></td>
                </tr>
                <tr>
                    <td class="ps-4 fw-semibold">Application Framework</td>
                    <td>CodeIgniter 3.1.13 Production Architecture</td>
                </tr>
                <tr>
                    <td class="ps-4 fw-semibold">Active Edition</td>
                    <td><span class="badge bg-info text-dark fs-6"><?= get_business_type() ?></span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
