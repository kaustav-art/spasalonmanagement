<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Customer Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer Details</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="">
                            <button class="btn btn-label-danger" type="button">Delete Customer</button>
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

                        <div class="row gy-6">
                            <div class="col-md-5">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header">
                                        <h1 class="h3 pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.4763 11.7073C13.6583 11.7073 16.2378 9.08652 16.2378 5.85365C16.2378 2.62077 13.6583 0 10.4763 0C7.29436 0 4.71484 2.62077 4.71484 5.85365C4.71484 9.08652 7.29436 11.7073 10.4763 11.7073Z" fill="currentColor" />
                                                    <path opacity="0.4" d="M10.4744 13.6342C4.70142 13.6342 0 17.5678 0 22.4146C0 22.7424 0.253506 23 0.57615 23H20.3727C20.6954 23 20.9489 22.7424 20.9489 22.4146C20.9489 17.5678 16.2475 13.6342 10.4744 13.6342Z" fill="currentColor" />
                                                    <path d="M21.3452 13.9151C20.3081 12.8615 19.49 13.201 18.7871 13.9151L14.708 18.0596C14.5466 18.2235 14.3968 18.5278 14.3623 18.7503L14.1433 20.3307C14.0627 20.9044 14.4545 21.3024 15.0191 21.2205L16.5747 20.998C16.7936 20.9629 17.1048 20.8107 17.2546 20.6468L21.3337 16.5025C22.0481 15.8 22.3823 14.9688 21.3452 13.9151Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Basic Information
                                        </h1>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="profile-info d-flex flex-column gap-3">
                                            <div class="profile-info-item d-flex align-items-center">
                                                <span class="profile-info-label">Name: </span>
                                                <span class="profile-info-content">Joel Becker</span>
                                            </div>
                                            <div class="profile-info-item d-flex align-items-center">
                                                <span class="profile-info-label">Username: </span>
                                                <span class="profile-info-content">joel_becker</span>
                                            </div>
                                            <div class="profile-info-item d-flex align-items-center">
                                                <span class="profile-info-label">Phone: </span>
                                                <span class="profile-info-content">+1 234 567 890</span>
                                            </div>
                                            <div class="profile-info-item d-flex align-items-center">
                                                <span class="profile-info-label">Language: </span>
                                                <span class="profile-info-content">English</span>
                                            </div>
                                            <div class="profile-info-item d-flex align-items-center">
                                                <span class="profile-info-label">Status: </span>
                                                <span class="profile-info-content">
                                                    <span class="badge bg-label-success rounded-pill px-2 py-1">Active</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row g-6">
                                    <div class="col-md-6">
                                        <div class="pure-card rounded-custom card-bg shadow-custom h-100 position-relative p-5">
                                            <div class="card-info">
                                                <h2 class="h5 mb-2 text-body-secondary fz-15px">Orders</h2>
                                                <h2 class="mb-4">342</h2>
                                                <p class="mb-0 text-truncate">
                                                    Total number of orders placed
                                                </p>
                                            </div>
                                            <div class="position-absolute top-5 end-5">
                                                <div class="avatar avatar-md rounded-md">
                                                    <div class="avatar-text bg-primary">
                                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M20.5806 10.4163C20.6069 10.2016 20.5876 9.98374 20.524 9.77698C20.4603 9.57022 20.3538 9.3792 20.2114 9.2164C20.0672 9.0523 19.8897 8.92079 19.6908 8.83061C19.4918 8.74042 19.276 8.69364 19.0575 8.69336H2.53447C2.31604 8.69364 2.10016 8.74042 1.90121 8.83061C1.70226 8.92079 1.5248 9.0523 1.38063 9.2164C1.23817 9.3792 1.13165 9.57022 1.06803 9.77698C1.00441 9.98374 0.985112 10.2016 1.0114 10.4163L2.16524 19.6464C2.21059 20.0216 2.39249 20.367 2.67624 20.6167C2.95999 20.8664 3.32574 21.0029 3.7037 21.0001H17.9191C18.297 21.0029 18.6628 20.8664 18.9465 20.6167C19.2303 20.367 19.4122 20.0216 19.4575 19.6464L20.5806 10.4163Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M3.87317 8.69174V7.92256C3.87317 6.08659 4.60256 4.3258 5.90089 3.02757C7.19921 1.72934 8.96012 1 10.7962 1C12.6323 1 14.3932 1.72934 15.6916 3.02757C16.9899 4.3258 17.7193 6.08659 17.7193 7.92256V8.69174" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7.71899 13.3066V16.3833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M13.8732 13.3066V16.3833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pure-card rounded-custom card-bg shadow-custom h-100 position-relative p-5">
                                            <div class="card-info">
                                                <h2 class="h5 mb-2 text-body-secondary fz-15px">Total Spent</h2>
                                                <h2 class="mb-4">$5682</h2>
                                                <p class="mb-0 text-truncate">
                                                    Total amount spent by the customer
                                                </p>
                                            </div>
                                            <div class="position-absolute top-5 end-5">
                                                <div class="avatar avatar-md rounded-md">
                                                    <div class="avatar-text bg-success">
                                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11 7.15437V4.84668" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M8.69229 13.3072C8.69229 14.461 9.72306 14.8456 11 14.8456C12.2769 14.8456 13.3077 14.8456 13.3077 13.3072C13.3077 10.9995 8.69229 10.9995 8.69229 8.69178C8.69229 7.15332 9.72306 7.15332 11 7.15332C12.2769 7.15332 13.3077 7.73794 13.3077 8.69178" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M11 14.8467V17.1544" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pure-card rounded-custom card-bg shadow-custom h-100 position-relative p-5">
                                            <div class="card-info">
                                                <h2 class="h5 mb-2 text-body-secondary fz-15px">Membership</h2>
                                                <h2 class="mb-4">1342</h2>
                                                <p class="mb-0 text-truncate">
                                                    Points earned by the customer
                                                </p>
                                            </div>
                                            <div class="position-absolute top-5 end-5">
                                                <div class="avatar avatar-md rounded-md">
                                                    <div class="avatar-text bg-info">
                                                        <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.7 1.01587H5.43144C5.17165 1.023 4.91718 1.09117 4.68861 1.21486C4.46005 1.33856 4.2638 1.5143 4.11574 1.72788L1.29859 5.62848C1.0894 5.92408 0.984931 6.28108 1.00176 6.64282C1.01858 7.00455 1.15574 7.35031 1.39146 7.62522L9.84291 17.3612C9.98759 17.5477 10.173 17.6985 10.3849 17.8023C10.5969 17.9061 10.8297 17.9601 11.0657 17.9601C11.3017 17.9601 11.5346 17.9061 11.7465 17.8023C11.9585 17.6985 12.1439 17.5477 12.2886 17.3612L20.74 7.62522C20.9757 7.35031 21.1129 7.00455 21.1297 6.64282C21.1465 6.28108 21.0421 5.92408 20.8329 5.62848L18.0157 1.72788C17.8677 1.5143 17.6714 1.33856 17.4429 1.21486C17.2143 1.09117 16.9598 1.023 16.7 1.01587V1.01587Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M10.2608 1L6.484 6.8509L11.0657 17.9181" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M11.9171 1L15.6784 6.8509L11.0657 17.9181" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M1.03545 6.85083H21.096" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pure-card rounded-custom card-bg shadow-custom h-100 position-relative p-5">
                                            <div class="card-info">
                                                <h2 class="h5 mb-2 text-body-secondary fz-15px">Coupons</h2>
                                                <h2 class="mb-4">43</h2>
                                                <p class="mb-0 text-truncate">
                                                    Customer has used 43 coupons
                                                </p>
                                            </div>
                                            <div class="position-absolute top-5 end-5">
                                                <div class="avatar avatar-md rounded-md">
                                                    <div class="avatar-text bg-warning">
                                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M19.9877 4.95605H2.58231C1.70842 4.95605 1 5.66448 1 6.53836V11.2853C1 12.1592 1.70842 12.8676 2.58231 12.8676H19.9877C20.8616 12.8676 21.57 12.1592 21.57 11.2853V6.53836C21.57 5.66448 20.8616 4.95605 19.9877 4.95605Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M19.9877 12.8674V19.9878C19.9877 20.4075 19.821 20.8099 19.5242 21.1067C19.2275 21.4034 18.825 21.5701 18.4054 21.5701H4.16461C3.74496 21.5701 3.34249 21.4034 3.04575 21.1067C2.74901 20.8099 2.58231 20.4075 2.58231 19.9878V12.8674" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M11.285 4.95605V21.5703" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M16.0319 1L11.285 4.95577L6.53808 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom mt-6">
                                    <div class="pure-card-header">
                                        <h1 class="pure-card-title h3 d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M25.5521 25.6667H3.98001C3.50193 25.6667 3.10547 25.2701 3.10547 24.7917C3.10547 24.3134 3.50193 23.9167 3.98001 23.9167H25.5521C26.0302 23.9167 26.4267 24.3134 26.4267 24.7917C26.4267 25.2701 26.0302 25.6667 25.5521 25.6667Z" fill="currentColor" />
                                                    <path opacity="0.2" d="M24.7685 15.9834L16.3379 24.4184C14.6821 26.075 12.0119 26.075 10.3677 24.43L4.99219 19.0517L19.4047 4.63171L24.7802 10.01C26.4243 11.655 26.4243 14.3267 24.7685 15.9834Z" fill="currentColor" />
                                                    <path d="M19.4044 4.63173L4.98027 19.0517L3.91915 17.9901C2.27501 16.3451 2.27501 13.6734 3.93081 12.0167L12.3614 3.58173C14.0172 1.92506 16.6875 1.92506 18.3316 3.57006L19.4044 4.63173Z" fill="currentColor" />
                                                    <path d="M15.7936 20.5333L14.2195 22.1083C13.893 22.435 13.3682 22.435 13.0417 22.1083C12.7153 21.7817 12.7153 21.2567 13.0417 20.93L14.6159 19.355C14.9424 19.0283 15.4672 19.0283 15.7936 19.355C16.1201 19.6817 16.1201 20.2067 15.7936 20.5333Z" fill="currentColor" />
                                                    <path d="M20.903 15.4233L17.7663 18.5617C17.4398 18.8883 16.9151 18.8883 16.5886 18.5617C16.2621 18.235 16.2621 17.71 16.5886 17.3833L19.7253 14.245C20.0518 13.9183 20.5765 13.9183 20.903 14.245C21.2179 14.5717 21.2179 15.0967 20.903 15.4233Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Billing History
                                        </h1>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-custom-paragraph fw-medium">Order ID</th>
                                                        <th scope="col" class="text-custom-paragraph fw-medium">Status</th>
                                                        <th scope="col" class="text-custom-paragraph fw-medium">Amount</th>
                                                        <th scope="col" class="text-custom-paragraph fw-medium">Invoice</th>
                                                        <th scope="col" class="text-custom-paragraph fw-medium">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 f py-1 text-custom-body">
                                                                <span class="fw-medium text-primary fz-15px">#PXF-578</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-label-success">Successful</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1 text-custom-body">
                                                                <span class="fw-normal text-custom-body fz-15px">$160.54</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1">
                                                                <a href="#" class="table-invoice-btn d-inline-flex align-items-center gap-2 text-decoration-none">
                                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g opacity="0.4">
                                                                            <path d="M5.20312 6.40015V10.0001L6.40312 8.80015" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M5.20195 10.0003L4.00195 8.80029" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </g>
                                                                        <path d="M13.002 5.8V8.8C13.002 11.8 11.802 13 8.80195 13H5.20195C2.20195 13 1.00195 11.8 1.00195 8.8V5.2C1.00195 2.2 2.20195 1 5.20195 1H8.20195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M13.0031 5.8H10.6031C8.80312 5.8 8.20312 5.2 8.20312 3.4V1L13.0031 5.8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                    PDF
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View">
                                                                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M15.6599 5.31785C15.8879 5.62236 16.002 5.77462 16.002 6C16.002 6.22538 15.8879 6.37764 15.6599 6.68215C14.6354 8.0504 12.0189 11 8.50195 11C4.98504 11 2.36853 8.0504 1.34398 6.68215C1.11596 6.37764 1.00195 6.22538 1.00195 6C1.00195 5.77462 1.11596 5.62236 1.34398 5.31785C2.36852 3.9496 4.98504 1 8.50195 1C12.0189 1 14.6354 3.9496 15.6599 5.31785Z" stroke="currentColor" stroke-width="1.5" />
                                                                        <path d="M10.752 5.99972C10.752 4.81625 9.74459 3.85686 8.50195 3.85686C7.25931 3.85686 6.25195 4.81625 6.25195 5.99972C6.25195 7.18319 7.25931 8.14258 8.50195 8.14258C9.74459 8.14258 10.752 7.18319 10.752 5.99972Z" stroke="currentColor" stroke-width="1.5" />
                                                                    </svg>
                                                                </button>

                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete">
                                                                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13.0508 3.44995L12.617 10.4675C12.5061 12.2605 12.4507 13.1569 12.0013 13.8015C11.7791 14.1201 11.493 14.3891 11.1613 14.5912C10.4903 15 9.59207 15 7.7957 15C5.99696 15 5.09759 15 4.42612 14.5904C4.09414 14.3879 3.80798 14.1185 3.58586 13.7993C3.13659 13.1538 3.0824 12.256 2.97401 10.4606L2.55078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M14.1 3.44998H1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.6371 3.45L10.1592 2.46421C9.84181 1.80938 9.6831 1.48197 9.40931 1.27776C9.34858 1.23247 9.28428 1.19218 9.21703 1.15729C8.91385 1 8.54999 1 7.82228 1C7.07629 1 6.7033 1 6.39509 1.16388C6.32678 1.20021 6.2616 1.24213 6.20022 1.28922C5.92326 1.50169 5.76855 1.84109 5.45913 2.51988L5.03516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M6.05078 11.15L6.05078 6.95003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.55078 11.15L9.55078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1 text-custom-body">
                                                                <span class="fw-medium text-primary fz-15px">#PXF-453</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-label-danger">
                                                                Failed
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1 text-custom-body">
                                                                <span class="fw-normal text-custom-body fz-15px">$133.00</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1">
                                                                <a href="#" class="table-invoice-btn d-inline-flex align-items-center gap-2 text-decoration-none">
                                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g opacity="0.4">
                                                                            <path d="M5.20312 6.40015V10.0001L6.40312 8.80015" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M5.20195 10.0003L4.00195 8.80029" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </g>
                                                                        <path d="M13.002 5.8V8.8C13.002 11.8 11.802 13 8.80195 13H5.20195C2.20195 13 1.00195 11.8 1.00195 8.8V5.2C1.00195 2.2 2.20195 1 5.20195 1H8.20195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M13.0031 5.8H10.6031C8.80312 5.8 8.20312 5.2 8.20312 3.4V1L13.0031 5.8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                    PDF
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View">
                                                                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M15.6599 5.31785C15.8879 5.62236 16.002 5.77462 16.002 6C16.002 6.22538 15.8879 6.37764 15.6599 6.68215C14.6354 8.0504 12.0189 11 8.50195 11C4.98504 11 2.36853 8.0504 1.34398 6.68215C1.11596 6.37764 1.00195 6.22538 1.00195 6C1.00195 5.77462 1.11596 5.62236 1.34398 5.31785C2.36852 3.9496 4.98504 1 8.50195 1C12.0189 1 14.6354 3.9496 15.6599 5.31785Z" stroke="currentColor" stroke-width="1.5" />
                                                                        <path d="M10.752 5.99972C10.752 4.81625 9.74459 3.85686 8.50195 3.85686C7.25931 3.85686 6.25195 4.81625 6.25195 5.99972C6.25195 7.18319 7.25931 8.14258 8.50195 8.14258C9.74459 8.14258 10.752 7.18319 10.752 5.99972Z" stroke="currentColor" stroke-width="1.5" />
                                                                    </svg>
                                                                </button>

                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete">
                                                                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13.0508 3.44995L12.617 10.4675C12.5061 12.2605 12.4507 13.1569 12.0013 13.8015C11.7791 14.1201 11.493 14.3891 11.1613 14.5912C10.4903 15 9.59207 15 7.7957 15C5.99696 15 5.09759 15 4.42612 14.5904C4.09414 14.3879 3.80798 14.1185 3.58586 13.7993C3.13659 13.1538 3.0824 12.256 2.97401 10.4606L2.55078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M14.1 3.44998H1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.6371 3.45L10.1592 2.46421C9.84181 1.80938 9.6831 1.48197 9.40931 1.27776C9.34858 1.23247 9.28428 1.19218 9.21703 1.15729C8.91385 1 8.54999 1 7.82228 1C7.07629 1 6.7033 1 6.39509 1.16388C6.32678 1.20021 6.2616 1.24213 6.20022 1.28922C5.92326 1.50169 5.76855 1.84109 5.45913 2.51988L5.03516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M6.05078 11.15L6.05078 6.95003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.55078 11.15L9.55078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1 text-custom-body">
                                                                <span class="fw-medium text-primary fz-15px">#PXF-439</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-label-success">Successful</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1 text-custom-body">
                                                                <span class="fw-normal text-custom-body fz-15px">$193.50</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1">
                                                                <a href="#" class="table-invoice-btn d-inline-flex align-items-center gap-2 text-decoration-none">
                                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g opacity="0.4">
                                                                            <path d="M5.20312 6.40015V10.0001L6.40312 8.80015" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M5.20195 10.0003L4.00195 8.80029" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </g>
                                                                        <path d="M13.002 5.8V8.8C13.002 11.8 11.802 13 8.80195 13H5.20195C2.20195 13 1.00195 11.8 1.00195 8.8V5.2C1.00195 2.2 2.20195 1 5.20195 1H8.20195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M13.0031 5.8H10.6031C8.80312 5.8 8.20312 5.2 8.20312 3.4V1L13.0031 5.8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                    PDF
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View">
                                                                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M15.6599 5.31785C15.8879 5.62236 16.002 5.77462 16.002 6C16.002 6.22538 15.8879 6.37764 15.6599 6.68215C14.6354 8.0504 12.0189 11 8.50195 11C4.98504 11 2.36853 8.0504 1.34398 6.68215C1.11596 6.37764 1.00195 6.22538 1.00195 6C1.00195 5.77462 1.11596 5.62236 1.34398 5.31785C2.36852 3.9496 4.98504 1 8.50195 1C12.0189 1 14.6354 3.9496 15.6599 5.31785Z" stroke="currentColor" stroke-width="1.5" />
                                                                        <path d="M10.752 5.99972C10.752 4.81625 9.74459 3.85686 8.50195 3.85686C7.25931 3.85686 6.25195 4.81625 6.25195 5.99972C6.25195 7.18319 7.25931 8.14258 8.50195 8.14258C9.74459 8.14258 10.752 7.18319 10.752 5.99972Z" stroke="currentColor" stroke-width="1.5" />
                                                                    </svg>
                                                                </button>

                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete">
                                                                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13.0508 3.44995L12.617 10.4675C12.5061 12.2605 12.4507 13.1569 12.0013 13.8015C11.7791 14.1201 11.493 14.3891 11.1613 14.5912C10.4903 15 9.59207 15 7.7957 15C5.99696 15 5.09759 15 4.42612 14.5904C4.09414 14.3879 3.80798 14.1185 3.58586 13.7993C3.13659 13.1538 3.0824 12.256 2.97401 10.4606L2.55078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M14.1 3.44998H1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.6371 3.45L10.1592 2.46421C9.84181 1.80938 9.6831 1.48197 9.40931 1.27776C9.34858 1.23247 9.28428 1.19218 9.21703 1.15729C8.91385 1 8.54999 1 7.82228 1C7.07629 1 6.7033 1 6.39509 1.16388C6.32678 1.20021 6.2616 1.24213 6.20022 1.28922C5.92326 1.50169 5.76855 1.84109 5.45913 2.51988L5.03516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M6.05078 11.15L6.05078 6.95003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.55078 11.15L9.55078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1 text-custom-body">
                                                                <span class="fw-medium text-primary fz-15px">#PXF-403</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-label-warning">Pending</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1 text-custom-body">
                                                                <span class="fw-normal text-custom-body fz-15px">$2145.99</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1">
                                                                <a href="#" class="table-invoice-btn d-inline-flex align-items-center gap-2 text-decoration-none">
                                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g opacity="0.4">
                                                                            <path d="M5.20312 6.40015V10.0001L6.40312 8.80015" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M5.20195 10.0003L4.00195 8.80029" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </g>
                                                                        <path d="M13.002 5.8V8.8C13.002 11.8 11.802 13 8.80195 13H5.20195C2.20195 13 1.00195 11.8 1.00195 8.8V5.2C1.00195 2.2 2.20195 1 5.20195 1H8.20195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M13.0031 5.8H10.6031C8.80312 5.8 8.20312 5.2 8.20312 3.4V1L13.0031 5.8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                    PDF
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View">
                                                                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M15.6599 5.31785C15.8879 5.62236 16.002 5.77462 16.002 6C16.002 6.22538 15.8879 6.37764 15.6599 6.68215C14.6354 8.0504 12.0189 11 8.50195 11C4.98504 11 2.36853 8.0504 1.34398 6.68215C1.11596 6.37764 1.00195 6.22538 1.00195 6C1.00195 5.77462 1.11596 5.62236 1.34398 5.31785C2.36852 3.9496 4.98504 1 8.50195 1C12.0189 1 14.6354 3.9496 15.6599 5.31785Z" stroke="currentColor" stroke-width="1.5" />
                                                                        <path d="M10.752 5.99972C10.752 4.81625 9.74459 3.85686 8.50195 3.85686C7.25931 3.85686 6.25195 4.81625 6.25195 5.99972C6.25195 7.18319 7.25931 8.14258 8.50195 8.14258C9.74459 8.14258 10.752 7.18319 10.752 5.99972Z" stroke="currentColor" stroke-width="1.5" />
                                                                    </svg>
                                                                </button>

                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete">
                                                                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13.0508 3.44995L12.617 10.4675C12.5061 12.2605 12.4507 13.1569 12.0013 13.8015C11.7791 14.1201 11.493 14.3891 11.1613 14.5912C10.4903 15 9.59207 15 7.7957 15C5.99696 15 5.09759 15 4.42612 14.5904C4.09414 14.3879 3.80798 14.1185 3.58586 13.7993C3.13659 13.1538 3.0824 12.256 2.97401 10.4606L2.55078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M14.1 3.44998H1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.6371 3.45L10.1592 2.46421C9.84181 1.80938 9.6831 1.48197 9.40931 1.27776C9.34858 1.23247 9.28428 1.19218 9.21703 1.15729C8.91385 1 8.54999 1 7.82228 1C7.07629 1 6.7033 1 6.39509 1.16388C6.32678 1.20021 6.2616 1.24213 6.20022 1.28922C5.92326 1.50169 5.76855 1.84109 5.45913 2.51988L5.03516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M6.05078 11.15L6.05078 6.95003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.55078 11.15L9.55078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1 text-custom-body">
                                                                <span class="fw-medium text-primary fz-15px">#PXF-354</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-label-info">Refunded</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1 text-custom-body">
                                                                <span class="fw-normal text-custom-body fz-15px">$1245.00</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1">
                                                                <a href="#" class="table-invoice-btn d-inline-flex align-items-center gap-2 text-decoration-none">
                                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g opacity="0.4">
                                                                            <path d="M5.20312 6.40015V10.0001L6.40312 8.80015" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M5.20195 10.0003L4.00195 8.80029" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </g>
                                                                        <path d="M13.002 5.8V8.8C13.002 11.8 11.802 13 8.80195 13H5.20195C2.20195 13 1.00195 11.8 1.00195 8.8V5.2C1.00195 2.2 2.20195 1 5.20195 1H8.20195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M13.0031 5.8H10.6031C8.80312 5.8 8.20312 5.2 8.20312 3.4V1L13.0031 5.8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                    PDF
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2 py-1">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View">
                                                                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M15.6599 5.31785C15.8879 5.62236 16.002 5.77462 16.002 6C16.002 6.22538 15.8879 6.37764 15.6599 6.68215C14.6354 8.0504 12.0189 11 8.50195 11C4.98504 11 2.36853 8.0504 1.34398 6.68215C1.11596 6.37764 1.00195 6.22538 1.00195 6C1.00195 5.77462 1.11596 5.62236 1.34398 5.31785C2.36852 3.9496 4.98504 1 8.50195 1C12.0189 1 14.6354 3.9496 15.6599 5.31785Z" stroke="currentColor" stroke-width="1.5" />
                                                                        <path d="M10.752 5.99972C10.752 4.81625 9.74459 3.85686 8.50195 3.85686C7.25931 3.85686 6.25195 4.81625 6.25195 5.99972C6.25195 7.18319 7.25931 8.14258 8.50195 8.14258C9.74459 8.14258 10.752 7.18319 10.752 5.99972Z" stroke="currentColor" stroke-width="1.5" />
                                                                    </svg>
                                                                </button>

                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete">
                                                                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13.0508 3.44995L12.617 10.4675C12.5061 12.2605 12.4507 13.1569 12.0013 13.8015C11.7791 14.1201 11.493 14.3891 11.1613 14.5912C10.4903 15 9.59207 15 7.7957 15C5.99696 15 5.09759 15 4.42612 14.5904C4.09414 14.3879 3.80798 14.1185 3.58586 13.7993C3.13659 13.1538 3.0824 12.256 2.97401 10.4606L2.55078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M14.1 3.44998H1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.6371 3.45L10.1592 2.46421C9.84181 1.80938 9.6831 1.48197 9.40931 1.27776C9.34858 1.23247 9.28428 1.19218 9.21703 1.15729C8.91385 1 8.54999 1 7.82228 1C7.07629 1 6.7033 1 6.39509 1.16388C6.32678 1.20021 6.2616 1.24213 6.20022 1.28922C5.92326 1.50169 5.76855 1.84109 5.45913 2.51988L5.03516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M6.05078 11.15L6.05078 6.95003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.55078 11.15L9.55078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-end mt-4">
                                            <nav aria-label="Page navigation example">
                                                <ul class="custom-pagination m-0">
                                                    <li class="disabled">
                                                        <a class="" href="<?= site_url('settings/billing'); ?>">Previous</a>
                                                    </li>
                                                    <li class="">
                                                        <a class="" href="<?= site_url('settings/billing'); ?>">1</a>
                                                    </li>
                                                    <li class="active">
                                                        <a class="" href="<?= site_url('settings/billing'); ?>">2</a>
                                                    </li>
                                                    <li class="">
                                                        <a class="" href="<?= site_url('settings/billing'); ?>">3</a>
                                                    </li>
                                                    <li class="">
                                                        <a class="" href="<?= site_url('settings/billing'); ?>">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>