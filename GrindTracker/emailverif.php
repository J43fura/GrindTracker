<?php 
session_start();
require_once('connection.php');
if (!isset($_SESSION["username"])){
	header("location:index.php");
  }
$username = $_SESSION["username"];
$emailverif = filter_input(INPUT_POST, 'emailverif');

$sql = "SELECT code_auth FROM register WHERE username = '$username'";
$result = mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$code_auth = $value["code_auth"];
if ($code_auth == $emailverif){
	$sql = "UPDATE register SET code_auth = NULL WHERE username = '$username'";
	$conn->query($sql);
	unset($_SESSION["username"]);
	header("location:profile.php");
}
else{
	header("location:index.php?msg=veriferr");
}

?>