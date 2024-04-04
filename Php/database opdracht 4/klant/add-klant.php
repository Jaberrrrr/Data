<?php
    include '../header.php';
    include 'klant.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $klant = new Klant($myDb);
            $klant->addKlant($_POST['naam']);
            echo "succesfully added";
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
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="naam">
        <input type="submit">
</form>
</body>
</html>