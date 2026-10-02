<div class="row align-items-center mb-4">
    <div class="col-md-8">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-envelope-open-text text-primary me-2"></i> Client Inquiries & Contact Messages</h4>
        <p class="text-muted mb-0">Messages submitted through the public website contact form.</p>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Sender</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Received</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($messages)): ?>
                        <?php foreach ($messages as $m): ?>
                            <tr class="<?= ($m->status === 'unread') ? 'table-warning bg-opacity-10' : '' ?>">
                                <td class="ps-4">
                                    <div class="fw-bold text-dark"><?= html_escape($m->name) ?></div>
                                    <small class="text-muted"><?= html_escape($m->email) ?></small>
                                </td>
                                <td><?= html_escape($m->phone ? $m->phone : '-') ?></td>
                                <td class="fw-semibold text-dark"><?= html_escape($m->subject) ?></td>
                                <td class="text-muted fs-13px" style="max-width: 320px;"><?= nl2br(html_escape($m->message)) ?></td>
                                <td class="text-muted fs-12px"><?= date('d M Y, h:i A', strtotime($m->created_at)) ?></td>
                                <td>
                                    <?php if ($m->status === 'unread'): ?>
                                        <span class="badge bg-danger">Unread</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Read</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <?php if ($m->status === 'unread'): ?>
                                        <a href="<?= admin_url('website/mark_message_read/' . $m->id) ?>" class="btn btn-xs btn-outline-success">
                                            <i class="fa-solid fa-check me-1"></i> Mark Read
                                        </a>
                                    <?php endif; ?>
                                    <a href="mailto:<?= html_escape($m->email) ?>" class="btn btn-xs btn-outline-primary">
                                        <i class="fa-solid fa-reply"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center py-5 text-muted">No messages received yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
