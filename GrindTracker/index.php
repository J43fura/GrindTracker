<?php 
// double password; password compositions, email API, email reminder fel todo, BMI, toul fel register?; welcome 'username' message; 
//summary button tab3th el graphs lkol lel email ++tlinki vars mb3dhom yjiboulk graph we7ed b checkbox

// tincludeha marra f lheader lkol lezm dhhrli //Notice: session_start(): Ignoring session_start() because a session is already active in ????
 session_start();
if (isset($_SESSION["id"])){
  header("location:profile.php");
}
?>


<!DOCTYPE html>
<html>
  <head>
    <script src="Adds/jquery-3.6.0.js"></script>
    <script src="script.js" defer></script>
    <title weight="normal">GrindTracker 🔺</title>
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
  <div class="loader1" id="loader"></div>
  <div class="loader" id="loader"></div>
    <header id="RAS" class="main-header dark-h">
      <nav class="nav main-nav">
        <ul>
          <li><a class="nav-elements" href="#RAS">Home</a></li>
          <li><a class="nav-elements" href="#Login">Login</a></li>
          <li><a class="nav-elements" href="#About">About</a></li>
          <li>
            <label class="switch">
              <input type="checkbox" id="darkmode" />
              <span class="slider"></span>
            </label>
          </li>
        </ul>
      </nav>
      <!--<hr /> -->
      

      
      <h1 class="TitleGT TitleGT1 TitleGT1-d">GrindTracker</h1>
    </header>

    <section class="content-section container login" id="Login">
      <!--<hr /> -->
      <h2 class="section-header dark-t-w">LOGIN</h2>
      <form
        class="section-paragraph"
        id="myForm1"
        method="post"
        action="login.php"
      >
        <input type="text" id="username" name="username" placeholder="Username" required />
        <br />
        <input
          id="password"
          type="password"
          name="password"
          placeholder="Password"
          required
        />
        <div id="msg1"></div>
        <?php
            if (isset($_GET["msg"])){
              if ($_GET["msg"] == "incorrect"){
              echo "<script>document.getElementById('msg1').innerHTML = '⛔ The username or password is incorrect.'; </script>";
            }
            else if($_GET["msg"] == "accountcreated"){
              echo "<script>document.getElementById('msg1').innerHTML = 'Your account has been created.'; </script>";
            }}
              ?>
        <button class="button" role="submit" id="btnLogin">Log In</button>
        <button type="button" class="button signup" onclick="togglePopup()">
          Sign Up
        </button>
      </form>
    </section>

    <section class="content-section container login popup" id="popup-1">
      <button class="button btnx" onclick="togglePopup()">&times;</button>
      <h2 class="section-header dark-t-w">Sign Up</h2>
      <form
        class="section-paragraph"
        id="myForm2"
        method="post"
        action="register.php"
      >
        <input type="text" id="username" name="username" placeholder="Username" required />
        <div id="msg2"></div>

        <?php      
            if (isset($_GET["msg"])){
              if ($_GET["msg"] == "usedusername"){
              echo "<script>document.getElementById('msg2').innerHTML = '⛔ The username is already used.';
              document.getElementById('popup-1').classList.toggle('active');
               </script>";
            }
            else if($_GET["msg"] == "charusername"){
              echo "<script>document.getElementById('msg2').innerHTML = '⛔ The username cant have special characters.';
              document.getElementById('popup-1').classList.toggle('active');
               </script>";
            }
            else if($_GET["msg"] == "pwc"){
              echo "<script>document.getElementById('msg2').innerHTML = '⛔ Password must be at least: (8: characters long, 1: number, upper and lower case letter.)';
              document.getElementById('popup-1').classList.toggle('active');
               </script>";
            }
            else if($_GET["msg"] == "pww"){
              echo "<script>document.getElementById('msg2').innerHTML = '⛔ Password confirmation is wrong.';
              document.getElementById('popup-1').classList.toggle('active');
               </script>";
            }


}
              ?>
        
        <input
          id="email"
          type="email"
          name="email"
          placeholder="Email"
          required
        />
        <br />

        <input
          id="password"
          type="password"
          name="password"
          placeholder="Enter Password"
          required
        />
        <input
          id="passwordC"
          type="password"
          name="passwordC"
          placeholder="Confirm password"
          required
        /> 
        <br />
        <input type="radio" id="gender" name="gender" value="m" checked />
        <label class="dark-t">Male</label>
        <input type="radio" id="gender" name="gender" value="f" />
        <label class="dark-t">Female</label>
        <br />
        <button class="button" role="submit" id="btnRegister">Register</button>
      </form>
    </section>

    <div class="div-about">
      <section class="content-section container about" id="About">
        <!--<hr /> -->

        <h2 class="section-header dark-t">About:</h2>

        <p class="section-paragraph dark-t">
          GrindTracker is a tool that let you keep track of your progress and
          visualise them to better grind your way up reaching your desired
          goals.
        </p>

        <img class="ImageGrind" src="Images/Grind.png" />
        <p class="section-paragraph dark-t">
          GRIND > is a term that refers to persevering when doing something
          difficult or performing repetitive tasks to attain a certain goal.
          <br /><br />TRACKER > follow the trail or movements of your GRIND,
          typically in order to find them or note their course.
        </p>
      </section>
    </div>

    <footer class="main-footer">
      <div class="container main-footer-container">
        <!--<hr />-->
        <h3 class="TitleGT TitleGT2">GrindTracker</h3>
        <a href="#RAS">🔺</a>
      </div>
    </footer>
    <script src="darkmode.js" defer></script>
  </body>
</html>
