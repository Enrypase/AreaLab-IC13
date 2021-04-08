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

<?php
//if ($user!="" && $user="adminuser"){
	
	print("<a href=\"homepage.php\">Home</a><br>");
	print("<a href=\"AggiungiPersona.php\"><button onClick=\"AggiungiPersona.php\"> aggiungi persona</button></a><br>");
	
	//select all data
	$query = "SELECT * FROM personale";
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
				echo "<th></th>";
	        echo "</tr>";
	  
	        foreach ($res as $row) {
				$codFiscPersona=$row['codFiscPersona'];
				$servizio=$row['servizio'];
				if ($servizio=='1'){
					$servizio="in servizio";
				}
				else{
					$servizio="no";
				}
	            echo "<tr>";
	                echo "<td>".$codFiscPersona."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td>".$row['ruoloPersona']."</td>";
					echo "<td>".$row['dataNascitaPersona']."</td>";
	                echo "<td>".$servizio."</td>";
					echo "<td>".$row['mailPersona']."</td>";
					echo "<td><form method=\"POST\" action=\"ModificaPersona.php\"><input type=\"checkbox\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/><input type=\"submit\" value=\"modifica\"/></form></td>";
	            echo "</tr>";
	        }
	    echo "</table>";
//}
?> 
 
</body>
</html>
