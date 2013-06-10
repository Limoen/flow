<?php
	if (isset($_SESSION['id'])) {
		header('Refresh: 5; url=http://flowapp.be/beta/zones.php');
	} else {
		header('Refresh: 5; url=http://flowapp.be/beta/login.php');
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
        <link rel="stylesheet" href="css/portrait.css">
		<link href='http://fonts.googleapis.com/css?family=Dosis:200|Roboto:100,300,400' rel='stylesheet' type='text/css'>

		<title>Flow | A magazine for every reader</title>

		<script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
		<script src="js/jquery.mobile-menu.js"></script>
		<script>
			$(document).ready(function(){

				/* MENU BAR */
/*				$("body").mobile_menu({
					menu: ['#main-nav ul'],
					menu_width: 260,
					prepend_button_to: '#mobile-bar'
				});
*/
				setTimeout(function(){
					$(".fade1").fadeOut("1000", function () {
						$(".fade1").remove();
					});
				}, 2000);
				setTimeout(function(){
					$(".fade3").fadeIn("slow");
				}, 2500);

				setTimeout(function(){
					$("#index_logo").fadeIn("slow");
				}, 3500);
				setTimeout(function(){
					$("#index_logo").animate({marginTop:'220px'});
				}, 4000);

				setTimeout(function(){
					$("#login_form").fadeIn("slow");
				}, 4500);
			});
		</script>
	</head>
	<body>
    	<div id="portrait">View in landscape mode on iPad</div>
		<img src="images/city.jpg" alt="background" class="bg testfade fade3"/>
        
        <div id="start_page">
        	<img src="images/test.gif" alt="load" class="fade1"/>
        </div>

        <div id="login_page">
        	<div id="login">
				<img src="images/logo.png" alt="logo" id="index_logo"/>

				<form id="login_form" style="display: none;" action="" method="post" enctype="application/x-www-form-urlencoded">
					<input type="text" name="user" value="email" onfocus="if(this.value=='email')this.value='';" onblur="if(this.value=='')this.value='email';"/>
					
					<input type="password" name="pass" value="password" onfocus="if(this.value=='password')this.value='';" onblur="if(this.value=='')this.value='password';"/>
					
					<a href="#" id="reg_btn" ontouchstart="window.location.href='register.php'">REGISTER</a>
					
	                <input type="submit" name="submitlogin" value="LOG IN" id="login_btn"/>
				</form>

			</div>
        </div>
	</body>
</html>