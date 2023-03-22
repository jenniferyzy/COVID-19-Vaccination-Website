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
<a href="./covid.php">Return Homepage</a>
<h2>Vaccine Information</h2>
 
    <?php

    $vax_type= $_POST["vax_type"];

    $query = 'SELECT Vaccine.Lot, Number_Doses,VName FROM Vaccine INNER JOIN Ship_To ON Ship_To.Lot=Vaccine.Lot AND Vaccine.CName="' . $vax_type . '"';
    $result=$connection->query($query);
    if ($result->rowCount() > 0) {
        echo "<h3>Available information for ".$vax_type."</h3>";
        echo "<table>
              <tr>
              <th>Lot Number</th>
              <th>Available Doses</th>
              <th>Vaccine Clinic</th>
              </tr>";
        while ($row=$result->fetch()) {
            echo "<tr><td>".$row["Lot"]."</td><td>".$row["Number_Doses"]."</td><td>".$row["VName"]."</td></tr>";
            
        }
        echo "</table>";
    } else {
        echo "<h3>Sorry, there is no current vaccine clinic offering ".$vax_type."</h3>";
    }   
    ?>

</body>

</html>