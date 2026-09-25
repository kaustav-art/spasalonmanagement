<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Payment Methods</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Payment Methods</li>
                                </ol>
                            </nav>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
                        <div class="row gy-6">
                            <div class="col-lg-4">
                                <div class="card shadow-custom rounded-custom">
                                    <div class="card-body">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link text-start active" id="v-pills-stripe-tab" data-bs-toggle="pill" data-bs-target="#v-pills-stripe" type="button" role="tab" aria-controls="v-pills-stripe" aria-selected="true">Stripe</button>
                                            <button class="nav-link text-start" id="v-pills-paypal-tab" data-bs-toggle="pill" data-bs-target="#v-pills-paypal" type="button" role="tab" aria-controls="v-pills-paypal" aria-selected="false">Paypal</button>
                                            <button class="nav-link text-start" id="v-pills-paystack-tab" data-bs-toggle="pill" data-bs-target="#v-pills-paystack" type="button" role="tab" aria-controls="v-pills-paystack" aria-selected="false">Paystack</button>
                                            <button class="nav-link text-start" id="v-pills-razorpay-tab" data-bs-toggle="pill" data-bs-target="#v-pills-razorpay" type="button" role="tab" aria-controls="v-pills-razorpay" aria-selected="false">Razorpay</button>
                                            <button class="nav-link text-start" id="v-pills-bank-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bank" type="button" role="tab" aria-controls="v-pills-bank" aria-selected="false">Bank Transfer</button>
                                            <button class="nav-link text-start" id="v-pills-cod-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cod" type="button" role="tab" aria-controls="v-pills-cod" aria-selected="false">Cash On Delivery</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-custom rounded-custom">
                                    <div class="card-body p-6">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-stripe" role="tabpanel" aria-labelledby="v-pills-stripe-tab" tabindex="0">
                                                <div class="">
                                                    <label for="stripePublicKey" class="form-label">Stripe Image</label>
                                                    <div class="pure-img-uploader mb-6">
                                                        <div class="pure-img-uploader-thumb pure-img-uploader-thumb-md">
                                                            <img class=" img-fluid" src="<?= base_url('assets/'); ?>img/shop/stripe.png" alt="">
                                                        </div>
                                                        <input class="d-none" type="file" id="stripe-thumbnail" accept="image/*">
                                                        <label for="stripe-thumbnail" class="pure-img-uploader-label btn btn-sm btn-label-primary mt-3">Upload Image</label>
                                                        <button class="btn btn-sm btn-label-danger mt-3 d-none" type="button">Remove</button>
                                                    </div>

                                                    <div class="form-group mb-6">
                                                        <label for="stripePublicKey" class="form-label">Stripe Public Key</label>
                                                        <input type="text" class="form-control" id="stripePublicKey" placeholder="Enter your Stripe public key">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="stripeSecretKey" class="form-label">Stripe Secret Key</label>
                                                        <input type="text" class="form-control" id="stripeSecretKey" placeholder="Enter your Stripe secret key">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="stripeWebhookSecret" class="form-label">Stripe Webhook Secret</label>
                                                        <input type="text" class="form-control" id="stripeWebhookSecret" placeholder="Enter your Stripe webhook secret">
                                                    </div>
                                                    <!-- Status -->
                                                    <div class="form-group mb-6">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select">
                                                            <option selected>Enable</option>
                                                            <option value="1">Disable</option>
                                                        </select>
                                                    </div>
                                                    <!-- Save Changes -->
                                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                                </div>
                                            </div>
                                            <!-- Paypal -->
                                            <div class="tab-pane fade" id="v-pills-paypal" role="tabpanel" aria-labelledby="v-pills-paypal-tab" tabindex="0">
                                                <div class="">
                                                    <label class="form-label">Paypal Image</label>
                                                    <div class="pure-img-uploader mb-6">
                                                        <div class="pure-img-uploader-thumb pure-img-uploader-thumb-md">
                                                            <img class=" img-fluid" src="<?= base_url('assets/'); ?>img/shop/paypal.png" alt="">
                                                        </div>
                                                        <input class="d-none" type="file" id="paypal-thumbnail" accept="image/*">
                                                        <label for="paypal-thumbnail" class="pure-img-uploader-label btn btn-sm btn-label-primary mt-3">Upload Image</label>
                                                        <button class="btn btn-sm btn-label-danger mt-3 d-none" type="button">Remove</button>
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="paypalClientId" class="form-label">Paypal Client ID</label>
                                                        <input type="text" class="form-control" id="paypalClientId" placeholder="Enter your Paypal Client ID">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="paypalSecret" class="form-label">Paypal Secret</label>
                                                        <input type="text" class="form-control" id="paypalSecret" placeholder="Enter your Paypal Secret">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label class="form-label">Mode</label>
                                                        <select class="form-select">
                                                            <option selected>Sandbox</option>
                                                            <option value="live">Live</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select">
                                                            <option selected>Enable</option>
                                                            <option value="1">Disable</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                                </div>
                                            </div>

                                            <!-- Paystack -->
                                            <div class="tab-pane fade" id="v-pills-paystack" role="tabpanel" aria-labelledby="v-pills-paystack-tab" tabindex="0">
                                                <div class="">
                                                    <label class="form-label">Paystack Image</label>
                                                    <div class="pure-img-uploader mb-6">
                                                        <div class="pure-img-uploader-thumb pure-img-uploader-thumb-md">
                                                            <img class=" img-fluid" src="<?= base_url('assets/'); ?>img/shop/paystack.png" alt="">
                                                        </div>
                                                        <input class="d-none" type="file" id="paystack-thumbnail" accept="image/*">
                                                        <label for="paystack-thumbnail" class="pure-img-uploader-label btn btn-sm btn-label-primary mt-3">Upload Image</label>
                                                        <button class="btn btn-sm btn-label-danger mt-3 d-none" type="button">Remove</button>
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="paystackPublicKey" class="form-label">Paystack Public Key</label>
                                                        <input type="text" class="form-control" id="paystackPublicKey" placeholder="Enter your Paystack Public Key">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="paystackSecretKey" class="form-label">Paystack Secret Key</label>
                                                        <input type="text" class="form-control" id="paystackSecretKey" placeholder="Enter your Paystack Secret Key">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="paystackMerchantEmail" class="form-label">Merchant Email</label>
                                                        <input type="email" class="form-control" id="paystackMerchantEmail" placeholder="Enter Merchant Email">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select">
                                                            <option selected>Enable</option>
                                                            <option value="1">Disable</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                                </div>
                                            </div>

                                            <!-- Razorpay -->
                                            <div class="tab-pane fade" id="v-pills-razorpay" role="tabpanel" aria-labelledby="v-pills-razorpay-tab" tabindex="0">
                                                <div class="">
                                                    <label class="form-label">Razorpay Image</label>
                                                    <div class="pure-img-uploader mb-6">
                                                        <div class="pure-img-uploader-thumb pure-img-uploader-thumb-md">
                                                            <img class=" img-fluid" src="<?= base_url('assets/'); ?>img/shop/razorpay.png" alt="">
                                                        </div>
                                                        <input class="d-none" type="file" id="razorpay-thumbnail" accept="image/*">
                                                        <label for="razorpay-thumbnail" class="pure-img-uploader-label btn btn-sm btn-label-primary mt-3">Upload Image</label>
                                                        <button class="btn btn-sm btn-label-danger mt-3 d-none" type="button">Remove</button>
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="razorpayKeyId" class="form-label">Razorpay Key ID</label>
                                                        <input type="text" class="form-control" id="razorpayKeyId" placeholder="Enter your Razorpay Key ID">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="razorpayKeySecret" class="form-label">Razorpay Key Secret</label>
                                                        <input type="text" class="form-control" id="razorpayKeySecret" placeholder="Enter your Razorpay Key Secret">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select">
                                                            <option selected>Enable</option>
                                                            <option value="1">Disable</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                                </div>
                                            </div>

                                            <!-- Bank Transfer -->
                                            <div class="tab-pane fade" id="v-pills-bank" role="tabpanel" aria-labelledby="v-pills-bank-tab" tabindex="0">
                                                <div class="">
                                                    <label class="form-label">Bank Transfer Image</label>
                                                    <div class="pure-img-uploader mb-6">
                                                        <div class="pure-img-uploader-thumb pure-img-uploader-thumb-md">
                                                            <img class=" img-fluid" src="<?= base_url('assets/'); ?>img/shop/bank.html" alt="">
                                                        </div>
                                                        <input class="d-none" type="file" id="bank-thumbnail" accept="image/*">
                                                        <label for="bank-thumbnail" class="pure-img-uploader-label btn btn-sm btn-label-primary mt-3">Upload Image</label>
                                                        <button class="btn btn-sm btn-label-danger mt-3 d-none" type="button">Remove</button>
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="bankAccountName" class="form-label">Account Name</label>
                                                        <input type="text" class="form-control" id="bankAccountName" placeholder="Enter Bank Account Name">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="bankAccountNumber" class="form-label">Account Number</label>
                                                        <input type="text" class="form-control" id="bankAccountNumber" placeholder="Enter Bank Account Number">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="bankName" class="form-label">Bank Name</label>
                                                        <input type="text" class="form-control" id="bankName" placeholder="Enter Bank Name">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="bankIFSC" class="form-label">IFSC / SWIFT Code</label>
                                                        <input type="text" class="form-control" id="bankIFSC" placeholder="Enter IFSC / SWIFT Code">
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select">
                                                            <option selected>Enable</option>
                                                            <option value="1">Disable</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                                </div>
                                            </div>

                                            <!-- Cash On Delivery -->
                                            <div class="tab-pane fade" id="v-pills-cod" role="tabpanel" aria-labelledby="v-pills-cod-tab" tabindex="0">
                                                <div class="">
                                                    <label class="form-label">Cash On Delivery Image</label>
                                                    <div class="pure-img-uploader mb-6">
                                                        <div class="pure-img-uploader-thumb pure-img-uploader-thumb-md">
                                                            <img class=" img-fluid" src="<?= base_url('assets/'); ?>img/shop/cod.png" alt="">
                                                        </div>
                                                        <input class="d-none" type="file" id="cod-thumbnail" accept="image/*">
                                                        <label for="cod-thumbnail" class="pure-img-uploader-label btn btn-sm btn-label-primary mt-3">Upload Image</label>
                                                        <button class="btn btn-sm btn-label-danger mt-3 d-none" type="button">Remove</button>
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label for="codInstructions" class="form-label">Instructions</label>
                                                        <textarea class="form-control" id="codInstructions" rows="4" placeholder="Enter instructions for Cash On Delivery"></textarea>
                                                    </div>
                                                    <div class="form-group mb-6">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-select">
                                                            <option selected>Enable</option>
                                                            <option value="1">Disable</option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-primary" type="button">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- page content end -->

                </div>