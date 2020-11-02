@extends('layouts.app4')

@section('content')

<!DOCTYPE HTML>
<html>
    
 
<head>  
<script>
window.onload = function () {
 

var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Customer Total Payment"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Product Total Sale"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});



chart1.render();
chart2.render();
 
var dataPoints = [];

var options =  {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Revenue sale per Month"
	},
	axisX: {
		valueFormatString: "DD MMM YYYY",
	},
	axisY: {
		title: "USD",
		titleFontSize: 24
	},
	data: [{
		type: "spline", 
		yValueFormatString: "$#,###.##",
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
};

function addData(data) {
	for (var i = 0; i < data.length; i++) {
		dataPoints.push({
			x: new Date(data[i].date),
			y: data[i].units
		});
	}
	$("#chartContainer").CanvasJSChart(options);

}
$.getJSON("https://canvasjs.com/data/gallery/jquery/daily-sales-data.json", addData);

}
</script>

</head>
<body>

<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div id="chartContainer1" style="width: 100%; height:400px;"></div>
<div id="chartContainer2" style="width: 100%; height:400px;"></div>
<div id="chartContainer" style="width: 100%; height:400px;"></div>

</body>
</html>


@endsection 