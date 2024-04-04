<?php
include '../db.php';

class klant {
    private $dbh;

    public function __construct (DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function addKlant($naam)
    {
        return $this->dbh->execute("INSERT into klant (naam)
        VALUES (?)",
        [$naam]);
    }
}
?>