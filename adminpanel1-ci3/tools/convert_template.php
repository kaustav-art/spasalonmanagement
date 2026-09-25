<?php
/**
 * Conca Admin Template to CodeIgniter 3 Converter
 */

$rootDir = dirname(__DIR__);
$templateDir = $rootDir . '/admin-template';
$appDir = $rootDir . '/application';

// Create directories
@mkdir($appDir . '/views/layouts', 0777, true);
@mkdir($appDir . '/views/pages/dashboard', 0777, true);
@mkdir($appDir . '/views/pages/apps', 0777, true);
@mkdir($appDir . '/views/pages/ecommerce', 0777, true);
@mkdir($appDir . '/views/pages/lms', 0777, true);
@mkdir($appDir . '/views/pages/users', 0777, true);
@mkdir($appDir . '/views/pages/auth', 0777, true);
@mkdir($appDir . '/views/pages/errors', 0777, true);
@mkdir($appDir . '/views/pages/components', 0777, true);

// URL mappings
$urlMap = [
    // Dashboards
    'index.html' => ['controller' => 'Dashboard', 'action' => 'index', 'route' => 'dashboard', 'view' => 'pages/dashboard/ecommerce', 'menu' => 'dashboard', 'sub' => 'ecommerce', 'title' => 'Ecommerce Dashboard | Conca - Bootstrap Admin Template'],
    'dashboard-academy.html' => ['controller' => 'Dashboard', 'action' => 'academy', 'route' => 'dashboard/academy', 'view' => 'pages/dashboard/academy', 'menu' => 'dashboard', 'sub' => 'academy', 'title' => 'Academy Dashboard | Conca - Bootstrap Admin Template'],
    'dashboard-analytics.html' => ['controller' => 'Dashboard', 'action' => 'analytics', 'route' => 'dashboard/analytics', 'view' => 'pages/dashboard/analytics', 'menu' => 'dashboard', 'sub' => 'analytics', 'title' => 'Analytics Dashboard | Conca - Bootstrap Admin Template'],
    'dashboard-crm.html' => ['controller' => 'Dashboard', 'action' => 'crm', 'route' => 'dashboard/crm', 'view' => 'pages/dashboard/crm', 'menu' => 'dashboard', 'sub' => 'crm', 'title' => 'CRM Dashboard | Conca - Bootstrap Admin Template'],
    'dashboard-hrm.html' => ['controller' => 'Dashboard', 'action' => 'hrm', 'route' => 'dashboard/hrm', 'view' => 'pages/dashboard/hrm', 'menu' => 'dashboard', 'sub' => 'hrm', 'title' => 'HRM Dashboard | Conca - Bootstrap Admin Template'],

    // Apps
    'app-chat.html' => ['controller' => 'Apps', 'action' => 'chat', 'route' => 'apps/chat', 'view' => 'pages/apps/chat', 'menu' => 'chat', 'sub' => '', 'title' => 'Chat App | Conca - Bootstrap Admin Template'],
    'app-pos.html' => ['controller' => 'Apps', 'action' => 'pos', 'route' => 'apps/pos', 'view' => 'pages/apps/pos', 'menu' => 'pos', 'sub' => '', 'title' => 'POS App | Conca - Bootstrap Admin Template'],

    // Ecommerce
    'ecommerce-product-list.html' => ['controller' => 'Ecommerce', 'action' => 'product_list', 'route' => 'ecommerce/products', 'view' => 'pages/ecommerce/product_list', 'menu' => 'ecommerce', 'sub' => 'product_list', 'title' => 'Product List | Conca - Bootstrap Admin Template'],
    'ecommerce-product-add.html' => ['controller' => 'Ecommerce', 'action' => 'product_add', 'route' => 'ecommerce/product_add', 'view' => 'pages/ecommerce/product_add', 'menu' => 'ecommerce', 'sub' => 'product_add', 'title' => 'Add Product | Conca - Bootstrap Admin Template'],
    'ecommerce-product-edit.html' => ['controller' => 'Ecommerce', 'action' => 'product_edit', 'route' => 'ecommerce/product_edit', 'view' => 'pages/ecommerce/product_edit', 'menu' => 'ecommerce', 'sub' => 'product_edit', 'title' => 'Edit Product | Conca - Bootstrap Admin Template'],
    'ecommerce-product-cat-list.html' => ['controller' => 'Ecommerce', 'action' => 'product_cat_list', 'route' => 'ecommerce/categories', 'view' => 'pages/ecommerce/product_cat_list', 'menu' => 'ecommerce', 'sub' => 'product_cat_list', 'title' => 'Category List | Conca - Bootstrap Admin Template'],
    'ecommerce-product-cat-add.html' => ['controller' => 'Ecommerce', 'action' => 'product_cat_add', 'route' => 'ecommerce/category_add', 'view' => 'pages/ecommerce/product_cat_add', 'menu' => 'ecommerce', 'sub' => 'product_cat_add', 'title' => 'Add Category | Conca - Bootstrap Admin Template'],
    'ecommerce-product-cat-edit.html' => ['controller' => 'Ecommerce', 'action' => 'product_cat_edit', 'route' => 'ecommerce/category_edit', 'view' => 'pages/ecommerce/product_cat_edit', 'menu' => 'ecommerce', 'sub' => 'product_cat_edit', 'title' => 'Edit Category | Conca - Bootstrap Admin Template'],
    'ecommerce-coupon-list.html' => ['controller' => 'Ecommerce', 'action' => 'coupon_list', 'route' => 'ecommerce/coupons', 'view' => 'pages/ecommerce/coupon_list', 'menu' => 'ecommerce', 'sub' => 'coupon_list', 'title' => 'Coupon List | Conca - Bootstrap Admin Template'],
    'coupon-list.html' => ['controller' => 'Ecommerce', 'action' => 'coupon_list', 'route' => 'ecommerce/coupon_list_alias', 'view' => 'pages/ecommerce/coupon_list', 'menu' => 'ecommerce', 'sub' => 'coupon_list', 'title' => 'Coupon List | Conca - Bootstrap Admin Template'],
    'ecommerce-coupon-history.html' => ['controller' => 'Ecommerce', 'action' => 'coupon_history', 'route' => 'ecommerce/coupon_history', 'view' => 'pages/ecommerce/coupon_history', 'menu' => 'ecommerce', 'sub' => 'coupon_history', 'title' => 'Coupon History | Conca - Bootstrap Admin Template'],
    'ecommerce-order-list.html' => ['controller' => 'Ecommerce', 'action' => 'order_list', 'route' => 'ecommerce/orders', 'view' => 'pages/ecommerce/order_list', 'menu' => 'ecommerce', 'sub' => 'order_list', 'title' => 'Order List | Conca - Bootstrap Admin Template'],
    'ecommerce-order-details.html' => ['controller' => 'Ecommerce', 'action' => 'order_details', 'route' => 'ecommerce/order_details', 'view' => 'pages/ecommerce/order_details', 'menu' => 'ecommerce', 'sub' => 'order_details', 'title' => 'Order Details | Conca - Bootstrap Admin Template'],
    'ecommerce-customer-list.html' => ['controller' => 'Ecommerce', 'action' => 'customer_list', 'route' => 'ecommerce/customers', 'view' => 'pages/ecommerce/customer_list', 'menu' => 'ecommerce', 'sub' => 'customer_list', 'title' => 'Customer List | Conca - Bootstrap Admin Template'],
    'ecommerce-customer-details-general.html' => ['controller' => 'Ecommerce', 'action' => 'customer_details_general', 'route' => 'ecommerce/customer_details_general', 'view' => 'pages/ecommerce/customer_details_general', 'menu' => 'ecommerce', 'sub' => 'customer_details_general', 'title' => 'Customer General Details | Conca - Bootstrap Admin Template'],
    'ecommerce-customer-details-security.html' => ['controller' => 'Ecommerce', 'action' => 'customer_details_security', 'route' => 'ecommerce/customer_details_security', 'view' => 'pages/ecommerce/customer_details_security', 'menu' => 'ecommerce', 'sub' => 'customer_details_security', 'title' => 'Customer Security | Conca - Bootstrap Admin Template'],
    'ecommerce-customer-details-payments.html' => ['controller' => 'Ecommerce', 'action' => 'customer_details_payments', 'route' => 'ecommerce/customer_details_payments', 'view' => 'pages/ecommerce/customer_details_payments', 'menu' => 'ecommerce', 'sub' => 'customer_details_payments', 'title' => 'Customer Payments | Conca - Bootstrap Admin Template'],
    'ecommerce-customer-details-address.html' => ['controller' => 'Ecommerce', 'action' => 'customer_details_address', 'route' => 'ecommerce/customer_details_address', 'view' => 'pages/ecommerce/customer_details_address', 'menu' => 'ecommerce', 'sub' => 'customer_details_address', 'title' => 'Customer Address | Conca - Bootstrap Admin Template'],
    'ecommerce-customer-details-notifications.html' => ['controller' => 'Ecommerce', 'action' => 'customer_details_notifications', 'route' => 'ecommerce/customer_details_notifications', 'view' => 'pages/ecommerce/customer_details_notifications', 'menu' => 'ecommerce', 'sub' => 'customer_details_notifications', 'title' => 'Customer Notifications | Conca - Bootstrap Admin Template'],
    'ecommerce-review-list.html' => ['controller' => 'Ecommerce', 'action' => 'review_list', 'route' => 'ecommerce/reviews', 'view' => 'pages/ecommerce/review_list', 'menu' => 'ecommerce', 'sub' => 'review_list', 'title' => 'Customer Reviews | Conca - Bootstrap Admin Template'],
    'ecommerce-settings-general.html' => ['controller' => 'Ecommerce', 'action' => 'settings_general', 'route' => 'ecommerce/settings_general', 'view' => 'pages/ecommerce/settings_general', 'menu' => 'ecommerce', 'sub' => 'settings_general', 'title' => 'Shop Settings General | Conca - Bootstrap Admin Template'],
    'ecommerce-settings-payments.html' => ['controller' => 'Ecommerce', 'action' => 'settings_payments', 'route' => 'ecommerce/settings_payments', 'view' => 'pages/ecommerce/settings_payments', 'menu' => 'ecommerce', 'sub' => 'settings_payments', 'title' => 'Shop Settings Payments | Conca - Bootstrap Admin Template'],
    'ecommerce-settings-shippings.html' => ['controller' => 'Ecommerce', 'action' => 'settings_shippings', 'route' => 'ecommerce/settings_shippings', 'view' => 'pages/ecommerce/settings_shippings', 'menu' => 'ecommerce', 'sub' => 'settings_shippings', 'title' => 'Shop Settings Shipping | Conca - Bootstrap Admin Template'],
    'ecommerce-settings-notifications.html' => ['controller' => 'Ecommerce', 'action' => 'settings_notifications', 'route' => 'ecommerce/settings_notifications', 'view' => 'pages/ecommerce/settings_notifications', 'menu' => 'ecommerce', 'sub' => 'settings_notifications', 'title' => 'Shop Settings Notifications | Conca - Bootstrap Admin Template'],

    // LMS
    'lms-course-list.html' => ['controller' => 'Lms', 'action' => 'course_list', 'route' => 'lms/courses', 'view' => 'pages/lms/course_list', 'menu' => 'lms', 'sub' => 'course_list', 'title' => 'Course List | Conca - Bootstrap Admin Template'],
    'lms-course-grid.html' => ['controller' => 'Lms', 'action' => 'course_grid', 'route' => 'lms/course_grid', 'view' => 'pages/lms/course_grid', 'menu' => 'lms', 'sub' => 'course_grid', 'title' => 'Course Grid | Conca - Bootstrap Admin Template'],
    'lms-course-details.html' => ['controller' => 'Lms', 'action' => 'course_details', 'route' => 'lms/course_details', 'view' => 'pages/lms/course_details', 'menu' => 'lms', 'sub' => 'course_details', 'title' => 'Course Details | Conca - Bootstrap Admin Template'],
    'lms-course-add.html' => ['controller' => 'Lms', 'action' => 'course_add', 'route' => 'lms/course_add', 'view' => 'pages/lms/course_add', 'menu' => 'lms', 'sub' => 'course_add', 'title' => 'Add Course | Conca - Bootstrap Admin Template'],
    'lms-course-edit.html' => ['controller' => 'Lms', 'action' => 'course_edit', 'route' => 'lms/course_edit', 'view' => 'pages/lms/course_edit', 'menu' => 'lms', 'sub' => 'course_edit', 'title' => 'Edit Course | Conca - Bootstrap Admin Template'],

    // Users
    'users-list.html' => ['controller' => 'Users', 'action' => 'index', 'route' => 'users', 'view' => 'pages/users/list', 'menu' => 'users', 'sub' => 'users_list', 'title' => 'User List | Conca - Bootstrap Admin Template'],
    'users-add.html' => ['controller' => 'Users', 'action' => 'add', 'route' => 'users/add', 'view' => 'pages/users/add', 'menu' => 'users', 'sub' => 'users_add', 'title' => 'Add User | Conca - Bootstrap Admin Template'],
    'users-view.html' => ['controller' => 'Users', 'action' => 'view_user', 'route' => 'users/view', 'view' => 'pages/users/view', 'menu' => 'users', 'sub' => 'users_view', 'title' => 'View User | Conca - Bootstrap Admin Template'],

    // Profile
    'user-profile.html' => ['controller' => 'Users', 'action' => 'profile', 'route' => 'profile', 'view' => 'pages/users/profile', 'menu' => 'user_profile', 'sub' => 'profile', 'title' => 'User Profile | Conca - Bootstrap Admin Template'],
    'user-profile-projects.html' => ['controller' => 'Users', 'action' => 'profile_projects', 'route' => 'profile/projects', 'view' => 'pages/users/profile_projects', 'menu' => 'user_profile', 'sub' => 'profile_projects', 'title' => 'User Projects | Conca - Bootstrap Admin Template'],
    'user-profile-team.html' => ['controller' => 'Users', 'action' => 'profile_team', 'route' => 'profile/team', 'view' => 'pages/users/profile_team', 'menu' => 'user_profile', 'sub' => 'profile_team', 'title' => 'User Team | Conca - Bootstrap Admin Template'],
    'user-profile-connections.html' => ['controller' => 'Users', 'action' => 'profile_connections', 'route' => 'profile/connections', 'view' => 'pages/users/profile_connections', 'menu' => 'user_profile', 'sub' => 'profile_connections', 'title' => 'User Connections | Conca - Bootstrap Admin Template'],
    'user-profile-followers.html' => ['controller' => 'Users', 'action' => 'profile_followers', 'route' => 'profile/followers', 'view' => 'pages/users/profile_followers', 'menu' => 'user_profile', 'sub' => 'profile_followers', 'title' => 'User Followers | Conca - Bootstrap Admin Template'],
    'user-profile-activity.html' => ['controller' => 'Users', 'action' => 'profile_activity', 'route' => 'profile/activity', 'view' => 'pages/users/profile_activity', 'menu' => 'user_profile', 'sub' => 'profile_activity', 'title' => 'User Activity | Conca - Bootstrap Admin Template'],

    // Settings
    'user-settings.html' => ['controller' => 'Users', 'action' => 'settings', 'route' => 'settings', 'view' => 'pages/users/settings', 'menu' => 'account', 'sub' => 'settings', 'title' => 'User Settings | Conca - Bootstrap Admin Template'],
    'user-settings-billing.html' => ['controller' => 'Users', 'action' => 'settings_billing', 'route' => 'settings/billing', 'view' => 'pages/users/settings_billing', 'menu' => 'account', 'sub' => 'settings_billing', 'title' => 'Billing Settings | Conca - Bootstrap Admin Template'],
    'user-settings-connection.html' => ['controller' => 'Users', 'action' => 'settings_connection', 'route' => 'settings/connection', 'view' => 'pages/users/settings_connection', 'menu' => 'account', 'sub' => 'settings_connection', 'title' => 'Connection Settings | Conca - Bootstrap Admin Template'],
    'user-settings-notification.html' => ['controller' => 'Users', 'action' => 'settings_notification', 'route' => 'settings/notification', 'view' => 'pages/users/settings_notification', 'menu' => 'account', 'sub' => 'settings_notification', 'title' => 'Notification Settings | Conca - Bootstrap Admin Template'],

    // Auth
    'auth-login-basic.html' => ['controller' => 'Auth', 'action' => 'login_basic', 'route' => 'auth/login_basic', 'view' => 'pages/auth/login_basic', 'menu' => 'auth', 'sub' => 'login_basic', 'title' => 'Login Basic | Conca - Bootstrap Admin Template'],
    'auth-login-cover.html' => ['controller' => 'Auth', 'action' => 'login_cover', 'route' => 'auth/login_cover', 'view' => 'pages/auth/login_cover', 'menu' => 'auth', 'sub' => 'login_cover', 'title' => 'Login Cover | Conca - Bootstrap Admin Template'],
    'auth-register-basic.html' => ['controller' => 'Auth', 'action' => 'register_basic', 'route' => 'auth/register_basic', 'view' => 'pages/auth/register_basic', 'menu' => 'auth', 'sub' => 'register_basic', 'title' => 'Register Basic | Conca - Bootstrap Admin Template'],
    'auth-register-cover.html' => ['controller' => 'Auth', 'action' => 'register_cover', 'route' => 'auth/register_cover', 'view' => 'pages/auth/register_cover', 'menu' => 'auth', 'sub' => 'register_cover', 'title' => 'Register Cover | Conca - Bootstrap Admin Template'],
    'auth-forgot-password-basic.html' => ['controller' => 'Auth', 'action' => 'forgot_password_basic', 'route' => 'auth/forgot_password_basic', 'view' => 'pages/auth/forgot_password_basic', 'menu' => 'auth', 'sub' => 'forgot_password_basic', 'title' => 'Forgot Password Basic | Conca - Bootstrap Admin Template'],
    'auth-forgot-password-cover.html' => ['controller' => 'Auth', 'action' => 'forgot_password_cover', 'route' => 'auth/forgot_password_cover', 'view' => 'pages/auth/forgot_password_cover', 'menu' => 'auth', 'sub' => 'forgot_password_cover', 'title' => 'Forgot Password Cover | Conca - Bootstrap Admin Template'],
    'auth-reset-password-basic.html' => ['controller' => 'Auth', 'action' => 'reset_password_basic', 'route' => 'auth/reset_password_basic', 'view' => 'pages/auth/reset_password_basic', 'menu' => 'auth', 'sub' => 'reset_password_basic', 'title' => 'Reset Password Basic | Conca - Bootstrap Admin Template'],
    'auth-reset-password-cover.html' => ['controller' => 'Auth', 'action' => 'reset_password_cover', 'route' => 'auth/reset_password_cover', 'view' => 'pages/auth/reset_password_cover', 'menu' => 'auth', 'sub' => 'reset_password_cover', 'title' => 'Reset Password Cover | Conca - Bootstrap Admin Template'],
    'auth-two-step-basic.html' => ['controller' => 'Auth', 'action' => 'two_step_basic', 'route' => 'auth/two_step_basic', 'view' => 'pages/auth/two_step_basic', 'menu' => 'auth', 'sub' => 'two_step_basic', 'title' => 'Two Step Verification Basic | Conca - Bootstrap Admin Template'],
    'auth-two-step-cover.html' => ['controller' => 'Auth', 'action' => 'two_step_cover', 'route' => 'auth/two_step_cover', 'view' => 'pages/auth/two_step_cover', 'menu' => 'auth', 'sub' => 'two_step_cover', 'title' => 'Two Step Verification Cover | Conca - Bootstrap Admin Template'],
    'auth-verify-mail-basic.html' => ['controller' => 'Auth', 'action' => 'verify_mail_basic', 'route' => 'auth/verify_mail_basic', 'view' => 'pages/auth/verify_mail_basic', 'menu' => 'auth', 'sub' => 'verify_mail_basic', 'title' => 'Verify Mail Basic | Conca - Bootstrap Admin Template'],
    'auth-verify-mail-cover.html' => ['controller' => 'Auth', 'action' => 'verify_mail_cover', 'route' => 'auth/verify_mail_cover', 'view' => 'pages/auth/verify_mail_cover', 'menu' => 'auth', 'sub' => 'verify_mail_cover', 'title' => 'Verify Mail Cover | Conca - Bootstrap Admin Template'],

    // Errors
    'error-404.html' => ['controller' => 'Errors', 'action' => 'error_404', 'route' => 'errors/error_404', 'view' => 'pages/errors/error_404', 'menu' => 'errors', 'sub' => 'error_404', 'title' => '404 Page Not Found | Conca - Bootstrap Admin Template'],
    'error-500.html' => ['controller' => 'Errors', 'action' => 'error_500', 'route' => 'errors/error_500', 'view' => 'pages/errors/error_500', 'menu' => 'errors', 'sub' => 'error_500', 'title' => '500 Internal Server Error | Conca - Bootstrap Admin Template'],
];

