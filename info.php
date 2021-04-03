<?php
session_start();
include './libs/util.php';
$user= $_SESSION['username'];
$id= $_SESSION['id'];
$_SESSION["currentPage"] = "info.php";
?>

<?php 
if($user == null || $user == "")
	include './pages/infoContent.php';
else
	include './pages/infoContentLogged.php';
?>