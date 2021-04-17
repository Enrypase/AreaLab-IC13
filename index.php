<?php
session_start();
include 'libs/util.php';
$user=getArr($_SESSION,'username');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> IC13 </title>
		<center>
		<h1>Portale di accesso</h1>
		<h2>servizio di gestione corsi di sicurezza e formazione</h2>
		</center>
    </head>
<body>
<center><table>
<form action='dologin.php' method='post' >
            <tr><td>username</td><td> <input type='text' name='username' /></td></tr><br>
            <tr><td>password</td><td> <input type='password' name='password' /></td></tr><br>
			</table>
			<input type ='submit' value='Login'><br><br><br><br><br><br>
</form>
</center>
</body>
</html>

   
