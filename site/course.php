
    <link rel="stylesheet" href="./css/about2.css">
    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <head>
	<title>COURSE</title>
</head>
<?php
    $sql = "SELECT * FROM COURSE";
    $result = $conn->query($sql);

    $id = $_GET['id'];

?>
    <div class='content'>
       
    <div class="info">
    <?php 
     
    $i = 0;
    while ($row = $result->fetch_assoc()) //Trong khi con dong
    {
        $filepath = 'admin/modules/description_course/';
        $file = $row['DESCRIPTION'];
        ?>
        <h4 id="<?php echo $row['COURSE_ID'] ?>" class="title1 <?php echo $row['COURSE_ID'] ?>" style="font-size: 20px;"><?php echo $row['COURSE_NAME'] ?>
         <img src="img/arrow.png">
        <hr>
        <?php
        if ($id != $row['COURSE_ID'])
        {
            ?>
            <div class='desc' style="display: none">
        <?php
        }
        else
        ?>
            <div class='desc' >
    <?php 
        $content = "
            <code>
                <pre >".htmlspecialchars(file_get_contents("$filepath/$file"))."</pre>
            </code></div></h4>";
        echo $content;
        ?>
<script>
        $(document).ready(function(){
            $("<?php echo '.'.$row['COURSE_ID'] ;?>").click(function(){
            $('<?php echo '.'.$row['COURSE_ID'] ;?> > div').toggle(500,'swing');
        })
  
    })
</script>
        <?php
    $i++;
    
    } 
    ?>    
        </div> 
</div>

   
