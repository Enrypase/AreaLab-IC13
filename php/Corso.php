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
	
echo"	<a href=\"consulta.php\">back</a><br>";
	$query = "select * from corsi";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>id</th>";
	            echo "<th>nome</th>";
	            echo "<th>descrizione</th>";
				echo "<th>durata</th>";
	        echo "</tr>";
	  
	
	        foreach ($res as $row) {
	            echo "<tr>";
	                echo "<td>".$row['idCorso']."</td>";
	                echo "<td>".$row['nomeCorso']."</td>";
	                echo "<td>".$row['descrizioneCorso']."</td>";
					echo "<td>".$row['durataOraCorso']."</td>";
	            echo "</tr>";
	        }
	    echo "</table>";
}
else{
	include 'erroreaccesso.php';
}
?> 
 
</body>
</html>
