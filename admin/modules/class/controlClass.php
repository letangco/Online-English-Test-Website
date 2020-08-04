<?php
    include('../connect.php');
    
    if (isset($_POST['btnSubmitEdit'])) 
        { 
        $txtClassName = $_POST['txtClassName'];
        $txtBegin = $_POST['txtBegin'];
        $txtEnd = $_POST['txtEnd'];
        $txtTeacher = $_POST['selTeacher'];
        $txtCourseID = $_POST['selCourse'];
        $fileInfo = $_FILES['fileInfo']['name'];
        $fileInfo_tmp = $_FILES['fileInfo']['tmp_name'];
        move_uploaded_file($fileInfo_tmp, '../info_class/'.$fileInfo);
        $id = $_GET['id'];
        if ($fileInfo != '')
        {
            $sql = "UPDATE `class` SET `CLASS_NAME` = '$txtClassName', 
                    `TEACHER` = '$txtTeacher', `COURSE_ID` = '$txtCourseID',
                    `INFO`= '$fileInfo', `BEGIN` = '$txtBegin', `END` = '$txtEnd'
                    WHERE `CLASS_ID` = '$id'" ; 
        }
        else {
            $sql = "UPDATE `class` SET `CLASS_NAME` = '$txtClassName', 
                  `TEACHER` = '$txtTeacher', `COURSE_ID` = '$txtCourseID', 
                  `BEGIN` = '$txtBegin', `END` = '$txtEnd'
                  WHERE `CLASS_ID` = '$id'" ; 
        }
       if (mysqli_query($conn, $sql)) 
            //  echo "New record created successfully";
               // header('location:../../index.php?click=class&id=1');
               {
                ?>
                <script>
                     alert('Succesfully'); 
                     window.location="../../index.php?click=class";
                </script>          
    <?php
               }
        else 
         {
  ?>
            <script>
                 alert('That course is taken. Try another!'); 
                 window.location="../../index.php?click=class";
            </script>          
<?php
          //  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    else if  (isset($_POST['btnSubmitAdd']))  
    {
        $txtClassName = $_POST['txtClassName'];
        $txtBegin = $_POST['txtBegin'];
        $txtEnd = $_POST['txtEnd'];
        $txtTeacher = $_POST['selTeacher'];
        $txtCourseID = $_POST['selCourse'];
        $fileInfo = $_FILES['fileInfo']['name'];
        $fileInfo_tmp = $_FILES['fileInfo']['tmp_name'];
        move_uploaded_file($fileInfo_tmp, '../info_class/'.$fileInfo);
        $txtClassID = $_POST['txtClassID'];
        if ($fileInfo != '')
        {
            $sql = "INSERT INTO `class` (`CLASS_ID`, `CLASS_NAME`, `TEACHER`,`COURSE_ID`, `INFO`, `BEGIN`, `END`) 
        VALUES ('$txtClassID','$txtClassName', '$txtTeacher','$txtCourseID','$fileInfo', '$txtBegin', '$txtEnd')";
        }
        else {
            $sql = "INSERT INTO `class` (`CLASS_ID`, `CLASS_NAME`, `TEACHER`,`COURSE_ID`, `BEGIN`, `END`) 
            VALUES ('$txtClassID','$txtClassName','$txtTeacher','$txtCourseID', '$txtBegin', '$txtEnd')";
        }

         if (mysqli_query($conn, $sql)) 
             // echo "New record created successfully";
               //  header('location:../../index.php?click=class&id=4');
               {
                    ?>
                <script>
                     alert('Succesfully'); 
                     window.location="../../index.php?click=editClass";
                </script>          
    <?php
               }
        else 
         {
 ?>
            <script>
                 alert('That class is taken. Try another!'); 
                 window.location="../../index.php?click=addClass";
            </script>          
<?php
          // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }      
    }
    else{
        $id = $_GET['id'];
        $sql = "DELETE FROM `class` WHERE CLASS_ID='$id'";
      if (mysqli_query($conn, $sql)) 
      {
        //header('location:../../index.php?click=class&id=1');
        ?>
    <script>
        alert('Successfully ');
        window.location = "../../index.php?click=class"; 
    </script>
<?php
      }
      else 
            {
?>
    <script>
        alert('Lop dang co sinh vien hoc! ');
        window.location = "../../index.php?click=class&id=1"; 
    </script>
<?php
            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
            }
    }

?>
