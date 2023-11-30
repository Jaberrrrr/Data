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
    }

    $db = new Database();
    

    $data = $db->selectData();
    printTable($data);

    $dataById = $db->selectData(1);
    printTable($dataById);

    function printTable($data) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Naam</th><th>Leeftijd</th><th>Email</th></tr>";
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['naam']}</td>";
            echo "<td>{$row['leeftijd']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
                