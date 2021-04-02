<?php
session_start();
//Gestisce il login
include "../libs/util.php";
include '../libs/db_connect.php';

$ut=getArr($_POST,"username");
$pw=getArr($_POST,"password");
$pw=hash('sha256',$pw);
$_SESSION["currentPage"] = "doLogin.php";
try {
		//prepare query
		$query = "select * from utenti where username= ? and password= ?";
		$stmt = $con->prepare( $query );

		$stmt->bindParam(1, $ut);
		$stmt->bindParam(2, $pw);  
		//execute our query
		$stmt->execute();
		
		//store retrieved row to a variable
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row){  // password coincide 
			$user=$row['username'];
			$mail=$row['mail'];
			$_SESSION['username']=$user;
			$_SESSION['id']=$row['id'];
			$error="";
			
			header('Location: ../homepage.php');
		}
		else{
			$user="";
			$error="password errata";
			header('Location: ../index.php');
			session_destroy();
		}
	

	}catch(PDOException $exception){ //to handle error
		$user="";
		session_destroy();
		$errore=$exception->getMessage();
		print($exception);


	}

?>  