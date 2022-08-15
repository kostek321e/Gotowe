<?php
include ('connect.php');
include ('TabelaFirm.php');
global $mysqli;


$firm_id = $_POST['id'];
$sql = "DELETE FROM firmy WHERE id='$firm_id'";
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