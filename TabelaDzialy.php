<?php

include('connect.php');
global $mysqli;
global $dzialy;
$result = mysqli_query($mysqli,$dzialy);
$json_array = array();
while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
}
$json_array = array('data'=>$json_array);
echo json_encode($json_array);

$number_filter_row = mysqli_num_rows(mysqli_query($mysqli,$dzialy));