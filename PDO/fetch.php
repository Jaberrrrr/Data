<?php 

$host = 'localhost:3307';
$db   = 'winkel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
     $pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

echo "Alle producten<br><";
     $stmt = $pdo->query("select * from producten");
     while ($row = $stmt->fetch()) {
          echo "productnaam " . $row['product_naam']."<br>";
          echo "prijs per stuk " . $row['prijs_per_stuk']."<br>";
          echo "omschrijving " . $row['omschrijving']."<br><br>";
     }

     $productCode = 1;
     echo "productcode 1 <br>";
     $stmt = $pdo->prepare("select * from producten where product_code=?");
     $stmt->execute([$productCode]);

     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "productnaam " . $row['product_naam'] . "<br>";
          echo "prijs per stuk " . $row['prijs_per_stuk'] . "<br>";
          echo "omschrijving " . $row['omschrijving'] . "<br><br>";
     }

     $productCode = 2;
     echo "Productcode 2 <br>";
     $stmt = $pdo->prepare("select * from producten where product_code = :product_code");
     $stmt->bindParam(':product_code', $productCode);
     $stmt->execute();

     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "productnaam " . $row['product_naam'] . "<br>";
          echo "prijs per stuk " . $row['prijs_per_stuk'] . "<br>";
          echo "omschrijving " . $row['omschrijving'] . "<br><br>";
     }

?>