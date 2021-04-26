<?php 
$_SESSION['secLevel'] = 0;
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
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/headerMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/loginMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/gridMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottomMobile.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/inputMobile.css'>";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/default.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/header.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/login.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/grid.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/bottom.css'>";
			echo "<link rel='stylesheet' type='text/css' href='./Stile/default/input.css'>";
		}
	?>
	<title>Login</title>
</head>
<body>
	<div class="grid">
		<?php include './pages/header.php'; ?>
		<div class="testo">
			<p> Benvenuto! <br> Effettua l'accesso solamente se sei amministratore e hai a disposizione le credenziali. <br> Non provare a effettuare accessi se non hai a disposizione le credenziali! Viene tenuto traccia di tutto. </p>
			<form action='./Logica/doLogin.php' method='post' >
	            <input type='text' name='username' placeholder="Username" /><br>
	            <input type='password' name='password' placeholder="Password" /><br>
				<input type ='submit' value='Login'>
			</form>
		</div>
		<?php echo file_get_contents('./pages/footer.html'); ?>
	</div>
</body>
</html>