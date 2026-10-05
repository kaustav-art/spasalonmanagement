<?php
/**
 * SaaS Automated Tenant Provisioning Engine
 * Creates tenant folder (e.g. www.example.com), copies website & admin files,
 * configures branding (logo/favicon), provisions isolated tenant database & admin user.
 */
header('Content-Type: application/json; charset=utf-8');

// Ensure script execution time limit is sufficient for copying
@set_time_limit(180);
@ini_set('memory_limit', '256M');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method. POST required.']);
    exit;
}

try {
    $master_pdo = new PDO('mysql:host=localhost;dbname=spasalon_db;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Master database connection failed: ' . $e->getMessage()]);
    exit;
}

// 1. Inputs & Sanitization
$order_number = isset($_POST['order_number']) ? trim($_POST['order_number']) : '';
$raw_domain = isset($_POST['domain']) ? trim($_POST['domain']) : '';
$company_name = isset($_POST['company_name']) ? trim($_POST['company_name']) : '';
$tagline = isset($_POST['tagline']) ? trim($_POST['tagline']) : 'Premium Beauty & Rejuvenating Wellness';
$company_email = isset($_POST['company_email']) ? trim($_POST['company_email']) : '';
$company_phone = isset($_POST['company_phone']) ? trim($_POST['company_phone']) : '';
$company_address = isset($_POST['company_address']) ? trim($_POST['company_address']) : '742 Fashion Avenue, Suite 100';
$currency_symbol = isset($_POST['currency_symbol']) ? trim($_POST['currency_symbol']) : '$';
$admin_name = isset($_POST['admin_name']) ? trim($_POST['admin_name']) : '';
$admin_email = isset($_POST['admin_email']) ? trim($_POST['admin_email']) : '';
$admin_password = isset($_POST['admin_password']) ? trim($_POST['admin_password']) : '';

$plan_code = isset($_POST['plan_code']) ? strtoupper(trim($_POST['plan_code'])) : '';
$chosen_template = isset($_POST['chosen_template']) ? trim($_POST['chosen_template']) : '';
$chosen_layout = isset($_POST['chosen_layout']) ? (int)$_POST['chosen_layout'] : 1;

// If order number provided, fetch and populate missing details
$order = null;
if (!empty($order_number)) {
    $stmt_o = $master_pdo->prepare("SELECT * FROM marketplace_orders WHERE order_number = ? LIMIT 1");
    $stmt_o->execute([$order_number]);
    $order = $stmt_o->fetch();
    if ($order) {
        if (empty($plan_code)) $plan_code = $order->plan_code;
        if (empty($chosen_template)) $chosen_template = $order->chosen_template;
        if (empty($chosen_layout)) $chosen_layout = (int)$order->chosen_layout;
        if (empty($company_name) && !empty($order->business_name)) $company_name = $order->business_name;
        if (empty($company_email) && !empty($order->customer_email)) $company_email = $order->customer_email;
        if (empty($admin_email) && !empty($order->customer_email)) $admin_email = $order->customer_email;
        if (empty($admin_name) && !empty($order->customer_name)) $admin_name = $order->customer_name;
    }
}

// Fallbacks
if (empty($plan_code) || !in_array($plan_code, ['SALON', 'SPA', 'SALON_SPA'])) {
    $plan_code = 'SALON_SPA';
}
if (empty($chosen_template) || !in_array($chosen_template, ['template1', 'template2'])) {
    $chosen_template = 'template1';
}
if (!in_array($chosen_layout, [1, 2, 3])) {
    $chosen_layout = 1;
}
if (empty($company_name)) {
    $company_name = 'My Salon & Spa';
}
if (empty($company_email)) {
    $company_email = 'contact@' . ($raw_domain ?: 'example.com');
}
if (empty($admin_name)) {
    $admin_name = 'Administrator';
}
if (empty($admin_email)) {
    $admin_email = $company_email;
}
if (empty($admin_password)) {
    $admin_password = 'admin' . rand(1000, 9999);
}

// 2. Validate & Clean Domain
if (empty($raw_domain)) {
    echo json_encode(['status' => 'error', 'message' => 'Please provide a domain (e.g. www.example.com).']);
    exit;
}

// Remove http://, https://, and trailing slashes
$clean_domain = preg_replace('#^https?://#i', '', $raw_domain);
$clean_domain = trim(rtrim($clean_domain, '/\\'));
$clean_domain = strtolower($clean_domain);

