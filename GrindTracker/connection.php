<?php
	// Connect to your Data base here.
	$conn = new mysqli ("localhost","root","","grindtracker");
	if (mysqli_connect_error()){
		die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
	} 
?>