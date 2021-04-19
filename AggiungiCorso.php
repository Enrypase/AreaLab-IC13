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
echo"<h2> aggiungi un corso</h2><br>";
echo"	<a href=\"aggiornacorsi.php\">back</a>";

echo"<table>"	;
echo"	<form method=\"POST\"> ";
echo"    <tr><td>nome del corso:</td>  			<td><input type=\"text\" name=\"nomeCorso\"/></td></tr> <br>";
echo"    <tr><td>descrizione del corso:</td>  	<td><input type=\"text\" name=\"descrizioneCorso\"/></td></tr> <br>";
echo"    <tr><td>durata ore del corso:</td> 	<td><input type=\"decimal\" name=\"durataOreCorso\"/></td></tr> <br>";
echo"</table>";
echo"    <input type=\"submit\" value=\"Aggiungi\"/>";
echo"	 </form>";
echo"</center>";
	
	if ($_POST) {
		
	//---------------------------------------------------------------------//
	//DATAEORA
	$dataOra=date('d/m/Y H:i:s');
	//IP:MAC:AZIONE
	$azione="aggiunta corso";
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
	
		
        $nomeCorso= getArr($_POST, "nomeCorso");
        $descrizioneCorso= getArr($_POST, "descrizioneCorso");
        $durataOraCorso= getArr($_POST, "durataOreCorso");

        if ($nomeCorso!="" && $descrizioneCorso!="" && $durataOraCorso!=""){
			$query="INSERT INTO corsi (nomeCorso,descrizioneCorso,durataOraCorso) VALUES (?,?,?)";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute(array($nomeCorso, $descrizioneCorso, $durataOraCorso));
				header('Location: aggiornacorsi.php');
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

