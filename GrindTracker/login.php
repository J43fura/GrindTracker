<?php
session_start();

require_once('connection.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if (!empty($username) && !empty($password) ){

    $sql = "SELECT password FROM register WHERE username='$username'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    if($num==1){
        $value = mysqli_fetch_assoc($result);
        $value = $value["password"];

        if(password_verify($password,$value)){
            $sql = "SELECT id FROM register WHERE username = '$username'";
            $result = mysqli_query($conn,$sql);
            $value = mysqli_fetch_assoc($result);
            $id = $value["id"];
            
            $_SESSION["id"] = $id;
            header("location:profile.php");

            exit();
        }
}

header("location:index.php?msg=incorrect");

    //b fazt el link %--= %  %
    $conn->close();
}
else{
    header("location:index.php");
    //header("location:index.html/<script>document.getElementById('error').innerHTML = 'The username or password is incorrect.'; </script>");
}

?>