<?php
/*
Dynamic Robots.txt Generator for TBDev
Allows conditional rules based on user agent or other factors
*/

header('Content-Type: text/plain; charset=utf-8');

// Get user agent
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

// Base robots.txt content
$robots_content = "# TBDev Torrent Tracker Robots.txt
# Dynamic generation with URL shortener integration
# Generated on: " . date('Y-m-d H:i:s') . "

User-agent: *
Allow: /

# Allow access to main content
Allow: /browse.php
Allow: /details.php
Allow: /faq.php
Allow: /rules.php
Allow: /links.php
Allow: /topten.php

# Disallow admin and sensitive areas
Disallow: /admin/
Disallow: /admin.php
Disallow: /bitbucket/
Disallow: /cache/
Disallow: /cgi-bin/
Disallow: /include/
Disallow: /lang/
Disallow: /logs/
Disallow: /members/
Disallow: /pic/
Disallow: /scripts/
Disallow: /SQL/
Disallow: /torrents/
Disallow: /javairc/

# Disallow login and user-specific pages
Disallow: /login.php
Disallow: /logout.php
Disallow: /userdetails.php
Disallow: /my.php
Disallow: /messages.php
Disallow: /friends.php
Disallow: /users.php

# Disallow file operations
Disallow: /download.php
Disallow: /upload.php
Disallow: /takeupload.php
Disallow: /filelist.php
Disallow: /viewnfo.php

# Disallow forums (optional - remove if you want forums indexed)
Disallow: /forums.php
Disallow: /forums/

# Disallow API and webhook
Disallow: /webhook.php
Disallow: /api/

# Allow sitemap
Allow: /sitemap.xml

# Crawl delay to be respectful
Crawl-delay: 1

";

// Special rules for major search engines
$search_engines = "
# Specific rules for major search engines
User-agent: Googlebot
Allow: /
Crawl-delay: 1

User-agent: Bingbot
Allow: /
Crawl-delay: 1

User-agent: Slurp
Allow: /
Crawl-delay: 1

";

// Block bad bots
$bad_bots = "
# Block bad bots
User-agent: AhrefsBot
Disallow: /

User-agent: MJ12bot
Disallow: /

User-agent: DotBot
Disallow: /

User-agent: BLEXBot
Disallow: /

";

// Sitemap location
$sitemap = "
# Sitemap location
Sitemap: https://tbdev.upz.in.th/sitemap.xml
";

// Conditional rules based on user agent
if (stripos($user_agent, 'google') !== false) {
    // Allow Google more access
    $robots_content .= "
# Special rules for Google
User-agent: Googlebot
Allow: /forums/
Allow: /userdetails.php
Crawl-delay: 1
";
} elseif (stripos($user_agent, 'bing') !== false) {
    // Allow Bing more access
    $robots_content .= "
# Special rules for Bing
User-agent: Bingbot
Allow: /forums/
Crawl-delay: 2
";
}

// Add standard sections
$robots_content .= $search_engines;
$robots_content .= $bad_bots;
$robots_content .= $sitemap;

// Output the content
echo $robots_content;
?>