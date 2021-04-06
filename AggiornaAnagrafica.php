<?php 
include 'libs/util.php';
//include 'libs/db_connect.php';
$con = new PDO("sqlite:sicurezza.db");
//$user=getArr($_SESSION,'username');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<?php
//if ($user!="" && $user="adminuser"){
	
	print("<a href=\"homepage.php\">Home</a><br>");
	print("<a href=\"AggiungiPersona.php\"><button onClick=\"AggiungiPersona.php\"> aggiungi persona</button></a><br>");
	print("<a href=\"ModificaPersona.php\"><button onClick=\"ModificaPersona.php\"> modifica persona</button></a><br>");

	//select all data
	$query = "SELECT * FROM personale";
	try {
		$num=0;
		$stmt = $con->prepare( $query );
		$stmt->execute();
		$num = $stmt->rowCount();
	  
	} catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	}
	
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
//}
?> 
 
</body>
</html>
