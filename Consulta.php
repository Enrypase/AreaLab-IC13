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
	
echo"	<a href=\"homepage.php\">Home</a><br>";
echo"	<a href=\"persona.php\"><button onClick=\"persona.php\"> ordina per persona</button></a><br>";
echo"	<a href=\"corso.php\"><button onClick=\"corso.php\"> ordina per corso</button></a><br>";
echo"	<a href=\"frequentazioni.php\"><button onClick=\"frequentazioni.php\"> frequentazioni</button></a><br><br>";

if ($_POST) {
	$word=getArr($_POST,"word");
	$query = "select * from personale where nomePersona LIKE '$word' or cognomePersona LIKE'$word'";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	}
    echo "<table id=\"example\" class=\"display\" style=\"width:100%\">";
	        echo "<thead><tr>";
	            echo "<th>codice fiscale</th>";
	            echo "<th>nome persona</th>";
	            echo "<th>cognome persona</th>";
	        echo "</tr></thead><tbody>";

	        foreach ($res as $row){
	            echo "<tr>";
	                echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
	            echo "</tr></tbody>";
	        }
	    echo "</table>";
}
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
