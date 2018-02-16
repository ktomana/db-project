<?php
  include_once('repository.php');

  function fetchAllRanges() {
    $query = "SELECT * FROM ranges ORDER BY name";
    return fetchResults($query);
  }
?>
