<?php
session_start();
include 'libs/util.php';
$user=getArr($_SESSION,'username');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
  
    </head>
<body>
	
<form action='dologin.php' method='post' >
            Username<input type='text' name='username' /><br>
            Password <input type='password' name='password' /><br>
			<input type ='submit' value='Login'>
</form>
</body>
</html>

   
