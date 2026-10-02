<?php
/**
 * Official Payment Gateway Session & Dispatch Engine
 * Dispatches to the active gateway's official default payment page:
 * - Stripe: Stripe Official Hosted Checkout Session (checkout.stripe.com)
 * - Razorpay: Razorpay Standard Official Checkout Modal (checkout.razorpay.com)
 * - PayU: PayU Official Hosted Merchant Payment Portal (test.payu.in / secure.payu.in)
 * - Offline / Demo: Sandbox Instant Processing
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

// Fetch settings
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
$force_sandbox = isset($_POST['sandbox_simulate']) && $_POST['sandbox_simulate'] == '1';

if (empty($name) || empty($email) || empty($password)) {
    echo json_encode(array('status' => 'error', 'message' => 'Name, Email, and Admin Password are required.'));
    exit;
}

// Manual Sandbox Override triggered by user
if ($force_sandbox) {
    echo json_encode(array(
        'status' => 'sandbox_direct',
        'gateway' => 'offline',
        'message' => 'Processing order via Sandbox simulation...'
    ));
    exit;
}

// Fetch Plan Pricing from database
$stmt = $pdo->prepare("SELECT * FROM marketplace_plans WHERE plan_code = ? LIMIT 1");
$stmt->execute(array($plan_code));
$plan = $stmt->fetch();

$plan_id = $plan ? (int)$plan->id : 3;
$amount = $plan ? (float)$plan->price : 89.00;
$plan_name = $plan ? $plan->name : 'Salon & Spa Complete Edition';

$requested_gateway = isset($_POST['payment_gateway']) ? strtolower(trim($_POST['payment_gateway'])) : '';
if (in_array($requested_gateway, array('stripe', 'razorpay', 'payu', 'offline', 'sandbox'))) {
    $active_gateway = ($requested_gateway === 'sandbox' || $requested_gateway === 'offline') ? 'offline' : $requested_gateway;
} else {
    $active_gateway = isset($settings['active_payment_gateway']) ? $settings['active_payment_gateway'] : 'stripe';
}
$currency_code = isset($settings['currency_code']) && !empty($settings['currency_code']) ? strtoupper($settings['currency_code']) : 'USD';

// Base URL calculation
$is_https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
$scheme = $is_https ? 'https' : 'http';
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
$dir = dirname($_SERVER['SCRIPT_NAME']);
$dir = ($dir === '/' || $dir === '\\') ? '' : rtrim($dir, '/\\');
$base_url = $scheme . '://' . $host . $dir . '/';

/**
 * Universal HTTP request supporting cURL and stream context
 */
