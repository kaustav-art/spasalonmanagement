<?php
$user_name = isset($current_user->name) ? $current_user->name : 'Super Admin';
$user_role = 'Super Admin';
$user_email = isset($current_user->email) ? $current_user->email : 'admin@spasalon.com';

// Super Admin Display Picture (DP)
$user_dp = admin_asset('img/avatar/10.jpg');
if (!empty($current_user->avatar) && file_exists(FCPATH . 'uploads/avatars/' . $current_user->avatar)) {
    $user_dp = base_url('uploads/avatars/' . $current_user->avatar);
}

$total_notif = (isset($pending_appointments_count) ? (int)$pending_appointments_count : 0) + (isset($unread_messages_count) ? (int)$unread_messages_count : 0);
?>
<!-- app header start -->
<div class="app-header bg-card py-2 px-4 px-md-6 d-flex align-items-center">
    <div class="row align-items-center w-100 gx-0">
        <!-- Header Left -->
        <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="app-header-left d-flex align-items-center">
                <button type="button" class="app-header-bar-btn app-sidebar-open-btn me-3 d-none d-xl-inline-block" title="Toggle Sidebar">
                    <span></span><span></span><span></span>
                </button>
                <button type="button" class="app-header-bar-btn app-sidebar-mobile-open d-xl-none me-3" title="Open Menu">
                    <span></span><span></span><span></span>
                </button>

                <!-- Quick Action Buttons -->
                <div class="d-flex align-items-center gap-2">
                    <a href="<?= website_url() ?>" target="_blank" class="btn btn-xs btn-outline-secondary d-flex align-items-center gap-1 rounded-pill px-3 py-1">
                        <i class="fa-solid fa-arrow-up-right-from-square fs-11px"></i> Website
                    </a>
                    <a href="<?= admin_url('pos') ?>" class="btn btn-xs btn-outline-secondary d-flex align-items-center gap-1 rounded-pill px-3 py-1">
                        <i class="fa-solid fa-cash-register fs-11px"></i> POS
                    </a>
                    <a href="<?= admin_url('appointments/create') ?>" class="btn btn-xs btn-primary d-flex align-items-center gap-1 rounded-pill px-3 py-1">
                        <i class="fa-solid fa-plus fs-11px"></i> Booking
                    </a>
                </div>
            </div>
        </div>

        <!-- Header Right: Only Notification and Super Admin DP -->
        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-6">
            <ul class="navbar-nav flex-row align-items-center justify-content-end">

                <!-- Notifications Dropdown (Kept as requested) -->
                <li class="header-nav-item me-3">
                    <a class="header-nav-link position-relative" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" title="Notifications">
                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.50407 16.1001H9.96007M0.75 6.73041C0.750662 5.56153 1.02941 4.40958 1.56323 3.36971C2.09704 2.32985 2.8706 1.43191 3.82 0.750061M16.714 6.73041C16.7133 5.56153 16.4346 4.40958 15.9008 3.36971C15.367 2.32985 14.5934 1.43191 13.644 0.750061M13.6439 6.88998C13.6439 5.58724 13.1264 4.33786 12.2052 3.41668C11.2841 2.4955 10.0347 1.97799 8.73193 1.97799C7.42919 1.97799 6.1798 2.4955 5.25862 3.41668C4.33744 4.33786 3.81993 5.58724 3.81993 6.88998V11.188C3.81993 11.6765 3.62586 12.145 3.28042 12.4905C2.93498 12.8359 2.46646 13.03 1.97793 13.03H15.4859C14.9974 13.03 14.5289 12.8359 14.1834 12.4905C13.838 12.145 13.6439 11.6765 13.6439 11.188V6.88998Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <?php if ($total_notif > 0): ?>
                            <span class="badge bg-danger rounded-pill header-icon-badge pulse pulse-danger">
                                <?= $total_notif ?>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xl py-0 shadow-lg border-0">
                        <div class="dropdown-header d-flex align-items-center justify-content-between border-bottom py-3">
                            <h6 class="mb-0 fw-semibold">Notifications</h6>
                            <span class="badge bg-label-primary rounded-pill"><?= $total_notif ?> Pending</span>
                        </div>
                        <div class="dropdown-body">
                            <div class="dropdown-list notification-list-scroll" style="max-height: 280px; overflow-y: auto;">
                                <?php if (isset($pending_appointments_count) && $pending_appointments_count > 0): ?>
                                <a href="<?= admin_url('appointments?status=pending') ?>" class="dropdown-item notification-list-item d-flex align-items-center m-0 w-100 py-3 border-bottom text-decoration-none">
                                    <div class="me-3 flex-shrink-0">
                                        <div class="avatar-text bg-label-warning text-warning d-flex align-items-center justify-content-center" style="width:38px;height:38px;border-radius:50%;">
                                            <i class="fa-regular fa-calendar-check fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-start">
                                        <p class="mb-0 fw-semibold text-dark"><?= $pending_appointments_count ?> Bookings Awaiting Action</p>
                                        <span class="text-muted fs-12px">Click to review pending appointments</span>
                                    </div>
                                </a>
                                <?php endif; ?>

                                <?php if (isset($unread_messages_count) && $unread_messages_count > 0): ?>
                                <a href="<?= admin_url('website/messages') ?>" class="dropdown-item notification-list-item d-flex align-items-center m-0 w-100 py-3 border-bottom text-decoration-none">
                                    <div class="me-3 flex-shrink-0">
                                        <div class="avatar-text bg-label-info text-info d-flex align-items-center justify-content-center" style="width:38px;height:38px;border-radius:50%;">
                                            <i class="fa-regular fa-envelope fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-start">
                                        <p class="mb-0 fw-semibold text-dark"><?= $unread_messages_count ?> Website Inquiries</p>
                                        <span class="text-muted fs-12px">New messages from public visitors</span>
                                    </div>
                                </a>
                                <?php endif; ?>

                                <?php if ($total_notif === 0): ?>
                                <div class="text-center py-4 text-muted fs-13px">
                                    <i class="fa-solid fa-circle-check text-success fs-3 d-block mb-2"></i>
                                    All notifications are up to date!
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="dropdown-footer border-top py-2 text-center">
                            <a href="<?= admin_url('appointments') ?>" class="text-decoration-none fs-13px fw-medium text-primary">
                                Manage All Bookings &rarr;
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Super Admin Display Picture (DP) Only -->
                <li class="header-nav-item header-user">
                    <a class="header-nav-link p-0 d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="dropdown" title="Super Admin Profile">
                        <img src="<?= $user_dp ?>" alt="Super Admin DP" width="38" height="38" class="rounded-circle shadow-sm border border-2 border-white" style="object-fit: cover;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg py-0 shadow-lg border-0">
                        <div class="dropdown-header d-flex align-items-center border-bottom py-3">
                            <div class="me-3 flex-shrink-0">
                                <div class="avatar avatar-md">
                                    <img src="<?= $user_dp ?>" alt="Super Admin DP" width="44" height="44" class="rounded-circle shadow-sm" style="object-fit: cover;">
                                </div>
                            </div>
                            <div class="flex-grow-1 text-start">
                                <h6 class="mb-0 fw-bold text-dark"><?= html_escape($user_name) ?></h6>
                                <span class="badge badge-label-primary rounded-pill fz-11px mt-1">Super Admin</span>
                                <div class="text-muted fz-12px mt-1"><?= html_escape($user_email) ?></div>
                            </div>
                        </div>
                        <div class="dropdown-body py-1">
                            <ul class="list-unstyled dropdown-list mb-0">
                                <li>
                                    <a class="dropdown-item fs-14px d-flex align-items-center gap-2 px-4 py-2" href="<?= admin_url('settings') ?>">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="2.5" stroke="currentColor" stroke-width="1.5" />
                                            <path opacity="0.4" d="M8 1V3M8 13V15M1 8H3M13 8H15M3.05 3.05L4.46 4.46M11.54 11.54L12.95 12.95M3.05 12.95L4.46 11.54M11.54 4.46L12.95 3.05" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                        Business Settings
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item fs-14px d-flex align-items-center gap-2 px-4 py-2" href="<?= admin_url('pos') ?>">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" d="M2.89062 10.3899L10.3895 2.89099" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M1.95095 6.92815L6.93095 1.94815C8.52095 0.358152 9.31595 0.350652 10.891 1.92565L14.5735 5.60815C16.1485 7.18315 16.141 7.97815 14.551 9.56815L9.57095 14.5482C7.98095 16.1382 7.18595 16.1457 5.61095 14.5707L1.92845 10.8882C0.353453 9.31315 0.353452 8.52565 1.95095 6.92815Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M0.75 15.7478H15.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        POS Terminal
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item fs-14px d-flex align-items-center gap-2 px-4 py-2" href="<?= website_url() ?>" target="_blank">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="2" y="3" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/>
                                            <path d="M8 21H16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            <path d="M12 17V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                        Website Frontend
                                    </a>
                                </li>
                                <li class="dropdown-divider my-1"></li>
                                <li>
                                    <a class="dropdown-item fs-14px d-flex align-items-center gap-2 px-4 py-2 text-danger" href="<?= admin_url('auth/logout') ?>">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.75 12.9375C10.6887 14.4808 9.40258 15.7912 7.6797 15.749C7.27887 15.7392 6.78344 15.5995 5.7926 15.32C3.40801 14.6474 1.33796 13.517 0.841296 10.9846C0.75 10.5191 0.75 9.99532 0.75 8.94771L0.75 7.55229C0.75 6.50468 0.75 5.98087 0.841296 5.51538C1.33796 2.98304 3.40801 1.85263 5.7926 1.18002C6.78345 0.900537 7.27887 0.760795 7.6797 0.750989C9.40257 0.708841 10.6887 2.01923 10.75 3.56251" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M15.7499 8.25008H6.58325M15.7499 8.25008C15.7499 7.66656 14.088 6.57636 13.6666 6.16675M15.7499 8.25008C15.7499 8.8336 14.088 9.92381 13.6666 10.3334" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- app header end -->
