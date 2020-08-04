<table>
    <?php
    include('../../admin/modules/result/connection.php');
    $teacherid = $_POST["teacherid"];
    $courseid = $_POST["courseid"];
    $sql = "SELECT * FROM CLASS WHERE COURSE_ID = '$courseid' AND TEACHER ='$teacherid'";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo ' <tr>
<td>CLASS ID</td>
<td>CLASS NAME</td>
<td>INFOMATION</td>
<td>BEGIN</td>
<td>END</td> 
</tr> ';
    foreach ($result as $row) {

        $filepath = '../../admin/modules/info_class/';
        $file = $row['INFO'];
        $content = "
            
                <pre style='font-family: Comic Sans MS; font-weight: bold'>".htmlspecialchars(file_get_contents("$filepath/$file"))."</pre>
            ";

        echo '<tr><td><a href=./index.php?click=mn-listStudent&id=' . $row["CLASS_ID"] . '>' . $row["CLASS_ID"] . '</td>
        <td>' . $row["CLASS_NAME"] . '</td>
        <td>' . $content . '</td>
        <td>' . $row["BEGIN"] . '</td>
        <td>' . $row["END"] . '</td></tr>';
    }

    ?>
</table>