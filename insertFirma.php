<?php
include('connect.php');
global $mysqli;

$output = '';
$Firma = $mysqli -> real_escape_string($_POST['Firma']);

if($_POST["id"] != '')
{
$query = "
UPDATE firmy
SET Firma='$Firma'
WHERE id='".$_POST["id"]."'";
$message = 'Zedytowano';
}
else
{
$query = "
INSERT INTO firmy (Firma)
VALUES ('$Firma');
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
