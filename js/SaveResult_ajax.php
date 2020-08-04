<?php
    include('../admin/connect.php');
    session_start();
    if (!isset($_SESSION['login']))
    {
        // Khong phai user
        $username = 'null';
    }
    else 
    {
       $username = $_SESSION['login']; //ten dang nhap hien tai
       $test_id = $_POST['test_id']; //id bai test
       $class_id = $_POST['class_id']; //lay id class
       $correct_answer = $_POST['correct']; //so dap an dung
       $num_question =  $_POST['num_question'];
       $times = $_POST['times'];
       $insert_times = 1;
       $point = (10/$num_question)*$correct_answer;
       if ($times >= 1) {
         $insert_times = 2;
       }
        $count_test = 0; //so luong cac bai test cua hoc vien theo lop hien tai
        
        $sql_count = "SELECT COUNT(DISTINCT(test.TEST_ID))  AS B
                          FROM `class`,`test` 
                          WHERE class.CLASS_ID = test.CLASS_ID AND
                           class.CLASS_ID='$class_id' AND
                          TEST.TYPE = 'todo' 
                          GROUP BY class.CLASS_ID"; //Dem so bai test type todo da lam
        $result_count = $conn->query($sql_count);
        $row_count = $result_count->fetch_assoc();
        $count_test = $row_count['B'];
       
        $sum_avg_test = 0; // diem trung binh cua tung bai test     
        $sql = "INSERT INTO `result` VALUES ('$username', $test_id, $insert_times,$point)";
        if (mysqli_query($conn, $sql)) 
        {
          
          $sql_avg = "SELECT AVG(RESULT.POINT) AS A 
                     FROM  `result`, TEST
                     WHERE RESULT.USERNAME='$username' 
                     AND RESULT.TEST_ID = TEST.TEST_ID
                     AND TEST.CLASS_ID = '$class_id'
                     GROUP BY  RESULT.USERNAME,RESULT.TEST_ID";
           $result_avg = $conn->query($sql_avg);
           while ($row_avg = $result_avg->fetch_assoc()){
            $sum_avg_test += $row_avg['A'];
          }
        
           $result_point = round($sum_avg_test/$count_test,2,PHP_ROUND_HALF_EVEN) ;   
           $sql2 = "UPDATE `study` SET  `RESULT` = $result_point
                    WHERE `USERNAME`='$username'
                    AND CLASS_ID='$class_id'";
            if (mysqli_query($conn, $sql2)) {
                $rank = '';
              //  echo 'Your result have been saved';
              $sql_rank = "SELECT * FROM `study` WHERE USERNAME='$username' AND `CLASS_ID` = '$class_id'";
              $result_rank = $conn->query($sql_rank);
              $row_rank = $result_rank->fetch_assoc();
              if ($row_rank['RESULT'] >= 8.5)
              {
                  $rank = 'EXCELLENT';
              }
              else if ( 7.0 <= $row_rank['RESULT'] &&  $row_rank['RESULT'] <= 8.4)
              {
                $rank = 'GOOD';
              }
              else if ( 5.5 <= $row_rank['RESULT'] &&  $row_rank['RESULT'] <= 6.9)
              {
                $rank = 'AVERAGE';
              }
              else if ( 4.0 <= $row_rank['RESULT'] &&  $row_rank['RESULT'] <= 5.4)
              {
                $rank = 'BELOW AVERAGE';
              }
              else {
                $rank = 'WEAK';
              }
           //   echo $row_rank['RESULT'] ;
              $sql_update_rank = "UPDATE `study` SET `RANK` = '$rank'
                  WHERE `USERNAME`='$username'
                  AND `CLASS_ID` = '$class_id'";
                if (mysqli_query($conn, $sql_update_rank))
                {
                   // echo 'Your result have been saved';
                   echo $sum_avg_test;
                }
            }
            else {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            }
        }
       else 
       {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       } 
         
    }
   // echo  $class_id;
   echo $class_id;
?>