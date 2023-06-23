<?php
session_start();

if(isset($_SESSION['naam']) && isset($_SESSION['email'])) {
    $naam = $_SESSION['naam'];
    $email = $_SESSION['email'];

    echo "<h1>Opgeslagen variabelen</h1>";
    echo "<p>Naam: $naam</p>";
    echo "<p>E-mail: $email</p>";
} else {
    echo "<h1>Nog Geen opgeslagen variabelen gevonden</h1>";
}
?>
