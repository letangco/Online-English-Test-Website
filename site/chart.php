
<link rel="stylesheet" type="text/css" href="css/user-locopy.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<head>
	<title>CHART</title>
</head>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-6 info_">
			<canvas id="myChart"></canvas>
			<canvas id='myTestChart'></canvas>
		</div>

	</div>
</div>
<script>
	$(document).ready(function() {
		var ctx = document.getElementById("myChart").getContext('2d');
		var label = [];
		
		var label_name = [];
		var data = [];
		$.ajax({
			type: "POST",
			dataType: "json", 
			async: false,
			url: "site/user-right/control/chart_ajax.php",
			success: function(response) {
				$.each(response, function (key, item)
                    {
                        label.push(item['CLASS_ID']);
						data.push(item['RESULT']);
					}); 
			  	// test = label;
					var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: label,
                            datasets: [{
                                    label: 'AVG Point',
                                    data: data,
                                    backgroundColor: '#FFB1C0',
                                    borderColor: '#FD6D8B',
                                    borderWidth: 2
                                }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                        }
                    });	
			}
			
		});
	
		console.log(label);
		//console.log(data.length);
		//data = [8, 5, 6, 7, 10];
		
	})
</script>