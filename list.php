<?php
  include_once('repositories/mountain_repository.php');
  include_once('repositories/range_repository.php');
  include_once('authentication/checkLogin.php');
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
            <nav class="nav nav-masthead">
              <a class="nav-link" href="add.php">dodaj</a>
              <a class="nav-link" href="authentication/logout.php">wyloguj</a>
            </nav>
          </div>
        </header>

        <table>
          <th>Wybierz</th>
          <th>Nazwa szczytu</th>
          <th>Wysokość</th>
          <th>Pasmo górskie</th>

          <?php
            $mountains = fetchAllMountains();
            for ($i = 0; $i < count($mountains); $i++) {
              $line = $mountains[$i];
          ?>
              <tr>
                <td>
                  <form method="POST" action="">
                    <input class="btn btn-lg btn-secondary" type="submit" name="destroy" value="Usuń" />
                    <input class="btn btn-lg btn-secondary" type="submit" name="edit" value="Modyfikuj"/>
                    <input type="hidden" name="mountain_id" value="<?php echo $line['mountain_id']; ?>"/>
                  </form>
                </td>
                <td><?php echo $line['mountain_name']; ?></td>
                <td><?php echo $line['mountain_height']; ?></td>
                <td><?php echo $line['range_name']; ?></td>
              </tr>
          <?php
            }
          ?>
        </table>

        <?php
          if ($_POST['destroy']) {
            deleteMountain($_POST[mountain_id]);
            echo "Usunięto";
            echo "<meta http-equiv='refresh' content='0'>";
          }

          if ($_POST['edit']) {
            $row = fetchMountain($_POST[mountain_id]);
        ?>

            <form method="POST" action="">
              <br>
              <th>Nazwa szczytu:</th><br>
              <input type="text" name="mountain_name" value="<?php echo $row['mountain_name']; ?>"/><br>
              <th>Wysokość:</th><br>
              <input type="text" name="mountain_height" value="<?php echo $row['mountain_height']; ?>"/><br>
              <th>Pasmo górskie:</th><br>

              <select name="range_id">
                <?php
                  $ranges = fetchAllRanges();
                  for ($i = 0; $i < count($ranges); $i++) {
                    $range = $ranges[$i];
                    echo $range['id'];
                    $selected = $range['name'] == $row['range_name'];
                ?>
                  <option
                    value="<?php echo $range['id'] ?>"
                    <?php echo ($selected ? "selected" : ""); ?>
                  >
                    <?php echo $range['name'] ?>
                  </option>
                <?php
                  }
                ?>
              </select><br><br>

              <input class="btn btn-lg btn-secondary" type="submit" name="update" value="Zatwierdź"/>
              <input type="hidden" name="mountain_id" value="<?php echo $row['mountain_id']; ?>"/>
            </form>

          <?php
          }
            if ($_POST['update']) {
              $params = array("mountain_name" => $_POST[mountain_name],
                              "mountain_height" => $_POST[mountain_height],
                              "range_id" => $_POST[range_id],
                              "mountain_id" => $_POST[mountain_id]);
              updateMountain($params);
              echo "Zaktualizowano";
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
