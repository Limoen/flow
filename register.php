<?php
	
	include_once('classes/User.class.php');
	if(!empty($_POST['inp_user_name'])&& !empty($_POST['inp_password_name'])&& !empty($_POST['inp_email_name']))
	{
		try 
		{
			$user = new User();
			$user->Username = $_POST['inp_user_name'];
			$feedback_un = "";
			$feedback_pw = "";
			
			if($user->UsernameAvailable()) {
				$pass1 = $_POST['inp_password_name'];
				$pass2 = $_POST['check_password'];
				if( $pass1 == $pass2) {
					$user->CreateUsername(); //INSERT USER INTO TABLE
					header("Location: login.php");
				} else {
					$feedback_pw = "check password";
				};
			} else {
				$feedback_un = "username taken";	
			};
				
		} catch (Exception $e) {
			$feedback = $e->getMessage();
		}
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
	<link href='http://fonts.googleapis.com/css?family=Dosis:200|Roboto:100,300,400' rel='stylesheet' type='text/css'>
	
	<title>Register | Flow</title>

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script>
		
	$(document).ready(function(){
		/*
		$("#inp_user_id").keyup(function(){
			//console.log($(this).val());
			//toon feedback
			$(".userfeed").fadeIn();
			
			var username = $(this).val();
			$.ajax({
				type: "POST",
				url: "ajax/check_username.php",
				data: { username:username }
			}).done(function( msg ) {
				// verberg load idicator
				// $("#loadingImage").hide();
				if(msg.status != "error"){
					if(msg.exists == "no"){
						// username is vrij !
						$("#userfeed").attr("src", $(this).attr("src").replace('-empty', '-avail'));
						$("#userfeed").attr("src", $(this).attr("src").replace('-unavail', '-avail'));
					} else {
						$("#userfeed").attr("src", $(this).attr("src").replace('-empty', '-unavail'));
						$("#userfeed").attr("src", $(this).attr("src").replace('-avail', '-unavail'));
					}
				};  
			});
			*/
			/*
			var fbun = document.getElementById("fb_un");
			var fbpw = document.getElementById("fb_pw");
			
			if(!fbun.hasChildNodes()) {
				fbun.style.display='none'
			};
			if(!fbpw.hasChildNodes()) {
				fbpw.style.display='none'
			};
			*/
		});
			
		function checkPass(){
			var pass1 = document.getElementById('pass1');
			var pass2 = document.getElementById('pass2');
			var goodColor = "#20bbbb";
			var badColor = "#ba2222";
			
			if(pass1.value == pass2.value){
				pass2.style.border = "3px solid";
				pass2.style.borderColor = goodColor;
				pass2.style.width = "234px";
			} else {
				pass2.style.border = "3px solid";
				pass2.style.borderColor = badColor;
				pass2.style.width = "234px";
			}
		}
	</script>
</head>

<body>
	<img src="images/city.jpg" alt="achtergrond" class="bg"/>
    
    <div class="regfeedback">
        <div class="rfb" id="fb_un"><?php echo $feedback_un ?></div>
 <!--       <div class="rfb" id="fb_pw"><?php //echo $feedback_pw ?></div>-->
    </div>

	<div id="register_page">

		<div id="register">
			<img src="images/logo.png" alt="logo" id="register_logo"/>
			<form id="form_id" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="application/x-www-form-urlencoded">
		    	
                <input type="text" id="inp_user_id" name="inp_user_name" value="username" onfocus="if(this.value=='username')this.value='';" onblur="if(this.value=='')this.value='username';"/>
                
<!--
                <div id="userfeed">
                	<img src="" alt="checking" id="loadingimage"/>
                </div>
-->

				<input type="email" name="inp_email_name" value="e-mail" onfocus="if(this.value=='e-mail')this.value='';" onblur="if(this.value=='')this.value='e-mail';"/>
				
		       	<input type="password" name="inp_password_name" id="pass1" placeholder="password"/>

                <input type="password" name="check_password" id="pass2" onkeyup="checkPass(); return false;" placeholder="repeat password"/>
		       	
		        <input type="submit" name="btn_register_name" id="register_btn" value="CREATE ACCOUNT"/>
			</form>
			
			<a href="#" ontouchstart="window.location.href='login.php'">Already registered?</a>
		</div>
	</div>
</body>
</html>