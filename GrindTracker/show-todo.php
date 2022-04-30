<?php 

session_start();
require_once('connection.php');
$id = $_SESSION["id"];
$v = $_POST["filtertodovalue"];



    if ($v=="all"){
        $sql = "SELECT * from pr$id WHERE TODO IS NOT NULL ORDER BY PrDate";
    }
    else if ($v == "completed"){
        $sql = "SELECT * from pr$id WHERE TODO IS NOT NULL AND Completed IS TRUE ORDER BY PrDate";
    }
    else if ($v == "uncompleted"){
        $sql = "SELECT * from pr$id WHERE TODO IS NOT NULL AND Completed IS FALSE ORDER BY PrDate";

    }

    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        ?>
            <li> 
                <?php if ($row['Completed'] == TRUE){?>
                <input disabled type ="text" value="<?php echo $row['TODO']?> ";></input>
                <?php }
            else{ ?>
                <input readonly type ="text" value="<?php echo $row['TODO']?>";></input>
                <button id="Complete" class="button BtnS" onclick="Verify()" title="Complete <?php echo $row['TODO'] ?>">✔️</button>
            <?php } ?>
            
            <button id="DeleteCompleted" class="button BtnS" onclick="DELETEvar(this)" title="Delete <?php echo $row['TODO'] ?>">❌</button>
            <small  id="CompleteTime" class="dark-t" placeholder="<?php echo $row['PrDate']?>">&nbsp&nbsp due to: <?php echo $row['PrDate']?>.</small>
            <smaller id="CreatedTime" class="dark-t" placeholder="<?php echo $row['TODOADDED']?>">created: <?php echo $row['TODOADDED']?>.</smaller>
            </li>

        <?php

    }

    



 
?>