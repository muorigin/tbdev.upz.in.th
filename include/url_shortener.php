<?php
/*
URL Shortener Integration for go.upz.in.th
Tracks clicks, user behavior, geolocation, device info, sends data in real-time
*/

define('SHORTENER_API_KEY', 'fd2c4bb1939fcb32efe314d5f128dbb1');
define('SHORTENER_BASE_URL', 'https://go.upz.in.th');
define('SHORTENER_API_URL', SHORTENER_BASE_URL . '/api/shorten');
define('WEBHOOK_URL', 'https://tbdev.upz.in.th/webhook.php');
define('ENCRYPTION_KEY', bin2hex(openssl_random_pseudo_bytes(32))); // Auto-generated 32-byte key for AES-256
define('BASE_URL', 'https://tbdev.upz.in.th');

/**
 * Shorten a URL using go.upz.in.th API
 * @param string $long_url The URL to shorten
 * @param int|null $user_id User ID for logging
 * @return string|false Shortened URL or false on error
 */
function shorten_url($long_url, $user_id = null) {
    global $CURUSER, $TBDEV;

    if (isset($TBDEV['url_shortener_enabled']) && !$TBDEV['url_shortener_enabled']) {
        return false;
    }

    $user_id = $user_id ?: (isset($CURUSER['id']) ? $CURUSER['id'] : null);
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'unknown';

    $data = array(
        'api_key' => SHORTENER_API_KEY,
        'url' => $long_url,
        'webhook_url' => WEBHOOK_URL
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, SHORTENER_API_URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For testing, remove in production
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $status = 'failed';
    $short_url = null;

    if ($http_code == 200) {
        $result = json_decode($response, true);
        if (isset($result['short_url'])) {
            $short_url = $result['short_url'];
            $status = 'success';
        }
    }

    // Log to database
    if (function_exists('mysql_query')) {
        $original_url = mysql_real_escape_string($long_url);
        $short_url_escaped = $short_url ? mysql_real_escape_string($short_url) : 'NULL';
        $user_id_escaped = $user_id ? intval($user_id) : 'NULL';
        $ip_escaped = mysql_real_escape_string($ip);

        $query = "INSERT INTO url_shortener_logs (original_url, short_url, user_id, ip_address, status) VALUES ('$original_url', " . ($short_url ? "'$short_url_escaped'" : "NULL") . ", " . ($user_id ? $user_id_escaped : "NULL") . ", '$ip_escaped', '$status')";
        @mysql_query($query);
    }

    if ($status === 'failed') {
        // Log error
        error_log("URL Shortener Error: HTTP $http_code, Response: $response");
        return false;
    }

    return $short_url;
}

/**
 * Encrypt data using AES-256-CBC
 * @param string $data Data to encrypt
 * @return string Encrypted data
 */
function encrypt_data($data) {
    $key = ENCRYPTION_KEY;
    $iv = openssl_random_pseudo_bytes(16);
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
    return base64_encode($iv . $encrypted);
}

/**
 * Decrypt data using AES-256-CBC
 * @param string $encrypted_data Encrypted data
 * @return string|false Decrypted data or false on error
 */
function decrypt_data($encrypted_data) {
    $key = ENCRYPTION_KEY;
    $data = base64_decode($encrypted_data);
    $iv = substr($data, 0, 16);
    $encrypted = substr($data, 16);
    return openssl_decrypt($encrypted, 'AES-256-CBC', $key, 0, $iv);
}

/**
 * Process webhook data from shortener
 * This function should be called in webhook.php
 * @param array $post_data POST data from webhook
 */
function process_webhook_data($post_data) {
    if (!isset($post_data['encrypted_data'])) {
        error_log("Webhook Error: No encrypted data");
        return;
    }

    $decrypted = decrypt_data($post_data['encrypted_data']);
    if (!$decrypted) {
        error_log("Webhook Error: Decryption failed");
        return;
    }

    $data = json_decode($decrypted, true);
    if (!$data) {
        error_log("Webhook Error: Invalid JSON");
        return;
    }

    // Process the click data
    // $data should contain: short_url, user_ip, user_agent, geolocation, device_info, click_time, etc.

    // Log to database
    if (function_exists('mysql_query')) {
        $short_url = isset($data['short_url']) ? mysql_real_escape_string($data['short_url']) : '';
        $click_data = mysql_real_escape_string($decrypted);
        $ip = isset($data['user_ip']) ? mysql_real_escape_string($data['user_ip']) : '';
        $user_agent = isset($data['user_agent']) ? mysql_real_escape_string($data['user_agent']) : '';
        $geolocation = isset($data['geolocation']) ? mysql_real_escape_string(json_encode($data['geolocation'])) : '';
        $device_info = isset($data['device_info']) ? mysql_real_escape_string(json_encode($data['device_info'])) : '';

        $query = "INSERT INTO url_shortener_clicks (short_url, click_data, ip_address, user_agent, geolocation, device_info) VALUES ('$short_url', '$click_data', '$ip', '$user_agent', '$geolocation', '$device_info')";
        @mysql_query($query);
    }

    // Also log to file as backup
    $log_data = date('Y-m-d H:i:s') . " - Click: " . json_encode($data) . "\n";
    file_put_contents('click_logs.txt', $log_data, FILE_APPEND);
}
?>