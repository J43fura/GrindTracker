<?php 
require_once('connection.php');

$axe = filter_input(INPUT_POST, 'axe??text??elemvar[i]');
$username = filter_input(INPUT_POST, 'username????? GET? isset? isisetID wkhw 5ir toul?');

if (!empty($axe)){
	
	$sql = "SELECT id FROM register WHERE username = '$username'";
	$result = mysqli_query($conn,$sql);
	$value = mysqli_fetch_assoc($result);
	$id = $value["id"];

	try{
		//ken $axe deja mawjoud
	$sql = "SELECT $axe FROM pr$id";
	$result = mysqli_query($conn,$sql);
	header("location:profile.php?msg=axeexist");
	exit();

	}
	catch(e){
		$sql = "INSERT INTO pr$id ($axe, number(7))";
		$conn->query($sql);
		header("location:profile.php?msg=axeadded");
		exit();
	}
}
else{
	header("location:profile.php?msg=required");
	
}

?>