<div class="row align-items-center mb-4">
    <div class="col-md-7">
        <h4 class="fw-bold mb-1"><i class="fas fa-cog text-primary me-2"></i>Business & Account Settings</h4>
        <p class="text-muted mb-0">Configure store branding, currency, operating hours, contact details, and subscription plan renewal.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <button type="button" class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#renewPlanModal">
            <i class="fas fa-sync-alt me-1"></i> Renew Plan
        </button>
    </div>
</div>

<?php 
$current_currency_code = get_setting('currency_code', 'USD');
$current_currency_symbol = get_setting('currency_symbol', '$');
$current_currency_pos = get_setting('currency_position', 'left');
$business_type_code = strtoupper(get_setting('business_type', 'SPA'));
$plan_title = ($business_type_code === 'SALON') ? 'Salon Professional Edition' : (($business_type_code === 'SPA') ? 'Spa Wellness Edition' : 'Salon & Spa Complete Edition');
$active_tpl = get_setting('active_template', 'template2');
$active_layout = get_setting('active_home_layout', 2);
$tpl_label = (strpos($active_tpl, '2') !== false) ? 'Template 2' : 'Template 1';
$registered_email = get_setting('business_email', 'admin@example.com');
$registered_domain = get_setting('domain', 'mybrand.com');
$subscription_expiry = get_setting('subscription_expires_at');
if (!$subscription_expiry) {
    $subscription_expiry = date('Y-m-d H:i:s', strtotime('+1 year'));
}

// Logo and Favicon paths
$logo_path = get_setting('business_logo', get_setting('logo', 'uploads/branding/logo.webp'));
$fav_path = get_setting('business_favicon', get_setting('favicon', 'uploads/branding/codeulas_logo_small.webp'));

$logo_url = base_url(ltrim($logo_path, '/'));
$fav_url = base_url(ltrim($fav_path, '/'));
?>

