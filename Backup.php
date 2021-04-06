<?php 
include 'libs/util.php';
//include 'libs/db_connect.php';
$con = new PDO("sqlite:sicurezza.db");
//$user=getArr($_SESSION,'username');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<a href="homepage.php">Home</a><br>
<?php
	$results=$con->exec('.dump');
	$content=$results->fetchArray();
	exec('sqlite3 backup.db .dump', $output);
?> 
 
</body>
</html>
