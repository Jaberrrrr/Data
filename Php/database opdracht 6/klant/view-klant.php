<?php
include '../db.php';
include 'klant.php';

$klant = new Klant($myDb);
$result = $klant->getAllCustomers();

echo "<h2>Klanten</h2>";
echo "<table border='1'>";
echo "<tr><th>Naam</th><th>Email</th><th>Wachtwoord</th></tr>";

foreach ($result as $row) {
    echo "<tr><td>".$row['naam']."</td><td>".$row['email']."</td><td>".$row['password']."</td></tr>";
}

echo "</table>";
?>
