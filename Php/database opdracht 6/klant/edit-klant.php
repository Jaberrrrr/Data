<?php
include '../db.php';
include 'klant.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $klant = new Klant($myDb);
        $klant->updateKlant($_POST['naam'], $_POST['email'], $_POST['password'], $_POST['klant_id']);
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
    <title>Edit Klant</title>
</head>
<body>
    <h2>Edit Klant</h2>
    <form method="POST">
        <input type="hidden" name="klant_id" value="<?php echo $_GET['id']; ?>">
        <label for="naam">Naam:</label><br>
        <input type="text" id="naam" name="naam" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
