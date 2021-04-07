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

<a href="homepage.php">Home</a><br>
<a href="Persona.php"><button onClick="Persona.php"> ordina per persona</button></a><br>
<a href="Corso.php"><button onClick="Corso.php"> ordina per corso</button></a><br><br>

<form action='Consulta.php' method='post' >
            find<input type='text' name='word' /><br>
			<input type ='submit' value='search'>
</form>

<?php
if ($_POST) {
	$word=getArr($_POST,"word");
	$query = "select * from personale p join frequentazioni f on f.codFiscPersona=p.codFiscPersona where p.nomePersona= ? or p.cognomePersona= ? or f.nomeCorso=?";
	try {
		$num=0;
		$stmt = $con->prepare( $query );
		$stmt->bindParam(1, $word);
		$stmt->bindParam(2, $word);
		$stmt->bindParam(3, $word); 		
		$stmt->execute();
		$num = $stmt->rowCount();
	  
	} catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	}
	//se num > 0 recordset vuoto o errore 
	if($num>0){
	  
	    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>codice fiscale</th>";
	            echo "<th>nome persona</th>";
	            echo "<th>cognome persona</th>";
				echo "<th>id corso</th>";
				echo "<th>nome corso</th>";
	        echo "</tr>";
	  
	
	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            echo "<tr>";
	                echo "<td>".$row['idCorso']."</td>";
	                echo "<td>".$row['nomeCorso']."</td>";
	                echo "<td>".$row['descrizioneCorso']."</td>";
					echo "<td>".$row['durataOreCorso']."</td>";
	            echo "</tr>";
	        }
	    echo "</table>";
	}
	else{
	    echo "No records found.";
	}
}
?> 
 
</body>
</html>
