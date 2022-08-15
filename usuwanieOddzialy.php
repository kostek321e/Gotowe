<?php
include ('connect.php');
include ('TabelaOddzialy.php');
global $mysqli;


$oddzial_id = $_POST['id'];
$sql = "DELETE FROM oddzialy WHERE id='$oddzial_id'";
$delQuery = mysqli_query($mysqli,$sql);
if($delQuery==true)
{
    $data = array(
        'status'=>'success',
    );
    echo json_encode($data);
}
else
{
    $data = array(
        'status'=>'failed',
    );
    echo json_encode($data);
}
?>