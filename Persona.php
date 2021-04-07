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

<a href="Consulta.php">back</a><br>

<?php
	//select all data
	$query = "select * from personale";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	}
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
	  
	
	        foreach ($res as $row) {
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

?> 
 
</body>
</html>
