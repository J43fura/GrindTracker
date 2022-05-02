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
    <script src="Adds/jquery-3.6.0.js"></script>
    <script src="Adds/chart.js"></script>
    <script src="Adds/chartjs-adapter-date-fns.bundle.min.js"></script>
    <title weight="normal">GrindTracker 🔺| Profile</title>
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
          <li><a class="nav-elements" href="index.php">Home</a></li>
          <li><a class="nav-elements" href="logout.php">Logout</a></li>
          <li><a class="nav-elements" href="summary.php">Summary</a></li>
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
	<body>
	<div class="content-section container login">
	<button type="button" class="button signup" id="pdfDownload" >Download<br>Summary PDF</button>
	<button type="button" class="button signup" id="pdfEmail" >Email<br>Summary PDF</button>
	</div>
	</body>
	<style>
		.signup{
			width:260px;
			height:150px;
			padding:20px;
			margin:30px auto;
			font-size: 1.2em;
		}
		.signup:hover{
			width:290px;
		}

	</style>
	<script>
		//DOWNLOAD PDF 
			document.getElementById('pdfDownload').addEventListener("click", function(e) {
		var canvas = document.querySelector('#myChart');
		var dataURL = canvas.toDataURL("image/jpeg", 1.0);
		$.ajax({
		type: "POST",
		url: "emailGraph.php",
		data: { 
		img: dataURL,
		axe: '<?= $axe ?>'
		},
		success: function(response){ 
		alert("<?= $axe ?>'s Graph has been sent to your email."); 
		}
	})
	});



			//EMAIL PDF
			document.getElementById('pdfEmail').addEventListener("click", function(e) {
		var canvas = document.querySelector('#myChart');
		var dataURL = canvas.toDataURL("image/jpeg", 1.0);
		$.ajax({
		type: "POST",
		url: "emailGraph.php",
		data: { 
		img: dataURL,
		axe: '<?= $axe ?>'
		},
		success: function(response){ 
		alert("<?= $axe ?>'s Graph has been sent to your email."); 
		}
	})
	});
	</script>
    <footer class="main-footer">
      <div class="container main-footer-container">
        <!--<hr />-->
        <h3 class="TitleGT TitleGT2">GrindTracker</h3>
        <a href="#RAS" id="RASF">🔺</a>
      </div>
    </footer>
  <script src="darkmode.js" defer></script>
  </body>
</html>
