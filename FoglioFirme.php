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

<?php
	//select all data
	$query = " ";
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
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>corso</th>";
				echo "<th>data</th>";
				echo "<th>firma</th>";
	        echo "</tr>";
	  
			$data=date("d/m/Y");
			$firma="                    ";
	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            echo "<tr>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td>".$row['nomeCorso']."</td>";
					echo "<td>".$data."</td>";
	                echo "<td>".$firma."</td>";
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