// Add component mappings for all UI, form, table, chart, map files
$compFiles = glob($templateDir . '/*.html');
foreach ($compFiles as $cf) {
    $bf = basename($cf);
    if (!isset($urlMap[$bf])) {
        // Categorize
        $cat = 'components';
        $sub = str_replace('.html', '', $bf);
        $title = ucwords(str_replace(['-', '.html'], [' ', ''], $bf)) . ' | Conca Admin';
        $cleanName = str_replace('-', '_', str_replace('.html', '', $bf));
        $urlMap[$bf] = [
            'controller' => 'Components',
            'action' => $cleanName,
            'route' => 'components/' . $cleanName,
            'view' => 'pages/components/' . $cleanName,
            'menu' => 'components',
            'sub' => $cleanName,
            'title' => $title
        ];
    }
}

// Function to convert links and assets in HTML
function convertHtml($html, $urlMap) {
    // Replace assets paths
    $html = preg_replace('/href="assets\//', 'href="<?= base_url(\'assets/\'); ?>', $html);
    $html = preg_replace('/src="assets\//', 'src="<?= base_url(\'assets/\'); ?>', $html);
    $html = preg_replace('/href="image\//', 'href="<?= base_url(\'image/\'); ?>', $html);
    $html = preg_replace('/src="image\//', 'src="<?= base_url(\'image/\'); ?>', $html);

    // Replace HTML page links with site_url
    foreach ($urlMap as $file => $meta) {
        $html = str_replace('href="' . $file . '"', 'href="<?= site_url(\'' . $meta['route'] . '\'); ?>"', $html);
        $html = str_replace("href='" . $file . "'", "href='<?= site_url('" . $meta['route'] . "'); ?>'", $html);
    }

    return $html;
}

