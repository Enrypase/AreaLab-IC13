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
	print("<a href=\"frequentazioni.php\"><button onClick=\"frequentazioni.php\"> visualizza frequentazioni</button></a><br>");
	echo "<td><form method=\"POST\" action=\"aggiungifrequentazione.php\"><input type=\"submit\" value=\"aggiungi frequentazione\"/></form></td>";
	
	//select all data
	$query = "select sum(f.oreEffettuate), c.nomeCorso, p.nomePersona, p.cognomePersona, p.codFiscPersona from Frequentazioni f join Corsi c ON c.idCorso=f.idCorso JOIN Personale p ON p.codFiscPersona=f.codFiscPersona group BY f.codFiscPersona, f.idCorso";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>corso</th>";
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>ore effettuate</th>";
				echo "<th></th>";
	        echo "</tr>";
			
	        foreach ($res as $row) {
				$codFiscPersona=$row['codFiscPersona'];
	            echo "<tr>";
	                echo "<td>".$row['nomeCorso']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td>".$row['sum(f.oreEffettuate)']."</td>";
					echo "<td><form method=\"POST\" action=\"aggiungifrequentazione.php\"><input type=\"hidden\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/><input type=\"submit\" value=\"aggiungi frequentazione\"/></form></td>";
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
