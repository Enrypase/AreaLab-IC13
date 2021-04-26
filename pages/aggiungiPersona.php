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
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/defaultMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiungiPersonaMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/buttonMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputFormMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiungiPersona.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/button.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputForm.css'>";
		}
	?>
        <title> Aggiungi Persona </title>
  
    </head>
<body>
	<body>
		<div class="grid">
			<?php include './pages/header-logged.php'; ?>
			<div class="testo">

<?php

echo"	<form method='POST'>";
echo"	codice fiscale: <br> <input type='text' name='codFiscPersona'/> <br>";
echo"    nome: <br> <input type='decimal' name='nomePersona'/> <br>";
echo"    cognome: <br> <input type='text' name='cognomePersona'/> <br>";
echo"   ruolo: <br> <input type='text' name='ruoloPersona'/> <br>";
echo"    data di nascita: <br> <input type='date' name='dataNascitaPersona'/> <br>";
echo"    servizio: <br> <input type='text' name='servizio'/> <br>";
echo"	mail: <br> <input type='mail' name='mailPersona'/> <br>";
echo"    <input type='submit' value='Aggiungi'/>";
echo"	</form>";

	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
        $nomePersona= getArr($_POST, "nomePersona");
        $cognomePersona= getArr($_POST, "cognomePersona");
		$ruoloPersona= getArr($_POST, "ruoloPersona");
        $dataNascitaPersona= getArr($_POST, "dataNascitaPersona");
        $servizio= getArr($_POST, "servizio");
		$mailPersona= getArr($_POST, "mailPersona");

        if ($codFiscPersona!="" && $servizio!="" && $nomePersona!="" && $cognomePersona!="" && $ruoloPersona!="" && $dataNascitaPersona!="" && $mailPersona!=""){
			$servizio=true;
			$query="INSERT INTO personale(codFiscPersona,nomePersona,cognomePersona,ruoloPersona,dataNascitaPersona,servizio,servizio,mailPersona) VALUES (?,?,?,?,?,?,?,?)";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute(array($codFiscPersona, $nomePersona, $cognomePersona, $ruoloPersona, $dataNascitaPersona, $servizio, $servizio, $mailPersona));
				header('Location: aggiornaanagrafica.php');
			} catch (Exception $ex) {
                include 'errore.php';
            }
		}else
		{
			print(" <b> parametri non inseriti </b>");
		}
	}

?>
</div>
<?php echo file_get_contents('./pages/footer-logged.html');	?>
</div>
</body>
</html>

