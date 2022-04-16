<?php
require_once('connection.php');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$gender = filter_input(INPUT_POST, 'gender');
if (!empty($username) && !empty($password) && !empty($gender)){
	$sql = "SELECT * FROM register WHERE username ='$username'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	if($num==1){
		include 'index.php';
		echo "<script>document.getElementById('msg2').innerHTML = '⛔ The username is already used.';
		document.getElementById('popup-1').classList.toggle('active');
		 </script>";
	}
	else{
		$password = password_hash($password,PASSWORD_DEFAULT);
		$sql = "INSERT INTO register(username, password, gender) values ('$username','$password','$gender')";
	if ($conn->query($sql)){
		include 'index.php';
		echo "<script>document.getElementById('msg1').innerHTML = 'Your account has been created.'; </script>";
	}
	else{
		echo "Error: ". $sql ."". $conn->error;
	}
	$conn->close();
	}
}
else{
	header("location:index.php");
}

?>