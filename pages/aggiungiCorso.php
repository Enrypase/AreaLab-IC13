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
			echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiungiCorsoMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputFormMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLoggedMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiungiCorso.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputForm.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLogged.css'>";

		}
		?>
		<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 
  		<link rel="stylesheet" type="text/css" href="./Stile/DataTables.css">

		<title>Aggiungi Corso</title>
  
    </head>
<body>
<div class="grid">
				<?php include './pages/header-logged.php'; ?>
				<div class="testo">
<?php
	echo"	<h2> Riempire i seguenti campi e premere su 'Aggiungi' per inserire un nuovo corso nel database. </h2>";
echo"	<form method='POST'> ";
echo"    nome: <br> <input type='text' name='nomeCorso'/> <br>";
echo"    descr: <br> <input type='text' name='descrizioneCorso'> <br>";
echo"    durata: <br> <input type='decimal' name='durataOreCorso'/> <br>";
echo"    <input type='submit' value='Aggiungi'/>";
echo"	</form>";
	
	if ($_POST) {
        $nomeCorso= getArr($_POST, "nomeCorso");
        $descrizioneCorso= getArr($_POST, "descrizioneCorso");
        $durataOraCorso= getArr($_POST, "durataOreCorso");

        if ($nomeCorso!="" && $descrizioneCorso!="" && $durataOraCorso!=""){
			$query="INSERT INTO corsi (nomeCorso,descrizioneCorso,durataOraCorso) VALUES (?,?,?)";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute(array($nomeCorso, $descrizioneCorso, $durataOraCorso));
				header('Location: aggiornacorsi.php');
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

