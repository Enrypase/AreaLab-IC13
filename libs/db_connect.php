<?php
    try {
		$con = new PDO("sqlite:sicurezza.db");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $exception){
        echo "Connection error: " . $exception->getMessage();
    }
?>
