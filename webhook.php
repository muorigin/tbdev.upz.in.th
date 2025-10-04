<?php
/*
Webhook endpoint for URL shortener click data
Receives encrypted data from go.upz.in.th
*/

require_once "include/bittorrent.php";
require_once "include/url_shortener.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

// Get POST data
$post_data = $_POST;

process_webhook_data($post_data);

// Respond with success
http_response_code(200);
echo json_encode(['status' => 'success']);
?>