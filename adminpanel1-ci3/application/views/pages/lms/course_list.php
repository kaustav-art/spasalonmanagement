<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Course List</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Course List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <a href="<?= site_url('lms/course_add'); ?>" class="btn btn-primary">Add Course</a>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
                        <div class="row">
                            <div class="col-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.3153 1.50342L14.8898 6.66527C14.9484 6.79628 15.0405 6.90977 15.157 6.99441C15.2735 7.07906 15.4102 7.1319 15.5537 7.14768L21.2371 7.98387C21.4017 8.00488 21.5568 8.07195 21.6844 8.17725C21.812 8.28255 21.9068 8.42173 21.9578 8.57855C22.0087 8.73536 22.0137 8.90333 21.9721 9.06284C21.9305 9.22235 21.844 9.36681 21.7229 9.47936L17.6263 13.5156C17.5217 13.6126 17.4433 13.734 17.398 13.8688C17.3528 14.0036 17.3422 14.1475 17.3672 14.2874L18.3549 19.9639C18.3835 20.127 18.3654 20.2948 18.3028 20.4482C18.2401 20.6016 18.1353 20.7344 18.0003 20.8316C17.8653 20.9288 17.7056 20.9864 17.5393 20.9979C17.373 21.0093 17.2068 20.9742 17.0596 20.8965L11.9429 18.2111C11.8119 18.1472 11.6679 18.114 11.5219 18.114C11.3759 18.114 11.2319 18.1472 11.1009 18.2111L5.98423 20.8965C5.83702 20.9742 5.67081 21.0093 5.5045 20.9979C5.33819 20.9864 5.17847 20.9288 5.0435 20.8316C4.90853 20.7344 4.80373 20.6016 4.74104 20.4482C4.67834 20.2948 4.66027 20.127 4.68887 19.9639L5.67658 14.2231C5.70161 14.0832 5.69102 13.9393 5.64578 13.8045C5.60053 13.6697 5.52206 13.5483 5.41751 13.4512L1.27235 9.47936C1.14972 9.36373 1.06348 9.21527 1.02407 9.05196C0.984667 8.88865 0.993791 8.71749 1.05034 8.55923C1.10689 8.40096 1.20843 8.26238 1.34268 8.16026C1.47692 8.05814 1.6381 7.99687 1.80669 7.98387L7.49008 7.14768C7.63354 7.1319 7.77033 7.07906 7.88681 6.99441C8.00329 6.90977 8.0954 6.79628 8.15396 6.66527L10.7285 1.50342C10.7986 1.35308 10.9106 1.2258 11.0511 1.1366C11.1917 1.0474 11.3551 1 11.5219 1C11.6887 1 11.8521 1.0474 11.9927 1.1366C12.1332 1.2258 12.2452 1.35308 12.3153 1.50342V1.50342Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            All Courses
                                        </h3>

                                        <div class="d-flex align-items-center gap-2">
                                            <div class="form-control-icon ">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <input type="text" class="" id="serachLeftIconCourse" placeholder="Enter Keywords...">
                                            </div>
                                            <div class="">
                                                <div class="d-flex align-items-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-icon btn-icon-secondary dropdown-toggle hide-arrow " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                            </svg>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><button class="dropdown-item" type="button">Active</button></li>
                                                            <li><button class="dropdown-item" type="button">Inactive</button></li>
                                                            <li><button class="dropdown-item" type="button">Delete</button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="table-responsive table-check-parent">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="fw-medium d-flex align-items-center">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input select-all" type="checkbox" id="selectTableCheckboxs" value="option1">
                                                            </div>
                                                            Course
                                                        </th>
                                                        <th scope="col" class="fw-medium">Instructor</th>
                                                        <th scope="col" class="fw-medium">Price</th>
                                                        <th scope="col" class="fw-medium">Students</th>
                                                        <th scope="col" class="fw-medium">Status</th>
                                                        <th scope="col" class="fw-medium">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row-check" type="checkbox" value="1">
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="rounded-md object-fit-cover" src="<?= base_url('assets/'); ?>img/course/course-thumb-1.html" width="48" height="48" alt="Product Image">
                                                                        <div class="ms-3">
                                                                            <h4 class="h6 mb-0 fw-medium">Modern Wood Desk</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-pill" src="<?= base_url('assets/'); ?>img/avatar/01.jpg" width="30" height="30" alt="User Image">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Skly Herd</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$133</span></td>
                                                        <td><span class="text-custom-body">235</span></td>
                                                        <td><span class="badge badge-label-success">Approved</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                            <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                            <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                                        </svg>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editReviewModal">Edit</button></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteReviewModal">Delete</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row-check" type="checkbox" value="2">
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="rounded-md object-fit-cover" src="<?= base_url('assets/'); ?>img/course/course-thumb-2.jpg" width="48" height="48" alt="Product Image">
                                                                        <div class="ms-3">
                                                                            <h4 class="h6 mb-0 fw-medium">Creative UI Design</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-pill" src="<?= base_url('assets/'); ?>img/avatar/02.jpg" width="30" height="30" alt="User Image">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Ayesha Rahman</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$89</span></td>
                                                        <td><span class="text-custom-body">180</span></td>
                                                        <td><span class="badge badge-label-warning">Pending</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                            <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                            <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                                        </svg>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editReviewModal">Edit</button></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteReviewModal">Delete</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row-check" type="checkbox" value="3">
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="rounded-md object-fit-cover" src="<?= base_url('assets/'); ?>img/course/course-thumb-3.html" width="48" height="48" alt="Product Image">
                                                                        <div class="ms-3">
                                                                            <h4 class="h6 mb-0 fw-medium">Digital Marketing Basics</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-pill" src="<?= base_url('assets/'); ?>img/avatar/03.jpg" width="30" height="30" alt="User Image">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Hasan Mahmud</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$120</span></td>
                                                        <td><span class="text-custom-body">95</span></td>
                                                        <td><span class="badge badge-label-danger">Rejected</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                            <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                            <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                                        </svg>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editReviewModal">Edit</button></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteReviewModal">Delete</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row-check" type="checkbox" value="4">
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="rounded-md object-fit-cover" src="<?= base_url('assets/'); ?>img/course/course-thumb-4.jpg" width="48" height="48" alt="Product Image">
                                                                        <div class="ms-3">
                                                                            <h4 class="h6 mb-0 fw-medium">Advanced React Development</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-pill" src="<?= base_url('assets/'); ?>img/avatar/04.jpg" width="30" height="30" alt="User Image">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">John Doe</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$210</span></td>
                                                        <td><span class="text-custom-body">320</span></td>
                                                        <td><span class="badge badge-label-success">Approved</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                            <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                            <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                                        </svg>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editReviewModal">Edit</button></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteReviewModal">Delete</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row-check" type="checkbox" value="5">
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="rounded-md object-fit-cover" src="<?= base_url('assets/'); ?>img/course/course-thumb-5.jpg" width="48" height="48" alt="Product Image">
                                                                        <div class="ms-3">
                                                                            <h4 class="h6 mb-0 fw-medium">Photography Masterclass</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-pill" src="<?= base_url('assets/'); ?>img/avatar/05.jpg" width="30" height="30" alt="User Image">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Sadia Ahmed</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$99</span></td>
                                                        <td><span class="text-custom-body">205</span></td>
                                                        <td><span class="badge badge-label-success">Approved</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                            <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                            <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                                        </svg>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editReviewModal">Edit</button></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteReviewModal">Delete</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row-check" type="checkbox" value="6">
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="rounded-md object-fit-cover" src="<?= base_url('assets/'); ?>img/course/course-thumb-6.html" width="48" height="48" alt="Product Image">
                                                                        <div class="ms-3">
                                                                            <h4 class="h6 mb-0 fw-medium">Python for Beginners</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-pill" src="<?= base_url('assets/'); ?>img/avatar/06.jpg" width="30" height="30" alt="User Image">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Tanvir Hasan</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$75</span></td>
                                                        <td><span class="text-custom-body">410</span></td>
                                                        <td><span class="badge badge-label-warning">Pending</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                            <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                            <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                                        </svg>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editReviewModal">Edit</button></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteReviewModal">Delete</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row-check" type="checkbox" value="7">
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="rounded-md object-fit-cover" src="<?= base_url('assets/'); ?>img/course/course-thumb-7.html" width="48" height="48" alt="Product Image">
                                                                        <div class="ms-3">
                                                                            <h4 class="h6 mb-0 fw-medium">UI/UX Design Bootcamp</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-pill" src="<?= base_url('assets/'); ?>img/avatar/07.html" width="30" height="30" alt="User Image">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Nadia Karim</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$145</span></td>
                                                        <td><span class="text-custom-body">270</span></td>
                                                        <td><span class="badge badge-label-success">Approved</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                            <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                            <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                                        </svg>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editReviewModal">Edit</button></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteReviewModal">Delete</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row-check" type="checkbox" value="8">
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="rounded-md object-fit-cover" src="<?= base_url('assets/'); ?>img/course/course-thumb-8.html" width="48" height="48" alt="Product Image">
                                                                        <div class="ms-3">
                                                                            <h4 class="h6 mb-0 fw-medium">Business Analytics</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-pill" src="<?= base_url('assets/'); ?>img/avatar/08.jpg" width="30" height="30" alt="User Image">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Rakibul Islam</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$200</span></td>
                                                        <td><span class="text-custom-body">150</span></td>
                                                        <td><span class="badge badge-label-warning">Pending</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                            <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                            <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                                        </svg>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editReviewModal">Edit</button></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteReviewModal">Delete</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row-check" type="checkbox" value="9">
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="rounded-md object-fit-cover" src="<?= base_url('assets/'); ?>img/course/course-thumb-9.jpg" width="48" height="48" alt="Product Image">
                                                                        <div class="ms-3">
                                                                            <h4 class="h6 mb-0 fw-medium">Content Writing Mastery</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-pill" src="<?= base_url('assets/'); ?>img/avatar/09.jpg" width="30" height="30" alt="User Image">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Mehedi Hasan</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$65</span></td>
                                                        <td><span class="text-custom-body">280</span></td>
                                                        <td><span class="badge badge-label-danger">Rejected</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                            <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                            <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                                        </svg>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editReviewModal">Edit</button></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteReviewModal">Delete</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input row-check" type="checkbox" value="10">
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="rounded-md object-fit-cover" src="<?= base_url('assets/'); ?>img/course/course-thumb-10.html" width="48" height="48" alt="Product Image">
                                                                        <div class="ms-3">
                                                                            <h4 class="h6 mb-0 fw-medium">Fullstack Web Development</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-pill" src="<?= base_url('assets/'); ?>img/avatar/10.jpg" width="30" height="30" alt="User Image">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Rima Akter</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$250</span></td>
                                                        <td><span class="text-custom-body">500</span></td>
                                                        <td><span class="badge badge-label-success">Approved</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm btn-icon btn-icon-secondary dropdown-toggle hide-arrow rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <svg width="3" height="14" viewBox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12.5165C3 12.9231 2.85278 13.272 2.55833 13.5632C2.26389 13.8544 1.91111 14 1.5 14C1.08889 14 0.736112 13.8544 0.441667 13.5632C0.147223 13.272 0 12.9231 0 12.5165C0 12.1099 0.147223 11.761 0.441667 11.4698C0.736112 11.1786 1.08889 11.033 1.5 11.033C1.77222 11.033 2.02222 11.1016 2.25 11.239C2.47778 11.3709 2.66111 11.5495 2.8 11.7747C2.93333 11.9945 3 12.2418 3 12.5165Z" fill="currentColor" />
                                                                            <path d="M3 7C3 7.40659 2.85278 7.75549 2.55833 8.0467C2.26389 8.33791 1.91111 8.48352 1.5 8.48352C1.08889 8.48352 0.736112 8.33791 0.441667 8.0467C0.147223 7.75549 0 7.40659 0 7C0 6.59341 0.147223 6.24451 0.441667 5.9533C0.736112 5.66209 1.08889 5.51648 1.5 5.51648C1.77222 5.51648 2.02222 5.58517 2.25 5.72253C2.47778 5.8544 2.66111 6.03297 2.8 6.25824C2.93333 6.47802 3 6.72527 3 7Z" fill="currentColor" />
                                                                            <path d="M3 1.48351C3 1.89011 2.85278 2.23901 2.55833 2.53022C2.26389 2.82143 1.91111 2.96703 1.5 2.96703C1.08889 2.96703 0.736112 2.82143 0.441667 2.53022C0.147223 2.23901 0 1.89011 0 1.48351C0 1.07692 0.147223 0.728022 0.441667 0.436812C0.736112 0.145604 1.08889 0 1.5 0C1.77222 0 2.02222 0.0686817 2.25 0.206044C2.47778 0.337913 2.66111 0.516483 2.8 0.741757C2.93333 0.961538 3 1.20879 3 1.48351Z" fill="currentColor" />
                                                                        </svg>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editReviewModal">Edit</button></li>
                                                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteReviewModal">Delete</button></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-end mt-4">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="editReviewModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="pure-modal-header d-flex flex-wrap justify-content-between align-items-center gap-6 px-8 py-6 border-bottom">
                                        <h1 class="pure-modal-title fs-5 d-flex align-items-center gap-2 m-0" id="editReviewModalLabel">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" d="M10 19H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.5 1.65321C14.8978 1.23497 15.4374 1 16 1C16.2786 1 16.5544 1.05769 16.8118 1.16976C17.0692 1.28184 17.303 1.44611 17.5 1.65321C17.697 1.8603 17.8532 2.10615 17.9598 2.37673C18.0664 2.64731 18.1213 2.93731 18.1213 3.23019C18.1213 3.52306 18.0664 3.81306 17.9598 4.08364C17.8532 4.35422 17.697 4.60007 17.5 4.80717L5 17.9487L1 19L2 14.7947L14.5 1.65321Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            Edit Review
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
                                            <div class="col-md-12">
                                                <label for="status" class="form-label">Status <span class="text-danger fw-bold">*</span></label>
                                                <select id="status" class="form-select">
                                                    <option selected>Approved</option>
                                                    <option>Pending</option>
                                                    <option>Rejected</option>
                                                </select>
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

                        <div class="modal fade" id="deleteReviewModal" tabindex="-1" role="dialog" aria-labelledby="deleteReviewModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="pure-modal-header d-flex flex-wrap justify-content-between align-items-center gap-6 px-8 py-6 border-bottom">
                                        <h1 class="pure-modal-title fs-5 d-flex align-items-center gap-2 m-0" id="deleteReviewModalLabel">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" d="M10 19H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14.5 1.65321C14.8978 1.23497 15.4374 1 16 1C16.2786 1 16.5544 1.05769 16.8118 1.16976C17.0692 1.28184 17.303 1.44611 17.5 1.65321C17.697 1.8603 17.8532 2.10615 17.9598 2.37673C18.0664 2.64731 18.1213 2.93731 18.1213 3.23019C18.1213 3.52306 18.0664 3.81306 17.9598 4.08364C17.8532 4.35422 17.697 4.60007 17.5 4.80717L5 17.9487L1 19L2 14.7947L14.5 1.65321Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            Delete Review
                                        </h1>
                                        <button type="button" class="pure-btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 1L1 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M1 1L11 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="pure-modal-body px-8 py-7">
                                        <p>
                                            Are you sure you want to delete this review? This action cannot be undone.
                                        </p>
                                    </div>
                                    <div class="pure-modal-footer px-8 pb-8">
                                        <div class="d-flex flex-wrap justify-content-end gap-4">
                                            <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="button" class="btn btn-primary ">Yes, delete it</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>