// Validate domain format (letters, digits, dots, hyphens)
if (!preg_match('/^[a-z0-9]([a-z0-9\-\.]*[a-z0-9])?$/i', $clean_domain) || strlen($clean_domain) < 3) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid domain format. Use format like www.example.com or mysalon.com']);
    exit;
}

// Reserved system folder check
$reserved = [
    'admin', 'website', 'superadmin', 'database', 'uploads', 'assets', 'system',
    'application', 'template1', 'template2', 'admin-template', 'adminpanel1-ci3'
];
if (in_array($clean_domain, $reserved)) {
    echo json_encode(['status' => 'error', 'message' => "The domain/folder name '$clean_domain' is reserved by the SaaS platform."]);
    exit;
}

$tenant_dir = __DIR__ . DIRECTORY_SEPARATOR . $clean_domain;

// Check if tenant domain is already registered in database
$stmt_check = $master_pdo->prepare("SELECT id FROM saas_tenants WHERE domain = ? LIMIT 1");
$stmt_check->execute([$clean_domain]);
if ($stmt_check->fetch()) {
    echo json_encode(['status' => 'error', 'message' => "The domain '$clean_domain' has already been provisioned."]);
    exit;
}

// 3. Fast Copy Helper (Uses robocopy on Windows for sub-second copy, with fallback)
function copy_recursive_fast($source, $dest) {
    if (!is_dir($source)) return false;
    if (!file_exists($dest)) {
        @mkdir($dest, 0755, true);
    }

    $is_windows = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');
    if ($is_windows) {
        $src_win = str_replace('/', '\\', realpath($source));
        $dst_win = str_replace('/', '\\', $dest);
        // robocopy returns exit code 0 to 7 on success (1 = files copied)
        $cmd = "robocopy \"$src_win\" \"$dst_win\" /E /NFL /NDL /NJH /NJS /R:1 /W:1";
        @exec($cmd, $out, $ret);
        if ($ret <= 7 && file_exists($dest . DIRECTORY_SEPARATOR . 'index.php')) {
            return true;
        }
    }

    // Fallback standard PHP copy
    $dir = opendir($source);
    while (false !== ($file = readdir($dir))) {
        if ($file === '.' || $file === '..' || $file === '.git') continue;
        $src_file = $source . DIRECTORY_SEPARATOR . $file;
        $dst_file = $dest . DIRECTORY_SEPARATOR . $file;
        if (is_dir($src_file)) {
            copy_recursive_fast($src_file, $dst_file);
        } else {
            @copy($src_file, $dst_file);
        }
    }
    closedir($dir);
    return true;
}

// Helper to remove directory recursively
function remove_dir_recursive($dir) {
    if (!file_exists($dir)) return true;
    if (!is_dir($dir)) return @unlink($dir);
    $items = scandir($dir);
    if ($items === false) return false;
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_dir($path)) {
            remove_dir_recursive($path);
        } else {
            @unlink($path);
        }
    }
    return @rmdir($dir);
}

// 4. Create Tenant Folder & Copy Files
try {
    if (!file_exists($tenant_dir)) {
        @mkdir($tenant_dir, 0755, true);
    }

    // Step A: Copy Frontend Website files into root of tenant directory
    $website_src = __DIR__ . DIRECTORY_SEPARATOR . 'website';
    copy_recursive_fast($website_src, $tenant_dir);

    // Step B: Copy Admin Panel files into tenant_dir/admin
    $admin_src = __DIR__ . DIRECTORY_SEPARATOR . 'admin';
    $tenant_admin_dir = $tenant_dir . DIRECTORY_SEPARATOR . 'admin';
    copy_recursive_fast($admin_src, $tenant_admin_dir);

    // Step C: Prune unselected template files so tenant views and assets contain ONLY the chosen template
    $views_dir = $tenant_dir . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'views';
    $assets_dir = $tenant_dir . DIRECTORY_SEPARATOR . 'assets';
    $known_templates = ['template1', 'template2'];
    foreach ($known_templates as $tpl) {
        if ($tpl !== $chosen_template) {
            $unselected_view = $views_dir . DIRECTORY_SEPARATOR . $tpl;
            $unselected_asset = $assets_dir . DIRECTORY_SEPARATOR . $tpl;
            if (is_dir($unselected_view)) {
                remove_dir_recursive($unselected_view);
            }
            if (is_dir($unselected_asset)) {
                remove_dir_recursive($unselected_asset);
            }
        }
    }

    // Ensure install.lock files exist
    @file_put_contents($tenant_dir . DIRECTORY_SEPARATOR . 'install.lock', "Tenant provisioned on " . date('Y-m-d H:i:s') . "\nDomain: $clean_domain");
    @file_put_contents($tenant_admin_dir . DIRECTORY_SEPARATOR . 'install.lock', "Tenant provisioned on " . date('Y-m-d H:i:s') . "\nDomain: $clean_domain");

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'File provisioning failed: ' . $e->getMessage()]);
    exit;
}

