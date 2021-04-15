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

echo"	<form method=\"POST\">";
echo"	codice fiscale: <input type=\"text\" name=\"codFiscPersona\"/> <br>";
echo"    nome: <input type=\"decimal\" name=\"nomePersona\"/> <br>";
echo"    cognome: <input type=\"text\" name=\"cognomePersona\"/> <br>";
echo"   ruolo: <input type=\"text\" name=\"ruoloPersona\"/> <br>";
echo"    data di nascita: <input type=\"date\" name=\"dataNascitaPersona\"/> <br>";
echo"    servizio: <input type=\"checkbox\" name=\"servizio\"/> <br>";
echo"	mail: <input type=\"mail\" name=\"mailPersona\"/> <br>";
echo"    <input type=\"submit\" value=\"Aggiungi\"/>";
echo"	</form>";

	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
        $nomePersona= getArr($_POST, "nomePersona");
        $cognomePersona= getArr($_POST, "cognomePersona");
		$ruoloPersona= getArr($_POST, "ruoloPersona");
        $dataNascitaPersona= getArr($_POST, "dataNascitaPersona");
        $servizio= getArr($_POST, "servizio");
		$mailPersona= getArr($_POST, "mailPersona");

        if ($codFiscPersona!="" && $servizio!="" && $nomePersona!="" && $cognomePersona!="" && $ruoloPersona!="" && $dataNascitaPersona!="" && $mailPersona!=""){
			$servizio=true;
			$query="INSERT INTO personale(codFiscPersona,nomePersona,cognomePersona,ruoloPersona,dataNascitaPersona,servizio,servizio,mailPersona) VALUES (?,?,?,?,?,?,?,?)";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute(array($codFiscPersona, $nomePersona, $cognomePersona, $ruoloPersona, $dataNascitaPersona, $servizio, $servizio, $mailPersona));
				header('Location: aggiornaanagrafica.php');
			} catch (Exception $ex) {
                include 'errore.php';
            }
		}else
		{
			print(" <b> parametri non inseriti </b>");
		}
	}
}
else{
	include 'erroreaccesso.php';
}
?>
</body>
</html>

