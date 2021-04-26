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
			echo "<link rel='stylesheet' type='text/css' href='./Stile/frequentazioniMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputFormMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomLoggedMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/smallInputMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerLogged.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/frequentazioni.css'>";
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
						
				

					$query = "select * from frequentazioni f join personale p on p.codFiscPersona=f.codFiscPersona join corsi c on c.idCorso=f.idCorso order by f.idCorso";
					try{
						$res=$con->query($query);
					}catch(PDOException $ex) {
					    include 'errore.php';
					} 
					    echo "<table id='example' class='display' style='width:100%'>";
					        echo "<thead><tr>";
					            echo "<th>corso</th>";
					            echo "<th>nome</th>";
					            echo "<th>cognome</th>";
								echo "<th>plesso</th>";
								echo "<th>ore svolte</th>";
								echo "<th>data</th>";
					        echo "</tr></thead><tbody>";
					  
					
					        foreach ($res as $row) {
					            echo "<tr>";
					                echo "<td>".$row['nomeCorso']."</td>";
					                echo "<td>".$row['nomePersona']."</td>";
					                echo "<td>".$row['cognomePersona']."</td>";
									echo "<td>".$row['plesso']."</td>";
									echo "<td>".$row['oreEffettuate']."</td>";
									echo "<td>".$row['data']."</td>";
					            echo "</tr>";
					        }
					    echo "</tbody></table>";
				?> 
			</div>
			<?php echo file_get_contents('./pages/footer-logged.html');	?>
		</div>
				<script>

				$(document).ready(function() {
				    $('#example').DataTable( {
				        'paging':   true,
				        'ordering': true,
				        'info':     false
				    } );
				} );
				</script> 
	</body>
</html>