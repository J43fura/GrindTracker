<?php
require_once('connection.php');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$gender = filter_input(INPUT_POST, 'gender');
$email = filter_input(INPUT_POST, 'email');
$passwordC = filter_input(INPUT_POST, 'passwordC');









if (!empty($username) && !empty($password) && !empty($gender)){
	$sql = "SELECT * FROM register WHERE username ='$username'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	if($num==1){
		header("location:index.php?msg=usedusername");
		exit(); /*SUS*/ 
		}
	else{

		$specialChars = preg_match('@[^\w]@', $username);
		if ($specialChars){
			header("location:index.php?msg=charusername"); //username cant have characters
			exit();
		}

		$number = preg_match('@[0-9]@', $password);
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase) {
			header("location:index.php?msg=pwc");
		 exit();
		}

		if ($passwordC != $password){
			header("location:index.php?msg=pww");
			exit();
		}
		



		
		$password = password_hash($password,PASSWORD_DEFAULT);
		$sql = "INSERT INTO register(username, password, email, gender) values ('$username','$password','$email','$gender')";
	if ($conn->query($sql)){

		$sql = "SELECT id FROM register WHERE username = '$username'";
		$result = mysqli_query($conn,$sql);
		$value = mysqli_fetch_assoc($result);
		$id = $value["id"];
		$sql = "CREATE TABLE pr$id (PrDate DATE,TODOADDED DATE DEFAULT CURRENT_TIMESTAMP, TODO varchar(124))";
		$conn->query($sql);
		

		header("location:index.php?msg=accountcreated");
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