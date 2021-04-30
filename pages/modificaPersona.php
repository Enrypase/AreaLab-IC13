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
			echo "<link rel='stylesheet' type='text/css' href='./Stile/modificaPersonaMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputFormMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInputMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/modificaPersona.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputForm.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInput.css'>";
		}
		?>
		<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 
  		<link rel="stylesheet" type="text/css" href="./Stile/DataTables.css">

		<title>Modifica Persona</title>
  
    </head>
<body>
<div class="grid">
			<?php include './pages/header-logged.php'; ?>
			<div class="testo">
<?php

	$codFiscPersona="";
	if ($_POST) {
        $codFiscPersona= getArr($_POST, "codFiscPersona");
	}
	$query = "select * from Personale where codFiscPersona='{$codFiscPersona}'";
	try{
		$res=$con->query($query);
		foreach ($res as $row) {
			echo"Modifica del record: <br> <b> ".$row['codFiscPersona']." | ".$row['nomePersona']. " | ".$row['cognomePersona']. " | ".$row['ruoloPersona']. " | ".$row['dataNascitaPersona']. " | ".$row['servizio']. " | ".$row['mailPersona']. " | ".$row['plesso']."</b> <br> <br>";
		}
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 

echo"<form action='./doModificaPersona.php' method=\"POST\">";
echo"	codice fiscale: <br> <input type=\"text\" name=\"codFiscPersona\" value=\"$codFiscPersona\"/> <br>";
echo"    nome: <br> <input type=\"decimal\" name=\"nomePersona\"/> <br>";
echo"    cognome: <br> <input type=\"text\" name=\"cognomePersona\"/> <br>";
echo"    ruolo: <br> <input type=\"text\" name=\"ruoloPersona\"/> <br>";
echo"    data di nascita: <br> <input type=\"date\" name=\"dataNascitaPersona\"/> <br>";
echo"	 in servizio: <br> <input type=\"checkbox\" name=\"servizio\" value=\"1\"/> <br>";
echo"    plesso: <br> <input type=\"text\" name=\"plesso\" value='' /> <br>";
echo"    mail: <br> <input type=\"mail\" name=\"mailPersona\"/> <br>";
echo"    <input type=\"submit\" value=\"modifica\"/>";
echo"</form>";
?>
</div>
<?php echo file_get_contents('./pages/footer-logged.html');	?>
</div>
</body>
</html>