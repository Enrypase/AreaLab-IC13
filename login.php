<?php
session_start();
include 'libs/util.php';
$_SESSION['username'] = "ASD";
$user= $_SESSION['username'];
$_SESSION['currentPage'] = 'login.php';
?>
<!-- Capire se è da regolare tutto attorno a vh oppure vw -->
<?php
	if($user == null || $user == "")
		include './pages/loginContent.php';
	else
		include './pages/loginContentLogged.php';
?>