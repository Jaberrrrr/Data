<?php
class Database {
    private $host = "localhost:3306";
    private $user = "root";
    private $password = "Jaber_2006";
    private $database = "fc";
    public function __construct($database = "fc", $host = "localhost", $user = "root", $password = "Jaber_2006") {
        try {
            $this->pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected";
        } catch (PDOException $e) {
            echo "Fout bij verbinden met de database:" . $e->getMessage();
        }
    }

    public function selectData($id = null) {
        try {
            $sql = "SELECT * FROM opdracht2";

            if ($id !== null) {
                $sql = "SELECT * FROM opdracht2 WHERE id = :id";
            }

            $stmt = $this->pdo->prepare($sql);

            if ($id !== null) {
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            }

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            echo "Fout bij selecteren van data: " . $e->getMessage();
        }
    }

    public function updateData($id, $naam, $leeftijd, $email) {
        try {
            $query = "UPDATE opdracht2 SET naam = :naam, leeftijd = :leeftijd, Email = :email WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
            $stmt->bindParam(':leeftijd', $leeftijd, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            echo "Data is geupdate";
 
            header("update.php");
            exit();
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
        }
    }
    public function deleteData($id) {
        try {
            $sql = "DELETE FROM opdracht2 WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Fout bij verwijderen van data: " . $e->getMessage();
        }
    }
}

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit'])) {
        header("Location: update.php?id={$_POST['id']}");
        exit();
    } elseif (isset($_POST['delete'])) {
        $db->deleteData($_POST['id']);
        header("Location: index.php");
        exit();
    }
}

$data = $db->selectData();
printTable($data);

function printTable($data) {
    echo "<form method='post'>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Naam</th><th>Leeftijd</th><th>Email</th><th>Acties</th></tr>";
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['naam']}</td>";
        echo "<td>{$row['leeftijd']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>
            <input type='hidden' name='id' value='{$row['id']}'>
            <button type='submit' name='edit'>Edit</button>
            <button type='submit' name='delete'>Delete</button>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
}
?>          