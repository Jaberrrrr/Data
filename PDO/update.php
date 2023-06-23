<?php

$host = 'localhost:3307';
$db   = 'winkell';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productNaam = $_POST['product_naam'];
    $prijsPerStuk = $_POST['prijs_per_stuk'];
    $omschrijving = $_POST['omschrijving'];
    $query = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)";
    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':product_naam', $productNaam);
        $stmt->bindParam(':prijs_per_stuk', $prijsPerStuk);
        $stmt->bindParam(':omschrijving', $omschrijving);
        $stmt->execute();
    } catch (PDOException $e) { $e->getMessage();
    }
}

if (isset($tweedeProductNaam)) {
    echo "<h2>Tweede product:</h2>";
    echo "<p>Productnaam: $tweedeProductNaam</p>";
    echo "<p>Prijs per stuk: $tweedePrijsPerStuk</p>";
    echo "<p>Omschrijving: $tweedeOmschrijving</p>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Productformulier</title>
</head>
<body>
    <form method="post" action="">
        <label for="product_naam">Productnaam:</label>
        <input type="text" id="product_naam" name="product_naam" required><br><br>
        <label for="prijs_per_stuk">Prijs per stuk:</label>
        <input type="number" id="prijs_per_stuk" name="prijs_per_stuk" required><br><br>
        <label for="omschrijving">Omschrijving:</label><br>
        <textarea id="omschrijving" name="omschrijving" required></textarea><br><br>
        <input type="submit" value="Verzenden">
    </form>
</body>
</html>
