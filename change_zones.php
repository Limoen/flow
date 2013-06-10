<?php

$currentPage = 'change_zones';

session_start();

try {
	include_once ("classes/Zone.class.php");

	$zone = new Zone();
	$userzones = $zone -> getUserZones($_SESSION['id']);

} catch (Exception $e) {
	$feedback = $e -> getMessage();
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
		<title>Change zones</title>
	</head>

	<body>
		<div class="container">

			<!--NAVIGATION HEADER-->

			<header>
				<div class="header">
					&nbsp;
				</div>
				<img src="images/logo_small.png" class="logo_small" ontouchstart="window.location.href='zones.php'" />

				<div class="settings" ontouchstart="window.location.href='zones.php'" id="settings_decline">
					<img src="images/decline.png"
					class="icon" id="icon_decline" ontouchstart="window.location.href='zones.php'"/>
				</div>
				<img src="images/line.png" class="line"/>
				<img src="images/accept.png" class="icon" id="icon_accept" ontouchstart="window.location.href='zones.php'"/>
				<div class="settings" ontouchstart="window.location.href='zones.php'">

				</div>
				<div class="title" id="change_zones_title">
					change zones
				</div>
			</header>

			<!--END NAVIGATION HEADER-->

			<!--ZONES-->

	
			<div id="zones_change">
			<div class="zone_change_green" id="zone_change_green" ontouchstart="touchAstro(event);"></div>

			<div class="zone_change" id="zone">
			<img src="images/za.png" class="zone_change_image" />
			<h1 class="zone_title" id="astro">ASTRONOMY</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green2" id="zone_change_green2" ontouchstart="touchBusiness(event);"></div>

			<div class="zone_change" id="zone">
			<img src="images/zb.png" class="zone_change_image" />
			<h1 class="zone_title" id="business">BUSINESS</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green3" id="zone_change_green3" ontouchstart="touchDesign(event);"></div>

			<div class="zone_change" id="zone">
			<img src="images/zd.png" class="zone_change_image" />
			<h1 class="zone_title" id="design">DESIGN</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green4" id="zone_change_green4" ontouchstart="touchFashion(event);"></div>

			<div class="zone_change" id="zone">
			<img src="images/zfa.png" class="zone_change_image" />
			<h1 class="zone_title" id="fashion">FASHION</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green5" id="zone_change_green5" ontouchstart="touchLifestyle(event);"></div>

			<div class="zone_change2" id="zone">
			<img src="images/zl.png" class="zone_change_image" />
			<h1 class="zone_title" id="lifestyle">LIFESTYLE</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green6" id="zone_change_green6" ontouchstart="touchFilm(event);"></div>

			<div class="zone_change2" id="zone">
			<img src="images/zfi.png" class="zone_change_image" />
			<h1 class="zone_title" id="film">FILM</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green7" id="zone_change_green7" ontouchstart="touchFood(event);"></div>

			<div class="zone_change2" id="zone">
			<img src="images/zf.png" class="zone_change_image" />
			<h1 class="zone_title" id="food">FOOD</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green8" id="zone_change_green8" ontouchstart="touchGaming(event);"></div>

			<div class="zone_change2" id="zone">
			<img src="images/zg.png" class="zone_change_image" />
			<h1 class="zone_title" id="gaming">GAMING</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green9" id="zone_change_green9" ontouchstart="touchMusic(event);"></div>

			<div class="zone_change2" id="zone">
			<img src="images/zm.png" class="zone_change_image" />
			<h1 class="zone_title" id="music">MUSIC</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green10" id="zone_change_green10" ontouchstart="touchScience(event);"></div>

			<div class="zone_change3" id="zone">
			<img src="images/zs.png" class="zone_change_image" />
			<h1 class="zone_title" id="science">SCIENCE</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green11" id="zone_change_green11" ontouchstart="touchSports(event);"></div>

			<div class="zone_change3" id="zone">
			<img src="images/zsp.png" class="zone_change_image" />
			<h1 class="zone_title" id="sports">SPORTS</h1>
			<div class="zone_change_bg"></div>
			</div>

			<div class="zone_change_green12" id="zone_change_green12" ontouchstart="touchTechnology(event);"></div>

			<div class="zone_change3" id="zone">
			<img src="images/zt.png" class="zone_change_image" />
			<h1 class="zone_title" id="technology">TECHNOLOGY</h1>
			<div class="zone_change_bg"></div>
			</div>

			</div>

			<!--END ZONES-->
	</body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">




		//var my_zones = document.getElementsByClassName("my_zone").innerHTML;

		/*for (var i = 0; i < my_zones.length; i++) {
		 if (my_zones[i] == "Astronomy") {
		 $('.zone_change_green').css({
		 "background-color" : "#32D080",
		 "opacity" : "0.7"

		 });
		 }

		 if (my_zones[i] == "Gaming") {
		 $('.zone_change_green2').css({
		 "background-color" : "#32D080",
		 "opacity" : "0.7"

		 });
		 }
		 }
		 */
		/*for (var i = 0; i < my_zones.length; i++) {
		 alert(my_zones[i]);
		 if (my_zones[i].indexOf("Astronomy") != -1) {
		 $('.zone_change_green').css({
		 "background-color" : "#32D080",
		 "opacity" : "0.7"

		 });
		 }
		 if (my_zones[i].indexOf("Gaming") != -1) {
		 $('.zone_change_green2').css({
		 "background-color" : "#32D080",
		 "opacity" : "0.7"

		 });
		 }

		 }*/

		function touchAstro(e) {

			var green_layer = document.getElementById("zone_change_green");

			if (green_layer.style.background == "none") {

				$('.zone_change_green').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});
				var zone_id = 1;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green').css({
					"background" : "none",
					"opacity" : "0"
				});

				var zone_id = 1;
				$.post('delete_zones.php', {
					variable : zone_id
				});

			}

		}

		function touchBusiness(e) {

			var green_layer = document.getElementById("zone_change_green2");

			if (green_layer.style.background == "none") {

				$('.zone_change_green2').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 2;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green2').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 2;
				$.post('delete_zones.php', {
					variable : zone_id
				});

			}
		}

		function touchDesign(e) {

			var green_layer = document.getElementById("zone_change_green3");

			if (green_layer.style.background == "none") {

				$('.zone_change_green3').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 3;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green3').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 3;
				$.post('delete_zones.php', {
					variable : zone_id
				});
			}
		}

		function touchFashion(e) {

			var green_layer = document.getElementById("zone_change_green4");

			if (green_layer.style.background == "none") {

				$('.zone_change_green4').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 4;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green4').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 4;
				$.post('delete_zones.php', {
					variable : zone_id
				});
			}
		}

		function touchLifestyle(e) {

			var green_layer = document.getElementById("zone_change_green5");

			if (green_layer.style.background == "none") {

				$('.zone_change_green5').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 5;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green5').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 5;
				$.post('delete_zones.php', {
					variable : zone_id
				});
			}
		}

		function touchFilm(e) {

			var green_layer = document.getElementById("zone_change_green6");

			if (green_layer.style.background == "none") {

				$('.zone_change_green6').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 6;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green6').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 6;
				$.post('delete_zones.php', {
					variable : zone_id
				});
			}
		}

		function touchFood(e) {

			var green_layer = document.getElementById("zone_change_green7");

			if (green_layer.style.background == "none") {

				$('.zone_change_green7').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 7;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green7').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 7;
				$.post('delete_zones.php', {
					variable : zone_id
				});
			}
		}

		function touchGaming(e) {

			var green_layer = document.getElementById("zone_change_green8");

			if (green_layer.style.background == "none") {

				$('.zone_change_green8').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 8;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green8').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 8;
				$.post('delete_zones.php', {
					variable : zone_id
				});
			}
		}

		function touchMusic(e) {

			var green_layer = document.getElementById("zone_change_green9");

			if (green_layer.style.background == "none") {

				$('.zone_change_green9').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 9;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green9').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 9;
				$.post('delete_zones.php', {
					variable : zone_id
				});
			}
		}

		function touchScience(e) {

			var green_layer = document.getElementById("zone_change_green10");

			if (green_layer.style.background == "none") {

				$('.zone_change_green10').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 10;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green10').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 10;
				$.post('delete_zones.php', {
					variable : zone_id
				});
			}
		}

		function touchSports(e) {

			var green_layer = document.getElementById("zone_change_green11");

			if (green_layer.style.background == "none") {

				$('.zone_change_green11').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 11;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green11').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 11;
				$.post('delete_zones.php', {
					variable : zone_id
				});
			}
		}

		function touchTechnology(e) {

			var green_layer = document.getElementById("zone_change_green12");

			if (green_layer.style.background == "none") {

				$('.zone_change_green12').css({
					"background-color" : "#32D080",
					"opacity" : "0.7"

				});

				var zone_id = 12;
				$.post('update_zones.php', {
					variable : zone_id
				});

			} else {
				$('.zone_change_green12').css({
					"background" : "none",
					"opacity" : "0"
				});
				var zone_id = 12;
				$.post('delete_zones.php', {
					variable : zone_id
				});
			}
		}

	</script>
</html>