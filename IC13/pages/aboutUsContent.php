<!DOCTYPE html>
<head>
	<link rel='stylesheet' type='text/css' href='./Stile/aboutUs.css'>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
	<title>About Us</title>
</head>
<body>
	<div class="grid">
		<?php echo file_get_contents('./pages/header.html'); ?>
		<div class="testo">
			<div class="box mid">
				<h1> About us </h1>
				<p> In questa sezione troverai informazioni riguardanti in primis la scuola IC13 "Primo Levi" di Verona, in secondo luogo tutte le informazioni di chi ha partecipato alla realizzazione di questo progetto. </p>
				<h1> IC13 </h1>
				<p> Istituto Comprensivo 13 "Primo Levi" di Verona, scuola primaria e secondaria di primo grado. <br><br><br> Puoi trovarci qui: <br><br> <a href="https://www.ic13verona.edu.it/"><img src="./Immagini/browser.png" alt="Browser Ico"> </a> </p>
				<h1> Sviluppatori </h1>
				<ul>
					<li> Alberto Mondino - Lato Backend <br><a href="https://github.com/Alberto225"><img src="./Immagini/github.png"></a></li><br>
					<li> Enrico Pasetto - Lato Frontend <br><a href="https://www.linkedin.com/in/enrico-pasetto-6a48a5193/"><img src="./Immagini/linkedin.png"></a><a href="https://github.com/Enrypase/"><img src="./Immagini/github.png"></a><a href="https://www.instagram.com/enrico_pasetto/"><img src="./Immagini/instagram.png"></a></li><br>
					<li> Jacopo Mattia Marconi - Lato Backend <br><a href="https://www.linkedin.com/in/jacopo-mattia-marconi-a5a44a204/"><img src="./Immagini/linkedin.png"></a><a href="https://github.com/JacopoMattiaMarconi"><img src="./Immagini/github.png"></a><a href="https://www.instagram.com/jackymattia.coni/"><img src="./Immagini/instagram.png"></a></li><br>
					<li> Mariagrazia Tosone - Lato backend <br><a href="https://github.com/MariagraziaT"><img src="./Immagini/github.png"></a><a href="https://www.instagram.com/toso.mery/"><img src="./Immagini/instagram.png"></a></li><br>
					<li> Nadia Dalle Vedove - Lato backend <br><a href="https://github.com/Nadiadv02"><img src="./Immagini/github.png"></a><a href="https://www.instagram.com/nadiafromthewidows/"><img src="./Immagini/instagram.png"></a></li><br>
				</ul>
			</div>
		</div>
		<?php echo file_get_contents('./pages/footer.html'); ?>
	</div>
</body>