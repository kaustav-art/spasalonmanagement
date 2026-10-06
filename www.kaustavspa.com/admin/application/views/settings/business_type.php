<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-layer-group text-primary me-2"></i>Business Edition & Script License</h4>
        <p class="text-muted mb-0">Switch between standalone <strong>Salon Management</strong>, <strong>Spa Wellness</strong>, or unified <strong>Salon + Spa</strong> editions.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <span class="badge bg-primary px-3 py-2 fs-6">
            Current Active Edition: <strong><?= str_replace('_', ' + ', $current_type) ?></strong>
        </span>
    </div>
</div>

<form method="POST" action="<?= admin_url('settings/business_type') ?>">
    <div class="row g-4 mb-4">
        <!-- Edition 1: SALON -->
        <div class="col-lg-4">
            <div class="card h-100 border-2 <?= $current_type === 'SALON' ? 'border-primary shadow' : 'border-light shadow-sm' ?>">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px;">
                            <i class="fas fa-cut"></i>
                        </div>
                        <h6 class="fw-bold mb-0">1. Salon Edition</h6>
                    </div>
                    <?php if ($current_type === 'SALON'): ?>
                        <span class="badge bg-primary">ACTIVE</span>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <p class="text-muted small">Specialized for hair salons, barber shops, nail bars, and cosmetic beauty parlors.</p>
                    <div class="form-check p-3 rounded bg-light mb-3">
                        <input class="form-check-input" type="radio" name="business_type" id="type_salon" value="SALON" <?= $current_type === 'SALON' ? 'checked' : '' ?>>
                        <label class="form-check-label fw-bold text-dark" for="type_salon">
                            Select Salon Edition
                        </label>
                    </div>

                    <h6 class="fw-bold small text-uppercase text-muted mb-2">Included Modules:</h6>
                    <ul class="list-unstyled small mb-3 lh-lg">
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Hair Stylists & Barbers</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Hair, Nail & Skin Services</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Walk-in Queue & Chairs</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Stylist Commission Payouts</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Retail Beauty Products</li>
                    </ul>

                    <h6 class="fw-bold small text-uppercase text-muted mb-2">Excluded / Hidden:</h6>
                    <ul class="list-unstyled small text-muted mb-0 lh-lg">
                        <li class="text-secondary"><i class="fas fa-ban me-2 text-danger"></i>Spa Private Rooms</li>
                        <li class="text-secondary"><i class="fas fa-ban me-2 text-danger"></i>Spa Therapy Sessions</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Edition 2: SPA -->
        <div class="col-lg-4">
            <div class="card h-100 border-2 <?= $current_type === 'SPA' ? 'border-primary shadow' : 'border-light shadow-sm' ?>">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px;">
                            <i class="fas fa-spa"></i>
                        </div>
                        <h6 class="fw-bold mb-0">2. Spa Wellness Edition</h6>
                    </div>
                    <?php if ($current_type === 'SPA'): ?>
                        <span class="badge bg-success">ACTIVE</span>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <p class="text-muted small">Specialized for day spas, massage centers, Ayurvedic clinics, and wellness resorts.</p>
                    <div class="form-check p-3 rounded bg-light mb-3">
                        <input class="form-check-input" type="radio" name="business_type" id="type_spa" value="SPA" <?= $current_type === 'SPA' ? 'checked' : '' ?>>
                        <label class="form-check-label fw-bold text-dark" for="type_spa">
                            Select Spa Edition
                        </label>
                    </div>

                    <h6 class="fw-bold small text-uppercase text-muted mb-2">Included Modules:</h6>
                    <ul class="list-unstyled small mb-3 lh-lg">
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Spa Therapists & Masseurs</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Private Treatment Rooms</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Room Conflict Calendar</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Spa Therapeutic Sessions</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Essential Oils & Aromas</li>
                    </ul>

                    <h6 class="fw-bold small text-uppercase text-muted mb-2">Excluded / Hidden:</h6>
                    <ul class="list-unstyled small text-muted mb-0 lh-lg">
                        <li class="text-secondary"><i class="fas fa-ban me-2 text-danger"></i>Salon Hair Styling Chairs</li>
                        <li class="text-secondary"><i class="fas fa-ban me-2 text-danger"></i>Barber Stations</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Edition 3: SALON + SPA (Unified) -->
        <div class="col-lg-4">
            <div class="card h-100 border-2 <?= $current_type === 'SALON_SPA' ? 'border-primary shadow' : 'border-light shadow-sm' ?>">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px;">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h6 class="fw-bold mb-0">3. Unified Salon & Spa</h6>
                    </div>
                    <?php if ($current_type === 'SALON_SPA'): ?>
                        <span class="badge bg-primary">ACTIVE</span>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <p class="text-muted small">Complete enterprise solution combining both luxury salon hair styling and holistic spa wellness.</p>
                    <div class="form-check p-3 rounded bg-light mb-3">
                        <input class="form-check-input" type="radio" name="business_type" id="type_salon_spa" value="SALON_SPA" <?= $current_type === 'SALON_SPA' ? 'checked' : '' ?>>
                        <label class="form-check-label fw-bold text-dark" for="type_salon_spa">
                            Select Salon & Spa (All Features)
                        </label>
                    </div>

                    <h6 class="fw-bold small text-uppercase text-muted mb-2">Everything Unlocked:</h6>
                    <ul class="list-unstyled small mb-0 lh-lg">
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Stylists + Therapists in one roster</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Private Spa Rooms + Walk-in Queue</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Combo Packages (Hair + Facial + Massage)</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>POS handles both salon services & spa sessions</li>
                        <li class="text-success"><i class="fas fa-check-circle me-2"></i>Full Commission Tracking for all staff</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mb-5">
        <button type="submit" class="btn btn-primary btn-lg px-5 shadow">
            <i class="fas fa-save me-2"></i>Apply Selected Business Edition
        </button>
    </div>
</form>
