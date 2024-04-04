<?php
include '../db.php';

class klant {
    private $dbh;

    public function __construct (DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function addtafel($afdeling)
    {
        return $this->dbh->execute("INSERT into tafel (naam)
        VALUES (?)",
        [$naam]);
    }
}
?>