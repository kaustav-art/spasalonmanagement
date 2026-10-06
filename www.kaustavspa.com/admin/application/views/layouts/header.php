<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? html_escape($page_title) : 'Admin Panel' ?> | <?= html_escape(get_setting('business_name', 'Salon & Spa Management')) ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= function_exists('admin_favicon_url') ? admin_favicon_url() : admin_asset('img/logo/favicon.png') ?>?v=<?= time() ?>" type="image/x-icon">
    <link rel="icon" href="<?= function_exists('admin_favicon_url') ? admin_favicon_url() : admin_asset('img/logo/favicon.png') ?>?v=<?= time() ?>">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Global style sheets from Conca Theme -->
    <link id="bootstrap-css" rel="stylesheet" type="text/css" href="<?= admin_asset('css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= admin_asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= admin_asset('css/conca.css') ?>">

    <!-- FontAwesome for extended system icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <?php if (!empty($extra_css)): ?>
        <?php foreach ($extra_css as $css): ?>
            <link rel="stylesheet" type="text/css" href="<?= (strpos($css, 'http') === 0) ? $css : admin_asset($css); ?>">
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Core jQuery (Loaded in Head so views and page plugins have immediate access) -->
    <script src="<?= admin_asset('vendor/libs/jquery/jquery.js'); ?>"></script>

    <!-- Summernote WYSIWYG Editor Assets -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        if (typeof $.fn.summernote !== 'undefined') {
            $.extend($.fn.summernote.options, {
                dialogsInBody: false,
                dialogsFade: false
            });
        }
        window.makeTablePropertiesBtn = function(context) {
            var ui = $.summernote.ui;
            return ui.button({
                contents: '<i class="fa-solid fa-table-cells text-primary"></i> <span class="d-none d-md-inline ms-1">Table Props</span>',
                tooltip: 'Table Properties & Border Settings',
                click: function() {
                    if (typeof openTablePropertiesModal === 'function') {
                        openTablePropertiesModal(context);
                    }
                }
            }).render();
        };
    </script>

    <style>
        .app-sidebar-logo { font-size: 1.15rem; font-weight: 700; color: inherit; text-decoration: none; display: flex; align-items: center; gap: 8px; }
        .badge-edition-salon { background-color: #e83e8c; color: #fff; }
        .badge-edition-spa { background-color: #20c997; color: #fff; }
        .badge-edition-both { background-color: #6f42c1; color: #fff; }
        .table > :not(caption) > * > * { vertical-align: middle; }
        .cursor-pointer { cursor: pointer; }
        .pos-product-card { border: 1px solid var(--bs-border-color, #e2e8f0); border-radius: 12px; padding: 12px; transition: all 0.2s ease; cursor: pointer; background: var(--bs-card-bg, #fff); height: 100%; }
        .pos-product-card:hover { transform: translateY(-3px); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.08); border-color: var(--bs-primary, #6366f1); }
        .stat-card-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; }

        /* Summernote WYSIWYG Editor Integration Fixes */
        .note-editor.note-frame { border: 1px solid #ced4da !important; border-radius: 8px !important; background: #fff !important; }
        .note-editor .note-toolbar { background: #f8fafc !important; border-bottom: 1px solid #e2e8f0 !important; border-radius: 7px 7px 0 0 !important; padding: 6px 8px !important; }
        .note-editor .note-editable { min-height: 220px !important; font-family: inherit !important; font-size: 14px !important; line-height: 1.7 !important; color: #1e293b !important; background: #fff !important; }
        .note-editor .note-statusbar { border-top: 1px solid #e2e8f0 !important; border-radius: 0 0 7px 7px !important; background: #f8fafc !important; }
        .note-btn:not(.note-color-btn) { background: #fff !important; border: 1px solid #e2e8f0 !important; color: #475569 !important; border-radius: 5px !important; font-size: 12px !important; padding: 4px 8px !important; }
        .note-btn:not(.note-color-btn):hover, .note-btn:not(.note-color-btn).active { background: #f1f5f9 !important; color: #0f172a !important; border-color: #cbd5e1 !important; }
        .note-dropdown-menu { z-index: 1070 !important; }

        /* Color Palette Dropdown & Swatches */
        .note-color .note-dropdown-menu,
        .note-color-all .note-dropdown-menu,
        .note-popover .popover-content .note-color .note-dropdown-menu {
            min-width: 360px !important;
            padding: 12px 14px !important;
            background: #fff !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 8px !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
        }
        .note-color .note-palette,
        .note-color-all .note-palette {
            display: inline-block !important;
            vertical-align: top !important;
            width: 160px !important;
            margin: 0 4px !important;
        }
        .note-color-palette {
            line-height: 1 !important;
            padding: 4px 0 !important;
        }
        .note-color-palette .note-color-row {
            display: flex !important;
            height: 20px !important;
            margin-bottom: 2px !important;
        }
        .note-color-palette .note-color-btn {
            width: 20px !important;
            height: 20px !important;
            min-width: 20px !important;
            max-width: 20px !important;
            padding: 0 !important;
            margin: 1px !important;
            border: 1px solid rgba(0, 0, 0, 0.15) !important;
            border-radius: 3px !important;
            cursor: pointer !important;
            box-sizing: border-box !important;
            display: inline-block !important;
            transition: transform 0.12s ease !important;
        }
        .note-color-palette .note-color-btn:hover {
            transform: scale(1.3) !important;
            z-index: 10 !important;
            border-color: #000 !important;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.4) !important;
        }
        .note-palette-title {
            color: #475569 !important;
            border-bottom: 1px solid #e2e8f0 !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            margin: 2px 0 6px 0 !important;
            padding-bottom: 4px !important;
            text-align: center !important;
        }
        .note-color-reset,
        .note-color-select {
            display: block !important;
            width: 100% !important;
            background: #f8fafc !important;
            color: #334155 !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 4px !important;
            padding: 5px 8px !important;
            font-size: 11px !important;
            font-weight: 600 !important;
            margin: 4px 0 !important;
            cursor: pointer !important;
            text-align: center !important;
            transition: all 0.15s ease !important;
        }
        .note-color-reset:hover,
        .note-color-select:hover {
            background: #e2e8f0 !important;
            color: #0f172a !important;
            border-color: #cbd5e1 !important;
        }

        /* Tables in Editor */
        .note-editor .note-editing-area .note-editable table {
            width: 100%;
            border-collapse: collapse;
        }
        .note-editor .note-editing-area .note-editable table td,
        .note-editor .note-editing-area .note-editable table th {
            border: 1px solid #cbd5e1;
            padding: 8px 10px;
        }
        .note-editor .note-editing-area .note-editable table.table-borderless td,
        .note-editor .note-editing-area .note-editable table.table-borderless th,
        .note-editor .note-editing-area .note-editable table.no-border td,
        .note-editor .note-editing-area .note-editable table.no-border th,
        .note-editor .note-editing-area .note-editable table td.no-border,
        .note-editor .note-editing-area .note-editable table th.no-border {
            border: none !important;
        }

        /* Modal Table Properties */
        #modalTableProperties { z-index: 1085 !important; }

        /* Summernote Dialogs & Modals (Insert Link, Picture, Video, Help) */
        .note-modal-backdrop {
            display: none !important;
            pointer-events: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
            width: 0 !important;
            height: 0 !important;
            z-index: -9999 !important;
        }

        .note-modal {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 1090 !important;
            overflow-x: hidden !important;
            overflow-y: auto !important;
            background-color: rgba(15, 23, 42, 0.65) !important;
            backdrop-filter: blur(4px) !important;
            display: none !important;
        }

        .note-modal.open,
        .note-modal[style*="display: block"],
        .note-modal[style*="display:block"] {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            opacity: 1 !important;
            visibility: visible !important;
        }

        /* Prevent Bootstrap 5 .fade:not(.show) from hiding Summernote dialogs */
        .note-modal.fade,
        .note-modal.fade:not(.show) {
            opacity: 1 !important;
            transition: none !important;
        }
        .note-modal:not(.open):not([style*="display: block"]):not([style*="display:block"]) {
            display: none !important;
        }

        .note-modal-content,
        .note-modal .note-modal-content,
        .note-modal .modal-content {
            background-color: #ffffff !important;
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 14px !important;
            color: #0f172a !important;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3) !important;
            width: 92% !important;
            max-width: 540px !important;
            margin: auto !important;
            overflow: hidden !important;
            position: relative !important;
            z-index: 1091 !important;
        }

        .note-modal-header,
        .note-modal .note-modal-header,
        .note-modal .modal-header {
            background-color: #f8fafc !important;
            border-bottom: 1px solid #e2e8f0 !important;
            padding: 16px 22px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
        }

        .note-modal-title,
        .note-modal .note-modal-title,
        .note-modal .modal-title {
            font-size: 1.05rem !important;
            font-weight: 700 !important;
            color: #0f172a !important;
            letter-spacing: -0.01em !important;
            margin: 0 !important;
        }

        .note-modal-header .close,
        .note-modal .close,
        .note-modal .note-close {
            background: transparent !important;
            border: none !important;
            font-size: 1.4rem !important;
            color: #94a3b8 !important;
            cursor: pointer !important;
            padding: 4px 8px !important;
            line-height: 1 !important;
            transition: color 0.15s ease !important;
            border-radius: 6px !important;
        }

        .note-modal-header .close:hover,
        .note-modal .close:hover,
        .note-modal .note-close:hover {
            color: #ef4444 !important;
            background: #f1f5f9 !important;
        }

        .note-modal-body,
        .note-modal .note-modal-body,
        .note-modal .modal-body {
            padding: 22px 24px !important;
            background-color: #ffffff !important;
        }

        .note-modal-body .form-group,
        .note-modal-body .note-form-group {
            margin-bottom: 16px !important;
        }

        .note-modal-body .note-form-label,
        .note-modal-body label {
            display: block !important;
            font-size: 0.82rem !important;
            font-weight: 600 !important;
            color: #475569 !important;
            margin-bottom: 6px !important;
        }

        .note-modal-body .note-input,
        .note-modal-body input[type="text"],
        .note-modal-body input[type="file"] {
            width: 100% !important;
            background-color: #ffffff !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 8px !important;
            color: #0f172a !important;
            padding: 9px 13px !important;
            font-size: 0.88rem !important;
            outline: none !important;
            transition: border-color 0.2s ease, box-shadow 0.2s ease !important;
        }

        .note-modal-body .note-input:focus {
            border-color: #4f46e5 !important;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15) !important;
        }

        .note-modal-body .note-image-input {
            border: 1px dashed #cbd5e1 !important;
            padding: 14px !important;
            background: #f8fafc !important;
            border-radius: 8px !important;
            cursor: pointer !important;
        }

        .note-modal-footer,
        .note-modal .note-modal-footer,
        .note-modal .modal-footer {
            background-color: #f8fafc !important;
            border-top: 1px solid #e2e8f0 !important;
            padding: 14px 24px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: flex-end !important;
            gap: 10px !important;
        }

        .note-modal-footer .note-btn,
        .note-modal-footer .btn {
            border-radius: 8px !important;
            font-size: 0.85rem !important;
            font-weight: 600 !important;
            padding: 8px 20px !important;
            cursor: pointer !important;
            transition: all 0.15s ease !important;
        }

        .note-modal-footer .note-btn-primary,
        .note-modal-footer .note-image-btn,
        .note-modal-footer .note-link-btn,
        .note-modal-footer .note-video-btn {
            background: #4f46e5 !important;
            border: 1px solid #4f46e5 !important;
            color: #ffffff !important;
        }

        .note-modal-footer .note-btn-primary:hover:not([disabled]),
        .note-modal-footer .note-image-btn:hover:not([disabled]) {
            background: #4338ca !important;
            border-color: #4338ca !important;
        }

        .note-modal-footer .note-btn[disabled],
        .note-modal-footer .note-btn.disabled,
        .note-modal-footer input[type="button"][disabled] {
            opacity: 0.5 !important;
            cursor: not-allowed !important;
        }
    </style>
</head>
<body>
    <div class="app-main">
        <!-- app wrapper start -->
        <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">
