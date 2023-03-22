<!doctype html>
<head>
  <meta charset="utf-8">
  <title>Add Vaccination</title>
  <link href="./css/covid.css" type="text/css" rel="stylesheet">
</head>

<body>
    <a href="./covid.php">Return Homepage</a><br>
<?php
include 'connect_CovidDB.php';
?>

<?php 
    $lot=$_POST["lot"];
    $ohip=$_POST["ohip"];
    $site=$_POST["site_name"];
    $date=$_POST["vdate"]; 
    $time=$_POST["vtime"];

    $query='INSERT INTO Vaccination VALUES ("'.$lot.'", "'.$ohip.'", "'.$site.'","'.$date.'","'.$time.'")';

    $result=$connection->exec($query);

    if ($result == true){
        echo "<h2>New Vaccine Record Created Successfully</h2>";
        echo "<p>Below is the new created vaccine record information: </p>";
        echo "<table>";
        echo "<tr>
              <th>Lot Number</th>
              <th>OHIP</th>
              <th>Clinic</th>
              <th>Vaccine Date</th>
              <th>Vaccine Time</th>
              </tr>";
        echo "<tr><td>".$lot."</td><td>".$ohip."</td><td>".$site."</td><td>".$date."</td><td>".$time."</td></tr>";
        echo "</table>";
        echo "<br>";

        echo "<h2>Updated patient: ".$ohip." vaccine records:</h2>";
        $query1='SELECT * FROM Vaccination WHERE POhip="'.$ohip.'"';
        $result1 = $connection->query($query1);
        echo "<table>";
            echo "<tr>
                  <th>Lot Number</th>
                  <th>Vaccine Clinic</th>
                  <th>Vaccine Date</th>
                  <th>Vaccine Time</th>
                  </tr>";
        while ($row1 = $result1->fetch()){
            echo "<tr><td>".$row1["Lot"]."</td><td>".$row1["VName"]."</td><td>".$row1["Date"]."</td><td>".$row1["Time"]."</td></tr>";
            
        }
        echo "</table>";
    }
    else{
        echo "<h2>Sorry, fail to create new record</h2>";
    }
?>
    <br>

</body>

</html>