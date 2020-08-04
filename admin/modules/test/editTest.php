<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

<?php
// include('../connect.php');
$sql1 = "SELECT * FROM `test`, `class`, `course`
                WHERE TEST_ID ='$_GET[id]'
                  AND class.COURSE_ID = course.COURSE_ID
                  AND test.CLASS_ID = class.CLASS_ID";
$sql2 = "SELECT * FROM `course`";
$sql3 = "SELECT * FROM  `class`";

$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
?>
<form class="form-edit-test" action='./modules/test/controlTest.php?id=<?php echo $row1['TEST_ID']; ?>' enctype="multipart/form-data" method='POST'>
    <table id='tblTest'>
        <tr colspan=2> <strong>ADD NEW TEST</strong> </tr>
        <tr>
            <td>Created by</td>
            <td><input readonly type="text" name='txtCreatedBy' value='admin'></td>
        </tr>
        <tr>
            <td>Test Name</td>
            <td><input type="text" name='txtTestName' placeholder='test_name' value='<?php echo $row1["TEST_NAME"] ?>' required>
            </td>
        </tr>
        <tr>
            <td>Type</td>
            <td><select name="selType" id="selType">
                    <option value='<?php echo $row1["TYPE"] ?>'>---Click here to change type of test---</option>
                    <option value="free">Free Test</option>
                    <option value="todo">Todo Test</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Course</td>
            <td>
                <select name="selCourse" id="selCourse" onchange=CourseChanged(this)>
                    
                    <?php
                    include('modules/result/connection.php');
                    $query2 = $conn->prepare($sql2);
                    $query2->execute();
                    $result2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result2 as $row2) {
                        echo '<option ';
                        if ($row2["COURSE_ID"] === $row1["COURSE_ID"]) echo 'selected="selected"';
                        echo ' value="' . $row2["COURSE_ID"] . '">' . $row2["COURSE_NAME"] . '</option>';
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Class</td>
            <td>
                <div id='listClass'>
                    <select name="selClass" id="selClass">
                        <option value="<?php echo $row1["CLASS_ID"] ?>"><?php echo $row1["CLASS_NAME"] ?></option>
                </div>
            </td>
        </tr>
        <tr>
            <td>Time limit</td>
            <td><input type="number" name='txtTimeLimit' value='<?php echo $row1['TIMELIMMIT']; ?>'>
            </td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name='imgTest' accept="image/*"></td>
        </tr>
        <tr>
            <td>Excel file</td>
            <td><input type="file" name='fileExcel' accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"></td>
        </tr>
        <tr>
            <td></td>
            <td style='font-size: 15px; padding: 5px'>Accept .xlsx file only</td>
        </tr>
        <tr>
            <td colspan=2>
                <button name='btnEdit'><strong>Submit</strong></button>
        </tr>
    </table>
</form>
<script>
    function CourseChanged(obj) {
        var value = obj.value;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "modules/test/showClass_ajax.php",
            data: 'string=' + value,
            cache: false,
            success: function(result) {
                var html = '';
                html += '<select name ="selClass" id="selClass">';
                $.each(result, function(key, item) {
                    //  alert(item['CLASS_ID']);
                    html += '<option value="' + item['CLASS_ID'] + '">';
                    html += item['CLASS_NAME'];
                    html += '</option>';
                    // console.log(result); 
                });
                html += '</select>';
                $('#listClass').html(html);
            },
            error: function(e) {
                console.log(e.message);
            }
        });
    }
</script>