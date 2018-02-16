<?php
  include_once('repositories/mountain_repository.php');
  include_once('repositories/range_repository.php');
  include_once('authentication/checkLogin.php');
?>

<!DOCTYPE html>
<html lang="PL">
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
            <nav class="nav nav-masthead">
              <a class="nav-link" href="list.php">poprzednia strona</a>
              <a class="nav-link" href="authentication/logout.php">wyloguj</a>
            </nav>
          </div>
        </header>

        <h1>Dodaj szczyt górski do bazy:</h1>
        <ul>
          <form name="insert" action="add.php" method="POST">
            <th>Nazwa szczytu:</th><br>
              <input type="text" name="mountain_name"/><br>
            <th>Wysokość:</th><br>
              <input type="number" name="mountain_height"/><br>
            <th>Pasmo górskie:</th><br>
              <select name="range_id">
                <?php
                  $ranges = fetchAllRanges();
                  for ($i = 0; $i < count($ranges); $i++) {
                    $range = $ranges[$i];
                ?>
                  <option value="<?php echo $range['id'] ?>">
                    <?php echo $range['name'] ?>
                  </option>
                <?php
                  }
                ?>
              </select><br><br>
            <input class="btn btn-lg btn-secondary" type="submit" name="add" value="Wyślij"/>
          </form>
        </ul>

        <?php
          if ($_POST['add']) {
            $params = array("mountain_name" => $_POST[mountain_name],
                            "mountain_height" => $_POST[mountain_height],
                            "range_id" => $_POST[range_id]);
            addMountain($params);
            echo "Dodano do bazy.";
            echo "<meta http-equiv='refresh' content='0'>";
          }
        ?>

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
