<?php
/**
 * Commercial Script Zip Package Downloader
 * Bundles the CodeIgniter 3 script with pre-configured license and chosen template settings.
 */

$order_num = isset($_GET['order']) ? trim($_GET['order']) : '';
$token = isset($_GET['token']) ? trim($_GET['token']) : '';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=spasalon_db;charset=utf8mb4', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ));

    $stmt = $pdo->prepare("SELECT * FROM marketplace_orders WHERE order_number = ? AND download_token = ? LIMIT 1");
    $stmt->execute(array($order_num, $token));
    $order = $stmt->fetch();

    if (!$order) {
        die("Invalid or expired download link. Please contact support.");
    }

    // Increment download count
    $upd = $pdo->prepare("UPDATE marketplace_orders SET download_count = download_count + 1 WHERE id = ?");
    $upd->execute(array($order->id));

} catch (Exception $e) {
    die("Database connection failed.");
}

$zip_filename = 'Salon_Spa_Script_' . preg_replace('/[^A-Za-z0-9_-]/', '', $order->order_number) . '.zip';
$temp_zip = sys_get_temp_dir() . '/' . $zip_filename;

if (class_exists('ZipArchive')) {
    $zip = new ZipArchive();
    if ($zip->open($temp_zip, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {

        // Add pre-configured license metadata
        $license_meta = array(
            'script_title' => 'Salon & Spa Management Script',
            'order_number' => $order->order_number,
            'license_key' => $order->license_key,
            'purchased_edition' => $order->plan_code,
            'preconfigured_template' => $order->chosen_template,
            'preconfigured_layout' => $order->chosen_layout,
            'licensee_name' => $order->customer_name,
            'licensee_email' => $order->customer_email,
            'business_name' => $order->business_name,
            'purchase_date' => $order->created_at,
            'framework' => 'CodeIgniter 3.1.13',
            'php_version_requirement' => '7.4 - 8.2+'
        );
        $zip->addFromString('LICENSE_KEY.txt', "SALON & SPA SCRIPT COMMERCIAL LICENSE\n=========================================\n" . print_r($license_meta, true));
        $zip->addFromString('install_config.json', json_encode($license_meta, JSON_PRETTY_PRINT));

        // Add Readme Guide
        $readme = "SALON & SPA MANAGEMENT SCRIPT - INSTALLATION GUIDE\n===================================================\n\n" .
                  "1. Upload all contents of this ZIP to your web server (e.g. public_html or xampp/htdocs).\n" .
                  "2. Create a new MySQL/MariaDB database (e.g. 'spasalon_db').\n" .
                  "3. Import the SQL schema file located at 'database/schema.sql'.\n" .
                  "4. Open admin/application/config/database.php and update your DB credentials.\n" .
                  "5. Navigate in your browser to your domain or http://localhost/admin/install.\n" .
                  "6. Log in to the Admin Portal with your credentials.\n" .
                  "7. Your pre-chosen Edition (" . $order->plan_code . ") and Theme (" . $order->chosen_template . ") are already configured!\n\n" .
                  "Support: contact@spasalonmanagement.com\nThank you for choosing our script!";
        $zip->addFromString('README_INSTALL.txt', $readme);

        // Add database schema
        if (file_exists(__DIR__ . '/database/schema.sql')) {
            $zip->addFile(__DIR__ . '/database/schema.sql', 'database/schema.sql');
        }

        // Add key core CI configuration & documentation
        if (file_exists(__DIR__ . '/install.lock')) {
            $zip->addFile(__DIR__ . '/install.lock', 'install.lock');
        }

        // Add recursive files from admin & website (excluding heavy node_modules if any)
        $folders = array('admin', 'website');
        foreach ($folders as $folder) {
            $folder_path = __DIR__ . '/' . $folder;
            if (is_dir($folder_path)) {
                $files = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($folder_path, RecursiveDirectoryIterator::SKIP_DOTS),
                    RecursiveIteratorIterator::LEAVES_ONLY
                );

                foreach ($files as $name => $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        // Relative path
                        $relativePath = substr($filePath, strlen(__DIR__) + 1);
                        // Avoid caching/logs
                        if (strpos($relativePath, 'logs') === false && strpos($relativePath, 'cache') === false) {
                            $zip->addFile($filePath, $relativePath);
                        }
                    }
                }
            }
        }

        $zip->close();
    }
}

