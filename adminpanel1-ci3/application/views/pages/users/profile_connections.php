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
                                    <h3 class="fw-semibold mb-0">6 connections</h3>
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
                                        <button class="btn btn-primary">New Connection</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gx-6 gy-8">
                            <div class="col">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom">
                                    <div class="project-card-header px-6 pt-5 mb-3 d-flex justify-content-end align-items-center">
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
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <div class="avatar avatar-lg rounded-pill mx-auto">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/01.jpg" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">Elvin Bond</h4>
                                        <p class="text-custom-body">Full Stack Developer</p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-danger text-custom-badge">WordPress</span>
                                            <span class="badge badge-label-warning text-custom-badge">JavaScript</span>
                                            <span class="badge badge-label-success text-custom-badge">Laravel</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <div class="row row-cols-sm-3 row-cols-1">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">16</h5>
                                                    <p class="mb-0 text-custom-paragraph">Projects</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">834</h5>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h5 class="h6 mb-0">13.4k</h5>
                                                    <p class="mb-0 text-custom-paragraph">Connections</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom">
                                    <div class="project-card-header px-6 pt-5 mb-3 d-flex justify-content-end align-items-center">
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
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <div class="avatar avatar-lg rounded-pill mx-auto">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/02.jpg" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Skly Herd
                                        </h4>
                                        <p class="text-custom-body">
                                            Marketing Specialist
                                        </p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-danger text-custom-badge">Marketing</span>
                                            <span class="badge badge-label-warning text-custom-badge">SEO</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <div class="row row-cols-sm-3 row-cols-1">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">45</h5>
                                                    <p class="mb-0 text-custom-paragraph">Projects</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">650</h5>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h5 class="h6 mb-0">23.5k</h5>
                                                    <p class="mb-0 text-custom-paragraph">Connections</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom">
                                    <div class="project-card-header px-6 pt-5 mb-3 d-flex justify-content-end align-items-center">
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
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <div class="avatar avatar-lg rounded-pill mx-auto">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/12.html" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Olivia Turner
                                        </h4>
                                        <p class="text-custom-body">
                                            UI/UX Designer
                                        </p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-info text-custom-badge">Figma</span>
                                            <span class="badge badge-label-secondary text-custom-badge">Adobe XD</span>
                                            <span class="badge badge-label-success text-custom-badge">Sketch</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <div class="row row-cols-sm-3 row-cols-1">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">10</h5>
                                                    <p class="mb-0 text-custom-paragraph">Projects</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">150</h5>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h5 class="h6 mb-0">1.4k</h5>
                                                    <p class="mb-0 text-custom-paragraph">Connections</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom">
                                    <div class="project-card-header px-6 pt-5 mb-3 d-flex justify-content-end align-items-center">
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
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <div class="avatar avatar-lg rounded-pill mx-auto">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/05.jpg" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Jenifer Widges
                                        </h4>
                                        <p class="text-custom-body">
                                            Frontend Developer
                                        </p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-success text-custom-badge">Nuxt</span>
                                            <span class="badge badge-label-danger text-custom-badge">React</span>
                                            <span class="badge badge-label-warning text-custom-badge">Angular</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <div class="row row-cols-sm-3 row-cols-1">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">74</h5>
                                                    <p class="mb-0 text-custom-paragraph">Projects</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">980</h5>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h5 class="h6 mb-0">3.3k</h5>
                                                    <p class="mb-0 text-custom-paragraph">Connections</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom">
                                    <div class="project-card-header px-6 pt-5 mb-3 d-flex justify-content-end align-items-center">
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
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <div class="avatar avatar-lg rounded-pill mx-auto">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/14.html" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Cris Hemsworth
                                        </h4>
                                        <p class="text-custom-body">
                                            Visual Consultant
                                        </p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-info text-custom-badge">Photoshop</span>
                                            <span class="badge badge-label-secondary text-custom-badge">Illustrator</span>
                                            <span class="badge badge-label-success text-custom-badge">Canva</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <div class="row row-cols-sm-3 row-cols-1">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">20</h5>
                                                    <p class="mb-0 text-custom-paragraph">Projects</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">240</h5>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h5 class="h6 mb-0">20k</h5>
                                                    <p class="mb-0 text-custom-paragraph">Connections</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom">
                                    <div class="project-card-header px-6 pt-5 mb-3 d-flex justify-content-end align-items-center">
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
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-card-body  px-6">
                                        <div class="mb-4">
                                            <div class="avatar avatar-lg rounded-pill mx-auto">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/13.jpg" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Kim Jimmy
                                        </h4>
                                        <p class="text-custom-body">
                                            Product Manager
                                        </p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-danger text-custom-badge">Product</span>
                                            <span class="badge badge-label-warning text-custom-badge">Management</span>
                                            <span class="badge badge-label-success text-custom-badge">Agile</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <div class="row row-cols-sm-3 row-cols-1">
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">124</h5>
                                                    <p class="mb-0 text-custom-paragraph">Projects</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="border-end">
                                                    <h5 class="h6 mb-0">364</h5>
                                                    <p class="mb-0 text-custom-paragraph">Tasks</p>
                                                </div>
                                            </div>
                                            <div class="col text-center my-4">
                                                <div class="">
                                                    <h5 class="h6 mb-0">34k</h5>
                                                    <p class="mb-0 text-custom-paragraph">Connections</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>