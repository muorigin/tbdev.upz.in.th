<?php
/*
Example code for using the URL Shortener API integration
This file demonstrates how to use the functions in include/url_shortener.php
*/

require_once "include/bittorrent.php";
require_once "include/url_shortener.php";

// Example 1: Shorten a URL
$long_url = "https://example.com/download.php?torrent=123";
$short_url = shorten_url($long_url);
if ($short_url) {
    echo "Short URL: $short_url\n";
} else {
    echo "Failed to shorten URL\n";
}

// Example 2: Encrypt data
$data = json_encode([
    'user_ip' => '192.168.1.1',
    'user_agent' => 'Mozilla/5.0...',
    'geolocation' => ['lat' => 13.7563, 'lon' => 100.5018],
    'device_info' => ['os' => 'Windows', 'browser' => 'Chrome'],
    'click_time' => time()
]);
$encrypted = encrypt_data($data);
echo "Encrypted data: $encrypted\n";

// Example 3: Decrypt data
$decrypted = decrypt_data($encrypted);
if ($decrypted) {
    echo "Decrypted data: $decrypted\n";
} else {
    echo "Decryption failed\n";
}

// Example 4: Process webhook data (simulate POST data)
$_POST['encrypted_data'] = $encrypted;
process_webhook_data($_POST);
echo "Webhook processed\n";

// Note: In production, replace placeholder values:
// - SHORTENER_API_KEY: Your actual API key
// - WEBHOOK_URL: Your actual webhook URL (e.g., https://yourdomain.com/webhook.php)
// - ENCRYPTION_KEY: A secure 32-byte key for AES-256
?>