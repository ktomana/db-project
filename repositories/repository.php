<?php
  include_once('connection.php');
  
  function executeQuery($query) {
    $result = pg_query($query) or die('Nieprawidłowe zapytanie: ' . pg_last_error());
    return $result;
  }

  function fetchResults($query) {
    $result = executeQuery($query);
    return pg_fetch_all($result);
  }

?>
