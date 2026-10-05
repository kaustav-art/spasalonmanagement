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
            <h3 class="fw-bold mb-1"><i class="fa-solid fa-newspaper text-primary me-2"></i>Blog &amp; Articles Management</h3>
            <p class="text-muted small mb-0">Publish beauty insights, spa wellness articles, and news that appear on the website and dedicated article pages.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="<?= website_url() ?>#blog" target="_blank" class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-eye me-1"></i> View Website Blog
            </a>
            <button type="button" class="btn btn-primary btn-sm fw-semibold px-3" data-bs-toggle="modal" data-bs-target="#modalBlog" onclick="openNewBlogModal()">
                <i class="fa-solid fa-plus me-1"></i> Add New Blog Post
            </button>
        </div>
    </div>

    <!-- 1. Header Settings Card -->
    <form action="<?= admin_url('blogs') ?>" method="post" class="mb-4">
        <input type="hidden" name="action" value="save_blogs_headers">

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-0">
                    <i class="fa-solid fa-heading text-primary me-2"></i>Blog Section Heading &amp; Copy
                </h5>
                <button type="submit" class="btn btn-primary btn-sm fw-semibold px-3">
                    <i class="fa-solid fa-check me-1"></i> Save Headers
                </button>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted">Section Tagline</label>
                        <input type="text" name="blog_tagline" class="form-control" value="<?= htmlspecialchars($blog_tagline) ?>" placeholder="Latest News">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small fw-bold text-muted">Section Title Heading</label>
                        <input type="text" name="blog_title" class="form-control" value="<?= htmlspecialchars($blog_title) ?>" placeholder="Inside a World of Relaxing Spa Treatments">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-bold text-muted">Section Lead Description</label>
                        <textarea name="blog_desc" class="form-control" rows="2"><?= htmlspecialchars($blog_desc) ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- 2. Blog Posts Catalogue Table -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
            <div>
                <h5 class="fw-bold mb-0">
                    <i class="fa-solid fa-book-open text-primary me-2"></i>Published Blog Articles
                </h5>
                <p class="text-muted small mb-0">Manage articles, rich descriptions, thumbnails, and dedicated detail pages.</p>
            </div>
            <button type="button" class="btn btn-primary btn-sm fw-semibold px-3" data-bs-toggle="modal" data-bs-target="#modalBlog" onclick="openNewBlogModal()">
                <i class="fa-solid fa-plus me-1"></i> Add New Blog Post
            </button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="small text-muted">
                            <th style="width: 70px;" class="ps-4">Thumb</th>
                            <th>Title &amp; Slug</th>
                            <th>Author</th>
                            <th>Published Date</th>
                            <th>Status</th>
                            <th>Detail Page</th>
                            <th class="text-end pe-4" style="width: 140px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($blogs_list)): ?>
                            <?php foreach ($blogs_list as $b): 
                                $b_thumb = !empty($b->thumbnail) ? $b->thumbnail : 'assets/template2/images/blog/blog-1-1.jpg';
                                if (strpos($b_thumb, 'http') !== 0) {
                                    $b_thumb = website_url(ltrim($b_thumb, '/'));
                                }
                                $detail_url = website_url('blog/' . $b->slug);
                            ?>
                                <tr>
                                    <td class="ps-4">
                                        <img src="<?= htmlspecialchars($b_thumb) ?>" alt="<?= htmlspecialchars($b->title) ?>" class="rounded-3 shadow-sm" style="width: 48px; height: 48px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark"><?= htmlspecialchars($b->title) ?></div>
                                        <div class="text-muted font-monospace small">/blog/<?= htmlspecialchars($b->slug) ?></div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border"><i class="fa-solid fa-user me-1 text-muted"></i><?= htmlspecialchars($b->author_name) ?></span>
                                    </td>
                                    <td>
                                        <span class="small text-muted"><i class="fa-regular fa-calendar me-1"></i><?= date('M d, Y', strtotime($b->published_date)) ?></span>
                                    </td>
                                    <td>
                                        <span class="badge <?= $b->status === 'active' ? 'bg-success' : 'bg-secondary' ?>">
                                            <?= ucfirst($b->status) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= $detail_url ?>" target="_blank" class="btn btn-outline-info btn-sm">
                                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Article
                                        </a>
                                    </td>
                                    <td class="text-end pe-4">
                                        <?php
                                            $json_data = array(
                                                'id' => (int)$b->id,
                                                'title' => $b->title,
                                                'slug' => $b->slug,
                                                'author_name' => $b->author_name,
                                                'published_date' => $b->published_date,
                                                'thumbnail' => $b->thumbnail,
                                                'short_desc' => $b->short_desc,
                                                'content' => $b->content,
                                                'tags' => $b->tags,
                                                'sort_order' => (int)$b->sort_order,
                                                'status' => $b->status
                                            );
                                        ?>
                                        <script type="application/json" id="blogData_<?= (int)$b->id ?>"><?= json_encode($json_data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?></script>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-outline-secondary" onclick="triggerEditBlog(<?= (int)$b->id ?>)" data-bs-toggle="modal" data-bs-target="#modalBlog" title="Edit Article">
                                                <i class="fa-solid fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger" onclick="deleteBlog(<?= (int)$b->id ?>)" title="Delete Article">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No blog articles found. Click "Add New Blog Post" to publish an article.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- MODAL: ADD / EDIT BLOG POST -->
<div class="modal fade" id="modalBlog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow">
            <form action="<?= admin_url('blogs') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save_blog">
                <input type="hidden" name="blog_id" id="blogId" value="0">

                <div class="modal-header py-3 border-bottom bg-light">
                    <h5 class="modal-title fw-bold" id="blogModalTitle">Add New Blog Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label small fw-bold">Article Title *</label>
                            <input type="text" name="title" id="blogTitle" class="form-control" required placeholder="e.g. 5 Restorative Benefits of Aromatherapy Massage">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">URL Slug (autogenerated if blank)</label>
                            <input type="text" name="slug" id="blogSlug" class="form-control font-monospace" placeholder="e.g. benefits-of-aromatherapy">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Author Name</label>
                            <input type="text" name="author_name" id="blogAuthor" class="form-control" value="Emma Watson">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Publish Date</label>
                            <input type="date" name="published_date" id="blogDate" class="form-control" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Thumbnail / Cover Image</label>
                            <input type="file" name="thumbnail_file" class="form-control form-control-sm mb-1" accept="image/*">
                            <input type="text" name="thumbnail_url" id="blogThumbUrl" class="form-control form-control-sm" placeholder="assets/template2/images/blog/blog-1-1.jpg">
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold">Short Excerpt / Lead Summary *</label>
                            <textarea name="short_desc" id="blogShortDesc" class="form-control" rows="2" placeholder="Brief 1-2 sentence teaser summary shown on blog cards"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold">Full Article Content (WYSIWYG Rich Text Editor) *</label>
                            <textarea name="content" id="blogContentEditor" class="summernote-editor form-control" rows="8"></textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Tags (comma separated)</label>
                            <input type="text" name="tags" id="blogTags" class="form-control" placeholder="Spa, Massage, Wellness, Skin">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Sort Order</label>
                            <input type="number" name="sort_order" id="blogSortOrder" class="form-control" value="1">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Status</label>
                            <select name="status" id="blogStatus" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top bg-light py-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-4">Save Article</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- HIDDEN DELETE FORM -->
<form id="deleteBlogForm" action="<?= admin_url('blogs') ?>" method="post" style="display:none;">
    <input type="hidden" name="action" value="delete_blog">
    <input type="hidden" name="blog_id" id="deleteBlogId" value="0">
</form>

<script>
function openNewBlogModal() {
    $('#blogModalTitle').text('Add New Blog Post');
    $('#blogId').val(0);
    $('#blogTitle').val('');
    $('#blogSlug').val('');
    $('#blogAuthor').val('Admin');
    $('#blogDate').val('<?= date('Y-m-d') ?>');
    $('#blogThumbUrl').val('assets/template2/images/blog/blog-1-1.jpg');
    $('#blogShortDesc').val('');
    if ($('#blogContentEditor').summernote) {
        $('#blogContentEditor').summernote('code', '');
    } else {
        $('#blogContentEditor').val('');
    }
    $('#blogTags').val('Spa, Skincare, Wellness');
    $('#blogSortOrder').val(1);
    $('#blogStatus').val('active');
}

function triggerEditBlog(id) {
    var raw = $('#blogData_' + id).text();
    if (!raw) return;
    try {
        var data = JSON.parse(raw);
        $('#blogModalTitle').text('Edit Article: ' + data.title);
        $('#blogId').val(data.id);
        $('#blogTitle').val(data.title);
        $('#blogSlug').val(data.slug);
        $('#blogAuthor').val(data.author_name);
        $('#blogDate').val(data.published_date);
        $('#blogThumbUrl').val(data.thumbnail);
        $('#blogShortDesc').val(data.short_desc);
        if ($('#blogContentEditor').summernote) {
            $('#blogContentEditor').summernote('code', data.content || '');
        } else {
            $('#blogContentEditor').val(data.content || '');
        }
        $('#blogTags').val(data.tags);
        $('#blogSortOrder').val(data.sort_order);
        $('#blogStatus').val(data.status);
    } catch(e) {
        console.error(e);
    }
}

function deleteBlog(id) {
    if (confirm('Are you sure you want to delete this blog post?')) {
        $('#deleteBlogId').val(id);
        $('#deleteBlogForm').submit();
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
