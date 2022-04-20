<?php
//vars:

session_start();
require_once('connection.php');
header('Content-Type: application/json');
$username = $_SESSION["username"];

$sql = "SELECT id FROM register WHERE username = '$username'";
$result = mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
echo "<script>console.log('1')</script>";

$id = $value["id"];
$axe = $_POST['elemph'];



  
  //query to get data from the table
  $query = sprintf("SELECT PrDate,$axe FROM pr$id ORDER BY PrDate");
  
  //execute query
  $result = $mysqli->query($query);
  
  //loop through the returned data
  $data = array();
  foreach ($result as $row) {
	$data[] = $row;
  }
  
  //free memory associated with result
  $result->close();
  
  //close connection
  $mysqli->close();
  
  //now print the data
  print json_encode($data);
















/*
$value="";
$time ="";
$line_graph="";

$getData = "SELECT PrDate,$axe FROM pr$id ORDER BY PrDate";
$rows = $mysqli->query($getData);
$rowcount = $rows->num_rows;

if($rowcount>2){
	while($r = $rows->fetch_assoc()){
		$value  .= '"' . $r['$axe'] . '",';
		$time  .= '"' . $r["PrDate"] . '",';

		echo "<script>console.log('1')</script>";
	}


}

else{
	//alert <2 elements
}
$value=subsrt($value,0,-1);
$PrDate=subsrt($PrDate,0,-1);

$line_graph = '
<canvas id="graph" data-settings=
\'{
"type" = "line",
"data":{
	"labels": [' . $time . '],
	"datasets":[{
		"label":"' . 'grind' . '",
		"borderColor":"#206600",
		"data": [' . $axe . ']
	}]
	
}

}\'
></canvas>';

echo $line_graph;

/*
$sql="SELECT PrDate,$axe FROM pr$id ORDER BY PrDate";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num>1){
 spanGaps: true
foreach($result as $data){
	$PrDate[] = $data['PrDate'];
	$axe[] = $data[$axe];
}
    
}
else{
    alert less than 2 elements.
}

$result = mysqli_query($conn, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}*/

?>