<?php
$files = glob('admin-template/*.html');
$has_content = [];
foreach ($files as $f) {
    if (filesize($f) > 0) {
        $has_content[] = basename($f);
    }
}
echo 'Count with content: ' . count($has_content) . PHP_EOL;

foreach ($has_content as $f) {
    $c = file_get_contents('admin-template/' . $f);
    $has_sidebar = strpos($c, 'app-sidebar') !== false;
    $has_header = strpos($c, 'app-header') !== false;
    $has_wrapper = strpos($c, 'app-content-wrapper') !== false;
    $has_footer = strpos($c, 'app-footer') !== false;
    if (!$has_sidebar || !$has_header || !$has_wrapper || !$has_footer) {
        echo 'Special layout: ' . $f . ' (sidebar: ' . ($has_sidebar?'1':'0') . ', header: ' . ($has_header?'1':'0') . ', wrapper: ' . ($has_wrapper?'1':'0') . ', footer: ' . ($has_footer?'1':'0') . ')' . PHP_EOL;
    }
}
