<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">All Products</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Products</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="">
                            <a href="<?= site_url('ecommerce/product_add'); ?>" class="btn btn-primary d-flex align-items-center gap-2">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 1V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 8H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Add Product
                            </a>
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
                                                    <path d="M20.5791 4.54593C20.4972 4.43471 20.3851 4.34929 20.2561 4.2998L11.0261 0.807792C10.9388 0.769675 10.8445 0.75 10.7492 0.75C10.6539 0.75 10.5596 0.769675 10.4723 0.807792L1.24233 4.36133C1.12038 4.39363 1.00901 4.45727 0.919277 4.54593C0.811822 4.67593 0.752106 4.83879 0.750061 5.00743V16.268C0.752056 16.4216 0.800012 16.5711 0.887749 16.6973C0.975487 16.8234 1.09898 16.9203 1.24233 16.9756L10.4723 20.5292H10.7492H11.0261L20.2561 16.9756C20.3994 16.9203 20.5229 16.8234 20.6106 16.6973C20.6984 16.5711 20.7463 16.4216 20.7483 16.268V5.06896C20.7613 4.87934 20.7007 4.692 20.5791 4.54593V4.54593Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.7491 20.6368V8.39169" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.7491 8.39169V20.6368" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M0.919373 4.60745L10.7493 8.39174L20.5792 4.60745" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            All Products
                                        </h3>

                                        <div class="">
                                            <div class="form-control-icon ">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <input type="text" class="" id="serachLeftIconProList" placeholder="Enter Keywords...">
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
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckboxAllProList" value="option1">
                                                            </div>
                                                            Product
                                                        </th>
                                                        <th scope="col" class="fw-medium">SKU</th>
                                                        <th scope="col" class="fw-medium">Quantity</th>
                                                        <th scope="col" class="fw-medium">Category</th>
                                                        <th scope="col" class="fw-medium">Price</th>
                                                        <th scope="col" class="fw-medium">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-1.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Modern Wood Desk</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SKU-MWDSK101</span></td>
                                                        <td><span class="text-custom-body">58</span></td>
                                                        <td><span class="text-custom-body">Furniture</span></td>
                                                        <td><span class="text-custom-body">$149.00</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-2.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Ergonomic Office Chair</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SKU-EOCHR202</span></td>
                                                        <td><span class="text-custom-body">34</span></td>
                                                        <td><span class="text-custom-body">Furniture</span></td>
                                                        <td><span class="text-custom-body">$129.99</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-3.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Minimalist Bookshelf</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SKU-MNBSH303</span></td>
                                                        <td><span class="text-custom-body">87</span></td>
                                                        <td><span class="text-custom-body">Furniture</span></td>
                                                        <td><span class="text-custom-body">$89.00</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-4.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Rustic Coffee Table</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SKU-RCTBL404</span></td>
                                                        <td><span class="text-custom-body">22</span></td>
                                                        <td><span class="text-custom-body">Furniture</span></td>
                                                        <td><span class="text-custom-body">$110.00</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-5.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Velvet Armchair</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SKU-VLARM505</span></td>
                                                        <td><span class="text-custom-body">45</span></td>
                                                        <td><span class="text-custom-body">Furniture</span></td>
                                                        <td><span class="text-custom-body">$159.00</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-6.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Leather Recliner</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SKU-LRCLR606</span></td>
                                                        <td><span class="text-custom-body">18</span></td>
                                                        <td><span class="text-custom-body">Furniture</span></td>
                                                        <td><span class="text-custom-body">$299.99</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option7">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-7.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Compact Nightstand</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SKU-CMNT707</span></td>
                                                        <td><span class="text-custom-body">76</span></td>
                                                        <td><span class="text-custom-body">Furniture</span></td>
                                                        <td><span class="text-custom-body">$59.50</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="option8">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-8.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Glass Dining Table</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SKU-GDNTBL808</span></td>
                                                        <td><span class="text-custom-body">12</span></td>
                                                        <td><span class="text-custom-body">Furniture</span></td>
                                                        <td><span class="text-custom-body">$425.00</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="option9">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-9.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Corner Bookshelf</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SKU-CRNBSH909</span></td>
                                                        <td><span class="text-custom-body">41</span></td>
                                                        <td><span class="text-custom-body">Furniture</span></td>
                                                        <td><span class="text-custom-body">$68.00</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="option10">
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-10.jpg" width="60" height="60" alt="Product Image">
                                                                    <div class="ms-3">
                                                                        <h4 class="h6 mb-0">Foldable Study Table</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SKU-FDSTBL010</span></td>
                                                        <td><span class="text-custom-body">66</span></td>
                                                        <td><span class="text-custom-body">Furniture</span></td>
                                                        <td><span class="text-custom-body">$72.00</span></td>
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
                                                                        <li><a class="dropdown-item" href="#">Duplicate</a></li>
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