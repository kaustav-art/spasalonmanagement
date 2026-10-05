<?php
/**
 * SaaS Subscription & Project Setup Wizard API
 * Handles:
 * 1. Email & Phone Uniqueness Validation
 * 2. OTP Generation, Email Dispatch & Verification
 * 3. Domain Availability Check
 * 4. Subscription Order Processing & Immediate Provisioning
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$is_direct_api_call = (isset($_SERVER['SCRIPT_FILENAME']) && realpath($_SERVER['SCRIPT_FILENAME']) === realpath(__FILE__));
$action = isset($_GET['action']) ? trim($_GET['action']) : (isset($_POST['action']) ? trim($_POST['action']) : '');

if ($is_direct_api_call || !empty($action)) {
    header('Content-Type: application/json; charset=utf-8');
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=spasalon_db;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (Exception $e) {
    if ($is_direct_api_call || !empty($action)) {
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $e->getMessage()]);
        exit;
    }
}

// Fetch business settings
$settings = [];
if (isset($pdo)) {
    $stmt_set = $pdo->query("SELECT setting_key, setting_value FROM business_settings");
    while ($r = $stmt_set->fetch(PDO::FETCH_ASSOC)) {
        $settings[$r['setting_key']] = $r['setting_value'];
    }
}

/**
 * Normalizes phone number to digits only for comparison
 */
function normalize_phone($ph) {
    return preg_replace('/[^0-9]/', '', (string)$ph);
}

/**
 * Checks if email exists in users, saas_tenants, or marketplace_orders
 */
function is_email_taken($pdo, $email) {
    $email = strtolower(trim($email));
    if (empty($email)) return false;

    // Check users table
    $stmt = $pdo->prepare("SELECT id FROM users WHERE LOWER(email) = ? LIMIT 1");
    $stmt->execute([$email]);
    if ($stmt->fetch()) return true;

    // Check saas_tenants table for administrator email uniqueness
    $stmt = $pdo->prepare("SELECT id FROM saas_tenants WHERE LOWER(admin_email) = ? LIMIT 1");
    $stmt->execute([$email]);
    if ($stmt->fetch()) return true;

    // Check marketplace_orders table
    $stmt = $pdo->prepare("SELECT id FROM marketplace_orders WHERE LOWER(customer_email) = ? LIMIT 1");
    $stmt->execute([$email]);
    if ($stmt->fetch()) return true;

    return false;
}

/**
 * Checks if phone exists in users, saas_tenants, or marketplace_orders
 */
function is_phone_taken($pdo, $phone) {
    $clean_input = normalize_phone($phone);
    if (strlen($clean_input) < 7) return false;

    // Check users
    $stmt = $pdo->query("SELECT phone FROM users WHERE phone IS NOT NULL AND phone != ''");
    while ($row = $stmt->fetch()) {
        if (normalize_phone($row->phone) === $clean_input) {
            return true;
        }
    }

    // Check saas_tenants
    $stmt = $pdo->query("SELECT company_phone FROM saas_tenants WHERE company_phone IS NOT NULL AND company_phone != ''");
    while ($row = $stmt->fetch()) {
        if (normalize_phone($row->company_phone) === $clean_input) {
            return true;
        }
    }

    // Check marketplace_orders
    $stmt = $pdo->query("SELECT customer_phone FROM marketplace_orders WHERE customer_phone IS NOT NULL AND customer_phone != ''");
    while ($row = $stmt->fetch()) {
        if (normalize_phone($row->customer_phone) === $clean_input) {
            return true;
        }
    }

    return false;
}

/**
 * Splits a SQL file into individual statements safely without breaking on semicolons inside string literals or comments.
 */
