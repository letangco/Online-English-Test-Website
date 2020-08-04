
<?php
   include('../admin/connect.php');
   session_start();
      $username = $_POST['username'];
      $password = $_POST['password'];
      //  echo($username);
      $sql = "SELECT * FROM `account` WHERE username = '$username'
      and PASS = '$password'";
      $result = $conn->query($sql);
      $row = mysqli_num_rows($result);
      //$row_ = $result->fetch_assoc();
      if ($row > 0) 
        { 
            $_SESSION['login'] = $username;
           echo ('<a id="btnLogin" href="./index.php?click=info&username='.$username.'" class="btn btn-outline-dark btn-rounded mb-4">'.$username.'
           </a>');
           ?>
            <script>
			swal("Good job!", "Login successfuly", "success");
            </script>
           <?php
        }
        else 
        {
            //setcookie("error", "Đăng nhập không thành công!", time()+1, "/","", 0);
            ?>
            <script>
			swal("Error!", "Invalid username or password", "error"); 
            </script>
            <?php
            echo ('<a id="btnLogin" 
            class="btn btn-outline-dark btn-rounded mb-4" 
            data-toggle="modal" data-target="#modalLoginForm">Login</a>');
        }
?>   
