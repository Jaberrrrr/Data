<?php
require_once 'selectfunctie.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $naam = $_POST["naam"];
    $leeftijd = $_POST["leeftijd"];
    $email = $_POST["email"];

    
 
    $database = new Database();
    $database->updateData($id, $naam, $leeftijd, $email);
 
}
 
 
?>
 
<form method="post" action="update.php">
    <label for="id">ID:</label>
    <input type="text" name="id" required>
 
    <label for="naam">Nieuwe naam:</label>
    <input type="text" name="naam" required>

    <label for="leeftijd">Nieuwe Leeftijd:</label>
    <input type="number" name="leeftijd" required>
    
    <label for="email">Nieuwe email:</label>
    <input type="text" name="email" required>
 
    <input type="submit" value="Update">
</form>
 