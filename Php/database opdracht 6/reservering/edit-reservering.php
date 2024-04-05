<?php
include '../db.php';
include 'reservering.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $reservering = new Reservering($myDb);
        $reservering->updateReservering($_POST['naam'], $_POST['tijd'], $_POST['datum'], $_POST['reservering_id']);
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
    <title>Edit Reservering</title>
</head>
<body>
    <h2>Edit Reservering</h2>
    <form method="POST">
        <input type="hidden" name="reservering_id" value="<?php echo $_GET['id']; ?>">
        <label for="naam">Naam:</label><br>
        <input type="text" id="naam" name="naam" required><br>
        <label for="tijd">Tijd:</label><br>
        <input type="time" id="tijd" name="tijd" required><br>
        <label for="datum">Datum:</label><br>
        <input type="date" id="datum" name="datum" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
