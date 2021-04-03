<?php
session_start();
include 'libs/util.php';
$user= $_SESSION['username'];
$id= $_SESSION['id'];
$_SESSION['currentPage'] = 'login.php';
?>

<?php
	if($user == null || $user == "")
		include './pages/loginContent.php';
	else
		include './pages/loginContentLogged.php';
?>