// 5. Handle Uploaded Logo & Favicon
$tenant_uploads_dir = $tenant_dir . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'branding';
$tenant_admin_uploads_dir = $tenant_admin_dir . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'branding';
@mkdir($tenant_uploads_dir, 0755, true);
@mkdir($tenant_admin_uploads_dir, 0755, true);

$logo_rel_path = 'uploads/branding/logo.png';
$favicon_rel_path = 'uploads/branding/favicon.png';

// Process Logo
if (isset($_FILES['company_logo']) && $_FILES['company_logo']['error'] === UPLOAD_ERR_OK) {
    $ext = strtolower(pathinfo($_FILES['company_logo']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, ['png', 'jpg', 'jpeg', 'webp', 'svg'])) {
        $logo_filename = 'logo_' . time() . '.' . $ext;
        $dest_logo = $tenant_uploads_dir . DIRECTORY_SEPARATOR . $logo_filename;
        if (@move_uploaded_file($_FILES['company_logo']['tmp_name'], $dest_logo)) {
            @copy($dest_logo, $tenant_admin_uploads_dir . DIRECTORY_SEPARATOR . $logo_filename);
            $logo_rel_path = 'uploads/branding/' . $logo_filename;
        }
    }
} else {
    // Copy fallback logo from main uploads/branding if available
    $sample_logo = __DIR__ . '/uploads/branding/landing_site_logo_1790257980_361.png';
    if (file_exists($sample_logo)) {
        @copy($sample_logo, $tenant_uploads_dir . '/logo.png');
        @copy($sample_logo, $tenant_admin_uploads_dir . '/logo.png');
    }
}

// Process Favicon
if (isset($_FILES['favicon']) && $_FILES['favicon']['error'] === UPLOAD_ERR_OK) {
    $ext = strtolower(pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, ['ico', 'png', 'webp'])) {
        $fav_filename = 'favicon_' . time() . '.' . $ext;
        $dest_fav = $tenant_uploads_dir . DIRECTORY_SEPARATOR . $fav_filename;
        if (@move_uploaded_file($_FILES['favicon']['tmp_name'], $dest_fav)) {
            @copy($dest_fav, $tenant_admin_uploads_dir . DIRECTORY_SEPARATOR . $fav_filename);
            $favicon_rel_path = 'uploads/branding/' . $fav_filename;
        }
    }
} else {
    $sample_fav = __DIR__ . '/uploads/branding/landing_site_favicon_1790256709_537.png';
    if (file_exists($sample_fav)) {
        @copy($sample_fav, $tenant_uploads_dir . '/favicon.png');
        @copy($sample_fav, $tenant_admin_uploads_dir . '/favicon.png');
    }
}

// 6. Tenant Isolated Database Provisioning
// Create clean database name: max 64 chars in MySQL
$clean_db_suffix = preg_replace('/[^a-zA-Z0-9_]/', '_', $clean_domain);
$tenant_db_name = substr('spasalon_t_' . $clean_db_suffix, 0, 60);

