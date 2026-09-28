<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? html_escape($page_title) : 'Authentication' ?> | <?= html_escape(get_setting('business_name', 'Salon & Spa Management')) ?></title>

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= admin_asset('img/logo/favicon.png'); ?>" type="image/x-icon">

    <!-- global style sheet for all pages -->
    <link id="bootstrap-css" rel="stylesheet" type="text/css" href="<?= admin_asset('css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= admin_asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= admin_asset('css/conca.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <?php if (!empty($extra_css)): ?>
        <?php foreach ($extra_css as $css): ?>
            <link rel="stylesheet" type="text/css" href="<?= (strpos($css, 'http') === 0) ? $css : admin_asset($css); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
