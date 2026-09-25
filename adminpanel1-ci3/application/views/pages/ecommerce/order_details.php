<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Order Details</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
                        <div class="row mb-5">
                            <div class="col-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center gap-5 flex-wrap">
                                            <div class="d-flex flex-column gap-2">
                                                <h3 class="h5 fw-medium mb-1">Order ID: #1001</h3>
                                                <p class="mb-0">Status: <span class="badge badge-label-success">Paid</span> <span class="badge badge-label-primary">Out for Delivery</span></p>
                                                <p class="mb-0">Date: January 1, 2023</p>
                                            </div>
                                            <div class="">
                                                <button type="button" class="btn btn-label-danger">Delete Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="pure-card rounded-custom card-bg shadow-custom mb-5">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            Order details
                                        </h3>
                                    </div>
                                    <div class="pure-card-body p-4">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="fw-medium d-flex align-items-center">
                                                            Product
                                                        </th>
                                                        <th scope="col" class="fw-medium">Price</th>
                                                        <th scope="col" class="fw-medium">QTY</th>
                                                        <th scope="col" class="fw-medium">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-1.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Product 1</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$120.00</span></td>
                                                        <td><span class="text-custom-body">1</span></td>
                                                        <td><span class="text-custom-body">$120.00</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-2.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Product 2</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$89.99</span></td>
                                                        <td><span class="text-custom-body">2</span></td>
                                                        <td><span class="text-custom-body">$179.98</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-3.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Product 3</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$59.50</span></td>
                                                        <td><span class="text-custom-body">3</span></td>
                                                        <td><span class="text-custom-body">$178.50</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-4.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Product 4</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$249.00</span></td>
                                                        <td><span class="text-custom-body">1</span></td>
                                                        <td><span class="text-custom-body">$249.00</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img class="rounded-md" src="<?= base_url('assets/'); ?>img/product/product-5.jpg" width="40" height="40" alt="Avatar">
                                                                <div class="ms-3">
                                                                    <h4 class="h6 mb-0 text-custom-body">Product 5</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="text-custom-body">$75.25</span></td>
                                                        <td><span class="text-custom-body">4</span></td>
                                                        <td><span class="text-custom-body">$301.00</span></td>
                                                    </tr>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-end fw-medium border-0 pb-1 pt-4">Subtotal:</td>
                                                        <td class="fw-medium border-0 pb-1 pt-4">
                                                            <!-- subtoal -->
                                                            $828.48
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-end fw-medium border-0 py-1">Discount:</td>
                                                        <td class="fw-medium border-0 py-1">
                                                            <!-- discount -->
                                                            $120.00
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-end fw-medium border-0 py-1">Tax:</td>
                                                        <td class="fw-medium border-0 py-1">
                                                            <!-- tax -->
                                                            5%
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-end fw-medium border-0 py-1">Total:</td>
                                                        <td class="fw-medium border-0 py-1">
                                                            <!-- total -->
                                                            $708.48
                                                        </td>
                                                    </tr>
                                                </tfoot>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="pure-card rounded-custom card-bg shadow-custom mb-5">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            Track Order
                                        </h3>
                                    </div>
                                    <div class="pure-card-body p-7 pt-0">
                                        <ul class="timeline mb-0">
                                            <li class="timeline-item border-success">
                                                <span class="timeline-point timeline-point-success"></span>
                                                <div class="timeline-content">
                                                    <div class="timeline-header mb-3">
                                                        <h4 class="mb-0 timeline-title">Order Placed</h4>
                                                        <small class="text-body-secondary">
                                                            2 days ago
                                                        </small>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p class="mb-2">Your order has been placed successfully. You will receive a confirmation email shortly.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item border-success">
                                                <span class="timeline-point timeline-point-success"></span>
                                                <div class="timeline-content">
                                                    <div class="timeline-header mb-3">
                                                        <h4 class="mb-0 timeline-title">
                                                            Payment Successful
                                                        </h4>
                                                        <small class="text-body-secondary">
                                                            2 days ago
                                                        </small>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p class="mb-2">Your payment has been processed successfully. You will receive a confirmation email shortly.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item border-success">
                                                <span class="timeline-point timeline-point-success"></span>
                                                <div class="timeline-content">
                                                    <div class="timeline-header mb-3">
                                                        <h4 class="mb-0 timeline-title">
                                                            Order Shipped
                                                        </h4>
                                                        <small class="text-body-secondary">
                                                            1 day ago
                                                        </small>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p class="mb-2">Your order has been shipped. You will receive a confirmation email shortly.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item border-secondary border-dashed">
                                                <span class="timeline-point timeline-point-success"></span>
                                                <div class="timeline-content">
                                                    <div class="timeline-header mb-3">
                                                        <h4 class="mb-0 timeline-title">
                                                            Out for Delivery
                                                        </h4>
                                                        <small class="text-body-secondary">
                                                            3 Hours ago
                                                        </small>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p class="mb-2">Your order is out for delivery.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="timeline-item">
                                                <span class="timeline-point timeline-point-warning"></span>
                                                <div class="timeline-content">
                                                    <div class="timeline-header mb-3">
                                                        <h4 class="mb-0 timeline-title">
                                                            Waiting for Delivery
                                                        </h4>
                                                        <small class="text-body-secondary">
                                                            1 Hour ago
                                                        </small>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p class="mb-2">Your order will be delivered shortly.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="pure-card rounded-custom card-bg shadow-custom mb-5">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-3 py-5">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            Customer Details
                                        </h3>
                                        <div class="pure-card-tools">
                                            <button class="btn btn-sm btn-label-primary">Edit</button>
                                        </div>
                                    </div>
                                    <div class="pure-card-body p-7 pt-0">
                                        <div class="d-flex justify-content-start align-items-center mb-6 gap-3">
                                            <div class="avatar avatar-md">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/01.jpg" alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-body text-decoration-none">
                                                    <h4 class="h6 mb-0">Skly Herd</h4>
                                                </a>
                                                <span class="text-custom-secondary">Orders: 5</span>
                                            </div>
                                        </div>
                                        <div class="mb-4 d-flex flex-column gap-1">
                                            <p class="mb-0">Address: 123 Main Street, City, Country</p>
                                            <p class="mb-0">Email: <a href="mailto:test@example.com" class="text-hover-underline">test@example.com</a></p>
                                            <p class="mb-0">Phone: <a href="tel:+1234567890" class="text-hover-underline">+1234567890</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="pure-card rounded-custom card-bg shadow-custom mb-5">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-3 py-5">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            Shipping Address
                                        </h3>
                                        <div class="pure-card-tools">
                                            <button class="btn btn-sm btn-label-primary">Edit</button>
                                        </div>
                                    </div>
                                    <div class="pure-card-body p-7 pt-0">
                                        <p class="mb-0">
                                            880 N St #301<br>
                                            Anchorage, Alaska 99501<br>
                                            United States
                                        </p>
                                    </div>
                                </div>
                                <div class="pure-card rounded-custom card-bg shadow-custom mb-5">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-3 py-5">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            Billing Address
                                        </h3>
                                        <div class="pure-card-tools">
                                            <button class="btn btn-sm btn-label-primary">Edit</button>
                                        </div>
                                    </div>
                                    <div class="pure-card-body p-7 pt-0">
                                        <p class="mb-7">
                                            880 N St #301<br>
                                            Anchorage, Alaska 99501<br>
                                            United States
                                        </p>

                                        <h3 class="pure-card-title d-flex align-items-center gap-2 mb-2">
                                            Payment Details
                                        </h3>
                                        <div class="mb-4">
                                            <p class="mb-0"><span class="text-custom-black fw-medium">Card Number:</span> **** **** **** 1234</p>
                                            <p class="mb-0"><span class="text-custom-black fw-medium">Expiry Date:</span> 12/25</p>
                                            <p class="mb-0"><span class="text-custom-black fw-medium">CVV:</span> ***</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>