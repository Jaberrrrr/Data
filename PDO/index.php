<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "winkell";

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Selecteer alle gegevens uit de tabel producten
$sql = "SELECT * FROM producten ORDER BY product_code";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Producten</title>
</head>
<body>
    <h1>Producten</h1>
    <table>
        <tr>
            <th>Product Code</th>
            <th>Product Naam</th>
            <th>Prijs per Stuk</th>
            <th>Omschrijving</th>
            <th>Actie</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["product_code"] . "</td>";
                echo "<td>" . $row["product_naam"] . "</td>";
                echo "<td>" . $row["prijs_per_stuk"] . "</td>";
                echo "<td>" . $row["omschrijving"] . "</td>";
                echo "<td><a href='delete.php?product_code=" . $row["product_code"] . "'>Verwijderen</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Geen producten gevonden</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Sluit de databaseverbinding
$conn->close();
?>
