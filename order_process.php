<?php
/**
 * Commercial Script Purchase & Order Processor
 * Handles active payment gateway (Stripe, Razorpay, PayU, Offline/Demo),
 * dynamic currency formatting, and transactional SMTP license delivery emails.
 */
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
    exit;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=spasalon_db;charset=utf8mb4', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ));
} catch (Exception $e) {
    echo json_encode(array('status' => 'error', 'message' => 'Database connection failed.'));
    exit;
}

// Fetch all settings
$settings = array();
$stmt_set = $pdo->query("SELECT setting_key, setting_value FROM business_settings");
while ($row = $stmt_set->fetch(PDO::FETCH_ASSOC)) {
    $settings[$row['setting_key']] = $row['setting_value'];
}

$plan_code = isset($_POST['plan_code']) ? strtoupper(trim($_POST['plan_code'])) : 'SALON_SPA';
if (!in_array($plan_code, array('SALON', 'SPA', 'SALON_SPA'))) {
    $plan_code = 'SALON_SPA';
}

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$business_name = isset($_POST['business_name']) && !empty($_POST['business_name']) ? trim($_POST['business_name']) : 'My Salon & Spa';
$chosen_template = isset($_POST['chosen_template']) && in_array($_POST['chosen_template'], array('template1', 'template2')) ? $_POST['chosen_template'] : 'template1';
$chosen_layout = isset($_POST['chosen_layout']) && in_array((int)$_POST['chosen_layout'], array(1, 2, 3)) ? (int)$_POST['chosen_layout'] : 1;

if (empty($name) || empty($email)) {
    echo json_encode(array('status' => 'error', 'message' => 'Full Name and Email Address are required.'));
    exit;
}

// Fetch Plan Pricing from database
$stmt = $pdo->prepare("SELECT * FROM marketplace_plans WHERE plan_code = ? LIMIT 1");
$stmt->execute(array($plan_code));
$plan = $stmt->fetch();

$plan_id = $plan ? (int)$plan->id : 3;
$amount = $plan ? (float)$plan->price : 89.00;
$plan_name = $plan ? $plan->name : 'Salon & Spa Complete Edition';

// Determine Active Payment Gateway
$active_gateway = isset($settings['active_payment_gateway']) ? $settings['active_payment_gateway'] : 'stripe';
$payment_method = $active_gateway;

// Receive gateway transaction reference if passed
$transaction_id = isset($_POST['transaction_id']) ? trim($_POST['transaction_id']) : '';
if (empty($transaction_id)) {
    $transaction_id = strtoupper($active_gateway) . '-TXN-' . time() . '-' . rand(1000, 9999);
}

// Generate Order Number & License Key
$order_number = 'ORD-' . date('Y') . '-' . rand(1000, 9999);
$license_key = 'LIC-' . $plan_code . '-' . strtoupper(substr(uniqid(), -4)) . '-' . date('Y') . '-X' . rand(100, 999);
$download_token = bin2hex(random_bytes(16));

// Insert Order
$stmt = $pdo->prepare("
    INSERT INTO marketplace_orders 
    (order_number, customer_name, customer_email, customer_phone, business_name, plan_id, plan_code, chosen_template, chosen_layout, amount, payment_method, payment_status, license_key, download_token, download_count)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'paid', ?, ?, 0)
");
$stmt->execute(array(
    $order_number, $name, $email, $phone, $business_name, $plan_id, $plan_code, $chosen_template, $chosen_layout, $amount, $payment_method, $license_key, $download_token
));
$order_id = $pdo->lastInsertId();

