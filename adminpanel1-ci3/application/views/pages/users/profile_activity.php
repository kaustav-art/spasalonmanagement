<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-content">
                        <div class="profile-header card-bg shadow-custom rounded-custom position-relative overflow-hidden mb-6">
                            <div class="profile-cover-wrapper">
                                <div class="profile-cover-img" data-background="assets/img/profile/cover.jpg"></div>
                                <div class="profile-cover-actions"></div>
                            </div>
                            <div class="profile-header-bottom position-relative d-flex justify-content-between align-items-end mx-8 pb-5 flex-wrap gap-5">
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
                                        <a class="nav-link" aria-current="page" href="<?= site_url('profile'); ?>">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('profile/projects'); ?>">Projects</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('profile/team'); ?>">Teams</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('profile/connections'); ?>">Connections</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('profile/followers'); ?>">Followers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= site_url('profile/activity'); ?>">Activity</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-bg shadow-custom rounded-custom">
                                    <div class="py-5 px-7 border-bottom mb-8">
                                        <div class="row align-items-center gy-4">
                                            <div class="col-lg-6 col-md-5">
                                                <div class="d-flex align-items-center gap-3">
                                                    <span class="text-primary d-inline-block mb-1">
                                                        <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.35966 0C6.83875 0 7.22713 0.388379 7.22713 0.86747V4.33735C7.22713 4.81644 6.83875 5.20482 6.35966 5.20482C5.88057 5.20482 5.49219 4.81644 5.49219 4.33735V0.86747C5.49219 0.388379 5.88057 0 6.35966 0Z" fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6136 0C16.0927 0 16.481 0.388379 16.481 0.86747V4.33735C16.481 4.81644 16.0927 5.20482 15.6136 5.20482C15.1345 5.20482 14.7461 4.81644 14.7461 4.33735V0.86747C14.7461 0.388379 15.1345 0 15.6136 0Z" fill="currentColor" />
                                                            <path opacity="0.3" d="M21.9759 8.23519V18.3672C21.9759 18.5523 21.9643 18.7374 21.9528 18.9108H0.0231325C0.0115662 18.7374 0 18.5523 0 18.3672V8.23519C0 5.12386 2.52145 2.60242 5.63277 2.60242H16.3431C19.4545 2.60242 21.9759 5.12386 21.9759 8.23519Z" fill="currentColor" />
                                                            <path d="M21.9531 18.9108C21.6755 21.7677 19.2697 24 16.3434 24H5.63307C2.70681 24 0.301028 21.7677 0.0234375 18.9108H21.9531Z" fill="currentColor" />
                                                            <path d="M12.755 11.9942C13.2754 11.6357 13.5993 11.1036 13.5993 10.3865C13.5993 8.88291 12.3964 8.10797 10.9853 8.10797C9.57423 8.10797 8.35977 8.88291 8.35977 10.3865C8.35977 11.1036 8.6952 11.6472 9.20411 11.9942C8.49857 12.4106 8.09375 13.0815 8.09375 13.868C8.09375 15.3022 9.19255 16.1928 10.9853 16.1928C12.7665 16.1928 13.8769 15.3022 13.8769 13.868C13.8769 13.0815 13.4721 12.3991 12.755 11.9942ZM10.9853 9.54219C11.5868 9.54219 12.0263 9.87761 12.0263 10.4559C12.0263 11.0227 11.5868 11.3812 10.9853 11.3812C10.3839 11.3812 9.94435 11.0227 9.94435 10.4559C9.94435 9.87761 10.3839 9.54219 10.9853 9.54219ZM10.9853 14.747C10.2219 14.747 9.66676 14.3653 9.66676 13.6713C9.66676 12.9774 10.2219 12.6072 10.9853 12.6072C11.7487 12.6072 12.3039 12.9889 12.3039 13.6713C12.3039 14.3653 11.7487 14.747 10.9853 14.747Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <h4 class="mb-0 fs-5">24 April 2024</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-7">
                                                <ul class="nav justify-content-lg-end gap-6">
                                                    <li class="nav-item">
                                                        <a class="nav-link p-0 active fw-medium" aria-current="page" href="<?= site_url('profile/activity'); ?>">Today</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link p-0 fw-medium" href="<?= site_url('profile/activity'); ?>">Week</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link p-0 fw-medium" href="<?= site_url('profile/activity'); ?>">Month</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link p-0 fw-medium" href="<?= site_url('profile/activity'); ?>">2025</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-8">
                                        <ul class="timeline timeline-avatar mb-0">
                                            <li class="timeline-item">
                                                <div class="timeline-point-avatar">
                                                    <div class="avatar avatar-sm rounded-pill">
                                                        <div class="avatar-text bg-primary">AK</div>
                                                    </div>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="mb-4">
                                                        <div class="timeline-header mb-3">
                                                            <h5 class="h6 mb-0 timeline-title">12 Invoices have been paid</h5>
                                                        </div>
                                                        <div class="timeline-body">
                                                            <p class="mb-2">Invoices have been paid to the company</p>
                                                            <div class="d-flex align-items-center mb-2">
                                                                <div class="badge bg-label-secondary border-0 rounded d-flex align-items-center">
                                                                    <img src="<?= base_url('assets/'); ?>img/icons/misc/pdf.png" alt="img" width="15" class="me-2">
                                                                    <span class="mb-0 text-custom-body">Invoices.pdf</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-point-avatar">
                                                    <div class="avatar avatar-sm rounded-pill">
                                                        <img src="<?= base_url('assets/'); ?>img/avatar/11.jpg" alt="conca">
                                                    </div>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="timeline-header mb-3">
                                                        <h5 class="h6 mb-0 timeline-title">WordPress Group Meeting</h5>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <div class="mb-4">
                                                            <p class="mb-2">New feature discussed about themes</p>

                                                            <div class="avatar-group d-flex">
                                                                <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Skly Herd">
                                                                    <img src="<?= base_url('assets/'); ?>img/avatar/10.jpg" alt="conca">
                                                                </div>
                                                                <div class="avatar avatar-border rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Skly Herd">
                                                                    <img src="<?= base_url('assets/'); ?>img/icons/brands/sketch.png" alt="conca">
                                                                </div>
                                                                <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Steven Smith">
                                                                    <img src="<?= base_url('assets/'); ?>img/avatar/15.html" alt="conca">
                                                                </div>
                                                                <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Josep Clent">
                                                                    <img src="<?= base_url('assets/'); ?>img/avatar/16.jpg" alt="conca">
                                                                </div>
                                                                <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Lino Pa">
                                                                    <img src="<?= base_url('assets/'); ?>img/avatar/08.jpg" alt="conca">
                                                                </div>
                                                                <div class="avatar rounded-circle">
                                                                    <span class="avatar-text bg-secondary rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="3 more">+3</span>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-point-avatar">
                                                    <div class="avatar avatar-border avatar-sm rounded-pill">
                                                        <img src="<?= base_url('assets/'); ?>img/icons/brands/sketch.png" alt="conca">
                                                    </div>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="timeline-header mb-3">
                                                        <h5 class="h6 mb-0 timeline-title">Project status updated</h5>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <div class="mb-4">
                                                            <p class="mb-2">New feature discussed about themes</p>

                                                            <div class="avatar-group d-flex">
                                                                <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Skly Herd">
                                                                    <img src="<?= base_url('assets/'); ?>img/avatar/10.jpg" alt="conca">
                                                                </div>
                                                                <div class="avatar avatar-border rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Skly Herd">
                                                                    <img src="<?= base_url('assets/'); ?>img/icons/brands/sketch.png" alt="conca">
                                                                </div>
                                                                <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Steven Smith">
                                                                    <img src="<?= base_url('assets/'); ?>img/avatar/15.html" alt="conca">
                                                                </div>
                                                                <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Josep Clent">
                                                                    <img src="<?= base_url('assets/'); ?>img/avatar/16.jpg" alt="conca">
                                                                </div>
                                                                <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Lino Pa">
                                                                    <img src="<?= base_url('assets/'); ?>img/avatar/08.jpg" alt="conca">
                                                                </div>
                                                                <div class="avatar rounded-circle">
                                                                    <span class="avatar-text bg-secondary rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="3 more">+3</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-point-avatar">
                                                    <div class="avatar avatar-sm rounded-pill">
                                                        <div class="avatar-text bg-success">SS</div>
                                                    </div>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="timeline-header mb-3">
                                                        <h5 class="h6 mb-0 timeline-title">12 Invoices have been paid</h5>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p class="mb-2">Invoices have been paid to the company</p>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="badge bg-label-secondary border-0 rounded d-flex align-items-center">
                                                                <img src="<?= base_url('assets/'); ?>img/icons/misc/pdf.png" alt="img" width="15" class="me-2">
                                                                <span class="mb-0 text-custom-body">Invoices.pdf</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <div class="timeline-point-avatar">
                                                    <div class="avatar avatar-sm rounded-pill">
                                                        <img src="<?= base_url('assets/'); ?>img/avatar/01.jpg" alt="conca">
                                                    </div>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="timeline-header mb-3">
                                                        <h5 class="h6 mb-0 timeline-title">3 new application design concepts added:</h5>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>Added 3 Images to project <b class="text-primary">meteverse</b></p>
                                                        <div class="d-flex flex-wrap gap-3 mb-4">
                                                            <img class="img-thumbnail" src="<?= base_url('assets/'); ?>img/profile/image_01.jpg" alt="conca">
                                                            <img class="img-thumbnail" src="<?= base_url('assets/'); ?>img/profile/image_02.jpg" alt="conca">
                                                            <img class="img-thumbnail" src="<?= base_url('assets/'); ?>img/profile/image_03.jpg" alt="conca">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>