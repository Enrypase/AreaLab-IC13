<?php 
$_SESSION['secLevel'] = 0;
include './Logica/security.php';
?>
<!DOCTYPE html>
<head>
	<link rel='stylesheet' type='text/css' href='./Stile/login.css'>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
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