<?php
        if (isset($_GET['ac']) && $_GET['ac'] == 'logout')
        {
                unset($_SESSION['login']);
                header('location: login.php');
        }
     
?>
<a href="./index.php?ac=logout"><p style="float: right">Logout</p></a>
<header> 
        <h1>ADMIN</h1>
</header>