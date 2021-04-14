<?php 
session_start();
include 'libs/util.php';
include 'libs/db_connect.php';
$user=getArr($_SESSION,'username');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<?php
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
	
echo"	<a href=\"aggiornacorsi.php\">back</a>";
	
echo"	<form method=\"POST\"> ";
echo"    nome: <input type=\"text\" name=\"nomeCorso\"/> <br>";
echo"    descr: <input type=\"text\" name=\"descrizioneCorso\"/> <br>";
echo"    durata: <input type=\"decimal\" name=\"durataOreCorso\"/> <br>";
echo"    <input type=\"submit\" value=\"Aggiungi\"/>";
echo"	</form>";
	
	if ($_POST) {
        $nomeCorso= getArr($_POST, "nomeCorso");
        $descrizioneCorso= getArr($_POST, "descrizioneCorso");
        $durataOraCorso= getArr($_POST, "durataOreCorso");

        if ($nomeCorso!="" && $descrizioneCorso!="" && $durataOraCorso!=""){
			$query="INSERT INTO corsi (nomeCorso,descrizioneCorso,durataOraCorso) VALUES (?,?,?)";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute(array($nomeCorso, $descrizioneCorso, $durataOraCorso));
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
        
    </body>
</html>

