<?php 
include 'libs/util.php';
include 'libs/db_connect.php';
//$user=getArr($_SESSION,'username');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<a href="AggiornaAnagrafica.php">back</a>

<?php
	$codFiscPersona="";
	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
	}

echo"<form action='doModificaPersona.php' method=\"POST\">";
echo"	codice fiscale: <input type=\"text\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/> <br>";
echo"    nome: <input type=\"decimal\" name=\"nomePersona\"/> <br>";
echo"    cognome: <input type=\"text\" name=\"cognomePersona\"/> <br>";
echo"    ruolo: <input type=\"text\" name=\"ruoloPersona\"/> <br>";
echo"    data di nascita: <input type=\"date\" name=\"dataNascitaPersona\"/> <br>";
echo"	in servizio: <input type=\"checkbox\" name=\"servizio\" value=\"1\"/> <br>";
echo"    mail: <input type=\"mail\" name=\"mailPersona\"/> <br>";
echo"    <input type=\"submit\" value=\"modifica\"/>";
echo"</form>";
?>

</body>
</html>