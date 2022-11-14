<?php
session_start();

require_once('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "Adds/PHPMailer/PHPmailer.php";
require_once "Adds/PHPMailer/SMTP.php";
require_once "Adds/PHPMailer/Exception.php";


$id = $_SESSION["id"];
$doc = $_POST['doc'];

$data = trim( str_replace( 'data:application/pdf;base64,', '', $doc ) );
$data = str_replace( ' ', '+', $data );
$decoded_pdf = base64_decode( $data );

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
$mail->Subject = "GrindTracker Summary";
$mail->Body = "Attached file is your Summary.";
$mail->addStringAttachment($decoded_pdf, "GrindTracker Summary $username.pdf");
if($mail->send()){
}
else{
	echo "ERROR email was not sent.";
}
?>