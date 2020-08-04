<?php
    include('../../../admin/connect.php');
    $id = $_GET['id'];
    $pass = $_POST['currentPass'];
    //echo $id;
    $sql = "SELECT * FROM `account` WHERE username = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['PASS'] == $pass) {
        echo '<span style="color:green">Valid</span>';
    }
    else {
        echo '<span style="color:red">Invalid</span>';
    }

?>