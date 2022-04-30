<?php
session_start();
require_once('connection.php');
$id = $_SESSION["id"];
$axejdid = $_POST['elemvl'];
$axe = $_POST['elemph'];

if(!empty($axe)){
	if(!empty($axejdid)){
	/*RENAME*/
	$sql ="ALTER TABLE pr$id CHANGE $axe $axejdid float NULL DEFAULT NULL";
	$result = mysqli_query($conn, $sql);
}
else if(empty($axejdid)){
	/*DELETE*/
	$sql = "ALTER TABLE pr$id DROP $axe";
	$result = mysqli_query($conn, $sql);
}
}
else if(empty($axe)){
	/*ADD*/
	$sql = "ALTER TABLE pr$id ADD $axejdid float";
	$result = mysqli_query($conn, $sql);

}
header("location:profile.php?msg=done");
exit();

if ($result) {
    echo 1;
} else {
    echo 0;
}
?>