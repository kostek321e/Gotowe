<?php
include('connect.php');
global $mysqli;

$output = '';
$Oddzial = $mysqli -> real_escape_string($_POST['Oddzial']);

if($_POST["id"] != '')
{
$query = "
UPDATE oddzialy
SET Oddzial='$Oddzial'
WHERE id='".$_POST["id"]."'";
$message = 'Zedytowano';
}
else
{
$query = "
INSERT INTO oddzialy (Oddzial)
VALUES ('$Oddzial');
";
$message = 'Dodano!';
}


if(mysqli_query($mysqli,$query))
{
    $output .= '<label class="test-success">' . $message . '</label>';
}
else
{
    $message .= 'no nie Wyszło';
    $output .= '<label class="test-success">' . $message . '</label>';
}
echo $output;
