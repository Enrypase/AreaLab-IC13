<?php
session_start();
include 'libs/util.php';
$user=getArr($_SESSION,'username');
$id=getArr($_SESSION,'id');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> POLDO </title>
  
    </head>
<body>
	
<form action='doLogin.php' method='post' >
            Username<input type='text' name='username' /><br>
            Password <input type='password' name='password' /><br>
			<input type ='submit' value='Login'>
</form>
</body>
</html>

   
