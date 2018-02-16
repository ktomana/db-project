<?php
  include_once('repository.php');

  function fetchAllMountains() {
    $query = 'SELECT mountains.id AS mountain_id,
                     mountains.name AS mountain_name,
                     mountains.height AS mountain_height,
                     ranges.name AS range_name
              FROM mountains, ranges
              WHERE mountains.range_id = ranges.id;';

    return fetchResults($query);
  }

  function fetchMountain($id) {
    $query = "SELECT mountains.id AS mountain_id,
                     mountains.name AS mountain_name,
                     mountains.height AS mountain_height,
                     ranges.name AS range_name
              FROM mountains, ranges
              WHERE mountains.range_id = ranges.id
              AND mountains.id = $id;";

    return fetchResults($query)[0];
  }

  function addMountain($params) {
    $query = "INSERT INTO mountains(name,
                                    height,
                                    range_id)
              VALUES ('$params[mountain_name]',
                      '$params[mountain_height]',
                      '$params[range_id]');";
    executeQuery($query);
  }

  function deleteMountain($id) {
    $query = "DELETE FROM mountains
              WHERE id = $id;";
    executeQuery($query);
  }

  function updateMountain($params) {
    $query = "UPDATE mountains
              SET name='$params[mountain_name]',
                  height='$params[mountain_height]',
                  range_id='$params[range_id]'
              WHERE id='$params[mountain_id]';";
    executeQuery($query);
  }
?>
