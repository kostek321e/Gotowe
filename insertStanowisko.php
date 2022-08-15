
<?php
include('connect.php');
global $mysqli;

$output = '';
$Stanowisko = $mysqli -> real_escape_string($_POST['Stanowisko']);

if($_POST["id"] != '')
{
$query = "
UPDATE stanowiska
SET Stanowisko='$Stanowisko'
WHERE id='".$_POST["id"]."'";
$message = 'Zedytowano';
}
else
{
$query = "
INSERT INTO stanowiska (Stanowisko)
VALUES ('$Stanowisko');
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