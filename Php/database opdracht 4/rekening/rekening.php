<?php
include '../db.php';

class klant {
    private $dbh;

    public function __construct (DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function addrekening($naam)
    {
        return $this->dbh->execute("INSERT into rekening (naam)
        VALUES (?)",
        [$naam]);
    }
}
?>