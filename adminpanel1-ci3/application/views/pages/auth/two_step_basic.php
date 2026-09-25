<div class="auth-main">
        <div class="container-xxl">
            <div class="auth-wrapper auth-basic p-5 min-vh-100 d-flex align-items-center justify-content-center">
                <div class="auth-card py-6">
                    <div class="card shadow-xl">
                        <div class="card-body py-9 px-6 px-sm-12">
                            <div class="mb-7">
                                <div class="d-flex align-items-center justify-content-center mb-5">
                                    <img class="app-main-logo logo-black" width="120" src="<?= base_url('assets/'); ?>img/logo/logo.png" alt="Conca">
                                    <img class="app-main-logo logo-white d-none" width="120" src="<?= base_url('assets/'); ?>img/logo/logo-white.png" alt="Conca">
                                </div>
                                <div class="text-center">
                                    <h4 class="mb-2 fw-semibold fs-6">Two Step Verification</h4>
                                    <p>
                                        We have sent a verification code to your email address. Please check your email and enter the code below.
                                    </p>
                                </div>
                            </div>
                            <div class="mb-5">
                                <div class="verification-inputs d-flex gap-2 justify-content-between">
                                    <input type="tel" class="form-control form-code-input text-center" maxlength="1" autofocus>
                                    <input type="tel" class="form-control form-code-input text-center" maxlength="1">
                                    <input type="tel" class="form-control form-code-input text-center" maxlength="1">
                                    <input type="tel" class="form-control form-code-input text-center" maxlength="1">
                                    <input type="tel" class="form-control form-code-input text-center" maxlength="1">
                                    <input type="tel" class="form-control form-code-input text-center" maxlength="1">
                                </div>
                            </div>
                            <div class="mb-5">
                                <button class="btn btn-primary w-100">Verify</button>
                            </div>
                            <p class="text-center">
                                Didn't receive the code?
                                <a href="#" class="text-primary text-decoration-none text-hover-underline">
                                    Resend
                                </a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>