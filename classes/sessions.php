<?php
//check if username exists in database, if so start session
if(isset($_SESSION["name"])){
	include('classes/Connection.php');
 
	$db_username = 'SELECT * FROM tblUsers WHERE user_name="' . $_SESSION['name'] . '"';
	//$db_role = 'SELECT * FROM tblUsers WHERE users_name="' . $_SESSION['name'] . '"';
	$q_user = mysqli_query($link, $db_username) or die ('Invalid query: ' . mysqli_error());
	//$q_role = mysqli_query($conn, $db_role) or die ('Invalid query: ' . mysqli_error());

	if(mysqli_num_rows($q_user) != 1){
		header("Location: login.php");
	}
} else {
	header("Location: login.php");
}
?>