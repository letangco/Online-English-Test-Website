<?php
    include('../connect.php');
   if (isset($_GET['acc']) == 'del')
   {
        $class_id = $_GET['id'];
       $username = $_GET['username'];
       $sql = "DELETE FROM `study` 
                WHERE CLASS_ID='$class_id'
                AND USERNAME = '$username'
                AND RESULT = 0 ";
       if (mysqli_query($conn, $sql)) 
       {
         //header("location:../../index.php?click=studentInClass&id=$class_id");
         ?>
         <script>
              alert('Successfully!');
              window.location='../../index.php?click=studentInClass&id=<?php echo $class_id ?>';
         </script>
         <?php
       }
       else 
       {
           ?>
          <script>
               alert('Khong the xoa sinh vien!');
               window.location="../../index.php?click=addClass";
          </script>
          <?php
       }
       // echo 'hi';
   }
   else
   {
    //header("location: ../../index.php?click=studentInClass&id=$class_id");
    $class_id = $_POST['class_id'];
    $getArr =  $_POST['arrayStd_checked'];
    $listStd = json_decode($getArr);
    for ( $i = 0; $i < count($listStd); $i++ )
    {
        $username = $listStd[$i];
       $sql = "INSERT INTO `study`(`USERNAME`, `CLASS_ID`, `RESULT`, `RANK`) 
                VALUES ('$username','$class_id',0,'WEAK')";
        $ok = mysqli_query($conn, $sql);
 
    }
    echo 'Inserted';
   } 
  // print_r (json_decode($arr));


?>