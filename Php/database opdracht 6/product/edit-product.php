<?php
include '../db.php';
include 'product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $product = new Product($myDb);
        $product->updateProduct($_POST['naam'], $_POST['omschrijving'], $_POST['prijs'], $_POST['product_id']);
        echo "Successfully updated";
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form method="POST">
        <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
        <label for="naam">Naam:</label><br>
        <input type="text" id="naam" name="naam" required><br>
        <label for="omschrijving">Omschrijving:</label><br>
        <input type="text" id="omschrijving" name="omschrijving"><br>
        <label for="prijs">Prijs:</label><br>
        <input type="text" id="prijs" name="prijs" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
