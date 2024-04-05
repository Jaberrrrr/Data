<?php
include '../db.php';

 
 class Tafel{
    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;

    }
    public function addTafel($tafelnummer, $bijzonderheden, $max_persoon)
    {
        return $this->dbh->execute("INSERT INTO tafel (tafelnummer, bijzonderheden, max_persoon)
        VALUES (?,?,?)",
        [$tafelnummer, $bijzonderheden, $max_persoon]);
    }
}
 
?>