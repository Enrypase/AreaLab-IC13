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
	id: <input type="text" name="idCorso"/> <br>
    nome: <input type="text" name="nomeCorso"/> <br>
    descr: <input type="text" name="descrizioneCorso"/> <br>
    durata: <input type="decimal" name="durataOreCorso"/> <br>
    <input type="submit" value="Aggiungi"/>
</form>

<?php
	if ($_POST) {
		$idCorso= getArr($_POST, "idCorso");
        $nomeCorso= getArr($_POST, "nomeCorso");
        $descrizioneCorso= getArr($_POST, "descrizioneCorso");
        $durataOreCorso= getArr($_POST, "durataOreCorso");

        if ($id!="" && $nome!="" && $descr!="" && $prezzo!=""){
			$query="update corsi set (nomeCorso,descrizioneCorso) VALUES (?,?,?) where idCorso='$idCorso'";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute(array($nomeCorso, $descrizioneCorso, $durataOreCorso));
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
        
    </body>
</html>