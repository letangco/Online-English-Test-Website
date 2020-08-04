<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="img/study.png" />
</head>
<body style="background-size: auto 1700px">
  <?php
        session_start();
    //    session_destroy();
    ?>
    <?php
      include('./site/header.php');
      include('./site/menu.php');
    ?>
    <div class='content'>
    <?php
      include('./site/content.php');
    ?>
    </div>
     <?php
      include('./site/footer.php');
    ?>
</body>
</html> 
