<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h4 class="fw-bold mb-1"><i class="fas fa-cog text-primary me-2"></i>Business Settings</h4>
        <p class="text-muted mb-0">Configure store branding, contact info, taxes, business hours, and online booking parameters.</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="<?= admin_url('settings/business_type') ?>" class="btn btn-outline-primary me-2">
            <i class="fas fa-layer-group me-1"></i>Edition & Module Control
        </a>
        <a href="<?= admin_url('website/templates') ?>" class="btn btn-outline-secondary">
            <i class="fas fa-palette me-1"></i>Website Templates
        </a>
    </div>
</div>

<form method="POST" action="<?= admin_url('settings') ?>">
    <div class="row g-4">
        <!-- Brand & Contact -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom">
                    <h6 class="card-title fw-bold mb-0"><i class="fas fa-store text-primary me-2"></i>Salon / Spa Identity</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Business Name <span class="text-danger">*</span></label>
                        <input type="text" name="business_name" class="form-control" value="<?= htmlspecialchars(get_setting('business_name', 'Luxe Salon & Serenity Spa')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tagline / Slogan</label>
                        <input type="text" name="business_tagline" class="form-control" value="<?= htmlspecialchars(get_setting('business_tagline')) ?>">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="business_email" class="form-control" value="<?= htmlspecialchars(get_setting('business_email')) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="text" name="business_phone" class="form-control" value="<?= htmlspecialchars(get_setting('business_phone')) ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Physical Street Address</label>
                        <textarea name="business_address" class="form-control" rows="3"><?= htmlspecialchars(get_setting('business_address')) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Footer About Blurb</label>
                        <textarea name="footer_about" class="form-control" rows="2"><?= htmlspecialchars(get_setting('footer_about')) ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial & Localization -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom">
                    <h6 class="card-title fw-bold mb-0"><i class="fas fa-coins text-primary me-2"></i>Currency & Tax Settings</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Currency Symbol</label>
                            <input type="text" name="currency_symbol" class="form-control" value="<?= htmlspecialchars(get_setting('currency_symbol', '$')) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Currency Code</label>
                            <input type="text" name="currency_code" class="form-control" value="<?= htmlspecialchars(get_setting('currency_code', 'USD')) ?>" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tax Label</label>
                            <input type="text" name="tax_name" class="form-control" value="<?= htmlspecialchars(get_setting('tax_name', 'Sales Tax / VAT')) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Default Tax Rate (%)</label>
                            <input type="number" step="0.01" name="tax_rate" class="form-control" value="<?= htmlspecialchars(get_setting('tax_rate', '8.5')) ?>">
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark border-top pt-3 mt-4 mb-3"><i class="fas fa-clock text-primary me-2"></i>Operating Hours & Booking Slots</h6>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Daily Opening Time</label>
                            <input type="time" name="business_open_time" class="form-control" value="<?= htmlspecialchars(get_setting('business_open_time', '09:00')) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Daily Closing Time</label>
                            <input type="time" name="business_close_time" class="form-control" value="<?= htmlspecialchars(get_setting('business_close_time', '20:00')) ?>">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Slot Step (Minutes)</label>
                            <select name="booking_time_step" class="form-select">
                                <option value="15" <?= get_setting('booking_time_step') == '15' ? 'selected' : '' ?>>15 Minutes</option>
                                <option value="30" <?= get_setting('booking_time_step', '30') == '30' ? 'selected' : '' ?>>30 Minutes</option>
                                <option value="45" <?= get_setting('booking_time_step') == '45' ? 'selected' : '' ?>>45 Minutes</option>
                                <option value="60" <?= get_setting('booking_time_step') == '60' ? 'selected' : '' ?>>60 Minutes</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Advance Booking Days</label>
                            <input type="number" name="advance_booking_days" class="form-control" value="<?= htmlspecialchars(get_setting('advance_booking_days', '30')) ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Online Appointment Confirmation</label>
                        <select name="auto_confirm_booking" class="form-select">
                            <option value="0" <?= get_setting('auto_confirm_booking') == '0' ? 'selected' : '' ?>>Manual Confirmation by Staff (Requires Approval)</option>
                            <option value="1" <?= get_setting('auto_confirm_booking') == '1' ? 'selected' : '' ?>>Instant Automatic Confirmation</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Links -->
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 border-bottom">
                    <h6 class="card-title fw-bold mb-0"><i class="fas fa-share-alt text-primary me-2"></i>Social Media Links</h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold"><i class="fab fa-facebook text-primary me-1"></i>Facebook</label>
                            <input type="url" name="facebook_url" class="form-control" value="<?= htmlspecialchars(get_setting('facebook_url')) ?>" placeholder="https://facebook.com/yourpage">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold"><i class="fab fa-instagram text-danger me-1"></i>Instagram</label>
                            <input type="url" name="instagram_url" class="form-control" value="<?= htmlspecialchars(get_setting('instagram_url')) ?>" placeholder="https://instagram.com/yourhandle">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold"><i class="fab fa-twitter text-info me-1"></i>Twitter / X</label>
                            <input type="url" name="twitter_url" class="form-control" value="<?= htmlspecialchars(get_setting('twitter_url')) ?>" placeholder="https://twitter.com/yourhandle">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold"><i class="fab fa-youtube text-danger me-1"></i>YouTube</label>
                            <input type="url" name="youtube_url" class="form-control" value="<?= htmlspecialchars(get_setting('youtube_url')) ?>" placeholder="https://youtube.com/@channel">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary btn-lg px-4"><i class="fas fa-save me-2"></i>Save All Settings</button>
        </div>
    </div>
</form>
