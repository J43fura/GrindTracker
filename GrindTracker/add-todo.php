<?php 

session_start();
require_once('connection.php');
$id = $_SESSION["id"];



$task = $_POST['task'];
$timecalendar = $_POST['timecalendar'];



$sql="INSERT INTO pr$id (TODO,PrDate) values('$task','$timecalendar')";


$result = mysqli_query($conn, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}
?>

