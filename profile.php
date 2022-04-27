<?php 
  session_start();
if (!isset($_SESSION["id"])){
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <script src="script.js" defer></script>
    <script src="profile.js" defer></script>
    <script src="Adds/jquery-3.6.0.js"></script>
    <script src="Adds/chart.js"></script>
    <script src="Adds/chartjs-adapter-date-fns.bundle.min.js"></script>
    <title weight="normal">GrindTracker 🔺| Profile</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="GrindTracker is a tool that let you keep track of your progress and
    visualise them to better grind your way up reaching your desired
    goals."
    />
  </head>
  <body>
    <!--<div class="loader" id="loader"></div>-->
    <header id="RAS" class="main-header dark-h">
      <nav class="nav main-nav">
        <ul>
          <li><a class="nav-elements" href="#RAS">Home</a></li>
          <li><a class="nav-elements" href="logout.php">Logout</a></li>
          <li>
            <label class="switch">
              <input type="checkbox" id="darkmode" />
              <span class="slider"></span>
            </label>
          </li>
        </ul>
      </nav>
      <h1 class="TitleGT TitleGT1 TitleGT1-d">GrindTracker</h1>
    </header>


    <!--load php maghyr refresh lel page; ajax?-->
    <div class="vars">
      <ul class="listing">

      <?php
      //charge vars:
      require_once('connection.php');
      $id = $_SESSION["id"];

      $sql = "SHOW COLUMNS FROM pr$id WHERE field != 'PrDate' AND  field != 'TODO' AND field != 'TODOADDED'";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_assoc($result)){
          ?>
          <li>
                <input type="number" placeholder="<?php echo $row['Field'] ?>" title="<?php echo $row['Field'] ?>" id="<?php echo $row['Field'] ?>" name="<?php echo $row['Field'] ?>" />
                <button class="button BtnS" onclick="GRAPHvar(this)" title="Graph of <?php echo $row['Field'] ?>">📈</button>
              </li>
      <?php
        }
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
      //charge varssettings:
      require_once('connection.php');
      $id = $_SESSION["id"];


      $sql = "SHOW COLUMNS FROM pr$id WHERE field != 'PrDate' AND  field != 'TODO' AND field != 'TODOADDED'";
      $result = mysqli_query($conn,$sql);
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
      <input type="date" value="today" id="calendar" name="calendar" required />
      <!--http://jsfiddle.net/trixta/cc7Rt/-->
      <i id="timenow"></i>
    </div>
    <div class="todo-div">
      <!--https://youtu.be/Ttf3CEsEwMQ-->

      <header class="todo-head">
        <h2 class="section-header dark-t">TODO:</h2>
      </header>

      <form class="todo-form">
        <div class="listing">
          <input type="text" placeholder="Enter a task" id="taskvalue" class="todo-input" />
          <button id="addbtn" class="todo-button button BtnS" type="submit">➕</button>
        </div>

        <div class="select">
          <select name="todos" class="filter-todo">
            <option value="all ">All</option>
            <option value="completed">Completed</option>
            <option value="uncompleted">Uncompleted</option>
          </select>
        </div>
      </form>

      <div class="todo-container">
        <ul id="tasks" class="todo-list">
          
        </ul>
      </div>
    </div>

    <footer class="main-footer">
      <div class="container main-footer-container">
        <!--<hr />-->
        <h3 class="TitleGT TitleGT2">GrindTracker</h3>
        <a href="#RAS" id="RASF">🔺</a>
      </div>
    </footer>
    <script>
     $(document).ready(function(){
  //show tasks
  function loadTasks(){
    $.ajax({
    url: "show-todo.php",
    type :"POST",
    success: function(data){
      $("#tasks").html(data);
    }
  });
  }
  loadTasks();
  
  $("#addbtn").on("click",function(e){
    e.preventDefault();
    const todoInput = document.querySelector(".todo-input");
    const timecalendar = document.getElementById("calendar").value;
    var task = $("#taskvalue").val();
     $.ajax({
      url: "add-todo.php",
      type :"POST",
      data :{task: task,timecalendar: timecalendar,},
      success: function(data){
        if (data == 1) {
          loadTasks();
          todoInput.value = "";
          
        }
      }
    });

  });
  //remove task
  $(document).on("click","#removeBtn",function(e){
    e.preventDefault();
    var id = $(this).data('id');
    alert(id);
    $ajax({
      url:"remove-task.php",
      type:"POST",
      data:{id:id},
      success: function(data){
        if(data==0){
          alert("something went wrong");
        }
      }
    })
  });


});
    </script>
    <script src="darkmode.js" defer></script>
  </body>
</html>
