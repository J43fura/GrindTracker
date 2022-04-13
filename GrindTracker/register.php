<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$gender = filter_input(INPUT_POST, 'gender');
if (!empty($username)){
	if (!empty($password)){
		if (!empty($gender)){

			// Create connection
			$conn = new mysqli ("localhost","root","admin","grindtracker","3307");
			if (mysqli_connect_error()){
				die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
			}

			else{

				$sql = "SELECT * FROM register WHERE username ='$username'";
				$result = mysqli_query($conn,$sql);
				$num = mysqli_num_rows($result);

				if($num==1){
					echo "Username already taken.";
				}
				else{
					$sql = "INSERT INTO register(username, password, gender) values ('$username','$password','$gender')";
					if ($conn->query($sql)){
					echo "New record is inserted sucessfully";
					}
					else{
						echo "Error: ". $sql ."". $conn->error;
					}
					$conn->close();
				}
					

			}
		}
	}
}

?>