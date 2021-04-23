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
				echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiungiFrequentazioneMobile.css'>";
			}
			else{
				echo "<link rel='stylesheet' type='text/css' href='./Stile/aggiungiFrequentazione.css'>";
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

				echo"<center>";	
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
				echo"</table>";
				echo"    <input type='submit' value='Aggiungi'/>";
				echo"</form>";
				echo"</center>";
				
				?>
			</div>
			<?php echo file_get_contents('./pages/footer-logged.html');	?>
		</div>

		</body>
</html>

