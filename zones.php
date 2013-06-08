<?php

$currentPage = 'zones';

session_start();

try {
	include_once ("classes/Zone.class.php");
	include_once ("classes/User.class.php");

	$zone = new Zone();
	$userzones = $zone -> getUserZones($_SESSION['id']);

	$user = new User();
	$useravatar = $user -> getUserInfo($_SESSION['id']);
	$temp = $useravatar -> fetch_assoc();

} catch (Exception $e) {
	$feedback = $e -> getMessage();
}
?><!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<link rel="apple-touch-icon-precomposed" href="../images/icon.png"/>
	<meta name="description" content="" />
	<meta name="author" content="Sonny Willems" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<link id= "css" rel="stylesheet" type="text/css" href="css/style2.css" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
	<title>Zones</title>
	<style>
		.all_titles {
			display: none;
			position: relative;
			z-index: 10;
			margin-top: 110px;
			margin-left: -800px;
			float: left;
			width: 180px;
		}
		.article_title_reading {
			font-size: 13px;
			font-weight: 200;
			padding-bottom: 10px;
			padding-top: 15px;
		}

		.line_horizontal_reading {
			z-index: 1;
			width: 180px;
			position: absolute;
			padding-bottom: 10px;
		}

	</style>
</head>

<body>
	<div class="container">

		<!--NAVIGATION HEADER-->

		<header>
			<div class="header">
				&nbsp;
			</div>
			<img src="images/logo_small.png" class="logo_small" />

			<div class="avatar" ontouchstart="window.location.href='settings.php'">
				<img src="images/<?=$temp['user_avatar'] ?>" id="avatar" ontouchstart="window.location.href='settings.php'"/>
			</div>
			<img src="images/line.png" class="line"/>
			<div class="settings" ontouchstart="window.location.href='change_zones.php'">
				<img src="images/settings_icon.png"  ontouchstart="window.location.href='change_zones.php'"
				class="icon"/>
			</div>
			<div class="title">
				zones
			</div>
		</header>

		<!--END NAVIGATION HEADER-->

		<!--INTERACTION MODE-->

		<div class="main_btn"  id="main_btn" ontouchstart="toggleMenu(event)"></div>
		<img src="images/scanning.png" class="scanning" id="main_btn2" ontouchstart="toggleMenu(event)"/>
		<div id="interaction_modes">
			<div class="reading_btn" id="reading_btn" ontouchstart="switchToReadingMode(event);">
				<img src="images/reading.png" class="reading" id="reading_btn" ontouchstart="switchToReadingMode(event);"/>
			</div>

			<div class="scanning_btn" id="scanning_btn" ontouchstart="switchToScanningMode(event);">
				<img src="images/scanning.png" class="scanning2" id="scanning_btn" ontouchstart="switchToScanningMode(event);"/>
			</div>

			<div class="glancing_btn" id="glancing_btn" ontouchstart="switchToGlancingMode(event);">
				<img src="images/logo_small.png" class="glancing" id="glancing_btn" ontouchstart="switchToGlancingMode(event);"/>
			</div>
		</div>
	</div>

	<!--END INTERACTION MODE-->

	<!--ZONES-->

	<div id="zones">
		<?php
		if (isset($zone)) {
			while ($temp = $userzones -> fetch_assoc()) {
				echo "<div class='zone' id='zone' ontouchstart=\"window.location.href='" . $temp['zone_link'] . "'\" >";
				echo "<img src='images/" . $temp['zone_image'] . "' class='zone_image' />";
				echo "<img src='images/testimg.jpg' class='zone_image2' />";
				echo "<img src='images/testimg.jpg' class='zone_image2' />";
				echo "<img src='images/testimg.jpg' class='zone_image2' />";
				echo "<img src='images/line_horizontal.png' class='line_horizontal' />";
				echo "<h1 class='zone_title'>" . $temp['zone_name'] . "</h1>";
				echo "<div class='zone_bg' style='background-color:" . $temp['zone_color'] . "'></div>";
				echo "</div>";
				echo "<div class='zone_bg_reading' ontouchstart=\"window.location.href='" . $temp['zone_link'] . "'\"></div>";
			}
		}

		parserSide("http://news.yahoo.com/rss/gaming");
		function parserSide($feedURL) {
			$rss = simplexml_load_file($feedURL);

			echo "<div id='all_titles' class='all_titles'>";
			$i = 0;
			foreach ($rss->channel->item as $feedItem) {
				$i++;
				echo "<h1 class='article_title_reading'>" . $feedItem -> title . "</h1>";
				echo "<img src='images/line_horizontal.png' class='line_horizontal_reading' />";

				if ($i >= 6)
					break;

			}
			echo "</div>";
		}
		?>
	</div>

	<!--END ZONES-->
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">


	var main_btn = document.getElementById("main_btn");

	function toggleMenu(e) {

		//Hide or show the interaction menu

		var interaction_modes = document.getElementById("interaction_modes");

		interaction_modes.style.visibility = "visible";

		/*if (interaction_modes.style.visibility == "hidden") {

		 interaction_modes.style.visibility = "visible";

		 } else {
		 interaction_modes.style.visibility = "hidden";

		 }

		 e.preventDefault();
		 return false;*/
	}

	function switchToGlancingMode(e) {

		//Switch button

		document.getElementById("main_btn2").src = "images/logo_small.png";
		var mode_id = "glancing";
		$.post('zone.php', {
			variable : mode_id
		});

		/*$.post('zone.php', {
		variable : mode
		});*/

		//Hide interaction modes

		interaction_modes.style.visibility = "hidden";

		//Change style (without flickering)

		$('.zone').css({
			"width" : "790px",
			"height" : "70px",
			"margin-top" : "60px",
			"float:" : "right"
		});

		$('.zone_bg').css({
			"width" : "784px",
			"height" : "70px",
			"margin-top" : "-74px"
		});

		$('.scanning').css({
			"margin-top" : "291px",
			"width" : "45px",
			"margin-left" : "38px"
		});

		$('.zone_title').css({
			"margin" : "-50px 0 0 550px",
			"padding" : "0 10px 0 40px",
			"text-align" : "right"

		});

		$('.line_horizontal').css({
			"margin-top" : "130px",
			"margin-left" : "-785px",
			"width" : "785px",
			"height" : "1px"

		});

		$('.zone_image').css({
			"width" : "196px",
			"height" : "130px",
			"visibility" : "visible"

		});

		$('.zone_image2').css({
			"display" : "inline"

		})

		$('.zone_bg_reading').css({
			"display" : "none"
		});

		$('.all_titles').css({
			"display" : "none"
		});

		//Change style (with flickering)

		/*document.getElementById('css').href = 'css/style_glancing.css';*/

	}

	function switchToScanningMode(e) {

		//Switch button

		document.getElementById("main_btn2").src = "images/scanning.png";

		var mode_id = "scanning";
		$.post('zone.php', {
			variable : mode_id
		});

		//Hide interaction modes

		interaction_modes.style.visibility = "hidden";

		//Change style (without flickering)

		$('.zone').css({
			"width" : "250px",
			"height" : "200px",
			"margin:" : "110px 20px 20px 10px",
			"float:" : "left"
		});

		$('.zone_bg').css({
			"width" : "250px",
			"height" : "60px",
			"margin-top" : "-3px"
		});

		$('.scanning').css({
			"margin-top" : "294px",
			"width" : "45px",
			"margin-left" : "38px"
		});

		$('.zone_title').css({
			"margin" : "10px 0 0 0",
			"padding" : "0 10px 0 40px"

		});

		$('.line_horizontal').css({
			"margin" : "170px 0 0 -250px",
			"width" : "251px"

		});

		$('.zone_image').css({
			"width" : "250px",
			"height" : "170px",
			"visibility" : "visible"

		});

		$('.zone_bg_reading').css({
			"display" : "none"
		});

		$('.zone_image2').css({
			"display" : "none"
		});

		$('.all_titles').css({
			"display" : "none"
		});

	}

	function switchToReadingMode(e) {

		//Switch button

		document.getElementById("main_btn2").src = "images/reading.png";

		var mode_id = "reading";
		$.post('zone.php', {
			variable : mode_id
		});

		//Hide interaction modes

		interaction_modes.style.visibility = "hidden";

		//Change style (without flickering)

		$('.zone').css({
			"width" : "250px",
			"height" : "600px",
			"margin:" : "10px 20px 20px 10px",
			"float:" : "left"
		});

		$('.zone_bg').css({
			"width" : "250px",
			"height" : "60px",
			"margin-top" : "-184px"
		});

		$('.scanning').css({
			"width" : "40px",
			"margin-left" : "40px",
			"margin-top" : "291px"
		});
		$('.zone_title').css({
			"margin" : "-175px 0 0 -10px"

		});

		$('.line_horizontal').css({
			"margin-top" : "50px",
			"margin-left" : "-250px",
			"width" : "251px",
			"height" : "1px"
		});

		$('.zone_image').css({
			"width" : "250px",
			"height" : "170px",
			"visibility" : "hidden"
		});
		$('.zone_bg_reading').css({
			"display" : "inline",

		});

		$('.zone_image2').css({
			"display" : "none"
		});

		$('.all_titles').css({
			"display" : "block"
		});
	}
</script>
</html>
