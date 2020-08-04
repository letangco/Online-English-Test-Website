<?php
    include('../connect.php');
    $value = ($_POST['string']);
    //echo $value;
    $sql = "SELECT * FROM `class` WHERE
            COURSE_ID = $value";
    $result_sql = mysqli_query($conn,$sql);
    $result = array();
    while ($row = mysqli_fetch_array($result_sql))
    {   
        //array_push($result,$row['CLASS_ID']);
        $result[] = array(
            'CLASS_ID' => $row['CLASS_ID'],
            'CLASS_NAME' => $row['CLASS_NAME']
        );
    }
   // print_r($result);
   //  return $result;
   die (json_encode($result));
    ?>
