<?php 
$_SESSION['secLevel'] = 1;
include './libs/db_connect.php';
include './Logica/security.php';
include './libs/mobileDetect.php';
$detect = new Mobile_Detect();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
        	include './pages/defS.html';
			if($detect->isMobile()){
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/defaultMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiungiFrequentazioneMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputFormMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInputMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiungiFrequentazione.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputForm.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInput.css'>";
		}
		?>
		<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 
  		<link rel="stylesheet" type="text/css" href="./Stile/DataTables.css">

		<title>Home</title>
	</head>
	<body>
		<div class="grid">
			<?php include './pages/header-logged.php'; ?>
			<div class="testo">
				<?php
				$query = "select distinct username from utenti";
					try{
						$res=$con->query($query);
					}catch(PDOException $ex) {
					    include 'errore.php';
					} 
					foreach ($res as $row) {
						$arrayUtenti[]=$row['username'];
					}

		
				echo"<h2>Aggiungi una frequentazione: </h2>";

					$codFiscPersona="";
					$nomeCorso="";
					if ($_POST) {
				        $codFiscPersona= getArr($_POST, "codFiscPersona");
						$nomeCorso= getArr($_POST, "nomeCorso");
					}

				echo"<form action='dofrequentazioni.php' method='POST'>";
				echo"codice fiscale: <br> <input type='text' name='codFiscPersona' value='$codFiscPersona'/><br>";
				echo"ore effettuate: <br> <input type='text' name='oreEffettuate'/> <br>";
				echo"nome corso: <br> <input type='text' name='corso' value='$nomeCorso'/> <br>";
				echo"data: <br> <input type='date' name='data'/> <br>";
				echo"    <input type='submit' value='Aggiungi Frequentazione'/>";
				echo"</form>";

				
				?>
			</div>
			<?php echo file_get_contents('./pages/footer-logged.html');	?>
		</div>

		</body>
</html>

