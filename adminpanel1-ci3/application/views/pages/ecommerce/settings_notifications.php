<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Notifications</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                                </ol>
                            </nav>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
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