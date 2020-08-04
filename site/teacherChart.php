<?php
include('admin/modules/result/connection.php');
$tittle = $_GET['id'];
$username = $_SESSION['login'];
$sql1 = "SELECT COUNT(USERNAME) AS NUMBER_OF_STD FROM STUDY
 WHERE CLASS_ID = '$tittle'";
$query1 = $conn->prepare($sql1);
$query1->execute();
$row1 = $query1->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT CLASS.CLASS_NAME, STUDY.RANK, COUNT(STUDY.USERNAME) AS QUANTITY 
                FROM CLASS,STUDY 
                WHERE CLASS.CLASS_ID=STUDY.CLASS_ID AND CLASS.CLASS_ID = '$tittle'
                GROUP BY STUDY.RANK
                ORDER BY  STUDY.RANK ASC";
$query = $conn->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$avg = 0;
$be_avg = 0;
$exc = 0;
$goo = 0;
$wea = 0;
foreach ($result as $row) {
    if ($row['RANK'] == 'AVERAGE') {
        $avg = $row["QUANTITY"] / $row1['NUMBER_OF_STD'] * 100;
        $avg = round($avg, 2, PHP_ROUND_HALF_EVEN);
    } else if ($row['RANK'] == 'BELOW AVERAGE') {
        $be_avg = $row["QUANTITY"] / $row1['NUMBER_OF_STD'] * 100;
        $be_avg = round($be_avg, 2, PHP_ROUND_HALF_EVEN);
    } else if ($row['RANK'] == 'EXCELLENT') {
        $exc = $row["QUANTITY"] / $row1['NUMBER_OF_STD'] * 100;
        $exc = round($exc, 2, PHP_ROUND_HALF_EVEN);
    } else if ($row['RANK'] == 'GOOD') {
        $goo = $row["QUANTITY"] / $row1['NUMBER_OF_STD'] * 100;
        $goo = round($goo, 2, PHP_ROUND_HALF_EVEN);
    } else {
        $wea = $row["QUANTITY"] / $row1['NUMBER_OF_STD'] * 100;
        $wea = round($wea, 2, PHP_ROUND_HALF_EVEN);
    }
}


?>

<style>
    #canvas-holder {
        width: 100%;
        margin-top: 5px;
        text-align: center;
    }

    #chartjs-tooltip {
        opacity: 1;
        position: absolute;
        color: #73B0C0;
        border-radius: 3px;
        -webkit-transition: all .1s ease;
        transition: all .1s ease;
        pointer-events: none;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
    }

    .chartjs-tooltip-key {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin-right: 10px;
    }
</style>
<link rel="stylesheet" type="text/css" href="css/user-locopy.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- 
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<head>
	<title>CHART</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6 info_">
            <div class="s_tittle">
                <i>
                    <a style="color: #7eb9be; text-decoration: none" href="./index.php?click=lo">
                        Learning Outcome</a> > <?php echo $tittle ?>
                </i>
            </div>
            <center>
                <div class="pie-chart">
                    <div id="chartjs-tooltip"></div>
                    <div id="canvas-holder" style="width: 450px;">
                        <canvas id="chart-area" width="300" height="300" />
                    </div>
                </div>
            </center>
        </div>
    </div>
</div>
<div name='exc' value="<?php echo $exc ?>"></div>
<div name='goo' value="<?php echo $goo ?>"></div>
<div name='avg' value="<?php echo $avg ?>"></div>
<div name='beavg' value="<?php echo $be_avg ?>"></div>
<div name='wea' value="<?php echo $wea ?>"></div>



<script>
    window.chartColors = {
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        yellow: 'rgb(255, 205, 86)',
        orange: 'rgb(255, 159, 64)',
        red: 'rgb(255, 99, 132)'
        
        
        
    };

    Chart.defaults.global.tooltips.custom = function(tooltip) {
        // Tooltip Element
        var tooltipEl = document.getElementById('chartjs-tooltip');

        // Hide if no tooltip
        if (tooltip.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
        }

        // Set Text
        if (tooltip.body) {
            var total = 0;

            // get the value of the datapoint
            var value = this._data.datasets[tooltip.dataPoints[0].datasetIndex].data[tooltip.dataPoints[0].index].toLocaleString();

            // calculate value of all datapoints
            this._data.datasets[tooltip.dataPoints[0].datasetIndex].data.forEach(function(e) {
                total += e;
            });

            // calculate percentage and set tooltip value
            tooltipEl.innerHTML = '<h1>' + (value / total * 100) + '%</h1>';
        }

        // calculate position of tooltip
        var centerX = (this._chartInstance.chartArea.left + this._chartInstance.chartArea.right) / 2;
        var centerY = ((this._chartInstance.chartArea.top + this._chartInstance.chartArea.bottom) / 2);

        // Display, position, and set styles for font
        tooltipEl.style.opacity = 1;
        tooltipEl.style.left = 287 + 'px';
        tooltipEl.style.top = 277 + 'px';
        // tooltipEl.style.fontFamily = tooltip._fontFamily;
        // // tooltipEl.style.fontSize = tooltip.fontSize;
        // tooltipEl.style.fontStyle = tooltip._fontStyle;
        tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
    };
    var exc = parseFloat($('div[name="exc"]').attr("value")) ;
  var goo = parseFloat($('div[name="goo"]').attr("value")) ;
  var avg = parseFloat($('div[name="avg"]').attr("value")) ;
  var beavg = parseFloat($('div[name="beavg"]').attr("value")) ;
  var wea = parseFloat($('div[name="wea"]').attr("value")) ;
    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [exc, goo, avg, beavg, wea],
                backgroundColor: [
                    window.chartColors.green,
                    window.chartColors.blue,
                    window.chartColors.yellow,
                    window.chartColors.orange,
                    window.chartColors.red
                ],
            }],
            labels: [
                "Exellent",
                "Good",
                "Average",
                "Below Average",
                "weak"
            ]
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                labels: {
                    padding: 20
                },
            },
            tooltips: {
                enabled: false,
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };
</script>

<!-- <script type="text/javascript">
   // pie chart data
  
   var pieData = [
        {
			value: 25
			//exc
			,
			color:"#CDD6D5"
		}-->