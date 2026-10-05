<!-- Summernote WYSIWYG Editor Assets -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<div class="container-fluid px-4 py-4">

    <!-- Flash Messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i><?= $this->session->flashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Section Title & Breadcrumb -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <h3 class="fw-bold mb-1"><i class="fa-solid fa-spa text-primary me-2"></i>Services Catalog</h3>
            <p class="text-muted small mb-0">Manage services displayed on the website showcase, treatment menu, detail pages, and booking system.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="<?= website_url('services') ?>" target="_blank" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-eye me-1"></i> View Website Menu
            </a>
            <button type="button" class="btn btn-primary btn-sm fw-semibold px-3" data-bs-toggle="modal" data-bs-target="#modalService" onclick="openNewServiceModal()">
                <i class="fa-solid fa-plus me-1"></i> Add New Service
            </button>
        </div>
    </div>

    <!-- 1. Header Settings Card -->
    <form action="<?= admin_url('services') ?>" method="post" class="mb-4">
        <input type="hidden" name="action" value="save_services_headers">

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-0">
                    <i class="fa-solid fa-hand-holding-heart text-primary me-2"></i>Services Section Heading &amp; Copy
                </h5>
                <button type="submit" class="btn btn-primary btn-sm fw-semibold px-3">
                    <i class="fa-solid fa-check me-1"></i> Save Headers
                </button>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted">Section Tagline</label>
                        <input type="text" name="services_tagline" class="form-control" value="<?= htmlspecialchars($services_tagline) ?>" placeholder="We Offer">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small fw-bold text-muted">Section Title Heading</label>
                        <input type="text" name="services_title" class="form-control" value="<?= htmlspecialchars($services_title) ?>" placeholder="Beauty and Skin Care Services">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-bold text-muted">Section Lead Description</label>
                        <textarea name="services_desc" class="form-control" rows="2"><?= htmlspecialchars($services_desc) ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- 2. Services Management List Table -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
            <div>
                <h5 class="fw-bold mb-0">
                    <i class="fa-solid fa-list-check text-primary me-2"></i>Services Catalogue &amp; Detail Pages
                </h5>
                <p class="text-muted small mb-0">Each service includes card thumbnail, slug, short description, and rich text editor description linking to dedicated detail page.</p>
            </div>
            <button type="button" class="btn btn-primary btn-sm fw-semibold px-3" data-bs-toggle="modal" data-bs-target="#modalService" onclick="openNewServiceModal()">
                <i class="fa-solid fa-plus me-1"></i> Add New Service
            </button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="small text-muted">
                            <th style="width: 70px;" class="ps-4">Thumb</th>
                            <th>Service Name &amp; Slug</th>
                            <th>Short Description</th>
                            <th>Price &amp; Duration</th>
                            <th>Status</th>
                            <th>Detail Page</th>
                            <th class="text-end pe-4" style="width: 140px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($services_list)): ?>
                            <?php foreach ($services_list as $svc): 
                                $svc_title = isset($svc->title) ? $svc->title : (isset($svc->name) ? $svc->name : 'Service');
                                $svc_slug = isset($svc->slug) ? $svc->slug : url_title($svc_title, 'dash', TRUE);
                                $svc_thumb = !empty($svc->thumbnail) ? $svc->thumbnail : (!empty($svc->image) ? $svc->image : 'assets/template2/images/services/services-1-1.jpg');
                                if (strpos($svc_thumb, 'http') !== 0) {
                                    $svc_thumb = website_url(ltrim($svc_thumb, '/'));
                                }
                                $svc_price = isset($svc->price) ? (float)$svc->price : 0;
                                $svc_duration = isset($svc->duration) ? $svc->duration : '60 mins';
                                if (is_numeric($svc_duration)) $svc_duration .= ' mins';
                                $svc_desc = isset($svc->short_desc) ? $svc->short_desc : (isset($svc->description) ? strip_tags($svc->description) : '');
                                $svc_status = isset($svc->status) ? $svc->status : 'active';
                                $detail_url = website_url('service/' . $svc_slug);
                            ?>
                                <tr>
                                    <td class="ps-4">
                                        <img src="<?= htmlspecialchars($svc_thumb) ?>" alt="<?= htmlspecialchars($svc_title) ?>" class="rounded-3 shadow-sm" style="width: 48px; height: 48px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark"><?= htmlspecialchars($svc_title) ?></div>
                                        <div class="text-muted font-monospace small">/service/<?= htmlspecialchars($svc_slug) ?></div>
                                    </td>
                                    <td>
                                        <div class="text-secondary small text-truncate" style="max-width: 260px;">
                                            <?= htmlspecialchars($svc_desc) ?>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary fw-bold px-2 py-1">$<?= number_format($svc_price, 2) ?></span>
                                        <span class="badge bg-light text-dark border ms-1"><?= htmlspecialchars($svc_duration) ?></span>
                                    </td>
                                    <td>
                                        <span class="badge <?= $svc_status === 'active' ? 'bg-success' : 'bg-secondary' ?>">
                                            <?= ucfirst($svc_status) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= $detail_url ?>" target="_blank" class="btn btn-outline-info btn-sm">
                                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Page
                                        </a>
                                    </td>
                                    <td class="text-end pe-4">
                                        <?php
                                            $json_data = array(
                                                'id' => (int)$svc->id,
                                                'title' => $svc_title,
                                                'slug' => $svc_slug,
                                                'thumbnail' => isset($svc->thumbnail) ? $svc->thumbnail : (isset($svc->image) ? $svc->image : ''),
                                                'banner_image' => isset($svc->banner_image) ? $svc->banner_image : 'assets/template2/images/services/service-details-img4.jpg',
                                                'price' => $svc_price,
                                                'duration' => $svc_duration,
                                                'short_desc' => $svc_desc,
                                                'description' => isset($svc->description) ? $svc->description : '',
                                                'sort_order' => isset($svc->sort_order) ? (int)$svc->sort_order : 1,
                                                'status' => $svc_status
                                            );
                                        ?>
                                        <script type="application/json" id="svcData_<?= (int)$svc->id ?>"><?= json_encode($json_data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?></script>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-outline-secondary" onclick="triggerEditService(<?= (int)$svc->id ?>)" data-bs-toggle="modal" data-bs-target="#modalService" title="Edit Service">
                                                <i class="fa-solid fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger" onclick="deleteService(<?= (int)$svc->id ?>)" title="Delete Service">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No services found. Click "Add New Service" to create one.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- MODAL: ADD / EDIT SERVICE (MATCHING SUPERADMIN LAYOUTS SERVICES) -->
<div class="modal fade" id="modalService" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow">
            <form action="<?= admin_url('services') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save_service">
                <input type="hidden" name="service_id" id="svcId" value="0">

                <div class="modal-header py-3 border-bottom bg-light">
                    <h5 class="modal-title fw-bold" id="svcModalTitle">Add New Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label small fw-bold">Service Title *</label>
                            <input type="text" name="title" id="svcTitle" class="form-control" required placeholder="e.g. Deep Cleansing Facial">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">URL Slug (autogenerated if blank)</label>
                            <input type="text" name="slug" id="svcSlug" class="form-control font-monospace" placeholder="e.g. deep-cleansing-facial">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Thumbnail (Card)</label>
                            <input type="file" name="thumbnail_file" class="form-control form-control-sm mb-1" accept="image/*">
                            <input type="text" name="thumbnail_url" id="svcThumbUrl" class="form-control form-control-sm" placeholder="assets/template2/images/services/services-1-1.jpg">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Banner / Detail Hero Image</label>
                            <input type="file" name="banner_image_file" class="form-control form-control-sm mb-1" accept="image/*">
                            <input type="text" name="banner_image_url" id="svcBannerUrl" class="form-control form-control-sm" placeholder="assets/template2/images/services/service-details-img4.jpg">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small fw-bold">Price ($)</label>
                            <input type="number" step="0.01" name="price" id="svcPrice" class="form-control" value="85.00">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small fw-bold">Duration</label>
                            <input type="text" name="duration" id="svcDuration" class="form-control" value="60 mins">
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold">Short Description (Card Excerpt) *</label>
                            <textarea name="short_desc" id="svcShortDesc" class="form-control" rows="2" placeholder="Brief 1-2 sentence overview shown on service cards"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold">Full Detailed Description (WYSIWYG Rich Text Editor) *</label>
                            <textarea name="description" id="svcDescriptionEditor" class="summernote-editor form-control" rows="8"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Sort Order</label>
                            <input type="number" name="sort_order" id="svcSortOrder" class="form-control" value="1">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Status</label>
                            <select name="status" id="svcStatus" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top bg-light py-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-4">Save Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- HIDDEN DELETE FORM -->
<form id="deleteServiceForm" action="<?= admin_url('services') ?>" method="post" style="display:none;">
    <input type="hidden" name="action" value="delete_service">
    <input type="hidden" name="service_id" id="deleteSvcId" value="0">
</form>

<script>
function openNewServiceModal() {
    $('#svcModalTitle').text('Add New Service');
    $('#svcId').val(0);
    $('#svcTitle').val('');
    $('#svcSlug').val('');
    $('#svcThumbUrl').val('assets/template2/images/services/services-1-1.jpg');
    $('#svcBannerUrl').val('assets/template2/images/services/service-details-img4.jpg');
    $('#svcPrice').val('85.00');
    $('#svcDuration').val('60 mins');
    $('#svcShortDesc').val('');
    if ($('#svcDescriptionEditor').summernote) {
        $('#svcDescriptionEditor').summernote('code', '');
    } else {
        $('#svcDescriptionEditor').val('');
    }
    $('#svcSortOrder').val(1);
    $('#svcStatus').val('active');
}

function triggerEditService(id) {
    var raw = $('#svcData_' + id).text();
    if (!raw) return;
    try {
        var data = JSON.parse(raw);
        $('#svcModalTitle').text('Edit Service: ' + data.title);
        $('#svcId').val(data.id);
        $('#svcTitle').val(data.title);
        $('#svcSlug').val(data.slug);
        $('#svcThumbUrl').val(data.thumbnail);
        $('#svcBannerUrl').val(data.banner_image || 'assets/template2/images/services/service-details-img4.jpg');
        $('#svcPrice').val(data.price);
        $('#svcDuration').val(data.duration);
        $('#svcShortDesc').val(data.short_desc);
        if ($('#svcDescriptionEditor').summernote) {
            $('#svcDescriptionEditor').summernote('code', data.description || '');
        } else {
            $('#svcDescriptionEditor').val(data.description || '');
        }
        $('#svcSortOrder').val(data.sort_order);
        $('#svcStatus').val(data.status);
    } catch(e) {
        console.error(e);
    }
}

function deleteService(id) {
    if (confirm('Are you sure you want to delete this service?')) {
        $('#deleteSvcId').val(id);
        $('#deleteServiceForm').submit();
    }
}

$(document).ready(function() {
    if ($.fn.summernote) {
        $('.summernote-editor').summernote({
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    }
});
</script>
