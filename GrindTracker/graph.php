<?php
session_start();
require_once('connection.php');
if (!isset($_POST['elemph'])){
  header("location:index.php");
}
$id = $_SESSION["id"];
$axe = $_POST['elemph'];
?>

<!doctype html>
<html>
  <head>
  <link rel="shortcut icon" type="image/x-icon" href="Images/favicon.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="Addons/chart.js"></script>
	<script src="Addons/chartjs-adapter-date-fns.bundle.min.js"></script> 
  <script src="Addons/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="style.css" />
    <title><?= $axe ?></title>
    <style>
      @font-face {
        font-family: Kanit;
        src: url(Fonts/Kanit-Regular.ttf);
      }
      * {
        font-family: Kanit;
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
    </style>


<script>
  let darkMode = localStorage.getItem("darkMode");
  console.log(darkMode);
  if (darkMode !== "enabled") {
    console.log(darkMode);
      document.write("<link rel='stylesheet' href='graphdarkmode.css'/>");
    }
</script>

  </head>
  <body class="chartBody">
    <div class="chartMenu">
      <p><?= $axe ?></p>
    </div>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>
		<?php
try{
	$sql = "SELECT PrDate,$axe FROM pr$id WHERE $axe IS NOT NULL ORDER BY PrDate";
	$result = $conn->query($sql);
	$num = mysqli_num_rows($result);
	  if($num>0){
		$dateArray = [];
		$valueArray = [];
		while($value = mysqli_fetch_assoc($result)){
			$dateArray[] = $value["PrDate"];
			$AxeArray[] = $value[$axe];
		}
	  } else{
		echo "Empty.";
	  }
	}
	catch(e){
	  die("ERROR");
	}
 ?>
      </div>
    </div>

  <script>
	const dateArrayJS = <?= json_encode($dateArray); ?>;
	const AxeArrayJS = <?= json_encode($AxeArray); ?>;
	const dateChartJS = dateArrayJS.map((day, index) =>{
		let dayjs = new Date(day);
		return dayjs;
	})

  //background plugin
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


  // setup 
  const backgroundcolor = [];
  for (i=0; i < dateArrayJS.length; i++){
      if (dateArrayJS[i][6] % 2 == 1){
        backgroundcolor.push('rgba(255, 99, 132, 0.2)');
      }
      else{
        backgroundcolor.push('rgba(99, 255, 132, 0.2)');
      }
    }

  const up = (ctx, value) => ctx.p0.parsed.y < ctx.p1.parsed.y ? value:
  undefined;
  const down = (ctx, value) => ctx.p0.parsed.y > ctx.p1.parsed.y ? value:
  undefined;


  const data = {
    labels: dateChartJS,
    datasets: [{
      label: '<?= $axe ?>',
      data: AxeArrayJS,
      borderColor: 'rgba(75, 192, 192, 0.6)',
      borderWidth: 3,
		  tension: 0.2,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      segment:{
        borderColor: ctx => up(ctx, 'rgba(75, 192, 75, 1)') || down(ctx, 'rgba(255, 99, 132, 1)') || 'rgba(75, 192, 192, 1)',
      }

    }]
    };

    // config 
    
    const config = {
      plugins: [plugin],
      type: 'line',
      data,
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

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
    </script>
        <button class="button" id="DownloadGraph">Download this graph.</button>
        <button class="button" id="SendGraph">Email me this graph.</button>

    <footer class="main-footer">
      <div class="container main-footer-container">
        <h3 class="TitleGT TitleGT2">GrindTracker</h3>
        <a id="RASF">🔺</a>
      </div>
    </footer>
  </body>
</html>
<script>
  var RASF = document.getElementById('RASF');
  RASF.addEventListener("click", () => {
    window.close();
  });


  // Convert canvas to image
    document.getElementById('DownloadGraph').addEventListener("click", function(e) {
    var canvas = document.querySelector('#myChart');
    var dataURL = canvas.toDataURL("image/jpeg", 1.0);
    downloadImage(dataURL, 'Graph <?= $axe ?>.jpeg');
});

  // Save | Download image
  function downloadImage(data, filename = 'untitled.jpeg') {
    var a = document.createElement('a');
    a.href = data;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
}

  // Send image
  document.getElementById('SendGraph').addEventListener("click", function(e) {
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
<?php
unset($axe);
 ?>
