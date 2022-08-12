<?php
$dbServer = 'localhost';
$dbUser = 'root';
$dbPassword = '123456';
$dbName = 'praca';

$mysqli = new mysqli($dbServer,$dbUser,$dbPassword,$dbName);
$mysqli->set_charset("utf8");
if (mysqli_connect_errno()) {
    echo 'Błąd bazy danych';
}

$firmy = 'SELECT * FROM firmy ORDER BY id';
$Oddzialy = 'SELECT * FROM oddzialy ORDER BY id';
$dzialy = 'SELECT * FROM dzialy ORDER BY id';
$stanowiska = 'SELECT * FROM stanowiska ORDER BY id';
$glowna = 'SELECT * FROM glowna ORDER BY id';
$kontakty = 'SELECT * FROM glowna';

?>