echo "Step 1: Extracting master layouts from index.html...\n";
$indexContent = file_get_contents($templateDir . '/index.html');

// 1. layouts/header.php
// From <!DOCTYPE to right before <div id="app-sidebar"
$sidebarPos = strpos($indexContent, '<!-- app sidebar start -->');
if (!$sidebarPos) $sidebarPos = strpos($indexContent, '<div id="app-sidebar"');
$headerHtml = substr($indexContent, 0, $sidebarPos);
// Clean header
$headerPhp = <<<PHP
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= isset(\$page_title) ? \$page_title : 'Conca - Bootstrap Admin Template' ?></title>

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo/favicon.png'); ?>" type="image/x-icon">

    <!-- global style sheet for all pages -->
    <link id="bootstrap-css" rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/conca.css'); ?>">

    <?php if (!empty(\$extra_css)): ?>
        <?php foreach (\$extra_css as \$css): ?>
            <link rel="stylesheet" type="text/css" href="<?= base_url(\$css); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <div class="app-main">
        <!-- app wrapper start -->
        <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">
PHP;
file_put_contents($appDir . '/views/layouts/header.php', $headerPhp);
echo " - Created layouts/header.php\n";

// 2. layouts/sidebar.php
// From <div id="app-sidebar" to </div> <!-- app sidebar end -->
$sidebarEndPos = strpos($indexContent, '<!-- app sidebar end -->');
if ($sidebarEndPos !== false) {
    $sidebarEndPos += strlen('<!-- app sidebar end -->');
    $sidebarRaw = substr($indexContent, $sidebarPos, $sidebarEndPos - $sidebarPos);
} else {
    $headerStartPos = strpos($indexContent, '<!-- app header start -->');
    $sidebarRaw = substr($indexContent, $sidebarPos, $headerStartPos - $sidebarPos);
}

