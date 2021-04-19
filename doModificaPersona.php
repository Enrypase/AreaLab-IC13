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
	$azione="modifica persona";
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
		if($servizio!='1'){
			$servizio="0";
		}
		
        if ($codFiscPersona!="" && $plesso!="" && $nomePersona!="" && $cognomePersona!="" && $ruoloPersona!="" && $dataNascitaPersona!="" && $mailPersona!=""){
			$query="update personale set nomePersona='$nomePersona', cognomePersona='$cognomePersona', ruoloPersona='$ruoloPersona', dataNascitaPersona='$dataNascitaPersona', servizio='$servizio', plesso='$plesso', mailPersona='$mailPersona' where codFiscPersona='$codFiscPersona'";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute();
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