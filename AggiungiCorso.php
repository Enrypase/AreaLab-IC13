<?php 
include 'libs/util.php';
include 'libs/db_connect.php';
//$user=getArr($_SESSION,'username');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<a href="homepage.php">Home</a>

<form method="POST"> 
    nome: <input type="text" name="nomeCorso"/> <br>
    descr: <input type="text" name="descrizioneCorso"/> <br>
    durata: <input type="decimal" name="durataOreCorso"/> <br>
    <input type="submit" value="Aggiungi"/>
</form>

<?php
	if ($_POST) {
        $nomeCorso= getArr($_POST, "nomeCorso");
        $descrizioneCorso= getArr($_POST, "descrizioneCorso");
        $durataOreCorso= getArr($_POST, "durataOreCorso");

        if ($nomeCorso!="" && $descrizioneCorso!="" && $prezzo!=""){
			$query="INSERT INTO corsi (nomeCorso,descrizioneCorso,durataOreCorso) VALUES (?,?,?)";
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

