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
	
echo"	<a href=\"homepage.php\">Home</a><br><br>";
echo"	<b>corsi disponibili<b>";
	$corso=getArr($_POST,"corso");
	
	$query = "select distinct nomeCorso, idCorso from corsi";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	    echo "<table id=\"example\" class=\"display\" style=\"width:100%\">";
	        echo "<thead><tr>";
	            echo "<th>id</th>";
	            echo "<th>nome</th>";
	        echo "</tr></thead><tbody>";
			
	        foreach ($res as $row) {
	            echo "<tr>";
	                echo "<td>".$row['idCorso']."</td>";
	                echo "<td>".$row['nomeCorso']."</td>";
	            echo "</tr>";
	        }
	    echo "</tbody></table>";
echo"<center>";
echo"<table>";
echo" <br><form action=\"stampa.php\" method=\"post\" >";
echo"<tr><td>   nome corso:</td><td>		<input type=\"text\" name=\"corso\" /></td></tr><br>";
echo"<tr><td>   plesso:</td><td>			<input type=\"text\" name=\"plesso\" /></td></tr><br>";
echo"<tr><td> 	ruolo personale:</td><td>	<input type=\"text\" name=\"ruolo\" /></td></tr><br>";
echo"<tr><td> 	ora di inizio:</td><td>		<input type=\"time\" name=\"oraI\" /></td></tr><br>";
echo"<tr><td> 	ora di fine:</td><td>		<input type=\"time\" name=\"oraF\" /></td></tr><br>";
echo"</table>";
echo"	<input type =\"submit\" value=\"submit\">";
echo" </form>";
echo"</center>";
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