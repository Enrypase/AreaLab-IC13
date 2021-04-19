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
echo"<h2>aggiungi una persona</h2>";
echo"<a href=\"aggiornaanagrafica.php\">back</a>";
echo"<table>";
echo"	<form method=\"POST\">";
echo"<tr><td>	codice fiscale:</td><td>	<input type=\"text\" name=\"codFiscPersona\"/></td></tr> <br>";
echo"<tr><td>    nome:</td><td>				<input type=\"decimal\" name=\"nomePersona\"/></td></tr> <br>";
echo"<tr><td>    cognome:</td><td>			<input type=\"text\" name=\"cognomePersona\"/></td></tr> <br>";
echo"<tr><td>   ruolo:</td><td>				<input type=\"text\" name=\"ruoloPersona\"/></td></tr> <br>";
echo"<tr><td>    data di nascita:</td><td>	<input type=\"date\" name=\"dataNascitaPersona\"/></td></tr> <br>";
echo"<tr><td>    servizio:</td><td>			<input type=\"checkbox\" name=\"servizio\"/></td></tr> <br>";
echo"<tr><td>	plesso:</td><td>			<input type=\"text\" name=\"plesso\"/></td></tr> <br>";
echo"<tr><td>	mail:</td><td> 				<input type=\"mail\" name=\"mailPersona\"/></td></tr> <br>";
echo"</table>";
echo"    <input type=\"submit\" value=\"Aggiungi\"/>";
echo"	</form>";
echo"</center>";
	if ($_POST) {
		
	//---------------------------------------------------------------------//
	//DATAEORA
	$dataOra=date('d/m/Y H:i:s');
	//IP:MAC:AZIONE
	$azione="aggiunta persona";
	$ipAddress=$_SERVER['REMOTE_ADDR'];
	$macAddr=false;
	$arp='arp -a $ipAddress';
	$lines=explode("\n", $arp);
	foreach($lines as $line)
	{
	   $cols=preg_split('/\s+/', trim($line));
	   if ($cols[0]==$ipAddress)
	   {
		   $macAddr=$cols[1];
		   echo $macAddr;
	   }
	}
	if($macAddr==""){
		$macAddr="MAC";
	}

	if (!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	$azioni="$azione";
	$username="$ip-$macAddr-$user";
	$query="INSERT INTO log(username,dataeOra,azioni) VALUES (?,?,?)";
	$stmt=$con->prepare($query);
	$stmt->execute(array($username, $dataOra, $azioni));
	//----------------------------------------------------------------------------------//	
		
        $codFiscPersona= getArr($_POST, "codFiscPersona");
        $nomePersona= getArr($_POST, "nomePersona");
        $cognomePersona= getArr($_POST, "cognomePersona");
		$ruoloPersona= getArr($_POST, "ruoloPersona");
        $dataNascitaPersona= getArr($_POST, "dataNascitaPersona");
        $servizio= getArr($_POST, "servizio");
		$plesso= getArr($_POST, "plesso");
		$mailPersona= getArr($_POST, "mailPersona");

        if ($codFiscPersona!="" && $servizio!="" && $plesso!="" && $nomePersona!="" && $cognomePersona!="" && $ruoloPersona!="" && $dataNascitaPersona!="" && $mailPersona!=""){
			$servizio=true;
			$query="INSERT INTO personale(codFiscPersona,nomePersona,cognomePersona,ruoloPersona,dataNascitaPersona,servizio,plesso,mailPersona) VALUES (?,?,?,?,?,?,?,?)";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute(array($codFiscPersona, $nomePersona, $cognomePersona, $ruoloPersona, $dataNascitaPersona, $servizio, $plesso, $mailPersona));
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

