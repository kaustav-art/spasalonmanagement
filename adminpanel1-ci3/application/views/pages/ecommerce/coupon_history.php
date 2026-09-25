<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Coupon History</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Coupon History</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <a href="<?= site_url('ecommerce/coupon_list_alias'); ?>" class="btn btn-primary d-flex align-items-center gap-2">
                                View Coupons
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
                                                <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.21446 6.59375C0.965912 6.59375 0.739109 6.39229 0.750536 6.12895C0.81745 4.58687 1.00493 3.58298 1.5302 2.78884C1.8324 2.33196 2.20777 1.93459 2.63935 1.61468C3.80587 0.75 5.45151 0.75 8.74279 0.75H12.7575C16.0488 0.75 17.6944 0.75 18.8609 1.61468C19.2925 1.93459 19.6679 2.33196 19.9701 2.78884C20.4953 3.58289 20.6828 4.58665 20.7497 6.12843C20.7612 6.39208 20.5341 6.59375 20.2852 6.59375C18.8994 6.59375 17.776 7.78299 17.776 9.25C17.776 10.717 18.8994 11.9062 20.2852 11.9062C20.5341 11.9062 20.7612 12.1079 20.7497 12.3716C20.6828 13.9134 20.4953 14.9171 19.9701 15.7112C19.6679 16.168 19.2925 16.5654 18.8609 16.8853C17.6944 17.75 16.0488 17.75 12.7575 17.75H8.74279C5.45151 17.75 3.80587 17.75 2.63935 16.8853C2.20777 16.5654 1.8324 16.168 1.5302 15.7112C1.00493 14.917 0.81745 13.9131 0.750536 12.3711C0.739109 12.1077 0.965912 11.9062 1.21446 11.9062C2.60024 11.9062 3.72364 10.717 3.72364 9.25C3.72364 7.78299 2.60024 6.59375 1.21446 6.59375Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                    <path d="M8.25012 11.75L13.2501 6.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.25012 6.75H8.26135M13.2389 11.75H13.2501" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            Coupon History
                                        </h3>

                                        <div class="">
                                            <div class="form-control-icon ">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15 15L11.6167 11.6166" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <input type="text" class="" placeholder="Enter Keywords...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="fw-medium">#</th>
                                                        <th scope="col" class="fw-medium">User</th>
                                                        <th scope="col" class="fw-medium">Coupon</th>
                                                        <th scope="col" class="fw-medium">Code</th>
                                                        <th scope="col" class="fw-medium">Discount</th>
                                                        <th scope="col" class="fw-medium">Order Amount</th>
                                                        <th scope="col" class="fw-medium">Date Used</th>
                                                        <th scope="col" class="fw-medium">Usage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>John Doe</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-1.jpg" width="60" height="60" alt="Coupon Image">
                                                                <div class="ms-2">
                                                                    <h3 class="h6 mb-0">Summer Sale</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SUMMER20</span></td>
                                                        <td><span class="text-custom-body">20%</span></td>
                                                        <td><span class="text-custom-body">$150</span></td>
                                                        <td><span class="text-custom-body">Aug 10, 2025</span></td>
                                                        <td><span class="text-custom-body">2</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Jane Smith</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-2.jpg" width="60" height="60" alt="Coupon Image">
                                                                <div class="ms-2">
                                                                    <h3 class="h6 mb-0">Winter Sale</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">WINTER10</span></td>
                                                        <td><span class="text-custom-body">10%</span></td>
                                                        <td><span class="text-custom-body">$80</span></td>
                                                        <td><span class="text-custom-body">Aug 12, 2025</span></td>
                                                        <td><span class="text-custom-body">1</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Michael Brown</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-3.jpg" width="60" height="60" alt="Coupon Image">
                                                                <div class="ms-2">
                                                                    <h3 class="h6 mb-0">Flash Deal</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">FLASH15</span></td>
                                                        <td><span class="text-custom-body">15%</span></td>
                                                        <td><span class="text-custom-body">$200</span></td>
                                                        <td><span class="text-custom-body">Aug 11, 2025</span></td>
                                                        <td><span class="text-custom-body">3</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Emily Davis</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-4.jpg" width="60" height="60" alt="Coupon Image">
                                                                <div class="ms-2">
                                                                    <h3 class="h6 mb-0">Autumn Special</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">AUTUMN25</span></td>
                                                        <td><span class="text-custom-body">25%</span></td>
                                                        <td><span class="text-custom-body">$120</span></td>
                                                        <td><span class="text-custom-body">Aug 13, 2025</span></td>
                                                        <td><span class="text-custom-body">1</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>David Wilson</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-5.jpg" width="60" height="60" alt="Coupon Image">
                                                                <div class="ms-2">
                                                                    <h3 class="h6 mb-0">Mega Discount</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">MEGA30</span></td>
                                                        <td><span class="text-custom-body">30%</span></td>
                                                        <td><span class="text-custom-body">$300</span></td>
                                                        <td><span class="text-custom-body">Aug 14, 2025</span></td>
                                                        <td><span class="text-custom-body">2</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Sarah Johnson</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-6.jpg" width="60" height="60" alt="Coupon Image">
                                                                <div class="ms-2">
                                                                    <h3 class="h6 mb-0">Holiday Offer</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">HOLIDAY5</span></td>
                                                        <td><span class="text-custom-body">5%</span></td>
                                                        <td><span class="text-custom-body">$60</span></td>
                                                        <td><span class="text-custom-body">Aug 15, 2025</span></td>
                                                        <td><span class="text-custom-body">1</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Chris Lee</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-7.jpg" width="60" height="60" alt="Coupon Image">
                                                                <div class="ms-2">
                                                                    <h3 class="h6 mb-0">Back to School</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">SCHOOL10</span></td>
                                                        <td><span class="text-custom-body">10%</span></td>
                                                        <td><span class="text-custom-body">$90</span></td>
                                                        <td><span class="text-custom-body">Aug 16, 2025</span></td>
                                                        <td><span class="text-custom-body">2</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>Linda Martinez</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-8.jpg" width="60" height="60" alt="Coupon Image">
                                                                <div class="ms-2">
                                                                    <h3 class="h6 mb-0">Flash Friday</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">FRIDAY20</span></td>
                                                        <td><span class="text-custom-body">20%</span></td>
                                                        <td><span class="text-custom-body">$180</span></td>
                                                        <td><span class="text-custom-body">Aug 17, 2025</span></td>
                                                        <td><span class="text-custom-body">1</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>Robert Taylor</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-9.jpg" width="60" height="60" alt="Coupon Image">
                                                                <div class="ms-2">
                                                                    <h3 class="h6 mb-0">Weekend Deal</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">WEEKEND15</span></td>
                                                        <td><span class="text-custom-body">15%</span></td>
                                                        <td><span class="text-custom-body">$140</span></td>
                                                        <td><span class="text-custom-body">Aug 18, 2025</span></td>
                                                        <td><span class="text-custom-body">3</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>Patricia Anderson</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-10.jpg" width="60" height="60" alt="Coupon Image">
                                                                <div class="ms-2">
                                                                    <h3 class="h6 mb-0">Holiday Special</h3>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">HOLIDAY25</span></td>
                                                        <td><span class="text-custom-body">25%</span></td>
                                                        <td><span class="text-custom-body">$220</span></td>
                                                        <td><span class="text-custom-body">Aug 19, 2025</span></td>
                                                        <td><span class="text-custom-body">2</span></td>
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