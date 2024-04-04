<?php
    include '../header.php';
    include 'product.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $klant = new Klant($myDb);
            $klant->addKlant($_POST['afdeling']);
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
    <h1>product add</h1>
    <form method="POST">
        <input type="text" name="afdeling">
        <input type="submit">
</form>
</body>
</html>