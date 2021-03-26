<?php 
session_start();
include 'libs/db_connect.php';
$user=getArr($_SESSION,'username');
$id=getArr($_SESSION,'id');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<a href="homepage.php">Home</a><br>
<a href="AggiungiPersona.php"><button onClick="AggiungiPersona.php"> aggiungi persona</button></a><br>
<a href="ModificaPersona.php"><button onClick="ModificaPersona.php"> modifica persona</button></a><br>

<?php
	//select all data
	$query = "SELECT * FROM personale";
	try {
		$num=0;
		$stmt = $con->prepare( $query );
		$stmt->execute();
		//Lettura numero righe risultato 
		$num = $stmt->rowCount();
	  
	} catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	}
	//se num > 0 recordset vuoto o errore 
	if($num>0){
	  
	    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>codice fiscale</th>";
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>ruolo</th>";
				echo "<th>data nascita</th>";
				echo "<th>servizio</th>";
				echo "<th>mail</th>";
	        echo "</tr>";
	  
	
	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            echo "<tr>";
	                echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td>".$row['ruoloPersona']."</td>";
					echo "<td>".$row['dataNascitaPersona']."</td>";
	                echo "<td>".$row['servizio']."</td>";
					echo "<td>".$row['mailPersona']."</td>";
	            echo "</tr>";
	        }
	    echo "</table>";
	}
	else{
	    echo "No records found.";
	}

?> 
 
</body>
</html>
