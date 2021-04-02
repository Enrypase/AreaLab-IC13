<?php
session_start();
include 'libs/util.php';
$user=$_SESSION["username"];
$id=$_SESSION["id"];
$_SESSION["currentPage"] = "index.php";
?>
<!-- PROTEGGERE LE FUNZIONALITA' DA LOGGATI -->
<!-- Quando si passa da HTML a PHP cambiare il .html in .php --> 
<!-- Mettere una larghezza massima del testo -->
<!-- Aumentare/diminuire le colonne ai lati in base alla grandezza vw -->
<!-- coso dei cookies CIAO MARY -->
<!-- IL DATABASE DEL LOGIN, ATTUALMENTE è FITTIZIO -->

<?php 
if($user == null || $user == "")
	include './pages/indexContent.php'; 
else
	include './pages/indexContentLogged.php'; 
?>