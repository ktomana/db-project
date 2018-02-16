<?php

  session_start();
  $username = "harry";
  $password = "potter";
  $error = "";
  if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    $error = "success";
    header('Location: list.php');
  }
  if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $username && $_POST['password'] == $password) {
      $_SESSION['loggedIn'] = true;
      header('Location: list.php');
    } else {
      $_SESSION['loggedIn'] = false;
      $error = "Invalid username and password!";
    }
  }

?>
