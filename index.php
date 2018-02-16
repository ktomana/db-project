<?php
include_once('authentication/login.php');
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>twoja baza gór</title>
    <link href="main.css" rel="stylesheet">
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <header class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">bazy danych - projekt</h3>
            </div>
          </header>
          <main role="main" class="inner cover">
            <h1 class="cover-heading">baza zdobytych szczytów</h1>
            <p class="lead">zaloguj się aby zobaczyć więcej</p>
            <form method="POST" action="index.php">
              <input type="text" name="username" placeholder="username"/>
              <input type="password" name="password" placeholder="password"/>
              <p class="lead">
                <button type="submit" class="btn btn-lg btn-secondary">zaloguj</button>
              </p>
            </form>
          </main>
          <footer class="mastfoot">
            <div class="inner">
              <p>Klaudia Tomana. 2018</p>
            </div>
          </footer>
        </div>
      </div>
    </div>
  </body>
</html>
