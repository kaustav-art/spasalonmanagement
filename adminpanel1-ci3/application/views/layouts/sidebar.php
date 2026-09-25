<!-- app sidebar start -->
            <div id="app-sidebar" class="app-sidebar overflow-hidden">

                <div class="app-sidebar-wrapper">
                    <!-- app sidebar header -->
                    <div class="app-sidebar-header d-flex align-items-center justify-content-between">
                        <a href="<?= site_url('dashboard'); ?>" class="app-sidebar-logo">
                            <img class="app-main-logo logo-black" width="105" src="<?= base_url('assets/'); ?>img/logo/logo.png" alt="Conca">
                            <img class="app-main-logo logo-white d-none" width="105" src="<?= base_url('assets/'); ?>img/logo/logo-white.png" alt="Conca">
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
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.75" y="0.75" width="6.00021" height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5" />
                                            <rect x="0.75" y="11.2499" width="6.00021" height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5" />
                                            <rect x="9.74976" y="8.25" width="6.00021" height="7.5" rx="1.5" stroke="currentColor" stroke-width="1.5" />
                                            <rect x="9.74976" y="0.75" width="6.00021" height="4.5" rx="1.5" stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">
                                        Dashboard
                                        <span class="border-0 badge bg-danger rounded-pill ms-auto">5</span>
                                    </span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('dashboard'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Ecommerce</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('dashboard/academy'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Academy</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('dashboard/analytics'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Analytics</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('dashboard/crm'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">CRM</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('dashboard/hrm'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">HRM</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-heading">
                                <span>
                                    <span class="app-sidebar-menu-heading-line"></span>
                                    APPS
                                </span>
                            </li>
                            <li class="app-sidebar-menu-item">
                                <a href="<?= site_url('apps/chat'); ?>" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M13.5533 13.5524C11.2612 15.8448 7.86709 16.34 5.08957 15.0555C4.67954 14.8904 4.34337 14.757 4.02378 14.757C3.13362 14.7623 2.02563 15.6254 1.44978 15.0502C0.873921 14.4743 1.7377 13.3655 1.7377 12.4699C1.7377 12.1503 1.60957 11.8201 1.4445 11.4093C0.159379 8.63222 0.655337 5.23702 2.94745 2.9454C5.87345 0.018324 10.6273 0.0183241 13.5533 2.94465C16.4846 5.87625 16.4793 10.6261 13.5533 13.5524Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.2029 8.55969H11.2092" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.19507 8.55969H8.20137" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.18726 8.55969H5.19356" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Chat</span>
                                </a>
                            </li>
                            <li class="app-sidebar-menu-item">
                                <a href="<?= site_url('apps/pos'); ?>" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" d="M2.89062 10.3899L10.3895 2.89099" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M7.57812 12.9582L8.47812 12.0582" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M9.59375 10.9404L11.3863 9.14795" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M1.95095 6.92815L6.93095 1.94815C8.52095 0.358152 9.31595 0.350652 10.891 1.92565L14.5735 5.60815C16.1485 7.18315 16.141 7.97815 14.551 9.56815L9.57095 14.5482C7.98095 16.1382 7.18595 16.1457 5.61095 14.5707L1.92845 10.8882C0.353453 9.31315 0.353452 8.52565 1.95095 6.92815Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M0.75 15.7478H15.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">POS</span>
                                </a>
                            </li>

                            <li class="app-sidebar-menu-heading">
                                <span>
                                    <span class="app-sidebar-menu-heading-line"></span>
                                    PAGES
                                </span>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="13" height="17" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.55 6.75H1.95C1.28726 6.75 0.75 7.28726 0.75 7.95V15.15C0.75 15.8127 1.28726 16.35 1.95 16.35H11.55C12.2127 16.35 12.75 15.8127 12.75 15.15V7.95C12.75 7.28726 12.2127 6.75 11.55 6.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10.9498 6.75V4.95C10.9498 3.83609 10.5073 2.7678 9.71965 1.98015C8.932 1.1925 7.86371 0.75 6.7498 0.75C5.6359 0.75 4.56761 1.1925 3.77996 1.98015C2.9923 2.7678 2.5498 3.83609 2.5498 4.95V6.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6.7499 12.15C7.08127 12.15 7.3499 11.8814 7.3499 11.55C7.3499 11.2186 7.08127 10.95 6.7499 10.95C6.41853 10.95 6.1499 11.2186 6.1499 11.55C6.1499 11.8814 6.41853 12.15 6.7499 12.15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Authentications</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="#" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Login</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/login_basic'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Basic</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/login_cover'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Cover</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="#" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Register</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/register_basic'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Basic</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/register_cover'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Cover</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="#" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Verify Email</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/verify_mail_basic'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Basic</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/verify_mail_cover'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Cover</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="#" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Reset Password</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/reset_password_basic'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Basic</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/reset_password_cover'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Cover</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="#" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Forgot Password</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/forgot_password_basic'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Basic</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/forgot_password_cover'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Cover</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="#" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Two Step</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/two_step_basic'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Basic</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('auth/two_step_cover'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Cover</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="#" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Error Pages</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('errors/error_404'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">404 Error</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('errors/error_500'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">500 Error</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.24985 9.40384C9.84298 9.40384 11.1345 8.11236 11.1345 6.51923C11.1345 4.9261 9.84298 3.63461 8.24985 3.63461C6.65672 3.63461 5.36523 4.9261 5.36523 6.51923C5.36523 8.11236 6.65672 9.40384 8.24985 9.40384Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M3.32324 13.9038C3.83814 13.0587 4.56179 12.3602 5.42464 11.8755C6.28748 11.3908 7.2605 11.1362 8.25017 11.1362C9.23983 11.1362 10.2129 11.3908 11.0757 11.8755C11.9385 12.3602 12.6622 13.0587 13.1771 13.9038" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.25 15.75C12.3921 15.75 15.75 12.3921 15.75 8.25C15.75 4.10786 12.3921 0.75 8.25 0.75C4.10786 0.75 0.75 4.10786 0.75 8.25C0.75 12.3921 4.10786 15.75 8.25 15.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">User Profile</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('profile'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Profile</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('profile/projects'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Projects</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('profile/team'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Team</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('profile/connections'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Connections</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('profile/followers'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Followers</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('profile/activity'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Activity</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.5962 4.21155H1.90385C1.26659 4.21155 0.75 4.72814 0.75 5.36539V13.4423C0.75 14.0796 1.26659 14.5962 1.90385 14.5962H14.5962C15.2334 14.5962 15.75 14.0796 15.75 13.4423V5.36539C15.75 4.72814 15.2334 4.21155 14.5962 4.21155Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M0.75 8.82692H15.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.25 7.67307V9.98076" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.7117 4.21153C11.7117 3.29348 11.347 2.41302 10.6978 1.76386C10.0486 1.1147 9.16817 0.75 8.25011 0.75V0.75C7.33206 0.75 6.4516 1.1147 5.80244 1.76386C5.15327 2.41302 4.78857 3.29348 4.78857 4.21153" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Account</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('settings'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Settings</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('settings/billing'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Billing Plans</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('settings/notification'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Notifications</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('settings/connection'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Connections</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.94234 5.9423C7.37615 5.9423 8.53849 4.77997 8.53849 3.34615C8.53849 1.91234 7.37615 0.75 5.94234 0.75C4.50853 0.75 3.34619 1.91234 3.34619 3.34615C3.34619 4.77997 4.50853 5.9423 5.94234 5.9423Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.1346 14.5961H0.75V13.4423C0.75 12.0652 1.29704 10.7445 2.27079 9.77079C3.24453 8.79705 4.56521 8.25 5.9423 8.25C7.31938 8.25 8.64006 8.79705 9.6138 9.77079C10.5875 10.7445 11.1346 12.0652 11.1346 13.4423V14.5961Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10.5576 0.75C11.2462 0.75 11.9065 1.02352 12.3934 1.5104C12.8802 1.99727 13.1538 2.65761 13.1538 3.34615C13.1538 4.03469 12.8802 4.69504 12.3934 5.18191C11.9065 5.66878 11.2462 5.9423 10.5576 5.9423" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12.4038 8.46924C13.3867 8.84314 14.2329 9.50667 14.8304 10.372C15.4279 11.2374 15.7486 12.2638 15.75 13.3154V14.5962H14.0192" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Users</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('users'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Users List</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('users/add'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Create User</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('users/view'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">View User</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.346 7.12576H1.91907C1.75328 7.12435 1.58913 7.15852 1.43767 7.22596C1.28622 7.2934 1.15099 7.39255 1.04112 7.5167C0.931244 7.64086 0.849281 7.78714 0.800759 7.94567C0.752236 8.10421 0.738284 8.2713 0.759843 8.43569L1.60608 14.8114C1.64286 15.0921 1.78106 15.3496 1.9946 15.5354C2.20814 15.7211 2.48227 15.8224 2.76531 15.82H13.4766C13.7596 15.8224 14.0337 15.7211 14.2473 15.5354C14.4608 15.3496 14.599 15.0921 14.6358 14.8114L15.482 8.43569C15.5033 8.27324 15.49 8.10812 15.4428 7.95121C15.3956 7.7943 15.3158 7.64918 15.2084 7.5254C15.1011 7.40162 14.9687 7.30201 14.82 7.23312C14.6714 7.16424 14.5098 7.12764 14.346 7.12576Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.23438 10.0238V12.9219" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.13232 10.0238V12.9219" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.0303 10.0238V12.9219" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.0073 1.95561C11.7017 2.07558 12.338 2.41906 12.8192 2.93381C13.3005 3.44856 13.6005 4.10642 13.6735 4.80731L13.9286 7.12577" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M2.33643 7.12576L2.59146 4.80731C2.66927 4.11057 2.97136 3.45797 3.45224 2.94782C3.93312 2.43767 4.56675 2.09759 5.25768 1.97879" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.0305 2.19903C11.0305 2.38932 10.993 2.57775 10.9202 2.75356C10.8474 2.92936 10.7407 3.0891 10.6061 3.22366C10.4715 3.35821 10.3118 3.46495 10.136 3.53777C9.96019 3.61059 9.77177 3.64807 9.58148 3.64807H6.68341C6.2991 3.64807 5.93053 3.4954 5.65879 3.22366C5.38704 2.95191 5.23438 2.58334 5.23438 2.19903C5.23438 1.81473 5.38704 1.44616 5.65879 1.17441C5.93053 0.902666 6.2991 0.75 6.68341 0.75H9.58148C9.96579 0.75 10.3344 0.902666 10.6061 1.17441C10.8778 1.44616 11.0305 1.81473 11.0305 2.19903V2.19903Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">
                                        Ecommerce
                                        <span class="badge bg-success rounded-pill pulse pulse-success border-0">2</span>
                                    </span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item has-dropdown">
                                        <a href="javascript:void(0);" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Products</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>

                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/products'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Products List</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/product_add'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Add Product</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/product_edit'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Edit Product</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item has-dropdown">
                                        <a href="javascript:void(0);" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Category</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>

                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/categories'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Category List</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/category_add'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Add Category</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/category_edit'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Edit Category</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item has-dropdown">
                                        <a href="javascript:void(0);" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Coupon</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>

                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/coupons'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Coupon List</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/coupon_history'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Coupon History</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item has-dropdown">
                                        <a href="javascript:void(0);" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Orders</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>

                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/orders'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Order List</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/order_details'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Order Details</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item has-dropdown">
                                        <a href="javascript:void(0);" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Customers</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>

                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/customers'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">All Customers</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item has-dropdown">
                                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">

                                                    <span class="menu-title flex-grow-1">Customers Details</span>
                                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                </a>

                                                <ul class="app-sidebar-submenu">
                                                    <li class="app-sidebar-menu-item">
                                                        <a href="<?= site_url('ecommerce/customer_details_general'); ?>" class="menu-link d-flex align-items-center">
                                                            <span class="menu-title flex-grow-1">General</span>
                                                        </a>
                                                    </li>
                                                    <li class="app-sidebar-menu-item">
                                                        <a href="<?= site_url('ecommerce/customer_details_security'); ?>" class="menu-link d-flex align-items-center">
                                                            <span class="menu-title flex-grow-1">Security</span>
                                                        </a>
                                                    </li>
                                                    <li class="app-sidebar-menu-item">
                                                        <a href="<?= site_url('ecommerce/customer_details_payments'); ?>" class="menu-link d-flex align-items-center">
                                                            <span class="menu-title flex-grow-1">Payment Methods</span>
                                                        </a>
                                                    </li>
                                                    <li class="app-sidebar-menu-item">
                                                        <a href="<?= site_url('ecommerce/customer_details_address'); ?>" class="menu-link d-flex align-items-center">
                                                            <span class="menu-title flex-grow-1">Address</span>
                                                        </a>
                                                    </li>
                                                    <li class="app-sidebar-menu-item">
                                                        <a href="<?= site_url('ecommerce/customer_details_notifications'); ?>" class="menu-link d-flex align-items-center">
                                                            <span class="menu-title flex-grow-1">Notifications</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('ecommerce/reviews'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Manage Reviews</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item has-dropdown">
                                        <a href="javascript:void(0);" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Shop Settings</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>

                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/settings_general'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">General</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/settings_payments'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Payment Methods</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/settings_shippings'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Shipping Methods</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('ecommerce/settings_notifications'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Notifications</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.25018 15.75C6.56004 13.8892 4.26794 12.684 1.77697 12.3461C1.49344 12.3148 1.23158 12.1795 1.04193 11.9664C0.852285 11.7533 0.748291 11.4775 0.750021 11.1923V1.90372C0.75001 1.73705 0.786105 1.57237 0.855821 1.42098C0.925537 1.2696 1.02722 1.13512 1.15388 1.02679C1.2783 0.920425 1.42393 0.841754 1.5811 0.795997C1.73826 0.750241 1.90336 0.738447 2.06543 0.761399C4.44736 1.15672 6.62636 2.34377 8.25018 4.13066V15.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.25 15.75C9.94015 13.8892 12.2322 12.684 14.7232 12.3461C15.0067 12.3148 15.2686 12.1795 15.4582 11.9664C15.6479 11.7533 15.7519 11.4775 15.7502 11.1923V1.90372C15.7502 1.73705 15.7141 1.57237 15.6444 1.42098C15.5746 1.2696 15.473 1.13512 15.3463 1.02679C15.2219 0.920425 15.0763 0.841754 14.9191 0.795997C14.7619 0.750241 14.5968 0.738447 14.4347 0.761399C12.0528 1.15672 9.87382 2.34377 8.25 4.13066V15.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">LMS</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item has-dropdown">
                                        <a href="javascript:void(0);" class="menu-link d-flex align-items-center">

                                            <span class="menu-title flex-grow-1">Courses</span>
                                            <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                                <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>

                                        <ul class="app-sidebar-submenu">
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('lms/courses'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">All Courses</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('lms/course_add'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Add Course</span>
                                                </a>
                                            </li>
                                            <li class="app-sidebar-menu-item">
                                                <a href="<?= site_url('lms/course_edit'); ?>" class="menu-link d-flex align-items-center">
                                                    <span class="menu-title flex-grow-1">Edit Course</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('lms/course_grid'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Course Grid</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('lms/course_details'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Course Details</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-heading">
                                <span>
                                    <span class="app-sidebar-menu-heading-line"></span>
                                    COMPONENTS
                                </span>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.90385 0.75H5.36539C5.6714 0.75 5.96489 0.871566 6.18128 1.08795C6.39767 1.30434 6.51923 1.59783 6.51923 1.90385V12.8654C6.51923 13.6304 6.21532 14.3641 5.67435 14.9051C5.13338 15.4461 4.39966 15.75 3.63462 15.75V15.75C3.2558 15.75 2.8807 15.6754 2.53072 15.5304C2.18074 15.3855 1.86275 15.173 1.59488 14.9051C1.05391 14.3641 0.75 13.6304 0.75 12.8654V1.90385C0.75 1.59783 0.871566 1.30434 1.08795 1.08795C1.30434 0.871566 1.59783 0.75 1.90385 0.75V0.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6.51907 5.9423L10.5575 1.88076C10.7737 1.66585 11.0662 1.54523 11.371 1.54523C11.6758 1.54523 11.9683 1.66585 12.1845 1.88076L14.6191 4.32691C14.834 4.5431 14.9546 4.83554 14.9546 5.14037C14.9546 5.4452 14.834 5.73765 14.6191 5.95383L5.67676 14.9077" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10.5578 9.98077H14.5963C14.9023 9.98077 15.1958 10.1023 15.4122 10.3187C15.6286 10.5351 15.7502 10.8286 15.7502 11.1346V14.5962C15.7502 14.9022 15.6286 15.1957 15.4122 15.4121C15.1958 15.6284 14.9023 15.75 14.5963 15.75H3.63477" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M0.75 5.36539H6.51923" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M0.75 9.98077H6.51923" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">User Interface</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_accordion'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Accordion</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_alerts'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Alerts</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_badges'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Badges</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_buttons'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Buttons</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_carousel'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Carousel</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_collapse'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Collapse</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_dropdown'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Dropdown</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_list'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">List Groups</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_modal'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Modals</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_navbar'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Navbar</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_navs_tabs'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Navs & Tabs</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_offcanvas'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Offcanvas</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_pagination'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Pagination</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_placeholder'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Placeholder</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_popover'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Popover</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_progress'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Progress</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_spinner'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Spinners</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_toast'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Toasts</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/ui_tooltip'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Tooltip</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.64154 1.51885C5.02956 1.89783 5.26029 2.40928 5.28761 2.95098L7.25814 0.99122C7.32582 0.915346 7.40877 0.854632 7.50155 0.813061C7.59434 0.77149 7.69486 0.75 7.79654 0.75C7.89821 0.75 7.99873 0.77149 8.09152 0.813061C8.1843 0.854632 8.26725 0.915346 8.33493 0.99122L9.92858 2.64948C9.70223 2.75924 9.495 2.90466 9.31481 3.08019C8.93128 3.50197 8.72486 4.05522 8.73838 4.62514C8.75191 5.19507 8.98434 5.7379 9.38745 6.14101C9.79056 6.54412 10.3334 6.77655 10.9033 6.79008C11.4732 6.80361 12.0265 6.59719 12.4483 6.21365C12.6238 6.03346 12.7692 5.82623 12.879 5.59988L14.5588 7.25814C14.6347 7.32582 14.6954 7.40877 14.7369 7.50155C14.7785 7.59434 14.8 7.69486 14.8 7.79654C14.8 7.89821 14.7785 7.99873 14.7369 8.09152C14.6954 8.1843 14.6347 8.26725 14.5588 8.33493L12.599 10.2624C13.0235 10.2881 13.4315 10.4358 13.774 10.6878C14.1165 10.9398 14.379 11.2854 14.5297 11.683C14.6805 12.0806 14.7133 12.5133 14.624 12.9291C14.5348 13.3448 14.3274 13.726 14.0267 14.0267C13.726 14.3274 13.3448 14.5348 12.9291 14.624C12.5133 14.7133 12.0806 14.6805 11.683 14.5297C11.2854 14.379 10.9398 14.1165 10.6878 13.774C10.4358 13.4315 10.2881 13.0235 10.2624 12.599L8.29186 14.5588C8.22418 14.6347 8.14123 14.6954 8.04845 14.7369C7.95566 14.7785 7.85514 14.8 7.75346 14.8C7.65179 14.8 7.55127 14.7785 7.45848 14.7369C7.3657 14.6954 7.28275 14.6347 7.21507 14.5588L5.62142 12.9005C5.84777 12.7908 6.055 12.6453 6.23519 12.4698C6.65071 12.0514 6.88302 11.4851 6.881 10.8955C6.87898 10.3058 6.6428 9.7411 6.22442 9.32558C5.80604 8.91006 5.23973 8.67775 4.65008 8.67977C4.06042 8.68179 3.49572 8.91797 3.08019 9.33635C2.90466 9.51654 2.75924 9.72377 2.64948 9.95012L0.99122 8.29186C0.915346 8.22418 0.854632 8.14123 0.813061 8.04845C0.77149 7.95566 0.75 7.85514 0.75 7.75346C0.75 7.65179 0.77149 7.55127 0.813061 7.45848C0.854632 7.3657 0.915346 7.28275 0.99122 7.21507L2.95098 5.28761C2.40928 5.26029 1.89783 5.02956 1.51885 4.64154C1.10475 4.22745 0.872117 3.66581 0.872117 3.08019C0.872117 2.49458 1.10475 1.93294 1.51885 1.51885C1.93294 1.10475 2.49458 0.872117 3.08019 0.872117C3.66581 0.872117 4.22745 1.10475 4.64154 1.51885V1.51885Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Extended UI</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/extended_ui_timeline'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Timeline</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/extended_ui_avatar'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Avatar</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/extended_ui_toastr'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Toastr</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/extended_ui_sweetalert2'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Sweetalert2</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/extended_ui_select2'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Select2</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/extended_ui_tagify'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Tagify</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/extended_ui_blockui'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Block UI</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/extended_ui_sortable'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Sortable</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/extended_ui_media_player'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Media Player</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/extended_ui_perfect_scrollbar'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Perfect Scrollbar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-heading">
                                <span>
                                    <span class="app-sidebar-menu-heading-line"></span>
                                    FORMS
                                </span>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.5962 0.75H1.90385C1.26659 0.75 0.75 1.26659 0.75 1.90385V14.5962C0.75 15.2334 1.26659 15.75 1.90385 15.75H14.5962C15.2334 15.75 15.75 15.2334 15.75 14.5962V1.90385C15.75 1.26659 15.2334 0.75 14.5962 0.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M0.75 5.21155H15.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Form Elements</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/form_input_basic'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Basic Inputs</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/form_checkbox_radio'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Checkbox & Radios</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/form_group'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Form Group</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/form_layout'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Form Layouts</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/form_wizard'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Form Wizard</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/form_file_upload'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">File Uploads</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/form_pickers'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Pickers</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/form_editors'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Editors</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/form_miscellaneous'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Miscellaneous</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-heading">
                                <span>
                                    <span class="app-sidebar-menu-heading-line"></span>
                                    CHARTS
                                </span>
                            </li>

                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.75 0.75V15.75H15.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M4.21143 7.67307L7.09604 10.5577L11.7114 3.63461L15.7499 6.51923" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Apex Chart</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/chart_apex_line'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Line</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/chart_apex_area'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Area</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/chart_apex_bar'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Bar</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/chart_apex_column'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Columns</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/chart_apex_mixed'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Mixed</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/chart_apex_pie'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Pie</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/chart_apex_polar'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Polar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-heading">
                                <span>
                                    <span class="app-sidebar-menu-heading-line"></span>
                                    MAPS & Tables
                                </span>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.25 15.75C12.3921 15.75 15.75 12.3921 15.75 8.25C15.75 4.10786 12.3921 0.75 8.25 0.75C4.10786 0.75 0.75 4.10786 0.75 8.25C0.75 12.3921 4.10786 15.75 8.25 15.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M1.32715 11.1346H3.34638C3.88191 11.1346 4.39551 10.9219 4.77419 10.5432C5.15287 10.1645 5.36561 9.65093 5.36561 9.1154V7.38463C5.36561 6.84909 5.57835 6.33549 5.95703 5.95681C6.33571 5.57814 6.84931 5.3654 7.38484 5.3654C7.92037 5.3654 8.43397 5.15266 8.81265 4.77398C9.19133 4.3953 9.40407 3.8817 9.40407 3.34616V0.83078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M15.75 8.1346C15.1722 7.83484 14.5316 7.67665 13.8807 7.67307H11.423C10.8875 7.67307 10.3739 7.88581 9.99523 8.26448C9.61655 8.64316 9.40381 9.15676 9.40381 9.6923C9.40381 10.2278 9.61655 10.7414 9.99523 11.1201C10.3739 11.4988 10.8875 11.7115 11.423 11.7115C11.8056 11.7115 12.1724 11.8635 12.4429 12.134C12.7134 12.4045 12.8653 12.7713 12.8653 13.1538V14.1577" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Maps</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/map_vector'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Vector Map</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/map_leaflet'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Leaflet Map</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar-menu-item has-dropdown">
                                <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
                                    <span class="menu-icon flex-shrink-0">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.6731 0.75H1.82692C1.23215 0.75 0.75 1.23215 0.75 1.82692V13.6731C0.75 14.2678 1.23215 14.75 1.82692 14.75H13.6731C14.2678 14.75 14.75 14.2678 14.75 13.6731V1.82692C14.75 1.23215 14.2678 0.75 13.6731 0.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M0.75 3.98077H14.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5.05762 3.98077V14.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10.4424 3.98077V14.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="menu-title flex-grow-1">Tables</span>
                                    <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                <ul class="app-sidebar-submenu">
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/tables_basic'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Basic</span>
                                        </a>
                                    </li>
                                    <li class="app-sidebar-menu-item">
                                        <a href="<?= site_url('components/tables_datatable_basic'); ?>" class="menu-link d-flex align-items-center">
                                            <span class="menu-title flex-grow-1">Datatable Basic</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- app sidebar menu end -->

                    <!-- app sidebar footer start -->
                    <div class="app-sidebar-footer">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar rounded-pill">
                                <img src="<?= base_url('assets/'); ?>img/avatar/10.jpg" alt="conca">
                            </div>
                            <div class="">
                                <h6 class="mb-0">Joel Becker</h6>
                                <span class="text-muted">Admin</span>
                            </div>
                        </div>
                        <div class="">
                            <button class="dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg width="11" height="15" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.75 5.351L5.24 0.861002C5.2736 0.825912 5.31396 0.797988 5.35865 0.778911C5.40333 0.759835 5.45141 0.75 5.5 0.75C5.54859 0.75 5.59667 0.759835 5.64135 0.778911C5.68604 0.797988 5.7264 0.825912 5.76 0.861002L10.25 5.351" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M0.75 9.151L5.24 13.641C5.2736 13.6761 5.31396 13.704 5.35865 13.7231C5.40333 13.7422 5.45141 13.752 5.5 13.752C5.54859 13.752 5.59667 13.7422 5.64135 13.7231C5.68604 13.704 5.7264 13.6761 5.76 13.641L10.25 9.151" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= site_url('profile'); ?>">Profile</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('settings/notification'); ?>">Notifications</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('settings'); ?>">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= site_url('auth/login_basic'); ?>">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- app sidebar footer end -->
                </div>

            </div>
            <!-- app sidebar end -->