<div class="app-content-wrapper py-20 pb-13">
                <div class="container ">
                    <div class="page-header pb-7 d-flex justify-content-between align-items-center gap-6 flex-wrap">
                        <div class="">
                            <h2 class="fw-semibold fs-7">Add New Course</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New Course</li>
                                </ol>
                            </nav>
                        </div>
                    </div> <!-- breadcrumb end -->

                    <div class="page-content">
                        <div class="pure-card rounded-custom px-8 py-5 card-bg shadow-custom d-md-flex align-items-center gap-6 mb-6">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-basic-tab" data-bs-toggle="pill" data-bs-target="#pills-basic" type="button" role="tab" aria-controls="pills-basic" aria-selected="true">Basic</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-curriculum-tab" data-bs-toggle="pill" data-bs-target="#pills-curriculum" type="button" role="tab" aria-controls="pills-curriculum" aria-selected="false">Curriculum</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-additional-tab" data-bs-toggle="pill" data-bs-target="#pills-additional" type="button" role="tab" aria-controls="pills-additional" aria-selected="false">Additional</button>
                                </li>
                            </ul>
                            <div class="d-flex flex-wrap justify-content-md-end gap-4 mt-4 mt-md-0 ms-auto">
                                <button type="button" class="btn btn-outline-secondary-custom">Save Draft</button>
                                <button type="button" class="btn btn-primary ">Publish Now</button>
                            </div>
                        </div>



                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab" tabindex="0">
                                <div class="row gy-6">
                                    <div class="col-lg-8">
                                        <div class="pure-card rounded-custom card-bg shadow-custom mb-6">
                                            <div class="pure-card-header">
                                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                                    <span class="text-primary d-flex align-items-center">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                            <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    Basic Information
                                                </h3>
                                            </div>
                                            <div class="pure-card-body">
                                                <div class="row row-cols-1 gy-5">
                                                    <div class="col">
                                                        <label for="title" class="form-label">Title <span class="text-danger fw-bold">*</span></label>
                                                        <input type="text" class="form-control" id="title" placeholder="Enter course title">
                                                    </div>
                                                    <div class="col">
                                                        <label for="course-url" class="form-label">Permalink</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="basic-addon3">https://example.com/course/</span>
                                                            <input type="text" class="form-control" id="course-url" aria-describedby="basic-addon3" placeholder="enter-course-url">
                                                        </div>
                                                        <small class="form-hint mt-n2 form-text text-muted">Preview: <a href="#" class="text-decoration-none text-hover-underline">https://example.com/course/enter-course-url</a> </small>
                                                    </div>
                                                    <div class="col">
                                                        <label for="short-description" class="form-label">Short Description <span class="text-danger fw-bold">*</span></label>
                                                        <textarea class="form-control" id="short-description" rows="5" placeholder="Enter short description"></textarea>
                                                    </div>
                                                    <div class="col tinymce-height-300">
                                                        <label class="form-label">Description <span class="text-danger fw-bold">*</span></label>
                                                        <div>
                                                            <div id="toolbar">
                                                                <span class="ql-formats">
                                                                    <select class="ql-header">
                                                                        <option value="1">Heading</option>
                                                                        <option value="2">Subheading</option>
                                                                        <option selected>Normal</option>
                                                                    </select>
                                                                    <select class="ql-font">
                                                                        <option selected>Sans Serif</option>
                                                                        <option value="serif">Serif</option>
                                                                        <option value="monospace">Monospace</option>
                                                                    </select>
                                                                </span>
                                                                <span class="ql-formats">
                                                                    <button class="ql-bold"></button>
                                                                    <button class="ql-italic"></button>
                                                                    <button class="ql-underline"></button>
                                                                    <button class="ql-strike"></button>
                                                                </span>
                                                                <span class="ql-formats">
                                                                    <select class="ql-color"></select>
                                                                    <select class="ql-background"></select>
                                                                </span>
                                                                <span class="ql-formats">
                                                                    <button class="ql-list" value="ordered"></button>
                                                                    <button class="ql-list" value="bullet"></button>
                                                                    <select class="ql-align">
                                                                        <option selected>select</option>
                                                                        <option value="center">center</option>
                                                                        <option value="right">right</option>
                                                                        <option value="justify">justify</option>
                                                                    </select>
                                                                </span>
                                                                <span class="ql-formats">
                                                                    <button class="ql-clean"></button>
                                                                </span>
                                                            </div>
                                                            <div id="editor"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pure-card rounded-custom card-bg shadow-custom mb-6">
                                            <div class="pure-card-header">
                                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                                    <span class="text-primary d-flex align-items-center">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                            <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    Course Setting
                                                </h3>
                                            </div>
                                            <div class="pure-card-body">
                                                <div class="product-price-others-tab">
                                                    <div class="d-md-flex">
                                                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <button class="nav-link active" id="v-pills-general-tab" data-bs-toggle="pill" data-bs-target="#v-pills-general" type="button" role="tab" aria-controls="v-pills-general" aria-selected="true">
                                                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7494 5.64275L14.2595 4.79261C13.845 4.07327 12.9265 3.82512 12.2062 4.23787C11.8633 4.43986 11.4542 4.49716 11.069 4.39715C10.6838 4.29714 10.3542 4.04802 10.1529 3.70473C10.0234 3.48653 9.95382 3.238 9.95118 2.98428C9.96286 2.57749 9.8094 2.1833 9.52574 1.8915C9.24208 1.5997 8.85239 1.43514 8.44543 1.4353H7.45841C7.05972 1.4353 6.67747 1.59417 6.39623 1.87676C6.11499 2.15935 5.95795 2.54237 5.95987 2.94105C5.94805 3.7642 5.27736 4.42527 4.45412 4.42518C4.2004 4.42255 3.95187 4.35296 3.73367 4.22346C3.01334 3.81071 2.09484 4.05886 1.68038 4.77821L1.15445 5.64275C0.740488 6.36119 0.985266 7.27911 1.70199 7.69604C2.16788 7.96502 2.45488 8.46211 2.45488 9.00006C2.45488 9.53802 2.16788 10.0351 1.70199 10.3041C0.986177 10.7182 0.741131 11.6339 1.15445 12.3502L1.65156 13.2075C1.84576 13.5579 2.17158 13.8165 2.55693 13.926C2.94229 14.0355 3.3554 13.987 3.70485 13.7911C4.04839 13.5906 4.45776 13.5357 4.84198 13.6385C5.22621 13.7413 5.55344 13.9934 5.75094 14.3386C5.88044 14.5568 5.95003 14.8053 5.95267 15.0591C5.95267 15.8907 6.62681 16.5648 7.45841 16.5648H8.44543C9.27423 16.5648 9.94722 15.8951 9.95118 15.0663C9.94925 14.6663 10.1073 14.2822 10.3901 13.9994C10.6729 13.7166 11.057 13.5586 11.4569 13.5605C11.71 13.5673 11.9576 13.6366 12.1774 13.7623C12.8958 14.1762 13.8137 13.9314 14.2307 13.2147L14.7494 12.3502C14.9502 12.0055 15.0053 11.5951 14.9025 11.2097C14.7998 10.8243 14.5476 10.4958 14.2019 10.2969C13.8561 10.098 13.604 9.76946 13.5012 9.38407C13.3984 8.99868 13.4535 8.58822 13.6543 8.24359C13.7849 8.01562 13.9739 7.82661 14.2019 7.69604C14.9143 7.27934 15.1585 6.36678 14.7494 5.64995V5.64275Z" stroke="#5F4AFE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M7.95772 11.075C9.10366 11.075 10.0326 10.146 10.0326 9.00008C10.0326 7.85414 9.10366 6.92517 7.95772 6.92517C6.81178 6.92517 5.88281 7.85414 5.88281 9.00008C5.88281 10.146 6.81178 11.075 7.95772 11.075Z" stroke="#5F4AFE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                General
                                                            </button>
                                                            <button class="nav-link" id="v-pills-level-tab" data-bs-toggle="pill" data-bs-target="#v-pills-level" type="button" role="tab" aria-controls="v-pills-level" aria-selected="false">
                                                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M14.9531 10.3154V14.2539H0.953125V10.3154C0.953125 6.47262 4.06247 3.36328 7.90529 3.36328H8.00096C11.8438 3.36328 14.9531 6.47262 14.9531 10.3154Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.4" d="M7.96094 1.02734V3.36333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.4" d="M10.8591 14.2539C10.7555 15.7767 9.48781 16.9726 7.94908 16.9726C6.41036 16.9726 5.14271 15.7767 5.03906 14.2539H10.8591Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                Level
                                                            </button>
                                                            <button class="nav-link" id="v-pills-language-tab" data-bs-toggle="pill" data-bs-target="#v-pills-language" type="button" role="tab" aria-controls="v-pills-language" aria-selected="false">
                                                                <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle opacity="0.4" cx="12.2109" cy="12.1001" r="1.5" stroke="currentColor" stroke-width="1.5" />
                                                                    <circle opacity="0.4" cx="4.71094" cy="12.1001" r="1.5" stroke="currentColor" stroke-width="1.5" />
                                                                    <path opacity="0.4" d="M3.20312 12.0794C2.38058 12.0384 1.86745 11.9161 1.5023 11.5509C1.13715 11.1858 1.01479 10.6726 0.973788 9.8501M6.20312 12.1001H10.7031M13.7031 12.0794C14.5257 12.0384 15.0388 11.9161 15.404 11.5509C15.9531 11.0017 15.9531 10.1179 15.9531 8.3501V6.8501H12.4281C11.8697 6.8501 11.5905 6.8501 11.3646 6.77668C10.9079 6.62831 10.5499 6.27028 10.4015 5.81362C10.3281 5.58767 10.3281 5.30848 10.3281 4.7501C10.3281 3.91252 10.3281 3.49373 10.218 3.15481C9.99544 2.46982 9.4584 1.93279 8.77341 1.71022C8.43449 1.6001 8.0157 1.6001 7.17813 1.6001H0.953125" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M0.953125 4.6001H5.45312" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M0.953125 6.85022H3.95312" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path opacity="0.4" d="M10.3281 3.10022H11.694C12.7855 3.10022 13.3313 3.10022 13.7754 3.3655C14.2196 3.63078 14.4783 4.1113 14.9958 5.07235L15.9531 6.85022" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                Language
                                                            </button>
                                                            <button class="nav-link" id="v-pills-enrollment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-enrollment" type="button" role="tab" aria-controls="v-pills-enrollment" aria-selected="false">
                                                                <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.4" d="M15.2121 10.9172L10.4172 15.7121C9.36668 16.7626 7.64083 16.7626 6.5828 15.7121L1.78789 10.9172C0.737369 9.86668 0.737369 8.14083 1.78789 7.0828L6.5828 2.28789C7.63332 1.23737 9.35917 1.23737 10.4172 2.28789L15.2121 7.0828C16.2626 8.14083 16.2626 9.86668 15.2121 10.9172Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M4.1875 4.68896L12.8168 13.3183" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M12.8168 4.68896L4.1875 13.3183" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                Enrollment
                                                            </button>
                                                        </div>
                                                        <div class="tab-content px-4 py-6 pe-4 flex-grow-1" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab" tabindex="0">
                                                                <div class="">
                                                                    <div class="mb-5 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                                                        <label class="form-check-label" for="switchCheckChecked">
                                                                            Public Course
                                                                            <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Make this course public. No enrollment required.">
                                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15Z" stroke="#939397" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                    <path d="M8 5.19995V7.99995" stroke="#939397" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                    <path d="M8 10.8H8.007" stroke="#939397" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                </svg>
                                                                            </span>
                                                                        </label>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" checked>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-5 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                                                        <label class="form-check-label" for="hasCertificate">
                                                                            Has Certificate
                                                                            <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Enable certificate for this course.">
                                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15Z" stroke="#939397" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                    <path d="M8 5.19995V7.99995" stroke="#939397" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                    <path d="M8 10.8H8.007" stroke="#939397" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                </svg>
                                                                            </span>
                                                                        </label>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="hasCertificate" checked>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <label class="form-label">Total Course Duration</label>
                                                                        <div class="row row-cols-1 row-cols-xl-1 gy-6 row-cols-xxl-2 gx-2">
                                                                            <div class="col">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" value="0">
                                                                                    <span class="input-group-text">hour(s)</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" value="0">
                                                                                    <span class="input-group-text">min(s)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="v-pills-level" role="tabpanel" aria-labelledby="v-pills-level-tab" tabindex="0">
                                                                <div class="">
                                                                    <label class="form-label mb-6">Select Level</label>
                                                                    <div class="d-flex flex-column gap-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="level_beginner">
                                                                            <label class="form-check-label" for="level_beginner">
                                                                                Beginner
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="level_intermediate" checked>
                                                                            <label class="form-check-label" for="level_intermediate">
                                                                                Intermediate
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="level_advanced">
                                                                            <label class="form-check-label" for="level_advanced">
                                                                                Advanced
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="v-pills-language" role="tabpanel" aria-labelledby="v-pills-language-tab" tabindex="0">
                                                                <div class="">
                                                                    <label class="form-label mb-6">Select Language</label>
                                                                    <div class="d-flex flex-column gap-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="language_english">
                                                                            <label class="form-check-label" for="language_english">
                                                                                English
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="language_spanish" checked>
                                                                            <label class="form-check-label" for="language_spanish">
                                                                                Spanish
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="language_french">
                                                                            <label class="form-check-label" for="language_french">
                                                                                French
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="language_german">
                                                                            <label class="form-check-label" for="language_german">
                                                                                German
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="language_bangla">
                                                                            <label class="form-check-label" for="language_bangla">
                                                                                Bangla
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="language_arabic">
                                                                            <label class="form-check-label" for="language_arabic">
                                                                                Arabic
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="language_hindi">
                                                                            <label class="form-check-label" for="language_hindi">
                                                                                Hindi
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="v-pills-enrollment" role="tabpanel" aria-labelledby="v-pills-enrollment-tab" tabindex="0">
                                                                <div class="d-flex flex-column gap-4">
                                                                    <div class="">
                                                                        <label for="enrollment" class="form-label">Maximum Students</label>
                                                                        <input type="number" class="form-control" id="enrollment" placeholder="Enter maximum students">
                                                                    </div>
                                                                    <div class="">
                                                                        <label for="enrollment_deadline" class="form-label">Enrollment Deadline</label>
                                                                        <input type="date" class="form-control" id="enrollment_deadline">
                                                                    </div>
                                                                    <div class="d-flex">
                                                                        <div class="form-check me-1">
                                                                            <input class="form-check-input" type="checkbox" value="" id="pauseEnrollment">
                                                                            <label class="form-check-label" for="pauseEnrollment">
                                                                                Pause Enrollment
                                                                            </label>
                                                                        </div>
                                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pause new enrollments for this course.">
                                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15Z" stroke="#939397" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path d="M8 5.19995V7.99995" stroke="#939397" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                                <path d="M8 10.8H8.007" stroke="#939397" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pure-card rounded-custom card-bg shadow-custom">
                                            <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                                    <span class="text-primary d-flex align-items-center">
                                                        <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4125 15.396C9.48715 15.396 7.92969 13.896 7.92969 12.012C7.92969 10.128 9.48715 8.61597 11.4125 8.61597C13.3379 8.61597 14.8586 10.128 14.8586 12.012C14.8586 13.896 13.3379 15.396 11.4125 15.396Z" fill="currentColor" />
                                                            <path opacity="0.4" d="M22.4762 14.844C22.2432 14.484 21.912 14.124 21.4828 13.896C21.1394 13.728 20.9187 13.452 20.7225 13.128C20.097 12.096 20.4649 10.74 21.5073 10.128C22.7337 9.444 23.1261 7.92 22.4148 6.732L21.5932 5.316C20.8942 4.128 19.3612 3.708 18.1471 4.404C17.068 4.98 15.6822 4.596 15.0567 3.576C14.8605 3.24 14.7502 2.88 14.7747 2.52C14.8115 2.052 14.6643 1.608 14.4436 1.248C13.9898 0.504 13.1682 0 12.2607 0H10.5315C9.63628 0.024 8.81463 0.504 8.36088 1.248C8.12788 1.608 7.99298 2.052 8.0175 2.52C8.04203 2.88 7.93166 3.24 7.73544 3.576C7.11001 4.596 5.72423 4.98 4.65731 4.404C3.43096 3.708 1.91029 4.128 1.199 5.316L0.377351 6.732C-0.321668 7.92 0.0707635 9.444 1.28485 10.128C2.32725 10.74 2.69515 12.096 2.08198 13.128C1.8735 13.452 1.65275 13.728 1.30938 13.896C0.892417 14.124 0.524513 14.484 0.328297 14.844C-0.125452 15.588 -0.100925 16.524 0.352824 17.304L1.199 18.744C1.65275 19.512 2.49893 19.992 3.38191 19.992C3.79886 19.992 4.2894 19.872 4.68183 19.632C4.98842 19.428 5.35633 19.356 5.76102 19.356C6.97511 19.356 7.99298 20.352 8.0175 21.54C8.0175 22.92 9.14574 24 10.5683 24H12.2361C13.6464 24 14.7747 22.92 14.7747 21.54C14.8115 20.352 15.8293 19.356 17.0434 19.356C17.4359 19.356 17.8038 19.428 18.1226 19.632C18.515 19.872 18.9933 19.992 19.4225 19.992C20.2933 19.992 21.1394 19.512 21.5932 18.744L22.4516 17.304C22.8931 16.5 22.9299 15.588 22.4762 14.844Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    SEO Options
                                                </h3>
                                            </div>
                                            <div class="pure-card-body">
                                                <!-- Basic SEO -->
                                                <div class="mb-5">
                                                    <label for="meta-title" class="form-label">Meta Title</label>
                                                    <input type="text" class="form-control" id="meta-title" placeholder="Enter product title for SEO">
                                                </div>

                                                <div class="mb-5">
                                                    <label for="meta-keywords" class="form-label">Meta Keywords</label>
                                                    <textarea class="form-control" id="meta-keywords" rows="4" placeholder="Short keywords for search engines"></textarea>
                                                </div>

                                                <div>
                                                    <label for="meta-description" class="form-label">Meta Description</label>
                                                    <textarea class="form-control" id="meta-description" rows="5" placeholder="Short description for search engines"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="pure-card rounded-custom card-bg shadow-custom mb-6">
                                            <div class="pure-card-header">
                                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                                    <span class="text-primary d-flex align-items-center">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                            <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    Status
                                                </h3>
                                            </div>
                                            <div class="pure-card-body">
                                                <select class="form-select">
                                                    <option value="published" selected>Published</option>
                                                    <option value="draft">Draft</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="archived">Archived</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="pure-card rounded-custom card-bg shadow-custom mb-6">
                                            <div class="pure-card-header">
                                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                                    <span class="text-primary d-flex align-items-center">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                            <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    Featured Image
                                                </h3>
                                            </div>
                                            <div class="pure-card-body">
                                                <div class="pure-img-uploader">
                                                    <div class="pure-img-uploader-thumb">
                                                        <img class=" img-fluid" src="<?= base_url('assets/'); ?>img/course/course-thumb-1.html" alt="">
                                                    </div>
                                                    <input class="d-none" type="file" id="product-thumbnail" accept="image/*">
                                                    <label for="product-thumbnail" class="pure-img-uploader-label btn btn-sm btn-label-primary mt-3">Upload Image</label>
                                                    <button class="btn btn-sm btn-label-danger mt-3 d-none" type="button">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pure-card rounded-custom card-bg shadow-custom mb-6">
                                            <div class="pure-card-header">
                                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                                    <span class="text-primary d-flex align-items-center">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                            <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    Intro Video
                                                </h3>
                                            </div>
                                            <div class="pure-card-body">
                                                <!-- intro video -->
                                                <div class="">
                                                    <label for="video_url" class="form-label">Video URL</label>
                                                    <input type="text" class="form-control" id="video_url" placeholder="Enter video URL" value="www.youtube.com/zEqqW">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pure-card rounded-custom card-bg shadow-custom mb-6">
                                            <div class="pure-card-header">
                                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                                    <span class="text-primary d-flex align-items-center">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                            <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    Pricing
                                                </h3>
                                            </div>
                                            <div class="pure-card-body">
                                                <div class="row row-cols-1 gy-5">
                                                    <div class="col">
                                                        <label for="price" class="form-label">Price ($) <span class="text-danger fw-bold">*</span></label>
                                                        <input type="number" class="form-control" id="price" placeholder="Enter price" value="49">
                                                    </div>
                                                    <div class="col">
                                                        <label for="discounted-price" class="form-label">Discounted Price ($)</label>
                                                        <input type="number" class="form-control" id="discounted-price" placeholder="Enter discounted price" value="39">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pure-card rounded-custom card-bg shadow-custom mb-6">
                                            <div class="pure-card-header">
                                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                                    <span class="text-primary d-flex align-items-center">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                            <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    Category
                                                </h3>
                                            </div>
                                            <div class="pure-card-body">
                                                <div class="row row-cols-1 gy-5 ">
                                                    <div class="course-category-checkbox">
                                                        <div class="d-flex flex-column gap-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="web_design">
                                                                <label class="form-check-label" for="web_design">
                                                                    Web Design
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="uiux" checked>
                                                                <label class="form-check-label" for="uiux">
                                                                    UI/UX Design
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="frontend">
                                                                <label class="form-check-label" for="frontend">
                                                                    Frontend Development
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="backend">
                                                                <label class="form-check-label" for="backend">
                                                                    Backend Development
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="fullstack">
                                                                <label class="form-check-label" for="fullstack">
                                                                    Fullstack Development
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="digital_marketing">
                                                                <label class="form-check-label" for="digital_marketing">
                                                                    Digital Marketing
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="graphic_design">
                                                                <label class="form-check-label" for="graphic_design">
                                                                    Graphic Design
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="photography">
                                                                <label class="form-check-label" for="photography">
                                                                    Photography
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="data_science">
                                                                <label class="form-check-label" for="data_science">
                                                                    Data Science
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="business">
                                                                <label class="form-check-label" for="business">
                                                                    Business & Management
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pure-card rounded-custom card-bg shadow-custom">
                                            <div class="pure-card-header">
                                                <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                                    <span class="text-primary d-flex align-items-center">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                            <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    Tags
                                                </h3>
                                            </div>
                                            <div class="pure-card-body">
                                                <input id="courseTag" class="form-control" name="courseTag" value="Technology, Development, Science">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-curriculum" role="tabpanel" aria-labelledby="pills-curriculum-tab" tabindex="0">
                                <div class="pure-card rounded-custom card-bg shadow-custom mb-6">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center gap-5">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                    <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Curriculum
                                        </h3>
                                        <div class="ms-md-auto">
                                            <button type="button" class="btn btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#topicModal">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                Add Topic
                                            </button>
                                        </div>
                                    </div>
                                    <div class="pure-card-body">

                                        <div class="curriculum-accordion sortable-card">
                                            <!-- Section 1 -->
                                            <div class="curriculum-accordion-item show">
                                                <div class="curriculum-accordion-header">
                                                    <div class="curriculum-accordion-button d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                                        <span class="d-flex align-items-center gap-3">
                                                            <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg> </span>
                                                            Section 1: Introduction to Web Development
                                                        </span>
                                                        <div class="ms-md-auto d-flex align-items-center gap-4">
                                                            <div class="d-flex align-items-center gap-4">
                                                                <button type="button" class="curriculum-accordion-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#topicModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-accordion-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                            <div class="curriculum-accordion-arrow ms-7"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13 1L7 7L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="curriculum-accordion-body">
                                                    <div class="curriculum-topic-item-sortable">
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 1: Overview of Web Technologies
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 2: Setting Up Your Development Environment
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-3 mt-4">
                                                        <button type="button" class="btn btn-sm btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#lessonModal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add Lesson
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#quizModal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add Quiz
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Section 2 -->
                                            <div class="curriculum-accordion-item">
                                                <div class="curriculum-accordion-header">
                                                    <div class="curriculum-accordion-button d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                                        <span class="d-flex align-items-center gap-3">
                                                            <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg> </span>
                                                            Section 2: HTML Fundamentals
                                                        </span>
                                                        <div class="ms-md-auto d-flex align-items-center gap-4">
                                                            <div class="d-flex align-items-center gap-4">
                                                                <button type="button" class="curriculum-accordion-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#topicModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-accordion-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                            <div class="curriculum-accordion-arrow ms-7"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13 1L7 7L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="curriculum-accordion-body">
                                                    <div class="curriculum-topic-item-sortable">
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 1: Understanding HTML Structure
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 2: Working with Links and Images
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 3: Creating Lists and Tables
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-3 mt-4">
                                                        <button type="button" class="btn btn-sm btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#lessonModal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add Lesson
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#quizModal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add Quiz
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Section 3 -->
                                            <div class="curriculum-accordion-item">
                                                <div class="curriculum-accordion-header">
                                                    <div class="curriculum-accordion-button d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                                        <span class="d-flex align-items-center gap-3">
                                                            <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg> </span>
                                                            Section 3: CSS Styling
                                                        </span>
                                                        <div class="ms-md-auto d-flex align-items-center gap-4">
                                                            <div class="d-flex align-items-center gap-4">
                                                                <button type="button" class="curriculum-accordion-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#topicModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-accordion-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                            <div class="curriculum-accordion-arrow ms-7"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13 1L7 7L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="curriculum-accordion-body">
                                                    <div class="curriculum-topic-item-sortable">
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 1: CSS Syntax and Selectors
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 2: Box Model and Layouts
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-3 mt-4">
                                                        <button type="button" class="btn btn-sm btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#lessonModal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add Lesson
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#quizModal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add Quiz
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Section 4 -->
                                            <div class="curriculum-accordion-item">
                                                <div class="curriculum-accordion-header">
                                                    <div class="curriculum-accordion-button d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                                        <span class="d-flex align-items-center gap-3">
                                                            <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg> </span>
                                                            Section 4: JavaScript Basics
                                                        </span>
                                                        <div class="ms-md-auto d-flex align-items-center gap-4">
                                                            <div class="d-flex align-items-center gap-4">
                                                                <button type="button" class="curriculum-accordion-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#topicModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-accordion-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                            <div class="curriculum-accordion-arrow ms-7"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13 1L7 7L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="curriculum-accordion-body">
                                                    <div class="curriculum-topic-item-sortable">
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 1: JavaScript Syntax and Variables
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 2: Functions and Events
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 3: DOM Manipulation
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-3 mt-4">
                                                        <button type="button" class="btn btn-sm btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#lessonModal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add Lesson
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#quizModal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add Quiz
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Section 5 -->
                                            <div class="curriculum-accordion-item">
                                                <div class="curriculum-accordion-header">
                                                    <div class="curriculum-accordion-button d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                                        <span class="d-flex align-items-center gap-3">
                                                            <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg> </span>
                                                            Section 5: Building a Simple Web Project
                                                        </span>
                                                        <div class="ms-md-auto d-flex align-items-center gap-4">
                                                            <div class="d-flex align-items-center gap-4">
                                                                <button type="button" class="curriculum-accordion-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#topicModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-accordion-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                            <div class="curriculum-accordion-arrow ms-7"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13 1L7 7L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="curriculum-accordion-body">
                                                    <div class="curriculum-topic-item-sortable">
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 1: Structuring Your Project
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                        <div class="curriculum-topic-item d-md-flex align-items-center justify-content-between flex-wrap gap-5">
                                                            <span class="curriculum-topic-title d-flex align-items-center gap-3">
                                                                <span class="flex-shrink-1"><svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M1 7.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 1.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M1 13.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg> </span>
                                                                Lesson 2: Adding Interactivity and Styles
                                                            </span>
                                                            <div class="ms-auto d-flex align-items-center mt-4 mt-md-0 gap-4">
                                                                <button type="button" class="curriculum-topic-action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#lessonModal"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.4516 2.31982C9.97322 1.75466 10.234 1.47208 10.5112 1.30725C11.1799 0.909531 12.0034 0.897164 12.6833 1.27463C12.965 1.43106 13.2339 1.70568 13.7715 2.25493C14.3092 2.80418 14.578 3.07881 14.7312 3.36665C15.1007 4.06118 15.0886 4.90235 14.6992 5.58549C14.5379 5.86861 14.2613 6.13504 13.708 6.66791L7.12544 13.008C6.07701 14.0178 5.5528 14.5227 4.89764 14.7786C4.24248 15.0345 3.52224 15.0157 2.08176 14.978L1.88576 14.9729C1.44723 14.9614 1.22797 14.9557 1.10051 14.811C0.973052 14.6664 0.990453 14.443 1.02526 13.9963L1.04415 13.7538C1.14211 12.4965 1.19108 11.8678 1.4366 11.3028C1.68211 10.7377 2.1056 10.2788 2.9526 9.36115L9.4516 2.31982Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M8.69922 2.3999L13.5992 7.2999" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                                                        <path d="M9.39844 15L14.9984 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn copy-btn"><svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 14C8 11.1716 8 9.75736 8.87868 8.87868C9.75736 8 11.1716 8 14 8L15 8C17.8284 8 19.2426 8 20.1213 8.87868C21 9.75736 21 11.1716 21 14V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H14C11.1716 21 9.75736 21 8.87868 20.1213C8 19.2426 8 17.8284 8 15L8 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M15.9999 8C15.9975 5.04291 15.9528 3.51121 15.092 2.46243C14.9258 2.25989 14.7401 2.07418 14.5376 1.90796C13.4312 1 11.7875 1 8.5 1C5.21252 1 3.56878 1 2.46243 1.90796C2.25989 2.07417 2.07418 2.25989 1.90796 2.46243C1 3.56878 1 5.21252 1 8.5C1 11.7875 1 13.4312 1.90796 14.5376C2.07417 14.7401 2.25989 14.9258 2.46243 15.092C3.51121 15.9528 5.04291 15.9975 8 15.9999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg></button>
                                                                <button type="button" class="curriculum-topic-action-btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M12.5508 3.44995L12.117 10.4675C12.0061 12.2605 11.9507 13.1569 11.5013 13.8015C11.2791 14.1201 10.993 14.3891 10.6613 14.5912C9.99026 15 9.09207 15 7.2957 15C5.49696 15 4.59759 15 3.92612 14.5904C3.59414 14.3879 3.30798 14.1185 3.08586 13.7993C2.63659 13.1538 2.5824 12.256 2.47401 10.4606L2.05078 3.44995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M13.6 3.44995H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M10.1371 3.45L9.65925 2.46421C9.34181 1.80938 9.1831 1.48197 8.90931 1.27776C8.84858 1.23247 8.78428 1.19218 8.71703 1.15729C8.41385 1 8.04999 1 7.32228 1C6.57629 1 6.2033 1 5.89509 1.16388C5.82678 1.20021 5.7616 1.24213 5.70022 1.28922C5.42326 1.50169 5.26855 1.84109 4.95913 2.51988L4.53516 3.45" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M5.55078 11.1499L5.55078 6.9499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                        <path d="M9.05078 11.15L9.05078 6.94995" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                                    </svg></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-3 mt-4">
                                                        <button type="button" class="btn btn-sm btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#lessonModal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add Lesson
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-label-primary gap-2" data-bs-toggle="modal" data-bs-target="#quizModal">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 1V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add Quiz
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-additional" role="tabpanel" aria-labelledby="pills-additional-tab" tabindex="0">
                                <div class="pure-card rounded-custom card-bg shadow-custom mb-6">
                                    <div class="pure-card-header d-flex align-items-center gap-5">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                    <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Overview
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="row row-cols-1 gy-6">
                                            <div class="col">
                                                <label for="what_will_i_learn" class="form-label">What will I learn</label>
                                                <textarea id="what_will_i_learn" name="what_will_i_learn" class="form-control" rows="5" placeholder="Define the key takeaways from this course (list one benefit per line)"></textarea>
                                            </div>
                                            <div class="col">
                                                <label for="requirements" class="form-label">Requirements</label>
                                                <textarea id="requirements" name="requirements" class="form-control" rows="5" placeholder="List any requirements or prerequisites for taking this course (list one requirement per line)"></textarea>
                                            </div>
                                            <div class="col">
                                                <label for="target_audience" class="form-label">Target Audience</label>
                                                <textarea id="target_audience" name="target_audience" class="form-control" rows="5" placeholder="List the target audience for this course (list one audience per line)"></textarea>
                                            </div>
                                            <div class="col">
                                                <label for="materials_included" class="form-label">Materials Included</label>
                                                <textarea id="materials_included" name="materials_included" class="form-control" rows="5" placeholder="List the materials included in this course (list one material per line)"></textarea>
                                            </div>
                                            <div class="col">
                                                <label for="requirements_instructions" class="form-label">Requirements/Instructions</label>
                                                <textarea id="requirements_instructions" name="requirements_instructions" class="form-control" rows="5" placeholder="List the requirements or instructions for this course (list one requirement/instruction per line)"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-12">
                                <div class="card card-bg shadow-custom rounded-custom px-8 py-5 d-flex flex-wrap flex-row align-items-center justify-content-between gap-4">
                                    <p class="d-flex align-items-center gap-3 m-0 text-custom-body">
                                        <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 1.6875L5.375 11.3125L1 6.9375" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M21 1.6875L11.375 11.3125L7 6.9375" stroke="currentColor" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Last saved Oct 4, 2024 - 23:32
                                    </p>
                                    <div class="d-flex flex-wrap justify-content-md-end gap-4">
                                        <button type="button" class="btn btn-label-secondary">Discard</button>
                                        <button type="button" class="btn btn-primary">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- topic modal -->
                        <div class="modal fade" id="topicModal" tabindex="-1" role="dialog" aria-labelledby="topicModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="topicModalLabel">Add Topic</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="mb-6">
                                                <label for="topicTitle" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="topicTitle" placeholder="Enter topic title">
                                            </div>
                                            <div class="mb-6">
                                                <label for="topicDescription" class="form-label">Description</label>
                                                <textarea class="form-control" id="topicDescription" rows="3" placeholder="Enter topic description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="d-flex flex-wrap justify-content-end gap-4">
                                            <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary ">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- lesson modal -->
                        <div class="modal fade" id="lessonModal" tabindex="-1" role="dialog" aria-labelledby="lessonModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="lessonModalLabel">Add Lesson</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="mb-6">
                                                <label for="lessonTitle" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="lessonTitle" placeholder="Enter lesson title">
                                            </div>
                                            <div class="mb-6">
                                                <label for="lessonDescription" class="form-label">Description</label>
                                                <textarea class="form-control" id="lessonDescription" rows="3" placeholder="Enter lesson description"></textarea>
                                            </div>

                                            <div class="mb-6">
                                                <label for="lessonType" class="form-label">Lesson Type</label>
                                                <select class="form-select" id="lessonType">
                                                    <option selected>Select lesson type</option>
                                                    <option value="video">Video</option>
                                                    <option value="text">Text</option>
                                                    <option value="quiz">Quiz</option>
                                                </select>
                                            </div>

                                            <div class="mb-6">
                                                <label class="form-label">Video playback time</label>
                                                <div class="row row-cols-3 gx-2">
                                                    <div class="col">
                                                        <input type="number" class="form-control" id="lessonHours" placeholder="HH">
                                                    </div>
                                                    <div class="col">
                                                        <input type="number" class="form-control" id="lessonMinutes" placeholder="MM">
                                                    </div>
                                                    <div class="col">
                                                        <input type="number" class="form-control" id="lessonSeconds" placeholder="SS">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-6">
                                                <label for="lessonVideo" class="form-label">Video URL</label>
                                                <input type="url" class="form-control" id="lessonVideo" placeholder="Enter video URL">
                                            </div>
                                            <div class="mb-6">
                                                <label for="lessonExercise" class="form-label">Exercise File</label>
                                                <input type="file" class="form-control" id="lessonExercise">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="d-flex flex-wrap justify-content-end gap-4">
                                            <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary ">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- delete modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Lesson</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Are you sure you want to delete this lesson? This action cannot be undone.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="d-flex flex-wrap justify-content-end gap-4">
                                            <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary ">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- lesson modal -->
                        <div class="modal fade" id="quizModal" tabindex="-1" role="dialog" aria-labelledby="quizModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="quizModalLabel">Add Quiz</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="mb-6">
                                                <label for="quizTitle" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="quizTitle" placeholder="Enter quiz title">
                                            </div>
                                            <div class="mb-6">
                                                <label for="quizDescription" class="form-label">Summary</label>
                                                <textarea class="form-control" id="quizDescription" rows="3" placeholder="Enter quiz summary"></textarea>
                                            </div>

                                            <div class="mb-6">
                                                <label for="quizType" class="form-label">Quiz Type</label>
                                                <select class="form-select" id="quizType">
                                                    <option selected>Select quiz type</option>
                                                    <option value="multiple-choice">Multiple Choice</option>
                                                    <option value="true-false">True/False</option>
                                                    <option value="short-answer">Short Answer</option>
                                                    <option value="fill-in-the-blank">Fill in the Blank</option>
                                                </select>
                                            </div>
                                            <div class="mb-6">
                                                <label for="quizDuration" class="form-label">Time Limit (minutes)</label>
                                                <input type="number" class="form-control" id="quizDuration" placeholder="Enter time limit in minutes">
                                            </div>

                                            <div class="mb-6">
                                                <label for="quizPassingScore" class="form-label">Passing Score (%)</label>
                                                <input type="number" class="form-control" id="quizPassingScore" placeholder="Enter passing score percentage">
                                            </div>
                                            <div class="mb-6">
                                                <label for="quizAttempts" class="form-label">Number of Attempts Allowed</label>
                                                <input type="number" class="form-control" id="quizAttempts" placeholder="Enter number of attempts">
                                            </div>
                                            <div class="mb-6">
                                                <label for="quizInstructions" class="form-label">Instructions</label>
                                                <textarea class="form-control" id="quizInstructions" rows="3" placeholder="Enter quiz instructions"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="d-flex flex-wrap justify-content-end gap-4">
                                            <button type="button" class="btn btn-outline-secondary-custom" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary ">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>