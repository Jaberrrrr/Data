<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "Jaber_2006";
    private $database = "fc";

    public $pdo;
    
    public function __construct($database = "fc", $host = "localhost", $user = "root", $password = "Jaber_2006") {
        try {
            $this->pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected";
        } catch (PDOException $e) {
            echo "Fout bij verbinden met de database:" . $e->getMessage();
        }
    }

    public function DataToevoegen($naam, $leeftijd, $email) {
        try {
            $sql = "INSERT INTO opdracht2 (naam, leeftijd, email) VALUES (:naam, :leeftijd, :email)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
            $stmt->bindParam(':leeftijd', $leeftijd, PDO::PARAM_INT);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            $stmt->execute();

            echo "Data is  toegevoegd";
        } catch (PDOException $e) {
            echo "Fout bij toevoegen van data: " . $e->getMessage();
        }
    }
}

$db = new Database();

?>