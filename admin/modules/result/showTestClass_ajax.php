
<?php
    include('connection.php');
    $value = $_POST['classid'];
    $sql = "SELECT * FROM TEST WHERE CLASS_ID = '$value'";
    $query = $conn -> prepare($sql);
    $query -> execute();
    $result = $query -> fetchAll(PDO::FETCH_ASSOC);
    echo '<tr>
            <td>USERNAME</td>
            <td>FULL NAME</td>';
    foreach ($result as $row) {
        echo '<td>'.$row["TEST_NAME"].'</td>'; 
    }
    echo '</tr>';
    $sql1 = "SELECT * FROM STUDENT,STUDY WHERE CLASS_ID = '$value' AND STUDY.USERNAME=STUDENT.USERNAME";
    $query1 = $conn -> prepare($sql1);
    $query1 -> execute();
    $result1 = $query1 -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($result1 as $row1) {
        echo '<tr>';
        echo '<td>'.$row1["USERNAME"].'</td><td>'.$row1["FULLNAME"].'</td>';

        $usn= $row1["USERNAME"];

        $sql2 = "SELECT AVG(POINT) AS AVG_POINT,RESULT.TEST_ID
                FROM RESULT,TEST    
                WHERE RESULT.TEST_ID = TEST.TEST_ID 
                    AND RESULT.USERNAME='$usn'
                    AND TEST.CLASS_ID='$value'
                GROUP BY RESULT.USERNAME,RESULT.TEST_ID";
        
        $query2 = $conn -> prepare($sql2);
        $query2 -> execute();
        $result2 = $query2 -> fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $count=0;
            foreach ($result2 as $row2) {
                if($row["TEST_ID"]===$row2["TEST_ID"])
                {
                    echo '<td>'.$row2["AVG_POINT"].'</td>';
                    $count=1;
                }   
            }
            if($count===0)  echo '<td></td>';
        }
        echo '</tr>'; 
    }
?>
