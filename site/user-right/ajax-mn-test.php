<table>
    <?php
    include('../../admin/modules/result/connection.php');
    $teacherid = $_POST["teacherid"];
    $courseOrClass = $_POST["courseOrClass"];
    $check=(int)$courseOrClass;// nếu $courseOrClass là class_id thì check =0, ngược lại check= số khác 0
    if ($check)
        $sql = "SELECT * FROM CLASS, TEST WHERE CLASS.COURSE_ID = '$courseOrClass' AND CLASS.TEACHER ='$teacherid' AND TEST.CLASS_ID=CLASS.CLASS_ID";
    else  $sql = "SELECT * FROM TEST WHERE CLASS_ID = '$courseOrClass' ";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo ' <tr>
    <td>TEST ID</td>
    <td>TEST NAME</td>
    <td>IMG</td>
    <td>CLASS ID</td>
    <td>TIME LIMIT</td>
    <td colspan=2>CONTROL</td> 
</tr> ';
    foreach ($result as $row) {
        echo '<tr><td><a href=./index.php?click=mn-detail-test&id=' . $row["TEST_ID"] . '>' . $row["TEST_ID"] . '</td>
        <td>' . $row["TEST_NAME"] . '</td>
        <td>' . $row["IMG"] . '</td>
        <td>' . $row["CLASS_ID"] . '</td>
        <td>' . $row["TIMELIMMIT"] . '</td>
        <td >  
            <button stlyle="border-radius:10px" name="btnEditTest">
                <a stlyle="color:#7eb9be" href="./index.php?click=mn-test-edit&ac=edit&id=' . $row['TEST_ID'] . '&name='.$row["TEST_NAME"].'">
                    Edit
                </a></button>                    
        </td>
        <td>
            <button stlyle="border-radius:10px" name="btnDelTest">
                    <a stlyle="color:#7eb9be" href="./site/user-right/user-manage-controlTest.php?id=' . $row['TEST_ID'] . '&name='.$row["TEST_NAME"].'">
                        Delete
                    </a></button>
        </td>
            </tr>';
    }

    ?>
</table>