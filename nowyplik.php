<?php

include('connect.php');
include ('function.php');
global $mysqli;
global $glowna;
global $kontakty;
//$output = array();
//
//$totalQuery = mysqli_query($mysqli,$kontakty);
//$total_all_rows = mysqli_num_rows($totalQuery);
//
//$query = mysqli_query($mysqli,$kontakty);
//$count_rows = mysqli_num_rows($query);
//$data = array();
//while($row = mysqli_fetch_assoc($query))
//{
//    $sub_array = array();
//    $sub_array[] = $row['id'];
//    $sub_array[] = $row['Imie'];
//    $sub_array[] = $row['Naziwsko'];
//    $sub_array[] = $row['Firma'];
//    $sub_array[] = $row['Oddzial'];
//    $sub_array[] = $row['Dzial'];
//    $sub_array[] = $row['Stanowisko'];
//    $sub_array[] = $row['numerStacjonarny'];
//    $sub_array[] = $row['numerKomorkowy'];
//    $sub_array[] = $row['adresEmail'];
//    $sub_array[] = '<a href="javascript:void();"data-id"'.$row['id'].'" class=btn btn-warning btn-sm editbtn">Edytuj</a> <a href="javascript:void();"data-id="'.$row['id'].'" class="btn btn-danger btn-sm deleteBtn" >Usuń</a>';
//}
//
//$output = array(
//  'draw'=> intval($_POST['draw']),
//  'recordsTotal' =>$count_rows,
//  'recordsFiltered' => $total_all_rows,
//  'data' => $data,
//
//
//);
//
//echo json_encode($output);

$result = mysqli_query($mysqli,$glowna);
$json_array = array();

while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
}
$json_array = array('data'=>$json_array);
echo json_encode($json_array);

$number_filter_row = mysqli_num_rows(mysqli_query($mysqli,$glowna));















