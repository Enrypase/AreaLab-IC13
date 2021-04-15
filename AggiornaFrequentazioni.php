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
	    echo "<table id=\"example\" class=\"display\" style=\"width:100%\">";
	        echo "<thead><tr>";
	            echo "<th>corso</th>";
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>ore effettuate</th>";
				echo "<th></th>";
	        echo "</tr></thead><tbody>";
			
	        foreach ($res as $row) {
				$codFiscPersona=$row['codFiscPersona'];
				$nomeCorso=$row['nomeCorso'];
	            echo "<tr>";
	                echo "<td>".$nomeCorso."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td>".$row['sum(f.oreEffettuate)']."</td>";
					echo "<td><form method=\"POST\" action=\"aggiungifrequentazione.php\">
					<input type=\"hidden\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/>
					<input type=\"hidden\" name=\"nomeCorso\" value=\"$nomeCorso\"/>
					<input type=\"submit\" value=\"aggiungi frequentazione\"/>
					</form></td>";
	            echo "</tr>";
	        }
	    echo "</tbody></table>";
}
else{
	include 'erroreaccesso.php';
}
?>
<script>

$(document).ready(function() {
    $('#example').DataTable( {
        "paging":   true,
        "ordering": true,
        "info":     false
    } );
} );
</script>
</body>
</html>
