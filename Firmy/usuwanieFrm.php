<?php
include ('connect.php');
include ('TabelaFirm.php');
global $mysqli;


$user_id = $_POST['id'];
$sql = "DELETE FROM glowna WHERE id='$user_id'";
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