<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Patient Exist</title>
  <link href="./css/covid.css" type="text/css" rel="stylesheet">
</head>

<body>
<a href="./covid.php">Return Homepage</a>
    <?php
    include 'connect_CovidDB.php';
    ?>

    <?php
    $ohip=$_POST["ohip"];
    $query = 'SELECT POhip FROM Patient WHERE POhip="'.$ohip.'"';
    $result = $connection->query($query);
    $row = $result->fetch();

    if ($row == true ){
    echo "<h2>Create New Vaccination Record for Patient: ".$ohip."</h2>";
    echo '<form action="addNewVax.php" method="post">';
    
      $query0 = "SELECT * FROM Vaccine";
      $result0 = $connection->query($query0);
      echo "<p>Please select the vaccination lot:</p>";
      echo '<div class="rtable">';
      while ($row0 = $result0->fetch()) {
          echo '<input type="radio" name="lot" value="';
          echo $row0["Lot"];
          echo '">' . $row0["Lot"]. "<br>";
      }
      echo '</div>';

      $query1 = "SELECT * FROM Vax_Clinic";
      $result1 = $connection->query($query1);
      echo "<p>Please select the vaccination site where patient get the vaccine:</p>";
      echo '<div class="rtable">';
      while ($row1 = $result1->fetch()) {
          echo '<input type="radio" name="site_name" value="';
          echo $row1["VName"];
          echo '">' . $row1["VName"]. "<br>";
      }
      echo '</div>';
      echo '<input type="hidden" name="ohip" value="'.$ohip.'">';

      echo '<p>Please select the date when patient received the vaccination</p>';
      echo '<input type="date" id="date" name="vdate">';
      
      echo '<p>Please select the time when patient received the vaccination</p>';
      echo '<input value="00:00:00" type="time" name="vtime" step="1"></br>';
      echo '<input type="submit" value="submit vaccination information">';

      echo '</form>';

      } else {
        echo '<h2>Sorry this patient does not exist</h2>';
        echo '<p>You need to add this patient before processing their vaccination record </p>';
        echo '<p>Click the link below to add patient</p>';
        echo '<a href="./PatientNotExist.php">Add New Patient</a>';

      }
      ?>

    
</body>

</html>

