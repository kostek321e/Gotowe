<?php
include ('connect.php');
include ('TabelaDzialy.php');
global $mysqli;


$dzial_id = $_POST['id'];
$sql = "DELETE FROM dzialy WHERE id='$dzial_id'";
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