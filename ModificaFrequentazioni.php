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
	print("<a href=\"aggiornafrequentazioni.php\">back</a><br>");
	
	//select all data
	$query = "select p.nomePersona, p.codFiscPersona, p.cognomePersona from personale p join frequentazioni f on f.codFiscPersona=p.codFiscPersona";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	
	    echo "<table id=\"example\" class=\"display\" style=\"width:100%\">";
	        echo "<thead><tr>";
	            echo "<th>codice fiscale</th>";
	            echo "<th>nome</th>";
				echo "<th>cognome</th>";
				echo "<th></th>";
	        echo "</tr></thead><tbody>";
			
	        foreach ($res as $row) {
				$codFiscPersona=$row['codFiscPersona'];
	            echo "<tr>";
	                echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td><form method=\"POST\" action=\"aggiungifrequentazione.php\">
					<input type=\"hidden\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/>
					<input type=\"submit\" value=\"modifica\"/></form></td>";
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
