<?php 
session_start();
require_once('connection.php');
$id = $_SESSION["id"];
$task = $_POST['task'];
$timecalendar = $_POST['timecalendar'];



if (!isset($_POST['delete'])){
    $sql="INSERT INTO pr$id (TODO,PrDate,Completed) values('$task','$timecalendar',FALSE)";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 1;
    } else {
        echo 0;
    }}

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

