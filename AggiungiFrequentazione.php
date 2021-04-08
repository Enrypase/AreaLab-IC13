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

<a href="ModificaFrequentazioni.php">back</a>

<?php
	$codFiscPersona="";
	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
	}

echo"<form action='doFrequentazioni.php' method=\"POST\">";
echo"	codice fiscale: <input type=\"text\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/> <br>";
echo"    ore effettuate: <input type=\"text\" name=\"oreEffettuate\"/> <br>";
echo"    corso: <input type=\"text\" name=\"corso\"/> <br>";
echo"	data: <input type=\"date\" name=\"data\"/> <br>";
echo"    <input type=\"submit\" value=\"Aggiungi\"/>";
echo"</form>";
?>

</body>
</html>

