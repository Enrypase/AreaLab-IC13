<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='./Stile/homepage.css'>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
		<title>Home</title>
	</head>
	<body>
		<div class="grid">
			<?php		 
			echo file_get_contents('./pages/header-logged.html');
			?>
			<div class="testo">
				<div class="elenco">
					<?php
					if ($user!="")
						print("<H3> Ciao $user! </h3>");
						echo "<b>Persone che devono svolgere dei corsi:</b>";
						$query = "select nomePersona, cognomePersona, p.codFiscPersona from personale p left join frequentazioni f on (p.codFiscPersona = f.codFiscPersona) where f.codFiscPersona IS NULL;";// VANNO AGGIUNTI ANCHE I CASI DELLA SOMMA DELLE ORE INFERIORE A QUELLA VOLUTA E CONDIZIONE SULLA DATA
						try{
							$num=0;
							$stmt = $con->prepare( $query );
							$stmt->execute();
							$num = $stmt->rowCount();
						}catch(PDOException $ex) {
						    echo "Errore !".$ex->getMessage();
						}
						if($num>0){
							
						    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
						        echo "<p>".$row['nomePersona'].", ";
						        echo "".$row['cognomePersona'].", ";
						        echo "".$row['codFiscPersona'].";</p>";
						        }
						}
						else{
						    echo "No results.";
						}
					?>
				</div>
				<div class="pulsanti">
					<a href="AggiornaCorsi.php"><button onClick="AggiornaCorsi.php">Aggiorna corsi</button></a>
					<a href="Consulta.php"><button onClick="index.php">Consulta</button></a>
					<a href="AggiornaAnagrafica.php"><button onClick="AggiornaAnagrafica.php">Aggiorna anagrafica</button></a>
					<a href="Backup.php"><button onClick="Backup.php">Ottieni backup</button></a>
					<a href="FoglioFirme.php"><button onClick="FoglioFirme.php">Ottieni foglio firme</button></a>
				</div>
			</div>
			<?php echo file_get_contents('./pages/footer-logged.html');	?>
		</div>
	</body>
</html>