<?php

$feedback = "";

$currentPage = 'update_zones';

session_start();

if (!isset($_SESSION['user_id'])) {
	//	header("location: login.php");
}

try {
	include_once ("classes/Zone.class.php");
	$variable = $_POST['variable'];
	$zone = new Zone();
	$userzones = $zone -> addZone($_SESSION['id'], $variable);

} catch (Exception $e) {
	header("location: zones.php");
	$feedback = $e -> getMessage();
}
?><!DOCTYPE html><html>
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
		<title>Update zones</title>
	</head>
	<body>
		<?php

		echo $feedback;
		?>
	</body>
</html>