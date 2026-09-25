<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Edit Product</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <button type="button" class="btn btn-primary d-flex align-items-center gap-2">
                                Save Changes
                            </button>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
                        <div class="row">
                            <div class="col-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.30341 1.84718C6.85713 2.38801 7.18639 3.11786 7.22538 3.8909L10.0374 1.09423C10.134 0.985956 10.2524 0.899315 10.3848 0.839991C10.5172 0.780667 10.6606 0.75 10.8057 0.75C10.9508 0.75 11.0943 0.780667 11.2267 0.839991C11.3591 0.899315 11.4775 0.985956 11.574 1.09423L13.8483 3.46064C13.5253 3.61727 13.2295 3.8248 12.9724 4.07529C12.4251 4.67719 12.1305 5.46671 12.1498 6.28001C12.1691 7.09332 12.5008 7.86797 13.076 8.44322C13.6513 9.01848 14.4259 9.35017 15.2393 9.36947C16.0526 9.38877 16.8421 9.0942 17.444 8.54689C17.6945 8.28975 17.902 7.99401 18.0586 7.67101L20.4558 10.0374C20.564 10.134 20.6507 10.2524 20.71 10.3848C20.7693 10.5172 20.8 10.6606 20.8 10.8057C20.8 10.9508 20.7693 11.0943 20.71 11.2267C20.6507 11.3591 20.564 11.4775 20.4558 11.574L17.6591 14.3246C18.2648 14.3612 18.8471 14.572 19.3359 14.9317C19.8246 15.2913 20.1991 15.7845 20.4143 16.3519C20.6295 16.9193 20.6763 17.5368 20.5489 18.1301C20.4215 18.7234 20.1255 19.2673 19.6964 19.6964C19.2673 20.1255 18.7234 20.4215 18.1301 20.5489C17.5368 20.6763 16.9193 20.6295 16.3519 20.4143C15.7845 20.1991 15.2913 19.8246 14.9317 19.3359C14.572 18.8471 14.3612 18.2648 14.3246 17.6591L11.5126 20.4558C11.416 20.564 11.2976 20.6507 11.1652 20.71C11.0328 20.7693 10.8894 20.8 10.7443 20.8C10.5992 20.8 10.4557 20.7693 10.3233 20.71C10.1909 20.6507 10.0725 20.564 9.97595 20.4558L7.70174 18.0894C8.02475 17.9327 8.32048 17.7252 8.57762 17.4747C9.17059 16.8777 9.5021 16.0695 9.49921 15.228C9.49633 14.3866 9.1593 13.5807 8.56225 12.9877C7.96521 12.3948 7.15706 12.0633 6.31559 12.0661C5.47412 12.069 4.66826 12.4061 4.07529 13.0031C3.8248 13.2603 3.61727 13.556 3.46064 13.879L1.09423 11.5126C0.985956 11.416 0.899315 11.2976 0.839991 11.1652C0.780667 11.0328 0.75 10.8894 0.75 10.7443C0.75 10.5992 0.780667 10.4557 0.839991 10.3233C0.899315 10.1909 0.985956 10.0725 1.09423 9.97595L3.8909 7.22538C3.11786 7.18639 2.38801 6.85713 1.84718 6.30341C1.25625 5.71247 0.924266 4.911 0.924266 4.07529C0.924267 3.23959 1.25625 2.43811 1.84718 1.84718C2.43811 1.25625 3.23959 0.924267 4.07529 0.924266C4.911 0.924266 5.71247 1.25625 6.30341 1.84718V1.84718Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            All Categories
                                        </h3>

                                        <div class="">
                                            <div class="form-control-icon ">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <input type="text" class="" id="serachLeftIconProCat" placeholder="Enter Keywords...">
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
                                                                <input class="form-check-input" type="checkbox" id="selectAll">
                                                            </div>
                                                            Category
                                                        </th>
                                                        <th scope="col" class="fw-medium">Category</th>
                                                        <th scope="col" class="fw-medium">Parent Category</th>
                                                        <th scope="col" class="fw-medium">Products Count</th>
                                                        <th scope="col" class="fw-medium">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-1.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Custom Made CEO Chair</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">CEO Chair</span></td>
                                                        <td><span class="text-custom-body">Office Furniture</span></td>
                                                        <td><span class="text-custom-body">05</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-2.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Ergonomic Mesh Chair</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Mesh Chair</span></td>
                                                        <td><span class="text-custom-body">Office Furniture</span></td>
                                                        <td><span class="text-custom-body">12</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-3.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Executive Wooden Desk</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Wooden Desk</span></td>
                                                        <td><span class="text-custom-body">Office Furniture</span></td>
                                                        <td><span class="text-custom-body">07</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-4.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Adjustable Standing Desk</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Standing Desk</span></td>
                                                        <td><span class="text-custom-body">Office Furniture</span></td>
                                                        <td><span class="text-custom-body">04</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-5.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Modern Bookshelf</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Bookshelf</span></td>
                                                        <td><span class="text-custom-body">Home Furniture</span></td>
                                                        <td><span class="text-custom-body">09</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-6.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Leather Recliner Sofa</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Recliner Sofa</span></td>
                                                        <td><span class="text-custom-body">Home Furniture</span></td>
                                                        <td><span class="text-custom-body">06</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-7.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Outdoor Patio Set</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Patio Set</span></td>
                                                        <td><span class="text-custom-body">Outdoor Furniture</span></td>
                                                        <td><span class="text-custom-body">03</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-8.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Kids Study Table</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Study Table</span></td>
                                                        <td><span class="text-custom-body">Kids Furniture</span></td>
                                                        <td><span class="text-custom-body">08</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-9.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Gaming Chair Pro</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Gaming Chair</span></td>
                                                        <td><span class="text-custom-body">Gaming Furniture</span></td>
                                                        <td><span class="text-custom-body">11</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-10.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Glass Coffee Table</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">Coffee Table</span></td>
                                                        <td><span class="text-custom-body">Home Furniture</span></td>
                                                        <td><span class="text-custom-body">10</span></td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-sm btn-icon btn-icon-secondary rounded-pill" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.9516 2.31982C10.4732 1.75466 10.734 1.47208 11.0112 1.30725C11.6799 0.909531 12.5034 0.897164 13.1833 1.27463C13.465 1.43106 13.7339 1.70568 14.2715 2.25493C14.8092 2.80418 15.078 3.07881 15.2312 3.36665C15.6007 4.06118 15.5886 4.90235 15.1992 5.58549C15.0379 5.86861 14.7613 6.13504 14.208 6.66791L7.62544 13.008C6.57701 14.0178 6.0528 14.5227 5.39764 14.7786C4.74248 15.0345 4.02224 15.0157 2.58176 14.978L2.38576 14.9729C1.94723 14.9614 1.72797 14.9557 1.60051 14.811C1.47305 14.6664 1.49045 14.443 1.52526 13.9963L1.54415 13.7538C1.64211 12.4965 1.69108 11.8678 1.9366 11.3028C2.18211 10.7377 2.6056 10.2788 3.4526 9.36115L9.9516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.19922 2.39996L14.0992 7.29996" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.89941 15L15.4994 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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