function split_sql_statements($sql) {
    $statements = [];
    $current_stmt = '';
    $in_single_quote = false;
    $in_double_quote = false;
    $in_backtick = false;
    $in_line_comment = false;
    $in_block_comment = false;
    $length = strlen($sql);

    for ($i = 0; $i < $length; $i++) {
        $c = $sql[$i];
        $next = ($i + 1 < $length) ? $sql[$i + 1] : '';

        if ($in_line_comment) {
            $current_stmt .= $c;
            if ($c === "\n" || $c === "\r") {
                $in_line_comment = false;
            }
            continue;
        }

        if ($in_block_comment) {
            $current_stmt .= $c;
            if ($c === '*' && $next === '/') {
                $current_stmt .= '/';
                $i++;
                $in_block_comment = false;
            }
            continue;
        }

        if (!$in_single_quote && !$in_double_quote && !$in_backtick) {
            if ($c === '-' && $next === '-') {
                $in_line_comment = true;
                $current_stmt .= '--';
                $i++;
                continue;
            }
            if ($c === '#' && ($i === 0 || $sql[$i-1] === "\n" || $sql[$i-1] === "\r" || $sql[$i-1] === ' ')) {
                $in_line_comment = true;
                $current_stmt .= '#';
                continue;
            }
            if ($c === '/' && $next === '*') {
                $in_block_comment = true;
                $current_stmt .= '/*';
                $i++;
                continue;
            }
        }

        if ($c === "'" && !$in_double_quote && !$in_backtick) {
            if ($in_single_quote) {
                if ($next === "'") {
                    $current_stmt .= "''";
                    $i++;
                    continue;
                }
                $backslashes = 0;
                for ($j = $i - 1; $j >= 0 && $sql[$j] === '\\'; $j--) {
                    $backslashes++;
                }
                if ($backslashes % 2 === 0) {
                    $in_single_quote = false;
                }
            } else {
                $in_single_quote = true;
            }
        } elseif ($c === '"' && !$in_single_quote && !$in_backtick) {
            if ($in_double_quote) {
                if ($next === '"') {
                    $current_stmt .= '""';
                    $i++;
                    continue;
                }
                $backslashes = 0;
                for ($j = $i - 1; $j >= 0 && $sql[$j] === '\\'; $j--) {
                    $backslashes++;
                }
                if ($backslashes % 2 === 0) {
                    $in_double_quote = false;
                }
            } else {
                $in_double_quote = true;
            }
        } elseif ($c === '`' && !$in_single_quote && !$in_double_quote) {
            $in_backtick = !$in_backtick;
        }

        if ($c === ';' && !$in_single_quote && !$in_double_quote && !$in_backtick) {
            $trimmed = trim($current_stmt);
            if (!empty($trimmed)) {
                $statements[] = $trimmed;
            }
            $current_stmt = '';
            continue;
        }

        $current_stmt .= $c;
    }

    $trimmed = trim($current_stmt);
    if (!empty($trimmed)) {
        $statements[] = $trimmed;
    }

    return $statements;
}

// ==========================================
// 1. ACTION: CHECK UNIQUE (Email & Phone)
// ==========================================
if ($action === 'check_unique') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'status' => 'error',
            'field' => 'email',
            'message' => 'Please enter a valid email address.'
        ]);
        exit;
    }

    if (!empty($email) && is_email_taken($pdo, $email)) {
        echo json_encode([
            'status' => 'error',
            'field' => 'email',
            'message' => 'This email address is already registered. Please use another email.'
        ]);
        exit;
    }

    if (!empty($phone) && is_phone_taken($pdo, $phone)) {
        echo json_encode([
            'status' => 'error',
            'field' => 'phone',
            'message' => 'This phone number is already registered. Please use another phone number.'
        ]);
        exit;
    }

    echo json_encode([
        'status' => 'success',
        'message' => 'Email and phone are available.'
    ]);
    exit;
}

// ==========================================
// 2. ACTION: SEND OTP
// ==========================================
if ($action === 'send_otp') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? strtolower(trim($_POST['email'])) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($name)) {
        echo json_encode(['status' => 'error', 'field' => 'name', 'message' => 'Full Name is required.']);
        exit;
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'field' => 'email', 'message' => 'A valid Email Address is required.']);
        exit;
    }
    if (empty($phone) || strlen(normalize_phone($phone)) < 7) {
        echo json_encode(['status' => 'error', 'field' => 'phone', 'message' => 'A valid Phone Number is required.']);
        exit;
    }
    if (empty($password) || strlen($password) < 6) {
        echo json_encode(['status' => 'error', 'field' => 'password', 'message' => 'Password must be at least 6 characters.']);
        exit;
    }

    // Verify uniqueness
    if (is_email_taken($pdo, $email)) {
        echo json_encode(['status' => 'error', 'field' => 'email', 'message' => 'This email address is already registered. Please use another email.']);
        exit;
    }
    if (is_phone_taken($pdo, $phone)) {
        echo json_encode(['status' => 'error', 'field' => 'phone', 'message' => 'This phone number is already registered. Please use another phone number.']);
        exit;
    }

    // Generate 6-digit OTP
    $otp = (string)mt_rand(100000, 999999);

    // Save to session
    $_SESSION['saas_wizard_registration'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'password' => $password,
        'otp' => $otp,
        'otp_time' => time(),
        'otp_verified' => false
    ];

    // Attempt email dispatch if SMTP enabled
    $email_sent = false;
    if (isset($settings['smtp_status']) && $settings['smtp_status'] === 'enabled') {
        $to = $email;
        $from_email = isset($settings['smtp_from_email']) ? $settings['smtp_from_email'] : 'noreply@spasalon.com';
        $from_name = isset($settings['smtp_from_name']) ? $settings['smtp_from_name'] : 'Luxe Salon & Spa SaaS';
        $subject = "Your Verification Code: " . $otp . " - Luxe Salon & Spa";

        $msg = "
        <html>
        <body style='font-family: Arial, sans-serif; background-color: #f8fafc; padding: 20px; color: #1e293b;'>
            <div style='max-width: 500px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e2e8f0; padding: 25px;'>
                <h3 style='color: #c29958; margin-top: 0;'>Verification Code</h3>
                <p>Hello <strong>" . htmlspecialchars($name) . "</strong>,</p>
                <p>Your one-time security verification code for your SaaS Subscription & Project Setup is:</p>
                <div style='background: #0f172a; color: #c29958; font-size: 26px; font-weight: bold; letter-spacing: 6px; text-align: center; padding: 15px; border-radius: 6px; margin: 20px 0;'>
                    " . $otp . "
                </div>
                <p style='color: #64748b; font-size: 13px;'>This code will expire in 15 minutes. If you did not request this, please ignore this email.</p>
            </div>
        </body>
        </html>
        ";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: " . $from_name . " <" . $from_email . ">\r\n";
        @mail($to, $subject, $msg, $headers);
        $email_sent = true;
    }

    echo json_encode([
        'status' => 'success',
        'message' => 'Verification code sent successfully to ' . $email . ' and ' . $phone . '.',
        'email' => $email,
        'phone' => $phone,
        'demo_otp' => $otp, // Convenient for local testing / demo auto-fill
        'email_sent' => $email_sent
    ]);
    exit;
}

