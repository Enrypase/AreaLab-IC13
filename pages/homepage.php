<?php 
$_SESSION['secLevel'] = 1;
include './libs/db_connect.php';
include './Logica/security.php';
include './libs/mobileDetect.php';
$detect = new Mobile_Detect();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php
		include './pages/defS.html';
		if($detect->isMobile()){
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/defaultMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/homepageMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/buttonMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInputMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/homepage.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/button.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInput.css'>";
		}
	?>
		<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 
  		<link rel="stylesheet" type="text/css" href="./Stile/DataTables.css">

		<title>Home</title>
	</head>
	<body>
		<div class="grid">
			<?php include './pages/header-logged.php'; ?>
			<div class="testo">
				<div class="paragrafo">
					<p> Benvenuto nella Homepage! <br> Nella seguente pagina troverai tutte le informazioni riguardanti il personale. </p>
				</div>

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

						echo "<div class='tabella1'>";
						echo "<b>Persone che non hanno svolto alcun corso:</b>";	
						$query = "select * from personale where codFiscPersona not in (select codFiscPersona from frequentazioni)";
						try{
							$res=$con->query($query);
						}catch(PDOException $ex) {
						    include 'errore.php';
						} 

						    echo "<table id='tab1' class='display' style='width:100%'>";
						        echo "<thead> <tr>";
						            echo "<th>codice fiscale</th>";
						            echo "<th>nome</th>";
						            echo "<th>cognome</th>";
						        echo "</tr> </thead> <tbody>";
						  
						
						        foreach ($res as $row) {
						            echo "<tr>";
										echo "<td>".$row['codFiscPersona']."</td>";
						                echo "<td>".$row['nomePersona']."</td>";
						                echo "<td>".$row['cognomePersona']."</td>";
						            echo "</tr>";
						        }
						    echo "</tbody></table><br>";
						echo "</div>";
						echo "<div class='tabella2'>";
						echo "<b>Persone che devono svolgere dei corsi:</b>";
						$query = "select sum(f.oreEffettuate), c.nomeCorso, p.nomePersona, p.cognomePersona, p.codFiscPersona from Frequentazioni f join Corsi c ON c.idCorso=f.idCorso JOIN Personale p ON p.codFiscPersona=f.codFiscPersona group BY f.codFiscPersona, f.idCorso HAVING sum(f.oreEffettuate)<6";
						try{
							$res=$con->query($query);
						}catch(PDOException $ex) {
						    include 'errore.php';
						}
							echo "<table id='tab2' class='display' style='width:100%'>";
						    echo "<thead> <tr>";
						    echo "<th>nome</th>";
						    echo "<th>cognome</th>";
						    echo "<th>codice fiscale</th>";
							echo "<th>corso</th>";
							echo "<th>ore mancanti</th>";
						    echo "</tr> </thead> <tbody>";
						    foreach ($res as $row) {
						        echo "<tr>";
						        echo "<td>".$row['nomePersona']."</td>";
						        echo "<td>".$row['cognomePersona']."</td>";
						        echo "<td>".$row['codFiscPersona']."</td>";
								echo "<td>".$row['nomeCorso']."</td>";
								$oreMancanti=6-$row['sum(f.oreEffettuate)'];
								echo "<td>".$oreMancanti."</td>";
								echo "</tr>";
						        }
						    echo "</tbody></table><br>";
						    echo "</div>";
					?>

				<div class="pulsanti">
					<a href="AggiornaCorsi.php"><button onClick="AggiornaCorsi.php">Aggiorna corsi</button></a>
					<a href="AggiornaAnagrafica.php"><button onClick="AggiornaAnagrafica.php">Aggiorna anagrafica</button></a>
					<a href="AggiornaFrequentazioni.php"><button onClick="AggiornaFrequentazioni.php">Aggiorna frequenze</button></a>
					<a href="Consulta.php"><button onClick="index.php">Consulta</button></a>	
					<a href="Backup.php"><button onClick="Backup.php">Ottieni backup</button></a>
					<a href="FoglioFirme.php"><button onClick="FoglioFirme.php">Ottieni foglio firme</button></a>
				</div>
			</div>
			<?php echo file_get_contents('./pages/footer-logged.html');	?>
		</div>

		<script type="text/javascript">
		$(document).ready(function() {
		    $('#tab1').DataTable( {
		        "paging":   true,
		        "ordering": true,
		        "info":     false
		    } );
		} );
		</script>
		<script type="text/javascript">
		$(document).ready(function() {
		    $('#tab2').DataTable( {
		        "paging":   true,
		        "ordering": true,
		        "info":     false
		    } );
		} );
		</script>
	</body>
</html>