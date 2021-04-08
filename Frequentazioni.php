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

<a href="AggiornaFrequentazioni.php"><button onClick="AggiornaFrequentazioni.php">modifica frequentazioni</button></a><br>

<?php
	//select all data
	$query = "select * from frequentazioni f join personale p on p.codFiscPersona=f.codFiscPersona join corsi c on c.idCorso=f.idCorso order by f.idCorso";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	} 
	    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>corso</th>";
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>ore effettuate</th>";
				echo "<th>data</th>";
	        echo "</tr>";
	  
	
	        foreach ($res as $row) {
	            echo "<tr>";
	                echo "<td>".$row['nomeCorso']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td>".$row['oreEffettuate']."</td>";
					echo "<td>".$row['data']."</td>";
	            echo "</tr>";
	        }
	    echo "</table>";

?> 
 
</body>
</html>
