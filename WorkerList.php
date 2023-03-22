<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Vaccination Staff</title>
<link href="./css/covid.css" type="text/css" rel="stylesheet">
</head>

<body>
<a href="./covid.php">Return Homepage</a>
<?php
include 'connect_CovidDB.php';

    echo "<h2>The Current Health Workers in ".$_POST["site_name"]."</h2>"; 

    $site= $_POST["site_name"];

    $query = 'SELECT DOC_FName, DOC_LName FROM Doctor INNER JOIN Doc_Work_At ON Doctor.DID=Doc_Work_At.DID AND Doc_Work_At.VName="' . $site . '"';
    $result=$connection->query($query);
    if ($result->rowCount() > 0){
        echo "<h3>The list of dorctor(s):</h3>";
        echo "<table>
              <tr>
              <th>First Name</th>
              <th>Last Name</th>
              </tr>";

        while ($row=$result->fetch()) {
            echo "<tr><td>".$row["DOC_FName"]."</td><td>".$row["DOC_LName"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>Sorry, no available doctor information in this clinic currently. </h3>";
    }
    ?>

    <?php
    $site= $_POST["site_name"];
    $query = 'SELECT Nurse_FName, Nurse_LName FROM Nurse INNER JOIN Nurse_Work_At ON Nurse.NID=Nurse_Work_At.NID AND Nurse_Work_At.VName="' . $site . '"';
    $result=$connection->query($query);
    if ($result->rowCount() > 0) {
        echo "<h3>The list of nurse(s):</h3>";
        echo "<table>
              <tr>
              <th>First Name</th>
              <th>Last Name</th>
              </tr>";
        while ($row=$result->fetch()) {
            echo "<tr><td>".$row["Nurse_FName"]."</td><td>".$row["Nurse_LName"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>Sorry, no available nurse information in this clinic currently. </h3>";
    }
    $connection = NULL;
    ?>
</body>
</html>