<?php
require_once "include/bittorrent.php";
require_once "include/user_functions.php";
dbconn();

$username = 'upzdev';
$password = 'admin123';
$passhash = md5($password);
$secret = substr(md5(uniqid(mt_rand(), true)), 0, 20); // random secret, max 20 chars
$passkey = md5(uniqid(mt_rand(), true)); // random passkey
$editsecret = md5(uniqid(mt_rand(), true)); // random editsecret
$email = 'dev@tbdev.upz.in.th';
$status = 'confirmed';
$added = TIME_NOW;
$last_login = TIME_NOW;
$last_access = TIME_NOW;
$ip = '127.0.0.1';
$class = UC_SYSOP; // 6
$enabled = 'yes';
$stylesheet = 1;
$language = 'en';
$avatar = '';
$title = 'Developer';
$notifs = '';
$modcomment = '';

$sql = "INSERT INTO users (username, passhash, secret, passkey, editsecret, email, status, added, last_login, last_access, ip, class, enabled, stylesheet, language, avatar, title, notifs, modcomment) VALUES (" . sqlesc($username) . ", " . sqlesc($passhash) . ", " . sqlesc($secret) . ", " . sqlesc($passkey) . ", " . sqlesc($editsecret) . ", " . sqlesc($email) . ", " . sqlesc($status) . ", $added, $last_login, $last_access, " . sqlesc($ip) . ", $class, " . sqlesc($enabled) . ", $stylesheet, " . sqlesc($language) . ", " . sqlesc($avatar) . ", " . sqlesc($title) . ", " . sqlesc($notifs) . ", " . sqlesc($modcomment) . ")";
$result = mysql_query($sql);

if ($result) {
    $user_id = mysql_insert_id();
    echo "Dev user inserted with ID: $user_id\n";
} else {
    echo "Error inserting user: " . mysql_error() . "\n";
}
?>