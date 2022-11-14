<?php 
session_start();
require_once('connection.php');
$id = $_SESSION["id"];
$task = $_POST['task'];
$timecalendar = $_POST['timecalendar'];
date_default_timezone_set('UTC');
$timenow = date("Y-m-d");
if (!isset($_POST['delete'])){
    $sql = "SELECT * FROM pr$id WHERE TODO='$task' AND PrDate='$timecalendar'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	if($num >= 1){
		echo 3;
		exit(); 
		}
    
    if ($timecalendar >= $timenow){
    $sql="INSERT INTO pr$id (TODO,PrDate,Completed) values('$task','$timecalendar',FALSE)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
    }
    else{
        echo 2;
    }
    }

else if ($_POST['delete'] == "TRUE"){
    //delete
    $sql="DELETE FROM pr$id WHERE TODO='$task' AND PrDate='$timecalendar'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 1;
    } else {
        echo 0;
    }}

else if ($_POST['delete'] == "FALSE"){
    //complete
    $sql="UPDATE pr$id SET Completed = TRUE WHERE TODO='$task' AND PrDate='$timecalendar'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}

?>

