<?php
session_start();
include 'libs/util.php';

$user=$_SESSION["username"];
$_SESSION["currentPage"] = "index.php";
?>
<!-- Aggiungere singolo file .php per gli header dove aggiungere anche la favicon -->
<!-- Aggiungere l'immagine bella (come no) -->
<!-- IL DATABASE DEL LOGIN, ATTUALMENTE è FITTIZIO -->
<!-- Trovare una soluzione per il testo perchè deve essere zoommabile (boh, fa stesso se si adatta in realtà) -->
<!-- Mettere tutte le pagine in un'unica cartella e sistemare le referenze alle librerie, altrimenti c'è problema di sicurezza -->
<!-- Aggiornare i file a livello di logica (QUELLI DI MARCONI) -->
<?php 
if($user == null || $user == "")
	include './pages/indexContent.php'; 
else
	include './pages/indexContentLogged.php'; 
?>