<?php

$currentPage = 'settings';

session_start();

try {
	include_once ("classes/User.class.php");

	$user = new User();
	$username = $user -> getUserInfo($_SESSION['id']);
	$temp = $username -> fetch_assoc();

} catch (Exception $e) {
	$feedback = $e -> getMessage();
}
?><!DOCTYPE html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<link rel="apple-touch-icon-precomposed" href="../images/icon.png"/>
	<meta name="description" content="" />
	<meta name="author" content="Sonny Willems" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<link id= "css" rel="stylesheet" type="text/css" href="css/style2.css" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
	<title>Settings</title>
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
				account
			</div>
		</header>

		<!--END NAVIGATION HEADER-->

		<!--SETTINGS-->

		<div class="greeting_bg">
			<p id="greeting">
				Hi <?=$temp['user_name'] ?>!
			</p>
		</div>

		<form id="change_pass_form" action="" method="post" enctype="application/x-www-form-urlencoded">
			<input type="password" name="new_pass" placeholder="new password" />

			<input type="password" name="new_pass_2" placeholder="retype new password" />

			<a href="#" id="change_btn" ontouchstart="window.location.href='change_pass.php'"> &nbsp; CHANGE PASSWORD</a>
		</form>
		<a href="#" id="logout_btn" ontouchstart="window.location.href='logout.php'"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;LOG OUT</a>

		<!--END SETTINGS-->
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript"></script>
</html>