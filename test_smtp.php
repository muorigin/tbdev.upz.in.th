<?php
require_once "include/bittorrent.php";
require_once "include/user_functions.php";

$to = 'test@example.com'; // Replace with a real email for testing
$subject = 'SMTP Test Email';
$message = 'This is a test email sent via SMTP Gmail.';
$headers = 'From: upz.in.th@gmail.com';

if (smtp_mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully via SMTP.";
} else {
    echo "Failed to send email.";
}
?>