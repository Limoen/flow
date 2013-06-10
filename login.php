<?php
/*
$cookie_path = "/";
$cookie_timeout = 60 * 30; // in seconds
$garbage_timeout = $cookie_timeout + 600; // in seconds
session_set_cookie_params($cookie_timeout, $cookie_path);
ini_set('session.gc_maxlifetime', $garbage_timeout);
strstr(strtoupper(substr($_SERVER["OS"], 0, 3)), "WIN") ? 
    $sep = "\\" : $sep = "/";
$sessdir = ini_get('session.save_path').$sep."my_sessions";
if (!is_dir($sessdir)) { mkdir($sessdir, 0777); }
ini_set('session.save_path', $sessdir);
*/
session_start();

$feedback="";
$email="";

if(isset($_POST['submitlogin'])){
 	include("classes/Connection.php");
 
	//waarden uit formulier halen
	$username = mysqli_real_escape_string($link, $_POST['user']);
	$password = mysqli_real_escape_string($link, md5($_POST['pass']));
	$db_username = "SELECT * FROM tblUsers WHERE user_email='" . $username."'";
 
	$q_user = mysqli_query($link, $db_username);
	$email = $username;
	//vergelijken en doorsturen
	if(mysqli_num_rows($q_user) == 1) {
		$data = mysqli_fetch_array($q_user);
		$userid = $data['user_id'];
	  	if($password == $data['user_password']) { 
	   		$_SESSION["name"] = $username;
			$_SESSION["id"] = $userid;
	   		header("Location: greeting.php");
	  	} else {
   			$feedback = 'wrong password';
  		}
 	} else {
  		$feedback = 'wrong password';
  		$email ="";
	}
 	$link->close();
}

//print_r($_SESSION);
?>

<?php 
	if (!empty($_SESSION['user'])) {
	   	header('Location: zones.php');
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
	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/portrait.css"/>
	<link href='http://fonts.googleapis.com/css?family=Dosis:200|Roboto:100,300,400' rel='stylesheet' type='text/css'>
	
	<title>Flow | Login</title>
    
    <script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script>
   		$(document).ready(function(){	
			var feedblogin = document.getElementById("feedback_login");
			if(!feedblogin.hasChildNodes()) {
				feedblogin.style.display='none'
			}
		});
	</script>
    
</head>
<body>
	<div id="portrait">View in landscape mode on iPad</div>
	<img src="images/city.jpg" alt="achtergrond" class="bg"/>
    
    <div class="logfeedback">
        <div id="feedback_login"><?php echo $feedback ?></div>
    </div>
    
	<div id="login_page">
        <div id="login">
            <img src="images/logo.png" alt="logo" id="login_logo"/>

            <form id="login_form" action="" method="post" enctype="application/x-www-form-urlencoded">
                <input type="text" name="user" value="email" onfocus="if(this.value=='email')this.value='';" onblur="if(this.value=='')this.value='email';"/>
                
                <input type="password" name="pass" placeholder="password" />
                
                <a href="#" id="reg_btn" ontouchstart="window.location.href='register.php'">REGISTER</a>
                
                <input type="submit" name="submitlogin" value="LOG IN" id="login_btn"/>
            </form>
		<a href="#" ontouchstart="window.location.href='forgot.php'" id="forgot">Forgot your password?</a>
        </div>
    </div>
</body>
</html>