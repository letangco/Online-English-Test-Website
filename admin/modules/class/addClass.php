
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<style>
    select {
    margin: 5px;
    border: 1px solid #f29393;
    padding: 10px;
}
</style>
<?php
     $sql1 = "SELECT * FROM `class`";
     $sql2 = "SELECT * FROM `course`";
     $sql3 = "SELECT * FROM  `teacher`";
     $result1 = $conn->query($sql1);
     $result2 = $conn->query($sql2);
     $result3 = $conn->query($sql3);
?>
<form class="form-add-class" action='./modules/class/controlClass.php' method='POST'
        enctype="multipart/form-data" >
    <table>
        <tr colspan=2> <strong>ADD NEW CLASS</strong> </tr>
        <tr>
            <td>Class ID</td>
            <td><input type="text" name='txtClassID' placeholder='ex: ENG001' required></td>
        </tr>
        <tr>
            <td>Class Name</td>
            <td><input type="text" name='txtClassName' placeholder='class_name' required></td>
        </tr>

        <tr>
            <td>Course</td>
            <td>
            <select name="selCourse" id="selCourse">          
<?php
    while ($row2 = $result2->fetch_assoc())
    {
    ?>
        <option value="<?php echo $row2['COURSE_ID']?>"><?php echo $row2['COURSE_NAME']?></option>
<?php
    }

    ?>
        </select></td>
        </tr>
        <tr>
            <td>Teacher</td>
            <td>
            <select name="selTeacher" id="selTeacher">                 
<?php
    while ($row3 = $result3->fetch_assoc())
    {
    ?>
        <option value="<?php echo $row3['USERNAME']?>"><?php echo $row3['FULLNAME']?></option>
<?php
    }
    ?>
        </select></td>
        </tr>
        <tr>
            <td>BEGIN DATE</td>
            <td><input type="date" name='txtBegin'></td>
        </tr>
        <tr>
            <td>FINISH DATE</td>
            <td><input type="date" name='txtEnd'></td>
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
                <button name='btnSubmitAdd'><strong>Submit</strong></button></td>
        </tr>
    </table>
</form>
