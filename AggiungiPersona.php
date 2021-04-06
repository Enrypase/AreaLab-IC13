<?php 
include 'libs/util.php';
//include 'libs/db_connect.php';
$con = new PDO("sqlite:sicurezza.db");
//$user=getArr($_SESSION,'username');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<a href="AggiornaAnagrafica.php">back</a>

<form method="POST">
	codice fiscale: <input type="text" name="codFiscPersona"/> <br>
    nome: <input type="decimal" name="nomePersona"/> <br>
    cognome: <input type="text" name="cognomePersona"/> <br>
    ruolo: <input type="text" name="ruoloPersona"/> <br>
    data di nascita: <input type="date" name="dataNascitaPersona"/> <br>
    servizio: <input type="text" name="servizio"/> <br>
	mail: <input type="mail" name="mailPersona"/> <br>
    <input type="submit" value="Aggiungi"/>
</form>

<?php
	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
        $nomePersona= getArr($_POST, "nomePersona");
        $cognomePersona= getArr($_POST, "cognomePersona");
		$ruoloPersona= getArr($_POST, "ruoloPersona");
        $dataNascitaPersona= getArr($_POST, "dataNascitaPersona");
        $servizio= getArr($_POST, "servizio");
		$mailPersona= getArr($_POST, "mailPersona");

        if ($codFiscPersona!="" && $servizio!="" && $nomePersona!="" && $cognomePersona!="" && $ruoloPersona!="" && $dataNascitaPersona!="" && $mailPersona!=""){
			$servizio=true;
			$query="INSERT INTO personale(codFiscPersona,nomePersona,cognomePersona,ruoloPersona,dataNascitaPersona,servizio,servizio,mailPersona) VALUES (?,?,?,?,?,?,?,?)";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute(array($codFiscPersona, $nomePersona, $cognomePersona, $ruoloPersona, $dataNascitaPersona, $servizio, $servizio, $mailPersona));
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
</body>
</html>