<form method="POST" action="<?= admin_url('settings') ?>" enctype="multipart/form-data">
    <div class="row g-4">
        <!-- 1. Brand & Contact Identity -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h6 class="card-title fw-bold mb-0"><i class="fas fa-store text-primary me-2"></i>Salon / Spa Identity</h6>
                    <span class="badge bg-primary-subtle text-primary fw-semibold">Profile</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Business Name <span class="text-danger">*</span></label>
                        <input type="text" name="business_name" class="form-control" value="<?= htmlspecialchars(get_setting('business_name', 'Luxe Salon & Serenity Spa')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tagline / Slogan</label>
                        <input type="text" name="business_tagline" class="form-control" value="<?= htmlspecialchars(get_setting('business_tagline')) ?>" placeholder="e.g. Premium Beauty & Rejuvenating Wellness">
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold d-flex align-items-center justify-content-between">
                                <span>Email Address</span>
                                <span class="badge bg-light text-muted border"><i class="fas fa-lock me-1"></i>Locked</span>
                            </label>
                            <input type="email" class="form-control bg-light text-muted" value="<?= htmlspecialchars($registered_email) ?>" readonly disabled>
                            <div class="form-text text-muted" style="font-size: 11px;">Registered email cannot be changed.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold d-flex align-items-center justify-content-between">
                                <span>Domain / URL</span>
                                <span class="badge bg-light text-muted border"><i class="fas fa-lock me-1"></i>Locked</span>
                            </label>
                            <input type="text" class="form-control bg-light text-muted font-monospace" value="<?= htmlspecialchars($registered_domain) ?>" readonly disabled>
                            <div class="form-text text-muted" style="font-size: 11px;">Provisioned domain cannot be changed.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contact Phone Number</label>
                        <input type="text" name="business_phone" class="form-control" value="<?= htmlspecialchars(get_setting('business_phone')) ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Physical Street Address</label>
                        <textarea name="business_address" class="form-control" rows="2"><?= htmlspecialchars(get_setting('business_address')) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Footer About / Bio Blurb</label>
                        <textarea name="footer_about" class="form-control" rows="2" placeholder="Short description displayed on website footer"><?= htmlspecialchars(get_setting('footer_about')) ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Branding Assets (Logo & Favicon) -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h6 class="card-title fw-bold mb-0"><i class="fas fa-images text-primary me-2"></i>Branding Assets &amp; Icons</h6>
                    <span class="badge bg-info-subtle text-info fw-semibold">Media</span>
                </div>
                <div class="card-body">
                    <!-- Logo Upload & Preview -->
                    <div class="p-3 bg-light rounded-3 mb-4">
                        <label class="form-label fw-bold text-dark d-flex align-items-center justify-content-between">
                            <span>Main Brand Logo</span>
                            <small class="text-muted">Recommended: PNG / SVG / WEBP (Transparent)</small>
                        </label>
                        <div class="d-flex align-items-center gap-3 mt-2">
                            <div class="p-2 bg-white rounded border text-center shadow-sm" style="min-width: 110px; max-width: 140px;">
                                <img src="<?= htmlspecialchars($logo_url) ?>?v=<?= time() ?>" alt="Logo Preview" style="max-height: 48px; max-width: 100%; object-fit: contain;" onerror="this.src='<?= base_url('uploads/branding/logo.webp') ?>'">
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" name="company_logo" class="form-control form-control-sm" accept="image/png, image/jpeg, image/webp, image/svg+xml">
                                <small class="text-muted d-block mt-1">Upload a new image to replace the header &amp; admin brand logo.</small>
                            </div>
                        </div>
                    </div>

                    <!-- Favicon Upload & Preview -->
                    <div class="p-3 bg-light rounded-3 mb-3">
                        <label class="form-label fw-bold text-dark d-flex align-items-center justify-content-between">
                            <span>Website Favicon &amp; Tab Icon</span>
                            <small class="text-muted">Recommended: 32x32 or 64x64 PNG / ICO / WEBP</small>
                        </label>
                        <div class="d-flex align-items-center gap-3 mt-2">
                            <div class="p-2 bg-white rounded border text-center shadow-sm" style="width: 54px; height: 54px; display: flex; align-items: center; justify-content: center;">
                                <img src="<?= htmlspecialchars($fav_url) ?>?v=<?= time() ?>" alt="Favicon Preview" style="max-height: 32px; max-width: 32px; object-fit: contain;" onerror="this.src='<?= base_url('uploads/branding/codeulas_logo_small.webp') ?>'">
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" name="company_favicon" class="form-control form-control-sm" accept="image/png, image/x-icon, image/webp, image/jpeg">
                                <small class="text-muted d-block mt-1">Shown in browser tabs and mobile bookmark bookmarks.</small>
                            </div>
                        </div>
                    </div>

                    <!-- Operating Hours Quick Preview Note -->
                    <div class="alert alert-light border small text-muted mb-0">
                        <i class="fas fa-check-circle text-success me-1"></i> Logo and favicon updates will automatically apply to both your customer-facing website and your administrative portal.
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Financial & Currency Settings -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h6 class="card-title fw-bold mb-0"><i class="fas fa-coins text-primary me-2"></i>Currency &amp; Tax Localization</h6>
                    <span class="badge bg-warning-subtle text-warning fw-semibold">Financials</span>
                </div>
                <div class="card-body">
                    <!-- Currency Dropdown -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Store Currency <span class="text-danger">*</span></label>
                        <select name="currency_code" id="currencySelect" class="form-select" onchange="onCurrencyChange(this)">
                            <?php 
                            $currencies = array(
                                'USD' => array('name' => 'USD - United States Dollar', 'symbol' => '$', 'pos' => 'left'),
                                'EUR' => array('name' => 'EUR - Euro', 'symbol' => '€', 'pos' => 'left'),
                                'GBP' => array('name' => 'GBP - British Pound', 'symbol' => '£', 'pos' => 'left'),
                                'INR' => array('name' => 'INR - Indian Rupee', 'symbol' => '₹', 'pos' => 'left'),
                                'AED' => array('name' => 'AED - United Arab Emirates Dirham', 'symbol' => 'AED', 'pos' => 'left'),
                                'SAR' => array('name' => 'SAR - Saudi Riyal', 'symbol' => 'SAR', 'pos' => 'left'),
                                'CAD' => array('name' => 'CAD - Canadian Dollar', 'symbol' => '$', 'pos' => 'left'),
                                'AUD' => array('name' => 'AUD - Australian Dollar', 'symbol' => '$', 'pos' => 'left'),
                                'SGD' => array('name' => 'SGD - Singapore Dollar', 'symbol' => '$', 'pos' => 'left'),
                                'JPY' => array('name' => 'JPY - Japanese Yen', 'symbol' => '¥', 'pos' => 'left'),
                                'BDT' => array('name' => 'BDT - Bangladeshi Taka', 'symbol' => '৳', 'pos' => 'left'),
                                'PKR' => array('name' => 'PKR - Pakistani Rupee', 'symbol' => '₨', 'pos' => 'left'),
                                'MYR' => array('name' => 'MYR - Malaysian Ringgit', 'symbol' => 'RM', 'pos' => 'left'),
                                'QAR' => array('name' => 'QAR - Qatari Riyal', 'symbol' => 'QR', 'pos' => 'left'),
                                'KWD' => array('name' => 'KWD - Kuwaiti Dinar', 'symbol' => 'KD', 'pos' => 'left'),
                                'OMR' => array('name' => 'OMR - Omani Rial', 'symbol' => 'OMR', 'pos' => 'left'),
                                'BHD' => array('name' => 'BHD - Bahraini Dinar', 'symbol' => 'BD', 'pos' => 'left'),
                                'NZD' => array('name' => 'NZD - New Zealand Dollar', 'symbol' => '$', 'pos' => 'left'),
                                'CHF' => array('name' => 'CHF - Swiss Franc', 'symbol' => 'CHF', 'pos' => 'left'),
                                'ZAR' => array('name' => 'ZAR - South African Rand', 'symbol' => 'R', 'pos' => 'left'),
                                'PHP' => array('name' => 'PHP - Philippine Peso', 'symbol' => '₱', 'pos' => 'left'),
                                'THB' => array('name' => 'THB - Thai Baht', 'symbol' => '฿', 'pos' => 'left'),
                                'IDR' => array('name' => 'IDR - Indonesian Rupiah', 'symbol' => 'Rp', 'pos' => 'left'),
                                'VND' => array('name' => 'VND - Vietnamese Dong', 'symbol' => '₫', 'pos' => 'right'),
                                'BRL' => array('name' => 'BRL - Brazilian Real', 'symbol' => 'R$', 'pos' => 'left'),
                                'MXN' => array('name' => 'MXN - Mexican Peso', 'symbol' => '$', 'pos' => 'left'),
                                'TRY' => array('name' => 'TRY - Turkish Lira', 'symbol' => '₺', 'pos' => 'left'),
                                'NGN' => array('name' => 'NGN - Nigerian Naira', 'symbol' => '₦', 'pos' => 'left'),
                                'EGP' => array('name' => 'EGP - Egyptian Pound', 'symbol' => 'E£', 'pos' => 'left')
                            );
                            
                            foreach ($currencies as $c_code => $c_info): 
                                $is_sel = ($current_currency_code === $c_code);
                            ?>
                                <option value="<?= $c_code ?>" data-symbol="<?= htmlspecialchars($c_info['symbol']) ?>" data-pos="<?= $c_info['pos'] ?>" <?= $is_sel ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($c_info['name']) ?> (<?= htmlspecialchars($c_info['symbol']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-text text-muted">All prices across the website, services menu, POS, and customer invoices will format dynamically according to this selection.</div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Currency Symbol Display</label>
                            <input type="text" name="currency_symbol" id="currencySymbolInput" class="form-control" value="<?= htmlspecialchars($current_currency_symbol) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Symbol Placement</label>
                            <select name="currency_position" id="currencyPosSelect" class="form-select">
                                <option value="left" <?= ($current_currency_pos === 'left') ? 'selected' : '' ?>>Left of Amount (e.g. <?= htmlspecialchars($current_currency_symbol) ?>100.00)</option>
                                <option value="right" <?= ($current_currency_pos === 'right') ? 'selected' : '' ?>>Right of Amount (e.g. 100.00 <?= htmlspecialchars($current_currency_symbol) ?>)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-2">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tax Name / Label</label>
                            <input type="text" name="tax_name" class="form-control" value="<?= htmlspecialchars(get_setting('tax_name', 'Sales Tax / VAT')) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Default Tax Rate (%)</label>
                            <input type="number" step="0.01" name="tax_rate" class="form-control" value="<?= htmlspecialchars(get_setting('tax_rate', '8.5')) ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Operating Hours & Booking Rules -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h6 class="card-title fw-bold mb-0"><i class="fas fa-clock text-primary me-2"></i>Operating Hours &amp; Booking Rules</h6>
                    <span class="badge bg-success-subtle text-success fw-semibold">Schedule</span>
                </div>
                <div class="card-body">
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

                    <div class="mb-2">
                        <label class="form-label fw-semibold">Online Appointment Confirmation</label>
                        <select name="auto_confirm_booking" class="form-select">
                            <option value="0" <?= get_setting('auto_confirm_booking') == '0' ? 'selected' : '' ?>>Manual Staff Confirmation (Requires Approval)</option>
                            <option value="1" <?= get_setting('auto_confirm_booking') == '1' ? 'selected' : '' ?>>Instant Automatic Confirmation</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. Social Media Channels -->
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

        <!-- 6. Active Subscription Plan & Template Architecture (NO Template Switcher, NO Upgrade/Downgrade) -->
        <div class="col-12">
            <div class="card border-0 shadow-sm border-start border-4 border-success">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-8 mb-3 mb-lg-0">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge bg-success bg-opacity-10 text-success border border-success fw-bold px-3 py-1">
                                    <i class="fas fa-check-circle me-1"></i>Active Subscription
                                </span>
                                <span class="badge bg-light text-dark border fw-semibold">
                                    <i class="fas fa-layer-group text-primary me-1"></i><?= htmlspecialchars($tpl_label) ?> (Layout <?= htmlspecialchars($active_layout) ?>)
                                </span>
                            </div>
                            <h5 class="fw-bold text-dark mb-1"><?= htmlspecialchars($plan_title) ?></h5>
                            <p class="text-muted small mb-2">
                                Your website theme architecture and edition modules are provisioned exclusively for <strong><?= htmlspecialchars($registered_domain) ?></strong>. Template switching and tier modifications are locked to preserve your custom catalog and database integrity.
                            </p>
                            <div class="d-flex flex-wrap gap-4 text-secondary small">
                                <div><i class="far fa-calendar-alt text-primary me-1"></i><strong>Current Expiry:</strong> <?= date('d M Y', strtotime($subscription_expiry)) ?></div>
                                <div><i class="fas fa-shield-alt text-success me-1"></i><strong>Status:</strong> Active &amp; Verified</div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <button type="button" class="btn btn-success btn-lg px-4 shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#renewPlanModal">
                                <i class="fas fa-sync-alt me-2"></i>Renew Plan
                            </button>
                            <div class="text-muted small mt-2">Extend your subscription before expiry</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="col-12 text-end pt-2 pb-4">
            <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm fw-bold">
                <i class="fas fa-save me-2"></i>Save All Settings
            </button>
        </div>
    </div>
</form>

<!-- Modal: Renew Plan (Strictly Renewal - No Upgrade/Downgrade) -->
<div class="modal fade" id="renewPlanModal" tabindex="-1" aria-labelledby="renewPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="<?= admin_url('settings/renew_plan') ?>" method="POST">
                <div class="modal-header bg-success text-white py-3">
                    <h5 class="modal-title fw-bold" id="renewPlanModalLabel">
                        <i class="fas fa-sync-alt me-2"></i>Renew Subscription Plan
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="p-3 bg-light rounded-3 mb-3 border">
                        <div class="small text-muted mb-1">Current Active Plan</div>
                        <h6 class="fw-bold text-dark mb-0"><?= htmlspecialchars($plan_title) ?></h6>
                        <small class="text-secondary"><?= htmlspecialchars($tpl_label) ?> (Layout <?= htmlspecialchars($active_layout) ?>) &bull; <?= htmlspecialchars($registered_domain) ?></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Select Renewal Period <span class="text-danger">*</span></label>
                        <div class="form-check p-3 border rounded-3 mb-2 bg-white">
                            <input class="form-check-input ms-0 me-3" type="radio" name="renewal_term" id="term1" value="1_year" checked>
                            <label class="form-check-label w-100" for="term1">
                                <div class="d-flex align-items-center justify-content-between">
                                    <strong>1 Year Renewal (Best Value)</strong>
                                    <span class="badge bg-success">12 Months</span>
                                </div>
                                <div class="text-muted small mt-1">Full 365-day extension from current expiry date.</div>
                            </label>
                        </div>

                        <div class="form-check p-3 border rounded-3 mb-2 bg-white">
                            <input class="form-check-input ms-0 me-3" type="radio" name="renewal_term" id="term2" value="6_months">
                            <label class="form-check-label w-100" for="term2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <strong>6 Months Extension</strong>
                                    <span class="badge bg-secondary">6 Months</span>
                                </div>
                                <div class="text-muted small mt-1">180-day extension from current expiry date.</div>
                            </label>
                        </div>

                        <div class="form-check p-3 border rounded-3 bg-white">
                            <input class="form-check-input ms-0 me-3" type="radio" name="renewal_term" id="term3" value="1_month">
                            <label class="form-check-label w-100" for="term3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <strong>1 Month Extension</strong>
                                    <span class="badge bg-light text-dark border">30 Days</span>
                                </div>
                                <div class="text-muted small mt-1">30-day extension from current expiry date.</div>
                            </label>
                        </div>
                    </div>

                    <div class="alert alert-success bg-success-subtle border-0 small text-success-emphasis mb-0">
                        <i class="fas fa-check-circle me-1"></i> Your current business data, custom services, blogs, appointments, and configuration will remain intact.
                    </div>
                </div>
                <div class="modal-footer border-top bg-light py-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm fw-bold px-4">
                        <i class="fas fa-check me-1"></i> Confirm &amp; Extend Plan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function onCurrencyChange(sel) {
    var opt = sel.options[sel.selectedIndex];
    var symbol = opt.getAttribute('data-symbol') || '$';
    var pos = opt.getAttribute('data-pos') || 'left';

    document.getElementById('currencySymbolInput').value = symbol;
    var posSelect = document.getElementById('currencyPosSelect');
    if (posSelect) {
        posSelect.value = pos;
    }
}
</script>
