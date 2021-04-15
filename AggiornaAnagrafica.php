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
	print("<a href=\"aggiungipersona.php\"><button onClick=\"aggiungipersona.php\"> aggiungi persona</button></a><br>");
	
	//select all data
	$query = "SELECT * FROM personale";
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
				echo "<th>ruolo</th>";
				echo "<th>data nascita</th>";
				echo "<th>servizio</th>";
				echo "<th>mail</th>";
				echo "<th></th>";
	        echo "</tr></thead><tbody>";
	  
	        foreach ($res as $row) {
				$codFiscPersona=$row['codFiscPersona'];
				$nomePersona=$row['nomePersona'];
				$cognomePersona=$row['cognomePersona'];
				$ruoloPersona=$row['ruoloPersona'];
				$dataNascitaPersona=$row['dataNascitaPersona'];
				$mailPersona=$row['mailPersona'];
				$servizio=$row['servizio'];
				if ($servizio=='1'){
					$servizio="in servizio";
				}
				else{
					$servizio="no";
				}
	            echo "<tr>";
	                echo "<td>".$codFiscPersona."</td>";
	                echo "<td>".$nomePersona."</td>";
	                echo "<td>".$cognomePersona."</td>";
					echo "<td>".$ruoloPersona."</td>";
					echo "<td>".$dataNascitaPersona."</td>";
	                echo "<td>".$servizio."</td>";
					echo "<td>".$mailPersona."</td>";
					echo "<td><form method=\"POST\" action=\"modificapersona.php\">
					<input type=\"hidden\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/>
					<input type=\"hidden\" name=\"nome\" value=\"$nomePersona\"/>
					<input type=\"hidden\" name=\"cognome\" value=\"$cognomePersona\"/>
					<input type=\"hidden\" name=\"ruolo\" value=\"$ruoloPersona\"/>
					<input type=\"hidden\" name=\"datan\" value=\"$dataNascitaPersona\"/>
					<input type=\"hidden\" name=\"servizio\" value=\"$servizio\"/>
					<input type=\"hidden\" name=\"mail\" value=\"$mailPersona\"/>
					<input type=\"submit\" value=\"modifica\"/>
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
