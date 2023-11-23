<?php

class Database {
    public $pdo;
 
    public function __construct($db ="fc", $host = "localhost", $user = "root", $pass= "Jaber_2006") {
    try {
    $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
     }
    }
}
$db = new Database();

?>