try {
    $db_pdo = new PDO('mysql:host=localhost', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // Create Tenant Database
    $db_pdo->exec("CREATE DATABASE IF NOT EXISTS `$tenant_db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $db_pdo->exec("USE `$tenant_db_name`");

    // Import Schema
    $schema_file = __DIR__ . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'schema.sql';
    if (file_exists($schema_file)) {
        $sql = file_get_contents($schema_file);
        $db_pdo->exec("SET FOREIGN_KEY_CHECKS = 0;");
        $statements = array_filter(array_map('trim', explode(';', $sql)));
        foreach ($statements as $stmt_sql) {
            if (!empty($stmt_sql)) {
                $db_pdo->exec($stmt_sql);
            }
        }
        $db_pdo->exec("SET FOREIGN_KEY_CHECKS = 1;");
    }

    // Migrate Template Dummy Services & Blogs from Master Database (spasalon_db) for chosen template & layout
    try {
        $db_pdo->exec("
            CREATE TABLE IF NOT EXISTS blogs (
                id int(11) NOT NULL AUTO_INCREMENT,
                title varchar(255) NOT NULL,
                slug varchar(255) NOT NULL,
                thumbnail varchar(255) DEFAULT NULL,
                author_name varchar(100) DEFAULT 'Admin',
                published_date date DEFAULT NULL,
                short_desc text DEFAULT NULL,
                content longtext DEFAULT NULL,
                tags varchar(255) DEFAULT NULL,
                sort_order int(11) DEFAULT 0,
                status enum('active','inactive') DEFAULT 'active',
                created_at datetime DEFAULT current_timestamp(),
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

        $stmt_ms = $master_pdo->prepare("SELECT * FROM template_services WHERE template_key = ? AND layout_number = ? ORDER BY sort_order ASC");
        $stmt_ms->execute([$chosen_template, $chosen_layout]);
        $m_services = $stmt_ms->fetchAll(PDO::FETCH_ASSOC);
        if (empty($m_services)) {
            $stmt_ms2 = $master_pdo->prepare("SELECT * FROM template_services WHERE template_key = ? ORDER BY sort_order ASC");
            $stmt_ms2->execute([$chosen_template]);
            $m_services = $stmt_ms2->fetchAll(PDO::FETCH_ASSOC);
        }

        if (!empty($m_services)) {
            $db_pdo->exec("SET FOREIGN_KEY_CHECKS=0; TRUNCATE TABLE services; TRUNCATE TABLE template_services; SET FOREIGN_KEY_CHECKS=1;");
            $cat_stmt = $db_pdo->query("SELECT id FROM service_categories LIMIT 1");
            $cat_res = $cat_stmt ? $cat_stmt->fetch(PDO::FETCH_ASSOC) : null;
            $c_id = $cat_res ? (int)$cat_res['id'] : 1;

            $ins_s = $db_pdo->prepare("INSERT INTO services (category_id, name, slug, type, price, duration, image, description, status) VALUES (?, ?, ?, 'both', ?, ?, ?, ?, ?)");
            $ins_ts = $db_pdo->prepare("INSERT INTO template_services (template_key, layout_number, title, slug, icon, thumbnail, banner_image, short_desc, description, price, duration, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            foreach ($m_services as $s) {
                $dur_m = (int)preg_replace('/[^0-9]/', '', $s['duration']) ?: 60;
                $ins_s->execute([$c_id, $s['title'], $s['slug'], $s['price'], $dur_m, $s['thumbnail'], $s['short_desc'] ?: strip_tags($s['description']), $s['status']]);
                $ins_ts->execute([$chosen_template, $chosen_layout, $s['title'], $s['slug'], $s['icon'] ?: 'icon-botox', $s['thumbnail'], $s['banner_image'], $s['short_desc'], $s['description'], $s['price'], $s['duration'], $s['sort_order'], $s['status']]);
            }
        }

        $stmt_mb = $master_pdo->prepare("SELECT * FROM template_blogs WHERE template_key = ? AND layout_number = ? ORDER BY sort_order ASC");
        $stmt_mb->execute([$chosen_template, $chosen_layout]);
        $m_blogs = $stmt_mb->fetchAll(PDO::FETCH_ASSOC);
        if (empty($m_blogs)) {
            $stmt_mb2 = $master_pdo->prepare("SELECT * FROM template_blogs WHERE template_key = ? ORDER BY sort_order ASC");
            $stmt_mb2->execute([$chosen_template]);
            $m_blogs = $stmt_mb2->fetchAll(PDO::FETCH_ASSOC);
        }

        if (!empty($m_blogs)) {
            $db_pdo->exec("TRUNCATE TABLE template_blogs; TRUNCATE TABLE blogs;");
            $ins_tb = $db_pdo->prepare("INSERT INTO template_blogs (template_key, layout_number, title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $ins_b = $db_pdo->prepare("INSERT INTO blogs (title, slug, thumbnail, author_name, published_date, short_desc, content, tags, sort_order, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            foreach ($m_blogs as $b) {
                $ins_tb->execute([$chosen_template, $chosen_layout, $b['title'], $b['slug'], $b['thumbnail'], $b['author_name'], $b['published_date'], $b['short_desc'], $b['content'], $b['tags'], $b['sort_order'], $b['status']]);
                $ins_b->execute([$b['title'], $b['slug'], $b['thumbnail'], $b['author_name'], $b['published_date'], $b['short_desc'], $b['content'], $b['tags'], $b['sort_order'], $b['status']]);
            }
        }
    } catch (Exception $mig_e) {
        // Migration exception caught safely
    }

    // Configure business_settings in the tenant database
    $settings_to_set = [
        'business_name' => $company_name,
        'business_tagline' => $tagline,
        'business_email' => $company_email,
        'business_phone' => $company_phone,
        'business_address' => $company_address,
        'business_type' => $plan_code,
        'active_template' => $chosen_template,
        'active_home_layout' => (string)$chosen_layout,
        'currency_symbol' => $currency_symbol,
        'logo' => $logo_rel_path,
        'business_logo' => $logo_rel_path,
        'landing_site_logo' => $logo_rel_path,
        'favicon' => $favicon_rel_path,
        'business_favicon' => $favicon_rel_path,
        'landing_site_favicon' => $favicon_rel_path,
        'domain' => $clean_domain
    ];

    foreach ($settings_to_set as $k => $v) {
        $chk = $db_pdo->prepare("SELECT id FROM business_settings WHERE setting_key = ?");
        $chk->execute([$k]);
        if ($chk->fetch()) {
            $upd = $db_pdo->prepare("UPDATE business_settings SET setting_value = ? WHERE setting_key = ?");
            $upd->execute([$v, $k]);
        } else {
            $ins = $db_pdo->prepare("INSERT INTO business_settings (setting_key, setting_value, setting_group) VALUES (?, ?, 'general')");
            $ins->execute([$k, $v]);
        }
    }

    // Update administrator account in tenant database
    $hashed_pass = password_hash($admin_password, PASSWORD_BCRYPT);
    $upd_user = $db_pdo->prepare("
        UPDATE users 
        SET name = ?, email = ?, password = ?, status = 'active'
        WHERE id = 1 OR role_id = 1
        LIMIT 1
    ");
    $upd_user->execute([$admin_name, $admin_email, $hashed_pass]);

    // 7. Update CodeIgniter Database Config in Tenant Website & Tenant Admin
    $website_db_conf = $tenant_dir . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';
    if (file_exists($website_db_conf)) {
        $db_code = file_get_contents($website_db_conf);
        $db_code = preg_replace("/'database'\s*=>\s*'[a-zA-Z0-9_-]+'/", "'database' => '$tenant_db_name'", $db_code);
        file_put_contents($website_db_conf, $db_code);
    }

    $admin_db_conf = $tenant_admin_dir . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';
    if (file_exists($admin_db_conf)) {
        $db_code = file_get_contents($admin_db_conf);
        $db_code = preg_replace("/'database'\s*=>\s*'[a-zA-Z0-9_-]+'/", "'database' => '$tenant_db_name'", $db_code);
        file_put_contents($admin_db_conf, $db_code);
    }

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database provisioning failed: ' . $e->getMessage()]);
    exit;
}

// 8. Build URLs & Register Tenant in Master Database (saas_tenants)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? "https://" : "http://";
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
$script_path = isset($_SERVER['SCRIPT_NAME']) ? str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']) : '/spasalonmanagement/';
$base_platform_url = $protocol . $host . rtrim($script_path, '/\\') . '/';

$website_url = $base_platform_url . $clean_domain . '/';
$admin_url = $base_platform_url . $clean_domain . '/admin/';

$order_id = $order ? (int)$order->id : null;

$stmt_tenant = $master_pdo->prepare("
    INSERT INTO saas_tenants 
    (order_id, domain, folder_name, company_name, company_email, company_phone, company_address, plan_code, template, layout, currency_symbol, logo_path, favicon_path, db_name, admin_email, website_url, admin_url, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'active')
");

$stmt_tenant->execute([
    $order_id,
    $clean_domain,
    $clean_domain,
    $company_name,
    $company_email,
    $company_phone,
    $company_address,
    $plan_code,
    $chosen_template,
    $chosen_layout,
    $currency_symbol,
    $logo_rel_path,
    $favicon_rel_path,
    $tenant_db_name,
    $admin_email,
    $website_url,
    $admin_url
]);

$tenant_id = $master_pdo->lastInsertId();

// Return rich deployment details
echo json_encode([
    'status' => 'success',
    'message' => 'SaaS project setup completed and tenant successfully deployed!',
    'tenant_id' => $tenant_id,
    'domain' => $clean_domain,
    'folder_name' => $clean_domain,
    'company_name' => $company_name,
    'plan_code' => $plan_code,
    'plan_title' => ($plan_code === 'SALON' ? 'Salon Edition' : ($plan_code === 'SPA' ? 'Spa Wellness Edition' : 'Salon & Spa Complete')),
    'website_url' => $website_url,
    'admin_url' => $admin_url,
    'admin_email' => $admin_email,
    'admin_password' => $admin_password,
    'db_name' => $tenant_db_name,
    'created_at' => date('Y-m-d H:i:s')
]);
exit;
