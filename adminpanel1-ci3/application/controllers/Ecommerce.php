<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]
class Ecommerce extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Product List | Conca - Bootstrap Admin Template
     */
    public function product_list() {
        $data = [
            'page_title' => 'Product List | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'product_list',
            'component_name' => 'Product List',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/ecommerce/product_list', $data);
    }

    /**
     * Create Product | Conca - Bootstrap Admin Template
     */
    public function product_add() {
        $data = [
            'page_title' => 'Create Product | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'product_add',
            'component_name' => 'Product Add',
            'extra_css' => array (
  0 => 'assets/vendor/libs/quill/quill.html',
  1 => 'assets/vendor/libs/quill/quill-bubble.html',
  2 => 'assets/vendor/libs/quill/quill-snow.html',
),
            'extra_js' => array (
  0 => 'assets/js/pages/ecommerce.js',
  1 => 'assets/vendor/libs/quill/quill-2.js',
  2 => 'assets/js/pages/form-editor.js',
)
        ];
        $this->render('pages/ecommerce/product_add', $data);
    }

    /**
     * Edit Product | Conca - Bootstrap Admin Template
     */
    public function product_edit() {
        $data = [
            'page_title' => 'Edit Product | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'product_edit',
            'component_name' => 'Product Edit',
            'extra_css' => array (
  0 => 'assets/vendor/libs/quill/quill.html',
  1 => 'assets/vendor/libs/quill/quill-bubble.html',
  2 => 'assets/vendor/libs/quill/quill-snow.html',
),
            'extra_js' => array (
  0 => 'assets/js/pages/ecommerce.js',
  1 => 'assets/vendor/libs/quill/quill-2.js',
  2 => 'assets/js/pages/form-editor.js',
)
        ];
        $this->render('pages/ecommerce/product_edit', $data);
    }

    /**
     * Category List | Conca - Bootstrap Admin Template
     */
    public function product_cat_list() {
        $data = [
            'page_title' => 'Category List | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'product_cat_list',
            'component_name' => 'Product Cat List',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/product_cat_list', $data);
    }

    /**
     * Create Category | Conca - Bootstrap Admin Template
     */
    public function product_cat_add() {
        $data = [
            'page_title' => 'Create Category | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'product_cat_add',
            'component_name' => 'Product Cat Add',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => '<script>
        // JavaScript: Multi-image uploader with uploader always col-lg-3
        document.addEventListener(\'DOMContentLoaded\', () => {
            const fileInput = document.getElementById(\'product-gallery-uploader-input\');
            const galleryRow = document.getElementById(\'product-gallery-row\');
            const uploaderCol = document.getElementById(\'product-gallery-uploader-col\');

            // Keep track of images: { file: File|null, url: string, existing: boolean, existingId: string|null }
            let uploadedFiles = [];

            // Ensure uploader column always has the required classes
            function enforceUploaderColClass() {
                uploaderCol.className = \'col-lg-3 col-md-4 col-sm-6 col-12\';
            }

            // Revoke blob URL (if any) to free memory
            function revokeIfBlob(item) {
                if (item && item.file && item.url && item.url.startsWith(\'blob:\')) {
                    try {
                        URL.revokeObjectURL(item.url);
                    } catch (e) {
                        /* ignore */ }
                }
            }

            // Load any existing images that are present in the DOM on page load
            (function loadExistingFromDOM() {
                const singles = Array.from(galleryRow.querySelectorAll(\'.product-gallery-single\'));
                singles.forEach(single => {
                    // Skip if this single is inside uploader col (it shouldn\'t be)
                    if (single.closest(\'#product-gallery-uploader-col\')) return;

                    const img = single.querySelector(\'img\');
                    if (!img) return;
                    const existingId = single.dataset.existingId ?? null;
                    uploadedFiles.push({
                        file: null,
                        url: img.src,
                        existing: true,
                        existingId
                    });
                });
            })();

            // Render gallery: remove all non-uploader children and insert previews
            function renderGallery() {
                // Remove all children except uploaderCol
                Array.from(galleryRow.children).forEach(child => {
                    if (child !== uploaderCol) child.remove();
                });

                // Insert items before uploaderCol
                uploadedFiles.forEach((item, i) => {
                    const col = document.createElement(\'div\');
                    col.className = \'col-lg-3 col-md-4 col-sm-6 col-12\';

                    const dataExistingAttr = (item.existing && item.existingId) ? `data-existing-id="${item.existingId}"` : \'\';

                    col.innerHTML = `
        <div class="product-gallery-single position-relative" ${dataExistingAttr}>
          <button type="button" class="product-gallery-remove-btn" data-index="${i}" aria-label="Remove image">
            <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 1.98608L1 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M1 1.98608L9 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          <img class="img-fluid" src="${item.url}" alt="preview-${i}">
        </div>
      `;
                    galleryRow.insertBefore(col, uploaderCol);
                });

                enforceUploaderColClass();
            }

            // Delegated remove handler (works for dynamically created buttons)
            galleryRow.addEventListener(\'click\', (e) => {
                const btn = e.target.closest(\'.product-gallery-remove-btn\');
                if (!btn) return;
                const idx = Number(btn.dataset.index);
                if (Number.isNaN(idx)) return;

                const removed = uploadedFiles.splice(idx, 1)[0];
                revokeIfBlob(removed);
                renderGallery();
            });

            // Handle new file selection
            fileInput.addEventListener(\'change\', (e) => {
                const files = Array.from(e.target.files || []);
                if (!files.length) return;

                files.forEach(file => {
                    const url = URL.createObjectURL(file);
                    uploadedFiles.push({
                        file,
                        url,
                        existing: false,
                        existingId: null
                    });
                });

                // Reset input so same files can be chosen again if needed
                fileInput.value = \'\';
                renderGallery();
            });

            // Utility: build FormData for submission (new files as \'images[]\', existing IDs as \'existing_images[]\')
            function buildFormData() {
                const fd = new FormData();
                uploadedFiles.forEach(it => {
                    if (it.file) {
                        fd.append(\'images[]\', it.file);
                    } else if (it.existing && it.existingId) {
                        fd.append(\'existing_images[]\', it.existingId);
                    } else if (it.existing) {
                        fd.append(\'existing_images_urls[]\', it.url);
                    }
                });
                return fd;
            }

            // Cleanup blob URLs on unload
            window.addEventListener(\'beforeunload\', () => {
                uploadedFiles.forEach(revokeIfBlob);
            });

            // initial render & enforcement
            renderGallery();

            // expose for debugging (optional)
            window._productGallery = {
                uploadedFiles,
                buildFormData
            };
        });
    </script>',
)
        ];
        $this->render('pages/ecommerce/product_cat_add', $data);
    }

    /**
     * Edit Category | Conca - Bootstrap Admin Template
     */
    public function product_cat_edit() {
        $data = [
            'page_title' => 'Edit Category | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'product_cat_edit',
            'component_name' => 'Product Cat Edit',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => '<script>
        // JavaScript: Multi-image uploader with uploader always col-lg-3
        document.addEventListener(\'DOMContentLoaded\', () => {
            const fileInput = document.getElementById(\'product-gallery-uploader-input\');
            const galleryRow = document.getElementById(\'product-gallery-row\');
            const uploaderCol = document.getElementById(\'product-gallery-uploader-col\');

            // Keep track of images: { file: File|null, url: string, existing: boolean, existingId: string|null }
            let uploadedFiles = [];

            // Ensure uploader column always has the required classes
            function enforceUploaderColClass() {
                uploaderCol.className = \'col-lg-3 col-md-4 col-sm-6 col-12\';
            }

            // Revoke blob URL (if any) to free memory
            function revokeIfBlob(item) {
                if (item && item.file && item.url && item.url.startsWith(\'blob:\')) {
                    try {
                        URL.revokeObjectURL(item.url);
                    } catch (e) {
                        /* ignore */ }
                }
            }

            // Load any existing images that are present in the DOM on page load
            (function loadExistingFromDOM() {
                const singles = Array.from(galleryRow.querySelectorAll(\'.product-gallery-single\'));
                singles.forEach(single => {
                    // Skip if this single is inside uploader col (it shouldn\'t be)
                    if (single.closest(\'#product-gallery-uploader-col\')) return;

                    const img = single.querySelector(\'img\');
                    if (!img) return;
                    const existingId = single.dataset.existingId ?? null;
                    uploadedFiles.push({
                        file: null,
                        url: img.src,
                        existing: true,
                        existingId
                    });
                });
            })();

            // Render gallery: remove all non-uploader children and insert previews
            function renderGallery() {
                // Remove all children except uploaderCol
                Array.from(galleryRow.children).forEach(child => {
                    if (child !== uploaderCol) child.remove();
                });

                // Insert items before uploaderCol
                uploadedFiles.forEach((item, i) => {
                    const col = document.createElement(\'div\');
                    col.className = \'col-lg-3 col-md-4 col-sm-6 col-12\';

                    const dataExistingAttr = (item.existing && item.existingId) ? `data-existing-id="${item.existingId}"` : \'\';

                    col.innerHTML = `
        <div class="product-gallery-single position-relative" ${dataExistingAttr}>
          <button type="button" class="product-gallery-remove-btn" data-index="${i}" aria-label="Remove image">
            <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 1.98608L1 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M1 1.98608L9 9.98608" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          <img class="img-fluid" src="${item.url}" alt="preview-${i}">
        </div>
      `;
                    galleryRow.insertBefore(col, uploaderCol);
                });

                enforceUploaderColClass();
            }

            // Delegated remove handler (works for dynamically created buttons)
            galleryRow.addEventListener(\'click\', (e) => {
                const btn = e.target.closest(\'.product-gallery-remove-btn\');
                if (!btn) return;
                const idx = Number(btn.dataset.index);
                if (Number.isNaN(idx)) return;

                const removed = uploadedFiles.splice(idx, 1)[0];
                revokeIfBlob(removed);
                renderGallery();
            });

            // Handle new file selection
            fileInput.addEventListener(\'change\', (e) => {
                const files = Array.from(e.target.files || []);
                if (!files.length) return;

                files.forEach(file => {
                    const url = URL.createObjectURL(file);
                    uploadedFiles.push({
                        file,
                        url,
                        existing: false,
                        existingId: null
                    });
                });

                // Reset input so same files can be chosen again if needed
                fileInput.value = \'\';
                renderGallery();
            });

            // Utility: build FormData for submission (new files as \'images[]\', existing IDs as \'existing_images[]\')
            function buildFormData() {
                const fd = new FormData();
                uploadedFiles.forEach(it => {
                    if (it.file) {
                        fd.append(\'images[]\', it.file);
                    } else if (it.existing && it.existingId) {
                        fd.append(\'existing_images[]\', it.existingId);
                    } else if (it.existing) {
                        fd.append(\'existing_images_urls[]\', it.url);
                    }
                });
                return fd;
            }

            // Cleanup blob URLs on unload
            window.addEventListener(\'beforeunload\', () => {
                uploadedFiles.forEach(revokeIfBlob);
            });

            // initial render & enforcement
            renderGallery();

            // expose for debugging (optional)
            window._productGallery = {
                uploadedFiles,
                buildFormData
            };
        });
    </script>',
)
        ];
        $this->render('pages/ecommerce/product_cat_edit', $data);
    }

    /**
     * Coupon List | Conca - Bootstrap Admin Template
     */
    public function coupon_list() {
        $data = [
            'page_title' => 'Coupon List | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'coupon_list',
            'component_name' => 'Coupon List',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/coupon_list', $data);
    }

    /**
     * Coupon History | Conca - Bootstrap Admin Template
     */
    public function coupon_history() {
        $data = [
            'page_title' => 'Coupon History | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'coupon_history',
            'component_name' => 'Coupon History',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/coupon_history', $data);
    }

    /**
     * Order List | Conca - Bootstrap Admin Template
     */
    public function order_list() {
        $data = [
            'page_title' => 'Order List | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'order_list',
            'component_name' => 'Order List',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/order_list', $data);
    }

    /**
     * Order Details | Conca - Bootstrap Admin Template
     */
    public function order_details() {
        $data = [
            'page_title' => 'Order Details | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'order_details',
            'component_name' => 'Order Details',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/order_details', $data);
    }

    /**
     * Customer List | Conca - Bootstrap Admin Template
     */
    public function customer_list() {
        $data = [
            'page_title' => 'Customer List | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'customer_list',
            'component_name' => 'Customer List',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/customer_list', $data);
    }

    /**
     * Customer Details General | Conca - Bootstrap Admin Template
     */
    public function customer_details_general() {
        $data = [
            'page_title' => 'Customer Details General | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'customer_details_general',
            'component_name' => 'Customer Details General',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/ecommerce/customer_details_general', $data);
    }

    /**
     * Customer Details Security | Conca - Bootstrap Admin Template
     */
    public function customer_details_security() {
        $data = [
            'page_title' => 'Customer Details Security | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'customer_details_security',
            'component_name' => 'Customer Details Security',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/ecommerce/customer_details_security', $data);
    }

    /**
     * Customer Details Payments | Conca - Bootstrap Admin Template
     */
    public function customer_details_payments() {
        $data = [
            'page_title' => 'Customer Details Payments | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'customer_details_payments',
            'component_name' => 'Customer Details Payments',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/ecommerce/customer_details_payments', $data);
    }

    /**
     * Customer Details Address | Conca - Bootstrap Admin Template
     */
    public function customer_details_address() {
        $data = [
            'page_title' => 'Customer Details Address | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'customer_details_address',
            'component_name' => 'Customer Details Address',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/ecommerce/customer_details_address', $data);
    }

    /**
     * Customer Details Notifications | Conca - Bootstrap Admin Template
     */
    public function customer_details_notifications() {
        $data = [
            'page_title' => 'Customer Details Notifications | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'customer_details_notifications',
            'component_name' => 'Customer Details Notifications',
            'extra_css' => array (
),
            'extra_js' => array (
  0 => 'assets/js/pages/profile.js',
)
        ];
        $this->render('pages/ecommerce/customer_details_notifications', $data);
    }

    /**
     * Review List | Conca - Bootstrap Admin Template
     */
    public function review_list() {
        $data = [
            'page_title' => 'Review List | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'review_list',
            'component_name' => 'Review List',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/review_list', $data);
    }

    /**
     * Ecommerce Settings | Conca - Bootstrap Admin Template
     */
    public function settings_general() {
        $data = [
            'page_title' => 'Ecommerce Settings | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'settings_general',
            'component_name' => 'Settings General',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/settings_general', $data);
    }

    /**
     * Payments Settings | Conca - Bootstrap Admin Template
     */
    public function settings_payments() {
        $data = [
            'page_title' => 'Payments Settings | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'settings_payments',
            'component_name' => 'Settings Payments',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/settings_payments', $data);
    }

    /**
     * Shipping Settings | Conca - Bootstrap Admin Template
     */
    public function settings_shippings() {
        $data = [
            'page_title' => 'Shipping Settings | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'settings_shippings',
            'component_name' => 'Settings Shippings',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/settings_shippings', $data);
    }

    /**
     * Notifications Settings | Conca - Bootstrap Admin Template
     */
    public function settings_notifications() {
        $data = [
            'page_title' => 'Notifications Settings | Conca - Bootstrap Admin Template',
            'active_menu' => 'ecommerce',
            'active_submenu' => 'settings_notifications',
            'component_name' => 'Settings Notifications',
            'extra_css' => array (
),
            'extra_js' => array (
)
        ];
        $this->render('pages/ecommerce/settings_notifications', $data);
    }

}
