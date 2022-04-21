<?php
session_start();
require_once('connection.php');
$id = $_SESSION["id"];
$axe = $_POST['elemph'];
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="Adds/chart.js"></script>
	<script src="Adds/chartjs-adapter-date-fns.bundle.min.js"></script> 
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
        width: 100vw;
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
        padding-bottom:100px;
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
        position: relative;
        padding:0px;
        background: #181a20;
      }
      #RASF{
        cursor: pointer;
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
	$result = mysqli_query($conn,$sql);
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

    // setup 
    const data = {
      labels: dateChartJS,
      datasets: [{
        label: '<?= $axe ?>',
        data: AxeArrayJS,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 3,
		tension: 0.2
      }]
    };

    // config 
    const config = {
      type: 'line',
      data,
      options: {
        scales: {
			x:{
				type: 'time',
				time:{
					unit: 'day'
				}
			},
          y: {
            beginAtZero: true
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
});</script>
<?php
unset($axe);
 ?>
