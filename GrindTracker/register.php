<?php 
&session_start
$con = mysqli_connect('localhost','root','');
mysqli_select_db(&con,'grindtracker')


$username = $_POST['username'];
$password = $_POST['password'];
if (!empty($username) ||!empty($username)){
$host="localhost";
&dbUsername="root";
&dbPassword="";
&dbname="grindtracker";

&con = new msqli($host,$dbUsername,$dbPassword,$dbname);

if(mysqli_connect_error()){
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else{
	$SELECT = "SELECT username From register Where username = ? Limit 1 "
	&INSERT = "INSERT Into register (username, password) values(?, ?)"

	//Prepare statement
	
	$stmt = $conn->prepare($Select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->bind_result($username);
	$stmt->store_result();
	$stmt->fetch();
	$rnum = $stmt->num_rows;

	if ($rnum == 0) {
		$stmt->close();
		$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("ss",$username, $password);
		if ($stmt->execute()) {
			echo "New record inserted sucessfully.";
		}
		else {
			echo $stmt->error;
		}
	}
	else {
		echo "Someone already registers using this username.";
	}
	$stmt->close();
	$conn->close();
}
}
else {
echo "All field are required.";
die();
}
else {
echo "Submit button is not set";
}
?>