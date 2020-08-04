<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="css/result.css">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<style>
  
    .suggest-course-info{
    max-width: max-content;
    padding: 10px;
    border-radius: 20px;
    margin-left: 70px;
    background: #FAEDDD ;
    opacity: 0.8;
    margin-bottom: 10px;
}

p {
    padding: 0px 3px 3px 0px;
}

</style>
    <head>
	<title>RESULT</title>
</head>
<div class='content'>
    <?php
    // include('admin/connect.php');
    //session_destroy();
    if (isset($_POST['test_id']) && isset($_POST['correct'])) {
        session_start();
        include('../admin/connect.php');
        $test_id =  $_POST['test_id'];
        $correct = $_POST['correct'];

        $sql = "SELECT * FROM `test`
                WHERE TEST_ID = $test_id";
        $sql_count = "SELECT COUNT(*) AS A FROM `question`
                    WHERE TEST_ID = $test_id
                    GROUP BY TEST_ID";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $result_count = $conn->query($sql_count);
        $row_count = $result_count->fetch_assoc();
        if (!isset($_SESSION["result_"])) //Lan dau tien lam bai
        {
            $result_ = array();
            $result_[$test_id] = array(
                "test_name" => $row['TEST_NAME'],
                "num_ques" => $row_count['A'],
                "correct" => $correct,
                "times" => @$_SESSION["result_"] += 1
            );
        } else {
            $result_ = $_SESSION["result_"];
            if (is_array($result_) && array_key_exists($test_id, $result_)) // Lam lai bai test da lam thi tang times len 1
            {
                $result_[$test_id] = array(
                    "test_name" => $row['TEST_NAME'],
                    "num_ques" => $row_count['A'],
                    "correct" => $correct,
                    "times" =>  (int) $result_[$test_id]['times'] + 1
                );
            } else {

                //$result_ = array(); 
                $result_[$test_id] = array(
                    "test_name" => $row['TEST_NAME'],
                    "num_ques" => $row_count['A'],
                    "correct" => $correct,
                    "times" => (int) $result_[$test_id]['times'] + 1
                );
            }
        }
        $_SESSION["result_"] = $result_;
    }
    //  print_r($_SESSION["result_"]);
    ?>
    <div class='suggest'>
        <?php
            $sql_course = "SELECT * FROM `course` ORDER BY BENCHMARK DESC";
            $sql_last = "SELECT *
                          FROM `course`
                         ORDER BY BENCHMARK ASC
                         LIMIT 1";
            $result_course = $conn->query($sql_course);
            $result_last = $conn->query($sql_last);
            $sum = 0;
            $count = 0;
            if (isset($_SESSION["result_"]))
            {
             foreach ($_SESSION['result_'] as $key => $value) 
             {   
                 $sum += round((10 / $value["num_ques"]) * $value["correct"], 2, PHP_ROUND_HALF_EVEN);
                 $count++;        
             }
            
        echo '<div name="avg" style="display: none" value='.$sum/$count.'></div>';
        $course_name = array();
        $course_id = array();
        while ($row_course = $result_course->fetch_assoc())
        {
            if ($sum/$count >= $row_course['BENCHMARK'])
            {
                array_push($course_name,$row_course['COURSE_NAME'] );
                array_push($course_id,$row_course['COURSE_ID'] );
            }
            $row_last = $result_last->fetch_assoc();
            if($sum/$count <= $row_last['BENCHMARK']) {
                array_push($course_name,$row_last['COURSE_NAME'] );
                array_push($course_id,$row_last['COURSE_ID'] );
                
            }
        }
            }
?>
        <script>
            var avg = $('div[name="avg"]').attr('value');
            var list_course = $('div[name="listCourse"]').attr('value');
           // alert((list_course));
           <?php
           if (!isset($_SESSION['login']))
           {
           ?>
           swal({
              icon: "success",
              title: "Congratulation!",
              text: "You got " + avg + "\n" + 
                    "Suggestion courses for you:" + "\n" 
                    + <?php echo json_encode($course_name[0]); ?> + "\n" 
            })
            <?php
           }
           ?>
        </script>
    </div>
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table">
                    <div class="row header">
                        <div class="cell">
                            Test Name
                        </div>
                        <div class="cell">
                            Times
                        </div>
                        <div class="cell">
                            Correct answers
                        </div>
                        <div class="cell">
                            Point
                        </div>
                    </div>

                    <?php
                    if (isset($_SESSION['result_'])) {
                        foreach ($_SESSION['result_'] as $key => $value) {
                            ?>
                            <div class="row">
                                <div class="cell">
                                    <?php echo $value["test_name"] ?>
                                </div>
                                <div class="cell">
                                    <?php echo $value["times"]  ?>
                                </div>
                                <div class="cell">
                                    <?php echo $value["correct"]  ?>
                                </div>
                                <div class="cell">
                                    <?php echo round((10 / $value["num_ques"]) * $value["correct"], 2, PHP_ROUND_HALF_EVEN) ?>
                                </div>
                            </div>
                        <?php
                            }
                        } else {
                            ?>
                        <div class="row">
                            You haven't do anything yet.
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
    if (isset($_SESSION["result_"]) && !isset($_SESSION['login']))
    {
 ?>
<div class='suggest-course-info'>
          
        <h4 class="title1" style="font-size: 20px;">For more information about courses: 
        <a href="index.php?click=course&&id=<?php echo $course_id[0];?> "
            >
        <?php echo json_encode($course_name[0]); ?>
         
        </a></h4>
        
</div>
        <?php } ?>
</div>
</div>
