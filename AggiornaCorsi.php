<?php
include 'libs/util.php';
include 'libs/db_connect.php';
//$user=getArr($_SESSION,'username');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<?php
//if ($user!="" && $user="adminuser"){
	print("<a href=\"homepage.php\">Home</a><br>");
	print("<a href=\"AggiungiCorso.php\"><button onClick=\"AggiungiCorso.php\"> aggiungi corso</button></a><br>");

	//select all data
	$query = "SELECT * FROM corsi";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	}
	    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>ID</th>";
	            echo "<th>nome</th>";
	            echo "<th>descrizione</th>";
				echo "<th>durata ore</th>";
	        echo "</tr>";
	  
	
	        foreach ($res as $row){
				$idCorso=$row['idCorso'];
	            echo "<tr>";
	                echo "<td>".$idCorso."</td>";
	                echo "<td>".$row['nomeCorso']."</td>";
	                echo "<td>".$row['descrizioneCorso']."</td>";
					echo "<td>".$row['durataOraCorso']."</td>";
					echo "<td><form method=\"POST\" action=\"ModificaCorso.php\"><input type=\"checkbox\" name=\"id\" value=\"$idCorso\"/><input type=\"submit\" value=\"modifica\"/></form></td>";
	            echo "</tr>";
	        }
	    echo "</table>";
	
//}
?> 
 
</body>
</html>
