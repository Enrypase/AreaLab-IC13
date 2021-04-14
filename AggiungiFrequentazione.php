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
	
	echo"<a href=\"modificafrequentazioni.php\">back</a>";
	$codFiscPersona="";
	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
	}

echo"<form action='dofrequentazioni.php' method=\"POST\">";
echo"	codice fiscale: <input type=\"text\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/> <br>";
echo"    ore effettuate: <input type=\"text\" name=\"oreEffettuate\"/> <br>";
echo"    corso: <input type=\"text\" name=\"corso\"/> <br>";
echo"	data: <input type=\"date\" name=\"data\"/> <br>";
echo"    <input type=\"submit\" value=\"Aggiungi\"/>";
echo"</form>";
}
else{
	include 'erroreaccesso.php';
}
?>

</body>
</html>

