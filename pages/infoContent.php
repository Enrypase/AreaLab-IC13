<?php 
$_SESSION['secLevel'] = 0;
include './Logica/security.php';
?>
<!DOCTYPE html>
<head>
	<link rel='stylesheet' type='text/css' href='./Stile/info.css'>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
	<title>Informazioni</title>
</head>
<body>
	<div class="grid">
		<?php include './pages/header.php'; ?>
		<div class="testo">
			<div class="testo">
				<h1> Benvenuto </h1>
				<p> In questa pagina troverai tutte le informazioni riguardanti questo progetto. </p>
				<h2> Perchè? </h2>
				<p> La necessità di questo programma nasce in seguito alla mole in continuo aumento di informazioni che il sistema informativo della scuola deve gestire in ambito di personale. <br> Per rendere il tutto il più rapido possibile è stato deciso di delegare la parte riguardante la <b> sicurezza sui luoghi di lavoro </b> al sistema informatico della scuola. <br> Per realizzare i programmi sia lato <b> frontend </b> che <b> backend </b> ci si è rivolti all'<b>ITI Guglielmo </b> Marconi, del quale puoi trovare il sito <a href="https://www.marconiverona.edu.it/">qui</a>. <br> Gli alunni sono stati divisi in gruppi e ognuno di essi ha realizzato di per se il programma adottando approcci diversi. <br> Per avere più informazioni riguardo al gruppo che ha realizzato questo progetto <a href="aboutUs.html">clicca qui</a> oppure naviga alla pagina relativa attraverso la <a href="index.html">home</a>. </p>
				<h2> Come funziona? </h2>
				<p> Il programma è piuttosto semplice da utilizzare. <br> Il tutto si basa su interfaccia grafica. Per andare nello specifico puoi consultare la <b> documentazione </b> relativa al progetto <a href="https://github.com/Enrypase/AreaLab-IC13"> qui </a>. <br> <b> Attenzione! Per esercitare qualsiasi operiazione è necessario disporre del nome utente e password relative al portale </b></p>
			</div>
		</div>
		<?php 
		echo file_get_contents('./pages/footer.html'); 
		?>
	</div>
</body>