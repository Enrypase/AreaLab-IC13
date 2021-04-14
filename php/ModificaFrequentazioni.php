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
	print("<a href=\"aggiornafrequentazioni.php\">back</a><br>");
	
	//select all data
	$query = "select p.nomePersona, p.codFiscPersona, p.cognomePersona from personale p join frequentazioni f on f.codFiscPersona=p.codFiscPersona";
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
				echo "<th></th>";
	        echo "</tr>";
			
	        foreach ($res as $row) {
				$codFiscPersona=$row['codFiscPersona'];
	            echo "<tr>";
	                echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td><form method=\"POST\" action=\"aggiungifrequentazione.php\"><input type=\"checkbox\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/><input type=\"submit\" value=\"modifica\"/></form></td>";
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
