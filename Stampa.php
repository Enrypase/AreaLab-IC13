<?php
include 'libs/util.php';
include 'libs/db_connect.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
    </head>
<body>

<?php
if ($_POST) {
	
	$query = "select distinct c.nomeCorso, p.ruoloPersona from corsi c join frequentazioni f on f.idCorso=c.idCorso join personale p on p.codFiscPersona=f.codFiscPersona";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	} 
			$i=0;
	        foreach ($res as $row) {
				$arrayCorsi= [$i => $row['nomeCorso'],];
				$arrayRuoli= [$i => $row['ruoloPersona'],];
				$i=$i+1;
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
	    echo "Errore !".$ex->getMessage();
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
?> 
</body>
</html>