<!doctype html>
<head>
  <meta charset="utf-8">
  <title>Patient Exist</title>
  <link href="./css/covid.css" type="text/css" rel="stylesheet">
</head>

<body>
<a href="./covid.php">Return Homepage</a><br>
    <?php
    include 'connect_CovidDB.php';
    ?>

<h2>Add New Patient</h2>

<p>Please enter patient's information before entering vaccination</p>

<form action="addNewPatient.php" method="post">
<div class="text">
<p>OHIP:  <input type="text" name="new_ohip"> </p>
<p>First Name: <input type="text" name="p_fname"> </p>
<p>Last Name: <input type="text" name="p_lname"> </p>
<p>Date of Birth: <input type="date" id="date" name="dob"> </p>
</div>
<input type="submit" value="submit patient information">
</form> 


</body>
</html>
