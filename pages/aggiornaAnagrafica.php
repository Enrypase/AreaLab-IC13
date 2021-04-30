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
			echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiornaAnagraficaMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/buttonMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInputMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiornaAnagrafica.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/button.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInput.css'>";
		}
		?>
		<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 
  		<link rel="stylesheet" type="text/css" href="./Stile/DataTables.css">
		<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 
  		<link rel="stylesheet" type="text/css" href="./Stile/DataTables.css">

        <title> Aggiorna Anagrafica </title>
  
    </head>
<body>
		<div class="grid">
			<?php include './pages/header-logged.php'; ?>
			<div class="testo">

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
	

	
	
	//select all data
	$query = "SELECT * FROM personale";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	}
	
		echo "<div class='tabella'>";
	    echo "<table id='tab' class='display' style='width:100%'>";
	        echo "<thead><tr>";
	            echo "<th>codice fiscale</th>";
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>ruolo</th>";
				echo "<th>data nascita</th>";
				echo "<th>servizio</th>";
				echo "<th>plesso</th>";
				echo "<th>mail</th>";
				echo "<th></th>";
	        echo "</tr></thead><tbody>";
	  
	        foreach ($res as $row) {
				$codFiscPersona=$row['codFiscPersona'];
				$servizio=$row['servizio'];
				if ($servizio=='1'){
					$servizio="in servizio";
				}
				else{
					$servizio="no";
				}
	            echo "<tr>";
	                echo "<td>".$codFiscPersona."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
					echo "<td>".$row['ruoloPersona']."</td>";
					echo "<td>".$row['dataNascitaPersona']."</td>";
					if ($servizio=='1'){
						$servizio="in servizio";
					}
					else{
						$servizio="no";
					}
					echo "<td>".$servizio."</td>";
	                echo "<td>".$row['plesso']."</td>";
					echo "<td>".$row['mailPersona']."</td>";
					echo "<td><form method='POST' action='modificapersona.php'><input type='hidden' name='codFiscPersona' value='$codFiscPersona'/><input type='submit' class='rowT' value='modifica'/></form></td>";
	            echo "</tr>";
	        }
	    echo "</tbody></table><br>";
	    echo "</div>";

	    print("<div class='pulsanti'><a href='aggiungipersona.php'><button onClick='aggiungipersona.php'> Aggiungi persona</button></a></div><br>");
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
