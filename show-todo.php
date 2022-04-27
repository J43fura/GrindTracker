<?php 

session_start();
require_once('connection.php');
$id = $_SESSION["id"];


$sql = "SELECT * from pr$id ORDER BY idd DESC";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)> 0){
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        
            <li class="todo-item"> 
                <?php echo $row['TODO'];?>
                <div class="break" style="flex-basis: 100%;height: 0;"></div>

                <small class="small" >added on :<?php echo $row['TODOADDED'];?></small>

                <div class="break" style="flex-basis: 100%;height: 0;"></div>
                
                <small class="small" >for :<?php echo $row['PrDate'];?></small>
                <i id="removeBtn" class="icon fa fa-trash" data-id="<?php echo $row['idd'];?>"></i>
                
            </li>
        
        <?php
    }
}


 
?>