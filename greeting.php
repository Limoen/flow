<?php
header('Refresh: 2; url=http://flowapp.be/beta/zones.php');

session_start();

if (!isset($_SESSION['id'])) {
	header("location: index.php");
}

try {
	include_once ("classes/User.class.php");

	$user = new User();
	$usergreet = $user -> getUserInfo($_SESSION['id']);
	$greet = $usergreet -> fetch_assoc();

} catch (Exception $e) {
	$feedback = $e -> getMessage();
}
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

    <title>Flow | Good day </title>

    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
</head>
<body>
	<div>
    	<img src="images/city.jpg" alt="achtergrond" class="bg"/>

	<div id="greet_logo">
    	<img src="images/logo.png" alt="logo"/>
    </div>
    <div id="greet">
        <div class="makeitfloatleft"><h1>Hello, <?php echo $greet['user_name'] ?>!</h1></div>
        <div class="makeitfloatright"><img src="images/<?=$greet['user_avatar'] ?>" alt="avatar"/></div>
    </div>
    </div>
</body>
</html>
