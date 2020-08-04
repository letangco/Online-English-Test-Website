<tr>
    <td>USERNAME</td>
    <td>FULL NAME</td>
    <td>TIMES</td>
    <td>POINT</td>
</tr>
<?php
    include('connection.php');
    $value = $_POST['testid'];
    $sql1 = "SELECT * FROM RESULT,STUDENT WHERE TEST_ID = $value AND RESULT.USERNAME=STUDENT.USERNAME";
    $query1 = $conn -> prepare($sql1);
    $query1 -> execute();
    $result1 = $query1 -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($result1 as $row1) {
        echo '<tr>';
        echo '<td>'.$row1["USERNAME"].'</td><td>'.$row1["FULLNAME"].'</td><td>'.$row1["TIMES"].'</td><td>'.$row1["POINT"].'</td>';
        echo '</tr>'; 
    }
    $sql2 = "SELECT * FROM RESULT,TEACHER WHERE TEST_ID = $value AND RESULT.USERNAME=TEACHER.USERNAME";
    $query2 = $conn -> prepare($sql2);
    $query2 -> execute();
    $result2 = $query2 -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($result2 as $row2) {
        echo '<tr>';
        echo '<td>'.$row2["USERNAME"].'</td><td>'.$row2["FULLNAME"].'</td><td>'.$row2["TIMES"].'</td><td>'.$row2["POINT"].'</td>';
        echo '</tr>'; 
    }
?>
