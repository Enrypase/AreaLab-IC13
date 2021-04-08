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

<a href="homepage.php">Home</a><br><br>
<b>corsi disponibili<b>

<?php
	$corso=getArr($_POST,"corso");
	
	
	$query = "select distinct nomeCorso, idCorso from corsi";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	} 
	    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>id</th>";
	            echo "<th>nome</th>";
	        echo "</tr>";
			
	        foreach ($res as $row) {
	            echo "<tr>";
	                echo "<td>".$row['idCorso']."</td>";
	                echo "<td>".$row['nomeCorso']."</td>";
	            echo "</tr>";
	        }
	    echo "</table>";
?>

<br><form action='Stampa.php' method='post' >
    inserisci corso<input type='text' name='corso' /><br>
	ruolo personale<input type='text' name='ruolo' /><br>
	ora di inizio<input type='time' name='oraI' /><br>
	ora di fine<input type='time' name='oraF' /><br>
	<input type ='submit' value='submit'>
</form>
 
</body>
</html>