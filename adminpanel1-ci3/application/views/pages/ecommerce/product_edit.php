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
                        <div class="row gy-5 mb-5">
                            <div class="col-md-12 col-lg-8">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                    <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Product Information
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="row gy-5">
                                            <div class="col-md-12">
                                                <label for="title" class="form-label">Product Title</label>
                                                <input type="text" class="form-control" id="title" placeholder="Enter product title">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" class="form-control" id="slug" placeholder="Slug">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="short_description" class="form-label">Short Description</label>
                                                <textarea class="form-control" id="short_description" rows="3" placeholder="Enter product short description"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Description</label>
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
                            </div>
                            <!-- product thumbnail -->
                            <div class="col-md-12 col-lg-4">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4125 15.396C9.48715 15.396 7.92969 13.896 7.92969 12.012C7.92969 10.128 9.48715 8.61597 11.4125 8.61597C13.3379 8.61597 14.8586 10.128 14.8586 12.012C14.8586 13.896 13.3379 15.396 11.4125 15.396Z" fill="currentColor" />
                                                    <path opacity="0.4" d="M22.4762 14.844C22.2432 14.484 21.912 14.124 21.4828 13.896C21.1394 13.728 20.9187 13.452 20.7225 13.128C20.097 12.096 20.4649 10.74 21.5073 10.128C22.7337 9.444 23.1261 7.92 22.4148 6.732L21.5932 5.316C20.8942 4.128 19.3612 3.708 18.1471 4.404C17.068 4.98 15.6822 4.596 15.0567 3.576C14.8605 3.24 14.7502 2.88 14.7747 2.52C14.8115 2.052 14.6643 1.608 14.4436 1.248C13.9898 0.504 13.1682 0 12.2607 0H10.5315C9.63628 0.024 8.81463 0.504 8.36088 1.248C8.12788 1.608 7.99298 2.052 8.0175 2.52C8.04203 2.88 7.93166 3.24 7.73544 3.576C7.11001 4.596 5.72423 4.98 4.65731 4.404C3.43096 3.708 1.91029 4.128 1.199 5.316L0.377351 6.732C-0.321668 7.92 0.0707635 9.444 1.28485 10.128C2.32725 10.74 2.69515 12.096 2.08198 13.128C1.8735 13.452 1.65275 13.728 1.30938 13.896C0.892417 14.124 0.524513 14.484 0.328297 14.844C-0.125452 15.588 -0.100925 16.524 0.352824 17.304L1.199 18.744C1.65275 19.512 2.49893 19.992 3.38191 19.992C3.79886 19.992 4.2894 19.872 4.68183 19.632C4.98842 19.428 5.35633 19.356 5.76102 19.356C6.97511 19.356 7.99298 20.352 8.0175 21.54C8.0175 22.92 9.14574 24 10.5683 24H12.2361C13.6464 24 14.7747 22.92 14.7747 21.54C14.8115 20.352 15.8293 19.356 17.0434 19.356C17.4359 19.356 17.8038 19.428 18.1226 19.632C18.515 19.872 18.9933 19.992 19.4225 19.992C20.2933 19.992 21.1394 19.512 21.5932 18.744L22.4516 17.304C22.8931 16.5 22.9299 15.588 22.4762 14.844Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Product Thumbnail
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="pure-img-uploader">
                                            <div class="pure-img-uploader-thumb">
                                                <img class=" img-fluid" src="<?= base_url('assets/'); ?>img/product/product-1.jpg" alt="">
                                            </div>
                                            <input class="d-none" type="file" id="product-thumbnail" accept="image/*">
                                            <label for="product-thumbnail" class="pure-img-uploader-label btn btn-sm btn-label-primary mt-3">Upload Image</label>
                                            <button class="btn btn-sm btn-label-danger mt-3 d-none" type="button">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product galley -->
                            <div class="col-md-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4125 15.396C9.48715 15.396 7.92969 13.896 7.92969 12.012C7.92969 10.128 9.48715 8.61597 11.4125 8.61597C13.3379 8.61597 14.8586 10.128 14.8586 12.012C14.8586 13.896 13.3379 15.396 11.4125 15.396Z" fill="currentColor" />
                                                    <path opacity="0.4" d="M22.4762 14.844C22.2432 14.484 21.912 14.124 21.4828 13.896C21.1394 13.728 20.9187 13.452 20.7225 13.128C20.097 12.096 20.4649 10.74 21.5073 10.128C22.7337 9.444 23.1261 7.92 22.4148 6.732L21.5932 5.316C20.8942 4.128 19.3612 3.708 18.1471 4.404C17.068 4.98 15.6822 4.596 15.0567 3.576C14.8605 3.24 14.7502 2.88 14.7747 2.52C14.8115 2.052 14.6643 1.608 14.4436 1.248C13.9898 0.504 13.1682 0 12.2607 0H10.5315C9.63628 0.024 8.81463 0.504 8.36088 1.248C8.12788 1.608 7.99298 2.052 8.0175 2.52C8.04203 2.88 7.93166 3.24 7.73544 3.576C7.11001 4.596 5.72423 4.98 4.65731 4.404C3.43096 3.708 1.91029 4.128 1.199 5.316L0.377351 6.732C-0.321668 7.92 0.0707635 9.444 1.28485 10.128C2.32725 10.74 2.69515 12.096 2.08198 13.128C1.8735 13.452 1.65275 13.728 1.30938 13.896C0.892417 14.124 0.524513 14.484 0.328297 14.844C-0.125452 15.588 -0.100925 16.524 0.352824 17.304L1.199 18.744C1.65275 19.512 2.49893 19.992 3.38191 19.992C3.79886 19.992 4.2894 19.872 4.68183 19.632C4.98842 19.428 5.35633 19.356 5.76102 19.356C6.97511 19.356 7.99298 20.352 8.0175 21.54C8.0175 22.92 9.14574 24 10.5683 24H12.2361C13.6464 24 14.7747 22.92 14.7747 21.54C14.8115 20.352 15.8293 19.356 17.0434 19.356C17.4359 19.356 17.8038 19.428 18.1226 19.632C18.515 19.872 18.9933 19.992 19.4225 19.992C20.2933 19.992 21.1394 19.512 21.5932 18.744L22.4516 17.304C22.8931 16.5 22.9299 15.588 22.4762 14.844Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Product Gallery
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <!-- HTML -->
                                        <div class="product-gallery-holder">
                                            <div class="row g-4" id="product-gallery-row">

                                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-gallery-single position-relative" data-existing-id="101">
                                                        <button class="product-gallery-remove-btn" type="button" aria-label="Remove image">
                                                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9 1.98608L1 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 1.98608L9 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                        <img class="img-fluid" src="<?= base_url('assets/'); ?>img/product/product-5.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-gallery-single position-relative" data-existing-id="101">
                                                        <button class="product-gallery-remove-btn" type="button" aria-label="Remove image">
                                                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9 1.98608L1 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 1.98608L9 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                        <img class="img-fluid" src="<?= base_url('assets/'); ?>img/product/product-2.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-gallery-single position-relative" data-existing-id="101">
                                                        <button class="product-gallery-remove-btn" type="button" aria-label="Remove image">
                                                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9 1.98608L1 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 1.98608L9 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                        <img class="img-fluid" src="<?= base_url('assets/'); ?>img/product/product-3.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-gallery-single position-relative" data-existing-id="101">
                                                        <button class="product-gallery-remove-btn" type="button" aria-label="Remove image">
                                                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9 1.98608L1 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1 1.98608L9 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </button>
                                                        <img class="img-fluid" src="<?= base_url('assets/'); ?>img/product/product-4.jpg" alt="">
                                                    </div>
                                                </div>

                                                <!-- Uploader column (always col-lg-3) -->
                                                <div id="product-gallery-uploader-col" class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-gallery-uploader-container d-flex flex-column align-items-center justify-content-center gap-4">
                                                        <input type="file" id="product-gallery-uploader-input" class="d-none" multiple accept="image/*">
                                                        <span>
                                                            <!-- upload svg -->
                                                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M21.5 15.1628V19.6073C21.5 20.1967 21.2659 20.7619 20.8491 21.1786C20.4324 21.5954 19.8671 21.8295 19.2778 21.8295H3.72222C3.13285 21.8295 2.56762 21.5954 2.15087 21.1786C1.73413 20.7619 1.5 20.1967 1.5 19.6073V15.1628" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M17.0486 7.38502L11.4931 1.82947L5.9375 7.38502" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M11.5 1.82947V15.1628" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                        <label for="product-gallery-uploader-input" class="product-gallery-uploader-label">
                                                            <span class="mt-2">Upload Images</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- general setup -->
                            <div class="col-md-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4125 15.396C9.48715 15.396 7.92969 13.896 7.92969 12.012C7.92969 10.128 9.48715 8.61597 11.4125 8.61597C13.3379 8.61597 14.8586 10.128 14.8586 12.012C14.8586 13.896 13.3379 15.396 11.4125 15.396Z" fill="currentColor" />
                                                    <path opacity="0.4" d="M22.4762 14.844C22.2432 14.484 21.912 14.124 21.4828 13.896C21.1394 13.728 20.9187 13.452 20.7225 13.128C20.097 12.096 20.4649 10.74 21.5073 10.128C22.7337 9.444 23.1261 7.92 22.4148 6.732L21.5932 5.316C20.8942 4.128 19.3612 3.708 18.1471 4.404C17.068 4.98 15.6822 4.596 15.0567 3.576C14.8605 3.24 14.7502 2.88 14.7747 2.52C14.8115 2.052 14.6643 1.608 14.4436 1.248C13.9898 0.504 13.1682 0 12.2607 0H10.5315C9.63628 0.024 8.81463 0.504 8.36088 1.248C8.12788 1.608 7.99298 2.052 8.0175 2.52C8.04203 2.88 7.93166 3.24 7.73544 3.576C7.11001 4.596 5.72423 4.98 4.65731 4.404C3.43096 3.708 1.91029 4.128 1.199 5.316L0.377351 6.732C-0.321668 7.92 0.0707635 9.444 1.28485 10.128C2.32725 10.74 2.69515 12.096 2.08198 13.128C1.8735 13.452 1.65275 13.728 1.30938 13.896C0.892417 14.124 0.524513 14.484 0.328297 14.844C-0.125452 15.588 -0.100925 16.524 0.352824 17.304L1.199 18.744C1.65275 19.512 2.49893 19.992 3.38191 19.992C3.79886 19.992 4.2894 19.872 4.68183 19.632C4.98842 19.428 5.35633 19.356 5.76102 19.356C6.97511 19.356 7.99298 20.352 8.0175 21.54C8.0175 22.92 9.14574 24 10.5683 24H12.2361C13.6464 24 14.7747 22.92 14.7747 21.54C14.8115 20.352 15.8293 19.356 17.0434 19.356C17.4359 19.356 17.8038 19.428 18.1226 19.632C18.515 19.872 18.9933 19.992 19.4225 19.992C20.2933 19.992 21.1394 19.512 21.5932 18.744L22.4516 17.304C22.8931 16.5 22.9299 15.588 22.4762 14.844Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            General Setup
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="row gy-5">
                                            <div class="col-md-4">
                                                <label for="product-category" class="form-label">Category</label>
                                                <select class="form-select" id="product-category">
                                                    <option selected>Choose a category</option>
                                                    <option value="1">Electronics</option>
                                                    <option value="2">Fashion</option>
                                                    <option value="3">Home & Garden</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-sub-category" class="form-label">Sub Category</label>
                                                <select class="form-select" id="product-sub-category">
                                                    <option selected>Choose a sub category</option>
                                                    <option value="1">Mobile Phones</option>
                                                    <option value="2">Laptops</option>
                                                    <option value="3">Tablets</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-brand" class="form-label">Brand</label>
                                                <select class="form-select" id="product-brand">
                                                    <option selected>Choose a brand</option>
                                                    <option value="1">Apple</option>
                                                    <option value="2">Samsung</option>
                                                    <option value="3">Sony</option>
                                                    <option value="4">LG</option>
                                                    <option value="5">Dell</option>
                                                    <option value="6">HP</option>
                                                    <option value="7">Lenovo</option>
                                                    <option value="8">Asus</option>
                                                    <option value="9">Microsoft</option>
                                                    <option value="10">Google</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-type" class="form-label">Product Type</label>
                                                <select class="form-select" id="product-type">
                                                    <option value="physical" selected>Physical</option>
                                                    <option value="digital">Digital</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-unit" class="form-label">Unit</label>
                                                <select class="form-select" id="product-unit">
                                                    <option selected>Choose a unit</option>
                                                    <option value="piece">Piece</option>
                                                    <option value="kilogram">Kilogram</option>
                                                    <option value="liter">Liter</option>
                                                    <option value="meter">Meter</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product-sku" class="form-label">SKU</label>
                                                <input type="text" class="form-control" id="product-sku" placeholder="Enter product SKU">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="tags" class="form-label">Search Tags</label>
                                                <input type="text" class="form-control" id="tags" placeholder="Enter product tags">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Variants -->
                            <div class="col-md-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4125 15.396C9.48715 15.396 7.92969 13.896 7.92969 12.012C7.92969 10.128 9.48715 8.61597 11.4125 8.61597C13.3379 8.61597 14.8586 10.128 14.8586 12.012C14.8586 13.896 13.3379 15.396 11.4125 15.396Z" fill="currentColor" />
                                                    <path opacity="0.4" d="M22.4762 14.844C22.2432 14.484 21.912 14.124 21.4828 13.896C21.1394 13.728 20.9187 13.452 20.7225 13.128C20.097 12.096 20.4649 10.74 21.5073 10.128C22.7337 9.444 23.1261 7.92 22.4148 6.732L21.5932 5.316C20.8942 4.128 19.3612 3.708 18.1471 4.404C17.068 4.98 15.6822 4.596 15.0567 3.576C14.8605 3.24 14.7502 2.88 14.7747 2.52C14.8115 2.052 14.6643 1.608 14.4436 1.248C13.9898 0.504 13.1682 0 12.2607 0H10.5315C9.63628 0.024 8.81463 0.504 8.36088 1.248C8.12788 1.608 7.99298 2.052 8.0175 2.52C8.04203 2.88 7.93166 3.24 7.73544 3.576C7.11001 4.596 5.72423 4.98 4.65731 4.404C3.43096 3.708 1.91029 4.128 1.199 5.316L0.377351 6.732C-0.321668 7.92 0.0707635 9.444 1.28485 10.128C2.32725 10.74 2.69515 12.096 2.08198 13.128C1.8735 13.452 1.65275 13.728 1.30938 13.896C0.892417 14.124 0.524513 14.484 0.328297 14.844C-0.125452 15.588 -0.100925 16.524 0.352824 17.304L1.199 18.744C1.65275 19.512 2.49893 19.992 3.38191 19.992C3.79886 19.992 4.2894 19.872 4.68183 19.632C4.98842 19.428 5.35633 19.356 5.76102 19.356C6.97511 19.356 7.99298 20.352 8.0175 21.54C8.0175 22.92 9.14574 24 10.5683 24H12.2361C13.6464 24 14.7747 22.92 14.7747 21.54C14.8115 20.352 15.8293 19.356 17.0434 19.356C17.4359 19.356 17.8038 19.428 18.1226 19.632C18.515 19.872 18.9933 19.992 19.4225 19.992C20.2933 19.992 21.1394 19.512 21.5932 18.744L22.4516 17.304C22.8931 16.5 22.9299 15.588 22.4762 14.844Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Pricing & Others
                                        </h3>

                                        <div class="pure-card-header-actions d-flex align-items-center flex-wrap gap-3 justify-content-sm-end">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="product-downloadable" value="downloadable">
                                                <label class="form-check-label" for="product-downloadable">Downloadable</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="product-virtual" value="virtual">
                                                <label class="form-check-label" for="product-virtual">Virtual</label>
                                            </div>
                                            <div class="">
                                                <select class="form-select" id="product-nature">
                                                    <option value="simple">Simple Product</option>
                                                    <option value="variant">Variant Product</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="product-price-others-tab">
                                            <div class="d-flex flex-wrap flex-md-nowrap gap-4">
                                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <button class="nav-link active" id="v-pills-general-tab" data-bs-toggle="pill" data-bs-target="#v-pills-general" type="button" role="tab" aria-controls="v-pills-general" aria-selected="true">
                                                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7494 5.64275L14.2595 4.79261C13.845 4.07327 12.9265 3.82512 12.2062 4.23787C11.8633 4.43986 11.4542 4.49716 11.069 4.39715C10.6838 4.29714 10.3542 4.04802 10.1529 3.70473C10.0234 3.48653 9.95382 3.238 9.95118 2.98428C9.96286 2.57749 9.8094 2.1833 9.52574 1.8915C9.24208 1.5997 8.85239 1.43514 8.44543 1.4353H7.45841C7.05972 1.4353 6.67747 1.59417 6.39623 1.87676C6.11499 2.15935 5.95795 2.54237 5.95987 2.94105C5.94805 3.7642 5.27736 4.42527 4.45412 4.42518C4.2004 4.42255 3.95187 4.35296 3.73367 4.22346C3.01334 3.81071 2.09484 4.05886 1.68038 4.77821L1.15445 5.64275C0.740488 6.36119 0.985266 7.27911 1.70199 7.69604C2.16788 7.96502 2.45488 8.46211 2.45488 9.00006C2.45488 9.53802 2.16788 10.0351 1.70199 10.3041C0.986177 10.7182 0.741131 11.6339 1.15445 12.3502L1.65156 13.2075C1.84576 13.5579 2.17158 13.8165 2.55693 13.926C2.94229 14.0355 3.3554 13.987 3.70485 13.7911C4.04839 13.5906 4.45776 13.5357 4.84198 13.6385C5.22621 13.7413 5.55344 13.9934 5.75094 14.3386C5.88044 14.5568 5.95003 14.8053 5.95267 15.0591C5.95267 15.8907 6.62681 16.5648 7.45841 16.5648H8.44543C9.27423 16.5648 9.94722 15.8951 9.95118 15.0663C9.94925 14.6663 10.1073 14.2822 10.3901 13.9994C10.6729 13.7166 11.057 13.5586 11.4569 13.5605C11.71 13.5673 11.9576 13.6366 12.1774 13.7623C12.8958 14.1762 13.8137 13.9314 14.2307 13.2147L14.7494 12.3502C14.9502 12.0055 15.0053 11.5951 14.9025 11.2097C14.7998 10.8243 14.5476 10.4958 14.2019 10.2969C13.8561 10.098 13.604 9.76946 13.5012 9.38407C13.3984 8.99868 13.4535 8.58822 13.6543 8.24359C13.7849 8.01562 13.9739 7.82661 14.2019 7.69604C14.9143 7.27934 15.1585 6.36678 14.7494 5.64995V5.64275Z" stroke="#5F4AFE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7.95772 11.075C9.10366 11.075 10.0326 10.146 10.0326 9.00008C10.0326 7.85414 9.10366 6.92517 7.95772 6.92517C6.81178 6.92517 5.88281 7.85414 5.88281 9.00008C5.88281 10.146 6.81178 11.075 7.95772 11.075Z" stroke="#5F4AFE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        General
                                                    </button>
                                                    <button class="nav-link" id="v-pills-inventory-tab" data-bs-toggle="pill" data-bs-target="#v-pills-inventory" type="button" role="tab" aria-controls="v-pills-inventory" aria-selected="false">
                                                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.9531 10.3154V14.2539H0.953125V10.3154C0.953125 6.47262 4.06247 3.36328 7.90529 3.36328H8.00096C11.8438 3.36328 14.9531 6.47262 14.9531 10.3154Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M7.96094 1.02734V3.36333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M10.8591 14.2539C10.7555 15.7767 9.48781 16.9726 7.94908 16.9726C6.41036 16.9726 5.14271 15.7767 5.03906 14.2539H10.8591Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        Inventory
                                                    </button>
                                                    <button class="nav-link" id="v-pills-shipping-tab" data-bs-toggle="pill" data-bs-target="#v-pills-shipping" type="button" role="tab" aria-controls="v-pills-shipping" aria-selected="false">
                                                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle opacity="0.4" cx="12.2109" cy="12.1001" r="1.5" stroke="currentColor" stroke-width="1.5" />
                                                            <circle opacity="0.4" cx="4.71094" cy="12.1001" r="1.5" stroke="currentColor" stroke-width="1.5" />
                                                            <path opacity="0.4" d="M3.20312 12.0794C2.38058 12.0384 1.86745 11.9161 1.5023 11.5509C1.13715 11.1858 1.01479 10.6726 0.973788 9.8501M6.20312 12.1001H10.7031M13.7031 12.0794C14.5257 12.0384 15.0388 11.9161 15.404 11.5509C15.9531 11.0017 15.9531 10.1179 15.9531 8.3501V6.8501H12.4281C11.8697 6.8501 11.5905 6.8501 11.3646 6.77668C10.9079 6.62831 10.5499 6.27028 10.4015 5.81362C10.3281 5.58767 10.3281 5.30848 10.3281 4.7501C10.3281 3.91252 10.3281 3.49373 10.218 3.15481C9.99544 2.46982 9.4584 1.93279 8.77341 1.71022C8.43449 1.6001 8.0157 1.6001 7.17813 1.6001H0.953125" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M0.953125 4.6001H5.45312" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M0.953125 6.85022H3.95312" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path opacity="0.4" d="M10.3281 3.10022H11.694C12.7855 3.10022 13.3313 3.10022 13.7754 3.3655C14.2196 3.63078 14.4783 4.1113 14.9958 5.07235L15.9531 6.85022" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        Shipping
                                                    </button>
                                                    <button class="nav-link" id="v-pills-attributes-tab" data-bs-toggle="pill" data-bs-target="#v-pills-attributes" type="button" role="tab" aria-controls="v-pills-attributes" aria-selected="false">
                                                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.4" d="M15.2121 10.9172L10.4172 15.7121C9.36668 16.7626 7.64083 16.7626 6.5828 15.7121L1.78789 10.9172C0.737369 9.86668 0.737369 8.14083 1.78789 7.0828L6.5828 2.28789C7.63332 1.23737 9.35917 1.23737 10.4172 2.28789L15.2121 7.0828C16.2626 8.14083 16.2626 9.86668 15.2121 10.9172Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4.1875 4.68896L12.8168 13.3183" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M12.8168 4.68896L4.1875 13.3183" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        Attributes
                                                    </button>
                                                    <button class="nav-link" id="v-pills-advanced-tab" data-bs-toggle="pill" data-bs-target="#v-pills-advanced" type="button" role="tab" aria-controls="v-pills-advanced" aria-selected="false">
                                                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.4" d="M12.0363 14.2172H5.01788C4.70429 14.2172 4.35337 13.9708 4.24884 13.6721L1.15773 5.02598C0.717212 3.78655 1.2324 3.40576 2.29263 4.16734L5.20454 6.25048C5.68986 6.58647 6.24238 6.41474 6.45144 5.86969L7.76553 2.36793C8.18365 1.24796 8.87803 1.24796 9.29615 2.36793L10.6102 5.86969C10.8193 6.41474 11.3718 6.58647 11.8497 6.25048L14.5824 4.30174C15.7471 3.46549 16.3071 3.89108 15.8293 5.24251L12.8128 13.687C12.7008 13.9708 12.3499 14.2172 12.0363 14.2172Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4.42188 16.472H12.635" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M6.66406 10.4989H10.3973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        Advanced
                                                    </button>
                                                </div>
                                                <div class="tab-content px-5 px-sm-10 py-4 py-sm-8 pe-10 pe-sm-12 flex-grow-1" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab" tabindex="0">

                                                        <div class="row align-items-center mb-5">
                                                            <div class="col-xl-2 col-lg-4 col-12">
                                                                <label for="product-price" class="form-label text-custom-body">Price</label>
                                                            </div>
                                                            <div class="col-xl-7 col-lg-7 col-12">
                                                                <input type="number" class="form-control" id="product-price" placeholder="Price">
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-5">
                                                            <div class="col-xl-2 col-lg-4 col-12">
                                                                <label for="product-sale-price" class="form-label text-custom-body">Sale Price</label>
                                                            </div>
                                                            <div class="col-xl-7 col-lg-7 col-12">
                                                                <input type="number" class="form-control" id="product-sale-price" placeholder="Sale Price">
                                                                <div class="mt-2">
                                                                    <a class="" data-bs-toggle="collapse" href="#priceSchedule" role="button" aria-expanded="false" aria-controls="priceSchedule">
                                                                        Schedule
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="collapse" id="priceSchedule">
                                                            <div class="row align-items-center mb-5">
                                                                <div class="col-xl-2 col-lg-4">
                                                                    <label for="product-start-date" class="form-label text-custom-body">Start Date</label>
                                                                </div>
                                                                <div class="col-xl-7 col-lg-7">
                                                                    <input type="date" class="form-control" id="product-start-date">
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-5">
                                                                <div class="col-xl-2 col-lg-4">
                                                                    <label for="product-end-date" class="form-label text-custom-body">End Date</label>
                                                                </div>
                                                                <div class="col-xl-7 col-lg-7">
                                                                    <input type="date" class="form-control" id="product-end-date">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-inventory" role="tabpanel" aria-labelledby="v-pills-inventory-tab" tabindex="0">
                                                        <div class="row align-items-start mb-7">
                                                            <div class="col-xl-3 col-lg-4">
                                                                <label for="product-sku" class="form-label text-custom-body">Stock management :</label>
                                                            </div>
                                                            <div class="col-xl-7 col-lg-7">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="stockMangement" value="option1">
                                                                    <label class="form-check-label" for="stockMangement">Track stock quantity for this product</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-7">
                                                            <div class="col-xl-3 col-lg-4">
                                                                <label for="product-quantity" class="form-label text-custom-body">Quantity</label>
                                                            </div>
                                                            <div class="col-xl-7 col-lg-7">
                                                                <input type="number" class="form-control" id="product-quantity" placeholder="Quantity" value="100">
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-start mb-7">
                                                            <div class="col-xl-3 col-lg-4">
                                                                <label class="form-label text-custom-body">Allow backorders :</label>
                                                            </div>
                                                            <div class="col-xl-7 col-lg-7">
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="doNotAllow" value="option1">
                                                                    <label class="form-check-label" for="doNotAllow">Do not allow</label>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="allowButNotify" value="option1">
                                                                    <label class="form-check-label" for="allowButNotify">Allow, but notify customer</label>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="allowOnly" value="option1">
                                                                    <label class="form-check-label" for="allowOnly">Allow</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-7">
                                                            <div class="col-xl-3 col-lg-4">
                                                                <label for="product-low-stock-threshold" class="form-label text-custom-body">Low stock threshold :</label>
                                                            </div>
                                                            <div class="col-xl-7 col-lg-7">
                                                                <input type="number" class="form-control" id="product-low-stock-threshold" placeholder="Low stock threshold" value="10">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab" tabindex="0">
                                                        <div class="row align-items-center mb-7">
                                                            <div class="col-xl-5 col-lg-12">
                                                                <label for="product-weight" class="form-label text-custom-body">Weight (kg) :</label>
                                                            </div>
                                                            <div class="col-xl-7 col-lg-12">
                                                                <input type="number" class="form-control" id="product-weight" placeholder="Weight" value="10">
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-7">
                                                            <div class="col-xl-5 col-lg-12">
                                                                <label class="form-label text-custom-body">Dimensions (cm) :</label>
                                                            </div>
                                                            <div class="col-xl-7 col-lg-12">
                                                                <div class="row g-3">
                                                                    <div class="col-lg-4 col-12">
                                                                        <input type="number" class="form-control" id="product-length" placeholder="Length" value="10">
                                                                    </div>
                                                                    <div class="col-lg-4 col-12">
                                                                        <input type="number" class="form-control" id="product-width" placeholder="Width" value="10">
                                                                    </div>
                                                                    <div class="col-lg-4 col-12">
                                                                        <input type="number" class="form-control" id="product-height" placeholder="Height" value="10">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-7">
                                                            <div class="col-xl-5 col-lg-8">
                                                                <label for="product-shipping-cost-multiply" class="form-label text-custom-body">Shipping Cost Multiply With Quantity :</label>
                                                            </div>
                                                            <div class="col-xl-7 col-lg-4">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="product-shipping-cost-multiply" checked="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-7">
                                                            <div class="col-xl-5 col-lg-12">
                                                                <label for="product-shipping-cost" class="form-label text-custom-body">Shipping Cost ($) :</label>
                                                            </div>
                                                            <div class="col-xl-7 col-lg-12">
                                                                <input type="number" class="form-control" id="product-shipping-cost" placeholder="Shipping Cost" value="5">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-attributes" role="tabpanel" aria-labelledby="v-pills-attributes-tab" tabindex="0">
                                                        <div class="row align-items-center mb-7">
                                                            <div class="col-lg-5">
                                                                <label for="product-attribute-name" class="form-label text-custom-body">Attribute Name :</label>
                                                            </div>
                                                            <div class="col-xl-7">
                                                                <input type="text" class="form-control" id="product-attribute-name" placeholder="Attribute Name" value="Color">
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-7">
                                                            <div class="col-lg-5">
                                                                <label for="product-attribute-value" class="form-label text-custom-body">Attribute Value :</label>
                                                            </div>
                                                            <div class="col-xl-7">
                                                                <input type="text" class="form-control" id="product-attribute-value" placeholder="Attribute Value" value="Red">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-advanced" role="tabpanel" aria-labelledby="v-pills-advanced-tab" tabindex="0">
                                                        <div class="row align-items-center mb-7">
                                                            <div class="col-lg-4">
                                                                <label for="product-tax-calculation" class="form-label text-custom-body">Tax Calculation :</label>
                                                            </div>
                                                            <div class="col-xl-7">
                                                                <select id="product-tax-calculation" class="form-select">
                                                                    <option value="exclusive">Exclusive</option>
                                                                    <option value="inclusive">Inclusive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center mb-7">
                                                            <div class="col-lg-4">
                                                                <label for="product-tax-amount" class="form-label text-custom-body">Tax Amount(%) :</label>
                                                            </div>
                                                            <div class="col-xl-7">
                                                                <input type="text" class="form-control" id="product-tax-amount" placeholder="Tax Amount" value="5%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Meta Options -->
                            <div class="col-md-12">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4125 15.396C9.48715 15.396 7.92969 13.896 7.92969 12.012C7.92969 10.128 9.48715 8.61597 11.4125 8.61597C13.3379 8.61597 14.8586 10.128 14.8586 12.012C14.8586 13.896 13.3379 15.396 11.4125 15.396Z" fill="currentColor" />
                                                    <path opacity="0.4" d="M22.4762 14.844C22.2432 14.484 21.912 14.124 21.4828 13.896C21.1394 13.728 20.9187 13.452 20.7225 13.128C20.097 12.096 20.4649 10.74 21.5073 10.128C22.7337 9.444 23.1261 7.92 22.4148 6.732L21.5932 5.316C20.8942 4.128 19.3612 3.708 18.1471 4.404C17.068 4.98 15.6822 4.596 15.0567 3.576C14.8605 3.24 14.7502 2.88 14.7747 2.52C14.8115 2.052 14.6643 1.608 14.4436 1.248C13.9898 0.504 13.1682 0 12.2607 0H10.5315C9.63628 0.024 8.81463 0.504 8.36088 1.248C8.12788 1.608 7.99298 2.052 8.0175 2.52C8.04203 2.88 7.93166 3.24 7.73544 3.576C7.11001 4.596 5.72423 4.98 4.65731 4.404C3.43096 3.708 1.91029 4.128 1.199 5.316L0.377351 6.732C-0.321668 7.92 0.0707635 9.444 1.28485 10.128C2.32725 10.74 2.69515 12.096 2.08198 13.128C1.8735 13.452 1.65275 13.728 1.30938 13.896C0.892417 14.124 0.524513 14.484 0.328297 14.844C-0.125452 15.588 -0.100925 16.524 0.352824 17.304L1.199 18.744C1.65275 19.512 2.49893 19.992 3.38191 19.992C3.79886 19.992 4.2894 19.872 4.68183 19.632C4.98842 19.428 5.35633 19.356 5.76102 19.356C6.97511 19.356 7.99298 20.352 8.0175 21.54C8.0175 22.92 9.14574 24 10.5683 24H12.2361C13.6464 24 14.7747 22.92 14.7747 21.54C14.8115 20.352 15.8293 19.356 17.0434 19.356C17.4359 19.356 17.8038 19.428 18.1226 19.632C18.515 19.872 18.9933 19.992 19.4225 19.992C20.2933 19.992 21.1394 19.512 21.5932 18.744L22.4516 17.304C22.8931 16.5 22.9299 15.588 22.4762 14.844Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Meta Options
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <!-- Basic SEO -->
                                        <div class="mb-5">
                                            <label for="meta-title" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" id="meta-title" placeholder="Enter product title for SEO">
                                        </div>

                                        <div class="mb-5">
                                            <label for="meta-description" class="form-label">Meta Description</label>
                                            <textarea class="form-control" id="meta-description" rows="2" placeholder="Short description for search engines"></textarea>
                                        </div>

                                        <div class="mb-5">
                                            <label for="meta-robots" class="form-label">Robots Directive</label>
                                            <select class="form-select" id="meta-robots">
                                                <option value="index, follow">Index, Follow</option>
                                                <option value="noindex, follow">Noindex, Follow</option>
                                                <option value="index, nofollow">Index, Nofollow</option>
                                                <option value="noindex, nofollow">Noindex, Nofollow</option>
                                            </select>
                                        </div>

                                        <!-- Social Sharing (OG Tags) -->
                                        <div class="mb-5">
                                            <label for="og-title" class="form-label">OG Title</label>
                                            <input type="text" class="form-control" id="og-title" placeholder="Title for social sharing">
                                        </div>

                                        <div class="mb-5">
                                            <label for="og-description" class="form-label">OG Description</label>
                                            <textarea class="form-control" id="og-description" rows="2" placeholder="Description for social sharing"></textarea>
                                        </div>

                                        <div class="mb-5">
                                            <label for="og-image" class="form-label">OG Image</label>
                                            <input type="file" class="form-control" id="og-image" accept="image/*">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card card-bg shadow-custom rounded-custom p-4 d-flex flex-wrap flex-row align-items-center justify-content-sm-between gap-4">
                                    <p class="d-flex align-items-center gap-3 m-0 text-custom-black">
                                        <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 1.6875L5.375 11.3125L1 6.9375" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M21 1.6875L11.375 11.3125L7 6.9375" stroke="currentColor" stroke-opacity="0.4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Last saved Oct 4, 2024 - 23:32
                                    </p>
                                    <div class="text-sm-end">
                                        <button type="button" class="btn btn-label-secondary">Discard</button>
                                        <button type="button" class="btn btn-primary"> Publish Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page content end -->

                </div>