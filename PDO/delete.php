<?php
include('selectfunctie.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();

    $id = $_POST["id"];

    $result = $db->deleteData($id);

    echo $result;
}
?>
