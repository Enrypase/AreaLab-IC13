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
	echo"<center>";
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
	
echo"<h2>modifica il corso</h2>";
echo"<table>";
echo"<form action=\"domodificacorso.php\" method=\"POST\">";
echo"	 <tr><td>codice corso:	</td><td> <input type=\"text\" name=\"id\" value=\"$idCorso\"/></td></tr> <br>";
echo"    <tr><td>nome corso:	</td><td> <input type=\"text\" name=\"nome\" value=\"$nomeCorso\"/></td></tr> <br>";
echo"    <tr><td>descrizione: 	</td><td> <input type=\"text\" name=\"descrizione\" value=\"$descrizioneCorso\"/></td></tr> <br>";
echo"    <tr><td>durata ore: 	</td><td><input type=\"decimal\" name=\"durata\" value=\"$durataOraCorso\"/></td></tr> <br>";
echo"</table>";
echo"    <input type=\"submit\" value=\"Modifica\"/>";
echo"</form>";
echo"</center>";
}
else{
	include 'erroreaccesso.php';
}
?>

</body>
</html>