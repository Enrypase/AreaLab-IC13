<?php
session_start();
include 'libs/util.php';
$user=getArr($_SESSION,'username');
$id=getArr($_SESSION,'id');
$_SESSION["currentPage"] = "info.php";
?>

<?php 
if($user == null || $user == "")
	include './pages/infoContent.php';
else
	include './pages/infoContentLogged.php';
?>