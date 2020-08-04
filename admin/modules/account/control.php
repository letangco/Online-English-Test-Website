<?php
    include('../../connect.php');
    $acc_usename = $_POST['txtUsername'];
    $acc_pass = $_POST['txtPassword'];
    $acc_roleid = $_POST['txtRoleID'];
    $acc_date = $_POST['txtCreateDate'];
    $acc_avt = $_POST['fileAvt'];
    
    if (isset($_POST['btnSubmitAdd'])) 
    {
        $sql="INSERT INTO `account`(`username`, `PASS`, `role_id`,`create_date`, `AVATAR`) 
        VALUES ('$acc_usename','$acc_pass','$acc_roleid', ' $acc_date','$acc_avt')"; 


         
    if (mysqli_query($conn, $sql)) 
    {
            echo "New record created successfully";
            header('location:../../index.php?click=account&id=1');
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    else {}
?>