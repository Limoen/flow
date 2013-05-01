<?php 
//destroy session and redirect to homepage
session_start();
session_destroy();

header("Location: login.php");

?>