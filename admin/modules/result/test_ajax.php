<option value="">--choose test--</option>
<?php
    include('connection.php');
    $value = $_POST['classid'];
    $sql = "SELECT * FROM TEST WHERE CLASS_ID = '$value'";
    $query = $conn -> prepare($sql);
    $query -> execute();
    $result = $query -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo '<option value="'.$row["TEST_ID"].'">'.$row["TEST_NAME"].'</option>'; 
    }
?>