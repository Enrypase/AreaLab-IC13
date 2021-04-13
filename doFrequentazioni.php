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