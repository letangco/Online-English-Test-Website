<?php
    include('../../../admin/connect.php');

    session_start();
    $username = $_SESSION['login'];
   
    $sql = "SELECT * FROM `study`, `class`
            WHERE study.CLASS_ID = class.CLASS_ID
            AND `USERNAME` = '$username'
            ORDER BY END ASC
            ";
    $result = $conn->query($sql);
    $arrClass = array();
    while ($row = $result->fetch_assoc())
    {
        $arrClass[] = array(
            "CLASS_ID" => $row['CLASS_ID'],
            "RESULT" => $row['RESULT']
        );
        //array_push($arrClass, $row['CLASS_ID']);
    }
   // echo $username;
   echo json_encode($arrClass);

?>