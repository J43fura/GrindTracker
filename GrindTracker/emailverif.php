<?php 
session_start();
require_once('connection.php');
if (!isset($_SESSION["username"])){
	header("location:index.php");
  }
$username = $_SESSION["username"];
$emailverif = filter_input(INPUT_POST, 'emailverif');

$sql = "SELECT code_auth FROM register WHERE username = '$username'";
$result = $conn->query($sql);
$value = mysqli_fetch_assoc($result);
$code_auth = $value["code_auth"];
if ($code_auth == $emailverif){
	$sql = "UPDATE register SET code_auth = NULL WHERE username = '$username'";
	$conn->query($sql);
	
	$sql = "SELECT id FROM register WHERE username = '$username'";
	$result = $conn->query($sql);
	$value = mysqli_fetch_assoc($result);
	$id = $value["id"];
	$_SESSION["id"] = $id;
	
	unset($_SESSION["username"]);
	header("location:profile.php");
}
else{
	unset($_SESSION["username"]);
	header("location:index.php?msg=verification_error");
}

?>