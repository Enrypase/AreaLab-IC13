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
if ($_POST) {
	
	$query = "select distinct nomeCorso from corsi";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	
	        foreach ($res as $row) {
				$arrayCorsi[]=$row['nomeCorso'];
	        }
			
			
	$query = "select distinct ruoloPersona from personale";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	        foreach ($res as $row) {
				$arrayRuoli[]=$row['ruoloPersona'];
	        }
	
	$query = "select distinct plesso from personale";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	        foreach ($res as $row) {
				$arrayPlessi[]=$row['plesso'];
	        }
			
	$nomeCorso=getArr($_POST,"corso");
	$plesso=getArr($_POST,"plesso");
	$ruoloPersona=getArr($_POST,"ruolo");
	$oraI=getArr($_POST,"oraI");
	$oraF=getArr($_POST,"oraF");
	
	if ($nomeCorso!="" && $plesso!="" && $ruoloPersona!="" && in_array($nomeCorso, $arrayCorsi) && in_array($plesso, $arrayPlessi) && in_array($ruoloPersona, $arrayRuoli)){
	
	//---------------------------------------------------------------------//
	//DATAEORA
	$dataOra=date('d/m/Y H:i:s');
	//IP:MAC:AZIONE
	$azione="stampa fogli firma";
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
	
	
	$query = "select * from personale where ruoloPersona='$ruoloPersona' and servizio='1' and plesso='$plesso'";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	}
	
	$data=date("d/m/Y");
	echo "<center><h1>$plesso, $nomeCorso - $data $oraI-$oraF</h1>";
	echo "<table border='1'>";
	        echo "<tr>";
				echo "<th>codice fiscale</th>";
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>firma</th>";
	        echo "</tr>";
	  
			
			$firma="&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; <br></br>";
	        foreach ($res as $row){
	            echo "<tr>";
					echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
	                echo "<td>".$firma."</td>";
	            echo "</tr>";
	        }
	    echo "</table></center>";
	}
	else{
		echo ("Input non valido");
	}
}
}
else{
	include 'erroreaccesso.php';
}
?> 
</body>
</html>