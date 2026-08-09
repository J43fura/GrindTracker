<?php 
session_start();
if (isset($_SESSION["id"])){
  header("location:profile.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" type="image/x-icon" href="Images/favicon.ico" />
    <script src="Addons/jquery-3.6.0.js"></script>
    <script src="index.js" defer></script>
    <script src="loader.js" defer></script>
    <title weight="normal">GrindTracker 🔺</title>
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
      

      
      <h1 class="TitleGT TitleGT1 TitleGT1-d">GrindTracker</h1>
    </header>

    <section class="content-section container login" id="Login">
      <h2 class="section-header dark-t-w">LOGIN</h2>
      <form
        class="section-paragraph"
        id="myForm1"
        method="post"
        action="login.php"
      >
        <input type="text" id="loginUsername" name="username" placeholder="Username" required autofocus autocomplete="username" />
        <br />
        <input
          id="loginPassword"
          type="password"
          name="password"
          placeholder="Password"
          required
          autocomplete="current-password"
        />
        <div id="msg1"></div>
        <?php
            if (isset($_GET["msg"])){
              if ($_GET["msg"] == "login_error"){
              echo "<script>document.getElementById('msg1').innerHTML = '⛔ The username or password is incorrect.'; </script>";
            }
            else if($_GET["msg"] == "verification_error"){
              echo "<script>document.getElementById('msg1').innerHTML = 'The verification code is wrong.'; </script>";
            }}
              ?>
        <button class="button" type="submit" id="btnLogin">Log In</button>
        <button type="button" class="button signup" onclick="togglePopupSignUp()">
          Sign Up
        </button>
      </form>
    </section>

    <section class="content-section container login popup" id="popup-1">
      <button class="button btnx" onclick="togglePopupSignUp()">&times;</button>
      <h2 class="section-header dark-t-w">Sign Up</h2>
      <form
        class="section-paragraph"
        id="myForm2"
        method="post"
        action="register.php"
      >
        <input type="text" id="regUsername" name="username" placeholder="Username" required autocomplete="username" />
        <div id="regMsg"></div>

        <?php      
            if (isset($_GET["msg"])){
              if ($_GET["msg"] == "usedusername"){
              echo "<script>document.getElementById('regMsg').innerHTML = '⛔ The username is already used.';
              document.getElementById('popup-1').classList.toggle('active');
               </script>";
            }
            else if($_GET["msg"] == "charusername"){
              echo "<script>document.getElementById('regMsg').innerHTML = '⛔ The username cant have special characters.';
              document.getElementById('popup-1').classList.toggle('active');
               </script>";
            }
            else if($_GET["msg"] == "pwc"){
              echo "<script>document.getElementById('regMsg').innerHTML = '⛔ Password must be at least: (8: characters long, 1: number, upper and lower case letter.)';
              document.getElementById('popup-1').classList.toggle('active');
               </script>";
            }
            else if($_GET["msg"] == "pww"){
              echo "<script>document.getElementById('regMsg').innerHTML = '⛔ Password confirmation is wrong.';
              document.getElementById('popup-1').classList.toggle('active');
               </script>";
            }
          }
              ?>
        
        <input
          id="regEmail"
          type="email"
          name="email"
          placeholder="Email"
          required
          autocomplete="email"
        />
        <br />

        <input
          id="regPassword"
          type="password"
          name="password"
          placeholder="Enter Password"
          required
          autocomplete="new-password"
        />
        <input
          id="passwordC"
          type="password"
          name="passwordC"
          placeholder="Confirm password"
          required
          autocomplete="new-password"
        /> 
        <br />
        <input type="radio" id="genderM" name="gender" value="m" checked />
        <label class="dark-t">Male</label>
        <input type="radio" id="genderF" name="gender" value="f" />
        <label class="dark-t">Female</label>
        <br />
        <button class="button" type="submit" id="btnRegister">Register</button>
      </form>
    </section>

    <section class="content-section container login popup" id="popup-Ver">
    <button class="button btnx" onclick="togglePopupVerif()">&times;</button>
      <h2 class="section-header dark-t-w">Email Verification</h2>
      <form
        class="section-paragraph"
        id="myForm2"
        method="post"
        action="emailverif.php"
      >
        <div id="verifyMsg">A 6-digit verification code was sent to your email.</div>
        <input
          id="emailverif"
          type="number"
          name="emailverif"
          placeholder="6-digit code"
          required
        />
        <button class="button" type="submit" id="btnVerify">Verify</button>
      </form>
    </section>
    <?php 
    if (isset($_GET["msg"])){
    if($_GET["msg"] == "emailverif"){
              echo "<script>document.getElementById('popup-Ver').classList.add('active');
              document.body.style.overflow = 'hidden';
              </script>";
            }
            }
            ?>

    <div class="div-about">
      <section class="content-section container about" id="About">
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
        <h3 class="TitleGT TitleGT2">GrindTracker</h3>
        <a href="#RAS">🔺</a>
      </div>
    </footer>
    <script src="darkmode.js" defer></script>
  </body>
</html>
