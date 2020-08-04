<?php
    include('../../../admin/connect.php');

    session_start();
    $username = $_SESSION['login'];
   $tittle = $_POST['class_id'];
    $sql = "SELECT  test.TEST_ID, test.TEST_NAME, TIMES, POINT
            FROM `test`, `result`
            WHERE test.TEST_ID = result.TEST_ID
                AND result.USERNAME = '$username'
                AND test.CLASS_ID = '$tittle'
            ";
    
    
    $result = $conn->query($sql);
   
    $arrClass = array();
    while ($row = $result->fetch_assoc())
    {
         
        $arrClass[] = array(
            "TEST_NAME" => $row['TEST_NAME'],
            "POINT" => round($row['POINT'], 2, PHP_ROUND_HALF_EVEN)
        );
        //array_push($arrClass, $row['CLASS_ID']);
    }
   // echo $username;
   echo json_encode($arrClass);

?>