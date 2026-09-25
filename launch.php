<?php
/**
 * Instant Configured Instance Launcher
 * Immediately applies purchased edition & chosen template, then launches the system.
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

    if ($order) {
        // Apply purchased configurations to business_settings
        $configs = array(
            'business_type' => $order->plan_code,
            'active_template' => $order->chosen_template,
            'active_home_layout' => (string)$order->chosen_layout,
            'business_name' => $order->business_name ? $order->business_name : 'Luxe Salon & Spa'
        );

        foreach ($configs as $k => $v) {
            $check = $pdo->prepare("SELECT id FROM business_settings WHERE setting_key = ?");
            $check->execute(array($k));
            if ($check->fetch()) {
                $upd = $pdo->prepare("UPDATE business_settings SET setting_value = ? WHERE setting_key = ?");
                $upd->execute(array($v, $k));
            } else {
                $ins = $pdo->prepare("INSERT INTO business_settings (setting_key, setting_value, setting_group) VALUES (?, ?, 'general')");
                $ins->execute(array($k, $v));
            }
        }

        // Redirect to the newly configured live website
        header("Location: website/?purchased_order=" . urlencode($order->order_number) . "&edition=" . urlencode($order->plan_code) . "&tpl=" . urlencode($order->chosen_template));
        exit;
    }
} catch (Exception $e) {
    // Fallback
}

// Fallback redirect
header("Location: website/");
exit;