// Fallback if ZipArchive class is not available in PHP
if (!file_exists($temp_zip) || filesize($temp_zip) === 0) {
    $stage = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'pkg_' . preg_replace('/[^A-Za-z0-9_-]/', '', $order->order_number);
    if (!is_dir($stage)) {
        @mkdir($stage, 0777, true);
    }

    $license_meta = array(
        'script_title' => 'Salon & Spa Management Script',
        'order_number' => $order->order_number,
        'license_key' => $order->license_key,
        'purchased_edition' => $order->plan_code,
        'preconfigured_template' => $order->chosen_template,
        'preconfigured_layout' => $order->chosen_layout,
        'licensee_name' => $order->customer_name,
        'licensee_email' => $order->customer_email,
        'business_name' => $order->business_name,
        'purchase_date' => $order->created_at,
        'framework' => 'CodeIgniter 3.1.13',
        'php_version_requirement' => '7.4 - 8.2+'
    );
    file_put_contents($stage . '/LICENSE_KEY.txt', "SALON & SPA SCRIPT COMMERCIAL LICENSE\n=========================================\n" . print_r($license_meta, true));
    file_put_contents($stage . '/install_config.json', json_encode($license_meta, JSON_PRETTY_PRINT));
    
    $readme = "SALON & SPA MANAGEMENT SCRIPT - INSTALLATION GUIDE\n===================================================\n\n" .
              "1. Upload all contents of this ZIP to your web server (e.g. public_html or xampp/htdocs).\n" .
              "2. Create a new MySQL/MariaDB database (e.g. 'spasalon_db').\n" .
              "3. Import the SQL schema file located at 'database/schema.sql'.\n" .
              "4. Open admin/application/config/database.php and update your DB credentials.\n" .
              "5. Navigate in your browser to your domain or http://localhost/admin/install.\n" .
              "6. Log in to the Admin Portal with your credentials.\n" .
              "7. Your pre-chosen Edition (" . $order->plan_code . ") and Theme (" . $order->chosen_template . ") are already configured!\n\n" .
              "Support: contact@spasalonmanagement.com\nThank you for choosing our script!";
    file_put_contents($stage . '/README_INSTALL.txt', $readme);

    // Copy core database schema
    @mkdir($stage . '/database', 0777, true);
    if (file_exists(__DIR__ . '/database/schema.sql')) {
        @copy(__DIR__ . '/database/schema.sql', $stage . '/database/schema.sql');
    }
    if (file_exists(__DIR__ . '/install.lock')) {
        @copy(__DIR__ . '/install.lock', $stage . '/install.lock');
    }

    // Zip staging directory with tar or powershell
    $cmd = 'tar.exe -a -c -f "' . $temp_zip . '" -C "' . $stage . '" .';
    @exec($cmd, $out, $ret);

    if (!file_exists($temp_zip) || filesize($temp_zip) === 0) {
        $ps_cmd = 'powershell.exe -NoProfile -ExecutionPolicy Bypass -Command "Compress-Archive -Path \'' . $stage . DIRECTORY_SEPARATOR . '*\' -DestinationPath \'' . $temp_zip . '\' -Force"';
        @exec($ps_cmd);
    }
}

// Stream ZIP file
if (file_exists($temp_zip) && filesize($temp_zip) > 0) {
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . $zip_filename . '"');
    header('Content-Length: ' . filesize($temp_zip));
    header('Pragma: no-cache');
    header('Expires: 0');
    readfile($temp_zip);
    @unlink($temp_zip);
    exit;
}

// Ultimate Fallback if server forbids command execution
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="LICENSE_' . $order->order_number . '.txt"');
echo "License Key: " . $order->license_key . "\nEdition: " . $order->plan_code . "\nTemplate: " . $order->chosen_template . "\n\nInstallation instructions available in documentation.";
exit;
