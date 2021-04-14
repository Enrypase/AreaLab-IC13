<?php 
session_start();
include 'libs/util.php';
include 'libs/db_connect.php';
include 'cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css';
include 'cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js';
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
	echo"<a href=\"consulta.php\">back</a><br>";
	$query = "select * from personale";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	}
	echo "<table id=\"table_id\" class=\"display\" border='1'>";
	        echo "<tr>";
	            echo "<th>codice fiscale</th>";
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>ruolo</th>";
				echo "<th>data nascita</th>";
				echo "<th>servizio</th>";
				echo "<th>mail</th>";
	        echo "</tr>";
	  
	
	        foreach ($res as $row) {
				$servizio=$row['servizio'];
				if ($servizio=='1'){
					$servizio="in servizio";
				}
				else{
					$servizio="no";
				}
	            echo "<tr>";
	                echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td>".$row['ruoloPersona']."</td>";
					echo "<td>".$row['dataNascitaPersona']."</td>";
	                echo "<td>".$servizio."</td>";
					echo "<td>".$row['mailPersona']."</td>";
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
