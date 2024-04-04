<?php
include '../db.php';

class klant {
    private $dbh;

    public function __construct (DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function addreservering($afdeling)
    {
        return $this->dbh->execute("INSERT into reservering (afdeling)
        VALUES (?)",
        [$afdeling]);
    }
}
?>