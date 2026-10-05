<?php
$btype = get_business_type();
$act_c = isset($active_controller) ? strtolower($active_controller) : '';
$act_m = isset($active_method) ? strtolower($active_method) : '';
$user_name = isset($current_user->name) ? $current_user->name : 'Administrator';
$user_role = isset($current_user->role_name) ? $current_user->role_name : 'Admin';
?>
<!-- app sidebar start -->
<div id="app-sidebar" class="app-sidebar overflow-hidden">
    <div class="app-sidebar-wrapper">
        <!-- app sidebar header -->
        <div class="app-sidebar-header d-flex align-items-center justify-content-between">
            <a href="<?= admin_url('dashboard') ?>" class="app-sidebar-logo d-flex align-items-center">
                <img class="app-main-logo" style="max-height: 42px; max-width: 140px; object-fit: contain;" src="<?= function_exists('admin_logo_url') ? admin_logo_url() : admin_asset('img/logo/logo.png') ?>?v=<?= time() ?>" alt="<?= html_escape(get_setting('business_name', 'Logo')) ?>">
            </a>

            <button type="button" class="app-sidebar-close-btn app-sidebar-mobile-close d-xl-none">
                <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.6923 10.2857L6.53846 6M6.53846 6L10.6923 1.71429M6.53846 6L19 6M1 11L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>

        <!-- app sidebar menu -->
        <div id="app-sidebar-menu" class="app-sidebar-menu">
            <ul>
                <!-- Dashboard -->
                <?php $is_dash_active = ($act_c === 'dashboard'); ?>
                <li class="app-sidebar-menu-item <?= $is_dash_active ? 'active' : '' ?>">
                    <a href="<?= admin_url('dashboard') ?>" class="menu-link d-flex align-items-center <?= $is_dash_active ? 'menu-current' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.75" y="0.75" width="6.00021" height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5" />
                                <rect x="0.75" y="11.2499" width="6.00021" height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5" />
                                <rect x="9.74976" y="8.25" width="6.00021" height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5" />
                                <rect x="9.74976" y="0.75" width="6.00021" height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Dashboard</span>
                    </a>
                </li>

                <!-- Section: Bookings & Sales -->
                <li class="app-sidebar-menu-heading">
                    <span><span class="app-sidebar-menu-heading-line"></span>OPERATIONS</span>
                </li>

                <!-- Bookings -->
                <?php $is_appt_active = ($act_c === 'appointments' && $act_m !== 'calendar'); ?>
                <li class="app-sidebar-menu-item <?= $is_appt_active ? 'active' : '' ?>">
                    <a href="<?= admin_url('appointments') ?>" class="menu-link d-flex align-items-center <?= $is_appt_active ? 'menu-current' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1.5" y="2.75" width="14" height="12.5" rx="2" stroke="currentColor" stroke-width="1.5" />
                                <path d="M1.5 6.75H15.5" stroke="currentColor" stroke-width="1.5" />
                                <path d="M5 1.5V4M12 1.5V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.4" d="M5.5 10H8.5M5.5 12.5H11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Bookings</span>
                        <?php if (isset($pending_appointments_count) && $pending_appointments_count > 0): ?>
                            <span class="badge bg-warning rounded-pill me-2"><?= $pending_appointments_count ?></span>
                        <?php endif; ?>
                    </a>
                </li>

                <!-- Calendar View -->
                <?php $is_cal_active = ($act_c === 'appointments' && $act_m === 'calendar'); ?>
                <li class="app-sidebar-menu-item <?= $is_cal_active ? 'active' : '' ?>">
                    <a href="<?= admin_url('appointments/calendar') ?>" class="menu-link d-flex align-items-center <?= $is_cal_active ? 'menu-current' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1.5" y="2.75" width="14" height="12.5" rx="2" stroke="currentColor" stroke-width="1.5" />
                                <path d="M1.5 6.75H15.5" stroke="currentColor" stroke-width="1.5" />
                                <circle cx="5" cy="10.5" r="0.75" fill="currentColor" />
                                <circle cx="8.5" cy="10.5" r="0.75" fill="currentColor" />
                                <circle cx="12" cy="10.5" r="0.75" fill="currentColor" />
                                <path d="M5 1.5V4M12 1.5V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Calendar View</span>
                    </a>
                </li>

                <!-- Point of Sale (POS) -->
                <?php $is_pos_active = ($act_c === 'pos'); ?>
                <li class="app-sidebar-menu-item <?= $is_pos_active ? 'active' : '' ?>">
                    <a href="<?= admin_url('pos') ?>" class="menu-link d-flex align-items-center <?= $is_pos_active ? 'menu-current' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M2.89062 10.3899L10.3895 2.89099" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path opacity="0.4" d="M7.57812 12.9582L8.47812 12.0582" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path opacity="0.4" d="M9.59375 10.9404L11.3863 9.14795" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path opacity="0.4" d="M1.95095 6.92815L6.93095 1.94815C8.52095 0.358152 9.31595 0.350652 10.891 1.92565L14.5735 5.60815C16.1485 7.18315 16.141 7.97815 14.551 9.56815L9.57095 14.5482C7.98095 16.1382 7.18595 16.1457 5.61095 14.5707L1.92845 10.8882C0.353453 9.31315 0.353452 8.52565 1.95095 6.92815Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M0.75 15.7478H15.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Point of Sale</span>
                    </a>
                </li>

                <!-- Customers CRM -->
                <?php $is_cust_active = ($act_c === 'customers'); ?>
                <li class="app-sidebar-menu-item <?= $is_cust_active ? 'active' : '' ?>">
                    <a href="<?= admin_url('customers') ?>" class="menu-link d-flex align-items-center <?= $is_cust_active ? 'menu-current' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.94234 5.9423C7.37615 5.9423 8.53849 4.77997 8.53849 3.34615C8.53849 1.91234 7.37615 0.75 5.94234 0.75C4.50853 0.75 3.34619 1.91234 3.34619 3.34615C3.34619 4.77997 4.50853 5.9423 5.94234 5.9423Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.1346 14.5961H0.75V13.4423C0.75 12.0652 1.29704 10.7445 2.27079 9.77079C3.24453 8.79705 4.56521 8.25 5.9423 8.25C7.31938 8.25 8.64006 8.79705 9.6138 9.77079C10.5875 10.7445 11.1346 12.0652 11.1346 13.4423V14.5961Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.5576 0.75C11.2462 0.75 11.9065 1.02352 12.3934 1.5104C12.8802 1.99727 13.1538 2.65761 13.1538 3.34615C13.1538 4.03469 12.8802 4.69504 12.3934 5.18191C11.9065 5.66878 11.2462 5.9423 10.5576 5.9423" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.4038 8.46924C13.3867 8.84314 14.2329 9.50667 14.8304 10.372C15.4279 11.2374 15.7486 12.2638 15.75 13.3154V14.5962H14.0192" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Customers</span>
                    </a>
                </li>

                <!-- Section: Content & Services -->
                <li class="app-sidebar-menu-heading">
                    <span><span class="app-sidebar-menu-heading-line"></span>CONTENT & CATALOG</span>
                </li>

                <!-- Services Adding & Management Section -->
                <?php $is_srv_active = ($act_c === 'services'); ?>
                <li class="app-sidebar-menu-item <?= $is_srv_active ? 'active' : '' ?>">
                    <a href="<?= admin_url('services') ?>" class="menu-link d-flex align-items-center <?= $is_srv_active ? 'menu-current' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 1.5L10 6L14.5 7.5L10 9L8.5 13.5L7 9L2.5 7.5L7 6L8.5 1.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                <path opacity="0.4" d="M13.5 11.5L14.25 13.75L16.5 14.5L14.25 15.25L13.5 17.5L12.75 15.25L10.5 14.5L12.75 13.75L13.5 11.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Services</span>
                    </a>
                </li>

                <!-- Blogs Adding & Management Section -->
                <?php $is_blog_active = ($act_c === 'blogs'); ?>
                <li class="app-sidebar-menu-item <?= $is_blog_active ? 'active' : '' ?>">
                    <a href="<?= admin_url('blogs') ?>" class="menu-link d-flex align-items-center <?= $is_blog_active ? 'menu-current' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="13" height="13" rx="2" stroke="currentColor" stroke-width="1.5" />
                                <path d="M5 6H12M5 9H12M5 12H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Blogs</span>
                    </a>
                </li>

                <!-- Section: Website & Reports -->
                <li class="app-sidebar-menu-heading">
                    <span><span class="app-sidebar-menu-heading-line"></span>WEBSITE & ANALYTICS</span>
                </li>

                <!-- Configure Website (Hero Banner, Features, About Us, Testimonials, FAQs) -->
                <?php $is_cfg_active = ($act_c === 'configure_website' || ($act_c === 'website' && $act_m !== 'templates')); ?>
                <li class="app-sidebar-menu-item <?= $is_cfg_active ? 'active' : '' ?>">
                    <a href="<?= admin_url('configure_website') ?>" class="menu-link d-flex align-items-center <?= $is_cfg_active ? 'menu-current' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8.5" cy="8.5" r="7" stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.4" d="M1.5 8.5H15.5M8.5 1.5C10.5 4.5 11 6.5 11 8.5C11 10.5 10.5 12.5 8.5 15.5M8.5 1.5C6.5 4.5 6 6.5 6 8.5C6 10.5 6.5 12.5 8.5 15.5" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Configure Website</span>
                        <span class="badge bg-primary rounded-pill me-1" style="font-size:10px;">Visual</span>
                    </a>
                </li>

                <!-- Reports and Analytics -->
                <?php $is_rep_active = ($act_c === 'reports'); ?>
                <li class="app-sidebar-menu-item has-dropdown <?= $is_rep_active ? 'active open' : '' ?>">
                    <a href="javascript:void(0);" class="menu-link d-flex align-items-center <?= $is_rep_active ? 'active' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 14.5H15.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <rect opacity="0.4" x="3" y="8" width="2.5" height="5" rx="0.5" stroke="currentColor" stroke-width="1.2" />
                                <rect opacity="0.4" x="7.25" y="4.5" width="2.5" height="8.5" rx="0.5" stroke="currentColor" stroke-width="1.2" />
                                <rect opacity="0.4" x="11.5" y="2" width="2.5" height="11" rx="0.5" stroke="currentColor" stroke-width="1.2" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Reports & Analytics</span>
                        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <ul class="app-sidebar-submenu" <?= $is_rep_active ? 'style="display:block;"' : '' ?>>
                        <?php $is_rep_sales = ($act_c === 'reports' && in_array($act_m, array('sales', 'index', ''))); ?>
                        <li class="app-sidebar-menu-item <?= $is_rep_sales ? 'active' : '' ?>">
                            <a href="<?= admin_url('reports/sales') ?>" class="menu-link d-flex align-items-center <?= $is_rep_sales ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Sales Report</span></a>
                        </li>
                        <?php $is_rep_appt = ($act_c === 'reports' && $act_m === 'appointments'); ?>
                        <li class="app-sidebar-menu-item <?= $is_rep_appt ? 'active' : '' ?>">
                            <a href="<?= admin_url('reports/appointments') ?>" class="menu-link d-flex align-items-center <?= $is_rep_appt ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Appointment Analytics</span></a>
                        </li>
                    </ul>
                </li>

                <!-- Settings -->
                <?php $is_set_active = ($act_c === 'settings' || ($act_c === 'website' && $act_m === 'templates')); ?>
                <li class="app-sidebar-menu-item has-dropdown <?= $is_set_active ? 'active open' : '' ?>">
                    <a href="javascript:void(0);" class="menu-link d-flex align-items-center <?= $is_set_active ? 'active' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="2.5" stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.4" d="M8 1V3M8 13V15M1 8H3M13 8H15M3.05 3.05L4.46 4.46M11.54 11.54L12.95 12.95M3.05 12.95L4.46 11.54M11.54 4.46L12.95 3.05" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Settings</span>
                        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <ul class="app-sidebar-submenu" <?= $is_set_active ? 'style="display:block;"' : '' ?>>
                        <?php $is_set_gen = ($act_c === 'settings' && in_array($act_m, array('index', ''))); ?>
                        <li class="app-sidebar-menu-item <?= $is_set_gen ? 'active' : '' ?>">
                            <a href="<?= admin_url('settings') ?>" class="menu-link d-flex align-items-center <?= $is_set_gen ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">General Settings</span></a>
                        </li>
                        <li class="app-sidebar-menu-item <?= ($act_c === 'website' && $act_m === 'templates') ? 'active' : '' ?>">
                            <a href="<?= admin_url('website/templates') ?>" class="menu-link d-flex align-items-center <?= ($act_c === 'website' && $act_m === 'templates') ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Template Switcher</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- app sidebar menu end -->

        <!-- app sidebar footer start -->
        <div class="app-sidebar-footer">
            <div class="d-flex align-items-center gap-3">
                <div class="avatar rounded-pill bg-label-primary text-primary fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="width:36px;height:36px;">
                    <?= strtoupper(substr($user_name, 0, 1)) ?>
                </div>
                <div class="flex-grow-1 text-truncate" style="line-height:1.2;">
                    <h6 class="mb-0 fs-13px fw-semibold text-truncate"><?= html_escape($user_name) ?></h6>
                    <span class="text-muted fs-11px"><?= html_escape($user_role) ?></span>
                </div>
            </div>
            <div>
                <button class="dropdown-toggle hide-arrow btn btn-link p-0 text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg width="11" height="15" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.75 5.351L5.24 0.861002C5.2736 0.825912 5.31396 0.797988 5.35865 0.778911C5.40333 0.759835 5.45141 0.75 5.5 0.75C5.54859 0.75 5.59667 0.759835 5.64135 0.778911C5.68604 0.797988 5.7264 0.825912 5.76 0.861002L10.25 5.351" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M0.75 9.151L5.24 13.641C5.2736 13.6761 5.31396 13.704 5.35865 13.7231C5.40333 13.7422 5.45141 13.752 5.5 13.752C5.54859 13.752 5.59667 13.7422 5.64135 13.7231C5.68604 13.704 5.7264 13.6761 5.76 13.641L10.25 9.151" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 py-2">
                    <li><a class="dropdown-item py-2 d-flex align-items-center gap-2" href="<?= admin_url('settings') ?>"><i class="fa-solid fa-gear text-muted"></i> Settings</a></li>
                    <li><a class="dropdown-item py-2 d-flex align-items-center gap-2" href="<?= admin_url('configure_website') ?>"><i class="fa-solid fa-wand-magic-sparkles text-primary"></i> Configure Website</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li><a class="dropdown-item py-2 text-danger d-flex align-items-center gap-2" href="<?= admin_url('auth/logout') ?>"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a></li>
                </ul>
            </div>
        </div>
        <!-- app sidebar footer end -->
    </div>
</div>
<!-- app sidebar end -->
