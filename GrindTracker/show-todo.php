<?php 
session_start();
require_once('connection.php');
if (!isset($_POST["filtertodovalue"])){
    header("location:index.php");
  }
$id = $_SESSION["id"];
$v = $_POST["filtertodovalue"];
date_default_timezone_set('UTC');
$timenow = date("Y-m-d");
$datenow=date_create($timenow);


    if ($v=="all"){
        $sql = "SELECT * from pr$id WHERE TODO IS NOT NULL ORDER BY PrDate";
    }
    else if ($v == "completed"){
        $sql = "SELECT * from pr$id WHERE TODO IS NOT NULL AND Completed IS TRUE ORDER BY PrDate";
    }
    else if ($v == "uncompleted"){
        $sql = "SELECT * from pr$id WHERE TODO IS NOT NULL AND Completed IS FALSE ORDER BY PrDate";

    }

    $result = $conn->query($sql);
    while($row = mysqli_fetch_assoc($result)) {
        $DueToDate=date_create($row['PrDate']);
        $interval = date_diff($datenow, $DueToDate);
        $intervalnum = $interval->format('%R%a');
        ?>
            <li> 
                <?php if ($row['Completed'] == TRUE){?>
                <textarea disabled type ="text" class="dark-t" value="<?php echo $row['TODO']?>";><?php echo $row['TODO']?></textarea>
                <?php }
            else{ ?>
                <textarea readonly type ="text" value="<?php echo $row['TODO']?>";><?php echo $row['TODO']?></textarea>
                <button id="Complete" class="button BtnS" onclick="Verify()" title="Complete <?php echo $row['TODO'] ?>">✔️</button>
            <?php } ?>
            
            <button id="DeleteCompleted" class="button BtnS" onclick="DELETEvar(this)" title="Delete <?php echo $row['TODO'] ?>">❌</button>


            <?php
            if ($intervalnum<0){
                ?>
            <small  id="CompleteTime" class="dark-t" placeholder="<?php echo $row['PrDate']?>" title="⚰️ due date is over, been <?= $intervalnum = $interval->format('%R%a');?> days.">&nbsp&nbsp due to: <?php echo $row['PrDate']?>. ⚰️</small>
            <?php }
            else if ($intervalnum==0){?> 
            <small  id="CompleteTime" class="dark-t" placeholder="<?php echo $row['PrDate']?>" title="🚨 due today!">&nbsp&nbsp due to: <?php echo $row['PrDate']?>. 🚨</small>
            <?php }
            else if ($intervalnum < 3){?> 
                <small  id="CompleteTime" class="dark-t" placeholder="<?php echo $row['PrDate']?>" title="⚠️ due to less than <?= $intervalnum = $interval->format('%R%a');?> days.">&nbsp&nbsp due to: <?php echo $row['PrDate']?>. ⚠️</small>
            <?php }
            else{?> 
                <small  id="CompleteTime" class="dark-t" placeholder="<?php echo $row['PrDate']?>" title="<?= $intervalnum = $interval->format('%R%a');?> days.">&nbsp&nbsp due to: <?php echo $row['PrDate']?>.</small>
            <?php }?>
            <smaller id="CreatedTime" class="dark-t" placeholder="<?php echo $row['TODOADDED']?>">created: <?php echo $row['TODOADDED']?>.</smaller>
            </li>

        <?php

    }
?>