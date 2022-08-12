<?php

include("connect.php");
global $mysqli;
$id = $_POST['id'];
$sql = "SELECT * FROM oddzialy WHERE id='$id' LIMIT 1";
$query = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);