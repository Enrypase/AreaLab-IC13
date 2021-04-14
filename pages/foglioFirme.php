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
					
				if (in_array($user, $arrayUtenti)){

				echo "Corsi disponibili: ";
					$corso=getArr($_POST,"corso");
					
					$query = "select distinct nomeCorso, idCorso from corsi";
					try{
						$res=$con->query($query);
					}catch(PDOException $ex) {
					    include 'errore.php';
					} 
					    echo "<table border='1'>";
					        echo "<tr>";
					            echo "<th>id</th>";
					            echo "<th>nome</th>";
					        echo "</tr>";
							
					        foreach ($res as $row) {
					            echo "<tr>";
					                echo "<td>".$row['idCorso']."</td>";
					                echo "<td>".$row['nomeCorso']."</td>";
					            echo "</tr>";
					        }
					    echo "</table>";

				echo" <br><form action='stampa.php' method='post' >";
				echo"   Nome del corso: <br> <input type='text' name='corso' placeholder='Corso'><br>";
				echo"	Ruolo del personale: <br> <input type='text' name='ruolo' placeholder='Ruolo'><br>";
				echo"	Ora di inizio: <br> <input type='time' name='oraI'><br>";
				echo"	Ora di conclusione: <br> <input type='time' name='oraF'><br>";
				echo"	<input type ='submit' value='Invio'>";
				echo" </form>";
				}
				else{
					include 'erroreaccesso.php';
				}
				?>

			</div>
			<?php echo file_get_contents('./pages/footer-logged.html');	?>
		</div>
</body>
</html>