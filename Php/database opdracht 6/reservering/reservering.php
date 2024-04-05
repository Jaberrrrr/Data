<?php
include '../db.php';
   

 
 
 class Reservering{
    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;

    }
    public function addReservering($naam, $tijd, $datum)
    {
        return $this->dbh->execute("INSERT INTO reservering (naam, tijd, datum)
        VALUES (?,?,?)",
        [$naam, $tijd, $datum]);
    }
}
 
?>