<?php
session_start();
include 'libs/util.php';
$user=getArr($_SESSION,'username');
$con = new PDO("sqlite:C:\xampp\htdocs\IC13\sicurezza.db");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>
	
<form action='doLogin.php' method='post' >
            Username<input type='text' name='username' /><br>
            Password <input type='password' name='password' /><br>
			<input type ='submit' value='Login'>
</form>
</body>
</html>

   
