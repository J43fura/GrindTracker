<!--Session-->
<?php 
  session_start();
if (!isset($_SESSION["username"])){

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
              <input type="checkbox" id="checkbox" />
              <span class="slider"></span>
            </label>
          </li>
        </ul>
      </nav>
      <!--<hr /> -->
      <h1 class="TitleGT TitleGT1 TitleGT1-d">GrindTracker</h1>
    </header>


    <!--load php maghyr refresh lel page; ajax?-->
    <div class="vars">
      <ul class="listing">

      <?php
      //charge vars:
      require_once('connection.php');
      $username = $_SESSION["username"];

      $sql = "SELECT id FROM register WHERE username = '$username'";
      $result = mysqli_query($conn,$sql);
      $value = mysqli_fetch_assoc($result);
      $id = $value["id"];

      //$sql="SELECT column_name from information_schema.columns where table_name = 'pr$id' and table_schema='grindtracker' and column_name != 'PrDate' and column_name != 'TODO'";
      $sql = "SHOW COLUMNS FROM pr$id WHERE field != 'PrDate' AND  field != 'TODO'";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_assoc($result)){
          ?>
          <li>
                <input type="number" placeholder="<?php echo $row['Field'] ?>" id="<?php echo $row['Field'] ?>" name="<?php echo $row['Field'] ?>" />
                <button class="button BtnS" onclick="GRAPHvar(this)">📈</button>
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
        //select vars t7awwwelhom vars settings tnajjem
      require_once('connection.php');
      $username = $_SESSION["username"];

      $sql = "SELECT id FROM register WHERE username = '$username'";
      $result = mysqli_query($conn,$sql);
      $value = mysqli_fetch_assoc($result);
      $id = $value["id"];

      //$sql = "SHOW COLUMNS FROM pr$id WHERE field != 'PrDate' AND  field != 'TODO'";
      $sql="SELECT column_name from information_schema.columns where table_name = 'pr$id' and table_schema='grindtracker' and column_name != 'PrDate' and column_name != 'TODO'";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_assoc($result)){
          ?>
          <li>
                <input type="text" placeholder="<?php echo $row['column_name'] ?>" id="<?php echo $row['column_name'] ?>" name="<?php echo $row['column_name'] ?>" />
                <button class="button BtnS" onclick="DELETEvar(this)">❌</button>
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

    <div id="divGraph"></div>






    <div class="todo-div">
      <!--https://youtu.be/Ttf3CEsEwMQ-->

      <header class="todo-head">
        <h2 class="section-header dark-t">TODO:</h2>
      </header>

      <form class="todo-form">
        <div class="listing">
          <input type="text" class="todo-input" />
          <button class="todo-button button BtnS" type="submit">➕</button>
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
        <ul class="todo-list"></ul>
      </div>
    </div>

    <footer class="main-footer">
      <div class="container main-footer-container">
        <!--<hr />-->
        <h3 class="TitleGT TitleGT2">GrindTracker</h3>
        <a href="#RAS" id="RASF">🔺</a>
      </div>
    </footer>
  </body>
</html>
