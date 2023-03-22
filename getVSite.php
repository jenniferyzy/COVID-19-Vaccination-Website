<?php
$result = $connection->query("select * from Vax_Clinic");
echo "<ol>";
while ($row = $result->fetch()) {
	echo "<li>";
    echo $row["VName"];
    echo $row["VName"]."</li>";
}
echo "</ol>";
?>