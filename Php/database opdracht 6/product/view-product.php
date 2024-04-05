<?php
include '../db.php';
include 'product.php';

$product = new Product($myDb);
$result = $product->getAllProducts();

echo "<h2>Producten</h2>";
echo "<table border='1'>";
echo "<tr><th>Naam</th><th>Omschrijving</th><th>Prijs</th></tr>";

foreach ($result as $row) {
    echo "<tr><td>".$row['naam']."</td><td>".$row['omschrijving']."</td><td>".$row['prijs']."</td></tr>";
}

echo "</table>";
?>
