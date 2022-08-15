<?php

include('connect.php');
global $mysqli;

 if(isset($_POST["id"]))
 {

$query = "SELECT * FROM stanowiska WHERE id = '".$_POST["id"]."'";
$result = mysqli_query($mysqli,$query);
$row = mysqli_fetch_array($result);
echo json_encode($row);


}