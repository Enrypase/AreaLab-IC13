<?php
session_start();
include './libs/util.php';
$_SESSION['username'] = "ASD";
$user= $_SESSION['username'];
$_SESSION["currentPage"] = "info.php";
?>

<?php 
if($user == null || $user == "")
	include './pages/infoContent.php';
else
	include './pages/infoContentLogged.php';
?>