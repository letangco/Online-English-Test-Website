<option value="">--choose class--</option>
<?php
include('../../admin/modules/result/connection.php');
session_start();
$username = $_SESSION['login'];
$courseid = $_POST["courseid"];
$sql = "SELECT * FROM CLASS WHERE COURSE_ID = '$courseid' AND TEACHER ='$username'";
$query = $conn->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);


foreach ($result as $row) {
    echo '<option value="' . $row["CLASS_ID"] . '">' . $row["CLASS_NAME"] . '</option>';
}
?>