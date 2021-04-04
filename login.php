<?php
session_start();
include 'libs/util.php';

$user= $_SESSION['username'];
$_SESSION['currentPage'] = 'login.php';
?>
<!-- Capire se è da regolare tutto attorno a vh oppure vw -->
<!-- Strano che il mobile se metto la stessa misura che in loggato muoia tutto -->
<?php
	if($user == null || $user == "")
		include './pages/loginContent.php';
	else
		include './pages/loginContentLogged.php';
?>