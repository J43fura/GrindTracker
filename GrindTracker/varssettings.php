<?php
session_start();
require_once('connection.php');
$username = $_SESSION["username"];

$sql = "SELECT id FROM register WHERE username = '$username'";
$result = mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);

$id = $value["id"];


$axejdid = $_POST['elemvl'];
$axe = $_POST['elemph'];

if(!empty($axe)){
	if(!empty($axejdid)){
	/*RENAME*/
	$sql ="ALTER TABLE pr$id CHANGE $axe $axejdid INT(7) NULL DEFAULT NULL";
	$result = mysqli_query($conn, $sql);
}
else if(empty($axejdid)){
	$sql = "ALTER TABLE pr$id DROP $axe";
	$result = mysqli_query($conn, $sql);

}
}
else if(empty($axe)){
	/*ADD*/
	$sql = "ALTER TABLE pr$id ADD $axejdid int(7)";
	$result = mysqli_query($conn, $sql);

}

if ($result) {
    echo 1;
} else {
    echo 0;
}

//header("location:profile.php?msg=done");
exit();

?>