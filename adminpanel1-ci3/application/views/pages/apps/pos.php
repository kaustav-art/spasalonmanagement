<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-content">
                        <div class="row gy-6">
                            <div class="col-xxl-7 col-xl-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            All Products
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="row mb-7 gy-5">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-control-icon ">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    <input type="text" class="" id="productSearch" placeholder="Enter Keywords...">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <select class="form-select conca-select2" aria-label="Filter by Category">
                                                    <option selected>All Categories</option>
                                                    <option value="fashion">Fashion</option>
                                                    <option value="electronics">Electronics</option>
                                                    <option value="furniture">Furniture</option>
                                                    <option value="grocery">Grocery</option>
                                                    <option value="toys">Toys</option>
                                                    <option value="sports">Sports</option>
                                                    <option value="beauty">Beauty</option>
                                                    <option value="automotive">Automotive</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <select class="form-select conca-select2" aria-label="Sort by Brand">
                                                    <option selected>All Brands</option>
                                                    <option value="apple">Apple</option>
                                                    <option value="samsung">Samsung</option>
                                                    <option value="oneplus">OnePlus</option>
                                                    <option value="xiaomi">Xiaomi</option>
                                                    <option value="sony">Sony</option>
                                                    <option value="lg">LG</option>
                                                    <option value="dell">Dell</option>
                                                    <option value="hp">HP</option>
                                                    <option value="lenovo">Lenovo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-3 mt-1" id="productList">
                                            <div class="col">
                                                <div class="pos-product-card">
                                                    <a href="javascript:void(0);" class="pos-product-add-btn text-decoration-none" data-bs-toggle="modal" data-bs-target="#posProductModal">
                                                        <div class="pos-product-img position-relative">
                                                            <img class="mw-100" src="<?= base_url('assets/'); ?>img/product/product-1.jpg" alt="">
                                                            <div class="position-absolute top-1 start-2">
                                                                <span class="badge badge-success pos-product-badge">Stock: 25</span>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <h3 class="fz-15px fw-medium pos-product-title mb-1">Men's Leather Shoes</h3>
                                                            <p class="fw-medium fz-15px text-primary ">$49.99</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="pos-product-card">
                                                    <a href="javascript:void(0);" class="pos-product-add-btn text-decoration-none" data-bs-toggle="modal" data-bs-target="#posProductModal">
                                                        <div class="pos-product-img position-relative">
                                                            <img class="mw-100" src="<?= base_url('assets/'); ?>img/product/product-2.jpg" alt="">
                                                            <div class="position-absolute top-1 start-2">
                                                                <span class="badge badge-success pos-product-badge">Stock: 18</span>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <h3 class="fz-15px fw-medium pos-product-title mb-1">Casual T-Shirt</h3>
                                                            <p class="fw-medium fz-15px text-primary ">$19.50</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="pos-product-card">
                                                    <a href="javascript:void(0);" class="pos-product-add-btn text-decoration-none" data-bs-toggle="modal" data-bs-target="#posProductModal">
                                                        <div class="pos-product-img position-relative">
                                                            <img class="mw-100" src="<?= base_url('assets/'); ?>img/product/product-3.jpg" alt="">
                                                            <div class="position-absolute top-1 start-2">
                                                                <span class="badge badge-danger pos-product-badge">Stock: 5</span>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <h3 class="fz-15px fw-medium pos-product-title mb-1">Women's Handbag</h3>
                                                            <p class="fw-medium fz-15px text-primary ">$64.00</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="pos-product-card">
                                                    <a href="javascript:void(0);" class="pos-product-add-btn text-decoration-none" data-bs-toggle="modal" data-bs-target="#posProductModal">
                                                        <div class="pos-product-img position-relative">
                                                            <img class="mw-100" src="<?= base_url('assets/'); ?>img/product/product-4.jpg" alt="">
                                                            <div class="position-absolute top-1 start-2">
                                                                <span class="badge badge-success pos-product-badge">Stock: 40</span>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <h3 class="fz-15px fw-medium pos-product-title mb-1">Wireless Headphones</h3>
                                                            <p class="fw-medium fz-15px text-primary ">$89.99</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="pos-product-card">
                                                    <a href="javascript:void(0);" class="pos-product-add-btn text-decoration-none" data-bs-toggle="modal" data-bs-target="#posProductModal">
                                                        <div class="pos-product-img position-relative">
                                                            <img class="mw-100" src="<?= base_url('assets/'); ?>img/product/product-5.jpg" alt="">
                                                            <div class="position-absolute top-1 start-2">
                                                                <span class="badge badge-success pos-product-badge">Stock: 30</span>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <h3 class="fz-15px fw-medium pos-product-title mb-1">Smart Watch</h3>
                                                            <p class="fw-medium fz-15px text-primary ">$129.00</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="pos-product-card">
                                                    <a href="javascript:void(0);" class="pos-product-add-btn text-decoration-none" data-bs-toggle="modal" data-bs-target="#posProductModal">
                                                        <div class="pos-product-img position-relative">
                                                            <img class="mw-100" src="<?= base_url('assets/'); ?>img/product/product-6.jpg" alt="">
                                                            <div class="position-absolute top-1 start-2">
                                                                <span class="badge badge-warning pos-product-badge">Stock: 12</span>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <h3 class="fz-15px fw-medium pos-product-title mb-1">Bluetooth Speaker</h3>
                                                            <p class="fw-medium fz-15px text-primary ">$55.99</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="pos-product-card">
                                                    <a href="javascript:void(0);" class="pos-product-add-btn text-decoration-none" data-bs-toggle="modal" data-bs-target="#posProductModal">
                                                        <div class="pos-product-img position-relative">
                                                            <img class="mw-100" src="<?= base_url('assets/'); ?>img/product/product-7.jpg" alt="">
                                                            <div class="position-absolute top-1 start-2">
                                                                <span class="badge badge-success pos-product-badge">Stock: 20</span>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <h3 class="fz-15px fw-medium pos-product-title mb-1">Sports Backpack</h3>
                                                            <p class="fw-medium fz-15px text-primary ">$39.99</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="pos-product-card">
                                                    <a href="javascript:void(0);" class="pos-product-add-btn text-decoration-none" data-bs-toggle="modal" data-bs-target="#posProductModal">
                                                        <div class="pos-product-img position-relative">
                                                            <img class="mw-100" src="<?= base_url('assets/'); ?>img/product/product-8.jpg" alt="">
                                                            <div class="position-absolute top-1 start-2">
                                                                <span class="badge badge-success pos-product-badge">Stock: 15</span>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <h3 class="fz-15px fw-medium pos-product-title mb-1">Sunglasses</h3>
                                                            <p class="fw-medium fz-15px text-primary ">$24.99</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="pos-product-card">
                                                    <a href="javascript:void(0);" class="pos-product-add-btn text-decoration-none" data-bs-toggle="modal" data-bs-target="#posProductModal">
                                                        <div class="pos-product-img position-relative">
                                                            <img class="mw-100" src="<?= base_url('assets/'); ?>img/product/product-9.jpg" alt="">
                                                            <div class="position-absolute top-1 start-2">
                                                                <span class="badge badge-danger pos-product-badge">Stock: 8</span>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <h3 class="fz-15px fw-medium pos-product-title mb-1">Men's Jeans</h3>
                                                            <p class="fw-medium fz-15px text-primary ">$59.00</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="pos-product-card">
                                                    <a href="javascript:void(0);" class="pos-product-add-btn text-decoration-none" data-bs-toggle="modal" data-bs-target="#posProductModal">
                                                        <div class="pos-product-img position-relative">
                                                            <img class="mw-100" src="<?= base_url('assets/'); ?>img/product/product-10.jpg" alt="">
                                                            <div class="position-absolute top-1 start-2">
                                                                <span class="badge badge-success pos-product-badge">Stock: 27</span>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <h3 class="fz-15px fw-medium pos-product-title mb-1">Cotton Hoodie</h3>
                                                            <p class="fw-medium fz-15px text-primary ">$42.50</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-5 col-xl-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            Billing Summary
                                        </h3>
                                        <div class="pure-card-actions">
                                            <button class="btn btn-label-primary btn-sm gap-2" data-bs-target="#addCustomerModal" data-bs-toggle="modal">
                                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.87928 9.22269C2.70833 9.22269 0 9.69893 0 11.6024C0 13.5074 2.69111 14 5.87928 14C9.05022 14 11.7586 13.5238 11.7586 11.6203C11.7586 9.71532 9.06744 9.22269 5.87928 9.22269Z" fill="currentColor" />
                                                    <path opacity="0.4" d="M5.87467 7.40819C8.03429 7.40819 9.76496 5.76035 9.76496 3.7041C9.76496 1.64784 8.03429 0 5.87467 0C3.71583 0 1.98438 1.64784 1.98438 3.7041C1.98438 5.76035 3.71583 7.40819 5.87467 7.40819Z" fill="currentColor" />
                                                    <path opacity="0.4" d="M11.3437 3.77126C11.3437 4.8184 11.0133 5.79548 10.4341 6.6071C10.3738 6.69057 10.4271 6.80311 10.532 6.821C10.6775 6.8441 10.8271 6.85826 10.9797 6.86124C12.4982 6.89925 13.861 5.96838 14.2375 4.56649C14.7956 2.48638 13.1581 0.618683 11.0721 0.618683C10.8458 0.618683 10.629 0.641042 10.4177 0.682033C10.3887 0.687995 10.3574 0.70141 10.3417 0.72526C10.3214 0.755816 10.3363 0.795317 10.3566 0.821402C10.9836 1.65836 11.3437 2.67718 11.3437 3.77126Z" fill="currentColor" />
                                                    <path d="M15.8257 9.46508C15.5479 8.9009 14.877 8.51409 13.8563 8.32404C13.3749 8.21225 12.0709 8.0535 10.8584 8.07586C10.8404 8.07809 10.8302 8.09002 10.8286 8.09747C10.8263 8.1094 10.8318 8.12728 10.8552 8.13995C11.4157 8.40379 13.5816 9.55153 13.3092 11.9722C13.2974 12.0781 13.3859 12.1675 13.4963 12.1526C14.0293 12.0803 15.4007 11.7993 15.8257 10.9259C16.0613 10.4638 16.0613 9.92716 15.8257 9.46508Z" fill="currentColor" />
                                                </svg>
                                                Add Customer
                                            </button>
                                        </div>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="row gx-3 gy-4">
                                            <div class="col-md-6">
                                                <!-- customer list -->
                                                <select class="form-select conca-select2" aria-label="Select Customer">
                                                    <option value="">Select Customer</option>
                                                    <option selected value="walk-in">Walk-in Customer</option>
                                                    <option value="1">John Doe</option>
                                                    <option value="2">Jane Smith</option>
                                                    <option value="3">Michael Johnson</option>
                                                    <option value="4">Emily Davis</option>
                                                    <option value="5">David Wilson</option>
                                                    <option value="6">Sarah Brown</option>
                                                    <option value="7">Chris Lee</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                                    <button class="btn btn-primary flex-grow-1">New Order</button>
                                                    <button class="btn btn-icon btn-label-warning" data-bs-target="#pausedOrdersModal" data-bs-toggle="modal">
                                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3.11111 0H0.888889C0.397969 0 0 0.447715 0 1V12C0 12.5523 0.397969 13 0.888889 13H3.11111C3.60203 13 4 12.5523 4 12V1C4 0.447715 3.60203 0 3.11111 0Z" fill="currentColor" />
                                                            <path d="M11.1111 0H8.88889C8.39797 0 8 0.447715 8 1V12C8 12.5523 8.39797 13 8.88889 13H11.1111C11.602 13 12 12.5523 12 12V1C12 0.447715 11.602 0 11.1111 0Z" fill="currentColor" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pos-sale-item-list my-10">
                                            <div class="pos-sale-item">
                                                <div class="row gx-2 gy-4 align-items-center">
                                                    <div class="col-sm-5">
                                                        <div class="pos-sale-content d-flex align-items-center gap-3">
                                                            <div class="pos-sale-img">
                                                                <img src="<?= base_url('assets/'); ?>img/product/product-1.jpg" alt="">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h3 class="pos-sale-title fz-15px fw-medium mb-0">Men's Leather Shoes</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-6">
                                                        <div class="pos-sale-qty">
                                                            <div class="conca-qty-group">
                                                                <button class="conca-qty-btn conca-btn-decrease" type="button"><svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <input type="number" class="conca-qty-input" value="1" min="1">
                                                                <button class="conca-qty-btn conca-btn-increase" type="button"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 col-6">
                                                        <div class="pos-sale-price text-md-center">
                                                            <p class="mb-0 fw-medium fz-15px text-custom-black">$49.99</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="pos-sale-action text-sm-end">
                                                            <button type="button" class="btn btn-icon btn-label-danger rounded-pill" data-bs-target="#saleDeleteModal" data-bs-toggle="modal">
                                                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M13.6 3.44998H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M5.55078 11.15L5.55078 6.95003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pos-sale-item">
                                                <div class="row gx-2 gy-4 align-items-center">
                                                    <div class="col-sm-5">
                                                        <div class="pos-sale-content d-flex align-items-center gap-3">
                                                            <div class="pos-sale-img">
                                                                <img src="<?= base_url('assets/'); ?>img/product/product-3.jpg" alt="">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h3 class="pos-sale-title fz-15px fw-medium mb-0">Women's Handbag</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-6">
                                                        <div class="pos-sale-qty">
                                                            <div class="conca-qty-group">
                                                                <button class="conca-qty-btn conca-btn-decrease" type="button"><svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <input type="number" class="conca-qty-input" value="2" min="1">
                                                                <button class="conca-qty-btn conca-btn-increase" type="button"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 col-6">
                                                        <div class="pos-sale-price text-md-center">
                                                            <p class="mb-0 fw-medium fz-15px text-custom-black">$64.00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="pos-sale-action text-sm-end">
                                                            <button type="button" class="btn btn-icon btn-label-danger rounded-pill" data-bs-target="#saleDeleteModal" data-bs-toggle="modal">
                                                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M13.6 3.44998H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M5.55078 11.15L5.55078 6.95003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pos-sale-item">
                                                <div class="row gx-2 gy-4 align-items-center">
                                                    <div class="col-sm-5">
                                                        <div class="pos-sale-content d-flex align-items-center gap-3">
                                                            <div class="pos-sale-img">
                                                                <img src="<?= base_url('assets/'); ?>img/product/product-5.jpg" alt="">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h3 class="pos-sale-title fz-15px fw-medium mb-0">Smart Watch</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-6">
                                                        <div class="pos-sale-qty">
                                                            <div class="conca-qty-group">
                                                                <button class="conca-qty-btn conca-btn-decrease" type="button"><svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <input type="number" class="conca-qty-input" value="1" min="1">
                                                                <button class="conca-qty-btn conca-btn-increase" type="button"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 col-6">
                                                        <div class="pos-sale-price text-md-center">
                                                            <p class="mb-0 fw-medium fz-15px text-custom-black">$129.00</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="pos-sale-action text-sm-end">
                                                            <button type="button" class="btn btn-icon btn-label-danger rounded-pill" data-bs-target="#saleDeleteModal" data-bs-toggle="modal">
                                                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M13.6 3.44998H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M5.55078 11.15L5.55078 6.95003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pos-sale-item">
                                                <div class="row gx-2 gy-4 align-items-center">
                                                    <div class="col-sm-5">
                                                        <div class="pos-sale-content d-flex align-items-center gap-3">
                                                            <div class="pos-sale-img">
                                                                <img src="<?= base_url('assets/'); ?>img/product/product-7.jpg" alt="">
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h3 class="pos-sale-title fz-15px fw-medium mb-0">Sports Backpack</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-6">
                                                        <div class="pos-sale-qty">
                                                            <div class="conca-qty-group">
                                                                <button class="conca-qty-btn conca-btn-decrease" type="button"><svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <input type="number" class="conca-qty-input" value="3" min="1">
                                                                <button class="conca-qty-btn conca-btn-increase" type="button"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 col-6">
                                                        <div class="pos-sale-price text-md-center">
                                                            <p class="mb-0 fw-medium fz-15px text-custom-black">$39.99</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="pos-sale-action text-sm-end">
                                                            <button type="button" class="btn btn-icon btn-label-danger rounded-pill" data-bs-target="#saleDeleteModal" data-bs-toggle="modal">
                                                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M13.6 3.44998H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M5.55078 11.15L5.55078 6.95003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="pos-sale-summary">
                                            <div class="row gx-3 align-items-center mb-3">
                                                <div class="col-6">
                                                    <h3 class="mb-0 fw-normal fz-15px">Subtotal :</h3>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <h3 class="mb-0 fw-medium fz-15px">$2,500.00</h3>
                                                </div>
                                            </div>
                                            <div class="row gx-3 align-items-center mb-3">
                                                <div class="col-6">
                                                    <h3 class="mb-0 fw-normal fz-15px">Product Discount :</h3>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <div class="d-flex align-items-center justify-content-end gap-2 flex-wrap">
                                                        <button class="pos-sale-discount-btn d-flex align-items-center justify-content-center" type="button" data-bs-target="discountModal" data-bs-toggle="modal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5.85156 10.6718H10.8516" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M8.35156 1.50509C8.57258 1.28408 8.87233 1.15991 9.1849 1.15991C9.33966 1.15991 9.49291 1.1904 9.63589 1.24962C9.77888 1.30885 9.90879 1.39566 10.0182 1.50509C10.1277 1.61452 10.2145 1.74444 10.2737 1.88743C10.3329 2.03041 10.3634 2.18366 10.3634 2.33842C10.3634 2.49319 10.3329 2.64644 10.2737 2.78942C10.2145 2.9324 10.1277 3.06232 10.0182 3.17176L3.07378 10.1162L0.851562 10.6718L1.40712 8.44953L8.35156 1.50509Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                        <h3 class="mb-0 fw-medium fz-15px">
                                                            -$50.00
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gx-3 align-items-center">
                                                <div class="col-6">
                                                    <h3 class="mb-0 fw-normal fz-15px">Tax (10%) :</h3>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <div class="d-flex align-items-center justify-content-end gap-2 flex-wrap">
                                                        <button class="pos-sale-discount-btn d-flex align-items-center justify-content-center" type="button" data-bs-target="discountModal" data-bs-toggle="modal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5.85156 10.6718H10.8516" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M8.35156 1.50509C8.57258 1.28408 8.87233 1.15991 9.1849 1.15991C9.33966 1.15991 9.49291 1.1904 9.63589 1.24962C9.77888 1.30885 9.90879 1.39566 10.0182 1.50509C10.1277 1.61452 10.2145 1.74444 10.2737 1.88743C10.3329 2.03041 10.3634 2.18366 10.3634 2.33842C10.3634 2.49319 10.3329 2.64644 10.2737 2.78942C10.2145 2.9324 10.1277 3.06232 10.0182 3.17176L3.07378 10.1162L0.851562 10.6718L1.40712 8.44953L8.35156 1.50509Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                        <h3 class="mb-0 fw-medium fz-15px">
                                                            $250.00
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pos-sale-summary-total mb-12">
                                            <div class="row gx-3 align-items-center">
                                                <div class="col-6">
                                                    <h3 class="mb-0 fw-semibold fz-16px">Total :</h3>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <h3 class="mb-0 fw-semibold fz-16px">$2,700.00</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pos-sale-footer d-flex align-items-center flex-wrap gap-3 mt-4">
                                            <button class="btn btn-primary gap-1 flex-grow-1">
                                                Hold
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.7471 5.86063C12.6525 5.88883 12.5631 5.9275 12.482 5.97631C12.063 6.22892 11.2818 6.91892 11.2818 6.91892C11.3058 6.90044 10.7193 7.3654 10.1815 7.79488C10.0306 7.91548 9.77707 7.82885 9.77524 7.65614V2.09104C9.77524 1.54555 9.23681 1.16925 8.58522 1.2814C8.0653 1.37091 7.78787 1.76718 7.78787 2.241L7.79243 6.4419L6.99991 6.4434V0.758348C6.99991 0.237855 6.48989 -0.103836 5.87546 0.0286107C5.45384 0.119401 5.25645 0.444535 5.25645 0.854478V6.45119L4.46628 6.45258L4.46171 1.90518C4.46171 1.45081 4.20019 1.05005 3.64585 1.03659C3.06974 1.0226 2.79231 1.41855 2.79231 1.88745L2.7841 6.46006L2.01165 6.46134V3.46421C2.01165 2.9921 1.74361 2.63546 1.16424 2.63546C0.587867 2.63546 0.319824 2.9921 0.319824 3.46421L0.320476 10.1178C0.609509 13.5386 2.96988 14 5.43728 14C7.4815 14 9.11687 13.1692 10.0222 11.8412C10.1387 11.6872 10.4537 11.2813 10.8272 10.8006C11.3585 10.1169 11.8406 9.50515 12.1789 9.07171C12.6249 8.50016 13.0332 8.05369 13.5383 7.51611C13.6788 7.36657 13.7952 7.24619 13.8508 7.19642C14.0029 7.06034 14.1032 6.89104 14.1332 6.70829V6.67379C14.1332 6.01401 13.5033 5.63419 12.7471 5.86063Z" fill="currentColor" />
                                                </svg>
                                            </button>
                                            <button class="btn  btn-pink gap-1 flex-grow-1">
                                                Reset
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.0892 1.6488V5.54934H10.2407" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12.4776 8.79981C12.0606 9.99592 11.2714 11.0223 10.2289 11.7242C9.18631 12.4262 7.94689 12.7657 6.69737 12.6916C5.44786 12.6175 4.25595 12.1339 3.30126 11.3135C2.34657 10.4931 1.68082 9.38048 1.40433 8.14325C1.12784 6.90603 1.25559 5.61124 1.76834 4.45401C2.28108 3.29677 3.15103 2.33978 4.2471 1.72725C5.34317 1.11472 6.60598 0.879838 7.84522 1.05799C9.08447 1.23614 10.233 1.81768 11.1178 2.71497L14.0876 5.54936" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <button class="btn btn-success gap-1 flex-grow-1">
                                                Pay Now
                                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1H17V11H1V1Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 4.33333C2.76731 4.33333 4.2 2.84096 4.2 1H1V4.33333Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 7.66675C2.76731 7.66675 4.2 9.15912 4.2 11.0001H1V7.66675Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9969 7.66675V11.0001H13.7969C13.7969 9.15912 15.2296 7.66675 16.9969 7.66675Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9969 4.33333C15.2296 4.33333 13.7969 2.84096 13.7969 1H16.9969V4.33333Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9 8.5C10.1046 8.5 11 7.38071 11 6C11 4.61929 10.1046 3.5 9 3.5C7.89544 3.5 7 4.61929 7 6C7 7.38071 7.89544 8.5 9 8.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>