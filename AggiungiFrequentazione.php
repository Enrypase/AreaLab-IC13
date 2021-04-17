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
echo"<h2>aggiungi una frequentazione</h2>";
	echo"<a href=\"aggiornafrequentazioni.php\">back</a>";
	$codFiscPersona="";
	$nomeCorso="";
	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
		$nomeCorso= getArr($_POST, "nomeCorso");
	}

echo"<table>";
echo"<form action='dofrequentazioni.php' method=\"POST\">";
echo"<tr><td>	codice fiscale:</td><td> <input type=\"text\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/></td></tr> <br>";
echo"<tr><td>    ore effettuate:</td><td> <input type=\"text\" name=\"oreEffettuate\"/></td></tr> <br>";
echo"<tr><td>    nome corso:</td><td> <input type=\"text\" name=\"corso\" value=\"$nomeCorso\"/></td></tr> <br>";
echo"<tr><td>	data:</td><td> <input type=\"date\" name=\"data\"/></td></tr> <br>";
echo"</table>";
echo"    <input type=\"submit\" value=\"Aggiungi\"/>";
echo"</form>";
echo"</center>";
}
else{
	include 'erroreaccesso.php';
}
?>

</body>
</html>

