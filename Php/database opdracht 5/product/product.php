<?php
include '../db.php';
   

 
 
 class Product{
    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;

    }
    public function addProduct($naam, $omschrijving, $prijs)
    {
        return $this->dbh->execute("INSERT INTO Product (naam, omschrijving, prijs)
        VALUES (?,?,?)",
        [$naam, $omschrijving, $prijs]);
    }
}
 
?>