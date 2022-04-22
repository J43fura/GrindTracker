<?php 

session_start();
require_once('connection.php');
$id = $_SESSION["id"];


$sql = "SELECT TODO from pr$id ";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)> 0){
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="todo">
            <li class="todo-item"> 
            <?php echo $row['TODO'];?>
            </li>
        </div>
        <?php
    }
}


 
?>