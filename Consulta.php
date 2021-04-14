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
    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>codice fiscale</th>";
	            echo "<th>nome persona</th>";
	            echo "<th>cognome persona</th>";
	        echo "</tr>";

	        foreach ($res as $row){
	            echo "<tr>";
	                echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
	            echo "</tr>";
	        }
	    echo "</table>";
}
}
else{
	include 'erroreaccesso.php';
}
?> 
 
</body>
</html>
