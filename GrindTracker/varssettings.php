<?php
session_start();
require_once('connection.php');
if (!isset($_SESSION["id"])){
	echo 0;
	exit();
}
$id = (int)$_SESSION["id"];
$axejdid = isset($_POST['elemvl']) ? $_POST['elemvl'] : '';

function isValidVarName($name){
	return preg_match('/^[A-Za-z0-9_]+$/', $name) === 1;
}

if(isset($_POST['elemph']) && $_POST['elemph'] !== ''){
	$axe = $_POST['elemph'];
	/*RENAME*/
	if(!empty($axejdid) && $axejdid !== $axe){
		if(!isValidVarName($axejdid) || !isValidVarName($axe)){
			echo 4; //invalid characters
			exit();
		}
		$sql = "SHOW COLUMNS FROM pr$id WHERE field = '$axejdid'";
		$result = $conn->query($sql);
		if (mysqli_num_rows($result)>0){
			echo 2; //target name already exists
			exit();
		}
		$sql ="ALTER TABLE pr$id CHANGE `$axe` `$axejdid` float NULL DEFAULT NULL";
		$result = $conn->query($sql);
	}
	/*DELETE*/
	else if(empty($axejdid)){
		if(!isValidVarName($axe)){
			echo 4; // INVALID
			exit();
		}
		$sql = "ALTER TABLE pr$id DROP `$axe`";
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
	if(!isValidVarName($axejdid)){
		echo 4; // INVALID
		exit();
	}
	$sql = "SHOW COLUMNS FROM pr$id WHERE field = '$axejdid'";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result)==0){
		$sql = "ALTER TABLE pr$id ADD `$axejdid` float"; //SQL injection could be used. BEWARY.
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