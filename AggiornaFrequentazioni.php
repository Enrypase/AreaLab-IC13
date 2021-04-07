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
	print("<a href=\"AggiungiFrequentazioni.php\"><button onClick=\"AggiungiFrequentazioni.php\"> aggiungi frequentazioni</button></a><br>");
	print("<a href=\"ModificaFrequentazioni.php\"><button onClick=\"ModificaFrequentazioni.php\"> modifica frequentazioni</button></a><br>");

	//select all data
	$query = "select sum(f.oreEffettuate) from frequentazioni f join personale p on p.codFiscPersona=f.codFiscPersona join corsi c on c.idCorso=f.idCorso group by (f.oreEffettuate, p.nomePersona, p.cognomePersona)";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	} 
	    echo "<table border='1'>";
	        echo "<tr>";
	            //echo "<th>corso</th>";
	            //echo "<th>nome</th>";
	            //echo "<th>cognome</th>";
				echo "<th>ore effettuate</th>";
	        echo "</tr>";
			
	        foreach ($res as $row) {
	            echo "<tr>";
	                //echo "<td>".$row['nomeCorso']."</td>";
	                //echo "<td>".$row['nomePersona']."</td>";
	                //echo "<td>".$row['cognomePersona']."</td>";
					echo "<td>".$row['oreEffettuate']."</td>";
	            echo "</tr>";
	        }
	    echo "</table>";
//}
?> 
 
</body>
</html>
