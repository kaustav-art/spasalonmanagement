<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= isset($page_title) ? $page_title : 'Conca - Bootstrap Admin Template' ?></title>

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo/favicon.png'); ?>" type="image/x-icon">

    <!-- global style sheet for all pages -->
    <link id="bootstrap-css" rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/conca.css'); ?>">

    <?php if (!empty($extra_css)): ?>
        <?php foreach ($extra_css as $css): ?>
            <link rel="stylesheet" type="text/css" href="<?= base_url($css); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>