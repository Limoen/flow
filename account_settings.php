<?php
	session_start();
	include_once('classes/User.class.php');
	try 
		{
			$user = new User();
			$user->Username = $_POST['inp_user_name'];
			$pass1 = $_POST['inp_password_name'];
			$pass2 = $_POST['check_password'];
			if( $pass1 == $pass2) {
				$user->ChangeUser(); //CHANGE USER IN TABLE
				header("Location: zones.php");
			} else {
				//$feedback = "check password";
			};	
		} catch (Exception $e) {
			$feedback = $e->getMessage();
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
	
	<title>Flow | Account Settings</title>
    <script>
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
    <style>
		.header {
			width: 100%;
			background-color: #FFFFFF;
			height: 70px;
			opacity: 0.1;
			z-index: -1;
			position: absolute;
			margin-top: 20px;
		}
		
		.logo_small {
			width: 50px;
			z-index: 50;
			position: absolute;
			margin: 37px 0 0 20px;
		}
		
		.title {
			z-index: 5;
			width: 100px;
			font-size: 28px;
			margin: 0 auto;
			padding-top: 34px;
			padding-left: 463px;
			text-align: center;
			position: absolute;
		}
		
		.avatar {
			z-index: 6;
			float: left;
			margin-left: 870px;
			margin-top: 20px;
		}
		
		#avatar {
			width: 77px;
		}
		
		.line {
			height: 72px;
			position: absolute;
			float: right;
			z-index: 10;
			margin-top: 18px;
		}
		
		.settings {
			z-index: 7;
			width: 77px;
			height: 70px;
			background-color: #13292D;
			float: right;
			margin-top: 20px;
		}
		
		.icon {
			width: 38px;
			padding: 17px 0 0 21px;
		}
    </style>
</head>
<body>
	<img src="images/city.jpg" alt="achtergrond" class="bg"/>
	
    <header>
        <div class="header">
            &nbsp;
        </div>
        <img src="images/logo_small.png" class="logo_small" />
        <img src="images/line.png" class="line"/>
        <div class="settings" ontouchstart="window.location.href='change_zones.php'">
            <img src="images/settings_icon.png"  ontouchstart="window.location.href='change_zones.php'" class="icon"/>
        </div>
        <div class="title">
            zones
        </div>
    </header>
    
	<div id="register_page">
		<div id="register">
			<img src="images/logo.png" alt="logo" id="register_logo"/>
			<form id="form_id" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="application/x-www-form-urlencoded">

				<input type="email" name="inp_email_name" value="e-mail" onfocus="if(this.value=='e-mail')this.value='';" onblur="if(this.value=='')this.value='e-mail';"/>
				
		       	<input type="password" name="inp_password_name" id="pass1" placeholder="password"/>

                <input type="password" name="check_password" id="pass2" onkeyup="checkPass(); return false;" placeholder="repeat password"/>
		       	
		        <input type="submit" name="btn_register_name" id="register_btn" value="CHANGE SETTINGS"/>
			</form>
			
		</div>
	</div>
</body>
</html>