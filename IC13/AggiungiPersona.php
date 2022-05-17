<?php 
include 'libs/db_connect.php';
include 'libs/util.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<a href="homepage.php">Home</a>

<form method="POST">
	codice fiscale: <input type="text" name="codFiscPersona"/> <br>
    nome: <input type="decimal" name="nomePersona"/> <br>
    cognome: <input type="text" name="cognomePersona"/> <br>
    ruolo: <input type="text" name="ruoloPersona"/> <br>
    data di nascita: <input type="date" name="dataNascitaPersona"/> <br>
    mail: <input type="text" name="mailPersona"/> <br>
    <input type="submit" value="Aggiungi"/>
</form>

<?php
	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
        $nomePersona= getArr($_POST, "nomePersona");
        $cognomePersona= getArr($_POST, "cognomePersona");
		$ruoloPersona= getArr($_POST, "ruoloPersona");
        $dataNascitaPersona= getArr($_POST, "dataNascitaPersona");
        $mailPersona= getArr($_POST, "mailPersona");

        if ($codFiscPersona!="" && $nomePersona!="" && $cognomePersona!="" && $ruoloPersona!="" && $dataNascitaPersona!="" && $mailPersona!=""){
			$servizio=true;
			$query="INSERT INTO personale(codFiscPersona,nomePersona,cognomePersona,ruoloPersona,dataNascitaPersona,servizio,mailPersona) VALUES (?,?,?,?,?,?,?)";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute(array($codFiscPersona, $nomePersona, $cognomePersona, $ruoloPersona, $dataNascitaPersona, $servizio, $mailPersona));
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

