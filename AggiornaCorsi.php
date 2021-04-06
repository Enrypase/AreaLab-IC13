<?php
include 'libs/util.php';
//include 'libs/db_connect.php';
$con = new PDO("sqlite:sicurezza.db");
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
	print("<a href=\"ModificaCorso.php\"><button onClick=\"ModificaCorso.php\"> modifica corso</button></a><br>");

	//select all data
	$query = "SELECT * FROM corsi";
	try {
		$num=0;
		$stmt = $con->prepare( $query );
		$stmt->execute(); 
		$num = $stmt->rowCount();
	} catch(PDOException $ex) {
	    echo "Errore !".$ex->getMessage();
	}
	
	if($num>0){
	  
	    echo "<table border='1'>";
	        echo "<tr>";
	            echo "<th>ID</th>";
	            echo "<th>nome</th>";
	            echo "<th>descrizione</th>";
				echo "<th>durata ore</th>";
	        echo "</tr>";
	  
	
	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            echo "<tr>";
	                echo "<td>".$row['idCorso']."</td>";
	                echo "<td>".$row['nomeCorso']."</td>";
	                echo "<td>".$row['descrizioneCorso']."</td>";
					echo "<td>".$row['durataOreCorso']."</td>";
	            echo "</tr>";
	        }
	    echo "</table>";
	}
	else{
	    echo "No records found.";
	}
//}
?> 
 
</body>
</html>
