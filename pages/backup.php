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
			echo "<link rel='stylesheet' type='text/css' href='./Stile/backupMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/buttonMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInputMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/backup.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/button.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInput.css'>";
		}
		?>
        <title> IC13 </title>
  
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
	

echo"<div class='pulsanti'><a href='sicurezza.db' download='backup.db'><button>Download database</button></a></div>";
?>
</div>
<?php echo file_get_contents('./pages/footer-logged.html');	?>
</div>

</body>
</html>
