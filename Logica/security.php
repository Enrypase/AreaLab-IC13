<?php
$user = $_SESSION['username'];
$currentPage = $_SESSION['currentPage'];
$secLevel = $_SESSION['secLevel'];
if($user == null || $user == ''){
	if($secLevel > 0){
		header("Location: ./index.php");
		//header('Cache-Control: no-cache, no-store, must-revalidate');
		//header('Pragma: no-cache');
		//header('Expires: 0');
	}
}
?>