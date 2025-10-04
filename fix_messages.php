<?php
require_once "include/config.php";
require_once "include/bittorrent.php";

dbconn();

mysql_query("ALTER TABLE messages MODIFY COLUMN `subject` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ไม่มีหัวเรื่อง'") or die(mysql_error());
mysql_query("ALTER TABLE messages MODIFY COLUMN msg text COLLATE utf8mb4_unicode_ci") or die(mysql_error());
mysql_query("ALTER TABLE messages MODIFY COLUMN unread enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'") or die(mysql_error());
mysql_query("ALTER TABLE messages MODIFY COLUMN saved enum('no','yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no'") or die(mysql_error());

echo "Messages table altered successfully.";
?>