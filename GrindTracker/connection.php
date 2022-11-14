<?php
	// Connect to your Data base here.
	$conn = new mysqli ("localhost","root","admin","grindtracker","3307");
	if (mysqli_connect_error()){
		die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
	} 
?>