<?php 
session_start();
include 'libs/util.php';
include 'libs/db_connect.php';
$user=getArr($_SESSION,'username');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<?php
$query = "select distinct username from utenti";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	foreach ($res as $row) {
		$arrayUtenti[]=$row['username'];
	}
	
if (in_array($user, $arrayUtenti)){
	
	print("<a href=\"homepage.php\">Home</a><br>");
	print("<a href=\"aggiungipersona.php\"><button onClick=\"aggiungipersona.php\"> aggiungi persona</button></a><br>");
	
	//select all data
	$query = "SELECT * FROM personale";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
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
					echo "<td><form method=\"POST\" action=\"modificapersona.php\"><input type=\"hidden\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/><input type=\"submit\" value=\"modifica\"/></form></td>";
	            echo "</tr>";
	        }
	    echo "</table>";

}
else{
	include 'erroreaccesso.php';
}
?> 
 
</body>
</html>
