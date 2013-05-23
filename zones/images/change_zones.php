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
		<title>Change zones</title>
	</head>

	<body>
		<div class="container">

			<!--NAVIGATION HEADER-->

			<header>
				<div class="header">
					&nbsp;
				</div>
				<img src="../images/logo_small.png" class="logo_small" />

				<div class="settings" ontouchstart="window.location.href='settings.php'" id="settings_decline">
					<a href="#" id="settings" ontouchstart="window.location.href='settings.php'"><img src="../images/decline.png"
					class="icon" id="icon_decline"></a>
				</div>
				<img src="../images/line.png" class="line"/>
				<div class="settings" ontouchstart="window.location.href='update_zones.php'">
					<a href="#" id="settings" ontouchstart="window.location.href='update_zones.php'"><img src="../images/accept.png"
					class="icon" id="icon_accept"></a>
				</div>
				<div class="title" id="change_zones_title">
					change zones
				</div>
			</header>

			<!--END NAVIGATION HEADER-->

			<!--ZONES-->

			<div id="zones">
				<div class="zone_change" id="zone" ontouchstart="touchArt(event)">
					<img src="../images/testimg.jpg" class="zone_change_image" />
					<img src="../images/line_horizontal.png" class="line_change_horizontal" />
					<h1 class="zone_title" id="art">ART</h1>
					<div class="zone_change_bg"></div>
				</div>

			</div>

			<!--END ZONES-->
	</body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">
		function touchArt(e) {

			$('.zone_change').css({
				"background-color" : "#32D885",
				"opacity" : "1"
			});

		}
	</script>
</html>