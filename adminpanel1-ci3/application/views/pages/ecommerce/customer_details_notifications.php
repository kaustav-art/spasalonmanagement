<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Customer Notifications</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer Notifications</li>
                                </ol>
                            </nav>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
                        <div class="profile-header card-bg shadow-custom rounded-custom position-relative overflow-hidden mb-6">
                            <div class="profile-cover-wrapper">
                                <div class="profile-cover-img" data-background="assets/img/profile/cover.jpg"></div>
                            </div>
                            <div class="profile-header-bottom position-relative d-flex flex-wrap gap-4 justify-content-between align-items-end mx-8 pb-5">
                                <div class="profile-avatar-wrapper d-flex align-items-end gap-3 flex-wrap">

                                    <div class="profile-avatar">
                                        <img id="avatarPreview" class="profile-avatar-image" src="<?= base_url('assets/'); ?>img/avatar/10.jpg" alt="">

                                        <div class="profile-avatar-actions">
                                            <label for="profile-avatar" class="profile-avatar-edit-btn d-inline-flex align-items-center justify-content-center">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.88576 14.9729L1.86616 15.7226L1.86616 15.7226L1.88576 14.9729ZM1.02526 13.9963L0.277521 13.9381L0.277521 13.9381L1.02526 13.9963ZM2.9526 9.36115L2.40147 8.85247L2.40147 8.85247L2.9526 9.36115ZM1.04415 13.7538L1.79189 13.812L1.79189 13.812L1.04415 13.7538ZM7.12544 13.008L7.64573 13.5482L7.12544 13.008ZM2.08176 14.978L2.10136 14.2283L2.10136 14.2283L2.08176 14.978ZM14.7312 3.36665L15.3933 3.01439L14.7312 3.36665ZM13.708 6.66791L13.1877 6.12772L13.1877 6.12772L13.708 6.66791ZM14.6992 5.58549L14.0476 5.21413L14.6992 5.58549ZM12.6833 1.27463L13.0473 0.618903L12.6833 1.27463ZM9.4516 2.31982L8.90047 1.81114L9.4516 2.31982ZM10.5112 1.30725L10.1278 0.662635L10.5112 1.30725ZM9.22955 1.86963C8.93666 1.57674 8.46178 1.57674 8.16889 1.86963C7.876 2.16253 7.876 2.6374 8.16889 2.93029L9.22955 1.86963ZM13.0689 7.83029C13.3618 8.12319 13.8367 8.12319 14.1295 7.83029C14.4224 7.5374 14.4224 7.06253 14.1295 6.76963L13.0689 7.83029ZM9.39797 14.25C8.98376 14.25 8.64797 14.5858 8.64797 15C8.64797 15.4142 8.98376 15.75 9.39797 15.75L9.39797 14.25ZM14.998 15.75C15.4122 15.75 15.748 15.4142 15.748 15C15.748 14.5858 15.4122 14.25 14.998 14.25L14.998 15.75ZM13.708 6.66791L13.1877 6.12772L6.60515 12.4678L7.12544 13.008L7.64573 13.5482L14.2283 7.20809L13.708 6.66791ZM2.9526 9.36115L3.50373 9.86983L10.0027 2.8285L9.4516 2.31982L8.90047 1.81114L2.40147 8.85247L2.9526 9.36115ZM2.08176 14.978L2.10136 14.2283L1.90537 14.2231L1.88576 14.9729L1.86616 15.7226L2.06215 15.7278L2.08176 14.978ZM1.02526 13.9963L1.77299 14.0546L1.79189 13.812L1.04415 13.7538L0.296419 13.6955L0.277521 13.9381L1.02526 13.9963ZM1.88576 14.9729L1.90537 14.2231C1.79284 14.2202 1.7076 14.2179 1.63521 14.2141C1.56236 14.2103 1.52204 14.2058 1.4999 14.2021C1.47822 14.1985 1.49572 14.199 1.53128 14.2155C1.57333 14.2351 1.62173 14.2681 1.66322 14.3152L1.10051 14.811L0.537799 15.3069C0.760935 15.5601 1.04035 15.6462 1.25307 15.6817C1.44251 15.7133 1.66912 15.7175 1.86616 15.7226L1.88576 14.9729ZM1.02526 13.9963L0.277521 13.9381C0.261777 14.1402 0.242511 14.3669 0.253197 14.5587C0.265002 14.7705 0.316904 15.0562 0.537799 15.3069L1.10051 14.811L1.66322 14.3152C1.70454 14.3621 1.72995 14.4126 1.74308 14.4529C1.75407 14.4865 1.75227 14.5004 1.75087 14.4752C1.74946 14.4498 1.74941 14.4063 1.75337 14.3312C1.7573 14.2565 1.76407 14.169 1.77299 14.0546L1.02526 13.9963ZM2.9526 9.36115L2.40147 8.85247C1.58858 9.73319 1.05647 10.2955 0.748713 11.0039L1.4366 11.3028L2.12448 11.6016C2.30774 11.1798 2.62263 10.8245 3.50373 9.86983L2.9526 9.36115ZM1.04415 13.7538L1.79189 13.812C1.89377 12.5043 1.94065 12.0247 2.12448 11.6016L1.4366 11.3028L0.748713 11.0039C0.441516 11.711 0.390444 12.4886 0.296419 13.6955L1.04415 13.7538ZM7.12544 13.008L6.60515 12.4678C5.51194 13.5208 5.10779 13.8914 4.62478 14.08L4.89764 14.7786L5.17051 15.4772C5.99781 15.1541 6.64209 14.5149 7.64573 13.5482L7.12544 13.008ZM2.08176 14.978L2.06215 15.7278C3.44076 15.7638 4.34154 15.801 5.17051 15.4772L4.89764 14.7786L4.62478 14.08C4.14343 14.268 3.60373 14.2675 2.10136 14.2283L2.08176 14.978ZM13.7715 2.25493L13.2356 2.77958C13.8103 3.36672 13.9794 3.55038 14.069 3.71891L14.7312 3.36665L15.3933 3.01439C15.1767 2.60723 14.8081 2.24164 14.3075 1.73028L13.7715 2.25493ZM13.708 6.66791L14.2283 7.20809C14.7433 6.71205 15.1225 6.35753 15.3508 5.95685L14.6992 5.58549L14.0476 5.21413C13.9533 5.37969 13.7792 5.55803 13.1877 6.12772L13.708 6.66791ZM14.7312 3.36665L14.069 3.71891C14.3178 4.18653 14.3095 4.75459 14.0476 5.21413L14.6992 5.58549L15.3508 5.95685C15.8676 5.05012 15.8835 3.93583 15.3933 3.01439L14.7312 3.36665ZM13.7715 2.25493L14.3075 1.73028C13.8079 1.21997 13.4488 0.841817 13.0473 0.618903L12.6833 1.27463L12.3192 1.93035C12.4812 2.0203 12.6598 2.19139 13.2356 2.77958L13.7715 2.25493ZM9.4516 2.31982L10.0027 2.8285C10.5613 2.22334 10.735 2.04677 10.8946 1.95186L10.5112 1.30725L10.1278 0.662635C9.73309 0.897389 9.38518 1.28597 8.90047 1.81114L9.4516 2.31982ZM12.6833 1.27463L13.0473 0.618903C12.1339 0.111794 11.0258 0.128571 10.1278 0.662635L10.5112 1.30725L10.8946 1.95186C11.334 1.69049 11.8728 1.68253 12.3192 1.93035L12.6833 1.27463ZM8.69922 2.39996L8.16889 2.93029L13.0689 7.83029L13.5992 7.29996L14.1295 6.76963L9.22955 1.86963L8.69922 2.39996ZM9.39797 15L9.39797 15.75L14.998 15.75L14.998 15L14.998 14.25L9.39797 14.25L9.39797 15Z" fill="#716F7E" />
                                                </svg>
                                                <input id="profile-avatar" type="file" class="d-none" accept="image/*">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="profile-info pb-5">
                                        <h3 class="h3 fw-semibold mb-1">Joel Becker</h3>
                                        <div class="profile-meta">
                                            <span>UX Designer </span>
                                            <span>New York, USA</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-avatar-buttons d-flex align-items-center pb-5 gap-2">
                                    <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#editCustomerModal">
                                        Edit Details
                                    </button>
                                </div>
                            </div>
                            <div class="profile-nav mx-8">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="<?= site_url('ecommerce/customer_details_general'); ?>">General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('ecommerce/customer_details_security'); ?>">Security</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('ecommerce/customer_details_payments'); ?>">Payments</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('ecommerce/customer_details_address'); ?>">Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('ecommerce/customer_details_notifications'); ?>">Notifications</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel">
                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="pure-modal-header d-flex flex-wrap justify-content-between align-items-center gap-6 px-8 py-6 border-bottom">
                                        <h1 class="pure-modal-title fs-5 d-flex align-items-center gap-2 m-0" id="editCustomerModalLabel">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" d="M10 19H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.5 1.65321C14.8978 1.23497 15.4374 1 16 1C16.2786 1 16.5544 1.05769 16.8118 1.16976C17.0692 1.28184 17.303 1.44611 17.5 1.65321C17.697 1.8603 17.8532 2.10615 17.9598 2.37673C18.0664 2.64731 18.1213 2.93731 18.1213 3.23019C18.1213 3.52306 18.0664 3.81306 17.9598 4.08364C17.8532 4.35422 17.697 4.60007 17.5 4.80717L5 17.9487L1 19L2 14.7947L14.5 1.65321Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            Edit Customer Details
                                        </h1>
                                        <button type="button" class="pure-btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 1L1 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 1L11 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="pure-modal-body px-8 py-7">
                                        <div class="row gy-5">
                                            <div class="col-md-6">
                                                <label for="first_name" class="form-label">First Name<span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="first_name" placeholder="First Name" value="Joel">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="last_name" class="form-label">Last Name<span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="last_name" placeholder="Last Name" value="Smith">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="editEmail" class="form-label">Email<span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="editEmail" placeholder="Email" value="joel.smith@example.com">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="username" class="form-label">Username<span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="username" placeholder="Username" value="joelsmith">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">Phone <span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="phone" placeholder="Phone" value="(123) 456-7890">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="status" class="form-label">Status <span class="text-danger fw-bold">*</span></label>
                                                <select id="status" class="form-select">
                                                    <option selected>Active</option>
                                                    <option>Inactive</option>
                                                    <option>Banned</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="city" class="form-label">City <span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="city" placeholder="City" value="New York">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="state" class="form-label">State <span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="state" placeholder="State" value="NY">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="country" class="form-label">Country <span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="country" placeholder="Country" value="United States">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="zip_code" class="form-label">Zip Code <span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="zip_code" placeholder="Zip Code" value="10001">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pure-modal-footer px-8 pb-8">
                                        <div class="d-flex flex-wrap justify-content-end gap-4">
                                            <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary ">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom mt-6">
                                    <div class="pure-card-header">
                                        <h2 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.3369 7.33478C18.3369 5.38947 17.5642 3.52384 16.1886 2.14831C14.8131 0.772769 12.9475 0 11.0022 0C9.05686 0 7.19123 0.772769 5.8157 2.14831C4.44016 3.52384 3.66739 5.38947 3.66739 7.33478C3.66739 15.892 0 18.3369 0 18.3369H22.0043C22.0043 18.3369 18.3369 15.892 18.3369 7.33478Z" fill="#BFB7FF" />
                                                    <path d="M13.1164 20.782C12.9015 21.1525 12.593 21.46 12.2219 21.6738C11.8507 21.8876 11.4299 22.0001 11.0016 22.0001C10.5733 22.0001 10.1524 21.8876 9.78128 21.6738C9.41012 21.46 9.10164 21.1525 8.88672 20.782" stroke="#5F4AFE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            Notifications Settings
                                        </h2>
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