<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Orders List</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Orders List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#addCoupon">Add Coupon</button>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
                        <div class="row">
                            <div class="col-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.28208 13.2489L1.6281 11.2865C2.03705 8.96713 2.24153 7.80744 3.05129 7.12082C3.86105 6.4342 5.02425 6.4342 7.35064 6.4342H12.1494C14.4758 6.4342 15.6389 6.4342 16.4487 7.12082C17.2585 7.80744 17.4629 8.96713 17.8719 11.2865L18.2179 13.2489C18.7838 16.4584 19.0668 18.0632 18.1955 19.1171C17.3242 20.171 15.7146 20.171 12.4954 20.171H7.00462C3.78542 20.171 2.17582 20.171 1.30452 19.1171C0.433222 18.0632 0.716174 16.4584 1.28208 13.2489Z" stroke="currentColor" stroke-width="1.5" />
                                                    <path d="M5.48682 6.43421L5.6458 4.52638C5.82368 2.39185 7.60804 0.75 9.74997 0.75C11.8919 0.75 13.6763 2.39185 13.8541 4.52638L14.0131 6.43421" stroke="currentColor" stroke-width="1.5" />
                                                    <path d="M12.592 9.27635C12.4689 10.6151 11.2332 11.6448 9.74994 11.6448C8.26667 11.6448 7.03101 10.6151 6.90783 9.27635" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </span>
                                            All Orders
                                        </h3>

                                        <div class="">
                                            <div class="form-control-icon ">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <input type="text" class="" id="serachLeftIconOrder" placeholder="Enter Keywords...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="fw-medium d-flex align-items-center">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            </div>
                                                            Order ID
                                                        </th>
                                                        <th scope="col" class="fw-medium">Customer</th>
                                                        <th scope="col" class="fw-medium">Date</th>
                                                        <th scope="col" class="fw-medium">Amount</th>
                                                        <th scope="col" class="fw-medium">Payment</th>
                                                        <th scope="col" class="fw-medium">Status</th>
                                                        <th scope="col" class="fw-medium">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                </div>
                                                                <span class="text-primary fw-medium">#1001</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/avatar/01.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Steven Smith</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Aug 12, 2025</span></td>
                                                        <td><span class="text-custom-body">$120.00</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center text-primary">
                                                                <span class="badge badge-dot bg-primary me-1"></span> Pending
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-label-warning">Delivered</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                </div>
                                                                <span class="text-primary fw-medium">#1002</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/avatar/02.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Emily Davis</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Aug 13, 2025</span></td>
                                                        <td><span class="text-custom-body">$250.00</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center text-success">
                                                                <span class="badge badge-dot bg-success me-1"></span> Paid
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-label-success">Shipped</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                </div>
                                                                <span class="text-primary fw-medium">#1003</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/avatar/03.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Michael Brown</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Aug 14, 2025</span></td>
                                                        <td><span class="text-custom-body">$85.50</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center text-danger">
                                                                <span class="badge badge-dot bg-danger me-1"></span> Failed
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-label-danger">Cancelled</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                </div>
                                                                <span class="text-primary fw-medium">#1004</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/avatar/04.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Sarah Johnson</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Aug 15, 2025</span></td>
                                                        <td><span class="text-custom-body">$310.00</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center text-warning">
                                                                <span class="badge badge-dot bg-warning me-1"></span> Pending
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-label-primary">Processing</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                </div>
                                                                <span class="text-primary fw-medium">#1005</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/avatar/05.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">David Wilson</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Aug 16, 2025</span></td>
                                                        <td><span class="text-custom-body">$420.00</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center text-success">
                                                                <span class="badge badge-dot bg-success me-1"></span> Paid
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-label-success">Delivered</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                </div>
                                                                <span class="text-primary fw-medium">#1006</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/avatar/06.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Chris Lee</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Aug 17, 2025</span></td>
                                                        <td><span class="text-custom-body">$155.75</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center text-primary">
                                                                <span class="badge badge-dot bg-primary me-1"></span> Pending
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-label-warning">On Hold</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                </div>
                                                                <span class="text-primary fw-medium">#1007</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/avatar/07.html" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Linda Martinez</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Aug 18, 2025</span></td>
                                                        <td><span class="text-custom-body">$260.00</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center text-success">
                                                                <span class="badge badge-dot bg-success me-1"></span> Paid
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-label-primary">Processing</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                </div>
                                                                <span class="text-primary fw-medium">#1008</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/avatar/08.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Robert Taylor</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Aug 19, 2025</span></td>
                                                        <td><span class="text-custom-body">$199.99</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center text-danger">
                                                                <span class="badge badge-dot bg-danger me-1"></span> Failed
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-label-danger">Cancelled</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                </div>
                                                                <span class="text-primary fw-medium">#1009</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/avatar/09.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Patricia Anderson</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Aug 20, 2025</span></td>
                                                        <td><span class="text-custom-body">$330.00</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center text-warning">
                                                                <span class="badge badge-dot bg-warning me-1"></span> Pending
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-label-warning">On Hold</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                </div>
                                                                <span class="text-primary fw-medium">#1010</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/avatar/10.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">James Miller</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Aug 21, 2025</span></td>
                                                        <td><span class="text-custom-body">$145.00</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center text-success">
                                                                <span class="badge badge-dot bg-success me-1"></span> Paid
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-label-success">Delivered</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
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
                    </div><!-- page content end -->

                </div>