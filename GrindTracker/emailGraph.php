<?php
session_start();

require_once('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "Adds/PHPMailer/PHPmailer.php";
require_once "Adds/PHPMailer/SMTP.php";
require_once "Adds/PHPMailer/Exception.php";


$id = $_SESSION["id"];
$axe = $_POST['axe'];
$img = $_POST['img'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);	
$data = base64_decode($img);


$sql = "SELECT * FROM register WHERE id = '$id'";

$result = mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$username = $value["username"];

$result = mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$email = $value["email"];



$mail = new PHPMailer();
		
//STMP Settings
$mail->SMTPDebug = 3;                               
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth   = true;  
//Put your Mailer here:
$mail->Username = "<Email>";
$mail->Password = "<Password>";
$mail->SMTPSecure = "tls";
$mail->Port = 587;

$sql = "SELECT * FROM register WHERE id = '$id'";

//Email Settings
$mail->setFrom("aatrouss.mailing@gmail.com","GrindTracker");
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