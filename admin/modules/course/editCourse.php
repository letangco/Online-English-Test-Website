
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

<?php
     $sql = "SELECT * FROM `course` WHERE COURSE_ID ='$_GET[id]'";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();
?>
<form class="form-edit-course" 
     action='./modules/course/controlCourse.php?id=<?php echo $row['COURSE_ID'];?>' 
        enctype="multipart/form-data" method='POST'>
    <table> 
        <tr colspan=2> <strong>EDIT COURSE</strong> </tr>
        <tr>
            <td>COURSE ID</td>
            <td><input  disabled type="text" name='txtCourseID' value='<?php echo $row['COURSE_ID']?>'></td>
        </tr>
        <tr>
             <td>COURSE NAME</td>
            <td><input type="text" name='txtCourseName' value='<?php echo $row['COURSE_NAME']?>' required></td>
        </tr>
        <tr>
             <td>FEE</td>
            <td><input type="text" name='txtFee' value='<?php echo $row['FEE']?>' required></td>
        </tr>
        <tr>
            <td>DESCRIPTION</td>
            <td>
                <input type="file" name='fileDesc' accept="text/plain">
            </td>
        </tr>

        <tr>
            <td>BENCHMARK</td>
            <td><input type="number" step=0.01 name='txtBenchMark' value='<?php echo $row['BENCHMARK']?>' required></td>
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
