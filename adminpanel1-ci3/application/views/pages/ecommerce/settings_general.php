<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">General Settings</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">General Settings</li>
                                </ol>
                            </nav>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
                        <div class="row gy-6">
                            <div class="col-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.7803 5.62031L18.312 4.80764C17.9579 4.19303 17.7808 3.88573 17.4795 3.76319C17.1782 3.64065 16.8375 3.73734 16.156 3.93073L14.9983 4.2568C14.5633 4.35713 14.1068 4.30022 13.7095 4.0961L13.3899 3.91169C13.0492 3.69351 12.7872 3.3718 12.6422 2.99365L12.3253 2.04741C12.117 1.42124 12.0129 1.10815 11.7649 0.929077C11.5169 0.75 11.1876 0.75 10.5288 0.75H9.4712C8.81245 0.75 8.48307 0.75 8.2351 0.929077C7.98713 1.10815 7.88298 1.42124 7.67466 2.04741L7.35783 2.99365C7.21279 3.3718 6.95076 3.69351 6.61009 3.91169L6.29049 4.0961C5.89321 4.30022 5.43674 4.35713 5.00165 4.2568L3.84399 3.93073C3.1625 3.73734 2.82175 3.64065 2.52046 3.76319C2.21918 3.88573 2.0421 4.19303 1.68795 4.80764L1.21968 5.62031C0.887712 6.19642 0.721731 6.48447 0.753944 6.79111C0.786159 7.09776 1.00836 7.34487 1.45277 7.83909L2.43094 8.93268C2.67001 9.23534 2.83974 9.7628 2.83974 10.237C2.83974 10.7115 2.67007 11.2388 2.43096 11.5415L1.45277 12.6351C1.00837 13.1294 0.786161 13.3765 0.753946 13.6831C0.721731 13.9898 0.887716 14.2778 1.21967 14.8539L1.21968 14.8539L1.68794 15.6666C2.04208 16.2812 2.21917 16.5885 2.52046 16.711C2.82176 16.8336 3.16251 16.7369 3.84401 16.5435L5.00161 16.2174C5.43678 16.117 5.89333 16.174 6.29066 16.3782L6.61021 16.5626C6.95081 16.7808 7.21279 17.1025 7.3578 17.4806L7.67466 18.4269C7.88298 19.0531 7.98713 19.3662 8.2351 19.5452C8.48307 19.7243 8.81245 19.7243 9.4712 19.7243H10.5288C11.1876 19.7243 11.5169 19.7243 11.7649 19.5452C12.0129 19.3662 12.117 19.0531 12.3253 18.4269L12.6422 17.4806C12.7872 17.1025 13.0492 16.7808 13.3898 16.5626L13.7093 16.3782C14.1067 16.174 14.5632 16.117 14.9984 16.2174L16.156 16.5435C16.8375 16.7369 17.1782 16.8336 17.4795 16.711C17.7808 16.5885 17.9579 16.2812 18.3121 15.6666L18.7803 14.8539C19.1123 14.2778 19.2783 13.9898 19.2461 13.6831C19.2138 13.3765 18.9916 13.1294 18.5472 12.6351L17.569 11.5415C17.3299 11.2388 17.1603 10.7115 17.1603 10.237C17.1603 9.7628 17.33 9.23534 17.5691 8.93268L18.5472 7.83909C18.9916 7.34487 19.2138 7.09776 19.2461 6.79111C19.2783 6.48447 19.1123 6.19642 18.7803 5.62031Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M13.2797 10.2297C13.2797 12.0635 11.793 13.5502 9.95918 13.5502C8.12531 13.5502 6.63867 12.0635 6.63867 10.2297C6.63867 8.39582 8.12531 6.90918 9.95918 6.90918C11.793 6.90918 13.2797 8.39582 13.2797 10.2297Z" stroke="currentColor" stroke-width="1.5" />
                                                </svg>
                                            </span>
                                            General Settings
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="row gy-6">
                                            <div class="col-md-6">
                                                <label for="storeName" class="form-label">Store Name</label>
                                                <input type="text" class="form-control" id="storeName" placeholder="Enter store name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="storeEmail" class="form-label">Store Email</label>
                                                <input type="email" class="form-control" id="storeEmail" placeholder="Enter store email">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="storePhone" class="form-label">Store Phone</label>
                                                <input type="tel" class="form-control" id="storePhone" placeholder="Enter store phone number">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="storeAddress" class="form-label">Store Address</label>
                                                <input type="text" class="form-control" id="storeAddress" placeholder="Enter store address">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timezone" class="form-label">Timezone</label>
                                                <select class="form-select" id="timezone">
                                                    <option selected>Select timezone</option>
                                                    <option value="UTC-12">UTC-12:00</option>
                                                    <option value="UTC-11">UTC-11:00</option>
                                                    <option value="UTC-10">UTC-10:00</option>
                                                    <option value="UTC-9">UTC-09:00</option>
                                                    <option value="UTC-8">UTC-08:00</option>
                                                    <option value="UTC-7">UTC-07:00</option>
                                                    <option value="UTC-6">UTC-06:00</option>
                                                    <option value="UTC-5">UTC-05:00</option>
                                                    <option value="UTC-4">UTC-04:00</option>
                                                    <option value="UTC-3">UTC-03:00</option>
                                                    <option value="UTC-2">UTC-02:00</option>
                                                    <option value="UTC-1">UTC-01:00</option>
                                                    <option value="UTC+0">UTC+00:00</option>
                                                    <option value="UTC+1">UTC+01:00</option>
                                                    <option value="UTC+2">UTC+02:00</option>
                                                    <option value="UTC+3">UTC+03:00</option>
                                                    <option value="UTC+4">UTC+04:00</option>
                                                    <option value="UTC+5">UTC+05:00</option>
                                                    <option value="UTC+6">UTC+06:00</option>
                                                    <option value="UTC+7">UTC+07:00</option>
                                                    <option value="UTC+8">UTC+08:00</option>
                                                    <option value="UTC+9">UTC+09:00</option>
                                                    <option value="UTC+10">UTC+10:00</option>
                                                    <option value="UTC+11">UTC+11:00</option>
                                                    <option value="UTC+12">UTC+12:00</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dateFormat" class="form-label">Date Format</label>
                                                <select class="form-select" id="dateFormat">
                                                    <option value="">Select date format</option>
                                                    <option value="YYYY-MM-DD">YYYY-MM-DD (2025)</option>
                                                    <option value="DD-MM-YYYY">DD-MM-YYYY (25-12-2025)</option>
                                                    <option value="MM-DD-YYYY">MM-DD-YYYY (12-25-2025)</option>
                                                    <option value="DD/MM/YYYY">DD/MM/YYYY (25/12/2025)</option>
                                                    <option value="MM/DD/YYYY">MM/DD/YYYY (12/25/2025)</option>
                                                    <option value="DD MMM YYYY">DD MMM YYYY (25 Dec 2025)</option>
                                                    <option selected value="MMM DD, YYYY">MMM DD, YYYY (Dec 25, 2025)</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- enable guest checkout -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="enableGuestCheckout" checked>
                                                    <label class="form-check-label" for="enableGuestCheckout">
                                                        Enable Guest Checkout
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20.75 10.75C20.75 16.2728 16.2728 20.75 10.75 20.75C5.22715 20.75 0.75 16.2728 0.75 10.75C0.75 5.22715 5.22715 0.75 10.75 0.75C16.2728 0.75 20.75 5.22715 20.75 10.75Z" stroke="currentColor" stroke-width="1.5" />
                                                    <path d="M12.75 8.87779C12.75 9.292 13.0858 9.62779 13.5 9.62779C13.9142 9.62779 14.25 9.292 14.25 8.87779H13.5H12.75ZM8.5 12.6226C8.5 12.2084 8.16421 11.8726 7.75 11.8726C7.33579 11.8726 7 12.2084 7 12.6226H7.75H8.5ZM11.5 5.75C11.5 5.33579 11.1642 5 10.75 5C10.3358 5 10 5.33579 10 5.75L10.75 5.75L11.5 5.75ZM10 15.75C10 16.1642 10.3358 16.5 10.75 16.5C11.1642 16.5 11.5 16.1642 11.5 15.75H10.75H10ZM10.75 10.6062V9.85618C9.79782 9.85618 9.29306 9.7043 9.04223 9.53638C8.85564 9.41146 8.75 9.2409 8.75 8.87779H8H7.25C7.25 9.62834 7.51936 10.322 8.20777 10.7828C8.83194 11.2007 9.70218 11.3562 10.75 11.3562V10.6062ZM8 8.87779H8.75C8.75 8.61732 8.89242 8.31819 9.24895 8.05676C9.60504 7.79566 10.1333 7.61133 10.75 7.61133V6.86133V6.11133C9.84792 6.11133 9.00118 6.3784 8.36196 6.84711C7.72319 7.31549 7.25 8.0246 7.25 8.87779H8ZM10.75 6.86133V7.61133C11.3667 7.61133 11.895 7.79566 12.2511 8.05676C12.6076 8.31819 12.75 8.61732 12.75 8.87779H13.5H14.25C14.25 8.02459 13.7768 7.31549 13.138 6.84711C12.4988 6.3784 11.6521 6.11133 10.75 6.11133V6.86133ZM13.75 12.6226H13C13 13.0584 12.8211 13.3275 12.4869 13.527C12.1072 13.7537 11.5108 13.8891 10.75 13.8891V14.6391V15.3891C11.646 15.3891 12.5497 15.2365 13.2557 14.815C14.0073 14.3663 14.5 13.6272 14.5 12.6226H13.75ZM10.75 14.6391V13.8891C10.0502 13.8891 9.45037 13.6971 9.04707 13.426C8.63907 13.1518 8.5 12.8536 8.5 12.6226H7.75H7C7 13.5054 7.53251 14.2154 8.21029 14.671C8.89277 15.1297 9.79291 15.3891 10.75 15.3891V14.6391ZM10.75 10.6062V11.3562C11.7082 11.3562 12.2779 11.5001 12.5921 11.7037C12.838 11.8631 13 12.104 13 12.6226H13.75H14.5C14.5 11.701 14.162 10.9337 13.4079 10.4449C12.7221 10.0004 11.7918 9.85618 10.75 9.85618V10.6062ZM10.75 6.86133L11.5 6.86133L11.5 5.75L10.75 5.75L10 5.75L10 6.86133L10.75 6.86133ZM10.75 14.6391H10V15.75H10.75H11.5V14.6391H10.75Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Currency Settings
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="row gy-6">
                                            <div class="col-md-6">
                                                <label for="storeName" class="form-label">Default Currency</label>
                                                <select class="form-select" id="defaultCurrency">
                                                    <option value="">Select currency</option>
                                                    <option value="USD" selected>USD - US Dollar</option>
                                                    <option value="EUR">EUR - Euro</option>
                                                    <option value="GBP">GBP - British Pound</option>
                                                    <option value="JPY">JPY - Japanese Yen</option>
                                                    <option value="AUD">AUD - Australian Dollar</option>
                                                    <option value="CAD">CAD - Canadian Dollar</option>
                                                    <option value="CHF">CHF - Swiss Franc</option>
                                                    <option value="CNY">CNY - Chinese Yuan</option>
                                                    <option value="INR">INR - Indian Rupee</option>
                                                    <option value="BRL">BRL - Brazilian Real</option>
                                                    <option value="ZAR">ZAR - South African Rand</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="currencyPosition" class="form-label">Currency Position</label>
                                                <select class="form-select" id="currencyPosition">
                                                    <option value="left" selected>Left ( $100.00 )</option>
                                                    <option value="right">Right ( 100.00$ )</option>
                                                    <option value="left_space">Left with space ( $ 100.00 )</option>
                                                    <option value="right_space">Right with space ( 100.00 $ )</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="thousandSeparator" class="form-label">Thousand Separator</label>
                                                <input type="text" class="form-control" id="thousandSeparator" placeholder="Enter thousand separator" value=",">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>