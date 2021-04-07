<html>
<head><title>PDO - SQLite: Select values</title></head>
<body>

<?php

  $db = new PDO("sqlite:sicurezza.db"); 
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  try {

    $res = $db -> query('select * from personale');


    print '<table>';
    foreach ($res as $row) {

      print '<tr><td>' . $row['nomePersona'] . '</td><td>' . $row['cognomePersona'] . '</td></tr>';

    }
    print '</table>';

  }
  catch(PDOException $e) {

    print ("exception " . $e->getMessage());
  
  }


?>

</body>
</html>