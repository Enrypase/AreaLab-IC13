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
echo" <a href=\"homepage.php\">Home</a><br><br>";
echo" <a href=\"sicurezza.db\" download=\"backup.db\"><button>download</a>";
}
else{
	include 'erroreaccesso.php';
}
?>
</body>
</html>