// Convert sidebar links and assets
$sidebarConverted = convertHtml($sidebarRaw, $urlMap);

// Add dynamic active classes to menu items
// Let's replace top-level and submenu items with PHP conditionals if appropriate
file_put_contents($appDir . '/views/layouts/sidebar.php', $sidebarConverted);
echo " - Created layouts/sidebar.php\n";

// 3. layouts/navbar.php
// From <!-- app header start --> or <div class="app-header to <!-- app header end --> or <div class="app-content-wrapper
$headerStartPos = strpos($indexContent, '<!-- app header start -->');
if (!$headerStartPos) $headerStartPos = strpos($indexContent, '<div class="app-dir-wrapper');
if (!$headerStartPos) $headerStartPos = strpos($indexContent, '<div class="app-header');

$contentStartPos = strpos($indexContent, '<!-- app content start -->');
if (!$contentStartPos) $contentStartPos = strpos($indexContent, '<div class="app-content-wrapper');

$navbarRaw = substr($indexContent, $headerStartPos, $contentStartPos - $headerStartPos);
$navbarConverted = convertHtml($navbarRaw, $urlMap);
file_put_contents($appDir . '/views/layouts/navbar.php', $navbarConverted);
echo " - Created layouts/navbar.php\n";

// 4. layouts/footer.php
$footerPhp = <<<PHP
            <footer class="app-footer mt-auto py-3 text-center">
                <div class="container">
                    <span class="text-muted"> Copyright ©
                        <span id="footer-year"><?= date('Y'); ?></span>
                        Make with <span class="text-danger">❤️</span> by <a href="https://themeforest.net/user/aqlova" target="_blank" class="footer-link text-primary fw-medium">Aqlova</a> All rights reserved
                    </span>
                </div>
            </footer>

            <div class="app-backdrop"></div>
            <!-- app content end -->
        </div>
        <!-- app wrapper end -->
    </div>

    <!-- global js scripts for all pages -->
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>

    <!-- app js -->
    <script src="<?= base_url('assets/js/conca-sidebar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/conca.js'); ?>"></script>

    <?php if (!empty(\$extra_js)): ?>
        <?php foreach (\$extra_js as \$js): ?>
            <?php if (str_starts_with(trim(\$js), '<script')): ?>
                <?= \$js ?>
            <?php else: ?>
                <script src="<?= base_url(\$js); ?>"></script>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
