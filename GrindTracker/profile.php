<?php 
  session_start();
if (!isset($_SESSION["id"])){
  header("location:index.php");
  exit();
}
require_once('connection.php');
$id = (int)$_SESSION["id"];

$calDate = isset($_GET['timecalendar']) ? $_GET['timecalendar'] : '';
$calCheck = DateTime::createFromFormat('Y-m-d', $calDate);
$todayStr = $calCheck ? $calDate : date('Y-m-d');

$sql = "SELECT username FROM register WHERE id = '$id'";
$result = $conn->query($sql);
$value = mysqli_fetch_assoc($result);
$username = $value["username"];
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="shortcut icon" type="image/x-icon" href="Images/favicon.ico" />
    <script src="profile.js" defer></script>
    <script src="loader.js" defer></script>
    <script src="Addons/jquery-3.6.0.js"></script>
    <script src="Addons/chart.js"></script>
    <script src="Addons/chartjs-adapter-date-fns.bundle.min.js"></script>
    <title weight="normal">GrindTracker 🔺| Profile</title>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=0.6" />
    <meta
      name="description"
      content="GrindTracker is a tool that let you keep track of your progress and
    visualise them to better grind your way up reaching your desired
    goals."
    />
  </head>
  <body>
  

  <div class="loader1" id="loader"></div>
  <div class="loader" id="loader"></div>
    
    <header id="RAS" class="main-header dark-h">
      <nav class="nav main-nav">
        <ul>
          <li><a class="nav-elements" href="summary.php">Summary</a></li>
          <li><a style="cursor: pointer;" class="nav-elements" id = "logout" >Logout</a></li>
          <script>
            var logoutBut = document.querySelector("#logout");
            logoutBut.addEventListener("click", () => {
            if(confirm("Do you really want to logout?")){
              window.location.href = "logout.php";
            }
          });
          </script>
          <li>
            <label class="switch">
              <input type="checkbox" id="darkmode" />
              <span class="slider"></span>
            </label>
          </li>
        </ul>
      </nav>
      <h1 class="TitleGT TitleGT1 TitleGT1-d">GrindTracker</h1>
      <h4 class="TitleGT TitleGT1 TitleGT1-d" style="font-size:4em; background-color: rgba(22, 22, 22,0.03);">Hello, <?=$username?></h4>
    </header>
    
    <div class="vars">
      <ul class="listing">

      <?php
      //Charge vars:
      require_once('connection.php');
      $id = (int)$_SESSION["id"];
      $sql = "SHOW COLUMNS FROM pr$id WHERE field != 'PrDate' AND  field != 'TODO' AND field != 'TODOADDED' AND field != 'Completed'";
      $result = $conn->query($sql);
      $today = $todayStr;
      $prefill = [];
      $rowToday = $conn->query("SELECT * FROM `pr$id` WHERE PrDate = '$today' LIMIT 1");
      if ($rowToday) $prefill = ($rowToday->fetch_assoc() ?: []);
      if (mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_assoc($result)){
          $f = $row['Field'];
          $saved = isset($prefill[$f]) && $prefill[$f] !== null ? htmlspecialchars($prefill[$f]) : '';
          ?>
          <li>
              <input type="number" placeholder="<?php echo $row['Field'] ?>" title="<?php echo $row['Field'] ?>" id="<?php echo $row['Field'] ?>" name="<?php echo $row['Field'] ?>" value="<?= $saved ?>" />
              <button class="button BtnS" onclick="GRAPHvar(this)" title="Graph of <?php echo $row['Field'] ?>">📈</button>
          </li>
      <?php
        }
      }
      else{
        echo ("
        <h2 class='section-header dark-t'>Empty.</h2>
      ");
      }
    ?>

      </ul>
      <button id="Settings" class="button BtnS" onclick="DisplaySettings()">
        ⚙️
      </button>
      <button id="Verify" class="button BtnS" onclick="Verify()">✔️</button>
    </div>

    <div class="vars Settings">
      <ul id="listing" class="listing">
      <?php
      //Charge varssettings:
      require_once('connection.php');
      $id = (int)$_SESSION["id"];


      $sql = "SHOW COLUMNS FROM pr$id WHERE field != 'PrDate' AND  field != 'TODO' AND field != 'TODOADDED' AND field != 'Completed'";
      $result = $conn->query($sql);
      if (mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_assoc($result)){
          ?>
          <li>
                <input type="text" placeholder="<?php echo $row['Field'] ?>" title="<?php echo $row['Field'] ?>"  id="<?php echo $row['Field'] ?>" name="<?php echo $row['Field'] ?>" />
                <button class="button BtnS" onclick="DELETEvar(this)" title="Delete <?php echo $row['Field'] ?>">❌</button>
              </li>
      <?php
        }
      }
      ?>

        <li id="ADD1button">
          <button class="button BtnS" onclick="ADDvar()">➕</button>
        </li>
      </ul>
      <button id="Settings" class="button BtnS" onclick="DisplaySettings()">
        ⚙️
      </button>
      <button id="Verify" class="button BtnS" onclick="Verify()">✔️</button>
    </div>

    <div class="calendar">
      <input type="date" value="<?= $todayStr ?>" id="calendar" name="calendar" required />
      <i id="timenow"></i>
    </div>

    <?php
      $varCols = [];
      $cols = $conn->query("SHOW COLUMNS FROM pr$id");
      if ($cols){
        while($c = $cols->fetch_assoc()){
          if (in_array($c['Field'], ['PrDate','TODO','TODOADDED','Completed'])) continue;
          $varCols[] = $c['Field'];
        }
      }
      $todayVars = 0;
      if ($varCols){
        $row = $conn->query("SELECT * FROM pr$id WHERE PrDate = '$todayStr' LIMIT 1")->fetch_assoc();
        if ($row){
          foreach ($varCols as $col){
            if (isset($row[$col]) && $row[$col] !== null) $todayVars++;
          }
        }
      }
      $todos = $conn->query("SELECT COUNT(*) AS c FROM pr$id WHERE PrDate = '$todayStr' AND TODO IS NOT NULL")->fetch_assoc();
      $done = $conn->query("SELECT COUNT(*) AS c FROM pr$id WHERE PrDate = '$todayStr' AND Completed = TRUE")->fetch_assoc();
      $todayTodos = (int)$todos["c"];
      $todayDone = (int)$done["c"];
    ?>
    <div class="today-digest">
      <span><?= htmlspecialchars($todayStr) ?> · <?= $todayVars ?> variable<?= $todayVars != 1 ? 's' : '' ?> logged</span>
      <span><?= $todayTodos ?> todo<?= $todayTodos != 1 ? 's' : '' ?></span>
      <span><?= $todayDone ?> completed</span>
    </div>
    <div class="todo-div">
      <header class="todo-head">
        <h2 class="section-header dark-t">TODO:</h2>
      </header>

      <form class="todo-form">
        <div id="todoinput" class="listing">
        <input type="text" id="taskvalue" class="todo-input" required/>
          <button id="addbtn" class="todo-button button BtnS" type="submit">➕</button>
        </div>

        <div class="select">
          <select name="todos" class="filter-todo">
            <option value="uncompleted">Uncompleted</option>
            <option value="completed">Completed</option>
            <option value="all">All</option>
            
          </select>
        </div>
      </form>


      <ul id="tasks" class="listing">
      </ul>

    </div>

    <footer class="main-footer">
      <div class="container main-footer-container">
        <h3 class="TitleGT TitleGT2">GrindTracker</h3>
        <a href="#RAS" id="RASF">🔺</a>
      </div>
    </footer>
    <script>
     $(document).ready(function(){
  //Show tasks
  loadTasks();
  //Add task
  $("#addbtn").on("click",function(e){
    e.preventDefault();
    const todoInput = document.querySelector(".todo-input");
    if (todoInput.value.length>124){
      alert("TODO max length is 124 characters.");
      return;
    }
    const timecalendar = document.getElementById("calendar").value;
    const task = $("#taskvalue").val();
    if (task !== ""){
     $.ajax({
      url: "varstodo.php",
      type :"POST",
      data :{task: task,timecalendar: timecalendar},
      success: function(data){
        if (data == 1) {
          loadTasks();
          todoInput.value = "";
        }
        else if (data == 2){
          alert("TODO's are made for the future. (change time).");
        }
        else if (data == 3){
          alert("You cant add the same name of a task more than once a day. (but you can numerate each one.)");
        }
      }
    });
  }});
    //Confirm task
    $(document).on("click","#Complete",function(e){
    e.preventDefault();
    const task = this.parentElement.querySelector("textarea").getAttribute("value");
    if(confirm("Do you want to complete " + task)){
    const timecalendar = this.parentElement.querySelector(".complete-time").getAttribute("placeholder");
    $.ajax({
      url:"varstodo.php",
      type:"POST",
      data:{task: task,timecalendar: timecalendar, delete:"FALSE"},
      success: function(data){
        if(data==0){
          alert("something went wrong");
        }
      }
    })      
    loadTasks();
            
}
    
  });
    //Remove task
    $(document).on("click","#DeleteCompleted",function(e){
    e.preventDefault();
    const task = this.parentElement.querySelector("textarea").getAttribute("value");
    if(confirm("Do you want to delete " + task)){
    const timecalendar = this.parentElement.querySelector(".complete-time").getAttribute("placeholder");
    $.ajax({
      url:"varstodo.php",
      type:"POST",
      data:{task: task,timecalendar: timecalendar, delete:"TRUE"},
      success: function(data){
        if(data==0){
          alert("something went wrong");
        }
      }
    })}
    else{
      loadTasks();

    }
    
  });

});

    </script>
  <script src="darkmode.js" defer></script>
  </body>
</html>
