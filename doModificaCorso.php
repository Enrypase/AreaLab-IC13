<?php 
include 'libs/util.php';
include 'libs/db_connect.php';
//$user=getArr($_SESSION,'username');

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
				header('Location: AggiornaCorsi.php');
			} catch (Exception $ex) {
                print("Errore!" . $ex);
            }
		}else
		{
			print(" <b> parametri non inseriti </b>");
		}
	}
?>
