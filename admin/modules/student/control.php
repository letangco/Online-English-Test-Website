<?php
include('../connect.php');


if (isset($_POST['btnSubmitAdd'])) {
   $acc_usename = $_POST['txtAccount'];
   $acc_pass = $_POST['txtPassword'];
  
   $acc_avt = $_FILES['fileAvt']['name'];
   $acc_avt_tmp = $_FILES['fileAvt']['tmp_name'];
   move_uploaded_file($acc_avt_tmp, '../uploads/' . $acc_avt);
   $sdt_fullname = $_POST['txtFullname'];
   $sdt_dob = $_POST['txtDob'];
   $sdt_sex = $_POST['rbSex'];
   $sdt_email = $_POST['txtEmail'];
   $sdt_addr = $_POST['txtAddr'];
   $sdt_phone = $_POST['txtPhone'];
   $sql1 = "INSERT INTO `account`(`username`, `PASS`, `role_id`,`create_date`, `AVATAR`) 
        VALUES ('$acc_usename','$acc_pass','student', NOW() ,'$acc_avt')";
   $sql2 = "INSERT INTO `student`(`USERNAME`, `FULLNAME`, `DOB`, `SEX`, `EMAIL`, `ADDRESS`, `PHONE`) 
        VALUES ('$acc_usename','$sdt_fullname',' $sdt_dob', '$sdt_sex','$sdt_email','$sdt_addr','$sdt_phone')";
   if (mysqli_query($conn, $sql1)) {
   
      if (mysqli_query($conn, $sql2)) {
         
         {
            ?>
         <script>
            alert('Successfully!');
            window.location = "../../index.php?click=addStudent";
         </script>
      <?php
         }
      } else {
?>
         <script>
            alert('That username is taken. Try another!');
            window.location = "../../index.php?click=addStudent";
         </script>
      <?php
         //  echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
      }
   } else {
      ?>
      <script>
         alert('That username is taken. Try another!');
         window.location = "../../index.php?click=addStudent&id=1";
      </script>
      <?php
      //  echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
   }
} else if (isset($_POST['btnSubmitEdit'])) 
{
   $id = $_GET['id'];
   $acc_usename = $_POST['txtAccount'];
   $acc_pass = $_POST['txtPassword'];
   
   $acc_avt = $_FILES['fileAvt']['name'];
   $acc_avt_tmp = $_FILES['fileAvt']['tmp_name'];
   move_uploaded_file($acc_avt_tmp, '../uploads/' . $acc_avt);
   $sdt_fullname = $_POST['txtFullname'];
   $sdt_dob = $_POST['txtDob'];
   $sdt_sex = $_POST['rbSex'];
   $sdt_email = $_POST['txtEmail'];
   $sdt_addr = $_POST['txtAddr'];
   $sdt_phone = $_POST['txtPhone'];
   if ($acc_avt != '') {
      $sql1 = "UPDATE `account` SET `PASS` = '$acc_pass', 
                     `AVATAR`= '$acc_avt'
                    WHERE `username` = '$id'";
   } else {
      $sql1 = "UPDATE `account` SET `PASS` = '$acc_pass'
                    WHERE `username` = '$id'";
   }
   $sql2 = "UPDATE `student` SET `FULLNAME` ='$sdt_fullname', 
               `DOB` ='$sdt_dob', `SEX` = '$sdt_sex', `EMAIL`='$sdt_email',
               `ADDRESS`= '$sdt_addr', `PHONE`='$sdt_phone' 
               WHERE `username` = '$id'";
   if (mysqli_query($conn, $sql1)) {
      if (mysqli_query($conn, $sql2)) {
        //header('location:../../index.php?click=student&id=1');
        {
         ?>
         <script>
            alert('Successfully');
            window.location = "../../index.php?click=student";
         </script>
      <?php
        }
      } else {
         echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
      }
   } else {
      echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
   }
} 
else 
{
   $id = $_GET['id'];
   $sql0 = "DELETE FROM `result` WHERE USERNAME='$id'";
   $sql00 = "DELETE FROM `study` WHERE USERNAME='$id'";
   $sql1 = "DELETE FROM `student` WHERE USERNAME='$id'";
   $sql2 = "DELETE FROM `account` WHERE username='$id'";
   if (mysqli_query($conn, $sql00)) 
   {
      if (mysqli_query($conn, $sql0)) 
      {
         if (mysqli_query($conn, $sql1)) 
         {
            if (mysqli_query($conn, $sql2)) 
            {
              // header('location:../../index.php?click=student&id=1');
              {
               ?>
               <script>
                  alert('Successfully!');
                  window.location = "../../index.php?click=student";
               </script>
            <?php
              }
            } else {
               echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            }
         } else 
         {
      ?>
            <script>
               alert('Can not delete!');
               window.location = "../../index.php?click=student";
            </script>
         <?php
            //  echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
         }
      } else 
      {
         ?>
         <script>
            alert('Can not delete!');
            window.location = "../../index.php?click=student";
         </script>
      <?php
      }
   } else 
   {
      ?>
      <script>
         alert('Can not delete!');
         window.location = "../../index.php?click=student";
      </script>
<?php
   }
}
?>