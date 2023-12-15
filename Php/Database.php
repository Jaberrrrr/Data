<?php
class Database {
    private $host = "localhost:3306";
    private $user = "root";
    private $password = "Jaber_2006";
    private $database = "fc";
    public $pdo;

    public function __construct($database = "fc", $host = "localhost", $user = "root", $password = "Jaber_2006") {
        try {
            $this->pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Fout bij verbinden met de database:" . $e->getMessage();
        }
    }

    public function registerUser($username, $email, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Error registering user: " . $e->getMessage();
        }
    }
}
?>
