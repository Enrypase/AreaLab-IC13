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
			echo "<link rel='stylesheet' type='text/css' href='./Stile/modificaCorsoMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputFormMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLoggedMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/modificaCorso.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputForm.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLogged.css'>";

		}
		?>
		<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 
  		<link rel="stylesheet" type="text/css" href="./Stile/DataTables.css">

		<title>Modifica Corso</title>
  
    </head>
<body>
	<div class="grid">
				<?php include './pages/header-logged.php'; ?>
				<div class="testo">

<?php
	$idCorso="";
	if ($_POST) {
        $idCorso= getArr($_POST, "id");
	}
	$query = "select * from Corsi where idCorso='{$idCorso}'";
	try{
		$res=$con->query($query);
		foreach ($res as $row) {
			echo"Modifica del record: <br> <b> ".$row['idCorso']." | ".$row['nomeCorso']. " | ".$row['descrizioneCorso']. " | ".$row['durataOraCorso']. "</b> <br> <br>";
		}
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	

	
echo"<form action='./doModificaCorso.php' method='POST'>";
echo"	id: <br> <input type='text' name='id' value='$idCorso'/> <br>";
echo"    nome: <br> <input type='text' name='nome'/> <br>";
echo"    descr: <br> <input type='text' name='descrizione'/> <br>";
echo"    durata: <br> <input type='decimal' name='durata'/> <br>";
echo"    <input type='submit' value='Modifica'/>";
echo"</form>";
?>
</div>
<?php echo file_get_contents('./pages/footer-logged.html');	?>
</div>
</body>
</html>