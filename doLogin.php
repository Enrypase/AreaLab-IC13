<?php
session_start();
include 'libs/util.php';
include 'libs/db_connect.php';

$ut=getArr($_POST,"username");
$pw=getArr($_POST,"password");

$query = "select distinct username from utenti";
	try{
		$res=$con->query($query);
	}catch(PDOException $ex) {
	    include 'errore.php';
	} 
	foreach ($res as $row) {
		$arrayUtenti[]=$row['username'];
	}
	
if ($ut=='adminuser' && $pw==$ut && in_array($ut, $arrayUtenti)){
	header('Location: nuovaautenticazione.php');
}
else{
	$pw=hash('sha256',$pw);
	try {
		$query = "select * from Utenti where username= ? and password= ?";
		$stmt = $con->prepare( $query );
		$stmt->bindParam(1, $ut);
		$stmt->bindParam(2, $pw);  
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if ($row){  // password coincide 
			$user=$row['username'];
			$_SESSION['username']=$user;
			header('Location: homepage.php');
		}
		else{
			$user="";
			header('Location: index.php');
			session_destroy();
		}
	
	}catch(PDOException $exception){ //to handle error
		$user="";
		session_destroy();
		include 'errore.php';
	}
}
?>

   
