<?php

for ($i = 0; $i <= 50; $i++) {
    echo $i . " ";
}
echo "<br><br>";

$namen = array("naam1", "naam2", "naam3", "naam4", "naam5", "naam6", "naam7", "naam8", "naam9", "naam10");
foreach ($namen as $naam) {
    echo $naam . "<br>";
}
echo "<br>";

$maanden = ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'];
for ($i = 0; $i < count($maanden); $i++) {
    echo 'Maand ' . ($i + 1) . ' is ' . $maanden[$i] . '.<br />';
}
echo "<br>";
?>
