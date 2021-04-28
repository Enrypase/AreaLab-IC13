<?php
session_start();
include 'libs/util.php';

$_SESSION["username"] = "El Sas";
$user=$_SESSION["username"];

$_SESSION["currentPage"] = "index.php";
?>
<!-- Aggiungere nomenclatura decente per i <head> <title> xxxx </></>
<!-- Correggere bug nelle modifica cose -->
<!-- Aggiungere il codice riguardante i plessi e i log -->
<!-- Correzione ordine codice e bug generale -->
<!-- Ricorda che i tipi devono configurare apache -->
<?php 
if($user == null || $user == "")
	include './pages/indexContent.php'; 
else
	include './pages/indexContentLogged.php'; 
?>