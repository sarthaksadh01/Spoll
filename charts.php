<?php

if(isset($_GET['result'])){
  $id =$_GET['result'];
  $link = mysqli_connect("localhost","root","","phppoll");
  $query ="SELECT * FROM `polld` WHERE id ='$id'";
  $row=mysqli_fetch_assoc(mysqli_query($link,$query));
  $dataPoints = array(
  	array("y" => $row['option1_value'], "label" => $row['option1'] ),
  	array("y" => $row['option_2value'], "label" => $row['option2']  ),
  	array("y" => $row['option3_value'], "label" => $row['option3']  )
  );
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <script
       src="https://code.jquery.com/jquery-3.3.1.js"
       integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
       crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
      crossorigin="anonymous"></script>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "<?php echo $row['question']?>"
	},
	axisY: {
		title: "Votes"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}
</script>
</head>
<body >

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div class="mb-5 container">
  <p class="text-info text-right display-5">Powered By S poll</p>

</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>
