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
		echo "<link rel='stylesheet' type='text/css' href='./Stile/infoMobile.css'>";
	}
	else{
		echo "<link rel='stylesheet' type='text/css' href='./Stile/info.css'>";
	}
	?>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
	<title>Informazioni</title>
</head>
<body>
	<div class="grid">
		<?php include './pages/header.php'; ?>
		<div class="testo">
			<div class="info">
				<h1> Benvenuto </h1>
				<p> In questa pagina troverai tutte le informazioni riguardanti questo progetto. </p>
				<h2> Perchè? </h2>
				<p> La necessità di questo programma nasce in seguito alla mole in continuo aumento di informazioni che il sistema informativo della scuola deve gestire in ambito di personale. <br> Per rendere il tutto il più rapido possibile è stato deciso di delegare la parte riguardante la <b> sicurezza sui luoghi di lavoro </b> al sistema informatico della scuola. <br> Per realizzare i programmi sia lato <b> frontend </b> che <b> backend </b> ci si è rivolti all'<b>ITI Guglielmo </b> Marconi, del quale puoi trovare il sito <a href="https://www.marconiverona.edu.it/">qui</a>. <br> Gli alunni sono stati divisi in gruppi e ognuno di essi ha realizzato di per se il programma adottando approcci diversi. <br> Per avere più informazioni riguardo al gruppo che ha realizzato questo progetto <a href="aboutUs.html">clicca qui</a> oppure naviga alla pagina relativa attraverso la <a href="index.html">home</a>. </p>
				<h2> Come funziona? </h2>
				<p> Il programma è piuttosto semplice da utilizzare. <br> Il tutto si basa su interfaccia grafica. Per andare nello specifico puoi consultare la <b> documentazione </b> relativa al progetto <a href="https://github.com/Enrypase/AreaLab-IC13"> qui </a>. <br> <b> Attenzione! Per esercitare qualsiasi operiazione è necessario disporre del nome utente e password relative al portale </b></p>
			</div>
			<div class="aboutUs">
				<h1> About us </h1>
				<p> In questa sezione troverai informazioni riguardanti in primis la scuola IC13 "Primo Levi" di Verona, in secondo luogo tutte le informazioni di chi ha partecipato alla realizzazione di questo progetto. </p>
				<h1> IC13 </h1>
				<p> Istituto Comprensivo 13 "Primo Levi" di Verona, scuola primaria e secondaria di primo grado. <br><br><br> Puoi trovarci qui: <br><br> <a href="https://www.ic13verona.edu.it/"><img src="./Immagini/browser.png" alt="Browser Ico"> </a> </p>
				<h1> Sviluppatori </h1>
					Alberto Mondino - Lato Backend <br><a href="https://github.com/Alberto225"><img src="./Immagini/github.png"></a><br>
					Enrico Pasetto - Lato Frontend <br><a href="https://www.linkedin.com/in/enrico-pasetto-6a48a5193/"><img src="./Immagini/linkedin.png"></a><a href="https://github.com/Enrypase/"><img src="./Immagini/github.png"></a><a href="https://www.instagram.com/enrico_pasetto/"><img src="./Immagini/instagram.png"></a><br>
					Jacopo Mattia Marconi - Lato Backend <br><a href="https://www.linkedin.com/in/jacopo-mattia-marconi-a5a44a204/"><img src="./Immagini/linkedin.png"></a><a href="https://github.com/JacopoMattiaMarconi"><img src="./Immagini/github.png"></a><a href="https://www.instagram.com/jackymattia.coni/"><img src="./Immagini/instagram.png"></a><br>
					Mariagrazia Tosone - Lato backend <br><a href="https://github.com/MariagraziaT"><img src="./Immagini/github.png"></a><a href="https://www.instagram.com/toso.mery/"><img src="./Immagini/instagram.png"></a><br>
					Nadia Dalle Vedove - Lato backend <br><a href="https://github.com/Nadiadv02"><img src="./Immagini/github.png"></a><a href="https://www.instagram.com/nadiafromthewidows/"><img src="./Immagini/instagram.png"></a><br>
			</div>
		</div>
		<?php 
		echo file_get_contents('./pages/footer.html'); 
		?>
	</div>
</body>