// Insert License
$stmt = $pdo->prepare("
    INSERT INTO marketplace_licenses 
    (license_key, order_id, customer_email, plan_code, template, layout, status)
    VALUES (?, ?, ?, ?, ?, ?, 'active')
");
$stmt->execute(array(
    $license_key, $order_id, $email, $plan_code, $chosen_template, $chosen_layout
));

$download_url = 'download.php?token=' . urlencode($download_token) . '&order=' . urlencode($order_number);
$launch_url = 'launch.php?order=' . urlencode($order_number) . '&token=' . urlencode($download_token);

// Dynamic Currency Formatting
$sym = isset($settings['currency_symbol']) ? $settings['currency_symbol'] : '$';
$pos = isset($settings['currency_position']) ? $settings['currency_position'] : 'left';
$dec = isset($settings['currency_decimals']) ? (int)$settings['currency_decimals'] : 2;
$formatted_amount = ($pos === 'left') ? ($sym . number_format($amount, $dec)) : (number_format($amount, $dec) . ' ' . $sym);

// Send Transactional Order Email if SMTP is enabled
$email_sent = false;
if (isset($settings['smtp_status']) && $settings['smtp_status'] === 'enabled') {
    $to = $email;
    $from_email = isset($settings['smtp_from_email']) ? $settings['smtp_from_email'] : 'sales@spasalon.com';
    $from_name = isset($settings['smtp_from_name']) ? $settings['smtp_from_name'] : 'Luxe Salon & Spa Software';
    $subject = "Your Commercial License & Order Confirmation - " . $order_number;

    $msg = "
    <html>
    <head><title>Order Confirmation</title></head>
    <body style='font-family: Arial, sans-serif; background-color: #f8fafc; padding: 20px; color: #1e293b;'>
        <div style='max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e2e8f0;'>
            <div style='background: #0f172a; padding: 25px; text-align: center;'>
                <h2 style='color: #c29958; margin: 0;'>LUXE SALON & SPA PLATFORM</h2>
                <p style='color: #94a3b8; margin: 5px 0 0;'>Commercial Software License Receipt</p>
            </div>
            <div style='padding: 25px;'>
                <p>Dear <strong>" . htmlspecialchars($name) . "</strong>,</p>
                <p>Thank you for your purchase! Your commercial license has been generated and registered successfully.</p>
                
                <div style='background: #f1f5f9; padding: 15px; border-radius: 6px; margin: 20px 0;'>
                    <p style='margin: 5px 0;'><strong>Order Reference:</strong> " . htmlspecialchars($order_number) . "</p>
                    <p style='margin: 5px 0;'><strong>Software Edition:</strong> " . htmlspecialchars($plan_name) . "</p>
                    <p style='margin: 5px 0;'><strong>Business Name:</strong> " . htmlspecialchars($business_name) . "</p>
                    <p style='margin: 5px 0;'><strong>Amount Paid:</strong> " . htmlspecialchars($formatted_amount) . " (" . strtoupper($payment_method) . ")</p>
                    <p style='margin: 5px 0;'><strong>Commercial License Key:</strong></p>
                    <div style='background: #0f172a; color: #c29958; font-family: monospace; font-size: 16px; padding: 10px; border-radius: 4px; text-align: center; margin-top: 5px;'>
                        " . htmlspecialchars($license_key) . "
                    </div>
                </div>

                <p>You can download your clean source code package at any time using your download token:</p>
                <div style='text-align: center; margin: 25px 0;'>
                    <a href='" . htmlspecialchars($download_url) . "' style='background: #c29958; color: #000; padding: 12px 24px; text-decoration: none; font-weight: bold; border-radius: 6px; display: inline-block;'>Download Source Package</a>
                </div>

                <p style='font-size: 13px; color: #64748b;'>Need assistance? Reply directly to this email or visit your Super Admin panel.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: " . $from_name . " <" . $from_email . ">\r\n";
    $headers .= "Reply-To: " . $from_email . "\r\n";

    @mail($to, $subject, $msg, $headers);
    $email_sent = true;
}

$setup_wizard_url = 'setup_wizard.php?order=' . urlencode($order_number) . '&token=' . urlencode($download_token);

echo json_encode(array(
    'status' => 'success',
    'order_number' => $order_number,
    'token' => $download_token,
    'license_key' => $license_key,
    'plan_name' => $plan_name,
    'plan_code' => $plan_code,
    'customer_name' => $name,
    'customer_email' => $email,
    'customer_phone' => $phone,
    'business_name' => $business_name,
    'amount' => $formatted_amount,
    'payment_method' => strtoupper($payment_method),
    'chosen_template' => ($chosen_template === 'template1' ? 'Template 1 (Glamr)' : 'Template 2 (Pureglow)'),
    'chosen_layout' => 'Layout ' . $chosen_layout,
    'download_url' => $download_url,
    'launch_url' => $launch_url,
    'setup_wizard_url' => $setup_wizard_url,
    'email_sent' => $email_sent,
    'message' => 'Payment successful! Proceeding to Project Setup Wizard.'
));
exit;
