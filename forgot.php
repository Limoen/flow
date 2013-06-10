<?php
	session_start();
	include("classes/Connection.php");
	
	//waarde uit formulier
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$db_email = "SELECT * FROM tblUsers WHERE user_email='" . $email."'";

/*	
	if()){
		
	} else {
		$feedback = "Please enter your email";
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
	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link href='http://fonts.googleapis.com/css?family=Dosis:200|Roboto:100,300,400' rel='stylesheet' type='text/css'>
	
	<title>Flow | Password forgotten</title>
    
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
	<img src="images/city.jpg" alt="achtergrond" class="bg"/>
<!--
    <div class="forgotfeedback">
        <div id="feedback_forgot"><?php echo $feedback ?></div>
    </div>
-->
	<div id="login_page">
        <div id="login">
            <img src="images/logo.png" alt="logo" id="login_logo"/>

            <form id="login_form" action="" method="post" enctype="application/x-www-form-urlencoded">
                <input type="text" name="user" value="email" onfocus="if(this.value=='email')this.value='';" onblur="if(this.value=='')this.value='email';"/>
                                
                <input type="submit" name="submitlogin" value="RESET PASSWORD" id="register_btn"/>
            </form>
            <a href="#" ontouchstart="window.location.href='login.php'" id="remember">I remember</a>
        </div>
    </div>

</body>
</html>