<?php
include '../db.php';
include 'rekening.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $rekening = new Rekening($myDb);
        $rekening->updateRekening($_POST['naam'], $_POST['tafelnummer'], $_POST['totaal_bedrag'], $_POST['rekening_id']);
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
    <title>Edit Rekening</title>
</head>
<body>
    <h2>Edit Rekening</h2>
    <form method="POST">
        <input type="hidden" name="rekening_id" value="<?php echo $_GET['id']; ?>">
        <label for="naam">Naam:</label><br>
        <input type="text" id="naam" name="naam" required><br>
        <label for="tafelnummer">Tafelnummer:</label><br>
        <input type="number" id="tafelnummer" name="tafelnummer" required><br>
        <label for="totaal_bedrag">Totaal Bedrag:</label><br>
        <input type="text" id="totaal_bedrag" name="totaal_bedrag" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
