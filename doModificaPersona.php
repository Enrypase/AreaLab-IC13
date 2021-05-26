<?php 
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();

$_SESSION['secLevel'] = 1;
$user=$_SESSION['username'];
include './libs/db_connect.php';
include './Logica/security.php';

	if ($_POST) {
        $codFiscPersona= $_POST["codFiscPersona"];
        $nomePersona= $_POST["nomePersona"];
        $cognomePersona= $_POST["cognomePersona"];
		$ruoloPersona= $_POST["ruoloPersona"];
        $dataNascitaPersona= $_POST["dataNascitaPersona"];
		$servizio= $_POST["servizio"];
		$plesso= $_POST["plesso"];
        $mailPersona= $_POST["mailPersona"];
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

?>