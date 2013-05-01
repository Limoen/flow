<?php
	
	include_once('classes/User.class.php');
	if(!empty($_POST['inp_user_name'])&& !empty($_POST['inp_password_name'])&& !empty($_POST['inp_email_name']))
	{
		try 
		{
			$user = new User();
			$user->Username = $_POST['inp_user_name'];
					
			
			if($user->UsernameAvailable()) {
				$user->CreateUsername(); //INSERT USER INTO TABLE
				$feedback = "Thanks for signing up!";
				
			} else {
				$feedback = "Sorry, username already taken";	
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
			$("#inp_user_id").keyup(function(){
				//console.log($(this).val());
				// toon feedback
				$(".usernameFeedback").fadeIn();
				
				var username = $(this).val();
				$.ajax({
		 		 	type: "POST",
		  			url: "ajax/check_username.php",
		  			data: { username:username }
				}).done(function( msg ) {
					// verberg load idicator
					$("#loadingImage").hide();
		  			if(msg.status != "error"){
		  				if(msg.exists == "no"){
		  					// username is vrij !
		  					$(".usernameFeedback span").removeClass("notok");
		  					$(".usernameFeedback span").addClass("ok");
		  				}else
		  				{
		  					$(".usernameFeedback span").removeClass("ok");
		  					$(".usernameFeedback span").addClass("notok");
		  				}
		  				$(".usernameFeedback span").text(msg.message);
		  			};  
				});
			});
		});
	</script>
</head>

<body>
	<img src="images/city.jpg" alt="achtergrond" class="bg"/>
	<div id="register_page">
		<header></header>

<!--
		<?php //if (isset($feedback)): ?>
		<div class="feedback">
			<?php //echo $feedback; ?>
		</div>
		<?php //endif;?>
-->

		<div id="register">
			<img src="images/logo.png" alt="logo" id="register_logo"/>
			<form id="form_id" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="application/x-www-form-urlencoded">
		    	<input type="text" name="inp_user_name" value="username" onfocus="if(this.value=='username')this.value='';" onblur="if(this.value=='')this.value='username';"/><br />
<!--
		    	<div class="usernameFeedback"><img id="loadingImage" src="images/loading.gif" /><span>Checking username</span></div><br /><br/>
-->
		       	<input type="password" name="inp_password_name" value="password" onfocus="if(this.value=='password')this.value='';" onblur="if(this.value=='')this.value='password';"/>
		       	
		       	<input type="email" name="inp_email_name" value="e-mail" onfocus="if(this.value=='e-mail')this.value='';" onblur="if(this.value=='')this.value='e-mail';"/>
		        
		        <input type="submit" name="btn_register_name" id="register_btn" value=""/>
			</form>
			
			<a href="login.php">Already registered?</a>
		</div>
	</div>
</body>
</html>