
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

<?php
     $sql1 = "SELECT CLASS_ID,CLASS_NAME, course.COURSE_ID as A, course.COURSE_NAME as B,
                teacher.USERNAME AS C, teacher.FULLNAME AS D, BEGIN, END
                 FROM class , course , teacher
                WHERE CLASS_ID ='$_GET[id]'
                  AND class.COURSE_ID = course.COURSE_ID
                  AND class.TEACHER = teacher.USERNAME";
     $sql2 = "SELECT * FROM  `course`";
     $sql3 = "SELECT * FROM  `teacher`";

     $result1 = $conn->query($sql1);
     $row1 = $result1->fetch_assoc();

     $begin = $row1['BEGIN'];
     $newbegin = date("Y-m-d", strtotime($begin)); 

     $end = $row1['END'];
     $newend = date("Y-m-d", strtotime($end)); 

    
?>
<form class="form-edit-class" 
     action='./modules/class/controlClass.php?id=<?php echo $row1['CLASS_ID'];?>' 
        enctype="multipart/form-data" method='POST'>
    <table> 
        <tr colspan=2> <strong>EDIT CLASS</strong> </tr>
        <tr>
            <td>Class ID</td>
            <td><input readonly type="text" name='txtClassID' value='<?php echo $row1['CLASS_ID']?>' required></td>
        </tr>
        <tr>
            <td>Class Name</td>
            <td><input type="text" name='txtClassName' value='<?php echo $row1['CLASS_NAME']?>'  required></td>
        </tr>
        <tr>
            <td>Course</td>
            <td>
            <select name="selCourse" id="selCourse">
            <option value='<?php echo $row1['A']?>'><?php echo $row1['B']?>
        </option>             
<?php
    include('modules/result/connection.php');
    $query2 = $conn -> prepare($sql2);
    $query2 -> execute();
    $result2 = $query2 -> fetchAll(PDO::FETCH_ASSOC);
    foreach ($result2 as $row2 ) {
        echo '<option value="'.$row2["COURSE_ID"].'">'.$row2["COURSE_NAME"].'</option>';
    }
    ?>
        </select></td>
        </tr>
        <tr>
            <td>Teacher</td>
            <td>
            <select name="selTeacher" id="selTeacher">    
            <option value='<?php echo $row1['C']?>'><?php echo $row1['D']?>
        </option>                
        <?php
    include('modules/result/connection.php');
    $query3 = $conn -> prepare($sql3);
    $query3 -> execute();
    $result3 = $query3 -> fetchAll(PDO::FETCH_ASSOC);
    foreach ($result3 as $row3 ) {
        echo '<option value="'.$row3["USERNAME"].'">'.$row3["FULLNAME"].'</option>';
    }
    ?>
        </select></td>
        </tr>
        <tr>
            <td>BEGIN DATE</td>
            <td><input type="date" name='txtBegin' value='<?php echo $newbegin ?>'></td>
        </tr>
        <tr>
            <td>FINISH DATE</td>
            <td><input type="date" name='txtEnd' value='<?php echo $newend ?>'></td>
        </tr>
        <tr>
            <td>Info</td>
            <td><input type="file" name='fileInfo' accept="text/plain"></td>
        </tr>
        <tr>
            <td></td>
            <td style='font-size: 15px; padding: 5px'>Accept .txt file only</td>
        </tr>
        <tr>
            <td></td>
            <td colspan=2>
                <button name='btnSubmitEdit'><strong>Submit</strong></button></td>
        </tr>
    </table>
</form>
