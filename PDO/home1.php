<?php
include('db.php');

$database = new Database();

$database->DataToevoegen('John Doe', 25, 'john.doe@live.nl');
?>
