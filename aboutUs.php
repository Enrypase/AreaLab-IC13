<?php
session_start();
include 'libs/util.php';
$user= $_SESSION['username'];
$_SESSION['currentPage'] = 'aboutUs.php';
?>

<?php
	if($user == null || $user == "")
		include './pages/aboutUsContent.php';
	else
		include './pages/aboutUsContentLogged.php';
?>