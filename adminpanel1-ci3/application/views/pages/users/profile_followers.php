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
                                    <h3 class="fw-semibold mb-0">6 Followers</h3>
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-6 gy-8">
                            <div class="col-md-4">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom position-relative">
                                    <div class="project-cover">
                                        <img src="<?= base_url('assets/'); ?>img/profile/follower-bg-1.png" alt="">
                                    </div>
                                    <div class="project-card-actions position-absolute top-4 end-4">
                                        <button class="custom-card-action-btn blur-bg" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <div class="project-card-body px-6 position-relative">
                                        <div class="mb-4">
                                            <div class="rounded-pill mx-auto follower-avatar">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/10.jpg" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">Elvin Bond</h4>
                                        <p class="text-custom-body">Full Stack Developer</p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-danger text-custom-badge">Laravel</span>
                                            <span class="badge badge-label-warning text-custom-badge">WordPress</span>
                                            <span class="badge badge-label-success text-custom-badge">NodeJs</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <a href="#" class="btn btn-ghost-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom position-relative">
                                    <div class="project-cover">
                                        <img src="<?= base_url('assets/'); ?>img/profile/follower-bg-2.png" alt="">
                                    </div>
                                    <div class="project-card-actions position-absolute top-4 end-4">
                                        <button class="custom-card-action-btn blur-bg" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <div class="project-card-body px-6 position-relative">
                                        <div class="mb-4">
                                            <div class="rounded-pill mx-auto follower-avatar">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/12.html" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Cristy White
                                        </h4>
                                        <p class="text-custom-body">
                                            Social Media Manager
                                        </p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-primary text-custom-badge">Meta</span>
                                            <span class="badge badge-label-danger text-custom-badge">YouTube</span>
                                            <span class="badge badge-label-info text-custom-badge">LinkedIn </span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <a href="#" class="btn btn-ghost-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom position-relative">
                                    <div class="project-cover">
                                        <img src="<?= base_url('assets/'); ?>img/profile/follower-bg-3.png" alt="">
                                    </div>
                                    <div class="project-card-actions position-absolute top-4 end-4">
                                        <button class="custom-card-action-btn blur-bg" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <div class="project-card-body px-6 position-relative">
                                        <div class="mb-4">
                                            <div class="rounded-pill mx-auto follower-avatar">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/02.jpg" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Kein Martin
                                        </h4>
                                        <p class="text-custom-body">
                                            WWE Wrestler
                                        </p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-primary text-custom-badge">Wrestling</span>
                                            <span class="badge badge-label-danger text-custom-badge">Fitness</span>
                                            <span class="badge badge-label-info text-custom-badge">Sports</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <a href="#" class="btn btn-ghost-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom position-relative">
                                    <div class="project-cover">
                                        <img src="<?= base_url('assets/'); ?>img/profile/follower-bg-4.png" alt="">
                                    </div>
                                    <div class="project-card-actions position-absolute top-4 end-4">
                                        <button class="custom-card-action-btn blur-bg" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <div class="project-card-body px-6 position-relative">
                                        <div class="mb-4">
                                            <div class="rounded-pill mx-auto follower-avatar">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/13.jpg" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Myra Lisa
                                        </h4>
                                        <p class="text-custom-body">
                                            Fashion Designer
                                        </p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-primary text-custom-badge">Fashion</span>
                                            <span class="badge badge-label-danger text-custom-badge">Design</span>
                                            <span class="badge badge-label-info text-custom-badge">Lifestyle</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <a href="#" class="btn btn-ghost-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom position-relative">
                                    <div class="project-cover">
                                        <img src="<?= base_url('assets/'); ?>img/profile/follower-bg-5.png" alt="">
                                    </div>
                                    <div class="project-card-actions position-absolute top-4 end-4">
                                        <button class="custom-card-action-btn blur-bg" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <div class="project-card-body px-6 position-relative">
                                        <div class="mb-4">
                                            <div class="rounded-pill mx-auto follower-avatar">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/07.html" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Gartim Conci
                                        </h4>
                                        <p class="text-custom-body">
                                            Psychologist
                                        </p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-success text-custom-badge">Psychology</span>
                                            <span class="badge badge-label-danger text-custom-badge">Mental Health</span>
                                            <span class="badge badge-label-info text-custom-badge">Counseling</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <a href="#" class="btn btn-ghost-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="project-card card-bg text-center project-card-shadow rounded-custom position-relative">
                                    <div class="project-cover">
                                        <img src="<?= base_url('assets/'); ?>img/profile/follower-bg-6.png" alt="">
                                    </div>
                                    <div class="project-card-actions position-absolute top-4 end-4">
                                        <button class="custom-card-action-btn blur-bg" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <div class="project-card-body px-6 position-relative">
                                        <div class="mb-4">
                                            <div class="rounded-pill mx-auto follower-avatar">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/19.jpg" alt="conca">
                                            </div>
                                        </div>
                                        <h4 class="h5 mb-0">
                                            Dr. Sarah Conca
                                        </h4>
                                        <p class="text-custom-body">
                                            PhD in Architecture
                                        </p>

                                        <div class="mb-5">
                                            <span class="badge badge-label-primary text-custom-badge">Architecture</span>
                                            <span class="badge badge-label-danger text-custom-badge">Design</span>
                                            <span class="badge badge-label-info text-custom-badge">Research</span>
                                        </div>

                                    </div>
                                    <div class="project-card-footer pb-5 px-5">
                                        <a href="#" class="btn btn-ghost-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>