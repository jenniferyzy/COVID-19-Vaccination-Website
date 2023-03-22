<!doctype html>
<head>
  <meta charset="utf-8">
  <title>Search Vaccine</title>
  <link href="./css/covid.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php
include 'connect_CovidDB.php';
?>

<h2>Patient Database</h2>
<p>Please choose the patient whose vaccination status you would like to check</p>
<form action="getPatient.php" method="post">
    <?php
      $query = "SELECT PFName, PLName, POhip FROM Patient";
      $result = $connection->query($query);
      echo '<div class="rtable">';
      while ($row = $result->fetch()) {
          echo '<input type="radio" name="ohip" value="';
          echo $row["POhip"];
          echo '">' . $row["PFName"]. " " . $row['PLName'] . "<br>";
      }
      echo '</div>';
    ?>
      <input type="submit" value="search patient's status">
    </form>

</body>
</html>