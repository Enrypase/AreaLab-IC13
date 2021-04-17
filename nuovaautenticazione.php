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
echo"<center>";	
echo"<h2>necessario inserire nuovo username e password</h2>";
echo"<table>";
echo"<form action='nuovoutente.php' method='post' >";
echo"   <tr><td>nuovo username</td>			<td><input type='text' name='username' /></td></tr><br>";
echo"	<tr><td>nuova mail</td> 				<td><input type='mail' name='mail' /></td></tr><br>";
echo"   <tr><td>password</td> 			<td><input type='password' name='password1' /></td></tr><br>";
echo"	<tr><td>ripeti la password</td>	<td><input type='password' name='password2' /></td></tr><br>";
echo"</table>";
echo"			<input type ='submit' value='torna al login'>";
echo"</form>";
echo"</center>";	
}
else{
	include 'erroreaccesso.php';
}
?>
</body>
</html>