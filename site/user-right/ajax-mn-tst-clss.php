<option value="">--choose class--</option>
<?php
    include('../../admin/modules/result/connection.php');
    $teacherid = $_POST["teacherid"];
    $courseid = $_POST["courseid"];
    $sql = "SELECT * FROM CLASS WHERE COURSE_ID = '$courseid' AND TEACHER ='$teacherid'";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo '<option value="'.$row["CLASS_ID"].'">'.$row["CLASS_NAME"].'</option>'; 
    }
?>