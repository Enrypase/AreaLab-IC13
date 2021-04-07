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
	echo "<b>Persone che devono svolgere dei corsi:</b>";
	$query = "select p.nomePersona, p.cognomePersona, p.codFiscPersona, c.nomeCorso, f.oreEffettuate from Personale p join frequentazioni f on f.codFiscPersona=p.codFiscPersona join corsi c on c.idCorso=f.idCorso where f.oreEffettuate<6 group by(f.idCorso)";
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
			$oreMancanti=$row['oreEffettuate']-2;
			echo "<td>".$oreMancanti."</td>";
			echo "</tr><br>";
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