// ==========================================
// 3. ACTION: VERIFY OTP
// ==========================================
if ($action === 'verify_otp') {
    $submitted_otp = isset($_POST['otp']) ? trim($_POST['otp']) : '';

    if (!isset($_SESSION['saas_wizard_registration'])) {
        echo json_encode(['status' => 'error', 'message' => 'Session expired. Please restart registration.']);
        exit;
    }

    $saved_otp = $_SESSION['saas_wizard_registration']['otp'];
    $otp_time = $_SESSION['saas_wizard_registration']['otp_time'];

    // Check expiry (15 mins)
    if (time() - $otp_time > 900) {
        echo json_encode(['status' => 'error', 'message' => 'Verification code has expired. Please request a new code.']);
        exit;
    }

    if ($submitted_otp !== $saved_otp) {
        echo json_encode(['status' => 'error', 'message' => 'Incorrect verification code. Please check and try again.']);
        exit;
    }

    // Mark as verified
    $_SESSION['saas_wizard_registration']['otp_verified'] = true;

    echo json_encode([
        'status' => 'success',
        'message' => 'Identity verified successfully!',
        'user' => [
            'name' => $_SESSION['saas_wizard_registration']['name'],
            'email' => $_SESSION['saas_wizard_registration']['email'],
            'phone' => $_SESSION['saas_wizard_registration']['phone']
        ]
    ]);
    exit;
}

// ==========================================
// 4. ACTION: RESEND OTP
// ==========================================
if ($action === 'resend_otp') {
    if (!isset($_SESSION['saas_wizard_registration'])) {
        echo json_encode(['status' => 'error', 'message' => 'Session expired. Please restart registration.']);
        exit;
    }

    $name = $_SESSION['saas_wizard_registration']['name'];
    $email = $_SESSION['saas_wizard_registration']['email'];
    $phone = $_SESSION['saas_wizard_registration']['phone'];

    $otp = (string)mt_rand(100000, 999999);
    $_SESSION['saas_wizard_registration']['otp'] = $otp;
    $_SESSION['saas_wizard_registration']['otp_time'] = time();

    echo json_encode([
        'status' => 'success',
        'message' => 'New verification code has been dispatched.',
        'demo_otp' => $otp
    ]);
    exit;
}

