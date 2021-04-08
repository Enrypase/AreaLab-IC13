<?php 
include 'libs/util.php';
include 'libs/db_connect.php';
//$user=getArr($_SESSION,'username');

	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
        $nomePersona= getArr($_POST, "nomePersona");
        $cognomePersona= getArr($_POST, "cognomePersona");
		$ruoloPersona= getArr($_POST, "ruoloPersona");
        $dataNascitaPersona= getArr($_POST, "dataNascitaPersona");
		$servizio= getArr($_POST, "servizio");
        $mailPersona= getArr($_POST, "mailPersona");
		if($servizio!='1'){
			$servizio="0";
		}
		
        if ($codFiscPersona!="" && $nomePersona!="" && $cognomePersona!="" && $ruoloPersona!="" && $dataNascitaPersona!="" && $mailPersona!=""){
			$query="update personale set nomePersona='$nomePersona', cognomePersona='$cognomePersona', ruoloPersona='$ruoloPersona', dataNascitaPersona='$dataNascitaPersona', servizio='$servizio', mailPersona='$mailPersona' where codFiscPersona='$codFiscPersona'";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute();
				header('Location: AggiornaAnagrafica.php');
			} catch (Exception $ex) {
                print("Errore!" . $ex);
            }
		}else
		{
			print(" <b> parametri non inseriti </b>");
		}
	}
?>