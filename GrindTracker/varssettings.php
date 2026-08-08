<?php
session_start();
require_once('connection.php');
$id = $_SESSION["id"];
$axejdid = isset($_POST['elemvl']) ? $_POST['elemvl'] : '';


if(isset($_POST['elemph']) && $_POST['elemph'] !== ''){
	$axe = $_POST['elemph'];
	if(!empty($axejdid) && $axejdid !== $axe){
		/*RENAME*/
		$sql = "SHOW COLUMNS FROM pr$id WHERE field = '$axejdid'";
		$result = $conn->query($sql);
		if (mysqli_num_rows($result)>0){
			echo 2; //target name already exists
			exit();
		}
		$sql ="ALTER TABLE pr$id CHANGE $axe $axejdid float NULL DEFAULT NULL";
		$result = $conn->query($sql);
	}
	else if(empty($axejdid)){
		/*DELETE*/
		$sql = "ALTER TABLE pr$id DROP $axe";
		$result = $conn->query($sql);
	}
	/*rename with same name: no-op, report success*/
	else{
		echo 1;
		exit();
	}
}
else{
	/*ADD*/
	$sql = "SHOW COLUMNS FROM pr$id WHERE field = '$axejdid'";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result)==0){
		$sql = "ALTER TABLE pr$id ADD $axejdid float"; //SQL injection could be used. BEWARY.
		$result = $conn->query($sql);
	}
	else{
		echo 2;
		exit();
	}
}


if ($result) {
    echo 1;
} else {
    echo 0;
}
?>