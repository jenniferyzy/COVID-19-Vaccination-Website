<!doctype html>
<head>
  <meta charset="utf-8">
  <title>Add Patient</title>
  <link href="./css/covid.css" type="text/css" rel="stylesheet">
</head>

<body>
<a href="./covid.php">Return Homepage</a>

<?php
include 'connect_CovidDB.php';
?>


<?php

    $ohip=$_POST["new_ohip"];
    $fname=$_POST["p_fname"];
    $lname=$_POST["p_lname"];
    $birth=$_POST["dob"];
    
    $query='INSERT INTO Patient VALUES ("'.$ohip.'","'.$fname.'","'.$lname.'","'.$birth.'")';
 
    $result=$connection->exec($query);

    if ($result == true){
        echo "<h2>New Patient Record Created Successfully</h2>";
        echo "<p>Below is the new created patient's record information: </p>";
        echo "<table>";
        echo "<tr>
              <th>OHIP</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Birth Date</th>
              </tr>";

        echo "<tr><td>".$ohip."</td><td>".$fname."</td><td>".$lname."</td><td>".$birth."</td></tr>";
        echo "</table>";
        echo "<br>";
        echo "<p>You can also choose to add more patients </p>";
        echo '<a href="./PatientNotExist.php">Add Patient</a>';
    }
    else{
        echo "<h2>Sorry, fail to create new patient</h2>";
    }
    $connection=NULL;
?>
</body>

</html>