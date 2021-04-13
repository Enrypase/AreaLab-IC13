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
	    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>id</th>";
	            echo "<th>nome</th>";
	        echo "</tr>";
			
	        foreach ($res as $row) {
	            echo "<tr>";
	                echo "<td>".$row['idCorso']."</td>";
	                echo "<td>".$row['nomeCorso']."</td>";
	            echo "</tr>";
	        }
	    echo "</table>";

echo" <br><form action=\"stampa.php\" method=\"post\" >";
echo"    inserisci corso<input type=\"text\" name=\"corso\" /><br>";
echo"	ruolo personale<input type=\"text\" name=\"ruolo\" /><br>";
echo"	ora di inizio<input type=\"time\" name=\"oraI\" /><br>";
echo"	ora di fine<input type=\"time\" name=\"oraF\" /><br>";
echo"	<input type =\"submit\" value=\"submit\">";
echo" </form>";
}
else{
	include 'erroreaccesso.php';
}
?>
</body>
</html>