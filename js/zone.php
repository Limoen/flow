<?php

$currentPage = 'zone';

session_start();

$zone_id = $_GET['id'];

try {
	include_once ("classes/Zone.class.php");

	$zone = new Zone();
	$zone_name = $zone -> getZoneById($zone_id);
	$temp = $zone_name -> fetch_assoc();

	$zone_color = $temp['zone_color'];
	$zone_feed = $temp['zone_feed'];

	$mode = $_GET['variable'];

} catch (Exception $e) {

}
?><!DOCTYPE html>
<html>
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
		<title>Zone</title>
			<style>
				.articles {
					width: 570px;
					height: 150px;
					position: relative;
					float: left;
					margin-left: -83px;
					padding-right: 10px;
					margin-top: -38px;
					backgroundSize: 100px 180px;
				}

				.article_img {
					width: 350px;
					height: 230px;
					margin-left: -83px;
				}

				.article_title {
					font-size: 22px;
					width: 350px;
					padding-left: 240px;
					margin-top: -122px;
					position: relative;
					z-index: 50;
				}

				.title_bg {
					background-color: #13292D;
					width: 357px;
					height: 150px;
					margin-top: -133px;
					margin-left: 210px;
				}

				#all_articles {
					position: relative;
					padding-top: 128px;
					z-index: -5;
				}

				.position {
					width: 100px;
					height: 10px;
					position: relative;
					background-color: #20ACAC;
					margin-top: 630px;
				}

				.image_scanning {
					width: 220px;
					height: 150px;
				}

				.article_side {
					width: 13px;
					height: 150px;
					position: relative;
					z-index: 51;
					margin-left:565px;
					margin-top:-150px;
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
				
				<div class="settings" ontouchstart="window.location.href='zones.php'" id="zones_btn">
				<img src="images/zones.png" class="logo_zones" ontouchstart="window.location.href='zones.php'" />
					</div>
				<div class="settings" ontouchstart="window.location.href='favorites.php'" id="favorites">
					<img src="images/favorites_icon.png"
					class="icon" id="icon_favorites" ontouchstart="window.location.href='favorites.php'"/>
				</div>
				<img src="images/line.png" class="line"/>
				<img src="images/search_icon.png" class="icon" id="icon_search" ontouchstart="#"/>
				<div class="settings" ontouchstart="#">

				</div>
				<div class="title" id="zone_title">
					<p id="zone_t"><?=$temp['zone_name'] ?></p>
				</div>
			</header>

			<!--END NAVIGATION HEADER-->
			
			<!--INTERACTION MODE-->

		<div class="main_btn"  id="main_btn" ontouchstart="toggleMenu(event)"></div>
		<img src="images/scanning.png" class="scanning" id="main_btn3" ontouchstart="toggleMenu(event)"/>
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
				<div class="lock_btn"  id="lock_btn" ontouchstart="toggleLockGlancing(event)"></div>
				<img src="images/block_icon.png" class="lock" id="lock_btn2" ontouchstart="toggleLockGlancing(event)"/>
				
				<div class="arrow_r"  id="arrow_r" ontouchstart="#"></div>
				<img src="images/arrow_r.png" class="arrow" id="arrow_r2" ontouchstart="#"/>
				
				<div class="arrow_r"  id="arrow_l" ontouchstart="#"></div>
				<img src="images/arrow_l.png" class="arrow" id="arrow_l2" ontouchstart="#"/>

	</div>
	<!--END INTERACTION MODE-->


			<!--ZONE-->
			
			
	<?php

	parserSide("http://feeds.mashable.com/Mashable");
	function parserSide($feedURL) {
		$rss = simplexml_load_file($feedURL);

		echo "<div id='all_articles'>";
		$i = 0;
		foreach ($rss->channel->item as $feedItem) {
			$i++;
			echo "<div class='articles' id='article' style=\"background: url('http://rack.1.mshcdn.com/media/ZgkyMDEzLzA1LzMwLzNmL1dpbmRvd3M4ZXZlLmMxOTY5LmpwZwpwCXRodW1iCTk1MHg1MzQjCmUJanBn/917731f5/c02/Windows-8-event.jpg') no-repeat;\">\n";
			echo "<img class='image_scanning' src='http://rack.1.mshcdn.com/media/ZgkyMDEzLzA1LzMwLzNmL1dpbmRvd3M4ZXZlLmMxOTY5LmpwZwpwCXRodW1iCTk1MHg1MzQjCmUJanBn/917731f5/c02/Windows-8-event.jpg' />";
			echo "<h1 class='article_title'>" . $feedItem -> title . "</h1>";
			echo "<div class='title_bg'></div>";
			echo "<div class='article_side'></div>";
			echo "</div>";
			if ($i >= 1)
				break;

		}
		echo "</div>";
	}
?>
	
			<!--END ZONE-->
			
			<!--POSITION INDICATION-->
			
			<div class="position" id="position"></div>
			
			<!--END POSITION INDICATION-->
	</body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">
		//window.onload = moveArticles;

		//COLOR POSITION

		var zone_color =                
<?php echo json_encode($zone_color); ?>
	;

	var zone_t = document.getElementById("zone_t").innerHTML;

	if (zone_t == "Design") {
		$('.position').css({
			"background-color" : "#C6563E"
		});

		$('.article_side').css({
			"background-color" : "#C6563E"
		});
	} else if (zone_t == "Gaming") {
		$('.position').css({
			"background-color" : "#309C71"
		});

		$('.article_side').css({
			"background-color" : "#C6563E"
		});

	}

	//SIZE OF PHOTOS

	function moveArticles() {

		var x = 0, y = 0, vx = 0, vy = 0, ax = 0, ay = 0;
		var articles = document.getElementById("article");
		var position = document.getElementById("position");

		if (window.DeviceMotionEvent != undefined) {
			window.ondevicemotion = function(e) {
				ax = event.accelerationIncludingGravity.x * 5;
				ay = event.accelerationIncludingGravity.y * 5;
				e.accelerationIncludingGravity.x
				e.accelerationIncludingGravity.y
				if (e.rotationRate) {
					e.rotationRate.alpha
					e.rotationRate.beta
					e.rotationRate.gamma
				}
			}
			setInterval(function() {
				var landscapeOrientation = window.innerWidth / window.innerHeight > 1;
				if (landscapeOrientation) {
					vx = vx + ay;
					vy = vy + ax;
				} else {
					vy = vy - ay;
					vx = vx + ax;
				}
				vx = vx * 0.99;
				vy = vy * 0.99;
				y = parseInt(y + vy / 50);
				x = parseInt(x + vx / 50);
				articles.style.left = x + "px";
				//position.style.left = x + "px";

			}, 25);
		}

	}

	function toggleMenu(e) {

		//Hide or show the interaction menu

		var interaction_modes = document.getElementById("interaction_modes");

		if (interaction_modes.style.visibility == "hidden") {

			interaction_modes.style.visibility = "visible";

		} else {
			interaction_modes.style.visibility = "hidden";

		}

		e.preventDefault();
		return false;
	}

	function switchToGlancingMode(e) {

		//Switch button

		document.getElementById("main_btn3").src = "images/logo_small.png";

		//Hide interaction modes

		interaction_modes.style.visibility = "hidden";

		//Change style (without flickering)

		$('.articles').css({
			"width" : "350px",
			"height" : "230px",
			"position" : "relative",
			"float" : "left",
			"margin-left" : "-83px",
			"padding-right" : "10px",
			"margin-top" : "-38px"
		});

		$('.article_img').css({
			"width" : "350px",
			"height" : "230px",
			"margin-left" : "-83px"
		});

		$('.article_title').css({
			"width" : "250px",
			"font-size" : "13px",
			"padding-left" : "15px",
			"padding-top" : "250px",
			"z-index" : "50"
		});

		$('.title_bg').css({
			"width" : "270px",
			"height" : "70px",
			"background-color" : "#13292D",
			"opacity" : "0.9",
			"margin-left" : "0px",
			"margin-top" : "-57px"
		});

		$('.scanning').css({
			"margin-top" : "295px",
			"width" : "45px",
			"margin-left" : "38px"
		});

		$('.arrow_r').css({
			"display" : "none"
		});

		$('.arrow').css({
			"display" : "none"
		});

		$('.lock_btn').css({
			"display" : "block"
		});

		$('.lock').css({
			"display" : "block"
		});

		$('.image_scanning').css({
			"display" : "none"
		});

		$('.articles').css({
			"backgroundSize" : "270px 185px"
		});

		$('.article_side').css({
			"display" : "none"
		});

		var x = 0, y = 0, vx = 0, vy = 0, ax = 0, ay = 0;
		var articles = document.getElementById("article");
		var position = document.getElementById("position");

		if (window.DeviceMotionEvent != undefined) {
			window.ondevicemotion = function(e) {
				ax = event.accelerationIncludingGravity.x * 5;
				ay = event.accelerationIncludingGravity.y * 5;
				e.accelerationIncludingGravity.x
				e.accelerationIncludingGravity.y
				if (e.rotationRate) {
					e.rotationRate.alpha
					e.rotationRate.beta
					e.rotationRate.gamma
				}
			}
			setInterval(function() {
				var landscapeOrientation = window.innerWidth / window.innerHeight > 1;
				if (landscapeOrientation) {
					vx = vx + ay;
					vy = vy + ax;
				} else {
					vy = vy - ay;
					vx = vx + ax;
				}
				vx = vx * 0.99;
				vy = vy * 0.99;
				y = parseInt(y + vy / 50);
				x = parseInt(x + vx / 50);
				articles.style.left = x + "px";
				//position.style.left = x + "px";

			}, 25);
		}
	}

	function switchToScanningMode(e) {

		//Switch button

		document.getElementById("main_btn3").src = "images/scanning.png";

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
			"margin-top" : "298px",
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

		$('.arrow_r').css({
			"display" : "block"
		});

		$('.arrow').css({
			"display" : "block"
		});

		$('.lock_btn').css({
			"display" : "block"
		});

		$('.lock').css({
			"display" : "block"
		});

		$('.image_scanning').css({
			"display" : "inline"
		});

	}

	function switchToReadingMode(e) {

		//Switch button

		document.getElementById("main_btn3").src = "images/reading.png";

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
			"margin-top" : "-185px"
		});

		$('.scanning').css({
			"width" : "40px",
			"margin-left" : "40px",
			"margin-top" : "295px"
		});
		$('.zone_title').css({
			"margin" : "-175px 0 0 -10px"

		});

		$('.line_horizontal').css({
			"margin-top" : "50px",
			"margin-left" : "200",
			"width" : "251px"

		});

		$('.zone_image').css({
			"width" : "250px",
			"height" : "170px",
			"visibility" : "hidden"
		});
		$('.zone_bg_reading').css({
			"display" : "inline"
		});

		$('.zone_image2').css({
			"display" : "none"
		});

		$('.lock_btn').css({
			"display" : "none"
		});

		$('.lock').css({
			"display" : "none"
		});

		$('.arrow_r').css({
			"display" : "none"
		});

		$('.arrow').css({
			"display" : "none"
		});

		$('.image_scanning').css({
			"display" : "none"
		});

		$('.article_side').css({
			"display" : "none"
		});

	}

	function toggleLockGlancing(e) {
		//STOP DE FLOW
		alert("Unlock");

	}
</script>
</html>