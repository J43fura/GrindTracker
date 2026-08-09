<?php
//vars:

session_start();
require_once('connection.php');
if (!isset($_SESSION["id"])){
	echo 0;
	exit();
}
$id = (int)$_SESSION["id"];
$axe = mysqli_real_escape_string($conn, $_POST['elemph']);
$elemvl = mysqli_real_escape_string($conn, $_POST['elemvl']);
$timecalendar = mysqli_real_escape_string($conn, $_POST['timecalendar']);

$dateCheck = DateTime::createFromFormat('Y-m-d', $timecalendar);
if (preg_match('/^[A-Za-z0-9_]+$/', $axe) !== 1 || $elemvl === '' || !$dateCheck){
	echo 0;
	exit();
}

$sql="SELECT $axe FROM pr$id WHERE PrDate= '$timecalendar'";
$result = $conn->query($sql);
$num = mysqli_num_rows($result);

if($num==0)
    $sql = "INSERT INTO pr$id ($axe,PrDate) VALUES ($elemvl,'$timecalendar')";
else{
    $sql="UPDATE pr$id SET $axe = $elemvl where PrDate= '$timecalendar'";
}

$result = $conn->query($sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>