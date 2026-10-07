<!-- Page Header -->
<div class="page-header pb-7 d-flex flex-wrap align-items-center justify-content-between gap-4">
    <div>
        <h2 class="fw-semibold fs-7 mb-1 text-dark">Welcome back, <?= html_escape($current_user->name) ?>! 👋</h2>
        <div class="d-flex flex-wrap align-items-center gap-2 mt-1">
            <span class="text-custom-paragraph fz-13px">
                <?= html_escape(get_setting('business_name', 'Salon & Spa Management')) ?>
            </span>
            <span class="text-muted">&bull;</span>
            <?php if ($business_type === 'SALON'): ?>
                <span class="badge badge-label-danger rounded-pill px-3 py-1">
                    <i class="fa-solid fa-scissors me-1"></i> Salon Edition
                </span>
            <?php elseif ($business_type === 'SPA'): ?>
                <span class="badge badge-label-success rounded-pill px-3 py-1">
                    <i class="fa-solid fa-spa me-1"></i> Spa Edition
                </span>
            <?php else: ?>
                <span class="badge badge-label-primary rounded-pill px-3 py-1">
                    <i class="fa-solid fa-gem me-1"></i> Salon + Spa Unified
                </span>
            <?php endif; ?>
            <span class="text-muted">&bull;</span>
            <span class="badge badge-label-info rounded-pill px-3 py-1">
                <i class="fa-solid fa-desktop me-1"></i> <?= ucfirst(get_active_template()) ?> (Home <?= get_active_home_layout() ?>)
            </span>
        </div>
    </div>
    <div class="d-flex flex-wrap align-items-center gap-2">
        <a href="<?= admin_url('appointments/create') ?>" class="btn btn-primary rounded-pill shadow-custom d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-calendar-plus"></i>
            <span>New Booking</span>
        </a>
        <a href="<?= admin_url('pos') ?>" class="btn btn-label-primary rounded-pill shadow-sm d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-cash-register"></i>
            <span>POS Register</span>
        </a>
        <a href="<?= admin_url('website/templates') ?>" class="btn btn-outline-primary rounded-pill d-inline-flex align-items-center gap-2">
            <i class="fa-solid fa-palette"></i>
            <span>Website Themes</span>
        </a>
    </div>
</div>

