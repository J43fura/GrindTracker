<?php
session_start();
if (!isset($_SESSION["id"])){
  header("location:index.php");
}
require_once('connection.php');
$id = $_SESSION["id"];

$sql = "SELECT username FROM register WHERE id = '$id'";
$result = $conn->query($sql);
$value = mysqli_fetch_assoc($result);
$username = $value["username"];

date_default_timezone_set('UTC');
$timenow = date("Y-m-d");
$datenow=date_create($timenow);
?>
<!doctype html>
<html>
  <head>
  <link rel="shortcut icon" type="image/x-icon" href="Images/favicon.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=0.6">
    <script src="loader.js" defer></script>
    <script src="Addons/chart.js"></script>
    <script src="Addons/chartjs-adapter-date-fns.bundle.min.js"></script> 
    <script src="Addons/jquery-3.6.0.js"></script>
    <script src="Addons/jspdf-1.3.4.js"></script>
    

    
    <link rel="stylesheet" href="style.css" />
    <title>Summary</title>
    </head>

    <div class="loader1" id="loader"></div>
    <div class="loader" id="loader"></div>
    <header id="RAS" class="main-header dark-h">
      <nav class="nav main-nav">
        <ul>
          <li><a class="nav-elements" href="profile.php">Home</a></li>
          <li><a class="nav-elements" href="#RASF1">🔻</a></li>
          <li><a style="cursor: pointer;" class="nav-elements" id = "logout" >Logout</a></li>
          <script>
            var logoutBut = document.querySelector("#logout");
            logoutBut.addEventListener("click", () => {
            if(confirm("Do you really want to logout?")){
              window.location.href = "logout.php";
            }
          });
          </script>
        </ul>
      </nav>
      <h1 class="TitleGT TitleGT1 TitleGT1-d">GrindTracker</h1>
      </header>    

    
  <style>
      @font-face {
        font-family: Kanit;
        src: url(Fonts/Kanit-Regular.ttf);
      }
      @font-face {
          font-family: Raleway;
          src: url(Fonts/Raleway-VariableFont_wght.ttf);
        }
      * {
        font-family: Raleway;
        color: rgb(22, 22, 22);
        margin: 0;
        padding: 0;
      }
      .chartBody{
        background: #13151b;
      }
      .chartMenu {
        height: 80px;
        background: #181a20;
        
      }

      .chartMenu p {
        padding: 10px;
        font-size: 4vh;
        text-align: center;
        font-weight: bold;
        color:#db0a40;
        text-shadow: 0 0 0.05em #db0a40;
        font-family: Kanit;
     }
      
      .chartCard {
        padding:40px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 60vw;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px #db0a40;
        background:#f8fdff;
      }
      .main-footer {
        font-size: 1.5vh;
        position: relative;
        padding:0px;
        background: #181a20;
      }
      #RASF{
        cursor: pointer;
      }
      #SendGraph{
        font-size: 1.1em;
        width: 235px;
      }
      #SendGraph:hover{
        width: 255px;
      }
      .todo-div {
      background: rgb(19 21 27) !important;
      }
      #task1 li {
        color: white ;
      }
      .listing li{
        background: #2b2f3a ;

      }
      .dark-t1 {
        font-size: 0.6em;
        color: #e2e4e9 ;
      }
      .login {
      background: linear-gradient(120deg, #181a20, #13151b) !important;
        }


      .nav a {
        display: inline-block;
        color: white !important;
      }
      .TitleGT {
        color: #db0a40;
        text-shadow: 0 0 0.025em #db0a40;
      }
      .main-header {
        background: #181a20 !important;
      }


      .TitleGT2 {
        
        color: rgb(221, 240, 255);
        text-shadow: 0 0 0.025em #db0a40;
      }
      .todosing {
        display: none;
      }
    </style>
    <script>
      const plugin = {
      id: 'custom_canvas_background_color',
      beforeDraw: (chart) => {
      const ctx = chart.canvas.getContext('2d');
      ctx.save();
      ctx.globalCompositeOperation = 'destination-over';
      ctx.fillStyle = '#f8fdff';
      ctx.fillRect(0, 0, chart.width, chart.height);
      ctx.restore();
      }
    };
      const up = (ctx, value) => ctx.p0.parsed.y < ctx.p1.parsed.y ? value:
  undefined;
  const down = (ctx, value) => ctx.p0.parsed.y > ctx.p1.parsed.y ? value:
  undefined;
    </script>

<!-- SUMMARY OF -->
  <div class="chartMenu">
     <p><?=$username?>, WELCOME TO YOUR SUMMARY</p>
     <p class="todosing"> GRAPHS </p>
     <?php
    $sql = "SHOW COLUMNS FROM pr$id WHERE field != 'PrDate' AND  field != 'TODO' AND field != 'TODOADDED' AND field != 'Completed'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result)==0){
      echo"<p class='todosing'>Empty.</p>"; 
    }
