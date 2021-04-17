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
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
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
	echo "<h2>Persone che non hanno svolto alcun corso:</h2>";	
	$query = "select * from personale where codFiscPersona not in (select codFiscPersona from frequentazioni)";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	    echo "<table id=\"example1\" class=\"display\" style=\"width:100%\">";
	        echo "<thead><tr>";
	            echo "<th>codice fiscale</th>";
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>plesso</th>";
	        echo "</tr></thead><tbody>";
	  
	
	        foreach ($res as $row) {
	            echo "<tr>";
					echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td>".$row['plesso']."</td>";
	            echo "</tr>";
	        }
	    echo "</tbody></table><br>";


	echo "<h2>Persone che devono svolgere dei corsi:</h2>";
	$query = "select sum(f.oreEffettuate), p.plesso, c.nomeCorso, p.nomePersona, p.cognomePersona, p.codFiscPersona from Frequentazioni f join Corsi c ON c.idCorso=f.idCorso JOIN Personale p ON p.codFiscPersona=f.codFiscPersona group BY f.codFiscPersona, f.idCorso HAVING sum(f.oreEffettuate)<6";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	}
		echo "<table id=\"example\" class=\"display\" style=\"width:100%\">";
	    echo "<thead><tr>";
	    echo "<th>nome</th>";
	    echo "<th>cognome</th>";
		echo "<th>plesso</th>";
	    echo "<th>codice fiscale</th>";
		echo "<th>corso</th>";
		echo "<th>ore mancanti</th>";
	    echo "</tr></thead><tbody>";
	    foreach ($res as $row) {
	        echo "<tr>";
	        echo "<td>".$row['nomePersona']."</td>";
	        echo "<td>".$row['cognomePersona']."</td>";
			echo "<td>".$row['plesso']."</td>";
	        echo "<td>".$row['codFiscPersona']."</td>";
			echo "<td>".$row['nomeCorso']."</td>";
			$oreMancanti=6-$row['sum(f.oreEffettuate)'];
			echo "<td>".$oreMancanti."</td>";
			echo "</tr>";
	        }
	    echo "</tbody></table><br>";

echo"<center><table>";
	print("<tr><td><b>disconnettiti ed esci dall'applicazione</b></td>		<td><a href=\"index.php\"><button onClick=\"index.php\"> logout</button></a></td></tr><br>");
	print("<tr><td><b>aggiorna, modifica e aggiungi corsi</b></td>			<td><a href=\"aggiornacorsi.php\"><button onClick=\"AggiornaCorsi.php\"> aggiorna corsi</button></a></td></tr><br>");
	print("<tr><td><b>aggiorna, modifica e aggiungi personale</b></td>		<td><a href=\"aggiornaanagrafica.php\"><button onClick=\"aggiornaanagrafica.php\"> aggiorna anagrafica</button></a></td></tr><br>");
	print("<tr><td><b>aggiorna, modifica e aggiungi frequentazioni</b></td>	<td><a href=\"aggiornafrequentazioni.php\"><button onClick=\"aggiornafrequentazioni.php\"> aggiorna frequentazioni</button></a></td></tr><br>");
	print("<tr><td><b>consulta corsi, personale e frequentazioni</b></td>	<td><a href=\"consulta.php\"><button onClick=\"consulta.php\"> consulta</button></a></td></tr><br>");
	print("<tr><td><b>ottieni una copia backup del database</b></td>		<td><a href=\"backup.php\"><button onClick=\"backup.php\"> ottieni backup</button></a></td></tr><br>");
	print("<tr><td><b>ottieni i fogli firme</b></td>						<td><a href=\"fogliofirme.php\"><button onClick=\"fogliofirme.php\"> ottieni foglio firme</button></a></td></tr><br>");
echo"</table></center>";
}
else{
	include 'erroreaccesso.php';
}
?>
<script>

$(document).ready(function() {
    $('#example1').DataTable( {
        "paging":   true,
        "ordering": true,
        "info":     false
    } );
	$('#example').DataTable( {
        "paging":   true,
        "ordering": true,
        "info":     false
    } );
} );
</script>
</body>
</html>
