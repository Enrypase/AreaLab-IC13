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
				echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiornaFrequentazioniMobile.css'>";
			}
			else{
				echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiornaFrequentazioni.css'>";
			}
		?>
		<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 
  		<link rel="stylesheet" type="text/css" href="./Stile/DataTables.css">

		<title>Aggiorna Frequentazioni</title>
    </head>
	<body>
		<div class="grid">
				<?php include './pages/header-logged.php'; ?>
				<div class="testo">
					<h2>Nella seguente tabella verranno visualizzate tutte le frequentazioni presenti. <br>
					Inoltre è possibile scegliere se visualizzare specificatamente tutte le frequentazioni nel dettaglio oppure se aggiungerne una nuova in generale premendo il pulsante in basso a destra oppure specifica del corso già presente premendo il pulsante relativo nella tabella: </h2>
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
							
							$query = "select sum(f.oreEffettuate), c.nomeCorso, p.nomePersona, p.cognomePersona, p.codFiscPersona from Frequentazioni f join Corsi c ON c.idCorso=f.idCorso JOIN Personale p ON p.codFiscPersona=f.codFiscPersona group BY f.codFiscPersona, f.idCorso";
							try{
								$res=$con->query($query);
							}catch(PDOException $ex) {
							    include 'errore.php';
							} 

							echo "<div class='tabella'>";
							echo "<table id='tab' class='display' style='width:100%'>";
							echo "<thead> <tr>";
							echo "<th>corso</th>";
							echo "<th>nome</th>";
							echo "<th>cognome</th>";
							echo "<th>ore effettuate</th>";
							echo "<th>  </th>";
							echo "</tr> </thead> <tbody>";
									
							foreach ($res as $row) {
								$codFiscPersona=$row['codFiscPersona'];
							    echo "<tr>";
							    echo "<td>".$row['nomeCorso']."</td>";
							    echo "<td>".$row['nomePersona']."</td>";
							    echo "<td>".$row['cognomePersona']."</td>";
								echo "<td>".$row['sum(f.oreEffettuate)']."</td>";
								echo "<td><form method= 'POST' action='aggiungifrequentazione.php'><input type='hidden' name='codFiscPersona' value='$codFiscPersona'/><input type='submit' class='rowT' value='Aggiungi frequenze'/></form></td>";
							    echo "</tr>";
							}
							echo "</tbody></table><br>";
							echo "</div>";

							echo "<div class='pulsanti'>";
							echo("<a href='frequentazioni.php'><button onClick='frequentazioni.php'> visualizza frequenze</button></a><br>");
							echo("<a href='aggiungifrequentazione.php'><button onClick='aggiungifrequentazione.php'> aggiungi frequenze</button></a><br>");
							echo"</div>";
			    ?>
		</div>
		<?php echo file_get_contents('./pages/footer-logged.html');	?>
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