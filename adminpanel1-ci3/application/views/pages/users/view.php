<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Edit User</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                                </ol>
                            </nav>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
                        <div class="row gy-6">
                            <div class="col-lg-4">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="card-body p-6">
                                        <h3 class="fw-semibold mb-8 h4">User Information</h3>

                                        <div class="">
                                            <div class="avatar avatar-xl rounded-pill mb-5">
                                                <img src="<?= base_url('assets/'); ?>img/avatar/01.jpg" alt="conca">
                                            </div>

                                            <div class="profile-info d-flex flex-column gap-3">
                                                <div class="profile-info-item d-flex align-items-center">
                                                    <span class="profile-info-label">Name: </span>
                                                    <span class="profile-info-content">Joel Becker</span>
                                                </div>
                                                <div class="profile-info-item d-flex align-items-center">
                                                    <span class="profile-info-label">Username: </span>
                                                    <span class="profile-info-content">joel_becker</span>
                                                </div>
                                                <div class="profile-info-item d-flex align-items-center">
                                                    <span class="profile-info-label">Role: </span>
                                                    <span class="profile-info-content">Developer</span>
                                                </div>
                                                <div class="profile-info-item d-flex align-items-center">
                                                    <span class="profile-info-label">Language: </span>
                                                    <span class="profile-info-content">English</span>
                                                </div>
                                                <div class="profile-info-item d-flex align-items-center">
                                                    <span class="profile-info-label">Status: </span>
                                                    <span class="profile-info-content">
                                                        <span class="badge bg-label-success rounded-pill px-2 py-1">Active</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="card-body p-6">
                                        <h3 class="fw-semibold mb-8 h4">Contact Information</h3>


                                        <div class="profile-info">
                                            <div class="row gy-6">
                                                <!-- Home Address -->
                                                <div class="col-md-6">
                                                    <h4 class="h5 text-primary">Home Address</h4>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Street Address: </span>
                                                        <span class="profile-info-content">125 Oakwood Lane</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">City: </span>
                                                        <span class="profile-info-content">Springfield</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">State: </span>
                                                        <span class="profile-info-content">Illinois</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Zip Code: </span>
                                                        <span class="profile-info-content">62704</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Country: </span>
                                                        <span class="profile-info-content">USA</span>
                                                    </div>
                                                </div>

                                                <!-- Office Address -->
                                                <div class="col-md-6">
                                                    <h4 class="h5 text-primary">Office Address</h4>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Street Address: </span>
                                                        <span class="profile-info-content">88 Market Street</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">City: </span>
                                                        <span class="profile-info-content">San Francisco</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">State: </span>
                                                        <span class="profile-info-content">California</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Zip Code: </span>
                                                        <span class="profile-info-content">94103</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Country: </span>
                                                        <span class="profile-info-content">USA</span>
                                                    </div>
                                                </div>

                                                <!-- Permanent Address -->
                                                <div class="col-md-6">
                                                    <h4 class="h5 text-primary">Permanent Address</h4>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Street Address: </span>
                                                        <span class="profile-info-content">7B Kingsland Road</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">City: </span>
                                                        <span class="profile-info-content">London</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">State: </span>
                                                        <span class="profile-info-content">Greater London</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Zip Code: </span>
                                                        <span class="profile-info-content">E2 8AA</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Country: </span>
                                                        <span class="profile-info-content">United Kingdom</span>
                                                    </div>
                                                </div>

                                                <!-- Billing Address -->
                                                <div class="col-md-6">
                                                    <h4 class="h5 text-primary">Billing Address</h4>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Street Address: </span>
                                                        <span class="profile-info-content">2405 Rue Saint-Denis</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">City: </span>
                                                        <span class="profile-info-content">Montreal</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">State: </span>
                                                        <span class="profile-info-content">Quebec</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Zip Code: </span>
                                                        <span class="profile-info-content">H2X 3K9</span>
                                                    </div>
                                                    <div class="profile-info-item d-flex align-items-center">
                                                        <span class="profile-info-label">Country: </span>
                                                        <span class="profile-info-content">Canada</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>