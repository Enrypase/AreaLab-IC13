<?php 
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();

$_SESSION['secLevel'] = 1;
$user=$_SESSION['username'];
include './libs/db_connect.php';
include './Logica/security.php';

	if ($_POST) {
		$idCorso= $_POST["id"];
        $nomeCorso= $_POST["nome"];
        $descrizioneCorso= $_POST["descrizione"];
        $durataOraCorso= $_POST["durata"];

        if ($idCorso!="" && $nomeCorso!="" && $descrizioneCorso!="" && $durataOraCorso!=""){
			$query="update Corsi set nomeCorso='{$nomeCorso}', descrizioneCorso='{$descrizioneCorso}', durataOraCorso='{$durataOraCorso}' where idCorso='{$idCorso}'";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute();
				header('Location: aggiornacorsi.php');
			} catch (Exception $ex) {
				echo"{$ex}";
            }
		}else
		{
			print(" <b> parametri non inseriti </b>");
		}
	}

?>