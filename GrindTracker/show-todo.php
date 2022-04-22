<?php 

include 'connection.php';


$sql = "SELECT * from todo ";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)> 0){
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="todo">
            <li class="todo-item"> 
                <?php echo $row['title'];?>
            </li>
        </div>
        <?php
    }
}


 
?>