?>
    </div>


<!-- Graphs -->
<div class="chartMenu">
      <p>GRAPHS</p>
    </div>

<body class="chartBody">
<?php

    if (mysqli_num_rows($result)==0){
      echo "<div class='todo-div'><p style='font-size: 1.3em; min-height: 20vh; ';>Empty.</p></div> ";
    }
      else{
    while($axe = mysqli_fetch_assoc($result)) {
      $axe = $axe['Field'];
 ?>

    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart<?=$axe?>"></canvas>
        </div>
      </div>

		<?php
      try{
        $sql1 = "SELECT PrDate,$axe FROM pr$id WHERE $axe IS NOT NULL ORDER BY PrDate";
        $result1 = mysqli_query($conn,$sql1);
        $num = mysqli_num_rows($result1);
          if($num>0){
          
          $dateArray = [];
          $AxeArray = [];
          while($value = mysqli_fetch_assoc($result1)){
            $dateArray[] = $value["PrDate"];
            $AxeArray[] = $value[$axe];
          }

        } else{
          $dateArray = [];
          $valueArray = [];
          }
        }
        catch(e){
          die("ERROR");
        }
        ?>

    <script>
      const dateArrayJS<?=$axe?> = <?= json_encode($dateArray); ?>;
      const AxeArrayJS<?=$axe?> = <?= json_encode($AxeArray); ?>;
      const dateChartJS<?=$axe?> = dateArrayJS<?=$axe?>.map((day, index) =>{
        let dayjs = new Date(day);
        return dayjs;
      })

      // setup 
      const data<?=$axe?> = {
        labels: dateChartJS<?=$axe?>,
        datasets: [{
          label: '<?= $axe ?>',
          data: AxeArrayJS<?=$axe?>,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 3,
      tension: 0.2,
            segment:{
        borderColor: ctx => up(ctx, 'rgba(75, 192, 75, 1)') || down(ctx, 'rgba(255, 99, 132, 1)') || 'rgba(75, 192, 192, 1)',
      }

        }]
      };

      // config
      const config<?=$axe?> = {
        plugins: [plugin],
        type: 'line',
        data: data<?=$axe?>,
        options: {
          fill:true,
          scales: {
        x:{
          type: 'time',
          time:{
            unit: 'day'
          }
        },
            y: {
              //beginAtZero: true,
            }
          }
        }
      };

      const myChart<?=$axe?> = new Chart(
        document.getElementById('myChart<?=$axe?>'),
        config<?=$axe?>);
  </script>
<?php
  }}
?>
<!-- TODOS -->
  <div id="lfeyda">
    <div class="chartMenu">
          <p>TODOS</p>
        </div>
        <div class="todo-div ">
        <ul id="tasks" class="listing">

        <?php
          $sql = "SELECT * from pr$id WHERE TODO IS NOT NULL ORDER BY PrDate";
          $result = $conn->query($sql);
          if (mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)) {

            $DueToDate=date_create($row['PrDate']);
            $interval = date_diff($datenow, $DueToDate);
            $intervalnum = $interval->format('%R%a');
              ?>
                  <li> 
                    
                    <?php if ($row['Completed'] == TRUE){?>
                      <textarea disabled type ="text" class="dark-t1"><?= $row['TODO']?></textarea>
                      <span class="todosing" type ="text">Completed /</span>
                    <?php }
                  else{ ?>
                      <textarea readonly type ="text" ><?= $row['TODO']?> </textarea>
                      <span class="todosing" type ="text">Not Completed /</span>
                  <?php } ?>
                  
                  <?php
            if ($intervalnum<0){
                ?>
              <small  id="CompleteTime" class="dark-t1" placeholder="<?= $row['PrDate']?>" title="⚰️ due date is over, been <?= $intervalnum = $interval->format('%R%a');?> days.">&nbsp&nbsp due to: <?= $row['PrDate']?>.</small>
            <?php }
            else if ($intervalnum==0){?> 
              <small  id="CompleteTime" class="dark-t1" placeholder="<?= $row['PrDate']?>" title="🚨 due today!">&nbsp&nbsp due to: <?= $row['PrDate']?>.</small>            <?php }
            else if ($intervalnum < 3){?> 
              <small  id="CompleteTime" class="dark-t1" placeholder="<?= $row['PrDate']?>" title="⚠️ due to less than <?= $intervalnum = $interval->format('%R%a');?> days.">&nbsp&nbsp due to: <?= $row['PrDate']?>.</small>            <?php }
            else{?> 
                <small  id="CompleteTime" class="dark-t1" placeholder="<?= $row['PrDate']?>" title="<?= $intervalnum = $interval->format('%R%a');?> days.">&nbsp&nbsp due to: <?= $row['PrDate']?>.</small>
            <?php }?>
                  <small id="CreatedTime" class="dark-t1" placeholder="<?= $row['TODOADDED']?>">created: <?= $row['TODOADDED']?>.</small>
                  <span class="todosing" type ="text"> \ due <?=$intervalnum?> days.</span>
                  </li>
      
              <?php
          }}
          else{
            echo "Empty.";
          }
        ?>
        </ul>
        </div>
      <p class="todosing">Created in: <?= $timenow?>.</p>
      </div>
  </body>

  <div id="editor"></div>
  <script>
    let darkMode = localStorage.getItem("darkMode");
    if (darkMode !== "enabled") {
        document.write("<link rel='stylesheet' href='graphdarkmode.css'/>");
      }
    </script>

