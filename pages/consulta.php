<?php 
$_SESSION['secLevel'] = 1;
include './libs/db_connect.php';
include './Logica/security.php';
include './libs/mobileDetect.php';
$detect = new Mobile_Detect();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php 
			include './pages/defS.html';
			if($detect->isMobile()){
				echo "<link rel='stylesheet' type='text/css' href='./Stile/consultaMobile.css'>";
			}
			else{
				echo "<link rel='stylesheet' type='text/css' href='./Stile/consulta.css'>";
			}
		?>
		<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 

		<title>Home</title>
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