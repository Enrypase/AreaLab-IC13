<?php 
include 'libs/util.php';
include 'libs/db_connect.php';
//$user=getArr($_SESSION,'username');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>

<a href="AggiornaCorsi.php">back</a>

<?php
	$idCorso="";
	if ($_POST) {
        $idCorso= getArr($_POST, "id");
	}
	
echo"<form action=\"doModificaCorso.php\" method=\"POST\">";
echo"	id: <input type=\"text\" name=\"id\" value=\"$idCorso\"/> <br>";
echo"    nome: <input type=\"text\" name=\"nome\"/> <br>";
echo"    descr: <input type=\"text\" name=\"descrizione\"/> <br>";
echo"    durata: <input type=\"decimal\" name=\"durata\"/> <br>";
echo"    <input type=\"submit\" value=\"Modifica\"/>";
echo"</form>";
?>

</body>
</html>