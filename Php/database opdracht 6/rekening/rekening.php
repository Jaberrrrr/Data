<!DOCTYPE html>
<html lang="en">
<head>
    <?php
   
     include '../db.php';
    class Rekening{
        private $dbh;
 
        public function __construct(DB $dbh)
        {
            $this->dbh = $dbh;
 
        }
        public function addRekening($naam, $tafelnummer, $totaal_bedrag)
        {
            return $this->dbh->execute("INSERT INTO rekening(naam, tafelnummer, totaal_bedrag)
            VALUES (?,?,?)",
            [$naam, $tafelnummer, $totaal_bedrag]);
        }
    }
   
    ?>
 
</head>
 
</html>