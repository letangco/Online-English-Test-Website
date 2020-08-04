   <?php
       include('../../../admin/connect.php');
      $id = $_GET['id'];
      $acc_usename = $_POST['txtAccount'];
     // $acc_date = $_POST['txtCreateDate'];
     // $acc_avt = $_FILES['fileAvt']['name'];
     // $acc_avt_tmp = $_FILES['fileAvt']['tmp_name'];
     // move_uploaded_file($acc_avt_tmp, '../uploads/'.$acc_avt);
      $sdt_fullname = $_POST['txtFullname'];
      $sdt_dob = $_POST['txtDob'];
      $sdt_sex = $_POST['rbSex'];
      echo ($sdt_sex);
      $sdt_email = $_POST['txtEmail'];
      $sdt_addr = $_POST['txtAddr'];
      $sdt_phone = $_POST['txtPhone'];
      $Cert = $_POST['txtCert'];
      $sql = "SELECT * FROM `account` WHERE username = '$id'";
      $result = $conn->query($sql);
        $row = $result->fetch_assoc();
 if (isset($_POST['submitChange']))
    {  
        if ($row['role_id'] == 'student') {
            $sql2 = "UPDATE `student` SET `FULLNAME` ='$sdt_fullname', 
               `DOB` ='$sdt_dob', `SEX` = '$sdt_sex', `EMAIL`='$sdt_email',
               `ADDRESS`= '$sdt_addr', `PHONE`='$sdt_phone' 
               WHERE `username` = '$id'" ;
        }
        else 
        {
            $sql2 = "UPDATE `teacher` SET `FULLNAME` ='$sdt_fullname', 
               `DOB` ='$sdt_dob', `SEX` = '$sdt_sex', `EMAIL`='$sdt_email',
               `ADDRESS`= '$sdt_addr', `PHONE`='$sdt_phone', `CERTIFICATE`='$Cert' 
               WHERE `username` = '$id'" ;
        }   
       
         if (mysqli_query($conn, $sql2)) 
         {
           header('location: ../../../index.php?click=info');
         } 
         else 
            {      
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            }
    
    }
?>