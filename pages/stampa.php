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
				echo "<link rel='stylesheet' type='text/css' href='./Stile/foglioFirmeMobile.css'>";
			}
			else{
				echo "<link rel='stylesheet' type='text/css' href='./Stile/foglioFirme.css'>";
			}
		?>
		<script type="text/javascript" charset="utf8" src="./JS/jquery.js"></script>
  		<script type="text/javascript" charset="utf8" src="./JS/jqueryDataTables.js"></script> 
  		<link rel="stylesheet" type="text/css" href="./Stile/dataTables.css">

		<title>Stampa</title>
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
	
if ($_POST) {
	
	$query = "select distinct nomeCorso from corsi";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	
	        foreach ($res as $row) {
				$arrayCorsi[]=$row['nomeCorso'];
	        }
			
			
	$query = "select distinct ruoloPersona from personale";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	        foreach ($res as $row) {
				$arrayRuoli[]=$row['ruoloPersona'];
	        }
	
	$query = "select distinct plesso from personale";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	        foreach ($res as $row) {
				$arrayPlessi[]=$row['plesso'];
	        }
			
	$nomeCorso=getArr($_POST,"corso");
	$plesso=getArr($_POST,"plesso");
	$ruoloPersona=getArr($_POST,"ruolo");
	$oraI=getArr($_POST,"oraI");
	$oraF=getArr($_POST,"oraF");
	
	if ($nomeCorso!="" && $plesso!="" && $ruoloPersona!="" && in_array($nomeCorso, $arrayCorsi) && in_array($plesso, $arrayPlessi) && in_array($ruoloPersona, $arrayRuoli)){
	
	$query = "select * from personale where ruoloPersona='$ruoloPersona' and servizio='1' and plesso='$plesso'";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	}
	
	$data=date("d/m/Y");
	echo "<center><h2>$plesso, $nomeCorso - $data $oraI-$oraF</h2>";
	echo "<table id='tab' class='display' style='width:100%'>";
	        echo "<thead><tr>";
				echo "<th>codice fiscale</th>";
	            echo "<th>nome</th>";
	            echo "<th>cognome</th>";
				echo "<th>firma</th>";
	        echo "</tr> </thead> <tbody>";
	  
			
			$firma="&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; <br></br>";
	        foreach ($res as $row){
	            echo "<tr>";
					echo "<td>".$row['codFiscPersona']."</td>";
	                echo "<td>".$row['nomePersona']."</td>";
	                echo "<td>".$row['cognomePersona']."</td>";
	                echo "<td>".$firma."</td>";
	            echo "</tr>";
	        }
	    echo "</tbody></table></center>";
	}
	else{
		echo ("Input non valido");
	}


}

?> 
</div>
<?php echo file_get_contents('./pages/footer-logged.html');	?>
</div>

<script type="text/javascript">
		$(document).ready(function() {
		    $('#tab').DataTable( {
		        "paging":   true,
		        "ordering": true,
		        "info":     false
		    } );
		} );
		</script>
</body>
</html>