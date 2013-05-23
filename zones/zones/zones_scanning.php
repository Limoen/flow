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
		<link id= "css" rel="stylesheet" type="text/css" href="../css/style_scanning.css" />
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
				<div class="settings">
					<a href="#" id="settings" onclick="window.location.href='settings.php'"><img src="../images/settings_icon.png"
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

			document.getElementById("main_btn2").src = "../images/logo_small.png";

			//Switch button

			if (main_btn2.src == "../images/scanning.png") {
				main_btn2.src = "../images/logo_small.png";
			} else {

			}

			//Switch CSS file

			document.getElementById('css').href = '../css/style_glancing.css';

			interaction_modes.style.visibility = "hidden";

		}

		function switchToScanningMode(e) {

			document.getElementById("main_btn2").src = "../images/scanning.png";

			//Switch CSS file

			document.getElementById('css').href = '../css/style_scanning.css';

			interaction_modes.style.visibility = "hidden";

		}
		
		function switchToReadingMode(e) {

			document.getElementById("main_btn2").src = "../images/reading.png";

			//Switch CSS file

			document.getElementById('css').href = '../css/style_reading.css';

			interaction_modes.style.visibility = "hidden";

		}
	</script>
</html>