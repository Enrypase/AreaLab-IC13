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

		<title>Foglio Firme</title>
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

				echo "<h2>Nella seguente tabella verranno visualizzati i corsi disponibili. <br> Inoltre è possibile ottenere un foglio-firma di un determinato corso data un'ora di inizio e una di fine:</h2> ";
					$corso=getArr($_POST,"corso");
					
					$query = "select distinct nomeCorso, idCorso from corsi";
					try{
						$res=$con->query($query);
					}catch(PDOException $ex) {
					    include 'errore.php';
					} 
					    echo "<table id='tab' class='display' style='width:100%'>";
					        echo "<thead><tr>";
					            echo "<th>id</th>";
					            echo "<th>nome</th>";
					        echo "</tr> </thead> <tbody>";
							
					        foreach ($res as $row) {
					            echo "<tr>";
					                echo "<td>".$row['idCorso']."</td>";
					                echo "<td>".$row['nomeCorso']."</td>";
					            echo "</tr>";
					        }
					    echo "</tbody></table>";

				echo" <br><form action='stampa.php' method='post' >";
				echo"   Nome del corso: <br> <input type='text' class='input' name='corso' placeholder='Corso'><br>";
				echo"Nome del plesso: <br> <input type='text' class='input' name='plesso' placeholder='Plesso'><br>";
				echo"	Ruolo del personale: <br> <input type='text' class='input' name='ruolo' placeholder='Ruolo'><br>";
				echo"	Ora di inizio: <br> <input type='time' class='input' name='oraI'><br>";
				echo"	Ora di conclusione: <br> <input type='time' class='input' name='oraF'><br>";
				echo"	<input type ='submit' class='input' value='Invio'>";
				echo" </form>";
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