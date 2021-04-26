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
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/defaultMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiornaCorsiMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/buttonMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInputMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiornaCorsi.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/button.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInput.css'>";
		}

	?>
	<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 
  		<link rel="stylesheet" type="text/css" href="./Stile/DataTables.css">
        <title> Aggiorna Corsi </title>
  
    </head>
<body>
<div class="grid">
			<?php include './pages/header-logged.php'; ?>
			<div class="testo">
<?php
	

	//select all data
	$query = "SELECT * FROM corsi";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	}
	    echo "<table id='tab' class='display' style='width:100%'>";
	        echo "<thead><tr>";
	            echo "<th>ID</th>";
	            echo "<th>nome</th>";
	            echo "<th>descrizione</th>";
				echo "<th>durata ore</th>";
	        echo "</tr></thead><tbody>";
	  
	
	        foreach ($res as $row){
				$idCorso=$row['idCorso'];
	            echo "<tr>";
	                echo "<td>".$idCorso."</td>";
	                echo "<td>".$row['nomeCorso']."</td>";
	                echo "<td>".$row['descrizioneCorso']."</td>";
					echo "<td>".$row['durataOraCorso']."</td>";
					echo "<td><form method='POST' action='modificacorso.php'><input type='hidden' name='id' value='$idCorso'/><input type='submit' class='rowT' value='modifica'/></form></td>";
	            echo "</tr>";
	        }
	    echo "</tbody></table><br>";

	    print("<div class='pulsanti'><a href='aggiungicorso.php'><button onClick='aggiungicorso.php'> aggiungi corso</button></a></div><br>");
?>
 </div>
 <?php echo file_get_contents('./pages/footer-logged.html');	?>
</div>
<script type="text/javascript">
		$(document).ready(function() {
		    $('#tab').DataTable( {
		        "paging":   true,
		        "ordering": true,
		        "info":     false
		    } );
		} );
		</script>
</body>
</html>
