<?php

class DB {
    private $dbh;


    public function __construct($db, $host = "localhost:3307", $user = "root", $pass = "") {
        try {
            $this->dbh = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }


    public function crud($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt;
    }
}


$myDb = new DB('dbName');


$query = "INSERT INTO your_table (column1, column2) VALUES (?, ?)";
$params = ['value1', 'value2'];
$result = $myDb->crud($query, $params);


$query = "SELECT * FROM your_table";
$result = $myDb->crud($query);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

$query = "UPDATE your_table SET column1 = ? WHERE id = ?";
$params = ['updated_value', 1];
$result = $myDb->crud($query, $params);

$query = "DELETE FROM your_table WHERE id = ?";
$params = [1];
$result = $myDb->crud($query, $params);
?>
