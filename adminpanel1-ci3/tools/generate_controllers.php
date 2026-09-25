<?php
/**
 * Generate CodeIgniter 3 Controllers from page_meta.json
 */

$rootDir = dirname(__DIR__);
$pageMeta = json_decode(file_get_contents($rootDir . '/tools/page_meta.json'), true);
$controllerDir = $rootDir . '/application/controllers';

// Group by controller
$byController = [];
foreach ($pageMeta as $file => $meta) {
    $ctrl = $meta['controller'];
    if (!isset($byController[$ctrl])) {
        $byController[$ctrl] = [];
    }
    $byController[$ctrl][$meta['action']] = $meta;
}

// Generate each controller
foreach ($byController as $ctrlName => $actions) {
    $isAuth = ($ctrlName === 'Auth' || $ctrlName === 'Errors');

    $php = "<?php\n";
    $php .= "defined('BASEPATH') OR exit('No direct script access allowed');\n\n";
    $php .= "#[\\AllowDynamicProperties]\n";
    $php .= "class {$ctrlName} extends MY_Controller {\n\n";
    $php .= "    public function __construct() {\n";
    $php .= "        parent::__construct();\n";
    $php .= "    }\n\n";

    foreach ($actions as $actionName => $meta) {
        $title = addslashes($meta['title'] ?? 'Conca Admin');
        $view = $meta['view'];
        $menu = $meta['menu'] ?? '';
        $sub = $meta['sub'] ?? '';
        $extraCss = var_export($meta['extra_css'] ?? [], true);
        $extraJs = var_export($meta['extra_js'] ?? [], true);
        $renderMethod = $isAuth ? 'render_auth' : 'render';

        $php .= "    /**\n";
        $php .= "     * {$title}\n";
        $php .= "     */\n";
        $php .= "    public function {$actionName}() {\n";
        $php .= "        \$data = [\n";
        $php .= "            'page_title' => '{$title}',\n";
        $php .= "            'active_menu' => '{$menu}',\n";
        $php .= "            'active_submenu' => '{$sub}',\n";
        $php .= "            'component_name' => '" . ucwords(str_replace('_', ' ', $actionName)) . "',\n";
        $php .= "            'extra_css' => {$extraCss},\n";
        $php .= "            'extra_js' => {$extraJs}\n";
        $php .= "        ];\n";
        $php .= "        \$this->{$renderMethod}('{$view}', \$data);\n";
        $php .= "    }\n\n";
    }

    $php .= "}\n";

    file_put_contents($controllerDir . '/' . $ctrlName . '.php', $php);
    echo "Generated controller: {$ctrlName}.php with " . count($actions) . " actions.\n";
}

echo "Generating routes.php...\n";

$routesContent = "<?php\n";
$routesContent .= "defined('BASEPATH') OR exit('No direct script access allowed');\n\n";
$routesContent .= "/*\n| -------------------------------------------------------------------------\n| URI ROUTING\n| -------------------------------------------------------------------------\n*/\n\n";
$routesContent .= "\$route['default_controller'] = 'dashboard';\n";
$routesContent .= "\$route['404_override'] = 'errors/error_404';\n";
$routesContent .= "\$route['translate_uri_dashes'] = FALSE;\n\n";
$routesContent .= "// Clean dashboard routes\n";
$routesContent .= "\$route['dashboard'] = 'dashboard/index';\n";
$routesContent .= "\$route['login'] = 'auth/login_basic';\n";
$routesContent .= "\$route['register'] = 'auth/register_basic';\n";
$routesContent .= "\$route['logout'] = 'auth/login_basic';\n";
$routesContent .= "\$route['forgot-password'] = 'auth/forgot_password_basic';\n";
$routesContent .= "\$route['chat'] = 'apps/chat';\n";
$routesContent .= "\$route['pos'] = 'apps/pos';\n";
$routesContent .= "\$route['products'] = 'ecommerce/product_list';\n";
$routesContent .= "\$route['users'] = 'users/index';\n";
$routesContent .= "\$route['profile'] = 'users/profile';\n";
$routesContent .= "\$route['settings'] = 'users/settings';\n\n";

$routesContent .= "// Direct routes for all template actions\n";
foreach ($pageMeta as $file => $meta) {
    $ctrl = strtolower($meta['controller']);
    $act = $meta['action'];
    $r = $meta['route'];
    if ($r !== 'dashboard') {
        $routesContent .= "\$route['{$r}'] = '{$ctrl}/{$act}';\n";
    }
    // Also support .html suffix so any old or external links work seamlessly!
    $routesContent .= "\$route['{$file}'] = '{$ctrl}/{$act}';\n";
}

file_put_contents($rootDir . '/application/config/routes.php', $routesContent);
echo "Generated routes.php with aliases and .html compatibility.\n";
