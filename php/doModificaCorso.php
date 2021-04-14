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
		$idCorso= getArr($_POST, "id");
        $nomeCorso= getArr($_POST, "nome");
        $descrizioneCorso= getArr($_POST, "descrizione");
        $durataOraCorso= getArr($_POST, "durata");

        if ($idCorso!="" && $nomeCorso!="" && $descrizioneCorso!="" && $durataOraCorso!=""){
			$query="update corsi set nomeCorso='$nomeCorso', descrizioneCorso='$descrizioneCorso', durataOraCorso='$durataOraCorso' where idCorso='$idCorso'";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute();
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
