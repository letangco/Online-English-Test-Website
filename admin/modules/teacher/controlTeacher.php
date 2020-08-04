<?php
    include('../connect.php');
     
      
     
    if (isset($_POST['btnSubmitAdd'])) 
    {
      $acc_pass = $_POST['txtPassword'];
      $acc_avt = $_FILES['fileAvt']['name'];
      $acc_avt_tmp = $_FILES['fileAvt']['tmp_name'];
      move_uploaded_file($acc_avt_tmp, '../uploads/'.$acc_avt);
      $sdt_fullname = $_POST['txtFullname'];
      $sdt_dob = $_POST['txtDob'];
      $sdt_sex = $_POST['rbSex'];
      $sdt_email = $_POST['txtEmail'];
      $sdt_addr = $_POST['txtAddr'];
      $sdt_phone = $_POST['txtPhone'];
      $sdt_certi = $_POST['txtCerti'];
     
      $acc_usename = $_POST['txtAccount'];
      $sql1 = "INSERT INTO `account`(`username`, `PASS`, `role_id`,`create_date`, `AVATAR`) 
        VALUES ('$acc_usename','$acc_pass','teacher',NOW() ,'$acc_avt')"; 
      $sql2 = "INSERT INTO `teacher`(`USERNAME`, `FULLNAME`, `DOB`, `SEX`, `EMAIL`, `ADDRESS`, `PHONE`, `CERTIFICATE`) 
        VALUES ('$acc_usename','$sdt_fullname',' $sdt_dob', '$sdt_sex','$sdt_email','$sdt_addr','$sdt_phone','$sdt_certi')"; 
        if (mysqli_query($conn, $sql1)) 
         {
            if (mysqli_query($conn, $sql2)) 
            {
              // echo "New record created successfully";
              // header('location:../../index.php?click=teacher&id=3');
              ?>
              <script>
                 alert ("Succesfully");
                 window.location = "../../index.php?click=teacher";
              </script>
           <?php
                    
            } 
            else 
               { 
?>
         <script>
                     alert('That username is taken. Try another!'); 
                     window.location="../../index.php?click=addTeacher&id=3";
         </script>
<?php  
               }
         } 
         else 
            {
?>
            <script>
               alert ('That username is taken. Try another!');
                window.location="../../index.php?click=addTeacher&id=3";
            </script>           
<?php 
            }
    }
    else if (isset($_POST['btnSubmitEdit']))
    { 
      $id = $_GET['id'];
      $acc_pass = $_POST['txtPassword'];
      $acc_avt = $_FILES['fileAvt']['name'];
      $acc_avt_tmp = $_FILES['fileAvt']['tmp_name'];
      move_uploaded_file($acc_avt_tmp, '../uploads/'.$acc_avt);
      $sdt_fullname = $_POST['txtFullname'];
      $sdt_dob = $_POST['txtDob'];
      $sdt_sex = $_POST['rbSex'];
      $sdt_email = $_POST['txtEmail'];
      $sdt_addr = $_POST['txtAddr'];
      $sdt_phone = $_POST['txtPhone'];
      $sdt_certi = $_POST['txtCerti'];
    
      $acc_usename = $_POST['txtAccount'];  
      if ($acc_avt != '')
        {
            $sql1 = "UPDATE `account` SET `PASS` = '$acc_pass', 
                     `AVATAR`= '$acc_avt'
                    WHERE `username` = '$id'"; 
        }
          else {
            $sql1 = "UPDATE `account` SET `PASS` = '$acc_pass'
                    WHERE `username` = '$id'"; 
           }
       $sql2 = "UPDATE `teacher` SET `FULLNAME` ='$sdt_fullname', 
               `DOB` ='$sdt_dob', `SEX` = '$sdt_sex', `EMAIL`='$sdt_email',
               `ADDRESS`= '$sdt_addr', `PHONE`='$sdt_phone' , `CERTIFICATE` = '$sdt_certi'
               WHERE `USERNAME` = '$id'" ;
      if (mysqli_query($conn, $sql1)) 
      {
         if (mysqli_query($conn, $sql2)) 
         {
            //header('location:../../index.php?click=teacher&id=1');
            ?>
            <script>
               alert ("Succesfully");
               window.location = "../../index.php?click=teacher";
            </script>
         <?php
                  
         } 
         else 
            {      
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            }
      } 
      else 
         {
         echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
         }
    }
    else
    {
      $id = $_GET['id'];
      $sql0 = "DELETE FROM `test` WHERE USERNAME='$id'";
      $sql00 = "DELETE FROM `class` WHERE TEACHER='$id'";
      $sql1 = "DELETE FROM `teacher` WHERE USERNAME='$id'";
      $sql2 = "DELETE FROM `account` WHERE username='$id'";
      if (mysqli_query($conn, $sql00))
      {
         if (mysqli_query($conn, $sql0))
         {
            if (mysqli_query($conn, $sql1)) 
            {
               if (mysqli_query($conn, $sql2)) 
                  {
                     //header('location:../../index.php?click=teacher&id=1');
                       //echo "Error: " . $sql0 . "<br>" . mysqli_error($conn);
            ?>
            <script>
               alert ("Succesfully");
               window.location = "../../index.php?click=teacher";
            </script>
         <?php
                  } 
                  else 
                     {
                     echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                }
            }
            else 
                  {
                  echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                  }
         }
         else
         {
            //echo "Error: " . $sql0 . "<br>" . mysqli_error($conn);
            ?>
   <script>
      alert ("Khong xoa duoc do hien tai giao vien dang phu trach lop");
      window.location = "../../index.php?click=teacher";
   </script>
<?php
         }
      }
      else
      {
         //echo "Error: " . $sql00 . "<br>" . mysqli_error($conn);
         ?>
   <script>
      alert ("Khong xoa duoc do hien tai giao vien dang phu trach lop");
      window.location = "../../index.php?click=teacher";
   </script>
<?php
   
      }
     
     
    }
?>