<!-- KPI Summary Cards Row (Conca 6-Card Layout) -->
<div class="row row-cols-xxl-6 row-cols-xl-3 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 mb-6">
    <!-- 1. Today's Bookings -->
    <div class="col">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body p-6 position-relative">
                <div class="btn-icon bg-label-primary rounded-pill btn-lg mb-3">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.13462 3.51933C1.76739 3.51933 1.41521 3.66521 1.15554 3.92487C0.895879 4.18454 0.75 4.53672 0.75 4.90395V17.3655C0.75 17.7327 0.895879 18.0849 1.15554 18.3446C1.41521 18.6042 1.76739 18.7501 2.13462 18.7501H17.3654C17.7326 18.7501 18.0848 18.6042 18.3445 18.3446C18.6041 18.0849 18.75 17.7327 18.75 17.3655V4.90395C18.75 4.53672 18.6041 4.18454 18.3445 3.92487C18.0848 3.66521 17.7326 3.51933 17.3654 3.51933H14.5962M0.75 9.05773H18.75M4.90387 0.75V6.28846M14.5961 0.75V6.28846M4.90387 3.51933H11.8269" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="fz-12px fw-medium text-muted d-block">Today's Bookings</span>
                <h3 class="fs-9 h6 mb-1 fw-bold text-dark"><?= $today_appointments ?></h3>
                <div class="p-px-2 pr-px-10 border rounded-pill d-inline-flex align-items-center gap-2">
                    <span class="bg-label-primary px-px-8 py-px-1 rounded-pill d-inline-flex align-items-center gap-1 fz-12px fw-medium">
                        Queue
                    </span>
                    <span class="fz-12px fw-medium text-muted">
                        Active today
                    </span>
                </div>
                <div class="position-absolute top-9 end-3 p-1">
                    <img src="<?= admin_asset('img/icons/dashboard/chart-up.png') ?>" alt="trend">
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Today's Sales -->
    <div class="col">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body p-6 position-relative">
                <div class="btn-icon bg-label-success rounded-pill btn-lg mb-3">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M20 10V15C20 18 18 20 15 20H5C2 20 0 18 0 15V10C0 7.28 1.64 5.38 4.19 5.06C4.45 5.02 4.72 5 5 5H15C15.26 5 15.51 5.00999 15.75 5.04999C18.33 5.34999 20 7.26 20 10Z" fill="currentColor" />
                        <path d="M15.7514 5.05C15.5114 5.01 15.2614 5.00001 15.0014 5.00001H5.00141C4.72141 5.00001 4.45141 5.02001 4.19141 5.06001C4.33141 4.78001 4.53141 4.52001 4.77141 4.28001L8.02141 1.02C9.39141 -0.34 11.6114 -0.34 12.9814 1.02L14.7314 2.79002C15.3714 3.42002 15.7114 4.22 15.7514 5.05Z" fill="currentColor" />
                        <path d="M20 10.5H17C15.9 10.5 15 11.4 15 12.5C15 13.6 15.9 14.5 17 14.5H20" fill="currentColor" />
                    </svg>
                </div>
                <span class="fz-12px fw-medium text-muted d-block">Today's Sales</span>
                <h3 class="fs-9 h6 mb-1 fw-bold text-dark"><?= format_currency($today_sales) ?></h3>
                <div class="p-px-2 pr-px-10 border rounded-pill d-inline-flex align-items-center gap-2">
                    <span class="bg-label-success px-px-8 py-px-1 rounded-pill d-inline-flex align-items-center gap-1 fz-12px fw-medium">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 11V1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1 6L6 1L11 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Revenue
                    </span>
                    <span class="fz-12px fw-medium text-muted">
                        Collected
                    </span>
                </div>
                <div class="position-absolute top-9 end-3 p-1">
                    <img src="<?= admin_asset('img/icons/dashboard/chart-up.png') ?>" alt="trend">
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Pending Due -->
    <div class="col">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body p-6 position-relative">
                <div class="btn-icon bg-label-warning rounded-pill btn-lg mb-3">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 18.75C14.8325 18.75 18.75 14.8325 18.75 10C18.75 5.16751 14.8325 1.25 10 1.25C5.16751 1.25 1.25 5.16751 1.25 10C1.25 14.8325 5.16751 18.75 10 18.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 5V10.25L13.75 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="fz-12px fw-medium text-muted d-block">Pending Dues</span>
                <h3 class="fs-9 h6 mb-1 fw-bold text-dark"><?= format_currency($pending_payments) ?></h3>
                <div class="p-px-2 pr-px-10 border rounded-pill d-inline-flex align-items-center gap-2">
                    <span class="bg-label-warning px-px-8 py-px-1 rounded-pill d-inline-flex align-items-center gap-1 fz-12px fw-medium">
                        Due
                    </span>
                    <span class="fz-12px fw-medium text-muted">
                        Uncollected
                    </span>
                </div>
                <div class="position-absolute top-9 end-3 p-1">
                    <img src="<?= admin_asset('img/icons/dashboard/chart-down.png') ?>" alt="trend">
                </div>
            </div>
        </div>
    </div>

    <!-- 4. New Clients (Month) -->
    <div class="col">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body p-6 position-relative">
                <div class="btn-icon bg-label-info rounded-pill btn-lg mb-3">
                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.9508 10.5399C7.5008 10.5399 4.58984 11.1037 4.58984 13.2794C4.58984 15.4561 7.5196 16 10.9508 16C14.4008 16 17.3117 15.4362 17.3117 13.2605C17.3117 11.0839 14.382 10.5399 10.9508 10.5399Z" fill="currentColor" />
                        <path opacity="0.4" d="M10.9476 8.46703C13.2837 8.46703 15.1569 6.58307 15.1569 4.23351C15.1569 1.88306 13.2837 0 10.9476 0C8.61146 0 6.73828 1.88306 6.73828 4.23351C6.73828 6.58307 8.61146 8.46703 10.9476 8.46703Z" fill="currentColor" />
                        <path opacity="0.4" d="M20.0886 5.21926C20.693 2.84179 18.9209 0.706573 16.6645 0.706573C16.4192 0.706573 16.1846 0.73359 15.9554 0.779519C15.9249 0.786723 15.8909 0.802032 15.873 0.829049C15.8524 0.86327 15.8676 0.909199 15.89 0.938917C16.5678 1.89531 16.9573 3.05973 16.9573 4.3097C16.9573 5.50744 16.6001 6.62413 15.9733 7.5508C15.9088 7.64626 15.9661 7.77504 16.0798 7.79485C16.2374 7.82277 16.3986 7.83718 16.5634 7.84168C18.2064 7.88491 19.6811 6.82135 20.0886 5.21926Z" fill="currentColor" />
                    </svg>
                </div>
                <span class="fz-12px fw-medium text-muted d-block">New Clients (Mo.)</span>
                <h3 class="fs-9 h6 mb-1 fw-bold text-dark"><?= $new_customers ?></h3>
                <div class="p-px-2 pr-px-10 border rounded-pill d-inline-flex align-items-center gap-2">
                    <span class="bg-label-info px-px-8 py-px-1 rounded-pill d-inline-flex align-items-center gap-1 fz-12px fw-medium">
                        <?= $total_customers ?> total
                    </span>
                    <span class="fz-12px fw-medium text-muted">
                        Clients
                    </span>
                </div>
                <div class="position-absolute top-9 end-3 p-1">
                    <img src="<?= admin_asset('img/icons/dashboard/chart-up.png') ?>" alt="trend">
                </div>
            </div>
        </div>
    </div>

    <!-- 5. Completed Services Today -->
    <div class="col">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body p-6 position-relative">
                <div class="btn-icon rounded-pill btn-lg mb-3" style="background-color: rgba(115, 93, 255, 0.12); color: #735dff;">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.25 5L7.5 13.75L3.75 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.5" opacity="0.4"/>
                    </svg>
                </div>
                <span class="fz-12px fw-medium text-muted d-block">Completed Today</span>
                <h3 class="fs-9 h6 mb-1 fw-bold text-dark"><?= $completed_services ?></h3>
                <div class="p-px-2 pr-px-10 border rounded-pill d-inline-flex align-items-center gap-2">
                    <span class="px-px-8 py-px-1 rounded-pill d-inline-flex align-items-center gap-1 fz-12px fw-medium" style="background-color: rgba(115, 93, 255, 0.1); color: #735dff;">
                        Delivered
                    </span>
                    <span class="fz-12px fw-medium text-muted">
                        Services
                    </span>
                </div>
                <div class="position-absolute top-9 end-3 p-1">
                    <img src="<?= admin_asset('img/icons/dashboard/chart-up.png') ?>" alt="trend">
                </div>
            </div>
        </div>
    </div>

    <!-- 6. Low Stock Inventory Alert -->
    <div class="col">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body p-6 position-relative">
                <div class="btn-icon bg-label-danger rounded-pill btn-lg mb-3">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M15.75 6.75V14.25C15.75 15.0784 15.0784 15.75 14.25 15.75H3.75C2.92157 15.75 2.25 15.0784 2.25 14.25V6.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M16.5 4.5H1.5C1.08579 4.5 0.75 4.16421 0.75 3.75V3C0.75 2.58579 1.08579 2.25 1.5 2.25H16.5C16.9142 2.25 17.25 2.58579 17.25 3V3.75C17.25 4.16421 16.9142 4.5 16.5 4.5Z" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M7.5 8.25H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <span class="fz-12px fw-medium text-muted d-block">Low Stock Alert</span>
                <h3 class="fs-9 h6 mb-1 fw-bold text-dark"><?= $low_stock_count ?></h3>
                <div class="p-px-2 pr-px-10 border rounded-pill d-inline-flex align-items-center gap-2">
                    <?php if ($low_stock_count > 0): ?>
                        <span class="bg-label-danger px-px-8 py-px-1 rounded-pill d-inline-flex align-items-center gap-1 fz-12px fw-medium">
                            Reorder
                        </span>
                        <a href="<?= admin_url('inventory/products') ?>" class="fz-12px fw-medium text-danger text-decoration-none">
                            Action
                        </a>
                    <?php else: ?>
                        <span class="bg-label-success px-px-8 py-px-1 rounded-pill d-inline-flex align-items-center gap-1 fz-12px fw-medium">
                            Optimal
                        </span>
                        <span class="fz-12px fw-medium text-muted">
                            Sufficient
                        </span>
                    <?php endif; ?>
                </div>
                <div class="position-absolute top-9 end-3 p-1">
                    <img src="<?= admin_asset('img/icons/dashboard/chart-down.png') ?>" alt="trend">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row: Sales & Bookings Summary + Service Categories Donut -->