function payment_http_request($url, $method = 'GET', $fields = array(), $userpwd = '') {
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

// 1. STRIPE OFFICIAL HOSTED CHECKOUT (checkout.stripe.com)
if ($active_gateway === 'stripe') {
    $stripe_secret = isset($settings['gateway_stripe_secret_key']) ? trim($settings['gateway_stripe_secret_key']) : '';
    
    if (empty($stripe_secret)) {
        echo json_encode(array(
            'status' => 'error',
            'gateway' => 'stripe',
            'is_config_issue' => true,
            'message' => 'Stripe Secret Key is not configured. Please enter your Stripe Secret Key in Super Admin > Settings > Payment Gateways, or choose Offline / Sandbox mode.'
        ));
        exit;
    }

    // Call Stripe Checkout Sessions API to generate official Stripe hosted checkout session
    $amount_cents = (int)round($amount * 100);
    $payload = array(
        'payment_method_types[0]' => 'card',
        'line_items[0][price_data][currency]' => strtolower($currency_code),
        'line_items[0][price_data][product_data][name]' => $plan_name,
        'line_items[0][price_data][product_data][description]' => 'SaaS Subscription for ' . $business_name,
        'line_items[0][price_data][unit_amount]' => $amount_cents,
        'line_items[0][quantity]' => 1,
        'mode' => 'payment',
        'customer_email' => $email,
        'metadata[plan_code]' => $plan_code,
        'metadata[name]' => $name,
        'metadata[email]' => $email,
        'metadata[password]' => $password,
        'metadata[phone]' => $phone,
        'metadata[business_name]' => $business_name,
        'metadata[chosen_template]' => $chosen_template,
        'metadata[chosen_layout]' => $chosen_layout,
        'metadata[domain]' => isset($_POST['domain']) ? trim($_POST['domain']) : '',
        'metadata[amount]' => $amount,
        'success_url' => (isset($_POST['return_source']) && $_POST['return_source'] === 'subscribe') ? ($base_url . 'subscribe.php?stripe_success=1&session_id={CHECKOUT_SESSION_ID}') : ($base_url . 'order_callback.php?gateway=stripe&session_id={CHECKOUT_SESSION_ID}'),
        'cancel_url' => (isset($_POST['return_source']) && $_POST['return_source'] === 'subscribe') ? ($base_url . 'subscribe.php?payment_cancelled=1') : ($base_url . 'index.php?payment_cancelled=1')
    );

    $api_res = payment_http_request('https://api.stripe.com/v1/checkout/sessions', 'POST', $payload, $stripe_secret . ':');
    $session = json_decode($api_res['body'], true);

    if ($api_res['code'] === 200 && isset($session['url'])) {
        echo json_encode(array(
            'status' => 'redirect',
            'gateway' => 'stripe',
            'redirect_url' => $session['url']
        ));
        exit;
    } else {
        $err_msg = isset($session['error']['message']) ? $session['error']['message'] : 'Stripe official session could not be established.';
        $is_sample = (strpos($stripe_secret, 'sample') !== false);
        echo json_encode(array(
            'status' => 'error',
            'gateway' => 'stripe',
            'is_sample_key' => $is_sample,
            'message' => 'Stripe Official Checkout Notice: ' . $err_msg . ($is_sample ? ' (A sample test key is currently stored in database settings. Please enter your genuine Stripe API keys in Super Admin > Settings).' : '')
        ));
        exit;
    }
}

// 2. RAZORPAY OFFICIAL STANDARD CHECKOUT (checkout.razorpay.com)
if ($active_gateway === 'razorpay') {
    $key_id = isset($settings['gateway_razorpay_key_id']) ? trim($settings['gateway_razorpay_key_id']) : '';
    if (empty($key_id)) {
        echo json_encode(array(
            'status' => 'error',
            'gateway' => 'razorpay',
            'is_config_issue' => true,
            'message' => 'Razorpay Key ID is not configured in Super Admin settings.'
        ));
        exit;
    }

    $is_sample = (strpos($key_id, 'sample') !== false);

    echo json_encode(array(
        'status' => 'razorpay_checkout',
        'gateway' => 'razorpay',
        'key_id' => $key_id,
        'amount' => (int)round($amount * 100), // subunits (paise / cents)
        'currency' => $currency_code,
        'plan_name' => $plan_name,
        'business_name' => $business_name,
        'customer_name' => $name,
        'customer_email' => $email,
        'customer_phone' => $phone,
        'is_sample_key' => $is_sample
    ));
    exit;
}

// 3. PAYU OFFICIAL HOSTED PORTAL (test.payu.in / secure.payu.in)
if ($active_gateway === 'payu') {
    $merchant_key = isset($settings['gateway_payu_merchant_key']) ? trim($settings['gateway_payu_merchant_key']) : '';
    $merchant_salt = isset($settings['gateway_payu_merchant_salt']) ? trim($settings['gateway_payu_merchant_salt']) : '';
    $payu_mode = isset($settings['gateway_payu_mode']) ? $settings['gateway_payu_mode'] : 'test';

    if (empty($merchant_key) || empty($merchant_salt)) {
        echo json_encode(array(
            'status' => 'error',
            'gateway' => 'payu',
            'is_config_issue' => true,
            'message' => 'PayU Merchant Key or Salt is not configured in Super Admin settings.'
        ));
        exit;
    }

    $action_url = ($payu_mode === 'live') ? 'https://secure.payu.in/_payment' : 'https://test.payu.in/_payment';
    $txnid = 'PAYU_' . time() . '_' . rand(1000, 9999);
    $productinfo = substr(preg_replace('/[^a-zA-Z0-9 ]/', '', $plan_name), 0, 50);
    $firstname = substr(preg_replace('/[^a-zA-Z0-9 ]/', '', $name), 0, 30);
    $amount_formatted = number_format($amount, 2, '.', '');

    // Hash sequence: key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5||||||SALT
    $hash_str = "$merchant_key|$txnid|$amount_formatted|$productinfo|$email|||||||||||$merchant_salt";
    $hash = strtolower(hash('sha512', $hash_str));

    $surl = $base_url . 'order_callback.php?gateway=payu';
    $furl = $base_url . 'index.php?payment_cancelled=1';

    // Store pending metadata in session
    if (session_status() === PHP_SESSION_NONE) session_start();
    $_SESSION['payu_pending_' . $txnid] = array(
        'plan_code' => $plan_code,
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'business_name' => $business_name,
        'chosen_template' => $chosen_template,
        'chosen_layout' => $chosen_layout,
        'amount' => $amount
    );

    $is_sample = (strpos($merchant_key, 'sample') !== false || strpos($merchant_key, 'test_merchant') !== false);

    echo json_encode(array(
        'status' => 'payu_form',
        'gateway' => 'payu',
        'action' => $action_url,
        'is_sample_key' => $is_sample,
        'fields' => array(
            'key' => $merchant_key,
            'txnid' => $txnid,
            'amount' => $amount_formatted,
            'productinfo' => $productinfo,
            'firstname' => $firstname,
            'email' => $email,
            'phone' => $phone,
            'surl' => $surl,
            'furl' => $furl,
            'hash' => $hash,
            'service_provider' => 'payu_paisa'
        )
    ));
    exit;
}

// 4. OFFLINE / SANDBOX DIRECT SIMULATION
echo json_encode(array(
    'status' => 'sandbox_direct',
    'gateway' => 'offline',
    'message' => 'Simulated instant payment'
));
exit;
