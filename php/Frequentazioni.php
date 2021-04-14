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
	
echo"	<a href=\"consulta.php\">back</a><br>";

echo"	<a href=\"aggiornafrequentazioni.php\"><button onClick=\"aggiornafrequentazioni.php\">modifica frequentazioni</button></a><br>";

	$query = "select * from frequentazioni f join personale p on p.codFiscPersona=f.codFiscPersona join corsi c on c.idCorso=f.idCorso order by f.idCorso";
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
}
else{
	include 'erroreaccesso.php';
}
?> 
 
</body>
</html>
