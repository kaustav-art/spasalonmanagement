<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Customer Security</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer Security</li>
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

                        <div id="user-settings-security-card" class="pure-card rounded-custom card-bg shadow-custom mt-6">
                            <div class="pure-card-header">
                                <h2 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                    <span class="text-primary d-flex align-items-center">
                                        <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.9883 5.71102C21.5654 5.71102 22.8438 4.43257 22.8438 2.85551C22.8438 1.27846 21.5654 0 19.9883 0C18.4113 0 17.1328 1.27846 17.1328 2.85551C17.1328 4.43257 18.4113 5.71102 19.9883 5.71102Z" fill="currentColor" />
                                            <path d="M19.9883 5.71102C21.5654 5.71102 22.8438 4.43257 22.8438 2.85551C22.8438 1.27846 21.5654 0 19.9883 0C18.4113 0 17.1328 1.27846 17.1328 2.85551C17.1328 4.43257 18.4113 5.71102 19.9883 5.71102Z" fill="currentColor" />
                                            <path opacity="0.4" d="M21.3821 7.20731C22.1017 6.97887 22.8441 7.53856 22.8441 8.30384V14.289C22.8441 18.2867 20.5597 20 17.1331 20H5.71102C2.28441 20 0 18.2867 0 14.289V6.29354C0 2.29583 2.28441 0.58252 5.71102 0.58252H14.4032C15.1456 0.58252 15.6482 1.26785 15.5111 1.98744C15.3741 2.66135 15.3969 3.38093 15.6025 4.12336C16.0251 5.65392 17.2701 6.87607 18.8007 7.27584C19.703 7.50428 20.5825 7.4586 21.3821 7.20731Z" fill="currentColor" />
                                            <path d="M11.4223 11.2736C10.4629 11.2736 9.49201 10.9766 8.74958 10.3713L5.17447 7.51576C4.80897 7.21878 4.74044 6.68194 5.03741 6.31644C5.33439 5.95093 5.87121 5.88241 6.23671 6.17938L9.81182 9.03489C10.6799 9.73164 12.1533 9.73164 13.0214 9.03489L14.3692 7.96122C14.7347 7.66424 15.283 7.72135 15.5685 8.09828C15.8655 8.46378 15.8084 9.01204 15.4315 9.29759L14.0837 10.3713C13.3526 10.9766 12.3818 11.2736 11.4223 11.2736Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    Security
                                </h2>
                            </div>
                            <div class="pure-card-body">
                                <form action="#">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-6 pb-8 border-bottom">
                                        <div class="">
                                            <p class="text-custom-paragraph m-0">Email Address</p>
                                            <h3 class="m-0 fz-16px fw-medium">user@gmail.com</h3>
                                        </div>
                                        <div class="">
                                            <button type="button" class="btn btn-custom-secondary" data-bs-toggle="collapse" data-bs-target="#changeEmail" aria-expanded="false" aria-controls="changeEmail">Change Email</button>
                                        </div>
                                    </div>
                                    <div class="collapse" id="changeEmail">
                                        <div class="py-7 border-bottom">
                                            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2">
                                                <div class="col">
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" id="email" placeholder="New Email Address">
                                                </div>
                                                <div class="col">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password" placeholder="Your Password">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex flex-wrap align-items-center justify-content-sm-end gap-3 mt-7">
                                                        <button type="submit" class="btn btn-custom-secondary" data-bs-toggle="collapse" data-bs-target="#changeEmail" aria-expanded="true" aria-controls="changeEmail">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update Email</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                                <form action="#">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-6 pt-8 pb-8 border-bottom">
                                        <div class="">
                                            <p class="text-custom-paragraph m-0">Password</p>
                                            <h3 class="m-0 fz-16px fw-medium">*******************</h3>
                                        </div>
                                        <div class="">
                                            <button type="button" class="btn btn-custom-secondary" data-bs-toggle="collapse" data-bs-target="#changePassword" aria-expanded="false" aria-controls="changePassword">Change Password</button>
                                        </div>
                                    </div>
                                    <div class="collapse" id="changePassword">
                                        <div class="py-7 border-bottom">
                                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-6">
                                                <div class="col">
                                                    <label for="current_password" class="form-label">Current Password</label>
                                                    <input type="password" class="form-control" id="current_password" placeholder="Current Password">
                                                </div>
                                                <div class="col">
                                                    <label for="passwordNew" class="form-label">New Password</label>
                                                    <input type="password" class="form-control" id="passwordNew" placeholder="New Password">
                                                </div>
                                                <div class="col">
                                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex flex-wrap align-items-center justify-content-sm-end gap-3 mt-7">
                                                        <button type="button" class="btn btn-custom-secondary" data-bs-toggle="collapse" data-bs-target="#changePassword" aria-expanded="true" aria-controls="changePassword">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update Email</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div id="user-settings-recent-devices-card" class="pure-card rounded-custom card-bg shadow-custom mt-6">
                            <div class="pure-card-header">
                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                    <span class="text-primary d-flex align-items-center">
                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" d="M23.988 5.2973V13.1051H0V5.2973C0 2.37838 2.37838 0 5.2973 0H18.6907C21.6096 0 23.988 2.37838 23.988 5.2973Z" fill="currentColor" />
                                            <path d="M0 13.1172V13.3574C0 16.2884 2.37838 18.6547 5.2973 18.6547H9.90991C10.5706 18.6547 11.1111 19.1953 11.1111 19.8559V21.0211C11.1111 21.6818 10.5706 22.2223 9.90991 22.2223H7.003C6.51051 22.2223 6.1021 22.6307 6.1021 23.1232C6.1021 23.6157 6.4985 24.0241 7.003 24.0241H17.033C17.5255 24.0241 17.9339 23.6157 17.9339 23.1232C17.9339 22.6307 17.5255 22.2223 17.033 22.2223H14.1261C13.4655 22.2223 12.9249 21.6818 12.9249 21.0211V19.8559C12.9249 19.1953 13.4655 18.6547 14.1261 18.6547H18.7027C21.6336 18.6547 24 16.2763 24 13.3574V13.1172H0Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    Recent Devices
                                </h3>
                            </div>
                            <div class="pure-card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-custom-paragraph fw-medium">Type</th>
                                                <th scope="col" class="text-custom-paragraph fw-medium">Device</th>
                                                <th scope="col" class="text-custom-paragraph fw-medium">Location</th>
                                                <th scope="col" class="text-custom-paragraph fw-medium">Recent activity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <img src="<?= base_url('assets/'); ?>img/icons/browser/chrome.svg" alt="">
                                                        <span class="fw-medium text-custom-body">Chrome on Windows</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.4 1H2.6C1.71634 1 1 1.71634 1 2.6V10.6C1 11.4837 1.71634 12.2 2.6 12.2H15.4C16.2837 12.2 17 11.4837 17 10.6V2.6C17 1.71634 16.2837 1 15.4 1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.79688 15.3999H12.1969" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M9 12.2V15.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="fw-normal text-custom-body">Dell XPS 15</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <span class="fw-normal text-custom-body">New Mexico</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <span class="fw-normal text-custom-body">Now</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <img src="<?= base_url('assets/'); ?>img/icons/browser/safari.svg" alt="">
                                                        <span class="fw-medium text-custom-body">Safari on MacOS</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.4 1H2.6C1.71634 1 1 1.71634 1 2.6V10.6C1 11.4837 1.71634 12.2 2.6 12.2H15.4C16.2837 12.2 17 11.4837 17 10.6V2.6C17 1.71634 16.2837 1 15.4 1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.79688 15.3999H12.1969" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M9 12.2V15.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="fw-normal text-custom-body">MacBook Air 2020</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <span class="fw-normal text-custom-body">New York</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <span class="fw-normal text-custom-body">
                                                            2 days ago
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <img src="<?= base_url('assets/'); ?>img/icons/browser/safari.svg" alt="">
                                                        <span class="fw-medium text-custom-body">Safari on MacOS</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.4 1H2.6C1.71634 1 1 1.71634 1 2.6V10.6C1 11.4837 1.71634 12.2 2.6 12.2H15.4C16.2837 12.2 17 11.4837 17 10.6V2.6C17 1.71634 16.2837 1 15.4 1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.79688 15.3999H12.1969" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M9 12.2V15.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="fw-normal text-custom-body">MacBook Pro M4</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <span class="fw-normal text-custom-body">Dhaka</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <span class="fw-normal text-custom-body">
                                                            1 week ago
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <img src="<?= base_url('assets/'); ?>img/icons/browser/chrome.svg" alt="">
                                                        <span class="fw-medium text-custom-body">
                                                            Chrome on Windows
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.4 1H2.6C1.71634 1 1 1.71634 1 2.6V10.6C1 11.4837 1.71634 12.2 2.6 12.2H15.4C16.2837 12.2 17 11.4837 17 10.6V2.6C17 1.71634 16.2837 1 15.4 1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.79688 15.3999H12.1969" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M9 12.2V15.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="fw-normal text-custom-body">
                                                            HP Pavilion 15
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <span class="fw-normal text-custom-body">
                                                            California
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2 py-2 text-custom-body">
                                                        <span class="fw-normal text-custom-body">
                                                            2 weeks ago
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="user-settings-delete-account-card" class="pure-card rounded-custom card-bg shadow-custom mt-6">
                            <div class="pure-card-header">
                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                    <span class="text-primary d-flex align-items-center">
                                        <svg width="21" height="23" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" d="M19.0693 8.32064C19.0693 8.3962 18.4774 15.8859 18.1394 19.038C17.9277 20.9724 16.6813 22.1457 14.8117 22.179C13.3753 22.2113 11.969 22.2224 10.5855 22.2224C9.11662 22.2224 7.68015 22.2113 6.2858 22.179C4.47888 22.1357 3.23142 20.9391 3.03053 19.038C2.68275 15.8748 2.10169 8.3962 2.09088 8.32064C2.08008 8.09287 2.15353 7.87621 2.30257 7.70067C2.44946 7.53845 2.66115 7.44067 2.88364 7.44067H18.2873C18.5087 7.44067 18.7096 7.53845 18.8684 7.70067C19.0164 7.87621 19.0909 8.09287 19.0693 8.32064Z" fill="currentColor" />
                                            <path d="M7.80859 17.9497L7.80859 11.3497" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M13.3594 17.9499L13.3594 11.3499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M20.5755 4.41873C20.5755 3.96208 20.2159 3.60432 19.7838 3.60432H16.5459C15.887 3.60432 15.3146 3.13545 15.1677 2.47436L14.9863 1.66439C14.7324 0.685531 13.8565 0 12.8737 0H8.28886C7.29522 0 6.42794 0.685531 6.1644 1.71772L5.99483 2.47547C5.84687 3.13545 5.27444 3.60432 4.61669 3.60432H1.3787C0.945595 3.60432 0.585938 3.96208 0.585938 4.41873V4.84094C0.585938 5.28648 0.945595 5.65536 1.3787 5.65536H19.7838C20.2159 5.65536 20.5755 5.28648 20.5755 4.84094V4.41873Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    Deactivate Account
                                </h3>
                            </div>
                            <div class="pure-card-body">
                                <form action="#">
                                    <div class="alert alert-danger border-dashed border border-warning pt-6" role="alert">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="d-flex align-items-start">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 10V14.8462M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10ZM10.6923 6.5387C10.6923 6.92105 10.3824 7.23101 10 7.23101C9.61769 7.23101 9.30773 6.92105 9.30773 6.5387C9.30773 6.15635 9.61769 5.84639 10 5.84639C10.3824 5.84639 10.6923 6.15635 10.6923 6.5387Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="">
                                                <h4 class="alert-heading">
                                                    Deleting Account
                                                </h4>
                                                <p class="m-0">For extra security, this requires you to confirm your email or phone number when you reset yousignr password.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="deleteAccount">
                                        <label class="form-check-label" for="deleteAccount"> Confirm that I want to delete my account.</label>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-danger">
                                            Delete Account
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>