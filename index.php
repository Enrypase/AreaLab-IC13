<?php
session_start();
include 'libs/util.php';
$user=getArr($_SESSION,'username');
$id=getArr($_SESSION,'id');
?>
<!-- PROTEGGERE LE FUNZIONALITA' DA LOGGATI -->
<!-- Quando si passa da HTML a PHP cambiare il .html in .php --> 
<!-- Mettere una larghezza massima del testo -->
<!-- Aumentare/diminuire le colonne ai lati in base alla grandezza vw -->
<!-- coso dei cookies CIAO MARY -->

<?php 
if($user == null || $user == "")
	include './pages/indexContent.php'; 
else
	include './pages/indexContentLogged.php'; 
?>