<?php 
session_start();
include 'libs/util.php';
include 'libs/db_connect.php';
$user=getArr($_SESSION,'username');
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
	
if (in_array($user, $arrayUtenti)){
	
echo"	<form action=\"dobackup.php\" method=\"post\">";
echo"            Password <input type=\"password\" name=\"password\" /><br>";
echo"			<input type =\"submit\" value=\"verifica\">";
echo"	</form>";
}
else{
	include 'erroreaccesso.php';
}
?>
</body>
</html>
