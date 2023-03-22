<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>covid</title>
    <link href="./css/covid.css" type="text/css" rel="stylesheet">
    
</head>

<body>
<?php
include 'connect_CovidDB.php';
?>

    <h1>COVID-19 Vaccine Data Record</h1>
    <img src="./image/covid1.jpeg" alt="vax_image" width="900" height="350">
    <p>Welcome to covid-19 Vaccine Data Record Website</p>
    <p>You can add new patient or new vaccine record, search current patient or health workers as well as vaccine infomration for the type of vaccine</p>  

    <h2>Add New Vaccination Record</h2>
    <p>You can add new vaccination data on the existing patient</p>
    
    <form action="PatientExist.php" method="post">
    <p>Please first enter patient's OHIP number:</p>
    <p>OHIP: <input type="text" name="ohip"></p>
    <input type="submit" value="submit">
    </form>

    <h2>Add New Patient</h2>
    <p>If patient does not exist, you need to add the pateint by clicking the link below</p>
    <a href="./PatientNotExist.php">Add Patient</a>

    <h2>Search Patients</h2>
    <p>You can choose a pateint and check their current vaccination status by clicking the link below</p>
    <a href="./searchPatient.php">Search Patient</a>

    <h2>Search Vaccination</h2>
    <form action="VaxInfo.php" method="post">
    <?php
      $query = "SELECT * FROM Company";
      $result = $connection->query($query);
      echo "<p>Please choose the vaccine type: </p>";
      echo '<div class="rtable">';
      while ($row = $result->fetch()) {
          echo '<input type="radio" name="vax_type" value="';
          echo $row["CName"];
          echo '">' . $row["CName"]. "<br>";
      }
      echo '</div>';
    ?>
      <input type="submit" value="search vaccine">
    </form>


    <h2>Search Vaccination Staff</h2>
    <p>You can search the current health worker working in the vaccine clinic</p>
    <form action="WorkerList.php" method="post">
      <?php
      $query = "SELECT * FROM Vax_Clinic";
      $result = $connection->query($query);
      echo "<p>Please choose the Vaccination sites: </p>";
      echo '<div class="rtable">';
      while ($row = $result->fetch()) {
          echo '<input type="radio" name="site_name" value="';
          echo $row["VName"];
          echo '">' . $row["VName"]. "<br>";
      }
      echo '</div>';
      ?>
    <input type="submit" value="search staff">
    </form>

</body>
</html>