<?php
include('connect.php');
global $mysqli;

$output = '';
$Dzial = $mysqli -> real_escape_string($_POST['Dzial']);

if($_POST["id"] != '')
{
$query = "
UPDATE dzialy
SET Dzial='$Dzial'
WHERE id='".$_POST["id"]."'";
$message = 'Zedytowano';
}
else
{
$query = "
INSERT INTO dzialy (Dzial)
VALUES ('$Dzial');
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
