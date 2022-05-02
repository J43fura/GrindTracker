// Send image
  document.getElementById('SendGraph').addEventListener("click", function(e) {
    var canvas = document.querySelector('#myChart');
    var dataURL = canvas.toDataURL("image/jpeg", 1.0);
    downloadImage(dataURL, 'Chart <?= $axe ?>.jpeg');
});

  // Save Send | Download image
  function downloadImage(data, filename = 'untitled.jpeg') {
    var a = document.createElement('a');
    a.href = data;
    a.download = filename;
    document.body.appendChild(a);
    a.click();

    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once "Adds/PHPMailer/PHPmailer.php";
    require_once "Adds/PHPMailer/SMTP.php";
    require_once "Adds/PHPMailer/Exception.php";

		$mail = new PHPMailer();
		
		//STMP Settings
		$mail->SMTPDebug = 3;                               
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth   = true;  
		$mail->Username = "aatrouss.mailing@gmail.com";
		$mail->Password = "yylvtgbvgwcbloax";
		$mail->SMTPSecure = "tls"; //ssl
		$mail->Port = 587;  //465; 
		
		$sql = "SELECT * FROM register WHERE username = '$username'";
		$result = mysqli_query($conn,$sql);
		$value = mysqli_fetch_assoc($result);
		$email = $value["email"];
		$username = $value["username"];

		//Email Settings
		$mail->setFrom("aatrouss.mailing@gmail.com","GrindTracker");
		$mail->addAddress("$email","$username");
		
		$mail->isHTML(true);
		$mail->Subject = "GrindTracker Graph: $axe ";
    $mail->AddEmbeddedImage( ts, "my-attach");
    $mail->Body = 'Here is your $axe graph: <img src="cid:my-attach"> Here is an image!';
		if($mail->send()){
      echo "Email was sent.";
			//header("Email was sent.");
		}
		else{
			echo "ERROR email was not sent.";
		}

?>
}