<?php 
session_start();
include 'libs/util.php';
include 'libs/db_connect.php';
$user=getArr($_SESSION,'username');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
    </head>
<body>

<?php
$query = "select distinct username from utenti";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	foreach ($res as $row) {
		$arrayUtenti[]=$row['username'];
	}
	
if (in_array($user, $arrayUtenti)){
	echo"<center>";
	echo"<h2>modifica una persona</h2>";
	echo"<a href=\"aggiornaanagrafica.php\">back</a>";
	$codFiscPersona="";
	$nomePersona="";
	$cognomePersona="";
	$ruoloPersona="";
	$dataNascitaPersona="";
	$plesso="";
	$servizio="";
	$mailPersona="";
	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
		$nomePersona= getArr($_POST, "nome");
		$cognomePersona= getArr($_POST, "cognome");
		$ruoloPersona= getArr($_POST, "ruolo");
		$dataNascitaPersona= getArr($_POST, "datan");
		$servizio= getArr($_POST, "servizio");
		$plesso= getArr($_POST, "plesso");
		$mailPersona= getArr($_POST, "mail");
	}
echo"<table>";
echo"<form action='domodificapersona.php' method=\"POST\">";
echo"<tr><td>	codice fiscale:</td><td>	<input type=\"text\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/></td></tr> <br>";
echo"<tr><td>    nome:</td><td> 			<input type=\"decimal\" name=\"nomePersona\" value=\"$nomePersona\"/></td></tr> <br>";
echo"<tr><td>    cognome:</td><td> 			<input type=\"text\" name=\"cognomePersona\" value=\"$cognomePersona\"/></td></tr> <br>";
echo"<tr><td>    ruolo:</td><td> 			<input type=\"text\" name=\"ruoloPersona\" value=\"$ruoloPersona\"/></td></tr> <br>";
echo"<tr><td>   data di nascita:</td><td> 	<input type=\"date\" name=\"dataNascitaPersona\" value=\"$dataNascitaPersona\"/></td></tr> <br>";
echo"<tr><td>	 in servizio:</td><td> 		<input type=\"checkbox\" name=\"servizio\" value=\"1\"/></td></tr> <br>";
echo"<tr><td>    plesso:</td><td> 			<input type=\"text\" name=\"plesso\" value=\"$plesso\"/></td></tr> <br>";
echo"<tr><td>    mail:</td><td> 			<input type=\"mail\" name=\"mailPersona\" value=\"$mailPersona\"/></td></tr> <br>";
echo"</table>";
echo"    <input type=\"submit\" value=\"modifica\"/>";
echo"</form>";
echo"</center>";
}
else{
	include 'erroreaccesso.php';
}
?>

</body>
</html>