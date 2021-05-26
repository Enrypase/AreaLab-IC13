<?php
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();

include 'libs/util.php';

$user=$_SESSION["username"];

$_SESSION["currentPage"] = "index.php";
?>
<!-- Nei file doQualcosa aggiungere le funzionalità di log -->
<!-- Aggiungere aggiunta utente -->
<?php 
if($user == null || $user == "")
	include './pages/indexContent.php'; 
else
	include './pages/indexContentLogged.php'; 
?>