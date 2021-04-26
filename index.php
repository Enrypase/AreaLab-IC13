<?php
session_start();
include 'libs/util.php';

$_SESSION["username"] = "El Sas";
$user=$_SESSION["username"];

$_SESSION["currentPage"] = "index.php";
?>
<!-- Aggiungere nomenclatura decente per i <head> <title> xxxx </></>
<!-- Trovare una soluzione per il testo perchè deve essere zoommabile (boh, fa stesso se si adatta in realtà) -->
<!-- Mettere tutte le pagine in un'unica cartella e sistemare le referenze alle librerie, altrimenti c'è problema di sicurezza -->
<?php 
if($user == null || $user == "")
	include './pages/indexContent.php'; 
else
	include './pages/indexContentLogged.php'; 
?>