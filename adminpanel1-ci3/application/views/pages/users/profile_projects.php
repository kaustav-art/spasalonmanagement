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
                        <div class="py-5">
                            <div class="row align-items-center g-4">
                                <div class="col-md-4">
                                    <h3 class="fw-semibold mb-0">My Projects</h3>
                                </div>
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-md-end gap-2 mb-4">
                                        <div class="project-status-select">
                                            <select class="form-select" name="status" id="status">
                                                <option value="all">All</option>
                                                <option value="active">Active</option>
                                                <option value="completed">Completed</option>
                                                <option value="archived">Archived</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary">New Projects</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-6 gy-8">
                            <div class="col-xxl-4 col-xl-6 col-lg-6">
                                <div class="project-card card-bg text-center project-card-shadow">
                                    <div class="progress rounded-none height-4px" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-success" data-width="100%"></div>
                                    </div>
                                    <div class="project-card-header px-6 mt-4 mb-3 d-flex justify-content-between align-items-center">
                                        <span class="badge badge-label-success">Completed</span>
                                        <div class="project-card-actions">
                                            <button class="custom-card-action-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.5 12.5165C3.5 12.9231 3.35278 13.272 3.05833 13.5632C2.76389 13.8544 2.41111 14 2 14C1.58889 14 1.23611 13.8544 0.941667 13.5632C0.647223 13.272 0.5 12.9231 0.5 12.5165C0.5 12.1099 0.647223 11.761 0.941667 11.4698C1.23611 11.1786 1.58889 11.033 2 11.033C2.27222 11.033 2.52222 11.1016 2.75 11.239C2.97778 11.3709 3.16111 11.5495 3.3 11.7747C3.43333 11.9945 3.5 12.2418 3.5 12.5165Z" fill="currentColor" />
                                                    <path d="M3.5 7C3.5 7.40659 3.35278 7.75549 3.05833 8.0467C2.76389 8.33791 2.41111 8.48352 2 8.48352C1.58889 8.48352 1.23611 8.33791 0.941667 8.0467C0.647223 7.75549 0.5 7.40659 0.5 7C0.5 6.59341 0.647223 6.24451 0.941667 5.9533C1.23611 5.66209 1.58889 5.51648 2 5.51648C2.27222 5.51648 2.52222 5.58517 2.75 5.72253C2.97778 5.8544 3.16111 6.03297 3.3 6.25824C3.43333 6.47802 3.5 6.72527 3.5 7Z" fill="currentColor" />
                                                    <path d="M3.5 1.48351C3.5 1.89011 3.35278 2.23901 3.05833 2.53022C2.76389 2.82143 2.41111 2.96703 2 2.96703C1.58889 2.96703 1.23611 2.82143 0.941667 2.53022C0.647223 2.23901 0.5 1.89011 0.5 1.48351C0.5 1.07692 0.647223 0.728022 0.941667 0.436812C1.23611 0.145604 1.58889 0 2 0C2.27222 0 2.52222 0.0686817 2.75 0.206044C2.97778 0.337913 3.16111 0.516483 3.3 0.741757C3.43333 0.961538 3.5 1.20879 3.5 1.48351Z" fill="currentColor" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                <li><a class="dropdown-item" href="#">Archive</a></li>
                                                <li><a class="dropdown-item" href="#">Share</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <img src="<?= base_url('assets/'); ?>img/icons/projects/project-1.png" alt="">
                                        </div>
                                        <h4 class="h5 mb-0">Matte 3D Illustration</h4>
                                        <p>Updated 2 days ago</p>

                                        <div class="avatar-group d-flex justify-content-center mb-8">
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Skly Herd">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/01.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Steven Smith">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/02.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Josep Clent">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/13.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Lino Pa">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/04.jpg" alt="conca">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-card-footer border-top px-5">
                                        <div class="row row-cols-1 row-cols-sm-3">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">16</h4>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">$402k</h4>
                                                    <p class="mb-0 text-custom-paragraph">Total Budget</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h4 class="h6 mb-0">10</h4>
                                                    <p class="mb-0 text-custom-paragraph">Day left</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 col-lg-6">
                                <div class="project-card card-bg text-center project-card-shadow">
                                    <div class="progress rounded-none height-4px" role="progressbar" aria-label="Basic example" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" data-width="60%"></div>
                                    </div>
                                    <div class="project-card-header px-6 mt-4 mb-3 d-flex justify-content-between align-items-center">
                                        <span class="badge badge-label-primary">In Progress</span>
                                        <div class="project-card-actions">
                                            <button class="custom-card-action-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.5 12.5165C3.5 12.9231 3.35278 13.272 3.05833 13.5632C2.76389 13.8544 2.41111 14 2 14C1.58889 14 1.23611 13.8544 0.941667 13.5632C0.647223 13.272 0.5 12.9231 0.5 12.5165C0.5 12.1099 0.647223 11.761 0.941667 11.4698C1.23611 11.1786 1.58889 11.033 2 11.033C2.27222 11.033 2.52222 11.1016 2.75 11.239C2.97778 11.3709 3.16111 11.5495 3.3 11.7747C3.43333 11.9945 3.5 12.2418 3.5 12.5165Z" fill="currentColor" />
                                                    <path d="M3.5 7C3.5 7.40659 3.35278 7.75549 3.05833 8.0467C2.76389 8.33791 2.41111 8.48352 2 8.48352C1.58889 8.48352 1.23611 8.33791 0.941667 8.0467C0.647223 7.75549 0.5 7.40659 0.5 7C0.5 6.59341 0.647223 6.24451 0.941667 5.9533C1.23611 5.66209 1.58889 5.51648 2 5.51648C2.27222 5.51648 2.52222 5.58517 2.75 5.72253C2.97778 5.8544 3.16111 6.03297 3.3 6.25824C3.43333 6.47802 3.5 6.72527 3.5 7Z" fill="currentColor" />
                                                    <path d="M3.5 1.48351C3.5 1.89011 3.35278 2.23901 3.05833 2.53022C2.76389 2.82143 2.41111 2.96703 2 2.96703C1.58889 2.96703 1.23611 2.82143 0.941667 2.53022C0.647223 2.23901 0.5 1.89011 0.5 1.48351C0.5 1.07692 0.647223 0.728022 0.941667 0.436812C1.23611 0.145604 1.58889 0 2 0C2.27222 0 2.52222 0.0686817 2.75 0.206044C2.97778 0.337913 3.16111 0.516483 3.3 0.741757C3.43333 0.961538 3.5 1.20879 3.5 1.48351Z" fill="currentColor" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                <li><a class="dropdown-item" href="#">Archive</a></li>
                                                <li><a class="dropdown-item" href="#">Share</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <img src="<?= base_url('assets/'); ?>img/icons/projects/project-2.png" alt="">
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Conca - Design System
                                        </h4>
                                        <p>Updated 13 days ago</p>

                                        <div class="avatar-group d-flex justify-content-center mb-8">
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Skly Herd">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/15.html" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Steven Smith">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/16.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Josep Clent">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/07.html" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Lino Pa">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/08.jpg" alt="conca">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-card-footer border-top px-5">
                                        <div class="row row-cols-1 row-cols-sm-3">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">16</h4>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">$402k</h4>
                                                    <p class="mb-0 text-custom-paragraph">Total Budget</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h4 class="h6 mb-0">10</h4>
                                                    <p class="mb-0 text-custom-paragraph">Day left</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 col-lg-6">
                                <div class="project-card card-bg text-center project-card-shadow">
                                    <div class="progress rounded-none height-4px" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" data-width="0%"></div>
                                    </div>
                                    <div class="project-card-header px-6 mt-4 mb-3 d-flex justify-content-between align-items-center">
                                        <span class="badge badge-label-warning">Pending</span>
                                        <div class="project-card-actions">
                                            <button class="custom-card-action-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.5 12.5165C3.5 12.9231 3.35278 13.272 3.05833 13.5632C2.76389 13.8544 2.41111 14 2 14C1.58889 14 1.23611 13.8544 0.941667 13.5632C0.647223 13.272 0.5 12.9231 0.5 12.5165C0.5 12.1099 0.647223 11.761 0.941667 11.4698C1.23611 11.1786 1.58889 11.033 2 11.033C2.27222 11.033 2.52222 11.1016 2.75 11.239C2.97778 11.3709 3.16111 11.5495 3.3 11.7747C3.43333 11.9945 3.5 12.2418 3.5 12.5165Z" fill="currentColor" />
                                                    <path d="M3.5 7C3.5 7.40659 3.35278 7.75549 3.05833 8.0467C2.76389 8.33791 2.41111 8.48352 2 8.48352C1.58889 8.48352 1.23611 8.33791 0.941667 8.0467C0.647223 7.75549 0.5 7.40659 0.5 7C0.5 6.59341 0.647223 6.24451 0.941667 5.9533C1.23611 5.66209 1.58889 5.51648 2 5.51648C2.27222 5.51648 2.52222 5.58517 2.75 5.72253C2.97778 5.8544 3.16111 6.03297 3.3 6.25824C3.43333 6.47802 3.5 6.72527 3.5 7Z" fill="currentColor" />
                                                    <path d="M3.5 1.48351C3.5 1.89011 3.35278 2.23901 3.05833 2.53022C2.76389 2.82143 2.41111 2.96703 2 2.96703C1.58889 2.96703 1.23611 2.82143 0.941667 2.53022C0.647223 2.23901 0.5 1.89011 0.5 1.48351C0.5 1.07692 0.647223 0.728022 0.941667 0.436812C1.23611 0.145604 1.58889 0 2 0C2.27222 0 2.52222 0.0686817 2.75 0.206044C2.97778 0.337913 3.16111 0.516483 3.3 0.741757C3.43333 0.961538 3.5 1.20879 3.5 1.48351Z" fill="currentColor" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                <li><a class="dropdown-item" href="#">Archive</a></li>
                                                <li><a class="dropdown-item" href="#">Share</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <img src="<?= base_url('assets/'); ?>img/icons/projects/project-3.png" alt="">
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Creative Agency Website
                                        </h4>
                                        <p>Updated 1 month ago</p>

                                        <div class="avatar-group d-flex justify-content-center mb-8">
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Skly Herd">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/09.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Steven Smith">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/01.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Josep Clent">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/12.html" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Lino Pa">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/11.jpg" alt="conca">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-card-footer border-top px-5">
                                        <div class="row row-cols-1 row-cols-sm-3">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">16</h4>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">$402k</h4>
                                                    <p class="mb-0 text-custom-paragraph">Total Budget</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h4 class="h6 mb-0">10</h4>
                                                    <p class="mb-0 text-custom-paragraph">Day left</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 col-lg-6">
                                <div class="project-card card-bg text-center project-card-shadow">
                                    <div class="progress rounded-none height-4px " role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" data-width="0%"></div>
                                    </div>
                                    <div class="project-card-header px-6 mt-4 mb-3 d-flex justify-content-between align-items-center">
                                        <span class="badge badge-label-warning">Pending</span>
                                        <div class="project-card-actions">
                                            <button class="custom-card-action-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.5 12.5165C3.5 12.9231 3.35278 13.272 3.05833 13.5632C2.76389 13.8544 2.41111 14 2 14C1.58889 14 1.23611 13.8544 0.941667 13.5632C0.647223 13.272 0.5 12.9231 0.5 12.5165C0.5 12.1099 0.647223 11.761 0.941667 11.4698C1.23611 11.1786 1.58889 11.033 2 11.033C2.27222 11.033 2.52222 11.1016 2.75 11.239C2.97778 11.3709 3.16111 11.5495 3.3 11.7747C3.43333 11.9945 3.5 12.2418 3.5 12.5165Z" fill="currentColor" />
                                                    <path d="M3.5 7C3.5 7.40659 3.35278 7.75549 3.05833 8.0467C2.76389 8.33791 2.41111 8.48352 2 8.48352C1.58889 8.48352 1.23611 8.33791 0.941667 8.0467C0.647223 7.75549 0.5 7.40659 0.5 7C0.5 6.59341 0.647223 6.24451 0.941667 5.9533C1.23611 5.66209 1.58889 5.51648 2 5.51648C2.27222 5.51648 2.52222 5.58517 2.75 5.72253C2.97778 5.8544 3.16111 6.03297 3.3 6.25824C3.43333 6.47802 3.5 6.72527 3.5 7Z" fill="currentColor" />
                                                    <path d="M3.5 1.48351C3.5 1.89011 3.35278 2.23901 3.05833 2.53022C2.76389 2.82143 2.41111 2.96703 2 2.96703C1.58889 2.96703 1.23611 2.82143 0.941667 2.53022C0.647223 2.23901 0.5 1.89011 0.5 1.48351C0.5 1.07692 0.647223 0.728022 0.941667 0.436812C1.23611 0.145604 1.58889 0 2 0C2.27222 0 2.52222 0.0686817 2.75 0.206044C2.97778 0.337913 3.16111 0.516483 3.3 0.741757C3.43333 0.961538 3.5 1.20879 3.5 1.48351Z" fill="currentColor" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                <li><a class="dropdown-item" href="#">Archive</a></li>
                                                <li><a class="dropdown-item" href="#">Share</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <img src="<?= base_url('assets/'); ?>img/icons/projects/project-4.png" alt="">
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Ai POS Software
                                        </h4>
                                        <p>Updated 5 days ago</p>

                                        <div class="avatar-group d-flex justify-content-center mb-8">
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Skly Herd">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/05.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Steven Smith">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/06.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Josep Clent">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/17.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Lino Pa">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/20.jpg" alt="conca">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-card-footer border-top px-5">
                                        <div class="row row-cols-1 row-cols-sm-3">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">16</h4>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">$402k</h4>
                                                    <p class="mb-0 text-custom-paragraph">Total Budget</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h4 class="h6 mb-0">10</h4>
                                                    <p class="mb-0 text-custom-paragraph">Day left</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 col-lg-6">
                                <div class="project-card card-bg text-center project-card-shadow">
                                    <div class="progress rounded-none height-4px bg-danger" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-success" data-width="100%"></div>
                                    </div>
                                    <div class="project-card-header px-6 mt-4 mb-3 d-flex justify-content-between align-items-center">
                                        <span class="badge badge-label-danger">Failed</span>
                                        <div class="project-card-actions">
                                            <button class="custom-card-action-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.5 12.5165C3.5 12.9231 3.35278 13.272 3.05833 13.5632C2.76389 13.8544 2.41111 14 2 14C1.58889 14 1.23611 13.8544 0.941667 13.5632C0.647223 13.272 0.5 12.9231 0.5 12.5165C0.5 12.1099 0.647223 11.761 0.941667 11.4698C1.23611 11.1786 1.58889 11.033 2 11.033C2.27222 11.033 2.52222 11.1016 2.75 11.239C2.97778 11.3709 3.16111 11.5495 3.3 11.7747C3.43333 11.9945 3.5 12.2418 3.5 12.5165Z" fill="currentColor" />
                                                    <path d="M3.5 7C3.5 7.40659 3.35278 7.75549 3.05833 8.0467C2.76389 8.33791 2.41111 8.48352 2 8.48352C1.58889 8.48352 1.23611 8.33791 0.941667 8.0467C0.647223 7.75549 0.5 7.40659 0.5 7C0.5 6.59341 0.647223 6.24451 0.941667 5.9533C1.23611 5.66209 1.58889 5.51648 2 5.51648C2.27222 5.51648 2.52222 5.58517 2.75 5.72253C2.97778 5.8544 3.16111 6.03297 3.3 6.25824C3.43333 6.47802 3.5 6.72527 3.5 7Z" fill="currentColor" />
                                                    <path d="M3.5 1.48351C3.5 1.89011 3.35278 2.23901 3.05833 2.53022C2.76389 2.82143 2.41111 2.96703 2 2.96703C1.58889 2.96703 1.23611 2.82143 0.941667 2.53022C0.647223 2.23901 0.5 1.89011 0.5 1.48351C0.5 1.07692 0.647223 0.728022 0.941667 0.436812C1.23611 0.145604 1.58889 0 2 0C2.27222 0 2.52222 0.0686817 2.75 0.206044C2.97778 0.337913 3.16111 0.516483 3.3 0.741757C3.43333 0.961538 3.5 1.20879 3.5 1.48351Z" fill="currentColor" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                <li><a class="dropdown-item" href="#">Archive</a></li>
                                                <li><a class="dropdown-item" href="#">Share</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <img src="<?= base_url('assets/'); ?>img/icons/projects/project-5.png" alt="">
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Ecommerce Shopify Store
                                        </h4>
                                        <p>Updated 2 days ago</p>

                                        <div class="avatar-group d-flex justify-content-center mb-8">
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Skly Herd">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/01.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Steven Smith">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/02.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Josep Clent">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/12.html" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Lino Pa">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/14.html" alt="conca">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-card-footer border-top px-5">
                                        <div class="row row-cols-1 row-cols-sm-3">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">16</h4>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">$402k</h4>
                                                    <p class="mb-0 text-custom-paragraph">Total Budget</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h4 class="h6 mb-0">10</h4>
                                                    <p class="mb-0 text-custom-paragraph">Day left</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 col-lg-6">
                                <div class="project-card card-bg text-center project-card-shadow">
                                    <div class="progress rounded-none height-4px" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" data-width="0%"></div>
                                    </div>
                                    <div class="project-card-header px-6 mt-4 mb-3 d-flex justify-content-between align-items-center">
                                        <span class="badge badge-label-success">Completed</span>
                                        <div class="project-card-actions">
                                            <button class="custom-card-action-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.5 12.5165C3.5 12.9231 3.35278 13.272 3.05833 13.5632C2.76389 13.8544 2.41111 14 2 14C1.58889 14 1.23611 13.8544 0.941667 13.5632C0.647223 13.272 0.5 12.9231 0.5 12.5165C0.5 12.1099 0.647223 11.761 0.941667 11.4698C1.23611 11.1786 1.58889 11.033 2 11.033C2.27222 11.033 2.52222 11.1016 2.75 11.239C2.97778 11.3709 3.16111 11.5495 3.3 11.7747C3.43333 11.9945 3.5 12.2418 3.5 12.5165Z" fill="currentColor" />
                                                    <path d="M3.5 7C3.5 7.40659 3.35278 7.75549 3.05833 8.0467C2.76389 8.33791 2.41111 8.48352 2 8.48352C1.58889 8.48352 1.23611 8.33791 0.941667 8.0467C0.647223 7.75549 0.5 7.40659 0.5 7C0.5 6.59341 0.647223 6.24451 0.941667 5.9533C1.23611 5.66209 1.58889 5.51648 2 5.51648C2.27222 5.51648 2.52222 5.58517 2.75 5.72253C2.97778 5.8544 3.16111 6.03297 3.3 6.25824C3.43333 6.47802 3.5 6.72527 3.5 7Z" fill="currentColor" />
                                                    <path d="M3.5 1.48351C3.5 1.89011 3.35278 2.23901 3.05833 2.53022C2.76389 2.82143 2.41111 2.96703 2 2.96703C1.58889 2.96703 1.23611 2.82143 0.941667 2.53022C0.647223 2.23901 0.5 1.89011 0.5 1.48351C0.5 1.07692 0.647223 0.728022 0.941667 0.436812C1.23611 0.145604 1.58889 0 2 0C2.27222 0 2.52222 0.0686817 2.75 0.206044C2.97778 0.337913 3.16111 0.516483 3.3 0.741757C3.43333 0.961538 3.5 1.20879 3.5 1.48351Z" fill="currentColor" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                <li><a class="dropdown-item" href="#">Archive</a></li>
                                                <li><a class="dropdown-item" href="#">Share</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <img src="<?= base_url('assets/'); ?>img/icons/projects/project-6.png" alt="">
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Movie Streaming App
                                        </h4>
                                        <p>Updated 1 year ago</p>

                                        <div class="avatar-group d-flex justify-content-center mb-8">
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Skly Herd">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/08.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Steven Smith">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/09.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Josep Clent">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/10.jpg" alt="conca">
                                            </div>
                                            <div class="avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Lino Pa">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/13.jpg" alt="conca">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-card-footer border-top px-5">
                                        <div class="row row-cols-1 row-cols-sm-3">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">16</h4>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h4 class="h6 mb-0">$402k</h4>
                                                    <p class="mb-0 text-custom-paragraph">Total Budget</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h4 class="h6 mb-0">10</h4>
                                                    <p class="mb-0 text-custom-paragraph">Day left</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-9 align-items-center">
                            <div class="col-md-4">
                                <p class="mb-0">Showing 1 to 8 of 8 entries</p>
                            </div>
                            <div class="col-md-8">
                                <nav class="d-flex justify-content-end">
                                    <ul class="custom-pagination m-0">
                                        <li class="disabled">
                                            <a class="" href="#">Previous</a>
                                        </li>
                                        <li class="">
                                            <a class="" href="#">1</a>
                                        </li>
                                        <li class="active">
                                            <a class="" href="#">2</a>
                                        </li>
                                        <li class="">
                                            <a class="" href="#">3</a>
                                        </li>
                                        <li class="">
                                            <a class="" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>