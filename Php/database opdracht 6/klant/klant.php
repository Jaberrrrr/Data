<?php
include '../db.php';
   

 
 
 class Klant{
    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;

    }
    public function addKlant($naam, $email, $password)
    {
        return $this->dbh->execute("INSERT INTO klant (naam, email, password)
        VALUES (?,?,?)",
        [$naam, $email, $password]);
    }
}
 
?>