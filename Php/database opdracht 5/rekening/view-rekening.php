<?php
include '../db.php';
include 'rekening.php';

$rekening = new Rekening($myDb);
$result = $rekening->getAllInvoices();

echo "<h2>Rekeningen</h2>";
echo "<table border='1'>";
echo "<tr><th>Naam</th><th>Tafelnummer</th><th>Totaal Bedrag</th></tr>";

foreach ($result as $row) {
    echo "<tr><td>".$row['naam']."</td><td>".$row['tafelnummer']."</td><td>".$row['totaal_bedrag']."</td></tr>";
}

echo "</table>";
?>
