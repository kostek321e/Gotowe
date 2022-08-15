<?php
include ('connect.php');
include ('TabelaStanowiska.php');
global $mysqli;


$stanowisko_id = $_POST['id'];
$sql = "DELETE FROM stanowiska WHERE id='$stanowisko_id'";
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