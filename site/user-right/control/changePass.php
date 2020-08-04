<?php
    include('../../../admin/connect.php');
    $id = $_GET['id'];
    $currentPass = $_POST['currentPass'];
    $newPass = $_POST['newPass'];
    $retypePass = $_POST['retypePass'];
    $sql = "SELECT * FROM `account` WHERE username = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['PASS'] == $currentPass)
    {
        if($newPass == $retypePass)
        {
            $sql2 = "UPDATE`account` SET PASS = '$newPass' WHERE username='$id'";
            if (mysqli_query($conn, $sql2)) 
                   {
                    // header('location: ../../../index.php?click=editPass');
                    ?>
                    <script>
                        window.location="../../../index.php?click=info";
                        alert('Successfully');
                        
                    </script>
                <?php
                  } 
            else {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            }
     }
        else {
            ?>
            <script>
                alert('Your password and confirmation password do not match');
                window.location="../../../index.php?click=editPass";
            </script>
        <?php
         
        }
    }
    else {
    ?>
        <script>
            alert('Your password is not correct! Please try again!');
            window.location="../../../index.php?click=editPass";
        </script>
    <?php
    }
?>