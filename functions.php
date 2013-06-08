<?php

function parserSide($feedURL) {
	$rss = simplexml_load_file($feedURL);
	echo "<div id='all_articles'>";
	$i = 0;
	foreach ($rss->channel->item as $feedItem) {
		$i++;
		echo "<div class='articles' id='article' style=\"background: url('http://rack.1.mshcdn.com/media/ZgkyMDEzLzA1LzMwLzNmL1dpbmRvd3M4ZXZlLmMxOTY5LmpwZwpwCXRodW1iCTk1MHg1MzQjCmUJanBn/917731f5/c02/Windows-8-event.jpg') no-repeat;\">\n"; 
		echo "<h1 class='article_title'>" . $feedItem -> title . "</h1>";
		echo "<div class='title_bg'></div>";
		echo "</div>";
		if ($i >= 1)
			break;
			}
	echo "</div>";
}
?>