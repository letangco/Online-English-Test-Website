<?php
    include('../connect.php');
    require_once '../PHPExcel/Classes/PHPExcel.php';
   
       
    if (isset($_POST['btnEdit'])) 
    { 
        $txtCreatedBy = $_POST['txtCreatedBy'];
        $txtTestName = $_POST['txtTestName'];
       // $txtQuestions = $_POST['txtQuestions'];
        $selType = $_POST['selType'];
        $selCourse = $_POST['selCourse'];
        $selClass = $_POST['selClass'];
        $txtTimeLimit = $_POST['txtTimeLimit'];
        $imgTest = $_FILES['imgTest']['name'];
        $imgTest_tmp = $_FILES['imgTest']['tmp_name'];
        move_uploaded_file($imgTest_tmp, '../imgTest/'.$imgTest);
        
        $fileExcel = $_FILES['fileExcel']['name'];
        $fileExcel_tmp = $_FILES['fileExcel']['tmp_name'];
        move_uploaded_file($fileExcel_tmp, '../fileExcel/'.$fileExcel);
        $linkFile = "../fileExcel/$fileExcel";
        $id = $_GET['id'];
        if ($imgTest != '')
        {
            $sql = "UPDATE `test` SET
                    `TEST_NAME`= '$txtTestName',
                    `IMG` = '$imgTest',
                    `CLASS_ID`= '$selClass', 
                    `TYPE` = '$selType',
                    `TIMELIMMIT` = $txtTimeLimit, 
                    `USERNAME` = '$txtCreatedBy' 
                   WHERE TEST_ID = $id";
        }
        else {
                $sql = "UPDATE `test` SET
                `TEST_NAME`= '$txtTestName',
                `CLASS_ID`= '$selClass', 
                `TYPE` = '$selType',
                `TIMELIMMIT` = $txtTimeLimit, 
                `USERNAME` = '$txtCreatedBy'
               WHERE TEST_ID = $id";
        }
        if (mysqli_query($conn, $sql)) {
           // header('location:../../index.php?click=test');
           ?>
           <script>
                alert('Succesfully!'); 
                window.location="../../index.php?click=test";
           </script>          
<?php
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
         if (mysqli_query($conn, $sql) &&  $fileExcel != '' ) 
         {
             $sql3 = "DELETE FROM `question` WHERE TEST_ID=$id";
             if (mysqli_query($conn, $sql3)) {
                      //  $id_inserted =  $conn->insert_id;
                $objReader = PHPExcel_IOFactory::createReaderForFile($linkFile);
                // $objReader->setLoadSheetsOnly('Question');
                 //  $objReader->setReadDataOnly(true);
                   $objExcel = $objReader->load($linkFile);
             //   $sheet = $objExcel->setActiveSheetIndex(0);
                    $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);
                    $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
                for ($i = 2; $i <= $highestRow; $i++)
                {
                  // $question_id = $sheetData[$i]['A'];
                   $content = $sheetData[$i]['B'];
                   $option1 = $sheetData[$i]['C'];
                   $option2 = $sheetData[$i]['D'];
                   $option3 = $sheetData[$i]['E'];
                   $answer = $sheetData[$i]['F'];
                   $sql2 = "INSERT INTO `question` (`TEST_ID`, `CONTENT`, `OPTION1`, `OPTION2`, `OPTION3`, `ANSWER`)
                           VALUES ($id,'$content',
                                   '$option1','$option2','$option3',$answer)";
                       if (mysqli_query($conn, $sql2)) 
                       {
                         //  header('location:../../index.php?click=test');
                         ?>
                         <script>
                              alert('Sucessfully!'); 
                              window.location="../../index.php?click=test";
                         </script>          
             <?php
                       }
                       else {
                           echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                       }
             }
             } 
         } 
        else 
         {
 ?>
            <script>
                 alert('That test is taken. Try another!'); 
                 window.location="../../index.php?click=editTest";
            </script>          
<?php
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }   
        }
    else if  (isset($_POST['btnSubmitAdd']))  
    {
        $txtCreatedBy = $_POST['txtCreatedBy'];
        $txtTestName = $_POST['txtTestName'];
       // $txtQuestions = $_POST['txtQuestions'];
        $selType = $_POST['selType'];
        $selCourse = $_POST['selCourse'];
        $selClass = $_POST['selClass'];
        $txtTimeLimit = $_POST['txtTimeLimit'];
        $imgTest = $_FILES['imgTest']['name'];
        $imgTest_tmp = $_FILES['imgTest']['tmp_name'];
        move_uploaded_file($imgTest_tmp, '../imgTest/'.$imgTest);
        
        $fileExcel = $_FILES['fileExcel']['name'];
        $fileExcel_tmp = $_FILES['fileExcel']['tmp_name'];
        move_uploaded_file($fileExcel_tmp, '../fileExcel/'.$fileExcel);
        $linkFile = "../fileExcel/$fileExcel";
        if ($imgTest != '' )
        {
            $sql = "INSERT INTO `test` 
            (`TEST_NAME`,  `IMG`, `CLASS_ID`, `TYPE`, `TIMELIMMIT`, `USERNAME`) 
         VALUES ('$txtTestName', '$imgTest','$selClass','$selType','$txtTimeLimit','$txtCreatedBy')";
        }
        else {
                $sql = "INSERT INTO `test` 
               (`TEST_NAME`,  `CLASS_ID`, `TYPE`, `TIMELIMMIT`, `USERNAME`) 
               VALUES ('$txtTestName','$selClass',''$selType'','$txtTimeLimit','$txtCreatedBy')";
        }
         if (mysqli_query($conn, $sql)) 
         {
               $id_inserted =  $conn->insert_id;
                $objReader = PHPExcel_IOFactory::createReaderForFile($linkFile);
             // $objReader->setLoadSheetsOnly('Question');
               // $objReader->setReadDataOnly(true);
                $objExcel = $objReader->load($linkFile);
          //   $sheet = $objExcel->setActiveSheetIndex(0);
                 $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);
                 $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
             for ($i = 2; $i <= $highestRow; $i++)
             {
                //$question_id = $sheetData[$i]['A'];
                $content = $sheetData[$i]['B'];
                $option1 = $sheetData[$i]['C'];
                $option2 = $sheetData[$i]['D'];
                $option3 = $sheetData[$i]['E'];
                $answer = $sheetData[$i]['F'];
                echo $content;
                $sql2 = "INSERT INTO `question`  (`TEST_ID`, `CONTENT`, `OPTION1`, `OPTION2`, `OPTION3`, `ANSWER`)
                        VALUES ('$id_inserted','$content',
                                '$option1','$option2','$option3',$answer)";
                    if (mysqli_query($conn, $sql2)) 
                    {
                      //  header('location:../../index.php?click=test');
                      ?>
                      <script>
                           alert('Successfully!'); 
                           window.location="../../index.php?click=test";
                      </script>          
          <?php
                    }
                    else {
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    }
             }
         }
        else 
         {
 ?>
            <script>
                 alert('That test is taken. Try another!'); 
                 window.location="../../index.php?click=addTest";
            </script>          
<?php
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }      
    }
    else{
        $id = $_GET['id'];
        $sql1 = "DELETE FROM `question` WHERE TEST_ID=$id";
        $sql2 = "DELETE FROM `test` WHERE TEST_ID=$id";
      if (mysqli_query($conn, $sql1)) 
      {
         if (mysqli_query($conn, $sql2)) 
            {
             //  header('location:../../index.php?click=test');
             ?>
             <script>
                  alert('Successfully'); 
                  window.location="../../index.php?click=test";
             </script>          
 <?php
            } 
            else 
               {
               //echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
               ?>
               <script>
                    alert('Error!'); 
                    window.location="../../index.php?click=test";
               </script>          
   <?php
          }
      }
      else 
            {
?>
    <script>
        alert('Error! ');
    </script>
<?php
           // echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
            }
    }

?>
