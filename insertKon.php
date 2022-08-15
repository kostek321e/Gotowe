<?php

include('connect.php');
global $mysqli;

$output = '';
$Imie = $mysqli -> real_escape_string($_POST['Imie']);
$Nazwisko = $mysqli -> real_escape_string($_POST['Nazwisko']);
$Firma = $mysqli -> real_escape_string($_POST['Firma']);
$Oddzial = $mysqli -> real_escape_string($_POST['Oddzial']);
$Dzial = $mysqli -> real_escape_string($_POST['Dzial']);
$Stanowisko = $mysqli -> real_escape_string($_POST['Stanowisko']);
$numerStacjonarny = $mysqli -> real_escape_string($_POST['numerStacjonarny']);
$numerKomorkowy = $mysqli -> real_escape_string($_POST['numerKomorkowy']);
$adresEmail = $mysqli -> real_escape_string($_POST['adresEmail']);


if($_POST["id"] != '')
{
$query = "
UPDATE glowna
SET Imie='$Imie',
Nazwisko='$Nazwisko',
Firma='$Firma',
Oddzial='$Oddzial',
Dzial='$Dzial',
Stanowisko='$Stanowisko',
numerStacjonarny='$numerStacjonarny',
numerKomorkowy='$numerKomorkowy',
adresEmail='$adresEmail'
WHERE id='".$_POST["id"]."'";
$message = 'Zedytowano';
}
else
{
$query = "
INSERT INTO glowna (Imie,Nazwisko,Firma,Oddzial,Dzial,Stanowisko,numerStacjonarny,numerKomorkowy,adresEmail)
VALUES ('$Imie', '$Nazwisko', '$Firma', '$Oddzial', '$Dzial', '$Stanowisko', '$numerStacjonarny', '$numerKomorkowy', '$adresEmail');
";
$message = 'Dodano!';
}


if(mysqli_query($mysqli,$query))
{
    $output .= '<label class="test-success">' . $message . '</label>';
}
else
{
    $message .= 'no nie Wyszło';
    $output .= '<label class="test-success">' . $message . '</label>';
}
echo $output;
