<?php
    include('modules/connect.php');
    ?>
<?php
        $name2=$_POST['username1'];
        $password2=$_POST['password1'];
        $createDate2=$_POST['createDate1'];
        $avt2 = $_POST['avt1']; 
        $sql = "INSERT INTO `account`(`username`, `PASS`, `role_id`,`create_date`, `AVATAR`) 
        VALUES ('$name2','$password2','admin', '$createDate2','$avt2')";
         if (mysqli_query($conn, $sql)) 
             echo "New record created successfully";
           else 
         {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
           }  
    ?> 