// ==========================================
// 5. ACTION: CHECK DOMAIN
// ==========================================
if ($action === 'check_domain') {
    $domain = isset($_POST['domain']) ? trim($_POST['domain']) : '';
    $clean = preg_replace('#^https?://#i', '', $domain);
    $clean = trim(rtrim($clean, '/\\'));
    $clean = strtolower($clean);

    if (empty($clean)) {
        echo json_encode([
            'status' => 'error',
            'field' => 'domain',
            'message' => 'Please enter a domain, subdomain, or folder name.'
        ]);
        exit;
    }

    if (strlen($clean) < 3 || !preg_match('/^[a-z0-9]([a-z0-9\-\.]*[a-z0-9])?$/i', $clean)) {
        echo json_encode([
            'status' => 'error',
            'field' => 'domain',
            'message' => 'Invalid domain format. Use letters, numbers, hyphens or dots (e.g. www.mysalon.com or elegancespa).'
        ]);
        exit;
    }

    $reserved = ['admin', 'website', 'superadmin', 'database', 'uploads', 'assets', 'system', 'application', 'template1', 'template2', 'admin-template', 'adminpanel1-ci3'];
    if (in_array($clean, $reserved)) {
        echo json_encode([
            'status' => 'error',
            'field' => 'domain',
            'message' => "The directory '$clean' is reserved by the SaaS platform."
        ]);
        exit;
    }

    $stmt = $pdo->prepare("SELECT id FROM saas_tenants WHERE LOWER(domain) = ? OR LOWER(folder_name) = ? LIMIT 1");
    $stmt->execute([$clean, $clean]);
    if ($stmt->fetch()) {
        echo json_encode([
            'status' => 'error',
            'field' => 'domain',
            'message' => "'$clean' is already registered. Please choose another."
        ]);
        exit;
    }

    // Check if directory physically exists on the server filesystem
    $base_dir = __DIR__;
    if (file_exists($base_dir . DIRECTORY_SEPARATOR . $clean) || is_dir($base_dir . DIRECTORY_SEPARATOR . $clean)) {
        echo json_encode([
            'status' => 'error',
            'field' => 'domain',
            'message' => "'$clean' is already registered. Please choose another."
        ]);
        exit;
    }

    echo json_encode([
        'status' => 'success',
        'clean_domain' => $clean,
        'message' => "✓ Domain / folder '$clean' is available!"
    ]);
    exit;
}

// ==========================================
// 6. ACTION: SAVE PENDING SETUP (For Stripe Redirect)
// ==========================================
if ($action === 'save_pending_setup') {
    $clean_data = [
        'plan_code' => isset($_POST['plan_code']) ? trim($_POST['plan_code']) : 'SALON_SPA',
        'name' => isset($_POST['name']) ? trim($_POST['name']) : '',
        'email' => isset($_POST['email']) ? strtolower(trim($_POST['email'])) : '',
        'phone' => isset($_POST['phone']) ? trim($_POST['phone']) : '',
        'password' => isset($_POST['password']) ? trim($_POST['password']) : '',
        'business_name' => isset($_POST['business_name']) ? trim($_POST['business_name']) : 'My Salon & Spa',
        'tagline' => isset($_POST['tagline']) ? trim($_POST['tagline']) : '',
        'company_email' => isset($_POST['company_email']) ? trim($_POST['company_email']) : '',
        'company_phone' => isset($_POST['company_phone']) ? trim($_POST['company_phone']) : '',
        'company_address' => isset($_POST['company_address']) ? trim($_POST['company_address']) : '',
        'currency_symbol' => isset($_POST['currency_symbol']) ? trim($_POST['currency_symbol']) : '$',
        'domain' => isset($_POST['domain']) ? trim($_POST['domain']) : '',
        'chosen_template' => isset($_POST['chosen_template']) ? trim($_POST['chosen_template']) : 'template1',
        'chosen_layout' => isset($_POST['chosen_layout']) ? (int)$_POST['chosen_layout'] : 1
    ];

    $temp_dir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'temp';
    if (!file_exists($temp_dir)) {
        @mkdir($temp_dir, 0755, true);
    }

    if (isset($_FILES['company_logo']) && $_FILES['company_logo']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['company_logo']['name'], PATHINFO_EXTENSION));
        $tmp_logo = $temp_dir . DIRECTORY_SEPARATOR . 'logo_' . time() . '_' . rand(100, 999) . '.' . $ext;
        if (@move_uploaded_file($_FILES['company_logo']['tmp_name'], $tmp_logo)) {
            $clean_data['temp_logo_path'] = $tmp_logo;
        }
    }

    if (isset($_FILES['favicon']) && $_FILES['favicon']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION));
        $tmp_fav = $temp_dir . DIRECTORY_SEPARATOR . 'fav_' . time() . '_' . rand(100, 999) . '.' . $ext;
        if (@move_uploaded_file($_FILES['favicon']['tmp_name'], $tmp_fav)) {
            $clean_data['temp_favicon_path'] = $tmp_fav;
        }
    }

    $_SESSION['pending_wizard_setup'] = $clean_data;
    echo json_encode(['status' => 'success', 'message' => 'Pending setup saved in session.']);
    exit;
}

