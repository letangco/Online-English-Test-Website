<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

</head>
<body style='background: #F4D1AB;'>
    <?php
        session_start();
        if (!isset($_SESSION['login_admin']))
        {
            header('location:login.php');
        }
    ?>
    <?php
        include('modules/connect.php');
        include('modules/header.php');
        include('modules/menu.php');
        
    ?>
    <div class='content' style="margin-left: -100px;">
        <?php
include('modules/content.php');
?>
    </div>
</body>
</html>



