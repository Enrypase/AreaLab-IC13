<?php
$currentPage = $_SESSION["currentPage"];
?>
<div class="header">
	<div class="notLogged">
		<?php
		if($currentPage == 'index.php'){
			echo '<a href="index.php"><img src="./Immagini/home.png" alt="Home"></a>';
			echo '<a href="info.php"><img src="./Immagini/infoLogo.png" alt="informazioni"></a>';
			echo '<a href="login.php"><img src="./Immagini/loginLogo.png" alt="Login"></a>';
			echo '<a href="aboutUs.php"><img src="./Immagini/aboutUsLogo.png" alt="AboutUs"></a>';
		}
		else if($currentPage == 'info.php'){
			echo '<a href="index.php"><img src="./Immagini/homeLogo.png" alt="Home"></a>';
			echo '<a href="info.php"><img src="./Immagini/info.png" alt="informazioni"></a>';
			echo '<a href="login.php"><img src="./Immagini/loginLogo.png" alt="Login"></a>';
			echo '<a href="aboutUs.php"><img src="./Immagini/aboutUsLogo.png" alt="AboutUs"></a>';
		}
		else if($currentPage == 'login.php'){
			echo '<a href="index.php"><img src="./Immagini/homeLogo.png" alt="Home"></a>';
			echo '<a href="info.php"><img src="./Immagini/infoLogo.png" alt="informazioni"></a>';
			echo '<a href="login.php"><img src="./Immagini/login.png" alt="Login"></a>';
			echo '<a href="aboutUs.php"><img src="./Immagini/aboutUsLogo.png" alt="AboutUs"></a>';
		}
		else if($currentPage == 'aboutUs.php'){
			echo '<a href="index.php"><img src="./Immagini/homeLogo.png" alt="Home"></a>';
			echo '<a href="info.php"><img src="./Immagini/infoLogo.png" alt="informazioni"></a>';
			echo '<a href="login.php"><img src="./Immagini/loginLogo.png" alt="Login"></a>';
			echo '<a href="aboutUs.php"><img src="./Immagini/aboutUs.png" alt="AboutUs"></a>';
		}
		else{
			echo '<a href="index.php"><img src="./Immagini/homeLogo.png" alt="Home"></a>';
			echo '<a href="info.php"><img src="./Immagini/infoLogo.png" alt="informazioni"></a>';
			echo '<a href="login.php"><img src="./Immagini/loginLogo.png" alt="Login"></a>';
			echo '<a href="aboutUs.php"><img src="./Immagini/aboutUsLogo.png" alt="AboutUs"></a>';
		}
	?>
	</div>
	<div class="logged">
		<a href="homepage.php"><img src="./Immagini/homepage.png" alt="Homepage"></a>
		<!-- Creare una procedura di logout -->
		<a href="./Logica/logout.php"><img src="./Immagini/logout.png" alt="Logout"></a>
	</div>
</div>