<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? htmlspecialchars($page_title) : 'Super Admin Control Panel' ?> - Luxe Platform</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="<?= superadmin_asset('css/bootstrap.css') ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= superadmin_asset('vendor/libs/sweetalert2/sweetalert2.css') ?>">
    <!-- Super Admin Custom Style -->
    <link rel="stylesheet" href="<?= superadmin_asset('css/superadmin.css') ?>?v=1.2">
</head>
<body class="sa-body dark-theme" data-bs-theme="dark">