// Fast directory copy helper
if (!function_exists('wizard_copy_fast')) {
    function wizard_copy_fast($source, $dest) {
        if (!is_dir($source)) return false;
        if (!file_exists($dest)) {
            @mkdir($dest, 0755, true);
        }
        $is_windows = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');
        if ($is_windows) {
            $src_win = str_replace('/', '\\', realpath($source));
            $dst_win = str_replace('/', '\\', $dest);
            $cmd = "robocopy \"$src_win\" \"$dst_win\" /E /NFL /NDL /NJH /NJS /R:1 /W:1";
            @exec($cmd, $out, $ret);
            if ($ret <= 7 && file_exists($dest . DIRECTORY_SEPARATOR . 'index.php')) {
                return true;
            }
        }
        $dir = opendir($source);
        if ($dir) {
            while (false !== ($file = readdir($dir))) {
                if ($file === '.' || $file === '..' || $file === '.git') continue;
                $src_file = $source . DIRECTORY_SEPARATOR . $file;
                $dst_file = $dest . DIRECTORY_SEPARATOR . $file;
                if (is_dir($src_file)) {
                    wizard_copy_fast($src_file, $dst_file);
                } else {
                    @copy($src_file, $dst_file);
                }
            }
            closedir($dir);
        }
        return true;
    }
}

// Recursive directory deletion helper
if (!function_exists('remove_dir_recursive')) {
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
}

/**
 * Universal SaaS Tenant Provisioning Engine
 */
