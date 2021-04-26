<?php 
$_SESSION['secLevel'] = 1;
include './Logica/security.php';
include './libs/mobileDetect.php';
$detect = new Mobile_Detect();
?>
<!DOCTYPE html>
<head>
	<?php 
		include './pages/defS.html';
		if($detect->isMobile()){
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/defaultMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/index-loggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/index-logged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLogged.css'>";
		}
	?>
	<title>Home</title>
</head>
<body>
	<div class="grid">
		<?php include './pages/header-logged.php'; ?>
		<div class="testo">
			<a href="login.php" class="box left">
				<img src="./Immagini/login.png" alt="Login">
				<p>Premere su questo pulsante oppure sullo stesso presente nel menù per accedere alla sezione della pagina riguardante il login.<br> Una volta effettuato l'accesso, se in possesso delle credenziali corrette, sarà possibile accedere all'area di gestione del personale.</p>
			</a>
			<a href="info.php" class="box mid">
					<img src="./Immagini/info.png" alt="Infos">
					<p>Premere su questo pulsante oppure sullo stesso presente nel menù per accedere alla sezione contenente tutte le informazioni sulla scuola, oppure per avere più informazioni riguardo al progetto e alle persone che hanno partecipato alla realizzazione di quest'ultimo.</p>
			</a>
			<a href="homepage.php" class="box right">
					<img src="./Immagini/homepage.png" alt="Infos">
					<p>Premere su questo pulsante oppure sullo stesso presente nel menù per accedere alla sezione della pagina riguardante la gestione del personale.<br> Qui sarà possibile effettuare tutte le operazioni supportate dal programma per elaborare i dati di quest'ultimo.<br> Nota: Questa pagina sarà visualizzabile e accessibile solamente una volta eseguito il login.</p>
			</a>
		</div>
		<?php echo file_get_contents('./pages/footer-logged.html');	?>
	</div>
</body>