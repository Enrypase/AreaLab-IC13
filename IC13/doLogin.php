<?php
session_start();
//Gestisce il login
include "libs/util.php";
include 'libs/db_connect.php';

$ut=getArr($_POST,"username");
$pw=getArr($_POST,"password");
$pw=hash('sha256',$pw);
print("1");
try {
		//prepare query
		//print($pw);
	
		$query = "select * from utenti where username= ? and password= ?";
		//$query = "hvjfdfbfdbdf";
		$stmt = $con->prepare( $query );
		print("2");


		$stmt->bindParam(1, $ut);
		$stmt->bindParam(2, $pw);  
		//execute our query
		print("3");
		$stmt->execute();
		
		//store retrieved row to a variable
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		print("4");
		if ($row){  // password coincide 
			$user=$row['username'];
			$mail=$row['mail'];
			$_SESSION['username']=$user;
			$_SESSION['id']=$row['id'];
			$error="";
			
			header('Location: homepage.php');
		}
		else{
			$user="";
			$error="password errata";
			header('Location: index.php');
			session_destroy();
		}
	

	}catch(PDOException $exception){ //to handle error
		$user="";
		session_destroy();
		$errore=$exception->getMessage();
		print($exception);

	}

?>

   
