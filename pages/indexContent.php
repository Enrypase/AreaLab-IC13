<?php 
$_SESSION['secLevel'] = 0;
include './Logica/security.php';
include './libs/mobileDetect.php';
$detect = new Mobile_Detect();
?>
<!DOCTYPE html>
<head>
	<?php 
	if($detect->isMobile()){
		echo "<link rel='stylesheet' type='text/css' href='./Stile/indexMobile.css'>";
	}
	else{
		echo "<link rel='stylesheet' type='text/css' href='./Stile/index.css'>";
	}
	?>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
	<title>Home</title>
</head>
<body>
	<div class="grid">
		<?php include './pages/header.php'; ?>
		<div class="testo">
			<a href="login.php" class="box left">
				<img src="./Immagini/login.png" alt="Login">
				<p>Premere su questo pulsante oppure sullo stesso presente nel menù per accedere alla sezione della pagina riguardante il login.<br> Una volta effettuato l'accesso, se in possesso delle credenziali corrette, sarà possibile accedere all'area di gestione del personale.</p>
			</a>
			<a href="info.php" class="box right">
					<img src="./Immagini/info.png" alt="Infos">
					<p>Premere su questo pulsante oppure sullo stesso presente nel menù per accedere alla sezione contenente tutte le informazioni sulla scuola, oppure per avere più informazioni riguardo al progetto e alle persone che hanno partecipato alla realizzazione di quest'ultimo.</p>
			</a>
		</div>
		<?php echo file_get_contents('./pages/footer.html'); ?>
	</div>
</body>