function execute_subscription_provisioning($pdo, $settings, $data, $files = []) {
    // Collect all inputs from the 5 steps
    $plan_code = isset($data['plan_code']) ? strtoupper(trim($data['plan_code'])) : 'SALON_SPA';
    if (!in_array($plan_code, ['SALON', 'SPA', 'SALON_SPA'])) {
        $plan_code = 'SALON_SPA';
    }

    // Step 1 Details
    $name = isset($data['name']) ? trim($data['name']) : '';
    $email = isset($data['email']) ? strtolower(trim($data['email'])) : '';
    $phone = isset($data['phone']) ? trim($data['phone']) : '';
    $password = isset($data['password']) ? trim($data['password']) : '';

    // Step 3 Details
    $business_name = isset($data['business_name']) && !empty($data['business_name']) ? trim($data['business_name']) : 'My Salon & Spa';
    $tagline = isset($data['tagline']) && !empty($data['tagline']) ? trim($data['tagline']) : 'Premium Beauty & Rejuvenating Wellness';
    $company_email = isset($data['company_email']) && !empty($data['company_email']) ? trim($data['company_email']) : $email;
    $company_phone = isset($data['company_phone']) && !empty($data['company_phone']) ? trim($data['company_phone']) : $phone;
    $company_address = isset($data['company_address']) && !empty($data['company_address']) ? trim($data['company_address']) : '742 Fashion Avenue, Suite 100';
    $currency_symbol = isset($data['currency_symbol']) && !empty($data['currency_symbol']) ? trim($data['currency_symbol']) : (isset($settings['currency_symbol']) ? $settings['currency_symbol'] : '$');
    $raw_domain = isset($data['domain']) ? trim($data['domain']) : '';

    // Step 4 Details
    $chosen_template = isset($data['chosen_template']) && in_array($data['chosen_template'], ['template1', 'template2']) ? $data['chosen_template'] : 'template1';
    $chosen_layout = isset($data['chosen_layout']) && in_array((int)$data['chosen_layout'], [1, 2, 3]) ? (int)$data['chosen_layout'] : 1;

    // Step 5 Payment Details
    $payment_method = isset($data['payment_method']) ? trim($data['payment_method']) : 'sandbox';
    $transaction_id = isset($data['transaction_id']) ? trim($data['transaction_id']) : ('PAY-' . time() . '-' . rand(1000, 9999));

    // Basic Validation
    if (empty($name) || empty($email) || empty($password)) {
        return ['status' => 'error', 'message' => 'Full Name, Email Address, and Password are required.'];
    }

    if (empty($raw_domain)) {
        $raw_domain = preg_replace('/[^a-z0-9]/', '', strtolower($business_name));
        if (strlen($raw_domain) < 3) $raw_domain = 'salon' . rand(100, 999);
    }

    $clean_domain = preg_replace('#^https?://#i', '', $raw_domain);
    $clean_domain = trim(rtrim($clean_domain, '/\\'));
    $clean_domain = strtolower($clean_domain);

    if (!preg_match('/^[a-z0-9]([a-z0-9\-\.]*[a-z0-9])?$/i', $clean_domain) || strlen($clean_domain) < 3) {
        return ['status' => 'error', 'message' => 'Invalid domain format. Use format like www.mysalon.com or elegancespa'];
    }

    $reserved = ['admin', 'website', 'superadmin', 'database', 'uploads', 'assets', 'system', 'application', 'template1', 'template2', 'admin-template', 'adminpanel1-ci3'];
    if (in_array($clean_domain, $reserved)) {
        return ['status' => 'error', 'message' => "The directory '$clean_domain' is reserved by the SaaS platform."];
    }

    $base_dir = __DIR__;

    // Check if domain taken in saas_tenants or physically on disk
    $stmt_d = $pdo->prepare("SELECT id FROM saas_tenants WHERE LOWER(domain) = ? OR LOWER(folder_name) = ? LIMIT 1");
    $stmt_d->execute([$clean_domain, $clean_domain]);
    $taken_in_db = (bool)$stmt_d->fetch();
    $taken_on_disk = (file_exists($base_dir . DIRECTORY_SEPARATOR . $clean_domain) || is_dir($base_dir . DIRECTORY_SEPARATOR . $clean_domain));

    if ($taken_in_db || $taken_on_disk) {
        if ($payment_method !== 'sandbox') {
            // Auto-resolve domain uniqueness for already paid gateway transactions
            $orig_domain = $clean_domain;
            $counter = 1;
            while (true) {
                $candidate = $orig_domain . $counter;
                $stmt_d2 = $pdo->prepare("SELECT id FROM saas_tenants WHERE LOWER(domain) = ? OR LOWER(folder_name) = ? LIMIT 1");
                $stmt_d2->execute([$candidate, $candidate]);
                if (!$stmt_d2->fetch() && !file_exists($base_dir . DIRECTORY_SEPARATOR . $candidate)) {
                    $clean_domain = $candidate;
                    break;
                }
                $counter++;
            }
        } else {
            return ['status' => 'error', 'message' => "'$clean_domain' is already registered. Please choose another."];
        }
    }

    // Fetch Plan Details
    $stmt = $pdo->prepare("SELECT * FROM marketplace_plans WHERE plan_code = ? LIMIT 1");
    $stmt->execute([$plan_code]);
    $plan = $stmt->fetch();

    $plan_id = $plan ? (int)$plan->id : 3;
    $amount = $plan ? (float)$plan->price : 89.00;
    $plan_name = $plan ? $plan->name : 'Salon & Spa Complete Edition';

    // 1. Record Order in marketplace_orders
    $order_number = 'ORD-' . date('Y') . '-' . rand(1000, 9999);
    $license_key = 'LIC-' . $plan_code . '-' . strtoupper(substr(uniqid(), -4)) . '-' . date('Y') . '-X' . rand(100, 999);
    $download_token = bin2hex(random_bytes(16));

    $stmt_order = $pdo->prepare("
        INSERT INTO marketplace_orders 
        (order_number, customer_name, customer_email, customer_phone, business_name, plan_id, plan_code, chosen_template, chosen_layout, amount, payment_method, payment_status, license_key, download_token, download_count)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'paid', ?, ?, 0)
    ");
    $stmt_order->execute([
        $order_number, $name, $email, $phone, $business_name, $plan_id, $plan_code, $chosen_template, $chosen_layout, $amount, $payment_method, $license_key, $download_token
    ]);
    $order_id = $pdo->lastInsertId();

    // 2. Record License
    $stmt_lic = $pdo->prepare("
        INSERT INTO marketplace_licenses 
        (license_key, order_id, customer_email, plan_code, template, layout, status)
        VALUES (?, ?, ?, ?, ?, ?, 'active')
    ");
    $stmt_lic->execute([
        $license_key, $order_id, $email, $plan_code, $chosen_template, $chosen_layout
    ]);

    // 3. Delegate to Provision Engine logic
    $tenant_dir = $base_dir . DIRECTORY_SEPARATOR . $clean_domain;

    try {
        @set_time_limit(180);
        if (!file_exists($tenant_dir)) {
            @mkdir($tenant_dir, 0755, true);
        }

        // Copy frontend website
        $website_src = $base_dir . DIRECTORY_SEPARATOR . 'website';
        wizard_copy_fast($website_src, $tenant_dir);

        // Copy admin panel
        $admin_src = $base_dir . DIRECTORY_SEPARATOR . 'admin';
        $tenant_admin_dir = $tenant_dir . DIRECTORY_SEPARATOR . 'admin';
        wizard_copy_fast($admin_src, $tenant_admin_dir);

        // Prune unselected template files so tenant views and assets contain ONLY the chosen template
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

        @file_put_contents($tenant_dir . DIRECTORY_SEPARATOR . 'install.lock', "Tenant provisioned on " . date('Y-m-d H:i:s') . "\nDomain: $clean_domain");
        @file_put_contents($tenant_admin_dir . DIRECTORY_SEPARATOR . 'install.lock', "Tenant provisioned on " . date('Y-m-d H:i:s') . "\nDomain: $clean_domain");

        // Handle uploaded branding assets
        $tenant_uploads_dir = $tenant_dir . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'branding';
        $tenant_admin_uploads_dir = $tenant_admin_dir . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'branding';
        @mkdir($tenant_uploads_dir, 0755, true);
        @mkdir($tenant_admin_uploads_dir, 0755, true);

        $logo_rel_path = 'uploads/branding/logo.webp';
        $favicon_rel_path = 'uploads/branding/codeulas_logo_small.webp';

        // Logo
        if (isset($files['company_logo']) && $files['company_logo']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($files['company_logo']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['png', 'jpg', 'jpeg', 'webp', 'svg'])) {
                $logo_filename = 'logo_' . time() . '.' . $ext;
                $dest_logo = $tenant_uploads_dir . DIRECTORY_SEPARATOR . $logo_filename;
                if (@move_uploaded_file($files['company_logo']['tmp_name'], $dest_logo)) {
                    @copy($dest_logo, $tenant_admin_uploads_dir . DIRECTORY_SEPARATOR . $logo_filename);
                    $logo_rel_path = 'uploads/branding/' . $logo_filename;
                }
            }
        } elseif (!empty($data['temp_logo_path']) && file_exists($data['temp_logo_path'])) {
            $ext = strtolower(pathinfo($data['temp_logo_path'], PATHINFO_EXTENSION));
            $logo_filename = 'logo_' . time() . '.' . $ext;
            $dest_logo = $tenant_uploads_dir . DIRECTORY_SEPARATOR . $logo_filename;
            if (@copy($data['temp_logo_path'], $dest_logo)) {
                @copy($dest_logo, $tenant_admin_uploads_dir . DIRECTORY_SEPARATOR . $logo_filename);
                $logo_rel_path = 'uploads/branding/' . $logo_filename;
            }
        } else {
            $sample_logo = $base_dir . '/uploads/branding/logo.webp';
            if (file_exists($sample_logo)) {
                @copy($sample_logo, $tenant_uploads_dir . '/logo.webp');
                @copy($sample_logo, $tenant_admin_uploads_dir . '/logo.webp');
            }
        }

        // Favicon
        if (isset($files['favicon']) && $files['favicon']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($files['favicon']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['ico', 'png', 'webp'])) {
                $fav_filename = 'favicon_' . time() . '.' . $ext;
                $dest_fav = $tenant_uploads_dir . DIRECTORY_SEPARATOR . $fav_filename;
                if (@move_uploaded_file($files['favicon']['tmp_name'], $dest_fav)) {
                    @copy($dest_fav, $tenant_admin_uploads_dir . DIRECTORY_SEPARATOR . $fav_filename);
                    $favicon_rel_path = 'uploads/branding/' . $fav_filename;
                }
            }
        } elseif (!empty($data['temp_favicon_path']) && file_exists($data['temp_favicon_path'])) {
            $ext = strtolower(pathinfo($data['temp_favicon_path'], PATHINFO_EXTENSION));
            $fav_filename = 'favicon_' . time() . '.' . $ext;
            $dest_fav = $tenant_uploads_dir . DIRECTORY_SEPARATOR . $fav_filename;
            if (@copy($data['temp_favicon_path'], $dest_fav)) {
                @copy($dest_fav, $tenant_admin_uploads_dir . DIRECTORY_SEPARATOR . $fav_filename);
                $favicon_rel_path = 'uploads/branding/' . $fav_filename;
            }
        } else {
            $sample_fav = $base_dir . '/uploads/branding/codeulas_logo_small.webp';
            if (file_exists($sample_fav)) {
                @copy($sample_fav, $tenant_uploads_dir . '/codeulas_logo_small.webp');
                @copy($sample_fav, $tenant_admin_uploads_dir . '/codeulas_logo_small.webp');
            }
        }

        // Tenant Database Provisioning
        $clean_db_suffix = preg_replace('/[^a-zA-Z0-9_]/', '_', $clean_domain);
        $tenant_db_name = substr('spasalon_t_' . $clean_db_suffix, 0, 60);

        $db_pdo = new PDO('mysql:host=localhost', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $db_pdo->exec("CREATE DATABASE IF NOT EXISTS `$tenant_db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $db_pdo->exec("USE `$tenant_db_name`");

        $schema_file = $base_dir . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'schema.sql';
        if (file_exists($schema_file)) {
            $imported_cli = false;
            $mysql_bin = 'C:\\xampp\\mysql\\bin\\mysql.exe';
            if (file_exists($mysql_bin)) {
                $cmd = '"' . $mysql_bin . '" -u root --default-character-set=utf8mb4 "' . $tenant_db_name . '" < "' . $schema_file . '"';
                $full_cmd = 'cmd.exe /c "' . $cmd . '"';
                @exec($full_cmd, $cli_out, $cli_code);
                if ($cli_code === 0) {
                    $imported_cli = true;
                }
            }

            if (!$imported_cli) {
                $sql = file_get_contents($schema_file);
                $db_pdo->exec("SET FOREIGN_KEY_CHECKS = 0;");
                $statements = split_sql_statements($sql);
                foreach ($statements as $stmt_sql) {
                    $stmt_sql = trim($stmt_sql);
                    if (!empty($stmt_sql)) {
                        try {
                            $db_pdo->exec($stmt_sql);
                        } catch (Exception $sql_e) {
                            // Non-fatal statement continuation
                        }
                    }
                }
                $db_pdo->exec("SET FOREIGN_KEY_CHECKS = 1;");
            }
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

            $stmt_ms = $pdo->prepare("SELECT * FROM template_services WHERE template_key = ? AND layout_number = ? ORDER BY sort_order ASC");
            $stmt_ms->execute([$chosen_template, $chosen_layout]);
            $m_services = $stmt_ms->fetchAll(PDO::FETCH_ASSOC);
            if (empty($m_services)) {
                $stmt_ms2 = $pdo->prepare("SELECT * FROM template_services WHERE template_key = ? ORDER BY sort_order ASC");
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

            $stmt_mb = $pdo->prepare("SELECT * FROM template_blogs WHERE template_key = ? AND layout_number = ? ORDER BY sort_order ASC");
            $stmt_mb->execute([$chosen_template, $chosen_layout]);
            $m_blogs = $stmt_mb->fetchAll(PDO::FETCH_ASSOC);
            if (empty($m_blogs)) {
                $stmt_mb2 = $pdo->prepare("SELECT * FROM template_blogs WHERE template_key = ? ORDER BY sort_order ASC");
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

        // Settings
        $settings_to_set = [
            'business_name' => $business_name,
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

        // Admin User in Tenant Database
        $hashed_pass = password_hash($password, PASSWORD_BCRYPT);
        $upd_user = $db_pdo->prepare("
            UPDATE users 
            SET name = ?, email = ?, password = ?, phone = ?, status = 'active'
            WHERE id = 1 OR role_id = 1
            LIMIT 1
        ");
        $upd_user->execute([$name, $email, $hashed_pass, $phone]);

        // Update database config in tenant
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

        // Calculate URLs
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) ? "https://" : "http://";
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
        $script_path = isset($_SERVER['SCRIPT_NAME']) ? str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']) : '/spasalonmanagement/';
        $base_platform_url = $protocol . $host . rtrim($script_path, '/\\') . '/';

        $website_url = $base_platform_url . $clean_domain . '/';
        $admin_url = $base_platform_url . $clean_domain . '/admin/';

        // Register in saas_tenants
        $stmt_tenant = $pdo->prepare("
            INSERT INTO saas_tenants 
            (order_id, domain, folder_name, company_name, company_email, company_phone, company_address, plan_code, template, layout, currency_symbol, logo_path, favicon_path, db_name, admin_email, website_url, admin_url, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'active')
        ");
        $stmt_tenant->execute([
            $order_id, $clean_domain, $clean_domain, $business_name, $company_email, $company_phone, $company_address,
            $plan_code, $chosen_template, $chosen_layout, $currency_symbol, $logo_rel_path, $favicon_rel_path,
            $tenant_db_name, $email, $website_url, $admin_url
        ]);
        $tenant_id = $pdo->lastInsertId();

        // Clear wizard session
        if (isset($_SESSION['saas_wizard_registration'])) {
            unset($_SESSION['saas_wizard_registration']);
        }

        return [
            'status' => 'success',
            'message' => 'Payment processed and SaaS instance provisioned successfully!',
            'order_number' => $order_number,
            'license_key' => $license_key,
            'download_url' => 'download.php?token=' . urlencode($download_token) . '&order=' . urlencode($order_number),
            'tenant_id' => $tenant_id,
            'domain' => $clean_domain,
            'folder_name' => $clean_domain,
            'company_name' => $business_name,
            'plan_title' => ($plan_code === 'SALON' ? 'Salon Edition' : ($plan_code === 'SPA' ? 'Spa Wellness Edition' : 'Salon & Spa Complete')),
            'plan_code' => $plan_code,
            'chosen_template' => $chosen_template,
            'chosen_layout' => $chosen_layout,
            'website_url' => $website_url,
            'admin_url' => $admin_url,
            'admin_email' => $email,
            'admin_password' => $password,
            'db_name' => $tenant_db_name,
            'created_at' => date('Y-m-d H:i:s')
        ];

    } catch (Exception $e) {
        return ['status' => 'error', 'message' => 'Provisioning failed: ' . $e->getMessage()];
    }
}

// ==========================================
// 7. ACTION: PROCESS SUBSCRIPTION & PROVISIONING
// ==========================================
if ($action === 'process_subscription') {
    $res = execute_subscription_provisioning($pdo, $settings, $_POST, $_FILES);
    echo json_encode($res);
    exit;
}

if ($is_direct_api_call || !empty($action)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action parameter.']);
    exit;
}
