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
			<a href="info.php" class="box left">
					<img src="./Immagini/info.png" alt="Infos">
					<p>Benvenuto! Clicca per visualizzare la pagina relativa al funzionamento del programma. <br> Troverai informazioni utili sul funzionamento di quest'ultimo, nonchè potrai visualizzare la documentazione completa del programma.</p>
			</a>
			<a href="login.php" class="box mid">
				<img src="./Immagini/login.png" alt="Login">
				<p>Benvenuto! Se sei un amministratore e vuoi accedere al programma entra in questa sezione. <br> Altrimenti, per più informazioni, consultare la sezione apposita.</p>
			</a>
			<a href="aboutUs.php" class="box right">
				<img src="./Immagini/aboutUs.png" alt="AboutUs">
				<p> Benvenuto! Clicca qui per essere rimandato alla pagina alla quale troverai tutti i nostri contatti. <br> Sia riguardante la scuola che gli sviluppatori che hanno partecipato al progetto.</p>
			</a>
		</div>
		<?php echo file_get_contents('./pages/footer.html'); ?>
	</div>
</body>