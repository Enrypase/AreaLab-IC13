<?php
session_start();
include 'libs/util.php';
$user= $_SESSION['username'];
$id= $_SESSION['id'];
?>

<?php
	if($user == null || $user == "")
		include './pages/loginContent.php';
	else
		include './pages/loginContentLogged.php';
?>