<?php
$user = $_SESSION['username'];
$currentPage = $_SESSION['currentPage'];
$secLevel = $_SESSION['secLevel'];
if($user == null){
	$_SESSION['username'] = '';
}
if($secLevel > 0){
	if($user == null || $user == ''){
		header("Location: ./index.php");
	}
	header('Cache-Control: no-cache, no-store, must-revalidate');
	header('Pragma: no-cache');
	header('Expires: 0');
}
?>