<?php

include('connect.php');
global $mysqli;
global $Oddzialy;
$result = mysqli_query($mysqli,$Oddzialy);
$json_array = array();
while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
}
$json_array = array('data'=>$json_array);
echo json_encode($json_array);