<div class="row gx-3 gy-6 mb-6">
    <!-- Sales & Bookings Trend (2-Series Conca Chart) -->
    <div class="col-xl-8">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body px-6 py-9">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-4 mb-6">
                    <div>
                        <h3 class="h6 mb-1 fs-5 fw-semibold text-dark">Revenue & Bookings Trend</h3>
                        <p class="text-custom-paragraph fz-13px mb-0">Monthly sales volume and customer appointments (Last 6 Months)</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge badge-label-primary rounded-pill px-3 py-1 fz-12px">
                            <i class="fa-solid fa-chart-line me-1"></i> 6-Month Trajectory
                        </span>
                        <a href="<?= admin_url('reports/sales') ?>" class="btn btn-outline-primary btn-sm rounded-pill fz-12px">
                            Full Report
                        </a>
                    </div>
                </div>
                <div id="salesSummaryChart" style="min-height: 270px;"></div>
            </div>
        </div>
    </div>

    <!-- Service Categories Share (Donut Chart) -->
    <div class="col-xl-4">
        <div class="card shadow-custom rounded-custom h-100">
            <div class="card-body px-6 py-9">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-4 mb-6">
                    <div>
                        <h3 class="h6 mb-1 fs-5 fw-semibold text-dark">Service Departments</h3>
                        <p class="text-custom-paragraph fz-13px mb-0">Distribution across active service categories</p>
                    </div>
                    <a href="<?= admin_url('services') ?>" class="btn btn-sm btn-outline-secondary rounded-pill fz-12px">
                        Services
                    </a>
                </div>
                <div id="serviceCategoryDonutChart" style="min-height: 250px;"></div>
                <div class="d-flex align-items-center justify-content-between pt-4 border-top mt-3 fz-12px text-muted">
                    <span><i class="fa-solid fa-circle-check text-success me-1"></i> Active Menu</span>
                    <span class="fw-semibold text-dark"><?= $total_services ?> Services Configured</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Multi-Edition & Multi-Template Quick Control Widget -->
