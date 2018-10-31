<?php
/*
======================================================================
lastRSS usage DEMO
======================================================================
*/

// include lastRSS
include "./lastRSS.php";

// Create lastRSS object
$rss = new lastRSS;

// Set cache dir and cache time limit (1200 seconds)
// (don't forget to chmod cache dir to 777 to allow writing)
$rss->cache_dir = './temp';
$rss->cache_time = 1200;

// Limit number of returned items. 0 (zero) means "no limit"
$rss->items_limit = 5;

// Try to load and parse RSS file of The Open Designs Community
if ($rs = $rss->get('https://www.us-cert.gov/ncas/all.xml')) {

   // Show clickable website title
   echo "<h4><a href=\"$rs[link]\">$rs[title]</a></h4>\n";

   // Show last published articles (title, link, description)
   echo "";
   foreach($rs['items'] as $item) {
       echo "\t<p><a href=\"$item[link]\">".$item['title']."</a><br />".$item['description']."</p>\n";
       }
   echo "</ul>\n";
   }
else {
   echo "Error: It's not possible to reach RSS file...\n";
}
?>

