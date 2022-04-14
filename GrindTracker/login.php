<?php
session_start();
require_once('connection.php');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if (!empty($username) && !empty($password) ){
	$sql = "SELECT * FROM register WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	if($num==1){
		header("location:profile.html");
	}
	else{
		include 'index.html';
		echo "<script>document.getElementById('msg1').innerHTML = '⛔ The username or password is incorrect.'; </script>";
		//b fazt el link %--= %  %
		$conn->close();
	}					
}
else{
	header("location:index.html");
	//header("location:index.html/<script>document.getElementById('error').innerHTML = 'The username or password is incorrect.'; </script>");
}

?>