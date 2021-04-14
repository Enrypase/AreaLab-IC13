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
	    echo "Errore !".$ex->getMessage();
	} 
	foreach ($res as $row) {
		$arrayUtenti[]=$row['username'];
	}
	
if (in_array($user, $arrayUtenti)){
	print("<a href=\"homepage.php\">Home</a><br>");
	print("<a href=\"aggiungicorso.php\"><button onClick=\"aggiungicorso.php\"> aggiungi corso</button></a><br>");

	//select all data
	$query = "SELECT * FROM corsi";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	}
	    echo "<table id=\"example\" class=\"display\" style=\"width:100%\">";
	        echo "<thead><tr>";
	            echo "<th>ID</th>";
	            echo "<th>nome</th>";
	            echo "<th>descrizione</th>";
				echo "<th>durata ore</th>";
	        echo "</tr></thead><tbody>";
	  
	
	        foreach ($res as $row){
				$idCorso=$row['idCorso'];
				$descrizioneCorso=$row['descrizioneCorso'];
				$nomeCorso=$row['nomeCorso'];
				$durataOraCorso=$row['durataOraCorso'];
	            echo "<tr>";
	                echo "<td>".$idCorso."</td>";
	                echo "<td>".$nomeCorso."</td>";
	                echo "<td>".$descrizioneCorso."</td>";
					echo "<td>".$durataOraCorso."</td>";
					echo "<td><form method=\"POST\" action=\"modificacorso.php\">
					<input type=\"hidden\" name=\"id\" value=\"$idCorso\"/>
					<input type=\"hidden\" name=\"nome\" value=\"$nomeCorso\"/>
					<input type=\"hidden\" name=\"descr\" value=\"$descrizioneCorso\"/>
					<input type=\"hidden\" name=\"durata\" value=\"$durataOraCorso\"/>
					<input type=\"submit\" value=\"modifica\"/>
					</form></td>";
	            echo "</tr></tbody>";
	        }
	    echo "</table>";
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
