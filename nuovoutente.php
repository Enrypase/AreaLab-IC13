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
        $username= getArr($_POST, "username");
        $password1= getArr($_POST, "password1");
		$password2= getArr($_POST, "password2");
		$mailUtenti= getArr($_POST, "mail");
		$pw1=hash('sha256',$password1);
		$pw2=hash('sha256',$password2);
        if ($username!="" && $pw1!="" && $pw2!="" && $pw1==$pw2 && $mailUtenti!=""){
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