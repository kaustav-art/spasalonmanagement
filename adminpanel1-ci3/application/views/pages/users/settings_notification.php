<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-content">
                        <div class="profile-header card-bg shadow-custom rounded-custom position-relative overflow-hidden mb-6">
                            <div class="profile-cover-wrapper">
                                <div class="profile-cover-img" data-background="assets/img/profile/cover.jpg"></div>
                                <div class="profile-cover-actions position-absolute bottom-4 end-4 bottom z-1">
                                    <a href="#" class="profile-cover-edit-btn d-inline-flex align-items-center gap-2">
                                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.5 12.1667C15.5 12.5203 15.3659 12.8594 15.1272 13.1095C14.8885 13.3595 14.5648 13.5 14.2273 13.5H2.77273C2.43518 13.5 2.11146 13.3595 1.87277 13.1095C1.63409 12.8594 1.5 12.5203 1.5 12.1667V4.83333C1.5 4.47971 1.63409 4.14057 1.87277 3.89052C2.11146 3.64048 2.43518 3.5 2.77273 3.5H5.31818L6.59091 1.5H10.4091L11.6818 3.5H14.2273C14.5648 3.5 14.8885 3.64048 15.1272 3.89052C15.3659 4.14057 15.5 4.47971 15.5 4.83333V12.1667Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.49858 10.8335C9.90439 10.8335 11.044 9.63955 11.044 8.16679C11.044 6.69403 9.90439 5.50012 8.49858 5.50012C7.09276 5.50012 5.95312 6.69403 5.95312 8.16679C5.95312 9.63955 7.09276 10.8335 8.49858 10.8335Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Edit cover photo
                                    </a>
                                </div>
                            </div>
                            <div class="profile-header-bottom position-relative d-flex justify-content-between align-items-end mx-8 pb-5 flex-wrap gap-5 z-1">
                                <div class="profile-avatar-wrapper d-flex align-items-end gap-3 flex-wrap">
                                    <div class="profile-avatar flex-shrink-0">
                                        <img src="<?= base_url('assets/'); ?>img/avatar/10.jpg" alt="">
                                    </div>
                                    <div class="profile-info pb-5">
                                        <h3 class="h3 fw-semibold mb-1">Joel Becker</h3>
                                        <div class="profile-meta">
                                            <span>UX Designer </span>
                                            <span>New York, USA</span>
                                            <span>3.5k Followers</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-avatar-buttons d-flex align-items-center pb-5 gap-2">
                                    <button class="btn btn-custom-secondary">
                                        Send message
                                    </button>
                                    <button class="btn btn-primary shadow-none">
                                        Follow
                                    </button>
                                </div>
                            </div>
                            <div class="profile-nav mx-8">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="<?= site_url('settings'); ?>">Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('settings/billing'); ?>">Billing Plans</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('settings/notification'); ?>">Notifications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('settings/connection'); ?>">Connections</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom mt-6">
                                    <div class="pure-card-header">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.3369 7.33478C18.3369 5.38947 17.5642 3.52384 16.1886 2.14831C14.8131 0.772769 12.9475 0 11.0022 0C9.05686 0 7.19123 0.772769 5.8157 2.14831C4.44016 3.52384 3.66739 5.38947 3.66739 7.33478C3.66739 15.892 0 18.3369 0 18.3369H22.0043C22.0043 18.3369 18.3369 15.892 18.3369 7.33478Z" fill="#BFB7FF" />
                                                    <path d="M13.1164 20.782C12.9015 21.1525 12.593 21.46 12.2219 21.6738C11.8507 21.8876 11.4299 22.0001 11.0016 22.0001C10.5733 22.0001 10.1524 21.8876 9.78128 21.6738C9.41012 21.46 9.10164 21.1525 8.88672 20.782" stroke="#5F4AFE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            Notifications Settings
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-custom-paragraph fw-medium">Type</th>
                                                        <th scope="col" class="text-custom-paragraph fw-medium text-center">Email</th>
                                                        <th scope="col" class="text-custom-paragraph fw-medium text-center">Browser</th>
                                                        <th scope="col" class="text-custom-paragraph fw-medium text-center">App</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 f py-1 text-custom-body">
                                                                <span class="fw-medium text-custom-body fz-16px">New for you</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="new_for_you_email" checked>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="new_for_you_browser" checked>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="new_for_you_app" checked>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 f py-1 text-custom-body">
                                                                <span class="fw-medium text-custom-body fz-16px">Account activity</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="account_activity_email" checked>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="account_activity_browser">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="account_activity_app">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 f py-1 text-custom-body">
                                                                <span class="fw-medium text-custom-body fz-16px">A new browser used to sign in</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="new_sign_in_email">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="new_sign_in_browser" checked>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="new_sign_in_app">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 f py-1 text-custom-body">
                                                                <span class="fw-medium text-custom-body fz-16px">A new device is linked</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="new_device_email" checked>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="new_device_browser">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check text-center d-flex justify-content-center m-0 p-0 mx-auto">
                                                                <input class="form-check-input m-0 p-0" type="checkbox" value="" id="new_device_app" checked>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-end mt-4">
                                            <button type="button" class="btn btn-primary px-5 py-2">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>