<?php
session_start();
include 'libs/util.php';
include 'libs/db_connect.php';
$user=getArr($_SESSION,'username');
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
	
//---------------------------------------------------------------------//
	//DATAEORA
	$dataOra=date('d/m/Y H:i:s');
	//IP:MAC:AZIONE
	$azione="aggiunta frequentazione";
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
	
		$codFiscPersona=getArr($_POST,"codFiscPersona");
		$nomeCorso= getArr($_POST, "corso");
		$data=getArr($_POST,"data");
		$oreEffettuate=getArr($_POST,"oreEffettuate");

        if ($nomeCorso!="" && $data!="" && $oreEffettuate!="" && $codFiscPersona!=""){
			$query = "select idCorso from corsi where nomeCorso='$nomeCorso'";
			try{
				$res=$con->query($query);
			}catch(PDOException $ex) {
				include 'errore.php';
			} 
			$i=0;
	        foreach ($res as $row) {
				$idCorso=$row['idCorso'];
	        }
			
			echo($codFiscPersona);
			echo($idCorso);
			echo($data);
			echo($oreEffettuate);
			
			$query="INSERT INTO frequentazioni(idCorso,codFiscPersona,data,oreEffettuate) VALUES (?,?,?,?)";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute(array($idCorso, $codFiscPersona, $data, $oreEffettuate));
				header('Location: AggiornaFrequentazioni.php');
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