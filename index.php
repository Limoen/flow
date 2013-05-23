<?php
/*	if (isset($_SESSION['id'])) {
		header('Refresh: 4; url=http://flowapp.be/beta/zones.php');
	} else {
		header('Refresh: 4; url=http://flowapp.be/beta/login.php');
	}
*/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		
		<meta name="description" content="Flow"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
		
		<link rel="apple-touch-icon-precomposed" href="images/icon.png"/>
        
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Dosis:200|Roboto:100,300,400' rel='stylesheet' type='text/css'>

		<title>Flow | Motion Magazine</title>

		<script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
		<script src="js/jquery.mobile-menu.js"></script>
		<script>
			$(function(){
				$("body").mobile_menu({
					menu: ['#main-nav ul'],
					menu_width: 260,
					prepend_button_to: '#mobile-bar'
				});

				setTimeout(function(){
					$(".fade1").fadeOut("1000", function () {
						$(".fade1").remove();
					});
				}, 2000);
				setTimeout(function(){
					$(".fade2").fadeIn("slow");
				}, 3000);
				setTimeout(function(){
					$(".fade3").fadeIn("slow");
				}, 2500);
			});
		</script>
	</head>
	<body>

		<img src="images/city.jpg" alt="background" class="bg testfade fade3"/>

		<header>
			<nav id="mobile-bar"></nav>
			<nav id="main-nav">
				<ul>
					<li><a href="change_zones.php"><img src="images/chzone.png" alt="change zones" /><br/>change zones</a></li>
					<li><a href="account_settings.php"><img src="images/accset.png" alt="account settings" /><br/>account settings</a></a></li>
				</ul>
			</nav>
		</header>

        <div id="start_page">
        	<img src="images/test.gif" alt="load" class="fade1"/>
	        <img src="images/logo_blue.png" alt="logo" class="testfade fade2" onclick="window.location.href='login.php'"/>
        </div>
	</body>
</html>