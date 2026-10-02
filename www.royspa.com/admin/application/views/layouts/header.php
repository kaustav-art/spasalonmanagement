<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? html_escape($page_title) : 'Admin Panel' ?> | <?= html_escape(get_setting('business_name', 'Salon & Spa Management')) ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= admin_asset('img/logo/favicon.png') ?>" type="image/x-icon">

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
    </style>
</head>
<body>
    <div class="app-main">
        <!-- app wrapper start -->
        <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">
