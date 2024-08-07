<?php
session_start();
require_once('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "Addons/PHPMailer/PHPmailer.php";
require_once "Addons/PHPMailer/SMTP.php";
require_once "Addons/PHPMailer/Exception.php";

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$gender = filter_input(INPUT_POST, 'gender');
$email = filter_input(INPUT_POST, 'email');
$passwordC = filter_input(INPUT_POST, 'passwordC');


if (!empty($username) && !empty($password) && !empty($gender)){
	$sql = "SELECT * FROM register WHERE username ='$username'";
	$result = $conn->query($sql);
	$num = mysqli_num_rows($result);
	if($num==1){
		header("location:index.php?msg=usedusername");
		exit();
		}
	else{

		$specialChars = preg_match('@[^\w]@', $username);
		if ($specialChars){
			header("location:index.php?msg=charusername");
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
		$code_auth = rand(100000,999999);
		$sql = "INSERT INTO register(username, password, email, gender, code_auth) values ('$username','$password','$email','$gender', $code_auth)";

	if ($conn->query($sql)){
		$sql = "SELECT id FROM register WHERE username = '$username'";
		$result = $conn->query($sql);
		$value = mysqli_fetch_assoc($result);
		$id = $value["id"];
		$sql = "CREATE TABLE pr$id (PrDate DATE,TODOADDED TIMESTAMP DEFAULT CURRENT_TIMESTAMP, TODO varchar(124), Completed boolean)";
		$conn->query($sql);

		$mailerUsername = "<Email>";
		$mailerPassword = "<Password>";

		$mail = new PHPMailer();
		
		//STMP Settings
		$mail->SMTPDebug = 3;                               
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth   = true;  
		//Put your Mailer here:
		$mail->Username = $mailerUsername;
		$mail->Password = $mailerPassword;
		$mail->SMTPSecure = "tls";
		$mail->Port = 587;
			
		//Email Settings
		$mail->setFrom($mailerUsername,"GrindTracker");
		$mail->addAddress("$email","$username");
		
		$mail->isHTML(true);
		$mail->Subject = "GrindTracker Account Verification";
		$mail->Body = "Your GrindTracker verification code is:
			<h3 style='color: #db0a40; display: inline-block'>$code_auth</h3>";
		if($mail->send()){
			$_SESSION["username"] = $username;
			header("location:index.php?msg=emailverif");
		}
		else{
			echo "ERROR email was not sent.";
		}
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