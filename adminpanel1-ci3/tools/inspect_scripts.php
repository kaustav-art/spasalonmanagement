<?php
$files = glob('admin-template/*.html');
$page_scripts = [];
$page_styles = [];

foreach ($files as $f) {
    if (filesize($f) == 0) continue;
    $name = basename($f);
    $c = file_get_contents($f);
    
    // Check styles in head beyond bootstrap, perfect-scrollbar, conca.css
    preg_match_all('/<link[^>]+href=["\']([^"\']+)["\']/i', $c, $matches);
    $extras_css = [];
    foreach ($matches[1] as $href) {
        if (!str_contains($href, 'bootstrap.css') && 
            !str_contains($href, 'perfect-scrollbar.css') && 
            !str_contains($href, 'conca.css') && 
            !str_contains($href, 'favicon.png')) {
            $extras_css[] = $href;
        }
    }
    if (!empty($extras_css)) {
        $page_styles[$name] = $extras_css;
    }
    
    // Check scripts after conca.js
    if (preg_match('/<script[^>]+src=["\'][^"\']*conca\.js["\'][^>]*><\/script>(.*?)<\/body>/is', $c, $m)) {
        $after = trim($m[1]);
        if (!empty($after)) {
            $page_scripts[$name] = $after;
        }
    }
}

echo "Pages with extra CSS:\n";
print_r($page_styles);

echo "\nPages with extra scripts count: " . count($page_scripts) . "\n";
foreach ($page_scripts as $page => $scripts) {
    echo "$page => " . str_replace("\n", " ", strip_tags($scripts)) . " (raw: $scripts)\n";
}