PHP;
file_put_contents($appDir . '/views/layouts/footer.php', $footerPhp);
echo " - Created layouts/footer.php\n";

// 5. Auth Header and Footer
$authHeaderPhp = <<<PHP
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= isset(\$page_title) ? \$page_title : 'Conca - Bootstrap Admin Template' ?></title>

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo/favicon.png'); ?>" type="image/x-icon">

    <!-- global style sheet for all pages -->
    <link id="bootstrap-css" rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/conca.css'); ?>">

    <?php if (!empty(\$extra_css)): ?>
        <?php foreach (\$extra_css as \$css): ?>
            <link rel="stylesheet" type="text/css" href="<?= base_url(\$css); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
PHP;
file_put_contents($appDir . '/views/layouts/auth_header.php', $authHeaderPhp);

$authFooterPhp = <<<PHP
    <!-- global js scripts for all pages -->
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>

    <!-- app js -->
    <script src="<?= base_url('assets/js/conca-sidebar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/conca.js'); ?>"></script>

    <?php if (!empty(\$extra_js)): ?>
        <?php foreach (\$extra_js as \$js): ?>
            <?php if (str_starts_with(trim(\$js), '<script')): ?>
                <?= \$js ?>
            <?php else: ?>
                <script src="<?= base_url(\$js); ?>"></script>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
