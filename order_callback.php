<?php
/**
 * Official Payment Gateway Callback & Verification Handler
 * Handles return from Stripe Official Hosted Checkout and PayU Official Portal
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=spasalon_db;charset=utf8mb4', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ));
} catch (Exception $e) {
    die("Database connection failed.");
}

// Fetch settings
$settings = array();
$stmt_set = $pdo->query("SELECT setting_key, setting_value FROM business_settings");
while ($row = $stmt_set->fetch(PDO::FETCH_ASSOC)) {
    $settings[$row['setting_key']] = $row['setting_value'];
}

$gateway = isset($_GET['gateway']) ? strtolower(trim($_GET['gateway'])) : '';

/**
 * Universal HTTP request supporting cURL and stream context
 */
function callback_http_request($url, $method = 'GET', $fields = array(), $userpwd = '') {
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 25);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        if (!empty($userpwd)) {
            curl_setopt($ch, CURLOPT_USERPWD, $userpwd);
        }
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
        }
        $resp = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return array('code' => $code, 'body' => $resp);
    }

    // Stream context fallback
    $headers = array();
    if (!empty($userpwd)) {
        $headers[] = 'Authorization: Basic ' . base64_encode($userpwd);
    }
    if ($method === 'POST') {
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    }
    $opts = array(
        'http' => array(
            'method' => $method,
            'header' => implode("\r\n", $headers) . "\r\n",
            'timeout' => 25,
            'ignore_errors' => true
        ),
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false
        )
    );
    if ($method === 'POST') {
        $opts['http']['content'] = http_build_query($fields);
    }
    $ctx = stream_context_create($opts);
    $resp = @file_get_contents($url, false, $ctx);
    $code = 0;
    if (isset($http_response_header) && is_array($http_response_header)) {
        foreach ($http_response_header as $hdr) {
            if (preg_match('#HTTP/[0-9\.]+\s+([0-9]+)#', $hdr, $m)) {
                $code = (int)$m[1];
                break;
            }
        }
    }
    return array('code' => $code, 'body' => $resp);
}

