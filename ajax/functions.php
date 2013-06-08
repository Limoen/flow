<?php

function parserSide($feedURL) {
	$rss = simplexml_load_file($feedURL);
	echo "<div id='all_articles'>";
	$i = 0;
	foreach ($rss->channel->item as $feedItem) {
		$i++;
		echo "<div class='articles' id='article'>";
		echo "<h1 class='article_title'>" . $feedItem -> title . "</h1>";
		echo "<div class='title_bg'></div>";
		echo "</div>";
		if ($i >= 5)
			break;
	}
	echo "</div>";
}
?>