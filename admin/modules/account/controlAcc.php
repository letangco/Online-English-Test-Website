<?php
    include('../connect.php');
    $id = $_GET['id']; 
    $acc_pass = $_POST['txtPassword'];
    $acc_roleid = $_POST['role'];
    $acc_avt = $_FILES['fileAvt']['name'];
    $acc_avt_tmp = $_FILES['fileAvt']['tmp_name'];
    move_uploaded_file($acc_avt_tmp, '../uploads/'.$acc_avt);
    
    if (isset($_POST['btnSubmitEdit'])) 
    { 
        if ($acc_avt != '')
        {
            $sql = "UPDATE `account` SET `PASS` = '$acc_pass', 
                    `role_id`= '$acc_roleid', `AVATAR`= '$acc_avt'
                    WHERE `username` = '$id'" ; 
        }
        else {
            $sql = "UPDATE `account` SET `PASS` = '$acc_pass', 
                    `role_id`= '$acc_roleid'
                    WHERE `username` = '$id'" ; 
        }
       if (mysqli_query($conn, $sql)) 
             // echo "New record created successfully";
             {
                
                ?>
                <script>
                     alert('Edit succesfully'); 
                     window.location="../../index.php?click=account";
                </script>          
    <?php
             
               // 
             }
        else 
         {
  ?>
            <script>
                 alert('That username is taken. Try another!'); 
                 window.location="../../index.php?click=addAccount";
            </script>          
<?php
           // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    else if  (isset($_POST['btnSubmitAdd']))  
    {
        $acc_usename = $_POST['txtAccount'];
      
        $sql = "INSERT INTO `account`(`username`, `PASS`, `role_id`,`create_date`, `AVATAR`) 
        VALUES ('$acc_usename','$acc_pass','admin', NOW(),'$acc_avt')";

         if (mysqli_query($conn, $sql)) 

                 {
                    ?>
                    <script>
                         alert('Edit succesfully'); 
                         window.location="../../index.php?click=account";
                    </script>          
        <?php
                 }
                 
        else 
         {
    ?>
            <script>
                 alert('That username is taken. Try another!'); 
                 window.location="../../index.php?click=addAccount";
            </script>          
<?php
           // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }      
    }
    else{

    }
?>
