<?php 
$_SESSION['secLevel'] = 1;
include './Logica/security.php';
?>
<!DOCTYPE html>
<head>
	<link rel='stylesheet' type='text/css' href='./Stile/index-logged.css'>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
	<title>Home</title>
</head>
<body>
	<div class="grid">
		<?php include './pages/header-logged.php'; ?>
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
				<p> Benvenuto! Clicca qui per essere rimandato alla pagina alla quale troverai tutti i nostri contatti. </p>
			</a>
		</div>
		<?php echo file_get_contents('./pages/footer-logged.html');	?>
	</div>
</body>