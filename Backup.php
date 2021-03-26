<?php 
session_start();
include 'libs/db_connect.php';
$user=getArr($_SESSION,'username');
$id=getArr($_SESSION,'id');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<a href="homepage.php">Home</a><br>
<?php
	//select all data
	$query = " ";
	try {
		$num=0;
		$stmt = $con->prepare( $query );
		$stmt->execute();
		//Lettura numero righe risultato 
		$num = $stmt->rowCount();
	  
	} catch(PDOException $ex) {
	    print(" <b> backup non riuscito </b>");
	}
	//se num > 0 recordset vuoto o errore 
	if($num>0){
		print(" <b> backup avvenuto con successo </b>");
	}
	else{
	    print(" <b> backup non riuscito </b>");
	}

?> 
 
</body>
</html>
