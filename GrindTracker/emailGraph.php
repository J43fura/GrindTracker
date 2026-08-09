<?php
session_start();

require_once('connection.php');
if (!isset($_SESSION["id"])){
	exit();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "Addons/PHPMailer/PHPMailer.php";
require_once "Addons/PHPMailer/SMTP.php";
require_once "Addons/PHPMailer/Exception.php";


$id = (int)$_SESSION["id"];
$axe = $_POST['axe'];
$img = $_POST['img'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
if (strlen($img) > 12500000){
	echo "ERROR email was not sent.";
	exit();
}
$data = base64_decode($img);


$sql = "SELECT * FROM register WHERE id = '$id'";

$result = $conn->query($sql);
$value = mysqli_fetch_assoc($result);
$username = $value["username"];
$email = $value["email"];

$mailerUsername = "<Email>";
$mailerPassword = "<Password>";

$mail = new PHPMailer();
		
//STMP Settings
$mail->SMTPDebug = 0;                               
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
$mail->Subject = "GrindTracker $axe's Graph";
$mail->Body = "Attached file is your $axe's Graph.";
$mail->addStringAttachment($data, "Graph $axe.jpeg");
if($mail->send()){
}
else{
	echo "ERROR email was not sent.";
}
?>