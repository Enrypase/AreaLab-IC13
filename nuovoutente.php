 <?php 
include 'libs/util.php';
include 'libs/db_connect.php';
if ($_POST) {
	
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
	
	//---------------------------------------------------------------------//
	//DATAEORA
	$dataOra=date('d/m/Y H:i:s');
	//IP:MAC:AZIONE
	$azione="tentativo aggiunta utente";
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
	$userN="$ip-$macAddr-$user";
	$query="INSERT INTO log(username,dataeOra,azioni) VALUES (?,?,?)";
	$stmt=$con->prepare($query);
	$stmt->execute(array($userN, $dataOra, $azioni));
	//----------------------------------------------------------------------------------//	
	
        $username= getArr($_POST, "username");
        $password1= getArr($_POST, "password1");
		$password2= getArr($_POST, "password2");
		$mailUtenti= getArr($_POST, "mail");
		$pw1=hash('sha256',$password1);
		$pw2=hash('sha256',$password2);
        if ($username!="" && $pw1!="" && $pw2!="" && $pw1==$pw2 && $mailUtenti!=""){
	
	//---------------------------------------------------------------------//
	//DATAEORA
	$dataOra=date('d/m/Y H:i:s');
	//IP:MAC:AZIONE
	$azione="aggiunta utente";
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
	$userN="$ip-$macAddr-$user";
	$query="INSERT INTO log(username,dataeOra,azioni) VALUES (?,?,?)";
	$stmt=$con->prepare($query);
	$stmt->execute(array($userN, $dataOra, $azioni));
	//----------------------------------------------------------------------------------//	
	
			$query="update utenti set username='$username', password='$pw1', mailUtenti='$mailUtenti' where username='adminuser'";
			try{
				$stmt=$con->prepare($query);
				$stmt->execute();
				header('Location: index.php');
			} catch (Exception $ex) {
                include 'errore.php';
            }
		}else
		{
			print(" <b> riprova, parametri non corretti </b>");
			header('Location: nuovaautenticazione.php');
		}
	}
}
else{
	include 'erroreaccesso.php';
}
?>