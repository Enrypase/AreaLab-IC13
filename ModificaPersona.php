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

echo"<form action='domodificapersona.php' method=\"POST\">";
echo"	codice fiscale: <input type=\"text\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/> <br>";
echo"    nome: <input type=\"decimal\" name=\"nomePersona\" value=\"$nomePersona\"/> <br>";
echo"    cognome: <input type=\"text\" name=\"cognomePersona\" value=\"$cognomePersona\"/> <br>";
echo"    ruolo: <input type=\"text\" name=\"ruoloPersona\" value=\"$ruoloPersona\"/> <br>";
echo"    data di nascita: <input type=\"date\" name=\"dataNascitaPersona\" value=\"$dataNascitaPersona\"/> <br>";
echo"	 in servizio: <input type=\"checkbox\" name=\"servizio\" value=\"1\"/> <br>";
echo"    plesso: <input type=\"text\" name=\"plesso\" value=\"$plesso\"/> <br>";
echo"    mail: <input type=\"mail\" name=\"mailPersona\" value=\"$mailPersona\"/> <br>";
echo"    <input type=\"submit\" value=\"modifica\"/>";
echo"</form>";
}
else{
	include 'erroreaccesso.php';
}
?>

</body>
</html>