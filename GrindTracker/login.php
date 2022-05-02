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
            
            $sql = "SELECT code_auth FROM register WHERE username = '$username'";
            $result = mysqli_query($conn,$sql);
            $value = mysqli_fetch_assoc($result);
            $code_auth = $value["code_auth"];
            if ($code_auth == NULL){
                $_SESSION["id"] = $id;
                try{
                    unset($_SESSION["username"]);}
                catch(e){

                }
                header("location:profile.php");
            }
            else{
                $_SESSION["username"] = $username;
                header("location:index.php?msg=emailverif");
            }



            exit();
        }
}


//echo "<script>document.getElementById('msg1').innerHTML = '⛔ The username or password is incorrect.'; </script>";
header("location:index.php?msg=incorrect");
    $conn->close();
}
else{
    header("location:index.php");
    //header("location:index.html/<script>document.getElementById('error').innerHTML = 'The username or password is incorrect.'; </script>");
}

?>