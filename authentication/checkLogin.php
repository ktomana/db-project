<?php

ob_start();
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
  header("Location: index.php");
}

?>
