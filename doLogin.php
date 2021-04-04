<?php
session_start();
//Gestisce il login
include "libs/util.php";
include 'libs/db_connect.php';
$con = new PDO("sqlite:sicurezza.db");

$ut=getArr($_POST,"username");
$pw=getArr($_POST,"password");
$pw=hash('sha256',$pw);
try {
		//prepare query
		$query = "select * from Utenti where username= ? and password= ?";
		$stmt = $con->prepare( $query );

		$stmt->bindParam(1, $ut);
		$stmt->bindParam(2, $pw);  
		//execute our query
		$stmt->execute();
		
		//store retrieved row to a variable
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if ($row){  // password coincide 
			$user=$row['username'];
			$mail=$row['mailUtenti'];
			$_SESSION['username']=$user;
			$error="";
			
			header('Location: homepage.php');
		}
		else{
			$user="";
			$error="password errata";
			//header('Location: index.php');
			session_destroy();
		}
	

	}catch(PDOException $exception){ //to handle error
		$user="";
		session_destroy();
		$errore=$exception->getMessage();
		print($exception);

	}

?>

   
