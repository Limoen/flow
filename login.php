<?php

session_start();

$feedback="geef je gegevens in";
$user="";

if(isset($_POST['submitlogin'])){
 	include("classes/Connection.php");
 
	//waarden uit formulier halen
	$username = mysqli_real_escape_string($link, $_POST['user']);
	$password = mysqli_real_escape_string($link, md5($_POST['pass']));
	$db_username = "SELECT * FROM tblUsers WHERE user_name='" . $username."'";
 
	$q_user = mysqli_query($link, $db_username);
	$user = $username;
	//vergelijken en doorsturen
	if(mysqli_num_rows($q_user) == 1) {
		$data = mysqli_fetch_array($q_user);
	  	if($password == $data['user_password']) { 
	   		$_SESSION["name"] = $username;
	   		header("Location: zones.php");
	  	} else {
   			$feedback = 'Wrong password';
  		}
 	} else {
  		$feedback = 'Wrong password';
  		$user ="";
	}
 	$link->close();
}

//print_r($_SESSION);
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
	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link href='http://fonts.googleapis.com/css?family=Dosis:200|Roboto:100,300,400' rel='stylesheet' type='text/css'>
	
	<title>Flow | Login</title>
</head>
<body>
	<img src="images/city.jpg" alt="achtergrond" class="bg"/>
	<div id="login_page">

		<div id="login">
			<img src="images/logo.png" alt="logo" id="login_logo"/>
<!--			
			<div id="feedback_login">
				<?php //echo $feedback; ?>
			</div>
-->
			<form id="login_form" action="" method="post" enctype="application/x-www-form-urlencoded">
				<input type="text" name="user" value="username" onfocus="if(this.value=='username')this.value='';" onblur="if(this.value=='')this.value='username';"/>
				
				<input type="password" name="pass" value="password" onfocus="if(this.value=='password')this.value='';" onblur="if(this.value=='')this.value='password';"/>
				
				<a href="register.php"><img src="images/register.png" alt="register"/></a>
				<input type="submit" name="submitlogin" value="" id="login_btn"/>
			</form>

		</div>
</body>
</html>