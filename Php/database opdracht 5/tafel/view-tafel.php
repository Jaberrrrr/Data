<?php
include '../db.php';
include 'tafel.php';

$tafel = new Tafel($myDb);
$result = $tafel->getAllTables();

echo "<h2>Tafels</h2>";
echo "<table border='1'>";
echo "<tr><th>Tafelnummer</th><th>Bijzonderheden</th><th>Max Persoon</th></tr>";

foreach ($result as $row) {
    echo "<tr><td>".$row['tafelnummer']."</td><td>".$row['bijzonderheden']."</td><td>".$row['max_persoon']."</td></tr>";
}

echo "</table>";
?>
