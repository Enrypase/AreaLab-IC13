<?php
session_start();
include 'libs/util.php';
$_SESSION['username'] =" ASD";
$user=$_SESSION["username"];
$_SESSION["currentPage"] = "index.php";
?>
<!-- Controllare la storia del position: fixed; per i siti mobile -->
<!-- IL DATABASE DEL LOGIN, ATTUALMENTE è FITTIZIO -->
<!-- Trovare una soluzione per il testo perchè deve essere zoommabile -->
<!-- Mettere tutte le pagine in un'unica cartella e sistemare le referenze alle librerie, altrimenti c'è problema di sicurezza -->
<!-- La prima volta nella sessione bisogna inizializzare le variabili, quindi da spostare da sicurezza in utils -->
<?php 
if($user == null || $user == "")
	include './pages/indexContent.php'; 
else
	include './pages/indexContentLogged.php'; 
?>