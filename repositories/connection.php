<?php
  $dbconn = pg_connect("host=localhost dbname=xxxxx user=xxxxx password=xxxxx")
    or die('Nie można nawiązać połączenia: ' . pg_last_error());
?>
