<?php
include ('connect.php');
global $mysqli;
$id = $_POST['id'];
$Imie = $_POST['Imie'];
$Nazwisko = $_POST['Nazwisko'];
$Firma = $_POST['Firma'];
$Oddzial = $_POST['Oddzial'];
$Dzial = $_POST['Dzial'];
$Stanowisko = $_POST['Stanowisko'];
$numerStacjonarny = $_POST['numerStacjonarny'];
$numerKomorkowy = $_POST['numerKomorkowy'];
$adresEmail = $_POST['adresEmail'];

$sql = "UPDATE 'glowna' SET 'Imie'='$Imie', 'Nazwisko'='$Nazwisko', 'Firma'='$Firma', 'Oddzial'='$Oddzial', 'Dzial'='$Dzial$', 'Stanowisko'='$Stanowisko', 'numerStacjonarny'='$numerStacjonarny$', 'numerKomorkowy'='$numerKomorkowy$', 'adresEmail'='$adresEmail' WHERE id='$id'";
$query = mysqli_query($mysqli,$sql);
$lastId = mysqli_insert_id($mysqli);
if($query ==true) {
$data = array(
  'status'=>'true'
);
echo json_encode($data);

}
else{
    $data = array(
        'status'=>'false',
    );
    echo json_encode($data);
}