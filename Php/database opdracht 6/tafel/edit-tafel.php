<?php
include '../db.php';
include 'tafel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $tafel = new Tafel($myDb);
        $tafel->updateTafel($_POST['tafelnummer'], $_POST['bijzonderheden'], $_POST['max_persoon'], $_POST['tafel_id']);
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
    <title>Edit Tafel</title>
</head>
<body>
    <h2>Edit Tafel</h2>
    <form method="POST">
        <input type="hidden" name="tafel_id" value="<?php echo $_GET['id']; ?>">
        <label for="tafelnummer">Tafelnummer:</label><br>
        <input type="text" id="tafelnummer" name="tafelnummer" required><br>
        <label for="bijzonderheden">Bijzonderheden:</label><br>
        <input type="text" id="bijzonderheden" name="bijzonderheden"><br>
        <label for="max_persoon">Max Persoon:</label><br>
        <input type="text" id="max_persoon" name="max_persoon" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
