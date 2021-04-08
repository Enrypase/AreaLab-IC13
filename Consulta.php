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
<a href="Corso.php"><button onClick="Corso.php"> ordina per corso</button></a><br>
<a href="Frequentazioni.php"><button onClick="Frequentazioni.php"> frequentazioni</button></a><br><br>

<!--<form action='Consulta.php' method='post' >
            cerca per persona<input type='text' name='persona' /><br>
			<input type ='submit' value='search'>
</form>-->

<?php
if ($_POST) {
	$word=getArr($_POST,"word");
	$query = "select * from personale where nomePersona LIKE '$word' or cognomePersona LIKE'$word'";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	}
    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>codice fiscale</th>";
	            echo "<th>nome persona</th>";
	            echo "<th>cognome persona</th>";
	        echo "</tr>";

	        foreach ($res as $row){
	            echo "<tr>";
	                echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
	            echo "</tr>";
	        }
	    echo "</table>";
}
?> 
 
</body>
</html>
