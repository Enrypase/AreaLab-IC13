<?php
session_start();
include 'libs/util.php';
include 'libs/db_connect.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
    </head>
<body>

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
	
if (in_array('adminuser', $arrayUtenti)){
	
echo"<b>INSERISCI UN NUOVO USERNAME E UNA NUOVA PASSWORD<b>";
echo"<form action='nuovoutente.php' method='post' >";
echo"            Username<input type='text' name='username' /><br>";
echo"			Mail <input type='mail' name='mail' /><br>";
echo"            Password <input type='password' name='password1' /><br>";
echo"			Ripeti la password <input type='password' name='password2' /><br>";
echo"			<input type ='submit' value='torna al login'>";
echo"</form>";
}
else{
	include 'erroreaccesso.php';
}
?>
</body>
</html>