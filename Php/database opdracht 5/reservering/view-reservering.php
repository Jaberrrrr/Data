<?php
include '../db.php';
include 'reservering.php';

$reservering = new Reservering($myDb);
$result = $reservering->getAllReservations();

echo "<h2>Reserveringen</h2>";
echo "<table border='1'>";
echo "<tr><th>Naam</th><th>Tijd</th><th>Datum</th></tr>";

foreach ($result as $row) {
    echo "<tr><td>".$row['naam']."</td><td>".$row['tijd']."</td><td>".$row['datum']."</td></tr>";
}

echo "</table>";
?>