PHP;
file_put_contents($appDir . '/views/layouts/auth_footer.php', $authFooterPhp);
echo " - Created layouts/auth_header.php and auth_footer.php\n";

echo "Step 2: Processing all 60 populated HTML pages...\n";
$pageMeta = [];

foreach ($urlMap as $file => $meta) {
    $filePath = $templateDir . '/' . $file;
    if (!file_exists($filePath) || filesize($filePath) == 0) {
        continue;
    }

    $raw = file_get_contents($filePath);

    // Extract title
    if (preg_match('/<title>(.*?)<\/title>/is', $raw, $tm)) {
        $meta['title'] = trim($tm[1]);
    }

    // Extract extra css
    preg_match_all('/<link[^>]+href=["\']([^"\']+)["\']/i', $raw, $linkMatches);
    $extraCss = [];
    foreach ($linkMatches[1] as $href) {
        if (!str_contains($href, 'bootstrap.css') && 
            !str_contains($href, 'perfect-scrollbar.css') && 
            !str_contains($href, 'conca.css') && 
            !str_contains($href, 'favicon.png')) {
            $extraCss[] = $href;
        }
    }
    $meta['extra_css'] = $extraCss;

    // Extract extra js after conca.js
    $extraJs = [];
    if (preg_match('/<script[^>]+src=["\'][^"\']*conca\.js["\'][^>]*><\/script>(.*?)<\/body>/is', $raw, $jm)) {
        $after = trim($jm[1]);
        if (!empty($after)) {
            // Find script tags with src
            preg_match_all('/<script[^>]+src=["\']([^"\']+)["\'][^>]*><\/script>/i', $after, $srcMatches);
            foreach ($srcMatches[1] as $src) {
                $src = trim($src);
                if (!empty($src)) {
                    $extraJs[] = $src;
                }
            }
            // Find inline script tags (without src)
            preg_match_all('/<script(?![^>]*src=)[^>]*>.*?<\/script>/is', $after, $inlineMatches);
            foreach ($inlineMatches[0] as $inline) {
                $inline = trim($inline);
                if (!empty($inline)) {
                    $extraJs[] = $inline;
                }
            }
        }
    }
    $meta['extra_js'] = $extraJs;

    // Check if admin page or auth page
    $isAuth = str_starts_with($file, 'auth-') || str_starts_with($file, 'error-');

    if ($isAuth) {
        // Extract content between <body> and <!-- global js scripts
        $bodyStart = strpos($raw, '<body>');
        if ($bodyStart !== false) {
            $bodyStart += strlen('<body>');
        } else {
            $bodyStart = 0;
        }
        $scriptStart = strpos($raw, '<!-- global js scripts');
        if (!$scriptStart) $scriptStart = strpos($raw, '<script src="assets/vendor/libs/jquery');
        
        $bodyContent = substr($raw, $bodyStart, $scriptStart - $bodyStart);
        $convertedBody = convertHtml($bodyContent, $urlMap);

        $targetViewFile = $appDir . '/views/' . $meta['view'] . '.php';
        @mkdir(dirname($targetViewFile), 0777, true);
        file_put_contents($targetViewFile, trim($convertedBody));
        echo " - Extracted Auth/Error view: " . $meta['view'] . ".php\n";
    } else {
        // Extract content between <div class="app-content-wrapper and <footer class="app-footer
        $contentStart = strpos($raw, '<div class="app-content-wrapper');
        $footerPos = strpos($raw, '<footer class="app-footer');
        if ($contentStart !== false && $footerPos !== false) {
            $mainContent = substr($raw, $contentStart, $footerPos - $contentStart);
            // Trim any closing divs that belonged to app content end wrapper if present
            $mainContent = preg_replace('/<\/div>\s*<!--\s*app content end\s*-->\s*$/i', '', trim($mainContent));
            $convertedContent = convertHtml($mainContent, $urlMap);

            $targetViewFile = $appDir . '/views/' . $meta['view'] . '.php';
            @mkdir(dirname($targetViewFile), 0777, true);
            file_put_contents($targetViewFile, trim($convertedContent));
            echo " - Extracted Admin view: " . $meta['view'] . ".php\n";
        } else {
            echo " ! Warning: could not find delimiters for $file\n";
        }
    }

    $pageMeta[$file] = $meta;
}

