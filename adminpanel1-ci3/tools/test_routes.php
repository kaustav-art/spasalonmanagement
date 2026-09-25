<?php
$routes = [
    'dashboard',
    'dashboard/academy',
    'dashboard/analytics',
    'dashboard/crm',
    'dashboard/hrm',
    'apps/chat',
    'apps/pos',
    'ecommerce/products',
    'ecommerce/product_add',
    'ecommerce/orders',
    'ecommerce/customers',
    'lms/courses',
    'users',
    'profile',
    'settings',
    'auth/login_basic',
    'auth/register_cover',
    'errors/error_404',
    'components/ui_accordion',
    'index.html',
    'ecommerce-product-list.html'
];

$allPassed = true;
foreach ($routes as $r) {
    $output = shell_exec('php index.php ' . escapeshellarg($r));
    $len = strlen($output);
    $hasError = (strpos($output, 'A PHP Error was encountered') !== false ||
                 strpos($output, 'Fatal error') !== false ||
                 strpos($output, 'Parse error') !== false);
    if ($hasError) {
        $allPassed = false;
        echo "FAIL: $r\n$output\n";
    } else {
        echo "OK: $r ($len bytes)\n";
    }
}

if ($allPassed) {
    echo "\n>>> ALL TESTED ROUTES PASSED PERFECTLY! <<<\n";
} else {
    echo "\n>>> SOME ROUTES HAD ERRORS! <<<\n";
}
