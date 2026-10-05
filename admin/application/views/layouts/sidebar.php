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

                <!-- Section: Operations -->
                <li class="app-sidebar-menu-heading">
                    <span><span class="app-sidebar-menu-heading-line"></span>OPERATIONS</span>
                </li>

                <!-- Appointments -->
                <?php $is_appt_active = ($act_c === 'appointments'); ?>
                <li class="app-sidebar-menu-item has-dropdown <?= $is_appt_active ? 'active open' : '' ?>">
                    <a href="javascript:void(0);" class="menu-link d-flex align-items-center <?= $is_appt_active ? 'active' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="1.5" y="2.75" width="14" height="12.5" rx="2" stroke="currentColor" stroke-width="1.5" />
                                <path d="M1.5 6.75H15.5" stroke="currentColor" stroke-width="1.5" />
                                <path d="M5 1.5V4M12 1.5V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.4" d="M5.5 10H8.5M5.5 12.5H11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Appointments</span>
                        <?php if (isset($pending_appointments_count) && $pending_appointments_count > 0): ?>
                            <span class="badge bg-warning rounded-pill me-2"><?= $pending_appointments_count ?></span>
                        <?php endif; ?>
                        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <ul class="app-sidebar-submenu" <?= $is_appt_active ? 'style="display:block;"' : '' ?>>
                        <?php $is_appt_list = ($act_c === 'appointments' && ($act_m === 'index' || $act_m === '')); ?>
                        <li class="app-sidebar-menu-item <?= $is_appt_list ? 'active' : '' ?>">
                            <a href="<?= admin_url('appointments') ?>" class="menu-link d-flex align-items-center <?= $is_appt_list ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">All Bookings</span></a>
                        </li>
                        <?php $is_appt_cal = ($act_c === 'appointments' && $act_m === 'calendar'); ?>
                        <li class="app-sidebar-menu-item <?= $is_appt_cal ? 'active' : '' ?>">
                            <a href="<?= admin_url('appointments/calendar') ?>" class="menu-link d-flex align-items-center <?= $is_appt_cal ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Calendar View</span></a>
                        </li>
                        <?php $is_appt_create = ($act_c === 'appointments' && in_array($act_m, array('create', 'edit'))); ?>
                        <li class="app-sidebar-menu-item <?= $is_appt_create ? 'active' : '' ?>">
                            <a href="<?= admin_url('appointments/create') ?>" class="menu-link d-flex align-items-center <?= $is_appt_create ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">New Appointment</span></a>
                        </li>
                        <?php $is_appt_walkins = ($act_c === 'appointments' && $act_m === 'walkins'); ?>
                        <li class="app-sidebar-menu-item <?= $is_appt_walkins ? 'active' : '' ?>">
                            <a href="<?= admin_url('appointments/walkins') ?>" class="menu-link d-flex align-items-center <?= $is_appt_walkins ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Walk-ins & Queue</span></a>
                        </li>
                    </ul>
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
                        <span class="menu-title flex-grow-1">Point of Sale (POS)</span>
                    </a>
                </li>

                <!-- Invoices & Sales -->
                <?php $is_sales_active = ($act_c === 'sales'); ?>
                <li class="app-sidebar-menu-item <?= $is_sales_active ? 'active' : '' ?>">
                    <a href="<?= admin_url('sales') ?>" class="menu-link d-flex align-items-center <?= $is_sales_active ? 'menu-current' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.5962 4.21155H1.90385C1.26659 4.21155 0.75 4.72814 0.75 5.36539V13.4423C0.75 14.0796 1.26659 14.5962 1.90385 14.5962H14.5962C15.2334 14.5962 15.75 14.0796 15.75 13.4423V5.36539C15.75 4.72814 15.2334 4.21155 14.5962 4.21155Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M0.75 8.82692H15.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.25 7.67307V9.98076" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.7117 4.21153C11.7117 3.29348 11.347 2.41302 10.6978 1.76386C10.0486 1.1147 9.16817 0.75 8.25011 0.75V0.75C7.33206 0.75 6.4516 1.1147 5.80244 1.76386C5.15327 2.41302 4.78857 3.29348 4.78857 4.21153" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Invoices & Billing</span>
                    </a>
                </li>

                <!-- Customers CRM -->
                <?php $is_cust_active = ($act_c === 'customers'); ?>
                <li class="app-sidebar-menu-item has-dropdown <?= $is_cust_active ? 'active open' : '' ?>">
                    <a href="javascript:void(0);" class="menu-link d-flex align-items-center <?= $is_cust_active ? 'active' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.94234 5.9423C7.37615 5.9423 8.53849 4.77997 8.53849 3.34615C8.53849 1.91234 7.37615 0.75 5.94234 0.75C4.50853 0.75 3.34619 1.91234 3.34619 3.34615C3.34619 4.77997 4.50853 5.9423 5.94234 5.9423Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.1346 14.5961H0.75V13.4423C0.75 12.0652 1.29704 10.7445 2.27079 9.77079C3.24453 8.79705 4.56521 8.25 5.9423 8.25C7.31938 8.25 8.64006 8.79705 9.6138 9.77079C10.5875 10.7445 11.1346 12.0652 11.1346 13.4423V14.5961Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.5576 0.75C11.2462 0.75 11.9065 1.02352 12.3934 1.5104C12.8802 1.99727 13.1538 2.65761 13.1538 3.34615C13.1538 4.03469 12.8802 4.69504 12.3934 5.18191C11.9065 5.66878 11.2462 5.9423 10.5576 5.9423" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.4038 8.46924C13.3867 8.84314 14.2329 9.50667 14.8304 10.372C15.4279 11.2374 15.7486 12.2638 15.75 13.3154V14.5962H14.0192" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Customers CRM</span>
                        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <ul class="app-sidebar-submenu" <?= $is_cust_active ? 'style="display:block;"' : '' ?>>
                        <?php $is_cust_list = ($act_c === 'customers' && ($act_m === 'index' || $act_m === '')); ?>
                        <li class="app-sidebar-menu-item <?= $is_cust_list ? 'active' : '' ?>">
                            <a href="<?= admin_url('customers') ?>" class="menu-link d-flex align-items-center <?= $is_cust_list ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Customer List</span></a>
                        </li>
                        <?php $is_cust_create = ($act_c === 'customers' && in_array($act_m, array('create', 'edit', 'view'))); ?>
                        <li class="app-sidebar-menu-item <?= $is_cust_create ? 'active' : '' ?>">
                            <a href="<?= admin_url('customers/create') ?>" class="menu-link d-flex align-items-center <?= $is_cust_create ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Add Customer</span></a>
                        </li>
                        <?php $is_cust_groups = ($act_c === 'customers' && $act_m === 'groups'); ?>
                        <li class="app-sidebar-menu-item <?= $is_cust_groups ? 'active' : '' ?>">
                            <a href="<?= admin_url('customers/groups') ?>" class="menu-link d-flex align-items-center <?= $is_cust_groups ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Customer Groups</span></a>
                        </li>
                    </ul>
                </li>

                <!-- Section: Management -->
                <li class="app-sidebar-menu-heading">
                    <span><span class="app-sidebar-menu-heading-line"></span>CATALOG & STAFF</span>
                </li>

                <!-- Services & Packages -->
                <?php $is_srv_active = ($act_c === 'services'); ?>
                <li class="app-sidebar-menu-item has-dropdown <?= $is_srv_active ? 'active open' : '' ?>">
                    <a href="javascript:void(0);" class="menu-link d-flex align-items-center <?= $is_srv_active ? 'active' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 1.5L10 6L14.5 7.5L10 9L8.5 13.5L7 9L2.5 7.5L7 6L8.5 1.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                <path opacity="0.4" d="M13.5 11.5L14.25 13.75L16.5 14.5L14.25 15.25L13.5 17.5L12.75 15.25L10.5 14.5L12.75 13.75L13.5 11.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Services & Packages</span>
                        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <ul class="app-sidebar-submenu" <?= $is_srv_active ? 'style="display:block;"' : '' ?>>
                        <?php $is_srv_list = ($act_c === 'services' && ($act_m === 'index' || $act_m === '' || in_array($act_m, array('create', 'edit')))); ?>
                        <li class="app-sidebar-menu-item <?= $is_srv_list ? 'active' : '' ?>">
                            <a href="<?= admin_url('services') ?>" class="menu-link d-flex align-items-center <?= $is_srv_list ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">All Services</span></a>
                        </li>
                        <?php $is_srv_cat = ($act_c === 'services' && $act_m === 'categories'); ?>
                        <li class="app-sidebar-menu-item <?= $is_srv_cat ? 'active' : '' ?>">
                            <a href="<?= admin_url('services/categories') ?>" class="menu-link d-flex align-items-center <?= $is_srv_cat ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Service Categories</span></a>
                        </li>
                        <?php $is_srv_pkg = ($act_c === 'services' && $act_m === 'packages'); ?>
                        <li class="app-sidebar-menu-item <?= $is_srv_pkg ? 'active' : '' ?>">
                            <a href="<?= admin_url('services/packages') ?>" class="menu-link d-flex align-items-center <?= $is_srv_pkg ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Packages</span></a>
                        </li>
                    </ul>
                </li>

                <!-- Staff Management -->
                <?php $is_staff_active = ($act_c === 'staff'); ?>
                <li class="app-sidebar-menu-item has-dropdown <?= $is_staff_active ? 'active open' : '' ?>">
                    <a href="javascript:void(0);" class="menu-link d-flex align-items-center <?= $is_staff_active ? 'active' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8.5" cy="5" r="3.25" stroke="currentColor" stroke-width="1.5" />
                                <path d="M2.5 14.5C2.5 11.7386 5.18629 9.5 8.5 9.5C11.8137 9.5 14.5 11.7386 14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.4" d="M7 9.5L8.5 12L10 9.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1"><?= ($btype === 'SPA') ? 'Therapists & Staff' : (($btype === 'SALON') ? 'Stylists & Staff' : 'Staff & Specialists') ?></span>
                        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <ul class="app-sidebar-submenu" <?= $is_staff_active ? 'style="display:block;"' : '' ?>>
                        <?php $is_staff_list = ($act_c === 'staff' && ($act_m === 'index' || $act_m === '' || in_array($act_m, array('create', 'edit')))); ?>
                        <li class="app-sidebar-menu-item <?= $is_staff_list ? 'active' : '' ?>">
                            <a href="<?= admin_url('staff') ?>" class="menu-link d-flex align-items-center <?= $is_staff_list ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Staff Directory</span></a>
                        </li>
                        <?php $is_staff_sched = ($act_c === 'staff' && $act_m === 'schedules'); ?>
                        <li class="app-sidebar-menu-item <?= $is_staff_sched ? 'active' : '' ?>">
                            <a href="<?= admin_url('staff/schedules') ?>" class="menu-link d-flex align-items-center <?= $is_staff_sched ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Work Schedules</span></a>
                        </li>
                        <?php $is_staff_comm = ($act_c === 'staff' && $act_m === 'commissions'); ?>
                        <li class="app-sidebar-menu-item <?= $is_staff_comm ? 'active' : '' ?>">
                            <a href="<?= admin_url('staff/commissions') ?>" class="menu-link d-flex align-items-center <?= $is_staff_comm ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Commissions</span></a>
                        </li>
                    </ul>
                </li>

                <!-- SPA Specific Modules -->
                <?php if (is_spa_enabled()): ?>
                <li class="app-sidebar-menu-heading">
                    <span><span class="app-sidebar-menu-heading-line"></span>SPA MODULES</span>
                </li>

                <?php $is_spa_active = ($act_c === 'spa'); ?>
                <li class="app-sidebar-menu-item has-dropdown <?= $is_spa_active ? 'active open' : '' ?>">
                    <a href="javascript:void(0);" class="menu-link d-flex align-items-center <?= $is_spa_active ? 'active' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 2C8.5 2 4.5 5.5 4.5 9.5C4.5 11.7091 6.29086 13.5 8.5 13.5C10.7091 13.5 12.5 11.7091 12.5 9.5C12.5 5.5 8.5 2 8.5 2Z" stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.4" d="M1.5 15.5H15.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1 fw-semibold">Spa & Treatment Rooms</span>
                        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <ul class="app-sidebar-submenu" <?= $is_spa_active ? 'style="display:block;"' : '' ?>>
                        <?php $is_spa_rooms = ($act_c === 'spa' && $act_m === 'rooms'); ?>
                        <li class="app-sidebar-menu-item <?= $is_spa_rooms ? 'active' : '' ?>">
                            <a href="<?= admin_url('spa/rooms') ?>" class="menu-link d-flex align-items-center <?= $is_spa_rooms ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Treatment Rooms</span></a>
                        </li>
                        <?php $is_spa_sched = ($act_c === 'spa' && $act_m === 'schedule'); ?>
                        <li class="app-sidebar-menu-item <?= $is_spa_sched ? 'active' : '' ?>">
                            <a href="<?= admin_url('spa/schedule') ?>" class="menu-link d-flex align-items-center <?= $is_spa_sched ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Room Schedule & Conflicts</span></a>
                        </li>
                        <?php $is_spa_sess = ($act_c === 'spa' && $act_m === 'sessions'); ?>
                        <li class="app-sidebar-menu-item <?= $is_spa_sess ? 'active' : '' ?>">
                            <a href="<?= admin_url('spa/sessions') ?>" class="menu-link d-flex align-items-center <?= $is_spa_sess ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Spa Sessions</span></a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- Section: Inventory & Finance -->
                <li class="app-sidebar-menu-heading">
                    <span><span class="app-sidebar-menu-heading-line"></span>STOCK & FINANCE</span>
                </li>

                <!-- Inventory -->
                <?php $is_inv_active = ($act_c === 'inventory'); ?>
                <li class="app-sidebar-menu-item has-dropdown <?= $is_inv_active ? 'active open' : '' ?>">
                    <a href="javascript:void(0);" class="menu-link d-flex align-items-center <?= $is_inv_active ? 'active' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 1.5L15 4.75V11.25L8.5 15.5L2 11.25V4.75L8.5 1.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                <path opacity="0.4" d="M8.5 1.5V15.5" stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.4" d="M15 4.75L8.5 8.5L2 4.75" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Inventory</span>
                        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <ul class="app-sidebar-submenu" <?= $is_inv_active ? 'style="display:block;"' : '' ?>>
                        <?php $is_inv_prod = ($act_c === 'inventory' && in_array($act_m, array('products', 'index', 'create', 'edit', ''))); ?>
                        <li class="app-sidebar-menu-item <?= $is_inv_prod ? 'active' : '' ?>">
                            <a href="<?= admin_url('inventory/products') ?>" class="menu-link d-flex align-items-center <?= $is_inv_prod ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Products Master</span></a>
                        </li>
                        <?php $is_inv_cat = ($act_c === 'inventory' && $act_m === 'categories'); ?>
                        <li class="app-sidebar-menu-item <?= $is_inv_cat ? 'active' : '' ?>">
                            <a href="<?= admin_url('inventory/categories') ?>" class="menu-link d-flex align-items-center <?= $is_inv_cat ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Product Categories</span></a>
                        </li>
                        <?php $is_inv_adj = ($act_c === 'inventory' && $act_m === 'adjustments'); ?>
                        <li class="app-sidebar-menu-item <?= $is_inv_adj ? 'active' : '' ?>">
                            <a href="<?= admin_url('inventory/adjustments') ?>" class="menu-link d-flex align-items-center <?= $is_inv_adj ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Stock Adjustments</span></a>
                        </li>
                        <?php $is_inv_supp = ($act_c === 'inventory' && $act_m === 'suppliers'); ?>
                        <li class="app-sidebar-menu-item <?= $is_inv_supp ? 'active' : '' ?>">
                            <a href="<?= admin_url('inventory/suppliers') ?>" class="menu-link d-flex align-items-center <?= $is_inv_supp ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Suppliers</span></a>
                        </li>
                    </ul>
                </li>

                <!-- Finance & Expenses -->
                <?php $is_fin_active = ($act_c === 'finance'); ?>
                <li class="app-sidebar-menu-item has-dropdown <?= $is_fin_active ? 'active open' : '' ?>">
                    <a href="javascript:void(0);" class="menu-link d-flex align-items-center <?= $is_fin_active ? 'active' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8.5" cy="8.5" r="7" stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.4" d="M8.5 4.5V12.5M6 6.5C6 5.5 7 5 8.5 5C10 5 11 5.5 11 7C11 9 6 8.5 6 10.5C6 12 7 12 8.5 12C10 12 11 11.5 11 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Finance & Expenses</span>
                        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <ul class="app-sidebar-submenu" <?= $is_fin_active ? 'style="display:block;"' : '' ?>>
                        <?php $is_fin_exp = ($act_c === 'finance' && in_array($act_m, array('expenses', 'index', ''))); ?>
                        <li class="app-sidebar-menu-item <?= $is_fin_exp ? 'active' : '' ?>">
                            <a href="<?= admin_url('finance/expenses') ?>" class="menu-link d-flex align-items-center <?= $is_fin_exp ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Expenses</span></a>
                        </li>
                        <?php $is_fin_cash = ($act_c === 'finance' && $act_m === 'cash_register'); ?>
                        <li class="app-sidebar-menu-item <?= $is_fin_cash ? 'active' : '' ?>">
                            <a href="<?= admin_url('finance/cash_register') ?>" class="menu-link d-flex align-items-center <?= $is_fin_cash ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Cash Register</span></a>
                        </li>
                    </ul>
                </li>

                <!-- Reports -->
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
                        <?php $is_rep_staff = ($act_c === 'reports' && $act_m === 'staff'); ?>
                        <li class="app-sidebar-menu-item <?= $is_rep_staff ? 'active' : '' ?>">
                            <a href="<?= admin_url('reports/staff') ?>" class="menu-link d-flex align-items-center <?= $is_rep_staff ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Staff Performance</span></a>
                        </li>
                        <?php $is_rep_inv = ($act_c === 'reports' && $act_m === 'inventory'); ?>
                        <li class="app-sidebar-menu-item <?= $is_rep_inv ? 'active' : '' ?>">
                            <a href="<?= admin_url('reports/inventory') ?>" class="menu-link d-flex align-items-center <?= $is_rep_inv ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Inventory Valuation</span></a>
                        </li>
                    </ul>
                </li>

                <!-- Section: Website & System -->
                <li class="app-sidebar-menu-heading">
                    <span><span class="app-sidebar-menu-heading-line"></span>SYSTEM & WEBSITE</span>
                </li>

                <!-- Website CMS -->
                <?php $is_web_active = ($act_c === 'website'); ?>
                <li class="app-sidebar-menu-item has-dropdown <?= $is_web_active ? 'active open' : '' ?>">
                    <a href="javascript:void(0);" class="menu-link d-flex align-items-center <?= $is_web_active ? 'active' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8.5" cy="8.5" r="7" stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.4" d="M1.5 8.5H15.5M8.5 1.5C10.5 4.5 11 6.5 11 8.5C11 10.5 10.5 12.5 8.5 15.5M8.5 1.5C6.5 4.5 6 6.5 6 8.5C6 10.5 6.5 12.5 8.5 15.5" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Website CMS</span>
                        <?php if (isset($unread_messages_count) && $unread_messages_count > 0): ?>
                            <span class="badge bg-danger rounded-pill me-2"><?= $unread_messages_count ?></span>
                        <?php endif; ?>
                        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <ul class="app-sidebar-submenu" <?= $is_web_active ? 'style="display:block;"' : '' ?>>
                        <?php $is_web_banner = ($act_c === 'website' && in_array($act_m, array('banners', 'index', ''))); ?>
                        <li class="app-sidebar-menu-item <?= $is_web_banner ? 'active' : '' ?>">
                            <a href="<?= admin_url('website/banners') ?>" class="menu-link d-flex align-items-center <?= $is_web_banner ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Hero Banners</span></a>
                        </li>
                        <?php $is_web_gal = ($act_c === 'website' && $act_m === 'gallery'); ?>
                        <li class="app-sidebar-menu-item <?= $is_web_gal ? 'active' : '' ?>">
                            <a href="<?= admin_url('website/gallery') ?>" class="menu-link d-flex align-items-center <?= $is_web_gal ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Photo Gallery</span></a>
                        </li>
                        <?php $is_web_testi = ($act_c === 'website' && $act_m === 'testimonials'); ?>
                        <li class="app-sidebar-menu-item <?= $is_web_testi ? 'active' : '' ?>">
                            <a href="<?= admin_url('website/testimonials') ?>" class="menu-link d-flex align-items-center <?= $is_web_testi ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Testimonials</span></a>
                        </li>
                        <?php $is_web_pages = ($act_c === 'website' && $act_m === 'pages'); ?>
                        <li class="app-sidebar-menu-item <?= $is_web_pages ? 'active' : '' ?>">
                            <a href="<?= admin_url('website/pages') ?>" class="menu-link d-flex align-items-center <?= $is_web_pages ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">CMS Pages</span></a>
                        </li>
                        <?php $is_web_msg = ($act_c === 'website' && $act_m === 'messages'); ?>
                        <li class="app-sidebar-menu-item <?= $is_web_msg ? 'active' : '' ?>">
                            <a href="<?= admin_url('website/messages') ?>" class="menu-link d-flex align-items-center <?= $is_web_msg ? 'menu-current' : '' ?>">
                                <span class="menu-title flex-grow-1">Contact Messages</span>
                                <?php if (isset($unread_messages_count) && $unread_messages_count > 0): ?>
                                    <span class="badge bg-danger rounded-pill"><?= $unread_messages_count ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php $is_web_tpl = ($act_c === 'website' && $act_m === 'templates'); ?>
                        <li class="app-sidebar-menu-item <?= $is_web_tpl ? 'active' : '' ?>">
                            <a href="<?= admin_url('website/templates') ?>" class="menu-link d-flex align-items-center <?= $is_web_tpl ? 'menu-current' : '' ?>">
                                <span class="menu-title flex-grow-1 fw-semibold">Multi-Template Switcher</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Marketplace / Addons -->
                <?php $is_mkt_active = ($act_c === 'marketplace'); ?>
                <li class="app-sidebar-menu-item <?= $is_mkt_active ? 'active' : '' ?>">
                    <a href="<?= admin_url('marketplace') ?>" class="menu-link d-flex align-items-center <?= $is_mkt_active ? 'menu-current' : '' ?>">
                        <span class="menu-icon flex-shrink-0">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 5H14L15 14.5H2L3 5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                <path opacity="0.4" d="M6 7.5V4C6 2.61929 7.11929 1.5 8.5 1.5C9.88071 1.5 11 2.61929 11 4V7.5" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </span>
                        <span class="menu-title flex-grow-1">Marketplace / Addons</span>
                        <span class="badge bg-label-primary rounded-pill">New</span>
                    </a>
                </li>

                <!-- Settings -->
                <?php $is_set_active = ($act_c === 'settings'); ?>
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
                        <?php $is_set_type = ($act_c === 'settings' && $act_m === 'business_type'); ?>
                        <li class="app-sidebar-menu-item <?= $is_set_type ? 'active' : '' ?>">
                            <a href="<?= admin_url('settings/business_type') ?>" class="menu-link d-flex align-items-center <?= $is_set_type ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">Business Edition & Type</span></a>
                        </li>
                        <?php $is_set_sys = ($act_c === 'settings' && $act_m === 'system'); ?>
                        <li class="app-sidebar-menu-item <?= $is_set_sys ? 'active' : '' ?>">
                            <a href="<?= admin_url('settings/system') ?>" class="menu-link d-flex align-items-center <?= $is_set_sys ? 'menu-current' : '' ?>"><span class="menu-title flex-grow-1">System Info</span></a>
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
                    <li><a class="dropdown-item py-2 d-flex align-items-center gap-2" href="<?= admin_url('website/templates') ?>"><i class="fa-solid fa-palette text-primary"></i> Template Switcher</a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li><a class="dropdown-item py-2 text-danger d-flex align-items-center gap-2" href="<?= admin_url('auth/logout') ?>"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a></li>
                </ul>
            </div>
        </div>
        <!-- app sidebar footer end -->
    </div>
</div>
<!-- app sidebar end -->
