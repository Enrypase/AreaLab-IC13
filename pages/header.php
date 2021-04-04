<?php
$currentPage = $_SESSION["currentPage"];
?>
<div class="header">
	<?php
		if($currentPage == 'index.php'){
			echo '<a href="index.php"><img src="./Immagini/home.png" alt="Home"></a>';
			echo '<a href="login.php"><img src="./Immagini/loginLogo.png" alt="Login"></a>';
			echo '<a href="info.php"><img src="./Immagini/infoLogo.png" alt="informazioni"></a>';
		}
		else if($currentPage == 'login.php'){
			echo '<a href="index.php"><img src="./Immagini/homeLogo.png" alt="Home"></a>';
			echo '<a href="login.php"><img src="./Immagini/login.png" alt="Login"></a>';
			echo '<a href="info.php"><img src="./Immagini/infoLogo.png" alt="informazioni"></a>';
		}
		else if($currentPage == 'info.php'){
			echo '<a href="index.php"><img src="./Immagini/homeLogo.png" alt="Home"></a>';
			echo '<a href="login.php"><img src="./Immagini/loginLogo.png" alt="Login"></a>';
			echo '<a href="info.php"><img src="./Immagini/info.png" alt="informazioni"></a>';
		}
		else{

		}
	?>
</div>