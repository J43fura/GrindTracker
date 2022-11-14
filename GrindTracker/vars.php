<?php
//vars:

session_start();
require_once('connection.php');
$id = $_SESSION["id"];
$axe = $_POST['elemph'];
$elemvl = $_POST['elemvl'];
$timecalendar = $_POST['timecalendar'];

$sql="SELECT $axe FROM pr$id WHERE PrDate= '$timecalendar'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if($num==0)
    $sql = "INSERT INTO pr$id ($axe,PrDate) VALUES ($elemvl,'$timecalendar')";
else{
    $sql="UPDATE pr$id SET $axe = $elemvl where PrDate= '$timecalendar'";
}

$result = mysqli_query($conn, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>