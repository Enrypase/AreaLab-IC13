<?php
include 'libs/util.php';
include 'libs/db_connect.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
    </head>
<body>

<?php
	echo "<b>Persone che non hanno svolto alcun corso:</b>";	
	$query = "select * from personale where codFiscPersona not in (select codFiscPersona from frequentazioni)";
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
	        echo "</tr>";
	  
	
	        foreach ($res as $row) {
	            echo "<tr>";
					echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
	            echo "</tr>";
	        }
	    echo "</table><br>";


	echo "<b>Persone che devono svolgere dei corsi:</b>";
	$query = "select sum(f.oreEffettuate), c.nomeCorso, p.nomePersona, p.cognomePersona, p.codFiscPersona from Frequentazioni f join Corsi c ON c.idCorso=f.idCorso JOIN Personale p ON p.codFiscPersona=f.codFiscPersona group BY f.codFiscPersona, f.idCorso HAVING sum(f.oreEffettuate)<6";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	}
		echo "<table border='1'>";
	    echo "<tr>";
	    echo "<th>nome</th>";
	    echo "<th>cognome</th>";
	    echo "<th>codice fiscale</th>";
		echo "<th>corso</th>";
		echo "<th>ore mancanti</th>";
	    echo "</tr>";
	    foreach ($res as $row) {
	        echo "<tr>";
	        echo "<td>".$row['nomePersona']."</td>";
	        echo "<td>".$row['cognomePersona']."</td>";
	        echo "<td>".$row['codFiscPersona']."</td>";
			echo "<td>".$row['nomeCorso']."</td>";
			$oreMancanti=6-$row['sum(f.oreEffettuate)'];
			echo "<td>".$oreMancanti."</td>";
			echo "</tr>";
	        }
	    echo "</table><br>";

	
	print("<a href=\"index.php\"><button onClick=\"index.php\"> logout</button></a><br>");
	print("<a href=\"AggiornaCorsi.php\"><button onClick=\"AggiornaCorsi.php\"> aggiorna corsi</button></a><br>");
	print("<a href=\"AggiornaAnagrafica.php\"><button onClick=\"AggiornaAnagrafica.php\"> aggiorna anagrafica</button></a><br>");
	print("<a href=\"AggiornaFrequentazioni.php\"><button onClick=\"AggiornaFrequentazioni.php\"> aggiorna frequentazioni</button></a><br>");
	print("<a href=\"Consulta.php\"><button onClick=\"index.php\"> consulta</button></a><br>");
	print("<a href=\"Backup.php\"><button onClick=\"Backup.php\"> ottieni backup</button></a><br>");
	print("<a href=\"FoglioFirme.php\"><button onClick=\"FoglioFirme.php\"> ottieni foglio firme</button></a><br>");
?>
</body>
</html>
