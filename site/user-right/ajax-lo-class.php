<table>
    <?php
    include('../../admin/modules/result/connection.php');
    $teacherid = $_POST["teacherid"];
    $courseid = $_POST["courseid"];
    $role = $_POST["role"];
    if ($role == 'admin') 
    {
        $sql = "SELECT CLASS.CLASS_ID, CLASS.CLASS_NAME, STUDY.RANK, COUNT(STUDY.USERNAME) AS QUANTITY 
                FROM CLASS,STUDY 
                WHERE CLASS.CLASS_ID=STUDY.CLASS_ID 
                AND CLASS.COURSE_ID = '$courseid' 
                GROUP BY STUDY.RANK, CLASS.CLASS_ID
                ORDER BY CLASS.CLASS_ID ASC, STUDY.RANK ASC";
        $sql1 = "SELECT * FROM CLASS 
                WHERE COURSE_ID = '$courseid' 
                
                ORDER BY CLASS_ID ASC";
    }
    else if ($role == 'student') 
    {
        $sql ="SELECT * FROM STUDY, CLASS
                WHERE STUDY.USERNAME = '$teacherid'
                    AND STUDY.CLASS_ID = CLASS.CLASS_ID
                    AND class.COURSE_ID = '$courseid'";
       
    }
    else 
     {
        $sql = "SELECT CLASS.CLASS_ID, CLASS.CLASS_NAME, STUDY.RANK, COUNT(STUDY.USERNAME) AS QUANTITY 
                FROM CLASS,STUDY 
                WHERE CLASS.CLASS_ID=STUDY.CLASS_ID AND CLASS.COURSE_ID = '$courseid' 
                AND CLASS.TEACHER ='$teacherid'
                GROUP BY STUDY.RANK, CLASS.CLASS_ID
                ORDER BY CLASS.CLASS_ID ASC, STUDY.RANK ASC";
        $sql1 = "SELECT * FROM CLASS 
                 WHERE COURSE_ID = '$courseid' 
                 AND TEACHER ='$teacherid' 
                 ORDER BY CLASS_ID ASC";
     }

    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    
    if ($role == 'student') 
    {
        echo '<tr>
                <td>CLASS ID</td>
                <td>CLASS NAME</td>
                <td>RESULT</td>
                <td>RANK</td>
             </tr>';
        foreach ($result as $row)
        {
            echo '<tr><td><a href=./index.php?click=lo-listStudent&id=' . $row["CLASS_ID"] . '>' . $row["CLASS_ID"] . '</td>
                 <td>' . $row["CLASS_NAME"] . '</td>';
            echo '<td>'.$row["RESULT"].'</td>';
            echo '<td>'.$row["RANK"].'</td>';
        }
    }
    else {
        $query1 = $conn->prepare($sql1);
    $query1->execute();
    $result1 = $query1->fetchAll(PDO::FETCH_ASSOC);
        echo ' <tr>
            <td>CLASS ID</td>
            <td>CLASS NAME</td>            
            <td>AVERAGE</td>
            <td>BELOW AVERAGE</td>
            <td>EXCELLENT</td>
            <td>GOOD</td>
            <td>WEAK</td>
           </tr> ';
    foreach ($result1 as $row1) {
        echo '<tr><td><a href=./index.php?click=lo-listStudent&id=' . $row1["CLASS_ID"] . '>' . $row1["CLASS_ID"] . '</td>
        <td>' . $row1["CLASS_NAME"] . '</td>';
        $count=0;
        foreach ($result as $row) {
            if($row["CLASS_ID"]===$row1["CLASS_ID"])
            {
                switch ($row["RANK"]) {
                    case 'AVERAGE':
                        echo '<td>'.$row["QUANTITY"].'</td>';
                        $count=1;
                        break;
                    case 'BELOW AVERAGE':
                        if($count===0)echo '<td> 0 </td>';
                        echo '<td>'.$row["QUANTITY"].'</td>';
                        $count=2;
                        break;
                    case 'EXCELLENT':
                        switch ($count) {
                            case 0:
                                echo '<td> 0 </td><td> 0 </td>';
                                break;
                            case 1:
                                echo '<td> 0 </td>';
                                break;
                            default:
                                break;                                
                        }    
                        echo '<td>'.$row["QUANTITY"].'</td>';
                        $count=3;                    
                        break;
                    case 'GOOD':
                        switch ($count) {
                            case 0:
                                echo '<td> 0 </td><td> 0 </td><td> 0 </td>';
                                break;
                            case 1:
                                echo '<td> 0 </td><td> 0 </td>';
                                break;
                            case 2:
                                echo '<td> 0 </td>';
                                break;
                            default:
                                break;
                        } 
                        echo '<td>'.$row["QUANTITY"].'</td>';
                        $count=4; 
                        break;
                    default:
                        switch ($count) {
                            case 0:
                                echo '<td> 0 </td><td> 0 </td><td> 0 </td><td> 0 </td>';
                                break;
                            case 1:
                                echo '<td> 0 </td><td> 0 </td><td> 0 </td>';
                                break;
                            case 2:
                                echo '<td> 0 </td><td> 0 </td>';
                                break;
                            case 3:
                                echo '<td> 0 </td>';
                                break;
                            default:
                                break;
                        } 
                        echo '<td>'.$row["QUANTITY"].'</td>';
                        $count=5;
                        break;
                }
            }   
        }
        if($count===0)  echo '<td> 0 </td><td> 0 </td><td> 0 </td><td> 0 </td><td> 0 </td>';
        else if($count===1)  echo '<td> 0 </td><td> 0 </td><td> 0 </td><td> 0 </td>';
        else if($count===2)  echo '<td> 0 </td><td> 0 </td><td> 0 </td>';
        else if($count===3)  echo '<td> 0 </td><td> 0 </td>';
        else if($count===4)  echo '<td> 0 </td>';
        echo '</tr>';   
    }
    echo '</table>';
    }
    ?>