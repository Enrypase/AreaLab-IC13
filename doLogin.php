<?php
session_start();
include 'libs/util.php';
include 'libs/db_connect.php';

$ut=getArr($_POST,"username");
$pw=getArr($_POST,"password");

//--------------------------------------------------------------------//
	//DATAEORA
	$dataOra=date('d/m/Y H:i:s');
	//IP:MAC:AZIONE
	$azione="tentativo di login";
	$ipAddress=$_SERVER['REMOTE_ADDR'];
	$macAddr=false;
	$arp='arp -a $ipAddress';
	$lines=explode("\n", $arp);
	foreach($lines as $line)
	{
	   $cols=preg_split('/\s+/', trim($line));
	   if ($cols[0]==$ipAddress)
	   {
		   $macAddr=$cols[1];
		   echo $macAddr;
	   }
	}
	if($macAddr==""){
		$macAddr="MAC";
	}

	if (!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	$azioni="$azione";
	$userN="$ip-$macAddr-$ut";
	$query="INSERT INTO log(username,dataeOra,azioni) VALUES (?,?,?)";
	$stmt=$con->prepare($query);
	$stmt->execute(array($userN, $dataOra, $azioni));
//-------------------------------------------------------------------------------------//

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
else if (in_array($ut, $arrayUtenti)){
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
else{
	header('Location: index.php');
}
?>

   
