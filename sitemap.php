<?php
/*
TBDev Torrent Tracker Sitemap Generator
Generates XML sitemap for SEO optimization
Includes URL shortener integration
*/

require_once "include/bittorrent.php";
require_once "include/user_functions.php";

dbconn();

// Set content type to XML
header('Content-Type: application/xml; charset=utf-8');

// Start XML output
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
echo '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . "\n";
echo '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9' . "\n";
echo '        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

// Base URL
$base_url = $TBDEV['baseurl'];

// Static pages - high priority
$static_pages = array(
    array('loc' => $base_url . '/', 'priority' => '1.0', 'changefreq' => 'daily'),
    array('loc' => $base_url . '/browse.php', 'priority' => '0.9', 'changefreq' => 'hourly'),
    array('loc' => $base_url . '/faq.php', 'priority' => '0.8', 'changefreq' => 'weekly'),
    array('loc' => $base_url . '/rules.php', 'priority' => '0.8', 'changefreq' => 'monthly'),
    array('loc' => $base_url . '/links.php', 'priority' => '0.6', 'changefreq' => 'weekly'),
    array('loc' => $base_url . '/topten.php', 'priority' => '0.7', 'changefreq' => 'daily'),
    array('loc' => $base_url . '/forums.php', 'priority' => '0.6', 'changefreq' => 'daily'),
);

// Add static pages
foreach ($static_pages as $page) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($page['loc']) . "</loc>\n";
    echo "    <priority>" . $page['priority'] . "</priority>\n";
    echo "    <changefreq>" . $page['changefreq'] . "</changefreq>\n";
    echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    echo "  </url>\n";
}

// Get recent torrents for sitemap
$torrent_query = "SELECT id, added FROM torrents WHERE visible = 'yes' AND banned = 'no' ORDER BY added DESC LIMIT 1000";
$torrent_res = mysql_query($torrent_query) or die(mysql_error());

while ($torrent = mysql_fetch_assoc($torrent_res)) {
    $priority = '0.6'; // Default priority for torrents
    $changefreq = 'weekly';

    // Higher priority for newer torrents
    $days_old = (TIME_NOW - strtotime($torrent['added'])) / 86400;
    if ($days_old < 1) {
        $priority = '0.8';
        $changefreq = 'daily';
    } elseif ($days_old < 7) {
        $priority = '0.7';
        $changefreq = 'daily';
    }

    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($base_url . '/details.php?id=' . $torrent['id']) . "</loc>\n";
    echo "    <priority>" . $priority . "</priority>\n";
    echo "    <changefreq>" . $changefreq . "</changefreq>\n";
    echo "    <lastmod>" . date('Y-m-d', strtotime($torrent['added'])) . "</lastmod>\n";
    echo "  </url>\n";
}

// Get categories
$cat_query = "SELECT id FROM categories ORDER BY id";
$cat_res = mysql_query($cat_query) or die(mysql_error());

while ($cat = mysql_fetch_assoc($cat_res)) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($base_url . '/browse.php?cat=' . $cat['id']) . "</loc>\n";
    echo "    <priority>0.5</priority>\n";
    echo "    <changefreq>weekly</changefreq>\n";
    echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    echo "  </url>\n";
}

// Get top users (for SEO - optional)
$user_query = "SELECT id FROM users WHERE enabled = 'yes' AND status = 'confirmed' ORDER BY uploaded DESC LIMIT 100";
$user_res = mysql_query($user_query) or die(mysql_error());

while ($user = mysql_fetch_assoc($user_res)) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($base_url . '/userdetails.php?id=' . $user['id']) . "</loc>\n";
    echo "    <priority>0.3</priority>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    echo "  </url>\n";
}

// Close XML
echo '</urlset>' . "\n";
?>