<?php
$user = $_SESSION['username'];
$currentPage = $_SESSION['currentPage'];
$secLevel = $_SESSION['secLevel'];
if($secLevel > 0){
	if($user == null || $user == ''){
		if($currentPage == 'homepage.php'){
			header("Location: ./index.php");
		}
		else{
			header("Location: {$currentPage}");
		}
	}
	header('Cache-Control: no-cache, no-store, must-revalidate');
	header('Pragma: no-cache');
	header('Expires: 0');
}
?>