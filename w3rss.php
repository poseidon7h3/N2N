<?php
error_reporting(0);
$rss = new DOMDocument();
$rss->load('http://timesofindia.indiatimes.com/rssfeeds/4719161.cms');
$feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
      $htmlStr = $node->getElementsByTagName('description')->item(0)->nodeValue;
      $html = new DOMDocument();        
      $html->loadHTML($htmlStr);
       //get the first image tag from the description HTML
        $imgTag = $html->getElementsByTagName('img');
        $img = ($imgTag->length==0)?'noimg.png':$imgTag->item(0)->getAttribute('src');
       $item = array (
        'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
        'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
        'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
        'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
        'image' => $img,
      );
      array_push($feed, $item);
    }
$limit = 3;
for($x=0;$x<$limit;$x++) {
  $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
  $link = $feed[$x]['link'];
  $description = $feed[$x]['desc'];
  $img_main= $feed[$x]['image'];
  $date = date('l F d, Y', strtotime($feed[$x]['date']));
  echo '<div class="news-row-index">';
  echo '<div class="img"><a href="'.$link.'" target="_blank" title="'.$title.'"><img alt="IMAGE NOT FOUND" src="'.$img_main.'" height="79" width="89"></a></div>';
  echo '<div class="details-index"><p><h5><a href="'.$link.'" target="_blank" title="'.$title.'">'.$title.'</a></h5><br />';
  echo '<small><em>Posted on '.$date.'</em></small></p>';
  echo '<p>'.$description.'</p></div>';
  echo '</div>';
}
?>