<link rel="stylesheet" type="text/css" href="css/user-locopy.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<?php
$tittle = $_GET['id'];


?>
<head>
	<title>CHART</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6 info_">
            <div class="panel panel-default">
                <div class="panel-heading">Test Result</div>
                <br>
                <div class="panel-body">
                <div name='class_id' value ='<?php echo $tittle; ?>'></div>
                    <canvas id="testChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var class_id = $('div[name="class_id"]').attr('value');
    //alert(class_id);
    var label = [];
    var label_test =[];
   // var times = [];
    var point = [];
    var data_first = [];
    var data_second = [];
    window.onload = function() {
        Chart.defaults.global.defaultFontColor = '#000000';
        Chart.defaults.global.defaultFontFamily = 'Arial';
        var lineChart = document.getElementById('testChart');

        $(document).ready(function() {
            $.ajax({
                type: "POST",
                data: {"class_id": class_id},
                dataType: "json",
                async: false,
                url: "site/user-right/control/testChart_ajax.php",
                success: function(response) {
                    $.each(response, function(key, item) {
                        //  alert(item['TEST_NAME']);
                        label.push(item['TEST_NAME']);
                       // times.push(item['TIMES']);
                        point.push(item['POINT']);
                    });
                    //renderChart(data, label);
                    for (var i = 0; i < label.length; i+=2)
                    {
                        label_test.push(label[i]);
                    }
                    for (var i = 0; i < point.length; i+=2)
                    {
                        data_first.push(point[i]);
                    }
                    for (var i = 1; i < point.length; i+=2)
                    {
                        data_second.push(point[i]);
                    }
                    var myChart = new Chart(lineChart, {
                        type: 'line',
                        data: {
                            labels: label_test,
                            datasets: [{
                                    label: 'First Time',
                                    data: data_first,
                                    backgroundColor: 'rgba(0, 128, 128, 0.3)',
                                    borderColor: 'rgba(0, 128, 128, 0.7)',
                                    borderWidth: 2
                                },
                                {
                                    label: 'Second Time',
                                    data: data_second,
                                    backgroundColor: '#FFB1C0',
                                    borderColor: '#FD6D8B',
                                    borderWidth: 2
                                }
                            ]
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
            console.log(label_test);
            // alert(label);
            //data = [8, 5, 6, 7, 10];
        })
    };
</script>