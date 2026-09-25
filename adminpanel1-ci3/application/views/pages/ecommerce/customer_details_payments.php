<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Customer Payments</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer Payments</li>
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
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header">
                                        <h2 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.2381 11.7073C14.4201 11.7073 16.9996 9.08652 16.9996 5.85365C16.9996 2.62077 14.4201 0 11.2381 0C8.05607 0 5.47656 2.62077 5.47656 5.85365C5.47656 9.08652 8.05607 11.7073 11.2381 11.7073Z" fill="currentColor" />
                                                    <path opacity="0.4" d="M11.2362 13.6342C5.46313 13.6342 0.761719 17.5678 0.761719 22.4146C0.761719 22.7424 1.01522 23 1.33787 23H21.1344C21.4571 23 21.7106 22.7424 21.7106 22.4146C21.7106 17.5678 17.0092 13.6342 11.2362 13.6342Z" fill="currentColor" />
                                                    <path d="M22.1069 13.9151C21.0699 12.8615 20.2518 13.201 19.5489 13.9151L15.4697 18.0596C15.3083 18.2235 15.1586 18.5278 15.124 18.7503L14.9051 20.3307C14.8244 20.9044 15.2162 21.3024 15.7808 21.2205L17.3364 20.998C17.5553 20.9629 17.8665 20.8107 18.0163 20.6468L22.0954 16.5025C22.8098 15.8 23.144 14.9688 22.1069 13.9151Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Billing & Plans
                                        </h2>
                                    </div>
                                    <div class="pure-card-body">
                                        <form action="#">
                                            <div class="alert alert-warning border-dashed border border-warning pt-6 mb-10" role="alert">
                                                <div class="d-flex align-items-start gap-3 flex-wrap">
                                                    <div class="d-flex align-items-start">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10 10V14.8462M19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10ZM10.6923 6.5387C10.6923 6.92105 10.3824 7.23101 10 7.23101C9.61769 7.23101 9.30773 6.92105 9.30773 6.5387C9.30773 6.15635 9.61769 5.84639 10 5.84639C10.3824 5.84639 10.6923 6.15635 10.6923 6.5387Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                    <div class="">
                                                        <p class="alert-heading text-warning-dark">
                                                            We need your attention!
                                                        </p>
                                                        <p class="m-0 text-warning-dark">Your payment was declined. To start using tools, please <a href="#" class="m-0 text-primary text-decoration-none fw-semibold">Add Payment Method.</a></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-10">
                                                <h3 class="fw-semibold fz-18px mb-1">Active until 8, Jun 2024</h3>
                                                <p class=" text-custom-paragraph">We will send you a notification upon Subscription expiration</p>
                                            </div>

                                            <div class="mb-10 d-flex flex-wrap justify-content-between align-items-center gap-6 pb-7 border-bottom">
                                                <div class="">
                                                    <h3 class="fw-semibold fz-18px mb-1">$199 Per Month</h3>
                                                    <p class=" text-custom-paragraph mb-0">Extended Pro Package. Up to 100 Agents & 25 Projects</p>
                                                </div>
                                                <div class="">
                                                    <div class="d-flex align-items-center gap-3 flex-wrap">

                                                        <button type="button" class="btn btn-custom-secondary">Cancel Subscription</button>
                                                        <button type="button" class="btn btn-primary">Upgrade Plan</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="">
                                                <div class="d-flex align-items-center justify-content-between gap-6 flex-wrap mb-2">
                                                    <h3 class="fw-medium fz-15px m-0">Users </h3>
                                                    <h3 class="fw-medium fz-15px m-0">56 of 100 Used </h3>
                                                </div>
                                                <div class="progress height-4px mb-2" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar" data-width="56%"></div>
                                                </div>
                                                <p class="m-0 text-custom-paragraph">14 Users remaining until your plan requires update</p>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom mt-6">
                                    <div class="pure-card-header">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M25.5521 25.6667H3.98001C3.50193 25.6667 3.10547 25.2701 3.10547 24.7917C3.10547 24.3134 3.50193 23.9167 3.98001 23.9167H25.5521C26.0302 23.9167 26.4267 24.3134 26.4267 24.7917C26.4267 25.2701 26.0302 25.6667 25.5521 25.6667Z" fill="currentColor" />
                                                    <path opacity="0.2" d="M24.7685 15.9834L16.3379 24.4184C14.6821 26.075 12.0119 26.075 10.3677 24.43L4.99219 19.0517L19.4047 4.63171L24.7802 10.01C26.4243 11.655 26.4243 14.3267 24.7685 15.9834Z" fill="currentColor" />
                                                    <path d="M19.4044 4.63173L4.98027 19.0517L3.91915 17.9901C2.27501 16.3451 2.27501 13.6734 3.93081 12.0167L12.3614 3.58173C14.0172 1.92506 16.6875 1.92506 18.3316 3.57006L19.4044 4.63173Z" fill="currentColor" />
                                                    <path d="M15.7936 20.5333L14.2195 22.1083C13.893 22.435 13.3682 22.435 13.0417 22.1083C12.7153 21.7817 12.7153 21.2567 13.0417 20.93L14.6159 19.355C14.9424 19.0283 15.4672 19.0283 15.7936 19.355C16.1201 19.6817 16.1201 20.2067 15.7936 20.5333Z" fill="currentColor" />
                                                    <path d="M20.903 15.4233L17.7663 18.5617C17.4398 18.8883 16.9151 18.8883 16.5886 18.5617C16.2621 18.235 16.2621 17.71 16.5886 17.3833L19.7253 14.245C20.0518 13.9183 20.5765 13.9183 20.903 14.245C21.2179 14.5717 21.2179 15.0967 20.903 15.4233Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Payment Methods
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="row gy-6">
                                            <div class="col-md-6">
                                                <div class="payment-card border border-custom-secondary p-6 rounded-lg d-flex flex-wrap justify-content-between gap-6">
                                                    <div class="">
                                                        <img class="mb-3" src="<?= base_url('assets/'); ?>img/icons/payments/mastercard.png" alt="">
                                                        <h3 class="m-0 fz-15px fw-semibold mb-2">Eleanor Pena <span class="badge badge-label-primary me-2">Primary</span><span class="badge badge-label-success">Active</span></h3>
                                                        <p class="text-custom-paragraph mb-0">Mastercard **** 1290</p>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-between">
                                                        <p class="text-custom-paragraph mb-5 text-xxl-end">Card expires at 05/24</p>
                                                        <div class="">
                                                            <button type="button" class="btn btn-custom-secondary btn-cancel mt-3 gap-2" data-bs-toggle="modal" data-bs-target="#editCard">
                                                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6.5 12.5H12M9.25 1.89918C9.49312 1.64359 9.82285 1.5 10.1667 1.5C10.3369 1.5 10.5055 1.53525 10.6628 1.60374C10.82 1.67224 10.963 1.77263 11.0833 1.89918C11.2037 2.02574 11.2992 2.17598 11.3643 2.34134C11.4295 2.50669 11.463 2.68391 11.463 2.86289C11.463 3.04187 11.4295 3.21909 11.3643 3.38445C11.2992 3.5498 11.2037 3.70004 11.0833 3.8266L3.44444 11.8575L1 12.5L1.61111 9.9301L9.25 1.89918Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-custom-secondary btn-cancel danger mt-3 gap-2 delete-card">
                                                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12 3.7749L11.5868 10.2912C11.4813 11.9561 11.4285 12.7885 11.0005 13.387C10.7889 13.6829 10.5164 13.9326 10.2005 14.1203C9.56141 14.4999 8.70599 14.4999 6.99516 14.4999C5.28208 14.4999 4.42554 14.4999 3.78604 14.1196C3.46987 13.9316 3.19733 13.6814 2.98579 13.3851C2.55792 12.7856 2.5063 11.952 2.40307 10.2848L2 3.7749" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M13 3.7749H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M9.70239 3.775L9.24728 2.85962C8.94496 2.25157 8.7938 1.94754 8.53305 1.75792C8.47521 1.71586 8.41397 1.67845 8.34992 1.64606C8.06118 1.5 7.71465 1.5 7.02159 1.5C6.31113 1.5 5.95589 1.5 5.66236 1.65218C5.5973 1.68591 5.53523 1.72483 5.47677 1.76856C5.213 1.96586 5.06566 2.28101 4.77098 2.91132L4.36719 3.775" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M5.33594 10.925L5.33594 7.02505" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M8.66797 10.925L8.66797 7.02496" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="payment-card border border-custom-secondary p-6 rounded-lg d-flex flex-wrap justify-content-between gap-6">
                                                    <div class="">
                                                        <img class="mb-3" src="<?= base_url('assets/'); ?>img/icons/payments/visa.png" alt="">
                                                        <h3 class="m-0 fz-15px fw-semibold mb-2">Eleanor Pena <span class="badge badge-label-danger">Expired</span></h3>
                                                        <p class="text-custom-paragraph mb-0">
                                                            Visa **** 2541
                                                        </p>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-between">
                                                        <p class="text-custom-paragraph mb-5 text-xxl-end">Card expires at 01/27</p>
                                                        <div class="">
                                                            <button type="button" class="btn btn-custom-secondary btn-cancel mt-3 gap-2" data-bs-toggle="modal" data-bs-target="#editCard">
                                                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6.5 12.5H12M9.25 1.89918C9.49312 1.64359 9.82285 1.5 10.1667 1.5C10.3369 1.5 10.5055 1.53525 10.6628 1.60374C10.82 1.67224 10.963 1.77263 11.0833 1.89918C11.2037 2.02574 11.2992 2.17598 11.3643 2.34134C11.4295 2.50669 11.463 2.68391 11.463 2.86289C11.463 3.04187 11.4295 3.21909 11.3643 3.38445C11.2992 3.5498 11.2037 3.70004 11.0833 3.8266L3.44444 11.8575L1 12.5L1.61111 9.9301L9.25 1.89918Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-custom-secondary btn-cancel danger mt-3 gap-2 delete-card">
                                                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12 3.7749L11.5868 10.2912C11.4813 11.9561 11.4285 12.7885 11.0005 13.387C10.7889 13.6829 10.5164 13.9326 10.2005 14.1203C9.56141 14.4999 8.70599 14.4999 6.99516 14.4999C5.28208 14.4999 4.42554 14.4999 3.78604 14.1196C3.46987 13.9316 3.19733 13.6814 2.98579 13.3851C2.55792 12.7856 2.5063 11.952 2.40307 10.2848L2 3.7749" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M13 3.7749H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M9.70239 3.775L9.24728 2.85962C8.94496 2.25157 8.7938 1.94754 8.53305 1.75792C8.47521 1.71586 8.41397 1.67845 8.34992 1.64606C8.06118 1.5 7.71465 1.5 7.02159 1.5C6.31113 1.5 5.95589 1.5 5.66236 1.65218C5.5973 1.68591 5.53523 1.72483 5.47677 1.76856C5.213 1.96586 5.06566 2.28101 4.77098 2.91132L4.36719 3.775" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M5.33594 10.925L5.33594 7.02505" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M8.66797 10.925L8.66797 7.02496" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="payment-card border border-custom-secondary p-6 rounded-lg d-flex flex-wrap justify-content-between gap-6">
                                                    <div class="">
                                                        <img class="mb-3" src="<?= base_url('assets/'); ?>img/icons/payments/american-express-logo.png" alt="">
                                                        <h3 class="m-0 fz-15px fw-semibold mb-2">Eleanor Pena <span class="badge badge-label-success">Active</span></h3>
                                                        <p class="text-custom-paragraph mb-0">
                                                            American Express **** 1290
                                                        </p>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-between">
                                                        <p class="text-custom-paragraph mb-5 text-xxl-end">Card expires at 09/28</p>
                                                        <div class="">
                                                            <button type="button" class="btn btn-custom-secondary btn-cancel mt-3 gap-2" data-bs-toggle="modal" data-bs-target="#editCard">
                                                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6.5 12.5H12M9.25 1.89918C9.49312 1.64359 9.82285 1.5 10.1667 1.5C10.3369 1.5 10.5055 1.53525 10.6628 1.60374C10.82 1.67224 10.963 1.77263 11.0833 1.89918C11.2037 2.02574 11.2992 2.17598 11.3643 2.34134C11.4295 2.50669 11.463 2.68391 11.463 2.86289C11.463 3.04187 11.4295 3.21909 11.3643 3.38445C11.2992 3.5498 11.2037 3.70004 11.0833 3.8266L3.44444 11.8575L1 12.5L1.61111 9.9301L9.25 1.89918Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-custom-secondary btn-cancel danger mt-3 gap-2 delete-card">
                                                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12 3.7749L11.5868 10.2912C11.4813 11.9561 11.4285 12.7885 11.0005 13.387C10.7889 13.6829 10.5164 13.9326 10.2005 14.1203C9.56141 14.4999 8.70599 14.4999 6.99516 14.4999C5.28208 14.4999 4.42554 14.4999 3.78604 14.1196C3.46987 13.9316 3.19733 13.6814 2.98579 13.3851C2.55792 12.7856 2.5063 11.952 2.40307 10.2848L2 3.7749" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M13 3.7749H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M9.70239 3.775L9.24728 2.85962C8.94496 2.25157 8.7938 1.94754 8.53305 1.75792C8.47521 1.71586 8.41397 1.67845 8.34992 1.64606C8.06118 1.5 7.71465 1.5 7.02159 1.5C6.31113 1.5 5.95589 1.5 5.66236 1.65218C5.5973 1.68591 5.53523 1.72483 5.47677 1.76856C5.213 1.96586 5.06566 2.28101 4.77098 2.91132L4.36719 3.775" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M5.33594 10.925L5.33594 7.02505" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M8.66797 10.925L8.66797 7.02496" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="bg-label-primary border-primary border-dashed h-100 w-100 p-6 rounded-lg d-flex flex-wrap justify-content-center align-items-center flex-column" data-bs-toggle="modal" data-bs-target="#addCardModal">
                                                    <svg width="51" height="50" viewBox="0 0 51 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M44.5267 45.8334H6.00505C5.15132 45.8334 4.44336 45.125 4.44336 44.2709C4.44336 43.4167 5.15132 42.7084 6.00505 42.7084H44.5267C45.3804 42.7084 46.0883 43.4167 46.0883 44.2709C46.0883 45.125 45.3804 45.8334 44.5267 45.8334Z" fill="currentColor" />
                                                        <path opacity="0.2" d="M43.1352 28.5417L28.0806 43.6042C25.1238 46.5625 20.3554 46.5625 17.4195 43.625L7.82031 34.0209L33.5569 8.27087L43.1561 17.875C46.092 20.8125 46.092 25.5834 43.1352 28.5417Z" fill="currentColor" />
                                                        <path d="M33.5587 8.27092L7.80126 34.0209L5.90641 32.1251C2.97044 29.1876 2.97044 24.4168 5.92724 21.4584L20.9819 6.39592C23.9387 3.43759 28.707 3.43759 31.643 6.37509L33.5587 8.27092Z" fill="currentColor" />
                                                        <path d="M27.1053 36.6667L24.2943 39.4792C23.7112 40.0625 22.7742 40.0625 22.1912 39.4792C21.6081 38.8958 21.6081 37.9583 22.1912 37.375L25.0022 34.5625C25.5852 33.9792 26.5223 33.9792 27.1053 34.5625C27.6883 35.1458 27.6883 36.0833 27.1053 36.6667Z" fill="currentColor" />
                                                        <path d="M36.2295 27.5417L30.6282 33.1458C30.0452 33.7292 29.1082 33.7292 28.5252 33.1458C27.9421 32.5625 27.9421 31.625 28.5252 31.0417L34.1264 25.4375C34.7094 24.8542 35.6465 24.8542 36.2295 25.4375C36.7917 26.0208 36.7917 26.9583 36.2295 27.5417Z" fill="currentColor" />
                                                    </svg>
                                                    <span class="mt-2 fz-15px fw-medium mb-0 text-primary">+ Add payment method</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editCard" tabindex="-1" role="dialog" aria-labelledby="editCardLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="pure-modal-header d-flex flex-wrap justify-content-between align-items-center gap-6 px-8 py-6 border-bottom">
                                        <h1 class="pure-modal-title fs-5 d-flex align-items-center gap-2 m-0" id="editCardLabel">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" d="M10 19H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.5 1.65321C14.8978 1.23497 15.4374 1 16 1C16.2786 1 16.5544 1.05769 16.8118 1.16976C17.0692 1.28184 17.303 1.44611 17.5 1.65321C17.697 1.8603 17.8532 2.10615 17.9598 2.37673C18.0664 2.64731 18.1213 2.93731 18.1213 3.23019C18.1213 3.52306 18.0664 3.81306 17.9598 4.08364C17.8532 4.35422 17.697 4.60007 17.5 4.80717L5 17.9487L1 19L2 14.7947L14.5 1.65321Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            Edit Card
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
                                            <div class="col-12">
                                                <label for="edit_name" class="form-label">Name On Card<span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="edit_name" placeholder="Name">
                                            </div>
                                            <div class="col-12">
                                                <label for="edit_card_number" class="form-label">Card Number <span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="edit_card_number" placeholder="Card Number">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="edit_expiry_date" class="form-label">Expiry Date <span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="edit_expiry_date" placeholder="MM/YY">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="edit_cvv" class="form-label">CVV <span class="text-danger fw-bold">*</span></label>
                                                <input type="text" class="form-control" id="edit_cvv" placeholder="CVV">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pure-modal-footer px-8 pb-8">
                                        <div class="d-flex flex-wrap justify-content-end gap-4">
                                            <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary ">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add Card Modal -->
                        <div class="modal fade" id="addCardModal" tabindex="-1" role="dialog" aria-labelledby="addCardModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="pure-modal-header d-flex flex-wrap justify-content-between align-items-center gap-6 px-8 py-6 border-bottom">
                                        <h1 class="pure-modal-title fs-5 d-flex align-items-center gap-2 m-0" id="addCardModalLabel">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" d="M2.92969 14.8777L14.8797 2.92773" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path opacity="0.4" d="M10.1016 17.2775L11.3016 16.0775" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path opacity="0.4" d="M12.793 14.5873L15.183 12.1973" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.60127 9.23754L9.24127 2.59754C11.3613 0.477536 12.4213 0.467536 14.5213 2.56754L19.4313 7.47754C21.5313 9.57754 21.5213 10.6375 19.4013 12.7575L12.7613 19.3975C10.6413 21.5175 9.58127 21.5275 7.48127 19.4275L2.57127 14.5175C0.47127 12.4175 0.47127 11.3675 2.60127 9.23754Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M1 20.9971H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            Add Card
                                        </h1>
                                        <button type="button" class="pure-btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 1L1 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 1L11 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="pure-modal-body px-8 py-7">
                                        <div class="custom-slideable-tab">
                                            <nav>
                                                <div class="nav nav-tabs pure-slideable-tab-wrapper pure-slideable-tab-wrapper-style position-relative d-flex flex-wrap" id="nav-tab" role="tablist">
                                                    <button class="nav-link pure-slide-tab-item active w-50" id="nav-card-tab" data-bs-toggle="tab" data-bs-target="#nav-card" type="button" role="tab" aria-controls="nav-card" aria-selected="true">Credit or Debit Card</button>
                                                    <button class="nav-link pure-slide-tab-item w-50" id="nav-paypal-tab" data-bs-toggle="tab" data-bs-target="#nav-paypal" type="button" role="tab" aria-controls="nav-paypal" aria-selected="false">PayPal</button>
                                                    <span class="pure-slide-tab-bar"></span>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-card" role="tabpanel" aria-labelledby="nav-card-tab" tabindex="0">
                                                    <div class="py-6">
                                                        <div class="row gy-5">
                                                            <div class="col-12">
                                                                <label for="add_name" class="form-label">Name On Card<span class="text-danger fw-bold">*</span></label>
                                                                <input type="text" class="form-control" id="add_name" placeholder="Name">
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="add_card_number" class="form-label">Card Number <span class="text-danger fw-bold">*</span></label>
                                                                <input type="text" class="form-control" id="add_card_number" placeholder="Card Number">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="add_expiry_date" class="form-label">Expiry Date <span class="text-danger fw-bold">*</span></label>
                                                                <input type="text" class="form-control" id="add_expiry_date" placeholder="MM/YY">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="add_cvv" class="form-label">CVV <span class="text-danger fw-bold">*</span></label>
                                                                <input type="text" class="form-control" id="add_cvv" placeholder="CVV">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-wrap justify-content-end gap-4 mt-4">
                                                        <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Add</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-paypal" role="tabpanel" aria-labelledby="nav-paypal-tab" tabindex="0">
                                                    <div class="py-6">
                                                        <div class="row gy-5">
                                                            <div class="col-12">
                                                                <label for="add_secret_key" class="form-label">Secret Key <span class="text-danger fw-bold">*</span></label>
                                                                <input type="text" class="form-control" id="add_secret_key" placeholder="PayPal Secret Key">
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="add_clientKey" class="form-label">Client Key <span class="text-danger fw-bold">*</span></label>
                                                                <input type="text" class="form-control" id="add_clientKey" placeholder="Client Key">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="add_api_key" class="form-label">Api Key </label>
                                                                <input type="text" class="form-control" id="add_api_key" placeholder="Api Key ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-wrap justify-content-end gap-4 mt-4">
                                                        <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>