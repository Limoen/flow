<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<link rel="apple-touch-icon-precomposed" href="../images/icon.png"/>
		<meta name="description" content="" />
		<meta name="author" content="Sonny Willems" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
		<link id= "css" rel="stylesheet" type="text/css" href="../css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
		<title>Flow</title>
	</head>

	<body>
		<div class="container">

			<!--NAVIGATION HEADER-->

			<header>
				<div class="header">
					&nbsp;
				</div>
				<img src="../images/logo_small.png" class="logo_small" />

				<div class="avatar">
					<img src="../images/avatar.jpg" id="avatar"/>
				</div>
				<img src="../images/line.png" class="line"/>
				<div class="settings" ontouchstart="window.location.href='settings.php'">
					<a href="#" id="settings" ontouchstart="window.location.href='settings.php'"><img src="../images/settings_icon.png"
					class="settings_icon"/></a>
				</div>
				<div class="title">
					zones
				</div>
			</header>

			<!--END NAVIGATION HEADER-->

			<!--INTERACTION MODE-->

			<div class="main_btn"  id="main_btn" ontouchstart="toggleMenu(event)"></div>
			<img src="../images/scanning.png" class="scanning" id="main_btn2" ontouchstart="toggleMenu(event)"/>
			<div id="interaction_modes">
				<div class="reading_btn" id="reading_btn" ontouchstart="switchToReadingMode(event);">
					<img src="../images/reading.png" class="reading" id="reading_btn" ontouchstart="switchToReadingMode(event);"/>
				</div>

				<div class="scanning_btn" id="scanning_btn" ontouchstart="switchToScanningMode(event);">
					<img src="../images/scanning.png" class="scanning2" id="scanning_btn" ontouchstart="switchToScanningMode(event);"/>
				</div>

				<div class="glancing_btn" id="glancing_btn" ontouchstart="switchToGlancingMode(event);">
					<img src="../images/logo_small.png" class="glancing" id="glancing_btn" ontouchstart="switchToGlancingMode(event);"/>
				</div>
			</div>
		</div>

		<!--END INTERACTION MODE-->

		<!--ZONES-->

		<div id="zones">
			<div class="zone" id="zone" ontouchstart="goToZone(event)">
				<img src="../images/testimg.jpg" class="zone_image" />
				<img src="../images/line_horizontal.png" class="line_horizontal" />
				<h1 class="zone_title">TECHNOLOGY</h1>
				<div class="zone_bg"></div>
			</div>
		</div>

		<!--END ZONES-->
	</body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">
		var main_btn = document.getElementById("main_btn");

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

		function goToZone(e) {

			//Go to selected zone

			var zone = "http://flowapp.be";
			window.location.href = zone;

		}

		function switchToGlancingMode(e) {

			//Switch button

			document.getElementById("main_btn2").src = "../images/logo_small.png";

			//Hide interaction modes

			interaction_modes.style.visibility = "hidden";

			//Change style (without flickering)

			$('.zone_bg').css({
				"width" : "785px",
				"height" : "90px",
				"margin-top" : "40px"
			});

			$('.scanning').css({
				"margin-top" : "291px",
				"width" : "45px",
				"margin-left" : "38px"
			});

			$('.zone_title').css({
				"margin" : "70px 0 0 570px"

			});

			$('.line_horizontal').css({
				"margin-top" : "140px",
				"width" : "785px",
				"height" : "1px"

			});

			//Change style (with flickering)

			/*document.getElementById('css').href = '../css/style_glancing.css';*/

		}

		function switchToScanningMode(e) {

			//Switch button

			document.getElementById("main_btn2").src = "../images/scanning.png";

			//Hide interaction modes

			interaction_modes.style.visibility = "hidden";

			//Change style (without flickering)

			$('.zone_bg').css({
				"width" : "290px",
				"height" : "60px",
				"margin-top" : "170px"
			});

			$('.scanning').css({
				"margin-top" : "294px",
				"width" : "45px",
				"margin-left" : "38px"
			});

			$('.zone_title').css({
				"margin" : "180px 0 0 30px"

			});

			$('.line_horizontal').css({
				"margin-top" : "170px",
				"width" : "251px"

			});

		}

		function switchToReadingMode(e) {

			//Switch button

			document.getElementById("main_btn2").src = "../images/reading.png";

			//Hide interaction modes

			interaction_modes.style.visibility = "hidden";

			//Change style (without flickering)

			$('.zone_bg').css({
				"width" : "290px",
				"height" : "60px",
				"margin-top" : "170px"
			});

			$('.scanning').css({
				"width" : "40px",
				"margin-left" : "40px",
				"margin-top" : "291px"
			});
			$('.zone_title').css({
				"margin" : "180px 0 0 30px"

			});

			$('.line_horizontal').css({
				"margin-top" : "170px",
				"width" : "251px"

			});

		}
	</script>
</html>