<?php 

session_start();
require_once('connection.php');
$id1 = $_SESSION["id"];
$id =$_POST['id']






$sql="DELETE FROM pr$id1 WHERE idd='$id'";


$result = mysqli_query($conn, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}
?>

