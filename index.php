<?php
session_start();
include 'libs/util.php';

$user=$_SESSION["username"];

$_SESSION["currentPage"] = "index.php";
?>
<!-- Aggiungere nomenclatura decente per i <head> <title> xxxx </></>
<!-- Correggere bug nelle modifica cose -->
<!-- Aggiungere il codice riguardante i plessi e i log -->
<!-- Correzione ordine codice e bug generale -->
<!-- Ricorda che i tipi devono configurare apache -->
<!-- Nei file doQualcosa aggiungere le funzionalità di log -->
<!-- Aggiungere aggiunta utente -->
<!-- Aggiungere in aggiungiFrequentazione la possibilità di visualizzare i vari utenti -->
<?php 
if($user == null || $user == "")
	include './pages/indexContent.php'; 
else
	include './pages/indexContentLogged.php'; 
?>