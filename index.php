<?php
session_start();
include 'libs/util.php';

$user=$_SESSION["username"];
$_SESSION["currentPage"] = "index.php";
?>
<!-- DA TELEFONO vw DA PC vh -->
<!-- MODIFICARE L'INDEX css Perchè è stato tolto AboutUs e unito in info -->
<!-- Fare le info strutturate decentemente -->
<!-- IL DATABASE DEL LOGIN, ATTUALMENTE è FITTIZIO -->
<!-- Trovare una soluzione per il testo perchè deve essere zoommabile -->
<!-- Mettere tutte le pagine in un'unica cartella e sistemare le referenze alle librerie, altrimenti c'è problema di sicurezza -->
<!-- Aggiornare i file a livello di logica (QUELLI DI MARCONI) -->
<!-- METTERE IN SEQUENZA HOME LOGIN INFO(contenente info + AboutAss) -->
<?php 
if($user == null || $user == "")
	include './pages/indexContent.php'; 
else
	include './pages/indexContentLogged.php'; 
?>