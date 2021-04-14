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
	if($detect->isMobile()){
		echo "<link rel='stylesheet' type='text/css' href='./Stile/homepageMobile.css'>";
	}
	else{
		echo "<link rel='stylesheet' type='text/css' href='./Stile/homepage.css'>";
	}
	?>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
		<title>Home</title>
	</head>
	<body>
		<div class="grid">
			<?php include './pages/header-logged.php'; ?>
			<div class="testo">
				<div class="elenco">
					<div class="titolo">
						<b>Benvenuto alla home! <br>  Di seguito troverai tutte le funzionalità che il programma offre. <br><br> Persone che devono svolgere dei corsi:</b>
					</div>
					<div class="persone">
						<?php
						$query = "select * from Personale p join frequentazioni f on f.codFiscPersona=p.codFiscPersona where f.oreEffettuate<6 group by(f.idCorso)";
						try{
							$res=$con->query($query);
						}catch(PDOException $ex) {
							    echo "Errore !".$ex->getMessage();
						}
						foreach ($res as $row) {
							echo $row['nomePersona']."   " ;
							echo $row['cognomePersona']."   ";
							echo $row['codFiscPersona']."<br>";
						}
						?>
					</div>
				</div>
				<div class="pulsanti">
					<a href="AggiornaCorsi.php"><button onClick="AggiornaCorsi.php">Aggiorna corsi</button></a>
					<a href="Consulta.php"><button onClick="index.php">Consulta</button></a>
					<a href="AggiornaAnagrafica.php"><button onClick="AggiornaAnagrafica.php">Aggiorna anagrafica</button></a>
					<a href="Backup.php"><button onClick="Backup.php">Ottieni backup</button></a>
					<a href="FoglioFirme.php"><button onClick="FoglioFirme.php">Ottieni firme</button></a>
				</div>
			</div>
			<?php echo file_get_contents('./pages/footer-logged.html');	?>
		</div>
	</body>
</html>