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
if ($_POST) {
	
	$query = "select distinct nomeCorso from corsi";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	
	        foreach ($res as $row) {
				$arrayCorsi[]=$row['nomeCorso'];
	        }
			
			
	$query = "select distinct ruoloPersona from personale";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	        foreach ($res as $row) {
				$arrayRuoli[]=$row['ruoloPersona'];
	        }
			
	$nomeCorso=getArr($_POST,"corso");
	$ruoloPersona=getArr($_POST,"ruolo");
	$oraI=getArr($_POST,"oraI");
	$oraF=getArr($_POST,"oraF");
	
	if ($nomeCorso!="" && $ruoloPersona!="" && in_array($nomeCorso, $arrayCorsi) && in_array($ruoloPersona, $arrayRuoli)){
	
	$query = "select * from personale where ruoloPersona='$ruoloPersona' and servizio='1'";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	}
	
	$data=date("d/m/Y");
	echo "<center><h1>$nomeCorso - $data $oraI-$oraF</h1>";
	echo "<table border='1'>";
	        echo "<tr>";
				echo "<th>codice fiscale</th>";
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>firma</th>";
	        echo "</tr>";
	  
			
			$firma="&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; <br></br>";
	        foreach ($res as $row){
	            echo "<tr>";
					echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
	                echo "<td>".$firma."</td>";
	            echo "</tr>";
	        }
	    echo "</table></center>";
	}
	else{
		echo ("Input non valido");
	}
}
}
else{
	include 'erroreaccesso.php';
}
?> 
</body>
</html>