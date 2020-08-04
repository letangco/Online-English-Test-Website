<option value="">--choose class--</option>
<?php
    include('connection.php');
    $sql = "SELECT * FROM CLASS WHERE COURSE_ID = ".$_POST["courseid"];
    $query = $conn -> prepare($sql);
    $query -> execute();
    $result = $query -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo '<option value="'.$row["CLASS_ID"].'">'.$row["CLASS_NAME"].'</option>'; 
    }
?>