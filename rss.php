<?php
/*
+------------------------------------------------
|   TBDev.net BitTorrent Tracker PHP
|   =============================================
|   by CoLdFuSiOn
|   (c) 2003 - 2011 TBDev.Net
|   http://www.tbdev.net
|   =============================================
|   svn: http://sourceforge.net/projects/tbdevnet/
|   Licence Info: GPL
+------------------------------------------------
*/
require_once "include/bittorrent.php";
dbconn();
header("Content-Type: application/rss+xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
echo "<rss version=\"2.0\">\n";
echo "<channel>\n";
echo "<title>{$TBDEV['site_name']} - Latest Torrents</title>\n";
echo "<description>Latest uploaded torrents</description>\n";
echo "<link>{$TBDEV['baseurl']}</link>\n";
$res = mysql_query("SELECT id, name, added, size, seeders, leechers FROM torrents ORDER BY added DESC LIMIT 10") or sqlerr(__FILE__, __LINE__);
while ($row = mysql_fetch_assoc($res)) {
    echo "<item>\n";
    echo "<title>" . htmlsafechars($row['name']) . "</title>\n";
    echo "<description>Size: " . mksize($row['size']) . ", Seeders: {$row['seeders']}, Leechers: {$row['leechers']}</description>\n";
    echo "<link>{$TBDEV['baseurl']}/details.php?id={$row['id']}</link>\n";
    echo "<guid>{$TBDEV['baseurl']}/details.php?id={$row['id']}</guid>\n";
    echo "<pubDate>" . date('r', $row['added']) . "</pubDate>\n";
    echo "</item>\n";
}
echo "</channel>\n";
echo "</rss>\n";
?>