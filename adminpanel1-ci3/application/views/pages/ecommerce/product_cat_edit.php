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
                            <div class="col-md-8">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z" fill="currentColor" />
                                                    <path d="M16.8125 11.1H12.9125V7.20005C12.9125 6.70805 12.5045 6.30005 12.0125 6.30005C11.5205 6.30005 11.1125 6.70805 11.1125 7.20005V11.1H7.2125C6.7205 11.1 6.3125 11.508 6.3125 12C6.3125 12.492 6.7205 12.9 7.2125 12.9H11.1125V16.8001C11.1125 17.2921 11.5205 17.7001 12.0125 17.7001C12.5045 17.7001 12.9125 17.2921 12.9125 16.8001V12.9H16.8125C17.3045 12.9 17.7125 12.492 17.7125 12C17.7125 11.508 17.3045 11.1 16.8125 11.1Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Category Information
                                        </h3>
                                    </div>
                                    <div class="pure-card-body">
                                        <div class="row gy-5">
                                            <div class="col-md-12">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="title" placeholder="Enter category title" value="Furniture">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" class="form-control" id="slug" placeholder="Slug" value="furniture">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="slug" class="form-label">Parent Category</label>
                                                <select class="form-select" id="parent_category">
                                                    <option value="">Select Parent Category</option>
                                                    <option value="1">Category 1</option>
                                                    <option selected value="2">Category 2</option>
                                                    <option value="3">Category 3</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" rows="5" placeholder="Enter category description">A category for all furniture items, including chairs, tables, and more.</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product thumbnail -->
                            <div class="col-md-4">
                                <div class="pure-card rounded-custom card-bg shadow-custom">
                                    <div class="pure-card-header d-flex flex-wrap align-items-center justify-content-between gap-7">
                                        <h3 class="pure-card-title d-flex align-items-center gap-2 m-0">
                                            <span class="text-primary d-flex align-items-center">
                                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4125 15.396C9.48715 15.396 7.92969 13.896 7.92969 12.012C7.92969 10.128 9.48715 8.61597 11.4125 8.61597C13.3379 8.61597 14.8586 10.128 14.8586 12.012C14.8586 13.896 13.3379 15.396 11.4125 15.396Z" fill="currentColor" />
                                                    <path opacity="0.4" d="M22.4762 14.844C22.2432 14.484 21.912 14.124 21.4828 13.896C21.1394 13.728 20.9187 13.452 20.7225 13.128C20.097 12.096 20.4649 10.74 21.5073 10.128C22.7337 9.444 23.1261 7.92 22.4148 6.732L21.5932 5.316C20.8942 4.128 19.3612 3.708 18.1471 4.404C17.068 4.98 15.6822 4.596 15.0567 3.576C14.8605 3.24 14.7502 2.88 14.7747 2.52C14.8115 2.052 14.6643 1.608 14.4436 1.248C13.9898 0.504 13.1682 0 12.2607 0H10.5315C9.63628 0.024 8.81463 0.504 8.36088 1.248C8.12788 1.608 7.99298 2.052 8.0175 2.52C8.04203 2.88 7.93166 3.24 7.73544 3.576C7.11001 4.596 5.72423 4.98 4.65731 4.404C3.43096 3.708 1.91029 4.128 1.199 5.316L0.377351 6.732C-0.321668 7.92 0.0707635 9.444 1.28485 10.128C2.32725 10.74 2.69515 12.096 2.08198 13.128C1.8735 13.452 1.65275 13.728 1.30938 13.896C0.892417 14.124 0.524513 14.484 0.328297 14.844C-0.125452 15.588 -0.100925 16.524 0.352824 17.304L1.199 18.744C1.65275 19.512 2.49893 19.992 3.38191 19.992C3.79886 19.992 4.2894 19.872 4.68183 19.632C4.98842 19.428 5.35633 19.356 5.76102 19.356C6.97511 19.356 7.99298 20.352 8.0175 21.54C8.0175 22.92 9.14574 24 10.5683 24H12.2361C13.6464 24 14.7747 22.92 14.7747 21.54C14.8115 20.352 15.8293 19.356 17.0434 19.356C17.4359 19.356 17.8038 19.428 18.1226 19.632C18.515 19.872 18.9933 19.992 19.4225 19.992C20.2933 19.992 21.1394 19.512 21.5932 18.744L22.4516 17.304C22.8931 16.5 22.9299 15.588 22.4762 14.844Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            Thumbnail
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
                                            <input type="text" class="form-control" id="meta-title" placeholder="Enter product title for SEO" value="Furniture">
                                        </div>

                                        <div class="mb-5">
                                            <label for="meta-description" class="form-label">Meta Description</label>
                                            <textarea class="form-control" id="meta-description" rows="2" placeholder="Short description for search engines">A category for all furniture items, including chairs, tables, and more.</textarea>
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