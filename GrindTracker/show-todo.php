<?php 

session_start();
require_once('connection.php');
$id = $_SESSION["id"];
$v = $_POST["filtertodovalue"];

$sql = "SELECT * from pr$id WHERE TODO IS NOT NULL ORDER BY PrDate";
$result = mysqli_query($conn,$sql);

    if ($v=="all"){
        $sql = "SELECT * from pr$id WHERE TODO IS NOT NULL ORDER BY PrDate";
    }
    else if ($v == "completed"){
        $sql = "SELECT * from pr$id WHERE TODO IS NOT NULL ORDER BY PrDate AND Completed IS TRUE";
    }
    else if ($v == "uncompleted"){
        $sql = "SELECT * from pr$id WHERE TODO IS NOT NULL ORDER BY PrDate AND Completed IS FALSE";

    }

    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        ?>
            <li> 
            <input readonly type ="text" value="<?php echo $row['TODO']?>";></input>
            <button id="Complete" class="button BtnS" onclick="Verify()" title="Complete <?php echo $row['TODO'] ?>">✔️</button>
            <button id="DeleteCompleted"class="button BtnS" onclick="DELETEvar(this)" title="Delete <?php echo $row['TODO'] ?>">❌</button>
            <small class="dark-t">&nbsp&nbsp due to: <?php echo $row['PrDate']?>.</small>
            <smaller class="dark-t">created: <?php echo $row['TODOADDED']?>.</smaller>
            </li>
        <?php
    }



 
?>