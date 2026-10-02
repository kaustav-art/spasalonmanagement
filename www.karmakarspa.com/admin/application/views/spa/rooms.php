<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fa-solid fa-hot-tub-person text-info me-2"></i> Spa Treatment Rooms & Suites</h4>
        <p class="text-muted mb-0">Manage private treatment rooms, hydro suites, and couple sanctuaries.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('spa/schedule') ?>" class="btn btn-outline-info me-2">
            <i class="fa-solid fa-calendar-check me-1"></i> Room Schedule
        </a>
        <button type="button" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#newRoomModal">
            <i class="fa-solid fa-plus me-1"></i> Add Treatment Room
        </button>
    </div>
</div>

<div class="row g-4">
    <?php foreach ($rooms as $r): ?>
        <div class="col-lg-3 col-md-6">
            <div class="card h-100 shadow-sm border-0 border-top border-4 border-info">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-light text-dark border font-monospace"><?= html_escape($r->room_number) ?></span>
                        <span class="badge bg-success">Available</span>
                    </div>
                    <h5 class="fw-bold text-dark mt-2 mb-1"><?= html_escape($r->room_name) ?></h5>
                    <span class="badge bg-info bg-opacity-10 text-info align-self-start mb-2"><?= html_escape($r->room_type) ?></span>
                    <p class="text-muted fs-13px flex-grow-1"><?= html_escape($r->notes ? $r->notes : 'Fully equipped spa treatment suite.') ?></p>
                    <div class="border-top pt-2 d-flex justify-content-between text-muted fs-12px">
                        <span>Capacity: <strong><?= $r->capacity ?> person(s)</strong></span>
                        <a href="<?= admin_url('spa/schedule?room_id=' . $r->id) ?>" class="text-primary text-decoration-none">View Slots &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="modal fade" id="newRoomModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= admin_url('spa/rooms') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Register Treatment Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Room Name <span class="text-danger">*</span></label>
                        <input type="text" name="room_name" class="form-control" required placeholder="e.g. Lotus Sanctuary 1">
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Room Code / Number</label>
                            <input type="text" name="room_number" class="form-control" placeholder="SPA-101">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Bed Capacity</label>
                            <input type="number" name="capacity" class="form-control" value="1" min="1">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Room Type</label>
                        <select name="room_type" class="form-select">
                            <option value="Single Massage Suite">Single Massage Suite</option>
                            <option value="Couples VIP Suite">Couples VIP Suite</option>
                            <option value="Hydrotherapy Room">Hydrotherapy Room</option>
                            <option value="Aromatherapy Sanctuary">Aromatherapy Sanctuary</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Amenities / Notes</label>
                        <textarea name="notes" class="form-control" rows="2" placeholder="Heated bed, steam shower, sound system..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Room</button>
                </div>
            </form>
        </div>
    </div>
</div>
