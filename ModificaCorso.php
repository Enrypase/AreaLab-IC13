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
	echo"<a href=\"aggiornacorsi.php\">back</a>";
	$idCorso="";
	$nomeCorso="";
	$descrizioneCorso="";
	$durataOraCorso="";
	if ($_POST) {
        $idCorso= getArr($_POST, "id");
		$nomeCorso= getArr($_POST, "nome");
		$descrizioneCorso= getArr($_POST, "descr");
		$durataOraCorso= getArr($_POST, "durata");
	}
	
echo"<form action=\"domodificacorso.php\" method=\"POST\">";
echo"	id: <input type=\"text\" name=\"id\" value=\"$idCorso\"/> <br>";
echo"    nome: <input type=\"text\" name=\"nome\" value=\"$nomeCorso\"/> <br>";
echo"    descr: <input type=\"text\" name=\"descrizione\" value=\"$descrizioneCorso\"/> <br>";
echo"    durata: <input type=\"decimal\" name=\"durata\" value=\"$durataOraCorso\"/> <br>";
echo"    <input type=\"submit\" value=\"Modifica\"/>";
echo"</form>";
}
else{
	include 'erroreaccesso.php';
}
?>

</body>
</html>