<div class="card shadow-custom rounded-custom mb-6 border-start border-4 border-primary">
    <div class="card-body p-6">
        <div class="row align-items-center gy-4">
            <div class="col-xl-4 col-lg-5">
                <div class="d-flex align-items-center gap-3">
                    <div class="btn-icon bg-label-primary rounded-pill btn-lg flex-shrink-0">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div>
                        <span class="fz-12px text-muted fw-medium d-block">Active Business Edition</span>
                        <h4 class="h6 mb-0 fw-semibold text-dark">
                            <?php if ($business_type === 'SALON'): ?>
                                <i class="fa-solid fa-scissors text-danger me-1"></i> Salon Management Edition
                            <?php elseif ($business_type === 'SPA'): ?>
                                <i class="fa-solid fa-spa text-success me-1"></i> Spa Management Edition
                            <?php else: ?>
                                <i class="fa-solid fa-gem text-primary me-1"></i> Unified Salon & Spa Edition
                            <?php endif; ?>
                        </h4>
                        <span class="fz-12px text-muted">Single codebase &bull; self-hosted offline/online</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="btn-icon bg-label-info rounded-pill btn-lg flex-shrink-0">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2" y="3" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/>
                            <path d="M8 21H16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 17V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <span class="fz-12px text-muted fw-medium d-block">Active Website Template</span>
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="h6 mb-0 fw-semibold text-dark">
                                <?= (get_active_template() === 'template1') ? 'Template 1' : 'Template 2' ?>
                            </h4>
                            <span class="badge badge-label-info rounded-pill fz-11px">Layout <?= get_active_home_layout() ?> of 3</span>
                        </div>
                        <span class="fz-12px text-muted">Website bookings automatically sync with operations</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 text-lg-end">
                <div class="d-flex flex-wrap align-items-center justify-content-lg-end gap-2">
                    <a href="<?= website_url() ?>" target="_blank" class="btn btn-outline-dark btn-sm rounded-pill d-inline-flex align-items-center gap-1">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        <span>Live Preview</span>
                    </a>
                    <a href="<?= admin_url('website/templates') ?>" class="btn btn-primary btn-sm rounded-pill d-inline-flex align-items-center gap-1">
                        <i class="fa-solid fa-sliders"></i>
                        <span>Change Theme</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Today's Appointments Table (Conca Pure-Card Container) -->