echo "Step 3: Creating fallback showcase view for 0-byte components...\n";
$compShowcaseView = <<<PHP
<div class="app-content-wrapper pt-13 pb-13 px-5">
    <div class="container-fluid">
        <div class="page-header pb-7">
            <h2 class="fw-semibold fs-7"><?= isset(\$page_title) ? \$page_title : 'UI Component' ?></h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Components</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= isset(\$component_name) ? \$component_name : 'Component' ?></li>
                </ol>
            </nav>
        </div>

        <div class="page-content">
            <div class="row g-6">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-card py-4 px-6 d-flex align-items-center justify-content-between">
                            <h5 class="card-title mb-0"><?= isset(\$component_name) ? \$component_name : 'Component' ?> Demonstration</h5>
                            <span class="badge bg-primary rounded-pill">CodeIgniter 3 Integrated</span>
                        </div>
                        <div class="card-body p-6">
                            <p class="text-muted mb-6">
                                This component is part of the <strong>Conca Bootstrap 5 Admin Template</strong>, fully integrated into CodeIgniter 3.
                            </p>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="border rounded p-4">
                                        <h6 class="fw-semibold mb-3">Interactive Element Preview</h6>
                                        <div class="d-flex flex-wrap gap-2 mb-4">
                                            <button type="button" class="btn btn-primary">Primary</button>
                                            <button type="button" class="btn btn-secondary">Secondary</button>
                                            <button type="button" class="btn btn-success">Success</button>
                                            <button type="button" class="btn btn-info">Info</button>
                                            <button type="button" class="btn btn-warning">Warning</button>
                                            <button type="button" class="btn btn-danger">Danger</button>
                                        </div>
                                        <div class="alert alert-primary mb-0" role="alert">
                                            Sample alert notification for <?= isset(\$component_name) ? \$component_name : 'this component' ?>.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border rounded p-4">
                                        <h6 class="fw-semibold mb-3">Component Information</h6>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                Template Status
                                                <span class="badge bg-success">Active & Integrated</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                Framework
                                                <span class="badge bg-dark">CodeIgniter 3.1.13</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                UI Library
                                                <span class="badge bg-info">Bootstrap 5 + Conca Assets</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 text-end">
                                <a href="<?= site_url('dashboard'); ?>" class="btn btn-outline-primary">Return to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
PHP;
file_put_contents($appDir . '/views/pages/components/showcase.php', $compShowcaseView);

// Create empty component view files so all view files exist
foreach ($urlMap as $file => $meta) {
    if (!isset($pageMeta[$file])) {
        $targetViewFile = $appDir . '/views/' . $meta['view'] . '.php';
        @mkdir(dirname($targetViewFile), 0777, true);
        file_put_contents($targetViewFile, $compShowcaseView);
        $pageMeta[$file] = $meta;
    }
}

echo "Step 4: Writing CodeIgniter 3 Controllers...\n";

// Save $pageMeta to a json file for controllers and router
file_put_contents($rootDir . '/tools/page_meta.json', json_encode($pageMeta, JSON_PRETTY_PRINT));

echo "Done step 1-4 successfully.\n";
