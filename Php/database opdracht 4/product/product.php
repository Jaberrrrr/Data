<?php
include '../db.php';

class product {
    private $dbh;

    public function __construct (DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function addproduct($naam)
    {
        return $this->dbh->execute("INSERT into product (naam)
        VALUES (?)",
        [$naam]);
    }
}
?>