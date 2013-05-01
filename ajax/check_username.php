<?php
	include_once('../classes/User.class.php');
	
	try
	{
		$oUser = new User();
		$oUser->Username = $_POST["username"];
		if($oUser->UsernameAvailable())
		{
			$feedback['status'] = "succes";
			$feedback['exists'] = "no" ;
			$feedback['message'] = "";	
		}
		else
		{
			$feedback['status']	= "succes";
			$feedback['exists'] = "yes";
			$feedback['message'] = "username not available";	
		}
	}
	
	catch(Exception $e)
	{
		$feedback['status'] = "error";
	}
	
	header('content-type: application/json');
	echo json_encode($feedback);
?>