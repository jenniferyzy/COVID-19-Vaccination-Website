<!doctype html>
<head>
  <meta charset="utf-8">
  <title>Search Vaccine</title>
  <link href="./css/covid.css" type="text/css" rel="stylesheet">
</head>

<body>
<a href="./covid.php">Return Homepage</a>
<?php
include 'connect_CovidDB.php';
?>

<?php 
$ohip=$_POST["ohip"];
$query = 'SELECT Patient.POhip, PFName, PLName, Vaccination.Date, CName, Vaccination.Lot FROM (Vaccination INNER JOIN Vaccine ON Vaccination.Lot=Vaccine.Lot) INNER JOIN Patient ON Patient.POhip=Vaccination.POhip AND Patient.POhip="' . $ohip . '"';
$result=$connection->query($query);

if ($result->rowCount() > 0) {
    echo "<h2>Available vacciation status for the chosen patient:</h2>";
    echo "<table><tr>
        <th>OHIP</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Vaccine Type</th>
        <th>Lot Number</th>
        <th>Vaccination Date</th>
        </tr>";
    while ($row=$result->fetch()) {
	    echo "<tr><td>".$row["POhip"]."</td><td>".$row["PFName"]."</td><td>".$row["PLName"]."</td><td>".$row["CName"]."</td><td>".$row["Lot"]."</td><td>".$row["Date"]."</td></tr>";
       
        }
} else {
    echo "<h2>Sorry, this patient has not stored their vaccination record in the database yet</h2>";
}
?>
</table>

</body>

</html>