// 1. STRIPE OFFICIAL RETURN
if ($gateway === 'stripe') {
    $session_id = isset($_GET['session_id']) ? trim($_GET['session_id']) : '';
    $stripe_secret = isset($settings['gateway_stripe_secret_key']) ? trim($settings['gateway_stripe_secret_key']) : '';

    if (empty($session_id) || empty($stripe_secret)) {
        header("Location: index.php?payment_error=missing_session");
        exit;
    }

    // Retrieve session from Stripe Official API
    $api_res = callback_http_request('https://api.stripe.com/v1/checkout/sessions/' . urlencode($session_id), 'GET', array(), $stripe_secret . ':');
    $session = json_decode($api_res['body'], true);

    if ($api_res['code'] === 200 && isset($session['payment_status']) && $session['payment_status'] === 'paid') {
        $meta = isset($session['metadata']) ? $session['metadata'] : array();
        
        $plan_code = isset($meta['plan_code']) ? $meta['plan_code'] : 'SALON_SPA';
        $name = isset($meta['name']) ? $meta['name'] : (isset($session['customer_details']['name']) ? $session['customer_details']['name'] : 'Customer');
        $email = isset($meta['email']) ? $meta['email'] : (isset($session['customer_details']['email']) ? $session['customer_details']['email'] : '');
        $phone = isset($meta['phone']) ? $meta['phone'] : '';
        $business_name = isset($meta['business_name']) ? $meta['business_name'] : 'My Salon & Spa';
        $chosen_template = isset($meta['chosen_template']) ? $meta['chosen_template'] : 'template1';
        $chosen_layout = isset($meta['chosen_layout']) ? (int)$meta['chosen_layout'] : 1;
        $amount = isset($meta['amount']) ? (float)$meta['amount'] : (isset($session['amount_total']) ? ($session['amount_total'] / 100) : 89.00);

        // Fetch Plan ID
        $stmt_p = $pdo->prepare("SELECT id FROM marketplace_plans WHERE plan_code = ? LIMIT 1");
        $stmt_p->execute(array($plan_code));
        $plan_row = $stmt_p->fetch();
        $plan_id = $plan_row ? (int)$plan_row->id : 3;

        // Generate Order & License
        $order_number = 'ORD-' . date('Y') . '-' . rand(1000, 9999);
        $license_key = 'LIC-' . $plan_code . '-' . strtoupper(substr(uniqid(), -4)) . '-' . date('Y') . '-X' . rand(100, 999);
        $download_token = bin2hex(random_bytes(16));

        $stmt = $pdo->prepare("
            INSERT INTO marketplace_orders 
            (order_number, customer_name, customer_email, customer_phone, business_name, plan_id, plan_code, chosen_template, chosen_layout, amount, payment_method, payment_status, license_key, download_token, download_count)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'stripe', 'paid', ?, ?, 0)
        ");
        $stmt->execute(array(
            $order_number, $name, $email, $phone, $business_name, $plan_id, $plan_code, $chosen_template, $chosen_layout, $amount, $license_key, $download_token
        ));
        $order_id = $pdo->lastInsertId();

        $stmt = $pdo->prepare("
            INSERT INTO marketplace_licenses 
            (license_key, order_id, customer_email, plan_code, template, layout, status)
            VALUES (?, ?, ?, ?, ?, ?, 'active')
        ");
        $stmt->execute(array(
            $license_key, $order_id, $email, $plan_code, $chosen_template, $chosen_layout
        ));

        // Cache customer setup metadata in session for instant wizard continuation
        $_SESSION['completed_order_' . $order_number] = array(
            'order_number' => $order_number,
            'token' => $download_token,
            'company_name' => $business_name,
            'company_email' => $email,
            'company_phone' => $phone,
            'plan_code' => $plan_code,
            'template' => $chosen_template,
            'layout' => $chosen_layout,
            'admin_name' => $name,
            'admin_email' => $email,
            'admin_password' => isset($meta['password']) ? $meta['password'] : ''
        );

        header("Location: index.php?order_success=" . urlencode($order_number) . "&token=" . urlencode($download_token));
        exit;
    } else {
        header("Location: index.php?payment_cancelled=1");
        exit;
    }
}

// 2. PAYU OFFICIAL RETURN
if ($gateway === 'payu') {
    $txnid = isset($_POST['txnid']) ? trim($_POST['txnid']) : '';
    $status = isset($_POST['status']) ? trim($_POST['status']) : '';

    if ($status === 'success' && !empty($txnid)) {
        $sess_key = 'payu_pending_' . $txnid;
        $meta = isset($_SESSION[$sess_key]) ? $_SESSION[$sess_key] : array();

        $plan_code = isset($meta['plan_code']) ? $meta['plan_code'] : 'SALON_SPA';
        $name = isset($meta['name']) ? $meta['name'] : (isset($_POST['firstname']) ? $_POST['firstname'] : 'Customer');
        $email = isset($meta['email']) ? $meta['email'] : (isset($_POST['email']) ? $_POST['email'] : '');
        $phone = isset($meta['phone']) ? $meta['phone'] : (isset($_POST['phone']) ? $_POST['phone'] : '');
        $business_name = isset($meta['business_name']) ? $meta['business_name'] : 'My Salon & Spa';
        $chosen_template = isset($meta['chosen_template']) ? $meta['chosen_template'] : 'template1';
        $chosen_layout = isset($meta['chosen_layout']) ? (int)$meta['chosen_layout'] : 1;
        $amount = isset($meta['amount']) ? (float)$meta['amount'] : (isset($_POST['amount']) ? (float)$_POST['amount'] : 89.00);

        $stmt_p = $pdo->prepare("SELECT id FROM marketplace_plans WHERE plan_code = ? LIMIT 1");
        $stmt_p->execute(array($plan_code));
        $plan_row = $stmt_p->fetch();
        $plan_id = $plan_row ? (int)$plan_row->id : 3;

        $order_number = 'ORD-' . date('Y') . '-' . rand(1000, 9999);
        $license_key = 'LIC-' . $plan_code . '-' . strtoupper(substr(uniqid(), -4)) . '-' . date('Y') . '-X' . rand(100, 999);
        $download_token = bin2hex(random_bytes(16));

        $stmt = $pdo->prepare("
            INSERT INTO marketplace_orders 
            (order_number, customer_name, customer_email, customer_phone, business_name, plan_id, plan_code, chosen_template, chosen_layout, amount, payment_method, payment_status, license_key, download_token, download_count)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'payu', 'paid', ?, ?, 0)
        ");
        $stmt->execute(array(
            $order_number, $name, $email, $phone, $business_name, $plan_id, $plan_code, $chosen_template, $chosen_layout, $amount, $license_key, $download_token
        ));
        $order_id = $pdo->lastInsertId();

        $stmt = $pdo->prepare("
            INSERT INTO marketplace_licenses 
            (license_key, order_id, customer_email, plan_code, template, layout, status)
            VALUES (?, ?, ?, ?, ?, ?, 'active')
        ");
        $stmt->execute(array(
            $license_key, $order_id, $email, $plan_code, $chosen_template, $chosen_layout
        ));

        // Cache customer setup metadata in session for instant wizard continuation
        $_SESSION['completed_order_' . $order_number] = array(
            'order_number' => $order_number,
            'token' => $download_token,
            'company_name' => $business_name,
            'company_email' => $email,
            'company_phone' => $phone,
            'plan_code' => $plan_code,
            'template' => $chosen_template,
            'layout' => $chosen_layout,
            'admin_name' => $name,
            'admin_email' => $email,
            'admin_password' => isset($meta['password']) ? $meta['password'] : ''
        );

        header("Location: index.php?order_success=" . urlencode($order_number) . "&token=" . urlencode($download_token));
        exit;
    } else {
        header("Location: index.php?payment_cancelled=1");
        exit;
    }
}

header("Location: index.php");
exit;