<div class="pure-card rounded-custom card-bg shadow-custom mb-6">
    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-4">
        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
            <span class="text-primary d-flex align-items-center">
                <svg width="22" height="22" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.13462 3.51933C1.76739 3.51933 1.41521 3.66521 1.15554 3.92487C0.895879 4.18454 0.75 4.53672 0.75 4.90395V17.3655C0.75 17.7327 0.895879 18.0849 1.15554 18.3446C1.41521 18.6042 1.76739 18.7501 2.13462 18.7501H17.3654C17.7326 18.7501 18.0848 18.6042 18.3445 18.3446C18.6041 18.0849 18.75 17.7327 18.75 17.3655V4.90395C18.75 4.53672 18.6041 4.18454 18.3445 3.92487C18.0848 3.66521 17.7326 3.51933 17.3654 3.51933H14.5962M0.75 9.05773H18.75M4.90387 0.75V6.28846M14.5961 0.75V6.28846M4.90387 3.51933H11.8269" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span>Today's Appointments Queue (<?= date('l, d M Y') ?>)</span>
            <span class="badge badge-label-primary rounded-pill ms-2"><?= count($today_appointments_list) ?> bookings</span>
        </h3>

        <div class="d-flex align-items-center gap-2">
            <a href="<?= admin_url('appointments/create') ?>" class="btn btn-sm btn-primary rounded-pill d-inline-flex align-items-center gap-1">
                <i class="fa-solid fa-plus"></i>
                <span>New Booking</span>
            </a>
            <a href="<?= admin_url('appointments') ?>" class="btn btn-sm btn-outline-secondary rounded-pill">
                View All
            </a>
        </div>
    </div>

    <div class="pure-card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-6">Appointment #</th>
                        <th>Time Slot</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th class="text-end pe-6">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($today_appointments_list)): ?>
                        <?php foreach ($today_appointments_list as $apt): ?>
                            <tr>
                                <td class="ps-6">
                                    <a href="<?= admin_url('appointments/view/' . $apt->id) ?>" class="text-primary fw-semibold text-decoration-none">
                                        <?= html_escape($apt->appointment_number) ?>
                                    </a>
                                    <?php if ($apt->booking_source === 'online'): ?>
                                        <span class="badge badge-label-info fz-11px ms-1 rounded-pill">Online</span>
                                    <?php else: ?>
                                        <span class="badge badge-label-secondary fz-11px ms-1 rounded-pill">Walk-in</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark fz-14px">
                                        <i class="fa-regular fa-clock text-muted me-1"></i>
                                        <?= date('h:i A', strtotime($apt->start_time)) ?> - <?= date('h:i A', strtotime($apt->end_time)) ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-md rounded-pill me-3 bg-label-primary d-flex align-items-center justify-content-center fw-semibold text-primary" style="width: 36px; height: 36px;">
                                            <?= strtoupper(substr($apt->customer_name ?: 'C', 0, 1)) ?>
                                        </div>
                                        <div>
                                            <div class="fw-semibold text-dark fz-14px"><?= html_escape($apt->customer_name) ?></div>
                                            <span class="text-muted fz-12px"><?= html_escape($apt->customer_phone) ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold text-dark fz-14px"><?= format_currency($apt->final_amount) ?></span>
                                </td>
                                <td><?= appointment_status_badge($apt->status) ?></td>
                                <td class="text-end pe-6">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" data-bs-boundary="body" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                            <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-custom">
                                            <li>
                                                <a class="dropdown-item fz-13px" href="<?= admin_url('appointments/view/' . $apt->id) ?>">
                                                    <i class="fa-regular fa-eye me-2 text-primary"></i> View Details
                                                </a>
                                            </li>
                                            <?php if ($apt->status === 'pending'): ?>
                                                <li>
                                                    <a class="dropdown-item fz-13px text-success" href="<?= admin_url('appointments/change_status/' . $apt->id . '/confirmed') ?>">
                                                        <i class="fa-solid fa-check me-2"></i> Confirm Booking
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if (in_array($apt->status, array('pending', 'confirmed'))): ?>
                                                <li>
                                                    <a class="dropdown-item fz-13px text-info" href="<?= admin_url('appointments/change_status/' . $apt->id . '/in_service') ?>">
                                                        <i class="fa-solid fa-person-booth me-2"></i> Mark In-Service
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($apt->status === 'in_service' || $apt->status === 'confirmed'): ?>
                                                <li>
                                                    <a class="dropdown-item fz-13px text-success fw-semibold" href="<?= admin_url('pos?appointment_id=' . $apt->id) ?>">
                                                        <i class="fa-solid fa-cash-register me-2"></i> Checkout (POS)
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a class="dropdown-item fz-13px text-danger" href="<?= admin_url('appointments/change_status/' . $apt->id . '/cancelled') ?>" onclick="return confirm('Cancel this appointment?');">
                                                    <i class="fa-solid fa-ban me-2"></i> Cancel Booking
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-6 text-muted">
                                <div class="btn-icon bg-label-primary rounded-pill btn-lg mb-3 mx-auto">
                                    <i class="fa-regular fa-calendar-check fs-4"></i>
                                </div>
                                <h5 class="fz-15px fw-semibold text-dark mb-1">No appointments scheduled for today</h5>
                                <p class="text-muted fz-13px mb-3">All clear! Add walk-ins or wait for online booking confirmations.</p>
                                <a href="<?= admin_url('appointments/create') ?>" class="btn btn-sm btn-primary rounded-pill">
                                    Book New Appointment
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bottom Section: Recent Invoices (7 cols) + Low Stock & Staff (5 cols) -->
<div class="row g-4">
    <!-- Recent Invoices & Sales -->
    <div class="col-xl-7">
        <div class="pure-card rounded-custom card-bg shadow-custom h-100">
            <div class="pure-card-header d-flex align-items-center justify-content-between gap-4">
                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                    <span class="text-success d-flex align-items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.6667 17.5V4.16667C16.6667 3.24619 15.9205 2.5 15 2.5H5C4.07953 2.5 3.33333 3.24619 3.33333 4.16667V17.5L6.66667 15.8333L10 17.5L13.3333 15.8333L16.6667 17.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.66667 6.66667H13.3333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M6.66667 10H13.3333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span>Recent Invoices & POS Sales</span>
                </h3>
                <a href="<?= admin_url('sales') ?>" class="btn btn-sm btn-outline-secondary rounded-pill">View All Sales</a>
            </div>

            <div class="pure-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-6">Invoice #</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Grand Total</th>
                                <th>Payment</th>
                                <th class="text-end pe-6">Receipt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recent_invoices)): ?>
                                <?php foreach ($recent_invoices as $inv): ?>
                                    <tr>
                                        <td class="ps-6">
                                            <a href="<?= admin_url('sales/invoice/' . $inv->id) ?>" class="text-primary fw-semibold text-decoration-none">
                                                <?= html_escape($inv->invoice_number) ?>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-dark fz-14px"><?= html_escape($inv->customer_name ?: 'Walk-in Customer') ?></span>
                                        </td>
                                        <td>
                                            <span class="text-muted fz-13px"><?= date('d M Y', strtotime($inv->invoice_date)) ?></span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-dark fz-14px"><?= format_currency($inv->grand_total) ?></span>
                                        </td>
                                        <td><?= payment_status_badge($inv->payment_status) ?></td>
                                        <td class="text-end pe-6">
                                            <div class="d-inline-flex gap-1">
                                                <a href="<?= admin_url('sales/invoice/' . $inv->id) ?>" class="btn btn-xs btn-icon btn-outline-primary rounded-pill" title="Print Invoice">
                                                    <i class="fa-solid fa-print"></i>
                                                </a>
                                                <a href="<?= admin_url('sales/receipt/' . $inv->id) ?>" target="_blank" class="btn btn-xs btn-icon btn-outline-success rounded-pill" title="Thermal POS Receipt">
                                                    <i class="fa-solid fa-receipt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted fz-13px">
                                        No sales transactions recorded yet.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Inventory Low Stock Alert & Staff Column -->
    <div class="col-xl-5">
        <!-- Low Stock Alert Card -->
        <div class="pure-card rounded-custom card-bg shadow-custom mb-4">
            <div class="pure-card-header d-flex align-items-center justify-content-between gap-4">
                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                    <span class="text-danger d-flex align-items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 1.25L18.75 16.25H1.25L10 1.25Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 7.5V11.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <circle cx="10" cy="14" r="0.75" fill="currentColor"/>
                        </svg>
                    </span>
                    <span>Low Stock Inventory</span>
                </h3>
                <a href="<?= admin_url('inventory/products') ?>" class="btn btn-xs btn-outline-secondary rounded-pill">Manage</a>
            </div>

            <div class="pure-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-6">Product</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th class="text-end pe-6">Alert Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($low_stock_products)): ?>
                                <?php foreach ($low_stock_products as $p): ?>
                                    <tr>
                                        <td class="ps-6 fw-semibold text-dark fz-13px"><?= html_escape($p->name) ?></td>
                                        <td>
                                            <span class="badge badge-label-secondary rounded-pill fz-11px"><?= html_escape($p->category_name) ?></span>
                                        </td>
                                        <td>
                                            <span class="badge badge-label-danger rounded-pill fw-semibold fz-12px">
                                                <?= $p->current_stock ?> <?= html_escape($p->unit_name) ?>
                                            </span>
                                        </td>
                                        <td class="text-end pe-6 text-muted fz-13px"><?= $p->min_alert_stock ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-success fz-13px">
                                        <i class="fa-solid fa-circle-check fs-4 d-block mb-1 text-success"></i>
                                        All inventory stocks are at healthy operational levels!
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ApexCharts Script: Sales Trend & Service Categories Donut -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // 1. Sales & Bookings Trend Dual-Series Chart
    var months = <?= $chart_months ?>;
    var sales = <?= $chart_sales ?>;
    var appointments = <?= $chart_appointments ?>;

    var salesOptions = {
        series: [
            {
                name: "Revenue (<?= get_setting('currency_symbol', '$') ?>)",
                type: 'area',
                data: sales
            },
            {
                name: "Bookings Count",
                type: 'line',
                data: appointments
            }
        ],
        chart: {
            height: 290,
            type: 'line',
            toolbar: { show: false },
            fontFamily: 'Inter, sans-serif'
        },
        colors: ['#5F4AFE', '#FF9500'],
        stroke: {
            curve: 'smooth',
            width: [2.5, 3]
        },
        fill: {
            type: ['gradient', 'solid'],
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.35,
                opacityTo: 0.05,
                stops: [20, 100]
            }
        },
        dataLabels: { enabled: false },
        grid: {
            borderColor: '#E7E7EA',
            strokeDashArray: 4
        },
        xaxis: {
            categories: months,
            labels: {
                style: {
                    colors: '#939397',
                    fontSize: '12px',
                    fontWeight: 500
                }
            },
            axisBorder: { show: false },
            axisTicks: { show: false }
        },
        yaxis: [
            {
                labels: {
                    formatter: function(val) {
                        return "<?= get_setting('currency_symbol', '$') ?>" + (val ? val.toFixed(0) : 0);
                    },
                    style: {
                        colors: '#939397',
                        fontSize: '12px',
                        fontWeight: 500
                    }
                }
            },
            {
                opposite: true,
                labels: {
                    formatter: function(val) {
                        return val ? val.toFixed(0) : 0;
                    },
                    style: {
                        colors: '#939397',
                        fontSize: '12px',
                        fontWeight: 500
                    }
                }
            }
        ],
        legend: {
            position: 'top',
            horizontalAlign: 'center',
            fontSize: '13px',
            fontWeight: 500,
            markers: { radius: 12 }
        },
        tooltip: {
            theme: 'light',
            shared: true,
            intersect: false
        }
    };

    var salesChartEl = document.querySelector("#salesSummaryChart");
    if (salesChartEl) {
        var salesChart = new ApexCharts(salesChartEl, salesOptions);
        salesChart.render();
    }

    // 2. Service Category Breakdown Donut Chart
    var catLabels = <?= $chart_cat_labels ?>;
    var catSeries = <?= $chart_cat_series ?>;

    var donutOptions = {
        series: catSeries,
        labels: catLabels,
        chart: {
            type: 'donut',
            height: 260,
            fontFamily: 'Inter, sans-serif'
        },
        colors: ["#735dff", "#ff5a29", "#0cc763", "#0ca3e7", "#ff9a13"],
        plotOptions: {
            pie: {
                donut: {
                    size: '68%',
                    labels: {
                        show: true,
                        total: {
                            show: true,
                            label: 'Services',
                            fontSize: '13px',
                            fontWeight: 600,
                            color: '#939397',
                            formatter: function (w) {
                                return w.globals.seriesTotals.reduce(function(a, b) {
                                    return a + b;
                                }, 0);
                            }
                        }
                    }
                }
            }
        },
        dataLabels: { enabled: false },
        legend: {
            position: 'bottom',
            fontSize: '12px',
            fontWeight: 500,
            markers: { radius: 12 }
        },
        stroke: { colors: ['transparent'] }
    };

    var donutChartEl = document.querySelector("#serviceCategoryDonutChart");
    if (donutChartEl) {
        var donutChart = new ApexCharts(donutChartEl, donutOptions);
        donutChart.render();
    }
});
</script>