<!-- ACTIONS -->
  <div class="chartMenu">
      <p>ACTIONS</p>
    </div>
  <div class="content-section container login">
    <button type="button" class="button signup" id="pdfDownload" >Download<br>Summary PDF</button>
    <button type="button" class="button signup" id="pdfEmail" >Email<br>Summary PDF</button>
    </div>

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
    var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
    };

  $('#pdfDownload').click(function () {
    //DOWNLOAD PDF
    $("html").css("cursor", "progress");
    var doc = new jsPDF();

    doc.fromHTML($('.chartMenu').html(), 15, 15, {
          'width': 700,
          'elementHandlers': specialElementHandlers
      });
      // Convert canvas to image
      try {
      const darke = document.querySelectorAll("canvas");
      var y= 40;
      for (let i = 0; i < darke.length; i++) {
        const CanvasID = darke[i].id;
        var canvas = document.getElementById(CanvasID);
        var dataURL = canvas.toDataURL("image/jpeg", 1.0);
        doc.addImage(dataURL, 'JPEG', 12, y, 190, 95,null,'FAST');
        var y = y+ 106;
        if (i % 2 != 0){
          var y= 40;
          doc.addPage();
        }
        else if (i == (darke.length - 1)){
          doc.addPage();
        }
      }
      if (darke.length == 0){
        doc.addPage();
      }
    } catch (e) {
      console.log(e);
    }
      doc.fromHTML($('#lfeyda').html(), 15, 15, {
          'width': 700,
          'elementHandlers': specialElementHandlers
      });
		//DOWNLOAD PDF
    $("html").css("cursor", "default");
    doc.save('GrindTracker Summary <?= $username ?>.pdf');
    });

  
  $('#pdfEmail').click(function() {
    //EMAIL PDF
    $("html").css("cursor", "progress");
    var doc = new jsPDF();
      doc.fromHTML($('.chartMenu').html(), 15, 15, {
          'width': 700,
          'elementHandlers': specialElementHandlers
      });
      // Convert canvas to image
      try {
      const darke = document.querySelectorAll("canvas");
      var y= 40;
      for (let i = 0; i < darke.length; i++) {
        const CanvasID = darke[i].id;
        var canvas = document.getElementById(CanvasID);
        var dataURL = canvas.toDataURL("image/jpeg", 1.0);
        doc.addImage(dataURL, 'JPEG', 12, y, 190, 95,null,'FAST');
        var y = y+ 106;
        if (i % 2 != 0){
          var y= 40;
          doc.addPage();
        }
        else if (i == (darke.length - 1)){
          doc.addPage();
        }
      }
      if (darke.length == 0){
        doc.addPage();
      }
    } catch (e) {
      console.log(e);
    }
      doc.fromHTML($('#lfeyda').html(), 15, 15, {
          'width': 700,
          'elementHandlers': specialElementHandlers
      });
		//EMAIL PDF
    // Making Data URI
    var out = doc.output();
    var url = 'data:application/pdf;base64,' + btoa(out);

		$.ajax({
		type: "POST",
		url: "emailSummary.php",
		data: { 
		doc: url
		},
		success: function(response){ 
		alert("Summary has been sent to your email."); 
    $("html").css("cursor", "default");
		},
    error: function(response){
      alert("An error has occured."); 
    $("html").css("cursor", "default");
    }
	  }) 
	  });

	</script>

  <footer class="main-footer" id="RASF1">
      <div class="container main-footer-container">
        <h3 class="TitleGT TitleGT2">GrindTracker</h3>
        <a href="#RAS" id="RASF">🔺</a>
      </div>
    </footer>
</html>

<?php
unset($username);
 ?>